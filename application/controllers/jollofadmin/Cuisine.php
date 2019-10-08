<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuisine extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('system_modules');
        $this->load->model('user_role');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('oye/Super_admin_model');
        $this->load->model('admin');
        $this->load->helper('text');
    }
        
    public function index()
    {
        $this->navigations();
    }
    
    
    public function category($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Cuisine Page Categories Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Cuisine Categories Management</li>';
        $data['mainmenu'] = "cuisinesettings";
        $data['submenu'] = "cuisinecategory";


        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        // Load all the Merchants
        $data['cuisine'] = $this->admin->getAllCuisineCategory($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->admin->getAllCuisineCategoryCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->admin->getAllColor($query_params,  $page),true)."</pre>");die;
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/cuisine/category/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'cuisine-listcategory';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function addcategoryform($id=null) 
    {
        $this->session_manager->validateJollofadmin("Cuisine::category");
        
        if(!empty($id) )
        {
            $cuisineinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='categories_cusine');
            if($cuisineinfo)
            {

                $data['title_type']= 'Edit Cuisine Category Form';
                $data['cuisineinfo'] = $cuisineinfo;
                $data['pageheader'] = "Edit Category";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/cuisine/category").'">Cuisine Categories Management</a></li> <li class="breadcrumb-item active">Edit Cuisine Categories Form </li>';
                $data['mainmenu'] = "cuisinesettings";
                $data['submenu'] = "cuisinecategory";


                $data ['content_file']= 'cuisine-add';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/cuisine/category');
            }
        }
        else
        {
            $data['title_type']= 'New Cuisine Category Form';
            $data['pageheader'] = "Add New Fashion Attributes";
            $data['pageheader'] = "New Category";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/cuisine/category").'">Cuisine Categories Management</a></li> <li class="breadcrumb-item active">New Cuisine Categories Form </li>';
            $data['mainmenu'] = "cuisinesettings";
            $data['submenu'] = "cuisinecategory";

            $data ['content_file']= 'cuisine-add';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }

    public function categorysave()
    {
        $this->session_manager->validateJollofadmin("Cuisine::category");

        $data_New = array(  
                        'categoryname'=>  $_POST['categoryname']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'categories_cusine');
        if(empty($checkinfo))
        {
            $config = array(
                            'table' => 'categories_cusine',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["categoryname"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);

            $insert_data = $this->Generic->add($data_New, $tablename="categories_cusine");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Cuisine Category Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding Cuisine Category ');
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
                $this->session->set_flashdata('message', 'Cuisine Category Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/cuisine/addcategoryform');

    }
    public function categoryupdate()
    {   
        $this->session_manager->validateJollofadmin("Cuisine::category");

         $config = array(
                        'table' => 'categories_cusine',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);
            
            $data_slug = array(
                    'slug' => $_POST["categoryname"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug,$id);

        $data_New = array(  
                        'categoryname'=>  $_POST['categoryname'],
                        'arrangecategory'=>  $_POST['arrangecategory'],
                        'status'=> $_POST['status']
                     );
        
        
        
        // insert to db
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="categories_cusine"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");//die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Categories Cusine Updated');
                $this->session->set_flashdata('message', 'Categories Cusine Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updating Categories Cusine Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/cuisine/category');
    }

    public function usersrole()
    {
        $this->session_manager->validateJollofadmin("Fashion::usersrole");

         // Set the initial page data
        $data['pageheader'] = "Cuisine User Role Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Cuisine User Role Management</li>';
        $data['mainmenu'] = "cuisinesettings";
        $data['submenu'] = "usersrole";
        // Load all the user role

        $data['roletype']= 'cuisine';
        $data['role'] = $this->user_role->getByPlatform('general');
        
        //print("<pre>".print_r($this->user_role->getByPlatform('general'),true)."</pre>");die;
        
        
        $data ['content_file']= 'userrole-list';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function addusersroleform ()
    {

         // Set the initial page data
        $data['pageheader'] = "New Cuisine User Role Form";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/cuisine/usersrole").'">Cuisine User Role Management</a></li>
        <li class="breadcrumb-item active">New Cuisine User Role Form </li>';
        $data['mainmenu'] = "cuisinesettings";
        $data['submenu'] = "usersrole";
        // Load all the user role
        $data['role_type']= 'cuisine';
        $data_ = array(
                    'jollofsitetypeid'    =>  1,
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
            redirect('jollofadmin/cuisine/usersrole');
        }
        else
        {
            // Set the initial page data
            
            $data['pageheader'] = " Edit Cuisine User Role Form";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/cuisine/usersrole").'">Cuisine User Role Management</a></li>
            <li class="breadcrumb-item active">Edit Cuisine User Role Form </li>';
            $data['mainmenu'] = "cuisinesettings";
            $data['submenu'] = "usersrole";
            // Load all the user role
            $data['role_type']= 'cuisine';

            $data['roleinfo'] = $roleinfo;
            $data['role_assign'] = $this->system_modules->getSpecialByPlatform($id,$sitetype=1);
            //print("<pre>".print_r($this->system_modules->getSpecialByPlatform($id,$sitetype=2),true)."</pre>");//die;

            $data_ = array(
                        'jollofsitetypeid'    =>  2,
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
                        'roleFor'  =>  'general'
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
                //print("<pre>".print_r($data_New,true)."</pre>");die;
                $insert_userRoleID = $this->Generic->add($data_New, $tablename="user_roles");// insert to db

                for ($i=0; $i<$id_count; $i++)
                {
                    $data_role = array(
                                'roleID' => $insert_userRoleID,
                                'moduleID' => $id_module[$i],
                                'jollofsitetypeid' => 1
                                );

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

            if($id_count>=1 && $_POST['status']==1)
            {

                $data_New = array(  
                                'roleName' => $_POST['userrolename'],
                                'status' => $_POST['status']
                                );
                
                $insert_userRoleID = $this->Generic->edit($data_New, $_POST['userrolenameid'] , $tablename="user_roles"); // Update to db

                $this->db->where('roleID', $_POST['userrolenameid']);
                $this->db->where('jollofsitetypeid', 1);
                $query_delete = $this->db->delete('role_assignments'); // delete all recode first then save a new one.

                if($query_delete)
                {
                
                
                    for ($i=0; $i<$id_count; $i++)
                    {
                        $data_role = array(
                                    'roleID' => $insert_userRoleID,
                                    'moduleID' => $id_module[$i],
                                    'jollofsitetypeid' => 1
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
