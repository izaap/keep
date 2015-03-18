<?php

class Message_Model extends App_Model {

    protected $_table = 'jwb_messages';
    
    function __construct()
    {
        parent::__construct();

    }
   
  function listing()
  {
        $this->_fields = "*";
        
        //from
        $this->db->from($this->_table);
        
        //joins
        
        
        //where
      foreach ($this->criteria as $key => $value){

      if( !is_array($value) && strcmp($value, '') === 0 )
          continue;
        
        switch ($key)
        {
          case 'name':
              $this->db->like("jwb_messages.name",$value);
              break;
          case 'description':
             $this->db->like("jwb_messages.message",$value);
             break;
          case 'price':
              $this->db->like("jwb_messages.type",$value);
              break;
        }        
      }
        
        
        return parent::listing();
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
