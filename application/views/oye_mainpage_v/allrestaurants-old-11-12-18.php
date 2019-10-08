<style>
    #loadMore {
    padding-bottom: 30px;
    padding-top: 30px;
    text-align: center;
    width: 100%;
    }
    #loadMore a {
        background: #042a63;
        border-radius: 3px;
        color: white;
        display: inline-block;
        padding: 10px 30px;
        transition: all 0.25s ease-out;
        -webkit-font-smoothing: antialiased;
    }
    #loadMore a:hover {
        background-color: #021737;
    }

    
    
    
    
    .brand{
            width:100%;
            background:silver;
            display:flex;
            align-content: center;
            max-height: 35px;            
        }
        .brand > img{
            margin-left:5px;
            max-height:40px;
            width:auto;            
        }
        .mylabel{
            border-left:1px solid #fafafa;
            border-bottom:black;
            border-bottom:1px solid #fafafa;
            height: 90px;
            padding: 0;
            position: relative;
            cursor:pointer;
        }
        .mylabel > a{
            color:black;
        }
        .mylabel > a > p:first-of-type{
            font-size:9px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1; /* number of lines to show */
            line-height: 14px;        /* fallback */
            max-height: 14px;       /* fallback */            
            margin: 0;            
            text-align:center;            
        }
        .mylabel > a > p:last-of-type{
            font-size:12px;
            overflow: hidden;
            margin: 0;            
            text-align:center;
            font-weight: bold;
        }        
        .discounts{
            position: absolute;
            color: white;
            background: #006666;
            border-radius: 0;
            left:5px;
            top:5px;
            padding-left:3px;
            padding-right:3px;
        } 
        /*.cus_search input {
            background: rgba(255, 255, 255, 1) url("https://image.flaticon.com/icons/svg/126/126474.svg") no-repeat scroll left center / 30px 18px;
            padding-left: 20px;
            transition: all 0.5s ease 0s;
            width: 30px;
            height: 30px;
            
        }
        .cus_search input:focus {
            width: 100%;
            padding-left: 30px;
            font-size: 12px;
            font-weight: 600;
        }*/
        .cus_search input {
            background: rgba(255, 255, 255, 1) url("https://image.flaticon.com/icons/svg/126/126474.svg") no-repeat scroll left center / 30px 18px;
            transition: all 0.5s ease 0s;
            padding-left: 30px;
            font-size: 12px;
            font-weight: 600;
            width: 300px;
            height: 30px;
            
        }
        
        .breadcrumblist {
            color: #888;
            font-size: 12px;
            font-weight: normal;
            line-height: 1.5;
            margin-bottom: 0;
        }
        .breadcrumblist a.current {
            color: #000;
            font-weight: bold;
            margin-right: 5px;
        }
        .modal-header {
            border-bottom: solid 1px #ddd;
            border-radius: 3px 3px 0 0;
            font-weight: bold;
            background: #f8f8f8;
            border-top: solid 1px #ddd;
            padding:8px;
            padding-left: 10px;
            position: relative; 
        }
        .list li {
            list-style: none;
        }
        ul.list-link{
            width: 100%;
            padding: 0;
        }
        ul.list-link li {
            display: inline-block;
            width: 24%;
        }
        ul.list-link li a, ul.list-link li {
            color: #4e575d;
            font-size: 12px;
            font-style: normal;
            line-height: normal;
            font-weight:500;
            padding: 3px 0;
            -webkit-transition: all 0.1s ease 0s;
               -moz-transition: all 0.1s ease 0s;
                 -o-transition: all 0.1s ease 0s;
                    transition: all 0.1s ease 0s; 
        }

        ul.list-link li a:hover, .ul.list-link li a:hover {
            text-decoration: underline;
            color: #345676; 
        }
        
        ul.list-link li a.active {
            color: #345676;
            font-weight: bold;
        }
    @media (min-width: 768px){
        .modal-dialog {
            width: 500px;
            /*margin: 30px auto;*/
        }
    }
