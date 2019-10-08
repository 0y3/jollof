<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fashion extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('system_modules');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('oye/Super_admin_model');
        $this->load->model('admin');
        $this->load->model('user_role');
        $this->load->helper('text');
    }
        
    public function index()
    {
        $this->navigations();
    }
    
    public function navigations()
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion Page navigations Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion Navigation Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "fashionnavigation";

        $data_ = array(
                'categoryparentid'    =>  0,
                'isdeleted' => 0
            );
        $data['catelist']= $this->Generic->findByCondition($data_,'categories_fashion', $orderbyfield='categoryname');

        $data ['nav'] = $this->Super_admin_model->_get_parent_nav_by_cate();

        $data ['content_file']= 'fashion-listnav';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function sizevariant()
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion Page Size Variant Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion Size Variant Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "fashionsizevariant";

        $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0
            );
        $data['catelist']= $this->Generic->findByCondition($data_,'size_category', $orderbyfield='sizecategory');

        $data ['cate_size'] = $this->Super_admin_model->_get_cate_size_();

        $data ['content_file']= 'fashion-listsize';
        $this->load->view('jollof_admin/layout', $data);
    }
    public function colorvariant($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion Page Color Variant Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion Color Variant Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "fashioncolorvariant";


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
        $data['color'] = $this->admin->getAllColor($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->admin->getAllColorCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->admin->getAllColor($query_params,  $page),true)."</pre>");die;
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/fashion/colorvariant/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'fashion-listcolor';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function brand($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion Brand Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion Brand Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "fashionbrand";


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
        $data['brand'] = $this->admin->getAllBrand($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->admin->getAllBrandCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->admin->getAllBrand($query_params,  $page),true)."</pre>");die;
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/fashion/brand/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'fashion-listbrand';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function usersrole()
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion User Role Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion User Role Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "usersrole";
        // Load all the user role

        $data['roletype']= 'fashion';
        $data['role'] = $this->user_role->getByPlatform('general');
        
        //print("<pre>".print_r($this->user_role->getByPlatform('general'),true)."</pre>");die;
        
        
        $data ['content_file']= 'userrole-list';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function addusersroleform ()
    {

         // Set the initial page data
        $data['pageheader'] = "Add New Fashion User Role Form";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/usersrole").'">Fashion User Role Management</a></li>
        <li class="breadcrumb-item active">New Fashion User Role Form </li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "usersrole";
        // Load all the user role
        $data['role_type']= 'fashion';
        $data_ = array(
                    'jollofsitetypeid'    =>  2,
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
            redirect('jollofadmin/fashion/usersrole');
        }
        else
        {
            // Set the initial page data
            
            $data['pageheader'] = "Edit Fashion User Role From";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/usersrole").'">Fashion User Role Management</a></li>
            <li class="breadcrumb-item active">Edit Fashion User Role Form </li>';
            $data['mainmenu'] = "fashionsettings";
            $data['submenu'] = "usersrole";
            // Load all the user role
            $data['role_type']= 'fashion';

            $data['roleinfo'] = $roleinfo;
            $data['role_assign'] = $this->system_modules->getSpecialByPlatform($id,$sitetype=2);
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
                
                $insert_userRoleID = $this->Generic->add($data_New, $tablename="user_roles");// insert to db

                for ($i=0; $i<$id_count; $i++)
                {
                    $data_role = array(
                                'roleID' => $insert_userRoleID,
                                'moduleID' => $id_module[$i],
                                'jollofsitetypeid' => 2
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

            if($id_count>=1)
            {

                $data_New = array(  
                                'roleName' => $_POST['userrolename'],
                                'status' => $_POST['status']
                                );
                
                $insert_userRoleID = $this->Generic->edit($data_New, $_POST['userrolenameid'] , $tablename="user_roles"); // Update to db

                $this->db->where('roleID', $_POST['userrolenameid']);
                $this->db->where('jollofsitetypeid', 2);
                $query_delete = $this->db->delete('role_assignments'); // delete all recode first then save a new one.

                if($query_delete)
                {
                
                    for ($i=0; $i<$id_count; $i++)
                    {
                        $data_role = array(
                                    'roleID' => $insert_userRoleID,
                                    'moduleID' => $id_module[$i],
                                    'jollofsitetypeid' => 2
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



    public function fashioncategoryadd ()
    {
        $this->session_manager->validateJollofadmin("Fashion::navigations");

        $checkinfo = $this->Generic->getByFieldSingle('categoryname', $_POST['save_name'], $tablename='categories_fashion');
        if(empty($checkinfo))
        {
            $config = array(
                            'table' => 'categories_fashion',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["save_name"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);

             $data_New = array(  
                                'categoryname'=>  $_POST['save_name'],
                                'categoryparentid'=> 0
                             );
             $insert_data = $this->Generic->add($data_New, $tablename="categories_fashion");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Category Name Saved');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Category Name');
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
                $this->session->set_flashdata('message', 'Category Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/navigations');
    }

    public function fashionsubcategoryattributes($id=null) 
    {
        $this->session_manager->validateJollofadmin("Fashion::navigations");
        
        if(!empty($id) )
        {
            $sizeinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='categories_fashion');
            if($sizeinfo)
            {
                $data_ = array(
                        'categoryparentid'    =>  0,
                        'isdeleted' => 0
                    );
                $data['catelist']= $this->Generic->findByCondition($data_,'categories_fashion', $orderbyfield='categoryname');

                $data['title_type']= 'Edit Navigation Form';
                $data['sizeinfo'] = $sizeinfo;
                $data['pageheader'] = "Edit Size";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/navigations").'">Fashion Navigation Management</a></li> <li class="breadcrumb-item active">Edit Fashion Attributes Form </li>';
                $data['mainmenu'] = "fashionsettings";
                $data['submenu'] = "fashionnavigation";


                $data ['content_file']= 'fashion-navattribute';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/fashion/fashionsubcategoryattributes');
            }
        }
        else
        {
            $data['pageheader'] = "Add New Fashion Attributes";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/navigations").'">Fashion Navigation Management</a></li> <li class="breadcrumb-item active">New Fashion Attributes Form </li>';
            $data['mainmenu'] = "fashionsettings";
            $data['submenu'] = "fashionnavigation";

            $data['title_type']= 'New Fashion Attributes Form';

            $data_ = array(
                    'categoryparentid'    =>  0,
                    'isdeleted' => 0
                );
            $data['catelist']= $this->Generic->findByCondition($data_,'categories_fashion', $orderbyfield='categoryname');

            $data ['content_file']= 'fashion-navattribute';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }



    public function fashionsubcategoryattributesadd() 
    {
        $this->session_manager->validateJollofadmin("Fashion::navigations");

        $data_New = array(  
                            'categoryname'=>  $_POST['save_name'],
                            'categoryparentid'=> $_POST['parent_category']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'categories_fashion');
        if(empty($checkinfo))
        {
            $config = array(
                            'table' => 'categories_fashion',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["save_name"],       // slug name of filed in db were ur url is stored
                    );
            $data['slug'] = $this->slug->create_uri($data_slug);

            $insert_data = $this->Generic->add($data_New, $tablename="categories_fashion");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Attribute Name Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Attribute Name');
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
                $this->session->set_flashdata('message', 'Attribute Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/fashionsubcategoryattributes');
    }

    public function fashionsubcategoryattributesedit() 
    {
        $this->session_manager->validateJollofadmin("Fashion::navigations");

        $config = array(
                        'table' => 'categories_fashion',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
            $this->load->library('slug', $config);

            $data_New = array(  
                                'categoryname'=>  $_POST['save_name'],
                                'arrangecategory'=>  $_POST['arrangecategory'],
                                'status'=>  $_POST['status']
                             );

            $data_slug = array(
                    'slug' => $_POST["save_name"],       // slug name of filed in db were ur url is stored
                    );
            $data_New['slug'] = $this->slug->create_uri($data_slug,$_POST['id']);

            // insert to db
            //print("<pre>".print_r($data_New,true)."</pre>");die;
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="categories_fashion"); 
        if($insert_data)
            {
                $this->session->set_flashdata('success','Navigation Attribute Updated');
                $this->session->set_flashdata('message', 'Navigation Attribute Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Navigation Attribute Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/navigations');
    }


    public function addcolorform($id=null) 
    {
        $this->session_manager->validateJollofadmin("Fashion::colorvariant");
        
        if(!empty($id) )
        {
            $colorinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='color_tbl');
            if($colorinfo)
            {
                $data_ = array(
                        'categoryparentid'    =>  0,
                        'isdeleted' => 0
                    );
                $data['catelist']= $this->Generic->findByCondition($data_,'categories_fashion', $orderbyfield='categoryname');

                $data['title_type']= 'Edit Navigation Form';
                $data['colorinfo'] = $colorinfo;
                $data['pageheader'] = "Edit Color";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/colorvariant").'">Fashion Page Color Variant Management</a></li> <li class="breadcrumb-item active">Edit Fashion Color Variant Form </li>';
                $data['mainmenu'] = "fashionsettings";
                $data['submenu'] = "fashioncolorvariant";


                $data ['content_file']= 'fashion-coloradd';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/fashion/addcolorform');
            }
        }
        else
        {
            $data['pageheader'] = "Add New Fashion Attributes";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/navigations").'">Fashion Page Color Variant  Management</a></li> <li class="breadcrumb-item active">New Fashion Color Variant Form </li>';
            $data['mainmenu'] = "fashionsettings";
            $data['submenu'] = "fashioncolorvariant";

            $data['title_type']= 'New Fashion Attributes Form';

            $data_ = array(
                    'categoryparentid'    =>  0,
                    'isdeleted' => 0
                );
            $data['catelist']= $this->Generic->findByCondition($data_,'categories_fashion', $orderbyfield='categoryname');

            $data ['content_file']= 'fashion-coloradd';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }

    public function colorvariantsave()
    {
         $this->session_manager->validateJollofadmin("Fashion::colorvariant");

        $data_New = array(  
                        'colorname'=>  $_POST['colorname'],
                        'colorcode'=>  $_POST['colorcode']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'color_tbl');
        if(empty($checkinfo))
        {
            $insert_data = $this->Generic->add($data_New, $tablename="color_tbl");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Color Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Color Name');
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
                $this->session->set_flashdata('message', 'Color Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/colorvariant');

    }

    
    public function colorvariantupdate()
    {
        $this->session_manager->validateJollofadmin("Fashion::colorvariant");
        $data_New = array(  
                        'colorname'=>  $_POST['colorname'],
                        'colorcode'=>  $_POST['colorcode'],
                        'status'=> $_POST['status']
                     );
        
        
        
        // insert to db
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="color_tbl"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");//die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Color Updated');
                $this->session->set_flashdata('message', 'Color Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Color Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/colorvariant');
    }
    public function deletecolorvariant()
    {
        $by_id = $_POST["id"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="color_tbl");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Color Variant Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Color Variant');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
        }   
    }

    public function brandsave()
    {

        $data_New = array(  
                        'name'=>  $_POST['name']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'brands_tbl');
        if(empty($checkinfo))
        {
            $insert_data = $this->Generic->add($data_New, $tablename="brands_tbl");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Brand Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Brand Name');
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
                $this->session->set_flashdata('message', 'Brand Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/brand');
    }

    public function brandedit()
    {
        $data_New = array(  
                        'name'=>  $_POST['name'],
                        'status'=> $_POST['status']
                     );
        // insert to db
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="brands_tbl"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");//die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Brand Updated');
                $this->session->set_flashdata('message', 'Brand Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Brand Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/brand');
    }

    public function deletebrand()
    {
        $by_id = $_POST["id"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="brands_tbl");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Brand Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Brand');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
        }   
    }

    public function deletefashioncategory($id=null)
    {
        if(isset($id) && !empty($id))
        {
            $by_id=$id;
        }
        else
        {
            $by_id = $_POST['id_'];
        }
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="categories_fashion");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Fashion Category Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Fashion Category');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/navigations');
    }

    public function fashionsubcategoryadd() 
    {
        $this->session_manager->validateJollofadmin("Fashion::navigations");

        $data_New = array(  
                            'categoryname'=>  $_POST['save_name'],
                            'categoryparentid'=> $_POST['parent_category']
                         );
        $checkinfo =  $this->Generic->findByCondition($data_New,'categories_fashion');
        if(empty($checkinfo))
        {
            $config = array(
                            'table' => 'categories_fashion',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $_POST["save_name"],       // slug name of filed in db were ur url is stored
                    );
            $data_New['slug'] = $this->slug->create_uri($data_slug);

            $insert_data = $this->Generic->add($data_New, $tablename="categories_fashion");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Sub Category Name Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Sub Category Name');
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
                $this->session->set_flashdata('message', 'Sub Category Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/navigations');
    }


    public function fashionsizecategoryadd ()
    {
        $this->session_manager->validateJollofadmin("Fashion::sizevariant");

        $checkinfo = $this->Generic->getByFieldSingle('sizecategory', $_POST['save_name'], $tablename='size_category');
        if(empty($checkinfo))
        {
             $data_New = array(  
                                'sizecategory'=>  $_POST['save_name']
                             );
             $insert_data = $this->Generic->add($data_New, $tablename="size_category");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Size Variant Name Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Size Variant Name');
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
                $this->session->set_flashdata('message', 'Size Variant Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/sizevariant');
    }

    public function fashionsubsizecategoryadd() 
    {
        $this->session_manager->validateJollofadmin("Fashion::sizevariant");
        
        $data_New = array(  
                        'sizecategoryid'=> $_POST['parent_category'],
                        'sizename'=>  $_POST['save_name'],
                        'savecode'=>  $_POST['save_code']
                     );
        $checkinfo =  $this->Generic->findByCondition($data_New,'size_tbl');
        if(empty($checkinfo))
        {
            

            $insert_data = $this->Generic->add($data_New, $tablename="size_tbl");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Size Name Saved');
                    $Json_resultSave = array (
                                            'status' => '1'
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Size Name');
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
                $this->session->set_flashdata('message', 'Size Name Exists');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/sizevariant');
    }
    
    public function sizeeditform($id=null)
    {
        $this->session_manager->validateJollofadmin("Fashion::sizevariant");
        
        if(!empty($id) )
        {
            $sizeinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='size_tbl');
            $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0
            );
            $data['catelist']= $this->Generic->findByCondition($data_,'size_category', $orderbyfield='sizecategory');

            $data['title_type']= 'Edit Size Variable Form';
            $data['sizeinfo'] = $sizeinfo;
            $data['pageheader'] = "Edit Size";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/sizevariant").'">Fashion Size Variant Management</a></li> <li class="breadcrumb-item active">Edit Size </li>';
            $data['mainmenu'] = "fashionsettings";
            $data['submenu'] = "fashionsizevariant";


            $data ['content_file']= 'fashion-sizeedit';
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/fashion/sizevariant');
        }
        
    }
    public function sizeeditupdate()
    {
        $data_New = array(  
                        'sizename'=>  $_POST['sizename'],
                        'sizecode'=>  $_POST['sizecode'],
                        'arrange'=> $_POST['arrange'],
                        'status'=> $_POST['status']
                     );
        
        
        
        // insert to db
        $insert_data = $this->Generic->edit($data_New, $_POST['id'] , $tablename="size_tbl"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");//die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Size Updated');
                $this->session->set_flashdata('message', 'Size Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Size Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
        }
        redirect('jollofadmin/fashion/sizevariant');
    }

    public function layaway()
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Fashion Layaway Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Fashion Layaway Management</li>';
        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "layaway";
        // Load all the user role

        $data['layaway'] = $this->Generic->getAll($tablename='layaway', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='durationweeks');
        
        //print("<pre>".print_r($this->user_role->getByPlatform('general'),true)."</pre>");die;
        
        
        $data ['content_file']= 'layaway-list';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function layawayform($id=null)
    {
        
        $this->session_manager->validateJollofadmin("Fashion::layaway");
        
        $data['admin_info'] = $this->admin->adminInfo();

        $data['mainmenu'] = "fashionsettings";
        $data['submenu'] = "layaway";

        if(!empty($id) )
        {
            $durationinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='layaway');
            if($durationinfo)
            {
               
                $data['layawayinfo'] = $durationinfo;
                $data['pageheader'] = "Edit Fashion Layaway";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/layaway").'">Fashion Layaway Management</a></li> <li class="breadcrumb-item active">Edit Fashion Layaway</li>';

                //print("<pre>".print_r($durationinfo,true)."</pre>");die;
                $data ['content_file']= 'layawaynew';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/fashion/layaway');
            }
        }
        else
        {
            $data['pageheader'] = "Create New Fashion Layaway ";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/fashion/layaway").'">Fashion Layaway Management</a></li> <li class="breadcrumb-item active">New Fashion Layaway Role</li>';

           
            $data ['content_file']= 'layawaynew';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }

    public function addlayaway()
    {
        $data_check = array(
                            'durationweeks'      =>  $_POST["duration_weeks"]
                         );
        $check_data = $this->Generic->findByCondition($data_check, $tablename="layaway");// insert to db

        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Layaway Info Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Layaway Info Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                            'durationweeks'     =>  $_POST["duration_weeks"],
                            'servicefee'        =>  $_POST['service_fee'],
                            'cancellationfee'   =>  $_POST["cancellation_fee"],
                            'downpayment'       =>  $_POST["down_payment"],
                            'downpaymentpercent'=>  $_POST['downpayment_percent'],
                            'paymentplan'      =>  $_POST["payment_plain"],
                            'minorder'          =>  $_POST["min_order"],
                            'status'            =>  1
                             );
            $insert_data = $this->Generic->add($data_New, $tablename="layaway");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Layaway Details Saved');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => true
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Layaway Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/fashion/layaway');
    }

    public function editlayaway ()
    {

        $data_check = array(
                            'id !='      =>  $_POST["id"],
                            'durationweeks'      =>  $_POST["duration_weeks"]
                         );
        $check_data = $this->Generic->findByCondition($data_check, $tablename="layaway");// insert to db

        if($check_data || $check_data2)  
        {
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Layaway Info Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Layaway Info Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                            'servicefee'        =>  $_POST['service_fee'],
                            'cancellationfee'   =>  $_POST["cancellation_fee"],
                            'downpayment'       =>  $_POST["down_payment"],
                            'downpaymentpercent'=>  $_POST['downpayment_percent'],
                            'paymentplan'      =>  $_POST["payment_plain"],
                            'minorder'          =>  $_POST["min_order"],
                            'status'            =>  $_POST["status"]
                             );

            $data_Where = array(  
                                'id'         =>  $_POST["id"]
                             );
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="layaway"); 

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Layaway Details Updated');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => ''
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Layaway Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/fashion/layaway');
    }

    // Controller function to delete a specified user
    public function deletelayaway()
    {
        $by_id = $_POST["id"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="layaway");
        if($_data)
        {   
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Layaway Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            //exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Layaway');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            //exit();
        }
    }
    
        
    
}
