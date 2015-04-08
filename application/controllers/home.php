<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Home extends App_Controller {
    function __construct()
    {
        parent::__construct();
         $this->load->model('home_model');
         $this->load->library('product');
    }

    public function index()
    {
        
        $this->product_list = $this->home_model->get_product_list(); 
        
        $this->layout->view('frontend/home/home',$this->product_list);
    }
    
    
    public function like()
    {
		$product_id  = $this->input->post('product_id');
		$user_id = $this->session->userdata('user_id');
		
		$like = $this->product->like($product_id,$user_id);
		echo $like;exit;
		
	}
    
    
    
	
	
	
}
?>
