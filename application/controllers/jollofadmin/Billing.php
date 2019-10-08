<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('restaurant');
        $this->load->model('orderitem');
        $this->load->model('order');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->helper('text');
	}

	public function index($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " B2B's Billing ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B Billing</li>';
        $data['mainmenu'] = "billing";
        $data['submenu'] = "billingmanagement";
        
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
        
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/billing/index/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'billing-list';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function billingreport($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

         // Set the initial page data
        $data['pageheader'] = " B2B's Billing Report ";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">B2B Billing Report</li>';
        $data['mainmenu'] = "billing";
        $data['submenu'] = "billingreport";
        
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
        $data['merchants'] = $this->restaurant->getBilling($query_params,  $page);
        // Get record count for pagination
        $all_count = $this->restaurant->getBillingCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->restaurant->getBilling($query_params,  $page),true)."</pre>");die;

        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/billing/billingreport/$existing_search");
        $config['total_rows'] = $all_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'billing-listreport';
        $this->load->view('jollof_admin/layout', $data);
    }

    public function billingreportview($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin('Billing::billingreport');
        
        $data['pageheader'] = " B2B's Billing Report Orders";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/billing/billingreport").'">B2B Billing Report</a></li> <li class="breadcrumb-item active">B2B Billing Report Orders</li>';
        $data['mainmenu'] = "billing";
        $data['submenu'] = "billingreport";
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted

        $filterparams['restaurantid'] = $this->input->post('id');
        $filterparams['orderstatus'] = 4;
        $filterparams['orderlistdetails_startdate'] = $this->input->post('orderlistdetails_startdate');
        $filterparams['orderlistdetails_enddate'] = $this->input->post('orderlistdetails_enddate');
        if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
        {
            // Get all data from the search form
            $filterparams = $this->input->post();
             $filterparams['restaurantid'] = $this->input->post('id');
            $filterparams['orderstatus'] = 4;
            $filterparams['orderlistdetails_startdate'] = $this->input->post('orderlistdetails_startdate');
            $filterparams['orderlistdetails_enddate'] = $this->input->post('orderlistdetails_enddate');
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
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($query_params,true)."</pre>");//die;
        
        //print("<pre>".print_r($this->orderitem->getFashionCuisineOrders($query_params, 1, $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/billing/billingreportview/$existing_search");
        $config['total_rows'] = $all_order_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'billing-listorder';
        $this->load->view('jollof_admin/layout', $data);

    }

    public function deliveringcharges($existing_search=0, $page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);

        // Set the initial page data
        $data['pageheader'] = "Delivering Charges Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Delivering Charges</li>';
        $data['mainmenu'] = "billing";
        $data['submenu'] = "deliveringcharges";
        
        $filterparams = array();
        $query_params = array();
        // Process filter if any was posted
            
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
        $data['location'] = $this->restaurant->getDeliveryCharges($query_params,  $page);
        // Get record count for pagination
        $all_location_count = $this->restaurant->getDeliveryChargesCount($query_params);
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($order_params,true)."</pre>");//die;

        $data_ = array(
                'status'    =>  1,
                'isdeleted' => 0
            );
        $data['allCity']  =  $this->Generic->findByCondition($data_,'state_cities', $orderbyfield='cityname');
        $data['allState'] =  $this->Generic->findByCondition($data_,'states', $orderbyfield='statename');
        
        //print("<pre>".print_r($this->restaurant->getDeliveryCharges($query_params,  $page),true)."</pre>");die;
        // load pagenation details
        $this->load->library('pagination');
        $config['base_url'] = site_url("jollofadmin/billing/deliveringcharges/$existing_search");
        $config['total_rows'] = $all_location_count;
        $config['per_page'] = '25';
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagenation'] = $this->pagination->create_links();
        
        $data ['content_file']= 'billing-delivering';
        $this->load->view('jollof_admin/layout', $data);
        
    }

    public function billingedit($id=null)
    {   
        
        $data = $_POST["data"];
        $id = $_POST["id"];
        $type = $_POST["type"];

        if($type=='per')
        {
            $update = array(  'percharge'  =>  $data );
        }
        elseif ($type=='perstatus')
        {
            $update = array(  'perchargestatus'  =>  $data );
        }

        $save_data =$this->Generic->edit($update, $id, $tablename="restaurants");

        if($save_data) 
        {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'B2B Billing Updated');
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => 'success'
                                        );
                echo json_encode($Json_resultSave);
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Updated B2B Billing');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
        }

    }

    public function add($id=null)
    {

        $this->session_manager->validateJollofadmin(__METHOD__);

        $tablecode = 'TBR-'.$this->utility->generate_random_string(12);
        $data_merge = array(
                    'tablecode'     => $tablecode,
                    'requeststatus' => 1,
                    'status'        =>  1
                );

        $data_update = $this->Generic->edit($data_merge, $id , $tablename="tablereservations");

        if($data_update)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Table Reservations Accepted');
            $Json_resultSave = array ('status' => '1');
            redirect('/jollofadmin/tablereservation', 'refresh');

        } 
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated The Table Reservations ');
            $Json_resultSave = array ('status' => '0');
            redirect('/jollofadmin/tablereservation', 'refresh');

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

