<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('system_modules');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('user');
        $this->load->model('oye/Email_model'); // call in the email model class
        $this->load->model('user_role');
        $this->load->helper('text');
    }
    
    public function index($page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
        //print_r($_SESSION);
        $data['pageheader'] = "Manage Users";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Users</li>';
        $data['mainmenu'] = "users";
        
        // Load all the users
        $data['users'] = $this->user->getAllAdmin();
        
        $data ['content_file']= 'users';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    // Controller function to display the add user form
    public function addform()
    {
        
        $this->session_manager->validateJollofadmin("Users::index");
        
        $data['cate']= $this->user->userroleAdmin();
        
        $data['title_type']= 'New Jollof Admin Users Form';
        $data['pageheader'] = "Add User";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/users").'">Users</a></li> <li class="breadcrumb-item active">Add User</li>';
        $data['mainmenu'] = "users";


        $data ['content_file']= 'user_new';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    // Controller function to add a new user
    public function add()
    {
    }
    
    
    // Controller function to display the edit user form
    public function editform($id=null)
    {
        $this->session_manager->validateJollofadmin("Users::index");
        
        if(!empty($id) )
        {
            $data['cate']= $this->user->userroleAdmin();
            $data['title_type']= 'Edit Jollof Admin Users Form';
            $data['userinfo'] = $this->Generic->getByFieldSingle('id', $id, $tablename='admin_users');//$this->user->getByID($id);
            //print("<pre>".print_r($this->Generic->getByFieldSingle('id', $id, $tablename='admin_users'),true)."</pre>");die;
            $data ['content_file']= 'user_new';
            $data['pageheader'] = "Edit User";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/users").'">Users</a></li> <li class="breadcrumb-item active">Edit User</li>';
            $data['mainmenu'] = "users";
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/users');
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
                                 'isdeleted' =>  0
                                 );
        $check_data =  $this->Generic->findByCondition($data_check,'admin_users');


        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message', 'Email Already Register!!! Try Another Email');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Email Already Register'
                                  );
            echo json_encode($Json_resultSave);
            exit();
        }
        else
        {
            $data_New = array(  
                                    'userroleid'    => $this->input->post('userrole'),
                                    'firstname'     => $this->input->post('firstname'),
                                    'lastname'      => $this->input->post('lastname'),
                                    'email'         => $this->input->post('useremail'),
                                    'phonenumber'   => $this->input->post('phone'),
                                    'confirmemail'  => $token,
                                    'forcepasswordchange'   => 0,
                                    'status'        => 1
                                 );

            //$insert_data = $this->user->saveuser($data_New);
            
            // insert to db
            $insert_data = $this->Generic->add($data_New, $tablename="admin_users"); 

            if($insert_data)
            {
                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $this->Email_model->send_restaurant_User_email($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('useremail'), $site_email, $logo, $companyname=null,$token );

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'New User Added, A Confirmation Email will be sent to the provided Email');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New User');
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
    }
    
    // Controller function to edit a specified user
    public function edit()
    {
        $data_New = array(  
                        'userroleid'    => $this->input->post('userrole'),
                        'firstname'     => $this->input->post('firstname'),
                        'lastname'      => $this->input->post('lastname'),
                        'phonenumber'   => $this->input->post('phone'),
                        'status'        => $this->input->post('status')
                     );
        
        $data_Where = array(  
                        'email'    => $this->input->post('useremail')
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="admin_users"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");die;
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
        $_data =$this->Generic->delete($by_id, $tablename="admin_users");
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
            $this->session->set_flashdata('message', 'An error occur when Deleting User');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            exit();
        }
    }
    
    public function resendactivationemail($by_id=null)
    {
        if(!empty($by_id))
        {
            
            $userinfo = $this->user->getAdminByID($by_id);//get user details

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
            $sendemail=$this->Email_model->send_restaurant_User_email($userinfo->firstname, $userinfo->lastname, $userinfo->email, $site_email, $logo, $companyname=null,$token );
            //print("<pre>".print_r($sendemail,true)."</pre>");die;
            if($sendemail==1)
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Activation Email Sent');
                redirect('jollofadmin/users');
            }
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
                redirect('jollofadmin/users');
            }
            
        }
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
            redirect('jollofadmin/users');
        }
    }

    public function usersrole()
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Jollof Admin User Role Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Jollof Admin User Role Management</li>';
        $data['mainmenu'] = "users";
        $data['submenu'] = "usersrole";
        // Load all the user role

        $data['roletype']= 'users';
        $data['role'] = $this->user_role->getByPlatform('ebs');
        
        //print("<pre>".print_r($this->user_role->getByPlatform('ebs'),true)."</pre>");die;
        
        
        $data ['content_file']= 'userrole-list';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function addusersroleform ()
    {

         // Set the initial page data
        $data['pageheader'] = "Add New Fashion User Role Form";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/users/usersrole").'">Jollof Admin User Role Management</a></li>
        <li class="breadcrumb-item active">New Jollof Admin User Role Form </li>';
        $data['mainmenu'] = "users";
        $data['submenu'] = "usersrole";
        // Load all the user role
        $data['role_type']= 'users';
        $data_ = array(
                    'jollofsitetypeid'    =>  3,
                    'moduleStatus' => 1
                    );
        $data['roles']= $this->Generic->findByCondition($data_,'system_modules', $orderbyfield='controlerName');
        
        //print("<pre>".print_r($this->user_role->getByPlatform('general'),true)."</pre>");die;
        
        
        $data ['content_file']= 'userroles_new';
        $this->load->view('jollof_admin/layout', $data);

    }
    public function editusersroleform($id=null)
    {
        $roleinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='user_roles');
        if(empty($roleinfo))
        {
            redirect('jollofadmin/users/usersrole');
        }
        else
        {
            // Set the initial page data
            
            $data['pageheader'] = "Edit Fashion User Role From";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/users/usersrole").'">Jollof Admin User Role Management</a></li>
            <li class="breadcrumb-item active">Edit Jollof Admin User Role Form </li>';
            $data['mainmenu'] = "users";
            $data['submenu'] = "usersrole";
            // Load all the user role
            $data['role_type']= 'users';

            $data['roleinfo'] = $roleinfo;
            $data['role_assign'] = $this->system_modules->getSpecialByPlatform($id,$sitetype=3);
            //print("<pre>".print_r($this->system_modules->getSpecialByPlatform($id,$sitetype=2),true)."</pre>");//die;

            $data_ = array(
                        'jollofsitetypeid'    =>  3,
                        'moduleStatus' => 1
                        );
            $data['roles']= $this->Generic->findByCondition($data_,'system_modules', $orderbyfield='controlerName');
            
            //print("<pre>".print_r($this->user_role->getByPlatform('general'),true)."</pre>");die;
            
            
            $data ['content_file']= 'userroles_new';
            $this->load->view('jollof_admin/layout', $data);
        }

    }

    public function saveusersroles()
    {
        $data_New = array(  
                        'roleName' => $_POST['userrolename'],
                        'roleFor'  =>  'ebs'
                        );
        $checkinfo = $this->Generic->findByCondition($data_New, $tablename='user_roles');
        if(empty($checkinfo))
        {
            $id_module = $this->input->post('module[]');

            $id_count = count($id_module);

            if($id_count>=1)
            {
                $data_New['stationID'] =  1;
                $data_New['status']   = 1;
                
                $insert_userRoleID = $this->Generic->add($data_New, $tablename="user_roles");// insert to db

                for ($i=0; $i<$id_count; $i++)
                {
                    $data_role = array(
                                'roleID' => $insert_userRoleID,
                                'moduleID' => $id_module[$i],
                                'jollofsitetypeid' => 3
                                );
                    //print("<pre>".print_r($data_role,true)."</pre>");//die;
                   $insert_data= $this->Generic->add($data_role, $tablename="role_assignments");// insert to db $this->db->insert('role_assignments',$data);
                }

                if($insert_data) 
                {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', ' User Role Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                }
                else 
                {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New  User Role');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                }
            }
            else 
            {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'The Role Permissions Ckeck Box is Required');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
            }
        }
        else 
        {       
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'User Role Name Exists');
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'User Role Name Exists...'
                                    );
            echo json_encode($Json_resultSave);
        }
        //redirect('jollofadmin/fashion/navigations');
    }




    public function updateusersroles()
    {
        if($_POST['status']== 0)
        {
            $data_New = array(  
                            'status' => $_POST['status']
                            );
            
            $insert_userRoleID = $this->Generic->edit($data_New, $_POST['userrolenameid'] , $tablename="user_roles"); // Update to db
            if($insert_userRoleID) 
                {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', ' User Role Updating');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
                }
                else 
                {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating User Role');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                }

        }
        else
        {

            $id_module = $this->input->post('module[]');

            $id_count = count($id_module);

            if($id_count>=1  && $_POST['status']==1)
            {

                $data_New = array(  
                                'roleName' => $_POST['userrolename'],
                                'status' => $_POST['status']
                                );
                
                $insert_userRoleID = $this->Generic->edit($data_New, $_POST['userrolenameid'] , $tablename="user_roles"); // Update to db

                $this->db->where('roleID', $_POST['userrolenameid']);
                $this->db->where('jollofsitetypeid', 3);
                $query_delete = $this->db->delete('role_assignments'); // delete all recode first then save a new one.

                if($query_delete)
                {

                    for ($i=0; $i<$id_count; $i++)
                    {
                        $data_role = array(
                                    'roleID' => $insert_userRoleID,
                                    'moduleID' => $id_module[$i],
                                    'jollofsitetypeid' => 3
                                    );

                       $insert_data= $this->Generic->add($data_role, $tablename="role_assignments");// insert to db $this->db->insert('role_assignments',$data);
                    }

                    if($insert_data) 
                    {
                        $this->session->set_flashdata('success','success');
                        $this->session->set_flashdata('message', ' User Role Updating');
                        $Json_resultSave = array (
                                                'status' => '1'
                                                );
                        echo json_encode($Json_resultSave);
                    }
                    else 
                    {       
                        $this->session->set_flashdata('error','error');
                        $this->session->set_flashdata('message', 'An error occur when Updating User Role');
                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'There was a problem!! Pls Try Again.....'
                                                );
                        echo json_encode($Json_resultSave);
                    }
                }
                 else 
                {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating User Role');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.... when deleting role.'
                                            );
                    echo json_encode($Json_resultSave);
                }
            }
            else 
            {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'The Role Permissions Ckeck Box is Required');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
            }
        }
        
        //redirect('jollofadmin/fashion/navigations');
    }
    
    
    
}
