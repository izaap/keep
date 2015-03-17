<?php

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

    function get_user_report($where){

    	if(!is_array($where) || empty($where))
    		return FALSE;

    	$query ="SELECT * FROM
				(SELECT count(id) as count,'today' as type FROM jwb_users WHERE created_time >='{$where['today']['start']}' AND  created_time <='{$where['today']['end']}') AS today

				UNION 

				SELECT * FROM
				(SELECT count(id) as count,'lastweek' as type FROM jwb_users WHERE created_time >='{$where['lastweek']['start']}' AND  created_time <='{$where['lastweek']['end']}') AS lastweek

				UNION

				SELECT * FROM
				(SELECT count(id) as count,'lastmonth' as type FROM jwb_users WHERE created_time >='{$where['lastmonth']['start']}' AND  created_time <='{$where['lastmonth']['end']}') AS lastmonth

				UNION

				SELECT * FROM
				(SELECT count(id) as count,'lastyear' as type FROM jwb_users WHERE created_time >='{$where['lastyear']['start']}' AND  created_time <='{$where['lastyear']['end']}') AS lastyear

				";

		$result = $this->db->query($query)->result_array();
        
        return $result;		

    }
}
?>