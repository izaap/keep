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
		//print_r($_POST);exit;
		
		 $this->form_validation->set_rules($this->_validation_rules_message());
        
        if($this->form_validation->run()) {
            
            $this->ins_data['name']         =   $this->input->post('name');
            $this->ins_data['message']          =   $this->input->post('message');
            $this->ins_data['type']              =   $this->input->post('type');
            $this->ins_data['users']              =   $this->input->post('users');

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
            $this->ins_data['users']              =   $this->input->post('users');
			
			$this->load->model('admin/message_model');
            $this->message_model->edit_message($this->ins_data);
            $this->service_message->set_flash_message("record_insert_success");
            
			redirect("admin/message/message_management");
        }
		
		$this->load->model('admin/message_model');
        $this->result["val"] = $this->message_model->get_message_details($message_id);
        
          foreach ($this->result["val"] as $r){ 
			  
			 $ex = explode(',',$r["users"]); 
		  }
		  $this->ex_val = $this->message_model->get_single_message_details($ex);
		  
		foreach($this->ex_val as $s){
			
			$response[] = array( "id" => $s["id"], "name" => $s["user_name"]);
			
		}
		 $this->result["exist_value"] = json_encode($response);
		  //$val_response["prePopulate"] = $response;
		  //$this->result["exist_value"] = json_encode($val_response);
		  
		  //echo "{ prePopulate: ".$this->result["exist_value"]."}";exit;
		  
		  
		
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
	
	
	public function auto_complete()
	{
		//echo $val;exit;
		$val  = $this->input->post('search_key');
		
		$this->load->model('admin/message_model');
		$result =  $this->message_model->auto_complete_result($val);
		
		foreach($result as $search){
				$response[] = array( "id" => $search["id"], "name" => $search["user_name"]);
			}
			echo json_encode($response);
			exit;
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
    
}


