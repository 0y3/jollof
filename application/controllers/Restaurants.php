<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurants extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
                $this->load->model('oye/Restaurants_model');
                $this->load->model('oye/Restaurant_admin_model');
                $this->load->model('oye/Profile_model');
                $this->load->model('oye/Super_admin_model');
                $this->load->model('oye/Email_model'); // call in the emai;l model class
                $this->load->model('user');
                $this->load->helper('text');
                $this->load->helper('thumb');
	}
	
	public function index()
	{       $resta_id=null;
                $statename=null;$cityname=null;
                $stateid=null;$cityid=null;
                $searchbox=null;
                $limit=10;
                
                $data['info']= $this->Super_admin_model->get_admin_info();
                $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
                
                if(isset($_POST["statelocation"]))
                {  
                    
                    $stateid = $_POST["statelocation"];
                    $statename=$this->Restaurants_model->get_state_where($stateid);
                    
                }
                if(isset($_POST["citylocation"]))
                {  
                    $cityid  = $_POST['citylocation']; 
                    $cityname=$this->Restaurants_model->get_city_where($cityid);
                    
                }
                if(isset($_POST["search"]))
                {  
                    $searchbox  = $_POST['search'];
                    
                }
                
                
                $get_all_resta=$this->Restaurants_model->_allrestaurants($resta_id, $limit, $loadmore =FALSE,$stateid ,$cityid,$searchbox); 
                //print("<pre>".print_r($get_all_resta,true)."</pre>");die;
                if (!empty($get_all_resta)){
                
                    $data['get_all_resta'] = $get_all_resta;
                    $data['error'] = null;
                }
                else {

                    $get_all_resta=  $this->Restaurants_model->_allrestaurants($resta_id=FALSE, $limit, $loadmore =FALSE,$stateid=FALSE ,$cityid=FALSE,$searchbox=FALSE);
                    $data['get_all_resta'] = $get_all_resta;
                    if(isset($_POST["search"]))
                    {  
                        $error_msg='<div class="alert alert-warning alert-dismissable fade in text-center" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <h3><strong class="text-danger">Oh Snap!</strong>
                                        Sorry No Key Words Search Set Yet For....</h3>
                                        <i class="fa fa-cutlery text-danger "></i> <b class="text-primary">' .$_POST['search'].' </b> 
                                        <br>
                                        Please check our Other restaurant below:
                                    </div>';
                        
                    }
                    else{
                        $error_msg='<div class="alert alert-warning alert-dismissable fade in text-center" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <h3><strong class="text-danger">Oh Snap!</strong>
                                        Sorry No restaurants in this location Yet.</h3>
                                        <i class="fa fa-map-marker text-danger"></i> <b class="text-primary">'.$statename[0]->statename.' </b> >>> <b class="text-primary">'.$cityname[0]['cityname'].'</b>
                                        <br>
                                        Please check our Other restaurant below:
                                    </div>';
                    }
                    $data['error'] = $error_msg;
                    $statename=null;$cityname=null;
                }
                
                
                
                
                $data['cusine_type'] =null;
                //$data['get_all_resta'] = $get_all_resta;//$this->Restaurants_model->_allrestaurants($resta_id,$limit, $loadmore =FALSE,$stateid ,$cityid);
                $data['statename']=$statename;
                $data['cityname']=$cityname;  
                $data['searchtext'] =$searchbox;
                $data['sidebar_slidder'] = $this->Super_admin_model->_banner(3);   
                
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Cuisine Restaurant ';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['super_data'] = $this->Super_admin_model->get_admin_info();
        $data ['meta_keyword']= 'Shopping,cuisine, jollof,Sales, Online, Homepage ';
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';
        $data ['page_loader']= 'oye_mainpage_v/allrestaurants';

        $this->load->view('oye_mainpage_v/account_template',$data);
		
        //$this->load->view('included/header', $data);
		//$this->load->view('oye_mainpage_v/allrestaurants-old-11-12-18', $data);
		//$this->load->view('included/footer', $data);
                
                // date("D"); 
                
	}
        public function loadmore_rest()
        {   
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
            $limit = 10;
            $loadmore=$_POST['lastid']; 
            
            $stateid=null;$cityid=null;
            if(isset($_POST["statelocation"])){  $stateid = $_POST["statelocation"]; }
            if(isset($_POST["citylocation"])){  $cityid  = $_POST['citylocation']; }
            
            
            $searchbox=null;
            if(isset($_POST["search"])){ $searchbox  = $_POST['search']; }
            
            $output = "";
            $getlate_id = "";
            
            if(isset($_POST['typeid']) && (!empty($_POST['typeid'])))
            {
                $get_all_resta = $this->Restaurants_model->_allrestaurants_bycuisine($_POST['typeid'],$limit,$loadmore,$stateid,$cityid,$searchbox);
                //print("<pre>1".print_r($get_all_resta,true)."</pre>");die;
            }
            else
            {
                $get_all_resta = $this->Restaurants_model->_allrestaurants($resta_id=FALSE,$limit,$loadmore,$stateid,$cityid,$searchbox);
                //print("<pre>2".print_r($get_all_resta,true)."</pre>");die;
            }
            
            if($get_all_resta)
                {
                
                    foreach ($get_all_resta as $resta)
                    {
                        
                        
                        if( date("D") == "Mon" )
                        {   
                            if(isset($resta['time'][0]["monstatus"]) && $resta['time'][0]["monstatus"] == "1")
                                {
                                    //date("H:i:s");
                                    $now = date("G:i:s");
                                    $opening = $resta['time'][0]["monopen"];
                                    $closing = $resta['time'][0]["monclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }
                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Tue" )
                        {   

                            if(isset($resta['time'][0]["tueopen"]) && $resta['time'][0]["tuestatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["tueopen"];
                                    $closing = $resta['time'][0]["tueclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                            //$status = $opening.'--'.$now.'---'.$closing;
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                           //$status = $opening.'--'.$now.'---'.$closing;
                                            //$status = $st_time.'--'.$cur_time.'---'.$end_time;
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Wed" )
                        {   

                            if(isset($resta['time'][0]["wedopen"]) && $resta['time'][0]["wedstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["wedopen"];
                                    $closing = $resta['time'][0]["wedclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Thu" )
                        {   

                            if(isset($resta['time'][0]["thuopen"]) && $resta['time'][0]["thustatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["thuopen"];
                                    $closing = $resta['time'][0]["thuclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Fri" )
                        {   
                            if(isset($resta['time'][0]["friopen"]) && $resta['time'][0]["fristatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["friopen"];
                                    $closing = $resta['time'][0]["friclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sat" )
                        {   
                            if(isset($resta['time'][0]["satopen"]) && $resta['time'][0]["satstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["satopen"];
                                    $closing = $resta['time'][0]["satclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sun" )
                        {   
                            if(isset($resta['time'][0]["sunopen"]) && $resta['time'][0]["sunstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["sunopen"];
                                    $closing = $resta['time'][0]["sunclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }
                        
                        $value = $resta['companydesc'];
                        $limitword = 26;
                        if (strlen($value) > $limitword) {
                                $trimValues = substr($value, 0, $limitword).'...';
                            } 
                        else{
                                $trimValues = $value;
                            }
                        
                    $output .= '
                                <div class="col-sm-6 res_padd_6">
                
                                    <div class="col-sm-12 res_div nopadding">

                                        <div class="col-sm-3 text-center  nopadding ">

                                            <a href="" class="">
                                                <img class="thumbs_img " src="'.base_url().'assets/uploads/rest_logo/'.$resta['logo'].'" alt="">
                                            </a>
                                            <div class="text-center" style="padding-top:10px; ">
                                                <!--<P class="small_p"> Cash on delivery</p><i class="ion-android-checkmark-circle"></i> -->
                                            </div>

                                        </div>
                                        <div class="col-sm-9 ">

                                            <div class="res_table3 "> 

                                                <div class="res_table3_1 text-center">

                                                    <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li>
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="res_table3_1">
                                                    <p class="small_p_2"> Reviews </p>
                                                </div>

                                                <div class="res_table3_1">
                                                    <span class="label <?=$label?> boxset"><?= $status ?></span>
                                                </div>

                                            </div>

                                            <h2 class="" title="'.$resta['companyname'].'">
                                                '. character_limiter($resta['companyname'], 20).'
                                            </h2>

                                            <p class="small_p_2 fontchn " title="'.$resta['address'].'>">
                                                   '.character_limiter($resta['address'], 30).'
                                                <br/>

                                                <span style="padding-left: 10px;">
                                                    '.$resta['city'][0]["cityname"].',
                                                    '.$resta['state'][0]->statename.'
                                                </span> 

                                            </p>

                                            <p class="top3" title="'.$resta['companydesc'].'">
                                                <strong>

                                                  
                                                           '. $trimValues.'
                                                                  
                                                    
                                                </strong>
                                            </p>

                                            <p class="small_p_2 fontchn">Hours: Mon-Fir 9am - 6pm</p>
                                            <span class="small_p_2 fontchn" style="padding-left: 15%">Sat-Sun:10am - 4pm</span>
                                            <div class="top5">
                                                <a id="" class="btn btn-danger bg_btncol " href="'. base_url().'cuisine/restaurants/view/'.$resta['id'].'"> View menu</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>';
                        
                        $getlate_id =  $resta['id'];
                    }//end of foreah
                    $output .= '
                        <div id="loadMore" class="col-sm-12" style="">
                            <a href="" id="btn_more" data-lastid="'.$getlate_id.'"  class="btn">View More Restaurants</a>
                        </div>';
                            
                    
                    // echo $output; 
                } 
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $output
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
        public function ajaxcall_restaurants()
        {
            $limit = 10;
            $get_allvalue=0;
            $loadmore=$_POST['lastid']; 
            
            $stateid=null;$cityid=null;
            if(isset($_POST["statelocation"])){  $stateid = $_POST["statelocation"]; }
            if(isset($_POST["citylocation"])){  $cityid  = $_POST['citylocation']; }
            
            $searchbox=null;
            if(isset($_POST["search"])){ $searchbox  = $_POST['search']; }
            
            $output = "";
            $getlate_id = "";
            
            $get_all_resta = $this->Restaurants_model->_allrestaurants($resta_id=FALSE,$limit,$loadmore,$stateid,$cityid,$searchbox);
            
            if(empty($get_all_resta)){
                $get_all_resta = $this->Restaurants_model->_allrestaurants($resta_id=FALSE,$limit,$loadmore,$stateid=FALSE,$cityid=FALSE,$searchbox=FALSE);
                $get_allvalue=1;
                //print("<pre>".print_r($get_all_resta,true)."</pre>");die;
            }
            
            if($get_all_resta)
                {
                
                    foreach ($get_all_resta as $resta)
                    {
                        
                        
                        if( date("D") == "Mon" )
                        {   
                            if(isset($resta['time'][0]["monstatus"]) && $resta['time'][0]["monstatus"] == "1")
                                {
                                    //date("H:i:s");
                                    $now = date("G:i:s");
                                    $opening = $resta['time'][0]["monopen"];
                                    $closing = $resta['time'][0]["monclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }
                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Tue" )
                        {   

                            if(isset($resta['time'][0]["tueopen"]) && $resta['time'][0]["tuestatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["tueopen"];
                                    $closing = $resta['time'][0]["tueclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                            //$status = $opening.'--'.$now.'---'.$closing;
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                           //$status = $opening.'--'.$now.'---'.$closing;
                                            //$status = $st_time.'--'.$cur_time.'---'.$end_time;
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Wed" )
                        {   

                            if(isset($resta['time'][0]["wedopen"]) && $resta['time'][0]["wedstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["wedopen"];
                                    $closing = $resta['time'][0]["wedclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Thu" )
                        {   

                            if(isset($resta['time'][0]["thuopen"]) && $resta['time'][0]["thustatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["thuopen"];
                                    $closing = $resta['time'][0]["thuclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Fri" )
                        {   
                            if(isset($resta['time'][0]["friopen"]) && $resta['time'][0]["fristatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["friopen"];
                                    $closing = $resta['time'][0]["friclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sat" )
                        {   
                            if(isset($resta['time'][0]["satopen"]) && $resta['time'][0]["satstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["satopen"];
                                    $closing = $resta['time'][0]["satclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sun" )
                        {   
                            if(isset($resta['time'][0]["sunopen"]) && $resta['time'][0]["sunstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["sunopen"];
                                    $closing = $resta['time'][0]["sunclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }
                        
                        $value = $resta['companydesc'];
                        $limitword = 26;
                        if (strlen($value) > $limitword) {
                                $trimValues = substr($value, 0, $limitword).'...';
                            } 
                        else{
                                $trimValues = $value;
                            }
                        
                    $output .= '
                                <div class="col-sm-6 res_padd_6">
                
                                    <div class="col-sm-12 res_div nopadding">

                                        <div class="col-sm-3 text-center  nopadding ">

                                            <a href="" class="">
                                                <img class="thumbs_img " src="'.base_url().'assets/uploads/rest_logo/'.$resta['logo'].'" alt="">
                                            </a>
                                            <div class="text-center" style="padding-top:10px; ">
                                                <!--<P class="small_p"> Cash on delivery</p><i class="ion-android-checkmark-circle"></i> -->
                                            </div>

                                        </div>
                                        <div class="col-sm-9 ">

                                            <div class="res_table3 "> 

                                                <div class="res_table3_1 text-center">

                                                    <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li>
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="res_table3_1">
                                                    <p class="small_p_2"> Reviews </p>
                                                </div>

                                                <div class="res_table3_1">
                                                    <span class="label <?=$label?> boxset"><?= $status ?></span>
                                                </div>

                                            </div>

                                            <h2 class="" title="'.$resta['companyname'].'">
                                                '. character_limiter($resta['companyname'], 20).'
                                            </h2>

                                            <p class="small_p_2 fontchn " title="'.$resta['address'].'>">
                                                   '.character_limiter($resta['address'], 30).'
                                                <br/>

                                                <span style="padding-left: 10px;">
                                                    '.$resta['city'][0]["cityname"].',
                                                    '.$resta['state'][0]->statename.'
                                                </span> 

                                            </p>

                                            <p class="top3" title="'.$resta['companydesc'].'">
                                                <strong>

                                                  
                                                           '. $trimValues.'
                                                                  
                                                    
                                                </strong>
                                            </p>

                                            <p class="small_p_2 fontchn">Hours: Mon-Fir 9am - 6pm</p>
                                            <span class="small_p_2 fontchn" style="padding-left: 15%">Sat-Sun:10am - 4pm</span>
                                            <div class="top5">
                                                <a id="" class="btn btn-danger bg_btncol " href="'. base_url().'cuisine/restaurants/view/'.$resta['id'].'"> View menu</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>';
                        
                        $getlate_id =  $resta['id'];
                    }//end of foreah
                    $output .= '
                        <div id="loadMore" class="col-sm-12" style="">
                            <a href="" id="btn_more" data-lastid="'.$getlate_id.'"  class="btn">View More Restaurants</a>
                        </div>';
                            
                    
                    // echo $output; 
                } 
                $Json_resultSave = array (
                                        'status' => '1',
                                        'content' => $output,
                                        'allvalue' => $get_allvalue
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
        
        public function loadmore_scroll_rest()
        {
            $limit = 10;
            $loadmore=$_POST['lastid'];
            
            $stateid=null;$cityid=null;
            if(isset($_POST["statelocation"])){  $stateid = $_POST["statelocation"]; }
            if(isset($_POST["citylocation"])){  $cityid  = $_POST['citylocation']; }
            
            $searchbox=null;
            if(isset($_POST["search"])){ $searchbox  = $_POST['search']; }
            
            $output = "";
            $getlate_id = "";
            
            if(isset($_POST['typeid'])&& (!empty($_POST['typeid'])))
            {
                
                $get_all_resta = $this->Restaurants_model->_allrestaurants_bycuisine($_POST['typeid'],$limit,$loadmore,$stateid,$cityid,$searchbox);
                //print("<pre>1 ".print_r($get_all_resta,true)."</pre>");die;
            }
            else
            {
                $get_all_resta = $this->Restaurants_model->_allrestaurants($resta_id=FALSE,$limit,$loadmore,$stateid,$cityid,$searchbox);
                //print("<pre>2 ".print_r($get_all_resta,true)."</pre>");die;
            }
           
           //print("<pre>".print_r($get_all_resta,true)."</pre>");die;
            
            if($get_all_resta)
                {

                    foreach ($get_all_resta as $resta)
                    {
                        
                        
                        if( date("D") == "Mon" )
                        {   
                            if(isset($resta['time'][0]["monstatus"]) && $resta['time'][0]["monstatus"] == "1")
                                {
                                    //date("H:i:s");
                                    $now = date("G:i:s");
                                    $opening = $resta['time'][0]["monopen"];
                                    $closing = $resta['time'][0]["monclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }
                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Tue" )
                        {   

                            if(isset($resta['time'][0]["tueopen"]) && $resta['time'][0]["tuestatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["tueopen"];
                                    $closing = $resta['time'][0]["tueclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                            //$status = $opening.'--'.$now.'---'.$closing;
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                           //$status = $opening.'--'.$now.'---'.$closing;
                                            //$status = $st_time.'--'.$cur_time.'---'.$end_time;
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Wed" )
                        {   

                            if(isset($resta['time'][0]["wedopen"]) && $resta['time'][0]["wedstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["wedopen"];
                                    $closing = $resta['time'][0]["wedclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Thu" )
                        {   

                            if(isset($resta['time'][0]["thuopen"]) && $resta['time'][0]["thustatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["thuopen"];
                                    $closing = $resta['time'][0]["thuclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Fri" )
                        {   
                            if(isset($resta['time'][0]["friopen"]) && $resta['time'][0]["fristatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["friopen"];
                                    $closing = $resta['time'][0]["friclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sat" )
                        {   
                            if(isset($resta['time'][0]["satopen"]) && $resta['time'][0]["satstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["satopen"];
                                    $closing = $resta['time'][0]["satclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }

                        elseif ( date("D") == "Sun" )
                        {   
                            if(isset($resta['time'][0]["sunopen"]) && $resta['time'][0]["sunstatus"] == "1")
                                {
                                    $now = date("G:i:s");

                                    $opening = $resta['time'][0]["sunopen"];
                                    $closing = $resta['time'][0]["sunclose"];

                                    $st_time    =   strtotime($opening);
                                    $end_time   =   strtotime($closing);
                                    $cur_time   =   strtotime($now);

                                    if($cur_time > $st_time && $cur_time < $end_time)
                                        {
                                            $label = 'label-success ';
                                            $status = 'Open';
                                        }
                                    else{

                                           $label = 'label-default ';
                                           $status = 'Close';
                                        }

                                }
                           else{
                                    $label = 'label-default ';
                                    $status = 'Close';
                               }
                        }
                        
                        $value = $resta['companydesc'];
                        $limitword = 26;
                        if (strlen($value) > $limitword) {
                                $trimValues = substr($value, 0, $limitword).'...';
                            } 
                        else{
                                $trimValues = $value;
                            }
                        
                    $output .= '
                                <div class="col-sm-6 res_padd_6">
                
                                    <div class="col-sm-12 res_div nopadding">

                                        <div class="col-sm-3 text-center  nopadding ">

                                            <a href="" class="">
                                                <img class="thumbs_img " src="'.base_url().'assets/uploads/rest_logo/'.$resta['logo'].'" alt="">
                                            </a>
                                            <div class="text-center" style="padding-top:10px; ">
                                                <!--<P class="small_p"> Cash on delivery</p><i class="ion-android-checkmark-circle"></i> -->
                                            </div>

                                        </div>
                                        <div class="col-sm-9 ">

                                            <div class="res_table3 "> 

                                                <div class="res_table3_1 text-center">

                                                    <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li>
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="res_table3_1">
                                                    <p class="small_p_2"> Reviews </p>
                                                </div>

                                                <div class="res_table3_1">
                                                    <span class="label <?=$label?> boxset"><?= $status ?></span>
                                                </div>

                                            </div>

                                            <h2 class="" title="'.$resta['companyname'].'">
                                                '. character_limiter($resta['companyname'], 20).'
                                            </h2>

                                            <p class="small_p_2 fontchn " title="'.$resta['address'].'>">
                                                   '.character_limiter($resta['address'], 30).'
                                                <br/>

                                                <span style="padding-left: 10px;">
                                                    '.$resta['city'][0]["cityname"].',
                                                    '.$resta['state'][0]->statename.'
                                                </span> 

                                            </p>

                                            <p class="top3" title="'.$resta['companydesc'].'">
                                                <strong>

                                                  
                                                           '. $trimValues.'
                                                                  
                                                    
                                                </strong>
                                            </p>

                                            <p class="small_p_2 fontchn">Hours: Mon-Fir 9am - 6pm</p>
                                            <span class="small_p_2 fontchn" style="padding-left: 15%">Sat-Sun:10am - 4pm</span>
                                            <div class="top5">
                                                <a id="" class="btn btn-danger bg_btncol " href="'. base_url().'cuisine/restaurants/view/'.$resta['id'].'"> View menu</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>';
                        
                        $getlate_id =  $resta['id'];
                        
                        $Json_resultSave = array (
                                                'status' => '1',
                                                'lastid' => $getlate_id,
                                                'content' => $output
                                                );
                        echo json_encode($Json_resultSave);
                        exit();
                    }//end of foreah
                    
                            
                   
                } 
                $Json_resultSave = array (
                                        'status' => '0',
                                        'lastid' => $getlate_id,
                                        'content' => $output
                                        );
                echo json_encode($Json_resultSave);
                exit();
        }
        
	
	public function view()
	{
            $resta_id = $this->uri->segment(4);
            $resta_id2 = $this->uri->segment(3);
            $data['sidebar_slidder']= $this->Super_admin_model->_banner(7);
            $data['rest_banner_slidder'] = $this->Super_admin_model->_banner_rest(6,$resta_id);
            //print("<pre>".print_r($this->Super_admin_model->_banner_rest(6,$resta_id),true)."</pre>");die;
            
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Cuisine Restaurant ';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['super_data'] = $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['meta_keyword']= 'Shopping,cuisine, jollof,Sales, Online, Homepage ';
            $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/restaurants_view';

            
            
            $searchbox='';
            if(is_numeric($resta_id))
                {
                    $data['restaurantid'] = $resta_id;
                    $data_restaurant = $this->Restaurants_model->_allrestaurants($resta_id, $limit=FALSE,$start=FALSE, $loadmore =FALSE,$stateid =FALSE,$cityid =FALSE,$searchbox=FALSE); // call restaurant details
                    if ($data_restaurant){
                            $data['get_all_resta'] = $data_restaurant;
                            $data['get_resta_time'] = $this->Restaurants_model->restaurant_time($resta_id); // call restaurant open and close time
                            $data['resta_menu'] = $this->Restaurants_model->get_restaurant_category($resta_id); // call restaurant menus
                            
                            //print("<pre>".print_r($data_restaurant,true)."</pre>");die;
                            $this->load->view('oye_mainpage_v/account_template',$data);

                            //$this->load->view('included/header', $data);
                            //$this->load->view('oye_mainpage_v/restaurants_view', $data);
                            //$this->load->view('included/footer', $data);
                        }
                    else
                        {
                            redirect('restaurants');
                        }
                }
            else if(is_numeric($resta_id2))
                {
                    $data['restaurantid'] = $resta_id2;
                    $data_restaurant = $this->Restaurants_model->_allrestaurants($resta_id2, $limit=FALSE,$start=FALSE, $loadmore =FALSE,$stateid =FALSE,$cityid =FALSE, $searchbox); // call restaurant details
                    if ($data_restaurant){
                            $data['get_all_resta'] = $data_restaurant;
                            $data['get_resta_time'] = $this->Restaurants_model->restaurant_time($resta_id2); // call restaurant open and close time
                            $data['resta_menu'] = $this->Restaurants_model->get_restaurant_category($resta_id2); // call restaurant menus
                            
                            //print("<pre>".print_r($data_restaurant,true)."</pre>");die;
                            

                            $this->load->view('oye_mainpage_v/account_template',$data);
                           
                            //$this->load->view('included/header', $data);
                            //$this->load->view('oye_mainpage_v/restaurants_view', $data);
                            //$this->load->view('included/footer', $data);
                        }
                    else
                        {
                            redirect('restaurants');
                        }
                }
                
            else
                {
                    redirect('restaurants');

                }
            
	}
    public function placeorder()
    {   
            $nav_slug = $this->uri->segment(4);
            $data['sidebar_slidder'] = $this->Super_admin_model->_banner(3);
            
            
            $error_msg='<div class="alert alert-warning alert-dismissable fade in text-center" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h3><strong class="text-danger">Oh snap!</strong>
                            Sorry No restaurants for this filter "'.$nav_slug.'" for Now.</h3>
                            <br>
                            Please check our restaurant offerings below:
                        </div>';
            $cat_id = $this->Restaurants_model->_getcuisine_categoryid($nav_slug); // Get url Id
            if($cat_id == FALSE){redirect('restaurants');} // If its a wrong url 
            
            $limit=10;
            $get_all_resta=$this->Restaurants_model->_allrestaurants_bycuisine($cat_id, $limit, $loadmore =FALSE,$stateid=FALSE ,$cityid=FALSE,$searchbox=FALSE);
            
            if (!empty($get_all_resta)){
                
                $data['cusine_type'] = $nav_slug;
                $data['get_all_resta'] = $get_all_resta;
                $data['error'] = null;
            }
            else {
                
                $data['cusine_type'] = '';
                $get_all_resta=  $this->Restaurants_model->_allrestaurants($resta_id=FALSE, $limit, $loadmore =FALSE,$stateid=FALSE ,$cityid=FALSE,$searchbox=FALSE);
                $data['get_all_resta'] = $get_all_resta;
                $data['error'] = $error_msg;
            }
            
             // $this->Restaurants_model->_allrestaurants_bycuisine($cat_id, $limit=FALSE, $loadmore =FALSE);
            
            //print("<pre>".print_r($get_all_resta,true)."</pre>"); die;

        $data['searchtext'] =$searchbox;
        $data ['icon']= 'jol_1.ico';
        $data ['titel']= 'Jollof:-Cuisine Restaurant Place Order';
        $data['info']= $this->Super_admin_model->get_admin_info();
        $data['super_data'] = $this->Super_admin_model->get_admin_info();
        $data ['meta_keyword']= 'Shopping,cuisine, jollof,Sales, Online, Homepage ';
        $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
        $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

        $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
        $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
        $data ['footer_loader']= 'included/fashionpage_included/footer';
        $data ['error_page'] = 'included/error_page_fashion';
        $data ['page_loader']= 'oye_mainpage_v/allrestaurants';

        $this->load->view('oye_mainpage_v/account_template',$data);


            //$this->load->view('included/header', $data);
            //$this->load->view('oye_mainpage_v/allrestaurants', $data);
            //$this->load->view('included/footer', $data);
    }
    /*
    public function placeorder()
	{   
            $nav_slug = $this->uri->segment(4);
            $data['sidebar_slidder'] = $this->Super_admin_model->_banner(3);
            
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            
            $error_msg='<div class="alert alert-warning alert-dismissable fade in text-center" >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h3><strong class="text-danger">Oh snap!</strong>
                            Sorry No restaurants for this filter "'.$nav_slug.'" for Now.</h3>
                            <br>
                            Please check our restaurant offerings below:
                        </div>';
            $cat_id = $this->Restaurants_model->_getcuisine_categoryid($nav_slug); // Get url Id
            if($cat_id == FALSE){redirect('restaurants');} // If its a wrong url 
            
            $limit=10;
            $get_all_resta=$this->Restaurants_model->_allrestaurants_bycuisine($cat_id, $limit, $loadmore =FALSE,$stateid=FALSE ,$cityid=FALSE,$searchbox=FALSE);
            
            if (!empty($get_all_resta)){
                
                $data['cusine_type'] = $nav_slug;
                $data['get_all_resta'] = $get_all_resta;
                $data['error'] = null;
            }
            else {
                
                $data['cusine_type'] = '';
                $get_all_resta=  $this->Restaurants_model->_allrestaurants($resta_id=FALSE, $limit, $loadmore =FALSE,$stateid=FALSE ,$cityid=FALSE,$searchbox=FALSE);
                $data['get_all_resta'] = $get_all_resta;
                $data['error'] = $error_msg;
            }
            
             // $this->Restaurants_model->_allrestaurants_bycuisine($cat_id, $limit=FALSE, $loadmore =FALSE);
            
            //print("<pre>".print_r($get_all_resta,true)."</pre>"); die;
            
            $data['searchtext'] =$searchbox;
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Restaurant';
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/allrestaurants', $data);
            $this->load->view('included/footer', $data);
	}
    */

	public function order_form()
	{   
            $product_id = $this->uri->segment(3);
            
            $data['product'] = $this->Restaurants_model->get_prd_where($product_id);
            $data['product_list'] = $this->Restaurants_model->get_product_list($product_id); // call addition product that can be added to menus
            //print("<pre>".print_r($data_restaurant,true)."</pre>");die;
            $data ['icon']= 'jol_1.ico';
            $this->load->view('oye_mainpage_v/order_form-old-11-12-18', $data);
	}
    public function orderform()
    {   
        $product_id = $this->uri->segment(3);
        
        $product = $this->Restaurants_model->get_prd_where($product_id);
        $resta_id = $product[0]['restaurantid'];
        $data['product'] = $product;
        $data['product_list'] = $this->Restaurants_model->get_product_list($product_id); // call addition product that can be added to menus
        $data['restaurantid'] = $resta_id;
        $data['restaurant_data'] = $this->Super_admin_model->_all_restaurant_data_where($resta_id);
        $data['sidebar_slidder']= $this->Super_admin_model->_banner(7);
        $data['rest_banner_slidder'] = $this->Super_admin_model->_banner_rest(6,$resta_id);

        $data_restaurant = $this->Restaurants_model->_allrestaurants($resta_id, $limit=FALSE,$start=FALSE, $loadmore =FALSE,$stateid =FALSE,$cityid =FALSE,$searchbox=FALSE); // call restaurant details
        //print("<pre>".print_r($data_restaurant,true)."</pre>");die;
        if (empty($data_restaurant))
        {
            redirect('restaurants');
        }
        else
        {
            $data['get_all_resta'] = $data_restaurant;


            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Cuisine Restaurant ';
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['super_data'] = $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['meta_keyword']= 'Shopping,cuisine, jollof,Sales, Online, Homepage ';
            $data ['nav'] = $this->Restaurant_admin_model->get_allcuisaine_cate();

            

            $data ['header_nav_loader']= 'included/fashionpage_included/header_nav_cuisine';
            $data ['header_micro_loader']= 'included/fashionpage_included/header_micro';
            $data ['footer_loader']= 'included/fashionpage_included/footer';
            $data ['error_page'] = 'included/error_page_fashion';
            $data ['page_loader']= 'oye_mainpage_v/order_form';

        
            $this->load->view('oye_mainpage_v/account_template',$data);
        }
    }
	public function allcuisines()
	{
            
            $data['info']= $this->Super_admin_model->get_admin_info();
            $data['cuis_cate'] = $this->Restaurant_admin_model->get_allcuisaine_cate();
            $data ['icon']= 'jol_1.ico';
            $data ['titel']= 'Jollof:-Cuisines';
            $this->load->view('included/header', $data);
            $this->load->view('oye_mainpage_v/cuisines', $data);
            $this->load->view('included/footer', $data);
            
	}
        public function get_account_info ($by_id)
        {
            $query = $this->db->get_where('accounts', array(
                                                            'id' => $by_id,
                                                            'isdeleted' =>'0'
                                                                )
                                                            );
             $get=$query->row();
            print("<pre>".print_r($get,true)."</pre>");
        }
        public function query()
	{
            /*$fields = $this->db->list_fields('accounts');
            $fields =$this->db->select("*")
                ->from('cg_customer')
                //->limit(125)
                 ->get()->result();
            $count = 1;
            echo 'INSERT INTO `accounts`( `firstname`, `lastname`,  `email`, `phone`, `phone2`) VALUES <br>';
            foreach ($fields as $field)
            {
                if(empty($field->alternate_phone))
                {
                    $alternate_phone= " , NULL ";
                }
                else
                {
                    $alternate_phone=", '".$field->alternate_phone."'";
                }
                    echo "( ".
                            
                            " '".$field->firstname."' , '".$field->surname."' , '".$field->email."' , '".$field->phone."' ".$alternate_phone
                            
                            ." ),<br>";
                    $count++;
                
            }
            /*
            $this->db->insert('productimages', array(
                                'restaurantid'  => $_SESSION['rest_id'],
                                'imagename' => $data['file_name']
                            ));
            
             * 
             */
            
            /*
            $secondDB = $this->load->database('second', TRUE);
            $fields = $secondDB->list_fields('cg_restaurant');
            $fieldss =$secondDB->select("*")
                ->from('cg_restaurant')
                 ->get()->result();
            
            $field2=$secondDB->select(" 
                            cg_restaurant.id,cg_restaurant.name,cg_restaurant.short_name,cg_restaurant.min_order,cg_restaurant.delivery_charge,cg_restaurant.merchant_username,cg_restaurant.addr_1,cg_restaurant.city_id,cg_restaurant.state_id,cg_restaurant.image,cg_restaurant.table_book,
                            tbl_users.USERNAME,tbl_users.USER_ROLE,tbl_users.FIRSTNAME,tbl_users.SURNAME,tbl_users.PHONE
                        ")
                ->from('cg_restaurant')
                ->join( "tbl_users", " tbl_users.BIZ_ID = cg_restaurant.id " )
                ->order_by(" cg_restaurant.id", 'ASC')
                //->group_by("cg_restaurant.id")
                //->join( $this->DB_ord_status, " ".$this->DB_ord_status.".id = ".$this->DB_ord_details.".status" )
                ->where(" tbl_users.USER_ROLE != ","BIZ_ADMIN")
                //->where(" ".$this->DB_ord_details.".restaurantid ", $by_id);
                ->get()->result();
            print("<pre>".print_r($field2,true)."</pre>");
            $count = 1;
            
            foreach ($field2 as $field)
            {
                if($field->city_id==2){ $city= 750;}
                elseif ($field->city_id==3){ $city= 747;}
                elseif ($field->city_id==4){ $city= 493;}
                elseif ($field->city_id==5){ $city= 740;}
                elseif ($field->city_id==6){ $city= 748;}
                elseif ($field->city_id==7){ $city= 744;}
                elseif ($field->city_id==8){ $city= 482;}
                elseif ($field->city_id==122){ $city= 500;}
                elseif ($field->city_id==188){ $city= 489;}
                elseif ($field->city_id==285){ $city= 497;}
                elseif ($field->city_id==372){ $city= 749;}
                elseif ($field->city_id==852){ $city= 491;}
                elseif ($field->city_id==853){ $city= 488;}
                elseif ($field->city_id==9){ $city= 738;}
                elseif ($field->city_id==1){ $city= 751;}
                
                if($field->merchant_username !="antonyodu@gmail.com")
                {
                    $data_Newrest = array( 
                                    //'$count'=>$count,
                                    'idcopy'       => $field->id,
                                    'merchanttype' =>  'cuisine',
                                    'slug'         =>  $field->short_name,
                                    'companyname'  =>  $field->name,
                                    'email'        =>  $field->merchant_username,
                                    'address'      =>  $field->addr_1,
                                    'cityid'       =>  $city,
                                    'stateid'      =>  25,
                                    'logo'         =>  $field->image,
                                    'status'       =>  FALSE
                                 );
               
                    $data_Newuser = array( 
                                    //'$count'=>$count,
                                    'idcopy'   =>  $field->id,
                                    'firstname'     =>  $field->FIRSTNAME,
                                    'lastname'      =>  $field->SURNAME,
                                    'email'         =>  $field->USERNAME,
                                    'phonenumber'   =>  $field->addr_1
                                    //'logo'          =>  $field->image,
                                    //'status'       =>  FALSE
                                 );
                
                    $insert_data = true;//$this->Restaurant_admin_model->_insertnewrest_formal($data_Newrest,$data_Newuser);// insert to db 

                    if($insert_data) 
                    {

                            $Json_resultSave = array (
                                                    'status' => 1,
                                                    'companyname'  =>  $field->name,
                                                    'firstname'     =>  $field->FIRSTNAME,
                                                    'lastname'      =>  $field->SURNAME
                                                    );
                            //echo json_encode($Json_resultSave);
                            //exit();
                            print("<pre>".print_r($Json_resultSave,true)."</pre>");
                    }
                
                 //print("<pre>".print_r($data_Newrest,true)."</pre>");
                 //print("<pre>".print_r($data_Newuser,true)."</pre>");
                //$this->db->insert($this->DB_res, $data_Newrest);
                }
                $count++;
            }
            
             * 
             */
            $secondDB = $this->load->database('second', TRUE);
            //$cg_biz_cuisine = $secondDB->list_fields('cg_biz_cuisine'); 
            
            $query=$this->db->select(" 
                            cg_biz_cuisine.biz_id, restaurants_copy.companyname, restaurants_copy.id as new_id, cg_biz_cuisine.cuisine_id,cg_biz_cuisine.cuisine_name,categories_cusine.id as new_cuid
                        ")
                ->from('cg_biz_cuisine')
                ->join( "restaurants_copy", " restaurants_copy.idCopy = cg_biz_cuisine.biz_id " )
                ->join( "categories_cusine", " categories_cusine.categoryname = cg_biz_cuisine.cuisine_name " )
                ->order_by("cg_biz_cuisine.biz_id", 'ASC')
                ->get()->result();
            $count = 1;
            foreach ($query as $row)
            {
                $data_Newrest = array(
                                'count'         =>  $count,
                                'biz_id'        =>  $row->biz_id,
                                'biz_name'      =>  $row->companyname,
                                'cuisine_id'    =>  $row->cuisine_id,
                                'cuisine_name'  =>  $row->cuisine_name
                                );
                
                $data_db = array(
                                'cat_cusid'   =>  $row->new_cuid,
                                'restaurantid'   =>  $row->new_id
                                );
                $count++;
                
                print("<pre>".print_r($data_Newrest,true)."</pre>");
                
                $insert= $this->Restaurant_admin_model->_update_rest_categories($data_db);
                if($insert)
                {
                    print("<pre>".print_r($data_db,true)."</pre>");
                }
            }
            
	}
        public function Mailchip()
        {
            /*
            // for mailchimp_library
            $this->load->library('mailchimp_library');
            $lists = $this->mailchimp_library->call('lists/list');
            print("<pre>".print_r($lists,true)."</pre>");
             *
             */
            /*
             * Subscribe someone to a list
            $result = $this->Mailchimp_library->call('lists/subscribe', array(
				'id'                => '82b2e5ba88',
				'email'             => array('email'=>'davy@example.com'),
				'merge_vars'        => array('FNAME'=>'Davy', 'LNAME'=>'Jones'),
				'double_optin'      => false,
				'update_existing'   => true,
				'replace_interests' => false,
				'send_welcome'      => false,
			));
            sprint("<pre>".print_r($result,true)."</pre>"); 
            
             * 
             */
            // info at: https://github.com/drewm/mailchimp-api
            $list_id = '82b2e5ba88';
            $this->load->library('mailChimp_v3');
            //$this->load->library('mailChimp_v3_Batch');
            
            $this->mailChimp_v3 = new mailChimp_v3();
            
            //$this->mailChimp_v3_Batch = $this->mailChimp_v3->new_batch();
            /*
            $lists = $this->mailChimp_v3->get("lists/$list_id");
            if ($this->mailChimp_v3->success()) 
                {
                    print("<pre>".print_r($lists,true)."</pre>");	
                }
            else 
                {
                    echo $this->mailChimp_v3->getLastError();
                }
            
             * 
             */
            
            //Subscribe someone to a list (with a post to the lists/{listID}/members method):
            $merge_vars = array(
                'FNAME'     => $_POST['fname'],//'davy'
                'LNAME'     => $_POST['lname']//'last'
            );
            $result = $this->mailChimp_v3->post("lists/$list_id/members", [
				'email_address' => 'davy@dgv.com',
                                'merge_fields'  => $merge_vars,
				'status'        => 'subscribed'
                                //'status'        => 'pending'     // double opt-in
			]);
            if ($this->mailChimp_v3->success()) 
                {
                    print("<pre>".print_r($result,true)."</pre>");	
                }
            else 
                {
                    echo $this->mailChimp_v3->getLastError();
                }
            /*
            
            //Update a list member with more information (using patch to update):
            $subscriber_hash = $MailChimp->subscriberHash('davy@example.com');
            $result_update = $this->mailChimp_v3->patch("lists/$list_id/members/$subscriber_hash", [
				'merge_fields' => ['FNAME'=>'Davy', 'LNAME'=>'Jones'],
				'interests'    => ['2s3a384h' => true],
			]);
            if ($this->mailChimp_v3->success()) 
                {
                    print("<pre>".print_r($result_update,true)."</pre>");	
                }
            else 
                {
                    echo $this->mailChimp_v3->getLastError();
                }
            
            //Remove a list member using the delete method:
            $subscriber_hash = $MailChimp->subscriberHash('davy@example.com');
            $result_delete = $this->mailChimp_v3->patch("lists/$list_id/members/$subscriber_hash");
            if ($this->mailChimp_v3->success()) 
                {
                    print("<pre>".print_r($result_delete,true)."</pre>");	
                }
            else 
                {
                    echo $this->mailChimp_v3->getLastError();
                }
            
            //Troubleshooting
            print("<pre>".print_r($this->mailChimp_v3->getLastError(),true)."</pre>");//last error returned by either the HTTP client or by the API, use getLastError():
            print("<pre>".print_r($this->mailChimp_v3->getLastResponse(),true)."</pre>"); // further debugging, you can inspect the headers and body of the response:
            print("<pre>".print_r($this->mailChimp_v3->getLastRequest(),true)."</pre>"); // If you suspect you're sending data in the wrong format, you can look at what was sent to MailChimp by the wrapper:
            
             * 
             */
                
            /*
            $this->load->library('MailChimp');
            
            $list_id = '82b2e5ba88';
            
            $result = $this->mailchimp->post("lists/$list_id/members", [
                'email_address' => 'persons_email@gmail.com',
                'merge_fields' => ['FNAME'=>'Ralph', 'LNAME'=>'Vugts'],
                'status'        => 'subscribed',
            ]);
            
             * 
             */
        }
        public function restaurant_table() 
        {
            
            // Update the Restaurant Table Reservation data  //
            $data_New = array(  
                                'restaurantid'  =>  $_POST['restaurantid'],
                                //'accountid'     =>  $_SESSION['User_id'],
                                'numguest'      =>  $_POST['guest_num'],
                                'checkindate'   =>  $_POST['date_booking'],
                                'checkintime'   =>  date("H:i:s", strtotime($_POST['time_booking'])),
                                'contactname'   =>  $_POST["cont_name"],
                                'contactemail'  =>  $_POST["email"],
                                'contactphone'  =>  $_POST["cell"],
                                'contactnote'   =>  str_replace(" ", "", $_POST["note"])
                             );
            //print("<pre>".print_r($data_New,true)."</pre>");die;
            $insert_data = $this->Restaurants_model->_add_restaurant_table($data_New);// insert to db
            
            if($insert_data) 
            {
                $rest_info=$this->user->merchant_info($this->input->post('restaurantid'));

                $this->Email_model->send_tablereservation_user_email( $_POST["cont_name"], $_POST['date_booking'], date("H:i:s", strtotime($_POST['time_booking'])), $rest_info->companyname,$_POST["email"] ); // send the Merchant an email

               $this->Email_model->send_tablereservation_merchant_email( $_POST["cont_name"], $_POST['date_booking'], date("H:i:s", strtotime($_POST['time_booking'])), $rest_info->companyname,$rest_info->email ); // send the Merchant an email
                    $Json_resultSave = array (
                                            'status' => '1',
                                            'content' => 'Submitted Successfull...'
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
