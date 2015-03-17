<?php
class Role_Model extends CI_Model {
    
    private $table_name = 'jwb_roles';
    
    function __construct() {
        
        parent::__construct();
    }
    
   function get_roles()
   {
      $this->db->select('*');
      $this->db->from('jwb_roles');
      return $this->db->get()->result_array();
   } 
    
   public function add_role($data = "" )
   {
	   //print_r($data);exit;
	     return $this->db->insert('jwb_roles', array('name' => $data["role"]));
   }
   
   
   public function get_all_role()
   {
	   $this->db->select('*');
        $this->db->from('jwb_roles');
        return $this->db->get()->result_array();
   }
   
   
   public function edit_role($data = "")
   {
	   $data_val = array(
               'name' => $data['role']
                     );

		$this->db->where('id', $data['id']);
		$this->db->update('jwb_roles', $data_val); 
   }
   
   
   public function get_role_details($id = "")
   {
	  $this->db->select('*');
      $this->db->from('jwb_roles');
      $this->db->where('id', $id);
      $query = $this->db->get()->result_array();
      return $query;
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
}
?>
