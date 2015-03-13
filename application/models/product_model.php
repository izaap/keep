<?php

safe_include("libraries/models/App_model.php");

class Product_Model extends App_Model {

    protected $_table = 'jwb_products';
    
    function __construct()
    {
        parent::__construct();

    }
    
    
}
?>