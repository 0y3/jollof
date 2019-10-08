<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Role_assignment extends CI_Model
{
        private $DB_role = "role_assignments";
        
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/system_modules');
	}
	function add($data)
	{
		$status = $this->db->insert($this->DB_role, $data);
		return $status;
	}
	function edit($data, $moduleID, $roleID)
	{
		$this->db->where(array('moduleID'=>$moduleID, 'roleID'=>$roleID));
		$status = $this->db->update($this->DB_role, $data);
		return $status;
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from($this->DB_role);
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
	function getByID($roleAssignmentID)
	{
		$this->db->select('*');
		$this->db->from($this->DB_role);
		$this->db->where('roleAssignmentID', $roleAssignmentID);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function roleAccess($roleID, $controllerName)
	{
		
		$module = $this->system_modules->getModule($controllerName);
		if($module != false){
			$this->db->select('*');
			$this->db->from($this->DB_role);
			$this->db->where(array('roleID'=>$roleID, 'moduleID'=>$module['moduleID']));
			$query = $this->db->get();
			if ($query->num_rows() > 0)
                        {return true;}
			else
                        {return false;}
		}
		else
                {
			return false;
                }
	}
	function roleAssignmentStatus($roleID, $moduleID)
	{
		$this->db->select('*');
		$this->db->from($this->DB_role);
		$this->db->where('moduleID', $moduleID);
		$this->db->where('roleID', $roleID);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	function delete($moduleID, $roleID)
	{
		$this->db->where(array('moduleID'=>$moduleID, 'roleID'=>$roleID));
		$this->db->delete('role_assignments'); 
	}
	function revokeRole($roleID)
	{
		$this->db->where(array('roleID'=>$roleID));
		$this->db->delete('role_assignments'); 
	}
}
?>