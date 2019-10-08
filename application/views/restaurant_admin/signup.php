<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Oye">
    <meta name="keyword" content=<?php echo $meta_keyword; ?> >
    <title><?= $title ?></title>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/<?= $icon ?>">

        
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
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js"></script>
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
       
<style> 
.noshow
{
    display: none !important;
}    
.O_Uplode {
    position: relative;
 }
 .UplodeIcon {
     position: absolute;
     top: 8px;
     left: 20px;
     font-size: 20px;
 }
.form-style-base {
    position: absolute;
    top: 0px;
    z-index: 999;
    opacity: 0;
    cursor: pointer;
}
.form-style-fake {
    top: 0px;
    padding-left:60px !important;
}
.Prd_UploadView {
    border: 2px dashed #eaedf1;
    background-color: #eee;
    padding: 10px;
    display:none;
    position:relative;
}
.Prd_UploadView img{
    max-width: 100px;
    max-height: 90px;
}
.Gp_rmv {
	position:absolute;
	top:0px;
	left:200px;
	color:#F30;
	cursor:pointer;
    }
.bg-white {
    background-color: #ffffff;
}
    
.btn_jollofsignup { 
    color: #FFFFFF; 
    background-color: #229955; 
    border-color: #1E8449 ; 
    width: 100px;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 1px;
    padding: 10px 5px;
    margin: 10px 5px;
} 
 
.btn_jollofsignup:hover, 
.btn_jollofsignup:focus, 
.btn_jollofsignup:active, 
.btn_jollofsignup.active, 
.open .dropdown-toggle.btn_jollofsignup { 
  color: #FFFFFF; 
  background-color: #27AE60; 
  border-color: #1E8449; 
} 
 
.btn_jollofsignup:active, 
.btn_jollofsignup.active, 
.open .dropdown-toggle.btn_jollofsignup { 
  background-image: none; 
} 
 
.btn_jollofsignup.disabled, 
.btn_jollofsignup[disabled], 
fieldset[disabled] .btn_jollofsignup, 
.btn_jollofsignup.disabled:hover, 
.btn_jollofsignup[disabled]:hover, 
fieldset[disabled] .btn_jollofsignup:hover, 
.btn_jollofsignup.disabled:focus, 
.btn_jollofsignup[disabled]:focus, 
fieldset[disabled] .btn_jollofsignup:focus, 
.btn_jollofsignup.disabled:active, 
.btn_jollofsignup[disabled]:active, 
fieldset[disabled] .btn_jollofsignup:active, 
.btn_jollofsignup.disabled.active, 
.btn_jollofsignup[disabled].active, 
fieldset[disabled] .btn_jollofsignup.active { 
  background-color: #59A87A; 
  border-color: #1E8449; 
} 
 
.btn_jollofsignup .badge { 
  color: #27AE60; 
  background-color: #FFFFFF; 
}
.fs1 {
    font-size: 2em;
    margin-bottom: 20px;
}
.lia {
    position: absolute;
    top: 5px;
    left:5px;
    z-index: 1;
}
.alihome{
    color: #27AE60;
}
.lifirst{ 
    /*connector not needed before the first step*/
    margin-left: 10% !important;
    width: 23.33% !important;
}

