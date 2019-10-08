<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
          /*$this->load->model('oye/Restaurant_admin_model');
          $this->load->model('oye/Fashion_model');
          $this->load->model('oye/Session_model');
          $this->load->model('oye/Role_assignment');
          
           * 
           */
            $this->load->model('validate_session', 'session_manager');
            $this->load->model('user');
            $this->load->model('Utility');
            $this->load->helper('text');
            $this->load->helper('text');
	}
     
        public function index($existing_search=0, $page=0)
	{
	    //$this->session_manager->validateFashion(__METHOD__);
	    $data['pageheader'] = "Users Management";
	    $data['breadCrumbs'] = '<li class="breadcrumb-item active">Users</li>';
	    $data['mainmenu'] = "users";
            
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
	    
            //print_r( $_SESSION);
	    // Set back any parameter so the filter forms can have the data searched
	    $data['filterparams'] = $filterparams;
            // Load all the products items
            $data['users'] = $this->user->getAll();
	    print("<pre>".print_r($this->user->getAll(),true)."</pre>");die;
	    
            //load pagenation details
	    $this->load->library('pagination');
	    $config['base_url'] = site_url("fashionadmin/orders/index/$existing_search");
	    //$config['total_rows'] = $this->orderitem->getProductCount($query_params, );
	    $config['per_page'] = '25';
	    $config['uri_segment'] = 5;
	    $this->pagination->initialize($config);
	    $data['pagenation'] = $this->pagination->create_links();
            
	    $data ['content_file']= 'userroles';
	    $this->load->view('fashion_admin/layout', $data);
	}
        
        public function indexx()
        {

                $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
                $data['error_page'] = 'included/rest_included/error_page';
                $data ['title']= 'Jollof:- Users';
                $data ['icon']= 'jol_1.ico';


                $data ['content_file']= 'fashion_admin/users';
                //print("<pre>".print_r($this->Super_admin_model->get_admin_info(),true)."</pre>");die;
                $this->load->view('fashion_admin/layout', $data); 
        }

        public function userroles()
	{
            //$this->check_Loginin();
            //$this->validate_permission(__METHOD__);
                
        $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data['error_page'] = 'included/rest_included/error_page';
        $data ['title']= 'Jollof:- Users Roles';
        $data ['icon']= 'jol_1.ico';
        
        
        $data ['sidebar']= 'included/fashion_included/sidebar_menu';
        $data ['header']= 'included/fashion_included/header_nav';
        $data ['tray']= 'included/fashion_included/header_tray';
        
        $data ['page_loader']= 'fashion_admin/userroles';
        
		$this->load->view('fashion_admin/template', $data); 
	}
	
}
