<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $titel ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?= $icon ?>">
		
        
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/fontawesome-all.css">
    
		<!-- all css here -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/animate.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/chosen.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/style_dilan.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/responsive.css">
        <script src="<?= base_url() ?>assets/assets/js/vendor/modernizr-2.8.3.min.js"></script>
        
        <!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    </head>
    <style>
        .hot_stripe {
            position: absolute;
            top: -5px;
            left: 9px;
            z-index: 1;
        }
        .product-img img 
        {
            max-height: 270px;
        }
        .linkcolor a
        {
            color: #e74c3c; 
        }
        .linkcoloractive a
        {
         color: #454545;    
        }
        .divider
        {
            height: 1px;
            margin: 9px 0;
            overflow: hidden;
            background-color: #e5e5e5;
        }
        .modal-dialog
        {
            /*margin-top: 300px;
            min-width: 0px;*/
        }
        .modal .close
        {
            color:#000;
            font-size:21px;
            margin-right: 0px;
        }
        .modal-body {
            padding: 30px;
        }
        .f_left {
            float: left;
        }
        .m_right_10 {
            margin-right: 10px;
        }
        .modal-content {
            border-radius: 6px;
        }
        .nopadding {
            padding: 0px;
        }
        .main-menu.menu-style-4 ul li {
            padding-right: 20px;
        }
        .main-menu.menu-style-4 ul li a {
            line-height: unset !important; 
            font-size: smaller !important;
        }
        .catigorydivform {
            position: relative;
        }
        .catigorydivform input {
            background: transparent none repeat scroll 0 0;
            border: medium none;
            box-shadow: none;
            color: #b0afaf;
            font-size: 14px;
            height: 35px;
            padding-left: 20px;
            padding-right: 40px;
        }
        .meanmenu-reveal {
           /*top:-25px !important;*/
        }
        @media screen and (max-width: 600px) {
            .product-cart>a
            {
                visibility: hidden;
                display: none;
            }
        }
    </style>
    <body>
        <!-- header start -->
        <header class="header-area transparent-bar">
