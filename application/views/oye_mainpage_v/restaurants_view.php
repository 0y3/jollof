
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ebs_home_style.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
<style type="">
    .rest_cate_list li{
        padding:0 0 0 10px;
    }
    .res_mem_wrapper_2{
        height: 300px;
    }
    /** MEDIA QUERIES **/
@media only screen and (max-width: 989px){
    .datepicker {
        background-color: #fff !important;
        left: unset !important;
        z-index: 15000 !important;
    }
    .res_contdiv{
        padding: unset !important;
    }
}
    /* Moblie sidebar nav */
        .mobile-sticky {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 99999;
        }
        nav#slide-menu {
            display: none;
        }
        @media screen and (max-width: 768px) {

            nav#slide-menu {
                background: #F8F8F8;
                /*background: #3498DB;
                /*background-color:rgba(232,232,232);*/
                opacity: 1.3;
                position: fixed;
                top: 0;
                left: -300px;
                bottom: 0;
                display: block;
                float: left;
                width: 100%;
                max-width: 293px;
                height: 100%;
                overflow: auto;
                padding-bottom: 25%;
                -moz-transition: all 300ms;
                -webkit-transition: all 300ms;
                transition: all 300ms;
                z-index: 9999;
            }

            .icon-btn.slide-close {
                position: absolute;
                margin: 6px 20px 0 0;
                top: 0;
                right: 0;
                cursor: pointer;
                z-index: 250;

            }

            /*remover desktop */
            .res_nav {
                display: none;
            }
            .nav_mobile{
                padding-top: 10px;
            }
            .nav_mobile li{
                padding: 10px 5px;
            }

            .dropdown-menu{
                background-color: #fff !important;
            }

            /*display mobile sticky on mobile */
            .mobile-sticky {
                display: block;
            }

            /* mobile sticky styles */
            .inner-sticky {
                float: left;
                width: 100%;
                background: #DD3333;
            }

            .mobile-sticky ul {
                margin: 0;
                padding: 0;
            }

            .inner-sticky li {
                float: left;
                width: 33.33%;
                text-align: center;
                background: #DD3333;
                padding: 6px 0;
                list-style-type: none;
            }

            .inner-sticky .fa, .inner-sticky a, nav#slide-menu a {
                color: #FFF;
            }
            nav#slide-menu a {
                color: #696969;
            }

            body.menu-active nav#slide-menu {
                left: 0px;
            }

            .slide-close i.fa.fa-close {
                font-size: 1.2em;
                color: #606060;
                right: 0;
                border-radius: 50%;
                padding: 6px;
            }

            .slide-close i.ion-close {
                font-size: 2em;
                right: 0;
                border-radius: 50;
                padding: 6px;
                border: 1px solid ;
                color: ;
                padding: 4px 5px 1px;
            }

            .menu-mobile .menu {
                margin-top: 9vh;
                padding-left: 0px;
                padding-right: 0px;
                margin-left: 0px;
                margin-right: 0px;
            }

            .menu-mobile .menu li {
                list-style-type: none;
                display: block;
                font-size: 30px;
                border: solid 1px #fff;
                width: 90%;
                margin: 10px auto;
                text-align: center;
                border-radius: 7px;
            }
            .res_contdiv_a 
            {
                padding: unset !important;
            }

        }
        body 
        {
           font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
           font-size: 14px !important;
        }
        .sw_button i
        {
          vertical-align: middle !important;
        }
        .res_mem_logo_cont p
        {
            color: #fff;
        }

    
</style>

<link href="<?= base_url() ?>assets/css/mainpage_style.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">


<script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>

<script src="<?= base_url() ?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.datepair.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/background.slide.js"></script>
   
       
        <script type="text/javascript">
            $(document).ready(function() {
                $(".res_mem_wrapper_2").backgroundCycle({
                    imageUrls: [
                        <?php if( !empty($rest_banner_slidder) ): ?>
                            <?php foreach($rest_banner_slidder as $imgs) :?>
                                '<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/<?= $imgs->imagename; ?>',
                            <?php endforeach; ?>
                        <?php else: ?>
                            '<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/food.png',
                        <?php endif; ?> 
                            
                        /*
                        '<?php echo base_url(); ?>assets/admin/img/bg_1.jpg',
                        '<?php echo base_url(); ?>assets/admin/img/bg_2.jpg',
                        '<?php echo base_url(); ?>assets/admin/img/bg_3.jpg'*/
    
                    ],
                    fadeSpeed: 2000,
                    //duration: 5000,
					duration: 3000,
                    backgroundSize: SCALING_MODE_COVER
                });
            });
        </script>

