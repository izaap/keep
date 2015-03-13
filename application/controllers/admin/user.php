<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

safe_include("controllers/app_controller.php");
class User extends App_controller {
    
    function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
	   if(is_logged_in() && $this->role == 1) {
	       $this->data['user_data'] = $this->session->userdata('admin_user_data');
           $this->data['css']       = get_css('admin_user');
           $this->data['js']        = get_js('admin_user');
	       $this->layout->view("admin/user/list",$this->data);
      
      }
      else
      {
        redirect('login');
      }

	}
    public function add($edit_id = "")
    {
        
        $edit_id = (isset($_POST['edit_id']) && !empty($_POST['edit_id']))?$_POST['edit_id']:"";
        
        $this->form_validation->set_rules($this->_validation_rules());
        
        if($this->form_validation->run()) {
            
            $this->ins_data['first_name']         =   $this->input->post('first_name');
            $this->ins_data['last_name']          =   $this->input->post('last_name');
            $this->ins_data['about']              =   $this->input->post('about');
            $this->ins_data['profile_name']       =   $this->input->post('profile_name');
            $this->ins_data['user_name']          =   $this->input->post('user_name');
            $this->ins_data['location']           =   $this->input->post('location');
            $this->ins_data['email']              =   $this->input->post('email');
            $this->ins_data['phone']              =   $this->input->post('phone');
            $this->ins_data['gender']             =   $this->input->post('gender');
            $this->ins_data['updated_date']       =   date("Y-m-d H:i:s");
            $this->ins_data['dob']                =   $this->input->post('dob');
            $this->ins_data['updated_id']         =   get_current_user_id();
            $this->ins_data['created_id']         =   get_current_user_id();
            $this->ins_data['role']               =   $this->input->post('role');
            
            
            
            if($this->input->post('password') != '') {
                
                $this->ins_data['password']           =   md5($this->input->post('password'));
            
            }
            
            if($edit_id) {
                
                $this->user_model->update(array('id' => $edit_id, $this->ins_data));
                $this->service_message->set_flash_message("record_update_success");  
            }
            else
            {
                
                $this->user_model->add($this->ins_data);
                $this->service_message->set_flash_message("record_insert_success");
            }
            
             redirect("admin/user");
        }
        
        if($edit_id) {
            $edit_data = $this->user_model->get_users($edit_id);
            if(!isset($edit_data[0])) {
                $this->service_message->set_flash_message("record_not_found_error");
                redirect("admin/user");  
            }
            $this->data['form_data'] = (array) $edit_data[0];
        }
        else if($_POST) {
            $this->data['form_data'] = $_POST;
            $this->data['form_data']['id'] = $edit_id != ''?$edit_id:'';
        }
        else
        {
            $this->data['form_data']=array("id"=>'','first_name'=>'',"last_name"=>'',"email"=>'',"phone" => '',"profile_name" => '', "role" => '','user_name' => '', 'password' => '', 'about' => '', 'location' => '','dob' => '');
        }
                
            $this->data['css']       = get_css('user_add');
            $this->data['js']        = get_js('user_add'); 
            $this->data['user_data'] = $this->session->userdata('admin_user_data');   
            //Get roles
            $this->data['roles']     = $this->role_model->get_roles();    
            $this->layout->view("admin/user/add", $this->data);
    }
    
   public function _validation_rules()
   {
    
    return $this->useradd_validation_rules = array(array('field' => 'first_name', 'label' => 'Firstname', 'rules' => 'trim|required|alpha|xss_clean|max_length[255]'),
                                                   array('field' => 'last_name', 'label' => 'Lastname', 'rules' => 'trim|required|alpha|xss_clean|max_length[255]'),
                                                   array('field' => 'profile_name', 'label' => 'Profilename', 'rules' => 'trim|required|alpha_numeric|xss_clean'),
                                                   array('field' => 'user_name', 'label' => 'Username', 'rules' => 'trim|required|alpha|xss_clean|callback_unique_username_check'),
                                                   array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|xss_clean|min_length[8]|max_length[20]'),
                                                   array('field' => 'location', 'label' => 'Location', 'rules' => 'trim|required|xss_clean'),
                                                   array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|xss_clean|valid_email|callback_unique_email_check'),
                                                   array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required|xss_clean|numeric|min_length[10]'),
                                                   array('field' => 'gender', 'label' => 'Gender', 'rules' => 'trim|required|xss_clean')
                                                  );
   } 
   
   public function unique_email_check($email)
   {
     if($email) {
         $userdata = $this->user_model->get_by_email($email);
         if(count($userdata)) {
            $this->form_validation->set_message('unique_email_check', 'Email Already Exists');
            return false;
         }
         return true;
     }
    
   }
   public function unique_username_check($username)
   {
     if($username) {
        $userdata = $this->user_model->get_by_loginid($username);
        if(count($userdata)) {
            $this->form_validation->set_message('unique_username_check', 'Username Already Exists');
            return false;
        }
        return true;
     }
   }
}

/* End of file user.php */
/* Location: ./application/controllers/User.php */