.ajax-loader {
        visibility: hidden;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        z-index: 99999 !important;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    .loader .is-active{
        background-color: rgba(255,255,255,0.7) !important;
    }
    .loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    
</style>
</head>

    
       <!-- Latest compiled and minified CSS -->
      
<body id="WaitMe_form" class="login-img2-bodyme">

    <div id="" class="container">

        <!-- multistep form -->
        <form id="msform" action="" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">
        
            
            <!-- progressbar -->
            <ul id="progressbar">
                <a class="alihome" href="<?= site_url()?>" ><span class="lia"><i class="fs1 icon_house"></i></span></a>
                <!--<span><i class="icon_documents_alt"></i></span>
                <div class="fs1" aria-hidden="true" data-icon="&#xe074;"></div>-->
                <li class="lifirst active">Account Setup</li>
                <li>Personal Details</li>
                <li>Email Confirmation</li>
            </ul>
        
            <!-- fieldsets -->
            <fieldset>
            
                <h2 class="fs-title">Create account</h2>
                
                <div class="form_input">
                    <div class="input-group bg-white" style="padding:3px 0px 10px ; margin-bottom: 15px;  border-radius: 3px;">
                        <span class="input-group-addon" style=" padding-top:7px; padding-bottom: 0px;"><i class="icon_documents_alt"></i></span>
                            <label class="radio-inline" style=" padding-right: 40px;">
                                <input type="radio" name="reg_type" id="" class="" value="cuisine"> 
                                Cuisine
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="reg_type" id="" class="" value="fashion">
                                Fashion
                            </label>
                            
                    </div>
                </div>
               
                <div class="" style="padding-bottom: 15px;">
                    <div>
                        <div class="O_Uplode">
                            <input type="file" name="Uplodefile" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base step1vall" >
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake"  placeholder="Upload your Logo" readonly="" accept="image/jpeg" >
                            <i class=" icon_cloud-upload_alt UplodeIcon"></i>
                            
                        </div>
                        
                        <div class="Prd_UploadView">
                            
                            <img class="UploadView" src="" width="100%" height="100%" />
                            <span class="Gp_rmv" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="icon_close_alt2"></i></span>
                                
                        </div>
                    </div>
                </div>

                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input name="r_name" type="text" class="form-control step1val r_nam" placeholder="Merchant Name" autofocus required="required">
                    </div>
                    <div id="r_name_result" class="bg-white"> </div>
                </div>
                
                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
                        <input name="r_email" type="email" class="form-control r_ema step1val" placeholder="Merchant Email" autofocus required="required">
                        <!--<div id="r_email_result" class="bg-white"></div>-->
                    </div>
                    <div id="r_email_result" class="bg-white"></div>
                </div>
                
                
                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_building"></i></span>
                        <textarea name="r_address" id="address" class="form-control step1val" rows="1" placeholder="Merchant Address"></textarea>
                    </div>
                </div>
                
                <div class="row m_bottom_15">
                    <div class="col-xs-6 col-md-6">
                        <select id="state_div" name="r_state" class="form-control step1val" required="">
                            <?php if(!empty($state)): ?>
                                <option value="">Select State</option>
                                
                                <?php foreach ($state as $state_list) :?>
                                    <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>
                                
                                <?php endforeach;?>
                            <?php else: ?>
            
                                <option value="">State not available</option>

                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="col-xs-6 col-md-6">
                        <select id="city_div" name="r_city" class="form-control step1val" required="">
                            <option>Select City</option>
                            
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="latitude" id="latitude" readonly />
                        <input type="hidden" name="longitude" id="longitude" readonly />
                    </div>
            
                </div>
                
                
                <!-- <input type="text" name="email" placeholder="Email" />
                <input type="password" name="pass" placeholder="Password" />
                <input type="password" name="cpass" placeholder="Confirm Password" />-->
                <input type="button" name="next" id="step1btn" class="next action-butto btn_jollofsignup " value="Next" />
            
            </fieldset>
            
            <fieldset>
            
                <h2 class="fs-title">Personal Details</h2>
                
                <div class="form_input"> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input name="u_fname" type="text" class="form-control step2val" placeholder="First Name" autofocus required="required">
                    </div>
                </div>
                
                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input name="u_lname" type="text" class="form-control step2val" placeholder="Last Name" required="required">
                    </div>
                </div>
                    
                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_contacts_alt"></i></span>
                        <input name="u_phone" type="text" class="form-control step2val cu_phone_js" placeholder="Phone" required="required" >
                    </div>
                </div>
                
                <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_mail_alt"></i></span>
                        <input name="u_email" type="email" class="form-control u_ema step2val" placeholder="Login Email" autofocus required="required" readonly >
                    </div>
                    <div id="u_email_result" class="bg-white"> </div>
                </div>
                    
                    <div class="form_input">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input name="u_pwd" type="password" class="form-control step2val" placeholder="Password" required="required">
                    </div>
                </div>

                <label class="checkbox text-left">
                    <b>Transactional fee is 10%.</b>
                </label>
                <label class="checkbox text-left">
                    <input type="checkbox" name="terms"  class="step2val" value="agree" required="required"> 
                    Agree to Our Terms and Conditions <a target="_blank" href="https://docs.google.com/viewerng/viewer?url=<?= site_url()?>assets/doc/Terms_and_Condition_for_Jollof.docx">click to read.. </a>
                    
                </label>
                
<!--                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <textarea name="address" placeholder="Address"></textarea>-->
                <input type="button" name="previous" class="previous btn_jollofsignup" value="Previous" />
                <input type="submit" name="submit" id="step2btn" class="submit btn_jollofsignup" value="Submit" />
            
            </fieldset>
            
            <fieldset class="lastfield">
                
                <h2 class="fs-title">Email Confirmation</h2>
                <h3 class="fs-subtitle" style="font-size: 14px; color: #5a6a80;">A confirmation link has been sent to this Email <span class="conf_email s_ema_g"> </span> </h3>
                
                <div class="alert alert-success alert-dismissable" id="get_error" style="display: none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    <span class="error_msgr"></span>
                </div>
                <div class="alert alert-danger alert-dismissable" id="get_error_danger" style="display: none;">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    <span class="error_msgr"></span>
                </div>
                <h3 class="fs-subtitle">To login , pls <a class="resend" href="">click here</a> to resend..</h3>
                <!--<input type="button" name="previous" class="previous btn_jollofsignup" value="Previous" />
                <input type="button" name="next" class="next btn_jollofsignup" value="Next" />-->
           
            </fieldset>

        </form>
        
    </div>
    
     <!-- Modal -->              
    <div class="modal fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="ERROR view" aria-hidden="true" style="z-index: 10000;">
        <div class="modal-dialog modd" role="document" >

            <div class="modal-content" >

                <div class="modal-header ">
                    <span class="text-center" style=" font-size: 24px; color: #000;">Error!!!</span>
                    <!--<button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>-->
                </div>

                <div class="modal-body" id="cart_details">
                    <div class="alert alert-danger alert-dismissable fade in col-12">
                        <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                        <strong>Oh snap!</strong>
                        Sorry an ERROR occur when saving Merchant Data. Try Again!!.
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--end Modal -->
    <div class="ajax-loader">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
    <!--<div class="ajax-loader">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>-->

<!-- To use Geocoding from Google Maps V3 you need to link 
  https://maps.googleapis.com/maps/api/js?sensor=false 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY2buDtbYIot8Llm_FkQXHW36f0Cme6TI&callback=initMap">
</script>
<script type="text/javascript">

function showResult(result) {
    //document.getElementById('latitude').value = result.geometry.location.lat();
    //document.getElementById('longitude').value = result.geometry.location.lng();
    $('#latitude').val(result.geometry.location.lat());
    $('#longitude').val(result.geometry.location.lng());
}

function getLatitudeLongitude(callback, address) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
    address = address || '80b, Lafiaji way, Dolphin, Ikoyi';
    // Initialize the Geocoder
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0]);
            }
        });
    }
}

