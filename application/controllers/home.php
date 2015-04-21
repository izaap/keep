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
		
		$a = '<a class="label lab-d heart" onclick="unlike('.$product_id.','.$this->session->userdata('user_id').')"><i class="fa fa-heart"></i>Unlike</a>';
		
		echo $a;exit;
		
	}
	
	public function unlike()
    {
		$product_id  = $this->input->post('product_id');
		$user_id = $this->session->userdata('user_id');
		
		$unlike = $this->product->unlike($product_id,$user_id);
		$a = '<a class="label lab-d heart" onclick="like('.$product_id.','.$this->session->userdata('user_id').')"><i class="fa fa-heart"></i>like</a>';
		
		echo $a;exit;
		
		
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
		//echo $collection;exit;
		
		if($collection == 1){ 
			
			$a = '<p class="col-md-3 center-block fn light-img"><a href="#"><img src="'.include_img_path().'/users/'.$this->session->userdata('user_image').'" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
                            <p class="light-bluetxt">'.$this->session->userdata('user_name').'</p>';
                            echo $a;exit;
                            
                            
			
		}else {  
			
			echo $collection;exit;	
		}
		
	}
	
	
	public function create_collection()
	{ 	
		//print_r($_POST);exit;
		
		$product_id  = $this->input->post('product_id');
		$collection_name  = $this->input->post('collection_name');
		$user_id  = $this->input->post('user_id');
		//echo $collection_name;exit;
		$collection = $this->product->create_collection($user_id,$collection_name);
		if($collection == 1){
			
			$a = '<p class="col-md-3 center-block fn light-img"><a href="#"><img src="'.include_img_path().'/users/'.$this->session->userdata('user_image').'" class="img-circle img-border" alt="" width="60" height="60" /></a></p>
                            <p class="light-bluetxt">'.$this->session->userdata('user_name').'</p>';
                            echo $a;exit;
			
		}else {
			
			echo $collection;exit;	
		}
		
		
	}
	
	
	
	public function product_comments()
	{
		$product_id  = $this->input->post('product_id');
		$comments  = $this->input->post('comments');
		$user_id  = $this->input->post('user_id');
		$comment_result = $this->home_model->post_comments($product_id,$user_id,$comments);
		if(count($comment_result)>0) {
		$a = '<div class="viewer cf">
                            <div class="col-sm-3 col-md-2 resp-img">
                                <img class="center-block fn " alt="Image" src="'.include_img_path().'/users/'.$this->session->userdata('user_image').'">
                            </div>
                            <div class="col-sm-9 col-md-10">
                            <div class="row">
                                <h4><span class="viewername">'.$this->session->userdata('user_name').'</span> <span class="view-hr viewername">Few mins ago</span></h4>
                                <p>
                                   '.$comments.'
                                </p>
                            </div>
                            </div>
                         </div>';
                         
			echo $a;exit;
		
		}
	}
	
	
	
	public function user_collection_create()
	{ 	
		//print_r($_POST);exit;
		
		$collection = $this->input->post('collection');
		$user_id  = $this->input->post('user_id');
		
		$collection = $this->home_model->add_user_collection($user_id,$collection);
		echo $collection;exit;	
		
		
		
	}
	
	
	function list_like_product()
	{
		$user_id = $this->session->userdata('user_id');
		//print $user_id;exit;
		
		$this->product_list = $this->home_model->get_product_list_like($user_id); 
		
		$this->layout->view('frontend/list_like_product',$this->product_list);
		
	}
	
	
	
	function list_fav_product()
	{
		$user_id = $this->session->userdata('user_id');
		//print $user_id;exit;
		
		$this->product_list = $this->home_model->get_product_list_fav($user_id); 
		
		$this->layout->view('frontend/list_fav_product',$this->product_list);
		
	}
	
	
	
	
	
    
    
    
	
	
	
}
?>
