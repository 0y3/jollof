<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
          $this->load->model('oye/Super_admin_model');
          $this->load->model('oye/Fashion_model');
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
                
		$this->load->view('super_admin/login', $data);
	}
        public function login_validation()
        {
                    //true
                    $email_c =  $this->input->post('l_email');
                    $pwd_c =  md5($this->input->post('l_pwd'));
                    // model
                     //call the model for auth
                    $this->load->model('admin_m/Auth');
                    $looker = $this->Auth->check_Admin_login($email_c, $pwd_c);
                    
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


                                $mssg = "Admin Account Disactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'Admin Not Active';

                            break;
                        }
//                    if($this->Auth->check_User_login($email_c, $pwd_c))
//                        {
//
//                        }
//                    else
//                        {
//                        echo'something went wrong';
//                        }

             
            
        }
        public function signup()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim signup';
                $data ['icon']= 'jol_1.ico';
                
		//$this->load->view('restaurant_admin/signup', $data);
	}
        public function logout()
	{
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('Role_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            
            redirect('admin/login', 'refresh');
            exit;
            
	}
        public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'admin')
            {
                //$this->index(); 
                //print_r( $_SESSION );die;
                redirect('admin/login', 'refresh');	
            }
		
	}
	public function dashboard()
	{
                $this->check_Loginin();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:-Admin Dashboard';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/dashboard';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function table_reservation ()
	{       
                $this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Table';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/table_reservation';
                
		$this->load->view('super_admin/template', $data);  
                
	}
        
        public function b2bregistration ()
	{       
                $this->check_Loginin();
                
                $ord_id = $this->uri->segment(3);
                
                $data['all']    = $this->Super_admin_model->_count_all_b2bregistration("3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bregistration("0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bregistration("1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bregistration';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2bregistered ()
	{       
                $this->check_Loginin();
                
                $ord_id = $this->uri->segment(3);
                
                $data['all']    = $this->Super_admin_model->_count_all_b2bregistration("3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bregistration("0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bregistration("1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bregistered';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2brestaurants ()
	{       
                $this->check_Loginin();
                
                $ord_id = $this->uri->segment(3);
                
                $data['all']    = $this->Super_admin_model->_count_all_b2bregistration("3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bregistration("0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bregistration("1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2brestaurants';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2baddregistration ()
	{       
                $this->check_Loginin();
                
                $ord_id = $this->uri->segment(3);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2baddregistration';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        public function b2bpromobanner_nav_tray() 
	{
            $usertype ="restaurant";
            $data['all']   = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
            $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
            $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
            $this->load->view('super_admin/b2bpromobanner_nav_tray',$data);
        }
        public function b2bpromobanner ()
	{       
                $this->check_Loginin();
                
                $usertype ="restaurant";
                $data['all']   = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bpromobanner';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2bpromobannerall ()
	{       
                $this->check_Loginin();
                
                $usertype ="restaurant";
                $data['all']   = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bpromobanner_all';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2bpromobannerapproved ()
	{       
                $this->check_Loginin();
                
                $usertype ="restaurant";
                $data['all']   = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bpromobanner_approved';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function thirdpartyads ()
	{       
                $this->check_Loginin();
                
                $usertype ="third";
                $data['all']    = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bthirdpartyads';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        public function thirdpartyadsall ()
	{       
                $this->check_Loginin();
                
                $usertype ="third";
                $data['all']    = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bthirdpartyads_all';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        public function thirdpartyadsapproved ()
	{       
                $this->check_Loginin();
                
                $usertype ="third";
                $data['all']    = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
                $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
                $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bthirdpartyads_approved';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function comments ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2ccomment';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2btestimonial ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2btestimonial';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function giftredemption ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2cgiftredemption';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2cusers ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2cuser';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2corders ()
	{       
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2corder';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        public function b2corder_pending()
	{
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/b2corder_pending';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function b2corder_processing()
	{
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/b2corder_processing';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function b2corder_cancel()
	{
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/b2corder_cancel';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function b2corder_delivery()
	{
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/b2corder_delivery';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function b2corder_delivered()
	{
                $this->check_Loginin();
                
                $data['pending']   = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/b2corder_delivered';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function cuisinebannerhomeset ()
	{       
                $this->check_Loginin();
                
                $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(1);
                $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
                $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Cuisine banners';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/cuisine_slider_homepage';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function cuisinebannercenterset ()
	{       
                $this->check_Loginin();
                
                $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(1);
                $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
                $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Cuisine banners';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/cuisine_slider_homepage_center';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        public function cuisinebannerrestaurantpage ()
	{       
                $this->check_Loginin();
                
                $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(1);
                $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
                $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Cuisine banners';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/cuisine_slider_homepage_restaurant';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function jollofbannerhomeset ()
	{       
                $this->check_Loginin();
                
                $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(4);
                $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
                $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
            
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- banners';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/jollof_slider_homepage';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function emailblast ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- email Blast';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/emailblast';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        
        public function b2bbilling ()
	{       
                $this->check_Loginin();
                
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Billing';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bregistered_billingform';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2bbillingreport ()
	{       
                $this->check_Loginin();
                
                
                $data['all_rest']    = $this->Super_admin_model->_all_restaurant_data_billed();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Billing';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bregistered_billing';
                
		$this->load->view('super_admin/template', $data); 
                
	}
        
        public function b2bbilledrestaurant ()
	{       
                $this->check_Loginin();
                
                $data ['getfrom_id'] = $this->input->post('id');
                $data ['start_date'] = $this->input->post('start_date');
                $data ['end_date'] = $this->input->post('end_date');
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Billing';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/b2bregistered_billing_res';
                
		$this->load->view('super_admin/template', $data); 
                
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
                
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/order_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_products()
	{
                $this->check_Loginin();
                
                $ord_id = $this->uri->segment(3);
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data['order_d']= $this->Super_admin_model->get_order_products_where($ord_id);
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/order_prd';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_pending()
	{
                $this->check_Loginin();
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order_pending';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_processing()
	{
                $this->check_Loginin();
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order_processing';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_cancel()
	{
                $this->check_Loginin();
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order_cancel';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_delivery()
	{
                $this->check_Loginin();
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order_delivery';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function order_delivered()
	{
                $this->check_Loginin();
                
                $data['all_rest'] = $this->Super_admin_model->_all_restaurant_data_fromorder();
                
                $data['pending']    = $this->Super_admin_model->_get_pending_order();
                $data['processing'] = $this->Super_admin_model->_get_processing_order();
                $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
                $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
                $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/order_delivered';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function product()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/product';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        
        public function get_product()
	{  
                $this->check_Loginin();
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
                                        
                     $sub_array[] = '<img class="db_prdimg" src="'. base_url().'assets/uplods/rest_prod/'. $products_img.'" >';  
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

                                        <a href="" id="'.$row->id.'" data-toggle="tooltip" title="Delete" class="jboxtooltip btn btn-xs btn-danger prd_del"><i class="fa fa-times"></i></a>

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
        
        
       
        
        public function settings()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Admin Settings';
                $data ['icon']= 'jol_1.ico';
                
                
                $rest_data = $this->Super_admin_model->get_admin_info();
                $data['super_data']= $rest_data;
                
                //print("<pre>".print_r($rest_data,true)."</pre>");
                //die;
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/settings';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function deliveringcharges()
	{
		$this->check_Loginin();
                
                
                $data['all_state']    = $this->Super_admin_model->get_allstate();
                $data['all_city']     =  $this->Super_admin_model->get_allcity();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- deliveringcharges Settings';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/deliveringcharges';
                
		$this->load->view('super_admin/template', $data); 
	}
        public function location()
	{
		$this->check_Loginin();
                
                
                $data['all_state']    = $this->Super_admin_model->get_allstate();
                $data['all_city']     =  $this->Super_admin_model->get_allcity();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- locations Settings';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/location';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function faqeditor()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- FAQ Settings';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/faq_editor';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function fashioncategory()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Fashion category ';
                $data ['icon']= 'jol_1.ico';
                
                $data ['nav'] = $this->Super_admin_model->_get_parent_nav_by_cate();
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/fashioncategory';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function fashionsize()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Fashion sizes ';
                $data ['icon']= 'jol_1.ico';
                
                $data ['cate_size'] = $this->Super_admin_model->_get_cate_size_();
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/fashionsize';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function fashioncolor()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- Fashion Color ';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                
                $data ['page_loader']= 'super_admin/fashioncolor';
                
		$this->load->view('super_admin/template', $data); 
	}
        public function cuisinecategory()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/admin_included/error_page';
                $data ['title']= 'Jollof:- cuisine category';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/cuisine_category';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        
}
