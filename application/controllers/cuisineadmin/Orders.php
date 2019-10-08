<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('orderitem');
        $this->load->model('utility');
        $this->load->model('order');
        $this->load->model('user');
        $this->load->helper('url');
	}
	
	public function index($status="all", $existing_search=0, $page=0)
	{
        

	    // Validate that the user has access to this controller
	    $this->session_manager->validateCuisine("Admin::order");
        
	    // Set the initial page data
	    $data['pageheader'] = "Orders Management";
	    $data['breadCrumbs'] = '<li class="breadcrumb-item active">Orders</li>';
	    $data['mainmenu'] = "orders";
	    
	    $filterparams = array();
	    $query_params = array();
	    // Process filter if any was posted
            
	    if(($this->input->post() && $existing_search == 0)|| ($this->input->get() && $existing_search == 0))
	    {
	        // Get all data from the search form
	        $filterparams = $this->input->post();
            if($this->input->get())
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
	    $data['orderitems'] = $this->orderitem->getFashionOrders($query_params, 1, $page);
	    // Get record count for pagination
	    $all_order_count = $this->orderitem->getFashionOrdersCount($query_params, 1);
	    
	    // Load stats
	    $order_params = $query_params;
        //print("<pre>".print_r($order_params,true)."</pre>");//die;
	    
	    $order_params['orderstatus'] = 1; // this is to get total pending order count
        $data['pending'] = $this->orderitem->getFashionOrdersCount($order_params,1);
        
        $order_params['orderstatus'] = 2; // this is to get total orders still in processing count
        $data['processing'] = $this->orderitem->getFashionOrdersCount($order_params,1);
        
        $order_params['orderstatus'] = 3; // this is to get total pending order count
        $data['delivery']  = $this->orderitem->getFashionOrdersCount($order_params,1);
        
        $order_params['orderstatus'] = 4; // this is to get total delivered order count
        $data['delivered']  = $this->orderitem->getFashionOrdersCount($order_params,1);
        
        $order_params['orderstatus'] = 5; // this is to get total cancelled order count
        $data['canceled']  = $this->orderitem->getFashionOrdersCount($order_params,1);
        
        $data['allorder']  = $this->orderitem->getFashionOrdersCount($query=array(),1);
	    
            
        // load pagenation details
	    $this->load->library('pagination');
	    $config['base_url'] = site_url("cuisineadmin/orders/index/$existing_search");
	    $config['total_rows'] = $all_order_count;
	    $config['per_page'] = '25';
	    $config['uri_segment'] = 5;
	    $this->pagination->initialize($config);
	    $data['pagenation'] = $this->pagination->create_links();
	    
	    $data ['content_file']= 'order-list';
	    $this->load->view('cuisine_admin/layout', $data);
	    
	}
	
	// Controller function to view a selected order details
    public function view($id=null)
    {
        

        $this->session_manager->validateCuisine("Admin::order_products");
        
        //$query_param = array('id'=>$id);
        //$product = $this->orderitem->getFashionOrdersByID($query_param);
        
        //print("<pre>".print_r($this->orderitem->getFashionOrdersByID($id,1),true)."</pre>");die;
        $data['orderinfo'] = $this->orderitem->getFashionOrdersByID($id,1);
        
        $data['pageheader'] = "Order Full Details";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("cuisineadmin/orders").'">Orders</a></li> <li class="breadcrumb-item active">Order Details</li>';
        $data['mainmenu'] = "orders";
        
        $data ['content_file']= 'order-list-detail';
        $this->load->view('cuisine_admin/layout', $data);
    }
    public function cancel_orderform() 
    {
        
        
        $this->session_manager->validateCuisine('Restaurant_admin::cancel_orderform');
        $data['data_id']   = $_POST["data_id"];
        $data['data_orderid']   = $_POST["data_order"];


        //$data_subcate=$this->Fashion_model->get_subcategory_details($_POST["data_id"]);

        //print("<pre>".print_r($data_subcate[0]->categoryname,true)."</pre>");die;

        $this->load->view('cuisine_admin/cancel_orderform',$data);
    }
    public function update_orderflow() 
    {
        $order_status = $_POST["order"];
        $ord_id = $_POST["ord_id"];

        if($order_status == "pro")
        {
            $method='Admin::rest_accept';
            $order_status =2; 
        }
        elseif ($order_status == "del") 
        {
            $method='Admin::rest_move_disperse';
            $order_status =3;
        }
        elseif ($order_status == "can") 
        {
            $method='Restaurant_admin::cancel_orderform';
            $order_status =5;
        }
        
        //$check=$this->session_manager->hasPermission($method);
        
        if($this->session_manager->hasPermission($method))
        {
            $data_update = $this->orderitem->_updateorderflow($order_status, $ord_id);

            if($data_update)
            {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Product Order Updated');
                $Json_resultSave = array (
                                        'status' => '1',
                                        );
               // echo json_encode($Json_resultSave);

            } 
            else
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Updated Product Order');
                $Json_resultSave = array (
                                        'status' => '0',
                                        );
                //echo json_encode($Json_resultSave);

            }
        }
        else
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'YOU DO NOT HAVE PERMISSION TO ACCESS ON THIS SERVER');
            $Json_resultSave = array (
                                    'status' => 'accesserror',
                                    );
            //echo json_encode($Json_resultSave);

        }
    }
}
