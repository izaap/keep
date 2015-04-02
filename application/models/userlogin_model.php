<?php 
class Userlogin_Model extends CI_Model
{
  
   
   function __construct()
   {
     parent::__construct();
   }
   public function login($email, $password)
   {
	   
		$this->db->select('*');
        $this->db->from('jwb_users');
        $this->db->where('email',$email);
        //$this->db->where('password',$password);
        return $this->db->get()->result_array();
        
        
        
	   
	   
     
   }  
   
   
   public function logout()
   {
        $this->session->sess_destroy();
   }
    
}

?>
