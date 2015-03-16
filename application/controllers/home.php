<?php if(!defined("BASEPATH")) exit("No direct script access allowed");

safe_include("controllers/app_controller.php");
class Home extends App_Controller {
    function __construct(){
        parent::__construct();
    }
    public function index()
    {
        die('Home');
    }
}
?>