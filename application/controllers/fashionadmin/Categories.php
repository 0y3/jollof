<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
          $this->load->model('oye/Restaurant_admin_model');
          $this->load->model('oye/Fashion_model');
          $this->load->model('oye/Session_model');
          $this->load->model('oye/Role_assignment');
          $this->load->helper('text');
	}

	public function index()
	{
		$this->dashboard();
	}
        public function login()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim login';
                $data ['icon']= 'jol_1.ico';
                
                $data ['log_type']= 'Fashion Login';
                
		$this->load->view('fashion_admin/login', $data);
	}
        public function login_validation()
        {
                    //true
                    $email_c =  $this->input->post('l_email');
                    $pwd_c =  md5($this->input->post('l_pwd'));
                    // model
                     //call the model for auth
                    $this->load->model('restaurant_m/Auth');
                    $looker = $this->Auth->check_fashion_login($email_c, $pwd_c);
                    
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


                                $mssg = "User Account Disactivated.....";
                                
                                $this->session->set_flashdata('msg', $mssg);
                                //redirect(base_url().'adminoye/login', 'refresh');
                                
                                echo 'User Not Active';

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
        
        
        
        
        public function logout()
	{
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('Role_id');
            $this->session->unset_userdata('rest_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            
            redirect('fashion-admin/login', 'refresh');
            exit;
            
	}
        public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'fashion')
            {
                    //$this->index(); 
                    redirect('fashion-admin/login', 'refresh');	
            }
		
	}
        public function validate_permission($method)
        {
            $check=$this->Session_model->validate($method);
            if($check !="true")
            {
                redirect('fashion-admin/Accessdenied', 'refresh');
            }
            
        }
        public function Accessdenied()
        {
            $this->check_Loginin();
                
            $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
            $data['error_page'] = 'included/fashion_included/error_page';
            $data ['title']= 'Jollof:-Fashion permissiondenied';
            $data ['icon']= 'jol_1.ico';


            $data ['sidebar']= 'included/fashion_included/sidebar_menu';
            $data ['header']= 'included/fashion_included/header_nav';
            $data ['tray']= 'included/fashion_included/header_tray';

            $data ['page_loader']= 'fashion_admin/permissiondenied_page';

            $this->load->view('fashion_admin/template', $data); 
        }
        public function get_state()
        {
            $get_state = $this->Fashion_model->get_state_where(); // call state
            return $get_state;
            
        }
	public function dashboard()
	{
                $this->check_Loginin();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:-Restaurant Dashboard';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/dashboard';
                
		$this->load->view('fashion_admin/template', $data);
	}
        
        public function newproduct()
	{       
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/fashion_included/error_page';
                $data ['title']= 'Jollof:- New Product';
                $data ['icon']= 'jol_1.ico';
                
                $resta_id = $_SESSION['rest_id'];
                $data['cate']= $this->Fashion_model->_get_parent_nav_by_cate();
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/productnew';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order';
                
		$this->load->view('fashion_admin/template', $data); 
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
                
                $data['order_d']= $this->Fashion_model->get_order_products_where($ord_id);
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_prd';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order_pending()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_pending';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order_processing()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_processing';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order_cancel()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_cancel';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order_delivery()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_delivery';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function order_delivered()
	{
                $this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data['pending']    = $this->Fashion_model->_get_pending_order();
                $data['processing'] = $this->Fashion_model->_get_processing_order();
                $data['canceled']  = $this->Fashion_model->_get_canceled_order();
                $data['delivery']  = $this->Fashion_model->_get_delivery_order();
                $data['delivered']  = $this->Fashion_model->_get_delivered_order();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/order_delivered';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function product()
	{
		$this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/fashion_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/product';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        
        public function product_stock_manager() 
        {
            $this->check_Loginin();
            
            $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/fashion_included/error_page';
                $data ['title']= 'Jollof:- orders';
                $data ['icon']= 'jol_1.ico';
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/productstockmanager';
                
		$this->load->view('fashion_admin/template', $data); 
        }
        
        public function settings()
	{
		$this->check_Loginin();
                
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Settings';
                $data ['icon']= 'jol_1.ico';
                
                
                $rest_data = $this->Fashion_model->get_restaurant_info($_SESSION['rest_id']);
                $data['rest_data']= $rest_data;
                
                $data['rest_state']= $this->Fashion_model->get_allstate(); //call state
                $data['rest_city']= $this->Fashion_model->get_city_bystate($rest_data->stateid); // call City by State
                $data['rest_gene']= $this->Fashion_model->get_user_info(); // call User info
                
                //print("<pre>".print_r($query,true)."</pre>");
                //die;
                
                $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/settings';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        public function profile()
	{
		$this->check_Loginin();
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Profile Settings';
                $data ['icon']= 'jol_1.ico';
                
                
                
                $data['rest_gene']= $this->Fashion_model->get_user_info(); // call User info 
                
                //print("<pre>".print_r($this->Restaurant_admin_model->get_cuisaine_cate_byid(),true)."</pre>");die;
                
                 $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/profile';
                
		$this->load->view('fashion_admin/template', $data); 
	}
        public function users()
	{
		$this->check_Loginin();
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Users';
                $data ['icon']= 'jol_1.ico';
                
                
                 $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/users';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
		$this->load->view('fashion_admin/template', $data); 
	}
        public function userroles()
	{
		$this->check_Loginin();
                $this->validate_permission(__METHOD__);
                
                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Users Roles';
                $data ['icon']= 'jol_1.ico';
                
                
                 $data ['sidebar']= 'included/fashion_included/sidebar_menu';
                $data ['header']= 'included/fashion_included/header_nav';
                $data ['tray']= 'included/fashion_included/header_tray';
                
                $data ['page_loader']= 'fashion_admin/userroles';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
		$this->load->view('fashion_admin/template', $data); 
	}
        
        
        
}
