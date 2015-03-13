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
    public function add($edit_id = '')
    {
        $edit_id    =   (isset($edit_id) && ($edit_id != ''))?$edit_id:"";
        
        $this->form_validation->set_rules($this->form_validations());
        
        if($this->form_validation->run()) {
            $this->ins_data['name']              = $this->input->post('name');
            $this->ins_data['updated_date']      = date("Y-m-d H:i:s");
            
            if($edit_id) {
                $this->ins_data['updated_id']    = get_current_user_id();
                $this->role_model->update($edit_id, $this->ins_data);
                $this->service_message->set_flash_message("record_update_success");
            }
            else  
            {   
                $this->ins_data['created_id']    = get_current_user_id();
                $this->role_model->add($this->ins_data);
                $this->service_message->set_flash_message("record_add_success"); 
            }
            redirect("role");
        }
        
        if($edit_id != '') {
            $edit_data  =   $this->role_model->get_roles($edit_id);
            if(!isset($edit_data[0])) {
                $this->service_message->set_flash_message('record_not_found_error');
                redirect('admin/role');
            }
            $this->data['form_data']  = $edit_data;
        }
       else if($this->input->post()) {
            $this->data['form_data']            = $_POST;
            $this->data['form_data']['id']      = (isset($edit_id) && ($edit_id != ''))?$edit_id:"";
       } 
       else
       {
            $this->data['form_data']            =   array('id' => '', 'name' => '');
       }
       $this->layout->view("admin/role",$this->data);
    }
   public function form_validations()
   {
      return $this->role_validation_rules =  array(array('field' => 'name', 'label' => 'Role', 'rules' => 'trim|required|alpha|xss_clean'));
   } 
}
?>