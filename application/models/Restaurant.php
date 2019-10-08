<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Restaurant extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function queryParameters($params=array())
	{
		// filter by merchant status
	    if(isset($params['status']) && isset($params['status'])){
			$this->db->where(array('restaurants.status'=>$params['status']));
	    }

	    // filter by states id
	    if(isset($params['statesid']) && isset($params['statesid'])){
			$this->db->where(array('states.id'=>$params['statesid']));
	    }

	    // filter by city id
	    if(isset($params['Dcityid']) && isset($params['Dcityid'])){
			$this->db->where(array('state_cities.id'=>$params['Dcityid']));
	    }

	    // filter by merchant perchargestatus
	    if(isset($params['perchargestatus']) && isset($params['perchargestatus'])){
			$this->db->where(array('restaurants.perchargestatus'=>$params['perchargestatus']));
	    }

	    // filter by orderlistdetails status
	    if(isset($params['orderlistdetailsstatus']) && isset($params['orderlistdetailsstatusorderlistdetails'])){
			$this->db->where(array('orderlistdetails.status'=>$params['orderlistdetailsstatus']));
	    }

	    // filter by Comment status
	    if(isset($params['commentstatus']) && isset($params['commentstatus'])){
			$this->db->where(array('comments.status'=>$params['commentstatus']));
	    }

	    // filter by merchant Type
	    if(isset($params['merchanttype']) && isset($params['merchanttype'])){
			$this->db->where(array('restaurants.merchanttype'=>$params['merchanttype']));
	    }
		
	
		// filter by User name; this would perform a general search like filter
		if(isset($params['username']) && isset($params['username'])){
			$this->db->where("(users.firstname LIKE'%$params[username]%' OR users.lastname LIKE'%$params[username]%')");
		}

		// filter by Company name name; this would perform a general search like filter
		if(isset($params['companyname']) && isset($params['companyname'])){
			$this->db->where("(restaurants.companyname LIKE'%$params[companyname]%' OR restaurants.phone LIKE'%$params[companyname]%' OR restaurants.email LIKE'%$params[companyname]%')");
		}

		// filter by Company Address name; this would perform a general search like filter
		if(isset($params['companyaddress']) && isset($params['companyaddress'])){
			$this->db->where("(restaurants.address LIKE'%$params[companyaddress]%' OR state_cities.cityname LIKE'%$params[companyaddress]%' OR states.statename LIKE'%$params[companyaddress]%')");
		}


		// filter by merchant id
        if(isset($params['cityid']) && isset($params['cityid'])){
			$this->db->where(array('restaurants.cityid'=>$params['cityid']));
        }
		
		// filter by merchant stateid
		if(isset($params['stateid']) && isset($params['stateid'])){
			$this->db->where(array('restaurants.stateid'=>$params['stateid']));
		}
	
		// filter by merchant creation date
		if(isset($params['createdat']) && isset($params['createdat']))
		{
			/*$t_date = explode("-", $params['createdat']);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array('restaurants.createdat >='=>$startdate, 'restaurants.createdat <='=>$enddate.' 23:59:59' )); */
			$this->db->like('restaurants.createdat ',$params['createdat']);
		}

		// filter by merchant orderlistdetails creation date
		if(isset($params['orderlistdetails_startdate']) && isset($params['orderlistdetails_enddate']))
		{
			$t_date = explode("-", $params['orderlistdetails_startdate']);
			$e_date = explode("-", $params['orderlistdetails_enddate']);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($e_date[0]));
			$this->db->where(array('DATE(orderlistdetails.createdat) >='=>$params['orderlistdetails_startdate'], 'DATE(orderlistdetails.createdat) <='=>$params['orderlistdetails_enddate'] ));
		}
	}
	
	function getAll($param=array(), $limit_start)
	{
		$this->db->select('restaurants.*, users.userroleid,users.firstname as userfirstname,users.lastname as userlastname,states.statename,state_cities.cityname');
		$this->db->from('restaurants');
		$this->db->join('users', 'restaurants.usersid = users.id', "left");
		$this->db->join('state_cities', 'restaurants.cityid = state_cities.id', "left");
		$this->db->join('states', 'restaurants.stateid = states.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0));
		
		$this->db->limit(25, $limit_start);
		$this->db->order_by("restaurants.createdat", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get count of all restaurants
	function getAllCount($param=array())
	{
		$this->db->select('*');
		$this->db->from('restaurants');
		$this->db->join('users', 'restaurants.usersid = users.id', "left");
		$this->db->join('state_cities', 'restaurants.cityid = state_cities.id', "left");
		$this->db->join('states', 'restaurants.stateid = states.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function findMerchant($searchword)
	{
		$this->db->select('*');
		$this->db->from('restaurants');
		$this->db->where("(restaurants.companyname = '$searchword' OR restaurants.id='$searchword' OR restaurants.email = '$searchword' OR restaurants.phone = '$searchword')");
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0));
	
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
	
	// Get a list of all merchants for the purpose of using it in a drop down menu
	function listAllMerchants($param=array())
	{
		$this->db->select('restaurants.id, restaurants.companyname');
		$this->db->from('restaurants');
	
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0));
		
		$this->db->order_by("restaurants.companyname", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	//get comment 
	function getAllComment($param=array(), $limit_start)
	{
		$this->db->select('comments.*,accounts.firstname ,accounts.lastname,orderlistdetails.productname ,orderlistdetails.productid , orderlistdetails.product_fashionid, restaurants.companyname,restaurants.merchanttype');
		$this->db->from('comments');
		$this->db->join('accounts', 'comments.accountid = accounts.id', "left");
		$this->db->join('orderlistdetails', 'comments.orderlistdetailsid = orderlistdetails.id', "left");
		$this->db->join('restaurants', 'restaurants.id = orderlistdetails.restaurantid', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('comments.isdeleted'=>0));
		
		$this->db->limit(25, $limit_start);
		$this->db->order_by("comments.createdat", "DESC");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get count of all restaurants
	function getAllCommentCount($param=array())
	{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->join('accounts', 'comments.accountid = accounts.id', "left");
		$this->db->join('orderlistdetails', 'comments.orderlistdetailsid = orderlistdetails.id', "left");
		$this->db->join('restaurants', 'restaurants.id = orderlistdetails.restaurantid', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('comments.isdeleted'=>0));
		
		$total = $this->db->count_all_results();
		return $total;
	}

	function getBilling($param=array(), $limit_start)
	{
		$this->db->select('restaurants.*, users.userroleid,users.firstname as userfirstname,users.lastname as userlastname,states.statename,state_cities.cityname,orderstatus.orderstatus_desc,
			orderlistdetails.createdat as billingcreatedat ,SUM(orderlistdetails.price) as totalsales');
		$this->db->from('restaurants');
		$this->db->join('users', 'restaurants.usersid = users.id', "left");
		$this->db->join('state_cities', 'restaurants.cityid = state_cities.id', "left");
		$this->db->join('states', 'restaurants.stateid = states.id', "left");
		$this->db->join( 'orderlistdetails', " orderlistdetails.restaurantid = restaurants.id " );
        $this->db->join( "orders", " orders.id = orderlistdetails.orderid " );
        $this->db->join( 'orderstatus', " orderstatus.id = orderlistdetails.status" );
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0,'restaurants.perchargestatus '=>1,'orderlistdetails.status '=>4));
		
		$this->db->limit(25, $limit_start);
		$this->db->order_by(" restaurants.companyname", 'ASC');
		$this->db->group_by(" restaurants.id ");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}

	function getBillingCount($param=array())
	{
		$this->db->select('restaurants.*');
		$this->db->from('restaurants');
		$this->db->join('users', 'restaurants.usersid = users.id', "left");
		$this->db->join('state_cities', 'restaurants.cityid = state_cities.id', "left");
		$this->db->join('states', 'restaurants.stateid = states.id', "left");
		$this->db->join( 'orderlistdetails', " orderlistdetails.restaurantid = restaurants.id " );
        $this->db->join( "orders", " orders.id = orderlistdetails.orderid " );
        $this->db->join( 'orderstatus', " orderstatus.id = orderlistdetails.status" );
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('restaurants.isdeleted'=>0,'restaurants.perchargestatus '=>1,'orderlistdetails.status '=>4));
		$this->db->group_by(" restaurants.id ");
		
		$total = $this->db->count_all_results();
		return $total;
	}


	function getDeliveryCharges($param=array(), $limit_start)
	{
		$this->db->select('states.id as stateid, states.statename, state_cities.id as cityid, state_cities.cityname,
			delivieringcharges_admin.id as delivieringchargesid, delivieringcharges_admin.freedelivieringstatus, delivieringcharges_admin.delivieringcharges ');
		$this->db->from('states');
		$this->db->join('state_cities', 'state_cities.stateid = states.id', "left");
		$this->db->join('delivieringcharges_admin', 'delivieringcharges_admin.cityid = state_cities.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('states.isdeleted'=>0,'states.status '=>1,'state_cities.status '=>1,'state_cities.isdeleted'=>0));
		
		$this->db->limit(25, $limit_start);
		$this->db->order_by(" states.statename", 'ASC');
        $this->db->order_by(" delivieringcharges_admin.delivieringcharges", 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}

	function getDeliveryChargesCount($param=array())
	{
		$this->db->select('*');
		$this->db->from('states');
		$this->db->join('state_cities', 'state_cities.stateid = states.id', "left");
		$this->db->join('delivieringcharges_admin', 'delivieringcharges_admin.cityid = state_cities.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('states.isdeleted'=>0,'states.status '=>1,'state_cities.status '=>1,'state_cities.isdeleted'=>0));
		
		$total = $this->db->count_all_results();
		return $total;
	}

	
}
?>