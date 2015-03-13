<?php
class Role_Model extends CI_Model {
    
    private $table_name = 'jwb_roles';
    
    function __construct() {
        
        parent::__construct();
    }
    public function add($data)
    {
         return $this->db->insert($this->table_name,$data);
    }
    public function update($id, $data)
    {
        return $this->db->update($this->table_name, $data, array("id" => $id));
    }
    public function delete($id)
    {
        return $this->db->delete($this->table_name, array("id" => $id));
    }
    public function get_roles()
    {
        $this->db->select("id,name");
        $this->db->from($this->table_name);
        $result = $this->db->get();
        return $result->result_array(); 
    }
}
?>