<?php foreach ($get_all_resta as $resta) :?>

<?php $tablecheck = $resta['tablereservation'];?>

<div id="home" class="res_mem_wrapper_2">
<script>
    var rest_banner = '<?= $resta['banner']; ?>';
    if(rest_banner != ''){
        
        rest_banner = '<?= base_url() ?>assets/uploads/rest_logo/<?= $resta['banner']; ?>';
        
        $(".res_mem_wrapper").css({
                "background-image": 'url(" ' + rest_banner +' ")',
            });
    }
</script>
    <div class="res_trans"></div>
         <!--left content column-->
            
        <div class="res_contdiv">
           
            <div class="res_contdiv_a " >
                
                <div class="res_mem_logo col-xs-5 col-sm-2">
                    
                    <img class="logo_img " src="<?= base_url() ?>assets/uploads/rest_logo/<?= $resta['logo']; ?>" alt="">
                </div>
                
                <div class="res_mem_logo_cont col-xs-7 col-sm-10" style="padding-left: 0px; padding-right: 0px; ">
                    
                    <h1 title="<?= $resta['companyname'] ?>"> <?= $resta['companyname'] ?> </h1>
                    
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
                    
                    <?php 
                        $dt = $resta['deliverytime'];
                        $pick = $resta['pickup'];
                        $deliv = $resta['homedelivery'];
                        if($dt==null)
                          {
                            $dt_ans= 'null';
                          }
                        else
                          {
                            $dt_ans= $dt. 'min';
                          }
                          
                        if($pick=='1' && $deliv == '1')
                          {
                            $dl_ans= 'Pickup, Delivery';
                          }
                          elseif ($pick=='0' && $deliv == '1') 
                            {
                              $dl_ans= 'Delivery';
                            }
                            elseif ($pick=='1' && $deliv == '0') 
                            {
                              $dl_ans= 'Pickup';
                            }
                        else
                          {
                            $dl_ans= 'null';
                          }

                    ?> 
                    <p><i class="fa fa-cutlery" aria-hidden="true"></i> <?= $resta['companydesc'] ?></p>
                    <p class=" "><i class="fa fa-map-marker"></i> <?= $resta['address'] ?>, <?=  $resta['city'][0]["cityname"]; ?>, <?=  $resta['state'][0]->statename; ?>,</p>
                    <p><i class="fa fa-truck" aria-hidden="true"></i> <span>Delivery Options :</span><span> <?= $dl_ans ?> </span></p>
                    <p><i class="fa fa-money" aria-hidden="true"></i> <span>Minimum Order:</span> <span> ₦<?= $resta['minorder'] ?></span></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Estimated time: <?= $dt_ans?> </p>
                    
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
            
                    <div class="res_mem_op">
                        <spam class="label <?=$label?> boxset res_set"><?= $status ?></spam>
                    </div>
                    
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            
        </div>
         
</div>
<?php endforeach; ?>

