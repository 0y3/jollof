<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function checkLogin($username, $password)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			if($row['password'] == $password){
				return $row;
			}
			else
				return false;
		}
		else
			return false;
	}
	
	public function check_User_login($email_m, $pwd_m)
	{
	    $this->db->select("users.*, restaurants.companyname, restaurants.logo");
	    $this->db->from("users");
	    $this->db->join("restaurants", "restaurants.id = users.restaurantid");
	    $this->db->where("users.email", $email_m);
	    $this->db->where(array("users.isdeleted"=>0, "restaurants.isdeleted"=>0, "restaurants.merchanttype"=>"cuisine"));
	    
	    $Result = $this->db->get();
	    $row = $Result->row();
	    if ($Result->num_rows() != 1)
	    {
	        return 'Email_not_Found';
	    }
	    else
	    {
	        if($row->password != $pwd_m ){
	            return 'Incorrect_Password';
	        }
	        else
	        {
	            if ($row->status != 1){
	                return 'User_Not_Active';
	            }
	            else {
	                $sess_data = array(
	                    'User_id' => $row->id,
	                    'Role_id' => $row->userroleid,
	                    'rest_id' => $row->restaurantid,
	                    'firstname' => $row->firstname,
	                    'lastname' => $row->lastname,
	                    'email' => $row->email,
	                    'Type' => 'restaurant',
	                    'Type_id' => 1,
	                    'cuisineAdmin' => true,
	                    'merchant_id' => $row->restaurantid,
	                    'companyname' => $row->companyname,
	                    'avatar' => $row->logo
	                );
	                
	                // call in the method set_session inside the class session_model
	                $this->session->set_userdata($sess_data);
	                return 'logged_inn';
	            }
	        }
	    }
	    
	}
	
	public function check_fashion_login($email_m, $pwd_m)
	{
	    $this->db->select("users.*, restaurants.companyname, restaurants.logo");
	    $this->db->from("users");
	    $this->db->join("restaurants", "restaurants.id = users.restaurantid");
	    $this->db->where("users.email", $email_m);
	    $this->db->where(array("users.isdeleted"=>0, "restaurants.isdeleted"=>0, "restaurants.merchanttype"=>"fashion"));
	    
	    $Result = $this->db->get();
	    $row = $Result->row();
	    if ($Result->num_rows() != 1)
	    {
	        return 'Email_not_Found';
	    }
	    else
	    {
	        if($row->password != $pwd_m ){
	            return 'Incorrect_Password';
	        }
	        else
	        {
	            if ($row->status != 1){
	                return 'User_Not_Active';
	            }
	            else {
	                $sess_data = array(
	                    'User_id' => $row->id,
	                    'Role_id' => $row->userroleid,
	                    'rest_id' => $row->restaurantid,
	                    'firstname' => $row->firstname,
	                    'lastname' => $row->lastname,
	                    'email' => $row->email,
	                    'Type' => 'fashion',
	                    'Type_id' => 2,
	                    'fashionAdmin' => true,
	                    'merchant_id' => $row->restaurantid,
	                    'companyname' => $row->companyname,
	                    'avatar' => $row->logo
	                );
	                
	                // call in the method set_session inside the class session_model
	                $this->session->set_userdata($sess_data);
	                return 'logged_inn';
	            }
	        }
	    }
	    
	}
}
?>