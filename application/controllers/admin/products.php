<?php if(!defined("BASEPATH")) exit("No direct script access allowed");
safe_include("controllers/app_controller.php");

class Products extends App_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        if(is_logged_in() && $this->role == 1) {
            $this->data['user_data'] = $this->session->userdata('admin_user_data');
            $this->data['css']       = get_css('products');
            $this->data['js']        = get_js('products');
            $this->layout->view("admin/products", $this->data);
        }
        else
        {
            redirect('login');
        }
    }
}

?>