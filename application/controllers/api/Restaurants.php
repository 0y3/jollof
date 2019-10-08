<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                // Generate the output
		$this->output->set_content_type('application/json');
		$this->output->set_header('Access-Control-Allow-Origin: *');
		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
                
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->helper('text');
	}
	
	public function index()
	{       
            // Set response data
		$data['meta'] = array('message'=>"Welcome to the Jollof Cuisine API.", 'status'=>0);
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
        
        
        public function allrestaurant()
        {
            $resta_id=null;
            $limit=NULL;
            $get_all_resta = $this->Restaurants_model->_allrestaurants($resta_id,$limit, $loadmore =FALSE, $location_state=FALSE,$location_city=FALSE, $searchbox=FALSE);

            // Prepare the output
            $data['meta'] = array('status'=>1);
            $data['allrestaurants'] = $get_all_resta;
            
            
            //$data  = array($data);
            $Json_result = json_encode($data);

            // Generate the output
            $this->output->set_content_type('application/json');
            $this->output->set_header('Access-Control-Allow-Origin: *');
            $this->output->set_header('Cache-Control: no-cache, must-revalidate');

            // Set the output
            $this->output->set_output($Json_result);

                
        }
        
	
	public function view()
	{
            // Prepare the output
            /*$data['meta'] = array('status'=>1);
            $data['data'] = array(
                            "token"=>$token, 
                            "customerid"=>$login['id'],
                            "id"=>$login['userid'], 
                            "username"=>$username, 
                            'firstname'=>$login['firstname'], 
                            'lastname'=>$login['lastname'],
                            "email"=>$login['email'],
                            "phonenumber"=>$login['phonenumber'],
                            "businessname"=>$login['businessname']
            );
             * 
             */
            $resta_id = $this->uri->segment(4);
            $resta_id2 = $this->uri->segment(3);
            
            if (!empty($this->input->get_post('restaurantid')))
            {
                $resta_id = $this->input->get_post('restaurantid');
            }
            
            
            if(is_numeric($resta_id))
                {
                    $data['restaurantid'] = $resta_id;
                    $data_restaurant = $this->Restaurants_model->_allrestaurants($resta_id, $limit=FALSE,$start=FALSE, $loadmore =FALSE,$location_state=FALSE,$location_city=FALSE); // call restaurant details
                    if ($data_restaurant){
                            //$data['get_resta_time'] = $this->Restaurants_model->restaurant_time($resta_id); // call restaurant open and close time
                            //$resta_menu = $this->Restaurants_model->get_restaurant_category($resta_id); // call restaurant menus
                            $resta_menu = $this->Restaurants_model->get_restaurant_category_product($resta_id); // call restaurant menus
                            
                            // Prepare the output
                            $data['meta'] = array('status'=>1);
                            $data['restaurant_byid'] = $data_restaurant;
                            $data['restaurant_menu'] = $resta_menu;
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);

                            
                            
                        }
                    else
                        {
                            $data['meta'] = array(
                                            'message'=>"An invalid or expired Restaurant ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Restaurant ID Not In Record"
                                                );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);
                        }
                }
            else if(is_numeric($resta_id2))
                {
                    $data['restaurantid'] = $resta_id2;
                    $data_restaurant = $this->Restaurants_model->_allrestaurants($resta_id2); // call restaurant details
                    if ($data_restaurant){
                            //$data['get_resta_time'] = $this->Restaurants_model->restaurant_time($resta_id2); // call restaurant open and close time
                            //$resta_menu = $this->Restaurants_model->get_restaurant_category($resta_id2); // call restaurant menus
                            $resta_menu = $this->Restaurants_model->get_restaurant_category_product($resta_id);
                            
                            // Prepare the output
                            $data['meta'] = array('status'=>1);
                            $data['restaurant_byid'] = $data_restaurant;
                            $data['restaurant_menu'] = $resta_menu;
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);

                            
                            
                        }
                    else
                        {
                            $data['meta'] = array(
                                            'message'=>"An invalid or expired Restaurant ID  was provided. Re-authenticate user", 
                                            'status'=>0, 
                                            "error"=>"Restaurant ID Not In Record"
                                                );
                            
                            //$data  = array($data);
                            $Json_result = json_encode($data);
                        }
                }
                
            else
                {
                    $data['meta'] = array('message'=>"An invalid or expired Restaurant ID  was provided. Re-authenticate user", 'status'=>0, "error"=>"Invalid Restaurant ID");
                    
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
	
        public function restaurant_table() 
        {
            
            // Update the Restaurant Table Reservation data  //
            $data_New = array(  
                                'restaurantid'  =>  $_POST['restaurantid'],
                                'accountid'     =>  $_SESSION['User_id'],
                                'numguest'      =>  $_POST['guest_num'],
                                'checkindate'   =>  $_POST['date_booking'],
                                'checkintime'   =>  date("H:i:s", strtotime($_POST['time_booking'])),
                                'contactname'   =>  $_POST["cont_name"],
                                'contactemail'  =>  $_POST["email"],
                                'contactphone'  =>  $_POST["cell"],
                                'contactnote'   =>  str_replace(" ", "", $_POST["note"])
                             );
            $insert_data = $this->Restaurants_model->_add_restaurant_table($data_New);// insert to db
            //print("<pre>".print_r($insert_data,true)."</pre>");
            //die;
            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => 1,
                                            'content' => 'Submitted Successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' =>  0,
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }
	
}
