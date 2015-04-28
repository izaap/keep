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
		$user_id = $this->session->userdata('user_id');
		//print $product_id;exit;
		$this->product_detail = $this->home_model->get_product_detail($product_id,$user_id); 
		
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
		//print_r($comment_result);exit;
		if($comment_result) {
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
                                
                                <a href="'.site_url().'home/comment_delete/'.$comment_result. '/'.$product_id.'" title="" data-placement="top" data-toggle="tooltip" class="btn btn-redcircle glyphicon glyphicon-remove" >  </a>
                                
                            </div>
                            </div>
                         </div>';
                         
			echo $a;exit;
		
		}
	}
	
	
	
	public function comment_delete()
	{
		$comment_id = $this->uri->segment(3);
		$product_id = $this->uri->segment(4);
		//print $comment_id;exit;
		$comm_delete = $this->home_model->delete_comment($comment_id);
		if($comm_delete == 1){
			
			redirect('home/product_detail/'.$product_id.'');
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
		if(!$this->uri->segment(3) == ""){
		$user_id  = $this->uri->segment(3);
		
		}else { 
			
			$user_id = $this->session->userdata('user_id');
		}
		
		//$user_id = $this->session->userdata('user_id');
		//print $user_id;exit;
		
		$this->product_list = $this->home_model->get_product_list_like($user_id); 
		
		$this->layout->view('frontend/list_like_product',$this->product_list);
		
	}
	
	
	
	function list_fav_product()
	{
		if(!$this->uri->segment(3) == ""){
		$user_id  = $this->uri->segment(3);
		
		}else { 
			
			$user_id = $this->session->userdata('user_id');
		}
		//$user_id = $this->session->userdata('user_id');
		//print $user_id;exit;
		
		$this->product_list = $this->home_model->get_product_list_fav($user_id); 
		
		$this->layout->view('frontend/list_fav_product',$this->product_list);
		
	}
	
	
	function follow()
    {	
		
		
		$following_id  = $this->input->post('following_id');
		$user_id  = $this->input->post('user_id');
		
		$follow = $this->home_model->add_follow($following_id,$user_id); 
		
		//print_r($follow);exit;
		
		 $a ='<button class="btn btn-primary" id ="append_but" type="button" onclick="unfollow('.$following_id.','.$this->session->userdata('user_id').');">Unfollow</button>'; 
                         
		echo $a;exit;
		
		
	}
	
	
	
	
	function unfollow()
    {	
		$following_id  = $this->input->post('following_id');
		$user_id  = $this->input->post('user_id');
		
		$follow = $this->home_model->delete_follow($following_id,$user_id); 
		
		//print_r($follow);exit;
		
		 $a ='<button class="btn btn-primary"  type="button" onclick="follow('.$following_id.','.$this->session->userdata('user_id').');">Follow</button>'; 
                         
		echo $a;exit;
		
		
	}
	
	
	
	function followers_user_list()
	{
		
		$user_id  = $this->uri->segment(3);
		
	//print_r($this->data['user_data']);exit;
		
		$this->followers_list = $this->home_model->get_followers_user_list($user_id); 
		
		$this->layout->view('frontend/followers_user_list',$this->followers_list);
		
	}
	
	
	
	function following_user_list()
	{
		
		$user_id  = $this->uri->segment(3);
		$this->following_list = $this->home_model->get_following_user_list($user_id); 
		//print_r($this->following_list);exit;
		$this->layout->view('frontend/following_user_list',$this->following_list);
		
	}
	
	
	public function most_popular()
	{
		$this->product_list = $this->home_model->most_popular_product(); 
		//print_r(count($this->most_popular));exit;
		
		$this->layout->view('frontend/most_popular',$this->product_list);
	}
    
    
    public function upcomming_auctions() 
	{
		
		$this->product_list = $this->home_model->upcomming_auctions_product(); 
		//print_r(count($this->most_popular));exit;
		
		$this->layout->view('frontend/upcomming_auctions',$this->product_list);
		 
	}
	
	public function edit_collection()
	{
		$user_id  = $this->uri->segment(3);
		$collection_id  = $this->uri->segment(4);
		
		$this->collection_data = $this->home_model->get_collection_data($collection_id); 
		if($_POST) { 
		$post_value = $this->input->post();
		$update = $this->home_model->update_collection_name($post_value,$collection_id);
			if($update =  1){
			
				redirect('login/list_collection_product/'.$user_id.'/'.$collection_id.'');
			} 
		
		}
		$this->layout->view('frontend/edit_collection',$this->collection_data);
		
	}
	
	
	
	public function delete_collection()
	{
	
		$user_id  = $this->uri->segment(3);
		$collection_id  = $this->uri->segment(4);
		
		$delete_collection = $this->home_model->delete_collection($collection_id,$user_id); 
		//print_r($delete_collection);exit;
		
		if($delete_collection){
			
			redirect('login/user_profile/'.$user_id.'');
		}
		
		
	}
	
	
	
	public function directory_list()
	{
		
		$this->layout->view('frontend/directory_list');
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>
