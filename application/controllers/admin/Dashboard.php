<?PHP
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('user');		
		$this->load->model('system_audit', 'audit');
		$this->load->model('generic');
		$this->load->model('restaurant');
		$this->load->model('transaction');
		$this->load->model('utility');
		$this->load->model('account');
	}
	
	function index($existing_search=0)
	{
		$this->valSessObj->validatePublic();
		
		$filterparams = array();
		$query_params = array();
		
		if($this->input->post() && $existing_search == 0)
		{
			$filterparams['merchantid'] = $this->input->post('merchantid');
			$filterparams['pharmacyid'] = $this->input->post('pharmacyid');
			$filterparams['createdat'] = $this->input->post('createdat');
			$filterparams['productid'] = $this->input->post('productid');
				
			$this->session->set_flashdata(array(
					'search_merchantid' => $filterparams['merchantid'],
					'search_pharmacyid' => $filterparams['pharmacyid'],
					'search_createdat' => $filterparams['createdat'],
					'search_productid' => $filterparams['productid']
			));
			$existing_search = 1;
		}
		else if($existing_search == 1)
		{
			$filterparams['merchantid'] = $this->session->flashdata('search_merchantid');
			$filterparams['pharmacyid'] = $this->session->flashdata('search_pharmacyid');
			$filterparams['createdat'] = $this->session->flashdata('search_createdat');
			$filterparams['productid'] = $this->session->flashdata('search_productid');
		
			$this->session->keep_flashdata('search_merchantid');
			$this->session->keep_flashdata('search_pharmacyid');
			$this->session->keep_flashdata('search_createdat');
			$this->session->keep_flashdata('search_productid');
		}
		
		// sanitize params and only pass along the ones with data
		foreach ($filterparams as $key => $value)
		{
			if ($value != '' && $value != NULL && $value != 'all')
				$query_params[$key] = $value;
		}
		
		// Get total customers
		$data['totalcustomers'] = $this->account->getAllCount($query_params);
		// Get top merchants
		$data['top_merchants'] = $this->transaction->getTop5Merchants($query_params);
		// Get recent purchases
		$data['recent_transactions'] = $this->transaction->getRecent($query_params);
		// Set recently created customers
		$data['recent_customers'] = $this->account->getRecent($query_params);
		// Get and set the top 5 customers
		$data['top_customers'] = $this->transaction->getTop5Customers($query_params);
		// Get total count of pharmacies
		// Get total stores
		$data['total_merchants'] = $this->restaurant->getAllCount($query_params);
		
		// These other data need dates to be restricted to MTD
		if(!isset($query_params['createdat']))
			$query_params['createdat'] = date("m/01/y") . "-" . date("m/d/Y");
		
		// Unset created at for the next sets
		unset($query_params['createdat']);
		
		$data['filterparams'] = $filterparams;
		$data['mainmenu'] = "dashboard";
		// Load the view page
		$data['content_file'] = "admin_home";
		$this->load->view('admin_views/layout', $data);
	}

	
	function myaccount()
	{
		$this->valSessObj->validatePublic();
		$data = $this->user->getByID($this->session->userID);
		if($data != false)
		{
			$data['breadCrumbs'] = '<li class="active">My Profile</li>';
			$data['pageTabTitle'] = 'Update my account settings';
			$data['pageheader'] = "My Profile";
			$data['mainmenu'] = "dashboard";
			$data['submenu'] = null;
			
			$data['content_file'] = 'user_profile';
			$this->load->view('admin_views/layout', $data);
		}
		else
		{
			$this->session->sess_destroy();
			$data['status'] = 'You do not have a valid session, please login to continue';
			$this->load->view('admin_views/login_page', $data);
		}
	}
	function updateprofile()
	{
		$sess = $this->valSessObj->validatePublic();
		if($sess == 'ok')
		{
			$updateData = array(
					'firstname'=>$this->input->post('firstname'),  
					'lastname'=>$this->input->post('lastname'), 
					'email'=>$this->input->post('email'), 
					'phonenumber'=>$this->input->post('phonenumber')
			);
			$data = $this->user->getByID($this->session->userID);
			if($data != false)
			{
				$this->user->edit($this->session->userID, $updateData);
				// redirect away
				$flash = array('success'=>true, 'message'=>"Your profile information has been edited successfully!");
				$this->session->set_flashdata($flash);
				redirect("dashboard/myAccount");
			}
			else
			{
				$this->session->sess_destroy();
				$flash = array('success'=>true, 'message'=>"You do not have a valid session, please login to continue");
				$this->session->set_flashdata($flash);
				redirect("login/index");
			}
		}
	}
	
	function changepasswordform()
	{
		$sess = $this->valSessObj->validatePublic();
		if($sess == 'ok')
		{
			$data['breadCrumbs'] = '<li class="active">Change Password</li>';
			$data['pageheader'] = "Change Password";
			$data['pageTabTitle'] = 'Change you account password';
			$data['mainmenu'] = "dashboard";
			$data['submenu'] = null;
			
			// Load the view page
			$data['content_file'] = 'change_password';
			$this->load->view('admin_views/layout', $data);
		}
	}
	
	function changepassword()
	{
		$sess = $this->valSessObj->validatePublic();
		if($sess == 'ok')
		{
			$oldpassword = $this->input->post('oldpassword');
			$oldpassword = md5($oldpassword);
			$newpassword = $this->input->post('newpassword');
			$repassword = $this->input->post('repassword');
			$userdata = $this->user->getByID($this->session->userID);
			if($userdata != false)
			{
				if($userdata['password'] == $oldpassword)
				{
					if($newpassword == $repassword)
					{
						$updateData['password'] = md5($newpassword);
						$this->user->edit($this->session->userID, $updateData);
						//Log the user action in the system audit
						$action = 'User updated own password';
						
						$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userID);
						$this->audit->add($auditLog);
						//End of audit trail log code
						$data['msg_flash'] = 'Password has been changed successfully';
						$data['breadCrumbs'] = '<li>Change Password</li>';
						// Load the view page
						$data['content_file'] = 'change_password';
						$this->load->view('admin_views/layout', $data);
					}
					else
					{
						$data['msg_error'] = 'The new password and re-password do not match';
						$data['breadCrumbs'] = '<li>Change Password</li>';
						// Load the view page
						$data['content_file'] = 'change_password';
						$this->load->view('admin_views/layout', $data);
					}
				}
				else{
					$data['status'] = 'You entered an incorrect password. You have beeen signed out!';
					$this->load->view('admin_views/login_page', $data);
				}
			}
			else{
				$data['status'] = 'You information could not be found, you have been signed out!';
				$this->load->view('admin_views/login_page', $data);
			}
		}
	}
	
	function signout()
	{
		//Log the user action in the system audit
		$action = 'User log out of the system';
		$sid = $this->session->userdata('stationID');
		$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userID);
		$this->audit->add($auditLog);
		//End of audit trail log code
		$this->session->sess_destroy();
		$pageData['msg_flash'] = 'You have successfully signed out of the application.';
		$this->load->view('admin_views/login_page', $pageData);
	}
	
	function accessdenied()
	{
		$this->load->view('admin_views/access_denied');
	}
	
	
	function forcepasswordform()
	{
		if($this->session->userdata('loggedIn') == true)
		{
			$data['breadCrumbs'] = '<li class="active">Change Password</li>';
			$data['pageheader'] = "Choose a new password";
			$data['pageTabTitle'] = 'Change you account password';
			$data['mainmenu'] = "dashboard";
			$data['submenu'] = null;
			
			// Load the view page
			$data['content_file'] = 'change_password_force';
			$this->load->view('admin_views/layout', $data);
		}
	}
	
	function forcepasswordchange()
	{
		if($this->session->userdata('loggedIn') == true)
		{
			$newpassword = $this->input->post('newpassword');
			$repassword = $this->input->post('repassword');
			$userdata = $this->user->getByID($this->session->userID);
			if($userdata != false)
			{
				if($newpassword == "")
				{
					redirect("dashboard/forcepasswordform");
				}
				
				if($newpassword == $repassword)
				{
					$updateData['password'] = md5($newpassword);
					$updateData['forcepasswordchange'] = 0;
					$this->user->edit($this->session->userID, $updateData);
					//Log the user action in the system audit
					$action = 'User was forced to reset password';
	
					$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userID);
					$this->audit->add($auditLog);
					//End of audit trail log code
					
					// Log the user out and redirect
					redirect("login/index/passwordchange");
				}
				else
				{
					$data['msg_error'] = 'The new password and re-password do not match';
					$data['breadCrumbs'] = '<li>Choose a new password</li>';
					$data['pageheader'] = "Change Password";
					$data['pageTabTitle'] = 'Change you account password';
					// Load the view page
					$data['content_file'] = 'change_password_force';
					$this->load->view('admin_views/layout', $data);
				}
			}
			else
			{
				$data['status'] = 'You information could not be found, you have been signed out!';
				$this->load->view('admin_views/login_page', $data);
			}
		}
	}
}
?>