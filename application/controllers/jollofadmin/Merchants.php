<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchants extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('restaurant');
        $this->load->model('user');
        $this->load->model('product');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('oye/Email_model');
        $this->load->model('orderitem');
        $this->load->model('order');
        $this->load->model('promo');
        $this->load->helper('url');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2B Registration Review Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B</li>';
        $data['mainmenu'] = "merchants";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
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
        $data['merchants'] = $this->restaurant->getAll($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->restaurant->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $order_params['status'] = 0; // this is to get total pending B2B count
        $data['pending'] = $this->restaurant->getAllCount($order_params);
        
        $order_params['status'] = 1; // this is to get total cancelled B2B count
        $data['approved']  = $this->restaurant->getAllCount($order_params);
        
        $data['allmerchant']  = $this->restaurant->getAllCount();
        
        //print("<pre>".print_r($this->restaurant->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/merchants/index/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'merchant-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function comments($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2B Comment Review";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B Comment</li>';
        $data['mainmenu'] = "merchants";
        $data['submenu'] = "comments";
        
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
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
        $data['commentslists'] = $this->restaurant->getAllComment($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->restaurant->getAllCommentCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;getAllComment
        
        //print("<pre>".print_r($this->restaurant->getAllComment($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/merchants/comments/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'comment-list';
        $this->load->view('jollof_admin/layout', $data);   
    }

    public function b2b($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "Registered  B2B's";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Registered B2B</li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
        
        $filterparams['status']=1;
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            $filterparams['status']=1;
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
        $data['merchants'] = $this->restaurant->getAll($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->restaurant->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $order_params['status'] = 0; // this is to get total pending B2B count
        $data['pending'] = $this->restaurant->getAllCount($order_params);
        
        $order_params['status'] = 1; // this is to get total cancelled B2B count
        $data['approved']  = $this->restaurant->getAllCount($order_params);
        
        $data['allmerchant']  = $this->restaurant->getAllCount();
        
        //print("<pre>".print_r($this->restaurant->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/merchants/b2b/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'merchant-listb2b';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function cuisineproduct($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
        
         // Set the initial page data
        $data['pageheader'] = "B2B's Cuisine Products";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B Cuisine Products</li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "cuisineproduct";
        
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
        
        // Load all the products items
        $data['products'] = $this->product->getAllProductCuisine($query_params, $page,$platformid='admin');
        $data['productsMerchant'] = $this->product->getAllProductCuisineoMerchant();
        // Get record count for pagination
        $all_count = $this->product->getAllCuisineCount($query_params,$platformid='admin');
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/merchants/cuisineproduct/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'merchant-productcuisine';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function fashionproduct($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "fashionproduct";

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
        
        // Load all the products items
        $data['products'] = $this->product->getAllProduct($query_params, $page,$platformid='admin');
        $data['productsMerchant'] = $this->product->getAllProductMerchant();
        // Get record count for pagination
        $all_count = $this->product->getAllProductCount($query_params,$platformid='admin');
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->product->getAllProduct($query_params, $page,$platformid='admin'),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/merchants/fashionproduct/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'merchant-productfashion';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2bstore($slug=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['pageheader'] = "B2B's Merchant Store Details";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> <li class="breadcrumb-item active">B2B Merchant Store Info</li>';
        $data['mainmenu'] = "bb2breview2b";
        $data['submenu'] = "merchantb2b";

        if(isset($slug)&& !empty($slug))
        {
            $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
            if($merchant == FALSE){redirect('jollofadmin/merchants/b2b');} // If its a wrong url 
            

            $data_wherecity = array(
                    'stateid'    => $merchant['stateid'],
                    'status'        =>  1
                );
            $data_wherestate = array(
                    'status'        =>  1
                );

            $data['merchantinfo'] = $merchant;
            $data['merchantcity'] =  $this->Generic->getByFieldSingle('id', $merchant['cityid'], $tablename='state_cities');
            $data['merchantstate'] =  $this->Generic->getByFieldSingle('id', $merchant['stateid'], $tablename='states');
            $data['banks'] =  bankList();//$this->Generic->getAll('paystackbanks',NULL, $fieldlist=null, null, null, $orderbyfield='name');

            $data['rest_state']= $this->Generic->findByCondition($data_wherestate,'states', $orderbyfield='statename');//$this->user->get_allstate(); //call state
            $data['rest_city']= $this->Generic->findByCondition($data_wherecity,'state_cities', $orderbyfield='cityname');//$this->user->get_city_bystate($merchant['stateid']); // call City by State

            
            //print("<pre>".print_r($this->Generic->findByCondition($data_wherestate,'states', $orderbyfield='statename'),true)."</pre>");die;
            $data ['content_file']= 'merchant-profilecuisine';
        }

        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2borders($slug=null,$existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['pageheader'] = "B2B's Merchant Orders";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
        <li class="breadcrumb-item active"> B2B Merchant Store Orders </li>';
        $data['mainmenu'] = "b2breviewb2breview";
        $data['submenu'] = "merchantb2b";

        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        if($merchant == FALSE){redirect('jollofadmin/merchants/b2b');} // If its a wrong url 

        $data['merchantinfo'] = $merchant;
        $data['merchantcity'] =  $this->Generic->getByFieldSingle('id', $merchant['cityid'], $tablename='state_cities');
        $data['merchantstate'] =  $this->Generic->getByFieldSingle('id', $merchant['stateid'], $tablename='states');

        
            $filterparams = array();
            $query_params = array();
            // Process filter if any was posted

            $filterparams['companyname']=$merchant['companyname'];
            if(($this->input->post() && $existing_search == 0))
            {
                // Get all data from the search form
                $filterparams = $this->input->post();
                $filterparams['companyname']=$merchant['companyname'];
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
            $data['orderitems'] = $this->orderitem->getFashionCuisineOrders($query_params,  $page);

            // Get record count for pagination
            $all_count = $this->orderitem->getFashionCuisineOrdersCount($query_params);
            
            // Load stats
            //$order_params = $query_params;
            //print("<pre>".print_r($query_params,true)."</pre>");die;
            
            // load pagenation details
            $this->load->library('pagination');
            $config['base_url'] = site_url("jollofadmin/merchants/b2borders/$slug/$existing_search");
            $config['total_rows'] = $all_count;
            $config['per_page'] = '25';
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagenation'] = $this->pagination->create_links();
            
            $data ['content_file']= 'merchant-profilecuisineorder';
        

        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2bproducts($slug=null,$existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['pageheader'] = "B2B's Merchant Products";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
        <li class="breadcrumb-item active"> B2B Merchant Store Products </li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";

        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        if($merchant == FALSE){redirect('jollofadmin/merchants/b2b');} // If its a wrong url 

        $data['merchantinfo'] = $merchant;
        $data['merchantcity'] =  $this->Generic->getByFieldSingle('id', $merchant['cityid'], $tablename='state_cities');
        $data['merchantstate'] =  $this->Generic->getByFieldSingle('id', $merchant['stateid'], $tablename='states');

        if($merchant['merchanttype']=='cuisine')
        {
            $filterparams = array();
            $query_params = array();
            // Process filter if any was posted

            $filterparams['companyname']=$merchant['companyname'];
            if(($this->input->post() && $existing_search == 0))
            {
                // Get all data from the search form
                $filterparams = $this->input->post();
                $filterparams['companyname']=$merchant['companyname'];
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
            $data['products'] = $this->product->getAllProductCuisine($query_params, $page,$platformid='admin');
            $data['productsMerchant'] = $this->product->getAllProductCuisineoMerchant();
            
            // Get record count for pagination
            $all_count = $this->product->getAllCuisineCount($query_params,$platformid='admin');
            
            // Load stats
            //$order_params = $query_params;
            //print("<pre>".print_r($query_params,true)."</pre>");die;
            
            // load pagenation details
            $this->load->library('pagination');
            $config['base_url'] = site_url("jollofadmin/merchants/b2bproducts/$slug/$existing_search");
            $config['total_rows'] = $all_count;
            $config['per_page'] = '25';
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagenation'] = $this->pagination->create_links();
            
            $data ['content_file']= 'merchant-profilecuisineproduct';
        }
        elseif($merchant['merchanttype']=='fashion')
        {
            # code...
            $filterparams = array();
            $query_params = array();
            // Process filter if any was posted

            $filterparams['productmerchantid']=$merchant['id'];
            $filterparams['companyname']=$merchant['companyname'];
            if(($this->input->post() && $existing_search == 0))
            {
                // Get all data from the search form
                $filterparams = $this->input->post();
                $filterparams['companyname']=$merchant['companyname'];
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
            $data['products'] = $this->product->getAllProduct($query_params, $page,$platformid='admin');
            $data['productsMerchant'] = $this->product->getAllProductMerchant();
            // Get record count for pagination
            $all_count = $this->product->getAllProductCount($query_params,$platformid='admin');
            
            // Load stats
            //$order_params = $query_params;
            //print("<pre>".print_r($query_params,true)."</pre>");die;

            // load pagenation details
            $this->load->library('pagination');
            $config['base_url'] = site_url("jollofadmin/merchants/fashionproduct/$existing_search");
            $config['total_rows'] = $all_count;
            $config['per_page'] = '25';
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagenation'] = $this->pagination->create_links();
            
            $data ['content_file']= 'merchant-profilefashionproduct';
        }

        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2busers($slug=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
        //print_r($_SESSION);

        $data['pageheader'] = "B2B's Merchant Users";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
        <li class="breadcrumb-item active"> B2B Merchant Store Users </li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";

        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        $data['merchantinfo'] = $merchant;
        
        // Load all the users
        $data['users'] = $this->user->getAll($merchant['id']);
        
        //print("<pre>".print_r( $this->user->getAll($merchant['id']),true)."</pre>");die;

        $data ['content_file']= 'merchant-profilecuisineusers';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    public function b2bpromos ($slug=null,$existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2B's Merchant Promos";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
        <li class="breadcrumb-item active"> B2B Merchant Store Promos </li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";

        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        if($merchant == FALSE){redirect('jollofadmin/merchants/b2b');} // If its a wrong url 

        $data['merchantinfo'] = $merchant;
        $data['merchantcity'] =  $this->Generic->getByFieldSingle('id', $merchant['cityid'], $tablename='state_cities');
        $data['merchantstate'] =  $this->Generic->getByFieldSingle('id', $merchant['stateid'], $tablename='states');
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
        $filterparams['companyname']=$merchant['companyname'];
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams['companyname']=$merchant['companyname'];
            $filterparams = $this->input->post();
            if(  $this->input->get('status')!='' )
            {
                $filterparams['status'] = $this->input->get('status');
            }
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
        
        $usertype= array('fashion','cuisine');
        // Load all the Merchants
        $data['promos'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['promoMerchant']  = $this->promo->getFashionCuisinePromoMerchant();
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $promotype_params = array('fashion'); // this is to get total pending B2B count
        $data['fashionPromo'] = $this->promo->getAllPromoCount(null,$promotype_params);
        
        $promotype_params = array('cuisine'); // this is to get total cancelled B2B count
        $data['cuisinePromo']  = $this->promo->getAllPromoCount(null,$promotype_params);

        $promotype_params = array('thirdparty'); // this is to get total cancelled B2B count
        $data['thirdpartyads']  = $this->promo->getAllPromoCount(null,$promotype_params);
        
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/promos/b2bpromos/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'merchant-profilepromo';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2bordersview($slug=null,$id=null)
    {
        $this->session_manager->validateJollofadmin('Orders::view');

        $data['pageheader'] = "B2B's Merchant Order Full Details";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li> 
        <li class="breadcrumb-item"><a href="'.site_url("jollofadmin/merchants/b2borders/$slug").'"> B2B Merchant Store Orders</a> </li>
        <li class="breadcrumb-item active"> B2B Store Full Orders Details </li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";

        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        if($merchant == FALSE){redirect('jollofadmin/merchants/b2b');} // If its a wrong url

        $orderdetails = $this->orderitem->getFashionOrdersByID($id,'admin');
        if(!empty($orderdetails))
        {
            $data['orderinfo'] = $orderdetails;

            $data ['content_file']= 'order-list-detail';
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/merchants/b2borders/$slug');
        }
    }

    public function b2b_statusupdate()
    {
        $status = $_POST["status"];
        $id = $_POST["b2b_id"];

        if($status == 1)
        {
            $data_merge = array( 
                            'percharge'         => 10,
                            'perchargestatus'   => 1,
                            'status'            => $status
                        );

        }
        else
        {   
            $data_merge = array( 
                            'status' => $status
                        );
        }
        $data_update = $this->Generic->edit($data_merge, $id , $tablename="restaurants");
        if($data_update)
        {
               
            // get the users name
            $merchant = $this->Generic->getByFieldSingle('id', $id, $tablename='restaurants'); // Get url Id
            
            // send the email
            $site_email ='segun@stakle.com';
            $logo = 'jol.png';
            $merchant_email= $this->Email_model->send_merchant_confirmed_mail($merchant['email'], $site_email, $logo,$merchant['companyname'],$merchant['merchanttype']);
            if($merchant_email)
            {
                //return TRUE;
            }
            else
            {
                
                //return FALSE;
            }
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'B2B Status Updated');
            $Json_resultSave = array (
                                    'status' => '1',
                                    );
           // echo json_encode($Json_resultSave);
        } 
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated B2B Status');
            $Json_resultSave = array (
                                    'status' => '0',
                                    );
            //echo json_encode($Json_resultSave);

        }

    }

    public function b2b_resendActivationEmail()
    {
        $id = $_POST["b2b_id"];
               
        // get the users name
        $merchant = $this->Generic->getByFieldSingle('id', $id, $tablename='restaurants'); // Get url Id
        
        // send the email
        $site_email ='segun@stakle.com';
        $logo = 'jol.png';
        $merchant_email= $this->Email_model->send_merchant_confirmed_mail($merchant['email'], $site_email, $logo,$merchant['companyname'],$merchant['merchanttype']);
        if($merchant_email)
        {
            //return TRUE;
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Activation Email Resend ');
            $Json_resultSave = array (
                                    'status' => '1',
                                    );
           // echo json_encode($Json_resultSave);
        }
        else
        {
            
            //return FALSE;
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when sending Activation Email');
            $Json_resultSave = array (
                                    'status' => '0',
                                    );
            //echo json_encode($Json_resultSave);
        }

    }

    public function b2b_resetPasswordEmail()
    {
        $id = $_POST["b2b_id"];

        // get the users name
        $merchant = $this->Generic->getByFieldSingle('id', $id, $tablename='restaurants'); // Get url Id

        $data_where = array(
                    'email'    => $merchant['email'],
                    'restaurantid'	=>  $id
                );

        $supermerchant =   $this->Generic->findDuplicate($data_where,'users');

        //print("<pre>".print_r($supermerchant,true)."</pre>");die;
        //$this->Generic->findByCondition($data_where,'users');
        //$this->Generic->getByFieldSingle('email', $merchant['email'], $tablename='users'); 
        
        $time 	= date('Y-m-d H:i:s');
        $tim  	= strtotime($time);
        $token 	= do_hash($merchant['email'].$tim);
        $url 	= '<a href="'.base_url().'accounts/merchantpasswordform/'.$supermerchant['id'].'/'.$token.'/"> Click here!!! </a>';
        

        $data_New = array(
            'accountid' => $supermerchant['id'],
            'token' => $token,
            'email' => $merchant['email']
            //'date_created' => $time
        );
        $insert_data = $this->Generic->add($data_New, $tablename="password_reset");
        // send the email
        $site_email ='segun@stakle.com'; 
        $logo = 'jol.png';
        $merchant_email= $this->Email_model->send_restaurant_password_reset_mail($merchant['companyname'],$url,$merchant['email'], $site_email, $logo);
        if($merchant_email)
        {
            //return TRUE;
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Reset Password Email Sent ');
            $Json_resultSave = array (
                                    'status' => '1',
                                    );
           // echo json_encode($Json_resultSave);
        }
        else
        {
            
            //return FALSE;
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when sending Reset Password Email');
            $Json_resultSave = array (
                                    'status' => '0',
                                    );
            //echo json_encode($Json_resultSave);
        }

    }

    public function update_store_data($id=null)
    {
        $id = $_POST["id"];
        $data_New = array(
                        'companyname'   =>  $_POST['companyname'],
                        'phone'         =>  $_POST["phone"],
                        'phone2'        =>  $_POST["phone2"],
                        'address'       =>  $_POST['address'],
                        'stateid'       =>  $_POST["stateid"],
                        'cityid'        =>  $_POST["cityid"],
                        'latitude'      =>  $_POST["latitude"],
                        'longitude'     =>  $_POST["longitude"],
                        'status'        =>  $_POST["status"]
                     );
        if($_POST['tablereservation'])
        {
            $data_New['tablereservation'] = $_POST['tablereservation'];
        }
        if($_POST['companydesc'])
        {
            $data_New['companydesc'] = $_POST['companydesc'];
        }
        // slug library
        $config = array(
                        'table' => 'restaurants',
                        'id' => 'id',
                        'field' => 'slug',
                        'title' => 'title',
                        'replacement' => 'dash' // Either dash or underscore
                        );
        $this->load->library('slug', $config);
        $data_slug = array('slug' => $_POST["companyname"],);       // slug name of filed in db were ur url is stored
        $data_New['slug'] = $this->slug->create_uri($data_slug, $id );
        
        // get the users name
        $merchant = $this->Generic->getByFieldSingle('id', $id, $tablename='restaurants'); // Get url Id
        
        // Update to paystack account
        if(empty($merchant['bankCode']))
        {
            $_POST['email'] = $merchant['email'];
            $response = createSubaccount($_POST);
            /*
            $response = $this->paystack->subaccount->create([
                                'business_name'     => $_POST["accountName"],
                                'settlement_bank'   => $_POST["bankName"],
                                'account_number'    => $_POST["accountNo"],
                                'percentage_charge' =>   $_POST["percharge"],
                                'primary_contact_name'=>   $_POST["companyname"],
                                'primary_contact_email'=>   $merchant["email"],
                                'primary_contact_phone'=>   $_POST["phone"]
                              ]);
            */
        
            if($response->status)
            {
                $paystackbanksid =  $this->Generic->getByFieldSingle('name',$_POST["bankName"],'paystackbanks');
                $data_New = array(
                                    'bankCode'    =>   $response->data->subaccount_code,
                                    'bankName'    =>   $response->data->settlement_bank,
                                    'accountNo'   =>   $response->data->account_number,
                                    'accountName' =>   $_POST['companyname'],
                                    'percharge'   =>   $response->data->percentage_charge,
                                    //'paystackbanksid '  =>  $paystackbanksid['id'],
                                    'paymenttype' =>     $_POST['paymenttype'],
                                    'perchargestatus'   =>  $_POST["perchargestatus"]
                                 );
                //save Data
                $data_update = $this->Generic->edit($data_New, (int)$id, $tablename="restaurants");

                if($data_update)
                {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Store Details Updated Successfull...');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                   // echo json_encode($Json_resultSave);
                    /*
                    // send the email
                    $site_email ='segun@stakle.com';
                    $logo = 'jol.png';
                    $merchant_email= $this->Email_model->send_merchant_confirmed_mail($merchant['email'], $site_email, $logo,$merchant['companyname'],$merchant['merchanttype']);
                    if($merchant_email)
                    {
                        //return TRUE;
                        $this->session->set_flashdata('success','success');
                        $this->session->set_flashdata('message', 'Store Details Updated & Confirmation Email Sent Successfull...');
                        $Json_resultSave = array (
                                                'status' => '1',
                                                );
                       // echo json_encode($Json_resultSave);
                    }
                    else
                    {
                        //return FALSE;
                        $this->session->set_flashdata('error','error');
                        $this->session->set_flashdata('message', 'Store Details Updated, But Confirmation Email Was not Sent');
                        $Json_resultSave = array (
                                                'status' => '0',
                                                );
                       // echo json_encode($Json_resultSave);
                    }
                    */
                    
                } 
                else
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updated Store Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            );
                    //echo json_encode($Json_resultSave);

                }
            }  
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'Error Account Details! Pls Provide a Valid Account Details');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'Could not Resolve Account Name!! Pls Try Again.....'
                                        );
                //echo json_encode($Json_resultSave);
                //exit();
            }
        }
        else
        {
            $_POST["store_accountName"] = $_POST["accountName"];
            $_POST["store_bankName"]    = $_POST["bankName"];
            $_POST["store_accountNo"]   = $_POST["accountNo"];
            $_POST['email']             = $merchant['email'];
            $_POST["store_name"]        = $_POST["companyname"];
            $_POST["store_phone1"]      = $_POST["phone"];
            $response = updateSubaccount($merchant['bankCode'],$_POST);
            
            /*
            $response = $this->paystack->subaccount->update([
                            'id'=> $merchant['bankCode'],
                            'business_name'=> $_POST["accountName"],
                            'settlement_bank'=> $_POST["bankName"],
                            'account_number'=>  $_POST["accountNo"],
                            'percentage_charge' =>   $_POST["percharge"],
                            'primary_contact_name'=>   $_POST["companyname"],
                            'primary_contact_phone'=>   $_POST["phone"]

                          ]);
            */
            if($response->status)
            {
                $paystackbanksid =  $this->Generic->getByFieldSingle('name',$_POST["bankName"],'paystackbanks');
                $data_New = array(
                                    'bankName'    =>   $_POST["bankName"],
                                    'accountNo'   =>   $_POST["accountNo"],
                                    'accountName' =>   $_POST['accountName'],
                                    'paymenttype' =>   $_POST['paymenttype']
                                   // 'paystackbanksid '  =>  $paystackbanksid['id']
                                 );

                $data_update = $this->Generic->edit($data_New, (int)$id, $tablename="restaurants");

                if($data_update)
                {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Store Details Updated Successfull...');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                   // echo json_encode($Json_resultSave);
                } 
                else
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updated Store Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            );
                    //echo json_encode($Json_resultSave);

                }
            }
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'Error Account Details! Account details are invalid');
                $Json_resultSave = array (
                                        'status' => '0',
                                        );
                //echo json_encode($Json_resultSave);

            }
        }

    }

    public function delete($id=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // delete to db
        $data_merge = array(
                    'tablecode'     => '',
                    'requeststatus' => 0,
                    'status'        =>  0
                );

        $_data = $this->Generic->edit($data_merge, $id , $tablename="tablereservations");
        if($_data)
        {

            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Table Reservations Declined');
            $Json_resultSave = array ('status' => '1');
            redirect('/jollofadmin/tablereservation', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
       }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Declined Table Reservations');
            $Json_resultSave = array ('status' => '0');
            redirect('/jollofadmin/tablereservation', 'refresh');
            //echo json_encode($Json_resultSave);
            //exit();
        }
        
    }

    public function All_Subaccount()
    {
        $response = $this->paystack->subaccount->getList();
        print("<pre>".print_r($response,true)."</pre>");die;
         
    }
       
    public function All_Subaccount_byid()
    {
        $response = $this->paystack->subaccount->fetch([
                                'id'=> 'ACCT_ifzjkcgym9co3y4',
                            ]);
        print("<pre>".print_r($response,true)."</pre>");die;
         
    }

    public function New_Subaccount()
    {
        $response = $this->paystack->subaccount->create([
                                'business_name'=> $_POST["rest_name"],
                                'settlement_bank'=> $_POST["bank_name"],
                                'account_number'=> $_POST["acc_num"],
                                'percentage_charge'=>   $_POST["percentage"],
                                'primary_contact_name'=>   $_POST["acc_name"],
                                'primary_contact_email'=>   $_POST["rest_email"],
                                'primary_contact_phone'=>   $_POST["rest_num"]
                              ]);
        
        if($response->status)
        {
            $data_order = array(
                                'bankCode'    =>   $response->data->subaccount_code,
                                'bankName'    =>   $response->data->settlement_bank,
                                'accountNo'   =>   $response->data->account_number,
                                'percharge'   =>   $response->data->percentage_charge,
                                'perchargestatus'   =>   1
                             );
            
            $where = array('id'    =>      $_POST["rest_id"]);
            $data_update=$this->Super_admin_model->_update_restaurant_data($data_order,$where); // save  to db
            
            if($data_update)
            {
                $Json_resultSave = array ('status' => '1');
                echo json_encode($Json_resultSave);
                return true;
            } 
            else
            {
                return FALSE;
            }
        }
         
    }
    
       
    public function Update_Subaccount()
    {
        $response = $this->paystack->subaccount->update([
                                'id'=> 'ACCT_hveknjddxjpe0qg',
                                'business_name'=> 'Avip Studios',
                                /*'settlement_bank'=> 'Guaranty Trust Bank',
                                'account_number'=> '0193274682',
                                'percentage_charge'=>   '5',
                                'primary_contact_name'=>   'OYE Express',
                                'primary_contact_email'=>   'trivin98@gmail.com ',
                                'primary_contact_phone'=>   '08080696623'*/
                              ]);
        print("<pre>".print_r($response,true)."</pre>");die;
         
    }


    // Controller function to display the add user form
    public function usersaddform($slug=null)
    {
        
        $this->session_manager->validateJollofadmin("Merchants::b2busers");
        
        $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
        $data['merchantinfo'] = $merchant;

        $data['cate']= $this->user->userrole($merchant['id']);
        
        $data['title_type']= "New B2B's Merchant  Users Form";
        $data['pageheader'] = "Add User";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2busers/$slug").'">B2B Merchant Store Users </a></li> 
            </li> <li class="breadcrumb-item active">Add User</li>';
        $data['mainmenu'] = "b2breview";
        $data['submenu'] = "merchantb2b";

        $data ['content_file']= 'user_new';
        $this->load->view('jollof_admin/layout', $data);
    }

    // Controller function to display the edit user form
    public function userseditform($slug=null,$id=null)
    {
        $this->session_manager->validateJollofadmin("Merchants::b2busers");
        
        if(!empty($id) )
        {
            $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
            $data['merchantinfo'] = $merchant;

            $data['cate']= $this->user->userrole($merchant['id']);
            $data['title_type']= 'Edit Users Form';
            $data['userinfo'] = $this->user->getByID($id);

            $data['pageheader'] = "Edit B2B's Merchant Users";
            $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/merchants/b2b").'"> Registered B2B </a> </li> 
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2bstore/$slug").'">B2B Merchant Store Info</a> </li>
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/merchants/b2busers/$slug").'">B2B Merchant Store Users </a></li> 
            </li> <li class="breadcrumb-item active">Edit User</li>';
            $data['mainmenu'] = "b2breview";
            $data['submenu'] = "merchantb2b";

            $data ['content_file']= 'user_new';

            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/merchants/b2busers/'.$slug);
        }
        
        
    }

    // Controller fuction to save the user
    public function userssave()
    {
        // save the new user data  table //
        $time = date('Y-m-d H:i:s');
        $tim  = strtotime($time);
        $token= do_hash($this->input->post('useremail').$tim);

        $data_check = array(  
                                 'email'  =>  $this->input->post('useremail'),// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
        $check_data = $this->user->is_user_email_available($data_check);

        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message', $this->input->post('useremail').' Email Already Register');
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
                                    'restaurantid'  => $this->input->post('restaurantid'),
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
            $insert_data = $this->Generic->add($data_New, $tablename="users"); 

            if($insert_data)
            {
                $rest_info=$this->user->merchant_info($this->input->post('restaurantid'));
                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $this->Email_model->send_restaurant_User_email($this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('useremail'), $site_email, $logo, $rest_info->companyname,$token );

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
    public function usersedit()
    {
        $data_New = array(  
                        'userroleid'    => $this->input->post('userrole'),
                        'firstname'     => $this->input->post('firstname'),
                        'lastname'      => $this->input->post('lastname'),
                        'phonenumber'   => $this->input->post('phone'),
                        'status'        => $this->input->post('status')
                     );
        
        $data_Where = array(  
                        'restaurantid'  => $this->input->post('restaurantid'),
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
    public function usersdelete()
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
            $this->session->set_flashdata('message', 'An error occur when Deleting User');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            exit();
        }
    }
    
    public function usersresendactivationemail($slug=null,$by_id=null)
    {
        if(!empty($by_id))
        {
            
            $userinfo = $this->user->getByID($by_id);//get user details
            $merchant = $this->Generic->getByFieldSingle('slug', $slug, $tablename='restaurants'); // Get url Id
            
            
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
            $sendemail=$this->Email_model->send_restaurant_User_email($userinfo->firstname, $userinfo->lastname, $userinfo->email, $site_email, $logo, $merchant['companyname'],$token );
            //print("<pre>".print_r($sendemail,true)."</pre>");die;
            if($sendemail==1)
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Activation Email Sent');
                redirect('cuisineadmin/users');
            }
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
                redirect('jollofadmin/merchants/b2busers/'.$slug);
            }
            
        }
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Sending Activation Email');
            redirect('jollofadmin/merchants/b2busers/'.$slug);
        }
    }
   
        
}