</style>
<div id="home" class=" res_mem_wrapper m_bottom_30">
    
    <div class="res_trans"></div>
         <!--left content column-->
            
        <div class="res_contdiv ">
           
            <div class="res_contdiv_a m_bottom_100">
                &emsp;
                &emsp;
                &emsp;
                &emsp;
                &emsp;
                &emsp;
                
                
                <div class="clearfix"></div>
                
            </div>
            
        </div>
         
</div>
<div class="container">
    
    <div class="row ">
         <!--left content column-->
         <div id="WaitMe_rest" class="col-sm-9 nopadding ">
             <span id="error_msg"><?= $error;?></span>
            <?php if(!empty($get_all_resta)): ?>
             
             <div id="load_data_div">
                 
            <!--sort-->
            <hr class="m_bottom_10 m_top_10 divider_type_3">
            <div class="row clearfix m_bottom_10">
                    <div class="col-lg-70 col-md-80 col-sm-12 m_sm_bottom_10">
                            
                            <div class="d_inline_middle breadcrumblist">
                                <a href="<?= site_url('restaurants')?>" class="current"> <span>All Restaurant</span></a> 
                                
                                <span id="set_location_call"><?php if(!empty($statename) ): ?>
                                in
                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span  class="stateName" data-varid="<?=$statename[0]->id?>"> <?=$statename[0]->statename?> </span> >> <span class="cityName" data-varid="<?=$cityname[0]['id']?>"> <?=$cityname[0]['cityname']?></span> 
                                <?php endif; ?></span>
                                <a href="#selectRegion" id="#selectRegion" data-toggle="modal" data-toggle="tooltip" title="Change Location" class="jboxtooltip"> <i class="fa fa-map-marker"></i> </a>
                                
                            </div>
                            
                            <!--search select-->
                            <div class="custom_select f_size_medium relative d_inline_middle m_left_15 m_xs_left_5 m_mxs_left_0 m_mxs_top_10">
                                    <!--<div class="select_title r_corners relative color_dark">Select manufacturer</div>
                                    <ul class="select_list d_none"></ul>
                                    <select name="manufacturer">
                                            <option value="Manufacture 1">Manufacture 1</option>
                                            <option value="Manufacture 2">Manufacture 2</option>
                                            <option value="Manufacture 3">Manufacture 3</option>
                                    </select>
                                    <i class="fa fa-search" aria-hidden="true"></i>-->
                                    <!--
                                    <form class="cus_search">
                                    <input type="text" class="form-control" placeholder="Enter a dish or restaurant name ...">
                                    </form>
                                    -->
                                    <form class="cus_search" action="<?= site_url('cuisine/restaurants'); ?> " method="post">
                                        <input type="text" id="searchtext" name="search" class="form-control" value="<?=$searchtext?>" placeholder="Enter a dish or restaurant name ..." required="">
                                    </form>
                            </div>
                            
                            <!--<p class="d_inline_middle f_size_medium">Sort by:</p>-->
                            <div class="clearfix d_inline_middle m_left_10 f_right">
                                    <!--product name select-->
                                    <div class="custom_select f_size_medium relative f_left">
                                            <div class="select_title r_corners relative color_dark">Sort by</div>
                                            <ul class="select_list d_none"></ul>
                                            <select name="product_name">
                                                    <option value="Product SKU">A - Z</option>
                                            </select>
                                    </div>
                            </div>
                            
                    </div>
                            
            </div>
            <hr class="m_bottom_10 divider_type_3">
            <!-- restaurants div -->
            <h4 class="tt_uppercase  color_dark heading1 animate_ftr animate_horizontal_finished"><?= $cusine_type?></h4>
            
            
            
            <div id="rest_cont" class="row" >
            <?php foreach ($get_all_resta as  $resta) :?>
            
            <?php
               
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
                                   $status = 'Closed';
                                }
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                   //$status = $opening.'--'.$now.'---'.$closing;
                                    //$status = $st_time.'--'.$cur_time.'---'.$end_time;
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
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
                                   $status = 'Closed';
                                }
                           
                        }
                   else{
                            $label = 'label-default ';
                            $status = 'Closed';
                       }
                }
            
            
            ?>
            
            
            <div class="col-sm-6 res_padd_6">
                
                <div class="col-sm-12 res_div nopadding">
                
                    <div class="col-sm-3 text-center  nopadding ">
                    
                        <a href="" class="">
                            <img class="thumbs_img " src="<?= base_url() ?>assets/uploads/rest_logo/<?= $resta['logo']; ?>" alt="">
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
                        
                        <h2 class="" title="<?= $resta['companyname'] ?>">
                            <?= character_limiter($resta['companyname'], 20); ?>
                        </h2>
                        
                        <p class="small_p_2 fontchn " title="<?= $resta['address'] ?>">
                               <?=  character_limiter($resta['address'], 30); ?> 
                            <br/>
                            
                            <span style="padding-left: 10px;">
                                <?=  $resta['city'][0]["cityname"]; ?>,
                                <?=  $resta['state'][0]->statename; ?>
                            </span> 
                            
                        </p>
                        
                        <p class="top3" title="<?= $resta['companydesc'] ?>">
                            <strong>
                                
                                <?php
                                        $value = $resta['companydesc'];
                                            $limit = '26';
                                            if (strlen($value) > $limit) {
                                                     $trimValues = substr($value, 0, $limit).'...';
                                                      } 
                                            else {
                                                    $trimValues = $value;
                                              }
                                        //character_limiter($resta['companydesc'],25); 
                                              echo $trimValues;
                                ?>
                            </strong>
                        </p>
                        
                        <p class="small_p_2 fontchn">Hours: Mon-Fir 9am - 6pm</p>
                        <span class="small_p_2 fontchn" style="padding-left: 15%">Sat-Sun:10am - 4pm</span>
                        <div class="top5">
                            <a id="" class="btn btn-danger bg_btncol " href="<?= base_url() ?>cuisine/restaurants/view/<?= $resta['id']; ?>"> View menu</a>
                        </div>
                    </div>
            
                </div>
            
            </div>
                
            <?php
                
               
                if(end($get_all_resta) === $resta)
                {
                  $lastid =  $resta['id'];
                  $type = $resta['cate_id'];
                }
                
            ?>
            <?php endforeach; ?> 
            <!--end restaurants div -->
             </div>
             </div>
             
            <?php if(!empty($lastid)): ?>
            <div id="loadMore" class="col-sm-12" style="">
                <a href="" id="btn_more" data-lastid="<?= $lastid ?>" data-type_id="<?=$type?>" class="btn">View More Restaurant</a>
             </div>
            <span class="getlastid" data-lastid="<?=$lastid?>" data-type_id="<?=$type?>"></span>
            
            <?php endif; ?>
            
        <?php else: ?>
            
            <div class="alert alert-warning alert-dismissable fade in" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oh snap!</strong>
                Sorry No restaurants for this filter Now.
                <br>
                <small>Please check our restaurant offerings below:</small>
            </div>

        <?php endif; ?>
            
        </div>
        
         <div class="col-sm-3 m_top_10" >
            
                <!--widgets-->
                
                
                
                <!--banner-->
                <div class="col-xs-12 col-xs-offset- m_bottom_30 nopadding">
                    
                    <!-- Jssor Slider Begin -->
                    <div id="jssor_rest_banner" style="position:relative;top:0px;left:0px;width:250px;height:400px;overflow:hidden;">
                        
                        <!-- Loading Screen -->
                        <div data-u="loading" class="" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <!-- your loading screen content here -->
                            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                    background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            <div style="position: absolute; display: block; background: url(<?php echo base_url(); ?>assets/img/loader.gif) no-repeat center center;
                                top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                        </div>
                        
                        <!-- Slides Container -->
                        <div data-u="slides" style="cursor: move; position:absolute;top:0px;left:0px;width:250px;height:400px;overflow:hidden;">
                            <?php foreach($sidebar_slidder as $imgs) :?>
                                <div>
                                <?php if( !empty($imgs->imageurl) ): ?>
                                    <a href="<?=$imgs->imageurl?>"><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/cuisine_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>"/></a>
                                <?php else: ?>

                                    <!--<img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%">
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>"/>-->
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/cuisine_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>"/>

                                <?php endif; ?> 
                                </div>
                            <?php endforeach; ?>
                            <!--<div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/img/ad1.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/img/ad2.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/img/ad3.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/img/ad4.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/img/ad5.png"/></a>
                            </div>-->
                        </div>
                    </div>
                    
                    <!-- Jssor Slider End -->
                    
                        <!-- Jssor Slider Begin -->
                        <!-- You can move inline styles to css file or css block. -->
                        <!--<div id="slider5_container_billbrd" class="" style="position: relative; top: 0px; left: 0px; width: 250px; height: 150px; overflow: hidden;">
                    
                            <!-- Loading Screen -->
                            <!--<div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                    background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                                </div>
                                <div style="position: absolute; display: block; background: url(<?php echo base_url(); ?>assets/img/spin_round.gif) no-repeat center center;
                                    top: 0px; left: 0px;width: 100%;height:100%;">
                                </div>
                            </div>
                    
                            <!-- Slides Container -->
                            <!--<div  u="slides" class="" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 250px; height: 150px; overflow: hidden;">
    
                                <div >
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/img/ad1.png"/>
                                </div>
                                								
                                <div >
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/img/ad2.png"/>
                                </div>
                                
                                <div >
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/img/ad3.png"  />
                                </div>
                                
                            </div>                      
                           
                        </div>
                        <!-- Jssor Slider End -->
                </div>
                        

                <!--banner-->
                <!--<div class="col-xs-12 col-xs-offset- m_bottom_30" style="border:1px solid silver;padding:0px;">
                    <div class="brand">
                        <img src="<?= base_url();?>assets/img/jollof_logo.png" alt="Brand" /> Discount offers
                    </div>
                    <div class="col-xs-12">
                        <div class="row canvas"></div>                             
                    </div>
                </div>-->
                
                <!--banner-->
                <!--<a href="#" class="d_block r_corners m_bottom_30">

                    <img src="<?= base_url() ?>assets/img/ad_1.png" alt="">

                </a>-->
                
        </div>
         
    </div>
    
