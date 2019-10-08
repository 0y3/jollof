<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	}

	
        public function _is_admin_checker()
	{
            $admin= FALSE;
            if ($admin != TRUE)
            {
                redirect('security/not_allowed');
            }
	}
        
        public function not_allowed()
	{
		echo'not allowed admin.';
	}
}
