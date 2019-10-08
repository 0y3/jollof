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
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.transitions.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/jquery.custom-scrollbar.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/dav_landingpage_style.css">
                <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
                <link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
		<!--font include-->
		<link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
                
                
                
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
                
<style>
    
.homeslider_div {
}
.homeslider_div img {
height: 500px;
}
.animate_fade img{
max-width: 100px;
max-height: 80px;
}





.rslides_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  top: 20%;
  left: 0;
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

</style>
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
								<p class="f_size_small">Call Or Whatsapp on: <b class="color_dark">(234) 909-952-2529</b></p>
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
						<button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_10">
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
                                                                        <a href="<?= site_url("accounts/login") ?>" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup" class="login_l tr_delay_hover color_light tt_uppercase" ><b>Sign In</b></a>
                                                                    </li>
                                                                    <li class="relative f_xs_none m_xs_bottom_5">
                                                                        <a href="<?= site_url("accounts/signup") ?>" data-toggle="modal" data-container="modal_signup_container" data-target="#modal_signup_container" data-popup="#signup_popup" class="tr_delay_hover color_light tt_uppercase"><b>SignUp</b></a>
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
						<button class="f_right search_button tr_all_hover f_xs_none d_xs_none">
							<i class="fa fa-search"></i>
						</button>
					</div>
					<!--search form-->
					<div class="searchform_wrap tf_xs_none tr_all_hover">
						<div class="container vc_child h_inherit relative">
							<form role="search" class="d_inline_middle full_width">
								<input type="text" name="search" placeholder="Type text and hit enter" class="f_size_large">
							</form>
							<button class="close_search_form tr_all_hover d_xs_none color_dark">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
				</section>
			</header>
			<!--slider-->

 <!-- #region  Slider Begin -->
                <div class="row " >
                    <div class=" homeslider_div " >
                        <ul class="rslides" id="jollof_slider" >
                            
                            <?php foreach($banner as $imgs) :?>
                                <?php if( !empty($imgs->imageurl) ): ?>

                            <li class=""> <a href="<?=$imgs->imageurl?>"><img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/jollofhomepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%"></a></li>
                                
                                <?php else: ?>
                                    
                                    <li class=""> <img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/jollofhomepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%"></li>
                                
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


<!--Circular images-->

					<div class="row clearfix">

						<div class="col-lg-1 col-md-1 col-sm-1 m_top_20 m_bottom_55 m_xs_bottom_40">
						</div>

						<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_45 m_xs_bottom_30">
                                                    <a href="">
							<figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
                                                                    <img src="<?=base_url(); ?>assets/img/team_img_04.jpg" alt="" width="100%" height="100%">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Lifestyle</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5">
							
								</figcaption>	
							</figure>
                                                    </a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="<?=base_url(); ?>cuisine">
							<figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/bg_1.jpg" alt=""  width="100%" height="100%">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Cuisine</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								
								</figcaption>	
							</figure>
                                                    </a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="<?=base_url(); ?>fashion">
							<figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/JMSs_banner1522842026.jpeg" alt="" width="100%" height="100%">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Fashion</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								
								</figcaption>	
							</figure>
                                                    </a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="">
                                                        <figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/team_img_04.jpg" alt="" width="100%" height="100%">
								</div>
								<figcaption>
									<h4 class="fw_medium color_dark">Biz</h4>
									<hr class="divider_type_5 d_inline_b m_bottom_5"><br>
								</figcaption>	
							</figure>
                                                    </a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 m_top_20 m_bottom_55 m_xs_bottom_40">
                                                    <a href="">
							<figure class="t_align_c">
								<div class="circle wrapper team_photo d_inline_b m_bottom_15">
									<img src="<?=base_url(); ?>assets/img/team_img_04.jpg" alt="" width="100%" height="100%">
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


					


					<!--who we are-->
