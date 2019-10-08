<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_role extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function add($data)
	{
		$status = $this->db->insert('user_roles', $data);
		return $status;
	}
	function edit($data, $roleID, $stationID)
	{
		$this->db->where(array('roleID'=>$roleID));
		$status = $this->db->update('user_roles', $data);
		return $status;
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from('user_roles');
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
	function getActive()
	{
		$this->db->select('*');
		$this->db->from('user_roles');
		$this->db->where(array('status'=>1));
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
	function getByID($roleID)
	{
		$this->db->select('*');
		$this->db->from('user_roles');
		$this->db->where(array('roleID'=>$roleID));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function getByName($roleName)
	{
		$this->db->select('*');
		$this->db->from('user_roles');
		$this->db->where(array('roleName'=>$roleName));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function getByPlatform($roleName)
	{
		$this->db->select('*');
		$this->db->from('user_roles');
		$this->db->where(array('roleFor'=>$roleName));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	return $query->result_array();
		}
		else
			return false;
	}
	function delete($roleID)
	{
		$this->db->where(array('roleID'=>$roleID));
		$this->db->delete('user_roles'); 
	}
}
?>