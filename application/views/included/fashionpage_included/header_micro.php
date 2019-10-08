    <style>
        .hot_stripe {
            position: absolute;
            top: -5px;
            left: 9px;
            z-index: 1;
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
            margin-top: 300px;
            /*min-width: 0px;*/
        }
        .modal .close
        {
            color:#000;
            font-size:21px;
            margin-right: 0px;
        }
        .modal-body {
            padding:30px;
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
        .language-currency
        {
            display: block;
        }
        .currency
        {
            display: inline-block;
        }
    </style>
            <div class="container">
                <div class="header-top ptb-15">
                    <div class="row">
                        <div class="col-lg-2 col-md-12 col-12">
                            <div class="logo logo-pading">
                                <a href="<?= base_url()?>"><img alt="" src="<?= base_url() ?>assets/img/jollof_logo.png"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-12">
                                <div class="language-currency ">
                                    <div class="currency linkcolor cuisine">
                                        <a href="<?= base_url() ?>cuisine" class=""><b>CUISINE</b></a>
                                    </div>
                                    <div class="currency linkcoloractive fashion">
                                        <a class="chosen-single" href="<?= base_url() ?>fashion" class=""><b>FASHION</b></a>
                                    </div>
                                    <div class="currency linkcolor lifestyle">
                                        <a href="<?= base_url() ?>lifestyle" class=""><b>LIFESTYLE</b></a>
                                    </div>
                                    <div class="currency linkcolor scholar">
                                        <a href="<?= base_url() ?>scholar" class=""><b>SCHOLAR</b></a>
                                    </div>
                                    <div class="currency linkcolor biz">
                                        <a  href="<?= base_url() ?>biz" class=""><b>BUSINESS</b></a>
                                    </div>
                                    <div class="currency linkcolor giftportal">
                                        <a  href="<?= base_url() ?>giftportal" class=""><b>GIFTPORTAL</b></a>
                                    </div>
                                    <!--
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
                                    </div>-->
                                </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-12">
                            <div class="header-right-site">
                                <div class=" same-style whatsapp" style="padding-top: 9px;">
                                    <span>Call/Whatsapp on: <b>2349099522529</b> </span>
                                </div>
                                
                                <!--
                                <div class="language-currency same-style">
                                    <div class="language">
                                        <select class="select-header orderby">
                                            <option value="">Eng</option>
                                            <option value="">FRA </option>
                                            <option value="">ESP</option>
                                        </select>
                                    </div>
                                    <div class="currency">
                                        <select class="select-header orderby">
                                            <option value="">USD</option>
                                            <option value="">US </option>
                                            <option value="">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="header-login">
                                    <a href="login-register.html">
                                        <span class="ion-person"></span>
                                    </a>
                                </div>
                                -->
                                <?php
                                        
                                            if(!isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User')
                                            {   
                                                
                                                $login_txt_html= 
                                                        '<span class="log" data-log="0"></span>'
                                                            
                                                            .'<div class="language-style-2" >
                                                                <ul >
                                                                    <li><a class="language-click" href="#"> <span class="ion-person" style="font-size:30px;"></span> <span class="ion-chevron-down" style="font-size:10px;"></span></a>
                                                                        <ul class="language-dropdown" style=" width:150px;">
                                                                            <li>
                                                                                <a href="'. site_url('accounts/login').'">Login</a>
                                                                            </li>

                                                                            <li>
                                                                                    <a href="'. site_url('accounts/login?register=active').'">Sign up</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>';
                                                echo $login_txt_html;
                                            }
                                            else 
                                            {
                                                $ses_username = $_SESSION['first_name'];
                                                 $login_txt_html= 
                                                    '<span class="log" data-log="1"></span>'
                                                    . '
                                                    <div class="language-style-2" style="padding-top: 9px;">
                                                        <ul >
                                                            <li><a class="language-click" href="#">My Account('.$_SESSION['first_name'].') <span class="ion-person"></span> <span class="ion-chevron-down"></span></a>
                                                                <ul class="language-dropdown" style=" width:150px;">
                                                                    <li>
                                                                        <a href="'. site_url('accounts/profile').'">Profile</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('accounts/order').'">Orders</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('accounts/table_reservation').'">Table Reservation</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('accounts/giftportal').'">Giftportal Orders</a>
                                                                    </li>

                                                                    <li>
                                                                            <a href="'. site_url('accounts/layaway').'">layaway</a>
                                                                    </li>

                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a href="javascript:void(0)" class="">Point: <span class="point_count"></span></a>
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
                                <div class="header-cart same-style" style="margin-top: 6px; right: 10px;">
                                    <a href="<?= base_url() ?>cart/load " data-toggle="modal" data-container="modal_cart_container" data-target="#modal_cart_container" class="icon-cart btn">
                                        <i class="ion-bag"></i>
                                        <span class="count-style cart_count count-red"></span>
                                    </a>

                                    
                                    <!--<button class="icon-cart">
                                        <i class="ion-bag"></i>
                                        <span class="count-style">02</span>
                                    </button>
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
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                //$(document).ready(function() {
                //$(window).bind("load",function(){
                    //$('.point_count').load("<?php echo base_url(); ?>cart/point_count");
                //});
            </script>