<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="<?= $meta_keyword ?>">
        <title><?= $titel ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?= $icon ?>">
        
        
    <!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrapp.css">-->
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
        
        .linkcolor a
        {
            color: #e74c3c; 
        }
        .product-img img 
        {
           max-height: 270px;
        }
        .collapse.in 
        {
            display: block;
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
                background: #E8E8E8;
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
            .sidebar_big {
                display: none;
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
                font-size: 2em;
                color: #fff;
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

        }
    </style>
    <body>
        <!-- header start -->
        <header class="header-area transparent-bar clearfix">
            
            <!--  header tray -->
            
            <?php
                if(isset($header_micro_loader))
                {
                    if ( file_exists( APPPATH.'views/'.$header_micro_loader.'.php' ) ) 
                    {
                        $this->load->view($header_micro_loader); // Sidebar tray
                    }
                    else 
                    {
                        $this->load->view($error_page); //error page
                    }

                }
                else
                {
                    $this->load->view($error_page); //error page
                }
            ?>
            
            <!--  End of header tray -->
            
            <!--  header nav -->
            <?php
               /* if(isset($header_nav_loader))
                {
                    if ( file_exists( APPPATH.'views/'.$header_nav_loader.'.php' ) ) 
                    {
                        $this->load->view($header_nav_loader); // Sidebar tray
                    }
                    else 
                    {
                        $this->load->view($error_page); //error page
                    }

                }
                else
                {
                    $this->load->view($error_page); //error page
                }*/
            ?>
             <!-- End of header nav -->
            
        </header>
        <!-- End of header -->
        
        
        <!-- breadcrumb -->
        <div class="breadcrumb-area ptb-50 gray-bg">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3> GIFTPORTAL</h3>
                    <ul>
                        <li><a href="<?= site_url('giftpotal')?>">home</a> <i class="ion-ios-arrow-right"></i></li>
                        <?= $breadcrumb?> 
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of breadcrumb -->
        
        <div class="shop-wrapper gray-bg pb-80">
            <div class="container">
                <div class="row">
                    
                    
                    
                    <div class="col-lg-12">
                        
                        <!-- Products Page -->
                        <?php
                            if(isset($page_loader))
                            {
                                if ( file_exists( APPPATH.'views/'.$page_loader.'.php' ) ) 
                                {
                                    $this->load->view($page_loader); // Sidebar tray
                                }
                                else 
                                {
                                    $this->load->view($error_page); //error page
                                }

                            }
                            else
                            {
                                $this->load->view($error_page); //error page
                            }
                        ?>
                         <!-- End of Products Page -->
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- footer -->
        <?php
            if(isset($header_micro_loader))
            {
                if ( file_exists( APPPATH.'views/'.$footer_loader.'.php' ) ) 
                {
                    $this->load->view($footer_loader); // Sidebar tray
                }
                else 
                {
                    $this->load->view($error_page); //error page
                }

            }
            else
            {
                $this->load->view($error_page); //error page
            }
        ?>

        <!--  End of Footer tray -->
        
        <!--Cart popup-->
        <div class="modal fade" id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >

        </div>
        <!--end Cart popup-->
        
        <!--Quick product view popup-->
        <div class="modal fade" id="modal_quickproduct_container" tabindex="-1" role="dialog" aria-labelledby="quick view " aria-hidden="true" >

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
        <script src="<?= base_url() ?>assets/assets/js/other.main.js"></script>
        
        <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
        <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
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
            }).success(function() { });

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
            }).success(function() {  });

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
    jQuery(function() {
        jQuery('#position').change(function() {
            this.form.submit();
        });
    });
    jQuery(function() {
        jQuery('#pages').change(function() {
            this.form.submit();
        });
    });
    
    // microsite nav 
        $(document).ready(function() {
            $('.linkcoloractive').removeClass('linkcoloractive').addClass('linkcolor');
            $('.giftportal').removeClass('linkcolor').addClass('linkcoloractive');
        });     
  </script>
  
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
    <script src="<?= base_url() ?>assets/js/waitMe.js"></script>
    <script type="text/javascript">

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
        jQuery('form').submit( function(){ 
            run_waitMe($('body'), 1, 'orbit');
        });
        $(".shop-widget input:checkbox").change(function() {

            $("body").removeClass('menu-active');
            $("#slide-menu").removeClass('slideout');
            run_waitMe($('body'), 1, 'orbit');
        });
        /*
        $("a").click(function() {
            run_waitMe($('body'), 1, 'orbit');
        });
        */
    </script>


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
</script>
        
    </body>
</html>