</div>


<!-- Modal Change City -->

<div class="modal fade modalHasList" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			
                    <div class="modal-header ">
                
                        <span class="text-center" style=" font-size: 17px; color: #000;"><i class=" fa fa-map-marker"></i> Select your region </span>

                        <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true"> 
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                    </div>
			<div class="modal-body">
				<div class="row">
                                    <?php
                                        $this->load->model('oye/Restaurant_admin_model');
                                        $State    = $this->Restaurant_admin_model->get_allstate();
                                        //$City = $this->Restaurant_admin_model->_get_processing_order();
                                    ?>
					<div class="col-sm-12">

						<!--<p>Popular cities in <strong>New York</strong>-->
						</p>

						<div style="clear:both"></div>
						<div class="col-sm-6 no-padding">
                                                    
                                                    <select id="state_div" name="statelocation" class="form-control selectpicker" data-live-search="true" show-tick  data-size="8" title="All State Search" data-width="90%">
                                                        <?php if(!empty($State)): ?>

                                                            <?php foreach ($State as $state_list) :?>
                                                                <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>

                                                            <?php endforeach;?>
                                                        <?php else: ?>

                                                            <option value="">State not available</option>

                                                        <?php endif; ?>
                                                    </select>
                                                    
						</div>
						<div style="clear:both"></div>

						<hr class="hr-thin">
					</div>
					<div class="col-md-12">
                                            <ul id="WaitMe_city" class="city_ul list-link list-unstyled">
                                                <!--
                                                <li ><a href="#" title="">All Cities</a></li>
                                                <li><a href="#" title="Albany">Albany</a></li>
                                                <li><a href="#" class="active" title="Altamont">Altamont</a></li>
                                                <li><a href="#" title="Amagansett">Amagansett</a></li>
                                                <li><a href="#" title="Amawalk">Amawalk</a></li>
                                                <li><a href="#" title="Bellport">Bellport</a></li>
                                                <li><a href="#" title="Centereach">Centereach</a></li>
                                                <li><a href="#" title="Chappaqua">Chappaqua</a></li>
                                                <li><a href="#" title="East Elmhurst">East Elmhurst edo state</a></li>
                                                <li><a href="#" title="East Greenbush">East Greenbush</a></li>
                                                <li><a href="#" title="East Meadow">East Meadow</a></li>
                                                -->

                                            </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
        jQuery(document).ready(function($) {
                    
            function run_waitMe(el, num, effect){
		text = 'Please wait...';
		fontSize = '';
		switch (num) {
			case 1:
			maxSize = '';
			textPos = 'vertical';
			break;
			case 2:
			text = '';
			maxSize = 30;
			textPos = 'vertical';
			break;
			case 3:
			maxSize = 30;
			textPos = 'horizontal';
			fontSize = '18px';
			break;
		}
		el.waitMe({
			effect: effect,
			text: text,
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: maxSize,
			waitTime: -1,
			source: 'img.svg',
			textPos: textPos,
			fontSize: fontSize,
			onClose: function(el) {}
		});
            }       
            
            $('#state_div').on('change',function(){

                        var value = $(this).val();
                        var text = $(this).find('option:selected').html();
                        //alert(value + ' : ' + text);
                        run_waitMe($('#WaitMe_city'), 3, 'orbit');
                        $.ajax({
                            type:'POST',
                            url:'<?= site_url('cuisine/get_city_byid') ?>',
                            data:'stateid='+value,
                            dataType: "json",
                            success:function(html){
                                $('.city_ul').html(html.li);
                                //$('.city_ul').next('ul').children('li').find('ul').html(html.element);

                                
                                
                                $('#WaitMe_city').waitMe('hide');

                            }
                        });
            });
            
            //run_waitMe($('#WaitMe_rest'), 1, 'orbit');
        $(document).on('click', 'a.city_link', function(e){ 
            e.preventDefault(); 
            var stateid = $('#state_div').val();
            var statename = $('#state_div').find('option:selected').html();
            var cityid = $(this).data("valid");
            var cityname = $(this).text();
            var locationname;
            //alert('sid--'+stateid +' sname--'+statename +' cid--'+cityid+' cname--'+cityname);
            $('#selectRegion').modal('hide');
            
            run_waitMe($('#WaitMe_rest'), 1, 'orbit');
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurants/ajaxcall_restaurants') ?>',
                data:{lastid:0,typeid:null,statelocation:stateid,citylocation:cityid},
                dataType: 'json',
                cache:false,
                success:function(html){
                    
                locationname="in <span  class='stateName' data-varid="+stateid+"> "+statename+" </span> >> <span class='cityName' data-varid="+cityid+">"+cityname+"</span>";
                $('#loadMore').remove();
                $('input[name="search"]').val('');
                $('#set_location_call').html(locationname);
                $('#rest_cont').html(html.content);
                
                if(html.allvalue === 1)
                    {
                        var error_msg="<div class='alert alert-warning alert-dismissable fade in text-center' >\n\
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>\n\
                                    <h3><strong class='text-danger'>Oh Snap!</strong>\n\
                                    Sorry No restaurants in this location Yet.</h3>\n\
                                    <i class='fa fa-map-marker text-danger'></i> <b class='text-primary'>"+statename+" </b> >>> <b class='text-primary'>"+cityname+"</b>\n\
                                    <br>Please check our Other restaurant below:\n\
                                </div>";
                        $('#error_msg').html(error_msg);
                    }
                else{ $('#error_msg').html('');}

                    $('#WaitMe_rest').waitMe('hide');

                }
            });
        });
                        
        });
        
                
