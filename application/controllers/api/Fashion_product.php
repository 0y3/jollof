<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fashion_product extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                // Generate the output
		$this->output->set_content_type('application/json');
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
                
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Fashion_model');
                $this->load->helper('text');
	}
	
	public function index()
	{       
            // Set response data
		$data['meta'] = array('message'=>"Welcome to the Jollof Fashion API.", 'status'=>0);
		$data['data'] = array(
				'version'=> "1.0.0-Prometheus",
				'name'=> "Jollof API Engine",
				'author'=> "Stakle Solutions Limited",
				'url'=> urlencode("http://www.stakle.com"
                                    )
		);
		//$data  = array($data);
		$Json_result = json_encode($data);
		// Generate the output
		$this->output->set_content_type('application/json');
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
		// Set the user's output
		$this->output->set_output($Json_result);
                
            
                
                
	}
        
        public function nav() 
        {
            
            $nav = $this->Fashion_model->_get_parent_nav_by_cate();
            
            $data['meta'] = array('status'=>1);
            $data['nav'] = $nav;

            //$data  = array($data);
            $Json_result = json_encode($data);
            $this->output->set_output($Json_result);
            
        }
        public function allproduct()
	{   
            
            $allproduct= $this->Fashion_model->_allproduct_bycat($by_catid=FALSE);
            
            $data['meta'] = array('status'=>1);
            $data['allproduct'] = $allproduct;

            //$data  = array($data);
            $Json_result = json_encode($data);
            $this->output->set_output($Json_result);
                
            
	}
        public function category()
        {
            
            $nav_slug = $this->uri->segment(4);
            $nav_submenu_slig = $this->uri->segment(5);
            
            if(isset($nav_submenu_slug))
                {
                    //$data_url = array( 'slug' =>  $nav_submenu );
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_submenu_slug); // Get url Id
                    
                    if($cat_id == TRUE)
                    {
                        $get_prd = $this->Fashion_model->_allproduct_bycat($cat_id); // Get all Product by category details
                    
                        // Prepare the output
                        $data['meta'] = array('status'=>1);
                        $data['get_prd'] = $get_prd;
                        
                        //$data  = array($data);
                        $Json_result = json_encode($data);

                    }
                    else
                    {
                        $data['meta'] = array(
                                        'message'=>"An invalid or expired Fashion Nav ID  was provided. Re-authenticate user", 
                                        'status'=>0, 
                                        "error"=>"Fashion Nav ID Not In Record"
                                            );

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }// If its a wrong url 
                   
                }
            elseif (isset($nav_slug)) 
                {   
                    
                    $cat_id = $this->Fashion_model->_getcategoryid($nav_slug);    // Get url Id
                    if($cat_id == TRUE)
                    { 
                    
                        $get_prd= $this->Fashion_model->_allproduct_bycat($cat_id); // Get all Product by category details  
                        //                
                        // Prepare the output
                        $data['meta'] = array('status'=>1);
                        $data['get_prd'] = $get_prd;

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    
                    }  
                    else
                    {
                        $data['meta'] = array(
                                        'message'=>"An invalid or expired Fashion Nav ID  was provided. Re-authenticate user", 
                                        'status'=>0, 
                                        "error"=>"Fashion Nav ID Not In Record"
                                            );

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }// If its a wrong url
                }
            else
                { 
                    $data['meta'] = array('message'=>"An invalid or expired Fashion Nav ID  was provided. Re-authenticate user", 'status'=>0, "error"=>"Invalid Restaurant ID");
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
            // Set the output
            $this->output->set_output($Json_result);
                
        }
        
        public function store()
        {
            $store = $this->uri->segment(4);
            $store_product = $this->uri->segment(5);
            
            if(isset($store_product))
                {
                    $store_id = $this->Fashion_model->_getproductid($store_product); // Get url Id
                    if($store_id == TRUE)
                    {
                        $get_prd = $this->Fashion_model->_getproductdetails_byid($store_id); // Get all Product by category details
                        
                        // Prepare the output
                        $data['meta'] = array('status'=>1);
                        $data['store_url']=$store;
                        $data['store_prd'] = $get_prd;

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                       
                    } 
                    else
                    {
                        $data['meta'] = array(
                                        'message'=>"An invalid or expired Fashion Store Product ID  was provided. Re-authenticate user", 
                                        'status'=>0, 
                                        "error"=>"Fashion Store Product ID Not In Record"
                                            );

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }// If its a wrong url 
                   
                }
            elseif (isset($store)) 
                {   
                    
                    $store_id = $this->Fashion_model->_getstoreid($store); // Get url Id
                    if($store_id == TRUE)
                    {
                        
                        $store_details = $this->Fashion_model->get_restaurant_info($store_id);
                        
                        
                        $data['meta'] = array('status'=>1);
                        $data['store_nav'] = $this->Fashion_model->_allcat_bystore_navcount($store_id);
                        $data['store_prd'] = $this->Fashion_model->_allproduct_bystore($cat_id=FALSE,$store_id);
                        $data['get_prd'] = $store_id;

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }
                    else
                    {
                        $data['meta'] = array(
                                        'message'=>"An invalid or expired Fashion Store  was provided. Re-authenticate user", 
                                        'status'=>0, 
                                        "error"=>"Fashion Store Not In Record"
                                            );

                        //$data  = array($data);
                        $Json_result = json_encode($data);
                    }// If its a wrong url 
                    
                    
                }
            else
                { 
                    $data['meta'] = array('message'=>"An invalid or expired Fashion Store ID  was provided. Re-authenticate user", 'status'=>0, "error"=>"Invalid Restaurant ID");
                    
                    //$data  = array($data);
                    $Json_result = json_encode($data);
                }
                // Set the output
            $this->output->set_output($Json_result);
        }
        
	public function order_form()
	{   
            $product_id = $this->uri->segment(3);
            
            $data['product'] = $this->Restaurants_model->get_prd_where($product_id);
            $data['product_list'] = $this->Restaurants_model->get_product_list($product_id); // call addition product that can be added to menus
            //print("<pre>".print_r($data_restaurant,true)."</pre>");
            //die;
            $data ['icon']= 'jol_1.ico';
            $this->load->view('oye_mainpage_v/order_form', $data);
	}
	
        
	
}