<!--            <div class="container">
                <div class="header-top header-top-4 ptb-15 border-bottom-1">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="default-message-2">
                                <p>Call Or Whatsapp on: <b>2349099522529</b> </p>
                            </div>
                        </div>
                        
                        <div class="col-lg-7 col-md-7">
                                <div class="language-currency ">
                                    <div class="currency linkcolor">
                                        <a href="<?= base_url() ?>cuisine" class=""><b>CUISINE</b></a>
                                    </div>
                                    <div class="currency linkcoloractive">
                                        <a class="chosen-single" href="<?= base_url() ?>fashion" class=""><b>FASHION</b></a>
                                    </div>
                                    <div class="currency linkcolor">
                                        <a href="<?= base_url() ?>lifestyle" class=""><b>LIFESTYLE</b></a>
                                    </div>
                                    <div class="currency linkcolor">
                                        <a href="<?= base_url() ?>scholar" class=""><b>SCHOLAR</b></a>
                                    </div>
                                    <div class="currency linkcolor">
                                        <a  href="<?= base_url() ?>biz" class=""><b>BIZ</b></a>
                                    </div>
                                    
                                    <div class="language-style-2">
                                        <ul>
                                            <li><a class="language-click" href="#"><img alt="" src="assets/img/icon-img/usa.png"> English <i class="ion-chevron-down"></i></a>
                                                <ul class="language-dropdown">
                                                    <li><a href="#"><img alt="" src="assets/img/icon-img/es.png"> spanish </a></li>
                                                    <li><a href="#"><img alt="" src="assets/img/icon-img/fr.png"> french </a></li>
                                                    <li><a href="#"><img alt="" src="assets/img/icon-img/ge.png"> german  </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            
                            <div class="header-right-site">
                                <div class="language-currency same-style">
                                    <?php
                                        
                                            if(!isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User')
                                            {   
                                                
                                                $login_txt_html= 
                                                        '<span class="log" data-log="0"></span>'
                                                        . '<div class="header-login">' .
                                                            '<a href="'.base_url().'accounts/login">'.
                                                            '<span class="ion-person"></span>'.
                                                        '</a> '.
                                                        '</div>';
                                                echo $login_txt_html;
                                            }
                                            else 
                                            {
                                                $ses_username = $_SESSION['first_name'];
                                                 $login_txt_html= 
                                                    '<span class="log" data-log="1"></span>'
                                                    . '
                                                    <div class="language-style-2">
                                                        <ul >
                                                            <li><a class="language-click" href="#">My Account <i class="ion-chevron-down"></i></a>
                                                                <ul class="language-dropdown" style=" width:150px;">
                                                                    <li>
                                                                        <a href="'. site_url('profile').'">Profile</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('profile/order_history').'">Orders</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('profile/table_reservation').'">Table Reservation</a>
                                                                    </li>

                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a class="" href="'. base_url(). 'accounts/logout"><span class="text-danger">logout</span></a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    ';
                                            echo $login_txt_html;
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>-->
            
            <?php $this->load->view('included/fashionpage_included/header_micro');?>
            <div class="border-bottom-1"></div>
            
            <div class="header-middle ray-bg">
                <div class="container">
                    <div class="menu-position">
                        <div class="row">
                            <!--<div class="col-lg-2 col-md-2">
                                <div class="logo pt-50">
                                    <a href="<?= base_url()?>"><img alt="" src="<?= base_url() ?>assets/img/jollof_logo.png"></a>
                                </div>
                            </div>-->
                            <div class="col-lg-12 col-md-12">
                                <div class="menu-cart-wrapper f-right">
                                    <div class="main-menu menu-style-4" >
                                        <nav>
                                            <ul >
                                            <?php foreach ($nav as $navs) :?>
                                                
                                                <li class="mega-menu-position" >
                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" title="<?= $navs['categoryname']?>">
                                                        
                                                        <?php
                                                            $value = $navs['categoryname'];
                                                            $limit = '20';
                                                            if (strlen($value) > $limit) {
                                                                     $trimValues = substr($value, 0, $limit).'...';
                                                                      } 
                                                            else {
                                                                    $trimValues = $value;
                                                              }
                                                        //character_limiter($resta['companydesc'],25); 
                                                              echo $trimValues;
                                                        ?>
                                                    </a>
                                                    
                                                    <!--sub menu-->    
                                                    <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                                    <ul class="mega-menu">
                                                        <div style=" margin-left: 30px;"><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>"><h5><?= $navs['categoryname']?></h5></a></div>
                                                        <!-- Ad  -->
                                                        <!--<li>
                                                            <ul>
                                                                <li><a href="<?= site_url('prom/promo_form')?>"><img alt="" src="<?= base_url() ?>assets/jollof_banners/banner/menu-img-4.jpg"></a></li>
                                                            </ul>
                                                        </li>-->
                                                        <!-- Ad end -->
                                                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                        <li>
                                                            <ul>
                                                                <!--<li><a href="shop.html"><img alt="" src="<?= base_url() ?>assets/jollof_banners/banner/menu-img.jpg"></a></li>-->
                                                                <li>
                                                                    <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>">
                                                                        <b class="mega-menu-title"><?= $subnavs['categoryname']?></b>
                                                                    </a>
                                                                </li>
                                                                <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                                <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>"><?= $submenunavs['categoryname']?></a></li>
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
                                                <li class="mega-menu-position">
                                                    <a href="<?= base_url()?>fashion/products/layaway" title="Layaway"> Layaway</a>
                                                </li>
                                                <li class="mega-menu-position">
                                                    <a href="<?= base_url()?>fashion/allstore" title="All Store"> All Store</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!--
                                    <div class="header-cart header-cart-4 pl-20">
                                        
                                        <a href="<?= base_url() ?>cart/load " data-toggle="modal" data-container="modal_cart_container" data-target="#modal_cart_container" data-popup="#cart_popup" class="icon-cart">
                                            <div class="cart-4-icon">
                                                <i class="ion-bag"></i>
                                                <span class="count-style count-red cart_count"></span>
                                            </div>
                                            <div class="count-title-price">
                                                <h6>My Cart</h6>
                                                
                                            </div>
                                        </a>
                                        
                                        
                                        <!-- Default Cart -->
                                        <!--
                                        <a href="#" class="icon-cart">
                                            <div class="cart-4-icon">
                                                <i class="ion-bag"></i>
                                                <span class="count-style count-red">02</span>
                                            </div>
                                            <div class="count-title-price">
                                                <h6>My Cart</h6>
                                                <h6>$50.00</h6>
                                            </div>
                                        </a>
                                        <div class="shopping-cart-content">
                                            <ul>
                                                <li class="single-shopping-cart">
                                                    <div class="shopping-cart-img">
                                                        <a href="#"><img alt="" src="assets/img/cart/1.jpg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h3><a href="#">Unscented After- <br>Shave </a></h3>
                                                        <span>$25.00</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#">x</a>
                                                    </div>
                                                </li>
                                                <li class="single-shopping-cart">
                                                    <div class="shopping-cart-img">
                                                        <a href="#"><img alt="" src="assets/img/cart/2.jpg"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h3><a href="#">Unscented After- <br>Shave </a></h3>
                                                        <span>$25.00</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="#">x</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="shopping-cart-total">
                                                <h4>Subtotal: <span>$50.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-btn flex">
                                                <a class="btn-style btn-hover" href="cart-page.html">view cart</a>
                                                <a class="btn-style btn-hover" href="checkout.html">checkout</a>
                                            </div>
                                        </div>
                                        -->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="mobile-menu-area meanmenu-style-4 d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <?php foreach ($nav as $navs) :?>
                                            
                                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>" title="<?= $navs['categoryname']?>"><?= $navs['categoryname']?></a>
                                                <!--sub menu-->    
                                                <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                                <ul>
                                                    
                                                    <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                                    <li>
                                                        <a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $subnavs['slug']?>"><?= $subnavs['categoryname']?></a>
                                                        <ul>
                                                        <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>/<?= $submenunavs['slug']?>"><?= $submenunavs['categoryname']?></a></li>
                                                            
                                                        <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                    <?php endforeach; ?> 
                                                    
                                                </ul>
                                                <?php endif; ?>
                                                <!--sub menu End-->
                                            </li>
                                            <?php endforeach; ?> 
                                            <li>
                                                <a href="<?= base_url()?>fashion/products/layaway" title="Layaway"> Layaway</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url()?>fashion/allstore" title="All Store"> All Store</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <div class="category-menu-area">
                                <div class="category-toggle-wrap">
                                    <button class="category-toggle">
                                        Shop By Categories
                                        <i class="ion-ios-arrow-down"></i>
                                    </button>
                                </div>
                                <div class="category-menu">
                                    <nav>
                                        <ul>
                                            <?php foreach ($nav as $navs) :?>
                                            <li><a href="<?= base_url()?>fashion/products/<?= $navs['slug']?>"><?= $navs['categoryname']?></a></li>
                                            <?php endforeach; ?> 
                                            <!--<li class="category-submenu">
                                                <a href="#">Spaghetti Dresses</a>
                                            </li>
                                            <li class="category-submenu">
                                                <a href="#">Baby Doll Dresses</a>
                                            </li>
                                            <li><a href="#">Asymmetric Dresses</a></li>-->
                                            
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="header-search-4 clearfix">
                                <form action="<?= site_url('fashion/products')?>" method="get">
                                <div class="category-select-wrapper">
                                    <select name="cate_option" class="category-select orderby">
                                        <option value="">All Categories</option>
                                        <?php foreach ($nav as $navs) :?>
                                        <option value="<?= $navs['id']?>" title="<?= $navs['categoryname']?>">
                                            <?php
                                                $value = $navs['categoryname'];
                                                $limit = '13';
                                                if (strlen($value) > $limit) {
                                                         $trimValues = substr($value, 0, $limit).'...';
                                                          } 
                                                else {
                                                        $trimValues = $value;
                                                  }
                                                //character_limiter($resta['companydesc'],25); 
                                                  echo $trimValues;
                                            ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <!--
                                        <option value="">Computers</option>
                                        <option value="">Laptops </option>
                                        <option value="">Watches</option>
                                        -->
                                    </select>
                                </div>
                                <div class="catigory-search catigorydivform">
                                    
                                        <input type="text" name="search" required placeholder="Search for product here...">
                                        <button class="catigory-btn" type="submit"><i class="ion-ios-search-strong"></i> </button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                   
                    
                    
                    
                    
                    <!-- Main content -->
                    <div class="col-lg-9">
                        <div class="slider-area slider-area-4 ptb-20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-active owl-carousel">

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

                                        <div class="single-slider pt-155 pb-160 bg-img" style=" min-height:458px; background-image:url(<?= site_url('assets/jollof_banners/'.$img) ?>);">
                                            <div class="slider-content slider-animated-1 pl-80">
                                                <!--
                                                <h3 class="animated">Big Fashion 2017</h3>
                                                <h2 class="animated">sale <span>50% off</span></h2>
                                                -->
                                                <div class="slider-btn">
                                                    <a class="animated btn-danger pt-1 pb-1 pl-1 pr-1" href="<?=$imgs->imageurl?>" >Shop now</a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php else: ?>

                                        <div class="single-slider pt-155 pb-160 bg-img" style="min-height:458px; background-image:url(<?= site_url('assets/jollof_banners/'.$img) ?>);">
                                            <div class="slider-content slider-animated-1 pl-80">
                                                <!--
                                                <h3 class="animated">Big Fashion 2017</h3>
                                                <h2 class="animated">sale <span>50% off</span></h2>
                                                -->
                                            </div>
                                        </div>
                                            
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <!--
                                        <div class="single-slider pt-155 pb-160 bg-img" style="background-image:url(<?= base_url() ?>assets/jollof_banners/fashionhompage_banner/banner03.jpg);">
                                            <div class="slider-content slider-animated-1 pl-80">
                                                <h3 class="animated">Big Fashion 2017</h3>
                                                <h2 class="animated">sale <span>50% off</span></h2>
                                                <div class="slider-btn">
                                                    <a class="animated" href="">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slider pt-155 pb-160 bg-img" style="background-image:url(<?= base_url() ?>assets/jollof_banners/fashionhompage_banner/bg4.jpg);">
                                            <div class="slider-content slider-animated-2 pl-80">
                                                <h3 class="animated">New Arrivals</h3>
                                                <h2 class="animated">Women’s <span>fashion</span></h2>
                                                <div class="slider-btn">
                                                    <a class="animated" href="">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-slider pt-155 pb-160 bg-img" style="background-image:url(<?= base_url() ?>assets/jollof_banners/fashionhompage_banner/bg2.jpg);">
                                            <div class="slider-content slider-animated-1 pl-80">
                                                <h3 class="animated">New Arrivals</h3>
                                                <h2 class="animated">Women’s <span>fashion</span></h2>
                                                <div class="slider-btn">
                                                    <a class="animated" href="">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner-area-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="banner-wrapper relative mb-30 banner-hover">
                                        <a href="<?= site_url('promo/promo_form')?>"><img alt="" src="<?= base_url('assets/img/ad_1.png') ?>">
                                        <div class="banner-content-4 banner-position-2">
                                            <h2>Ads On Jollof</h2>
                                            <h5>Best selling deals</h5>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="banner-wrapper relative mb-30 banner-hover">
                                        <a href="<?= site_url('promo/promo_form')?>"><img alt="" src="<?= base_url('assets/img/ad_1.png') ?>">
                                        <div class="banner-content-5 banner-position-2">
                                            <!--<h3>UP TO</h3>
                                            <h2>45% OFF</h2>
                                            <h4>Lingerie & Nightwear</h4>-->
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="banner-wrapper relative mb-30 banner-hover">
                                        <a href="<?= site_url('promo/promo_form')?>"><img alt="" src="<?= base_url('assets/img/ad_1.png') ?>">
                                        <!--<div class="banner-content-4 banner-position-2">
                                            <h2>Shop men</h2>
                                            <h5>Best selling deals</h5>
                                        </div>-->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-area pt-15 pb-20">
                            <div class="product-topbar-wrapper border-bottom-2 mb-30">
                                <div class="topbar-title-wrapper">
                                    <h3 class="topbar-title">Featured Products</h3>
                                </div>
                                <div id="tapdiv" class="product-tab-list-2 nav ">
                                    <a class="taplink active" data-toggle="tab" href="#all">
                                        <h4> all </h4>
                                    </a>
                                    <a class="taplink" data-toggle="tab" href="#sale">
                                        <h4> On Sales </h4>
                                    </a>
                                    <a class="taplink" data-toggle="tab" href="#discount">
                                        <h4> Discount </h4>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-content jump">
                                <?php if(!empty($all_rand)): ?> 
                                <!-- All div-->
                                <div class="tab-pane active" id="all">
                                    <div class="row">
                                        <div class="product-slider-active-4 nav-style owl-carousel">
                                            
                                            <?php foreach  (array_chunk($all_rand, 2, true) as $all_rands) :?>
                                            <div class="col-lg-4">
                                                
                                                <?php foreach ($all_rands as $sales) :?>
                                                <div class="col-lg-12">    
                                                    <?php if(!empty($sales['prd_qcs'])): ?>
                                                    <div class="product-wrapper">

                                                        <?php foreach ($sales['prd_qcs'] as $sale_details) :?>
                                                        <!--sale product-->
                                                            <?php if(!empty($sale_details['sales'])): ?>

                                                                <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>

                                                            <?php endif; ?>
                                                         <!-- Images -->
                                                        <div class="product-img">
                                                            <a href="<?= base_url()?>fashion/store/<?= $sale_details['store_url']?>/<?= $sale_details['prd_url']?>">

                                                                <?php if(!empty($sale_details['frontimage'])): ?>

                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$sale_details['frontimage'])?>" class="img-responsive" alt="<?= $sale_details['frontimage']; ?>" >

                                                                <?php elseif (!empty($sale_details['imagename'])): ?>

                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$sale_details['imagename'])?>" class=" img-responsive" alt="<?= $sale_details['imagename']; ?>" >

                                                                <?php else: ?>

                                                                    <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $sale_details['imagename']; ?>" >

                                                                <?php endif; ?>
                                                            </a>
                                                            <div class="product-action">
                                                                <a title="View Product"  href="<?= site_url('fashion/store/'.$sale_details['store_url'].'/'.$sale_details['prd_url'] )?>"><i class="ion-ios-eye-outline"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-price-cart-wrapper product-padding-4">
                                                            <div class="product-rating-price-wrapper">
                                                                <div class="product-title-4">
                                                                    <h4 title="<?= $sale_details['productname'] ?>">
                                                                        <a href="<?= site_url('fashion/store/'.$sale_details['store_url'].'/'.$sale_details['prd_url'] )?>" class="color_dark">

                                                                            <?php
                                                                                    $value = $sale_details['productname'];
                                                                                        $limit = '22';
                                                                                        if (strlen($value) > $limit) {
                                                                                                 $trimValues = substr($value, 0, $limit).'...';
                                                                                                  } 
                                                                                        else {
                                                                                                $trimValues = $value;
                                                                                          }
                                                                                    //character_limiter($resta['companydesc'],25); 
                                                                                          echo $trimValues;
                                                                            ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div class="product-price">
                                                                    <?php //if(!empty($sale_details['discount_percentage'])): ?>
                                                                    <?php if($sale_details['discount_price_count'] !=0): ?>
                                                                    <?php
                                                                        $disco  = $sale_details['discount_price'];
                                                                        $was_price  = $sale_details['price'];
                                                                        $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                                                    ?>
                                                                    <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                                                                    <span class="new">₦<?=$new_price?> </span>
                                                                    <?php else: ?>   
                                                                        <span class="">₦<?= number_format(floatval($sale_details['price']), 2,'.', ',');?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="product-cart product-cart-4">
                                                                <a href="<?= site_url('fashion/quickview/'.$sale_details['store_url'].'/'.$sale_details['prd_url']) ?>" class="action-plus" title="Quick Buy" data-toggle="modal" data-container="modal_quickproduct_container" data-target="#modal_quickproduct_container" >
                                                                    <i class="ion-bag"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                         <p class="linkcolor" title="Store Name: <?= $sale_details['storename'] ?>" style=" margin-top: -20px;">
                                                            <?php
                                                                        $value_name = $sale_details['storename'];
                                                                            $limit = '22';
                                                                            if (strlen($value_name) > $limit) {
                                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                                      } 
                                                                            else {
                                                                                    $trimValues_storename = $value_name;
                                                                              }
                                                                        echo "<a href='".site_url('fashion/store/'.$sale_details['store_url'])."'>".$trimValues_storename."</a>";
                                                                ?>
                                                        </p>
                                                        <?php endforeach; ?>

                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                                <?php endforeach; ?>
                                                
                                            </div>
                                            <?php endforeach; ?>
                                            <!--
                                            <div class="col-lg-4">
                                                <div class="product-wrapper">
                                                    <div class="product-img">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/product/product-4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-price-cart-wrapper product-padding-4">
                                                        <div class="product-rating-price-wrapper">
                                                            <div class="product-title-4">
                                                                <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                                            </div>
                                                            <div class="product-price">
                                                                <span class="old">$19.00 </span>
                                                                <span class="new">$17.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-cart product-cart-4">
                                                            <a title="Add To Cart"  href="#"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end of All div -->
                                <?php endif;?>
                                
                                <?php if(!empty($sales_rand)): ?> 
                                <!-- sale div-->
                                <div class="tab-pane" id="sale">
                                    <div class="row">
                                        <div class="product-slider-active-4 nav-style owl-carousel">
                                            
                                            <?php foreach  (array_chunk($sales_rand, 2, true) as $sales_rands) :?>
                                            <div class="col-lg-4">
                                                
                                                <?php foreach ($sales_rands as $sales) :?>
                                                <div class="col-lg-12">

                                                    <?php if(!empty($sales['prd_qcs'])): ?>
                                                    <div class="product-wrapper">

                                                        <?php foreach ($sales['prd_qcs'] as $sale_details) :?>
                                                        <!--sale product-->
                                                            <?php if(!empty($sale_details['sales'])): ?>

                                                                <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>

                                                            <?php endif; ?>
                                                         <!-- Images -->
                                                        <div class="product-img">
                                                            <a href="<?= base_url()?>fashion/store/<?= $sale_details['store_url']?>/<?= $sale_details['prd_url']?>">

                                                                <?php if(!empty($sale_details['frontimage'])): ?>

                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$sale_details['frontimage'])?>" class="img-responsive" alt="<?= $sale_details['frontimage']; ?>" >

                                                                <?php elseif (!empty($sale_details['imagename'])): ?>

                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$sale_details['imagename'])?>" class=" img-responsive" alt="<?= $sale_details['imagename']; ?>" >

                                                                <?php else: ?>

                                                                    <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $sale_details['imagename']; ?>" >

                                                                <?php endif; ?>
                                                            </a>
                                                        </div>
                                                        <div class="product-action">
                                                            <a title="View Product"  href="<?= site_url('fashion/store/'.$sale_details['store_url'].'/'.$sale_details['prd_url'] )?>"><i class="ion-ios-eye-outline"></i></a>
                                                        </div>
                                                        <div class="product-price-cart-wrapper product-padding-4">
                                                            <div class="product-rating-price-wrapper">
                                                                <div class="product-title-4">
                                                                    <h4 title="<?= $sale_details['productname'] ?>">
                                                                        <a href="<?= site_url('fashion/store/'.$sale_details['store_url'].'/'.$sale_details['prd_url'] )?>" class="color_dark">

                                                                            <?php
                                                                                    $value = $sale_details['productname'];
                                                                                        $limit = '22';
                                                                                        if (strlen($value) > $limit) {
                                                                                                 $trimValues = substr($value, 0, $limit).'...';
                                                                                                  } 
                                                                                        else {
                                                                                                $trimValues = $value;
                                                                                          }
                                                                                    //character_limiter($resta['companydesc'],25); 
                                                                                          echo $trimValues;
                                                                            ?>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div class="product-price">
                                                                    <?php //if(!empty($sale_details['discount_percentage'])): ?>
                                                                    <?php if($sale_details['discount_price_count'] !=0): ?>
                                                                    <?php
                                                                        $disco  = $sale_details['discount_price'];
                                                                        $was_price  = $sale_details['price'];
                                                                        $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                                                    ?>
                                                                    <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                                                                    <span class="new">₦<?=$new_price?> </span>
                                                                    <?php else: ?>   
                                                                        <span class="">₦<?= number_format(floatval($sale_details['price']), 2,'.', ',');?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="product-cart product-cart-4">
                                                                <a href="<?= site_url('fashion/quickview/'.$sale_details['store_url'].'/'.$sale_details['prd_url']) ?>" class="action-plus" title="Quick Buy" data-toggle="modal" data-container="modal_quickproduct_container" data-target="#modal_quickproduct_container" >
                                                                    <i class="ion-bag"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                         <p class="linkcolor" title="Store Name: <?= $sale_details['storename'] ?>" style=" margin-top: -20px;">
                                                            <?php
                                                                        $value_name = $sale_details['storename'];
                                                                            $limit = '22';
                                                                            if (strlen($value_name) > $limit) {
                                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                                      } 
                                                                            else {
                                                                                    $trimValues_storename = $value_name;
                                                                              }
                                                                        echo "<a href='".site_url('fashion/store/'.$sale_details['store_url'])."'>".$trimValues_storename."</a>";
                                                                ?>
                                                        </p>
                                                        <?php endforeach; ?>

                                                    </div>
                                                    <?php endif;?>

                                                </div>
                                                <?php endforeach; ?>
                                                
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of sale div -->
                                <?php endif; ?>
                                
                                <?php if(!empty($discount_rand)): ?> 
                                <!-- Discount div-->
                                <div class="tab-pane" id="discount">
                                    <div class="row">
                                        <div class="product-slider-active-4 nav-style owl-carousel">
                                            
                                            <?php foreach ($discount_rand as $discount) :?>
                                            <div class="col-lg-4">
                                                
                                                <?php if(!empty($discount['prd_qcs'])): ?>
                                                <div class="product-wrapper">
                                                    
                                                    <?php foreach ($discount['prd_qcs'] as $discount_details) :?>
                                                    <!--sale product-->
                                                        <?php if(!empty($discount_details['sales'])): ?>

                                                            <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>

                                                        <?php endif; ?>
                                                     <!-- Images -->
                                                    <div class="product-img">
                                                        <a href="<?= base_url()?>fashion/store/<?= $discount_details['store_url']?>/<?= $discount_details['prd_url']?>">
                                                            
                                                            <?php if(!empty($discount_details['frontimage'])): ?>
                                            
                                                                <img src="<?= site_url('assets/uploads/fashion_prod/'.$discount_details['frontimage'])?>" class="img-responsive" alt="<?= $discount_details['frontimage']; ?>" >

                                                            <?php elseif (!empty($discount_details['imagename'])): ?>

                                                                <img src="<?= site_url('assets/uploads/fashion_prod/'.$discount_details['imagename'])?>" class=" img-responsive" alt="<?= $discount_details['imagename']; ?>" >

                                                            <?php else: ?>

                                                                <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $discount_details['imagename']; ?>" >

                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a title="View Product"  href="<?= site_url('fashion/store/'.$discount_details['store_url'].'/'.$discount_details['prd_url'] )?>"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                    <div class="product-price-cart-wrapper product-padding-4">
                                                        <div class="product-rating-price-wrapper">
                                                            <div class="product-title-4">
                                                                <h4 title="<?= $discount_details['productname'] ?>">
                                                                    <a href="<?= site_url('fashion/store/'.$discount_details['store_url'].'/'.$discount_details['prd_url'] )?>" class="color_dark">

                                                                        <?php
                                                                                $value = $discount_details['productname'];
                                                                                    $limit = '22';
                                                                                    if (strlen($value) > $limit) {
                                                                                             $trimValues = substr($value, 0, $limit).'...';
                                                                                              } 
                                                                                    else {
                                                                                            $trimValues = $value;
                                                                                      }
                                                                                //character_limiter($resta['companydesc'],25); 
                                                                                      echo $trimValues;
                                                                        ?>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div class="product-price">
                                                                <?php //if(!empty($discount_details['discount_percentage'])): ?>
                                                                <?php if($discount_details['discount_price_count'] !=0): ?>
                                                                <?php
                                                                    $disco  = $discount_details['discount_price'];
                                                                    $was_price  = $discount_details['price'];
                                                                    $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                                                ?>
                                                                <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                                                                <span class="new">₦<?=$new_price?> </span>
                                                                <?php else: ?>   
                                                                    <span class="">₦<?= number_format(floatval($discount_details['price']), 2,'.', ',');?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="product-cart product-cart-4">
                                                            <a href="<?= site_url('fashion/quickview/'.$discount_details['store_url'].'/'.$discount_details['prd_url']) ?>" class="action-plus" title="Quick Buy" data-toggle="modal" data-container="modal_quickproduct_container" data-target="#modal_quickproduct_container" >
                                                                <i class="ion-bag"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                     <p class="linkcolor" title="Store Name: <?= $discount_details['storename'] ?>" style=" margin-top: -20px;">
                                                        <?php
                                                                    $value_name = $discount_details['storename'];
                                                                        $limit = '22';
                                                                        if (strlen($value_name) > $limit) {
                                                                                 $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                                  } 
                                                                        else {
                                                                                $trimValues_storename = $value_name;
                                                                          }
                                                                    echo "<a href='".site_url('fashion/store/'.$discount_details['store_url'])."'>".$trimValues_storename."</a>";
                                                            ?>
                                                    </p>
                                                    <?php endforeach; ?>
                                                     
                                                </div>
                                                <?php endif;?>
                                                
                                            </div>
                                            <?php endforeach; ?>
                                            <!--
                                            <div class="col-lg-4">
                                                <div class="product-wrapper">
                                                    <div class="product-img">
                                                        <a href="product-details.html">
                                                            <img src="assets/img/product/product-19.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-price-cart-wrapper product-padding-4">
                                                        <div class="product-rating-price-wrapper">
                                                            <div class="product-title-4">
                                                                <h4><a href="product-details.html">Meaneor Womens Floral</a></h4>
                                                            </div>
                                                            <div class="product-price">
                                                                <span class="old">$19.00 </span>
                                                                <span class="new">$17.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="product-cart product-cart-4">
                                                            <a title="Add To Cart"  href="#"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                               
                                        </div>
                                    </div>
                                </div>
                                <!-- end of Discount div -->
                                <?php endif; ?>
                                
                            </div>
                        </div>
                        
                        
                        <!--<div class="service-area gray-bg-2 pt-25 pb-10">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 service-border-2">
                                    <div class="service-wrapper-2 mb-30 text-center">
                                        <i class="ion-android-sync"></i>
                                        <h4>Return & Exchange</h4>
                                        <p>Committed to return the <br>money in 30 days</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 service-border-2">
                                    <div class="service-wrapper-2 mb-30 text-center">
                                        <i class="ion-card"></i>
                                        <h4>RECIEVE GIFT CARD</h4>
                                        <p>Receive gift all over <br>order $50</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 service-border-2">
                                    <div class="service-wrapper-2 mb-30 text-center">
                                        <i class="ion-help-buoy"></i>
                                        <h4>ONLINE SUPPORT 24/7</h4>
                                        <p>24/7 online support is <br>always ready</p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="product-area pt-40 pb-20">
                            <div class="product-topbar-wrapper border-bottom-2 mb-10">
                                <h3 class="topbar-title">Recommended Products</h3>
                            </div>
                            <div class="arrivals-product-wrapper">
                                <div class="row">
                                    <div class="arrivals-product-active owl-carousel nav-style">
                                        
                                        
                                        <?php foreach  (array_chunk($rec_rand, 3, true) as $recommend) :?>
                                        <div class="col-lg-6">
                                            
                                            <?php foreach ($recommend as $recom) :?>
                                            <div class="arrivals-product-bundle">
                                                
                                                <?php if(!empty($recom['prd_qcs'])): ?>
                                                <div class="single-arrivals-product-wrapper mb-30">
                                                    <?php foreach ($recom['prd_qcs'] as $recommends) :?>
                                                    <div class="arrivals-product-img">
                                                        
                                                        <a href="<?= base_url()?>fashion/store/<?= $recommends['store_url']?>/<?= $recommends['prd_url']?>">
                                                            
                                                            <?php if(!empty($recommends['frontimage'])): ?>
                                            
                                                                <img src="<?= site_url('assets/uploads/fashion_prod/'.$recommends['frontimage'])?>" class="img-responsive" alt="<?= $recommends['frontimage']; ?>" >

                                                            <?php elseif (!empty($recommends['imagename'])): ?>

                                                                <img src="<?= site_url('assets/uploads/fashion_prod/'.$recommends['imagename'])?>" class=" img-responsive" alt="<?= $recommends['imagename']; ?>" >

                                                            <?php else: ?>

                                                                <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $recommends['imagename']; ?>" >

                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <!--<h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                                            <span class="arrival-price">$14.99</span>-->
                                                            <h4 title="<?= $recommends['productname'] ?>">
                                                                    <a href="<?= site_url('fashion/store/'.$recommends['store_url'].'/'.$recommends['prd_url'] )?>" class="color_darkk">

                                                                        <?php
                                                                                $value = $recommends['productname'];
                                                                                    $limit = '22';
                                                                                    if (strlen($value) > $limit) {
                                                                                             $trimValues = substr($value, 0, $limit).'...';
                                                                                              } 
                                                                                    else {
                                                                                            $trimValues = $value;
                                                                                      }
                                                                                //character_limiter($resta['companydesc'],25); 
                                                                                      echo $trimValues;
                                                                        ?>
                                                                    </a>
                                                            </h4>
                                                            
                                                            <?php if($recommends['discount_price_count'] !=0): ?>
                                                            <?php
                                                                $disco  = $recommends['discount_price'];
                                                                $was_price  = $recommends['price'];
                                                                $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                                            ?>
                                                            <div class="product-price">
                                                                <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                                                                <span class="new">₦<?=$new_price?> </span>
                                                            </div>
                                                            <?php else: ?>   
                                                            <span class="arrival-price" style="color:#e74c3c;"><a>₦<?= number_format(floatval($recommends['price']), 2,'.', ',');?></span>
                                                            <?php endif; ?>
                                                            <div class="mt-20">
                                                                <p class="linkcolor " title="Store Name: <?= $recommends['storename'] ?>" style=" margin-top: -20px;">
                                                                <?php
                                                                        $value_name = $recommends['storename'];
                                                                            $limit = '22';
                                                                            if (strlen($value_name) > $limit) {
                                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                                      } 
                                                                            else {
                                                                                    $trimValues_storename = $value_name;
                                                                              }
                                                                        echo "<a href='".site_url('fashion/store/'.$recommends['store_url'])."'>".$trimValues_storename."</a>";
                                                                ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="<?= site_url('fashion/quickview/'.$recommends['store_url'].'/'.$recommends['prd_url']) ?>" class="action-plus" title="Quick Buy" data-toggle="modal" data-container="modal_quickproduct_container" data-target="#modal_quickproduct_container" >
                                                                <i class="ion-bag"></i>
                                                            </a>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <?php endif; ?>
                                                <!--<div class="single-arrivals-product-wrapper">
                                                    <div class="arrivals-product-img">
                                                        <a href="product-details.html"><img src="<?= base_url() ?>assets/jollof_banners/product/product-43.jpg" alt=""></a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <h4><a href="product-details.html">Pocket Long Sleeve</a></h4>
                                                            <div class="product-price">
                                                                <span class="old">$21.99 </span>
                                                                <span class="new">$17.99</span>
                                                            </div>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="#" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endforeach; ?>
                                        <!--
                                        <div class="col-lg-6">
                                            <div class="arrivals-product-bundle">
                                                <div class="single-arrivals-product-wrapper mb-30">
                                                    <div class="arrivals-product-img">
                                                        <a href="product-details.html"><img src="<?= base_url() ?>assets/jollof_banners/product/product-42.jpg" alt=""></a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                                            <span class="arrival-price">$23.99</span>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="#" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-arrivals-product-wrapper">
                                                    <div class="arrivals-product-img">
                                                        <a href="product-details.html"><img src="<?= base_url() ?>assets/jollof_banners/product/product-44.jpg" alt=""></a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <h4><a href="product-details.html">Absolute Workout Jacket</a></h4>
                                                            <span class="arrival-price">$11.95</span>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="#" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="arrivals-product-bundle">
                                                <div class="single-arrivals-product-wrapper mb-30">
                                                    <div class="arrivals-product-img">
                                                        <a href="product-details.html"><img src="<?= base_url() ?>assets/jollof_banners/product/product-45.jpg" alt=""></a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                                            <span class="arrival-price">$14.99</span>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="#" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-arrivals-product-wrapper">
                                                    <div class="arrivals-product-img">
                                                        <a href="product-details.html"><img src="<?= base_url() ?>assets/jollof_banners/product/product-46.jpg" alt=""></a>
                                                    </div>
                                                    <div class="arrivals-product-content">
                                                        <div class="arrivals-product-title">
                                                            <h4><a href="product-details.html">Pocket Long Sleeve</a></h4>
                                                            <div class="product-price">
                                                                <span class="old">$21.99 </span>
                                                                <span class="new">$17.99</span>
                                                            </div>
                                                        </div>
                                                        <div class="arrivals-product-cart">
                                                            <a href="#" title="Add To Cart"><i class="ion-bag"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="product-area pb-75">
                            <div class="product-topbar-wrapper border-bottom-2 mb-30">
                                <h3 class="topbar-title">Recommended Products</h3>
                            </div>
                            <div class="recommended-product-wrapper">
                                <div class="row">
                                    <div class="recommended-product-slider-active owl-carousel nav-style">
                                        <div class="col-lg-3">
                                            <div class="single-recommended-product-wrapper">
                                                <div class="recommended-product-img">
                                                    <a href="product-details.html"><img src="assets/img/product/product-47.jpg" alt=""></a>
                                                </div>
                                                <div class="recommended-product-contrnt">
                                                    <h4><a href="product-details.html">Pocket Long Sleeve</a></h4>
                                                    <span class="arrival-price">$24.99</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="single-recommended-product-wrapper">
                                                <div class="recommended-product-img">
                                                    <a href="product-details.html"><img src="assets/img/product/product-48.jpg" alt=""></a>
                                                </div>
                                                <div class="recommended-product-contrnt">
                                                    <h4><a href="product-details.html">Absolute Workout</a></h4>
                                                    <span class="arrival-price">$13.59</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="single-recommended-product-wrapper">
                                                <div class="recommended-product-img">
                                                    <a href="product-details.html"><img src="assets/img/product/product-49.jpg" alt=""></a>
                                                </div>
                                                <div class="recommended-product-contrnt">
                                                    <h4><a href="product-details.html">Tunic Hooded T Shirts</a></h4>
                                                    <span class="arrival-price">$16.59</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="single-recommended-product-wrapper">
                                                <div class="recommended-product-img">
                                                    <a href="product-details.html"><img src="assets/img/product/product-50.jpg" alt=""></a>
                                                </div>
                                                <div class="recommended-product-contrnt">
                                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                                    <span class="arrival-price">$18.99</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="single-recommended-product-wrapper">
                                                <div class="recommended-product-img">
                                                    <a href="product-details.html"><img src="assets/img/product/product-51.jpg" alt=""></a>
                                                </div>
                                                <div class="recommended-product-contrnt">
                                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                                    <span class="arrival-price">$18.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- end of main content -->
                    
                    
                    
                    <!-- sidebar -->
                    <div class="col-lg-3">
                        <!--<div class="sidebar-services pt-40">
                            <div class="single-service-wrapper">
                                <div class="service-icon">
                                    <i class="ion-paper-airplane"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Free shipping</h4>
                                    <p>Free shipping on all oder $99</p>
                                </div>
                            </div>
                            <div class="single-service-wrapper">
                                <div class="service-icon">
                                    <i class="ion-android-sync"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Return & Exchange</h4>
                                    <p>return the money in 30 days</p>
                                </div>
                            </div>
                            <div class="single-service-wrapper">
                                <div class="service-icon">
                                    <i class="ion-card"></i>
                                </div>
                                <div class="service-content">
                                    <h4> Recieve Gift Card </h4>
                                    <p>Receive gift all over order $50</p>
                                </div>
                            </div>
                            <div class="single-service-wrapper">
                                <div class="service-icon">
                                    <i class="ion-help-buoy"></i>
                                </div>
                                <div class="service-content">
                                    <h4>Online Support 24/7</h4>
                                    <p>24/7 online support is always ready</p>
                                </div>
                            </div>
                        </div>-->
                        <div class="sidebar-banner mt-20">
                            
                             <!-- Jssor Slider Begin 270 by 460 -->
                            <div id="jssor_fashion_banner" style="position:relative;top:0px;left:0px;width:270px;height:457px;overflow:hidden;">

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
                                <div data-u="slides" style="cursor: move; position:absolute;top:0px;left:0px;width:270px;height:457px;overflow:hidden;">

                                   <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad1.png"/></a>
                                    </div>
                                    <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad5.png"/></a>
                                    </div>
                                    <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad4.png"/></a>
                                    </div>
                                    <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad5.png"/></a>
                                    </div>
                                    <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad6.jpg"/></a>
                                    </div>
                                    <div>
                                        <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad7.jpg"/></a>
                                    </div>
                                </div>
                            </div>

                    <!-- Jssor Slider End -->
                            <!--<a href="#"><img alt="" src="assets/img/banner/banner-15.jpg"></a>
                            <div class="sidebar-banner-content">
                                <h4>New style 2018</h4>
                                <h3>custom tailor</h3>
                                <a class="btn-style" href="#">view collection</a>
                            </div>-->
                        </div>
                        <!--<div class="best-seller-area mt-50">
                            <h4 class="sidebar-title">Best Sellers</h4>
                            <div class="best-seller-slider owl-carousel nav-style mt-30">
                                <div class="best-seller-wrapper">
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-1.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Casual Loose Hollowed</a></h4>
                                            <span>$15.99</span>
                                        </div>
                                    </div>
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-2.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Meaneor Womens Floral</a></h4>
                                            <span>$17.59</span>
                                        </div>
                                    </div>
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-3.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Chiffon Flower Long</a></h4>
                                            <span>$10.99</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="best-seller-wrapper">
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-4.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Casual Loose Hollowed</a></h4>
                                            <span>$15.99</span>
                                        </div>
                                    </div>
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-5.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Meaneor Womens Floral</a></h4>
                                            <span>$17.59</span>
                                        </div>
                                    </div>
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="assets/img/product/best-seller-6.jpg"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4><a href="#">Chiffon Flower Long</a></h4>
                                            <span>$10.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="sidebar-testimonials-wrapper">
                            <h4 class="sidebar-title">Testimonials</h4>
                            <div class="sidebar-testimonials-active mt-30 owl-carousel">
                                <div class="single-sidebar-testimonials-wrapper">
                                    <div class="testimonials-pera">
                                        <p>I'm so happy with all of the themes, great support, could not wish for more. These people are geniuses!</p>
                                    </div>
                                    <div class="testimonials-img-name mt-35">
                                        <div class="testimonials-img">
                                            <img alt="" src="assets/img/team/client-review-1.jpg">
                                        </div>
                                        <div class="testimonials-name">
                                            <h5>Sandy Wilcke</h5>
                                            <span>Co-Founder Facebook</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="single-sidebar-testimonials-wrapper">
                                    <div class="testimonials-pera">
                                        <p>I'm so happy with all of the themes, great support, could not wish for more. These people are geniuses!</p>
                                    </div>
                                    <div class="testimonials-img-name mt-35">
                                        <div class="testimonials-img">
                                            <img alt="" src="assets/img/team/client-review-2.jpg">
                                        </div>
                                        <div class="testimonials-name">
                                            <h5>Tayeb Rayed</h5>
                                            <span>Co-Founder Facebook</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="single-sidebar-testimonials-wrapper">
                                    <div class="testimonials-pera">
                                        <p>I'm so happy with all of the themes, great support, could not wish for more. These people are geniuses!</p>
                                    </div>
                                    <div class="testimonials-img-name mt-35">
                                        <div class="testimonials-img">
                                            <img alt="" src="assets/img/team/client-review-3.jpg">
                                        </div>
                                        <div class="testimonials-name">
                                            <h5>Hamim Hisham</h5>
                                            <span>Co-Founder Facebook</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>-->
                        
                        <div class="best-seller-area mt-50">
                            <h4 class="shop-sidebar-title">Best Sellers</h4>
                            <div class="best-seller-slider owl-carousel nav-style mt-30">
                                <?php foreach  (array_chunk($best_sellers, 3, true) as $bestsellers) :?>
                                <div class="best-seller-wrapper">
                                    <?php foreach ($bestsellers as $best_seller) :?>
                                    <?php if(!empty($best_seller['prd_qcs'])): ?>
                                    <?php foreach ($best_seller['prd_qcs'] as $recommends) :?>
                                    <div class="single-best-seller-wrapper">

                                        <div class="best-seller-img">
                                            <a href="<?= base_url()?>fashion/store/<?= $recommends['store_url']?>/<?= $recommends['prd_url']?>">

                                                <?php if(!empty($recommends['frontimage'])): ?>

                                                    <img src="<?= site_url('assets/uploads/fashion_prod/thumbs/'.$recommends['frontimage'])?>" class="img-responsive" alt="<?= $recommends['frontimage']; ?>" >

                                                <?php elseif (!empty($recommends['imagename'])): ?>

                                                    <img src="<?= site_url('assets/uploads/fashion_prod/thumbs/'.$recommends['imagename'])?>" class=" img-responsive" alt="<?= $recommends['imagename']; ?>" >

                                                <?php else: ?>

                                                    <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="<?= $recommends['imagename']; ?>" >

                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="best-seller-content ">
                                            <h4 title="<?= $recommends['productname'] ?>">
                                                    <a href="<?= site_url('fashion/store/'.$recommends['store_url'].'/'.$recommends['prd_url'] )?>" class="color_darkk">

                                                        <?php
                                                                $value = $recommends['productname'];
                                                                    $limit = '22';
                                                                    if (strlen($value) > $limit) {
                                                                             $trimValues = substr($value, 0, $limit).'...';
                                                                              } 
                                                                    else {
                                                                            $trimValues = $value;
                                                                      }
                                                                //character_limiter($resta['companydesc'],25); 
                                                                      echo $trimValues;
                                                        ?>
                                                    </a>
                                            </h4>
                                            <?php if($recommends['discount_price_count'] !=0): ?>
                                            <?php
                                                $disco  = $recommends['discount_price'];
                                                $was_price  = $recommends['price'];
                                                $new_price  =  number_format(floatval($was_price) - floatval($disco), 2,'.', ',');
                                            ?>
                                            <div class="product-price">
                                                <span class="old" style=" font-size: 13px;">₦<?= number_format(floatval($was_price), 2,'.', ',');?></span>
                                                <span class="new">₦<?=$new_price?> </span>
                                            </div>
                                            <?php else: ?>  
                                            <div class="product-price">
                                            <span class="" style="color:#e74c3c; fn"><a>₦<?= number_format(floatval($recommends['price']), 2,'.', ',');?></span>
                                            </div>
                                            <?php endif; ?>
                                            <div class="mt-20">
                                                <p class="linkcolor " title="Store Name: <?= $recommends['storename'] ?>" style=" margin-top: -20px;">
                                                <?php
                                                        $value_name = $recommends['storename'];
                                                            $limit = '22';
                                                            if (strlen($value_name) > $limit) {
                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                      } 
                                                            else {
                                                                    $trimValues_storename = $value_name;
                                                              }
                                                        echo "<a href='".site_url('fashion/store/'.$recommends['store_url'])."'>".$trimValues_storename."</a>";
                                                ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif;?>
                                    <?php endforeach; ?>

                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="best-seller-area mt-50">
                            <h4 class="sidebar-title">Stores</h4>
                            <div class="best-seller-slider owl-carousel nav-style mt-30">
                                <?php foreach  (array_chunk($get_stores, 3, true) as $getstores) :?>
                                <div class="best-seller-wrapper">
                                    <?php foreach ($getstores as $stores) :?>
                                        <?php
                                                if (isset($stores['logo'])&& !empty($stores['logo'])) {
                                                    $img = $stores['logo'];
                                                    } 
                                                else {
                                                        $img='noimage.jpg';
                                                  }
                                        ?>
                                    <div class="single-best-seller-wrapper">
                                        <div class="best-seller-img">
                                            <a href="#"><img alt="" src="<?= site_url('assets/uploads/fashion_logo/'.$img)?>"></a>
                                        </div>
                                        <div class="best-seller-content">
                                            <h4>
                                                <?php
                                                        $value_name = $stores['companyname'];
                                                            $limit = '22';
                                                            if (strlen($value_name) > $limit) {
                                                                     $trimValues_storename = substr($value_name, 0, $limit).'...';
                                                                      } 
                                                            else {
                                                                    $trimValues_storename = $value_name;
                                                              }
                                                        echo "<a href='".site_url('fashion/store/'.$stores['slug'])."'>".$trimValues_storename."</a>";
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--<div class="sidebar-blog mt-45 mb-40">
                            <h4 class="sidebar-title">Latest Blogs</h4>
                            <div class="sidebar-blog-slider owl-carousel nav-style mt-30">
                                <div class="single-sidebar-blog-wrapper">
                                    <div class="sidebar-blog-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/sidebar-blog.jpg" alt=""></a>
                                    </div>
                                    <div class="sidebar-blog-content">
                                        <h3><a href="blog-details.html">26 Fashion Blogs You Need to Follow in 2018</a></h3>
                                        <p>With top-tier fashion bloggers raking in multimillion-dollar campaigns, it’s no wonder every self-proclaimed...</p>
                                        <div class="sidebar-blog-date">
                                            <span> <i class="ion-ios-calendar-outline"></i> 09- Apr - 2017</span>
                                        </div>
                                        <a href="blog-details.html">Read More</a>
                                    </div>
                                </div>
                                <div class="single-sidebar-blog-wrapper">
                                    <div class="sidebar-blog-img">
                                        <a href="blog-details.html"><img src="assets/img/blog/sidebar-blog-2.jpg" alt=""></a>
                                    </div>
                                    <div class="sidebar-blog-content">
                                        <h3><a href="blog-details.html">26 Fashion Blogs You Need to Follow in 2018</a></h3>
                                        <p>With top-tier fashion bloggers raking in multimillion-dollar campaigns, it’s no wonder every self-proclaimed...</p>
                                        <div class="sidebar-blog-date">
                                            <span> <i class="ion-ios-calendar-outline"></i> 09- Apr - 2017</span>
                                        </div>
                                        <a href="blog-details.html">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <!-- end of sidebar -->
                    
                    
                    
                </div>
            </div>
        </div>
        <!--Cart popup-->
        <div class="modal fade" id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >

        </div>
        <!--end Cart popup-->
        
        <!--Quick product view popup-->
        <div class="modal fade" id="modal_quickproduct_container" tabindex="-1" role="dialog" aria-labelledby="Quick view " aria-hidden="true" >

        </div>
        <!--end Quick product view popup-->
        
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
        
        
        <footer class="footer-area padding-width-1 footer-44">
            <div class="footer-top black-bg pt-80 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-xl-3 col-md-4">
                            <div class="footer-widget mb-30">
                                <div class="footer-logo">
                                    <a href="<?= site_url()?>"><img alt="" src="<?= base_url()?>"><img alt="" src="<?= base_url() ?>assets/img/jollof_logo.png"></a>
                                </div>
                                <div class="footer-address">
                                    <div class="single-footer-address">
                                        <!--<div class="footer-address-icon">
                                            <i class="ion-ios-home-outline"></i>
                                        </div>
                                        <div class="footer-address-content">
                                            <p>169-C, Technohub, Dubai Silicon.</p>
                                        </div>-->
                                    </div>
                                    <div class="single-footer-address">
                                        <div class="footer-address-icon">
                                            <i class="ion-ios-telephone-outline"></i>
                                        </div>
                                        <div class="footer-address-content">
                                            <p>+2348145463611 | +2348145463478</p>
                                        </div>
                                    </div>
                                    <div class="single-footer-address">
                                        <div class="footer-address-icon">
                                            <i class="ion-ios-email-outline"></i>
                                        </div>
                                        <div class="footer-address-content">
                                            <p><a href="#">info@jollof.com</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="copyright">
                                    <p>Copyright © 2018 <a href="#">Stakle</a>. <br>all rights reserved</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-4">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h4>INFORMATION</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a class="faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Jollof_Privacy_Policy.docx&embedded=true">Privacy policy</a></li>
                                        <li><a class="faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Terms_and_Condition_for_Jollof.docx&embedded=true">Terms &amp; condition</a></li>
                                        <li><a class="faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/FAQ.docx&embedded=true">FAQ</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-4">
                            <div class="footer-widget mb-30 pl-30">
                                <div class="footer-title">
                                    <h4>ACCOUNT</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="<?= site_url("promo/promo_form")?>">Advertise on Jollof.com</a></li>
                                        <li><a href="<?= site_url('restaurant-admin')?>">Restaurant Admin login</a></li>
                                        <li><a href="<?= site_url('fashionadmin')?>">Fashion Admin login</a></li>
                                        <li><a href="<?= site_url('merchant/signup')?>">Add Your Business</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-3 col-md-4">
                            <div class="footer-widget mb-30 pl-60">
                                <div class="footer-title">
                                    <h4>QUICK LINKS</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="<?= site_url()?>">MainPage</a></li>
                                        <li><a href="<?= site_url('cuisine')?>">Cuisine</a></li>
                                        <li><a href="<?= site_url('fashion')?>">Fashion</a></li>
                                        <li><a href="<?= site_url('Lifestyle')?>">Life Style</a></li>
                                        <li><a href="<?= site_url('scholar')?>">Scholar</a></li>
                                        <li><a href="<?= site_url('biz')?>">Biz</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-lg-2 col-xl-2 col-md-4">
                            <div class="footer-widget mb-30 pl-60">
                                <div class="footer-title">
                                    <h4>QUICK LINKS</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="login-register.html">New User</a></li>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Refund Policy</a></li>
                                        <li><a href="#">Report Spam</a></li>
                                        <li><a href="#">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-30">
                
                <div>
