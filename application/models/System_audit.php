<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class System_audit extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function add($data)
	{
		$this->load->library('user_agent');
		$data['IPAddress'] = $_SERVER['REMOTE_ADDR'];
		$data['dateTime'] = date('Y-m-d H:i');
		$data['browser'] = $this->agent->browser();
		$data['userAgent'] = $this->agent->agent_string();
		$data['platform'] = $this->agent->platform();
		$status = $this->db->insert('system_audit', $data);
		return $status;
	}
	function edit($data, $stationID, $ID)
	{
		$this->db->where(array('auditID'=>$ID, 'stationID'=>$stationID));
		$status = $this->db->update('system_audit', $data);
		return $status;
	}
	function getAll($stationID)
	{
		$query = $this->db->get_where('system_audit', array('stationID' => $stationID));
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
	function getUserLog($userID, $stationID, $start)
	{
		$this->db->select('*');
		$this->db->from('system_audit');
		$this->db->where(array('stationID'=>$stationID, 'userID'=>$userID));
		$this->db->order_by('dateTime', 'desc');
		$this->db->limit(25, $start);
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
	function getUserLogCount($userID, $stationID)
	{
		$this->db->select('*');
		$this->db->from('system_audit');
		$this->db->where(array('stationID'=>$stationID, 'userID'=>$userID));
		$total = $this->db->count_all_results();
		return $total;
	}
}
?>