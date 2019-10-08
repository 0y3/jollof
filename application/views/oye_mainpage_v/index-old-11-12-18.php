<!doctype html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
	<head>
		<title>landing - page</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!--meta info-->
		<meta name="author" content="">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/jol_1.ico">
		<!--stylesheet include-->
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/bootstrap.css">
                
                <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsiveslides.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/camera.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.carouselnew.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.transitions.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/jquery.custom-scrollbar.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/dav_landingpage_style.css">
                <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
                <link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
		<!--font include-->
		<link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ebs_home_style.css">
                
                
                
                <script src="<?=base_url(); ?>assets/js/jquery-2.2.4.js"></script>
                <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                <script src="<?=base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
                <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
                <script src="<?=base_url(); ?>assets/js/jquery-ui.min.js"></script>
                
                <!--Notification stylesheet include-->
                <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
                <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
                <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
                
                <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
                <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>



                <script type="text/javascript" src="<?=base_url(); ?>assets/js/jssor.slider.min.js"></script>

               

                
<style>
    
.homeslider_div {
  position: relative;
}
.homeslider_div img {
max-height: 500px;
/*min-height: 250px;*/
}
.animate_fade img{
max-width: 100px;
max-height: 80px;
}
.cap_font{
    text-transform: uppercase;
}

.rslides_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  /*top: 20%;
  left: 0;*/
  bottom: 35%;
  opacity: 0.7;
  text-indent: -9999px;
  overflow: hidden;
  text-decoration: none;
  height: 61px;
  width: 38px;
  background: transparent url("assets/img/themes.gif") no-repeat left top;
  margin-top: -45px;
  }

.rslides_nav:active {
  opacity: 1.0;
  }

.rslides_nav.next {
  left: auto;
  background-position: right top;
  right: 0;
  }

.transparent-btns_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  top: 0;
  left: 0;
  display: block;
  background: #fff; /* Fix for IE6-9 */
  opacity: 0;
  filter: alpha(opacity=1);
  width: 48%;
  text-indent: -9999px;
  overflow: hidden;
  height: 91%;
  }

.transparent-btns_nav.next {
  left: auto;
  right: 0;
  }

.large-btns_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  opacity: 0.6;
  text-indent: -9999px;
  overflow: hidden;
  top: 0;
  bottom: 0;
  left: 0;
  background: #000 url("assets/img/themes.gif") no-repeat left 50%;
  width: 38px;
  }

.large-btns_nav:active {
  opacity: 1.0;
  }

.large-btns_nav.next {
  left: auto;
  background-position: right 50%;
  right: 0;
  }

.rslides_nav:focus,
.transparent-btns_nav:focus,
.large-btns_nav:focus {
  outline: none;
  }
  
  


.rslides_tabs,
.transparent-btns_tabs,
.large-btns_tabs {
  z-index: 10;
  position:relative;
  margin-top: -20px;
  margin-bottom: 30px;
  text-align: center;
  }

.rslides_tabs li,
.transparent-btns_tabs li,
.large-btns_tabs li {
  display: inline;
  float: none;
  _float: left;
  *float: left;
  margin-right: 5px;
  }

.rslides_tabs a,
.transparent-btns_tabs a,
.large-btns_tabs a {
  text-indent: -9999px;
  overflow: hidden;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
  background: #ccc;
  background: rgba(0,0,0, .2);
  display: inline-block;
  _display: block;
  *display: block;
  -webkit-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  -moz-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  width: 9px;
  height: 9px;
  }

.rslides_here a,
.transparent-btns_here a,
.large-btns_here a {
  background: #222;
  background: rgba(0,0,0, .8);
  }
  .circle_curve
  {
    border-radius: 20%;
    -webkit-border-radius:20%;
  }

  .subtext
  {
    position: absolute;
    bottom: 10%;
    background-color: gray;
  }
  .item{
    min-height: 200px !importantt;
  }
@media only screen and (max-width: 992px){
  .micro_photo img
  {
    height:230px;
  }
}

</style>
<?php

    $this->load->model('oye/Super_admin_model');
    $info = $this->Super_admin_model->get_admin_info();

