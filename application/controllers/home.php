<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Home extends App_Controller {
    function __construct()
    {
        parent::__construct();
        
        $this->layout->add_javascripts(array('custom'));
        // $this->load->library('form_validation');
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
	
	public function unlike()
    {
		$product_id  = $this->input->post('product_id');
		$user_id = $this->session->userdata('user_id');
		
		$unlike = $this->product->unlike($product_id,$user_id);
		echo $unlike;exit;
		
	}
	
	
	public function buy()
    {
		$product_id  = $this->input->post('product_id');
		$user_id = $this->session->userdata('user_id');
		
		$buy = $this->home_model->buy_count($product_id,$user_id);
		
		echo $buy;exit;
		
	}
	
	
	public function product_detail()
	{
		$product_id  = $this->uri->segment(3);
		//print $product_id;exit;
		$this->product_detail = $this->home_model->get_product_detail($product_id); 
		
		$this->layout->view('frontend/home/product_detail',$this->product_detail);
		
	}
	
	
	
	public function fav_collection()
	{ 	
		$product_id  = $this->input->post('product_id');
		$collection_id  = $this->input->post('collection_id');
		$user_id  = $this->input->post('user_id');
		//echo $collection_id;exit;
		$collection = $this->product->add_to_favourites($product_id,$collection_id,$user_id );
		echo $collection;exit;
		
	}
	
	
	public function create_collection()
	{ 	
		//print_r($_POST);exit;
		
		$product_id  = $this->input->post('product_id');
		$collection_name  = $this->input->post('collection_name');
		$user_id  = $this->input->post('user_id');
		//echo $collection_name;exit;
		$collection = $this->product->create_collection($user_id,$collection_name);
		echo $collection;exit;
		
	}
	
	
	
	
	
	
    
    
    
	
	
	
}
?>
