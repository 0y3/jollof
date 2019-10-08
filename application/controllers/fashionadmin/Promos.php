<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promos extends CI_Controller {
    
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
        

        $this->session_manager->validateFashion(__METHOD__);
        //print_r($_SESSION);
        $data['pageheader'] = "Manage Users";
        $data['breadCrumbs'] = '<li class="breadcrumb-item active">Users</li>';
        $data['mainmenu'] = "promos";
        
        $banntypeid = array(8,9);
        // Load all the promos
        $data['promos'] = $this->promo->getAll($banntypeid);
        
        $data ['content_file']= 'promos';
        $this->load->view('fashion_admin/layout', $data);
    }
    
    // Controller function to display the add user form
    public function addform()
    {
        
        //$this->session_manager->validateFashion(__METHOD__);
        
        $data['cate'] = $this->promo->promoSliderOption($by_id=null);
        $data['promo_duration'] = $this->promo->promoDurationOption();
        $data['admin_info'] = $this->promo->adminInfo();
        
        $data['title_type']= 'New Promo Form';
        $data ['content_file']= 'promo_new';
        $data['pageheader'] = "Add Promo";
        $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/promos").'">Promos</a></li> <li class="breadcrumb-item active">Add Promo</li>';
        $data['mainmenu'] = "promos";
        $this->load->view('fashion_admin/layout', $data);
    }

    
    // Controller function to display the edit user form
    public function editform($id=null)
    {
        

        $this->session_manager->validateFashion(__METHOD__);
        
        if(!empty($id) )
        {
            $data['cate'] = $this->promo->promoSliderOption($by_id=null);
            $data['promo_duration'] = $this->promo->promoDurationOption();
            $data['admin_info'] = $this->promo->adminInfo();
            $promoinfo = $this->promo->getByID($id);
            $data['promoprice'] = $this->promo->promoDurationByid($promoinfo->bannertypeid);
            $data['promoinfo'] = $promoinfo;
            
            //print("<pre>".print_r($this->promo->promoDurationByid($promoinfo->bannertypeid),true)."</pre>");die;
            
            $data['title_type']= 'Edit Promo Form';
            $data ['content_file']= 'promo_new';
            $data['pageheader'] = "Edit Promo";
            $data['breadCrumbs'] = '<li class="breadcrumb-item"><a href="'.site_url("fashionadmin/promos").'">Promo</a></li> <li class="breadcrumb-item active">Edit Promo</li>';
            $data['mainmenu'] = "promos";
            $this->load->view('fashion_admin/layout', $data);
        }
        else
        {
            redirect('fashionadmin/promo');
        }
        
        
    }

    public function enddate ()
    {
        $date_end='';
        $input_date=$_POST['startdate'];
        
        $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);

        if($promo_duration->durationdate == 'Day')
        {
            $datecount = $promo_duration->durationcount;
            $date_end= date('Y-m-d ',strtotime($datecount.' Day',strtotime($input_date)));
        }
        else if($promo_duration->durationdate == 'Week')
        {
            $datecount = $promo_duration->durationcount;
            $date_end= date('Y-m-d ',strtotime($datecount.' week',strtotime($input_date)));
        }
        else if($promo_duration->durationdate == 'Month')
        {
            $datecount = $promo_duration->durationcount;
            $date_end= date('Y-m-d ',strtotime($datecount.' month',strtotime($input_date)));
        }
        else if($promo_duration->durationdate == 'Year')
        {
            $datecount = $promo_duration->durationcount;
            $date_end= date('Y-m-d',strtotime($datecount.' year',strtotime($input_date)));
        }
        echo $date_end;
    }

    // Controller fuction to save the user
    public function save()
    {
        // save the new Promo data  table //
        $cropimg_data = $_POST['cropimg'];
        // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array1 = explode(";", $cropimg_data);
        // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
        // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg = base64_decode($cropimg_remove_array2[1]);

        $imageName = 'promo_'.time() . '.png';

        $dir_to_save = "./assets/jollof_banners/fashion_banner/";
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
        
        /*
        $input_date=$_POST['promo_date'];
        $date_start=date("Y-m-d H:i:s",strtotime($input_date));
        
        $promo_duration = $this->promo->promodurationinfo($_POST['promo_duration']);
        
        if($promo_duration->durationname == '1 Day'){$date_end= date('Y-m-d H:i:s',strtotime('+1 day',$input_date));}
        else if($promo_duration->durationname == '1 Week') {$date_end= date('Y-m-d H:i:s',strtotime('+1 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+1 month',strtotime($input_date)));}
        else if($promo_duration->durationname == '3 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+3 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '6 Month'){$date_end= date('Y-m-d H:i:s',strtotime('+6 week',strtotime($input_date)));}
        else if($promo_duration->durationname == '1 Year') {$date_end= date('Y-m-d H:i:s',strtotime('+1 year',strtotime($input_date)));}
        */

        $data_New = array(  
                            'imageurl'      =>  $_POST['promo_url'],
                            'imagename'     =>  $imageName,
                            'bannertypeid'  =>  $_POST["promotype"],
                            'promodurationid'=>  $_POST["promo_duration"],
                            'usertype'      =>  $this->session->Type,
                            'merchantid'    =>  $this->session->merchant_id,
                            'userid'        =>  $this->session->User_id,
                            'username'      =>  $this->session->companyname,
                            'payment'       =>  'FREE',
                            'startdate'     =>  $input_date,
                            'enddate'       =>  $date_end,
                            'status'        =>  0
                         );
        $insert_data = $this->Generic->add($data_New, $tablename="img_ads");// insert to db

        if($insert_data) 
        {
                $this->session->set_flashdata('success','success');
                $this->session->set_flashdata('message', 'Promo Saved');
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $imageName
                                        );
                //echo json_encode($Json_resultSave);
                //exit();
        }
        else 
        {       
                $this->session->set_flashdata('error','error');
                $this->session->set_flashdata('message', 'An error occur when Adding New Promo');
                $Json_resultSave = array (
                                        'status' => '0',
                                        'content' => 'There was a problem!! Pls Try Again.....'
                                        );
                //echo json_encode($Json_resultSave);
                //exit();
        }
        redirect('fashionadmin/promo');
    }
    
    // Controller function to edit a specified user
    public function edit()
    {
        if(isset($_POST['cropimg'])&& !empty($_POST['cropimg']))
        {
        // save the new Promo data  table //
        $cropimg_data = $_POST['cropimg'];
        // smth like:- data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array1 = explode(";", $cropimg_data);
        // smth like:- base64,iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg_remove_array2 = explode(",", $cropimg_remove_array1[1]);
        // smth like:- iVBORw0KGgoAAAANSUhEUgAABaoAAAH0CAYAAADc0hrzAAAgAElEQVR4Xmy9Sax0a5aetWLv6JvT/P9t8ubNyqYyCyxbLmyMSypsIbCFZBDyDBkDLldhWTBhwgwJiQETJIYuMWcMEkhGmAmdBEJ

        $cropimg = base64_decode($cropimg_remove_array2[1]);

        $imageName = 'promo_'.time() . '.png';

        $dir_to_save = "./assets/jollof_banners/fashion_banner/";
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
        
        $data_New = array(  
                            'imageurl'      =>  $_POST['promo_url'],
                            'imagename'     =>  $imageName,
                            'bannertypeid'  =>  $_POST["promotype"],
                            'promodurationid'=>  $_POST["promo_duration"],
                            'usertype'      =>  $this->session->Type,
                            'merchantid'    =>  $this->session->merchant_id,
                            'userid'        =>  $this->session->User_id,
                            'username'      =>  $this->session->companyname,
                            'payment'       =>  'FREE',
                            'startdate'     =>  $input_date,
                            'enddate'       =>  $date_end,
                            'status'        =>  0
                         );
        }
        else
        {
        
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
        
        
            $data_New = array(  
                                'imageurl'      =>  $_POST['promo_url'],
                                'bannertypeid'  =>  $_POST["promotype"],
                                'promodurationid'=>  $_POST["promo_duration"],
                                'payment'       =>  'FREE',
                                'startdate'     =>  $input_date,
                                'enddate'       =>  $date_end,
                                'status'        =>  0
                             );

            $data_Where = array(  
                            'id'    => $this->input->post('promoid')
                         );

            // update to db
            $insert_data = $this->Generic->editByConditions($data_New, $data_Where , $tablename="img_ads"); 
        
        }
        if($insert_data)
            {
                $this->session->set_flashdata('success','Promo Info Updated');
                $this->session->set_flashdata('message', 'Promo Info Updated');
                $Json_resultSave = array ('status' => '1');
                //echo json_encode($Json_resultSave);
                //exit();

            }
        else {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Updated Promo Info');
                $Json_resultSave = array ('status' => '0');
                //echo json_encode($Json_resultSave);
                //exit();
        }
        redirect('fashionadmin/promo');
    }
    // Controller function to delete a specified user
    public function delete()
    {
        $by_id = $_POST["_id"];
        $picture=$_POST["_name"];
        
        
        // delete to db
        $_data =$this->Generic->delete($by_id, $tablename="img_ads");
        if($_data)
        {
            // delete image from folder
            $dir_to_delete = './assets/jollof_banners/fashion_banner/';
            unlink($dir_to_delete.$picture);
            
            $this->session->set_flashdata('success','success');
            $this->session->set_flashdata('message', 'Promo Deleted');
            $Json_resultSave = array ('status' => '1');
            echo json_encode($Json_resultSave);
            exit();
        }
        else 
        {
            $this->session->set_flashdata('error','error');
            $this->session->set_flashdata('message', 'An error occur when Deleted Promo');
            $Json_resultSave = array ('status' => '0');
            echo json_encode($Json_resultSave);
            exit();
        }
        redirect('fashionadmin/promo');
    }
    
    
    public function promoDurationByid()
    {   $by_id = $_POST["bannertypeid"];
        if(isset($by_id) && !empty($by_id) ){

            $get_duration = $this->promo->promoDurationByid($by_id); 
            if(isset($get_duration) && !empty($get_duration) ){
                echo '<option value="">Choose Promo Duration..</option>';
                foreach($get_duration as $row)
                {
                    $price= "₦ ".number_format($row->price, 2);
                    echo '<option value="'.$row->promodurationid.'" data-durationprice="'.$price.'">'.$row->durationname.'</option>';
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
    
    
    
}
