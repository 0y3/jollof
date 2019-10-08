<?php

if(!defined('BASEPATH'))exit('No direct script access allowed');

class Auth extends CI_Model
{
    public $DB_account_r = "users";
    public $DB_res = "restaurants";
    public $DB_sitetype = "jollof_sitetype"; 
   
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('oye/Session_model'); // call in the session model class
        
        $DB_account_r = "users";
        $DB_res = "restaurants";
        $DB_sitetype = "jollof_sitetype";
	}
        
    public function checkEmail($postemail)
    {
        $this->db->select('email');
        $this->db->from($DB_account_r);
        $this->db->where('email', $postemail);
        $this->db->where("isdeleted",0);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function check_User_login($email_m, $pwd_m)
    {
        $this->db->select("users.*, restaurants.companyname, restaurants.logo");
        $this->db->from("users");
        $this->db->join("restaurants", "restaurants.id = users.restaurantid");
        $this->db->where("users.email", $email_m);
        $this->db->where(array("users.isdeleted"=>0, "restaurants.isdeleted"=>0, "restaurants.merchanttype"=>"cuisine"));
        
        $Result = $this->db->get();
        $row = $Result->row();
        if ($Result->num_rows() != 1)
        {		
            return 'Email_not_Found';	
        }
        else
        {
            if($row->password != $pwd_m ){
                return 'Incorrect_Password';
            }
            else 
            {
                if ($row->status != 1){
                    return 'User_Not_Active';
                }
                else {
                    $sess_data = array(
                        'User_id' => $row->id,
                        'Role_id' => $row->userroleid,
                        'rest_id' => $row->restaurantid,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname,
                        'email' => $row->email,
                        'Type' => 'restaurant',
                        'Type_id' => 1,
                        'cuisineAdmin' => true,
                        'merchant_id' => $row->restaurantid,
                        'companyname' => $row->companyname,
                        'avatar' => $row->logo
                    );
                    
                    // call in the method set_session inside the class session_model
                    $this->session->set_userdata($sess_data);
                    return 'logged_inn';
                } 
            }
        }
            
    }
    
    public function check_fashion_login($email_m, $pwd_m)
    {
        $this->db->select("users.*, restaurants.companyname, restaurants.logo,restaurants.bankCode,restaurants.status as restaurantsstatus");
        $this->db->from("users");
        $this->db->join("restaurants", "restaurants.id = users.restaurantid");
        $this->db->where("users.email", $email_m);
        $this->db->where(array("users.isdeleted"=>0, "restaurants.isdeleted"=>0, "restaurants.merchanttype"=>"fashion"));
        
        $Result = $this->db->get();
        $row = $Result->row();
        //print("<pre>".print_r($row,true)."</pre>");die;
        if ($Result->num_rows() != 1)
        {
            return 'Email_not_Found';
        }
        else
        {
            if($row->password != $pwd_m ){
                return 'Incorrect_Password';
            }
            else
            {
                if ($row->status != 1){
                    return 'User_Not_Active';
                }
                else if($row->restaurantsstatus != 1){
                    return 'Merchant_Not_Active';
                }
                else {
                    $sess_data = array(
                        'User_id' => $row->id,
                        'Role_id' => $row->userroleid,
                        'rest_id' => $row->restaurantid,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname,
                        'email' => $row->email,
                        'Type' => 'fashion',
                        'Type_id' => 2,
                        'fashionAdmin' => true,
                        'merchant_id' => $row->restaurantid,
                        'companyname' => $row->companyname,
                        'Paymentid'   => $row->bankCode,
                        'forcechangepassword'  => $row->forcepasswordchange,
                        'avatar' => $row->logo
                    );
                    
                    // call in the method set_session inside the class session_model
                    $this->session->set_userdata($sess_data);
                    return 'logged_inn';
                }
            }
        }
        
    }

    public function check_cuisine_login($email_m, $pwd_m)
    {
        $this->db->select("users.*, restaurants.companyname, restaurants.logo,restaurants.bankCode,restaurants.status as restaurantsstatus");
        $this->db->from("users");
        $this->db->join("restaurants", "restaurants.id = users.restaurantid");
        $this->db->where("users.email", $email_m);
        $this->db->where(array("users.isdeleted"=>0, "restaurants.isdeleted"=>0, "restaurants.merchanttype"=>"cuisine"));
        
        $Result = $this->db->get();
        $row = $Result->row();
        if ($Result->num_rows() != 1)
        {
            return 'Email_not_Found';
        }
        else
        {
            if($row->password != $pwd_m ){
                return 'Incorrect_Password';
            }
            else
            {
                if ($row->status != 1){
                    return 'User_Not_Active';
                }
                else if($row->restaurantsstatus != 1){
                    return 'Merchant_Not_Active';
                }
                else {
                    $sess_data = array(
                        'User_id' => $row->id,
                        'Role_id' => $row->userroleid,
                        'rest_id' => $row->restaurantid,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname,
                        'email' => $row->email,
                        'Type' => 'cuisine',
                        'Type_id' => 1,
                        'cuisineAdmin' => true,
                        'merchant_id' => $row->restaurantid,
                        'companyname' => $row->companyname,
                        'Paymentid'   => $row->bankCode,
                        'forcechangepassword'  => $row->forcepasswordchange,
                        'avatar' => $row->logo
                    );
                    
                    // call in the method set_session inside the class session_model
                    $this->session->set_userdata($sess_data);
                    return 'logged_inn';
                }
            }
        }
        
    }
    
    public function set_session_data($session_data)
    {
        $sess_data = array(
                            'User_id' => $session_data['User_id'],
                            'Role_id' => $session_data['Role_id'],
                            'rest_id' => $session_data['rest_id'],
                            'first_name' => $session_data['firstname'],
                            'last_name' => $session_data['lastname'],
                            'Email' => $session_data['email'],
                            'Type' => $session_data['Type'],
                            'microType_id' => $session_data['Type_id'],
                            'logged_in' => TRUE,
                            );
        $this->session->set_userdata($sess_data);
    }
}
