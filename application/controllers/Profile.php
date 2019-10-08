<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('oye/Profile_model');
        $this->load->model('oye/Restaurant_admin_model');
        $this->load->model('oye/Checkout_model');
        $this->load->model('oye/Super_admin_model');
        $this->load->helper('text');
	}
	
	public function index()
	{       
		$this->profile();
	}
        
    public function check_Loginin()
	{
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true || $_SESSION['Type'] != 'User')
        {
            //$this->index(); 
            redirect('', 'refresh');	
        }
		
	}
	
	
	public function order_history()
	{   
        $this->check_Loginin();
        $data ['icon']      = 'jol_1.ico';
        $data ['titel']     = 'Profile Order Histor Jollof:-Cuisines';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['allData']   = $this->Profile_model->order_hst();
        //print("<pre>".print_r($this->Profile_model->order_hst(),true)."</pre>"); die;
        $this->load->view('included/header', $data);
        $this->load->view('oye_mainpage_v/profile_order', $data);
        $this->load->view('included/footer', $data);
	}
        
    public function order_history_view()
	{   
        $this->check_Loginin();
        $order_id = $this->uri->segment(3);
        
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        if(is_numeric($order_id))
        {
            $alldata =$this->Profile_model->order_hst_list($order_id);
            //print("<pre>".print_r($alldata,true)."</pre>"); die;
            if (!empty($alldata))
            {
                $data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Profile Order Histor Jollof:-Cuisines';

                $data['allData'] =$alldata;
                $this->load->view('included/header', $data);
                $this->load->view('oye_mainpage_v/profile_order_view', $data);
                $this->load->view('included/footer', $data);
            }
            else
            {
                redirect('profile/order_history');
            }
        }
        else
        {
            redirect('profile/order_history');
        }
            
	}
    public function confirmorder()
    {
        $this->check_Loginin();
        $order_id = $this->uri->segment(3);
        
        $data_update = $this->Profile_model->_update_confirm_ord($order_id);
        
        if($data_update)
        {
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
    }
        
	public function profile()
	{
        $this->check_Loginin();
        
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Profile Jollof:-Cuisines';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $userid = $_SESSION['User_id'];

        $data['allData'] = $this->Profile_model->profile($userid);
        $data['add_list'] = $this->get_address();
        
        $this->load->view('included/header', $data);
        $this->load->view('oye_mainpage_v/profile', $data);
        $this->load->view('included/footer', $data);
	}
        
    public function Update_Profile()
    {
        
        $userid = $_SESSION['User_id']; 
        $UpdateData = $this->Profile_model->_Update_Profile($userid);
        if($UpdateData)
        {
            $mssg = "Profile Details Updated Successfully.";
            $this->session->set_flashdata('msg_g', $mssg);
            redirect('profile/refresh');
        }
        else
        {
                redirect(site_url('profile'), 'refresh');
        }
		
	}
        
    public function get_address()
    {  
        $this->check_Loginin();
        
        $by_userid = $this->session->userdata('User_id');
        
        if(isset($_POST["id"]) && !empty($_POST["id"]) )
        {
            $get_addres = $this->Profile_model->get_address_where($_POST["id"]); // call City by address
            
            $output = '<div class=" panel-primary">
                                    <div class="panel-body">
                                        
                                        <table class="table">
                                            <tbody class="table">
                                                
                                                <tr class="table-bordered">
                                                    <td class="heading-table" style=" width: 5%"><i class="fa fa-user" aria-hidden="true"></i></td>
                                                    <td class="heading-name" style=" width: 95%">
                                                        <span><b> '.$get_addres[0]->firstname.'</b></span>
                                                        <span style=" padding-left:10px;"><b> '.$get_addres[0]->lastname.'</b></span>
                                                    </td>
                                                </tr>
                                                
                                                <tr class="table-bordered">
                                                    <td class="heading-table" style=" width: 5%"><i class="fa fa-map-marker"></i> </td>
                                                    <td class="heading-name" style=" width: 95%">
                                                        '. $get_addres[0]->address.', <br>
                                                        '. $get_addres[0]->cityname.',<br>
                                                        '. $get_addres[0]->statename.'
                                                    </td>
                                                </tr>
                                                 <tr class="table-bordered">
                                                    <td class="heading-table" style=" width: 5%"><i class="fa fa-phone" aria-hidden="true"></i></td>
                                                    <td class="heading-name" style=" width: 95%">
                                                        <span>'.$get_addres[0]->phone.'</span>
                                                    </td>
                                                </tr>
                                                
                                                <tr class="table-bordered">
                                                    <td class="heading-table" style=" width: 5%"><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                                    <td class="heading-name" style=" width: 95%">
                                                        <span>'.$get_addres[0]->phone2.'</span>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>';
            echo $output;
        }
        else
        {
            $get_addres = $this->Profile_model->get_address_where($by_id=FALSE); // call City by State
        }
        
        return $get_addres;
        
        
    }
        
    public function refradd() 
    {
        $this->check_Loginin();
        $get_add = $this->Profile_model->get_address_where($by_id=FALSE); // call address
            
        foreach($get_add as $row)
        {
            echo '<option value="'.$row->id.'">'.$row->address.'</option>';
        }
    }
        
    public function password()
	{
		$this->load->view('oye_mainpage_v/profile_change_pwd');
	}
        
    public function password_change()
    {
        $pwd_c =   md5($_POST["oldpwd"]);
        $pwd_check= $this->Profile_model->check_User_pwd($pwd_c);
        
        if($pwd_check)
         {
            $newpwd = md5($_POST["cfmpwd"]);
            $pwd_save = $this->Profile_model->Update_pwd($newpwd);
            $Json_resultSave = array (
                                    'status' => '1'
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
    
    public function table_reservation()
	{
        $this->check_Loginin();
        
        $data ['icon']      = 'jol_1.ico';
        $data ['titel']= 'Table Reservation Jollof:-Cuisines';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['allData']   = $this->Profile_model->table_reservation_hst($by_id=FALSE);
        //print("<pre>".print_r($get_data,true)."</pre>");
        //die;
        $this->load->view('included/header', $data);
        $this->load->view('oye_mainpage_v/profile_table', $data);
        $this->load->view('included/footer', $data);
	}
        
    public function table_reservation_view()
	{   
        $this->check_Loginin();
        $table_id = $this->uri->segment(3);
        
        $data['info']= $this->Super_admin_model->get_admin_info();
        if(is_numeric($table_id))
        {
            $alldata =$this->Profile_model->table_reservation_hst($table_id);
            //print("<pre>".print_r($alldata,true)."</pre>");
            //die;
            if (!empty($alldata))
            {
        
                $data ['icon']= 'jol_1.ico';
                $data ['titel']= 'Table Reservation Histor Jollof:-Cuisines';

                $data['allData'] =$alldata;
                $this->load->view('included/header', $data);
                $this->load->view('oye_mainpage_v/profile_table_view', $data);
                $this->load->view('included/footer', $data);
            }
            else
            {
                redirect('profile/table_reservation');

            }
        }
        else
        {
            redirect('profile/table_reservation');

        }
            
	}
    
    public function cancel_table() 
    {
        $this->check_Loginin();
        $table_id = $_POST['tableid'];
        
        $data_update = $this->Profile_model->_update_cancel_table($table_id);
        
        if($data_update)
        {

            $Json_resultSave = array (
                                    'status' => '1',
                                    );
            echo json_encode($Json_resultSave);
            exit();

        } 
            
    }
        
}