var button = document.getElementById('step1btn');

//button.addEventListener("click", function () {
    //var address = document.getElementById('address').value;
$("#step1btn").click(function(){
    var address = $('#address').val()+','+$('select[name="r_city"] option:selected').text()+','+$('select[name="r_state"] option:selected').text();
    //alert(address);
   // getLatitudeLongitude(showResult, address);
});

</script>              
<script>
    
    
    
    // get the UserEamil to the successful Reg Page
     $(document).ready(function(){
         
        $('.r_ema').change(function(){
            var email_j = $('.r_ema').val();
            $('.u_ema').val(email_j);
            $('.s_ema_g').text(email_j);
        });
     });
     
     $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
    
    $(function(){
        
        validate();
        validate2();
        
        
        $('.step1val').change(validate); //you can use your multiple id selector instead of the attribute selector that i am using
        $('.step2val').change(validate2);
    });
    
    
    function validate() {
        var inputvalue = $('.step1val').filter(function (n) {
            return this.value.length > 0;
        });

        if (inputvalue.length == $('.step1val').length) {
            
            if ($("input[name='reg_type']").is(':checked')) {
                $('input[type="button"]#step1btn').prop("disabled", false);
            }
            else {
               $('input[type="button"]#step1btn').prop("disabled", true);
            }
            
            //$('input[type="button"]#step1btn').prop("disabled", false);
        } else {

            $('input[type="button"]#step1btn').prop("disabled", true);
        }
        //checkreg_type();
    }
    
    function validate2() {
        var inputvalue = $('.step2val').filter(function (n) {
            return this.value.length > 0;
        });

        if (inputvalue.length == $('.step2val').length) {

            if ($("input[name='terms']").is(':checked'))
            {
                $('input[type="submit"]#step2btn').prop("disabled", false);
            }
            else
            {
                $('input[type="submit"]#step2btn').prop("disabled", true);
            }
        } else {

            $('input[type="submit"]#step2btn').prop("disabled", true);
            
        }

    }
    
    function checklogo(){
        var logo = $('input[id=base-input]').val();
        if(logo.length < 1)
        {
            //$('input[type="button"]#step1btn').prop("disabled", true);
            
        }
    }
     function checkreg_type(){
        if ($("input[name='reg_type']").is(':checked')) {
            $('input[type="button"]#step1btn').prop("disabled", false);
        }
        else {
           $('input[type="button"]#step1btn').prop("disabled", true);
        }
     }
    function exist (input){
        
         if(input == true) 
           {
             $('input[type="button"]#step1btn').prop("disabled", true);
           }
    }
    function exist2 (input){
        
         if(input == true) 
           {
             $('input[type="submit"]#step2btn').prop("disabled", true);
           }
    }
    

    $('input[id=base-input]').change(function() {
        $('.Prd_UploadView').show();
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    
    var reader; 
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
   function RemoveUpload() {
        
        $('.UploadView').attr('src', '');
        $('input[id=base-input]').val(null);
        $('#fake-input').val(null);
        $('input[type="text"]#fake-input').prop("placeholder", "Choose your Logo");
        $('.Prd_UploadView').hide();
        checklogo();
    }
    $('.div_reset').on('click','.btn_reset', function(e){
    //$('.div_reset').click(function(){
        
        $('.UploadView').attr('src', '');
        $('.Prd_UploadView').hide();
                        
    });
    
    
    
    //check User email if exist
    $('.u_ema').change(function(){  
           var email = $('.u_ema').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?= site_url('restaurant_admin/check_user_email') ?>",  
                     method:"POST",
                     dataType: 'json',
                     data:{email:email},  
                     success:function(data){
                         
                        if(data.status === '1')
                          {
                            $('#u_email_result').html(data.content);
                            exist2(false);
                          }
                        else 
                          {
                            $('#u_email_result').html(data.content);
                            exist2(true);
                          }
                     }  
                });  
           } 
           else { $('#u_email_result').html('');}
      });  
    
    
    
    //check restaurant email if exist
    $('.r_ema').change(function(){  
           var email = $('.r_ema').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?= site_url('restaurant_admin/check_restaurant_email') ?>",  
                     method:"POST",
                     dataType: 'json',
                     data:{email:email},  
                     success:function(data){
                         
                        if(data.status === '1')
                          {
                            $('#r_email_result').html(data.content);
                            exist(false);
                          }
                        else 
                          {
                            $('#r_email_result').html(data.content);
                            exist(true);
                            $('input[type="button"]#step1btn').prop("disabled", true);
                          }
                     }  
                });  
           } 
           else { $('#r_email_result').html('');}
      });  
      
      //check restaurant Name if exist
    $('.r_nam').change(function(){  
           var name = $('.r_nam').val();  
           if(name != '')  
           {  
                $.ajax({  
                     url:"<?= site_url('restaurant_admin/check_restaurant_name') ?>",  
                     method:"POST",
                     dataType: 'json',
                     data:{name:name},  
                     success:function(data){
                         
                        if(data.status === '1')
                          {
                            $('#r_name_result').html(data.content);
                            exist(false);
                          }
                        else 
                          {
                            $('#r_name_result').html(data.content);
                            exist(true);
                          }
                     }  
                });  
           } 
           else { $('#r_name_result').html('');}
      });  