<div class="container top20 botton20" >
    
    <div class="row ">
         <!--left content column-->
            
         <div class="col-sm-2 res_nav" style=" padding-left: 5px; padding-right: 5px;"> <!-- nav -->
            
           <div id="nav-anchor"></div>
           <nav class="nav_r">
                <ul>
                    <li><a href="#home">Restaurant info</a></li>
                    <li class="dropdown" >
                        <a href="#menu">Menu</a>
                        <?php if(!empty($resta_menu)): ?>
                        <b class="caret"></b>
                        
                        <ul class="dropdown-menu">
                            
                            <span class="rest_cate_list">
                                <?php foreach ($resta_menu as $menu) :?>
                                    <li><a href="#<?= $menu['slug']; ?>"><?= $menu['categoryname']; ?></a></li>
                                <?php endforeach; ?>
                            </span>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php if( $tablecheck == 1 ): ?>    
                    <li><a href="#book_table">Book a Table</a></li>
                    <?php endif; ?>
                    <li><a href="#open_hr">Opening Hours</a></li>
                    <li><a href="#review">Reviews</a></li>
                </ul>
            </nav>
        </div><!-- /nav -->
         
        <div class="col-sm-7 cont_section"><!-- content -->
            
            <!--<div class="res-search-input">
                 
                <div class="input-group col-md-12 ">
                    <input type="text" class="  search-query form-control" placeholder="Search menu" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger " type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                 </div>
                
            </div>-->
            
            <section class="col-md-12" id="menu" style="">
                
                
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Menu
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <?php if(!empty($resta_menu)): ?>
                
                <?php foreach ($resta_menu as $menu) :?>
                <div id="<?= $menu['slug']; ?>" class="list_con">
                    
                    <h3 id="<?= $menu['id']; ?>"> <?= $menu['categoryname']; ?></h3>
                    <ul>
                    
                    <?php if(!empty($menu['products_cate'])): ?>
                    <?php foreach ($menu['products_cate'] as $products) :?>
                    <!-- product under each category -->
                    
                    <!--<a class="ajaxbook_form fancybox.ajax" href="<?= base_url(); ?>restaurants/order_form/<?= $products['id'] ?>">
                    <a  href="javascript:void(0)" class="ajaxbook_form fancybox.ajax" data-fancyboxxs data-type="ajax" data-src="<?= base_url(); ?>restaurants/order_form/<?= $products['id'] ?>"> -->
                    <a  href="<?= base_url(); ?>restaurants/orderform/<?= $products['id'] ?>" class="">
                        <input type="hidden" name="restaurantid" value="<?= $restaurantid ?>">
                        <input type="hidden" name="productid" value="<?= $products['id'] ?>">
                        <input type="hidden" name="" value="">
                        
                        <li class="list" data-id="<?= $products['id'] ?>" data-name="<?= $products['productname'] ?>">
                        <!-- Profile Section -->
                        <div class="list__item">
                            
                            <div class="list__photos">
                                <?php
                                    
                                    if(!empty($products['productimage']))
                                        {
                                            $products_img= $products['productimage'];
                                        }
                                    else 
                                        {
                                            $products_img= 'no_food_img.jpg';
                                        }
                                ?>
                                <img src="<?= base_url() ?>assets/uploads/rest_prod/<?= $products_img ?>"> 
                            </div>
                            
                            <div class="list__label">
                                
                              <div class="list__label--header"> <?= $products['productname'] ?> </div>
                              <div class="list__label--value"> <?= $products['productdesc'] ?>  </div>
                              
                            </div>
                            
                            <div class="list__price">
                            
                                ₦<?= $products['productprice'] ?>
                        
                            </div>
                            
                        </div>
                        
                      </li>
                      
                    </a>
                    <!--end of product under each category -->
                    
                    <?php endforeach; ?>
                     
                    <?php else: ?>
                
                        <div class="alert alert-warning alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Oh snap!</strong>
                            Sorry No product for this Category Now.
                        </div>

                    <?php endif; ?>


                    </ul>

                </div>
                <?php endforeach; ?>
                <?php else: ?>
                
        
                    <div class="col-sm-9 alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Oh snap!</strong>
                        Sorry No product for now.
                    </div>
                    
                <?php endif; ?>

                
            </section>
            <?php if( $tablecheck == 1 ): ?>
            <section id="book_table" class="col-md-12" >
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Table Reservation
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <div class="list_con">
                    
                    
                    <?php if( $tablecheck == 1 ): ?>
                    
                    <form id="table_form" class="table_book_form" id="<?= $restaurantid ?>" action="<?= site_url('restaurants/restaurant_table') ?>" method="POST">
                        <h4>Booking Information</h4>
                        <br/>
                        
                        <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                            <span class="error_msgr_lg"> </span>

                        </div>
                        
                        <input type="hidden" name="restaurantid" value="<?= $restaurantid ?>">
                        <div class="form-group table_book">                    
                            <input  type="text" name="guest_num" value="" class="cu_phone_js" placeholder="Number of Guests" required="required">
                        </div>
                        <div class="row">
                                <div class="col-sm-5 ">
                                    <div id="" class="form-group table_book">
                                        <label class="control-label" for="date_booking" style="padding-left:10px;">Checkin Date</label>
                                        <input class="form-control c_date" type="text" name="date_booking" id="datetest" value=""  required="">
                                        <span class="text-danger" id="datepicker_info"> </span>
                                    </div>
                                    
                                </div>
                                
                                
                                <!-- Time input-->
                                <div class="col-sm-7 ">
                                    <div class="form-group table_book">
                                        <label class="control-label" for="time_booking" >Time</label>
                                        <input type="text" name="time_booking" id="timepicker" class="c_timepick form-control" required="" disabled="">
                                        <span class="text-danger" id="timepicker_info"></span>
                                    </div>
                                </div>
                                
                                
                        </div>
                        
                        <br/>
                        <h4>Contact Information</h4>

                        <div class="form-group table_book">                    
                            <input  type="text" name="cont_name" value="" class="form-control" placeholder="Name" required="required">
                        </div>
                        
                        <div class="form-group table_book">                    
                            <input class="form-control" type="email" name="email" id="email" placeholder="Your Email" required="required">
                        </div>
                        
                        <div class="form-group table_book">                    
                            <input  type="text" name="cell"  value="" class="cu_phone_js" placeholder="Phone Number" required="required">
                        </div>
                        
                        <div class="form-group table_book">
                            Your Instructions....
                            <textarea rows="3" name="note" class="form-control tablenote" placeholder="Your Instructions...."></textarea>
                        </div>

                        <button type="submit" class="tableresbtu btn btn-primary">Book a Table</button>
                        <a href="<?= site_url('accounts/login')?>" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup" class="pull-right login"></a>                        
    


                    </form>
                    
                    <?php else: ?>
                
        
                        <div class="col-sm-12 alert alert-danger alert-dismissable fade in">
                            <strong>Oh snap! </strong>
                             Sorry No Table Reservation for now.
                        </div>

                    <?php endif; ?>
                     
                </div>
                    
                   
                
            </section>
            <?php endif; ?>
            
            <section id="open_hr" class="col-md-12" >
                 
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Contact & Hours
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                <div class="list_con">
                    
                    <div class=" table_book_form">
                        
                        <?php foreach ($get_all_resta as $resta) :?>
                            <div class=" res_cont_info">
                                <p>
                                    <label class="res_cont_info_lable"> Phone : </label> 
                                    <span><?= $resta['phone'] ?></span> <span style=" padding-left: 10px;"><?= $resta['phone2'] ?></span> 
                                </p>
                                <p>
                                    <label class="res_cont_info_lable"> Email : </label> 
                                    <span><?= $resta['email'] ?></span>
                                </p>
                            </div>
                        <?php endforeach; ?>

                            <!-- Time input-->
                            <div class="res_time_info">
                                <h6><b>Opening Hours</b></h6>
                                
                                <?php foreach ($get_resta_time as $resta_time) :?>
                                
                                    <?php $txt = ' Closed '  ?>
                                    <p>
                                        <label class="res_time_info_n"> Mon : </label> 
                                        
                                        <?php if($resta_time->monstatus == 1): ?>
                                            <span class="res_time_info_o getmonopen"><?= date('h:i A', strtotime($resta_time->monopen)) ?> </span> 
                                            -
                                            <span class="res_time_info_c getmonclose" data-getmonclose="<?= date('h:i A', strtotime($resta_time->monclose)-60 * 60 * 1) ?>"><?= date('h:i A', strtotime($resta_time->monclose)) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"><?=$txt ?></kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                    
                                        
                                    
                                    <p>
                                        <label class="res_time_info_n"> Tue : </label> 
                                        
                                        <?php if($resta_time->tuestatus == 1): ?>
                                            <span class="res_time_info_o gettueopen"><?= date('h:i A', strtotime($resta_time->tueopen)) ?> </span> 
                                            - 
                                            <span class="res_time_info_c gettueclose" data-gettueclose="<?= date('h:i A', strtotime($resta_time->tueclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->tueclose)) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"> <?=$txt ?> </kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                        
                                    
                                    <p>
                                        <label class="res_time_info_n"> Wed : </label>
                                        
                                        <?php if($resta_time->wedstatus == 1): ?>
                                            <span class="res_time_info_o getwedopen"><?= date('h:i A', strtotime($resta_time->wedopen)) ?> </span>
                                            - 
                                            <span class="res_time_info_c getwedclose" data-getwedclose="<?= date('h:i A', strtotime($resta_time->wedclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->wedclose)) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"><?=$txt ?></kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                        
                                    
                                    <p>
                                        <label class="res_time_info_n"> Thu : </label>
                                        
                                        <?php if($resta_time->thustatus == 1): ?>
                                            <span class="res_time_info_o getthuopen"><?= date('h:i A', strtotime($resta_time->thuopen ))?> </span>
                                            - 
                                            <span class="res_time_info_c getthuclose" data-getthuclose="<?= date('h:i A', strtotime($resta_time->thuclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->thuclose)) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"><?=$txt ?></kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                
                                    
                                    <p>
                                        <label class="res_time_info_n"> Fri : </label> 
                                        
                                        <?php if($resta_time->fristatus == 1): ?>
                                            <span class="res_time_info_o getfriopen"><?= date('h:i A', strtotime($resta_time->friopen)) ?> </span>
                                            - 
                                            <span class="res_time_info_c getfriclose" data-getfriclose="<?= date('h:i A', strtotime($resta_time->friclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->friclose ))?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"><?=$txt ?></kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                        
                                    <p>
                                        <label class="res_time_info_n"> Sat : </label> 
                                        
                                        <?php if($resta_time->satstatus == 1): ?>
                                            <span class="res_time_info_o getsatopen"><?= date('h:i A', strtotime($resta_time->satopen) ) ?> </span>
                                            - 
                                            <span class="res_time_info_c getsatclose" data-getsatclose="<?= date('h:i A', strtotime($resta_time->satclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->satclose)) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"><?=$txt ?></kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                    
                                    <p>
                                        <label class="res_time_info_n"> Sun : </label>
                                        
                                        <?php if($resta_time->sunstatus == 1): ?>
                                            <span class="res_time_info_o getsunopen"><?= date('h:i A', strtotime($resta_time->sunopen)) ?> </span> 
                                            -
                                            <span class="res_time_info_c getsunclose" data-getsunclose="<?= date('h:i A', strtotime($resta_time->sunclose)-60 * 60 * 1) ?>" ><?= date('h:i A', strtotime($resta_time->sunclose) ) ?></span> 
                                        
                                        <?php else: ?>
                                            <span class="res_time_info_o "> <kbd class="bg_scheme_color"> <?=$txt ?> </kbd>  </span> 
                                            
                                        <?php endif; ?>
                                    </p>
                                        
                                <?php endforeach;?>
                                
                            </div>
                    </div>
                    
                </div>
                
            </section>
            
            <section id="review" class="col-md-12" >
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Customers Reviews
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <div class="list_con">
                    
                    
                </div>
                
            </section>
            
        </div><!-- /content -->
         
        <div class="col-sm-3 ">
          <!-- <div id="Notice-6" class="target-notice">Click me</div> -->
          
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
                                    <a href="<?=$imgs->imageurl?>"><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>"/></a>
                                <?php else: ?>

                                    <!--<img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%">-->
                                    <img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>"/>

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
                </div>
            <!--banner End-->
          
        </div>
         
    </div>
    
