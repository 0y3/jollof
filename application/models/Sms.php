<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function add($data)
	{
		$status = $this->db->insert('sms', $data);
		return $status;
	}
	function updateBalance($stationID)
	{
		$sql = "UPDATE sms SET smsUnits=smsUnits-1 WHERE stationID='".$stationID."'";
		$st = $this->db->query($sql);
		return 1;
	}
	function availableUnits($stationID)
	{
		$this->db->select('*');
		$this->db->from('sms');
		$this->db->where(array('stationID'=>$stationID));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
		   	$row = $query->row_array();
			return $row['smsUnits'];
		}
		else
			return false;
	}
	function getOnlineBalance()
	{
		$address = "http://message.3clicksms.com:8080/CreditCheck/checkcredits?username=q-oludele&password=dolores";
		$root_var = file_get_contents($address, true);
		if(substr($root_var, 0, 7) == 'BALANCE')
		{
			$bits = explode(':', $root_var);
			return $bits[1];
		}
		elseif(substr($root_var, 0, 7) == 'AUTHORI')
		{
			return 'invalid';
		}
		else
			return 'Not Found';
	}
	function sendSMS($mobile, $message)
	{
		//Check that the station has available SMS units
		$smsUnits = $this->availableUnits($this->session->userdata('stationID'));
		if($smsUnits > 0){
			//Also check that PBT has enough sms units
			$onlineUnits = $this->getOnlineBalance();
			if($onlineUnits <= 0)
				return;
			$mobile = $this->formatNumber($mobile);
			$from = 'PBT-SM';
			$message = urlencode($message);
			$address = 'http://message.3clicksms.com:8080/sendsms?username=q-oludele&password=dolores&type=5&dlr=0&destination='.$mobile.'&source='.$from.'&message='.$message;
			// Connect to the Web API using cURL.
			$ch = curl_init();
			
			echo "URL: $address";
			curl_setopt($ch, CURLOPT_URL, $address); 
			curl_setopt($ch, CURLOPT_TIMEOUT, '3'); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$xmlstr = curl_exec($ch); 
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close($ch);
		}

		return true;
	}
	function formatNumber($number)
	{
		if(substr($number,0,1) == '+')
		{
			$number = substr($number, 1);
		}
		else if(substr($number,0,1) == '0')
		{
			$number = '234'.substr($number,1);
		}
		return $number;
	}
}
?>