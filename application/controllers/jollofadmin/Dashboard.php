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

    public function index()
    {
        if(!isset($_SESSION['jollofAdmin']) || $_SESSION['jollofAdmin'] != true || $_SESSION['Type'] != 'admin')
        {
            redirect('jollofadmin/authentication/login', 'refresh');   
        }
        //$this->session_manager->validateJollofadmin(__METHOD__);
        
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
            
        $data['lastmouthsales'] = $this->orderitem->getCuisineOrdersByIDlast_month();
        $data['mouthlysales'] = $this->orderitem->getCuisineOrdersByDateAll_month();
        
        
        $data['topselling'] = $this->orderitem->getCuisineTopSellingproduct();
        $data['recentorders'] = $this->orderitem->getCuisineRecentOrders();
        
        //print("<pre>".print_r($this->orderitem->getCuisineTopSellingproduct(),true)."</pre>");die;
        
        $data['mainmenu'] = "dashboard";
        $data ['content_file']= 'dashboard';
        
        $this->load->view('jollof_admin/layout', $data);
    }
        
    public function accessdenied()
    {
        $this->load->view('jollof_admin/access_denied'); 
    }
    
    public function get_state()
    {
        $get_state = $this->Fashion_model->get_state_where(); // call state
        return $get_state;
    }

    
    public function othersettings()
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
        
        $data['pageheader'] = "Admin General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Settings</li>';
        $data['mainmenu'] = "settings";
        $data['submenu'] = "othersettings";
        
        // Load all the Merchant info
        $admininfo = $this->user->admin_info();
        $data['admininfo']= $admininfo;// call admin info

        $data ['content_file']= 'setting';
        $this->load->view('jollof_admin/layout', $data);
        
    }
    public function changepasswordform()
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);
        
        $data['pageheader'] = "User General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">changepassword</li>';
        $data['mainmenu'] = "changepassword";
        
        // Load all the User info
        $data['userinfo'] = $this->user->getAdminByID($this->session->User_id);
        $data ['content_file']= 'changepassword';
        $this->load->view('jollof_admin/layout', $data);
    }
    public function myaccount()
    {
        //$this->session_manager->validateJollofadmin(__METHOD__);
        
        $data['pageheader'] = "User General Settings";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">My Account</li>';
        $data['mainmenu'] = "myaccount";
        
        // Load all the Merchant info
        $data['userinfo'] = $this->user->getAdminByID($this->session->User_id);
        $data ['content_file']= 'myaccount';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    

    public function passwordchange()
    {
        $pwd_c =   md5($_POST['old_password']);
        $data_New = array(  
                    'id' => (int)$this->session->User_id,
                    'password' => $pwd_c,
                         );
        $pwd_check =  $this->Generic->findByCondition($data_New,'admin_users');

        if($pwd_check)
         {
            $newpwd = md5($_POST['cnf_password']);
            
            $data_New=array('password' => $newpwd,'forcepasswordchange'   => 0 );
            
            $this->Generic->edit($data_New, (int)$this->session->User_id, $tablename="admin_users"); 
            
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
            
        $Update=$this->Generic->edit($data_New, (int)$this->session->User_id, $tablename="admin_users"); 
            
        if($Update)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'User Info Updated Successfull...');
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
            $this->session->set_flashdata('message', ' An error occur when Updating User Info Details');
            $Json_resultSave = array (
                                    'status' => '0',
                                    'content' => 'Incorrect Password.....'
                                    );
            echo json_encode($Json_resultSave);
            exit();
         }
    }

    public function get_city_byid()
    {   $by_id = $_POST["stateid"];
        if(isset($by_id) && !empty($by_id) ){
            
            
            $this->load->model('oye/Restaurant_admin_model');
            $get_city = $this->Restaurant_admin_model->get_allcity_where($by_id); // call City by State
            //return $get_city;
            $cityopt='<select name="cityid" class="select-chosen form-control" data-placeholder=" " value="" style="width: 250px;" required="">
                      <option value=""> --- Select City --- </option>';
                            
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

    
}
