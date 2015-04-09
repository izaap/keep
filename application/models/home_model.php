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
	   
 
   
   
    
}

?>
