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
        
        
    <!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">-->
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
    
     <script src="<?= base_url() ?>assets/assets/js/vendor/jquery-1.12.0.min.js"></script>
     
     <!-- jQuery easing plugin -->
        <script src="<?= base_url(); ?>assets/admin/js/jquery.easing.min.js" type="text/javascript"></script> 
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
        <script src="<?= base_url() ?>assets/js/waitMe.js"></script>

        <script src="<?= base_url(); ?>assets/js/jssor.slider.min.js"></script>
        <script src="<?=base_url(); ?>assets/js/bootstrap-select.min.js"></script>

        
        
        
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
                if(isset($header_nav_loader))
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
                    //$this->load->view($error_page); //error page
                }
            ?>
             <!-- End of header nav -->
            
        </header>
        
        <!-- content  -->
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
         <!-- End of content  -->
         
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
        <!-- PushNotification -->
        <?php //include_once 'pushNotification.php'; ?>

        <!--Cart popup-->
        <div class="modal " id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >

        </div>
        <!--end Cart popup-->
        <!--Quick product view popup-->
        <div class="modal " id="modal_quickproduct_container" tabindex="-1" role="dialog" aria-labelledby="quick view " aria-hidden="true" >

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

        <!--  End of Footer tray -->
        
        
        <!-- all js here -->
        
       
        <script src="<?= base_url() ?>assets/assets/js/popper.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/bootstrap.min.js"></script>
        <!--<script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>-->
        <script src="<?= base_url() ?>assets/assets/js/ajax-mail.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/other.main.js"></script>
        
        <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
        <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
        

        <script src="<?= base_url() ?>assets/js/jquery.popupoverlay.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
        <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
        


<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
<link rel="manifest" href="<?=base_url(); ?>manifest.json">
<script>

  // Initialize Firebase
  
  var config = {
    apiKey: "AIzaSyCwUDsNms5JFtPz6mK4Eo3ova0iz2lL2Pc",
    authDomain: "jollof-notification.firebaseapp.com",
    databaseURL: "https://jollof-notification.firebaseio.com",
    projectId: "jollof-notification",
    storageBucket: "jollof-notification.appspot.com",
    messagingSenderId: "923781693225"
  };
  firebase.initializeApp(config);

  const messaging = firebase.messaging();
/*
messaging.requestPermission()
.then(function() {
  console.log('Notification permission granted.');
  return messaging.getToken();
})
.then(function(token) {
  console.log(token); // Display user token
})
.catch(function(err) { // Happen if user deney permission
  console.log('Unable to get permission to notify.', err);
});

messaging.onMessage(function(payload){
    console.log('onMessage',payload);
})*/
    messaging.requestPermission()
    .then(function() {
      console.log('Notification permission granted.');
      if(isTokenSentToServer())
      {
        console.log('Token Already Save.');
      }
      else
      {
        getregtoken();
      }
    })
    .catch(function(err) { // Happen if user deney permission
      console.log('Unable to get permission to notify.', err);
    });
    function getregtoken()
    {
        // Get Instance ID token. Initially this makes a network call, once retrieved
        // subsequent calls to getToken will return from cache.
        messaging.getToken().then(function(currentToken) {
          if (currentToken) {
            //sendTokenToServer(currentToken);
            //updateUIForPushEnabled(currentToken);
            console.log(currentToken);
            setTokenSentToServer(true);
          } else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            setTokenSentToServer(false);
          }
        }).catch(function(err) {
          console.log('An error occurred while retrieving token. ', err);
          //showToken('Error retrieving Instance ID token. ', err);
          setTokenSentToServer(false);
        });

    }
    function setTokenSentToServer(sent) {
        window.localStorage.setItem('sentToServer', sent ? '1' : '0');
    }
    function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') === '1';
    }
</script>

        <script>
            /*
            $(document).ready(function() {
                $('.linkcoloractive').removeClass('linkcoloractive').addClass('linkcolor');
            });
            */
            
            $('.language-click a').on('click', function(e){
                e.preventDefault();
                $('.language-dropdown').slideToggle('click');
                
            });
            //$('.language-click a').trigger('click');
            
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
        
        <script>

        // p0pup on footer terams and condition
        $(".faqpopup_fancy").fancybox({
                
                 maxWidth   : 800,
                maxHeight   : 600,
                fitToView   : false,
                width       : '100%',
                height      : '100%',
                autoSize    : false,
                closeClick  : false,
                        type            : 'iframe',
                openEffect  : 'none',
                closeEffect : 'none'
                        
            });

        // p0pup on add Address
        $(".ajaxbook_form").fancybox({
                maxWidth    : 480,
                maxHeight   : 480,
                autoHeight      : true,
                fitToView   : false,
                width       : '70%',
                height      : '100%',
                autoSize    : false,
                closeClick  : false,
                openEffect  : 'none',
                closeEffect : 'none'
        });
            // social widgets
/*
            (function(){
                    $('.sw_button').on('click',function(){
                        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
                    });
            })();
*/

        </script>
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
            //run_waitMe($('body'), 1, 'orbit');
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
     
        
    </body>
</html>
