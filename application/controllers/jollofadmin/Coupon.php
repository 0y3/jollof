<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('system_modules');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('user');
        $this->load->model('oye/Email_model'); // call in the email model class
        $this->load->model('user_role');
        $this->load->helper('text');
    }
    
    public function index($page=0)
    {
        $this->session_manager->validateJollofadmin(__METHOD__);
        //print_r($_SESSION);
        $data['pageheader'] = "Manage Coupon";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Coupon</li>';
        $data['mainmenu'] = "voucher";//"users";
        $data['submenu'] = "coupon";
        
        // Load all the users
        $data['users'] = $this->user->getAllAdmin();
        $data_ = array(
                'isdeleted' => 0
            ); 
        $data['coupons'] = $this->Generic->findByCondition($data_,'coupon', $orderbyfield='createdat','desc');
        
        $data ['content_file']= 'coupon-list';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    // Controller function to display the add user form
    public function addform()
    {
        
        $this->session_manager->validateJollofadmin("Coupon::index");
        
        $data['cate']= $this->user->userroleAdmin();
        
        $data['title_type']= 'New Coupon Form';
        $data['pageheader'] = "Add New Coupon";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/coupon").'">Coupon</a></li> <li class="breadcrumb-item active">Add New Coupon</li>';
        $data['mainmenu'] = "voucher";
        $data['submenu'] = "coupon";


        $data ['content_file']= 'coupon_new';
        $this->load->view('jollof_admin/layout', $data);
    }
    
    
    // Controller function to display the edit user form
    public function editform($id=null)
    {
        $this->session_manager->validateJollofadmin("Coupon::index");
        
        if(!empty($id) )
        {
            $data['title_type']= 'Edit Coupon Form';
            $data['couponinfo'] = $this->Generic->getByFieldSingle('id', $id, $tablename='coupon');//$this->user->getByID($id);
            //print("<pre>".print_r($this->Generic->getByFieldSingle('id', $id, $tablename='coupon'),true)."</pre>");die;
            $data ['content_file']= 'coupon_new';
            $data['pageheader'] = "Edit coupon";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/coupon").'">Coupon</a></li> <li class="breadcrumb-item active">Edit coupon</li>';
            $data['mainmenu'] = "voucher";
            $data['submenu'] = "coupon";
            $this->load->view('jollof_admin/layout', $data);
        }
        else
        {
            redirect('jollofadmin/coupon');
        }
        
        
    }
    
    
    // Controller fuction to save the user
    public function save()
    {

        $data_check = array(  
                                 'couponcode'  =>  $this->input->post('couponcode'),// adding the Encryp name and the extention file 2gether
                                 'isdeleted' =>  0
                                 );
        $check_data =  $this->Generic->findByCondition($data_check,'coupon');


        if($check_data)  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message', 'Coupon Already Register!!! Try Another Coupon Code');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Coupon Already Register'
                                  );
            //echo json_encode($Json_resultSave);
            //exit();
            redirect('jollofadmin/coupon/addform');
        }
        else
        {
            $data_New = array(  
                                    'couponname'    => $this->input->post('couponname'),
                                    'couponcode'    => $this->input->post('couponcode'),
                                    'coupondiscount'=> $this->input->post('coupondiscount'),
                                    'minamount'     => $this->input->post('minamount'),
                                    'couponforguestalso'    => $this->input->post('couponguest'),
                                    'numofuserspercoupon'   => $this->input->post('usagecoupon'),
                                    'couponusageperuser'    => $this->input->post('usageuser'),
                                    'datestart'     => $this->input->post('couponstartdate'),
                                    'dateend'      => $this->input->post('couponenddate'),
                                    'status'        => 1
                                 );

            $coupontype =$this->input->post('coupontype');
            if($coupontype==1)
            {
                $data_New['couponisamount'] = 1;
                $data_New['couponisper'] = 0;
            }
            elseif($coupontype==2)
            {
                $data_New['couponisper'] = 1;
                $data_New['couponisamount'] = 0;
            }
           // print("<pre>".print_r($data_New,true)."</pre>");die;
            // insert to db
            $insert_data = $this->Generic->add($data_New, $tablename="coupon"); 

            if($insert_data)
            {

                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'New Coupon Added,');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                redirect('jollofadmin/coupon');
            }
            else 
            {
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New Coupon');
                $Json_resultSave = array (
                                            'status' => '0'
                                            );
                    echo json_encode($Json_resultSave);
                redirect('jollofadmin/coupon/addform');
            }
        }
    }
    
    // Controller function to edit a specified user
    public function edit($id=null)
    {
        $data_New = array(  
                        'couponname'    => $this->input->post('couponname'),
                        'coupondiscount'=> $this->input->post('coupondiscount'),
                        'minamount'     => $this->input->post('minamount'),
                        'couponforguestalso'    => $this->input->post('couponguest'),
                        'numofuserspercoupon'   => $this->input->post('usagecoupon'),
                        'couponusageperuser'    => $this->input->post('usageuser'),
                        'datestart'     => $this->input->post('couponstartdate'),
                        'dateend'      => $this->input->post('couponenddate'),
                        'status'        => $this->input->post('status')
                     );
        
        $data_Where = array(  
                        'id'    => $id
                     );

        //$insert_data = $this->user->_updateuser($data_New);
        // insert to db
        $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="coupon"); 

        //print("<pre>".print_r($insert_data,true)."</pre>");die;
        if($insert_data)
            {
                $this->session->set_flashdata('success','Coupon Info Updated');
                $this->session->set_flashdata('message', 'Coupon Info Updated');
                $Json_resultSave = array (
                                        'status' => '1'
                                        );
                echo json_encode($Json_resultSave);
                redirect('jollofadmin/coupon');

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Coupon Info');
            $Json_resultSave = array (
                                        'status' => '0'
                                        );
                echo json_encode($Json_resultSave);
                redirect('jollofadmin/coupon');
        }
    }
    // Controller function to delete a specified user
    public function delete($id=null)
    {
        if(isset($id) && !empty($id))
        {
            $by_id=$id;
        }
        else
        {
            $by_id = $_POST['_id'];
        }
        //$_data = $this->user->_deleteuser($by_id);

        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="coupon");
        if($_data)
        {
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Coupon Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleting Coupon');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
        }

        redirect('jollofadmin/coupon');
    }
    
    public function couponcode()
    {
            $token='COU-'.$this->utility->generate_random_string(7);
            
            
            //print("<pre>".print_r($sendemail,true)."</pre>");die;
            if($token)
            {
                $Json_resultSave = array (
                                        'status' => '1',
                                        'code' => $token
                                        );
                echo json_encode($Json_resultSave);
            }
            else
            {
                $Json_resultSave = array (
                                        'status' => '0',
                                        'code' => ''
                                        );
                echo json_encode($Json_resultSave);
            }
            
        //return $token;
    }

}
