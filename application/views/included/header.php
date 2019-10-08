<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= $titel ?></title>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/<?= $icon ?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/fontawesome-all.css">
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsiveslides.css">
    
    <!--stylesheet include-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.custom-scrollbar.css">
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ebs_home_style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
    
    <!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    
    
    
    

    <!--font include-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/owl.carousel.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/modernizr.js"></script>
    
    
    <!-- Optional JavaScript --> 
    <script src="<?=base_url(); ?>assets/js/jquery-2.2.4.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
    <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-ui.min.js"></script>
    
    <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
    <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
    
    <script type="text/javascript" src="<?= base_url() ?>assets/js/date.js"></script>
    
    
    
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
    <script src="<?= base_url() ?>assets/js/waitMe.js"></script>
    <!--
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jssor.core.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jssor.utils.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jssor.slider.js"></script>
    -->
    
    <script src="<?php echo base_url(); ?>assets/js/jssor.slider.min.js"></script>
    
    <!-- Crop Css and js -->
    <link href="<?= base_url() ?>assets/css/cropbox.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/cropbox.js"></script>
    <script> var site_url = '<?php echo site_url(); ?>';  </script>
    
    
    
    
    <!--gallery-->
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


<!-- facebook login script -->
<script>
  /*
   * 
   window.fbAsyncInit = function() {
    FB.init({
      appId      : '1980361182290100',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.11'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   */
</script>
<!-- End of Facebook Login Script -->

<style>
 .menudrop-account {
    z-index:99;
    display:none;
    position: absolute;
    background-color:#6C6C6C;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.menudrop-account ul {
	padding:0px !important;
	
}
.menudrop-account ul li {
    display: block;
    padding:5px 70px 5px 10px;
}

