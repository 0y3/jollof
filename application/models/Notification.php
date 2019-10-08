function getEmailTemplate()
	{
		
		require_once('./application/libraries/mandrill-api/Mandrill.php');
		try 
		{
			$mandrill = new Mandrill('PUT API KEY HERE');
			$name = 'Generic';
			$result = $mandrill->templates->info($name);
			return $result['code'];
			
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
			$mandrill = new Mandrill('PUT EBS API KEY HERE');
			$message = array(
					'html' => $html_email,
					'text' => 'Please view this message in an HTML compatible viewer',
					'subject' => $subject,
					'from_email' => 'noreply@jollof.com',
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