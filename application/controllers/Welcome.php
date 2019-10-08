<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('admin_views/login_page');
	}
	
	public function test()
	{
		$this->load->view('admin_views/email_format');
	}
	
	public function passwordreset($status=0)
	{
		if($status == 1)	
			$data['message'] = "Your password has been reset successfully! A new password has been sent to your account email.";
		else if($status == 100)
			$data['message'] = "Your password reset request has expired.";
		else
			$data['message'] = "Your password reset was not successful.";
		
		$data['title'] = "Password Reset";
		$this->load->view('admin_views/generic_message', $data);
	}
}
