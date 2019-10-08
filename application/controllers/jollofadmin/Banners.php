<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('restaurant');
        $this->load->model('promo');
        $this->load->model('user');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
        $this->jollof($existing_search=0, $page=0);
    }

    public function jollof($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof MainPage Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof MainPage</li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersjollof";
        
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
        
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=4;  
        }

        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);
        $data['bannerscount']  = $all_count;
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/jollof/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function cuisine($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof Cuisine Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof Cuisine</li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannerscuisine";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
          
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('bannertypeid'))
            {
                $filterparams['bannertypeid'] = $this->input->get('bannertypeid');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=1;  
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 1; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 10; 
        $data['bannerscount_R']  = $this->promo->getAllPromoCount($banner_params,$usertype);

        $banner_params['bannertypeid'] = 3; 
        $data['bannerscount_RS']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/cuisine/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function fashion($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof fashion Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof Fashion </li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersfashion";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
          
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('bannertypeid'))
            {
                $filterparams['bannertypeid'] = $this->input->get('bannertypeid');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=8;  
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 8; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 9; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/fashion/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function lifestyle($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof lifestyle Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof lifestyle </li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannerslifestyle";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
          
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('bannertypeid'))
            {
                $filterparams['bannertypeid'] = $this->input->get('bannertypeid');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']= 14;  
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 14; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 14; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/lifestyle/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function biz($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof Biz Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof Biz </li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersbiz";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
          
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('bannertypeid'))
            {
                $filterparams['bannertypeid'] = $this->input->get('bannertypeid');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']= 15;  
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 15; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 15; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/biz/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function scholar($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof Scholar Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof Scholar </li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersscholar";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
          
        
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('bannertypeid'))
            {
                $filterparams['bannertypeid'] = $this->input->get('bannertypeid');
            }
            $this->session->set_userdata(array('search_params' => $filterparams));
            $existing_search = 1;
        }
        else if($existing_search == 1)
        {
            // if there is an existing search it means the parameters are already in the session
            $filterparams = $this->session->search_order_params;
        }
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']= 16;  
        }
        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 16; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 16; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/scholar/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }


    public function jollofsignup($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin('Banners::jollof');

         // Set the initial page data
        $data['pageheader'] = " Banners:- Jollof Signup Page Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Jollof Signup Page</li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersjollofsignup";
        
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
        
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=11;  
        }

        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 11; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 11; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/jollofsignup/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function fashionsignup($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin('Banners::fashion');

         // Set the initial page data
        $data['pageheader'] = " Banners:- Fashion Signup Page Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Fashion Signup Page</li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersfashionsignup";
        
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
        
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=12;  
        }

        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 12; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 12; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/fashionsignup/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function cuisinesignup($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin('Banners::cuisine');

         // Set the initial page data
        $data['pageheader'] = " Banners:- Cuisine Signup Page Banners  ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Banners Cuisine Signup Page</li>';
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannerscuisinesignup";
        
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
        
        if(!isset($filterparams['bannertypeid']))
        {
            $filterparams['bannertypeid']=13;  
        }

        // sanitize params and only pass along the ones with data
        foreach ($filterparams as $key => $value)
        {
            if ($value != '' && $value != NULL && $value != 'all')
                $query_params[$key] = $value;
        }
        
        // Set back any parameter so the filter forms can have the data searched
        $data['filterparams'] = $filterparams;
        
        $usertype= array('admin','fashion','cuisine','thirdparty');
        // Load all the Merchants
        $data['banners'] = $this->promo->getAllPromo($query_params, $page, $usertype);
        $data['bannertype']  = $this->Generic->getByField($fieldname='status', $fieldvalue='1',$tablename='bannertype');

        // Get record count for pagination
        $all_count = $this->promo->getAllPromoCount($query_params,$usertype);

        $banner_params['bannertypeid'] = 13; 
        $data['bannerscount']  = $this->promo->getAllPromoCount($banner_params,$usertype);;

        $banner_params['bannertypeid'] = 13; 
        $data['bannerscount_F']  = $this->promo->getAllPromoCount($banner_params,$usertype);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->promo->getAllPromo($query_params, $page, $usertype),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/banners/cuisinesignup/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'banner-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    

    public function addform($id=null)
    {
         $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0,
                //'jollofsitetypeid'=>$id,
                'bannertype' =>'general'
            ); 
        $data['cate'] = $this->Generic->findByCondition($data_,'bannertype', $orderbyfield='bannertypename');
        $data['promo_duration'] = $this->promo->promoDurationOption();
        $data['admin_info'] = $this->promo->adminInfo();
        
        $data['title_type']= 'New Banner Form';
        $data['pageheader'] = "Add New Banner";
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersjollof";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Add New Banner</li>';
        
        $data ['content_file']= 'banner_new';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function addformbanner($id=null)
    {
        
            $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0,
                //'jollofsitetypeid'=>$id,
                'bannertype' =>'signup'
            ); 
        $data['cate'] = $this->Generic->findByCondition($data_,'bannertype', $orderbyfield='bannertypename');
        $data['promo_duration'] = $this->promo->promoDurationOption();
        $data['admin_info'] = $this->promo->adminInfo();
        
        $data['title_type']= 'New Banner Form';
        $data['pageheader'] = "Add New Banner";
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersjollof";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Add New Banner</li>';
        
        $data ['content_file']= 'banner_new2';
        $this->load->view('jollof_admin/layout', $data);
    }

    // Controller function to display the edit user form
    public function editform($id=null)
    {
        $data['mainmenu'] = "banners";
        $data['submenu'] = "bannersedit";
        if(!empty($id) )
        {
            $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0,
                //'jollofsitetypeid'=>$id,
                'bannertype' =>'general'
            ); 
            $data['cate'] = $this->Generic->findByCondition($data_,'bannertype', $orderbyfield='bannertypename');
            $bannerinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='img_ads');
            $data['bannerjollofsitetype']= $this->Generic->getByFieldSingle('id', $bannerinfo['bannertypeid'], $tablename='bannertype');
            $data['bannerinfo'] = $bannerinfo;
            
            //print("<pre>".print_r($this->Generic->getByFieldSingle('id', $id, $tablename='img_ads'),true)."</pre>");die;
            
            $data['title_type']= 'Edit Banner Form';
            $data['pageheader'] = "Edit Banner Info";
            $data['breadCrumbs'] = '<li class="breadcrumb-item active">Edit Banner</li> ';
            
            $data ['content_file']= 'banner_new';
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/banners');
        }
        
        
    }

    // Controller fuction to save the user
    public function save()
    {
        $loca='addform';

        if(!empty($_FILES['promo_image']['name']) )
        {
            $loca='addformbanner';

            $file_name = "promo_image";  // name of image input from the view
            $newname = 'admin_'.$this->utility->generate_random_string(8);    // Random Encryp new name save to app
            $banner_type = $this->Generic->getByFieldSingle('id', $_POST["bannertype"], $tablename='bannertype'); // Get url Id

            if($banner_type['jollofsitetypeid']==1)
            {
                $dirs_to_save = "./assets/jollof_banners/cuisine_banner/";
            }
             elseif($banner_type['jollofsitetypeid']==2)
            {
                $dirs_to_save = "./assets/jollof_banners/fashion_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==3)
            {
                $dirs_to_save = "./assets/jollof_banners/jollof_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==4)
            {
                $dirs_to_save = "./assets/jollof_banners/lifestyle_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==5)
            {
                $dirs_to_save = "./assets/jollof_banners/biz_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==6)
            {
                $dirs_to_save = "./assets/jollof_banners/scholar_banner/";
            }
            
            //chmod($uploade_loca,0777);
            $config['upload_path'] = $dirs_to_save;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2000';   
            $config['remove_spaces']  = TRUE;
            $config['overwrite'] = TRUE;
            $config['file_name'] = $newname;
            $config['raw_name'] = $file_name ;
            /*
            if(is_file($config['upload_path']))
            {
                chmod($config['upload_path'], 777); ## this should change the permissions
            }
             * 
             */

            $this->load->library('upload', $config);
            
            
            if(!$this->upload->do_upload($file_name))
            {
                    $mssg = $this->upload->display_errors();
                    $Json_resultSave = array (
                                        'status' => '0',
                                        'error' => $mssg
                                        );
                    echo json_encode($Json_resultSave);

                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New Banner'.$mssg);
                redirect('jollofadmin/banners/addformbanner');
            }
            else
            {
                $data = $this->upload->data(); 
                create_thumb($data, '300', '300',  $dirs_to_save.'thumbs/', TRUE);

                // data to save in db
                // 
                $exploded = explode('.',$_FILES['promo_image']['name']);
                $file_extn = strtolower(end($exploded));
                $imageName = $newname.'.'.$file_extn;
            }
        }
        else
        {


            // save the new Promo data  table //
            $cropimg_data = $_POST['cropimg'];
            // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

            $cropimg_remove_array1 = explode(";", $cropimg_data);
            // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

            $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
            // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

            $cropimg = base64_decode($cropimg_remove_array2[1]);

            $newname = 'admin_'.$this->utility->generate_random_string(8);    // Random Encryp new name save to app

            $imageName = $newname . '.png';

            //$imageName = 'admin_'.$this->utility->generate_random_string(8) . '.png';

            $banner_type = $this->Generic->getByFieldSingle('id', $_POST["bannertype"], $tablename='bannertype'); // Get url Id

            if($banner_type['jollofsitetypeid']==1)
            {
                $dir_to_save = "./assets/jollof_banners/cuisine_banner/";
            }
             elseif($banner_type['jollofsitetypeid']==2)
            {
                $dir_to_save = "./assets/jollof_banners/fashion_banner/";
            }
             elseif($banner_type['jollofsitetypeid']==3)
            {
                $dir_to_save = "./assets/jollof_banners/jollof_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==4)
            {
                $dir_to_save = "./assets/jollof_banners/lifestyle_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==5)
            {
                $dir_to_save = "./assets/jollof_banners/biz_banner/";
            }
            elseif($banner_type['jollofsitetypeid']==6)
            {
                $dir_to_save = "./assets/jollof_banners/scholar_banner/";
            }
            if (!is_dir($dir_to_save)) {
              mkdir($dir_to_save);
            }

            file_put_contents($dir_to_save.$imageName, $cropimg);
            if(isset($_FILES["promo_images"]["name"]))  
            {
                $this->load->library('image_lib');
                $configThumb['image_library'] = 'gd2';

                
                //$configThumb['source_image']  = $dataThumb['full_path'];


                $configThumb['source_image']  = $dir_to_save.''.$newname.'.png';
                $configThumb['new_image']     = $dir_to_save.'thumbs/'.$newname.'.png';//$dir_to_save.'thumbs/';.$dataThumb["raw_name"].$dataThumb['file_ext'];
                $configThumb['create_thumb'] = false;
                $configThumb['overwrite'] = TRUE;
                $configThumb['maintain_ratio'] = TRUE;
                $configThumb['width'] = 300;
                $configThumb['height'] = 300;
                $this->image_lib->initialize($configThumb);
                $this->image_lib->resize();   
                if(!$this->image_lib->resize())  
                {  
                    $err= $this->image_lib->display_errors();
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Banner--  '.$err.'');
                    $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! '.$err.''
                                        );
                     echo json_encode($Json_resultSave);  
                }

                 
            }
        }
           
        $data_New = array(
                            'bannertypeid'  =>  $_POST["bannertype"],
                            'imagename'     =>  $imageName,
                            'usertype'      =>  $this->session->Type,
                            'userid'        =>  $this->session->User_id,
                            'username'      =>  $this->session->firstname.' '.$this->session->lastname,
                            'status'        =>  1
                         );

        if(isset($_POST['slider_url']) && !empty($_POST['slider_url']) )
        {
            $url=trim($_POST['slider_url']);
            if($url !='https://' || $url !='http://' )
            {
                $url=$url;
                $data_New['imageurl'] = $url;
            }
            
        }
        
        $insert_data = $this->Generic->add($data_New, $tablename="img_ads");// insert to db

        if($insert_data) 
        {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Banner Saved');
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $imageName
                                        );
                 echo json_encode($Json_resultSave);
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New Banner');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                 echo json_encode($Json_resultSave);
        }
        //redirect('jollofadmin/banners/'.$loca);
    }
    
    // Controller function to edit a specified banner
    public function edit()
    {
         $data_New = array(
                            'arrangeimage'  =>  $_POST["arrangeimage"],
                            'status'        =>  $_POST['bannerstatus']
                         );

        if(isset($_POST['slider_url']) && !empty($_POST['slider_url']) )
        {
            $url=trim($_POST['slider_url']);
            if($url !='https://' || $url !='http://' )
            {
                $url=$url;
                $data_New['imageurl'] = $url;
            }
            
        }

           
            $data_Where = array(  
                            'id'    => $_POST['bannerid']
                         );
        //print("<pre>".print_r($data_New,true)."</pre>");die;
        //update to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="img_ads"); 
        if($insert_data)
        {
            $this->session->set_flashdata('success','Banner Info Updated');
            $this->session->set_flashdata('message', 'Banner Info Updated');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);

        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Banner Info');
                $Json_resultSave = array ('status' => '0');
                echo json_encode($Json_resultSave);
        }
    }


    public function delete($id=null)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

        $by_id = $_POST["_id"];
        $picture=$_POST["_name"];
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="img_ads");
        if($_data)
        {   
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Banner Deleted');
            $Json_resultSave = array ('status' => '1');

            // delete image from folder
            $dir_to_delete = './assets/jollof_banners/'.$_POST["_type"].'_banner/';
            $dir_to_delete_thumbs = './assets/jollof_banners/'.$_POST["_type"].'_banner/thumbs/';

           //unlink($dir_to_delete.$picture);
            if(unlink($dir_to_delete_thumbs.$picture))
            {
                 echo "Deleted";
            }
            else 
            {
                echo "There was a problem!! no such file or directory Pls Try Again.....";
            }
            
            echo json_encode($Json_resultSave);
            exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Banner');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            //exit();
        }
        
    }
    
   
        
}