</script>
<script> 
    
    function run_waitMe(el, num, effect){
		text = 'Loading...';
		fontSize = '';
		switch (num) {
			case 1:
			maxSize = '';
			textPos = 'vertical';
			break;
			case 2:
			text = '';
			maxSize = 30;
			textPos = 'vertical';
			break;
			case 3:
			maxSize = 30;
			textPos = 'horizontal';
			fontSize = '18px';
			break;
		}
		el.waitMe({
			effect: effect,
			text: text,
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: maxSize,
			waitTime: -1,
			source: 'img.svg',
			textPos: textPos,
			fontSize: fontSize,
			onClose: function(el) {}
		});
            }       
           
      $(document).on('click', '#btn_more', function(e){ 
          e.preventDefault();
          
           var last_id = $(this).data("lastid");
           var type = $(this).data("type_id");
           
           var statelocation;var citylocation;var searchbox;
           statelocation = $('.stateName').data("varid");
           citylocation  = $('.cityName').data("varid");
           searchbox = $('input[name="search"]').val();
           
           if (statelocation == undefined)
           {
               statelocation=null;
           }
           if (citylocation == undefined)
           {
               citylocation=null;
           }
           if(searchbox===''){}
           
           $('#btn_more').html("Loading...");
           run_waitMe($('#btn_more'), 3, 'orbit');
           
           $.ajax({  
                url:"<?= site_url('restaurants/loadmore_rest') ?>",  
                method:"POST",  
                data:
                {
                    lastid:last_id,
                    typeid:type,
                    statelocation:statelocation,
                    citylocation:citylocation,
                    search:searchbox
                },
                dataType: 'json',
                success:function(data)  
                {  
                    $('#btn_more').waitMe('hide');
                     if(data.content != '')  
                     {  
                          $('#loadMore').remove();  
                          $('#rest_cont').append(data.content);  
                     }  
                     else if (data.content === '')
                     {  
                          $('#btn_more').html("No Data");  
                     }  
                }  
           });  
      });  
      
      $(document).ready(function(){
 
        var last_id = $(".getlastid").data("lastid");
        var type = $(".getlastid").data("type_id");
        var action = 'inactive';
        var statelocation;var citylocation;var searchbox;
           
        statelocation = $('.stateName').data("varid");
        citylocation  = $('.cityName').data("varid");
        searchbox = $('input[name="search"]').val();

        if (statelocation == undefined)
        {
            statelocation=null;
        }
        if (citylocation == undefined)
        {
            citylocation=null;
        }
        if(searchbox===''){}
           
        /*
        //alert(start);
        function load_country_data(last_id)
        {
         run_waitMe($('#btn_more'), 3, 'orbit');
          $.ajax({
          url:"<?= site_url('restaurants/loadmore_scroll_rest') ?>",
          method:"POST",
          data:{ lastid:last_id,typeid:type,statelocation:statelocation,citylocation:citylocation,search:searchbox},
          dataType: 'json',
          cache:false,
          success:function(data)
          {
           $('#load_data_div').append(data.content);
           $(".getlastid").data("lastid", data.lastid);
           if(data.content === '')
                {
                    $('#btn_more').waitMe('hide');
                    $('#btn_more').html("No Data");
                    action = 'active';
                }
           else{
                    
                    $('#btn_more').html("Loading...");
                    action = "inactive";
                }
          }
         });
        }

        if(action == 'inactive')
        {
         action = 'active';
         load_country_data(last_id);
        }
        $(window).scroll(function(){
         if($(window).scrollTop() + $(window).height() > $("#load_data_div").height() && action == 'inactive')
         {
          action = 'active';
          last_id = $(".getlastid").data("lastid");
          setTimeout(function(){
          load_country_data(last_id);
          }, 1000);
         }
        });
        */

       });
