<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('Category');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
        $this->session_manager->validateCuisine(__METHOD__);

        $data['pageheader'] = "Menu Category Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Menu Categories</li>';
        $data['mainmenu'] = "categories";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams['createdat'] = $this->input->post('createdat');
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
        // Load all the products items
        $data['Categories'] = $this->Category->getAllCategory($query_params, $page);
        
        //load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("cuisineadmin/categories/index/$existing_search");
        //$config['total_rows'] = $this->orderitem->getProductCount($query_params, );
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();

        //print("<pre>".print_r($this->Category->getAllCategory($query_params, $page),true)."</pre>");die;  
        $data ['content_file']= 'category';
        $this->load->view('cuisine_admin/layout', $data);
    }
    // Controller function to display the add user form
    public function addform()
    {
        
        $this->session_manager->validateCuisine(__METHOD__);
                
        $data['title_type']= 'New Menu Category Form';
        $data ['content_file']= 'Category_new';
        $data['pageheader'] = "Add Menu Category";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("cuisineadmin/categories").'">Menu Category</a></li> <li class="breadcrumb-item active">Add Menu Category</li>';
        $data['mainmenu'] = "Categories";
        $this->load->view('cuisine_admin/layout', $data);
    }
    
    // Controller function to add a new Category
    public function add()
    {
        $query_where = array(  
                            'categoryname' =>  $this->input->post("category_name"),
                            'restaurantid' =>  $this->session->merchant_idrestaurantid
                         );
        $checkcategory = $this->Generic->findByCondition($query_where,$tablename="categories");
        if( empty($checkcategory) )
        {
            $data_New = array(  
                            'restaurantid'  =>  $this->session->merchant_idrestaurantid,
                            'categoryname'  =>  $this->input->post("category_name"),
                            'categorystatus'=>  $this->input->post("category_status")
                         );
            
            // slug library
            $config = array(
                    'table'     => 'categories',
                    'id'        => 'id',
                    'field'     => 'slug',
                    'title'     => 'title',
                    'replacement'=> 'dash' // Either dash or underscore
                    );
            $this->load->library('slug', $config);

            $data_slug = array(
                    'slug' => $this->input->post("category_name"),       // slug name of filed in db were ur url is stored
                    );
            $data_New['slug'] = $this->slug->create_uri($data_slug);
            //
            // insert to db
            $insert_data = $this->Generic->add($data_New, $tablename="categories");

            if($insert_data) 
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Menu Category Saved');
                $Json_resultSave = array ('status' => '1');
                redirect('cuisineadmin/categories/addform', 'refresh');
                
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Saving Menu Category');
                $Json_resultSave = array ('status' => '0');
                redirect('cuisineadmin/categories/addform', 'refresh');
            }
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'Category Name Exist Already !!!');
                $Json_resultSave = array ('status' => '0');
                redirect('cuisineadmin/categories/addform', 'refresh');
        }
    }
    
    // Controller function to display the edit Category form
    public function editform($id=null)
    {
        $this->session_manager->validateCuisine(__METHOD__);
        
        if(!empty($id) )
        {
            $categoryinfo = $this->Generic->getByID($id, $tablename="categories");  

            if($categoryinfo['categoryname'] !='Main Menu')
            {
                $data['title_type']= 'Edit Menu Category Form';
                $data['categoryinfo'] = $categoryinfo;
                $data ['content_file']= 'category_new';
                $data['pageheader'] = "Edit Menu Category";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("cuisineadmin/categories").'">Menu Category</a></li> <li class="breadcrumb-item active">Edit Menu Category</li>';
                $data['mainmenu'] = "Categories";
                $this->load->view('cuisine_admin/layout', $data);
            }
            else
            {
                redirect('cuisineadmin/Categories');
            }
        }
        else
        {
            redirect('cuisineadmin/Categories');
        }
        
        
    }

    // Controller function to edit a specified user
    public function edit()
    {
        $data_New = array( 
                        'categoryname'  =>  $this->input->post("category_name"),
                        'arrangecategory'=>  $this->input->post("category_order"),
                        'categorystatus' =>  $this->input->post("category_status")
                     );
    
        $data_Where = array(  
                        'restaurantid'  => $_SESSION['merchant_id'],
                        'id'            => $this->input->post('category')
                     );
        
        // Update to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="categories"); 
        if($insert_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Menu Category Updated');
            $Json_resultSave = array ('status' => '1');
            redirect('cuisineadmin/categories', 'refresh');
            
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Menu Category');
            $Json_resultSave = array ('status' => '0');
            redirect('cuisineadmin/categories', 'refresh');
        }
    }

    // Controller function to delete a specified user
    public function delete()
    {
        $by_id = $_POST["_id"];
        //$_data = $this->user->_deleteuser($by_id);

        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="categories");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Menu Category Deleted');
            $Json_resultSave = array ('status' => '1');
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleting Menu Category');
            $Json_resultSave = array ('status' => '0');
        }
    }
    
        
}

