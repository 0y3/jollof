<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuisine extends CI_Controller {

        function __construct()
	{
	  parent::__construct();
          $this->load->library('session');
          $this->load->model('oye/Auth'); //call the model for auth
          $this->load->model('oye/Account_model');
          $this->load->model('oye/Profile_model');
          $this->load->model('oye/Restaurant_admin_model');
          $this->load->model('oye/Super_admin_model');
	}
        
    public function index()
    {   
        
    
        //$data['banner'] = $this->Super_admin_model->_banner(1);
        //$data['small_banner'] = $this->Super_admin_model->_banner(2);

        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Cuisine Home';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['super_data'] = $this->Super_admin_model->get_admin_info();
        $data ['meta_keyword']= 'Shopping,cuisine, jollof,Sales, Online, Homepage ';
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

        $data['rest_logo'] = $this->Super_admin_model->_rest_logo();
        
        $data['state'] = $this->Restaurant_admin_model->get_allstate(); // call state

        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';
        $data ['page_loader']= 'oye_mainpage_v/index_cuisine';

        $this->load->view('oye_mainpage_v/account_template',$data);
    }

	public function index_old()
	{   
                
                $data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Jollof:-Home';
                
                $data['info']= $this->Super_admin_model->get_admin_info();
                $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
                //$data['banner'] = $this->Super_admin_model->_banner(1);
                //$data['small_banner'] = $this->Super_admin_model->_banner(2);
                $data['rest_logo'] = $this->Super_admin_model->_rest_logo();
                $data['super_data'] = $this->Super_admin_model->get_admin_info();
                
                $data['state'] = $this->Restaurant_admin_model->get_allstate(); // call state
                
                $this->load->view('included/header', $data);
		        $this->load->view('oye_mainpage_v/index_cuisine', $data);
                $this->load->view('included/footer', $data);
	}
        
        public function get_city_byid()
        {   $by_id = $_POST["stateid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Account_model->get_city_where($by_id); // call City by State
                //return $get_city;
                $get_data='';
                $get_elem='';
                $get_li='';
                foreach($get_city as $row)
                {
                    //echo '<option value="'.$row->id.'">'.$row->cityname.'</option>';
                    $get_data.='<option value="'.$row->id.'">'.$row->cityname.'</option>';
                    $get_elem.='<li data-val="'.$row->id.'" class="" data-element="'.$row->id.'">'.$row->cityname.'</li>';
                    $get_li.='<li><a href="" data-valid="'.$row->id.'" class="city_link">'.$row->cityname.'</a></li>'; 
                }
            }
            else{
                
                //echo '<option value="">City not available</option>';
                $get_data.='<option value="">City not available</option>';
                $get_elem.='<li data-val="" class="" data-element="">City not available</li>';
                $get_li.='';
            }
            
            $Json_resultSave = array (
                                    'option' => $get_data,
                                    'element' => $get_elem,
                                    'li' => $get_li
                                    );
            echo json_encode($Json_resultSave);
            
        }
        
        /*
	public function allrestaurants()
	{   print_r($_SESSION); 
         
		$data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Jollof:-Restaurant';
                $this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/restaurantsnew', $data);
                $this->load->view('included/footer', $data);
	}
        
        public function restaurants_view()
	{
		$data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Jollof:-Restaurant';
                $this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/restaurants_view', $data);
                $this->load->view('included/footer', $data);
	}
        
        public function order_form()
	{
		$this->load->view('oye_mainpage_v/order_form');
	}
        
        
        public function allcuisines()
	{
		$data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Jollof:-Cuisines';
                $this->load->view('included/header', $data);
		$this->load->view('oye_mainpage_v/cuisines', $data);
                $this->load->view('included/footer', $data);
	}
        
        public function signup()
	{
		$this->load->view('oye_mainpage_v/signup');
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
                $data_Newuser = array(  
                                    //'userroleid' => 'GU-'.strtotime(date('Y-m-d h:i:s')),
                                    'firstname' =>  $this->input->post('firstname_s'),
                                    'lastname' =>   $this->input->post('lastname_s'),
                                    'gender' =>   $this->input->post('gent'),
                                    'email' =>      $this->input->post('email_s'),
                                    'password' =>   md5($this->input->post('pwd_s')),
                                    'phone' =>   $this->input->post('cell'),
                                    'status' => '0'
                                 );

                $insert_data = $this->Account_model->_insertuser($data_Newuser);// insert to db
                
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
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => $success
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            
            }

            
        }
        
        
        public function login()
	{
		$this->load->view('oye_mainpage_v/login');
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
                       
                        $ses_username = $this->session->userdata('first_name');
                        $login_txt_html = 'Welcome '.$ses_username;
                        $login_txt_html.= 
                                    '<div class="btn-group">
                                        <button type="button" class="btn btn-default  profile_li dropdown-toggle" data-toggle="dropdown">
                                            <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="" class="img-circle" width="40px">
                                            <span class="caret" style="margin-left: 10px; margin-top: 15px;" ></span>

                                        </button>
                                        
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">My Profile</a></li>
                                            <li><a href="#">2-Another action</a></li>
                                            <li><a href="#">2-Something else here</a></li>
                                            <li class="divider"></li>
                                            <li ><a class="text-danger" href="'. base_url(). 'logout">logout</a></li>
                                        </ul>
                                    </div>';

                        $success = "<div class=\"alert alert-success alert-dismissable fade in\">"
                                . "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>"
                                . "<strong>Success!</strong>"
                                . "<br/> welcome ".$ses_username
                                . "</div>";
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => $login_txt_html,
                                                'content2' => $success
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
        
        public function check_Loginin()
	{
		
		$check_logged = $this->session->userdata('logged_in');
			
		if($check_logged)
		{
                    $ses_username = $this->session->userdata('User_id');
                    $login_txt_html= 
                            'Welcome '.$ses_username.'<span style="padding-left: 20px"><a href="'.$this->logout(). '">' .
                                'Logout'.
                            '</a></span>';	
		}
        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('index');
            //exit;
        }
    */
        
}
