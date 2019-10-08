<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
        private $DB_user = "users";
        private $DB_merchant ="restaurants";
        private $DB_state ="states";
        private $DB_city ="state_cities";
    
	function __construct()
	{
		parent::__construct();
	}
	
	function getAll($merchantid=null)
	{
		$this->db->select('users.*, user_roles.roleName, restaurants.companyname');
		$this->db->from('users');
		$this->db->join('user_roles', 'users.userroleid = user_roles.id');
		$this->db->join('restaurants', 'users.restaurantid = restaurants.id', "left");
		$this->db->where(array('users.isdeleted'=>0));

        // Perform checks to show merchants only orders that belong to their store
		if(isset($merchantid))
        {   $this->db->where(array("users.restaurantid" => $merchantid));   }
        else
        {   $this->db->where(array("users.restaurantid" => $this->session->merchant_id));   }
        
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		    return $query->result_array();
		}
		else{
			return false;
		}
	}
    function getByID($userID)
	{
            $query = $this->db->get_where('users', array(
                                                    'id' => (int)$userID,
                                                    //'restaurantid' => (int)$_SESSION['merchant_id'],
                                                    'isdeleted' =>'0'
                                                    )
                                         );
            if ($query->num_rows() > 0)
            {
                    $row = $query->row();
                    return $row;
            }
            else
                    return false;
	}
        public function userrole($by_id)
        {
            $this->db->select('*');
            $this->db->from('user_roles');
            $this->db->where_in("roleFor ", array($by_id,"general"));
            $this->db->where("status ", 1);
            $this->db->order_by("createdat" , "DESC");

            $query = $this->db->get()->result();

            //print("<pre>".print_r($query,true)."</pre>");die;
            return $query;

        }
        
        public function merchant_info($by_id) 
        {

            $this->db->select(" ".$this->DB_merchant.".*  , ".$this->DB_city.".cityname , ".$this->DB_state.".statename")
                     ->from($this->DB_merchant)
                     ->where(array(" ".$this->DB_merchant.".id" => (int)$by_id ," ".$this->DB_merchant.".isdeleted" =>"0"))
                     ->join( $this->DB_city, " ".$this->DB_city.".id = ".$this->DB_merchant.".cityid " ,"LEFT ")
                     ->join( $this->DB_state, " ".$this->DB_state.".id = ".$this->DB_merchant.".stateid ","LEFT ");

            $query = $this->db->get()->row();
            //print("<pre>".print_r($query,true)."</pre>");die;
            return $query;

        }

        public function admin_info() 
        {

            $this->db->select(" *")
                     ->from('settings')
                     ->where(" id" ,1);

            $query = $this->db->get()->row();
            //print("<pre>".print_r($query,true)."</pre>");die;
            return $query;

        }
        
        public function get_allstate() 
        {
            $this->db->select('id,statename');
            $this->db->from($this->DB_state);
            $this->db->where('status',1);
            $this->db->where('isdeleted',0);

            $query = $this->db->get();
            return $query->result();
            //return $query->result_array();

        }
        public function get_city_bystate($by_id) 
        {

            $this->db->select('*');
            $this->db->from($this->DB_city);
            $this->db->where('stateid',(int)$by_id);
            $this->db->where('status',1);
            $this->db->where('isdeleted',0);

            $query = $this->db->get();
            return $query->result();

        }
        public function is_user_email_available($data) 
        {
            $this->db->where($data);  
            $query = $this->db->get($this->DB_user);  

            if($query->num_rows() > 0)  
              {  
                return true;  
              }  
            else  
              {  
                return false;  
              }  
        }
        
        public function newtoken($data,$by_id)
        {
            $this->db->set($data); 
            $this->db->where('id', $by_id); //which row want to upgrade  
            $this->db->update($this->DB_user); 
            
        }
        
        public function check_User_pwd($pwd) 
        {
            $query = $this->db->get_where($this->DB_user, array(
                                                            'id' => (int)$this->session->User_id,
                                                            'password' => $pwd,
                                                            'isdeleted' =>'0'
                                                                )
                                                            );
            return $query->result();
        }

    function getAllAdmin($userid=null)
    {
        $this->db->select('admin_users.*, user_roles.roleName');
        $this->db->from('admin_users');
        $this->db->join('user_roles', 'admin_users.userroleid = user_roles.id');
        $this->db->where(array('admin_users.isdeleted'=>0));

        // Perform checks to show merchants only orders that belong to their store
        
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else{
            return false;
        }
    }

    function getAdminByID($userID)
    {
            $query = $this->db->get_where('admin_users', array(
                                                    'id' => (int)$userID,
                                                    'isdeleted' =>'0'
                                                    )
                                         );
            if ($query->num_rows() > 0)
            {
                    $row = $query->row();
                    return $row;
            }
            else
                    return false;
    }

    public function userroleAdmin()
        {
            $this->db->select('*');
            $this->db->from('user_roles');
            $this->db->where_in("roleFor ", 'ebs');
            $this->db->where("status ", 1);
            $this->db->order_by("createdat" , "DESC");

            $query = $this->db->get()->result();

            //print("<pre>".print_r($query,true)."</pre>");die;
            return $query;

        }
	
}
