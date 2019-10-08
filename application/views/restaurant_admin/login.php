<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Oye">
    <meta name="keyword" content=<?php echo $meta_keyword; ?> >
    <link rel="shortcut icon" href="img/favicon.png">
    
        <title><?php echo $title; ?></title>

        
    <!-- Bootstrap CSS -->    
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?= base_url(); ?>assets/admin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    
    <!-- font icon -->
    <link href="<?= base_url(); ?>assets/admin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/admin/css/font-awesome.css" rel="stylesheet" />
    
    <!-- Custom styles -->
    <link href="<?= base_url(); ?>assets/admin/css/admin_css.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/css/style-responsive.css" rel="stylesheet" />

    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
    
      
       <!-- <?php echo base_url(); ?> -->
        
       
       <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>
       <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
       <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/background.slide.js"></script>
   
       
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").backgroundCycle({
                    imageUrls: [
                        '<?php echo base_url(); ?>assets/admin/img/bg_1.jpg',
                        '<?php echo base_url(); ?>assets/admin/img/bg_2.jpg',
                        '<?php echo base_url(); ?>assets/admin/img/bg_3.jpg'
                    ],
                    fadeSpeed: 2000,
                    //duration: 5000,
					duration: 8000,
                    backgroundSize: SCALING_MODE_COVER
                });
            });
        </script>
</head>

    
       <!-- Latest compiled and minified CSS -->
      
<body class="login-img2-bodyme">

    <div class="container">

        <form class="login-form" id="login_form" method="POST" action="<?= site_url('restaurant-admin/login_validation') ?>">        
        <div class="login-wrap">
            <h2 class="text-center login-imgme"> <?=$log_type?><i class="icon_lock_alt login_imgme_icon"></i></h2>
            
            
            
            
            <div class="alert alert-danger alert-dismissable" id="get_error" style="display: none;">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                <span class="error_msgr"></span>
            </div>
           

            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="l_email" type="email" class="form-control" placeholder="Email" autofocus required="required">
              <span class="text-danger"><?php echo form_error('Email'); ?></span>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="l_pwd" type="password" class="form-control" placeholder="Password" required="required">
                <span class="text-danger"><?php echo form_error('Password'); ?></span>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" > Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" id="login_submit" type="submit">Login</button>
            
            
            <div class="login-blockme ">
                
                <h3 >Not a member?<a href="<?=base_url()?>merchant/signup"> Sign up now</a></h3>				
               <!-- <h2>or login with</h2>
                <div class="login-icons">
                        <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>						
                        </ul>
                </div>
                -->
                
            </div>
            
            
        </div>
      </form>
        
    </div>

    
    
    
<script>
        
$(document).ready(function (){
    
            $("#login_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   data:data
                   /*success:function(data)
                   {
                    if(data =='logged_inn')
                     {
                         alert('welcome success' + data); 
                         window.location.href='<?php echo base_url() ?>adminoye/dashbord';
                         throw new Error('go');
                     }
                     else
                     {
                         alert('welcome not' + data); 
                         $("#get_error").show('fast');
                         $("#get_error").effect( "shake" );
                         $('.error_msgr').html(data);
                         $('#login_form')[0].reset();
                     } 
                    }*/
                }).done(function(data)
                        {
                    		console.log("Response: " + JSON.stringify(data));
                            if(data ==='logged_inn')
                            {
                                alert('welcome success' + data); 
                                window.location.href='<?php echo base_url() ?>restaurant-admin/dashboard';
                                
                            }
                            else
                            {
                                //alert('error ' + data); 
                                $("#get_error").show('fast');
                                $("#get_error").effect( "shake" );
                                $('.error_msgr').text(data);
                                $('#login_form')[0].reset();
                            } 
                        });

            });
});
</script>


  </body>
       
</html>
