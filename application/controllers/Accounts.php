<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Auth'); //call the model for auth
                $this->load->model('oye/Account_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Fashion_model');
                $this->load->model('oye/Email_model');
                $this->load->model('Generic');
                $this->load->model('Notifications');
	}
	
	public function index()
	{
            redirect('', 'refresh');
            exit;
	}
        
        public function fblogin() 
        {
            $fb = new Facebook\Facebook([
                    'app_id' => '1980361182290100',
                    'app_secret' => 'f961fa4b51fa7c18ecf62c293a5eeaa7',
                    'default_graph_version' => 'v2.5',
                  ]);

            $helper = $fb->getRedirectLoginHelper();

            $permissions = ['email','user_location','user_birthday','publish_actions']; 
            // For more permissions like user location etc you need to send your application for review

            $loginUrl = $helper->getLoginUrl('http://'. site_url('accounts/fbcallback').'', $permissions);

            header("location: ".$loginUrl);
        }
        function fbcallback(){

            $fb = new Facebook\Facebook([
            'app_id' => '1980361182290100',
            'app_secret' => 'f961fa4b51fa7c18ecf62c293a5eeaa7',
            'default_graph_version' => 'v2.5',
            ]);

            $helper = $fb->getRedirectLoginHelper();  

            try {  

                $accessToken = $helper->getAccessToken();  

            }catch(Facebook\Exceptions\FacebookResponseException $e) {  
              // When Graph returns an error  
              echo 'Graph returned an error: ' . $e->getMessage();  
              exit;  
            } catch(Facebook\Exceptions\FacebookSDKException $e) {  
              // When validation fails or other local issues  
              echo 'Facebook SDK returned an error: ' . $e->getMessage();  
              exit;  
            }  


            try {
              // Get the Facebook\GraphNodes\GraphUser object for the current user.
              // If you provided a 'default_access_token', the '{access-token}' is optional.
              $response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
             // print_r($response);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              // When Graph returns an error
              echo 'ERROR: Graph ' . $e->getMessage();
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              // When validation fails or other local issues
              echo 'ERROR: validation fails ' . $e->getMessage();
              exit;
            }

            // User Information Retrival begins................................................
            $me = $response->getGraphUser();

            $location = $me->getProperty('location');
            echo "Full Name: ".$me->getProperty('name')."<br>";
            echo "First Name: ".$me->getProperty('first_name')."<br>";
            echo "Last Name: ".$me->getProperty('last_name')."<br>";
            echo "Gender: ".$me->getProperty('gender')."<br>";
            echo "Email: ".$me->getProperty('email')."<br>";
            echo "location: ".$location['name']."<br>";
            echo "Birthday: ".$me->getProperty('birthday')->format('d/m/Y')."<br>";
            echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty('id')."</a>"."<br>";
            $profileid = $me->getProperty('id');
            echo "</br><img src='//graph.facebook.com/$profileid/picture?type=large'> ";
            echo "</br></br>Access Token : </br>".$accessToken; 


        }
        
	public function address()
	{   $data['state'] = $this->get_state();
            $this->load->view('oye_mainpage_v/address',$data);
	}
        
    public function address_validation()
    {
        
            // save the new user data  table //
            $data_Newuser = array(  
                                'accountid' =>  $this->session->userdata('User_id'),
                                'firstname' =>  $this->input->post('firstname_s'),
                                'lastname'  =>  $this->input->post('lastname_s'),
                                'address'   =>  $this->input->post('address'),
                                'cityid'    =>  $this->input->post('city'),
                                'stateid'   =>  $this->input->post('state'),
                                'phone'     =>  $this->input->post('cell'),
                                'phone2'    =>  $this->input->post('cell2'),
                             );

            $insert_data = $this->Account_model->_address($data_Newuser);// insert to db
            
            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content_id' => $insert_data
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        
    }
            
        
    public function signup()
	{
		$this->load->view('oye_mainpage_v/signup');
	}
        
        public function checkemail() {
            
            $email_s = $this->input->post('email_s');
            
            
            // check if email excist
            $looker = $this->Auth->checkEmail($email_s);
            
            if (!empty($looker))
            {
                $msg = "Email Already Exists.....";
                $this->session->set_flashdata('msg', $msg);

                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Email Already Exists.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function signup_validation()
        {
            $email_s = $this->input->post('email_s');
            
            
            // check if email excist
            $looker = $this->Auth->checkEmail($email_s);

            if (!empty($looker))
            {
                $msg = "Email Already Exists.....";
                $this->session->set_flashdata('msg', $msg);

                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Email Already Exists.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                
                // save the new user data  table //
                $time = date('Y-m-d H:i:s');
                $tim  = strtotime($time);
                $token= do_hash($email_s.$tim);   
                
                $data_Newuser = array(  
                                    //'userroleid' => 'GU-'.strtotime(date('Y-m-d h:i:s')),
                                    'firstname' =>  $this->input->post('firstname_s'),
                                    'lastname' =>   $this->input->post('lastname_s'),
                                    'gender' =>   $this->input->post('gent'),
                                    'email' =>      $this->input->post('email_s'),
                                    'password' =>   md5($this->input->post('pwd_s')),
                                    'phone' =>   $this->input->post('cell'),
                                    'token' =>   $token,
                                    'status' => '0'
                                 );
                //check if user is a guest 
                $data_where = array( 
                                'email' => $email_s,
                                'usertype' => 'guest'
                            );
                $check_guest = $this->Generic->getByConditionFieldSingle($data_where, $tablename='accounts');
                if($check_guest)
                {
                    $data_Newuser = array(  
                                    //'userroleid' => 'GU-'.strtotime(date('Y-m-d h:i:s')),
                                    'firstname' =>  $this->input->post('firstname_s'),
                                    'lastname' =>   $this->input->post('lastname_s'),
                                    'gender' =>   $this->input->post('gent'),
                                    'email' =>      $this->input->post('email_s'),
                                    'password' =>   md5($this->input->post('pwd_s')),
                                    'phone' =>   $this->input->post('cell'),
                                    'token' =>   $token,
                                    'usertype' => 'guest',
                                    'status' => '0'
                                 );

                    // send the customer an email
                    $site_email ='trivin98@gmail.com';
                    $logo = 'jollof_logo.png';
                    $sendemail  =   $this->Email_model->send_registration_email($this->input->post('firstname_s'), $this->input->post('lastname_s'), $email_s, $token, $site_email, $logo );
                    
                    $insert_data  = $this->Generic->edit($data_update, $check_guest['id'] , $tablename="accounts");
                    

                }
                else
                {
                    $insert_data = $this->Account_model->_insertuser($data_Newuser);// insert to db 
                    //$insert_data = $this->Account_model->_insertuser_email($data_Newuser);// insert to db 
                }
                
                if($insert_data) 
                {

                        $success = 
                                '<div class="container" style="margin-top:5%;">
                                    <div class="row">
                                        <div class=" col-md-12"><button type="button" class="close bod" data-dismiss="modal" style="font-size: 30px;" aria-hidden="true">×</button></div>
                                            <div class=" col-md-12 jumbotron linkcolor" style="box-shadow: 2px 2px 4px #000000;">
                                                <div class="alert alert-success alert-dismissable" id="get_error" style="display: none;">
                                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                                                    <span class="error_msgr"></span>
                                                </div>
                                                <h2 class="text-center">Thank you for signing up with <img src=" '.base_url().'assets/img/jollof_logo.png" alt=""></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                                                <center>
                                                    <div class="btn-group" style="margin-top:50px;">
                                                        Kindly Activate your account by following the link sent to this email 
                                                        <h3 class="eee" style="color:#F89406;"> '.$email_s. ' </h3>
                                                    </div>
                                                    <p> pls <a class="resendemail" href=""><b>click here</b></a> to resend..</p>
                                                </center>
                                            </div>
                                    </div>
                                </div>';
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => $success
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
                else
                {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Error in Registering User..... Try Again!!!'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            
            }

            
        }
        public function thankyou()
        {
            $data['info']= $this->Super_admin_model->get_admin_info();
            if (isset($_GET['email'])) 
            {
                $data ['useremail']=  $_GET['email'];
                
                $data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Jollof:-Account';
                $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

                $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                //$data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                //$data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
                $data ['footer_loader']= 'included/fashionpage_included/footer';
                $data ['error_page'] = 'included/error_page_fashion';
                $data ['page_loader']= 'oye_mainpage_v/thankyou_signup';
                
                $this->load->view('oye_mainpage_v/account_template',$data);
            } 
            else 
            {
                redirect('', 'refresh');
            }
             
        }
        public function resendConfirmation()
        {
            $email=$_POST['email'];
            $time = date('Y-m-d H:i:s');
            $tim  = strtotime($time);
            $token= do_hash($email.$tim);
            
            $user_id = $this->Account_model->get_user_id($email);//get user id
            if($user_id)
            {
                $user_info = $this->Account_model->get_user_info($user_id);//get user full details

                if($user_info)
                {
                    $data_token = array(
                            'token' =>   $token,
                            'status' => '0'
                            );
                    $data_where = array(
                            'id' =>   $user_info->id
                            );

                    $newtoken = $this->Account_model->update_account_where($data_token,$data_where);

                    // send the customer an email
                    $site_email ='trivin98@gmail.com';
                    $logo = 'jollof_logo.png';
                    $sendemail=$this->Email_model->send_registration_email($user_info->firstname, $user_info->lastname, $email, $token, $site_email, $logo );

                    if($sendemail) 
                    {
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content'=> 'Confirmation Email Resent'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                    }
                    else
                    {
                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content'=> 'Confirmation Email Non Sent'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                    }
                }
            }
            else
                {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content'=> 'An Error occured!! Confirmation Email: '.$email.' Not Sent'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
        }
        public function validationcallback($token=false) 
        {
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
            if(!empty($token))
		    {
			
			$token 	= $token;
			//check if the token and id exist in the database
			$chck = $this->Account_model->signup_token($token);
                       
    			if($chck==TRUE)
    			{
                                
                                $data ['icon']= 'jol_1.ico';
                                $data ['titel']= 'Welcome Back User :: Jollof';
                                $success = 
                                        '<div class="container" style="margin-top:2%;">
                                            <div class="row">
                                                <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                                                    <h2 class="text-center">Thank you for confirming your email address <a href="'. site_url().'"><img src=" '.base_url().'assets/img/jollof_logo.png" alt=""></a></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                                                    <center><div class="btn-group" style="margin-top:10px;">
                                                        Now you can start browsing our awesome website without any further hassle. 
                                                        <h3 class="eee" style="color:#F89406;">  </h3>
                                                    </div></center>
                                                </div>
                                            </div>
                                        </div>';
                                $data['error_msg']=$success;
                                
                                $this->load->view('included/header', $data);
                                $this->load->view('oye_mainpage_v/user_confirmation',$data);
                                $this->load->view('included/footer', $data);
    				
    			}
                else{
				    redirect('', 'refresh');
                    }
			
		    }
            else{
			     redirect('', 'refresh');
                }
        }
        
        /*
        public function login()
	{
		$this->load->view('oye_mainpage_v/login');
	}
        public function forgotpwd()
	{
		$this->load->view('oye_mainpage_v/forgotpwd');
	}
        * 
        */
        
    public function login()
	{
        $check_logged = $this->session->userdata('logged_in');
        $check_user = $this->session->userdata('Type');

        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'User') )// && ($this->cart->contents() != true) )
        {
                
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Account';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
            
            $previous_url=null;
            if(isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] !==null))
            {
                $previous_url= $_SERVER['HTTP_REFERER'];
            }
            $url_arrar=explode("/",$previous_url);
            //print_r ($url_arrar);
            //print_r (array_values($url_arrar)[3]);
            $micronav=array_values($url_arrar)[3];
            if(!isset($url_arrar[4]))
            {
               $url_arrar=array('Hello','cuisine','cuisine','cuisine');
            }
            
            if($micronav == 'cuisine')
            {
                $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
            }
            else if($micronav == 'fashion')
            {
                $data ['nav'] = $this->Fashion_model->_get_parent_nav_by_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav';
                
            }
            else 
            {
                $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
            }
            //print("<pre>".print_r($url_arrar,true)."</pre>"); die;
            
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            //$data ['sidebar_loader']= 'included/fashionpage_included/sidebar_filter';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/login_signup';

            $this->load->view('oye_mainpage_v/account_template',$data);
        }
        else
        {
            //$this->index(); 
            redirect('accounts/profile', 'refresh');	
        }
	}
    public function forgotpwd()
	{
		$this->load->view('oye_mainpage_v/forgotpwd');
	}
        
        public function login_validation()
        {
            
            $email_c = $this->input->post('l_email');
            $pwd_c =   md5($this->input->post('l_pwd'));
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
                        if (!empty($user_info[0]->image))
                        {
                            $user_img= '<img src="'. base_url().'assets/uploads/profile_pic/'.$user_info[0]->image.'" class="img-circle" width="30px" height="30px" />';
                        }
                        else{$user_img='<img src="'. base_url().'assets/uploads/profile_pic/noimage.jpg" class="img-circle" width="30px" height="30px" >';}
                        
                        
                        
                        
                        $login_txt_html = '<span class="log" data-log="1"></span>';
                        $login_txt_html.= 
                                    '<div class="pull-left" style="margin-right:30px;">
                                            Welcome ('.$ses_username.')
                                        </div>
                                        
                                        <ul class="nav navbar-nav navbar-right ullogin">
                                            <!--<li><a href="#">Link</a></li>-->
                                            <li class="dropdown">
                                                <span class="dropdown-toggle text-danger" data-toggle="dropdown" style="cursor: pointer;">'.$user_img.' My Account <span class="caret"></span></span>

                                                <ul class="dropdown-menu" role="menu">

                                                    <li>
                                                            <a href="'. site_url('profile').'">Profile</a>
                                                    </li>

                                                    <li>
                                                            <a href="'. site_url('profile/order_history').'">Orders</a>
                                                    </li>

                                                    <li>
                                                            <a href="'. site_url('profile/table_reservation').'">Table Reservation</a>
                                                    </li>

                                                    <li class="divider"></li>
                                                    <li>
                                                        <a class="" href="'. base_url(). 'accounts/logout"><span class="text-danger">logout</span></a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>';

                        $success = "<div class=\"alert alert-success alert-dismissable fade in\">"
                                . "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>"
                                . "<strong>Success!</strong>"
                                . "<br/> welcome ".$ses_username
                                . "</div>";
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => $login_txt_html,
                                                'content2' => $success,
                                                'name' => $ses_username
                                                );
                        echo json_encode($Json_resultSave);
                        exit();

                    break;

                    case 'Email_not_Found':


                        $mssg = "Email / Password not Found.....";

                        $this->session->set_flashdata('msg', $mssg);
                        //redirect(base_url().'adminoye/login', 'refresh');

                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'Email / Password not Found.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();

                    break;

                    case 'Guest User Email':

                        $mssg = "Guest User Email. Pls Register with same email.....";

                        $this->session->set_flashdata('msg', $mssg);
                        //redirect(base_url().'adminoye/login', 'refresh');


                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'Guest User Email. Pls Register with same email.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();

                    break;

                    case 'Incorrect_Password':

                        $mssg = "Incorrect Password.....";

                        $this->session->set_flashdata('msg', $mssg);
                        //redirect(base_url().'adminoye/login', 'refresh');


                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'Incorrect Password.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();



                    break;

                    case 'User_Not_Active':


                        $mssg = "User Account Disactivated.....";

                        $this->session->set_flashdata('msg', $mssg);
                        //redirect(base_url().'adminoye/login', 'refresh');

                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'Account Not Activated.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                        
                        

                    break;
                }
        }
        
        public function get_state()
        {
            $get_state = $this->Account_model->get_state_where(); // call state
            return $get_state;
            
        }
        public function get_city_byid()
        {   $by_id = $_POST["stateid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Account_model->get_city_where($by_id); // call City by State
                //return $get_city;
                //echo '<option value=""> --Select-- </option>';
                foreach($get_city as $row)
                {
                    echo '<option value="'.$row->id.'">'.$row->cityname.'</option>';
                }
            }
            else{
                
                echo '<option value="">City not available</option>';
            }
        }
        
        
        
        
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            
             redirect('', 'refresh');
            exit;
        }
        
        
    public function forgotpassword()
    {
	
        $email 			= $this->input->post('email');
        $user_id 		= $this->Account_model->get_user_id($email);
        //print("<pre>".print_r($user_id,true)."</pre>");die;
        if (!empty($user_id))
        {

       
            $time 			= date('Y-m-d H:i:s');
            $tim  			= strtotime($time);
            $token 			= do_hash($email.$tim);
            //$url 			= '<a href="'.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.'/"> '.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.' </a>';
            //$url            = '<a href="'.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.'/"> Password link... </a>';
            //$url            = '<a href= '. site_url('accounts/resetpassword/'.$user_id.'/'.$token.'/').'"> Password link... </a>';
            $url            =  site_url('accounts/resetpassword/'.$user_id.'/'.$token.'/');

            $query 			= $this->Account_model->reset_passwordtoken($token,$email,$time,$url,$user_id);
            if($query)
            {

                    $msg=  'An email has been sent to the address you provided, please check your inbox to reset your password.';
                    $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => $msg
                                    );
                echo json_encode($Json_resultSave);

            }else{
                    // generate error	

            }
        }
        else
        {
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Email Not Registered.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
        }
	}
        
    public function setpwd($id=false,$token=false)
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        if(!empty($id) && !empty($token))
        {
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
            
            $data['id']=$id;
            $data['token']=$token;

            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
        else
        {
                
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }
    public function save_resetpwd()
    {
        $newpassword = md5($this->input->post('password'));
        $id     = $_POST['id'];
        $token  = $_POST['token'];
        $query  = $this->Account_model->resetpassword($id, $newpassword);
        if($query)
        {
                //$this->session->set_flashdata('message', 'Password Reset Successful.');
            $this->Account_model->delete_token($id,$token);
            $Json_resultSave = array (
                                'status' => '1',
                                'content' =>  'Password Reset Successful......'
                                );
            echo json_encode($Json_resultSave);
            exit();
                
            
        }else{

                $this->session->set_flashdata('error', 'An Error occured while trying to reset your password, please try again.');
                
                $Json_resultSave = array (
                                'status' => '0',
                                'content' =>  'An Error occured while trying to reset your password, please try again.'
                                );
            echo json_encode($Json_resultSave);
            exit();
        }
    }
    public function resetpassword($id=false,$token=false)
	{
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
		if(!empty($id) && !empty($token))
		{
			
			$id     = $id;
			$token 	= $token;
			//check if the token and id exist in the database
			$chck = $this->Account_model->check_token($id,$token);
                       
			if($chck)
			{
				// check if the token has expired
				if(time() <= strtotime($chck." + 1 day"))
                {  
                    $this->setpwd($id, $token);
					
                                    /*
					
				*/
				}
                else{
					
					$this->session->set_flashdata('error', 'Your Password reset link has expired, Please request for another.');
                    $this->Account_model->delete_token($id,$token);
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                                        
					//redirect(base_url().'accounts/forgotpassword/');
				}
				
			}else{
				
				    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                }
			
		}
        else{
			
			$data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
	}

    public function merchantpassword()
    {
        $newpassword = md5($this->input->post('password'));
        $id     = $_POST['id'];
        $token  = $_POST['token'];


        $data_update = array( 
                            'password' => $newpassword
                        );
        $query  = $this->Generic->edit($data_update, $id , $tablename="users");
        if($query)
        {
                //$this->session->set_flashdata('message', 'Password Reset Successful.');
            $this->Account_model->delete_token($id,$token);
            $Json_resultSave = array (
                                'status' => '1',
                                'content' =>  'Password Reset Successful......'
                                );
            echo json_encode($Json_resultSave);
            exit();
                
            
        }else{

                $this->session->set_flashdata('error', 'An Error occured while trying to reset your password, please try again.');
                
                $Json_resultSave = array (
                                'status' => '0',
                                'content' =>  'An Error occured while trying to reset your password, please try again.'
                                );
            echo json_encode($Json_resultSave);
            exit();
        }
    }

    public function setmerchantpwd($id=false,$token=false)
    {

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

        if(!empty($id) && !empty($token))
        {
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

            // get the users info
            $usersinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='users'); // Get url Id

            $merchant = $this->Generic->getByFieldSingle('id', $usersinfo['restaurantid'], $tablename='restaurants'); // Get url Id

            $data['id']=$id;
            $data['token']=$token;
            $data['merchantinfo'] = $merchant;
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetmerchantpwd';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
        else
        {
                
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }
    public function merchantpasswordform($id=false,$token=false)
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        if(!empty($id) && !empty($token))
        {
            
            $id     = $id;
            $token  = $token;
            //check if the token and id exist in the database
            $chck = $this->Account_model->check_token($id,$token);
                       
            if($chck)
            {
                // check if the token has expired
                if(time() <= strtotime($chck." + 1 day"))
                {  
                    $this->setmerchantpwd($id, $token);
                }
                else{
                    
                    $this->session->set_flashdata('error', 'Your Password reset link has expired, Please request for another.');
                    $this->Account_model->delete_token($id,$token);
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                                        
                    //redirect(base_url().'accounts/forgotpassword/');
                }
                
            }else{
                
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                }
            
        }
        else{
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }

    public function merchantforgotpwd()
    {
        $this->load->view('oye_mainpage_v/forgotmerchantpwd');
    }

    public function merchantforgotpassword()
    {
    
        $email          = $this->input->post('email');
        $usersinfo      = $this->Generic->getByFieldSingle('email', $email, $tablename='users');
        $merchant = $this->Generic->getByFieldSingle('id', $usersinfo['restaurantid'], $tablename='restaurants'); // Get url Id
        //print("<pre>".print_r($user_id,true)."</pre>");die;
        if (!empty($usersinfo))
        {

       
            $time           = date('Y-m-d H:i:s');
            $tim            = strtotime($time);
            $token          = do_hash($email.$tim);
            //$url          = '<a href="'.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.'/"> '.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.' </a>';
            //$url            = '<a href="'.base_url().'accounts/merchantpasswordform/'.$usersinfo['id'].'/'.$token.'/"> Click here!!! </a>';
            //$url            = '<a href= http://'. site_url('accounts/merchantpasswordform/'.$usersinfo['id'].'/'.$token.'/').'"> Password link... </a>';
            $url            =  site_url('accounts/merchantpasswordform/'.$usersinfo['id'].'/'.$token.'/');


            $data_New = array(
                'accountid' => $usersinfo['id'],
                'token' => $token,
                'email' => $email
                //'date_created' => $time
            );
            $insert_data = $this->Generic->add($data_New, $tablename="password_reset");
            // send the email
            $site_email ='trivin98@gmail.com'; 
            $logo = 'jol.png';
            $merchant_email= $this->Email_model->send_restaurant_password_reset_mail($merchant['companyname'],$url,$email, $site_email, $logo);

            if($merchant_email)
            {

                    $msg=  'An email has been sent to the address you provided, please check your inbox to reset your password.';
                    $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => $msg
                                    );
                echo json_encode($Json_resultSave);

            }else{
                    // generate error   

            }
        }
        else
        {
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Email Not Registered.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
        }
    }

    

    public function adminforgotpwd()
    {
        $this->load->view('oye_mainpage_v/forgotadminpwd');
    }

    public function adminforgotpassword()
    {
    
        $email          = $this->input->post('email');
        $usersinfo      = $this->Generic->getByFieldSingle('email', $email, $tablename='admin_users');
        //$merchant = $this->Generic->getByFieldSingle('id', $usersinfo['restaurantid'], $tablename='restaurants'); // Get url Id
        //print("<pre>".print_r($user_id,true)."</pre>");die;
        if (!empty($usersinfo))
        {

       
            $time           = date('Y-m-d H:i:s');
            $tim            = strtotime($time);
            $token          = do_hash($email.$tim);
            //$url          = '<a href="'.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.'/"> '.base_url().'accounts/resetpassword/'.$user_id.'/'.$token.' </a>';
            //$url            = '<a href="'.base_url().'accounts/merchantpasswordform/'.$usersinfo['id'].'/'.$token.'/"> Click here!!! </a>';
            //$url            = '<a href= http://'. site_url('accounts/merchantpasswordform/'.$usersinfo['id'].'/'.$token.'/').'"> Password link... </a>';
            $url            =  site_url('accounts/adminpasswordform/'.$usersinfo['id'].'/'.$token.'/');


            $data_New = array(
                'accountid' => $usersinfo['id'],
                'token' => $token,
                'email' => $email
                //'date_created' => $time
            );
            $insert_data = $this->Generic->add($data_New, $tablename="password_reset");
            // send the email
            $site_email ='trivin98@gmail.com'; 
            $logo = 'jol.png';
            $username =  ucfirst($usersinfo['firstname']) . ' ' . ucfirst($usersinfo['lastname']);
            $admin_email= $this->Email_model->send_restaurant_password_reset_mail($username,$url,$email, $site_email, $logo);

            if($admin_email)
            {

                    $msg=  'An email has been sent to the address you provided, please check your inbox to reset your password.';
                    $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => $msg
                                    );
                echo json_encode($Json_resultSave);

            }else{
                    // generate error   

            }
        }
        else
        {
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Email Not Registered.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
        }
    }

    public function adminpasswordform($id=false,$token=false)
    {
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        if(!empty($id) && !empty($token))
        {
            
            $id     = $id;
            $token  = $token;
            //check if the token and id exist in the database
            $chck = $this->Account_model->check_token($id,$token);
                       
            if($chck)
            {
                // check if the token has expired
                if(time() <= strtotime($chck." + 1 day"))
                {  
                    $this->setadminpwd($id, $token);
                }
                else{
                    
                    $this->session->set_flashdata('error', 'Your Password reset link has expired, Please request for another.');
                    $this->Account_model->delete_token($id,$token);
                    
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                                        
                    //redirect(base_url().'accounts/forgotpassword/');
                }
                
            }else{
                
                    $data ['icon']= 'jol_1.ico';
                    $data ['titel']= 'Reset Your Password :: Jollof';
                    $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
                    
                    $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
                    
                    /*
                    $this->load->view('included/header', $data);
                    $this->load->view('oye_mainpage_v/resetpwd404', $data);
                    $this->load->view('included/footer', $data);
                    */

                    $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                    $data ['footer_loader']= 'included/fashionpage_included/footer';
                    $data ['error_page'] = 'included/error_page_fashion';
                    $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
                    
                    $this->load->view('oye_mainpage_v/account_template',$data);
                }
            
        }
        else{
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }

    public function setadminpwd($id=false,$token=false)
    {

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

        if(!empty($id) && !empty($token))
        {
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';

            // get the users info
            $usersinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='admin_users'); // Get url Id

            $data['id']=$id;
            $data['token']=$token;
            $data['merchantinfo'] = $usersinfo;
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetadminpwd';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
        else
        {
                
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Reset Your Password :: Jollof';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Homepage, ';
            
            $data['error_msg'] = 'Your Password reset link has expired, Please request for another.';
            
            /*
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/resetpwd404', $data);
            $this->load->view('included/footer', $data);
            */

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/resetpwd404';
            
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }

    public function adminpassword()
    {
        $newpassword = md5($this->input->post('password'));
        $id     = $_POST['id'];
        $token  = $_POST['token'];


        $data_update = array( 
                            'password' => $newpassword
                        );
        $query  = $this->Generic->edit($data_update, $id , $tablename="admin_users");
        if($query)
        {
                //$this->session->set_flashdata('message', 'Password Reset Successful.');
            $this->Account_model->delete_token($id,$token);
            $Json_resultSave = array (
                                'status' => '1',
                                'content' =>  'Password Reset Successful......'
                                );
            echo json_encode($Json_resultSave);
            exit();
                
            
        }else{

                $this->session->set_flashdata('error', 'An Error occured while trying to reset your password, please try again.');
                
                $Json_resultSave = array (
                                'status' => '0',
                                'content' =>  'An Error occured while trying to reset your password, please try again.'
                                );
            echo json_encode($Json_resultSave);
            exit();
        }
    }

    public function profile($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data ['icon']      = 'jol_1.ico';
        $data ['titel']= 'Jollof:-User User Profile';
        $data ['meta_keyword']= 'Shopping,Fashion,Cuisine,Profile,Orders, Sales, Online, Homepage, ';
        $data ['nav'] =  $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_account';

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        
        $data_where = array( 
                        'accountaddresses.accountid' => $_SESSION['User_id'],
                        'accountaddresses.status'    =>  1,
                        'accountaddresses.isdeleted' =>  0,
                        'state_cities.status'    =>  1,
                        'states.status'    =>  1
                    );
        $data['address']   = $this->Account_model->getAccountaddressByid($data_where);

        $data_where2 = array( 
                            'id' => $_SESSION['User_id']
                        );
        $user_data = $this->Generic->getByConditionFieldSingle($data_where2, $tablename='accounts');
        //print("<pre>".print_r($user_data,true)."</pre>"); //die;
        $data['accounts'] = $user_data;

            $data ['page_loader']= 'oye_mainpage_v/profile_info';

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';


            $this->load->view('oye_mainpage_v/account_template',$data);

    }
    public function Profileedit()
    {
        


        $data_New = array(  
                        'firstname'     => $this->input->post('fname'),
                        'lastname'      => $this->input->post('lname'),
                        'gender'        => $this->input->post('gender'),
                        'phone'         => $this->input->post('phone'),
                        'phone2'        => $this->input->post('phone2')
                     );
        
        $data_Where = array(  
                        'id'    => $_SESSION['User_id']
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="accounts"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Coupon Info Updated');
                $this->session->set_flashdata('message', 'Account Info Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updating Account Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }

        redirect('accounts/profile');
    }
    public function passwordchange()
    {
        $pwd_c =   md5($_POST['oldpwd']);
        $data_New = array(  
                    'id' => (int)$this->session->User_id,
                    'password' => $pwd_c,
                         );
        $pwd_check =  $this->Generic->findByCondition($data_New,'accounts');

        if($pwd_check)
         {
            $newpwd = md5($_POST['cnfpwd']);
            
            $data_New=array('password' => $newpwd );
            
            $this->Generic->edit($data_New, (int)$this->session->User_id, $tablename="accounts"); 
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Password Change Successfull...');
            $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => 'Password Change .....'
                                    );
            //echo json_encode($Json_resultSave);
            //exit();
         }
        else 
         {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'Incorrect Old Password....');
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Incorrect Password.....'
                                    );
            //echo json_encode($Json_resultSave);
            //exit();
         }
         redirect('accounts/profile');
    }
    public function addressedit($id=null)
    {   
        if(!empty($id))
        {
            $data['state'] = $this->get_state();
            $user_address = $this->Generic->getByFieldSingle('id', $id, $tablename='accountaddresses'); 
            $user_addresscity = $this->Generic->getByFieldSingle('id', $user_address['cityid'], $tablename='state_cities'); // Get user adress city
            $user_addressstate = $this->Generic->getByFieldSingle('id', $user_address['stateid'], $tablename='states'); // Get user adress state

            $city_data = $this->Account_model->get_city_where($user_addressstate['id']); // call City by State
            //print("<pre>".print_r($user_addressstate,true)."</pre>");die;
            $data['city_data']  = $city_data;
            $data['user_address']       = $user_address;
            $data['user_addresscity']   = $user_addresscity;
            $data['user_addressstate']  = $user_addressstate;

            $this->load->view('oye_mainpage_v/addressedit',$data);
        }


    }
    public function address_update($id=null)
    {
        $data_New = array(  
                        'firstname' =>  $this->input->post('firstname_s'),
                        'lastname'  =>  $this->input->post('lastname_s'),
                        'address'   =>  $this->input->post('address'),
                        'cityid'    =>  $this->input->post('city'),
                        'stateid'   =>  $this->input->post('state'),
                        'phone'     =>  $this->input->post('cell'),
                        'phone2'    =>  $this->input->post('cell2'),
                     );
        
        $data_Where = array(  
                        'id'        => $id,
                        'accountid' => $_SESSION['User_id']
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="accountaddresses"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Coupon Info Updated');
                $this->session->set_flashdata('message', 'Address Info Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updating Address Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }

        //redirect('accounts/profile');
    }
    public function deleteaddress($id=null)
    {
        

        // delete to db
        $_data = $this->Generic->delete($id, $tablename="accountaddresses");
        if($_data)
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Account Address Deleted');
            $Json_resultSave = array ('status' => '1');
            //echo json_encode($Json_resultSave);
            //exit();
       }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Account Address');
            $Json_resultSave = array ('status' => '0');
            //echo json_encode($Json_resultSave);
            //exit();
        }
    }
    public function order($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data ['icon']      = 'jol_1.ico';
        $data ['titel']= 'Jollof:-User Order Histor';
        $data ['meta_keyword']= 'Shopping,Fashion,Cuisine,Profile,Orders, Sales, Online, Homepage, ';
        $data ['nav'] =  $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_account';

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        
        if(!empty($id))
        {
            $get_data = $this->Profile_model->order_hst_list($id);
            if(!empty($get_data) )
            {
                $data ['allData'] =  $get_data ;
                //print("<pre>".print_r($get_data,true)."</pre>"); die;
                $data ['page_loader']= 'oye_mainpage_v/profile_order_view';
            }
            else
            {
                redirect('accounts/order');
            }
        }
        else
        {
            $data ['allData']   = $this->Profile_model->order_hst();
            //print("<pre>".print_r($get_data,true)."</pre>"); //die;

            $data ['page_loader']= 'oye_mainpage_v/profile_order';
        }

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';

            $this->load->view('oye_mainpage_v/account_template',$data);

    }

    public function confirmorder($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }
        
        $data_update = array( 
                            'status' => 4
                        );
        $query  = $this->Generic->edit($data_update, $id , $tablename="orderlistdetails");
        
        if($query)
        {
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
    }

    public function table_reservation($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data ['icon']      = 'jol_1.ico';
        $data ['titel']= 'Table Reservation Jollof:-Table Reservation';
        $data ['meta_keyword']= 'Shopping,Fashion,Cuisine,Table Reservation , Profile, Sales, Online, Homepage, ';
        $data ['nav'] =  $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_account';

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        
        if(!empty($id))
        {
            $get_data = $this->Profile_model->table_reservation_hst($id);
            if(!empty($get_data) )
            {
                $data ['allData'] =  $get_data ;
                //print("<pre>".print_r($get_data,true)."</pre>"); die;
                $data ['page_loader']= 'oye_mainpage_v/profile_table_view';
            }
            else
            {
                redirect('accounts/table_reservation');
            }
        }
        else
        {
            $data ['allData']   = $this->Profile_model->table_reservation_hst($id=null);
            //print("<pre>".print_r($get_data,true)."</pre>"); //die;

            $data ['page_loader']= 'oye_mainpage_v/profile_table';
        }

            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';

            $this->load->view('oye_mainpage_v/account_template',$data);

    }

    public function cancel_table($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data_update = array( 
                            'requeststatus' => 5
                        );
        $query  = $this->Generic->edit($data_update, $id , $tablename="tablereservations");
        
        if($query)
        {
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
    }
    
    public function giftportal($id=null)
    {
        $check_logged = $this->session->userdata('logged_in');
        $check_user = $this->session->userdata('Type');

        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        
                
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Giftportal';
            $data ['meta_keyword']= 'Shopping,Fashion, Sales, Online, Profile, Homepage,Giftportal ';
            $data ['nav'] =  $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_account';
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';


        if(!empty($id))
        {
            $data_where = array( 
                                'id' => $id,
                                'accountid' => $_SESSION['User_id']
                            );
            $user_data = $this->Generic->getByConditionFieldSingle($data_where, $tablename='ordergiftportal');
            //print("<pre>".print_r($user_data,true)."</pre>"); die;
            if(!empty($user_data) )
            {

                $user_address = $this->Generic->getByFieldSingle('id', $user_data['accountaddressid'], $tablename='accountaddresses'); 
                $user_addresscity = $this->Generic->getByFieldSingle('id', $user_address['cityid'], $tablename='state_cities'); // Get user adress city
                $user_addressstate = $this->Generic->getByFieldSingle('id', $user_address['stateid'], $tablename='states'); // Get user adress state
                //print("<pre>".print_r($user_data,true)."</pre>");//die;
                $data['allData']            = $user_data;
                $data['user_address']       = $user_address;
                $data['user_addresscity']   = $user_addresscity['cityname'];
                $data['user_addressstate']  = $user_addressstate['statename'];
                $data ['page_loader']       = 'oye_mainpage_v/profile_giftportalview';
            }
            else
            {
                redirect('accounts/giftportal');
            }
        }
        else
        {
            $data ['allData']   = $this->Generic->getByField($fieldname='accountid', $fieldvalue=$_SESSION['User_id'],$tablename='ordergiftportal');
            $data ['page_loader']= 'oye_mainpage_v/profile_giftportal'; 
        }

        $this->load->view('oye_mainpage_v/account_template',$data);
    }

    public function confirmgiftorder($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data_update = array( 
                            'status' => 4
                        );
        $query  = $this->Generic->edit($data_update, $id , $tablename="ordergiftportal");
        
        if($query)
        {
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
    }

    public function layaway($id=null)
    {
        if( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) && ( !isset($_SESSION['Type']) || $_SESSION['Type'] != 'User')  )
        { redirect('accounts/login', 'refresh'); }

        $data ['icon']      = 'jol_1.ico';
        $data ['titel']= 'Jollof:-User layaway Histor';
        $data ['meta_keyword']= 'Shopping,Fashion,Cuisine,Profile,Orders, Sales, Online, Homepage, ';
        $data ['nav'] =  $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_account';
        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';

        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        
        if(!empty($id))
        {
            $get_data = $this->Profile_model->order_hst_list($id);
            if(!empty($get_data) )
            {
                $data ['allData'] =  $get_data ;
                //print("<pre>".print_r($get_data,true)."</pre>"); die;
                $data ['page_loader']= 'oye_mainpage_v/profile_layaway_view';
            }
            else
            {
                redirect('accounts/layaway');
            }
        }
        else
        {
            $data ['allData']   = $this->Profile_model->getAllLayaway($_SESSION['User_id']);
            //print("<pre>".print_r($this->Profile_model->getAllLayaway($_SESSION['User_id']),true)."</pre>"); die;

            $data ['page_loader']= 'oye_mainpage_v/profile_layaway';
        }

            

            $this->load->view('oye_mainpage_v/account_template',$data);

    }

    public function layawaypaymentform($id)
    {
        $layaway = $this->Generic->getByFieldSingle('id', $id, $tablename='orderlayaway');

        $data_where = array( 
                                'accountid' => $_SESSION['User_id'],
                                'status'    =>  1
                            );
        $data['add_card']   = $this->Generic->findByCondition($data_where, $tablename='returncustomers');
        $data['layaway'] =  $layaway;
        $layaway_data= array(
                'total_cart' => $layaway['amountperpaymentplan'],
                'layaway_id' => $layaway['id'] 
                );

        $this->session->set_userdata($layaway_data);
       // print("<pre>".print_r($this->Generic->getByFieldSingle('id', $id, $tablename='orderlayaway'),true)."</pre>"); die;
        $this->load->view('oye_mainpage_v/profile_layawaypaymentform',$data);
    }

    public function couponform()
    {
        $this->load->view('oye_mainpage_v/couponform');
    }

    public function couponcodecheck()
    {
        $couponcode  =  $this->input->post('code');
        
        $data_check = array(  
                                 'couponcode'  =>  $couponcode,
                                 'status'    =>  1,
                                 'isdeleted' =>  0
                                 );
        $coupon_data =  $this->Generic->findByCondition($data_check,'coupon');
        //print("<pre>".print_r($coupon_data,true)."</pre>");//die;
        //print("<pre>".print_r($this->cart->contents(),true)."</pre>"); //die;
        if (!empty($coupon_data))
        {
            $today  = date('Y-m-d');
            $today  = strtotime($today);
            $coupon_datestart   =   strtotime($coupon_data[0]['datestart']); 
            $coupon_dateend     =   strtotime($coupon_data[0]['dateend']);

            //get cart qty and price
            $totalcart=0;
            foreach($this->cart->contents() as $key => $items)
            {
                if(!empty($items['fashion_productid']))
                {
                    $prd_cart = $items["price"]* $items["prd_qty"];
                }
                else
                {
                    $prd_cart = $items["price"];
                }

                $totalcart+=$prd_cart;
            }

            // check condition for coupon code
            if( $coupon_datestart > $today || $today >  $coupon_dateend )
            {
                $Json_resultSave = array (
                                    'status' => '0', 
                                    'content' => ' Expired Coupon Code .....'
                                    );
                echo json_encode($Json_resultSave);
                exit();
            }
            elseif( $coupon_data[0]['couponforguestalso'] == 0 &&( (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'User')) )
            {
                $Json_resultSave = array (
                                    'status' => '0', 
                                    'content' => 'Invalid User For this Coupon Code .....'
                                    );
                echo json_encode($Json_resultSave);
                exit();
            }
            elseif( $coupon_data[0]['numofuserspercouponcount'] >= $coupon_data[0]['numofuserspercoupon'] )
            {
                $Json_resultSave = array (
                                    'status' => '0', 
                                    'content' => 'Sorry Coupon Code Limit Usage.....'
                                    );
                echo json_encode($Json_resultSave);
                exit();
            }
            elseif( $coupon_data[0]['minamount'] > $totalcart )
            {
                $Json_resultSave = array (
                                    'status' => '0', 
                                    'content' => 'Insufficient Product Price For Coupon Code.....'
                                    );
                echo json_encode($Json_resultSave);
                exit();
            }
            else
            {
                if($coupon_data[0]['couponisper']==1)
                {
                    $discount = ($totalcart * $coupon_data[0]['coupondiscount'])/100;
                }
                else
                {
                    $discount = $coupon_data[0]['coupondiscount'];
                }

                
                $this->session->set_userdata('s_coupon_code', $couponcode);
                $this->session->set_userdata('s_coupon_discount', $discount);

                $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => 'Coupon Code Active.....'
                                    );
                echo json_encode($Json_resultSave);
                exit(); 
            }
        }
        else
        {
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Coupon Code Not Registered.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
        }
    }
    public function clearcoupon()
    {
        unset($_SESSION['s_coupon_code']);
        unset($_SESSION['s_coupon_discount']);
        $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => 'Coupon Code Cleared....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
    }
    function emailtest()
    {
        $maildrill_api=$this->config->item('Mailchimp_api_key');
        $maildrill=$this->Notifications->getEmailTemplate('integration testing');
        //$html_email = $this->getEmailTemplate('integration testing');
        $maildrill = str_replace("*|FNAME|*", "Segun", $maildrill);
        $maildrill = str_replace("*|LNAME|*", "info", $maildrill);
        $maildrill = str_replace("*|ARCHIVE|*", "https://staging.jollof.com/jollofadmin/", $maildrill);
        print("<pre>".print_r($maildrill,true)."</pre>");//die;
    }
    function getEmailUsers()
    {
        print("<pre>".print_r($this->config->item('Mandrill_api_key'),true)."</pre>");//die;
        require_once('./application/libraries/mandrill-api/Mandrill.php');
        try 
        {
            $mandrill = new Mandrill($this->config->item('Mandrill_api_key'));
            $result = $mandrill->users->info();
            //return $result;
            print("<pre>".print_r($result)."</pre>");//die;
            
        } 
        catch(Mandrill_Error $e) 
        {
            // Mandrill errors are thrown as exceptions
             echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
             throw $e;
        }
    }
    public function sendNotification()
    {
        // Server key from Firebase Console
define( 'API_ACCESS_KEY', 'AIzaSyCI7SvOusmb0HNsZiXUJ6zsx1lfvIgBJ7o' ); // Replace YOUR FIREBASE CLOUD MESSAGING API KEY with your Firebase Cloud Messaging server Key


// POST values
$token= 'esdPFhYG4zo:APA91bFJq5yFSRgerKPLahRA0snpWUnXxma7ZVU4zCwjMyWMz7crB_Yfj1V-8z-VFLiM5BK3NEBklv8tzNtc4Bm-EhW78kOVG_Fsac_JcBkIpvb_JhkasKxC0Nsdw-Z0l_Ag_0MgkCC7';
$title= 'Pending Order';
$message= 'just testing body message';
$postlink= site_url('');

$token = htmlspecialchars($token,ENT_COMPAT);
$title = htmlspecialchars($title,ENT_COMPAT);
$message = htmlspecialchars($message,ENT_COMPAT);
$postlink = htmlspecialchars($postlink,ENT_COMPAT);

// Push Data's
$data = array(
"to" => "$token",
"notification" => array( 
"title" => "$title", 
"body" => "$message", 
"icon" => site_url('assets/img/jollof_logo_2.png'), // Replace https://example.com/icon.png with your PUSH ICON URL
"click_action" => "$postlink")
);

// Print Output in JSON Format
$data_string = json_encode($data); 
     
// FCM API Token URL
$url = "https://fcm.googleapis.com/fcm/send";

//Curl Headers
$headers = array
(
     'Authorization: key=' . API_ACCESS_KEY, 
     'Content-Type: application/json'
);  

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, $url);                                                                 
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
                                                                                                                     
// Variable for Print the Result
$result = curl_exec($ch);
$err=curl_error($ch);

curl_close ($ch);

if($err)
{
    echo "curl_error .... ".$err;
}
else
{
    echo $result;
}


    }
    function sendemailtest()
    {
       //$maildrill_api=$this->config->item('Mailchimp_api_key');
        $email="seun@stakle.com";//"suashi.usoro@gmail.com" //'trivin98@gmail.com'//"seun@stakle.com"
        $emailname="seun";
        $maildrill=$this->Notifications->sendMailMandrillByTemp($emailname,$email,'integration testing');
        //$html_email = $this->getEmailTemplate('integration testing');
        print("<pre>".print_r($maildrill,true)."</pre>");//die;
    }
	
}