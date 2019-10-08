<?PHP
class Notifications extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	

	function getEmailTemplate($templateName=null)
	{
		
		require_once('./application/libraries/mandrill-api/Mandrill.php');
		try 
		{
			$mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
			$name = 'Generic';
			$result = $mandrill->templates->info($templateName);
			return $result['code'];
			//$result = $mandrill->templates->getList();
			//return $result;
			
		} 
		catch(Mandrill_Error $e) 
		{
			// Mandrill errors are thrown as exceptions
			// echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
			// throw $e;
		}
	}
	
	function getEmailUsers()
	{
		
		require_once('./application/libraries/mandrill-api/Mandrill.php');
		try 
		{
			$mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
			$result = $mandrill->users->info();
			//return $result;
    		print_r($result);
			
		} 
		catch(Mandrill_Error $e) 
		{
			// Mandrill errors are thrown as exceptions
			// echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
			// throw $e;
		}
	}
	function sendMailMandrill($recipientname, $recipientemail, $subject, $message)
	{
		$html_email = $this->getEmailTemplate();
		$html_email = str_replace("*|name|*", $recipientname, $html_email);
		$html_email = str_replace("*|message|*", $message, $html_email);
		require_once('./application/libraries/mandrill-api/Mandrill.php');
		try
		{
			$mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
			$message = array(
					'html' => $html_email,
					'text' => 'Please view this message in an HTML compatible viewer',
					'subject' => $subject,
					'from_email' => ' noreply@jollof.com',
					'from_name' => 'Jollof',
					'to' => array(
							array(
									'email' => $recipientemail,
									'name' => $recipientname,
									'type' => 'to'
							)
					),
					'headers' => array('Reply-To' => 'noreply@jollof.com'),
					'important' => false,
					'track_opens' => null,
					'track_clicks' => null,
					'auto_text' => null,
					'auto_html' => null,
					'inline_css' => null,
					'url_strip_qs' => null,
					'preserve_recipients' => null,
					'view_content_link' => null,
					'tracking_domain' => null,
					'signing_domain' => null,
					'return_path_domain' => null,
			);
			$async = false;
			$ip_pool = 'Main Pool';
			$result = $mandrill->messages->send($message, $async, $ip_pool);
		} 
		catch(Mandrill_Error $e) {
			// Mandrill errors are thrown as exceptions
			// echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
			// throw $e;
		}
	}

	function sendMailMandrillByTemp($recipientname, $recipientemail, $subject)
	{
		$html_email = $this->getEmailTemplate('integration testing');
		$html_email = str_replace("*|FNAME|*", "Segun", $html_email);
		$html_email = str_replace("*|LNAME|*", "info", $html_email);
		require_once('./application/libraries/mandrill-api/Mandrill.php');
		try
		{
			$mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
			$message = array(
					'html' => $html_email,
					'text' => 'Please view this message in an HTML compatible viewer',
					'subject' => $subject,
					'from_email' => ' noreply@jollof.com',
					'from_name' => 'Jollof',
					'to' => array(
							array(
									'email' => $recipientemail,
									'name' => $recipientname,
									'type' => 'to'
							)
					),
					'headers' => array('Reply-To' => 'noreply@jollof.com'),
					'important' => false,
					'track_opens' => null,
					'track_clicks' => null,
					'auto_text' => null,
					'auto_html' => null,
					'inline_css' => null,
					'url_strip_qs' => null,
					'preserve_recipients' => null,
					'view_content_link' => null,
					'tracking_domain' => null,
					'signing_domain' => null,
					'return_path_domain' => null,
			);
			$async = false;
			$ip_pool = 'Main Pool';
			$result = $mandrill->messages->send($message, $async, $ip_pool);
			//$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
			return $result;
		} 
		catch(Mandrill_Error $e) {
			// Mandrill errors are thrown as exceptions
			 echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
			// throw $e;
		}
	}

	public function sendEmail($message, $email_address, $subject, $copy_addresses="", $attachment=NULL)
	{
		// $output = NULL;
		require_once('./application/libraries/phpmailer/class.phpmailer.php');
		$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		$mail->IsSMTP(); // telling the class to use SMTP
		try
		{
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
			$mail->Username   = "test@softcom.ng";  // GMAIL username
			$mail->Password   = "testing123";        	// GMAIL password
			$mail->AddAddress($email_address, '');
			$mail->SetFrom('test@softcom.com', 'GSK PALS Admin');
			$mail->Subject = $subject;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
			$mail->MsgHTML($message);
		
			if($attachment != NULL){
				$mail->AddAttachment($attachment);
			}
				
			// Copy mail to specified copy addresses
			$copy = explode(",", $copy_addresses);
			if(count($copy) > 0 && trim($copy_addresses) != "")
			{
				foreach ($copy as $copy_address)
				{
					if($copy_address != "")
						$mail->AddCC($copy_address, "");
				}
			}
				
			$output = $mail->Send();
				
			//$output = "Email was sent successfully";
				
		} catch (phpmailerException $e) {
			//$output = $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
			//$output = $e->getMessage(); //Boring error messages from anything else!
		}
		
		//return $output;
	}
	
	function sendSMS($mobile, $message)
	{
		$sub_uname = urldecode("GSK PALS");
		$sub_pwd = "softcom.ng";
		$mobile = $this->formatNumber($mobile);
		$from = 'GSK PALS';
		$message = urlencode($message);
		$address = "http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=toyosi@softcom.ng&subacct=";
		$address .= "$sub_uname&subacctpwd=$sub_pwd&message=$message&sender=$from&sendto=$mobile&msgtype=0";
		// Connect to the Web API using cURL.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $address);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
		$xmlstr = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
		curl_close($ch);
	
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