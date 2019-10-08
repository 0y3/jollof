<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Validate_session extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('role_assignment', 'roleAssign');
	}
	function validate($controllerName)
	{
		if($this->session->userdata('loggedIn') == true)
		{
			$query = $this->db->get_where('users', array('userID'=>$this->session->userdata('userID')));
			if($query->num_rows() > 0){
				//ensure user has the needed permition to access the method
				$permitted = $this->roleAssign->roleAccess($this->session->userdata('userRole'), $controllerName);
				if($permitted == true){
					$returnValue = 'ok';
					return $returnValue;
				}
				else
					redirect('dashboard/accessDenied');
			}
			else
				redirect('login/index/sessiontimeout');
		}
		else
			redirect('login/index/sessiontimeout');
	}
	
	// Validate a fashion admin user login
	function validateFashion($controllerName)
	{
	    if($this->session->fashionAdmin == true)
	    {
	        $query = $this->db->get_where('users', array('id'=>$this->session->User_id));
	        if($query->num_rows() > 0)
	        {
	            if($controllerName == "Dashboard::index")
	            {
	                return true;
	            }
	            //ensure user has the needed permition to access the method
	            $permitted = $this->roleAssign->roleAccess($this->session->Role_id, $controllerName);
	            if($permitted == true){
	                return true;
	            }
	            else
	                redirect('fashionadmin/dashboard/accessdenied');
	        }
	        else
	            redirect('fashionadmin/index');
	    }
	    else
	        redirect('fashionadmin/index/index/sessiontimeout');
	}
	
	// Validate a cusine admin user login
	function validateCuisine($controllerName)
	{
	    if($this->session->cuisineAdmin == true)
	    {
	        $query = $this->db->get_where('users', array('id'=>$this->session->User_id));
	        if($query->num_rows() > 0)
	        {
	            if($controllerName == "Dashboard::index")
	            {
	                return true;
	            }
	            //ensure user has the needed permition to access the method
	            $permitted = $this->roleAssign->roleAccess($this->session->Role_id, $controllerName);
	            if($permitted == true){
	                return true;
	            }
	            else
	                redirect('cuisineadmin/dashboard/accessdenied');
	        }
	        else
	            redirect('cuisineadmin/index');
	    }
	    else
	        redirect('cuisineadmin/index/index/sessiontimeout');
	}

	// Validate a cusine admin user login
	function validateJollofadmin($controllerName)
	{
	    if($this->session->jollofAdmin == true)
	    {
	        $query = $this->db->get_where('admin_users', array('id'=>$this->session->User_id));
	        if($query->num_rows() > 0)
	        {
	            if($controllerName == "Dashboard::index")
	            {
	                return true;
	            }
	            //ensure user has the needed permition to access the method
	            $permitted = $this->roleAssign->roleAccess($this->session->Role_id, $controllerName);
	            if($permitted == true){
	                return true;
	            }
	            else
	                redirect('jollofadmin/dashboard/accessdenied');
	        }
	        else
	            redirect('jollofadmin/index');
	    }
	    else
	        redirect('jollofadmin/index/index/sessiontimeout');
	}
	
	function validatePublic()
	{
		if($this->session->forcepasswordchange == 1)
		{
			$flash = array('warning'=>true, 'message'=>"You must change your password before you can continue using this application");
			$this->session->set_flashdata($flash);
			redirect("dashboard/forcepasswordform");
		}
			
		if($this->session->userdata('loggedIn') == true)
		{
			$query = $this->db->get_where('users', array('userID'=>$this->session->User_id));
			if($query->num_rows() > 0){
				$returnValue = 'ok';
				return $returnValue;
			}
			else
            {
				redirect('login/index/sessiontimeout');
            }
		}
		else
                {
			redirect('login/index/sessiontimeout');
                }
	}
	function accessible($controllerName, $site_type_id=NULL)
	{
            if ($this->session->userdata('loggedIn') == true) 
            {
                $permitted = $this->roleAssign->roleAccess($this->session->userRole, $controllerName);
                if ($permitted == true) {
                    $returnValue = 'ok';
                    return $returnValue;
                } 
                else
                {
                    return 'no';
                }
            }
            else 
            {
                redirect('login/index/sessiontimeout');
            }
    }

    function accessibleJollofAdmin($controllerName, $site_type_id=NULL)
	{
            if ($this->session->jollofAdmin == true) 
            {
                $permitted = $this->roleAssign->roleAccess($this->session->Role_id, $controllerName);
                if ($permitted == true) {
                    $returnValue = 'ok';
                    return $returnValue;
                } 
                else
                {
                    return 'no';
                }
            }
            else 
            {
                redirect('jollofadmin/index/sessiontimeout');
            }
    }
    
    function hasPermission($controllerName, $site_type_id=NULL)
	{
	    $permitted = $this->roleAssign->roleAccess($this->session->Role_id, $controllerName);
	    return $permitted;
	}
}
?>