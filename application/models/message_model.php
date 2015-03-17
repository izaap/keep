<?php
class Message_Model extends CI_Model {
    
    //private $table_name = 'jwb_roles';
    
    function __construct() {
        
        parent::__construct();
    }
   
   
   public function add_message($data = "")
   {
	   //echo "in";exit;
	   return $this->db->insert('messages', array('name' => $data["name"],'message' => $data["message"],'type' => $data["type"],'users' => $data["users"]));
	   
   }
   
   
   public function get_all_message()
   {
		$this->db->select('*');
        $this->db->from('messages');
        return $this->db->get()->result_array();
   }
   
   
   public function get_message_details($id = "")
   {
	  $this->db->select('*');
      $this->db->from('messages');
      $this->db->where('id', $id);
      $query = $this->db->get()->result_array();
      return $query;
   }
   
   
    public function edit_message($data = "")
   {
	   	$data_val = array(
               'name' => $data['name'],
               'message' => $data['message'],
               'type' => $data['type'],
               'users' => $data['users']
            );

		$this->db->where('id', $data['id']);
		$this->db->update('messages', $data_val); 

	   
   }
   
   
   public function delete_message($id= "")
   {
	  $this->db->delete('messages', array('id' => $id)); 
	  return 1;
	   
   }
   
   public function auto_complete_result($result = "")
   {
	  $this->db->select('*');
      $this->db->from('jwb_users');
      $this->db->like('user_name', $result);
      $query = $this->db->get()->result_array();
      return $query;
   }
   
   
   public function get_single_message_details($ex = "")
   { 
	   //print_r($ex);exit;

	  $this->db->select('*');
      $this->db->from('jwb_users');
      $this->db->where_in('id',$ex);
      $query = $this->db->get()->result_array();
      return $query;
      
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
}
?>