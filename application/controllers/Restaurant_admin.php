<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant_admin extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Session_model');
                $this->load->model('oye/Role_assignment');
                $this->load->model('oye/Email_model'); // call in the email model class
                $this->load->helper('text');
                $this->load->helper('thumb');
                
	}
	
	public function index()
	{       
                
	}
        
        public function validate_permission($method)
        {
            $check=$this->Session_model->validate($method);
           // print("<pre>".print_r($check,true)."</pre>");die;
            if($check !="true")
            {
                redirect('restaurant-admin/Accessdenied', 'refresh');
            }
            
        }
	
	public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'restaurant')
            {
                    //$this->index(); 
                    redirect('restaurant-admin/login', 'refresh');	
            }
		
	}
        
        public function generate_random_string($length)
        {
            $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $randomString = '';
            for($i = 0; $i < $length; $i++){
                $randomString .= $characters[random_int(0,strlen($characters) - 1 )];
            }
            return $randomString;
            //echo $randomString;
        }
    
        public function statusupdate()
	{   
            $this->check_Loginin();
            
            $status_id = $_POST["status"];
            $prd_id = $_POST["prd_id"];
            $save_status = $this->Restaurant_admin_model->_update_status($prd_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$prd_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-product_id="'.$prd_id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($status_id == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';

                    echo json_encode($status);
                    exit();
                }

	}
        
        public function quickproduct_view()
	{   
            $this->check_Loginin();
            
            $prd_id = $_POST["id"];
            
            $data['product'] = $this->Restaurants_model->get_prd_where($prd_id);
            $data['product_list'] = $this->Restaurants_model->get_product_list($prd_id); // call addition product that can be added to menus
            //print("<pre>".print_r($data_restaurant,true)."</pre>");
            //die;
            //$data ['icon']= 'jol_1.ico';
            //$this->load->view('oye_mainpage_v/order_form', $data);
            
            $this->load->view('restaurant_admin/product_quickview',$data);
	}
        
        public function save_product() 
        {
            $this->check_Loginin();
            
            // save the new Product data  table //
            
            $check=0;
            if(isset($_POST["product_status"]))
            {
               $check=1; 
            }
            
            /*
             * 
            $productnameArr  = $_POST['addproduct_name'];
            $productpriceArr = $_POST['addproduct_price'];
            
                if(!empty($productnameArr) && !empty($productpriceArr))
                {
                    for($i = 0; $i < count($productnameArr); $i++){
                        if(!empty($productnameArr[$i]) && !empty($productpriceArr[$i]))
                        {
                            echo "product name  $productnameArr[$i] price is $productpriceArr[$i] ";
                        }
                    }
                }
                die;
               
             * 
             */
            
            
            /*
             * Without the cropbox js Pluging
             * 
             *
            
            if (!empty($_FILES['Uplodefile']['name']) )
                {
                    $file_name = "Uplodefile";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/uploads/rest_prod/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '4096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");
                            //die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'error' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                         
                       
                    // data to save in db
                    // 
                    //$file_extn = strtolower(end(explode('.',$_FILES['Uplodefile']['name']))); // geting the extention file 
                    $exploded = explode('.',$_FILES['Uplodefile']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_New = array(  
                                        'restaurantid'  =>  $_SESSION['rest_id'],
                                        'categoryid'    =>  $_POST["product_category"],
                                        'productname'   =>  $_POST["product_name"],
                                        'productprice'  =>  $_POST["product_price"],
                                        'productdesc'   =>  $_POST["product_desc"],
                                        'productimage'  =>  $newname.'.'.$file_extn, // adding the Encryp name and the extention file 2gether
                                        'status'        =>  $check
                                     );
                }
            else 
                {          
                    
                    $data_New = array(  
                                        'restaurantid'  =>  $_SESSION['rest_id'],
                                        'categoryid'    =>  $_POST["product_category"],
                                        'productname'   =>  $_POST["product_name"],
                                        'productprice'  =>  $_POST["product_price"],
                                        'productdesc'   =>  $_POST["product_desc"],
                                        //'productimage'  =>  $img_name,
                                        'status'        =>  $check
                                     );
                }
             * 
             */
            
            
            //Using cropping tools 
            
                $cropimg_data = $_POST['cropimg'];
                // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array1 = explode(";", $cropimg_data);
                // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
                // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg = base64_decode($cropimg_remove_array2[1]);
                
                
                $img_name = $_SESSION['rest_id'].'_'.time(). '.png';	 // Random Encryp new name save to app

                $dir_to_save = "./assets/uploads/rest_prod/";
                
                file_put_contents($dir_to_save.$img_name, $cropimg);

                $data_New = array(  
                                        'restaurantid'  =>  $_SESSION['rest_id'],
                                        'categoryid'    =>  $_POST["product_category"],
                                        'productname'   =>  $_POST["product_name"],
                                        'productprice'  =>  $_POST["product_price"],
                                        'productdesc'   =>  $_POST["product_desc"],
                                        'productimage'  =>  $img_name,
                                        'status'        =>  $check
                                     );
                $insert_data = $this->Restaurant_admin_model->_save_product($data_New, $check);// insert to db
                
                
                
                if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            
        }
        
        public function update_restaurant_data() 
        {
            $this->check_Loginin();
            // Update the Restaurant data  //
           
            
            if (!empty($_FILES['r_logo']['name']) )
                {
                    $file_name = "r_logo";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/uploads/rest_logo/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");
                            //die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                         
                       
                    // data to save in db
                    // 
                    $exploded = explode('.',$_FILES['r_logo']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_New = array(  
                                        'companyname'   =>  $_POST['r_name'],
                                        'companydesc'   =>  $_POST["r_desc"],
                                        'minorder'      =>  $_POST["r_minorder"],
                                        'deliverytime'  =>  $_POST["del_time"],
                                        'logo'           =>  $newname.'.'.$file_extn // adding the Encryp name and the extention file 2gether
                                     );
                }
            else 
                {          
                    
                    $data_New = array(  
                                        'companyname'   =>  $_POST['r_name'],
                                        'companydesc'   =>  $_POST["r_desc"],
                                        'minorder'      =>  $_POST["r_minorder"],
                                        'deliverytime'  =>  $_POST["del_time"]
                                     );
                }
                $insert_data = $this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db
                
                if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => 'Update successfull...'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
                else 
                {
                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'There was a problem!! Pls Try Again.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
            
        }
        public function update_restaurant_banner() 
        {
            $this->check_Loginin();
            if (!empty($_FILES['r_banner']['name']) )
                {
                    $file_name = "r_banner";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_banner'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/uploads/rest_logo/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");
                            //die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                         
                       
                    // data to save in db
                    // 
                    $exploded = explode('.',$_FILES['r_banner']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_New = array(  
                                        'banner'           =>  $newname.'.'.$file_extn // adding the Encryp name and the extention file 2gether
                                     );
                }
                $insert_data = $this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db
                
                if($insert_data) 
                {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                'content' => 'Update successfull...'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
                else 
                {
                        $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => 'There was a problem!! Pls Try Again.....'
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                }
        }
        
        public function update_location_data() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $data_New = array(  
                                'address'=>  $_POST['r_add'],
                                'stateid'=>  $_POST["r_state"],
                                'cityid' =>  $_POST["r_city"],
                                'latitude'     =>  $_POST["latitude"],
                                'longitude'    =>  $_POST["longitude"],
                                'email'  =>  $_POST["r_email"],
                                'phone'  =>  $_POST["cell1"],
                                'phone2' =>  $_POST["cell2"]
                             );
            $insert_data = $this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_time_data() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $mon_check=1; $tue_check=1; $wed_check=1; $thu_check=1; $fri_check=1; $sat_check=1; $sun_check=1;
            $data = $this->input->post('dayof');
            
           foreach ($data as $key => $value)
                {
                    //echo "Index {$key}'s value is {$value}.";
                    if($value == 'mon_n')  {  $mon_check=0; }
                    else if($value == 'tue_n'){$tue_check=0;}
                    else if($value == 'wed_n'){$wed_check=0;}
                    else if($value == 'thu_n'){$thu_check=0;}
                    else if($value == 'fri_n'){$fri_check=0;}
                    else if($value == 'sat_n'){$sat_check=0;}
                    else if($value == 'sun_n'){$sun_check=0;}
                }
              
            //$myTime = strtotime("08/19/2014 1:45 pm"); 
            //echo date("Y-m-d H:i:s", $myTime);
            $data_New = array(  
                                'monopen'   =>  date("H:i:s", strtotime($_POST['mon_o'])),
                                'monclose'  =>  date("H:i:s", strtotime($_POST['mon_c'])),
                                'monstatus' =>  $mon_check,
                                
                                'tueopen'   =>  date("H:i:s", strtotime($_POST['tue_o'])),
                                'tueclose'  =>  date("H:i:s", strtotime($_POST['tue_c'])),
                                'tuestatus' =>  $tue_check,
                                
                                'wedopen'   =>  date("H:i:s", strtotime($_POST['wed_o'])),
                                'wedclose'  =>  date("H:i:s", strtotime($_POST['wed_c'])),
                                'wedstatus' =>  $wed_check,
                                
                                'thuopen'   =>  date("H:i:s", strtotime($_POST['thu_o'])),
                                'thuclose'  =>  date("H:i:s", strtotime($_POST['thu_c'])),
                                'thustatus' =>  $thu_check,
                                
                                'friopen'   =>  date("H:i:s", strtotime($_POST['fri_o'])),
                                'friclose'  =>  date("H:i:s", strtotime($_POST['fri_c'])),
                                'fristatus' =>  $fri_check,
                                
                                'satopen'   =>  date("H:i:s", strtotime($_POST['sat_o'])),
                                'satclose'  =>  date("H:i:s", strtotime($_POST['sat_c'])),
                                'satstatus' =>  $sat_check,
                                
                                'sunopen'   =>  date("H:i:s", strtotime($_POST['sun_o'])),
                                'sunclose'  =>  date("H:i:s", strtotime($_POST['sun_c'])),
                                'sunstatus' =>  $sun_check
                             );

            $insert_data = $this->Restaurant_admin_model->_update_time_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_general_data() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $data_New = array(  
                                'firstname' =>  $_POST['g_firstname'],
                                'lastname'  =>  $_POST["g_lastname"],
                                //'email'     =>  $_POST["g_email"],
                                'phonenumber'=>  $_POST["g_cell"]
                             );
            $insert_data = $this->Restaurant_admin_model->_update_general_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_restaurant_status() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant status  //
            $status=0;
            if(isset($_POST["rest_status"]))
            {
               $status=1;
            }
            $data_New = array(  
                                'status'=>  $status
                             );
            $insert_data = $this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function update_restaurant_table_status() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant status  //
            $status=0;
            if(isset($_POST["rest_table_status"]))
            {
               $status=1;
            }
            
            $data_New = array(  
                                'tablereservation'=>  $status
                             );
            $insert_data = $this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Update successfull...'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        public function get_cate()
	{  
            $this->check_Loginin();
            
                $resta_id = $_SESSION['rest_id'];
                $get_data = $this->Restaurant_admin_model->_get_cate();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                     
                     
                     $cate_name = null;
                                    if($row->categoryname == 'Main Menu')
                                        {
                                            $cate_name = '&nbsp; &nbsp; &nbsp; '.$row->categoryname;
                                        }
                                    else 
                                        {
                                            $cate_name  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                                                <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->categoryname.'">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </a> &nbsp;
                                                                '.$row->categoryname.
                                                            '</div>';
                                            
                                        }
                     $sub_array[] = $cate_name;
                     
                     
                    $cate_order=null;
                                    if($row->arrangecategory == 0)
                                        {
                                            $cate_order = '&nbsp; &nbsp; &nbsp; '.$row->arrangecategory;
                                        }
                                    else 
                                        {
                                            $cate_order  = '<div class="cat_orderdiv_'.$row->id.'">  &nbsp;
                                                            <a href="javascript:void(0);" class="editorder" data-cat_id="'.$row->id.'"  data-cat_order="'.$row->arrangecategory.'">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                </a> &nbsp;
                                                                '.$row->arrangecategory.
                                                            '</div>';
                                        }
                     
                    $sub_array[] = $cate_order;
                    
                    
                    $status = '';
                        
                    if($row->categoryname == 'Main Menu')
                        {
                            $status .= '&nbsp; &nbsp; &nbsp;<span class="label label-success">Active</span>';
                        }
                    else 
                        { 
                        $status .= '
                                    <div class="statusdiv_'.$row->id.'">
                                        <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>';
                                      if($row->categorystatus == 1)
                                      {
                                          $status .= '<span class="label label-success">Active</span>';
                                      }
                                      else
                                      {
                                          $status .='<span class="label label-default">Inactive</span>';
                                      }
                        
                        }
                        
                        $status .='<div>';
                        
                     $sub_array[] = $status;
                     
                    if($row->categoryname == 'Main Menu')
                        {
                            $action = null;
                        }
                    else 
                        { 
                        $action = '<div class="btn-group btn-group-xs"> 

                                        <!--  <a href="'.site_url('restaurants_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_prd" title="View" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-eye"></i></a> -->

                                        <a href="" id="'.$row->id.'" data-toggle="tooltip" title="Delete" class="jboxtooltip btn btn-xs btn-danger prd_del"><i class="fa fa-times"></i></a>

                                    </div>';
                        }
                     $sub_array[] = $action;  
                     $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_cate_all(),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_cate(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function get_state()
        {
            $get_state = $this->Restaurant_admin_model->get_allstate(); // call state
            return $get_state;
            
        }
        public function get_city_byid()
        {   $by_id = $_POST["stateid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Restaurant_admin_model->get_allcity_where($by_id); // call City by State
                //return $get_city;
                $cityopt='<select name="r_city" class="select-chosen form-control" data-placeholder=" " value="" style="width: 250px;" required="">';
                                
                foreach($get_city as $row)
                {
                    $cityopt.= '<option value="'.$row->id.'">'.$row->cityname.'</option>';
                            
                }
                $cityopt.=' </select>';
                
                echo $cityopt;
            }
            else{
                
                echo '<div id="city_div">
                        <select name="r_city" class="select-chosen" data-placeholder=" " value="" style="width: 250px;" required="">
                            <option value="">City not available</option>
                        </select>
                      </div>';
            }
        }
        
        public function new_cuisaine_cate() 
        {
            $data['get_cate'] = $this->Restaurant_admin_model->get_cuisaine_cate_option(); ;
            $this->load->view('restaurant_admin/restaurant_cate',$data);
        }
        
        public function category_save() 
        {
            $this->check_Loginin();
            
            // Update the Restaurant data  //
            $cate = $_POST['rest_cate'];
            foreach ($cate as $key => $value)
            {
                $data_New= array(  
                                'restaurantid'  =>  $_SESSION['rest_id'],
                                'cat_cusid'     =>  $value
                             );
                //$this->db->insert('product_cat_assign',$data_New3);
                $insert_data=$this->Restaurant_admin_model->_update_rest_categories($data_New);// insert to Product category db 
                
               //print("<pre>".print_r("Index {$key}'s value is {$value}.",true)."</pre>");die;
            }
            
            
                
                
                                    
            if($insert_data) 
            {
                $get_cate = $this->Restaurant_admin_model->get_cuisaine_cate_byid(); // call City by State
                //return $get_city;
                $cateopt='';    
                foreach($get_cate as $row)
                {
                    $cateopt.=   '<li id="selectError1_chzn_c_1" data-getid="'.$row->assigncat_id.'">
                                    <span> '.$row->categoryname.'</span>
                                    <a href="javascript:void(0)" id="cate_del" data-cat_id="'.$row->assigncat_id.'" data-cat_name="'.$row->categoryname.'" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip search-choice-close cate_del" rel="1"> <i class="fa fa-trash-o"></i></a>
                                </li>';
                            
                }
                
                    $Json_resultSave = array (
                                            'status'  => '1',
                                            'content' => 'Update successfull...',
                                            'html'    => $cateopt
                                            
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            else 
            {
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }
        
        public function delete_cuisaine_cate() 
        {
            $_data = $this->Restaurant_admin_model->_delete_cuisaine_cate_byid($_POST['id_']);// insert to db
            
            //print("<pre>".print_r($_POST['id_'],true)."</pre>");die;
            if($_data)
            {
                $get_cate = $this->Restaurant_admin_model->get_cuisaine_cate_byid(); // call City by State
                //return $get_city;
                $cateopt='';    
                foreach($get_cate as $row)
                {
                    $cateopt.=   '<li id="selectError1_chzn_c_1" data-getid="'.$row->assigncat_id.'">
                                    <span> '.$row->categoryname.'</span>
                                    <a href="javascript:void(0)" id="cate_del" data-cat_id="'.$row->assigncat_id.'" data-cat_name="'.$row->categoryname.'" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltipp search-choice-close cate_del" rel="1"> <i class="fa fa-trash-o"></i></a>
                                </li>';
                            
                }

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'html'    => $cateopt
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

            } 
            
        }
        
        
        public function password_change()
        {
            $this->check_Loginin();
            
            $pwd_c =   md5($_POST["oldpwd"]);
            $pwd_check= $this->Restaurant_admin_model->check_User_pwd($pwd_c);
            
            if($pwd_check)
             {
                $newpwd = md5($_POST["cfmpwd"]);
                $pwd_save = $this->Restaurant_admin_model->Update_pwd($newpwd);
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => 'Password Change .....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
            else 
             {
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'Incorrect Password.....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
             }
        }
        
        public function product_statusupdate()
	{   
            $this->check_Loginin();
            
            $status_id = $_POST["status"];
            $p_id = $_POST["p_id"];
            $save_status = $this->Restaurant_admin_model->_product_update_status($p_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$p_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$p_id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($status_id == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';

                    echo json_encode($status);
                    exit();
                }

	}
        
        public function product_nameupdate()
	{   
            $this->check_Loginin();
            
            $name = $_POST["name"];
            $p_id = $_POST["p_id"];
            $save_data = $this->Restaurant_admin_model->_product_update_name($p_id,$name); 
                
                if($save_data)
                {
                     $data_info = 
                                '<span class="p_namediv_'.$p_id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="editname" data-p_id="'.$p_id.'"  data-p_name="'.$name.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    <strong>'.$name.'</strong>
                                </span>';
                                
                                                
                    echo json_encode($data_info);
                    exit();
                }

	}
        
        public function product_priceupdate()
	{   
            $this->check_Loginin();
            
            $price = $_POST["price"];
            $p_id = $_POST["p_id"];
            $p_type = $_POST["p_type"];
            if($price == 0)
            {
                echo json_encode('');
                        exit();
            }
            else {
                $save_data = $this->Restaurant_admin_model->_product_price($p_id,$price,$p_type); 

                    if($save_data)
                    {
                         $data_info = 
                                    '<span class="p_pricediv_'.$p_id.'"> &nbsp;
                                        <a href="javascript:void(0);" class="editprice" data-p_id="'.$p_id.'" data-p_type="'.$p_type.'" data-p_price="'.$price.'">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a> &nbsp;
                                        ₦ '.$price.
                                    '</span>';
                                    

                        echo json_encode($data_info);
                        exit();
                    }
            }

	}
        
        public function product_desupdate()
	{   
            $this->check_Loginin();
            
            $name = $_POST["name"];
            $p_id = $_POST["p_id"];
            $save_data = $this->Restaurant_admin_model->_product_update_des($p_id,$name); 
                
                if($save_data)
                {
                     $data_info = 
                                '<span class="p_textdiv_'.$p_id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="edittext" data-p_id="'.$p_id.'"  data-p_name="'.$name.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    <span class="productdesc">'.$name.'</span>
                                </span>';
                     
                                                
                    echo json_encode($data_info);
                    exit();
                }

	}
        
        public function product_imgupdate()
	{   
            $this->check_Loginin();
            
            $p_id = $_POST["id"];
                    
            if (!empty($_FILES['p_displayimg']['name']) )
                {
                    $file_name = "p_displayimg";  // name of image input from the view
                    $newname = $_SESSION['rest_id'].'_'.time();	 // Random Encryp new name save to app

                    $config['upload_path'] = './assets/uploads/rest_prod/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = '1096';	
                    $config['remove_spaces']  = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $newname;
                    $config['raw_name'] = $file_name ;

                    $this->load->library('upload', $config);
                    
                    if(!$this->upload->do_upload($file_name))
                        {
                            $mssg = $this->upload->display_errors();
                            //print("<pre>".print_r($mssg,true)."</pre>");die;
                            $this->session->set_flashdata('msg_r', $mssg);
                            $Json_resultSave = array (
                                                'status' => '0',
                                                'content' => $mssg
                                                );
                            echo json_encode($Json_resultSave);
                            exit();
                        }
                         
                       
                    // data to save in db
                    // 
                    $exploded = explode('.',$_FILES['p_displayimg']['name']);
                    $file_extn = strtolower(end($exploded));
                    
                            $data_New = array(  
                                        'productimage'  =>  $newname.'.'.$file_extn // adding the Encryp name and the extention file 2gether
                                        );
                }
            $save_data = $this->Restaurant_admin_model->_product_update_img($p_id,$data_New); 
                
            if($save_data)
                {
                     $data_info = array (
                                        'status' => '1',
                                        'content' => 'Update successfull...'
                                        );
                                                
                    echo json_encode($data_info);
                    exit();
                }
            else 
                {
                        $data_info = array (
                                                'status' => '0',
                                                'content' => 'There was a problem!! Pls Try Again.....'
                                                );
                        echo json_encode($data_info);
                        exit();
                }

	}
        public function product_menudelete()
        {
            $this->check_Loginin();
            
            $p_id = $_POST["p_id"];
            $delete_data = $this->Restaurant_admin_model->_delete_mainmenu_product($p_id);
            
            if($delete_data)
              {
                    $data_info = array (
                                        'status' => '1',
                                        'content' => 'Delete successfull...'
                                        );
                                                
                    echo json_encode($data_info);
                    exit();
              }
        }
        
        public function product_submenudelete()
        {
            $this->check_Loginin();
            
            $p_id = $_POST["p_id"];
            $delete_data = $this->Restaurant_admin_model->_delete_submenu_product($p_id);
            
            if($delete_data)
              {
                    $data_info = array (
                                        'status' => '1',
                                        'content' => 'Delete successfull...'
                                        );
                                                
                    echo json_encode($data_info);
                    exit();
              }
        }
        
        
        
        
        
        
        
        
        public function cat_statusupdate()
	{   
            $this->check_Loginin();
            
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];
            $save_status = $this->Restaurant_admin_model->_cat_update_status($cat_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$cat_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$cat_id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                                  if($status_id == 1)
                                  {
                                      $status .= '<span class="label label-success">Active</span>';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label-default">Inactive</span>';
                                  }
                    $status .='<div>';

                    echo json_encode($status);
                    exit();
                }

	}
        
        
        
        
        public function cat_nameupdate()
	{   
            $this->check_Loginin();
            
            $name = $_POST["name"];
            $cat_id = $_POST["cat_id"];
            $save_data = $this->Restaurant_admin_model->_cat_update_name($cat_id,$name); 
                
                if($save_data)
                {
                     $data_info = 
                                '<div class="cat_namediv_'.$cat_id.'"> &nbsp;
                                    <a href="javascript:void(0);" class="editname" data-cat_id="'.$cat_id.'"  data-cat_name="'.$name.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$name.
                                '</div>';

                    echo json_encode($data_info);
                    exit();
                }

	}
        
        public function cat_orderupdate()
	{   
            $this->check_Loginin();
            
            $order = $_POST["order"];
            $cat_id = $_POST["cat_id"];
            if($order == 0)
            {
                echo json_encode('');
                        exit();
            }
            else {
                $save_data = $this->Restaurant_admin_model->_cat_order_name($cat_id,$order); 

                    if($save_data)
                    {
                         $data_info = 
                                    '<div class="cat_orderdiv_'.$cat_id.'"> &nbsp;
                                        <a href="javascript:void(0);" class="editname" data-cat_id="'.$cat_id.'"  data-cat_order="'.$order.'">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a> &nbsp;
                                        '.$order.
                                    '</div>';

                        echo json_encode($data_info);
                        exit();
                    }
            }

	}
        
        public function addcategory() 
        {
            $this->check_Loginin();
            
            //$data['state'] = $this->get_category();
            $this->load->view('restaurant_admin/category_add');
        }
        
        public function save_category() {
            
            $this->check_Loginin();
            
            $name_cat = $_POST["save_name"];
            $status=0;
            if(isset($_POST["cat_status"]))
            {
               $status=1; 
            }
            $rest_id = $_SESSION['rest_id'];
            
            $check_name = $this->Restaurant_admin_model->_get_cat_where($name_cat, $rest_id);
            
            if($check_name != TRUE )
                {
                      
                    $data_New = array(  
                                        'restaurantid'     =>  $rest_id,//$_SESSION['rest_id'],
                                        'categoryname'     =>  $name_cat,
                                        'categorystatus'   =>  $status
                                     );
                    
                    $save_data = $this->Restaurant_admin_model->_save_cate($data_New);

                    if($save_data)
                        {

                            $Json_resultSave = array (
                                                    'status' => '1',
                                                    );
                            echo json_encode($Json_resultSave);
                            exit();

                        } 
                }
            else
                {
                 
                $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => $name_cat.' Name Already Used.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
        }
        
        public function getnew_order()
	{  
            
                $resta_id = $_SESSION['rest_id'];
                $get_data = $this->Restaurant_admin_model->_get_order();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                     
                    
                    $sub_array[] = '<a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-md btn-default">View <i class="fa fa-eye"></i></a>';
                    $sub_array[] = $row->note;
                    $sub_array[] = $row->deliverytype;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to delivery" class="jboxtooltip ord_del btn btn-xs btn-info"><i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivery Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info"><i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning"><i class=" fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_order(),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_order(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function get_order()
	{  
            
                $resta_id = $_SESSION['rest_id'];
                $get_data = $this->Restaurant_admin_model->_get_order();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    $addmemnu = null;
                    if (!empty($row->addedmenu))
                        {
                            $addmemnu = '<a href="javascript:void(0)"  data-toggle="tooltip"  title="Product with additional Menu" class="jboxtooltip" > <i class="fa fa-plus-circle" style="color:green" ></i> </a>';
                        }
                    
                    $sub_array[] = $row->ordercode;
                    $sub_array[] = $row->productname.''. $addmemnu;
                    $sub_array[] = $row->note;
                    $sub_array[] = $row->deliverytype;
                    $sub_array[] = $row->quantity;
                    $sub_array[] = $row->price;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to delivery" class="jboxtooltip ord_del btn btn-xs btn-info"><i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivery Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info"><i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning"><i class=" fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_order(),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_order(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        public function get_table_reservation()
	{  
            
                $resta_id = $_SESSION['rest_id'];
                $get_data = $this->Restaurant_admin_model->_get_table_reservation();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     
                    $checkindate =  date('jS M \, Y ', strtotime($row->checkindate));
                    $checkintime =  date('g:i A', strtotime($row->checkintime));
                    
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                    $sub_array[] = $row->tablecode;
                    $sub_array[] = $row->contactname;
                    $sub_array[] = $checkindate.' '.$checkintime;
                    $sub_array[] = $row->contactphone;
                    $sub_array[] = $row->contactemail;
                    $sub_array[] = $row->contactnote;
                    $sub_array[] = $row->numguest;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->requeststatus == '4')
                                  {
                                      $status .= '<span class="label label-success"> Approved</span>';
                                      
                                      $action .= '';
                                  }
                                  else if($row->requeststatus == '5')
                                  {
                                      $status .= '<span class="label label-danger"> Canceled </span>';
                                      
                                      $action .= ' ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">Pending</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="table_app '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Tabel Reservation" class="jboxtooltip table_app btn btn-xs btn-success"><i class="fa fa-check"></i></a>

                                                    <a href="javascript:void(0)" id="table_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Tabel Reservation" class="jboxtooltip table_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status.''.$action;
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_table_reservation(),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_table_reservation(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function cancel_orderform() 
        {
            $check=$this->Session_model->validate(__METHOD__);
            
            if($check !="true")
            {
                $data['access_denied'] = TRUE;
            
            }
            else{ $data['access_denied'] = FALSE;}
                $data['data_id']   = $_POST["data_id"];
                $data['data_orderid']   = $_POST["data_order"];

            //$data_subcate=$this->Fashion_model->get_subcategory_details($_POST["data_id"]);

            //print("<pre>".print_r($data_subcate[0]->categoryname,true)."</pre>");die;

            $this->load->view('restaurant_admin/cancel_orderform',$data);
        }
        public function get_order_by()
	{
                
                $status_id = $this->uri->segment(3);
                $get_data = $this->Restaurant_admin_model->_get_order_by($status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                    $sub_array[] = '<a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-sm btn-default">View <i class="fa fa-eye"></i></a>';
                    
                    $get = '';
                    $action ='';
                                    
                                  if($row->status == '2')
                                  {
                                      $action .= '
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to Disperse" class="jboxtooltip ord_del btn btn-sm btn-info">Move to Disperse <i class="fa fa-road"></i></a>
                                                 ';
                                      $get .= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $get .= '<span class="label label-info">'.$row->orderstatus_desc.' <i class="fa fa-truck"></i></span>';
                                      $action .= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '4')
                                  {
                                       $get.= '<span class="label label-success">'.$row->orderstatus_desc.' <i class="fa fa-eye"></i></span>';
                                       $action.= '<span class="">'.$row->note.'</span>';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $action .= '<span class="">'.$row->cancledordercomment.'</span>';
                                      $get .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                  }
                                  else
                                  {
                                      $action .='<a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-sm btn-success">Accept Order <i class="fa fa-fast-forward"></i></a>';
                                      $get .= '
                                                <a href="'. site_url('restaurant_admin/cancel_orderform') .'" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-orderid="'.$row->ordercode.'" data-toggle="modal" data-target="#modal_cancel" data-container="modal_cancel" data-toggle="true" title="Cancel Order" class="jboxtooltip ord_can btn btn-sm btn-danger">Cancel Order <i class="fa fa-times"></i></a>
                                              ';
                                  }
                    
                    $sub_array[] = $action;
                    $sub_array[] = $get;
                    
                    
                     /*
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                     
                    $addmemnu = null;
                    if (!empty($row->addedmenu))
                        {
                            $addmemnu = '<a href="javascript:void(0)"  data-toggle="tooltip"  title="Product with additional Menu" class="jboxtooltip" > <i class="fa fa-plus-circle" style="color:green" ></i> </a>';
                        }
                    $sub_array[] = $row->ordercode;
                    $sub_array[] = $row->productname. ' '.$addmemnu;
                    $sub_array[] = $row->note;
                    $sub_array[] = $row->deliverytype;
                    $sub_array[] = $row->quantity;
                    $sub_array[] = $row->price;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to delivery" class="jboxtooltip ord_del btn btn-xs btn-info"><i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivery Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info"><i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning"><i class="fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    */
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_order_by($status_id),  
                     "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_order_by($status_id),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output); 
        }
        
        
        public function order_nav_tray() 
	{
            $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
            $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
            $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
            $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
            $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
            
            $this->load->view('restaurant_admin/order_nav',$data);
        }
        
        public function view_pending_order()
	{
            $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
            $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
            $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
            $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
            $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
            
            $this->load->view('restaurant_admin/order_pending',$data);
        }
        
        public function view_processing_order()
	{
            $data['pending']    = $this->Restaurant_admin_model->_get_pending_order();
            $data['processing'] = $this->Restaurant_admin_model->_get_processing_order();
            $data['canceled']  = $this->Restaurant_admin_model->_get_canceled_order();
            $data['delivery']  = $this->Restaurant_admin_model->_get_delivery_order();
            $data['delivered']  = $this->Restaurant_admin_model->_get_delivered_order();
            
            $this->load->view('restaurant_admin/order_processing',$data);
        }
        public function unseen_orders() {
            $data_count = $this->Restaurant_admin_model->_unseen_orders();
            
            $Json_resultSave = array (
                                            'unseen_notification' => $data_count,
                                            );
            echo json_encode($Json_resultSave);
            exit();
        }
        
        public function update_order_flow()
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
                    $method='Admin::rest_accept';
                    $order_status =5;
                }
            $check=$this->Session_model->validate($method);
            if($check =="true")
            {
                $data_update = $this->Restaurant_admin_model->_update_order_flow($order_status, $ord_id);

                if($data_update)
                    {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                );
                        echo json_encode($Json_resultSave);
                        exit();

                    } 
            }
            else
            {
                
                $Json_resultSave = array (
                                        'status' => '0',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
            
        }
        
        public function unseen_table() {
            $data_count = $this->Restaurant_admin_model->_unseen_table();
            
            $Json_resultSave = array (
                                            'unseen_notification' => $data_count,
                                            );
            echo json_encode($Json_resultSave);
            exit();
        }
        
        public function update_table_flow()
	{
            $status = $_POST["table"];
            $table_id = $_POST["table_id"];
            
            if($status == "app")
                {
                    $method='Admin::table_reservation_accept';
                    $status =4; 
                }
            elseif ($status == "can") 
                {
                    $method='Admin::table_reservation_cancel';
                    $status =5;
                }
            $check=$this->Session_model->validate($method);
            if($check =="true")
            {
                $data_update = $this->Restaurant_admin_model->_update_table_flow($status, $table_id);

                if($data_update)
                    {

                        $Json_resultSave = array (
                                                'status' => '1',
                                                );
                        echo json_encode($Json_resultSave);
                        exit();

                    } 
            }
            else
            {
                
                $Json_resultSave = array (
                                        'status' => '0',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
        }
        
        public function check_user_email()
        {
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Invalid Email</span></label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit(); 
           }  
           else  
           {    
                $data_check = array(  
                                 'email'  =>  $_POST["email"],// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
                $check_data = $this->Restaurant_admin_model->is_user_email_available($data_check);
                
                if($check_data)  
                  {  
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already Registered</label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                    //echo '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already registered</label>';  
                  }  
                else  
                  {  
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                    //echo '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>';  
                  }  
           }  
      }
      
      
        public function check_restaurant_email()
        {
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Invalid Email</span></label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                //echo '<label class="text-danger"><i class="icon_close_alt2"></i> Invalid Email</span></label>';  
           }  
           else  
           {    
                $data_check = array(  
                                 'email'  =>  $_POST["email"],// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
                $check_data = $this->Restaurant_admin_model->is_restaurant_email_available($data_check);
                $check_data2 = $this->Restaurant_admin_model->is_user_email_available($data_check);
                
                if($check_data || $check_data2)  
                  {  
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already Registered</label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                    //echo '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already registered</label>';  
                  }  
                else  
                  {  
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                    //echo '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>';  
                  }  
           }  
      }
      
      public function check_restaurant_name()
        {
                
            $data_check = array(  
                             'companyname'  =>  $_POST["name"],// adding the Encryp name and the extention file 2gether
                             'isdeleted' =>  0
                             );
            $check_data = $this->Restaurant_admin_model->is_restaurant_email_available($data_check);

            if($check_data)  
              {  
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Merchant Name Already Registered</label>'
                                        );
                echo json_encode($Json_resultSave);
                exit();
                //echo '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already registered</label>';  
              }  
            else  
              {  
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => '<label class="text-success"><i class="icon_check_alt2"></i> Merchant Name Available</label>'
                                        );
                echo json_encode($Json_resultSave);
                exit();
                //echo '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>';  
              }   
      }
    public function promobanner()
    {  
            //$this->check_Loginin();
            //$status_id = $this->uri->segment(3);
            
            $promo_type = $this->uri->segment(3);
            
            $banntype = array(6,7);
            //$promo_type ="free";
            $get_data = $this->Restaurant_admin_model->_get_promobanner($banntype,$promo_type, $status_id=false);

            //print("<pre>".print_r($get_data,true)."</pre>");die;
            $sn=0;
            $data_order = array();  
            foreach($get_data as $row)  
            {  
                $sub_array = array(); 
                $sub_array[] = ++$sn;
                $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));

                $cate_order  = '<div class="cat_orderdiv_'.$row->id.'">  &nbsp;
                                            <a href="javascript:void(0);" class="editorder" data-cat_id="'.$row->id.'"  data-cat_order="'.$row->arrangeimage.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                '.$row->arrangeimage.
                                            '</div>';
                    $sub_array[] = $cate_order;

                if($row->bannertypeid == "1")
                    {
                        $folder_img= "homepage_banner";
                    }
                elseif($row->bannertypeid == "2")
                    {
                        $folder_img= "homepage_center";
                    }
                elseif($row->bannertypeid == "3")
                    {
                        $folder_img= "RestaurantPage_ads";
                    }
                elseif($row->bannertypeid == "4")
                    {
                        $folder_img= "jollofhomepage_banner";
                    }
                elseif($row->bannertypeid == "6")
                    {
                        $Name= "HomePage Banner";
                        $folder_img= 'restaurantPage_ads';
                    }
                elseif($row->bannertypeid == "7")
                    {
                        $Name= "Sidebar Slider";
                        $folder_img= "restaurantPage_ads";
                    }
                    
                $sub_array[] = '<a href="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" data-fancybox="images-preview" data-toolbar="false" data-small-btn="true" >
                                        <img class="db_prdimg" src="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" >
                                    </a>'; 

                $sub_array[] = $Name;

                $sub_array[] = $row->payment;
                
                $status ='<div class="statusdiv_'.$row->id.'">';
                $action = ' <div class="btn-group btn-group-xs">';
                /*
                if($row->status == "1")
                    {
                        $status .='<span class="label label-success"> Approved </span>';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Promo Banner" class="jboxtooltip b2b_p_can btn btn-xs btn-danger"><i class="fa fa-times"></i> Decline</a>
                                   ';
                    }
                else
                    {
                        $status .='<span class="label label_pending"> Pending </span>';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve B2B Promo Banner" class="jboxtooltip b2b_p_acc btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>
                                   ';
                    }

                $status .='<div>';
                $action .='</div>';
                
                $status = '<div class="statusdiv_'.$row->id.'">';
                $action = '<div class="btn-group btn-group-xs">';

                $status = '';
                 * 
                 */

                $status .= '<div class="statusdiv_'.$row->id.'">
                                <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>';
                        if($row->status == 1)
                        {
                            $status .= '<span class="label label-success">Active</span>';
                        }
                        else
                        {
                            $status .='<span class="label label-default">Inactive</span>';
                        }



                $status .='<div>
                            <a style=" margin-left:15px;" href="" id=" '.$row->id.'" data-toggle="tooltip" data-id="'.$row->id.'" data-name="'.$row->imagename.'" title=" Delete Slider" class="jboxtooltip ban_can btn btn-xs btn-danger">
                                Delete <i class="fa fa-times"></i>
                            </a>';

                $sub_array[] = $status;

                $sub_array[] = $status;

                $data_order[] = $sub_array;  
            } 
            //print("<pre>".print_r($data_order,true)."</pre>");die; 
            $output = array(  
                 "draw"             =>     intval($_POST["draw"]),  
                 "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_promobanner($banntype,$promo_type, $status_id=false),
                 "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_promobanner($banntype,$promo_type, $status_id=false),
                 "data"             =>     $data_order  
            );  
            echo json_encode($output);  


    }
    public function update_promobanner_status()
    {
        $status_id = $_POST["status"];
        $cat_id = $_POST["cat_id"];

       $data_update = $this->Restaurant_admin_model->_update_promobanner_status($status_id, $cat_id);

        if($data_update)
            {

                $Json_resultSave = array (
                                        'status' => '1',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            } 

    }
        
    public function update_promobanner_cate()
    {
        $order = $_POST["order"];
        $cat_id = $_POST["cat_id"];

       $data_update = $this->Restaurant_admin_model->_update_promobanner_cate($order, $cat_id);

        if($data_update)
            {

                $Json_resultSave = array (
                                        'status' => '1',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            } 

    }
    
    public function delete_promobanner() 
    {
        //rmdir($dir); //to delete directory use

        $fullpath = './assets/jollof_banners/restaurantPage_ads/';
        $picture=$_POST["_name"];
        $id=$_POST["_id"];
        $promo_or_free = "free";

        unlink($fullpath.$picture);
        $this->db->delete('img_ads', array('id' => $id));
        
        if($this->db->affected_rows() > 0)
        {
            $banner=$this->Restaurant_admin_model->_count_all_slider(6,$promo_or_free,$status=FALSE);
            $sidebar=$this->Restaurant_admin_model->_count_all_slider(7,$promo_or_free,$status=FALSE);
            
              $data_info = array (
                                  'status' => '1',
                                  'count_banner' => $banner,
                                  'count_sidebar' => $sidebar,
                                  'count_total' => $banner+$sidebar,
                                  'content' => 'Delete successfull...'
                                  );

              echo json_encode($data_info);
              exit();
        }
        //echo true;

    }
        
    public function promobanner_nav_tray() 
    {
        $this->load->view('restaurant_admin/promobanner_nav_tray');
        //print("<pre>".print_r($_SESSION,true)."</pre>");die; 
    }
    
    public function merchant_slider_new() 
    {
        $by_id= $_POST["_id"];
        $banner= $_POST["_HP"];
        $sidebar= $_POST["_SB"];
        $max_upload= $_POST["_FS"];
        $promo_or_free = "free";
        if ($by_id ==1)
        {
            $data['title_type']= 'New Slider Form';
        }
        $data['admin_info']= $this->Super_admin_model->get_admin_info();
        
        $data['banner']= $this->Restaurant_admin_model->_count_all_slider(6,$promo_or_free,$status=FALSE);//$_POST["_HP"];
        $data['sidebar']= $this->Restaurant_admin_model->_count_all_slider(7,$promo_or_free,$status=FALSE);//$_POST["_SB"];
        $data['cate'] = $this->Restaurant_admin_model->_merchant_slider_option($by_id);
        
        //print("<pre>".print_r($_SESSION,true)."</pre>");die; 
        
        $this->load->view('restaurant_admin/merchant_slider_new',$data);
    }
    public function merchantslidersave() 
    {
        $promo_or_free = "free";

        if (!empty($_FILES['slider_banner']['name']) )
            {
                if($_POST['slider_type'] == 1)
                {
                    $path='./assets/jollof_banners/homepage_banner/';
                }
                else if($_POST['slider_type'] == 2)
                {
                    $path='./assets/jollof_banners/homepage_center/';
                }
                else if($_POST['slider_type'] == 3)
                {
                    $path='./assets/jollof_banners/restaurantPage_ads/';
                }
                else if($_POST['slider_type'] == 4)
                {
                    $path='./assets/jollof_banners/jollofhomepage_banner/';
                }
                else if($_POST['slider_type'] == 6)
                {
                    $path='./assets/jollof_banners/restaurantPage_ads/';
                }
                else if($_POST['slider_type'] == 7)
                {
                    $path='./assets/jollof_banners/restaurantPage_ads/';
                }
                /*
                $file_name = "slider_banner";  // name of image input from the view
                $newname = $_SESSION['rest_id'].'_'.$this->generate_random_string(4).'_banner'.time();	 // Random Encryp new name save to app

                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '3096';	
                $config['remove_spaces']  = TRUE;
                $config['overwrite'] = TRUE;
                $config['file_name'] = $newname;
                $config['raw_name'] = $file_name ;

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload($file_name))
                {
                    $mssg = $this->upload->display_errors();
                    //print("<pre>".print_r($mssg,true)."</pre>");
                    //die;
                    $this->session->set_flashdata('msg_r', $mssg);
                    $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => $mssg
                                        );
                    echo json_encode($Json_resultSave);
                    exit();
                }
                // data to save in db
                // 
                $exploded = explode('.',$_FILES['slider_banner']['name']);
                $file_extn = strtolower(end($exploded));
                $payment="free";
                $data_New = array(  
                                'bannertypeid'  =>  $_POST['slider_type'],
                                'imagename'     => $newname.'.'.$file_extn,
                                'usertype'      => $_SESSION['Type'],
                                'userid'        => $_SESSION['rest_id'],
                                'username'      => $_SESSION['User_id'],
                                'payment'       => $payment,
                                'status'        => 1
                             );
                
                 * 
                 */
                $cropimg_data = $_POST['cropimg'];
                // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array1 = explode(";", $cropimg_data);
                // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
                // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg = base64_decode($cropimg_remove_array2[1]);
                
                
                $newname = $_SESSION['rest_id'].'_'.$this->generate_random_string(4).'_banner'.time().'.png';	 // Random Encryp new name save to app

                //$dir_to_save = "./assets/uploads/rest_prod/";
                
                file_put_contents($path.$newname, $cropimg);

                
                // data to save in db
                // 
                $payment="free";
                $data_New = array(  
                                'bannertypeid'  =>  $_POST['slider_type'],
                                'imagename'     => $newname,
                                'usertype'      => $_SESSION['Type'],
                                'userid'        => $_SESSION['rest_id'],
                                'username'      => $_SESSION['User_id'],
                                'payment'       => $payment,
                                'status'        => 1
                             );

        }
        //print("<pre>".print_r($data_New,true)."</pre>");//die;
        $insert_data = $this->Super_admin_model->_insert_cuisineslider_data($data_New);// insert to db
        if($insert_data)
            {
                $banner=$this->Restaurant_admin_model->_count_all_slider(6,$promo_or_free,$status=FALSE);
                $sidebar=$this->Restaurant_admin_model->_count_all_slider(7,$promo_or_free,$status=FALSE);
                
                $Json_resultSave = array (
                                        'status' => '1',
                                        'count_banner' => $banner,
                                        'count_sidebar' => $sidebar,
                                        'count_total' => $banner+$sidebar,
                                        'bannertype' => $_POST['slider_type'],
                                        );
                echo json_encode($Json_resultSave);
                exit();

            } 
    }
    
    public function user_table()
    {  
        //$this->check_Loginin();

        //$promo_type ="free";
        $get_data = $this->Restaurant_admin_model->_get_users();

        //print("<pre>".print_r($get_data,true)."</pre>");die;
        $sn=0;
        $data_order = array();  
        foreach($get_data as $row)  
        {  
            
                
            $sub_array = array(); 
            $sub_array[] = ++$sn;
            $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
            
            $firstname  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->firstname.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a> &nbsp;
                                '.$row->firstname.
                            '</div>';
            
            $sub_array[] = $row->firstname;
            
            
            $lastname  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->lastname.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a> &nbsp;
                                '.$row->lastname.
                            '</div>';

            $sub_array[] = $row->lastname;

            $sub_array[] = $row->email;
            
            $phonenumber  = '<div class="cat_namediv_'.$row->id.'"> &nbsp;
                                <a href="javascript:void(0);" class="editname" data-cat_id="'.$row->id.'"  data-cat_name="'.$row->phonenumber.'">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a> &nbsp;
                                '.$row->phonenumber.
                            '</div>';

            $sub_array[] = $row->phonenumber;
            
            $roleName = '<div class="statusdiv_'.$row->id.'">
                            <a href="javascript:void(0);" class="edituserrole" data-cat_id="'.$row->id.'">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>&nbsp;
                                '.$row->roleName.
                            '</div>';

            $sub_array[] = $row->roleName;

            $status ='<div class="statusdiv_'.$row->id.'">';
            $action = ' <div class="btn-groupp btn-group-xsx">';
            /*
            if($row->status == "1")
                {
                    $status .='<span class="label label-success"> Approved </span>';
                    $action .= '
                                  <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Promo Banner" class="jboxtooltip b2b_p_can btn btn-xs btn-danger"><i class="fa fa-times"></i> Decline</a>
                               ';
                }
            else
                {
                    $status .='<span class="label label_pending"> Pending </span>';
                    $action .= '
                                  <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve B2B Promo Banner" class="jboxtooltip b2b_p_acc btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>
                               ';
                }

            $status .='<div>';
            $action .='</div>';

            $status = '<div class="statusdiv_'.$row->id.'">';
            $action = '<div class="btn-group btn-group-xs">';

            $status = '';
             * 
             */
            
            if($row->id != $_SESSION['User_id']){
                
            $status .= '<div class="statusdiv_'.$row->id.'">
                            <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>';
                    if($row->status == 1)
                    {
                        $status .= '<span class="label label-success">Active</span>';
                    }
                    else
                    {
                        $status .='<span class="label label-default">Inactive</span>';
                    }



            $status .='<div>
                        <!--<a style=" margin-left:15px;" href="" id=" '.$row->id.'" data-toggle="tooltip" data-id="'.$row->id.'" data-name="'.$row->firstname.'" title=" Delete User" class="jboxtooltip ban_can btn btn-xs btn-danger">
                            Delete User <i class="fa fa-times"></i>
                        </a>-->';
            
             $action .='
                        <a href="" id="'.$row->id.'" data-user_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="" title="Resend Activation Email" class=" btn btn-xs btn-default send_email">Re-Send Activation Email <i class="fa fa-envelope-o"></i></a>
                        <a href="'.site_url('restaurant_admin/loaduser/'.$row->id).'" id="'.$row->id.'" data-user_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" title="Edit User" class=" btn btn-xs btn-default prd_view">Edit <i class="fa fa-eye"></i></a>

                        <a href="" id="'.$row->id.'" data-toggle="tooltip" data-id="'.$row->id.'" data-name="'.$row->firstname.' ' .$row->lastname.'" title="Delete" class=" btn btn-xs btn-danger user_del">Delete <i class="fa fa-times"></i></a>
                            ';
            }
            else
                {
                    
                    if($row->status == 1)
                    {
                        $status .= '<span style=" margin-left:15px;" class="label label-success">Active</span>';
                    }
                    else
                    {
                        $status .='<span style=" margin-left:15px;" class="label label-default">Inactive</span>';
                    }



                    $status .='<div>';
                }
            $action .='<div>';
            
            
            $sub_array[] = $status;
            $sub_array[] = $action;
            $data_order[] = $sub_array;  
            
            //}
        } 
        //print("<pre>".print_r($data_order,true)."</pre>");die; 
        $output = array(  
             "draw"             =>     intval($_POST["draw"]),  
             "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_users(),
             "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_users(),
             "data"             =>     $data_order  
        );  
        echo json_encode($output);  


    }
    
    public function loaduser() 
    {
        
        $data['cate'] = $this->Restaurant_admin_model->_user_role_rest($_SESSION['rest_id']);
        
        if(!empty($this->uri->segment(3)) )
        {
            
            $by_id = $this->uri->segment(3);
            
                $data['title_type']= 'Edit Users Form';
                $data['userinfo'] = $this->Restaurant_admin_model->get_user_info_byid($by_id);
                //print("<pre>".print_r($this->Restaurant_admin_model->get_user_info_byid($by_id),true)."</pre>");
        }
        else
        {
            $data['title_type']= 'New Users Form';
            //print("<pre>".print_r($_SESSION,true)."</pre>");die; 
        }
        $this->load->view('restaurant_admin/user_new',$data);
    }
    public function resendactivationemail()
    {
        if(!empty($this->uri->segment(3)) )
        {
            
            $by_id = $_POST['id'];
            
            $userinfo = $this->Restaurant_admin_model->get_user_info_byid($by_id);//get user details
            
            $restinfo=$this->Restaurant_admin_model->get_restaurant_info_byid();//get restaurant details
            
            
            // Generat new token //
            
            $token=$this->generate_random_string(15);
            
            $data_token = array(
                        'confirmemail'=> $token,
                        'password'=> '',
                        'forcepasswordchange'=> 0
                        );
            
            $this->Restaurant_admin_model->newtoken($data_token,$by_id);
        
            // send the customer an email
            $site_email ='segun@stakle.com';
            $logo = 'jol.png';
            $sendemail=$this->Email_model->send_restaurant_User_email($userinfo->firstname, $userinfo->lastname, $userinfo->email, $site_email, $logo, $restinfo->companyname,$token );
            //print("<pre>".print_r($this->Restaurant_admin_model->get_user_info_byid($by_id),true)."</pre>");
            if($sendemail)
            {
                $Json_resultSave = array (
                                      'status' => '0',
                                      'content' => 'Activation Email Error'
                                      );
                echo json_encode($Json_resultSave);
                exit();
            }
            else
            {
                
              $Json_resultSave = array (
                                  'status' => '1',
                                  'content' => 'Activation Email Sent '
                                  );
                echo json_encode($Json_resultSave);
                exit();
            }
            
        }
        else
        {
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Activation Email Error'
                                  );
          echo json_encode($Json_resultSave);
          exit();
        }
    }
    public function saveuser()
    {
        // save the new user data  table //
        $time = date('Y-m-d H:i:s');
        $tim  = strtotime($time);
        $token= do_hash($this->input->post('useremail').$tim);
        
        $data_check = array(  
                                 'email'  =>  $_POST["useremail"],// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
        $check_data = $this->Restaurant_admin_model->is_user_email_available($data_check);

        if($check_data)  
        {  
          $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Email Already Registered'
                                  );
          echo json_encode($Json_resultSave);
          exit();
        }
        else
        {
            $data_New = array(  
                                    'restaurantid'  =>  $_SESSION['rest_id'],
                                    'userroleid'    => $_POST['userrole'],
                                    'firstname'     => $_POST['firstname'],
                                    'lastname'      => $_POST['lastname'],
                                    'email'         => $_POST['useremail'],
                                    'phonenumber'   => $_POST['phone'],
                                    'confirmemail'  => $token,
                                    'forcepasswordchange'   => 0,
                                    'status'        => 1
                                 );

            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            $insert_data = $this->Restaurant_admin_model->_insertnewuser($data_New);// insert to db

            if($insert_data)
            {
                $rest_info=$this->Restaurant_admin_model->get_restaurant_info_byid();
                // send the customer an email
                $site_email ='segun@stakle.com';
                $logo = 'jol.png';
                $this->Email_model->send_restaurant_User_email($this->input->post('firstname'), $this->input->post('lastname'), $_POST['useremail'], $site_email, $logo, $rest_info->companyname,$token );

                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
            else 
            {
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }
    }
    
    public function update_user_status()
    {
        $status_id = $_POST["status"];
        $cat_id = $_POST["cat_id"];

       $data_update = $this->Restaurant_admin_model->_update_user_status($status_id, $cat_id);

        if($data_update)
            {

                $Json_resultSave = array (
                                        'status' => '1',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            } 

    }
    public function updateuser()
    {
        $data_New = array(  
                                'restaurantid'  =>  $_SESSION['rest_id'],
                                'userroleid'    => $_POST['userrole'],
                                'firstname'     => $_POST['firstname'],
                                'lastname'      => $_POST['lastname'],
                                //'email'         => $_POST['useremail'],
                                'phonenumber'   => $_POST['phone']
                             );
        
        //print("<pre>".print_r($data_New,true)."</pre>");//die;
        $insert_data = $this->Restaurant_admin_model->_update_user_data($data_New);// insert to db
        if($insert_data)
            {
                
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
        else {
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
    }
    
    public function deleteuser()
    {
        $by_id = $_POST["_id"];
        $_data = $this->Fashion_model->_delete_user($by_id);// delete to db
        if($_data)
            {

                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
        else {
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
    }
    
    public function userrole_table()
    {  
        //$this->check_Loginin();

        //$promo_type ="free";
        $get_data = $this->Restaurant_admin_model->_get_usersrole();

        //print("<pre>".print_r($get_data,true)."</pre>");die;
        $sn=0;
        $data_order = array();  
        foreach($get_data as $row)  
        {  
            
                
            $sub_array = array(); 
            $sub_array[] = ++$sn;
            $sub_array[] ='<b>'.$row->roleName.'</b>';
            
            $status ='<div class="statusdiv_'.$row->id.'">';
            $action = ' <div class="btn-groupp btn-group-xsx">';
            
            
            if($row->roleName == 'Super Admin'){  
                
                
                if($row->status == 1)
                {
                    $status .= '<span style=" margin-left:15px;" class="label label-success">Active</span>';
                }
                else
                {
                    $status .='<span style=" margin-left:15px;" class="label label-default">Inactive</span>';
                }
                $action .='';
            }  
            else {
            $status .= '<div class="statusdiv_'.$row->id.'">
                            <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>';
                    if($row->status == 1)
                    {
                        $status .= '<span class="label label-success">Active</span>';
                    }
                    else
                    {
                        $status .='<span class="label label-default">Inactive</span>';
                    }
            $action .='
                        <a href="'.site_url('restaurant_admin/loaduserrole/'.$row->id).'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" title=" View Permissions" class=" btn btn-xs btn-default role_Per"> <i class="fa fa-lock"></i> Permissions</a>
                            ';
            }
            $status .='<div>';
            $action .='<div>';
            
            
            $sub_array[] = $status;
            $sub_array[] = $action;
            $data_order[] = $sub_array;  
            
            //}
        } 
        //print("<pre>".print_r($data_order,true)."</pre>");die; 
        $output = array(  
             "draw"             =>     intval($_POST["draw"]),  
             "recordsTotal"     =>     $this->Restaurant_admin_model->_get_all_usersrole(),
             "recordsFiltered"  =>     $this->Restaurant_admin_model->_get_filtered_data_usersrole(),
             "data"             =>     $data_order  
        );  
        echo json_encode($output);  


    }
    public function loaduserrole() 
    {
        if(!empty($this->uri->segment(3)) )
        {
            $by_id = $this->uri->segment(3);
            //$sitetype=1;
                $data['title_type']= 'Edit Users Role Form';
                $data['roleinfo'] = $this->Restaurant_admin_model->get_userrole_info_byid($by_id);
                $data['role_assign'] = $this->Restaurant_admin_model->get_role_assign_byid($by_id,$_SESSION['microType_id']);
                //print("<pre>".print_r($this->Restaurant_admin_model->get_role_assign_byid($by_id),true)."</pre>");//die;
        }
        else
        {
        
            $data['title_type']= 'New Users Role Form';
        }
        //print("<pre>".print_r($this->Restaurant_admin_model->_get_modules($sitetype),true)."</pre>");die;
        $sitetype= 1;//cuisine
        $data['cate'] = $this->Restaurant_admin_model->_get_modules($sitetype);
        $this->load->view('restaurant_admin/userroles_new',$data);
    }
    public function saveuserroles()
    {
        $data_New = array(  
                                'roleName' => $_POST['userrolename'],
                                'roleFor'  =>  $_SESSION['rest_id'],
                                'status'   => 1
                             );
        
        //print("<pre>".print_r($data_New,true)."</pre>");//die;
        $insert_dataID = $this->Restaurant_admin_model->_insertnewuserroles($data_New);// insert to db
        
        $id_module = $this->input->post('module[]');
 
	$id_count = count($id_module);
	for ($i=0; $i<$id_count; $i++)
        {
            $data = array(
                        'roleID' => $insert_dataID,
                        'moduleID' => $id_module[$i]
                        );
            
           $insert_data= $this->db->insert('role_assignments',$data);
	}
        if($insert_data)
            {
                
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
        else {
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
    }
    public function updateuserroles()
    {
        $data_New = array(  
                            'roleName'     => $_POST['userrolename']
                         );
        
        $this->Restaurant_admin_model->_update_userroles_data($data_New);// insert to db
        
        $this->db->where('roleID', $_POST['userrolenameid']);
            $this->db->where('jollofsitetypeid', 1);
        $query = $this->db->delete('role_assignments'); // delete all recode first then save a new one.
        
        $id_module = $this->input->post('module[]');
	$id_count = count($id_module);
	for ($i=0; $i<$id_count; $i++)
        {
            
            $data = array(
                        'roleID' => $_POST['userrolenameid'],
                        'moduleID' => $id_module[$i],
                        'jollofsitetypeid'=> 1
                        );
            
           $this->db->insert('role_assignments',$data);
	}
        //print("<pre>".print_r($data_New,true)."</pre>");//die;
                
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                exit();
        
    }
    
    public function update_userroles_status()
    {
        $status_id = $_POST["status"];
        $cat_id = $_POST["cat_id"];

       $data_update = $this->Restaurant_admin_model->_update_userroles_status($status_id, $cat_id);

        if($data_update)
            {

                $Json_resultSave = array (
                                        'status' => '1',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            } 

    }
    public function save_resetpwd()
    {
        $newpassword = md5($this->input->post('password'));
        $id = $this->input->post('id');
        
        $data_update = array(  
                        'password'  =>  $newpassword,
                        'forcepasswordchange'   => 0
                     );
        $query  = $this->Restaurant_admin_model->_update_force_pwd($data_update,$id);
        if($query)
        {
            $Json_resultSave = array (
                                'status' => '1',
                                'content' =>  'Password Reset Successful......'
                                );
            echo json_encode($Json_resultSave);
            exit();


        }else{

                $this->session->set_flashdata('error', 'An Error occured while trying to reset your password, please try again.');

                $Json_resultSave = array (
                                'status' => '0',
                                'content' =>  'An Error occured while trying to reset your password, please try again.'
                                );
            echo json_encode($Json_resultSave);
            exit();
        }
    }
}
