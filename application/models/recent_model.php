<?php 
class Recent_Model extends CI_Model
{
 
   
   function __construct()
   {
     parent::__construct();
   }
   
   
  
	public function get_product_list_like($user_id = "")
	{
		
		$this->db->select('jwb_likes.*,jwb_products.*');
		$this->db->from('jwb_likes');
		$this->db->join('jwb_products', 'jwb_products.id = jwb_likes.product_id', 'left'); 
		$this->db->where('jwb_likes.user_id', $user_id);
		$this->db->order_by("jwb_products.id", "ASC");
		$this->db->where('jwb_likes.created_time BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND NOW()');
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
		$this->db->where('jwb_favourites.created_time BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND NOW()');
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
	
	
	
	public function check_like_unlike($product_id = "", $user_id = "")
	{
		
		$where=array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('*');
		$this->db->from('jwb_likes');
		$this->db->where($where);
		$query = $this->db->get()->num_rows();
		
		return $query;
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
	
	
	
	public function get_user_collection($user_id = "")
	{
		$where=array('user_id'=>$user_id);
		$this->db->select('*');
		$this->db->from('jwb_collections');
		$this->db->where($where);
		$query = $this->db->get()->result_array();
		
		return $query;	
		
	}
	
	
	public function get_all_recent_product($user_id = "")
	{
		$this->db->select('jwb_viewed_product.*,jwb_products.*');
		$this->db->from('jwb_viewed_product');
		$this->db->join('jwb_products', 'jwb_products.id = jwb_viewed_product.view_product_id', 'left'); 
		$this->db->where('jwb_viewed_product.view_user_id', $user_id);
		$this->db->order_by("jwb_products.id", "ASC");
		$this->db->where('jwb_viewed_product.view_created_time BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND NOW()');
		$query = $this->db->get()->result_array();
		return $query;
		
	}
	
	
	
	
	
	
	
	
	
	
   
   
    
}

?>
