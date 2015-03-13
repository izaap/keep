<?php if(!defined("BASEPATH")) exit("No direct script access allowed");
safe_include("controllers/app_controller.php");
class Dashboard extends App_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        if(is_logged_in() && $this->role == 1) {
            $this->data['user_data'] = $this->session->userdata('admin_user_data');
            $this->service_message->set_flash_message('login_success','welcome admin'); 
            $this->data['css']       = get_css('admin_dashboard');
            $this->data['js']        = get_js('admin_dashboard');
            $this->layout->view('admin/home',$this->data);
        }
        else
        {
            redirect('login');
        }
    }
}

?>