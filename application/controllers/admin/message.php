<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

safe_include("controllers/app_controller.php");
class Message extends App_controller {
    
    function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
      
	}
	
	
	
	public function add_message()
	{
		
		
		 $this->form_validation->set_rules($this->_validation_rules_message());
        
        if($this->form_validation->run()) {
            
            $this->ins_data['name']         =   $this->input->post('name');
            $this->ins_data['message']          =   $this->input->post('message');
            $this->ins_data['type']              =   $this->input->post('type');
            
			//print_r($this->ins_data);exit;
			
			$this->load->model('admin/message_model');
            $this->message_model->add_message($this->ins_data);
            $this->service_message->set_flash_message("record_insert_success");
            
			redirect("admin/message/message_management");
        }
		
		
		
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/message/add_message");
		
	}
	
	
	public function _validation_rules_message()
	{
		return $this->message_add_validation_rules = array(array('field' => 'name', 'label' => 'name', 'rules' => 'trim|required|alpha|xss_clean|max_length[255]'),
                                                   array('field' => 'message', 'label' => 'message', 'rules' => 'trim|required|xss_clean'),
                                                   array('field' => 'type', 'label' => 'type', 'rules' => 'trim|required|xss_clean')
                                                  );
		
	}
	
	
	public function message_management()
	{
		//$this->load->library('pagination');
		
		$this->load->model('admin/message_model');
        $this->result = $this->message_model->get_all_message();
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/message/manage_message",$this->result);
		
	}
	
	
	public function edit_message($message_id = "")
	{
		$this->form_validation->set_rules($this->_validation_rules_message());
		if($this->form_validation->run()) { 
            
            $this->ins_data['name']         =   $this->input->post('name');
            $this->ins_data['message']          =   $this->input->post('message');
            $this->ins_data['type']              =   $this->input->post('type');
            $this->ins_data['id']              =   $this->input->post('id');
			
			$this->load->model('admin/message_model');
            $this->message_model->edit_message($this->ins_data);
            $this->service_message->set_flash_message("record_insert_success");
            
			redirect("admin/message/message_management");
        }
		
		$this->load->model('admin/message_model');
        $this->result = $this->message_model->get_message_details($message_id);
		
		$this->data['css']       = get_css('user_add');
        $this->data['js']        = get_js('user_add'); 
		$this->layout->view("admin/message/edit_message",$this->result);
	}
	
	
	public function delete_message($message_id = "")
	{
			$this->load->model('admin/message_model');
			$result =  $this->message_model->delete_message($message_id);
            $this->service_message->set_flash_message("record_insert_success");
            if($result == 1){
				redirect("admin/message/message_management");
			}
	}
	
	
	
	
	
	
	
	
	
    
}