</div>

<div class="mobile-sticky">
    <div class="inner-sticky">
        <ul>
            <li>
                <div class="icon-btn trigger"  title="Filters Products">
                    <i class="fa fa-filter fa-1x"> Filters</i>
                </div>
            </li>
            <!--<li><a href="tel:1234567890"><i class="fa fa-phone fa-2x"></i></a></li>
            <li>
                <a href="mailto:email@yourwebsite.com"><i
                    class="fa fa-envelope fa-2x"></i>
                </a>
            </li>-->
        </ul>
    </div>
</div>
<nav id="slide-menu">
    <div class="icon-btn slide-close"><i class="fa fa-close"></i></div>
    <div class="menu">

        <!-- your menu goes here -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
        <!-- Sidebar Filter -->
        <div id="nav-anchor"></div>
           <nav class="nav_r">
                <ul class="nav_mobile">
                    <li><a href="#home">Restaurant info</a></li>
                    <li class="dropdown" >
                        <!--<a href="#menu">Menu</a>-->
                        Menu
                        <?php if(!empty($resta_menu)): ?>
                        <b class="caret"></b>
                        
                        <ul class="dropdown-menu">
                            
                            <span class="rest_cate_list">
                                <?php foreach ($resta_menu as $menu) :?>
                                    <li><a href="#<?= $menu['slug']; ?>"><?= $menu['categoryname']; ?></a></li>
                                <?php endforeach; ?>
                            </span>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php if( $tablecheck == 1 ): ?>    
                    <li><a href="#book_table">Book a Table</a></li>
                    <?php endif; ?>
                    <li><a href="#open_hr">Opening Hours</a></li>
                    <li><a href="#review">Reviews</a></li>
                </ul>
            </nav>
         <!-- End of Sidebar Filter -->
                </div>
            </div>
        </div>

    </div>
