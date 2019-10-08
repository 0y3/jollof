<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jpoints extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('validate_session', 'session_manager');
        $this->load->model('role_assignment');
        $this->load->model('utility');
        $this->load->model('Generic');
        $this->load->model('promo');
        $this->load->model('user');
        $this->load->model('oye/Email_model'); // call in the email model class
        $this->load->helper('text');
    }
    
    public function index($page=0)
    {
        $this->session_manager->validateJollofadmin("Jpoints::index");

         // Set the initial page data
        $data['pageheader'] = "Jpoints Management";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Jpoints Table</li>';
        $data['mainmenu'] = "jpoints";
        $data['submenu'] = "jpointsmanagement";
        
        $data['duration'] = $this->Generic->getAll($tablename='jpoints', $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield='jpoint');
        
        // Load stats
        //$order_params = $query_params;
        //print("<pre>".print_r($this->Generic->getAll($tablename='bannertype'),true)."</pre>");die;
        
        $data ['content_file']= 'jpoints';
        $this->load->view('jollof_admin/layout', $data);
    }

    // Controller function to display the add user form
    public function addform($id=null)
    {
        
        //$this->session_manager->validateFashion(__METHOD__);
        
        $data['admin_info'] = $this->promo->adminInfo();

        $data['mainmenu'] = "jpoints";
        $data['submenu'] = "jpointsmanagement";

        if(!empty($id) )
        {
            $durationinfo = $this->Generic->getByFieldSingle('id', $id, $tablename='jpoints');
            if($durationinfo)
            {
               
                $data['durationinfo'] = $durationinfo;
                $data['pageheader'] = "Edit Jpoints";
                $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/jpoints").'">Jpoints Table</a></li> <li class="breadcrumb-item active">Edit Jpoints</li>';

                //print("<pre>".print_r($durationinfo,true)."</pre>");die;
                $data ['content_file']= 'jpointsnew';
                $this->load->view('jollof_admin/layout', $data);
            }
            else
            {
                redirect('jollofadmin/jpoints');
            }
        }
        else
        {
            $data['pageheader'] = "Create New Jpoints";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("jollofadmin/jpoints").'">Jpoints Table</a></li> <li class="breadcrumb-item active">New Jpoints</li>';

           
            $data ['content_file']= 'jpointsnew';
            $this->load->view('jollof_admin/layout', $data);
        }
        
    }
    
    public function add ()
    {
        $data_check = array(
                            'minamount'   =>  $_POST['minamount']
                            //'maxamount'   =>  $_POST["maxamount"]
                         );
        $data_check1 = array(
                            'maxamount'   =>  $_POST["maxamount"]
                         );
        $data_check2 = array(
                            'jpoint'      =>  $_POST["jpoints"]
                         );
        $check_data  = $this->Generic->findByCondition($data_check, $tablename="jpoints");// insert to db
        $check_data1 = $this->Generic->findByCondition($data_check1, $tablename="jpoints");// insert to db
        $check_data2 = $this->Generic->findByCondition($data_check2, $tablename="jpoints");// insert to db

        if($check_data || $check_data1 || $check_data2 )  
        { 
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Jpoints Info Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Jpoints Info Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                            'jpoint'      =>  $_POST["jpoint"],
                            'minamount'   =>  $_POST['minamount'],
                            'maxamount'   =>  $_POST["maxamount"],
                            'status'        =>  1
                             );
            $insert_data = $this->Generic->add($data_New, $tablename="jpoints");// insert to db

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Jpoints Details Saved');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => $imageName
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Adding New Jpoints Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/jpoints');
    }

    public function edit ()
    {

        $data_check = array(
                            'id !='      =>  $_POST["id"],
                            'minamount'   =>  $_POST['minamount'],
                         );
        $data_check1 = array(
                            'id !='      =>  $_POST["id"],
                            'maxamount'   =>  $_POST["maxamount"]
                         );
        $data_check2 = array(
                            'id !='      =>  $_POST["id"],
                            'jpoint'      =>  $_POST["jpoint"]
                         );

        $data_check3 = array(
                            'id !='      =>  $_POST["id"],
                            'maxamount'   =>  $_POST["minamount"]
                         );
        $data_check4 = array(
                            'id !='      =>  $_POST["id"],
                            'minamount'   =>  $_POST["maxamount"]
                         );
        $check_data  = $this->Generic->findByCondition($data_check, $tablename="jpoints");// insert to db
        $check_data1 = $this->Generic->findByCondition($data_check1, $tablename="jpoints");// insert to db
        $check_data2 = $this->Generic->findByCondition($data_check2, $tablename="jpoints");// insert to db
        $check_data3 = $this->Generic->findByCondition($data_check3, $tablename="jpoints");// insert to db
        $check_data4 = $this->Generic->findByCondition($data_check4, $tablename="jpoints");// insert to db

        if($check_data || $check_data1 || $check_data2 || $check_data3 || $check_data4)  
        {
            $this->session->set_flashdata('warning','warning');
            $this->session->set_flashdata('message','Jpoints Info Already Register');
            $Json_resultSave = array (
                                  'status' => '0',
                                  'content' => 'Jpoints Info Already Register'
                                  );
            echo json_encode($Json_resultSave);
        }
        else
        {
            $data_New = array(  
                            'minamount'   =>  $_POST['minamount'],
                            'maxamount'  =>  $_POST["maxamount"],
                            'status'  =>  $_POST["status"]
                             );

            $data_Where = array(  
                                'id'         =>  $_POST["id"]
                             );
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="jpoints"); 

            if($insert_data) 
            {
                    $this->session->set_flashdata('success','success');
                    $this->session->set_flashdata('message', 'Jpoints Details Updated');
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => ''
                                            );
                    echo json_encode($Json_resultSave);
            }
            else 
            {       
                    $this->session->set_flashdata('error','error');
                    $this->session->set_flashdata('message', 'An error occur when Updating Jpoints Details');
                    $Json_resultSave = array (
                                            'status' => '0',
                                            'content' => 'There was a problem!! Pls Try Again.....'
                                            );
                    echo json_encode($Json_resultSave);
            }
        }
        redirect('jollofadmin/Jpoints');
    }

    // Controller function to delete a specified user
    public function delete()
    {
        $by_id = $_POST["id"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="jpoints");
        if($_data)
        {   
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Jpoint Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            //exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Jpoint');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            //exit();
        }
    }
     

    
    
    
}