<style>
.footer-social>ul li.whatsapp a {
    background-color: #1abc9c;
    border: 1px solid #1abc9c;
}
.relative {
    position: relative;
}
.social_icons li a{
	display:block;
	width:39.5px;
	height:40px;
	color:#838a8f;
}
.social_icons li a i[class^="fa "]{
	line-height: 40px;
}
.social_icons .facebook:hover a,.sw_button.facebook{background:#3b5998;}
.social_icons .twitter:hover a,.sw_button.twitter,.tw_color{background:#2daae1;}
.social_icons .google_plus:hover a{background:#f63e28;}
.social_icons .rss:hover a{background:#ff7e00;}
.social_icons .pinterest:hover a{background:#cb2027;}
.social_icons .instagram:hover a{background:#835e42;}
.social_icons .linkedin:hover a{background:#0073b2;}
.social_icons .vimeo:hover a{background:#44b0de;}
.social_icons .youtube:hover a{background:#ff3132;}
.social_icons .flickr:hover a{background:#ff0084;}
.social_icons .envelope:hover a,.sw_button.contact{background:#1abc9c;}
[class*="button_type_"].tw_color{
	-webkit-box-shadow:0 2px 0 #2896c6;
	-moz-box-shadow:0 2px 0 #2896c6;
	-o-box-shadow:0 2px 0 #2896c6;
	-ms-box-shadow:0 2px 0 #2896c6;
	box-shadow:0 2px 0 #2896c6;
}
.social_widgets {
    position: fixed;
    right: 0;
    top: 31%;
    z-index: 189;
}
.social_widgets > li {
    margin-bottom: 4px;
    transition: all .4s ease;
}
.social_widgets > li.opened{
    -webkit-transform:translateX(-265px);
    -moz-transform:translateX(-265px);
    -o-transform:translateX(-265px);
    -ms-transform:translateX(-265px);
    transform:translateX(-265px);
    z-index:1;
}
.sw_button.contact {
    background: #1abc9c;
}
.sw_button {
    width: 40px;
    height: 40px;
    color: #fff;
    font-size: 1.3em;
    -webkit-border-top-left-radius: 4px;
    -moz-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -webkit-border-bottom-left-radius: 4px;
    -moz-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.t_align_c {
    text-align: center;
}
.sw_content {
    position: absolute;
    left: 100%;
    top: 0;
    padding: 15px 20px 30px;
    width: 265px;
    overflow: hidden;
    background: #fff;
    -webkit-border-bottom-left-radius: 4px;
    -moz-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.bot{
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #333;
    display: inline-block;
    font-size: 14px;
    padding: 10px 30px;
}

</style>
                    <!--social widgets-->

                    <ul class="social_widgets d_xs_none">

                        <!--whatsapp feed-->

                        <li class="relative">

                            <button class="sw_button t_align_c contact"><i class="ion-social-whatsapp"></i></button>

                            <div class="sw_content">

                                <h4 class="color_dark m_bottom_20">Chat us via Whatsapp</h4>
                                <?php
                                    if(!empty($info->whatsapp))
                                      {
                                        $link="https://api.whatsapp.com/send?phone=".$info->whatsapp;
                                      }
                                    else{$link="";}
                                ?>
                                <a href="<?=$link?>" target="_blank" class="bot">Whatsapp Chat</a>

                            </div>	

                        </li>

                        <!--facebook-->

                        <li class="relative">

                            <button class="sw_button t_align_c facebook"><i class="ion-social-facebook"></i></button>


                            <div class="sw_content">

                                <a href="<?= $info->facebookpage ?>" target="_blank"> 
                                    <h3 class=" btn color_dark m_bottom_20">Join Us on Facebook</h3>
                                </a>
                                <!--<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=235&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=438889712801266" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>-->
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJOLLOFcom-946309562118505&amp;tabs=timeliine&amp;width=280&amp;height=214&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1980361182290100" width="280" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

                            </div>

                        </li>

                        <!--twitter feed-->

                        <li class="relative">

                            <button class="sw_button t_align_c twitter"><i class="ion-social-twitter"></i></button>

                            <div class="sw_content">

                                <h3 class="color_dark m_bottom_20">Latest Tweets</h3>

                                <div class="twitterfeed m_bottom_25">

                                </div>

                                <a href="<?= $info->twitterpage ?> " target="_blank" role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color" style="padding: 10px 30px;">Follow Us on Twitter</a>

                            </div>	

                        </li>

                        <!--instagram feed-->

                        <li class="relative">

                            <button class="sw_button t_align_c instagram" style="background:#e95950;"><i class="ion-social-instagram"></i></button>

                            <div class="sw_content">

                                <h3 class="color_dark m_bottom_20"> Instagram</h3>

                                <a href="<?= $info->insterpage ?>" target="_blank" role="button" class="bot">Follow Us on Instagram</a>

                            </div>  

                        </li>



                        <!--contact form-->

                        <li class="relative">

                            <button class="sw_button t_align_c contact"><i class="ion-android-mail"></i></i></button>

                            <div class="sw_content">

                                <h3 class="color_dark m_bottom_20">Contact Us</h3>

                                <p class="f_size_medium m_bottom_15">Suggestions and Feedbacks</p>

                                <form id="contactform" class="mini">

                                    <input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="cf_name" placeholder="Your name">

                                    <input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="cf_email" placeholder="Email">

                                    <textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="cf_message"></textarea>

                                    <button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>

                                <div class="message_container d_none m_top_20"></div></form>

                            </div>	

                        </li>

                        <!--contact info-->
                        <!--
                        <li class="relative">

                            <button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>

                            <div class="sw_content">

                                <h3 class="color_dark m_bottom_20">Head Office</h3>

                                <ul class="c_info_list">

                                    <li class="m_bottom_10">

                                        <div class="clearfix m_bottom_15">

                                            <i class="fa fa-map-marker f_left color_dark"></i>

                                            <p class="contact_e">80b Lafiaji street,<br> Dophine estate Ikoyi.</p>

                                        </div>

                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.249180786087!2d3.4124078579589434!3d6.458363864021134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b3668c0aa9f%3A0xfc4fd46f48cbbb90!2s80b+Lafiaji+Way%2C+Dolphine+Estate101222%2C+Lagos!5e0!3m2!1sen!2sng!4v1506336733270" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                                    </li>




                                </ul>

                            </div>	

                        </li>
                        -->

                    </ul>

                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="footer-social">
                                <ul>
                                    <li class="facebook"><a href="<?= $info->facebookpage ?>"><i class="ion-social-facebook"></i></a></li>
                                    <li class="twitter"><a href="<?= $info->twitterpage ?>"><i class="ion-social-twitter"></i></a></li>
                                    <?php
                                        if(!empty($info->whatsapp))
                                          {
                                            $link="https://api.whatsapp.com/send?phone=".$info->whatsapp;
                                          }
                                        else{$link="";}
                                    ?>
                                    <li class="whatsapp"><a href="<?=$link?>"><i class="ion-social-whatsapp"></i></a></li>
                                    <!--<li class="pinterest"><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                                    <li class="rss"><a href="#"><i class="ion-social-rss"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="payment-img f-right">
                                <a href="#"><img alt="" src="<?= base_url()?>assets/assets/img/icon-img/payment-img.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
		<!-- all js here -->
        <script src="<?= base_url() ?>assets/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/popper.js"></script>
        <!--<script src="<?= base_url() ?>assets/assets/js/bootstrap.min.js"></script>-->
        <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/ajax-mail.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
        
        
        <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
        <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/jssor.slider.min.js"></script>
        <script>
            new jBox('Tooltip', {
                attach: '.tooltips'
              });
        //load the number of cart in all page
       $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");  
        
       //load the point a user have
       $('.point_count').load("<?php echo base_url(); ?>cart/point_count");                     
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
        $("[data-toggle='modal']").click(function(e) {
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
       
        <script>
                // microsite nav 
                $(document).ready(function() {
                    $('.linkcoloractive').removeClass('linkcoloractive').addClass('linkcolor');
                    $('.fashion').removeClass('linkcolor').addClass('linkcoloractive');
                });
            
            $('#tapdiv a').on('click', function(e){
                e.preventDefault();
                $('#tapdiv a.active').removeClass('active');
                $(this).addClass('active');
                
            });
            // social widgets

            (function(){
                    $('.sw_button').on('click',function(){
                        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
                    });
            })();

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
        var jssor1_slider_rest_banner = new $JssorSlider$("jssor_fashion_banner", options);
        
        //responsive code begin
        //remove responsive code if you don't want the slider scales
        //while window resizing
        function ScaleSlider() {
            var parentWidth = $('#jssor_fashion_banner').parent().width();
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
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
  <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
  <script>
    
    $(document).ready(function() {
        $(".faqpopup_fancyy").fancybox({
         'width': 600, // or whatever
         'height': 320,
         'type': 'iframe'
        });
    }); //  ready 
    
    $(".faqpopup_fancy").fancybox({
        
                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
                type            : 'iframe',
		openEffect	: 'none',
		closeEffect	: 'none'
                
	});
    
  </script>
  <script type="text/javascript">
                $(document).ready(function() {
                //$(window).bind("load",function(){
                    $('.point_count').load("<?php echo base_url(); ?>cart/point_count");
                });
            </script>
    </body>
</html>
