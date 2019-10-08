<?php
class Session_model extends CI_Model
{
    function __construct()
    {
            parent::__construct();
            $this->load->model('oye/Role_assignment');
    }
    function validate($controllerName)
    {
                //ensure user has the needed permition to access the method
                $permitted = $this->Role_assignment->roleAccess($_SESSION['Role_id'], $controllerName);
                if($permitted == true)
                {
                        $returnValue = 'true';
                        return $returnValue;
                }
                else
                {
                    return "false";
                    /*redirect('dashboard');
                    
                    echo "<script type='javascript/text'>
                        alert('There are no fields to generate a report');
                        window.location.href='" .base_url(). "admin/ahm/panel';  
                        </script>";
                     * 
                     */
                }
                    
    }
    public function set_session($session_data)
    {
        $sess_data = array(
                            'User_id' => $session_data['User_id'],
                            'first_name' => $session_data['firstname'],
                            'last_name' => $session_data['lastname'],
                            'Email' => $session_data['email'],
                            'Type' => $session_data['Type'],
                            'logged_in' => TRUE,
                            );
        $this->session->set_userdata($sess_data);
    }
}