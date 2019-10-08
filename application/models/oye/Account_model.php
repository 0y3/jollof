<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Account_model extends CI_Model
{
    private $DB_account_r = "accounts";
    private $DB_state = "states";
    private $DB_city = "state_cities";
    private $DB_address = "accountaddresses";
    private $DB_pwd_reset = "password_reset";
            
    function __construct()
        {
	
            parent::__construct();
            $this->load->model('oye/Session_model'); // call in the session model class
            $this->load->model('oye/Email_model'); // call in the emai;l model class
		
	}
    public function generate_random_string($length)
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
        }
        return $randomString;
        //echo $randomString;
    }
    
    public function _insertuser($data)
    {
        $site_email ='segun@stakle.com';
        $logo = 'jollof_logo.png';
        $sendemail = $this->Email_model->send_registration_email($data['firstname'], $data['lastname'], $data['email'], $data['token'], $site_email, $logo );
        
        if($sendemail)
        {

            $this->db->insert($this->DB_account_r, $data);
            
            if ( $this->db->affected_rows() > 0 )
            {
                // send the customer an email
                

                /*$dataa = array(
                '$fname' => $data['firstname'],
                'lname' => $data['lastname'],
                'email' => $data['email'],
                'token' => $data['token'],
                'site' => $site_email,
                'logo' => $logo
                );
                print("<pre>".print_r($dataa,true)."</pre>"); die;
                */
               //$this->Email_model->send_registration_email($data['firstname'], $data['lastname'], $data['email'], $data['token'], $site_email, $logo );
                
                return true;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
            
    }
    function _checkuser ($data)
    {
        $_id = $this->db->get_where( $this->DB_account_r , $data)->row_array(); 
        if($_id == TRUE) { return $_id['id']; }
        else {return FALSE; }
    }
    function _insertguestuser($data)
    {
        $status = $this->db->insert($this->DB_account_r, $data);
        return $this->db->insert_id();
    }
        
    // check if the token exist
    function signup_token($token)
    {
            
            $this->db->update($this->DB_account_r, array('status' => 1, 'token' => null));
            $this->db->where('token', $token);
            //$query = $this->db->get();
            //return $query->result();
            if ( $this->db->affected_rows() > 0 )
            {
                return TRUE;
            }
            else
            {

                 return FALSE;	
            }

    }
        
    public function _address($data) 
    { 
       $this->db->insert($this->DB_address, $data);
            
        if ( $this->db->affected_rows() > 0 )
        {
            $_id = $this->db->get_where($this->DB_address , $data)->row()->id; // get the id of save db
            return $_id;
        }
        
       
    }
    public function get_state_where() 
        {
            //$query = $this->db->get_where($this->DB_state, array('id' => (int)$by_id),1);
            //var_dump($query->result());
            //return $query->result();
            
            $this->db->select('id,statename')
                 ->from($this->DB_state)
                 ->where('status',1)
                 ->where('isdeleted',0)
                 ->order_by(" statename", 'ASC');
            
            $query = $this->db->get();
            return $query->result();
            //return $query->result_array();
            
        }
    public function get_city_where($by_id) 
        {
            
            $this->db->select('*')
                 ->from($this->DB_city)
                 ->where('stateid',(int)$by_id)
                 ->where('status',1)
                 ->where('isdeleted',0)
                 ->order_by(" cityname", 'ASC');
            
            $query = $this->db->get();
            return $query->result();
            
        }
        
                
    public function _insertuser_email($data)
    {

        // send the customer an email
        $site_email ='trivin98@gmail.com';
        $logo = 'jol.png';
        $this->Email_model->send_registration_email($data['firstname'], $data['lastname'], $data['email'], $site_email, $logo );

        return true;
    }
    
    public function get_user_id($email) {

    $this->db->where('email', $email)
    ->where('usertype','user')
    ->where('isdeleted',0);
        $query = $this->db->get($this->DB_account_r);
        if($query->num_rows() > 0)
        {
                foreach($query->result() as $row)
                {
                        return $row->id;	
                }
        }
    }
    public function get_user_info($id)
    {
        $query = $this->db->get_where($this->DB_account_r, array(
                                                        'id' => (int)$id,
                                                        'isdeleted' =>'0'
                                                            )
                                                        );
        return $query->row();
    }
    
    public function get_psswd_reset_cust($email)
    {
            $this->db->where('email', $email);
            $query = $this->db->get($this->DB_account_r);
            if($query->num_rows() > 0)
            {
                    foreach($query->result() as $row)
                    {
                            return ucfirst($row->firstname).' '.ucfirst($row->lastname);	
                    }
            }

    }
        
    public function reset_passwordtoken($token,$email,$time,$url,$user_id)
    {
            $data = array(
                    'accountid' => $user_id,
                    'token' => $token,
                    'email' => $email
                    //'date_created' => $time
            );

            $query = $this->db->insert($this->DB_pwd_reset, $data);
            if($query)
            {
                    // get the users name
                    $name = $this->get_psswd_reset_cust($email);

                    // send the email
                    $site_email ='segun@stakle.com';
                    $logo = 'jol.png';
                    $this->Email_model->send_password_reset_mail($name, $url, $email, $site_email, $logo);

                    return TRUE;

            }else{

                    return FALSE;
            }
    }
    
    // check if the token exist
    function check_token($id,$token)
    {
            $this->db->where('accountid', $id);
            $this->db->where('token', $token);
            $query = $this->db->get($this->DB_pwd_reset);
            if($query->num_rows() > 0)
            {
                    foreach($query->result() as $row)
                    {
                            return $row->createdat;
                    }

            }else{

                    return FALSE;	
            }

    }
    public function delete_token($id,$token) 
    {
        $this->db->where('accountid', $id);
            $this->db->where('token', $token);
            $query = $this->db->delete($this->DB_pwd_reset);
            if($query)
            {
                return true;
  
            }else{

                return FALSE;	
            }
        
    }
    function resetpassword($id,$pswd)
    {
            $this->db->where('id', $id);
            $query = $this->db->update($this->DB_account_r, array('password' => $pswd));
            if($query)
            {
            return TRUE;
            }
    }
    function update_account_where($data,$where)
    {
            $this->db->where($where);
            $this->db->update($this->DB_account_r, $data);
            if ( $this->db->affected_rows() > 0 )
            {
            return TRUE;
            }
    }
    
    //GET Account Address By Id
    Public function getAccountaddressByid ($condition_array=null)
    {
        $this->db->select("accountaddresses.*,states.statename,state_cities.cityname");
        $this->db->from('accountaddresses');
        $this->db->join('state_cities', 'accountaddresses.cityid = state_cities.id', "left");
        $this->db->join('states', 'accountaddresses.stateid = states.id', "left");
        $this->db->where($condition_array);
        $this->db->order_by("accountaddresses.id", 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    

}