</nav>  


<!-- Dropdown-Menu-JavaScript -->
    <script>
            $(document).ready(function(){
                    $(".dropdown").hover(            
                            function() {
                                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                                    $(this).toggleClass('open');        
                            },
                            function() {
                                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                                    $(this).toggleClass('open');       
                            }
                    );
            });
    </script>
<!-- //Dropdown-Menu-JavaScript -->


<!-- script-for-menu -->
<script>                    
        $("span.menu").click(function(){
                $(".top-nav ul").slideToggle("slow" , function(){
                });
        });
        

    
</script>
<!-- script-for-menu -->

<!-- Moblie sidebar nav -->
<script>
jQuery(document).ready(function ($) {

    (function slideMenu() {

        var trigger = '.trigger'; // the triger class
        var showslide = 'menu-active'; // the active class that is added to the body
        var body = 'body'; //body of element
        var close = '.slide-close'; // the class that closes the slide
        var slideout = 'slideout'; // the class to show the slide
        var mainId = '#slide-menu' //main wrapper ID

        //open the slide and add class to body to use with css
        jQuery(trigger).click(function () {

            jQuery(body).toggleClass(showslide);
            jQuery(mainId).toggleClass(slideout);

        });

        //close the slide
        jQuery(close).click(function () {

            jQuery(body).removeClass(showslide);
            jQuery(mainId).removeClass(slideout);
        });

    }).call(this);

}());
    $(".nav_mobile li a").click(function() {
        $("body").removeClass('menu-active');
        $("#slide-menu").removeClass('slideout');
    });
