<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Login extends App_Controller {
	
	
	protected $_login_validation_rules =    array (
                                                    array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|xss_clean'),
                                                    array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|xss_clean|min_length[4]|max_length[20]|alpha_dash')
                                                  );
                                                  
    function __construct()
    {
        parent::__construct();
         $this->load->library('form_validation');
        $this->load->model('userlogin_model');
    }

    public function index()
    {
        
        //$this->layout->view('frontend/home/home');
    }
    
    
    public function user_login()
    {
		$this->form_validation->set_rules($this->_login_validation_rules);
       
        if($this->form_validation->run())
        {
            $form = $this->input->post();
           

            $user_data = $this->userlogin_model->login($form['email'], $form['password']);
            
            if(!empty($user_data))
            { exit("in");
                //redirect("admin/dashboard");
            }
            else{
				
				exit("out");
			}
            
        }
		
		$this->layout->view('frontend/login');
	}
	
	
	
}
?>
