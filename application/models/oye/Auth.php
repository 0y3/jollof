<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Auth extends CI_Model
{
    private $DB_account_r = "accounts";
    private $DB_usertokens = "usertokens";
    
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
		
	}
        
    public function checkEmail($postemail)
        {
           $this -> db -> select('email');
           $this -> db -> from($this->DB_account_r);
           $this -> db -> where('email', $postemail);
           $this -> db -> where('usertype', 'user');
           $query = $this -> db -> get();
           return $query->result();
        }            
    public function check_User_login($email_m, $pwd_m){

        $this->db->select('*');
        $this->db->from( $this->DB_account_r );
        $this->db->where('Email',$email_m);
        //$this->db->where('Pwd',$pwd);
        $this->db->where('isdeleted',0);

        $Result = $this->db->get();
        $row = $Result->row();
        if ( empty($row) )//($Result->num_rows() != 1)
            {		
                return 'Email_not_Found';	
            }
        else 
            {	//print_r( 'row' );die;
            	if ($row->usertype != 'user' )
                    {
                        return 'Guest User Email';
                    }
                elseif ($row->password != $pwd_m )
                    {
                        return 'Incorrect_Password';
                    }
                else  
                    {
                        if ($row->status != 1 )
                        {
                            return 'User_Not_Active';
                        }
                        else 
                        {

                            $session_datainfo = array(
                                                  'User_id' => $row->id,
                                                  'firstname' => $row->firstname,
                                                  'lastname' => $row->lastname,
                                                  'email' => $row->email,
                                                  'Type' => 'User'
                                                  );

                            // call in the method set_session inside the class session_model 
                            $this->Session_model->set_session($session_datainfo);
                            return 'logged_inn';
                            //return $row;
                            //print_r( $_SESSION );
                            //die;


                        } // end of else if 
                    }
                

            }
    }
    
    
    
        function checkLogin($email, $password)
	{
		$query = $this->db->get_where($this->DB_account_r, array('email' => $email));
	   	$row = $query->row_array();
		if($row != false){
			if($row['password'] == $password)
				return $row;
			else
				return false;
		}
		else
			return false;
	}
	
    // Generate a session token string
	function getToken()
	{
		$rand = mt_rand(0x000000, 0xffffff); // generate a random number between 0 and 0xffffff
		$rand = dechex($rand & 0xffffff); // make sure we're not over 0xffffff, which shouldn't happen anyway
		$rand = str_pad($rand, 6, '0', STR_PAD_LEFT); // add zeroes in front of the generated string
		$code = date('Y')."".$rand;
		return md5($code);
	}
	
	// Validate the user session
	function validateUserSession($token)
	{
		$query = $this->db->get_where($this->DB_usertokens, array('token' => $token));
		if ($query->num_rows() > 0)
		{
			$row = $query->row_array();
			// Check if token has expired
			if(date("Y-m-d H:i") > $row['expires'])
				return false;
			else 
				return true;
		}
		else
			return false;
	}
	// Function to delete token from the db
	function removeToken($token)
	{
		$this->db->where(array('token'=>$token));
		$this->db->delete($this->DB_usertokens);
	}
	
	// Function add token to the db
	function addToken($data)
	{
		$status = $this->db->insert($this->DB_usertokens, $data);
		return $status;
	}
	// Update the token based on usage
	function updateToken($token)
	{
		// Put data in array and update the database
		$data = array('lastusedat'=>date("Y-m-d H:i:s"), 'updatedat'=>date("Y-m-d H:i:s"), 'expires'=>$this->createExpiry());
		$this->db->where(array('token'=>$token));
		$status = $this->db->update($this->DB_usertokens, $data);
	}
	
	// Create a new expiry data
	function createExpiry()
	{
		// Allow the token to be useable for the next ten days
		$d = date('Y-m-d H:i');
		$start_date = date("Y-m-d H:i:s", strtotime($d));
		$date = new DateTime($start_date);
		// Schedule expiry date
		$date->modify("+10 day");
		$expires = $date->format("Y-m-d H:i:s");
		return $expires;
	}
	
	// Get the token information
	function getTokenData($token){
		
		$query = $this->db->get_where($this->DB_usertokens, array('token' => $token));
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
   /* 
    public function set_session_data($session_data)
    {
        $sess_data = array(
                            'User_id' => $session_data['User_id'],
                            'User_name' => $session_data['username'],
                            'Email' => $session_data['email'],
                            'Type' => $session_data['Type'],
                            'logged_in' => 1,
                            );
        $this->session->set_userdata($sess_data);
    }
    * 
    */
}
