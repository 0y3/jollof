<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('role_assignments', 'roleAssign');
		$this->load->model('users', 'userObj');
		$this->load->model('system_modules', 'sysModule');
		$this->load->model('user_roles', 'userRole');
		$this->load->model('generic');
		$this->load->model('system_audit', 'audit');
		$this->load->model('merchants', 'merchant');
		$this->load->model('notifications', 'notification');
		$this->load->model('utilities', 'utility');
	}
	function index($page=0, $message_type='', $message='')
	{
            $this->valSessObj->validate(__METHOD__);
		
                        $data['breadCrumbs'] = '<li class="active">Users Managment</li>';
                        $data['pageheader'] = "Users";
			$data['pageTabTitle'] = 'View, add and edit users';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			
			$data['pageTabTitle'] = 'View, add, edit and delete Users';
			$data['pageheader'] = "User Management";
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			$data['users'] = $this->userObj->getAll();
			$data[$message_type] = $message;
			
			$data['totalrecords'] = count($data['users']);
			// Specify the content file and load the view
			$data['content_file'] = 'users';
			$this->load->view('admin_views/layout', $data);
	}
	function loadForm($userID=0, $xdata=NULL, $message_type='', $message='')
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			if($userID != 0)
			{
				$data = $this->userObj->getByID($userID);
				if($data != false && $data['accesstype'] == 2)
				{
					$storedata = $this->generic->getByID($data['merchantid'], "merchants");
					$data['pharmacyid'] = $storedata['pharmacyid'];
					$data['merchants'] = $this->merchant->listAllStores(array("pharmacyid"=>$data['pharmacyid']));
				}
			}
			
			if($xdata != NULL)
				$data = $xdata;
			
			$data['userRoles'] = $this->userRole->getActive();
			$data['userID'] = $userID;
			$data[$message_type] = $message;
			
			$data['breadCrumbs'] = '<li><a href="'.site_url('user').'" title="Users">Users</a></li><li class="active">User Entry Form</li>';
			$data['pageheader'] = "Users";
			$data['pageTabTitle'] = 'View, add and edit users';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			
			$data['pageTabTitle'] = 'View, add, edit and delete Users';
			$data['pageheader'] = "User Management";
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			
			$data['pharmacies'] = $this->generic->getAll("pharmacies", NULL, null, null, null, "pharmacyname", 'asc');
			
			// Specify the content file and load the view
			$data['content_file'] = 'user_form';
			$this->load->view('admin_views/layout', $data);
		}
	}
	function saveData($userID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			$data = array(
					'firstname'=>$this->input->post('firstname'), 
					'lastname'=>$this->input->post('lastname'), 
					'phonenumber'=>$this->input->post('phonenumber'),
					'userroleid'=>$this->input->post('userRole'), 
					'email'=>$this->input->post('email'), 
					'merchantid'=>$this->input->post('merchantid'), 
					'username'=>$this->input->post('username'),
					'accesstype'=>$this->input->post('accesstype'),
					'userstatus' => 1
			);
			
			// Perform form validations
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			
			if($userID == 0)
			{
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
			}
			else 
			{
				$userData = $this->userObj->getByID($userID);
				if($userData != false && $userData['username'] != $data['username'])
					$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				// Load the error into the default handler
				$this->session->set_flashdata(array('warning' => true, 'message' => validation_errors()));
				// redirect back to the customer add form
				redirect("user/loadForm/$userID");
			}
			
			$userData = $this->userObj->getByID($userID);
			if($userData != false)
			{
				$data['updatedat'] = date("Y-m-d H:i:s");
				//Perform edit of the user role information
				$this->userObj->edit($userID, $data);
				
				// Notify the user of the account if username was modified
				if($userData != false && $userData['username'] != $data['username'])
				{
					$account_type = "Web/Admin Account";
					if($data['accesstype'] == 2)
					{
						$merchantdetails = $this->generic->getByID($data['merchantid'], "merchants");
						$account_type = "Store POS User - " . @$merchantdetails['merchantname'];
					}
					
					$plain_password = $this->input->post('password');
					$email_message = "Your Jollof CuisineS account details have been updated. The details are as shown below. <br />Username: $data[username]<br />";
					$email_message .= "Account Type: $account_type<br />Account Status: Active";
					$email_message = $this->load->view('email_format', array('name'=>$data['firstname'], 'message'=>$email_message), TRUE);
					// send the email
					$this->notification->sendEmail($email_message, $data['email'], "Your Username Has Been Modified");
				}
				
				//Log the user action in the system audit
				$action = 'User edited user information record with UserID: '.$userID;
				$auditLog = array('actionType'=>'Data Edit','actionPerformed'=>$action,'userID'=>$this->session->userID);
				$this->audit->add($auditLog);
				//Load index page with the success message
				$msg = 'User role information has been editted successfully';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user/index");
			}
			else
			{
				$account_type = "Web/Admin Account";
				if($data['accesstype'] == 2)
				{
					$merchantdetails = $this->generic->getByID($data['merchantid'], "merchants");
					$account_type = "Store POS User - " . @$merchantdetails['merchantname'];
				}
				$data['createdat'] = date("Y-m-d H:i:s");
				$data['password'] = md5($this->input->post('password'));
				//Enter the user role information
				$userid = $this->generic->add($data, 'users');
				//Log the user action in the system audit
				$action = 'User created new user record: '.$data['username'];
				$auditLog = array('actionPerformed'=>$action,'userID'=>$this->session->userID);
				$this->audit->add($auditLog);
				
				// Notify the user of the account creations
				$plain_password = $this->input->post('password');
				$email_message = "An account has been created for you on the Jollof CuisineS Admin platform, the details of your account are as shown below";
				$email_message .= "<br /><strong>Username</strong>: $data[username]<br /><strong>Password</strong>: $plain_password<br />";
				$email_message .= "<strong>Account Type</strong>: $account_type<br /><strong>Account Status</strong>: Activated";
				$email_message = $this->load->view('email_format', array('name'=>$data['firstname'], 'message'=>$email_message), TRUE);
				// send the email
				$this->notification->sendEmail($email_message, $data['email'], "New Account Created");
				//Load index page with the success message
				$msg = 'User information has been added successfully';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user/index");
			}
		}
	}
	function delete($userID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			//Ensure the user is not the currently logged in user
			if($userID == $this->session->userID)
			{
				$msg = 'This is the current logged on user; You cannot delete yourself';
				$flash = array("error"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user/index");
			}
			
			// Set the deleted at field to the current date and time
			$this->userObj->edit($userID, array('deletedat'=>date("Y-m-d H:i:s")));
			//Log the user action in the system audit
			$action = 'User deleted user information record with ID: '.$userID;
			$auditLog = array('actionType'=>'Data Deletion','actionPerformed'=>$action,'userID'=>$this->session->userID);
			$this->audit->add($auditLog);
			//Load index page with the success message
			$msg = 'User information deleted successfully';
			$flash = array("success"=>true, 'message'=>$msg);
			$this->session->set_flashdata($flash);
			redirect("user/index");
			
		}
	}
	
	function deactivate($userID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		
		//Ensure the user is not the currently logged in user
		if($userID == $this->session->userID)
		{
			$errormsg='This is the current logged on user; You cannot deactivate a logged on account';
			// Prepare messgae
			$flash = array('msg'=>'yes', 'type'=>'error', 'message'=>$errormsg);
			$this->session->set_flashdata($flash);
			redirect('user/index');
		}
		$this->userObj->edit($userID, array('userstatus'=>0));
		//Log the user action in the system audit
		$action = 'Deactivated user account with ID: '.$userID;
		$auditLog = array('actionType'=>'Account Deactivation','actionPerformed'=>$action,'userID'=>$this->session->userID);
		$this->audit->add($auditLog);
		// Prepare messgae
		$flash = array('success'=>true, 'message'=>'User account has been deactivated');
		$this->session->set_flashdata($flash);
		redirect('user/index');
		
	}
	
	function activate($userID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		$userdata = $this->userObj->getByID($userID);
		if($userdata != false)
		{
			$this->userObj->edit($userID, array('userstatus'=>1, 'forcepasswordchange'=>1));
			//Log the user action in the system audit
			$action = 'Activated user account with ID: '.$userID;
			$auditLog = array('actionType'=>'Data Deletion','actionPerformed'=>$action,'userID'=>$this->session->userID);
			$this->audit->add($auditLog);
			// Notify the user of the account activation
			$plain_password = $this->input->post('password');
			$email_message = "Your account on the Jollof CuisineS Admin platform has been activated successfully. <br /><strong>Username:</strong> $userdata[username]";
			$email_message .= "<br /><strong>Account Status:</strong> Active";
			$email_message = $this->load->view('email_format', array('name'=>$userdata['firstname'], 'message'=>$email_message), TRUE);
			$this->notification->sendEmail($email_message, $userdata['email'], "Your Account Has Been Activated!");
			
			// Prepare messgae
			$flash = array('success'=>true, 'message'=>'User account has been activated');
			$this->session->set_flashdata($flash);
		}
		
		redirect('user/index');
	}
	
	public function resetpasswordform($userID = 0)
	{
		$sess = $this->valSessObj->validate("User::resetpassword");
		
		$data = $this->userObj->getByID($userID);
		if($data != false)
		{
			$data['userID'] = $userID;
				
			$data['breadCrumbs'] = '<li><a href="'.site_url('user').'" title="Users">Users</a></li><li class="active">User Password Reset</li>';
			$data['pageheader'] = "Reset Password";
			$data['pageTabTitle'] = 'View, add and edit users';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
				
			$data['pageTabTitle'] = 'View, add, edit and delete Users';
			$data['pageheader'] = "User Management";
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "users";
			// Specify the content file and load the view
			$data['content_file'] = 'user_password_reset';
			$this->load->view('admin_views/layout', $data);
		}
		else
		{
			// Prepare messgae
			$flash = array('error'=>true, 'message'=>'User account does not exist');
			$this->session->set_flashdata($flash);
			redirect('user/index');
		}
	}
	public function resetpassword($userID=0)
	{
		$this->valSessObj->validate(__METHOD__);
		
		$userData = $this->userObj->getByID($userID);
		if($userData != false)
		{
			//Edit password if necessary
			$changePwd = $this->input->post('password');
			$confirmPwd = $this->input->post('confirmpassword');
			if($changePwd != NULL && $changePwd != '' && strlen($changePwd) > 0)
			{
				if($changePwd == $confirmPwd)
				{
					// Force the user to reset upon next login
					$this->userObj->edit($userID, array('forcepasswordchange'=>1, 'password'=>md5($changePwd)));
					//Log the user action in the system audit
					$action = 'User reset password information record for UserID: '.$userID." was initiated.";
					$auditLog = array('actionType'=>'Password Reset','actionPerformed'=>$action,'userID'=>$this->session->userID);
					$this->audit->add($auditLog);
					
					// Notify the user via email of the password reset
					$plain_password = $this->input->post('password');
					$email_message = "Your account on the Jollof CuisineS Admin platform password has been reset by the administrator";
					$email_message .= "<br /><strong>New Password</strong>: $plain_password<br />";
					$email_message = $this->load->view('email_format', array('name'=>$userData['firstname'], 'message'=>$email_message), TRUE);
					// send the email
					$this->notification->sendEmail($email_message, $userData['email'], "Account Password Reset");
						
					// Prepare messgae
					$flash = array('success'=>true, 'message'=>'User password has been reset successfully');
					$this->session->set_flashdata($flash);
					redirect("user");
				}
				else 
				{
					//Prepare message
					$flash = array('error'=>true, 'message'=>'New password and confirm password do not match.');
					$this->session->set_flashdata($flash);
					redirect("user");
				}
			}
			else
			{
				//Prepare message
				$flash = array('error'=>true, 'message'=>'Your password reset inputs were empty.');
				$this->session->set_flashdata($flash);
				redirect("user");
			}
		}
		else
		{
			// Prepare messgae
			$flash = array('error'=>true, 'message'=>'User account does not exist');
			$this->session->set_flashdata($flash);
			redirect('user/index');
		}
	}
	
	// Controller function to display upload form
	public function upload()
	{
		$this->valSessObj->validate(__METHOD__);
		
		$data['sample_link'] = base_url().'assets/formats/sample_user.csv';
		$data['breadCrumbs'] = '<li><a href="'.site_url('user').'" title="Users">Users</a></li><li class="active">Upload Users</li>';
		$data['pageheader'] = "Bulk Upload Users";
		$data['pageTabTitle'] = 'Create, edit and delete users';
		$data['mainmenu'] = "usermanagement";
		$data['submenu'] = "users";
		
		// Load the view page
		$data['content_file'] = 'user_upload_form';
		$this->load->view('admin_views/layout', $data);
	}
	
	// Controller function to process store uploads
	public function processupload()
	{
		$this->valSessObj->validate("User::upload");
		
		$tempLocation = $_FILES['userfile']['tmp_name'];
		$fileContents = $this->utility->uploadCSV($tempLocation);
		$not_found = ''; $totalnew = 0; $totalupdated = 0;
		//var_dump($fileContents);
		for($i=1; $i<count($fileContents); $i++)
		{
			if(isset($fileContents[$i][7]) && trim($fileContents[$i][0]) != '' && trim($fileContents[$i][7]) != '')
			{
				$data['createdat'] = date("Y-m-d H:i:s");
				$data['userstatus'] = 1;
				$data['firstname'] = trim($fileContents[$i][0]);
				$data['lastname'] = trim($fileContents[$i][1]);
				$data['phonenumber'] = trim($fileContents[$i][2]);
				$data['email'] = trim($fileContents[$i][3]);
				$data['userroleid'] = trim($fileContents[$i][4]);
				$data['username'] = trim($fileContents[$i][5]);
				$data['password'] = trim($fileContents[$i][6]);
				$data['accesstype'] = trim($fileContents[$i][7]);
				
				$storename = trim($fileContents[$i][8]);
				$plain_password = $data['password'];
				
				$data['password'] = md5($plain_password);
				// Phone number must be 11 digits
				if(strlen($data['phonenumber']) != 11)
				{
					continue;
				}
				
				// Email address must be valid
				$this->load->helper('email');
				if(!valid_email($data['email']))
				{
					continue;
				}
				
				if(strtolower($data['accesstype']) == "pos user")
				{
					$data['accesstype'] = 2;
					$data['merchantid'] = trim($fileContents[$i][8]);
					// Ensure the specified pharmacy exists
					$storedata = $this->generic->getByFieldSingle("merchantname", $data['merchantid'], "merchants", "merchants.id");
					if($storedata== false)
					{
						continue;
					}
					$data['merchantid'] = $storedata['id'];
				}
				else 
				{
					$data['accesstype'] = 1;
				}
				
				// Ensure the specified role exists
				$roledata = $this->generic->getByFieldSingle("roleName", $data['userroleid'], "user_roles", "user_roles.roleID");
				if($roledata== false)
				{
					continue;
				}
				$data['userroleid'] = $roledata['roleID'];
				
				// Ensure the specified user does not already exists
				$user_exists = $this->generic->getByFieldSingle("username", $data['username'], "users", "users.username");
				if($user_exists!= false)
				{
					continue;
				}
				
				// Create the store
				$this->generic->add($data, 'users');
				
				$account_type = "Web/Admin Account";
				if($data['accesstype'] == 2)
				{
					$account_type = "Store POS User - $storename";
				}
				
				$email_message = "An account has been created for you on the Jollof CuisineS Admin platform, the details of your account are as shown below";
				$email_message .= "<br /><strong>Username</strong>: $data[username]<br /><strong>Password</strong>: $plain_password<br />";
				$email_message .= "<strong>Account Type</strong>: $account_type<br /><strong>Account Status</strong>: Activated";
				$email_message = $this->load->view('email_format', array('name'=>$data['firstname'], 'message'=>$email_message), TRUE);
				// send the email
				$this->notification->sendEmail($email_message, $data['email'], "New Account Created");
				
				$totalnew++;
			}
		}
		
		// Load index page with the success message
		$displaymessage = array('message'=>"Users have been uploaded successfully. Total successful entries: $totalnew", 'success'=>true);
		$this->session->set_flashdata($displaymessage);
		// Redirect back to the index
		redirect('user');
	}
}
?>