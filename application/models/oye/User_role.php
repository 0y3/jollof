<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_role extends CI_Model
{
        private $DB_userrole = "user_roles";
        
	function __construct()
	{
		parent::__construct();
	}
	function add($data)
	{
		$status = $this->db->insert($this->DB_userrole, $data);
		return $status;
	}
	function edit($data, $roleID, $roleFor)
	{
		$this->db->where(array('id'=>$roleID));
                if( (isset($roleFor)) && !empty($roleFor) )
                {
                    $this->db->where(array('roleFor'=>$roleFor));
                }
		$status = $this->db->update($this->DB_userrole, $data);
		return $status;
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from($this->DB_userrole);
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
		$this->db->from($this->DB_userrole);
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
		$this->db->from($this->DB_userrole);
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
		$this->db->from($this->DB_userrole);
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
	function delete($roleID)
	{
		$this->db->where(array('roleID'=>$roleID));
		$this->db->delete($this->DB_userrole); 
	}
}
?>