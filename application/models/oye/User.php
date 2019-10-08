<?PHP
class User extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function edit($ID, $data)
	{
		$this->db->where(array('userID'=>$ID));
		$status = $this->db->update('users', $data);
		return $status;
	}
	
	function getAll()
	{
		$this->db->select('users.*, user_roles.roleName, restaurants.companyname');
		$this->db->from('users');
		$this->db->join('user_roles', 'users.userroleid = user_roles.id');
		$this->db->join('restaurants', 'users.restaurantid = restaurants.id', "left");
		$this->db->where(array('users.deletedat'=>null,'users.restaurantid'=>(int)$_SESSION['rest_id']));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$i = 0;
			$data = array();
			foreach ($query->result_array() as $row)
			{
				$data[$i] = $row;
				$i++;
			}
			return $data;
		}
		else
			return false;
	}
	
	function getByID($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('userID'=>$id));
		$this->db->where(array('users.deletedat'=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
				return $row;
		}
		else
			return false;
	}
	
	function getUser($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('userID'=>$id));
		$this->db->where(array('users.deletedat'=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
				return $row;
		}
		else
			return false;
	}
	function getByUsername($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username'=>$username));
		$this->db->where(array('users.deletedat'=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
				return $row;
		}
		else
			return false;
	}

}
