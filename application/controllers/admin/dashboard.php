<?php if(!defined("BASEPATH")) exit("No direct script access allowed");
safe_include("controllers/app_controller.php");
class Dashboard extends App_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['user_data'] = $this->session->userdata('user_data');
        $this->service_message->set_flash_message('login_success','welcome admin'); 
        $this->layout->view('admin/home');
    }
}

?>