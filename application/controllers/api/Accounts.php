<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                // Generate the output
		$this->output->set_content_type('application/json');
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
                
                $this->load->model('oye/Auth'); //call the model for auth
                $this->load->model('oye/Account_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
	}
	
	public function index()
	{
            $data['meta'] = array('message'=>"Welcome to the Jollof Cuisine API.", 'status'=>0);
            $data['data'] = array(
                            'version'=> "1.0.0-Prometheus",
                            'name'=> "Jollof API Engine",
                            'author'=> "Stakle Solutions Limited",
                            'url'=> urlencode("http://www.stakle.com"
                                )
            );
            
            //$data  = array($data);
            $Json_result = json_encode($data);
            // Generate the output
            $this->output->set_content_type('application/json');
            $this->output->set_header('Access-Control-Allow-Origin: *');
            $this->output->set_header('Cache-Control: no-cache, must-revalidate');
            // Set the user's output
            $this->output->set_output($Json_result);
	}
        
        public function addaddress()
        {
            
                // save the new user data  table //
                $data_Newuser = array(  
                                    'accountid' =>  $this->session->userdata('User_id'),
                                    'firstname' =>  $this->input->get_post('firstname'),
                                    'lastname'  =>  $this->input->get_post('lastname'),
                                    'address'   =>  $this->input->get_post('address'),
                                    'cityid'    =>  $this->input->get_post('cityid'),
                                    'stateid'   =>  $this->input->get_post('stateid'),
                                    'phone'     =>  $this->input->get_post('phone1'),
                                    'phone2'    =>  $this->input->get_post('phone2'),
                                 );
                
                
                $insert_data = $this->Account_model->_address($data_Newuser);// insert to db
                
                if($insert_data) 
                    {

                        $data['meta']= array (
                                                'status' => 1,
                                                'NewAddress_id' => $insert_data
                                                );
                        
                        //$data  = array($data);
                        $Json_result = json_encode($data);
                        
                    }
                else 
                    {
                        $data['meta'] = array(
                                        'status'=>0,
                                        "error"=>" Error in saving New AddressRecord "
                                            );
                        
                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }
                
            // Set the output
            $this->output->set_output($Json_result);
            
        }
            
        
       
        public function checkemail() {
            
            $email_s = $this->input->get_post('email_s');
            
            
            // check if email excist
            $looker = $this->Auth->checkEmail($email_s);
            
            if (!empty($looker))
            {
                $msg = "Email Already Exists.....";
                $this->session->set_flashdata('msg', $msg);

                    $Json_resultSave = array (
                                            'status' => 1,
                                            'content' => 'Email Already Exists.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function signup()
        {
            $email_s = $this->input->get_post('email');
            
            
            // check if email excist
            $looker = $this->Auth->checkEmail($email_s);
            
            if (!empty($looker))
            {
                $msg = "Email Already Exists.....";
                $this->session->set_flashdata('msg', $msg);

                    $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Email Already Exists.....'
                                            );
                    $Json_result = json_encode($data);
            }
            else 
            {
                
                // save the new user data  table //
                $time = date('Y-m-d H:i:s');
                $tim  = strtotime($time);
                $token= do_hash($email_s.$tim);   
                
                $data_Newuser = array(  
                                    //'userroleid' => 'GU-'.strtotime(date('Y-m-d h:i:s')),
                                    'firstname' =>  $this->input->get_post('firstname'),
                                    'lastname'  =>  $this->input->get_post('lastname'),
                                    'gender'    =>  $this->input->get_post('gender'),
                                    'email'     =>  $this->input->get_post('email'),
                                    'password'  =>  md5($this->input->get_post('password')),
                                    'phone'     =>  $this->input->get_post('phone'),
                                    'token'     =>  $token,
                                    'status'    =>  0
                                 );

                $insert_data = $this->Account_model->_insertuser($data_Newuser);// insert to db 
                //$insert_data = $this->Account_model->_insertuser_email($data_Newuser);// insert to db 
                
                if($insert_data) 
                {

                        $success = 
                                '<div class="container" style="margin-top:5%;">
                                    <div class="row">
                                        <div class=" col-md-12"><button type="button" class="close bod" data-dismiss="modal" style="font-size: 30px;" aria-hidden="true">×</button></div>
                                        <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                                            <h2 class="text-center">Thank you for signing up with <img src=" '.base_url().'assets/img/jollof_logo.png" alt=""></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                                            <center><div class="btn-group" style="margin-top:50px;">
                                                Kindly Activate your account by following the link send to this email 
                                                <h3 class="eee" style="color:#F89406;"> '.$email_s. ' </h3>
                                            </div></center>
                                        </div>
                                    </div>
                                </div>';
                        $data['meta'] = array (
                                                'status' => 1,
                                                'message' => 'success'
                                               );
                        $data['content'] = $success;
                        $data['customer_email'] =$email_s;
                        
                        //$data  = array($data);
                        $Json_result = json_encode($data);
                }
            
            }
            // Set the output
            $this->output->set_output($Json_result);
            
        }
        public function validationcallback($token=false) 
        {
                if(!empty($token))
		{
			
			$token 	= $token;
			//check if the token and id exist in the database
			$chck = $this->Account_model->signup_token($token);
                       
			if($chck)
			{
				//redirect('', 'refresh');
                                $data['meta'] = array (
                                                'status' => 1,
                                                'content' => 'success'
                                               );
                                
                                //$data  = array($data);
                                $Json_result = json_encode($data);
				
			}else{
				
				//redirect('', 'refresh');
                                $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Email Token link has expired.....'
                                            );
                                $Json_result = json_encode($data);
                            }
			
		}
                else{
			
			//redirect('', 'refresh');
                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Email Token link has expired.....'
                                            );
                        $Json_result = json_encode($data);
                    }
                // Set the output
            $this->output->set_output($Json_result);
        }
        
        
        public function login_ol()
        {
            $email_c = $this->input->get_post('email');
            $pwd_c =   md5($this->input->get_post('password'));
            // model
             //call the model for auth
            $this->load->model('oye/Auth');
            $looker = $this->Auth->check_User_login($email_c, $pwd_c);
            
            
            
            switch($looker)
                {
                    case 'logged_inn':
                    //echo 'logged_inn';
                    //redirect("index");
                       
                        
                        $ses_username = $_SESSION['first_name'];
                        
                        $user_info = $this->Profile_model->profile($_SESSION['User_id']);
                        
                        $data['meta'] = array (
                                                'status' => '1',
                                                'message' => 'success'
                                               );
                        
                       
                        $data['id'] = $_SESSION['User_id'];
                        $data['firstname'] = $ses_username;
                        $data['userinfo'] = $user_info;
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);

                    break;

                    case 'Email_not_Found':

                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Email or Password not Found.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);

                    break;

                    case 'Incorrect_Password':
                        
                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Incorrect Password.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);



                    break;

                    case 'User_Not_Active':

                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Account Not Activated.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);
                        
                        

                    break;
                }
                
                $this->output->set_output($Json_result);
        }
        
        public function login()
	{
		// Begin authentication process
		/*
                $username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
            
                $encpassword = hash("sha512", $password);
		$login = $this->login->checkLogin($username, $encpassword);
                
                 * 
                 */
                $email_c = $this->input->get_post('email');
                $pwd_c =   md5($this->input->get_post('password'));
                
                $check_login = $this->Auth->check_User_login($email_c, $pwd_c);
		$token = NULL;
		switch($check_login)
                {
                    case 'logged_inn':
                    
                       
                        
                        
                        $user_info = $this->Profile_model->profile($_SESSION['User_id']);
                        
                        
			// Get a token
			$token = $this->Auth->getToken();
			// Retrieve expiry date for token
			$expires = $this->Auth->createExpiry();
			// Save the token in the database
			$sessiondata = array("token"=>$token, "accountid"=>$_SESSION['User_id'], "expires"=>$expires, "createdat"=>date("Y-m-d H:i:s"));
			$this->Auth->addToken($sessiondata);
			// Prepare the output
			$data['meta'] = array('status'=>1);
			$data['data'] = array(
					"token"=>$token,
					"id"=>$_SESSION['User_id'],
					"accountid"=>$_SESSION['User_id'],
					'firstname'=>$_SESSION['first_name'],
					'lastname'=>$_SESSION['last_name'],
					"email"=>$_SESSION['Email']
			);
                        $data['userinfo'] = $user_info;
			$Json_result = json_encode($data);

                    break;

                    case 'Email_not_Found':

                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Email or Password not Found.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);

                    break;

                    case 'Incorrect_Password':
                        
                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Incorrect Password.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);



                    break;

                    case 'User_Not_Active':
                        
                        $data['meta'] = array (
                                            'status' => 0,
                                            'content' => 'Account Not Activated.....'
                                            );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);
                        
                        

                    break;
                }
                
		// Log the request in the API log
		//$this->apilog->add(__CLASS__, __FUNCTION__, $jsonresponse, $token);
		// Pass output to the output handler
		$this->output->set_output($Json_result, $token);
	}
        
        public function states()
        {
            $get_state = $this->Account_model->get_state_where(); // call state
            
            $data['meta'] = array (
                                    'status' => 1,
                                    'message' => 'success'
                                   );

            $data['states'] = $get_state;
            
            //$data  = array($data);
            $Json_result =  json_encode($data);
            $this->output->set_output($Json_result);

            
        }
        public function getcitybystateid()
        {   $by_id = $this->input->get_post("stateid");
                
                $get_city = $this->Account_model->get_city_where($by_id); // call City by State
                //return $get_city;
                
            if($get_city )
                {
                    
                    $data['meta'] = array (
                                    'status' => 1,
                                    'message' => 'success'
                                   );

                    $data['city'] = $get_city;
                    
                    //$data  = array($data);
                    $Json_result =  json_encode($data);

                }
            else
                {
                    $data['meta'] = array (
                                    'status' => 0,
                                    'message' => 'City not available'
                                   );
                    
                    //$data  = array($data);
                    $Json_result =  json_encode($data);
                }
            
            $this->output->set_output($Json_result);
        }
        
        
        
        
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            
            $data['meta'] = array (
                                    'status' => 1,
                                    'message' => 'Logout success'
                                   );

            
            
            //$data  = array($data);
            $Json_result =  json_encode($data);
            $this->output->set_output($Json_result);
        }
        
        
        public function forgotpassword(){
	
                $email 			= $this->input->get_post('email');
                $user_id 		= $this->Account_model->get_user_id($email);
                if (!empty($user_id))
                {

               
                    $time 			= date('Y-m-d H:i:s');
                    $tim  			= strtotime($time);
                    $token 			= do_hash($email.$tim);
                    $url 			= '<a href="'.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.'/"> '.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.' </a>';

                    $query 			= $this->Account_model->reset_passwordtoken($token,$email,$time,$url,$user_id);
                    if($query)
                    {

                        $msg=  'An email has been sent to the address you provided, please check your inbox to reset your password.';
                        $data['meta'] = array (
                                        'status' => 1,
                                        'content' => $msg
                                        );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);

                    }else{
                            // generate error
                            $data['meta'] = array (
                                        'status' => 0,
                                        'content' => 'Email Not Registered.....'
                                        );
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);

                    }
                }
                else
                {
                    $data['meta'] = array (
                                    'status' => 0,
                                    'content' => 'Email Not Registered.....'
                                    );
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
            $this->output->set_output($Json_result);
	}
        
        public function save_resetpwd()
        {
            $new_password = md5($this->input->get_post('newpassword'));
            $id     = $this->input->get_post('id');
            $token  = $this->input->get_post('token');
            $query  = $this->Account_model->resetpassword($id, $new_password);
            if($query)
            {
                    //$this->session->set_flashdata('message', 'Password Reset Successful.');
                $this->Account_model->delete_token($id,$token);
                
                $data['meta'] = array (
                                    'status' => 1,
                                    'content' =>  'Password Reset Successful......'
                                    );
                //$data  = array($data);
                $Json_result =  json_encode($data);
                    
                
            }else{
                
                    $data['meta'] = array (
                                    'status' => 0,
                                    'content' =>  'An Error occured while trying to reset your password, please try again.'
                                    );
                    //$data  = array($data);
                    $Json_result =  json_encode($data);
            }
            
            $this->output->set_output($Json_result);
        }
        
        
        public function resetpassword($id=false,$token=false)
	{
		if(!empty($id) && !empty($token))
		{
			
			$id     = $id;
			$token 	= $token;
			//check if the token and id exist in the database
			$chck = $this->Account_model->check_token($id,$token);
                       
			if($chck)
			{
				// check if the token has expired
				if(time() <= strtotime($chck." + 1 day")){
                                    
                                    
                                    $this->setpwd($id, $token);
                                    
                                    $data['meta'] = array (
                                                        'status' => 1
                                                        );
                                        $data['msg']   = 'Forgot Password Link Verified';
                                        $data['id']    = $id;
                                        $data['token'] = $token;
                                        
                                        //$data  = array($data);
                                        $Json_result =  json_encode($data);
					
                                    /*
					
				*/
				}else{
					
					$this->session->set_flashdata('error', 'Your Password reset link has expired, Please request for another.');
                                        $this->Account_model->delete_token($id,$token);
                                        
                                        
                                        
                                        $data['meta'] = array (
                                                        'status' => 0
                                                        );
                                        $data['msg'] = 'Your Password reset link has expired, Please request for another.';
                                        //$data  = array($data);
                                        $Json_result =  json_encode($data);
                                        
				}
				
			}else{
                                $data['meta'] = array (
                                                        'status' => 0
                                                        );
                                $data['msg'] = 'Your Password reset link has expired, Please request for another.';
                                
                                //$data  = array($data);
                                $Json_result =  json_encode($data);
                                
                                
                            }
			
		}
                else{
			
			 $data['meta'] = array (
                                            'status' => 0
                                            );
                        $data['msg'] = 'Your Password reset link has expired, Please request for another.';
                        
                        //$data  = array($data);
                        $Json_result =  json_encode($data);
                    }
                    
            $this->output->set_output($Json_result);
	}
	
}