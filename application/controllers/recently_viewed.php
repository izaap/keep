<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Recently_viewed extends App_Controller {
    function __construct()
    {
        parent::__construct();
        
        $this->layout->add_javascripts(array('custom'));
        // $this->load->library('form_validation');
         $this->load->model('recent_model');
         $this->load->model('home_model');
         $this->load->library('product');
    }

    public function index()
    {
        
        $this->product_list = $this->home_model->get_product_list(); 
        
        $this->layout->view('frontend/home/home',$this->product_list);
    }
    
    
    public function recent_view()
    {
		//echo "in";exit;
		$user_id = $this->session->userdata('user_id');
		
		$this->product_list['all_recent'] = $this->recent_model->get_all_recent_product($user_id); 
		
		$this->product_list['like'] = $this->recent_model->get_product_list_like($user_id); 
		//print_r($this->product_list['like']);exit;
		
		$this->product_list['fav'] = $this->recent_model->get_product_list_fav($user_id); 
		
		 $this->layout->view('frontend/recent_view/recent_view_products',$this->product_list);
		
	}
	
	
	
}
?>
