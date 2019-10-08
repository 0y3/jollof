<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class System_modules extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function add($data)
	{
		$status = $this->db->insert('system_modules', $data);
		return $status;
	}
	function edit($moduleID, $ID)
	{
		$this->db->where(array('moduleID'=>$moduleID));
		$status = $this->db->update('system_modules', $data);
		return $status;
	}
	function getAll()
	{
		$this->db->select('*');
		$this->db->from('system_modules');
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
	function getSpecial($roleID)
	{
		$this->db->select('*');
		$this->db->from('system_modules');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$i = 0;
			$data = array();
			$this->load->model('role_assignments', 'roleAssign');
			foreach ($query->result_array() as $row)
			{
				$data[$i] = $row;
				$status = $this->roleAssign->roleAssignmentStatus($roleID, $data[$i]['moduleID']);
				if($status == true)
					$data[$i]['checkIt'] = 'yes';
				else
					$data[$i]['checkIt'] = 'no';
				$i++;
			}
			return $data;
		}
		else
			return false;
	}

	function getSpecialByPlatform($roleID,$sitetype)
	{
		$this->db->select('*');
		$this->db->from('system_modules');
        $this->db->where("jollofsitetypeid ", $sitetype);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$i = 0;
			$data = array();
			$this->load->model('role_assignments', 'roleAssign');
			foreach ($query->result_array() as $row)
			{
				$data[$i] = $row;
				$status = $this->roleAssign->roleAssignmentStatus($roleID, $data[$i]['moduleID']);
				if($status == true)
					$data[$i]['checkIt'] = 'yes';
				else
					$data[$i]['checkIt'] = 'no';
				$i++;
			}
			return $data;
		}
		else
			return false;
	}
	function getByID($moduleID)
	{
		$this->db->select('*');
		$this->db->from('system_modules');
		$this->db->where('moduleID', $moduleID);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function getModule($controllerName)
	{
		$this->db->select('*');
		$this->db->from('system_modules');
		$this->db->where('controlerName', $controllerName);
		$this->db->where('jollofsitetypeid',$_SESSION['Type_id']);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function getModuleAccess($moduleName, $roleID)
	{
		$this->db->select('*');
		$this->db->from('system_modules');
		$this->db->where('moduleID', $moduleID);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row;
		}
		else
			return false;
	}
	function delete($moduleID)
	{
		$this->db->where(array('moduleID'=>$moduleID));
		$this->db->delete('system_modules'); 
	}
}
?>