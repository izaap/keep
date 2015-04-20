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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   
   
    
}

?>
