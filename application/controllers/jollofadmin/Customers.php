<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('customer');
        $this->load->model('order');
        $this->load->model('orderitem');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2C Registration Review Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2C</li>';
        $data['mainmenu'] = "approvaltask";
        $data['submenu'] = "customer";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
        
        $filterparams['usertype']='user';
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            $filterparams['usertype']='user';
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
        $data['customers'] = $this->customer->getAll($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->customer->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $order_params['status'] = 0; // this is to get total pending B2B count
        $order_params['usertype']='user';
        $data['pending'] = $this->customer->getAllCount($order_params);
        
        $order_params['status'] = 1; // this is to get total cancelled B2B count
        $order_params['usertype']='user';
        $data['approved']  = $this->customer->getAllCount($order_params);
        

        $order_all['usertype']='user';
        $data['allmerchant']  = $this->customer->getAllCount($order_all);
        
        //print("<pre>".print_r($this->restaurant->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/customers/index/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'customer-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function guest($existing_search=0, $page=0)
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2C Registration Review Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2C</li>';
        $data['mainmenu'] = "approvaltask";
        $data['submenu'] = "customer";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
        
        $filterparams['usertype']='guest';
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            $filterparams['usertype']='guest';
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
        $data['customers'] = $this->customer->getAll($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->customer->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        

        $order_all['usertype']='guest';
        $data['allmerchant']  = $this->customer->getAllCount($order_all);
        
        //print("<pre>".print_r($this->restaurant->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/customers/guest/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'customer-listguest';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function b2c($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = "B2C Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Registered B2C</li>';
        $data['mainmenu'] = "b2c";
        $data['submenu'] = "b2c";
        
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
        $data['customers'] = $this->customer->getAll($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->customer->getAllCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");die;
        $order_params['status'] = 0; // this is to get total pending B2B count
        $data['pending'] = $this->customer->getAllCount($order_params);
        
        $order_params['status'] = 1; // this is to get total cancelled B2B count
        $data['approved']  = $this->customer->getAllCount($order_params);
        
        $data['allmerchant']  = $this->customer->getAllCount();
        
        //print("<pre>".print_r($this->restaurant->getAll($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/customers/b2c/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'customer-listb2b';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function profile($id=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['pageheader'] = "B2C Profile";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/customers/b2c").'"> Registered B2C </a> </li> <li class="breadcrumb-item active">B2C User Info</li>';
        $data['mainmenu'] = "b2c";
        $data['submenu'] = "b2cprofile";

        


        if(isset($id)&& !empty($id))
        {
            $customer = $this->Generic->getByFieldSingle('id', $id, $tablename='accounts'); // Get url Id
            if($customer == FALSE){redirect('jollofadmin/customers/b2b');} // If its a wrong url 
            $data['customerinfo'] = $customer;

            
            //print("<pre>".print_r($this->customer->getAll($filterparams,  $page=0),true)."</pre>");die;
            $data ['content_file']= 'customer-profile';
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        { redirect('jollofadmin/customers/b2b');}

        
    } 
    public function orders($id=null, $existing_search=0, $page=0)
    {
        // Validate that the user has access to this controller
        $this->session_manager->validateJollofadmin(__METHOD__);
        
        // Set the initial page data
        $data['pageheader'] = "B2C Orders";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/customers/b2c").'"> Registered B2C </a> </li>
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/profile/$id").'">B2C User Info</a> 
        </li> <li class="breadcrumb-item active"> B2C Customers Orders </li>';
        $data['mainmenu'] = "b2c";
        $data['submenu'] = "b2corder";
        
        $customer = $this->Generic->getByFieldSingle('id', $id, $tablename='accounts'); // Get url Id
        if($customer == FALSE){redirect('jollofadmin/customers/b2b');} // If its a wrong url 
        $data['customerinfo'] = $customer;


        $filterparams = array();
        $query_params = array();

        // Process filter if any was posted
           $filterparams['accountid']=$id;  
    

        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
            if($this->input->get('orderstatus'))
            {
                $filterparams['orderstatus'] = $this->input->get('orderstatus');
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
        
        // Load all the order items
        $data['orderitems'] = $this->orderitem->getFashionCuisineOrders($query_params,  $page);
        // Get record count for pagination
        $all_order_count = $this->orderitem->getFashionCuisineOrdersCount($query_params);
        
       
        //print("<pre>".print_r($this->orderitem->getFashionCuisineOrders($query_params, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/customers/orders/$id/$existing_search");
        $config['total_rows'] = $all_order_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'customer-order';
        $this->load->view('jollof_admin/layout', $data);
        
    }


    public function deliveryaddress($id=null)
    {
        // Validate that the user has access to this controller
        $this->session_manager->validateJollofadmin(__METHOD__);
        
        // Set the initial page data
        $data['pageheader'] = "B2C Delivery Address";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/customers/b2c").'"> Registered B2C </a> </li>
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/profile/$id").'">B2C User Info</a> 
        </li> <li class="breadcrumb-item active"> B2C Customers Delivery Address </li>';
        $data['mainmenu'] = "b2c";
        $data['submenu'] = "b2caddress";
        
        $customer = $this->Generic->getByFieldSingle('id', $id, $tablename='accounts'); // Get url Id
        if($customer == FALSE){redirect('jollofadmin/customers/b2b');} // If its a wrong url 
        $data['customerinfo'] = $customer;
        
        $data['address'] = $this->customer->getAccountaddressByid($id);
        //print("<pre>".print_r($this->customer->getAccountaddressByid($id),true)."</pre>");die;
        
        $data ['content_file']= 'customer-address';
        $this->load->view('jollof_admin/layout', $data);
        
    }

    public function ordersview($id=null)
    {
        $this->session_manager->validateJollofadmin('Orders::view');

        //print("<pre>".print_r($this->orderitem->getFashionOrdersByID($id,'admin'),true)."</pre>");die;
        $orderdetails = $this->orderitem->getFashionOrdersByID($id,'admin');
        if(!empty($orderdetails))
        {
            $accountid=$orderdetails[0]['accountid'];
            $data['orderinfo'] = $orderdetails;
            
            $data['pageheader'] = "B2C Orders";
            $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/customers/b2c").'"> Registered B2C </a> </li>
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/profile/$accountid").'">B2C User Info</a> </li>
            <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/orders/$accountid").'">B2C Customers Orders</a> </li> 
            <li class="breadcrumb-item active"> B2C Customers Order Details </li>';
            $data['mainmenu'] = "b2c";
            $data['submenu'] = "b2corder";
            $data ['content_file']= 'order-list-detail';
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/orders');
        }
    }
    
    public function addressform($id=null,$addid=null)
    {
        $this->session_manager->validateJollofadmin("Customers::deliveryaddress");

        $data['pageheader'] = "B2C Delivery Address Form";
        $data['breadCrumbs'] = '<li class="breadcrumb-item "> <a href="'.site_url("jollofadmin/customers/b2c").'"> Registered B2C </a> </li>
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/profile/$id").'">B2C User Info</a> </li> 
        <li class="breadcrumb-item"> <a href="'.site_url("jollofadmin/customers/deliveryaddress/$id").'"> B2C Customers Delivery Address </a> </li>
        <li class="breadcrumb-item active"> B2C Customers Delivery Address Form</li>';
        $data['mainmenu'] = "b2c";
        $data['submenu'] = "b2caddress";

        
        $data_wherestate = array(
                'status'        =>  1
            );
        $data['state']= $this->Generic->findByCondition($data_wherestate,'states', $orderbyfield='statename');

        if(isset($addid))
        {
            $customeraddinfo= $this->Generic->getByFieldSingle('id', $addid, $tablename='accountaddresses'); // Get url Id 
            $data['customeraddinfo'] = $customeraddinfo;

            $data_wherecity = array(
                    'stateid'    => $customeraddinfo['stateid'],
                    'status'        =>  1
                );
        $data['city']= $this->Generic->findByCondition($data_wherecity,'state_cities', $orderbyfield='cityname');
        }
        $data['customerinfo'] =  $this->Generic->getByFieldSingle('id', $id, $tablename='accounts');

        $data ['content_file']= 'customer-addressform';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function addressdelete($id=null)
    {
        $this->session_manager->validateJollofadmin("Customers::deliveryaddress");
    }

    public function approve($id=null)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
    }
   
    // Controller function to edit a specified user
    public function usersedit($id=null)
    {
        $data_New = array(  
                        'firstname'     => $this->input->post('firstname'),
                        'lastname'      => $this->input->post('lastname'),
                        'phone'         => $this->input->post('phone'),
                        'phone2'        => $this->input->post('phone2'),
                        'point'         => $this->input->post('point'),
                        'gender'        => $this->input->post('gender'),
                        'status'        => $this->input->post('status')
                     );
        
        $data_Where = array(  
                        'id'  => $id
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="accounts"); 
        if($insert_data)
            {
                $this->session->set_flashdata('success','Customer Info Updated');
                $this->session->set_flashdata('message', 'Customer Info Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                redirect('jollofadmin/customers/profile/'.$id);

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Customer Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
            echo json_encode($Json_resultSave);
            redirect('jollofadmin/mecustomers/profile/'.$id);
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
    
   
        
}