?>
	</head>
	<body>
		<!--boxed layout-->
		<div class="boxed_layout-- relative w_xs_auto">
			<!--[if (lt IE 9) | IE 9]>
				<div style="background:#fff;padding:8px 0 10px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
			<![endif]-->
			<!--markup header-->
		<header role="banner">
				<!--header top part-->
				<section class="h_top_part">
					<div class="container">
						<div class="row clearfix">

						
							<nav class="col-lg-4 col-md-4 col-sm-5 t_align_r t_xs_align_c">
							</nav>


								<div class="col-lg-4 col-md-4 col-sm-2 t_align_c t_xs_align_c">
								<p class="f_size_small">Call Or Whatsapp on: <b class="color_dark">+<?=$info->whatsapp?></b></p>
							</div>

							<!--
                                                        <div class="col-lg-4 col-md-4 col-sm-5 t_xs_align_c">
								<p class="f_size_small">Welcome visitor can you	<a href="#" data-popup="#login_popup">Log In</a> or <a href="#" data-popup="#register_popup">Create an Account</a> </p>
							</div>
                                                        -->

						</div>
					</div>
				</section>
				<!--header bottom part-->
                                <section class="h_bot_part container">
					<div class="clearfix row">
						<div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">
							<a href="<?= base_url();?>" class="logo m_xs_bottom_15 d_xs_inline_b">
			
                                                            <img src="<?= base_url() ?>assets/img/jollof_logo.png" alt="">

                                                        </a>
						</div>
						 
					</div>
				</section>
				<!--main menu container-->
				<section class="menu_wrap relative">
					<div class="container clearfix">
						<!--button for responsive menu-->
						<button id="menu_button" class="r_corners centereddb d_none tr_all_hover d_xs_block m_bottom_10">
							<span class="centered_db r_corners"></span>
							<span class="centered_db r_corners"></span>
							<span class="centered_db r_corners"></span>
						</button>
						<!--main menu-->
					<nav role="navigation" class="f_left f_xs_none d_xs_none nav_l">	
							<ul class="horizontal_list main_menu clearfix">

								<li class="current relative f_xs_none m_xs_bottom_5"><a href="" class="tr_delay_hover color_light tt_uppercase"><b>Home</b></a>
								
								</li>
                                                                
								<!--
                                                                <li class="relative f_xs_none m_xs_bottom_5"><a href="index_layout_wide.html" class="tr_delay_hover color_light tt_uppercase"><b>Help Center</b></a>
								
								</li>
                                                                -->
								
						
								<!--
                                                                <li class="relative f_xs_none m_xs_bottom_5"><a href="blog.html" class="tr_delay_hover color_light tt_uppercase"><b>Blogs</b></a>
										
									<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
										<ul class="sub_menu">
											<li><a class="color_dark tr_delay_hover" href="features_shortcodes.html">Cuisine blog</a></li>
											<li><a class="color_dark tr_delay_hover" href="features_typography.html">Fashion blog</a></li>
										
										</ul>
									</div>
								
								</li>
                                                                
								<li class="relative f_xs_none m_xs_bottom_5"><a href="features_shortcodes.html" class="tr_delay_hover color_light tt_uppercase"><b>Resources</b></a>
									
									<div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
										<ul class="sub_menu">
											<li><a class="color_dark tr_delay_hover" href="features_shortcodes.html">Guides</a></li>
											<li><a class="color_dark tr_delay_hover" href="features_typography.html">Videos</a></li>
											<li><a class="color_dark tr_delay_hover" href="features_typography.html">Podcast</a></li>
										</ul>
									</div>
								</li> -->
                                                                <?php if( !isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User' ): ?>
                                                                
                                                                    <li class="relative f_xs_none m_xs_bottom_5">
                                                                        <!--<a href="<?= site_url("accounts/login") ?>" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup" class="login_l tr_delay_hover color_light tt_uppercase" ><b>Sign In</b></a>-->
                                                                        <a href="<?= site_url("accounts/login") ?>" class="login_l tr_delay_hover color_light tt_uppercase" ><b>Sign In</b></a>
                                                                    </li>
                                                                    <li class="relative f_xs_none m_xs_bottom_5">
                                                                        <!--<a href="<?= site_url("accounts/login#lg2") ?>" data-toggle="modal" data-container="modal_signup_container" data-target="#modal_signup_container" data-popup="#signup_popup" class="tr_delay_hover color_light tt_uppercase"><b>SignUp</b></a>-->
                                                                        <a href="<?= site_url("accounts/login#lg2") ?>" class="tr_delay_hover color_light tt_uppercase"><b>Register</b></a>
                                                                    </li>
                                                                    
                                                                 <?php else: ?>
        
                                                                   <li class="relative f_xs_none m_xs_bottom_5">
                                                                        <a href="<?= site_url("accounts/login") ?>"  class=" tr_delay_hover color_light tt_uppercase" ><b>My Account</b></a>
                                                                        <!--sub menu-->
                                                                        <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
										<ul class="sub_menu">
											<li>
                                                                                            <a href="<?= site_url('profile') ?>" class="color_dark tr_delay_hover">Profile</a>
                                                                                        </li>
											<li>
                                                                                            <a class="color_dark tr_delay_hover" href="<?= site_url('profile/order_history') ?>">Orders</a>
                                                                                        </li>
											<li>
                                                                                            <a class="color_dark tr_delay_hover" href="<?= site_url('profile/table_reservation') ?>">Table Reservation</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a class="color_dark tr_delay_hover" href="<?= site_url('accounts/logout') ?>">logout</a>
                                                                                        </li>
										</ul>
									</div>
                                                                    </li>

                                                                <?php endif; ?>
							</ul>
						</nav>
						<!--<button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
							<i class="fa fa-search"></i>
						</button>
					</div>
					<!--search form-->
					<!--<div class="searchform_wrap tf_xs_none tr_all_hover">
						<div class="container vc_child h_inherit relative">
							<form role="search" class="d_inline_middle full_width">
								<input type="text" name="search" placeholder="Type text and hit enter" class="f_size_large">
							</form>
							<button class="close_search_form tr_all_hover d_xs_none color_dark">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>-->
				</section>
			</header>
			<!--slider-->

 <!-- #region  Slider Begin -->
                <div class="row " >
                    <div class=" homeslider_div " >
                        <ul class="rslides" id="jollof_slider" >
                            
                            <?php foreach($banner as $imgs) :?>

                                <?php 
                               //print("<pre>".print_r($imgs,true)."</pre>"); die;
                                     if($imgs->usertype=='cuisine')
                                     {
                                        $img='cuisine_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='fashion')
                                     {
                                        $img='fashion_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='thirdparty')
                                     {
                                        $img='thirdparty_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='admin')
                                     {
                                       
                                        if($imgs->bannerjollofsitetypeid==1)
                                        {
                                            $img='cuisine_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==2)
                                        {
                                           $img='fashion_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==3)
                                        {
                                           $img='jollof_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==4)
                                        {
                                           $img='lifestyle_banner/'.$imgs->imagename;
                                        }
                                        elseif($l_banner['bannerjollofsitetypeid']==5)
                                        {
                                          $img='biz_banner/'.$imgs->imagename;
                                        }
                                        elseif($l_banner['bannerjollofsitetypeid']==6)
                                        {
                                          $img='scholar_banner/'.$imgs->imagename;
                                        }
                                     }
                                ?>  
                                <?php if( !empty($imgs->imageurl) ): ?>

                            <li class=""> <a href="<?=$imgs->imageurl?>"><img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></a></li>
                                
                                <?php else: ?>
                                    
                                    <li class=""> <img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></li>
                                
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                            
                               <!--
                                <li> <img class="img-responsive" src="<?= base_url() ?>assets/jollofcuisine_banners/homepage_banner/CPRimagefor landingpagebanner(beneath).png" alt="" height="100%" width="100%"></li>
                                <li> <img class="img-responsive" src="<?= base_url() ?>assets/img/food.png" alt="" height="100%" width="100%"></li>
                               --> 
                        </ul>
                    </div>
                </div>
 
<!-- #endregion  Slider End -->
    <!-- #endregion Jssor Slider End -->

      <div class="container text-center m_bottom_45 m_top_20">

        <h3 class="tittle-jollof m_bottom_10"><span>Welcome To </span><b> Jollof </b></h3>
        <h6 class="para-jollofl">
            <a href="<?= site_url(); ?>">Jollof.com</a> is Nigeria's first aggregator of lifestyle services and activities.
        </h6>
        <!--<p><a class="read" href="more.html">Read More</a></p> -->

    </div>

        <!--Circular images-->

					<div class="row clearfix">

						<div class="col-md-2 col-md-offset-0 col-xs-12 m_top_20 m_bottom_55 m_xs_bottom_40">

              
						</div>

						<div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 m_top_20 m_bottom_45 m_xs_bottom_30 text-center">
              <a href="<?= site_url('lifestyle')?>">
							<figure class="t_align_c">

               
                <div id="owl-carousel" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                  <?php if (!empty($lifestylebanners)) :?>
                    <?php foreach($lifestylebanners as $l_banner) :?>
                      <?php
                      if($l_banner['bannerjollofsitetypeid']==1)
                      {
                      $img='cuisine_banner/thumbs/'.$l_bannerl_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==2)
                      {
                      $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==3)
                      {
                      $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==4)
                      {
                      $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==5)
                      {
                      $img='biz_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==6)
                      {
                      $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                      }
                      ?>
                      <div class="item text-center"><img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" height="200px"></div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="item"><img src="<?= site_url('assets/img/LIFESTYLE.jpeg')?>" height="200px"></div>
                      
                    <?php endif ;?>
                </div>
								<!--
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/LIFESTYLE.jpeg" alt="" width="100%" height="100%">
								</div>
                -->


								<figcaption>
									<h4 class="fw_medium color_dark">Lifestyle</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5">
							
								</figcaption>	
							</figure>
              </a>
						</div>
						<div class="col-md-2 col-md-offset-0 m_top_20 m_bottom_55 m_xs_bottom_40 col-xs-8 col-xs-offset-2 text-center">
              <a href="<?=base_url(); ?>cuisine">
							<figure class="t_align_c">
                <!--
								<div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/CUISINE.jpeg" alt=""  width="100%" height="100%">
								</div>
                -->

                <div id="microsite_cuisine" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                  <?php if (!empty($cuisinebanners)) :?>
                    <?php foreach($cuisinebanners as $l_banner) :?>
                      <?php
                      if($l_banner['bannerjollofsitetypeid']==1)
                      {
                      $img='cuisine_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==2)
                      {
                      $img='fashion_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==3)
                      {
                      $img='jollof_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==4)
                      {
                      $img='lifestyle_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==5)
                      {
                      $img='biz_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==6)
                      {
                      $img='scholar_banner/'.$l_banner['imagename'];
                      }
                      ?>
                      <div class="item text-center"><img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" height="200px"></div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="item text-center "><img src="<?= site_url('assets/img/CUISINE.jpeg')?>" height="200px"></div>
                      
                    <?php endif ;?>
                </div>

                

								<figcaption>
									<h4 class="fw_medium color_dark">Cuisine</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								
								</figcaption>	
							</figure>
              </a>
						</div>
						<div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="<?=base_url(); ?>fashion">
							<figure class="t_align_c">
                <!--
								<div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/FASHION.jpeg" alt="" width="100%" height="100%">
								</div>
                -->

                <div id="microsite_fashion" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                  <?php if (!empty($fashionbanners)) :?>
                    <?php foreach($fashionbanners as $l_banner) :?>
                      <?php
                      if($l_banner['bannerjollofsitetypeid']==1)
                      {
                      $img='cuisine_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==2)
                      {
                      $img='fashion_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==3)
                      {
                      $img='jollof_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==4)
                      {
                      $img='lifestyle_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==5)
                      {
                      $img='biz_banner/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==6)
                      {
                      $img='scholar_banner/'.$l_banner['imagename'];
                      }
                      ?>
                      <div class="item  text-center"><img  src="<?= site_url('assets/jollof_banners/'.$img)?>" height="200px"></div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="item  text-center "><img src="<?= site_url('assets/img/FASHION.jpeg')?>" height="200px"></div>
                      
                    <?php endif ;?>
                  </div>
                

								<figcaption>
									<h4 class="fw_medium color_dark">Fashion</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								
								</figcaption>	
							</figure>
              </a>
						</div>
						<div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
              <a href="<?= site_url('biz')?>">
              <figure class="t_align_c">
                <!--
								<div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/BUSINESS2.jpeeg" alt="" width="100%" height="100%">
								</div>
                -->

                <div id="microsite_biz" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                  <?php if (!empty($bizbanners)) :?>
                    <?php foreach($bizbanners as $l_banner) :?>
                      <?php
                      if($l_banner['bannerjollofsitetypeid']==1)
                      {
                      $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==2)
                      {
                      $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==3)
                      {
                      $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==4)
                      {
                      $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==5)
                      {
                      $img='biz_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==6)
                      {
                      $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                      }
                      ?>
                      <div class="item  text-center"><img  src="<?= site_url('assets/jollof_banners/'.$img)?>" height="200px"></div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="item  text-center "><img src="<?= site_url('assets/img/BUSINESS2.jpeg')?>" height="200px"></div>
                      
                    <?php endif ;?>
                  </div>

								<figcaption>
									<h4 class="fw_medium color_dark">Biz</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								</figcaption>	
							</figure>
              </a>
						</div>
						<!--<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="<?= site_url('scholar')?>">
							<figure class="t_align_c">
								<div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/SCHOLAR.jpeg" alt="" width="100%" height="100%">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Scholar</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								</figcaption>	
							</figure>
                                                    </a>
						</div>

						<!--<div class="col-lg-2 col-md-2 col-sm-2 m_top_5 m_bottom_45 m_xs_bottom_30">
							<figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
									<img src="images/team_img_04.jpg" alt="">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Promo</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								</figcaption>	
							</figure>
						</div>-->
					</div>
          <!--Circular images-->
          <div class ="container">

            <div class="row clearfix m_bottom_30">
              <div class="col-lg-4 text-center">
                <i class="fa fa-truck d_inline_middle"></i>
                Free World Delivery
              </div>

              <div class="col-lg-4 text-center">
                <i class="fa fa-headphones d_inline_middle"></i>
                Best Online Support
              </div>

              <div class="col-lg-4 text-center ">
                <i class="fa fa-money d_inline_middle"></i>
                Money Back Guarantee
              </div>

            </div>

          </div>

					


					<!--who we are-->
    <!--  wellcome  -->
    
    <!-- //wellcome  -->
 <!-- //How it works  -->
    <div class ="containerr">

      
        <div class="row clearfix">

            <div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
            </div>
            <div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="<?= site_url('scholar')?>">
              <figure class="t_align_c">
                <!--
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/SCHOLAR.jpeg" alt="" width="100%" height="100%">
                </div>
                -->

                <div id="microsite_scholar" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                  <?php if (!empty($scholarbanners)) :?>
                    <?php foreach($scholarbanners as $l_banner) :?>
                      <?php
                      if($l_banner['bannerjollofsitetypeid']==1)
                      {
                      $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==2)
                      {
                      $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==3)
                      {
                      $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==4)
                      {
                      $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==5)
                      {
                      $img='biz_banner/thumbs/'.$l_banner['imagename'];
                      }
                      elseif($l_banner['bannerjollofsitetypeid']==6)
                      {
                      $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                      }
                      ?>
                      <div class="item  text-center"><img  src="<?= site_url('assets/jollof_banners/'.$img)?>" height="200px"></div>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="item  text-center "><img src="<?= site_url('assets/img/SCHOLAR.jpeg')?>" height="200px"></div>
                      
                    <?php endif ;?>
                  </div>

                <figcaption>
                  <h4 class="fw_medium color_dark">Scholar</h4>
                  <hr class="divider_type_5 d_inline_b m_bottom_5"><br>
                </figcaption> 
              </figure>
                                                    </a>
            </div>
            <div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
              
              <figure class="t_align_c">

                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/howit.png" alt=""  width="100%" height="100%">
                </div>
              </figure>
              
            </div>

            <div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
              <a href="<?=base_url(); ?>">
              <figure class="t_align_c">
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/mobileapp.png" alt=""  width="100%" height="100%">
                </div>
              </figure>
              </a>
            </div>

            <div class="col-md-2 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center m_top_20 m_bottom_55 m_xs_bottom_40">
              <a href="<?=base_url('merchant/signup'); ?>">
              <figure class="t_align_c">
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/sellon.png" alt=""  width="100%" height="100%">
                </div>
              </figure>
              </a>
            </div>
        </div>
        
    </div>

					<!--Mobile app-->


					<!--Mobile app-->

			
<!--merchant apply-->
        <section class="bg_light_color_1 call_to_action_1 ">
          <!--merchant apply-->
<!--merchant apply-->
      <!--content-->
      <div class="page_content_offsett">
        <div class="container">

 
    <div class="container">

           

    </div>


          <div class="row clearfix">
            <div class="col-lg-5 col-md-5 col-sm-5 m_bottom_45 m_xs_bottom_30">
              <figure class="info_block_type_1_">

              <h4 class="tittle-jollof text-center"><b>Trending In Jollof</b></h4>
                <!-- start sw-rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="http://www.surfing-waves.com/newsrss.xml";  
rssfeed_frame_width="100%"; 
rssfeed_frame_height="260"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="6"; 
rssfeed_scroll_bar="off"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face=""; 
rssfeed_border="on"; 
rssfeed_css_url=""; 
rssfeed_title="on"; 
rssfeed_title_name=""; 
rssfeed_title_bgcolor="#E74C3C"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="rss feed"; 
rssfeed_footer_bgcolor="#fff"; 
rssfeed_footer_color="#E74C3C"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="100"; 
rssfeed_item_title_color="#666"; 
rssfeed_item_bgcolor="#fff"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="off"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#666"; 
rssfeed_item_description_link_color="#333"; 
rssfeed_item_description_tag="off"; 
rssfeed_no_items="0"; 
rssfeed_cache = "8e1b917248351618709979c0754e5f80"; 
//--> 
</script> 
<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 

              
              </figure>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
              <figure class="info_block_type_1_">
                  <!-- url= https://publish.twitter.com -->
              <a class="twitter-timeline" data-lang="en" data-width="800" data-height="250" href="https://twitter.com/EgbochuoDavid?ref_src=twsrc%5Etfw">Tweets by EgbochuoDavid</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              
              </figure>

            </div>
          </div>



        
        </div>
      </div>




  
    
    
    
<!--login popup-->
        </section>
		
		
<!--login popup-->
<!-- Modal -->
<div class="modal fade" id="modal_login" style="z-index: 1100;" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

</div><!--end Modal -->

<!--sign popup-->
<div class="modal fade" id="modal_signup_container" style="z-index: 1100;"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end sign popup-->

<!--forgot password popup-->
<div class="modal fade" id="modal_pwdforgot_container"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end forgot password popup--> 
<!-- Modal -->
<div class="modal fade" id="modal_login" style="z-index: 1100;" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

</div><!--end Modal -->

<!--sign popup-->
<div class="modal fade" id="modal_signup_container" style="z-index: 1100;"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end sign popup-->

<!--forgot password popup-->
<div class="modal fade" id="modal_pwdforgot_container"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end forgot password popup--> 
		


    <button class="t_align_c r_corners tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
    <!--scripts include-->
    
    
    <script src="<?= base_url() ?>assets/js/owl.carouselnew.min.js"></script>
    <script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ebs_dav_scripts.js"></script>
    
    <script type="text/javascript">
      (function(){

        var owl = $('#owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_cuisine');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_fashion');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_biz');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_scholar');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
        

        
      })();
      // You can also use "$(window).load(function() {"
        $(function() {

            $("#jollof_slider").responsiveSlides({
              
                auto: true,             // Boolean: Animate automatically, true or false
                speed: 500,            // Integer: Speed of the transition, in milliseconds
                timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
                pager: true,           // Boolean: Show pager, true or false
                nav: true,             // Boolean: Show navigation, true or false
                random: false,          // Boolean: Randomize the order of the slides, true or false
                pause: true,           // Boolean: Pause on hover, true or false
                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                prevText: "Previous",   // String: Text for the "previous" button
                nextText: "Next",       // String: Text for the "next" button
                maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                manualControls: "",     // Selector: Declare custom pager navigation
                namespace: "rslides",   // String: Change the default namespace used
                before: function(){},   // Function: Before callback
                after: function(){}     // Function: After callback

            });

      });
    </script>
    
    <script src="<?= base_url() ?>assets/js/"></script>
    <script>
         
    //$(".login_l").click(function(e) {
     $(".nav_l").on("click","[data-toggle='modal']", function(e){
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
    //$("[data-toggle='modal']").click(function(e) {
    $(".nav_l").on("click","[data-toggle='modal']", function(e){
    /* Prevent Default*/
                e.preventDefault();
                
    /* Parameters */
    var url = $(this).attr('href');
    var container = "#" + $(this).attr('data-container');
                            
    /* XHR */
    $.get(url).done(function(data) {
        $(container).html(data).modal();
    }).success(function() { $('input:text:visible:first').focus(); });


                                
});
    $(document).on("click",".sw_button", function(e){
        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
    });
</script>