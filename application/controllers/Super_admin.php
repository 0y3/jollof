<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {
        
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Fashion_model');
                $this->load->model('promo');
                $this->load->model('Generic');
                $this->load->helper('text');
                $this->load->helper('thumb');
                
                
	}
	
	public function index()
	{       
                
	}
	
	public function check_Loginin()
	{
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'admin')
            {
                    //$this->index(); 
                    redirect('admin/login', 'refresh');	
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
        
        
        
        public function update_location_data() 
        {
            // Update the Restaurant data  //
            $data_New = array(  
                                'address'=>  $_POST['r_add'],
                                'stateid'=>  $_POST["r_state"],
                                'cityid' =>  $_POST["r_city"],
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
                
            $data_New = array(  
                                'monopen'   =>  $_POST['mon_o'],
                                'monclose'  =>  $_POST["mon_c"],
                                'monstatus' =>  $mon_check,
                                
                                'tueopen'   =>  $_POST["tue_o"],
                                'tueclose'  =>  $_POST["tue_c"],
                                'tuestatus' =>  $tue_check,
                                
                                'wedopen'   =>  $_POST["wed_o"],
                                'wedclose'  =>  $_POST["wed_c"],
                                'wedstatus' =>  $wed_check,
                                
                                'thuopen'   =>  $_POST['thu_o'],
                                'thuclose'  =>  $_POST["thu_c"],
                                'thustatus' =>  $thu_check,
                                
                                'friopen'   =>  $_POST["fri_o"],
                                'friclose'  =>  $_POST["fri_c"],
                                'fristatus' =>  $fri_check,
                                
                                'satopen'   =>  $_POST["sat_c"],
                                'satclose'  =>  $_POST["sat_c"],
                                'satstatus' =>  $sat_check,
                                
                                'sunopen'   =>  $_POST["sun_c"],
                                'sunclose'  =>  $_POST["sun_c"],
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
            // Update the Restaurant data  //
            $data_New = array(  
                                'firstname' =>  $_POST['g_firstname'],
                                'lastname'  =>  $_POST["g_lastname"],
                                'email'     =>  $_POST["g_email"],
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
        
        
        
        public function get_state()
        {
            $get_state = $this->Super_admin_model->get_allstate(); // call state
            return $get_state;
            
        }
        public function get_city_byid()
        {   $by_id = $_POST["stateid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Super_admin_model->get_allcity_where($by_id); // call City by State
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
        
        public function password_change()
        {
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
        
        
        public function cat_statusupdate()
	{   
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];
            $save_status = $this->Super_admin_model->_cat_update_status($cat_id,$status_id); 
                
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
            $name = $_POST["name"];
            $cat_id = $_POST["cat_id"];
            $save_data = $this->Super_admin_model->_cat_update_name($cat_id,$name); 
                
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
            $order = $_POST["order"];
            $cat_id = $_POST["cat_id"];
            if($order == 0)
            {
                echo json_encode('');
                        exit();
            }
            else {
                $save_data = $this->Super_admin_model->_cat_order_name($cat_id,$order); 

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
        
        public function addaccount() 
        {
            $data['business_id'] = $_POST['data_id'];
            $data['business_name'] = $_POST['data_name'];
            $data['business_num'] =  $_POST['data_num'];
            $data['business_email'] = $_POST['data_email'];
            $data['bank'] = $this->Super_admin_model->_get_paystackbanks();
            //print("<pre>".print_r($this->Super_admin_model->_get_paystackbanks(),true)."</pre>");die;
            $this->load->view('super_admin/b2baccount_new',$data);
        }
        public function addcategory() 
        {
            //$data['state'] = $this->get_category();
            $this->load->view('super_admin/cuisine_category_add');
        }
        
        public function save_category() {
            
            $name_cat = trim($_POST["save_name"]);
            $status=0;
            if(isset($_POST["cat_status"]))
            {
               $status=1; 
            }
            
            $check_name = $this->Super_admin_model->_get_cat_where($name_cat);
            
            if($check_name != TRUE )
                {
                      
                    $data_New = array(  
                                        'categoryname'     =>  $name_cat,
                                        'status'   =>  $status
                                     );
                    
                    $save_data = $this->Super_admin_model->_save_cate($data_New);

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
        
        public function get_cuisine_cate()
	{  
            
                $get_data = $this->Super_admin_model->_get_cate();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

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
                     
                     
                   
                    $status = '';
                    
                    $status .= '
                                <div class="statusdiv_'.$row->id.'">
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
                     "recordsTotal"     =>     $this->Super_admin_model->_get_cate_all(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_cate(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        public function b2bsupport()
        {
            
            $data = array(
                        'b2bemail'=>    $_POST['b2bemail'],
                        'b2bphone'=>    $_POST['b2bphone'],
                        'b2bphone2'=>   $_POST['b2bphone2']
                        ); 
            
            $save_data = $this->Super_admin_model->_update_support($data); 

               
                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', 'B2B Support Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating B2B Support Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        public function b2csupport()
        {
            
            $data = array(
                        'b2cemail'=>    $_POST['b2cemail'],
                        'b2cphone'=>    $_POST['b2cphone'],
                        'b2cphone2'=>   $_POST['b2cphone2']
                        ); 
            
            $save_data = $this->Super_admin_model->_update_support($data); 

                /*if($save_data)
                {
                     $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }*/
                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', 'B2C Support Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating B2C Support Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        
        public function bann_support()
        {
            
            $data = array(
                        'homebannertimer'=>   $_POST['ban_slide']
                        ); 
            
            $save_data = $this->Super_admin_model->_update_support($data); 

                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', ' Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        public function ad_support()
        {
            
            $data = array(
                        'placeadtimer'=>   $_POST['ad_slide']
                        ); 
            
            $save_data = $this->Super_admin_model->_update_support($data); 

                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', ' Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating AD Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        public function fb_support()
        {
            
            $data = array('facebookpage'=>   str_replace(' ','',$_POST['fb_link'])); 
            $save_data = $this->Super_admin_model->_update_support($data); 

                if($save_data)
                {
                    $this->session->set_flashdata('success','Facebook Info Updated');
                    $this->session->set_flashdata('message', 'Facebook Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Facebook Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        public function tw_support()
        {
            
            $data = array('twitterpage'=>   str_replace(' ','',$_POST['tw_link']));
            $save_data = $this->Super_admin_model->_update_support($data); 

                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', 'Twitter Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Twitter Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        public function in_support()
        {
            
            $data = array('insterpage'=>   $_POST['in_link']); 
            $save_data = $this->Super_admin_model->_update_support($data); 

                if($save_data)
                {
                    $this->session->set_flashdata('success','Info Updated');
                    $this->session->set_flashdata('message', 'Instagram  Info Updated');
                    $Json_resultSave = array ('status' => '1');
                    echo json_encode($Json_resultSave);

                }
                else 
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Instagram Info');
                        $Json_resultSave = array ('status' => '0');
                        echo json_encode($Json_resultSave);
                }
            
        }
        
        public function delivering_locations()
	{  
                $get_data = $this->Super_admin_model->_get_delivering_location();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                                        
                    $sub_array[] = $row->statename;
                     
                    $sub_array[] = $row->cityname;
                    
                    
                    
                    if(empty($row->delivieringchargesid))
                    {
                        $charge  = '<div class="ch_namediv_'.$row->cityid.'"> &nbsp;
                                        <a href="javascript:void(0);" data-toggle="tooltip"  title="Add Delivery Fee" class="jboxtooltip editdelivering" data-charge_id="'.$row->cityid.'" data-city_id="'.$row->cityid.'"  data-charge_name="0">
                                        <i class="fa fa-plus-circle"" aria-hidden="true"></i>
                                        </a>
                                    </div>';
                        
                        $status='<span class="label label-warning"> Delivery Fee Not Set</span>';
                    }
                    else
                    {
                    
                        $charge  = '<div class="ch_namediv_'.$row->delivieringchargesid.'"> &nbsp;
                                        <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee" class="jboxtooltip editdelivering" data-charge_id="'.$row->delivieringchargesid.'" data-city_id="'.$row->cityid.'"  data-charge_name="'.$row->delivieringcharges.'">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a> &nbsp;'.$row->delivieringcharges.'</div>';
                        
                        $status = '<div class="statusdiv_'.$row->delivieringchargesid.'">
                                    <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee Status" class="jboxtooltip editstatus" data-charge_id="'.$row->delivieringchargesid.'">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>';
                            if($row->freedelivieringstatus == 1)
                            {
                                $status .= '<span class="label label-success">Active</span>';
                            }
                            else
                            {
                                $status .='<span class="label label-default">Inactive</span>';
                            }
                        $status .='<div>';
                    }
                    
                    
                    $sub_array[] = $charge ;
                    
                    $sub_array[] = $status;
                    
                    $data_cate[] = $sub_array;
                    
                    
                } 
                //print("<pre>".print_r($data_cate,true)."</pre>");die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_delivering_location(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_delivering_location(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        public function save_delivering_locations()
	{   
            $name = $_POST["charge"];
            $_id  = $_POST["delivering_id"];
            $city_id = $_POST["city_id"];
            
            $save_data = $this->Super_admin_model->_delivieringcharges_update($_id,$name); 
            //print("<pre>".print_r($save_data,true)."</pre>");die;  
            if($save_data)
            {
                 $data_info = 
                            '<div class="ch_namediv_'.$_id.'"> &nbsp;
                                <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee" class="jboxtooltip editdelivering" data-charge_id="'.$_id.'" data-city_id="'.$city_id.'" data-charge_name="'.$name.'">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a> &nbsp;
                                '.$name.
                            '</div>';

                echo json_encode($data_info);
                exit();
            }
            else
            {
                $data = array(
                            'cityid'=>    $_POST['city_id'],
                            'delivieringcharges'=>   $_POST['charge']
                            );
                $save_data = $this->Super_admin_model->_delivieringcharges_save($data);
                if($save_data)
                {
                     $data_info = 
                                '<div class="ch_namediv_'.$save_data.'"> &nbsp;
                                    <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee" class="jboxtooltipeditdelivering" data-charge_id="'.$save_data.'" data-city_id="'.$city_id.'" data-charge_name="'.$name.'">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$name.
                                '</div>';

                    echo json_encode($data_info);
                    exit();
                }
            }
                

	}
        
        public function delivering_locations_statusupdate()
	{   
            $status_id = $_POST["status"];
            $chrg_id = $_POST["chrg_id"];
            $save_status = $this->Super_admin_model->_delivieringcharges_update_status($chrg_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$chrg_id.'">
                                    <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Delivery Fee Status" class="jboxtooltip editstatus" data-cat_id="'.$chrg_id.'">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
        
        
        public function locations()
	{  
                $get_data = $this->Super_admin_model->_get_location();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                     
                     
                     $state_name  = '<div class="cat_namediv_'.$row->stateid.'"> &nbsp;
                                        <a href="'.site_url('super_admin/update_location').'" class="editname" data-cat_id="'.$row->stateid.'" data-cat_type="state"   data-cat_name="'.$row->statename.'" data-toggle="modal" data-target="#modal_editstate" data-container="modal_editstate" >
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a> &nbsp;
                                        '.$row->statename.'
                                    </div>';

                                        
                    $sub_array[] = $state_name;
                     
                    $state_status = '<div class="statusdiv_'.$row->stateid.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->stateid.'"  data-cat_type="state">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                            if($row->statestatus == 1)
                            {
                                $state_status .= '<span class="label label-success">Active</span>';
                            }
                            else
                            {
                                $state_status .='<span class="label label-default">Inactive</span>';
                            }
                            
                    $state_status .='<div>';
                    
                    
                    
                    $sub_array[] = $state_status;
                     
                     
                    $city_name  = '<div class="cat_namediv_'.$row->cityid.'"> &nbsp;
                                        <a href="'.site_url('super_admin/update_location').'" class="editname" data-cat_id="'.$row->cityid.'" data-cat_type="city"   data-cat_name="'.$row->cityname.'" data-toggle="modal" data-target="#modal_editstate" data-container="modal_editstate" >
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a> &nbsp;
                                        '.$row->cityname.' 
                                    </div>';
                     
                    $sub_array[] = $city_name;
                    
                    $city_status = '<div class="statusdivcity_'.$row->cityid.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->cityid.'" data-cat_type="city">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                            if($row->citystatus == 1)
                            {
                                $city_status .= '<span class="label label-success">Active</span>';
                            }
                            else
                            {
                                $city_status .='<span class="label label-default">Inactive</span>';
                            }
                            
                    $city_status .='<div>';
                    
                    $sub_array[] = $city_status;
                    
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_location(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_location(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        public function state_statusupdate()
	{   
            $status_id = $_POST["status"];
            $chrg_id = $_POST["chrg_id"];
            $save_status = $this->Super_admin_model->_state_update_status($chrg_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdiv_'.$chrg_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$chrg_id.'"  data-cat_type="state">
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
        
        public function city_statusupdate()
	{   
            $status_id = $_POST["status"];
            $chrg_id = $_POST["chrg_id"];
            $save_status = $this->Super_admin_model->_city_update_status($chrg_id,$status_id); 
                
                if($save_status)
                {
                     $status = '';
                     $status .= '
                                <div class="statusdivcity_'.$chrg_id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$chrg_id.'"  data-cat_type="city">
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
        
        public function new_location() 
        {
            $this->load->view('super_admin/location_add');
        }
        public function new_location_city() 
        {
            $data['state']= $this->Super_admin_model->get_allstate();
            $this->load->view('super_admin/location_city_add',$data);
        }
        public function save_location_state() 
        {
            $check_name = $this->Super_admin_model->get_state_name_where($_POST['state_name']);
            
            if($check_name != TRUE )
                {
                      
                    $data = array(
                        'statename'=>   $_POST['state_name']
                        );
            
                    $data_update = $this->Super_admin_model->_save_location_state($data);

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
                                            'content' => $_POST['state_name'].' Name Already Exist.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            
            
            
        }
        public function save_location_city() 
        {
            $check_name = $this->Super_admin_model->get_city_name_where($_POST['state_id'],$_POST['city_name']);
            
            if($check_name != TRUE )
            {
                $data = array(
                            'stateid'=>    $_POST['state_id'],
                            'cityname'=>   $_POST['city_name']
                            );

                $data_update = $this->Super_admin_model->_save_location_city($data);

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
                                            'content' => $_POST['city_name'].' Name Already Exist.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
        }
        public function update_location() 
        {
            if( $_POST["data_type"] == "state")
            {
                $type='Update State';
            }
            if( $_POST["data_type"] == "city")
            {
                $type='Update City';
            }
            $data['title_type']= $type;
            $data['data_type'] = $_POST["data_type"];
            $data['data_id']   = $_POST["data_id"];
            $data['data_name'] = $_POST["data_name"];
            $this->load->view('super_admin/location_update',$data);
        }
        
        public function locationupdate() 
        {
            if($_POST["type_"] == "state")
            {
                $check_name = $this->Super_admin_model->get_state_name_where($_POST['name_']);
            
                if($check_name != TRUE )
                {
                    $data_update = $this->Super_admin_model->_update_state($_POST["id_"], $_POST["name_"]);
                }
                else{ $data_update = false;}
            }
            elseif ($_POST["type_"] == "city") 
            {
                $get_stateid = $this->Super_admin_model->get_city_where($_POST['id_']);
                //print("<pre>".print_r($get_stateid[0]['stateid'],true)."</pre>");die;
                
                $check_name = $this->Super_admin_model->get_city_name_where($get_stateid[0]['stateid'],$_POST['name_']);
            
                if($check_name != TRUE )
                {
                    $data_update = $this->Super_admin_model->_update_city($_POST["id_"], $_POST["name_"]);
                }
                else{ $data_update = false;}
            }
            
            if($data_update)
            {

                $Json_resultSave = array (
                                        'status' => '1',
                                        );
                echo json_encode($Json_resultSave);
                exit();

            }
            else
            {

                $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => $_POST['name_'].' Name Already Exist.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
            }
            
        }
        
        
        public function get_order()
	{  
                //$this->check_Loginin();
                
                $get_data = $this->Super_admin_model->_get_order();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                     
                    $addmemnu = null;
                    if (!empty($row->addedmenu))
                        {
                            $addmemnu = '<a href="javascript:void(0)"  data-toggle="tooltip"  title="Product with additional Menu" class="jboxtooltip" > <i class="fa fa-plus-circle" style="color:green" ></i> </a>';
                        }
                    
                    $sub_array[] = $row->companyname;
                    $sub_array[] = '<b>'.$row->merchanttype.'</b>';
                    $sub_array[] = $row->productname.''. $addmemnu;
                    $sub_array[] = $row->deliverytype;
                    $sub_array[] = $row->quantity;
                    
                    $total= (int)$row->quantity * (int)$row->price;
                    $sub_array[] = '₦'.$total;
                     
                    $action = ' <div class="btn-groupp btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to Disperse" class="jboxtooltip ord_del btn btn-xs btn-info">Disperse <i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Disperse Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info">Disperse <i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivered Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success">Delivered <i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger">Cancel <i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning">Accept <i class="fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger">Cancel <i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_order(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_order(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function get_order_by()
	{
                
                $status_id = $this->uri->segment(3);
                $get_data = $this->Super_admin_model->_get_order_by($status_id);
                
                

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br/> <b>'.$row->ordercode.'</b>';
                     
                     
                    
                    $sub_array[] = $row->companyname;
                    $sub_array[] = '<b>'.$row->merchanttype.'</b>';
                    $sub_array[] = $row->productname;
                    $sub_array[] = $row->deliverytype;
                    $sub_array[] = $row->quantity;
                    
                    $total= (int)$row->quantity * (int)$row->price;
                    $sub_array[] = '₦'.$total;
                     
                    $action = ' <div class="btn-groupp btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_del '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Move to Disperse" class="jboxtooltip ord_del btn btn-xs btn-info">Disperse <i class="fa fa-road"></i></a>
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Disperse Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info">Disperse <i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivered Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success">Delivered <i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger">Cancel <i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                    <a href="javascript:void(0)" id="ord_pro '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Accept Order" class="jboxtooltip ord_pro btn btn-xs btn-warning">Accept <i class="fa fa-fast-forward"></i></a>

                                                    <a href="javascript:void(0)" id="ord_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Cancel Order" class="jboxtooltip ord_can btn btn-xs btn-danger">Cancel <i class="fa fa-times"></i></a>
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_cate,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_order_by($status_id),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_order_by($status_id),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output); 
        }
        
        
        public function order_nav_tray() 
	{
            $data['pending']    = $this->Super_admin_model->_get_pending_order();
            $data['processing'] = $this->Super_admin_model->_get_processing_order();
            $data['canceled']  = $this->Super_admin_model->_get_canceled_order();
            $data['delivery']  = $this->Super_admin_model->_get_delivery_order();
            $data['delivered']  = $this->Super_admin_model->_get_delivered_order();
            
            $this->load->view('super_admin/order_nav',$data);
        }
        
        public function view_pending_order()
	{
            $this->load->view('super_admin/order_pending');
        }
        
        public function view_processing_order()
	{
            $this->load->view('super_admin/order_processing');
        }
        
        public function unseen_orders() {
            $data_count = $this->Super_admin_model->_unseen_orders();
            
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
                   $order_status =2; 
                }
            elseif ($order_status == "del") 
                {
                    $order_status =3;
                }
            elseif ($order_status == "can") 
                {
                    $order_status =5;
                }
            
           $data_update = $this->Super_admin_model->_update_order_flow($order_status, $ord_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function b2bregistration()
	{  
                //$this->check_Loginin();
            
                $status_id = $this->uri->segment(3);
                
                $get_data = $this->Super_admin_model->_get_b2bregistration($status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    if(!empty($row->logo))
                        {
                            if ($row->merchanttype == 'fashion')
                            {
                                $_img= '<a href="'.base_url().'assets/uploads/fashion_logo/'. $row->logo.'" data-fancybox="images-preview">
                                        <img class="db_prdimg" src="'.base_url().'assets/uploads/fashion_logo/'. $row->logo.'" >
                                    </a>';
                            }
                            else {
                                $_img= '<a href="'.base_url().'assets/uploads/rest_logo/'. $row->logo.'" data-fancybox="images-preview">
                                            <img class="db_prdimg" src="'.base_url().'assets/uploads/rest_logo/'. $row->logo.'" >
                                        </a>';
                            }
                        }
                    else
                        {
                            $_img= '<a href="'.base_url().'assets/uploads/profile_pic/noimage.jpg" data-fancybox="images-preview">
                                        <img class="db_prdimg" src="'.base_url().'assets/uploads/profile_pic/noimage.jpg" >
                                    </a>';
                        }
                    
                    $sub_array[] = $_img; 
                    
                    $sub_array[] = $row->userf.'<br> '.$row->userl;
                    $sub_array[] = $row->companyname;
                    $sub_array[] = '<b>'.$row->merchanttype.'</b>';
                    $sub_array[] = $row->email;
                    $sub_array[] = $row->phone.'<br>'.$row->phone2;
                    $sub_array[] = $row->address;
                    $sub_array[] = $row->cityname.'<br> '.$row->statename;
                     
                    
                    
                    $status = '';
                    $status .='<div class="statusdiv_'.$row->id.'">';
                    
                    if($row->status == '0')
                    {
                        $status .='<span class="label label_pending"> Pending </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        if($row->bankCode == '')
                        {
                            $action .= '
                                          <a  href="'.site_url('super_admin/addaccount').'"  data-target_id="'.$row->id.'" data-target_name="'.$row->companyname.'" data-target_num="'.$row->phone.'" data-target_email="'.$row->email.'"  data-toggle="modal" data-target="#modal_account" data-container="modal_account" data-tooltip="tooltip" title="Approve B2B Registration" class="jboxtooltip  btn btn-xs btn-success">Approve <i class="fa fa-check"></i> </a>
                                              
                                       ';
                        }
                        else
                        {
                            $action .= '
                                          <a href="javascript:void(0)" id="b2b_acc '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve B2B Registration" class="jboxtooltip b2b_acc btn btn-xs btn-success">Approve <i class="fa fa-check"></i> </a>

                                          <!--<a href="javascript:void(0)" id="b2b_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Registration" class="jboxtooltip b2b_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>-->
                                       ';
                        }
                    
                    }
                    else
                    {
                        $status .='<span class="label label-success"> Approved </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        $action .= '
                                      <a href="javascript:void(0)" id="b2b_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Registration" class="jboxtooltip b2b_can btn btn-xs btn-danger">Decline <i class="fa fa-times"></i> </a>
                                   ';
                    }
                    
                    
                    
                    
                    
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status.''.$action;
                    //$sub_array[] = ;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2bregistration($status_id),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2bregistration($status_id),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_b2bregistration_flow()
	{
            $b2b_status = $_POST["status"];
            $b2b_id = $_POST["b2b_id"];
            
           $data_update = $this->Super_admin_model->_update_b2bregistration_flow($b2b_status, $b2b_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        public function rest_nav_tray() 
	{
            $data['all']    = $this->Super_admin_model->_count_all_b2bregistration("3");
            $data['pending'] = $this->Super_admin_model->_count_all_b2bregistration("0");
            $data['approved']  = $this->Super_admin_model->_count_all_b2bregistration("1");
            $this->load->view('super_admin/restaurant_nav_tray',$data);
        }
        
        
        public function b2bregistration_billing()
	{  
                //$this->check_Loginin();
            
                //$status_id = $this->uri->segment(3);
                
                $get_data = $this->Super_admin_model->_get_b2bbilling();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                     
                    
                    $sub_array[] = $row->companyname;
                    $sub_array[] = $row->email;
                    $sub_array[] = $row->phone.'<br>'.$row->phone2;
                    $sub_array[] = $row->address;
                    $sub_array[] = $row->cityname.'<br> '.$row->statename;
                     
                    $billing  = '<div class="cat_orderdiv_'.$row->id.'">  &nbsp;
                                            <a href="javascript:void(0);" class="editorder" data-cat_id="'.$row->id.'"  data-cat_order="'.$row->percharge.'">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                '.$row->percharge.
                                            '</div>';
                    $sub_array[] = $billing;
                    
                    $status = '<div class="statusdiv_'.$row->id.'">
                                    <a href="javascript:void(0);" class="editstatus" data-cat_id="'.$row->id.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>';
                            if($row->perchargestatus == 1)
                            {
                                $status .= '<span class="label label-success">Active</span>';
                            }
                            else
                            {
                                $status .='<span class="label label-default">Inactive</span>';
                            }


                        
                    $status .='<div>';
                    
                    
                    
                    $sub_array[] = $status;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2bbilling(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2bbilling(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        public function update_billing_status()
	{
            $status_id = $_POST["status"];
            $rest_id = $_POST["cat_id"];
            
           $data_update = $this->Super_admin_model->_update_billing_status($status_id, $rest_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function update_billing_price()
	{
            $billing_price = $_POST["order"];
            $rest_id = $_POST["cat_id"];
            
           $data_update = $this->Super_admin_model->_update_billing_price($billing_price, $rest_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        
        
        
        
        
        
        
        public function b2bregistration_billing_report()
	{  
                //$this->check_Loginin();
            
                //$status_id = $this->uri->segment(3);
                
                $get_data = $this->Super_admin_model->_get_b2bbillingreport();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     
                     
                    $sub_array[] = $row->companyname;
                    $sub_array[] = $row->email;
                    $sub_array[] = $row->phone.'<br>'.$row->phone2;
                    
                    $sd=null;
                    $ed=null;
                    if(isset($_POST["start_date"]))
                        {
                            $sd = $_POST["start_date"];
                            $get_date= date('jS M \, Y ', strtotime($sd) );
                        }
                    else
                        { 
                            $get_date = date('jS M \, Y ', strtotime($row->createdat));
                        }
                    $sub_array[] = $get_date;
                    
                    if(isset($_POST["end_date"]))
                        {
                            $ed = $_POST["end_date"];
                            $get_enddate= date('jS M \, Y ', strtotime($ed) );
                        }
                    else
                        { 
                            $get_enddate=date('jS M \, Y');
                        }
                    $sub_array[] = $get_enddate;
                    
                    $sub_array[] = $row->Totalsales;
                    $sub_array[] = $row->percharge.'%';
                    
                    $Totalbilling = ((int)$row->Totalsales * (int)$row->percharge )/100 ;
                    
                    $sub_array[] = $Totalbilling;
                    
                    
                    $action = ' <form action="'.site_url('admin/b2bbilledrestaurant').'" id="" method="POST">
                                    <button type="submit" class="btn btn-xs btn-default"  title="Send Message" ><i class="fa fa-eye"></i></button>
                                    <input type="hidden" name="id" value="'.$row->id.'"/>
                                    <input type="hidden" name="start_date" value="'.$sd.'"/>
                                    <input type="hidden" name="end_date" value="'.$ed.'"/>
                                </form>';
                    
                    
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2bbillingreport(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2bbillingreport(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        public function b2bregistration_billing_rest()
	{  
                //$this->check_Loginin();
                
                $get_data = $this->Super_admin_model->_get_order();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                     
                    
                    $sub_array[] = $row->ordercode;
                    $sub_array[] = $row->companyname;
                    $sub_array[] = $row->productname;
                    $sub_array[] = $row->deliverytype;
                    $sub_array[] = $row->quantity;
                    
                    $total= (int)$row->quantity * (int)$row->price;
                    $sub_array[] = '₦'.$total;
                     
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
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_order(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_order(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        
        
        
        
        
        
        
        
        
        
        
        public function b2bpromobanner()
	{  
                //$this->check_Loginin();
                $status_id = $this->uri->segment(3);
                
                $user_type ="restaurant"; 
                $get_data = $this->Super_admin_model->_get_b2bpromobanner($user_type, $status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    $sub_array[] = $row->companyname;
                    
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
                            $folder_img= "restaurantPage_ads";
                        }
                    elseif($row->bannertypeid == "4")
                        {
                            $folder_img= "jollofhomepage_banner";
                        }

                    $sub_array[] = '<a href="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" data-fancybox="images-preview">
                                        <img class="db_prdimg" src="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" >
                                    </a>'; 
                    
                    $sub_array[] = $row->bannertypename;
                     
                    $sub_array[] = date('jS M \, Y \ ', strtotime($row->startdate));
                    $sub_array[] = date('jS M \, Y \ ', strtotime($row->enddate));
                    
                    $status ='<div class="statusdiv_'.$row->id.'">';
                    $action = ' <div class="btn-group btn-group-xs">';
                    
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
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2bpromobanner($user_type, $status_id),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2bpromobanner($user_type, $status_id),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        public function b2bpromobanner_nav_tray() 
	{
            $usertype ="restaurant";
            $data['all']   = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
            $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
            $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
            $this->load->view('super_admin/b2bpromobanner_nav_tray',$data);
        }
        
        
        public function b2bthirdpartyads()
	{  
                //$this->check_Loginin();
                $status_id = $this->uri->segment(3);
                
                $user_type ="third";
                $get_data = $this->Super_admin_model->_get_b2bthirdpartyads($user_type, $status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    $sub_array[] = $row->username;
                    
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
                            $folder_img= "restaurantPage_ads";
                        }
                    elseif($row->bannertypeid == "4")
                        {
                            $folder_img= "jollofhomepage_banner";
                        }

                    $sub_array[] = '<a href="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" data-fancybox data-toolbar="false" data-small-btn="true" >
                                        <img class="db_prdimg" src="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" >
                                    </a>'; 
                    
                    $sub_array[] = $row->bannertypename;
                    
                    $sub_array[] = $row->userphone.'<br>'.$row->useremail;
                    
                    $sub_array[] = $row->imageurl;
                     
                    $sub_array[] = date('jS M \, Y \ ', strtotime($row->startdate));
                    $sub_array[] = date('jS M \, Y \ ', strtotime($row->enddate));
                    
                    
                    $status = '<div class="statusdiv_'.$row->id.'">';
                    $action = '<div class="btn-group btn-group-xs">';
                    
                    if($row->status == "1")
                        {
                            $status .='<span class="label label-success"> Approved </span>';
                            $action .= '
                                          <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2B Third Party ADs" class="jboxtooltip b2b_p_can btn btn-xs btn-danger"><i class="fa fa-times"></i> Decline</a>
                                       ';
                        }
                    else
                        {
                            $status .='<span class="label label_pending"> Pending </span>';
                            $action .= '
                                          <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve Third Party ADs" class="jboxtooltip b2b_p_acc btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>

                                       ';
                        }
                        
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2bthirdpartyads($user_type, $status_id),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2bthirdpartyads($user_type, $status_id),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_b2bpromobanner_flow()
	{
            $b2b_status = $_POST["status"];
            $b2b_id = $_POST["b2b_id"];
            
           $data_update = $this->Super_admin_model->_update_b2bpromobanner_flow($b2b_status, $b2b_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        public function b2bthirdpartyads_nav_tray() 
	{
            $usertype ="third";
            $data['all']    = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"3");
            $data['pending'] = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"0");
            $data['approved']  = $this->Super_admin_model->_count_all_b2bthirdpartyads($usertype,"1");
            $this->load->view('super_admin/b2bthirdpartyads_nav_tray',$data);
        }
        
        
        public function cuisine_slider_home()
	{  
                //$this->check_Loginin();
                $banntype = $this->uri->segment(3);

                $get_data = $this->Super_admin_model->_get_slider($banntype);
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    
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
                            $folder_img= "restaurantPage_ads";
                        }
                    elseif($row->bannertypeid == "4")
                        {
                            $folder_img= "jollofhomepage_banner";
                        }
                    else{
                        $folder_img= "jollofhomepage_banner";
                    }

                    $sub_array[] = '<a href="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" data-fancybox="images-preview" data-toolbar="false" data-small-btn="true" >
                                        <img class="db_prdimg" src="'.base_url().'assets/jollof_banners/'.$folder_img.'/'. $row->imagename.'" >
                                    </a>'; 
                    
                    
                    
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                    
                    $usertype = NULL;
                    if($row->userid == "0" )
                        {
                            $usertype = "Third Party ADs";
                        }
                    else{$usertype = $row->usertype;}
                    
                    $sub_array[] = $usertype;
                     
                    $sub_array[] = $row->username;
                    
                    $sub_array[] = $row->imageurl;
                    
                    $status = '<div class="statusdiv_'.$row->id.'">';
                    $action = '<div class="btn-group btn-group-xs">';
                    
                    $status = '';
                        
 
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


                        
                    $status .='<div>';
                        
                     $sub_array[] = $status;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_slider($banntype),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_slider($banntype),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_cuisine_slider_status()
	{
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];
            
           $data_update = $this->Super_admin_model->_update_cuisine_slider_status($status_id, $cat_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function update_cuisine_slider_cate()
	{
            $order = $_POST["order"];
            $cat_id = $_POST["cat_id"];
            
           $data_update = $this->Super_admin_model->_update_cuisine_slider_cate($order, $cat_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function cuisine_slider_nav_tray() 
	{
            //$this->check_Loginin();
            $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(1);
            $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
            $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
            
            $this->load->view('super_admin/cuisine_slider_nav_tray',$data);
        }
        public function jollof_slider_nav_tray() 
	{
            //$this->check_Loginin();
            $data['homebanner']    = $this->Super_admin_model->_count_all_cuisinebanner(4);
            $data['centerbanner'] = $this->Super_admin_model->_count_all_cuisinebanner(2);
            $data['respage']  = $this->Super_admin_model->_count_all_cuisinebanner(3);
        
            $this->load->view('super_admin/jollof_slider_nav_tray',$data);
        }
        
        public function cuisine_slider_new() 
        {
            $by_id= $_POST["_id"];
            if ($by_id ==1)
            {
                $data['title_type']= 'New Cuisine Slider Form';
            }
            else if($by_id ==2)
            {
                $data['title_type']= 'New Fashion Slider Form';
            }
            else if($by_id ==3)
            {
                $data['title_type']= 'New Jollof Mainpage Slider Form';
            }
            $data['cate'] = $this->Super_admin_model->_slider_option($by_id);
            
            $this->load->view('super_admin/cuisine_slider_new',$data);
        }
        public function cuisineslidersave() 
        {
            $url='';
            
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
                    /*
                    $file_name = "slider_banner";  // name of image input from the view
                    $newname = $this->generate_random_string(4).'_banner'.time();	 // Random Encryp new name save to app

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
                    
                
                     * 
                     */
                $cropimg_data = $_POST['cropimg'];
                // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array1 = explode(";", $cropimg_data);
                // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
                // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

                $cropimg = base64_decode($cropimg_remove_array2[1]);

                $newname = $this->generate_random_string(4).'_banner'.time(). '.png';	 // Random Encryp new name save to app

                if (!is_dir($path)) {
                  mkdir($path);
                }
                file_put_contents($path.$newname, $cropimg);
            
                if(isset($_POST['slider_url']) && !empty($_POST['slider_url']) )
                {
                    $url=trim($_POST['slider_url']);
                    if($url !='https://' || $url !='http://' )
                    {

                        $data_New = array(  
                                        'bannertypeid'  =>  $_POST['slider_type'],
                                        'imageurl'      => $url,
                                        'imagename'     => $newname,
                                        'usertype'      => $_SESSION['Type'],
                                        'userid'        => $_SESSION['User_id'],
                                        'username'      => $_SESSION['first_name'],
                                        'status'        => 1
                                     );
                    }
                    else
                    {
                        $data_New = array(  
                                        'bannertypeid'  => $_POST['slider_type'],
                                        'imagename'     => $newname,
                                        'usertype'      => $_SESSION['Type'],
                                        'userid'        => $_SESSION['User_id'],
                                        'username'      => $_SESSION['first_name'],
                                        'status'        => 1
                                     );

                    }
                }
                else
                    {
                        $data_New = array(  
                                        'bannertypeid'  => $_POST['slider_type'],
                                        'imagename'     => $newname,
                                        'usertype'      => $_SESSION['Type'],
                                        'userid'        => $_SESSION['User_id'],
                                        'username'      => $_SESSION['first_name'],
                                        'status'        => 1
                                     );

                    }
                
            }
            //print("<pre>".print_r($data_New,true)."</pre>");//die;
            $insert_data = $this->Super_admin_model->_insert_cuisineslider_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'bannertype' => $_POST['slider_type'],
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function useremail()
        {
            //$this->check_Loginin();
            $this->load->view('super_admin/emailblast_adduser');
        }
        public function all_e() 
	{
            //$this->check_Loginin();
            $get_like = $_POST["q"];
            if(isset($get_like) && !empty($get_like) )
            {
                $data_all = $this->Super_admin_model->_all_user($get_like);

                
            }
            else
            {
                $data_all = $this->Super_admin_model->_all_user($get_like=FALSE); // call City by State
            }
            
            if($data_all)
                    {

                        $data = array();
                        foreach ($data_all as $value ) 
                        {
                            $data[] = array(
                                    'id' => $value->id,
                                    'first_name' => $value->firstname,
                                    'last_name' => $value->lastname,
                                    //'name' => $value->firstname.' '.$value->lastname,
                                    'email' => $value->email
                                    );
                        }
                        echo json_encode($data);

                    } 
                
        }
        
        public function all_e2() 
	{
            //$this->check_Loginin();
            
                $data_all = $this->Super_admin_model->_all_user($get_like=FALSE); // call City by State
            
            if($data_all)
                    {

                        $data = array();
                        foreach ($data_all as $value ) 
                        {
                            $data[] = array(
                                    'id' => $value->id,
                                    'first_name' => $value->firstname,
                                    'last_name' => $value->lastname,
                                    //'name' => $value->firstname.' '.$value->lastname,
                                    'email' => $value->email
                                    );
                        }
                        echo json_encode($data);

                    } 
                
        }
        
        public function emailtest() {
            
            /*$config = Array(
                                    'protocol' => 'smtp',
                                    'smtp_host' => 'ssl://smtp.zoho.com',
                                    'smtp_port' => 465,
                                    'smtp_user' => 'segun@stakle.com', // change it to yours
                                    'smtp_pass' => 'Badguys007', // change it to yours
                                    'mailtype' => 'html',
                                    'charset' => 'iso-8859-1',
                                    'wordwrap' => TRUE
                            
                        );
            */

            $config['useragent'] = "CodeIgniter";
            $config['protocol'] = "smtp";
            $config['_smtp_auth']   = TRUE;
            $config['smtp_host'] = "ssl://smtp.zoho.com";
            $config['smtp_user'] = "segun@stakle.com";
            $config['smtp_pass'] = "Badguys007";
            $config['smtp_port'] = 465;
            $config['wordwrap'] = TRUE;
            //$config['wrapchars'] = 76;
            $config['mailtype'] = "html";
            $config['charset'] = "utf-8";
            $config['validate'] = FALSE;
            $config['priority'] = 3;
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['bcc_batch_mode'] = TRUE;
            $config['bcc_batch_size'] = "200";


            /*$config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'trivin98@gmail.com', // change it to yours
                            'smtp_pass' => 'Watsmyname007', // change it to yours
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1',
                            'wordwrap' => TRUE
                            );
                         
            */            
		//$config['mailtype'] = 'html';
		$this->email->initialize($config);

                $content ='
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="viewport" content="width=600,initial-scale = 2.3,user-scalable=no">
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700 "rel="stylesheet">
    <!-- <![endif]-->

    <title>Material Design for Bootstrap</title>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }
        
        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
        
        span.preheader {
            display: none;
            font-size: 1px;
        }
        
        html {
            width: 100%;
        }
        
        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */
        
        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }
        
        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    Pre-header for the newsletter template
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 100px;" src="https://mdbootstrap.com/img/logo/mdb-email.png" alt="" /></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>

                        <td align="center" class="section-img">
                            <a href="" style=" border-style: none !important; display: block; border: 0 !important;"><img src="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img (67).jpg" style="display: block; width: 590px;" width="590" border="0" alt="" /></a>




                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">


                            <div style="line-height: 35px">

                                NEW IN <span style="color: #5caad2;">NOVEMBER</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: "Work Sans", Calibri, sans-serif; line-height: 24px;">


                                        <div style="line-height: 24px">

                                            Winter is coming. Shop our latest AW16 range, and prepare for the damp, cold, British weather.
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; line-height: 26px;">


                                        <div style="line-height: 26px;">
                                            <a href="" style="color: #ffffff; text-decoration: none;">SHOP NOW</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>


                </table>

            </td>
        </tr>

    </table>
    <!-- end section -->

    <!-- contact section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr class="hide">
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

        <tr>
            <td height="60" style="border-top: 1px solid #e0e0e0;font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                    <tr>
                        <td>
                            <table border="0" width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <!-- logo -->
                                    <td align="left">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="80" border="0" style="display: block; width: 80px;" src="https://mdbootstrap.com/img/logo/mdb-email.png" alt="" /></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left" style="color: #888888; font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; line-height: 23px;" class="text_color">
                                        <div style="color: #333333; font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">

                                            Email us: <br/> <a href="mailto:" style="color: #888888; font-size: 14px; font-family: "Hind Siliguri", Calibri, Sans-serif; font-weight: 400;">contact@mdbootstrap.com</a>

                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <table border="0" width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                                </tr>
                            </table>

                            <table border="0" width="200" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">&nbsp;</td>
                                </tr>



                                <tr>
                                    <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>
                                        <table border="0" align="right" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <a href="https://www.facebook.com/mdbootstrap" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/Qc3zTxn.png" alt=""></a>
                                                </td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <a href="https://twitter.com/MDBootstrap" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/RBRORq1.png" alt=""></a>
                                                </td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <a href="https://plus.google.com/u/0/b/107863090883699620484/107863090883699620484/posts" style="display: block; border-style: none !important; border: 0 !important;"><img width="24" border="0" style="display: block;" src="http://i.imgur.com/Wji3af6.png" alt=""></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end section -->

    <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">

                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td align="left" style="color: #aaaaaa; font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">

                                            <span style="color: #333333;">Material Design for Bootstrap</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                <tr>
                                    <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <a style="font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;" href="{{UnsubscribeURL}}">UNSUBSCRIBE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->

</body>

</html>
                        ';

		$this->email->from('segun@stakle.com', 'jollof');
		
		$this->email->to('trivin98@gmail.com');

		$this->email->subject('testing');
		$this->email->message($content);
		
                if ($this->email->send()) 
                {
                    echo "you are luck!";
                } 
                else
                {
                    echo $this->email->print_debugger();
                }
            
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        public function b2ccomment()
	{  
                //$this->check_Loginin();
            
                $get_data = $this->Super_admin_model->_get_b2ccomment();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    $sub_array[] = $row->firstname.' &nbsp; '.$row->lastname;
                    
                    
                    $sub_array[] = $row->comment;
                    
                    $status = '';
                    $status .='<div class="statusdiv_'.$row->id.'">';
                    
                    if($row->status == '0')
                    {
                        $status .='<span class="label label_pending"> Pending </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve User Comment" class="jboxtooltip b2c_acc btn btn-xs btn-success"><i class="fa fa-check"></i></a>

                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline User Comment" class="jboxtooltip b2c_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                   ';
                    
                    }
                    else
                    {
                        $status .='<span class="label label-success"> Approved </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        $action .= '
                                      <a href="javascript:void(0)" id="'.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline User Comment" class="jboxtooltip b2c_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                   ';
                    }
                    
                    $status .='</div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2ccomment(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2ccomment(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_b2ccomment_flow()
	{
            $b2c_status = $_POST["status"];
            $b2c_id = $_POST["b2c_id"];
            
           $data_update = $this->Super_admin_model->_update_b2ccomment_flow($b2c_status, $b2c_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function b2cusers()
	{  
                //$this->check_Loginin();
            
                
                $get_data = $this->Super_admin_model->_get_b2cusers();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                     
                    if(!empty($row->image))
                        {
                            $_img= '<a href="'.base_url().'assets/uploads/profile_pic/'. $row->image.'" data-fancybox="images-preview">
                                        <img class="db_prdimg" src="'.base_url().'assets/uploads/profile_pic/'. $row->image.'" >
                                    </a>';
                        }
                    else
                        {
                            $_img= '<a href="'.base_url().'assets/uploads/profile_pic/noimage.jpg" data-fancybox="images-preview">
                                        <img class="db_prdimg" src="'.base_url().'assets/uploads/profile_pic/noimage.jpg" >
                                    </a>';
                        }
                    
                    $sub_array[] = $_img;
                  
                    $sub_array[] = $row->firstname;
                    $sub_array[] = $row->lastname;
                    $sub_array[] = $row->gender;
                    $sub_array[] = $row->email;
                    $sub_array[] = $row->phone.'<br>'.$row->phone2;
                     
                    
                    
                    $status = '';
                    $status .='<div class="statusdiv_'.$row->id.'">';
                    
                    if($row->status == '0')
                    {
                        $status .='<span class="label label_pending"> Pending </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        $action .= '
                                      <a href="javascript:void(0)" id="b2b_acc '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Approve B2C User" class="jboxtooltip b2c_acc btn btn-xs btn-success"><i class="fa fa-check"></i> Approve</a>

                                      <!--<a href="javascript:void(0)" id="b2b_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2C User" class="jboxtooltip b2c_can btn btn-xs btn-danger"><i class="fa fa-times"></i></a>-->
                                   ';
                    
                    }
                    else
                    {
                        $status .='<span class="label label-success"> Approved </span>';

                        $action = ' <div class="btn-group btn-group-xs">';
                        $action .= '
                                      <a href="javascript:void(0)" id="b2b_can '.$row->id.'" data-get="'.$row->id.'" data-toggle="tooltip" title="Decline B2C User" class="jboxtooltip b2c_can btn btn-xs btn-danger"><i class="fa fa-times"></i> Decline</a>
                                   ';
                    }
                    
                    
                    
                    
                    
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2cusers(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2cusers(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_b2cusers_flow()
	{
            $b2c_status = $_POST["status"];
            $b2c_id = $_POST["b2c_id"];
            
           $data_update = $this->Super_admin_model->_update_b2cusers_flow($b2c_status, $b2c_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function get_table_reservation()
	{  
                //$this->check_Loginin();
            
                
                $get_data = $this->Super_admin_model->_get_table_reservation();
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                    $checkindate =  date('jS M \, Y ', strtotime($row->checkindate));
                    $checkintime =  date('g:i A', strtotime($row->checkintime));
                    
                    $sub_array = array(); 
                    $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat));
                    $sub_array[] = $row->tablecode;
                    $sub_array[] = $row->firstname.' ' .$row->lastname ;
                    $sub_array[] = $row->companyname;
                    $sub_array[] = $row->contactname;
                    $sub_array[] = $checkindate.' '.$checkintime;
                    $sub_array[] = $row->contactphone;
                    //$sub_array[] = $row->contactemail;
                    $sub_array[] = $row->contactnote;
                    $sub_array[] = $row->numguest;
                    
                    
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                               if($row->requeststatus == '4')
                                  {
                                      $status .= '<span class="label label-success"> Approved</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success"><i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->requeststatus == '5')
                                  {
                                      $status .= '<span class="label label-danger">Canceled</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">Pending</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                            
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';

                    
                    
                    
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");
                //die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_table_reservation(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_table_reservation(),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function b2corder()
	{  
                //$this->check_Loginin();
            
                $status_id = $this->uri->segment(3);
                
                $get_data = $this->Super_admin_model->_get_b2corder($status_id);
                
                //print("<pre>".print_r($get_data,true)."</pre>");
                //die;

                $data_order = array();  
                foreach($get_data as $row)  
                {  
                     $sub_array = array(); 
                     $sub_array[] = date('jS M \, Y \ g:i A', strtotime($row->createdat)).'<br> <b>'.$row->ordercode.'</b>';
                     
                     
                    $sub_array[] = $row->firstname.' ' .$row->lastname ;
                    $sub_array[] = $row->companyname;
                    $sub_array[] = $row->merchanttype;
                    $sub_array[] = $row->productname;
                    $sub_array[] = $row->cityname.'<br> '.$row->statename;
                    
                    $total= (int)$row->quantity * (int)$row->price;
                    $prt = '<div class="">
                                <div class="ccl"> ₦'.$total.'</div>
                           </div>';
                    $sub_array[] = $prt;
                     
                    $action = ' <div class="btn-group btn-group-xs">';
                    
                    $status = '';
                    $status .= '<div class="statusdiv_'.$row->id.'">';
                                    
                                  if($row->status == '2')
                                  {
                                      $status .= '<span class="label label-warning">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                 ';
                                  }
                                  else if($row->status == '3')
                                  {
                                      $status .= '<span class="label label-info">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Delivery Order"  data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-info">View <i class="fa fa-truck"></i></a>
                                          
                                                 ';
                                  }
                                  else if($row->status == '4')
                                  {
                                      $status .= '<span class="label label-success">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View delived Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-success">View <i class="fa fa-eye"></i></a>

                                                 ';
                                  }
                                  else if($row->status == '5')
                                  {
                                      $status .= '<span class="label label-danger">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="javascript:void(0)" id="'.$row->id.'" data-toggle="tooltip" title="View Cancel Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-danger">View <i class="fa fa-eye"></i></a>
                                                  ';
                                  }
                                  else
                                  {
                                      $status .='<span class="label label_pending">'.$row->orderstatus_desc.'</span>';
                                      
                                      $action .= '
                                                    <a href="" id="'.$row->id.'" data-toggle="tooltip"  title="View Order" data-get="'.$row->id.'"  class="jboxtooltip ord_view btn btn-xs btn-default">View <i class="fa fa-eye"></i></a>
                                            
                                                 ';
                                  }
                    $status .='<div>';
                    $action .='</div>';

                    
                    
                    
                    $status .='<div>';
                    $action .='</div>';
                    
                    
                    $sub_array[] = $status;
                    $sub_array[] = $action;
                    
                    $data_order[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_order,true)."</pre>");die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_all_b2corder($status_id),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_b2corder($status_id),  
                     "data"             =>     $data_order  
                );  
                echo json_encode($output);  
                
      
	}
        
        public function update_b2corder_flow()
	{
            $b2b_status = $_POST["status"];
            $b2b_id = $_POST["b2b_id"];
            
           $data_update = $this->Super_admin_model->_update_b2bregistration_flow($b2b_status, $b2b_id);
            
            if($data_update)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        
         public function unseen_table() {
            $data_count = $this->Super_admin_model->_unseen_table();
            
            $Json_resultSave = array (
                                            'unseen_notification' => $data_count,
                                            );
            echo json_encode($Json_resultSave);
            exit();
        }
         
        public function new_fashioncategory() 
        {
            
            $this->load->view('super_admin/fashioncategory_add');
        }
        public function update_fashioncategory() 
        {
            if( $_POST["data_type"] == "MainCategory")
            {
                $type='Update Main Category';
            }
            if( $_POST["data_type"] == "SubCategory")
            {
                $type='Update Sub Category';
            }
            $data['title_type']= $type;
            $data['data_type'] = $_POST["data_type"];
            $data['data_id']   = $_POST["data_id"];
            $data['data_name'] = $_POST["data_name"];
            $this->load->view('super_admin/fashioncategory_update',$data);
        }
        
        public function fashioncategoryadd() 
        {
            
            $data_New = array(  
                                'categoryname'=>  $_POST['save_name'],
                                'categoryparentid'=> 0
                             );
            $insert_data = $this->Super_admin_model->_insert_fashioncategory_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        public function fashioncategoryupdate() 
        {
            
            $data_New = array(  
                                'categoryname'=>  $_POST['name_']
                             );
            $insert_data = $this->Super_admin_model->_update_fashioncategory_data($_POST['id_'],$data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function new_fashionsubcategory() 
        {
            $data['cate']= $this->Fashion_model->get_parent_category();
            $this->load->view('super_admin/fashionsubcategory_add',$data);
        }
        
        
        public function update_fashionsubcategory() 
        {
            
            $data['data_type'] = $_POST["data_type"];
            $data['data_id']   = $_POST["data_id"];
            $data['data_name'] = $_POST["data_name"];
            $data['cate']= $this->Fashion_model->get_parent_category();
            
            
            $data_subcate=$this->Fashion_model->get_subcategory_details($_POST["data_id"]);
            
            //print("<pre>".print_r($data_subcate[0]->categoryname,true)."</pre>");die;
            
            $data['data_subcate']= $data_subcate;
            $data['data_cate']= $this->Fashion_model->get_subcategory_details($data_subcate[0]->categoryparentid);
            
            $this->load->view('super_admin/fashionsubcategory_update',$data);
        }
        
        public function fashionsubcategoryadd() 
        {
            
            $data_New = array(  
                                'categoryname'=>  $_POST['save_name'],
                                'categoryparentid'=> $_POST['parent_category']
                             );
            $insert_data = $this->Super_admin_model->_insert_fashioncategory_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        } 
            
        public function fashionsubcategoryupdate() 
        {
             
            $data_New = array(  
                                'categoryname'=>  $_POST['name_'],
                                'categoryparentid'=>  $_POST['cateid'],
                                'arrangecategory'=>  $_POST['sort'],
                                'status'=>  $_POST['status']
                             );
            $insert_data = $this->Super_admin_model->_update_fashioncategory_data($_POST['id_'],$data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function new_fashionattributecategory() 
        {
            $data['cate']= $this->Fashion_model->get_parent_category();
            $this->load->view('super_admin/fashionattributecategory_add',$data);
        }
        
        public function get_sub_category_byid() 
        {
            $by_id = $_POST["cateid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Fashion_model->get_sub_category_where($by_id); 
                //return $get_city;
                //print("<pre>".print_r($get_city,true)."</pre>");die;
                foreach($get_city as $row)
                {
                    echo '<option value="'.$row->id.'">'.$row->categoryname.'</option>';
                }
            }
            else{
                
                echo '<option value="">Sub Category not available</option>';
            }
        }
        
        public function update_fashionattributecategory() 
        {
            
            $data['data_id']   = $_POST["data_id"];
            $data['data_name'] = $_POST["data_name"];
            $data['cate']= $this->Fashion_model->get_parent_category();
            
            
            $data_att =$this->Fashion_model->get_subcategory_details($_POST["data_id"]);
            $data_subcate=$this->Fashion_model->get_subcategory_details($data_att[0]->categoryparentid);
            $data['data_cate']= $this->Fashion_model->get_subcategory_details($data_subcate[0]->categoryparentid);
            
            //print("<pre>".print_r($data_subcate[0]->categoryname,true)."</pre>");die;
            
            $data['data_att']=$data_att;
            $data['data_subcate']= $data_subcate;
            
            $this->load->view('super_admin/fashionattributecategory_update',$data);
        }
        
        public function fashionattributecategoryadd() 
        {
            
            $data_New = array(  
                                'categoryname'=>  $_POST['save_name'],
                                'categoryparentid'=> $_POST['sub_category']
                             );
            $insert_data = $this->Super_admin_model->_insert_fashioncategory_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        } 
            
        public function fashionattributecategoryupdate() 
        {
             
            $data_New = array(  
                                'categoryname'=>  $_POST['name_'],
                                'categoryparentid'=>  $_POST['cateid'],
                                'arrangecategory'=>  $_POST['sort'],
                                'status'=>  $_POST['status']
                             );
            $insert_data = $this->Super_admin_model->_update_fashioncategory_data($_POST['id_'],$data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function remove_fashioncategory() 
        {
            
            $_data = $this->Super_admin_model->_remove_fashioncategory($_POST['id_']);// insert to db
            if($_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function new_fashionsize() 
        {
            $data['cate']= $this->Fashion_model->_all_sizecategory();
            $this->load->view('super_admin/fashionsize_add',$data);
        }
        
        public function fashionsizeadd() 
        {
            
            $data_New = array(  
                                'sizecategoryid'=> $_POST['parent_category'],
                                'sizename'=>  $_POST['save_name'],
                                'sizecode'=> $_POST['save_code']
                             );
            $insert_data = $this->Super_admin_model->_insert_fashionsize_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function new_fashionsizecategory() 
        {
            $this->load->view('super_admin/fashionsizecate_add');
        }
        
        public function fashionsizecategoryadd() 
        {
            
            $data_New = array(  
                                'sizecategory'=>  $_POST['save_name']
                             );
            $insert_data = $this->Super_admin_model->_insert_fashionsizecategory_data($data_New);// insert to db
            if($insert_data)
                {
                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function update_fashionsizecategory() 
        {
            
            $data['title_type']= 'Update Sizes Category';
            $data['data_status']= $_POST["data_type"];
            $data['data_id']   = $_POST["data_id"];
            $data['data_name'] = $_POST["data_name"];
            $this->load->view('super_admin/fashionsizecate_update',$data);
        }
        
        public function fashionsizecategoryupdate() 
        {
            
            $data_New = array(  
                                'sizecategory'=>  $_POST['name_']
                             );
            $insert_data = $this->Super_admin_model->_update_fashionsizecategory_data($_POST['id_'],$data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function size_statusupdate()
	{   
            //$this->check_Loginin();
            
            $status_id = $_POST["status"];
            $cat_id = $_POST["cat_id"];
            $save_status = $this->Super_admin_model->_size_update_status($cat_id,$status_id); 
                
                if($save_status)
                {
                     $status = '<a href="javascript:void(0);" class="editstatus" data-cat_id="'.$cat_id.'">
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

                    echo json_encode($status);
                    exit();
                }

	}
        
        public function size_nameupdate()
	{   
            //$this->check_Loginin();
            
            $name = $_POST["name"];
            $cat_id = $_POST["cat_id"];
            $save_data = $this->Super_admin_model->_size_update_name($cat_id,$name); 
                
                if($save_data)
                {
                     $data_info = 
                                '<a href="javascript:void(0);" class="editname" data-cat_id="'.$cat_id.'"  data-cat_name="'.$name.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$name.'
                                ';

                    echo json_encode($data_info);
                    exit();
                }

	}
        
        
        public function size_codeupdate()
	{   
            //$this->check_Loginin();
            
            $code = $_POST["code"];
            $cat_id = $_POST["cat_id"];
            $save_data = $this->Super_admin_model->_size_update_code($cat_id,$code); 
                
                if($save_data)
                {
                     $data_info = 
                                '<a href="javascript:void(0);" class="editcode" data-cat_id="'.$cat_id.'"  data-cat_code="'.$code.'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$code.'
                                ';

                    echo json_encode($data_info);
                    exit();
                }

	}
        
        public function size_orderupdate()
	{   
            //$this->check_Loginin();
            
            $order = $_POST["order"];
            $cat_id = $_POST["cat_id"];
                $save_data = $this->Super_admin_model->_size_order_name($cat_id,$order); 

                if($save_data)
                {
                     $data_info = 
                                '<a href="javascript:void(0);" class="editorder" data-cat_id="'.$cat_id.'"  data-cat_order="'.$order.'">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a> &nbsp;
                                    '.$order.'
                                ';

                    echo json_encode($data_info);
                    exit();
                }

	}
        
        public function delete_fashionsize() 
        {
            if($_POST['type_']=='sizecategory')
            {
                $_data = $this->Super_admin_model->_delete_fashionsizecategory($_POST['id_']);
            }
            else if($_POST['type_']=='size')
            {
                $_data = $this->Super_admin_model->_delete_fashionsize($_POST['id_']);// insert to db
            }
            if($_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
            
        }
        
        public function get_color()
	{  
            //$this->check_Loginin();
            
                $get_data = $this->Super_admin_model->_get_color();
                
                //print("<pre>".print_r($get_data,true)."</pre>");die;

                $data_cate = array();  
                foreach($get_data as $row)  
                {  
                    $sub_array = array(); 
                     
                     
                    $sub_array[] = $row->colorname;
                    $sub_array[] = $row->colorcode;
                    
                     
                    $color = '
                                <div class="colorbox" style=" background-color:#'.$row->colorcode.' ;">
                                
                                </div>';
                        
                     $sub_array[] = $color;
                     
                    
                    $action = '<div class="btn-groupp btn-group-xs"> 

                                    <a href="'.site_url('super_admin/fashioncolor_update').'" id="'.$row->id.'" data-color_id="'.$row->id.'" data-color_name="'.$row->colorname.'" data-color_code="'.$row->colorcode.'" data-toggle="modal" data-target="#modal_color" class=" btn btn-xs btn-default color_edit"> Edit <i class="fa fa-pencil"></i></a>

                                    <a href="" id="'.$row->id.'" data-color_id="'.$row->id.'" data-color_name="'.$row->colorname.'" data-toggle="tooltip"  class=" btn btn-xs btn-danger color_del">Delete <i class="fa fa-times"></i></a>

                                </div>';
                        
                     $sub_array[] = $action;  
                     $data_cate[] = $sub_array;  
                } 
                //print("<pre>".print_r($data_prod,true)."</pre>");die; 
                $output = array(  
                     "draw"             =>     intval($_POST["draw"]),  
                     "recordsTotal"     =>     $this->Super_admin_model->_get_color_all(),  
                     "recordsFiltered"  =>     $this->Super_admin_model->_get_filtered_data_color(),  
                     "data"             =>     $data_cate  
                );  
                echo json_encode($output);  
                
	}
        
        public function addcolor() 
        {
            
            $data['title']     = 'New Color Form';
            $data['url']       = 'fashioncoloradd';
            $data['data_id']   = NULL;
            $data['data_name'] = NULL;
            $data['data_code'] = NULL;
            $this->load->view('super_admin/fashioncolor_add',$data);
        }
        
        public function fashioncolor_update() 
        {
            $data['title']   = 'Update Color Form';
            $data['url']       = 'fashioncolorupdate';
            $data['data_id']   = $_POST["color_id"];
            $data['data_name'] = $_POST["color_name"];
            $data['data_code'] = $_POST["color_code"]; 
            $this->load->view('super_admin/fashioncolor_add',$data);
        }
        
        public function check_color_name()
        {
                
            $data_check = array(  
                             'colorname'  =>  $_POST["save_name"] 
                             );
            $check_data = $this->Super_admin_model->_get_color_where($data_check);

            if($check_data)  
              {  
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => '<label class="text-danger"><i class="icon_close_alt2"></i> Color Name Already Register</label>'
                                        );
                echo json_encode($Json_resultSave);
                exit();
                //echo '<label class="text-danger"><i class="icon_close_alt2"></i> Email Already register</label>';  
              }  
            else  
              {  
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => '<label class="text-success"><i class="icon_check_alt2"></i> Color Name Available</label>'
                                        );
                echo json_encode($Json_resultSave);
                exit();
                //echo '<label class="text-success"><i class="icon_check_alt2"></i> Email Available</label>';  
              }   
        }
        
        public function fashioncoloradd() 
        {
            
            $data_New = array(  
                                'colorname'=> strtoupper($_POST['save_name']),
                                'colorcode'=> $_POST['save_code']
                             );
            $insert_data = $this->Super_admin_model->_insert_fashioncolor_data($data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        public function fashioncolorupdate() 
        {
            
            $data_New = array(  
                                'colorname'=> strtoupper($_POST['save_name']),
                                'colorcode'=> $_POST['save_code']
                             );
            //print("<pre>".print_r($data_New,true)."</pre>");die; 
            $insert_data = $this->Super_admin_model->_update_fashioncolor_data($_POST['id_'],$data_New);// insert to db
            if($insert_data)
                {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();

                } 
        }
        
        public function delete_fashioncolor() 
        {
            $_data = $this->Super_admin_model->_delete_fashioncolor($_POST['id_']);// insert to db
            if($_data)
                {
                    $Json_resultSave = array (
                                            'status' => '1',
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
        }
        public function get_promoduration_byid()
        {   $by_id = $_POST["bannertypeid"];
            if(isset($by_id) && !empty($by_id) ){
                
                $get_city = $this->Super_admin_model->get_promoduration_where($by_id); // call City by State
                //return $get_city;
                if(isset($get_city) && !empty($get_city) ){
                    echo '<option value="">Choose Promo Duration..</option>';
                    foreach($get_city as $row)
                    {
                        $price= "₦ ".number_format($row->price, 2);
                        echo '<option value="'.$row->durationname.'" data-durationprice="'.$price.'">'.$row->durationname.'</option>';
                    }
                }
                else{

                    echo '<option value="">Promo Duration not available</option>';
                }
                
            }
            else{
                
                echo '<option value="">Promo Duration not available</option>';
            }
        }
        public function save_promo_data() 
        {
            $cropimg_data = $_POST['cropimg'];
            // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ
           
            $cropimg_remove_array1 = explode(";", $cropimg_data);
            // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ
            
            $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
            // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ
            
            $cropimg = base64_decode($cropimg_remove_array2[1]);

            $imageName = 'promo_'.time() . '.png';
            
            $dir_to_save = "./assets/jollof_banners/thirdparty_banner/";
            if (!is_dir($dir_to_save)) {
              mkdir($dir_to_save);
            }
            file_put_contents($dir_to_save.$imageName, $cropimg);

            $input_date=$_POST['promo_date'];
            
            $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);

            if($promo_duration->durationdate == 'Day')
            {
                $datecount = $promo_duration->durationcount;
                $date_end= date('Y-m-d H:i:s',strtotime($datecount.' Day',strtotime($input_date)));
            }
            else if($promo_duration->durationdate == 'Week')
            {
                $datecount = $promo_duration->durationcount;
                $date_end= date('Y-m-d H:i:s',strtotime($datecount.' week',strtotime($input_date)));
            }
            else if($promo_duration->durationdate == 'Month')
            {
                $datecount = $promo_duration->durationcount;
                $date_end= date('Y-m-d H:i:s',strtotime($datecount.' month',strtotime($input_date)));
            }
            else if($promo_duration->durationdate == 'Year')
            {
                $datecount = $promo_duration->durationcount;
                $date_end= date('Y-m-d H:i:s',strtotime($datecount.' year',strtotime($input_date)));
            }
            /*$data_New = array(  
                                'cropimg'=>  $_POST['cropimg'],
                                'promotype'=>  $_POST["promotype"],
                                'cityid' =>  $_POST["r_city"],
                                'latitude'     =>  $_POST["latitude"],
                                'longitude'    =>  $_POST["longitude"],
                                'email'  =>  $_POST["r_email"],
                                'phone'  =>  $_POST["cell1"],
                                'phone2' =>  $_POST["cell2"]
                             );
             * 
             */
            $data_New = array(  
                                'imageurl'      =>  $_POST['promo_url'],
                                'imagename'     =>  $imageName,
                                'bannertypeid'  =>  $_POST["promotype"],
                                'promodurationid'=>  $_POST["promo_duration"],
                                'usertype'      =>  'thirdparty',
                                'username'      =>  $_POST['promo_name'],
                                'useremail'      =>  $_POST['promo_email'],
                                'userphone'      =>  $_POST['promo_phone'],
                                'payment'       =>  'FREE',
                                'startdate'     =>  $input_date,
                                'enddate'       =>  $date_end,
                                'status'        =>  0
                             );
            //$insert_data = true;//$this->Restaurant_admin_model->_update_restaurant_data($data_New);// insert to db
            $insert_data = $this->Generic->add($data_New, $tablename="img_ads");// insert to db

            if($insert_data) 
            {

                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
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
        
        

}
