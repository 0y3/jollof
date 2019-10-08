<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="<?= $meta_keyword ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= $titel ?></title>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/<?= $icon ?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsiveslides.css">
    
    <!--stylesheet include-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.custom-scrollbar.css">
    
    
    <!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    
    
    
    

    <!--font include-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/owl.carousel.css" rel="stylesheet">
    
    
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ebs_home_style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
    <script src="<?= base_url() ?>assets/js/modernizr.js"></script>
    
    
    <!-- Optional JavaScript --> 
    <script src="<?=base_url(); ?>assets/js/jquery-2.2.4.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>-->
    <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery-ui.min.js"></script>
    
    <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
    <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
    
    <script type="text/javascript" src="<?= base_url() ?>assets/js/date.js"></script>
    
    
    
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
 .main_menu > li > a {
     padding: 20px;
     font-size: 15px;
        
    }
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

.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    text-align: justify;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
  text-align: justify;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  color: #222;
  padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}

.carousel-control {
  width: 30px;
  height: 30px;
  top: -35px;

}
.left.carousel-control {
  right: 30px;
  left: inherit;
}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right {
  font-size: 12px;
  background-color: #fff;
  line-height: 30px;
  text-shadow: none;
  color: #333;
  border: 1px solid #ddd;
}




/*
Credits:
Code snippet by @maridlcrmn (Follow me on Twitter)
Images by Nike.com (http://www.nike.com/us/en_us/)
Logo by Sneaker-mission.com (http://www.sneaker-mission.com/)
*/

.nav-tabs {
  display: inline-block;
  border-bottom: none;
  padding-top: 15px;
  font-weight: bold;
}
.nav-tabs > li > a, 
.nav-tabs > li > a:hover, 
.nav-tabs > li > a:focus, 
.nav-tabs > li.active > a, 
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
  border: none;
  border-radius: 0;
}

