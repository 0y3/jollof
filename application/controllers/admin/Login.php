<?PHP
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m','loginObj');
		$this->load->model('user', 'user');
		$this->load->model('user_role', 'userRole');
		$this->load->model('system_audit', 'audit');
	}
	function index($status='')
	{
		if($status=='')
			$this->load->view('admin_views/login_page');
		else if(strtolower($status) == 'loginfail')
		{
			$pageData['msg_error'] = 'Invalid username/password combination, authentication could not be performed';
			$this->load->view('admin_views/login_page', $pageData);
		}
		else if(strtolower($status) == 'sessiontimeout')
		{
			$pageData['msg_error'] = 'You have been logged out because you have been inactive for more than thirty minutes';
			$this->load->view('admin_views/login_page', $pageData);
		}
		else if(strtolower($status) == 'unauthorisedaccess')
		{
			$pageData['msg_error'] = 'You have been logged out because you have tried to access a restricted area to you user level';
			$this->load->view('admin_views/login_page', $pageData);
		}
		else if(strtolower($status) == 'incomplete')
		{
			$pageData['msg_error'] = 'You have been logged out because your station has not been fully setup please login as administrator
										to complete the setup';
			$this->load->view('admin_views/login_page', $pageData);
		}
		else if(strtolower($status) == 'expired')
		{
			$this->session->sess_destroy();
			$pageData['msg_error'] = 'Your subscription to this service has expired. Please contact the site administrators.';
			$this->load->view('admin_views/login_page', $pageData);
		}
		else if(strtolower($status) == 'passwordchange')
		{
			$this->session->sess_destroy();
			$pageData['msg_flash'] = 'Your password has been changed successfully.';
			$this->load->view('admin_views/login_page', $pageData);
		}
		
	}
	function authenticate()
	{
		//collect the user's credentials from the form
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		
		//call method to check users' authentication data
		$row = $this->loginObj->checkLogin($username, $password);
		if($row != false)
		{
			$currentIP = $_SERVER['REMOTE_ADDR'];
			//Collect the current login IP and set as the last login IP of the user
			$data['lastLoginIP'] = $currentIP;
			$this->user->edit($row['userID'], $data);
			
			//Store the user's session information
			$userSessionData = array(
					'userID'=>$row['userID'], 
					'username'=> $row['username'], 
					'lastname'=>$row['lastname'], 
					'firstname' => $row['firstname'], 
					'userID'=>$row['userID'],
					'email'=>$row['email'],
					'currentIP'=>$currentIP, 
					'loggedIn'=>true, 
					'merchantid'=>$row['merchantid'],
					'userRole' => $row['userroleid'],
					'forcepasswordchange' => $row['forcepasswordchange']
			);
			
			// Get the role details
			$roledata = $this->userRole->getByID($row['userroleid']);
			$userSessionData['userLevel'] = $roledata['roleName'];
			
			//Save session information
			$this->session->set_userdata($userSessionData);
			
			//Log the user action in the system audit
			$action = 'User logged in successfully';
			$auditLog = array('actionPerformed'=>$action, 'userID'=>$this->session->userID);
			$this->audit->add($auditLog);
			//End of audit trail log code
			
			// If there is an impending force password change on the user take him/her straight there
			if($row['forcepasswordchange'] == 1)
				redirect("admin/dashboard/forcepasswordform");
			
			//redirect user to his/her dashboard
			redirect('admin/dashboard');
		}
		else
		{
			redirect('admin/login/index/loginFail');
		}
	}
}
?>