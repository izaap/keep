<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");

class Products extends App_Controller {
    
    public $data = array();

    function __construct() {
        parent::__construct();

        $this->data['css']       = get_css('products');
        $this->data['js']        = get_js('products');

        $this->load->model('product_model');
    }
    
    public function index()
    {
        
        $this->layout->view("admin/product/list", $this->data);
       
    }

    function add($id=0){

        $this->form_validation->set_rules($this->_validation_rules());

        $this->data['form_data'] = array("id"=>"","product_name"=>"","description"=>"","image"=>"","upcoming_product" => "", "buylink" => "","price" => "");
        
        $edit_data = $this->product_model->get_where(array('id'=>$id))->row_array();

        if($edit_data)
            $this->data['form_data'] = $edit_data;

        if($this->form_validation->run()) {

            $ins_data = array();
            $ins_data['product_name']       = $this->input->post('product_name');
            $ins_data['description']        = $this->input->post('description');
            $ins_data['product_image']      = $this->input->post('product_image');
            $ins_data['upcoming_product']   = $this->input->post('upcoming_product');
            $ins_data['buylink']            = $this->input->post('buylink');
            $ins_data['price']              = $this->input->post('price');
            $ins_data['created_id']         = get_current_user_id();
            $ins_data['created_time']       = str2DBDT();

            if(!empty($id))
            {
                $ins_data['updated_id']     = get_current_user_id();
                $ins_data['updated_time']   = str2DBDT();

                $this->product_model->update(array('id'=>$id),$ins_data);
                $this->service_message->set_flash_message("record_update_success");  
            }
            else
            {
                $this->product_model->insert($ins_data);
                $this->service_message->set_flash_message("record_insert_success");
            }

                redirect('admin/products');
        }

        $this->layout->view("admin/product/add", $this->data);

    }

    public function _validation_rules()
    {

    $rules = array(array('field' => 'product_name', 'label' => 'Product Name', 'rules' => 'trim|required|xss_clean'),
                   array('field' => 'description', 'label' => 'Description', 'rules' => 'trim|required|xss_clean'),
                   array('field' => 'upcoming_product', 'label' => 'Upcoming product', 'rules' => 'trim|xss_clean'),
                   array('field' => 'buylink', 'label' => 'Buylink', 'rules' => 'trim|required|xss_clean'),
                   array('field' => 'price', 'label' => 'Price', 'rules' => 'trim|required|xss_clean|numeric|max_length[5]')
                  );

    return  $rules;
   } 
}

?>