<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class Customer extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function queryParameters($params=array())
	{
		// filter by customer id
	    if(isset($params['id']) && isset($params['id'])){
			$this->db->where(array('accounts.id'=>$params['id']));
	    }

	    // filter by customer status
	    if(isset($params['status']) && isset($params['status'])){
			$this->db->where(array('accounts.status'=>$params['status']));
	    }

	    // filter by customer Point
	    if(isset($params['point']) && isset($params['point'])){
			$this->db->where(array('accounts.point'=>$params['point']));
	    }

	    // filter by customer gender
	    if(isset($params['gender']) && isset($params['gender'])){
			$this->db->where(array('accounts.gender'=>$params['gender']));
	    }

	     // filter by customer Type
	    if(isset($params['usertype']) && isset($params['usertype'])){
			$this->db->where(array('accounts.usertype'=>$params['usertype']));
	    }

	
		// filter by account name; this would perform a general search like filter
		if(isset($params['username']) && isset($params['username'])){
			$this->db->where("(accounts.firstname LIKE'%$params[username]%' OR accounts.lastname LIKE'%$params[username]%')");
		}

		// filter by accounts Address name; this would perform a general search like filter
		if(isset($params['accountaddresses']) && isset($params['accountaddresses'])){
			$this->db->where("(accountaddresses.address LIKE'%$params[accountaddresses]%' OR state_cities.cityname LIKE'%$params[accountaddresses]%' OR states.statename LIKE'%$params[accountaddresses]%')");
		}
	
		// filter by merchant creation date
		if(isset($params['createdat']) && isset($params['createdat']))
		{
			/*$t_date = explode("-", $params['createdat']);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array('accounts.createdat >='=>$startdate, 'accounts.createdat <='=>$enddate.' 23:59:59' ));*/
			$this->db->like('accounts.createdat ',$params['createdat']);

		}
	}
	
	function getAll($param=array(), $limit_start)
	{
		$this->db->select('accounts.*');
		$this->db->from('accounts');
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('accounts.isdeleted'=>0));
		
		$this->db->limit(25, $limit_start);
		$this->db->order_by("accounts.createdat", "DESC");
		$query = $this->db->get();

        if($query->num_rows() > 0)
        {
            $rows = $query->result_array();
            foreach($rows as $row)
            {
                $row['accountaddresses'] =   $this->getAccountaddressByid($row['id']);
                $get_prod[] = $row;
            }
            
            return $get_prod;
        }
        else
        {
            return null;
        }
	}

	//GET Account Address By Id
	Public function getAccountaddressByid ($by_id=null)
    {
        $this->db->select("accountaddresses.*,states.statename,state_cities.cityname");
        $this->db->from('accountaddresses');
		$this->db->join('state_cities', 'accountaddresses.cityid = state_cities.id', "left");
		$this->db->join('states', 'accountaddresses.stateid = states.id', "left");
        $this->db->where("accountaddresses.accountid", $by_id);
        $this->db->where("accountaddresses.isdeleted", 0);
        $this->db->order_by("accountaddresses.id", 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	// Get count of all restaurants
	function getAllCount($param=array())
	{
		$this->db->select('*');
		$this->db->from('accounts');
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('accounts.isdeleted'=>0));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function findAccount($searchword)
	{
		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->where("(accounts.firstname = '$searchword' OR accounts.id='$searchword' OR accounts.email = '$searchword' OR accounts.phone = '$searchword')");
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('accounts.isdeleted'=>0));
	
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
	
	// Get a list of all merchants for the purpose of using it in a drop down menu
	function listAllAccount($param=array())
	{
		$this->db->select('accounts.id, accounts.firstname, accounts.lastname');
		$this->db->from('accounts');
	
		// Process any filter options if any
		$this->queryParameters($param);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('accounts.isdeleted'=>0));
		
		$this->db->order_by("accounts.firstname", "asc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	
	
	
}
?>