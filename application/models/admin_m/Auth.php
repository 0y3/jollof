<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Auth extends CI_Model
{
    private $DB_admin = "admin_users";
    
    
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
		
	}
        
    public function checkEmail($postemail)
        {
           $this -> db -> select('email');
           $this -> db -> from($this->DB_admin);
           $this -> db -> where('email', $postemail);
           $query = $this -> db -> get();
           return $query->result();
        }            
    public function check_Admin_login($email_m, $pwd_m){
        //$this->session->sess_destroy();
        $this->db->select('*');
        $this->db->from( $this->DB_admin );
        $this->db->where('email',$email_m);
        //$this->db->where('merchanttype','cuisine');
        //$this->db->where('Status','1');

        $Result = $this->db->get();
        $row = $Result->row();

        if ($Result->num_rows() != 1)
            {		
                return 'Email_not_Found';	
            }
        else 
            {	
                if ($row->password != $pwd_m )
                    {
                        return 'Incorrect_Password';
                    }
                else  
                    {
                        if ($row->status != 1 )
                        {
                            return 'User_Not_Active';
                        }
                        else 
                        {
                            /*
                            $sess_data = array(
                                'User_id' => $row->id,
                                'Role_id' => $row->userroleid,
                                'rest_id' => null,
                                'firstname' => $row->firstname,
                                'lastname' => $row->lastname,
                                'email' => $row->email,
                                'Type' => 'admin',
                                'jollofAdmin' => true,
                                'Type_id' => 3,
                                'merchant_id' => null,
                                'companyname' => null,
                                'avatar' => null
                            );
                            
                            // call in the method set_session inside the class session_model
                            $this->session->set_userdata($sess_data);
                           
                            //print_r( $_SESSION );die;
                            return 'logged_inn';
                            */

                            $session_datainfo = array(
                                                  'User_id' => $row->id,
                                                  'Role_id' => $row->userroleid,
                                                  'firstname' => $row->firstname,
                                                  'lastname' => $row->lastname,
                                                  'email' => $row->email,
                                                  'Type' => 'admin',
                                                  'Type_id' => 3,
                                                   'logged_in' => TRUE,

                                                  'rest_id' => null,
                                                  'jollofAdmin' => true,
                                                  'Type_id' => 3,
                                                  'merchant_id' => null,
                                                  'companyname' => null,
                                                  'avatar' => null
                                                  );

                            // call in the method set_session inside the class session_model 
                            //$this->set_session_data($session_datainfo);
                            $this->session->set_userdata($session_datainfo);
                            //print_r( $_SESSION );die;
                            return 'logged_inn';
                            


                        } // end of else if 
                    }
                

            }
            
    }
    
    
    
    
    public function set_session_data($session_data)
    {
        $sess_data = array(
                            'User_id' => $session_data['User_id'],
                            'Role_id' => $session_data['Role_id'],
                            'rest_id' => null,
                            'first_name' => $session_data['firstname'],
                            'last_name' => $session_data['lastname'],
                            'Email' => $session_data['email'],
                            'Type' => $session_data['Type'],
                            'microType_id' => null,
                            'logged_in' => TRUE,
                            );
        $this->session->set_userdata($sess_data);
    }
}
