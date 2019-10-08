<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
          $this->load->model('oye/Restaurant_admin_model');
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
        public function signup()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim signup';
                $data ['icon']= 'jol_1.ico';
                
		$this->load->view('restaurant_admin/signup', $data);
	}
        public function logout()
	{
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('User_id');
            $this->session->unset_userdata('rest_id');
            $this->session->unset_userdata('first_name');
            $this->session->unset_userdata('last_name');
            $this->session->unset_userdata('Email');
            $this->session->unset_userdata('Type');
            
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
	public function dashboard()
	{
                //$this->check_Loginin();
                
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:-Restaurant Dashboard';
                $data ['icon']= 'jol_1.ico';
                
                
                $data ['sidebar']= 'included/admin_included/sidebar_menu';
                $data ['header']= 'included/admin_included/header_nav';
                $data ['tray']= 'included/admin_included/header_tray';
                
                $data ['page_loader']= 'super_admin/dashboard';
                
		$this->load->view('super_admin/template', $data); 
	}
        
        public function add_product()
	{       
                $this->check_Loginin();
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

                                        <a href="'.site_url('restaurant_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_prd" title="View" class="btn btn-xs btn-default prd_view"><i class="fa fa-eye"></i></a>

                                        <a href="" id="'.$row->id.'" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger prd_del"><i class="fa fa-times"></i></a>

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
		$this->check_Loginin();
                
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
        
        public function settings()
	{
		$this->check_Loginin();
                
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
                
                //print("<pre>".print_r($query,true)."</pre>");
                //die;
                
                $data ['sidebar']= 'included/rest_included/sidebar_menu';
                $data ['header']= 'included/rest_included/header_nav';
                $data ['tray']= 'included/rest_included/header_tray';
                
                $data ['page_loader']= 'restaurant_admin/settings';
                
		$this->load->view('restaurant_admin/template', $data); 
	}
        
        
}
