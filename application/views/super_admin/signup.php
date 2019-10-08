<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Oye">
    <meta name="keyword" content=<?php echo $meta_keyword; ?> >
    <link rel="shortcut icon" href="img/favicon.png">
    
        <title><?php echo $titel; ?></title>

        
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
        
       <!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--       <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>-->
	   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/background.slide.js"></script>
   
       
        <script type="text/javascript">
            $(document).ready(function() {
                $("body").backgroundCycle({
                    imageUrls: [
                        '<?php echo base_url(); ?>assets/admin/img/bg_4.jpg',
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

        <!-- multistep form -->
        <form id="msform">
            
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Account Setup</li>
                <li>Email Confirmation</li>
                <li>Personal Details</li>
            </ul>
        
            <!-- fieldsets -->
            <fieldset>
            
                <h2 class="fs-title">Create your account</h2>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input name="s_email" type="email" class="form-control s_ema" placeholder="Email" autofocus required="required">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input name="s_pwd" type="password" class="form-control" placeholder="Password" required="required">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input name="sc_pwd" type="password" class="form-control" placeholder="Confirm Password" required="required">
                </div>
                <label class="checkbox text-left">
                    Agree to Our Policy 
                    <input type="checkbox" value="agree" required="required"> 
                </label>
                
<!--                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                <input type="password" name="cpass" placeholder="Confirm Password" />-->
                <input type="button" name="next" class="next action-button" value="Next" />
            
            </fieldset>
            
            <fieldset>
                
                <h2 class="fs-title">Email Confirmation</h2>
                <h3 class="fs-subtitle" style="font-size: 14px; color: #5a6a80;">A confirmation link have been send to this Emaiil <span class="conf_email s_ema_g"> </span> </h3>
                <h3 class="fs-subtitle">if not, pls <a href="">click here</a> to resend..</h3>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
           
            </fieldset>
            
            <fieldset>
            
                <h2 class="fs-title">Personal Details</h2>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input name="s_fname" type="text" class="form-control" placeholder="First Name" autofocus required="required">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input name="s_lname" type="text" class="form-control" placeholder="Last Name" required="required">
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input name="s_phone" type="text" class="form-control" placeholder="Phone" >
                </div>
                
                
<!--                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <textarea name="address" placeholder="Address"></textarea>-->
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
            
            </fieldset>

        </form>
        
    </div>

<script type="text/javascript">
     $(document).ready(function(){
        $('.s_ema').change(function(){
            var email_j = $('.s_ema').val();
            $('.s_ema_g').text(email_j);
        });
     });
</script>
    
<!-- jQuery easing plugin -->
<script src="<?= base_url(); ?>assets/admin/js/jquery.easing.min.js" type="text/javascript"></script> 
<script>
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

});
</script>

  </body>
       
</html>