</script>

<script>
    $('#Notice-6').click(function() {
  
        new jBox('Notice', {
          //animation: 'flip',
          animation: {
            open: 'tada',
            close: 'zoomIn'
          },
          position: {
            x: 10,
            y: 500
          },
          attributes: {
            x: 'right',
            y: 'bottom'
          },
          color: 'green',
          autoClose: Math.random() * 8000 + 2000,
          //title: 'Tadaaa! I\'m single',
          content: 'Success! Product Added To Cart',
          delayOnHover: true,
          showCountdown: true,
          closeButton: true
        });
  
    });
    
    
  
</script>
<script src='<?= base_url() ?>assets/js/jquery.scrollto.js'></script>
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>

<script>
$("[data-toggle='modal']").click(function(e) {
    /* Prevent Default*/
    e.preventDefault();
                        
    /* Parameters */
    var url = $(this).attr('href');
    var container = $(this).attr('data-target');
                
    /* XHR */
    $.get(url).done(function(data) {
        $(container).html(data).modal();
    }).success(function() { $('input:text:visible:first').focus(); });
            
});    
</script>

<script>

    $(document).ready(function(){

    /** 
     * This part does the "fixed navigation after scroll" functionality
     * We use the jQuery function scroll() to recalculate our variables as the 
     * page is scrolled/
     */
    $(window).scroll(function(){
        var window_top = $(window).scrollTop() + 60; // the "60" should equal the margin-top value for nav.stick
        var div_top = $('#nav-anchor').offset().top  ;
       
            if (window_top > div_top) {
                $('.nav_r').addClass('stick');
            } else {
                $('.nav_r').removeClass('stick');
            }
    });

    /**
     * This part causes smooth scrolling using scrollto.js
     * We target all a tags inside the nav, and apply the scrollto.js to it.
     */
    $(".nav_r a").click(function(evn){
        evn.preventDefault();
        var target = $(this.hash).offset().top-100;
        //alert(target);
        $('html,body').scrollTo(target, target); 
    });

    /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and 
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $(".nav_r li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset(); // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$(".nav_r li:last-child a").hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                $(".nav_r li:last-child a").addClass("nav-active");
            }
        }
    });
});

