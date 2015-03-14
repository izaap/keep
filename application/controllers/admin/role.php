<?php if(!defined("BASEPATH")) exit('No direct script access allowed');
safe_include('controllers/app_controller.php');

class Role extends App_Controller {
    
    function __construct() {
        parent::__construct();
    }
    public function index()
    {
        if(is_logged_in()) {
            $this->data['css']  = get_css('');
            $this->data['js']   = get_js('');
            $this->layout->view("admin/role/list", $this->data);
        } 
        else
        {
            redirect("login");
        }
        
    }
    
    
    public function add_role()
    {
		 $this->form_validation->set_rules($this->_validation_rules_message());
        
        if($this->form_validation->run()) {
            
            $this->ins_data['role']         =   $this->input->post('role');
            
			//print_r($this->ins_data);exit;
			
			$this->load->model('admin/role_model');
            $this->role_model->add_role($this->ins_data);
            $this->service_message->set_flash_message("record_insert_success");
            
			redirect("admin/role/manage_role");
        }
		
		
		
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/role/add");
		
	}

	
	public function _validation_rules_message()
	{
		return $this->message_add_validation_rules = array(array('field' => 'role', 'label' => 'role', 'rules' => 'trim|required|xss_clean|max_length[255]'));
		
	}
	
    
    
    public function manage_role()
    {
		$this->load->model('admin/role_model');
        $this->result = $this->role_model->get_all_role();
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/role/manage_role",$this->result);
	}
	
	
	public function edit_role($id = "")
	{
		
		$this->form_validation->set_rules($this->_validation_rules_message());
		if($this->form_validation->run()) { 
            
            $this->ins_data['role']         =   $this->input->post('role');
            $this->ins_data['id']              =   $this->input->post('id');
			
			$this->load->model('admin/role_model');
            $this->role_model->edit_role($this->ins_data);
            $this->service_message->set_flash_message("record_insert_success");
            
			redirect("admin/role/manage_role");
        }
		
		$this->load->model('admin/role_model');
        $this->result = $this->role_model->get_role_details($id);
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/role/edit_role",$this->result);
	}
    
    
   
}
?>
