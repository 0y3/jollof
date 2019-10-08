<!DOCTYPE html>
<html>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Oye">
    <meta name="keyword" content="Jollof, jollof.com" >
    <link rel="icon" type="image/ico" href="<?=base_url()?>assets_v2/assets/images/favicon.ico">
    
        <title>Jollof Admin Login</title>

        
    <!-- Bootstrap CSS -->    
    <link href="<?=base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
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
       <script type="text/javascript" src="<?=base_url(); ?>assets/js/background.slide.js"></script>
       
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").backgroundCycle({
                    imageUrls: [
                    
                        /*'<?=base_url()?>assets/admin/img/bg_1.jpg',
                        '<?=base_url()?>assets/admin/img/bg_2.jpg',
                        '<?=base_url()?>assets/admin/img/bg_3.jpg'*/
                        <?php foreach($banners as $banner) :?>
                            <?php
                            if($banner['bannerjollofsitetypeid']==1)
                            {
                            $img='cuisine_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==2)
                            {
                            $img='fashion_banner/'.$banner['imagename'];
                            }
                            elseif($banner['bannerjollofsitetypeid']==3)
                            {
                            $img='jollof_banner/'.$banner['imagename'];
                            }
                            ?>

                            '<?= site_url('assets/jollof_banners/'.$img)?>',
                        <?php endforeach; ?>
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
        
        <?php //form_open("jollofadmin/authentication/login_validation", array("class"=>"login-form", "id"=>"login_form"))?>  
      <form id="login_form " class="login-form login_form"  action="<?= site_url('jollofadmin/authentication/login_validation') ?>" method="post">
        <div class="login-wrap">
            <h2 class="text-center login-imgme"> Jollof Admin Login<i class="icon_lock_alt login_imgme_icon"></i></h2>
            
            
            
            
            <div class="alert alert-danger alert-dismissable" id="get_error" style="display: none;">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                <span class="error_msgr"></span>
            </div>
           

            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input name="l_email" type="email" class="form-control input" placeholder="Email" autofocus required="required">
              <span class="text-danger"><?php echo form_error('Email'); ?></span>
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input name="l_pwd" type="password" class="form-control input" placeholder="Password" required="required">
                <span class="text-danger"><?php echo form_error('Password'); ?></span>
            </div>
            <label class="checkbox">
                <!-- <input type="checkbox" value="remember-me" > Remember me -->
                <span class="pull-right"> 
                  <a  href="javascript:;" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/adminforgotpwd') ?>" >
                      <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                  </a>
                </span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" id="login_submit" type="submit">Login</button>
            
            
            
        </div>
      </form>
        
    </div>

    
 </body>   
    
<script>
        
//$(document).ready(function (){

            //$("#login_form").submit(function (e){
            //$('[type="submit"]').on('click', function(e){
            $(document).on("submit",".login_form", function(e){   
                e.preventDefault();
                //alert('cool');
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   type:'POST',
                   dataType: 'JSON',
                   url:'<?= site_url('jollofadmin/authentication/login_validation') ?>',
                   data:data,
                   success:function(data)
                   {
                    if(data.content ==='logged_inn')
                      {
                          //alert('welcome success' + data); 
                          window.location.href='<?php echo base_url() ?>jollofadmin/dashboard';
                          
                      }
                    else
                      {
                         ///alert('welcome not' + data.content); 
                          $("#get_error").show('fast').delay(5000).fadeOut('slow');
                          $('.error_msgr').text(data.content);
                          $('.input').val('');
                     } 
                  }
                /*}).done(function(data)
                  {
                      if(data.content ==='logged_inn')
                      {
                          //alert('welcome success' + data); 
                          window.location.href='<?php echo base_url() ?>jollofadmin/dashboard';
                          
                      }
                      else
                      {
                          //alert('error ' + data); 
                          //$("#get_error").show('fast');
                          //$("#get_error").effect( "shake" );
                          //$('.error_msgr').text(data);

                          $("#get_error").show('fast').delay(5000).fadeOut('slow');
                          $('.error_msgr').text(data.content);
                          $('.input').val('');
                          //$('#login_form')[0].reset();
                      } */
                  });

            });

//});

</script>


       
</html>
