<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
	public function __construct()
	{
	  parent::__construct();
          $this->load->model('oye/Restaurant_admin_model');
          $this->load->model('oye/Super_admin_model');
          $this->load->model('oye/Session_model');
          $this->load->model('oye/Role_assignment');
          $this->load->model('Generic');
          
          $this->load->helper('text');
	}

	public function index()
	{
		$this->dashboard();
	}
        public function login()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Admin login';
                $data ['icon']= 'jol_1.ico';
                
                $data ['log_type']= 'Restaurant Login';
                
		$this->load->view('restaurant_admin/login', $data);
	}
        public function login_validation()
        {
                    //true
                    $email_c =  $this->input->post('l_email');
                    $pwd_c =  md5($this->input->post('l_pwd'));
                    // model
                     //call the model for auth
                    $this->load->model('restaurant_m/Auth');
                    $looker = $this->Auth->check_User_login($email_c, $pwd_c);
                    
                    switch($looker)
                        {
                            case 'logged_inn':
                            
                            //redirect("dashbord");
                            echo 'logged_inn';

                            break;

                            case 'Email_not_Found':


                                $mssg = "Email / Password not Found.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'Email not Found';

                            break;

                            case 'Incorrect_Password':

                                $mssg = "Incorrect Password.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                
                                echo 'Incorrect Password';



                            break;

                            case 'User_Not_Active':


                                $mssg = "User Account Deactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'User Not Active';

                            break;
                        }
        }

    public function signup()
	{
        $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data ['title']= 'Jollof:- Admin signup';
        $data ['icon']= 'jol_1.ico';
                
        $data ['log_type']= 'Restaurant Login';
        $data['state'] = $this->get_state();
		$this->load->view('restaurant_admin/signup', $data);
	}
        public function signup_validation()
        {
            $data_check = array(  
                                 'email'  =>  $_POST["r_email"],// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
            $check_data = $this->Restaurant_admin_model->is_user_email_available($data_check);
        
        if($check_data)  
        {  
          $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already Registered</label>'
                                  );
          echo json_encode($Json_resultSave);
          exit();
        }
        else{
            
            if (!empty($_FILES['Uplodefile']['name']) )
                {
                    $file_name = "Uplodefile";  // name of image input from the view
                    $newname = 'logo'.strtotime(date('Y-m-d h:i:s'));	 // Random Encryp new name save to app
                    if($_POST['reg_type']=='cuisine')
                    {
                        $uploade_loca='./assets/uploads/rest_logo/';
                    }
                    else
                    {
                        $uploade_loca='./assets/uploads/fashion_logo/';
                    }
                    
                    //chmod($uploade_loca,0777);
                    $config['upload_path'] = $uploade_loca;
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '4096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;
                    /*
                    if(is_file($config['upload_path']))
                    {
                        chmod($config['upload_path'], 777); ## this should change the permissions
                    }
                     * 
                     */

                    $this->load->library('upload', $config);
                    
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");
                            //die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'error' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                    else 
                        {
                            // using Thumbsnails helper
                            $data = $this->upload->data(); 
                            create_thumb($data, '150', '150', $uploade_loca, TRUE);
                        }  
                       
                    // data to save in db
                    // 
                    //$file_extn = strtolower(end(explode('.',$_FILES['Uplodefile']['name']))); // geting the extention file 
                    $exploded = explode('.',$_FILES['Uplodefile']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_Newrest = array( 
                                        'merchanttype' =>  $_POST['reg_type'],
                                        'companyname'  =>  $_POST['r_name'],
                                        'email'        =>  $_POST["r_email"],
                                        'address'      =>  $_POST["r_address"],
                                        'cityid'       =>  $_POST["r_city"],
                                        'stateid'      =>  $_POST["r_state"],
                                        'logo'         =>  $newname.'.'.$file_extn, // adding the Encryp name and the extention file 2gether
                                        'latitude'     =>  $_POST["latitude"],
                                        'longitude'    =>  $_POST["longitude"]
                                     );
                }
            else
                {
                    $data_Newrest = array( 
                                        'merchanttype' =>  $_POST['reg_type'],
                                        'companyname'  =>  $_POST['r_name'],
                                        'email'        =>  $_POST["r_email"],
                                        'address'      =>  $_POST["r_address"],
                                        'cityid'       =>  $_POST["r_city"],
                                        'stateid'      =>  $_POST["r_state"],
                                        'latitude'     =>  $_POST["latitude"],
                                        'longitude'    =>  $_POST["longitude"]
                                     );
                }
                //
                // save the new user data  table //
                //print("<pre>".print_r($data_Newrest,true)."</pre>");die; 

                $insert_data = $this->Restaurant_admin_model->_insertnewrest($data_Newrest);// insert to db 
                
                //print("<pre>".print_r($insert_data,true)."</pre>");die; 
                if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
                else
                {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'error' => $insert_data,
                                            'content' => 'Error in Registering Merchant..... Try Again!!!'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            
            }
        }
        
        public function resendConfirmation() 
        {
            $email= $_POST['email'];
            $time = date('Y-m-d H:i:s');
            $tim  = strtotime($time);
            $token= do_hash($email.$tim);
            
            $user_info = $this->Restaurant_admin_model->_getrest_details_email($email);
            
            if($user_info)
            {
                $data_token = array(
                        'confirmemail'=> $token
                        );
                
                $newtoken = $this->Restaurant_admin_model->newtoken($data_token,$user_info->id);
               
                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $sendemail=$this->Email_model->send_restaurant_registration_email($user_info->firstname, $user_info->lastname, $email, $site_email, $logo,$token, $user_info->companyname );
                
                if($sendemail[0]['status'] !='sent') 
                {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content'=> 'Confirmation Email Not sent'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
                else
                {
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content'=> 'Confirmation Email Resent'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            }
            else
            {
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content'=> 'Confirmation Email Details Error'
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
                    $token_url =$this->uri->segment(3);
        			//check if the token and id exist in the database
        			$chck = $this->Restaurant_admin_model->signup_token($token); //5f2b244ccb1e261995ba939a29eb0facf11c80e0
                        
                        $this->db->select("users.confirmemail")->from("users");
                        $this->db->get()->row();
                
                        //print("<pre>".print_r( $chck,true)."</pre>");//die;
        			if($chck==true)
        			{
                                    
                                    $data ['icon']= 'jol_1.ico';
                                    $data ['titel']= 'Welcome Back Merchant :: Jollof';
                                    $success = 
                                            '<div class="container" style="margin-top:2%;">
                                                <div class="row">
                                                    <div class="jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                                                        <h2 class="text-center">Thank you for confirming your email address <a href="'. site_url().'"><img src=" '.base_url().'assets/img/jollof_logo.png" alt=""></a></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                                                        <center><div class="btn-group" style="margin-top:10px;">
                                                            <h4>Next Store Verification</h4>
                                                            You will be notifed When your Store is Verified by Ebs Admin.<br>
                                                            Thanks 
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
                    else
                    {
        			 redirect('', 'refresh');
                    }
        			
        		}
                else
                {
			         redirect('', 'refresh');
                }
        }
        
    public function validationusers($token=false) 
    {
            
        if(!empty($token))
		{
			
			$token 	= $token;
            $token_url =$this->uri->segment(3);
			//check if the token and id exist in the database

            $data_check_token = array(  
                                 'confirmemail'  =>  $token
                                 );
            $check_token = $this->Restaurant_admin_model->check_token($data_check_token);

            if($check_token)  
            { 
                    
                $userinfo= $this->Generic->getByFieldSingle('confirmemail', $token, $tablename='users');
                $usermerchantinfo= $this->Generic->getByFieldSingle('id',  $userinfo['restaurantid'], $tablename='restaurants'); 

                if($usermerchantinfo['merchanttype'] == "cuisine"){$url='cuisineadmin';}
                else if ($usermerchantinfo['merchanttype'] == "fashion"){$url='fashionadmin';}
                else{$url='cuisineadmin';}
                //print("<pre>".print_r( $usermerchantinfo['merchanttype'],true)."</pre>");die;
            
    			$chck = $this->Restaurant_admin_model->signup_token($token); //5f2b244ccb1e261995ba939a29eb0facf11c80e0
                            
    			if($chck)
    			{
                   
                    //print("<pre>".print_r( $userinfo,true)."</pre>");die;           
                                $data ['icon']= 'jol_1.ico';
                                $data ['titel']= 'Welcome Back Merchant :: Jollof';
                                $success = 
                                        '<div class="container" style="margin-top:1%;">
                                            <div class="row">
                                                <div class="col-lg-12 jumbotron" style="box-shadow: 2px 2px 4px #000000;">
                                                    <h2 class="text-center">Thank you for confirming your email address <a href="'. site_url().'"><img src=" '.base_url().'assets/img/jollof_logo.png" alt=""></a></h2><!--<span style="color:#F89406;">The</span><span style="color:#26A65B;">Jollof</span><span style="color:#19B5FE;">Number</span>-->
                                                    <center><div class="btn-group" style="margin-top:10px;">
                                                        <h4>Next Step:- <span class="linkcolor"><a href="'. site_url($url).'">Click Here...</a> </span> to login to your Dashboard</h4>
                                                        
                                                    </div></center>
                                                </div>
                                            </div>
                                        </div>';
                                
                                $data['error_msg']=$success;
                                $data['userinfo']=$userinfo;
                                
                                $data ['icon']= 'jol_1.ico';
                                $data ['titel']= 'Jollof:-Home';
                                $data['info']= $this->Super_admin_model->get_admin_info();
                                $data ['meta_keyword']= 'Shopping,Fashion,cuisine, jollof,Sales, Online, Homepage ';
                                $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                                $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                                $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_index';
                                $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
                                $data ['footer_loader']= 'included/fashionpage_included/footer';
                                $data ['error_page'] = 'included/error_page_fashion';
                                $data ['page_loader']= 'oye_mainpage_v/userrole_confirmation';

                                $this->load->view('oye_mainpage_v/account_template',$data);
                                //$this->load->view('included/header', $data);
                                //$this->load->view('oye_mainpage_v/userrole_confirmation',$data);
                                //$this->load->view('included/footer', $data);
    				
    			}
                else
                {
                                    //print("<pre>".print_r( 'non',true)."</pre>");die;
    			 redirect('', 'refresh');
                }
            }
            else
            {
                redirect('', 'refresh');
            }
			
		}
        else
        {
			redirect('', 'refresh');
        }
    }
        
    public function logout()
	{
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('rest_id');
            $this->session->unset_userdata('Role_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            $this->session->unset_userdata('Type_id');
            
            redirect('restaurant-admin/login', 'refresh');
            exit;
            
	}
        public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'restaurant')
            {
                    //$this->index(); 
                    redirect('restaurant-admin/login', 'refresh');	
            }
		
	}
        public function validate_permission($method)
        {
            $check=$this->Session_model->validate($method);
           // print("<pre>".print_r($check,true)."</pre>");die;
            if($check !="true")
            {
                redirect('restaurant-admin/Accessdenied', 'refresh');
            }
            
        }
        public function Accessdenied()
        {
            $this->check_Loginin();
                
            $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
            $data['error_page'] = 'included/rest_included/error_page';
            $data ['title']= 'Jollof:-Restaurant permissiondenied';
            $data ['icon']= 'jol_1.ico';


            $data ['sidebar']= 'included/rest_included/sidebar_menu';
            $data ['header']= 'included/rest_included/header_nav';
            $data ['tray']= 'included/rest_included/header_tray';

            $data ['page_loader']= 'restaurant_admin/permissiondenied_page';

            $this->load->view('restaurant_admin/template', $data); 
        }
        
        public function get_state()
        {
            $get_state = $this->Restaurant_admin_model->get_allstate(); // call state
            return $get_state;
            
        }
	public function dashboard()
	{
                $this->check_Loginin();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:-Restaurant Dashboard';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/dashboard';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function add_product()
	{       
               // $this->check_Loginin();
                
                //$this->validate_permission(__METHOD__);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $resta_id = $_SESSION['rest_id'];
                $data['cate']= $this->Restaurant_admin_model->get_restaurant_category($resta_id);
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/productnew';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        public function check() {
            print_r($_SESSION);
            $id = uniqid('ORD.');
            $id2 = strtotime(date('Y-m-d h:i:s'));
            
            $id3='ORD-'. strtoupper(substr(uniqid(sha1(time())),0,15));
            echo '<br>'.$id .'<br>'.$id2 .'<br>'.$id3 ;
            
        }
        
        public function order()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
                $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
                $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/order';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function order_products()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $ord_id = $this->uri->segment(3);
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data['order_d']= $this->Restaurant_admin_model->get_order_products_where($ord_id);
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/order_prd';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function order_pending()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
                $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
                $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/order_pending';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
    public function order_processing()
	{
        $this->check_Loginin();
        $this->validate_permission(__METHOD__);
                
        $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
        $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
        $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
        $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
        $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data['error_page'] = 'included/rest_included/error_page';
        $data ['title']= 'Jollof:- orders';
        $data ['icon']= 'jol_1.ico';
        
        $data ['sidebar']= 'included/rest_included/sidebar_menu';
        $data ['header']= 'included/rest_included/header_nav';
        $data ['tray']= 'included/rest_included/header_tray';
        
        $data ['page_loader']= 'restaurant_admin/order_processing';
		$this->load->view('restaurant_admin/template', $data); 
	}
        
    public function order_cancel()
	{
        $this->check_Loginin();
        $this->validate_permission(__METHOD__);
                
        $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
        $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
        $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
        $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
        $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data['error_page'] = 'included/rest_included/error_page';
        $data ['title']= 'Jollof:- orders';
        $data ['icon']= 'jol_1.ico';
        
        $data ['sidebar']= 'included/rest_included/sidebar_menu';
        $data ['header']= 'included/rest_included/header_nav';
        $data ['tray']= 'included/rest_included/header_tray';
        
        $data ['page_loader']= 'restaurant_admin/order_cancel';
		$this->load->view('restaurant_admin/template', $data); 
	}
        
    public function order_delivery()
	{
        $this->check_Loginin();
                
        $this->validate_permission(__METHOD__);
        
        $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
        $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
        $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
        $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
        $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
        $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data['error_page'] = 'included/rest_included/error_page';
        $data ['title']= 'Jollof:- orders';
        $data ['icon']= 'jol_1.ico';
        
        $data ['sidebar']= 'included/rest_included/sidebar_menu';
        $data ['header']= 'included/rest_included/header_nav';
        $data ['tray']= 'included/rest_included/header_tray';
        
        $data ['page_loader']= 'restaurant_admin/order_delivery';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
    public function order_delivered()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
                $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
                $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/order_delivered';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
    public function product()
	{
		$this->check_Loginin();
                //echo __METHOD__; die;
                //$this->Session_model->validate(__METHOD__);
                
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/product';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function get_product()
	{  
                $resta_id = $_SESSION['rest_id'];
                $get_prod = $this->Restaurant_admin_model->_get_product();
                
                //print("<pre>".print_r($get_prod,true)."</pre>");
                //die;

                $data_prod = array();  
                foreach($get_prod as $row)  
                {  
                     $sub_array = array();
                     
                     $sub_array[] = date('jS M \, Y \- g:i A', strtotime($row->createdat));
                     
                     $products_img = null;
                                    if(!empty($row->productimage))
                                        {
                                            $products_img= $row->productimage;
                                        }
                                    else 
                                        {
                                            $products_img= 'no_food_img.jpg';
                                        }
                                        
                     $sub_array[] = '<img class="db_prdimg" src="'. base_url().'assets/uploads/rest_prod/'. $products_img.'" >';  
                     $sub_array[] = $row->productname;  
                     $sub_array[] = $row->productdesc;
                     $sub_array[] = $row->categoryname;
                     $sub_array[] = '<div class="text-center">'.$row->productprice.'</div>';
                     
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$row->id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$row->id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($row->status == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';
                     
                     $sub_array[] = $status;
                     $sub_array[] = '<div class="btn-group btn-group-xs"> 

                                        <a href="'.site_url('restaurant_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_prd" title="View" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-eye"></i></a>

                                        <a href="" id="'.$row->id.'" data-product_id="'.$row->id.'" data-product_name="'.$row->productname.'" data-toggle="tooltip" title="Delete" class="jboxtooltip btn btn-xs btn-danger prd_del"><i class="fa fa-times"></i></a>

                                    </div>';  
                     $data_prod[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_product_all(),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data(),  
                     "data"             =>     $data_prod  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        public function category()
	{
		//$this->check_Loginin();
                
                //$this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Category';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/category';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function table_reservation() 
        {
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';

                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';

                $data ['page_loader']= 'restaurant_admin/table_reservation';

                $this->load->view('restaurant_admin/template', $data); 
        }
        
        public function settings()
	{
		$this->check_Loginin();
                $this->validate_permission(__METHOD__);
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Settings';
                $data ['icon']= 'jol_1.ico';
                
                
                $rest_data = $this->Restaurant_admin_model->get_restaurant_info();
                $data['rest_data']= $rest_data;
                
                $data['rest_state']= $this->Restaurant_admin_model->get_allstate(); //call state
                $data['rest_city']= $this->Restaurant_admin_model->get_allcity_where($rest_data->stateid); // call City by State
                $data['rest_time']= $this->Restaurant_admin_model->get_restaurant_time(); // call restaurant opening time
                $data['rest_gene']= $this->Restaurant_admin_model->get_user_info(); // call User info 
                $data['rest_cusine']= $this->Restaurant_admin_model->get_cuisaine_cate_byid(); // call cuisine
                $data['rest_cusine_option']= $this->Restaurant_admin_model->get_cuisaine_cate_option(); // call cuisine
                
                //print("<pre>".print_r($this->Restaurant_admin_model->get_cuisaine_cate_byid(),true)."</pre>");die;
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/settings';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        public function profile()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Profile Settings';
                $data ['icon']= 'jol_1.ico';
                
                
                
                $data['rest_gene']= $this->Restaurant_admin_model->get_user_info(); // call User info 
                $data['rest_cusine']= $this->Restaurant_admin_model->get_cuisaine_cate_byid(); // call cuisine
                $data['rest_cusine_option']= $this->Restaurant_admin_model->get_cuisaine_cate_option(); // call cuisine
                
                //print("<pre>".print_r($this->Restaurant_admin_model->get_cuisaine_cate_byid(),true)."</pre>");die;
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/profile';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        public function promo_banner()
	{
		//$this->check_Loginin();
                //$this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Promo & Banner';
                $data ['icon']= 'jol_1.ico';
                
                
                $data['admin_info']= $this->Super_admin_model->get_admin_info(); 
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/promobanner';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        public function users()
	{
		$this->check_Loginin();
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Users';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/users';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
		$this->load->view('restaurant_admin/template', $data); 
	}
        public function userroles()
	{
		//$this->check_Loginin();
                //$this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Users Roles';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/userroles';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        
}