</script>





<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
$(document).ready(function() {
            new jBox('Tooltip', {
                attach: '.jboxtooltip'
            });
        });

</script>

<script>
    $(document).ready(function(){
        //-- Crear productos dinamicamente
        var products = [];
        products.push({"title":"Tablet Samsung Tab SM-T133","price":"156","discount":"10","photo":"http://fravega.vteximg.com.br/arquivos/ids/290643-280-280/700391_1.jpg","link":""});
        products.push({"title":"Tablet Samsung Galaxy Tab E 96","price":"156","discount":"13","photo":"http://fravega.vteximg.com.br/arquivos/ids/278245-280-280/700270_1.jpg","link":""});
        products.push({"title":"Celular Libre Lenovo Vibe K5 Negro","price":"280","discount":"5","photo":"http://fravega.vteximg.com.br/arquivos/ids/287959-280-280/780686_1.jpg","link":""});
        products.push({"title":"Celular Libre Alcatel IDOL 3","price":"247","discount":"18","photo":"http://fravega.vteximg.com.br/arquivos/ids/284084-280-280/_MG_0204-copy.jpg","link":""});
        products.push({"title":"Tablet Eurocase I748 Tabi 7","price":"130","discount":"20","photo":"http://fravega.vteximg.com.br/arquivos/ids/290699-280-280/700393_1.jpg","link":""});
        products.push({"title":"Celular Libre Samsung Galaxy A5 2016 Dorado","price":"499","discount":"10","photo":"http://fravega.vteximg.com.br/arquivos/ids/284088-280-280/CELULAR-LIBRE-SAMSUNG-GALAXY-A5-2016-DORADO.jpg","link":""});
        products.push({"title":"Celular Libre Admiral ADS1 Blanco","price":"187","discount":"10","photo":"http://fravega.vteximg.com.br/arquivos/ids/294640-280-280/780607_1.jpg","link":""});
        products.push({"title":"Celular Libre Huawei G8 Plateado","price":"550","discount":"5","photo":"http://fravega.vteximg.com.br/arquivos/ids/284323-280-280/CELULAR-LIBRE-HUAWEI-G8-PLATEADO.jpg","link":""});
        products.push({"title":"Celular Libre Samsung Galaxy J1 MINI White","price":"156","discount":"15","photo":"http://fravega.vteximg.com.br/arquivos/ids/294473-280-280/Celular-Libre-Samsung-Galaxy-J1-MINI-White.jpg","link":""});


        function shuffle(a) {
            for (let i = a.length; i; i--) {
                let j = Math.floor(Math.random() * i);
                [a[i - 1], a[j]] = [a[j], a[i - 1]];
            }
            return a;
        }

        showProducts();
        function showProducts(){
            products = shuffle(products);
            $(".canvas").html("");  //-- Empty
            //-- Print                
            $.each(products, function(e, data){
                if (e < 6){
                    //-- Check discount
                    if (data.discount === undefined || data.discount <= 0){
                        var html_discount = '';
                        var new_price = data.price;
                    }else{
                        var html_discount = '<span class="label discounts">-'+data.discount+'%</span>';
                        var new_price = parseInt(data.price) - (parseInt(data.price) * parseInt(data.discount) / 100);
                    }                        
                    //-- Model
                    $(".canvas").append('<div class="col-xs-4 mylabel">\n\
                                          <a href="'+data.link+'">' + html_discount +
                                            '<div style="height:70%;display:flex;justify-content: center;align-content: center;overflow: hidden">'+
                                                '<img style="height:100%" src="'+data.photo+'" alt="Product"/>'+
                                            '</div>'+
                                            '<p>'+ data.title +'</p>'+
                                            '<p class="price" data-price="US $'+data.price+'" data-newprice="US $'+new_price+'">US $'+new_price+'</p>'+
                                        '</a></div>');
                }else{
                    return false; //-- Finish and exit.
                }
            });

            setInterval(function(){ changePrice();}, 3500);
            function changePrice(){
                $(".price").each(function(e,index){
                    if ($(this).text() == $(this).attr("data-newprice")){
                        $(this).html(' <span style="font-weight:normal;color:gray;text-decoration:line-through;">' + $(this).attr("data-price") + '</span>');
                    }else{
                        $(this).html($(this).attr("data-newprice"));
                    }
                });
            }
        }
    });
