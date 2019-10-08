<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('validate_session', 'session_manager');
            $this->load->model('user');
            $this->load->model('Generic');
            $this->load->model('orderitem');
            $this->load->model('utility');
            $this->load->model('order');
            $this->load->helper('text');
	}

    public function check_Loginin()
    {
        if(!isset($_SESSION['fashionAdmin']) || $_SESSION['fashionAdmin'] != true || $_SESSION['Type'] != 'fashion')
        {
            redirect('fashionadmin/authentication/login', 'refresh');   
        }
        if(!isset($_SESSION['Paymentid']) ||  $_SESSION['Paymentid'] = '')
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'You Need Complet your Store Details Before any Action is Performed ');
            redirect('fashionadmin/dashboard/settings', 'refresh');   
        }
    }

	public function index()
	{
        
	    $this->session_manager->validateFashion(__METHOD__);
	    
	    $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
	    $data['error_page'] = 'included/rest_included/error_page';
	    $data ['title']= 'Jollof:-Restaurant Dashboard';
	    $data ['icon']= 'jol_1.ico';
	    
            $order_params['orderstatus'] = 1; // this is to get total pending order count
	    $data['pending'] = $this->order->getAllCount($order_params);
	    
	    $order_params['orderstatus'] = 2; // this is to get total orders still in processing count
	    $data['processing'] = $this->order->getAllCount($order_params);
	    
	    $order_params['orderstatus'] = 3; // this is to get total pending order count
	    $data['delivery']  = $this->order->getAllCount($order_params);
	    
	    $order_params['orderstatus'] = 4; // this is to get total delivered order count
	    $data['delivered']  = $this->order->getAllCount($order_params);
	    
	    $order_params['orderstatus'] = 5; // this is to get total cancelled order count
	    $data['canceled']  = $this->order->getAllCount($order_params);
	    
	    $data['allorder']  = $this->order->getAllCount();
            
            $data['lastmouthsales'] = $this->orderitem->getFashionOrdersByIDlast_month();
            $data['mouthlysales'] = $this->orderitem->getFashionOrdersByDateAll_month();
            
            
            $data['topselling'] = $this->orderitem->getFashionTopSellingproduct();
            $data['recentorders'] = $this->orderitem->getFashionRecentOrders();
            
            //print("<pre>".print_r($this->orderitem->getFashionRecentOrders(),true)."</pre>");die;
            
            $data['mainmenu'] = "dashboard";
	    $data ['content_file']= 'dashboard';
	    
	    $this->load->view('fashion_admin/layout', $data);
	}
        
    public function accessdenied()
    {
        $this->load->view('fashion_admin/access_denied'); 
    }
    
    public function get_state()
    {
        $get_state = $this->Fashion_model->get_state_where(); // call state
        return $get_state;
    }

    
    public function settings()
    {
        //$this->check_Loginin();
        //$this->session_manager->validateFashion(__METHOD__);
        $bankList = bankList();
        
        $data['pageheader'] = "Merchant General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Settings</li>';
        $data['mainmenu'] = "settings";
        
        // Load all the Merchant info
        $data['banks'] =  bankList();//$this->Generic->getAll('paystackbanks',NULL, $fieldlist=null, null, null, $orderbyfield='name');
        $rest_info = $this->user->merchant_info($_SESSION['merchant_id']);
        $data['rest_state']= $this->user->get_allstate(); //call state
        $data['rest_city']= $this->user->get_city_bystate($rest_info->stateid); // call City by State
        $data['rest_info']= $rest_info;// call User info
        //print("<pre>".print_r($this->user->merchant_info($_SESSION['merchant_id']),true)."</pre>");die;
        $data ['content_file']= 'setting';
        $this->load->view('fashion_admin/layout', $data);
        
    }
    public function changepasswordform()
    {
        
        //$this->session_manager->validateFashion(__METHOD__);
        
        $data['pageheader'] = "User General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">changepassword</li>';
        $data['mainmenu'] = "changepassword";
        
        // Load all the User info
        $data['userinfo'] = $this->user->getByID($this->session->User_id);
        $data ['content_file']= 'changepassword';
        $this->load->view('fashion_admin/layout', $data);
    }
    public function myaccount()
    {
        
        //$this->session_manager->validateFashion(__METHOD__);
        
        $data['pageheader'] = "User General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">My Account</li>';
        $data['mainmenu'] = "myaccount";
        
        // Load all the Merchant info
        $data['userinfo'] = $this->user->getByID($this->session->User_id);
        $data ['content_file']= 'myaccount';
        $this->load->view('fashion_admin/layout', $data);
    }
    
    public function update_store_data() 
    {
        // Update the Store data  
        if (!empty($_FILES['store_logo']['name']) )
            {
                $fullpath = './assets/uploads/fashion_logo/';
                $picture=$_POST["store_logoimage"];

                unlink($fullpath.$picture);

                $file_name = "store_logo";  // name of image input from the view
                $newname = $_SESSION['merchant_id'].'_'.time();	 // Random Encryp new name save to app

                $config['upload_path'] = './assets/uploads/fashion_logo/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '1096';	
                $config['remove_spaces']  = TRUE;
                $config['overwrite'] = TRUE;
                $config['file_name'] = $newname;//$_POST["r_logoimage"];

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
                $exploded = explode('.',$_FILES['store_logo']['name']);
                $file_extn = strtolower(end($exploded));

                        $data_New = array(
                            'companyname'   =>  $_POST['store_name'],
                            'companydesc'   =>  $_POST["store_desc"],
                            'phone'         =>  $_POST["store_phone1"],
                            'phone2'        =>  $_POST["store_phone2"],
                            'address'       =>  $_POST['store_add'],
                            'stateid'       =>  $_POST["store_state"],
                            'cityid'        =>  $_POST["store_city"],
                            'latitude'      =>  $_POST["latitude"],
                            'longitude'     =>  $_POST["longitude"],
                            'logo'          =>  $newname.'.'.$file_extn,
                            'status'        =>  $_POST["store_status"]
                         );
            }
        else 
            {          
                $data_New = array(
                            'companyname'   =>  $_POST['store_name'],
                            'companydesc'   =>  $_POST["store_desc"],
                            'phone'         =>  $_POST["store_phone1"],
                            'phone2'        =>  $_POST["store_phone2"],
                            'address'       =>  $_POST['store_add'],
                            'stateid'       =>  $_POST["store_state"],
                            'cityid'        =>  $_POST["store_city"],
                            'latitude'      =>  $_POST["latitude"],
                            'longitude'     =>  $_POST["longitude"],
                            'status'        =>  $_POST["store_status"]
                         );
            }
            
            //$insert_data = $this->user->update_merchant_info($data_New);
            
            
            // slug library
            $config = array(
                            'table' => 'restaurants',
                            'id' => 'id',
                            'field' => 'slug',
                            'title' => 'title',
                            'replacement' => 'dash' // Either dash or underscore
                            );
            $this->load->library('slug', $config);
            $data_slug = array('slug' => $_POST["store_name"],);       // slug name of filed in db were ur url is stored
            $data_New['slug'] = $this->slug->create_uri($data_slug, $this->session->merchant_id );
            
            $merchant = $this->Generic->getByFieldSingle('id', $_SESSION['merchant_id'], $tablename='restaurants'); // Get url Id

            if(empty($merchant['bankCode']))
            {
                $_POST["percharge"] =10;
                $_POST['email'] = $merchant['email'];
                $response = createSubaccount($_POST);
                //print("<pre>".print_r($response,true)."</pre>");die;
                /*
                $response = $this->paystack->subaccount->create([
                                    'business_name'=>   $_POST["store_accountName"],
                                    'settlement_bank'=> $_POST["store_bankName"],
                                    'account_number'=>  $_POST["store_accountNo"],
                                    'percentage_charge'=>   '10',
                                    'primary_contact_email'=>   $merchant['email'],
                                    'primary_contact_name'=>   $_POST["store_name"],
                                    'primary_contact_phone'=>   $_POST["store_phone1"]
                                  ]);
                */
                if($response->status)
                {
                    $paystackbanksid =  $this->Generic->getByFieldSingle('name',$_POST["store_bankName"],'paystackbanks');
                    $data_New = array(
                                        'bankCode'    =>   $response->data->subaccount_code,
                                        'bankName'    =>   $response->data->settlement_bank,
                                        'accountNo'   =>   $response->data->account_number,
                                        'accountName' =>   $_POST['store_accountName'],
                                        'percharge'   =>   $response->data->percentage_charge,
                                        //'paystackbanksid '  =>  $paystackbanksid['id'],
                                        'paymenttype' => $_POST['store_paymenttype'],
                                        'perchargestatus'   =>   1
                                     );
                    $this->session->set_userdata('Paymentid', $response->data->subaccount_code);
                }
                else
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'Error Account details! Pls Provide a Valid Account Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Could not Resolve Account Name!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            }
            else
            {
                $_POST['email'] = $merchant['email'];
                $response = updateSubaccount($merchant['bankCode'],$_POST);
                /*
                $response = $this->paystack->subaccount->update([
                                'id'=> $merchant['bankCode'],
                                'business_name'=> $_POST["store_accountName"],
                                'settlement_bank'=> $_POST["store_bankName"],
                                'account_number'=>  $_POST["store_accountNo"],
                                'primary_contact_email'=>   $merchant['email'],
                                'primary_contact_name'=>   $_POST["store_name"],
                                'primary_contact_phone'=>   $_POST["store_phone1"]
                              ]);
                */
                if($response->status)
                {
                    $paystackbanksid =  $this->Generic->getByFieldSingle('name',$_POST["store_bankName"],'paystackbanks');
                    $data_New = array(
                                        'bankName'    =>   $_POST["store_bankName"],
                                        'accountNo'   =>   $_POST["store_accountNo"],
                                        'accountName' =>   $_POST['store_accountName'],
                                        'paymenttype' =>   $_POST['store_paymenttype']
                                        //'paystackbanksid '  =>  $paystackbanksid['id']
                                     );
                }
                else
                {
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'Error Account details! Account details are invalid');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'Could not Resolve Account Name!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
                    exit();
                }
            }
            //print("<pre>".print_r($response,true)."</pre>");die;
            // Update to db
            $insert_data = $this->Generic->edit($data_New, (int)$this->session->merchant_id, $tablename="restaurants"); 

            if($insert_data) 
            {
                //print("<pre>".print_r($data_New,true)."</pre>");die;
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Store Details Updated Successfull...');
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => 'Update successfull...'
                                        );
                echo json_encode($Json_resultSave);
                exit();
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Updating Store Details');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                echo json_encode($Json_resultSave);
                exit();
            }

    }

    public function passwordchange()
    {
        $pwd_c =   md5($_POST['old_password']);
        $pwd_check= $this->user->check_User_pwd($pwd_c);

        if($pwd_check)
         {
            $newpwd = md5($_POST['cnf_password']);
            
            $data_New = array(  
                        'password'  =>  $newpwd,
                        'forcepasswordchange'   => 0
                     );
            //$data_New=array('password' => $newpwd );
            
            $this->Generic->edit($data_New, (int)$this->session->User_id, $tablename="users"); 
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Password Change Successfull...');
            $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => 'Password Change .....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
         }
        else 
         {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'Old Password Incorrect Password....');
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Incorrect Password.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
         }
    }
    public function myaccountupdate()
    {
        
        $data_New=array(
                'firstname' => $_POST['user_firstname'],
                'lastname' => $_POST['user_lastname'],
                'phonenumber' => $_POST['user_phone']
                );
            
        $Update=$this->Generic->edit($data_New, (int)$this->session->User_id, $tablename="users"); 
            
        if($Update)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'User Info Updated Successfull...');
            $Json_resultSave = array (
                                    'status' => '1',
                                    'content' => 'User Info Updated Successfull .....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
         }
        else 
         {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', ' An error occur when Updating User Info Details');
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Incorrect User Info Updated .....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
         }
    }

    public function profile()
    {
        
                
        $data ['meta_keyword']= 'Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Minimal';
        $data['error_page'] = 'included/rest_included/error_page';
        $data ['title']= 'Jollof:- Profile Settings';
        $data ['icon']= 'jol_1.ico';
        
        
        
        $data['rest_gene']= $this->Fashion_model->get_user_info(); // call User info 
        
        //print("<pre>".print_r($this->Restaurant_admin_model->get_cuisaine_cate_byid(),true)."</pre>");die;
        
         $data ['sidebar']= 'included/fashion_included/sidebar_menu';
        $data ['header']= 'included/fashion_included/header_nav';
        $data ['tray']= 'included/fashion_included/header_tray';
        
        $data ['page_loader']= 'fashion_admin/profile';
                
		$this->load->view('fashion_admin/template', $data); 
    }
}