</script>
    
<script>
    
   
    
</script>
    
<!-- jQuery easing plugin -->
<script src="<?= base_url(); ?>assets/admin/js/jquery.easing.min.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
<script src="<?= base_url() ?>assets/js/waitMe.js"></script>
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
            
 //run_waitMe($('#WaitMe_form'), 1, 'orbit');           
$(".submit").click(function(){
    
    //$('.ajax-loader').css("visibility", "visible");
    run_waitMe($('#WaitMe_form'), 1, 'orbit');
	//return false;
        if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
        //save();
        
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
    
    $(".resend").click(function(e){
        
        run_waitMe($('#WaitMe_form'), 1, 'orbit');
        e.preventDefault();
        var email = $('.r_ema').val();
        $.ajax({
            type:'POST',
            dataType: 'json',
            url:'<?= site_url('restaurant-admin/resendConfirmation')?>',
            data:{email:email},
            //data:'email='+$('.r_ema').val(),
            success:function(data){
                
                if(data.status === '1' )
                {
                    $("#get_error").show('fast').delay(5000).fadeOut('slow');
                    //$("#get_error").effect( "shake" );
                    $('.error_msgr').text(data.content);
                    
                    $('#WaitMe_form').waitMe('hide');
                }
                else if(data.status === '0' )
                {
                    $("#get_error_danger").show('fast').delay(5000).fadeOut('slow');
                    //$("#get_error").effect( "shake" );
                    $('.error_msgr').text(data.content);
                    
                    $('#WaitMe_form').waitMe('hide');
                }
            }
        });
    });
     //run_waitMe($('#WaitMe_form'), 1, 'orbit');
    $('#msform').submit(function(e){ 

        //$('.ajax-loader').css("visibility", "visible");
        run_waitMe($('#WaitMe_form'), 1, 'orbit');
        e.preventDefault();
        
        $.ajax({
            url:'<?= site_url('restaurant-admin/signup_validation') ?>',
            type:'POST',
            dataType: 'json',
            data:new FormData(this),
            processData:false,
            contentType:false,
            //async:false,
            beforeSend: function(){
                       // Show image container
                       $('input[class=btn_jollofsignup]').prop("disabled", true);
                    //$('.ajax-loader').css("visibility", "visible");
                    run_waitMe($('#WaitMe_form'), 1, 'orbit');
                       //$(".modal-dialog").removeClass('modal_dialog_edit');
                   },
            success: function(data){

                if(data.status === '1' )
                     {
                        $('.ajax-loader').css("visibility", "hidden");
                        $('#WaitMe_form').waitMe('hide');
                     }
                else if(data.status === '0' ) 
                     {
                        $('.lastfield').addClass('noshow');
                        $('#modal_error').modal('show');
                        $("#msform")[0].reset();
                        //$('#WaitMe_form').waitMe('hide');
                        setInterval(function(){ 
                            window.location.reload(); 
                        }, 4000);
                        
                     } 

            }
            /*,
            complete:function(data){
                       // Hide image container
                        $('input[class=btn_jollofsignup]').prop("disabled", false);
                        $('#WaitMe_form').waitMe('hide');
                        $('.ajax-loader').css("visibility", "hidden");
                      }
            */

         });
         
    });

});
</script>

<script type="text/javascript">
        /*$('#country_div').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data:'country_id='+countryID,
                    success:function(html){
                        $('#state_div').html(html);
                        $('#city_div').html('<option value="">Select state first</option>'); 
                    }
                }); 
            }else{
                $('#state_div').html('<option value="">Select country first</option>');
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });*/
        

        $('#state_div').on('change',function(){
            
            var stateID = $(this).val();
            
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('accounts/get_city_byid') ?>',
                    data:'stateid='+stateID,
                    success:function(html){
                        $('#city_div').html(html);
                    }
                }); 
            }else{
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });
        
    </script>
  </body>
       
</html>