<div class="container">
					<div class="row clearfix animate_corporate_container">
						<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_45 animate_fade long" >
							<h2 class="tt_uppercase color_dark m_bottom_20 m_top_20">How Jollof works</h2>
							<p class="m_bottom_20">
                                                            <b>Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. </b>
                                                        </p>
							<p class="m_bottom_20">
                                                            Mauris fermentum dictum magna. Sed laoreet aliquam leo. 
                                                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
                                                            Suspendisse sollicitudin velit sed leo. 
                                                            Ut pharetra augue nec augue. Nam elit agna,endrerit sit amet, tincidunt ac.
                                                        </p>
							<p>
                                                            Donec porta diam eu massa. Quisque diam lorem, interdum vitae, dapibus ac, 
                                                            scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum 
                                                            auctor pulvinar. Vestibulum iaculis lacinia est. Proin dictum elementum velit. Fusce euismod consequat.
                                                        </p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_45 animate_fade long">
							<h2 class="tt_uppercase color_dark m_bottom_20">Watch the video</h2>

						<div class="sub_video f_right m_left_20 m_xs_bottom_30">
							<div class="iframe_video_wrap">
								<iframe src="https://www.youtube.com/embed/XRBGX59O-gg"></iframe>
							</div>
						</div>

						</div>

					</div>
				</div>

					<!--who we are-->

					<!--Mobile app-->


					<!--Mobile app-->

								<!--content-->
			<div class="page_content_offset">
				<div class="container">
					<div class="d_table full_width d_xs_block m_bottom_25">
						<div class="d_table_cell v_align_m d_xs_block m_xs_bottom_15">
							<h2 class="tt_uppercase color_dark">Mobile App</h2>
						</div>
					</div>
					<div class="row clearfix">
						<section class="col-lg-8 col-md-8 col-sm-8">
							<div class="photoframe r_corners shadow wrapper m_bottom_30">
								<img src="<?=base_url(); ?>assets/img/iphone.jpg" alt="" class="tr_all_long_hover">
							</div>
						</section>
						<aside class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30">
							<h5 class="fw_medium m_bottom_10"></h5>
							<p class="m_bottom_15">Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. </p>

							<p class="m_bottom_15">Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel. </p>
							<div class="d_inline_middle m_left_5 m_md_left_0 addthis_widget_container">
								<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                                                    <!--<a href="#" class="color_dark fw_medium d_inline_b m_bottom_25"><img class="f_left m_right_20 m_sm_bottom_5" href="#" src="<?=base_url(); ?>assets/img/brand_logo_type_2.jpg" alt=""></a>-->
                                                                    <div class="col-md-5">
                                                                        <a href="#"><img src="<?= base_url() ?>assets/img/goo.png" alt=""></a>
                                                                    </div>

                                                                    <div class="col-md-5">
                                                                        <a href="#"><img src="<?= base_url() ?>assets/img/app.png" alt=""></a>
                                                                    </div>
								</div>
								<!-- AddThis Button END -->
							</div>
							<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>
						</aside>
					</div>
</div>
</div>
<!--merchant apply-->
				<section class="bg_light_color_1 call_to_action_1 m_bottom_50 m_xs_bottom_30">
					<div class="container">
						<div class="d_table full_width cta_1 d_xs_block">
                                                    <div class="d_table_cell v_align_m d_xs_block m_xs_bottom_30" style=" width: 70%">
								<h1 class="color_dark m_bottom_20"><b class="f_size_ex_large">Jollof Merchant</b></h1>
                                                                <p class="f_size_large">Sell on <a href="<?=site_url() ?>">Jollof.com</a> for FREE in Simple Step </p>
							</div>
							<div class="d_table_cell v_align_m t_align_r t_xs_align_l d_xs_block">
								<a target="_blank" class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large" href="<?= site_url('merchant/signup')?>">Sign Up Today!</a>
							</div>
                                                        <div class="d_table_cell v_align_m t_align_r t_xs_align_l d_xs_block">
								<a target="_blank" class="tr_delay_hover r_corners button_type_12 bg_scheme_color color_light f_size_large" href="">Setup Video</a>
							</div>
						</div>
					</div>
				</section>

<!--merchant apply-->
			<!--content-->
			<div class="page_content_offset">
				<div class="container">



                                    <h2 class="tt_uppercase color_dark m_bottom_25">Trending in Jollof</h2>
					<div class="row clearfix">
						<div class="col-lg-4 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
							<figure class="info_block_type_1">
								<div class="icon_wrap_1 f_left r_corners bg_scheme_color t_align_c vc_child color_light tr_all_hover"><i class="fa fa-briefcase d_inline_middle"></i></div>
								<h4 class="fw_medium color_dark m_bottom_15">500,000</h4>
								<p class="m_bottom_10">BUSINESSES POWERED BY JOLLOF.</p>
								
							</figure>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
							<figure class="info_block_type_1">
								<div class="icon_wrap_1 f_left r_corners bg_scheme_color t_align_c vc_child color_light tr_all_hover"><i class="fa fa-users d_inline_middle"></i></div>
								<h4 class="fw_medium color_dark m_bottom_15">1,000,000+</h4>
								<p class="m_bottom_10">ACTIVE USERS. </p>
							
							</figure>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
							<figure class="info_block_type_1">
								<div class="icon_wrap_1 f_left r_corners bg_scheme_color t_align_c vc_child color_light tr_all_hover"><i class="fa fa-money d_inline_middle"></i></div>
								<h4 class="fw_medium color_dark m_bottom_15">N40B+</h4>
								<p class="m_bottom_10">SOLD ON JOLLOF.</p>
							
							</figure>
						</div>
					</div>



				
				</div>
			</div>
		
			<!--markup footer-->
			
		
		
		
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
		


    <button class="t_align_c r_corners tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
    <!--scripts include-->

    <script src="<?= base_url() ?>assets/js/dav_landingpage_script.js"></script>
    <script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
    <script type="text/javascript">
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
</script>