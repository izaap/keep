<?php if(!defined("BASEPATH")) exit("No direct script access allowed");
safe_include("controllers/app_controller.php");
class Dashboard extends App_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }
    
    public function index()
    {
            
        $this->data['user_data'] = $this->session->userdata('user_data');
        $this->service_message->set_flash_message('login_success','welcome admin'); 
        $this->layout->view('admin/home');
       
    }

    function product_chart(){

        try
        { 
            $rep_data = $this->dashboard_model->get_products_report();

            if(empty($rep_data))
                throw new Exception("No Report Data");

            $val_data = array();

            foreach($rep_data as $key => $val){

                switch($val['type']){

                    case 'favorites':
                        $data['favorites'][] =   array($val['product_name'],$val['count']);
                        break; 

                    case 'likes':
                        $data['likes'][]    =   array($val['product_name'],$val['count']);
                        break;   

                    case 'followed':
                        $data['followed'][] =   array($val['product_name'],$val['count']);
                        break;  

                    case 'buycount':
                        $data['buycount'][] =  array($val['product_name'],$val['count']);
                        break; 

                    default:
                           break;             
                }
            }

            $val_data['favorites'] = $this->convert_keys_values($data['favorites'],'Products','Favorites');
            $val_data['likes']     = $this->convert_keys_values($data['likes'],'Products','Likes');
            $val_data['followed']  = $this->convert_keys_values($data['followed'],'Products','Followed');
            $val_data['buycount']  = $this->convert_keys_values($data['buycount'],'Products','Buycount');

            $val_data['status'] = 'success';

        }
        catch(Exception $e)
        {
            $val_data['message'] = $e->getMessage();
            
        }     
        echo json_encode($val_data);
        exit;
    
    }

    function convert_keys_values($data,$title,$val_title){
        
        $tit = array(array('label' => $title, 'type' => 'string'),array('label' => $val_title, 'type' => 'number'));
        array_unshift($data,$tit);
        
        return $data;


    }
}

?>