.menudrop-account ul li a {
	color: #F8F8F8 !important;
	border-right: none !important;  
        padding: 12px 5px;
	font-size:15px !important;
}
.menudrop:hover .menudrop-account{
	display:block;
}
.ullogin li a{
    font-weight: unset;
    font-size: unset;
}
.sub_menu li {
    min-width: 150px;
}
</style>
                                        
  </head>
  <body>
  
     
      
      <!-- main container div-->
    <div class="container-fluid nopadding ">
        
        <!--header -->
       	<header role="banner">
				
            <!--header top part-->
            <section class="h_top_part">
                
                    <div class="container">
                           
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-5 t_xs_align_c ">
                                   
                                <div class="f_size_small jollof_logindiv">
                                    <?php
                                        
                                        if(!isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User')
                                        {   
                                            /*$login_txt_html= 
                                                    '<span class="log" data-log="0"></span>'
                                                    . 'Welcome visitor can you ' .
                                                        '<a href="'.base_url().'accounts/login" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup">'.
                                                        'Log In'.
                                                    '</a> or '.
                                                    '<a href=" '.base_url().'accounts/signup  " data-toggle="modal" data-container="modal_signup_container" data-target="#modal_signup_container" data-popup="#signup_popup">'.
                                                        'Create an Account'.
                                                    '</a> ';
                                             * 
                                             /*/
                                            $login_txt_html= 
                                                    '<span class="log" data-log="0"></span>'
                                                    . 'Welcome visitor can you ' .
                                                        '<a href="'.base_url().'accounts/login">'.
                                                        'Log In'.
                                                    '</a> or '.
                                                    '<a href=" '.base_url().'accounts/login  " >'.
                                                        'Create an Account'.
                                                    '</a> ';
                                            echo $login_txt_html;
                                        }
                                        else 
                                        {
                                            
                                            $ses_username = $_SESSION['first_name'];
                                            
                                            $user_info = $this->Profile_model->profile($_SESSION['User_id']);
                                            if (!empty($user_info[0]->image))
                                            {
                                                $user_img= '<img src="'. base_url().'assets/uploads/profile_pic/'.$user_info[0]->image.'" class="img-circle" width="30px" height="30px" />';
                                            }
                                            else{$user_img='<img src="'. base_url().'assets/uploads/profile_pic/noimage.jpg" class="img-circle" width="30px" height="30px" >';}
                        
                                            $login_txt_html= 
                                                    '<span class="log" data-log="1"></span>'
                                                    . '
                                                    <div class="pull-left" style="margin-right:30px;">
                                                        Welcome ('.$ses_username.')
                                                    </div>
                                                    
                                                    <ul class="nav navbar-nav navbar-right ullogin">
                                                        <!--<li><a href="#">Link</a></li>-->
                                                        <li class="dropdown">
                                                            <span class="dropdown-toggle text-danger" data-toggle="dropdown" style="cursor: pointer;">'.$user_img.' My Account <span class="caret"></span></span>
                                                            
                                                            <ul class="dropdown-menu" role="menu">
                                                            
                                                                <li>
                                                                        <a href="'. site_url('profile').'">Profile</a>
                                                                </li>

                                                                <li>
                                                                        <a href="'. site_url('profile/order_history').'">Orders</a>
                                                                </li>

                                                                <li>
                                                                        <a href="'. site_url('profile/table_reservation').'">Table Reservation</a>
                                                                </li>

                                                                <li>
                                                                        <a href="'. site_url('accounts/layaway').'">layaway</a>
                                                                </li>

                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a class="" href="'. base_url(). 'accounts/logout"><span class="text-danger">logout</span></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <!--<div class="menudrop pull-left" style="margin-right:30px; ">
                                                        <a href="#">
                                                          '.$user_img.'
                                                          My Account 
                                                        </a>

                                                            <div class="menudrop-account ">
                                                                    <ul>
                                                                            <li>
                                                                                    <a href="'. site_url('profile').'">Profile</a>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                    <a href="'. site_url('profile/order_history').'">Orders</a>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                    <a href="'. site_url('profile/table_reservation').'">Table Reservation</a>
                                                                            </li>

                                                                            <li>
                                                                                    <a href="'. site_url('accounts/layaway').'">layaway</a>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                <a class="text-danger" href="'. base_url(). 'accounts/logout">logout</a>
                                                                            </li>
                                                                        </ul>
                                                            </div>

                                                    </div>-->
                                                            ';
                                            echo $login_txt_html;
                                        }
                                    ?>
                                    
                                    
                                    
                                    
                                </div>
                                  
                            </div>
            
                            <nav class="col-lg-4 col-md-4 col-sm-6 t_align_c t_xs_align_c">
                            
                                <ul class="d_inline_b horizontal_list clearfix f_size_small users_nav">
                                
                                    <li><a href="<?=base_url('cuisine')?>" class="default_t_color"><b>CUISINE</b></a></li>
                                    
                                    <li><a href="<?=base_url('fashion')?>" class="orange_t_color"><b>FASHION</b></a></li>
                                    
                                    <li><a href="<?= site_url('lifestyle')?>" class="orange_t_color"><b>LIFESTYLE</b></a></li>
                                    
                                    <li><a href="<?= site_url('scholar')?>" class="orange_t_color"><b>SCHOLAR</b></a></li>
                                    
                                    <li><a href="<?= site_url('biz')?>" class="orange_t_color"><b>BIZ</b></a></li>
                                    
                                </ul>
                                
                            </nav>
                            <div class="col-lg-4 col-md-4 col-sm-2 t_align_c t_xs_align_c">
                                    <p class="f_size_small">Call Or Whatsapp on: <b class="color_dark"><?=$info->whatsapp?></b></p>
                            </div>
                            
                            <!--
                            <div class="col-lg-4 col-md-4 col-sm-3 t_align_r t_xs_align_c">
                            
                                <ul class="horizontal_list clearfix d_inline_b t_align_l f_size_small site_settings type_2">
                                    
                                    <li class="container3d relative">
                                    
                                        <a role="button" href="#" class="color_dark" id="lang_button">English</a>
                                        
                                    </li>
                                      
                                    <li class="m_left_20 relative container3d">
                                    
                                        <a role="button" href="#" class="color_dark" id="currency_button"><span class="scheme_color"></span>₦    Niara </a>
                                        
                                    </li>
                                    
                                </ul>
                                    
                            </div>
                            -->
                        </div>
                   
                    </div>
                
            </section>
            <!--header bottom part-->
		
            <div class="sur"></div>
            <section class="h_bot_part container">
	
                <div class="clearfix row">
		
                    <div class="col-lg-6 col-md-6 col-sm-4 t_xs_align_c">
		
                        <a href="<?= base_url();?>" class="logo m_xs_bottom_15 d_xs_inline_b">
			
                            <img src="<?= base_url() ?>assets/img/jollof_logo.png" alt="">
			
                        </a>
			
                    </div>
                     <!--
                    <div class="col-lg-6 col-md-6 col-sm-8">
		
                        <div class="row clearfix">
			
                            <div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c m_xs_bottom_15">
			
                                <dl class="l_height_medium">
				
                                    <dt class="f_size_small">Call or whatsapp: <span class="jboxtooltip" title="Another tooltip">Hover me!</span></dt>
				
                                    <dd class="f_size_ex_large color_dark"><i class="fa fa-phone" aria-hidden="true"></i>  <b>  (+234) 902-234-3310</b></dd>
				
                                </dl> 
				
                            </div>
                           
                            <div class="col-lg-6 col-md-6 col-sm-6">
			
                                <form class="relative type_2" role="search">
				
                                    <input type="text" placeholder="Search" name="search" class="r_corners f_size_medium full_width">
				
                                    <button class="f_right search_button tr_all_hover f_xs_none">
				
                                        <i class="fa fa-search"></i>
					
                                    </button>
				
                                </form>
				
                            </div>
                        </div>
			
                    </div>
                    -->
		
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
                    <nav role="navigation" class="f_left f_xs_none d_xs_none">	
		
                        <ul class="horizontal_list main_menu clearfix">
			
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="#" class="tr_delay_hover color_light tt_uppercase">
                                    <b>Home</b>
                                </a>
                                <!--sub menu-->
                                <div class="sub_menu_wrap top_arrow d_xs_none type_2 tr_all_hover clearfix r_corners">
                                        <div class="f_left f_xs_none">
                                                <!--<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Women</b>-->
                                                <ul class="sub_menu">
                                                        <li><a class="color_dark tr_delay_hover" href="<?= base_url(); ?>">Jollof Home</a></li>
                                                        <li><a class="color_dark tr_delay_hover" href="<?= base_url(); ?>cuisine">Cuisine Home</a></li>
                                                </ul>
                                        </div>
                                    </div>
				
                            </li>
                            
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="#" class="tr_delay_hover color_light tt_uppercase">
                                    <b>Place An Order</b>
                                </a>
                                <!--sub menu-->
                                <?php if(!empty($cuis_cate)): ?>
                                    <div class="sub_menu_wrap top_arrow d_xs_none tr_all_hover clearfix r_corners w_xs_auto">
                                        <?php foreach ($cuis_cate as $cusine_list) :?>
                                        <div class="f_left f_xs_none">
                                                <!--<b class="color_dark m_left_20 m_bottom_5 m_top_5 d_inline_b">Women</b>-->
                                                <ul class="sub_menu first">
                                                    <li><a class="color_dark tr_delay_hover" href="<?= site_url("cuisine/restaurants/placeorder/$cusine_list->slug"); ?>"><?= $cusine_list->categoryname ?></a></li>
                                                </ul>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                <?php endif; ?>
                                        
                            </li>
                            
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="<?= site_url('cuisine/restaurants'); ?> " class="tr_delay_hover color_light tt_uppercase">
                                    <b>ALL RESTAURANTS</b>
                                </a>
                                
                            </li>
			            
                            <!-- 
                            
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="" class="tr_delay_hover color_light tt_uppercase">
                                    <b>PLACE AD</b>
                                </a>
			
                            </li>
				
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="" class="tr_delay_hover color_light tt_uppercase">
                                    <b>MY PROFILE</b>
                                </a>
                                
                            </li>	
                           
			
                            <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="" class="tr_delay_hover color_light tt_uppercase">
                                   <b>ORDER TRACKING</b> 
                                    
                                </a>
				
                            </li>
                            -->
			
                        </ul>
				
                    </nav>
                    
                    <ul class="f_right horizontal_list clearfix t_align_l t_xs_align_c site_settings d_xs_inline_b f_xs_none">	
			
                        <!--shopping cart-->
                        
                        <li class="cart_list" >
			
                            <a href="<?= base_url() ?>cart/load " data-toggle="modal" data-container="modal_cart_container" data-target="#modal_cart_container" data-popup="#cart_popup" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
			
                                <span class="d_inline_middle shop_icon">
				
                                    <i class="fa fa-shopping-cart"></i>
				
                                    <span class="cart_count count tr_delay_hover type_2 circle t_align_c"></span>
				
                                </span>
				
				
                            </a>
                            
                            
                        </li>
			
<!--                        
                        <li class="m_left_5 relative container3d" id="shopping_button">
			
                            <a role="button" href="#" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
			
                                <span class="d_inline_middle shop_icon">
				
                                    <i class="fa fa-shopping-cart"></i>
				
                                    <span class="count tr_delay_hover type_2 circle t_align_c">3</span>
				
                                </span>
				
                                <b>₦ 4500</b>
				
                            </a>
			
                            <div class="shopping_cart top_arrow tr_all_hover r_corners">
			
                                <div class="f_size_medium sc_header">Recently added item(s)</div>
				
                                <ul class="products_list">
				
                                    <li>
				
                                        <div class="clearfix">
					
                                            product image
					
                                            <img class="f_left m_right_10" src="<?= base_url() ?>assets/img/dishes.jpg" alt="">
					
                                            product description
					
                                            <div class="f_left product_description ">
					
                                                <a href="#" class="color_dark m_bottom_5 d_block ">411 RESTAURANT AND BAR </a>
						
                                                <span class="f_size_medium">CHICKEN & CHIPS</span>
						
                                            </div>
					
                                            product price
					
                                            <div class="f_left f_size_medium">
					
                                                <div class="clearfix">
						
                                                    1 x <b class="color_dark">₦2500</b>
						
                                                </div>
						
                                                <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
						
                                            </div>
					
                                        </div>
					
                                    </li>
				
                                    <li>
				
                                        <div class="clearfix">
					
                                            product image
					
                                            <img class="f_left m_right_10" src="<?= base_url() ?>assets/img/dishes.jpg" alt="">
					
                                            product description
					
                                            <div class="f_left product_description">
					
                                                <a href="#" class="color_dark m_bottom_5 d_block">411 RESTAURANT AND BAR</a>
						
                                                <span class="f_size_medium">GOAT MEAT PEPPER SOUP</span>
						
                                            </div>
					
                                            product price
					
                                            <div class="f_left f_size_medium">
					
                                                <div class="clearfix">
						
                                                    1 x <b class="color_dark">₦3000</b>
						
                                                </div>
						
                                                <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
						
                                            </div>
					
                                        </div>
					
                                    
                                    </li>
				
                                    <li>
				
                                        <div class="clearfix">
					
                                            product image
					
                                            <img class="f_left m_right_10" src="<?= base_url() ?>assets/img/dishes.jpg" alt="">
					
                                            product description
					
                                            <div class="f_left product_description">
					
                                                <a href="#" class="color_dark m_bottom_5 d_block">411 RESTAURANT AND BAR</a>
						
                                                <span class="f_size_medium">DOUBLE CHEESE BURGER</span>
						
                                            </div>
					
                                            product price
					
                                            <div class="f_left f_size_medium">
					
                                                <div class="clearfix">
						
                                                    1 x <b class="color_dark">₦1500</b>
						
                                                </div>
						
                                                <button class="close_product color_dark tr_hover"><i class="fa fa-times"></i></button>
						
                                            </div>
					
                                        </div>
					
                                    </li>
				
                                </ul>
				
                                total price
				
                                <ul class="total_price bg_light_color_1 t_align_r color_dark">
				
                                    <li class="m_bottom_10">VAT: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15"₦0.00</span></li>
				
                                    <li class="m_bottom_10">LSCT: <span class="f_size_large sc_price t_align_l d_inline_b m_left_15">₦0.00</span></li>
				
                                    <li>Total: <b class="f_size_large bold scheme_color sc_price t_align_l d_inline_b m_left_15">₦7000.00</b></li>
				
                                </ul>
				
                                <div class="sc_footer t_align_c">
				
                                    <a href="#" role="button" class="button_type_4 d_inline_middle bg_light_color_2 r_corners color_dark t_align_c tr_all_hover m_mxs_bottom_5">Clear Cart</a>
				
                                    <a href="#" role="button" class="button_type_4 bg_scheme_color d_inline_middle r_corners tr_all_hover color_light">Checkout</a>
				
                                </div>
				
                            </div>
			
                        </li>
-->
			
                    </ul>
		
                </div>
		
            </section>
	
        </header>
       
<!-- //header -->
        
    </div>
      
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

<!--Cart popup-->
<div class="modal fade" id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >
    
</div><!--end sign popup-->

    <!-- Modal confirm Clear Cart Product -->
    <div class="modal" id="confirmModal" style="display: none; z-index: 200;">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="alert alert-danger" id="confirmMessage"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="confirmOk">Ok</button>
                                <button type="button" class="btn btn-success" id="confirmCancel">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>

<!-- Modal confirm Empty Cart -->
    <div class="modal" id="empty_confirmModal" style="display: none; z-index: 200;">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>
 

<!--                           
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script>
 //load the number of cart in all page
$('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");                        
</script>  

<script>
    
    /*$(".menudrop").hover(function () {
        if (!$(".menudrop-account").is(":animated")) {
           $(".menudrop-account").show('slow');
        }
     }, function () {
        $(".menudrop-account").stop().hide('slow');
     });​
     */
     $(".menudrop").hover(function () {
        if (!$(".menudrop-account").is(":animated")) {
           $(".menudrop-account").show('slow');
        }
     });

        $(".menudrop-account").stop().hide('slow');


</script>




<script>

    $('[data-toggle="tooltip"]').tooltip(); 
</script>
