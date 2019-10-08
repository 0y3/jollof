<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//facebook api information goes here


	//$config['api_id']       = '1980361182290100';
	//$config['api_secret']   = 'f961fa4b51fa7c18ecf62c293a5eeaa7';
        $config['api_id']       = '479355665832368';
	$config['api_secret']   = 'de347a2cf6a0902aa6f2cce9fada7d5d';
	$config['redirect_url'] = base_url('fb/user_login');  //change this if you are not using my fb controller
	$config['logout_url']   = base_url('fb/');          //User will be redirected here when he logs out.
	$config['permissions']  = array(
                                        'email', 
                                        'public_profile'
                                        

                                      );
