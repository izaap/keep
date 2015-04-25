<?php 
class Home_Model extends CI_Model
{
  
   
   function __construct()
   {
     parent::__construct();
   }
   
   
   public function get_product_list()
   {
		$this->db->select('*');
		$this->db->from('jwb_products');
		return $this->db->get()->result_array();
	   
   }
   
   
   public function buy_count($product_id = "", $user_id = "")
   {
		$where=array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('*');
		$this->db->from('jwb_views');
		$this->db->where($where);
		$query = $this->db->get()->num_rows();
		
		if($query == 0){
	
		$this->db->select('*');
		$this->db->from('jwb_products');
		$this->db->where('id', $product_id);
		$query = $this->db->get()->row_array();
		
		$count = $query['buycount']+ 1;
	
		$data_val = array(
		
				'buycount' => $count
				
                     );

		$this->db->where('id', $product_id);
		$result = $this->db->update('jwb_products', $data_val); 
		
		
		$result_insert = $this->db->insert('jwb_views', array('product_id' => $product_id,'user_id' => $user_id));
		
		return 1;
		
	}else {
		
		return 0;
	}
		
		
	}
	
	
	public function check_like_unlike($product_id = "", $user_id = "")
	{
		
		$where=array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('*');
		$this->db->from('jwb_likes');
		$this->db->where($where);
		$query = $this->db->get()->num_rows();
		
		return $query;
	}	
	
	
	public function get_user_collection($user_id = "")
	{
		$where=array('user_id'=>$user_id);
		$this->db->select('*');
		$this->db->from('jwb_collections');
		$this->db->where($where);
		$query = $this->db->get()->result_array();
		
		return $query;	
		
	}
	
	
	public function get_product_detail($product_id = "")
	{
		$this->db->select('*');
		$this->db->from('jwb_products');
		$this->db->where('id', $product_id);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	public function check_user_fav_image($product_id = "")
	{
		$this->db->select('jwb_favourites.*,jwb_users.*');
		$this->db->from('jwb_favourites');
		$this->db->join('jwb_users', 'jwb_favourites.user_id = jwb_users.id', 'left'); 
		$this->db->where('product_id', $product_id);
		$this->db->order_by("jwb_favourites.id", "DESC");
		$this->db->limit(1, 0);
		$query = $this->db->get()->result_array();
		return $query;
		
	} 
	
	
	public function post_comments($product_id = "",$user_id = "",$comments = "")
	{	//echo $user_id;exit;
		if(!$user_id ==""){
			$result_insert = $this->db->insert('jwb_comments', array('product_id' => $product_id,'user_id' => $user_id,'comment' => $comments));
			return $result_insert;
		
		}
	}
	
	   
	public function list_user_comments($product_id = "")
	{	
		$this->db->select('jwb_comments.*,jwb_users.*');
		$this->db->from('jwb_comments');
		$this->db->join('jwb_users', 'jwb_comments.user_id = jwb_users.id', 'left'); 
		$this->db->where('product_id', $product_id);
		$this->db->order_by("jwb_comments.id", "DESC");
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	function add_user_collection($user_id = "",$collection = "")
	{ //echo $user_id;exit;
		if(!$collection == ''){
			$result_insert = $this->db->insert('jwb_collections', array('user_id' => $user_id,'name' => $collection));
			return $result_insert;
		}
		else {
			
			return 0;
		}
		
	}
	
	
	
	
	function check_fav($product_id = "",$user_id = "")
	{
		$where=array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('*');
		$this->db->from('jwb_favourites');
		$this->db->where($where);
		$query = $this->db->get()->num_rows();
		
		return $query;
		
	}
	
	
	
	public function get_product_list_like($user_id = "")
	{
		
		$this->db->select('jwb_likes.*,jwb_products.*');
		$this->db->from('jwb_likes');
		$this->db->join('jwb_products', 'jwb_products.id = jwb_likes.product_id', 'left'); 
		$this->db->where('jwb_likes.user_id', $user_id);
		$this->db->order_by("jwb_products.id", "ASC");
		$query = $this->db->get()->result_array();
		return $query;
		
		
		
	}
	
	
	public function get_product_list_fav($user_id = "")
	{
		
		$this->db->select('jwb_favourites.*,jwb_products.*');
		$this->db->from('jwb_favourites');
		$this->db->join('jwb_products', 'jwb_products.id = jwb_favourites.product_id', 'left'); 
		$this->db->where('jwb_favourites.user_id', $user_id);
		$this->db->group_by('jwb_favourites.product_id'); 
		$this->db->order_by("jwb_products.id", "ASC");
		$query = $this->db->get()->result_array();
		return $query;
		
		
		
	}
	
	
	
	public function check_user_fav_follow($product_id = "")
	{
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select('jwb_favourites.*,jwb_users.*');
		$this->db->from('jwb_favourites');
		$this->db->join('jwb_users', 'jwb_favourites.user_id = jwb_users.id', 'left'); 
		$this->db->where('product_id', $product_id);
		$this->db->where_not_in("jwb_favourites.user_id",$user_id);
		$this->db->order_by("jwb_favourites.id", "DESC");
		$this->db->limit(1, 0);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	
	public function add_follow($following_id = "",$user_id = "") 
	{ 
		
		$result_insert = $this->db->insert('jwb_user_follow', array('follow_user_id' => $user_id,'following_user_id' => $following_id));
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get()->row_array();
		
		$count = $query['following_count']+ 1;
	
		$data_val = array(
		
				'following_count' => $count
				
                     );

		$this->db->where('id', $user_id);
		$result = $this->db->update('jwb_users', $data_val); 
		
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $following_id);
		$query = $this->db->get()->row_array();
		
		$count = $query['followed_count']+ 1;
	
		$data_val = array(
		
				'followed_count' => $count
				
                     );

		$this->db->where('id', $following_id);
		$result1 = $this->db->update('jwb_users', $data_val); 
		
		
		
		return $result_insert;
		
	}
	
	
	public function delete_follow($following_id = "",$user_id = "")
	{
		$where=array('follow_user_id' => $user_id,'following_user_id' => $following_id);
		$this->db->where($where);
		$this->db->delete('jwb_user_follow'); 
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get()->row_array();
		
		$count = $query['following_count']- 1;
	
		$data_val = array(
		
				'following_count' => $count
				
                     );

		$this->db->where('id', $user_id);
		$result = $this->db->update('jwb_users', $data_val);
		
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $following_id);
		$query = $this->db->get()->row_array();
		
		$count = $query['followed_count']- 1;
	
		$data_val = array(
		
				'followed_count' => $count
				
                     );

		$this->db->where('id', $following_id);
		$result1 = $this->db->update('jwb_users', $data_val); 
		
		return 1;
		
	}
	
	
	
	public function check_user_follow_exist($id = "")
	{		
		$user_id = $this->session->userdata('user_id');
			
		$where=array('follow_user_id' => $user_id,'following_user_id' => $id);
		$this->db->select('*');
		$this->db->from('jwb_user_follow');
		$this->db->where($where);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	
	
	
	public function get_user_details($user_id = "")
	{
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	
	
	public function get_followers_user_list($user_id = "")
	{
		
		$this->db->select('jwb_user_follow.*,jwb_users.*');
		$this->db->from('jwb_user_follow');
		$this->db->join('jwb_users', 'jwb_user_follow.follow_user_id = jwb_users.id', 'left'); 
		$this->db->where('follow_user_id',$user_id);
		$query = $this->db->get()->result_array();
		//print_r($query);exit;
		return $query;
		
	}
	
	
	
	public function get_following_user_list($user_id = "")
	{ //echo $user_id;exit;
		
		
		
		$this->db->select('jwb_user_follow.*,jwb_users.*');
		$this->db->from('jwb_user_follow');
		$this->db->join('jwb_users', 'jwb_user_follow.following_user_id = jwb_users.id', 'left'); 
		$this->db->where('following_user_id',$user_id);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	public function most_popular_product()
	{
		$this->db->select('*');
		$this->db->from('jwb_products');
		$this->db->order_by("favorites", "DESC");
		$this->db->limit(16,0);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	
	public function upcomming_auctions_product()
	{
		$val = "1";
		$this->db->select('*');
		$this->db->from('jwb_products');
		$this->db->where('upcoming_product',$val);
		//$this->db->order_by("favorites", "DESC");
		//$this->db->limit(16,0);
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	
   
   
    
}

?>
