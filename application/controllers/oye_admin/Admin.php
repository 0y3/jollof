<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	}

	public function index()
	{
		echo'working page admin';
	}
        public function login()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim login';
                
		$this->load->view('oye_admin_v/login', $data);
	}
        public function login_validation()
        {
            $this->load->library('form_validation');
            
                    //true
                    $email_c =  $this->input->post('l_email');
                    $pwd_c =  md5($this->input->post('l_pwd'));
                    // model
                     //call the model for auth
                    $this->load->model('oye/Auth');
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
                
		$this->load->view('oye_admin_v/signup', $data);
	}
        public function logout()
	{
            $this->session->sess_destroy();
            redirect(base_url().'adminoye/login', 'refresh');
            exit;
            
	}
	public function dashboard()
	{
            //$this->load->library('../controllers/oye_admin/Security');
           // $this->Security->_is_admin_checker();
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim signup';
                
                $data ['page_loader']= 'oye_admin_v/dashboard';
                $data ['sidebar']= 'oye_admin_v/sidebar_menu';
                 
		$this->load->view('oye_admin_v/template2', $data);
	}
        public function order()
	{
		$data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data ['title']= 'Jollof:- Adim signup';
                
                $data ['page_loader']= 'oye_admin_v/order';
                $data ['sidebar']= 'oye_admin_v/sidebar_menu';
                 
		$this->load->view('oye_admin_v/template2', $data);
	}
        public function test()
	{
		echo'working page admin';
	}
}
