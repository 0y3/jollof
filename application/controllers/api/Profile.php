<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                // Generate the output
		$this->output->set_content_type('application/json');
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
                
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Checkout_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->helper('text');
	}
	
	public function index()
	{   
            
            $this->profile();
	}
        
        public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'User')
            {
                    $data['meta'] = array(
                                    'status'=>0,
                                    'message'=>"Could not authenticate user using provided credentials"
                                    );
                    //$data  = array($data);
                    $Json_result = json_encode($data);	
                    return $Json_result;
            }
		
	}
	
	
	public function orderhistory()
	{   
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $get_data = $this->Profile_model->order_hst();
                    //print("<pre>".print_r($get_data,true)."</pre>");
                    //die;
                    $data['meta'] = array (
                                            'status' => '1',
                                            'message' => 'success'
                                           );
                    $data['orderhistory'] = $get_data;
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
            $this->output->set_output($Json_result);
            
            
	}
        
        public function orderhistory_byid()
	{   
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                
            
                    $order_id = $this->uri->segment(3);

                    if (!empty($this->input->get_post('orderid')))
                    {
                        $order_id = $this->input->get_post('orderid');
                    }

                    if(is_numeric($order_id))
                        {
                            $alldata =$this->Profile_model->order_hst_list($order_id);
                            //print("<pre>".print_r($alldata,true)."</pre>");
                            //die;
                            if (!empty($alldata))
                                {
                                    
                                    // Prepare the output
                                    $data['meta'] = array('status'=>1);
                                    $data['orderhistory_byid'] =$alldata;
                                    
                                    //$data  = array($data);
                                    $Json_result = json_encode($data);
                                }
                            else
                            {
                                $data['meta'] = array(
                                            'message'=>"An invalid or expired Order Histor ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Order Histor ID Not In Record For User"
                                                );
                                
                                //'$data  = array($data);
                                $Json_result = json_encode($data);

                            }
                        }
                    else
                        {
                            $data['meta'] = array(
                                            'message'=>"An invalid or expired Order Histor ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Order Histor ID Not In Record For User"
                                                );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);
                        }
                }
            $this->output->set_output($Json_result);
            
	}
        public function confirmorder() {
            
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $order_id = $this->uri->segment(3);
                
                    if (!empty($this->input->get_post('orderid')))
                        {
                            $order_id = $this->input->get_post('orderid');
                        }
                    
                    $data_update = $this->Profile_model->_update_confirm_ord($order_id);

                    if($data_update)
                        {

                            $data['meta'] = array (
                                            'status' => 1,
                                            'message' => 'Confirm Order successful'
                                           );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);

                        } 
                    else
                        {
                            $data['meta'] = array (
                                            'status' => 0,
                                            'error' => 'Error in Confirming Order.....'
                                            );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);
                        }
                }
            $this->output->set_output($Json_result);
            
        }
        
	public function profile()
	{
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $userid = $_SESSION['User_id'];

                    $allData = $this->Profile_model->profile($userid);
                    $add_list = $this->get_address();

                    $data['meta'] = array (
                                            'status' => 1,
                                            'message' => 'success'
                                           );
                    $data['user_details'] = $allData;
                    $data['address_list'] =$add_list;
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
            $this->output->set_output($Json_result);
	}
        
        public function Update_Profile()
        {
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $userid = $_SESSION['User_id']; 

                    $UpdateData = $this->Profile_model->_ApiUpdate_Profile($userid);

                    if($UpdateData)
                        {
                            $mssg = "Profile Details Updated Successfully  .....";
                             $data['meta'] = array (
                                                'status' => 1,
                                                'message' => $mssg
                                               );
                        //$data  = array($data);
                        $Json_result = json_encode($data);
                        }
                    else
                        {
                            $data['meta'] = array (
                                            'status' => 0,
                                            'error' => 'Error in Updating Profile .....'
                                            );
                            //$data  = array($data);
                            $Json_result = json_encode($data);
                        }
            
                }
                
            $this->output->set_output($Json_result);
	}
        
        public function getaddress()
        {  
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
            
                    $by_userid = $this->session->userdata('User_id');

                    if(isset($_POST["addressid"]) && !empty($_POST["addressid"]) )
                    {
                        $get_addres = $this->Profile_model->get_address_where($_POST["id"]);
                        if($get_addres)
                            {
                                $data['meta'] = array('status'=>1);
                                $data['address'] =$get_addres;
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
                            }
                        else 
                            {
                                $data['meta'] = array (
                                            'status' => 0,
                                            'error' => 'Address ID Not in Record for User .....'
                                            );
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
                            }

                    }
                    else
                    {
                        
                        $get_addres = $this->Profile_model->get_address_where($by_id=FALSE); 
                        if($get_addres)
                            {
                                $data['meta'] = array('status'=>1);
                                $data['address'] =$get_addres;
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
                            }
                        else 
                            {
                                $data['meta'] = array (
                                            'status' => 0,
                                            'error' => 'User Have No Address Record .....'
                                            );
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
                            }
                    }
                }
                
            $this->output->set_output($Json_result);
            
            
        }
        
        public function refradd() 
        {
                $this->check_Loginin();
                
                $get_add = $this->Profile_model->get_address_where($by_id=FALSE); // call address
                
                foreach($get_add as $row)
                {
                    echo '<option value="'.$row->id.'">'.$row->address.'</option>';
                }
                        
        }
        
        
        public function password_change()
        {
            $pwd_c =   md5($_POST["oldpwd"]);
            $pwd_check= $this->Profile_model->check_User_pwd($pwd_c);
            
            if($pwd_check)
             {
                $newpwd = md5($_POST["cfmpwd"]);
                $pwd_save = $this->Profile_model->Update_pwd($newpwd);
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
            else 
             {
                $Json_resultSave = array (
                                        'status' => 0,
                                        'content' => 'Incorrect Password.....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
        }
        public function tablereservation()
	{
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $get_data = $$this->Profile_model->table_reservation_hst($by_id=FALSE);
                    
                    $data['meta'] = array (
                                            'status' => 1,
                                            'message' => 'success'
                                           );
                    $data['tablereservation'] = $get_data;
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
            $this->output->set_output($Json_result);
           
	}
        
        public function tablereservation_byid()
	{  
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $table_id = $this->uri->segment(3);

                    if (!empty($this->input->get_post('tablereservationid')))
                    {
                        $table_id = $this->input->get_post('tablereservationid');
                    }
                    if(is_numeric($table_id))
                        {
                            $alldata =$this->Profile_model->table_reservation_hst($table_id);
                            if (!empty($alldata))
                                {
                                    $data['meta'] = array('status'=>1);
                                    $data['tablereservation_byid'] =$alldata;
                                    
                                    //$data  = array($data);
                                    $Json_result = json_encode($data);
                                }
                            else
                            {
                                $data['meta'] = array(
                                            'message'=>"An invalid Table Reservation ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Table Reservation ID Not In Record For User"
                                                );
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
                            }
                        }
                    else
                        {
                            $data['meta'] = array(
                                            'message'=>"An invalid Table Reservation ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Table Reservation ID Not In Record For User"
                                                );
                            $Json_result = json_encode($data);

                        }
            
                }
            $this->output->set_output($Json_result);
            
	}
        public function cancel_table() {
            
            if($this->check_Loginin() == TRUE)
                {
                    $Json_result = $this->check_Loginin();  
                }
            else{
                    $table_id = $_POST['tableid'];

                    $data_update = $this->Profile_model->_update_cancel_table($table_id);

                    if($data_update)
                        {

                            $data['meta'] = array (
                                                'status' => 1,
                                                'message'=>"Table Reservation Canceled successful",
                                                  );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);

                        } 
                    else
                        {
                            $data['meta'] = array(
                                            'message'=>"An invalid Table Reservation ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Unable to Cancel Table Reservation ID For User"
                                                );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);

                        }
                
                }
            $this->output->set_output($Json_result);
            
        }
        
}
