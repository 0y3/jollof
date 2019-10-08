<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('user');
        $this->load->model('oye/Email_model'); // call in the email model class
        $this->load->helper('text');
    }
    public function index($page=0)
    {
        
        $this->session_manager->validateFashion("Admin::users");
        //print_r($_SESSION);
        $data['pageheader'] = "Manage Users";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Users</li>';
        $data['mainmenu'] = "users";
        
        // Load all the users
        $data['users'] = $this->user->getAll();
        
        $data ['content_file']= 'users';
        $this->load->view('fashion_admin/layout', $data);
    }
    
    // Controller function to display the add user form
    public function addform()
    {
        

        $this->session_manager->validateFashion("Admin::users");
        
        $data['cate']= $this->user->userrole($_SESSION['merchant_id']);
        
        $data['title_type']= 'New Users Form';
        $data ['content_file']= 'user_new';
        $data['pageheader'] = "Add User";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/users").'">Users</a></li> <li class="breadcrumb-item active">Add User</li>';
        $data['mainmenu'] = "users";
        $this->load->view('fashion_admin/layout', $data);
    }
    
    // Controller function to add a new user
    public function add()
    {
    }
    
    
    // Controller function to display the edit user form
    public function editform($id=null)
    {
        

        $this->session_manager->validateFashion("Admin::users");
        
        if(!empty($id) )
        {
            $data['cate']= $this->user->userrole($_SESSION['merchant_id']);
            $data['title_type']= 'Edit Users Form';
            $data['userinfo'] = $this->user->getByID($id);
            $data ['content_file']= 'user_new';
            $data['pageheader'] = "Add User";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/users").'">Users</a></li> <li class="breadcrumb-item active">Edit User</li>';
            $data['mainmenu'] = "users";
            $this->load->view('fashion_admin/layout', $data);
        }
        else
        {
            redirect('fashionadmin/users');
        }
        
        
    }
    
    
    // Controller fuction to save the user
    public function save()
    {
        // save the new user data  table //
        $time = date('Y-m-d H:i:s');
        $tim  = strtotime($time);
        $token= do_hash($this->input->post('useremail').$tim);

        $data_check = array(  
                                 'email'  =>  $this->input->post('useremail'),// adding the Encryp name and the extention file 2gether
                                 //'restaurantid'  =>   $_SESSION['merchant_id'],
                                 'isdeleted' =>  0
                                 );
        $check_data = $this->user->is_user_email_available($data_check);

        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message', 'Email Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Email Already Register'
                                  );
            echo json_encode($Json_resultSave);
            exit();
        }
        else
        {
            $pwd = $this->utility->generate_random_string(8);
            $data_New = array(  
                                    'restaurantid'  => $_SESSION['merchant_id'],
                                    'userroleid'    => $this->input->post('userrole'),
                                    'firstname'     => $this->input->post('firstname'),
                                    'lastname'      => $this->input->post('lastname'),
                                    'email'         => $this->input->post('useremail'),
                                    'phonenumber'   => $this->input->post('phone'),
                                    'confirmemail'  => $token,
                                    'password'      => md5($pwd),
                                    'forcepasswordchange'   => 1,
                                    'status'        => 0
                                 );

            //$insert_data = $this->user->saveuser($data_New);
            
            // insert to db
            $insert_data = $this->Generic->add($data_New, $tablename="users"); 

            if($insert_data)
            {
                $rest_info=$this->user->merchant_info($_SESSION['merchant_id']);
                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $this->Email_model->send_restaurant_User_email($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('useremail'), $site_email, $logo, $rest_info->companyname,$token,$pwd );

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'New User Added, A Confirmation Email will be sent to the provided Email');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New User');
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }
    }
    
    // Controller function to edit a specified user
    public function edit()
    {
        $data_New = array(  
                        'restaurantid'  => $_SESSION['merchant_id'],
                        'userroleid'    => $this->input->post('userrole'),
                        'firstname'     => $this->input->post('firstname'),
                        'lastname'      => $this->input->post('lastname'),
                        'phonenumber'   => $this->input->post('phone'),
                        'status'        => $this->input->post('status')
                     );
        
        $data_Where = array(  
                        'restaurantid'  => $_SESSION['merchant_id'],
                        'email'    => $this->input->post('useremail')
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="users"); 
        if($insert_data)
            {
                $this->session->set_flashdata('success','User Info Updated');
                $this->session->set_flashdata('message', 'User Info Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated User Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
    }
    // Controller function to delete a specified user
    public function delete()
    {
        
        $by_id = $_POST["_id"];
        //$_data = $this->user->_deleteuser($by_id);

        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="users");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'User Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted User');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            exit();
        }
    }
    
    public function resendactivationemail($by_id=null)
    {

        if(!empty($by_id))
        {
            
            $userinfo = $this->user->getByID($by_id);//get user details
            
            $restinfo=$this->user->merchant_info($_SESSION['merchant_id']);// get merchant info
            
            
            // Generat new token //
            
            $token=$this->utility->generate_random_string(15);
            
            $data_token = array(
                        'confirmemail'=> $token,
                        'password'=> '',
                        'forcepasswordchange'=> 0
                        );
            
            $this->user->newtoken($data_token,$by_id);
        
            // send the customer an email
            $site_email ='segun@stakle.com';
            $logo = 'jol.png';
            $sendemail=$this->Email_model->send_restaurant_User_email($userinfo->firstname, $userinfo->lastname, $userinfo->email, $site_email, $logo, $restinfo->companyname,$token );
            //print("<pre>".print_r($sendemail,true)."</pre>");die;
            if( isset($sendemail[0]['status']) && $sendemail[0]['status']=='sent')
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Activation Email Sent');
                redirect('fashionadmin/users');
            }
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
                redirect('fashionadmin/users');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
            redirect('fashionadmin/users');
        }
    }
    
    
    
}
