<?php
	
	//sample authorization
	
	//Authorization: Bearer sk_test_shdjkhdj827391nV4Lid
	
	
	
	//this line is for the webhook
	
	// only a post with paystack signature header gets our attention
	if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) 
		exit();
	
	// Retrieve the request's body
	$input = @file_get_contents("php://input");
	define('PAYSTACK_SECRET_KEY','SECRET_KEY');
	
	// validate event do all at once to avoid timing attack
	if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY))
	  exit();
	
	http_response_code(200);
	
	// parse event (which is json string) as object
	// Do something - that will not take long - with $event
	$event = json_decode($input);
	
	exit();
	
	//webhook line ends here

?>