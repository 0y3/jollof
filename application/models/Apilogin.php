<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apilogin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	// Perform the login validation
	function checkLogin($username, $password)
	{
		$query = $this->db->get_where('users', array('username' => $username, 'accesstype'=>2));
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
		$query = $this->db->get_where('usertokens', array('token' => $token));
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
		$this->db->delete('usertokens');
	}
	
	// Function add token to the db
	function addToken($data)
	{
		$status = $this->db->insert('usertokens', $data);
		return $status;
	}
	// Update the token based on usage
	function updateToken($token)
	{
		// Put data in array and update the database
		$data = array('lastusedat'=>date("Y-m-d H:i:s"), 'updatedat'=>date("Y-m-d H:i:s"), 'expires'=>$this->createExpiry());
		$this->db->where(array('token'=>$token));
		$status = $this->db->update('usertokens', $data);
	}
	
	// Create a new expiry data
	function createExpiry()
	{
		// Allow the token to be useable for the next ten days
		$d = date('Y-m-d H:i:s');
		$start_date = date("Y-m-d H:i:s", strtotime($d));
		$date = new DateTime($start_date);
		// Schedule expiry date
		$date->modify("+10 day");
		$expires = $date->format("Y-m-d H:i:s");
		return $expires;
	}
	
	// Get the token information
	function getTokenData($token){
		
		$query = $this->db->get_where('usertokens', array('token' => $token));
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
        
        
}
?>