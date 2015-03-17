<?php
safe_include("models/app_model.php");
class User_Model extends App_model {
    private $table_name = 'jwb_users';
    
    function __construct()
    {
        parent::__construct();
    }

    function listing()
    {
        $this->_fields = " *,IF(is_blocked='1','Inactive','Active') as status";
        
        //from
        $this->db->from($this->table_name);
        
        //joins
        
        
        //where
        
        
        
        return parent::listing();
    }
    
    public function add($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    public function update($id, $data)
    {
        return $this->db->update($this->table_name,$data, array("id" => $id));
    }
    public function delete($id)
    {
        return $this->db->delete($this->table_name, array("id" => $id));
    }
    public function get_by_email($email)
    {
        $this->db->select();
        $this->db->from($this->table_name);
        $this->db->where('email', $email);
        $result = $this->db->get();
        return $result->row_array();
    }
    public function get_by_loginid($login_id)
    {
        $this->db->select();
        $this->db->from($this->table_name);
        $this->db->where('user_name', $login_id);
        $result = $this->db->get();
        return $result->row_array();
    }
    public function get_users($id = 0)
    {
        $this->db->select();
        $this->db->from($this->table_name);
        if($id != 0) {
            $this->db->where('id', $id);
        }
        $result = $this->db->get();
        return $result;
    }
}
?>