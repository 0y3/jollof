<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Utility extends CI_Model
{
    
    private $DB_ord_details = "orderlistdetails";
    private $DB_ord = "orders";
    private $DB_ord_status = "orderstatus";
    
	function __construct()
	{
		parent::__construct();
	}
	function dateDifference($startDate, $endDate)
	{
		$date1 = new DateTime($startDate);
		$date2 = new DateTime($endDate);
		$interval = $date1->diff($date2);
		$years = $interval->y;
		$months = $interval->m;
		$difference = "<br />difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
		return $difference;
	}
	function daysDifference($startDate, $endDate)
	{
		$diff = strtotime($endDate) - strtotime($startDate);
		$hours = $diff/3600;
		$days = floor($hours/24);
		return $days;
	}
	function weeksDifference($startDate, $endDate)
	{
		$diff = strtotime($endDate) - strtotime($startDate);
		$weeks = floor($diff/(3600*24*7));
		return $weeks;
	}
	function monthsDifference($startDate, $endDate)
	{
		$date1 = new DateTime($startDate);
		$date2 = new DateTime($endDate);
		$interval = $date1->diff($date2);
		$years = $interval->y;
		$months = $interval->m;
		$totalMonths = ($years*12) + $months;
		return $totalMonths;
	}
	function yearsDifference($startDate, $endDate)
	{
		$date1 = new DateTime($startDate);
		$date2 = new DateTime($endDate);
		$interval = $date1->diff($date2);
		$years = $interval->y;
		return $years;
	}
	function getInterval($value)
	{
		$value = strtolower($value);
		$data = array();
		if($value == 'daily')
			$data = array('interval'=>'day', 'value'=>'1');
		else if($value == 'weekly')
			$data = array('interval'=>'week', 'value'=>'1');
		else if($value == 'monthly')
			$data = array('interval'=>'month', 'value'=>'1');
		else if($value == 'bi-monthly')
			$data = array('interval'=>'week', 'value'=>'2');
		else if($value == '2months')
			$data = array('interval'=>'month', 'value'=>'2');
		else if($value == 'quaterly')
			$data = array('interval'=>'month', 'value'=>'3');
		return $data;
	}
	
	function getIntervalValue($value, $freq)
	{
		$value = strtolower($value);
		$data = 'none';
		if($value == 'day' && $freq=='1')
			$data = 'daily';//array('interval'=>'day', 'value'=>'1');
		else if($value == 'week' && $freq=='1')
			$data = 'weekly';//array('interval'=>'week', 'value'=>'1');
		else if($value == 'month' && $freq=='1')
			$data = 'monthly';//array('interval'=>'month', 'value'=>'1');
		else if($value == 'week' && $freq=='2')
			$data = 'bi-monthly';//array('interval'=>'week', 'value'=>'2');
		else if($value == 'month' && $freq=='2')
			$data = '2months';//array('interval'=>'month', 'value'=>'2');
		else if($value == 'month' && $freq=='3')
			$data = 'quaterly';//array('interval'=>'month', 'value'=>'3');
		return $data;
	}
	
	function getRegInterval($value)
	{
		$value = strtolower($value);
		$data = array();
		if($value == '2hours')
			$data = array('interval'=>'hour', 'value'=>'2');
		else if($value == '1day')
			$data = array('interval'=>'day', 'value'=>'1');
		else if($value == '2days')
			$data = array('interval'=>'day', 'value'=>'2');
		else if($value == '1week'){
			$data = array('interval'=>'week', 'value'=>'1');
		}
		else if($value == '2weeks')
			$data = array('interval'=>'week', 'value'=>'2');
		else if($value == '1month')
			$data = array('interval'=>'month', 'value'=>'1');
		return $data;
	}
	
	function getRegIntervalValue($value, $freq)
	{
		$value = strtolower($value);
		$data = 'none';
		if($value == 'hour' && $freq=='2')
			$data = '2hours';//array('interval'=>'hour', 'value'=>'2');
		else if($value == 'day' && $freq=='1')
			$data = '1day';//array('interval'=>'day', 'value'=>'1');
		else if($value == 'day' && $freq=='2')
			$data = '2days';//array('interval'=>'day', 'value'=>'2');
		else if($value == 'week' && $freq=='1')
			$data = '1week';//array('interval'=>'week', 'value'=>'1');
		else if($value == 'week' && $freq=='2')
			$data = '2weeks';//array('interval'=>'week', 'value'=>'2');
		else if($value == 'month' && $freq=='1')
			$data = '1month';//array('interval'=>'month', 'value'=>'1');
		return $data;
	}
	//Function to process CSV file uploads
	function uploadCSV($url)
	{
		$csvarray = array($url);
	    if (file_exists($url) and is_file($url)) {
	        if (($handle = fopen($url, "r")) !== false) {
	            $nn = 0;
	            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
	                $c = count($data);
	                for ($x = 0; $x < $c; $x++) {
	                    $csvarray[$nn][$x] = trim($data[$x]);
	                }
	                $nn++;
	            }
	            fclose($handle);
	        }
	    }
	    return $csvarray;
	}
	
	function formatNumber($number)
	{
		if(substr($number,0,4) == '+234')
			$number = substr($number, 3);
		else if(substr($number,0,3) == '234')
			$number = substr($number, 2);
		else if(substr($number,0,1) == '0')
			$number = $number;
		else 
			$number = '0'.$number;
		
		return $number;
	}
	
	function thisWeekTimestamps()
	{
		$res['weekstart'] = strtotime('last sunday');
		$res['weekend'] = strtotime('this sunday');
		return $res;
	}
	
	function thisMonthTimestamps()
	{
		$res['monthstart'] = strtotime('first day of this month');
		$res['monthend'] = strtotime('last day of this month');
		return $res;
	}
	
	function todayTimestamps()
	{
		$res['daystart'] = strtotime(date("Y-m-d"));
		$res['dayend'] = strtotime(date("Y-m-d")." 23:59");
		return $res;
	}
	
	function generateCode()
	{
		$rand = mt_rand(0x000000, 0xffffff); // generate a random number between 0 and 0xffffff
		$rand = dechex($rand & 0xffffff); // make sure we're not over 0xffffff, which shouldn't happen anyway
		$rand = str_pad($rand, 6, '0', STR_PAD_LEFT); // add zeroes in front of the generated string
		$code = date('d')."".$rand.date('m');
		return strtoupper($code);
	}
	
	function generateSecretKey($merchantcode, $merchantwebsite)
	{
		$rand = mt_rand(0x000000, 0xffffff); // generate a random number between 0 and 0xffffff
		$rand = dechex($rand & 0xffffff); // make sure we're not over 0xffffff, which shouldn't happen anyway
		$rand = str_pad($rand, 6, '0', STR_PAD_LEFT); // add zeroes in front of the generated string
		$code = date('d')."".$rand.date('ms');
		$token = strtoupper($code) . $merchantcode . $merchantwebsite . date('H:i:sdmy');
		
		$secrey_key = hash("sha512", $token);
		return strtoupper($secrey_key);
	}
	
	public function makePostCall($url, $params, $headers=NULL)
	{
		$fields = '';
		foreach($params as $key => $value) {
			$fields .= $key . '=' . urlencode($value) . '&';
		}
		rtrim($fields, '&');
		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, $url);
		curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($post, CURLOPT_POST, count($params));
		curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
		// If there are any headers present
		if($headers != NULL)
			curl_setopt($post, CURLOPT_HTTPHEADER, $headers);
		// Execute the CURL request
		$result = curl_exec($post);
		if(curl_errno($post))
			return false;
		curl_close($post);
		// Convert output to array
		$jsonarray = json_decode($result, true);
		return $jsonarray;
	}
	
	public function makeGetCall($url, $headers=NULL)
	{
		$post = curl_init();
		curl_setopt($post, CURLOPT_URL, $url);
		curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
		// If there are any headers present
		if($headers != NULL)
			curl_setopt($post, CURLOPT_HTTPHEADER, $headers);
		// Execute the CURL request
		$result = curl_exec($post);
		if(curl_errno($post))
			return false;
		curl_close($post);
		// Convert output to array
		$jsonarray = json_decode($result, true);
		return $jsonarray;
	}
	
	public function formatFigures($value)
	{
		if($value == 0)
			return 0;
	
		$abbreviations = array(12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '');
		foreach($abbreviations as $exponent => $abbreviation)
		{
			if($value >= pow(10, $exponent))
			{
				return round(floatval($value / pow(10, $exponent)),3).$abbreviation;
			}
				
		}
	}
	
	public function generateEmailButton($url, $title)
	{
		$html = '<table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
					<tbody>
						<tr>
							<td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="'.$url.'">'.$title.'</a>
                                                                           </span>
                                                                        
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
			</table>';
		return $html;
	}
	
	function getFuturDate($interval="day", $value=0)
	{
		$d = date('Y-m-d H:i:s');
		$start_date = date("Y-m-d H:i:s", strtotime($d));
		$date = new DateTime($start_date);
		// Schedule expiry date
		$date->modify("+$value $interval");
		$expires = $date->format("Y-m-d H:i:s");
		return $expires;
	}
	
	// Function created by Segun to generate a random string of specified length
	public function generate_random_string($length)
	{
	    $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
	    $randomString = '';
	    for($i = 0; $i < $length; $i++){
	        $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
	    }
	    return $randomString;
	    //echo $randomString;
	}
        
        public function _get_order_bystatus($statusid)
        {
            $by_id = $_SESSION['merchant_id'];
            $this ->db->select('*')
                       ->from($this->DB_ord_details)
                        ->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                       ->where(" ".$this->DB_ord_details.".isdeleted ", 0)
                       ->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
            if(isset($statusid) && !empty($statusid))
            {
                $this->db->where(" ".$this->DB_ord_details.".status ", $statusid);
            }
            else
            {
                $this->db->where_in(" ".$this->DB_ord_details.".status ", array(1,2,3,4));
            }
            $total = $this->db->count_all_results();
            return $total;
        }
}
