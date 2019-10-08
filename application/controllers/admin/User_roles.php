<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_role extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('validate_session','valSessObj');
		$this->load->model('role_assignments', 'roleAssign');
		$this->load->model('users', 'userObj');
		$this->load->model('system_modules', 'sysModule');
		$this->load->model('user_roles', 'userRole');
	}
	function index($page=0, $message_type='', $message='')
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			$data['breadCrumbs'] = '<li>User Roles Management</li>';
			$data['pageheader'] = "User Roles";
			$data['pageTabTitle'] = 'View, add and edit user roles';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "userroles";
			
			$data['pageTabTitle'] = 'User Roles';
			$data['userRoles'] = $this->userRole->getAll($this->session->userdata('stationID'));
			$data['totalrecords'] = count($data['userRoles']);
			$data[$message_type] = $message;
			// Load the view page
			$data['content_file'] = 'user_roles';
			$this->load->view('admin_views/layout', $data);
		}
	}
	function loadForm($roleID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			if($roleID==0)
				$data['systemModules'] = $this->sysModule->getAll();
			else{
				$data = $this->userRole->getByID($roleID, $this->session->userdata('stationID'));
				$data['systemModules'] = $this->sysModule->getSpecial($roleID);
			}
			$data['roleID'] = $roleID;
			
			$data['breadCrumbs'] = '<li><a href="'.site_url('user_role').'">User Roles Management</a></li><li class="active">Role Permissions</li>';
			$data['pageheader'] = "User Roles";
			$data['pageTabTitle'] = 'View, add and edit user roles';
			$data['mainmenu'] = "usermanagement";
			$data['submenu'] = "userroles";
			
			$data['pageTabTitle'] = 'Add/Edit User Role';
			
			// Load the view page
			$data['content_file'] = 'role_assignment_form';
			$this->load->view('admin_views/layout', $data);
		}
	}
	function saveData($roleID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			$data = array('roleName'=>$this->input->post('roleName'), 'status'=>$this->input->post('status'));
			$roleData = $this->userRole->getByID($roleID, $this->session->userdata('stationID'));
			if($roleData != false){
				//Ensure the role 
				//Perform edit of the user role information
				//$this->userRole->edit($data, $roleID, $this->session->userdata('stationID'));
				//Process the role permission data
				$appModules = $this->sysModule->getSpecial($roleID);
				if($appModules != false){
					for($i=0; $i<count($appModules); $i++)
					{
						$moduleID = $this->input->post('mod'.$i);
						if($moduleID != false && $moduleID != NULL && $moduleID != '')
						{
							$isAssigned = $this->roleAssign->roleAssignmentStatus($roleID, $moduleID);
							if($isAssigned == false)
								$this->roleAssign->add(array('moduleID'=>$moduleID, 'roleID'=>$roleID));
						}
						else
						{
							$isAssigned = $this->roleAssign->roleAssignmentStatus($roleID, $appModules[$i]['moduleID']);
							if($isAssigned == true && $roleID != 1)
								$this->roleAssign->delete($appModules[$i]['moduleID'], $roleID);
						}
					}
				}
				//Load index page with the success message
				$msg = 'User role information has been editted successfully';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user_role/index");
				
			}
			else 
			{
				//Enter the user role information
				$this->userRole->add($data);
				//Retrieve the role information
				$roleInfo = $this->userRole->getByName($data['roleName']);
				if($roleInfo != false){
					$roleID = $roleInfo['roleID'];
				}
				//Process the role permission data
				$appModules = $this->sysModule->getSpecial($roleID);
				if($appModules != false){
					for($i=0; $i<count($appModules); $i++){
						$moduleID = $this->input->post('mod'.$i);
						if($moduleID != false && $moduleID != NULL && $moduleID != ''){
							$this->roleAssign->add(array('moduleID'=>$moduleID, 'roleID'=>$roleID));
						}
					}
				}
				//Load index page with the success message
				$msg = 'User Role information has been added successfully';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user_role/index");
			}
		}
	}
	function delete($roleID=0)
	{
		$sess = $this->valSessObj->validate(__METHOD__);
		if($sess == 'ok')
		{
			//Ensure the role is not the superadmin role
			if($roleID == 1)
			{
				$errormsg='The super administrator role cannot be deleted from the system.';
				$this->index(0, 'msg_error', $errormsg);
				return;
			}
			//Check if there are aircraft with the components before allowing deletion
			$users = $this->userObj->getByRole($roleID);
			if($users == false)
			{
				$this->userRole->delete($roleID);
				$this->roleAssign->revokeRole($roleID);
				//Log the user action in the system audit
				$action = 'User deleted user role information record with ID: '.$roleID;
				$auditLog = array('actionType'=>'Data Deletion','actionPerformed'=>$action,'userID'=>$this->session->userdata('userID'));
				$this->auditObj->add($auditLog);
				//Load index page with the success message
				$msg = 'User role information deleted successfully';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user_role/index");
			}
			else
			{
				$msg = 'This data cannot be deleted because there are other users attached to this role';
				$flash = array("success"=>true, 'message'=>$msg);
				$this->session->set_flashdata($flash);
				redirect("user_role/index");
			}
		}
	}
}
?>