<?php 
class Userlogin_Model extends CI_Model
{
  
   
   function __construct()
   {
     parent::__construct();
   }
   /*public function login($email, $password)
   {
        
		$where=array('email'=>$email,'password'=>$password);
		$this->db->select('*');
		$this->db->where($where);
		$result=$this->db->get('jwb_users')->row_array();
		return $result;
	   
     
   }  */
   
   
   public function login($email, $password)
   {
     $this->load->model('user_model'); 
     
     $user = $this->user_model->get_by_email($email);
     
         if(!count($user)){
            
            $user = $this->user_model->get_by_loginid($email);
         }
         
       $pass = md5($password);
      
      if(!empty($user)&& $user['password'] == $pass)
      {
       
        $this->session->set_userdata('user_detail', $user);
        
        $this->session->set_userdata(array(
        
                            'user_id'       => $user['id'],
                            'first_name'      => $user['first_name'],
                            'last_name'       => $user['last_name'],
                            'user_name'          => $user['user_name'],
                            'email'        => $user['email'],
                            'phone'        => $user['phone'],
                            'location'        => $user['location'],
                            'about'        => $user['about']
                            
                    ));
                    
        
        
        return true;
      }
      
      return false;
   }
   
   
   public function forgot_password($email = "")
	{
		$email = trim($email);
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('email', $email);
		$result = $this->db->get()->row_array();
	
		if(count($result) > 0){
			$password = random_string('alnum', 10);
			$userid = $result['id'];
			
			$results['name']=$result['user_name'];
			$results['email']=$result['email'];
			$results['password']=$password;
			
			$data_val = array(
               'password' => md5($password)
                     );

		$this->db->where('id', $userid);
		$result1 = $this->db->update('jwb_users', $data_val); 
			
			if($result1){
					return $results;	
				}
		}
		else{
			return 0;
		}
	}
	
	
	public function signup($form ="")
	{
		$email = $form['email'];
		
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('email', $email);
		$query = $this->db->get()->num_rows();
		
		if($query == 0 ){
		$result = $this->db->insert('jwb_users', array('first_name' => $form["first_name"],'last_name' => $form["last_name"],'user_name' => $form["user_name"],'email' => $form["email"],'password' => md5($form["first_name"]),'phone' => $form["phone"]));
		return 1;
	}else {
		return 0;
	}
		
		
	}
	
	
	public function get_user_data($user_id = "")
	{
		$this->db->select('*');
		$this->db->from('jwb_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get()->row_array();
		return $query;
	}
   
   
    
}

?>
