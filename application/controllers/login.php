<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

safe_include("controllers/app_controller.php");
class Login extends App_Controller 
{
    
    function __construct()
    {
        parent::__construct();    
        
        $this->load->library('form_validation');
        $this->load->model('login_model');
        
    }  
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
       if(is_logged_in() && $this->role == 1){
            redirect("admin/dashboard");
        } 
        
        $this->form_validation->set_rules($this->_login_validation_rules);
       
        if($this->form_validation->run()){
            if($this->login_model->login($this->input->post('email'), $this->input->post('password'))){
                if($this->role == 1):
                   redirect("admin/dashboard");
                else:
                   redirect("home");
                endif;
            }
            
        }
        $this->data['css'] = get_css('login');
        $this->data['js']  = get_js('login');
        
        $this->load->view("login/index",$this->data);
        
    }
    
    public function logout()
	{
	   
		$this->login_model->logout();
	
		$this->session->sess_create();
		$this->service_message->set_flash_message('logout_success');
	
		redirect('login');
	}
    
}


?>