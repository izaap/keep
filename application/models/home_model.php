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
   
   
    
}

?>