.nav-list { border-bottom: px solid #eee; }
.nav-list > li { 
  padding: 20px 15px 15px;
 
}
.nav-list > li:last-child { border-right: 0px solid #eee; }
.nav-list > li > a:hover { text-decoration: none; }
.nav-list > li > a > span {
  display: block;
  font-weight: bold;
  text-transform: uppercase;
}

.mega-dropdown { position: static !important; }



.icon-size
{
    font-size: 87px;
}





.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus {
    color: white;
    background-color: #428bca;
    
}
.navbar-default .navbar-nav>li>a {
    color: white;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0px;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0px;
    margin: 2px 0px 0px;
    font-size: 14px;
    list-style: none;
    background-color: white;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.14902);
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    border-radius: 4px;
    box-shadow: rgba(0, 0, 0, 0.172549) 0px 6px 12px;
}
.nav-list > li {
    padding: 20px 15px 15px;
    border-left:0px;
.nav-list {
    border-bottom: 0px;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: white;
    cursor: default;
    background-color: #428bca;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: black;
    cursor: default;
    background-color: rgb(255, 255, 255);
    border: solid black 1px;
}
</style>
                                        
  </head>
  <body>
  
     
      
      <!-- main container div-->
      <div class="container-fluid nopadding">
        
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
                                            $login_txt_html= 
                                                    '<span class="log" data-log="0"></span>'
                                                    . 'Welcome visitor can you ' .
                                                        '<a href="'.base_url().'accounts/login" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup">'.
                                                        'Log In'.
                                                    '</a> or '.
                                                    '<a href=" '.base_url().'accounts/signup  " data-toggle="modal" data-container="modal_signup_container" data-target="#modal_signup_container" data-popup="#signup_popup">'.
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

                                                    <div class="menudrop pull-left" style="margin-right:30px; ">
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
                                                                                <a class="text-danger" href="'. base_url(). 'accounts/logout">logout</a>
                                                                            </li>
                                                                        </ul>
                                                            </div>

                                                    </div>
                                                            ';
                                            echo $login_txt_html;
                                        }
                                    ?>
                                    
                                    
                                    
                                    
                                </div>
                                  
                            </div>
                                  
                            <nav class="col-lg-4 col-md-4 col-sm-6 t_align_c t_xs_align_c">
                            
                                <ul class="d_inline_b horizontal_list clearfix f_size_small users_nav">
                                    
                                    
                                    <li><a href="<?=base_url(); ?>cuisine" class="orange_t_color"><b>CUISINE</b></a></li>
                                
                                    <li><a href="<?=base_url(); ?>fashion" class="default_t_color"><b>FASHION</b></a></li>
                                    
                                    <li><a href="<?=base_url(); ?>" class="orange_t_color"><b>LIFESTYLE</b></a></li>
                                    
                                    <li><a href="<?=base_url(); ?>" class="orange_t_color"><b>SCHOLAR</b></a></li>
                                    
                                    <li><a href="<?=base_url(); ?>" class="orange_t_color"><b>BIZ</b></a></li>
                                    
                                </ul>
                                
                            </nav>
                            
                            <div class="col-lg-4 col-md-4 col-sm-2 t_align_c t_xs_align_c">
                                    <p class="f_size_small">Call Or Whatsapp: <b class="color_dark">(234) 909-952-2529</b></p>
                            </div>
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
		
                </div>
		
            </section>
	
            <!--main menu container-->
	
            <section class="menu_wrap relative">
	
                <div class="container-flud clearfix" style="margin-left: auto; margin-right: auto; width: 90%;">
		
                    <!--button for responsive menu-->
		
                    <button id="menu_button" class="r_corners centered_db d_none tr_all_hover d_xs_block m_bottom_10">
		
                        <span class="centered_db r_corners"></span>
			
                        <span class="centered_db r_corners"></span>
			
                        <span class="centered_db r_corners"></span>
			
                    </button>
                    
		
                    <!--main menu-->
		
                    <nav role="navigation" class="f_left f_xs_none d_xs_none">	
		
                        <ul class="horizontal_list main_menu clearfix">
			
                            <!-- <li class="relative f_xs_none m_xs_bottom_5">
                                
                                <a href="<?=base_url()?>cuisine" class="tr_delay_hover color_light tt_uppercase">
                                    <b>Home</b>
                                </a>
                                
				
                            </li> -->
                            
                            <?php foreach ($nav as $navs) :?>
                            
                             <li class="dropdown mega-dropdown relative f_xs_none m_xs_bottom_5">
                                 <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" class="dropdown-toggle tr_delay_hover color_light" data-id="<?= $navs['id']?> " data-toggle="dropdownn">
                                    <b><?= $navs['categoryname']?> </b>
                                </a>
                                 
                                
                                <!--sub menu-->    
                                <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                
				<ul class="dropdown-menu mega-dropdown-menu">
                                    
                                    <!-- Ad -->
					<li class="col-sm-3">
                                            <ul>
                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>">
                                                    <li class="dropdown-header"><?= $navs['categoryname']?></li> 
                                                    </a>
                                                    <div id="<?= $navs['categoryname']?>" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                          <div class="item active">
                                                              <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                                              <h4><small>Summer dress floral prints</small></h4>                                        
                                                              <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                                          </div><!-- End Item -->
                                                          <div class="item">
                                                              <a href="#"><img src="http://placehold.it/254x150/ff3546/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                                              <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                                              <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                                          </div><!-- End Item -->
                                                          <div class="item">
                                                              <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                                              <h4><small>Denin jacket stamped</small></h4>                                        
                                                              <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                                          </div><!-- End Item -->                                
                                                      </div><!-- End Carousel Inner -->
                                                    <!-- Controls -->
                                                        <a class="left carousel-control" href="#<?= $navs['categoryname']?>" role="button" data-slide="prev">
                                                          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                          <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#<?= $navs['categoryname']?>" role="button" data-slide="next">
                                                          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                          <span class="sr-only">Next</span>
                                                        </a>
                                                  </div><!-- /.carousel -->
                                                  <li class="divider"></li>
                                                  <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                                                  <li class="divider"></li>
                                            </ul>
					</li>
                                    <!-- Ad end -->
                                        
                                    <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                         <li class="col-sm-2" data-nav_cate_id="<?= $subnavs['id']?> ">
                                            <ul class="sub_menu">
                                                
                                                <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>">
                                                    <li class="dropdown-header" data-nav_cate_id="<?= $subnavs['id']?> "><?= $subnavs['categoryname']?> </li>
                                                </a>
                                                
                                                
                                                <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>" class="color_dark tr_delay_hover" data-nav_cate_submenu_id="<?= $submenunavs['id']?> "><?= $submenunavs['categoryname']?></a></li> 
                                                <?php endforeach; ?>
                                                        
                                                        
                                                <li class="divider"></li>
                                            </ul>
					</li>
                                    <?php endforeach; ?>
                                        
				</ul>
                                
                                

                                <?php endif; ?>
                                <!--sub menu End-->  
                            
                            </li>
                            
                            <?php endforeach; ?>
                            
                            
                            
                            
                           
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
			
                    </ul>
                    
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
                
                        	
<!--                            
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script>
 //load the number of cart in all page
$('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");                        
</script>  

<script>
    /*
    $(".menudrop").hover(function () {
        if (!$(".menudrop-account").is(":animated")) {
           $(".menudrop-account").show('slow');
        }
     }, function () {
        $(".menudrop-account").stop().hide('slow');
     });​
     */
     
     
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




<script>

    $('[data-toggle="tooltip"]').tooltip(); 
</script>
