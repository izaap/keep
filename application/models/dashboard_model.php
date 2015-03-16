<?php

safe_include("libraries/models/App_model.php");

class Dashboard_Model extends App_Model {

    protected $_table = 'jwb_products';
    
    function __construct()
    {
        parent::__construct();

    }
    
    function get_products_report(){

    	$query ="SELECT * FROM
				(SELECT p.product_name,p.favorites as count,'favorites' as type FROM jwb_products AS p ORDER BY p.favorites DESC LIMIT 10) AS favorites

				UNION 

				SELECT * FROM
				(SELECT p.product_name,p.likes as count,'likes' as type FROM jwb_products AS p ORDER BY p.likes DESC LIMIT 10) AS likes

				UNION

				SELECT * FROM
				(SELECT p.product_name,p.followed as count,'followed' as type FROM jwb_products AS p ORDER BY p.followed DESC LIMIT 10) AS followed

				UNION

				SELECT * FROM
				(SELECT p.product_name,p.buycount as count,'buycount' as type FROM jwb_products AS p ORDER BY p.buycount DESC LIMIT 10) AS buycount

				ORDER BY count DESC";

    	
        $result = $this->db->query($query)->result_array();
        
        return $result;
    }
}
?>