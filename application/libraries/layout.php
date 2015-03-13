<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Layout {

	protected $CI;

	function __construct()
    {
        $this->CI =& get_instance();
    }

    public function view($file_name)
    {
    	//load header
    	$this->CI->load->view('admin/_partials/header.php', $this->CI->data);
        
        //load left menu
        $this->CI->load->view('admin/_partials/left_menu',$this->CI->data);

    	//load page content
    	$this->CI->load->view($file_name, $this->CI->data);

    	//load footer
    	$this->CI->load->view('admin/_partials/footer.php', $this->CI->data);

    }
    public function user_view($file_name)
    {
        //load header
        $this->CI->load->view('_partials/header.php', $this->CI->data);
        
        //load page content
    	$this->CI->load->view($file_name, $this->CI->data);
        
        //load footer
        $this->CI->load->view('_partials/footer.php', $this->CI->data);
    }
}

/* End of file Layout.php */