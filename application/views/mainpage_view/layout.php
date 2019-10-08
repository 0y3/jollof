<!DOCTYPE html>
<html>
<head lang="en">
	<title><?= $titel ?></title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="<?= $meta_keyword ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="<?= base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/font-awesome-4.7.0/css/font-awesome-animation.min.css" rel="stylesheet"/>
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/smallerscreen.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/hover-min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/jol_1.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">

    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
</head>
<script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>";
      var site_url = '<?php echo site_url(); ?>'; 
</script>

<body> 
    <header> 
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-7 col-6">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navb">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="index") echo ' active';?>" href="<?=site_url('')?>">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="cuisine") echo ' active';?>" href="<?= site_url('cuisine')?>">CUISINE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="fashion") echo ' active';?>" href="<?= site_url('fashion')?>">FASHION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="lifestyle") echo ' active';?>" href="<?= site_url('lifestyle')?>">LIFESTYLE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="business") echo ' active';?>" href="<?= site_url('business')?>">BUSINESS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($navmenu) && $navmenu=="scholar") echo ' active';?>" href="<?= site_url('scholar')?>">SCHOLAR</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link gift-portal <?php if(isset($navmenu) && $navmenu=="giftportal") echo ' active';?>" href="<?= site_url('giftportal')?>">GIFT PORTAL</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5 col-6">
                        <div class="call-wrapper">
                            <p class="pull-right">
                                <a href="tel:+234-909-9522-529"><img src="<?= base_url() ?>assets/img/call.png" alt="call icon"> +234-909-9522-529</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="logo-wrapper">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="<?= site_url('')?>"><img src="<?= base_url() ?>assets/img/logo.png" class="img-fluid logo" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto">
                            
                            <!-- ============================================================== -->
			              	<!-- content - style you can find in   -->
			              	<!-- ============================================================== -->
                            <?php if(isset($sitenav)) include_once $sitenav. '.php'; ?>
                            <!-- ============================================================== -->
			              	<!-- End content - style you can find in  -->
			              	<!-- == -->

                            <li class="nav-item">
                                <a class="nav-link" href="#" id="cart">
                                    <img src="<?= base_url() ?>assets/img/cart.png" class="img-fluid" alt="logo"> Cart
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
                                    <img src="<?= base_url() ?>assets/img/profile.png" class="img-fluid" alt="logo"> Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Link 1</a>
                                </div>
                            </li>
                        </ul>
                    </div>  
                </div>
            </nav>
        </div>
    </header>

    <main>
        <article>
            
            <!-- ============================================================== -->
          	<!-- content - style you can find in   -->
          	<!-- ============================================================== -->
                             <?php print("<pre>".print_r($content_file,true)."</pre>");die; ?>
          	<?php include_once $content_file.'.php'; ?>
          	<!-- ============================================================== -->
          	<!-- End content - style you can find in  -->
          	<!-- ============================================================== -->

        </article>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div>
                        <h6>Quick Links</h6>
                        <div>
                            <p><a href="<?=site_url()?>">Home</a></p>
                            <p><a href="<?=site_url('cuisine')?>">Cuisine</a></p>
                            <p><a href="<?=site_url('fashion')?>">Fashion</a></p>
                            <p><a href="<?=site_url('lifestyle')?>">LifeStyle</a></p>
                            <p><a href="<?=site_url('business')?>">Business</a></p>
                            <p><a href="<?=site_url('scholar')?>">Scholar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div>
                        <h6>Information</h6>
                        <div>
                            <p><a class="faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Jollof_Privacy_Policy.docx&embedded=true">Privacy policy</a></p>
                            <p><a class="faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Terms_and_Condition_for_Jollof.docx&embedded=true">Terms & condition</a></p>
                            <p><a class="faqpopup_fancy fancybox.iframe"  href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/FAQ.docx&embedded=true">FAQ</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div>
                        <h6>Account</h6>
                        <div>
                            <p><a href="<?= site_url("promo/promo_form")?>">Advertise on Jollof.com</a></p>
                            <p><a href="<?= site_url('merchant/signup')?>">Add Your Business</a></p>
                            <p><a href="<?= site_url('merchant/signup')?>">Merchant Login</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div>
                        <h6>Jollof.com</h6>
                        <div>
                            <div class="d-flex">
                                <div class="p-2" style="padding-left: 0!important;">
                                    <a href="<?= $info->facebookpage ?>"><img src="<?= base_url() ?>assets/img/Facebook.png" alt="facebook icon"></a>
                                </div>
                                <div class="p-2">
                                    <a href="sms://+2348145463611?body=I%27m%20interested%20in%20your%20product.%20Please%20contact%20me."><img src="<?= base_url() ?>assets/img/Messenger.png" alt="messenger icon"></a>
                                </div>
                                <div class="p-2">
                                    <a href="<?php if(isset($info) && !empty($info->whatsapp)) echo 'https://api.whatsapp.com/send?phone='.$info->whatsapp;?>"><img src="<?= base_url() ?>assets/img/Whatsapp.png" alt="whatsapp icon"></a>
                                </div>
                                <div class="p-2">
                                    <a href="<?= $info->twitterpage ?>"><img src="<?= base_url() ?>assets/img/Twitter.png" alt="twitter icon"></a>
                                </div>
                            </div>
                            <div>
                                <div class="p-2">
                                    <a href="tel:+2348145463611">
                                        <img src="<?= base_url() ?>assets/img/phone-call.png">&nbsp;
                                        <span>+2348145463611</span>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="p-2">
                                    <a href=" <?php if(isset($info) && !empty($info->whatsapp)) echo 'https://api.whatsapp.com/send?phone='.$info->whatsapp;?>">
                                        <img src="<?= base_url() ?>assets/img/message.png">&nbsp;
                                        <span>+<?php if(isset($info) && !empty($info->whatsapp)) echo $info->whatsapp;?></span>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="p-2">
                                    <a href="mailto:info@jollof.com">
                                        <img src="<?= base_url() ?>assets/img/mail.png">&nbsp;
                                        <span>info@jollof.com</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <p><a href="" id="backtotop">Back to top &emsp;<img src="<?= base_url() ?>assets/img/backtotop.png"></a></p>
            </div>
            <div>
                <p> &copy; <?php echo date('Y'); ?>, <a href="javascript:void(0);"> Trovolink Tech </a> All Right Reserved</p>
            </div>
        </div>
    </footer>

    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.popupoverlay.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.fancybox.min.js"></script>
	<script>
/*
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
*/
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
    <script src="<?= base_url() ?>assets/js/waitMe.js"></script>
    <script src="<?= base_url() ?>assets/js/movie-ticket.js"></script>
</body>
</html>