</script>
<script>
    jQuery(document).ready(function ($) {
        
       /* var _SlideshowTransitions = [
            
				{	
					$Duration:1600,
					$Delay:40,
					$Cols:12,
					$During:{$Left:[0.4,0.6]},
					$SlideOut:true,
					$FlyDirection:2,
					$Formation:$JssorSlideshowFormations$.$FormationStraight,
					$Assembly:260,
					$Easing:{
						$Left:$JssorEasing$.$EaseInOutExpo,
						$Opacity:$JssorEasing$.$EaseInOutQuad
						},
					$ScaleHorizontal:0.2,
					$Opacity:2,
					$Outside:true,
					$Round:{$Top:0.5},
					$Brother:{
						$Duration:1000,
						$Delay:40,
						$Cols:12,
						$FlyDirection:1,
						$Formation:$JssorSlideshowFormations$.$FormationStraight,
						$Assembly:1028,
						$Easing:{
							$Left:$JssorEasing$.$EaseInOutExpo,
							$Opacity:$JssorEasing$.$EaseInOutQuad
							},
						$ScaleHorizontal:0.2,
						$Opacity:2,
						$Round:{$Top:0.5}
						}
				
				}
				
			];
        */

        var options = { 
                $AutoPlay: 1,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1
                
                
                $ArrowKeyNavigation: 1,   			     //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $Idle: 3000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                SlideSpacing: 0,                                    //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                /*$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }*/
        };
        var jssor1_slider_rest_banner = new $JssorSlider$("jssor_rest_banner", options);
        
        //responsive code begin
        //remove responsive code if you don't want the slider scales
        //while window resizing
        function ScaleSlider() {
            var parentWidth = $('#jssor_rest_banner').parent().width();
            if (parentWidth) {
                jssor1_slider_rest_banner.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();
                                        
        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
<script>
/*
        jQuery(document).ready(function ($) {
			
            var _SlideshowTransitions = [
            
				{	
					$Duration:1600,
					$Delay:40,
					$Cols:12,
					$During:{$Left:[0.4,0.6]},
					$SlideOut:true,
					$FlyDirection:2,
					$Formation:$JssorSlideshowFormations$.$FormationStraight,
					$Assembly:260,
					$Easing:{
						$Left:$JssorEasing$.$EaseInOutExpo,
						$Opacity:$JssorEasing$.$EaseInOutQuad
						},
					$ScaleHorizontal:0.2,
					$Opacity:2,
					$Outside:true,
					$Round:{$Top:0.5},
					$Brother:{
						$Duration:1000,
						$Delay:40,
						$Cols:12,
						$FlyDirection:1,
						$Formation:$JssorSlideshowFormations$.$FormationStraight,
						$Assembly:1028,
						$Easing:{
							$Left:$JssorEasing$.$EaseInOutExpo,
							$Opacity:$JssorEasing$.$EaseInOutQuad
							},
						$ScaleHorizontal:0.2,
						$Opacity:2,
						$Round:{$Top:0.5}
						}
				
				}
				
			];

			

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 3000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };
            var jssor_billbrd = new $JssorSlider$("slider5_container_billbrd", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
			
            function ScaleSlider_billbrd() {
                var parentWidth = $('#slider5_container_billbrd').parent().width();
				if (parentWidth) {
					jssor_billbrd.$ScaleWidth(parentWidth);
				}
                else
                    window.setTimeout(ScaleSlider_billbrd, 30);
            }
            ScaleSlider_billbrd();

            $(window).bind("load", ScaleSlider_billbrd);
            $(window).bind("resize", ScaleSlider_billbrd);
            $(window).bind("orientationchange", ScaleSlider_billbrd);
            //responsive code end
			
			
            /*function ScaleSlider_billbrd() {
                var parentWidth = jssor_slider_billbrd.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider_billbrd.$SetScaleWidth(Math.min(parentWidth, 380));
                else
                    window.setTimeout(ScaleSlider_billbrd, 30);
            }

            ScaleSlider_billbrd();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider_billbrd);
            }//
			
            //responsive code end//
        });*/
        
    </script>  