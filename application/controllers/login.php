<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Login extends App_Controller {
	
	
	protected $_login_validation_rules =    array (
                                                    array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|xss_clean'),
                                                    array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|xss_clean|min_length[4]|max_length[20]|alpha_dash')
                                                  );
                                                  
   protected $_forgot_password_validation_rules = array(
													array('field' => 'email',  'label' => 'Email', 'rules' => 'trim|required|xss_clean|valid_email')
													);
                                                  
    
    
    protected $_signup_validation_rules = array(
													array('field' => 'first_name', 'label' => 'Firstname', 'rules' => 'trim|required|alpha|max_length[255]'),
													array('field' => 'last_name', 'label' => 'Lastname', 'rules' => 'trim|required|alpha|max_length[255]'),
													array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|xss_clean'),
													array('field' => 'user_name', 'label' => 'Username', 'rules' => 'trim|required|alpha_numeric'),
													array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required|numeric|min_length[10]'),
													array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|xss_clean|min_length[4]|max_length[20]|alpha_dash'),
													array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'trim|required|xss_clean|min_length[4]|max_length[20]|alpha_dash | matches[Password]'),
													array('field' => 'gender', 'label' => 'Gender', 'rules' => 'trim|required'),
													array('field' => 'month', 'label' => 'Month', 'rules' => 'trim|required'),
													array('field' => 'day', 'label' => 'Day', 'rules' => 'trim|required'),
													array('field' => 'year', 'label' => 'Year', 'rules' => 'trim|required')
													);
													
	protected $_settings_validation_rules = array(
													array('field' => 'first_name', 'label' => 'Firstname', 'rules' => 'trim|required|alpha|max_length[255]'),
													array('field' => 'last_name', 'label' => 'Lastname', 'rules' => 'trim|required|alpha|max_length[255]'),
													array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|xss_clean'),
													array('field' => 'user_name', 'label' => 'Username', 'rules' => 'trim|required|alpha_numeric'),
													array('field' => 'profile_name', 'label' => 'Profile name', 'rules' => 'trim|required|alpha_numeric'),
													array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required|numeric|min_length[10]'),
													array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|xss_clean|min_length[4]|max_length[20]|alpha_dash'),
													array('field' => 'about', 'label' => 'About', 'rules' => 'trim|required|max_length[255]'),
													array('field' => 'location', 'label' => 'Location', 'rules' => 'trim|required|alpha|max_length[255]')
													
													);
                                                  
    
    
    function __construct()
    {
        parent::__construct();
        
        $this->layout->add_javascripts(array('custom'));
        $this->load->library('form_validation');
        $this->load->model('userlogin_model');
        //$this->load->library('upload_manager');

         $config['upload_path'] = '../assets/frontend/images/users';
	     $config['allowed_types'] = '*';
	     $config['max_size'] = '0';

	     $this->form_validation->set_rules('user_image', 'Image', 'callback_user_setting');
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
            //print_r($user_data);exit;
            
            if($user_data == 1)
            { 
				$this->service_message->set_flash_message("login successfully");
                redirect("login/user_profile");
            }
            else{
				
				redirect("login/user_login");
				$this->service_message->set_flash_message("Email and password miss match");
			}
            
        }
		
		$this->layout->view('frontend/login');
	}
	
	
	
	public function forgot_password()
	{
		
		$this->form_validation->set_rules($this->_forgot_password_validation_rules);

        if ($this->form_validation->run()) 
        { 
            $email = $this->input->post('email');
            //get user details by given email-id.
            $user = $this->userlogin_model->forgot_password($email);

            if (count($user)) 
            {
                $str = 'Your Request has been processed.Please click the following link to reset password. ';
                $this->load->library('email_manager');
                $email_details = get_settings($this->sales_channel_id, 'general');

                if($email_details)
                    $this->email_manager->send_email($email, '', $email_details['email_id'], $email_details['from_name'], "{$email_details['site_name']} - Password Reset Link", $str);  
            
                $this->service_message->set_flash_message('Success');

                redirect($this->router->fetch_class());
            }

            $this->service_message->set_message('Error in Process');
        }
		
		
		$this->layout->view('frontend/forgot_password');
	}
	
	
	public function signup()
	{
		
		$this->form_validation->set_rules($this->_signup_validation_rules);
		
		if ($this->form_validation->run()) 
        { 
			$form = $this->input->post();
			//print_r($form);exit;
			$user_data = $this->userlogin_model->signup($form);
			if($user_data == 1){
				
				 $this->service_message->set_message('Sign up successfully');
				 redirect("home/index");
				 
			} else if($user_data == 0) { 
				
				 $this->service_message->set_message('User already registered');
				 redirect("home/index");
			}else {
				 $this->service_message->set_message('Error in process');
			}
			
			
			
		} 
		
		$this->layout->view('frontend/signup');
	}
	
	
	public function user_profile()
	{
		
		if(!$this->uri->segment(3) == ""){
		$user_id  = $this->uri->segment(3);
		
		}else { 
			
			$user_id = $this->session->userdata('user_id');
		}
		
		$this->collection_list = $this->userlogin_model->get_user_collection_list($user_id); 
		
		$this->layout->view('frontend/user_profile',$this->collection_list);
	
	}
	
	public function logout()
	{
	   
		$this->session->sess_destroy();
	
		$this->session->sess_create();
		$this->service_message->set_flash_message('logout_success');
	
		redirect();
	}
	
	
	public function user_settings()
	{
		//$form = $this->input->post();
			//print_r($_FILES['user_image']['name']);exit;
		
		$user_id = $this->session->userdata('user_id');
		
		$this->form_validation->set_rules($this->_settings_validation_rules);
		
		if ($this->form_validation->run()) 
        { 
			  $form = $this->input->post();


			if(!empty($_FILES['user_image']['tmp_name'])){
			  $upload_data = $this->do_upload();
              $filename = $upload_data['upload_data']['file_name'];
			}else{
				$filename ="";
			}
			//print_r($_FILES);exit();
			$user_detail = $this->userlogin_model->update_settings($form,$user_id,$filename);
			
			//print_r($filename);exit;
			//print_r($user_detail);exit();
			if($user_detail == 1){				
				$this->service_message->set_flash_message('Update successfully');		
				redirect();		
				
			}else { 				
				$this->service_message->set_flash_message('Error pls try again');
				
			}
			redirect('frontend/user_settings');
			
		}
		
		
		$this->user_data['user'] = $this->userlogin_model->get_user_data($user_id);
		
		$this->user_data['jewelry'] = $this->userlogin_model->get_jewelry_type();
	
		
		$this->layout->view('frontend/user_settings',$this->user_data);
	}
	

	function do_upload()
	{
		$config['upload_path'] = './assets/frontend/images/users';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		//echo $config['upload_path']; exit;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('user_image'))
		{
			$error = array('error' => $this->upload->display_errors());

			return $error;
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $data;
			//$this->load->view('upload_success', $data);
		}
	}
	
	
	public function list_collection_product() 
	{
		
		//$user_id  = $this->uri->segment(3);
		$collection_id  = $this->uri->segment(4);
		
		if(!$this->uri->segment(3) == ""){
		$user_id  = $this->uri->segment(3);
		
		}else { 
			
			$user_id = $this->session->userdata('user_id');
		}
		//echo $user_id;exit;
		$this->product_list['list'] = $this->userlogin_model->product_list_collection($collection_id,$user_id); 
		
		$this->product_list['collection_detail'] = $this->userlogin_model->product_list_collection_data($collection_id); 
		
		$this->layout->view('frontend/product_list_collection',$this->product_list);
	}
	
	
	public function search_result()
	{
		
		$search_text = $this->input->post('search');
		//echo $search_text;exit;
		
		$this->product_list = $this->userlogin_model->search_product($search_text); 
		
		$this->layout->view('frontend/search_result',$this->product_list);
		
		
	}
	
	
	

	
	
	
	
}
?>