// for number only input
$(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
    });
   

// jquery.timepicker//   

    validate();
    //$('.c_date').change(validate);
    //$('#datetest').change(validate);
    
    function validate() {
        var inputvalue = $('.c_date').filter(function (n) {
            return this.value.length > 0;
        });
        var dater = $('.c_date').val();

        if (dater) {
            $('.c_timepick').prop("disabled", false);
        } else {

            $('.c_timepick').prop("disabled", true);
            $('#timepicker_info').text('');
            
        }
    }
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    
    
    var time = nowTemp.getHours() + ":" + nowTemp.getMinutes() ;
    
    var month = ("0" + nowTemp.getMonth()+1).slice(-2);
    var date = ("0" + nowTemp.getDate()).slice(-2);
    var year = nowTemp.getFullYear();
    var datenow = year+ "-" +month+ "-" +date;
    
    var timeopen = null;
    var timeclose =null;
    var eventDate = null;
    var msg = null;
 
    
    

  $('#datetest').datepicker({
      beforeShowDay: function(e) {
        return e.valueOf() < now.valueOf() ? 'disabled' : '';
    },
        'format': 'yyyy-mm-dd',
        'autoclose': true
        
    });
    
    $('#datetest').on('changeDate', function() {
        
         
         
        eventDate = $(this).val();

        var weekday = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        var date = new Date(eventDate).getDay();

        var day = weekday[date];        
   
        //$('#datepicker_info').text( day);
        //$('#datepicker_info').text($(this).val());  
        //validate();
       
        
        switch (day) {
            
            case 'Sun':
                timeopen = $('.getsunopen').text();
                timeclose = $('.getsunclose').data('getsunclose');
                
                break; 
                
            case 'Mon':
                timeopen = $('.getmonopen').text();
                timeclose = $('.getmonclose').data('getmonclose');
                break;
                
            case 'Tue':
                timeopen = $('.gettueopen').text();
                timeclose = $('.gettueclose').data('gettueclose');
                break;
             
            case 'Wed':
                timeopen = $('.getwedopen').text();
                timeclose = $('.getwedclose').data('getwedclose');  
                break;
            
            case 'Thu':
                timeopen = $('.getthuopen').text();
                timeclose = $('.getthuclose').data('getthuclose');
                break;
            
            case 'Fri':
                timeopen = $('.getfriopen').text();
                timeclose = $('.getfriclose').data('getfriclose');
                break;
            
            case 'Sat':
                timeopen = $('.getsatopen').text();
                timeclose = $('.getsatclose').data('getsatclose');
                break;
            
            default: 
                timeopen = '';
                timeclose = '';
        }
        
        if (timeopen === '' || timeclose === '')
            {
                
                $('input[type="text"].c_timepick').prop("disabled", true);
                $('#timepicker').timepicker('setTime', '');
                msg = 'Table Reservation is close for this Day';
            }
        else
            {
                validate();
                $('#timepicker').timepicker('setTime', '');
                msg = 'Opening Hours is Between ' + timeopen +' to '+ timeclose;
            }
       
        $('#timepicker_info').text(msg);
                                   
        /*$('#timepicker').timepicker({
            'minTime': timeopen,
            'maxTime': timeclose,
           'showDuration': true,
            'disableTimeRanges': [
                ['1pm', '2pm'],
                ['3pm', '4:01pm']
            ]
        });*/
        
    });
    
    $('#timepicker').timepicker({
        'timeFormat':'h:i A',
        'scrollDefault': 'now'
    });
    
   
    
    
    $('#timepicker').on('changeTime', function() {
        
        var ss = Date.parseExact($(this).val(), 'hh:mm tt');
        
        var timenow     = new Date("1/1/1900 " + time);
        var selectDate  = new Date("1/1/1900 " + $(this).val());
        var startDate   = new Date("1/1/1900 " + timeopen);
        var endDate     = new Date("1/1/1900 " + timeclose);
        
        
        if(selectDate >= startDate && selectDate <= endDate) 
            {
                 // Enable submit button
                 //alert( "-timenow- "+timenow +" -selectedate- "+ selectDate +" -startdate- "+ startDate + " - enddate- " + endDate);
                
                if (eventDate === datenow && timenow >  endDate )
                    {
                        alert('Sorry Restaurant Table Reservation is close for Today due to the Time ');
                        $('#timepicker').timepicker('setTime', '');
                    }
            }
        else 
            {
                 // Disable submit button
                alert(msg);
                $('#timepicker').timepicker('setTime', '');
            }

        
    });
    
    //check is log in b4 submitting to table Reservation  
   
   $("#table_form").submit(function (e){
                
        e.preventDefault();
                
 
                
        var getid = $(this).attr('id');
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $.ajax({
           url:url,
           type:method,
           dataType: 'json',
           data:data
        }).done(function(data)
            {

                    if(data.status === '1' )
                    { 
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            position: {
                              x: 10,
                              y: 100
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'green',
                            autoClose: Math.random() * 8000 + 2000,
                            //title: 'Tadaaa! I\'m single',
                            content: 'Success!  Table Reservation Submitted successfull...',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                          });

                          $('#table_form')[0].reset();
                          $('#timepicker_info').text(null);
                          
                          validate();


                    }
                    else if(data.status === '0' )
                    {
                        //alert('error ' + data.status); 
                        $('#table_form').find(".get_error").show("fast");
                        $('#table_form').find(".get_error").effect("shake");
                        $('#table_form').find(".error_msgr_lg").text(data.content);


                        $('#timepicker_info').text(null);
                        $('#table_form')[0].reset();
                        validate();
                    } 

            });
                  
                 
    });
   /* 
    $("#table_form").submit(function (e){
                
                e.preventDefault();
                
                var islogin = $(".log").data("log");
                //var url = "<?=site_url('checkout/products') ?> "; //$(this).attr('href');

                if(islogin === 1)
                    {
                        
                
                        var getid = $(this).attr('id');
                        var url = $(this).attr('action');
                        var method = $(this).attr('method');
                        var data = $(this).serialize();

                        $.ajax({
                           url:url,
                           type:method,
                           dataType: 'json',
                           data:data
                        }).done(function(data)
                                {

                                    if(data.status === '1' )
                                    { 
                                            new jBox('Notice', {
                                                //animation: 'flip',
                                                animation: {
                                                  open: 'tada',
                                                  close: 'zoomIn'
                                                },
                                                position: {
                                                  x: 10,
                                                  y: 100
                                                },
                                                attributes: {
                                                  x: 'right',
                                                  y: 'bottom'
                                                },
                                                color: 'green',
                                                autoClose: Math.random() * 8000 + 2000,
                                                //title: 'Tadaaa! I\'m single',
                                                content: 'Success!  Table Reservation Submitted successfull...',
                                                delayOnHover: true,
                                                showCountdown: true,
                                                closeButton: true
                                              });

                                              $('#table_form')[0].reset();
                                              $('#timepicker_info').text(null);
                                              
                                              validate();


                                    }
                                    else if(data.status === '0' )
                                    {
                                        //alert('error ' + data.status); 
                                        $('#table_form').find(".get_error").show("fast");
                                        $('#table_form').find(".get_error").effect("shake");
                                        $('#table_form').find(".error_msgr_lg").text(data.content);


                                        $('#timepicker_info').text(null);
                                        $('#table_form')[0].reset();
                                        validate();
                                    } 

                                });
                    }
                else
                    {
                        //var url = "<?=site_url('accounts/login') ?> "; //$(this).attr('href');
                        //window.location.href = url;
                        $('.login').click();
                        
                    }
                 
        });
        */
    // initialize datepair

    $("#tip5").fancybox({
	'scrolling'		: 'no',
	'titleShow'		: false,
	'onClosed'		: function() {
	    $("#login_error").hide();
	}
});


// pupup on add product to cart
$(".ajaxbook_form").fancybox({
        maxWidth	: 480,
        maxHeight	: 480,
        autoHeight  : true,
        fitToView	: false,
        width		: '70%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
});
 
</script>

<script>
    jQuery(document).ready(function ($) {

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
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

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