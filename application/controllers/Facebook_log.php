<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load library and url helper
		//$this->load->library('Facebook');
		//$this->load->helper('url');
                
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Checkout_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->helper('text');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;
		$this->load->view('examples/start');
	}

	// -------------------------------------------l-----------------------------

	/**
	 * Web redirect login example page
	 */
	public function login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->Facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,name,email');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}

		}

		// display view
		$this->load->view('examples/web', $data);
	}

        public function loginn(){
        $userData = array();

        // Check if user is logged in
        if($this->Facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            // Insert or update user data
            $userID = $this->user->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

        // Load login & profile view
        $this->load->view('examples/web', $data);
    }

        
	// ------------------------------------------------------------------------

	/**
	 * JS SDK login example
	 */
	public function js_login()
	{
		// Load view
		$this->load->view('examples/js');
	}

	// ------------------------------------------------------------------------

	/**
	 * AJAX request method for positing to facebook feed
	 */
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	// ------------------------------------------------------------------------

	/**
	 * Logout for web redirect example
	 *
	 * @return  [type]  [description]
	 */
	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('facebook/login', redirect);
	}
}
