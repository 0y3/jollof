
        <div class="breadcrumb-area ptb-75 hm-4-padding">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Login / Sign Up</h2>
                    <ul>
                        <li><a href="#">home</a> <i class="ion-ios-arrow-right"></i></li>
                        <li class="active">Login / Sign UP</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="WaitMe_form" class="login-register-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="lg1 active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a class="lg2" data-toggle="tab" href="#lg2">
                                    <h4> Sign Up </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            
                                            <form id="login_form" action="<?= base_url() ?>accounts/login_validation" method="post">
                                               
                                                <div class="alert alert-danger alert-dismissable get_error" style="display: none;">

                                                    <span class="error_msgr_lg"> </span>

                                                </div>
                                                
                                                <input type="email" name="l_email" id="l_email" placeholder="example@example.com" autofocus="" required="required">
                                                <input type="password" name="l_pwd" placeholder="Password" required="required">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                      <!--  
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                      -->
                                                        <a  href="javascript:;" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/forgotpwd') ?>" >
                                                            <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                                                        </a>
                                                        <!--<a href="<?= base_url() ?>accounts/forgotpwd" data-toggle="modal" data-container="modal_pwdforgot_container" data-target="#modal_pwdforgot_container" class="forgotpwd color_dark">Forgot Password?</a><br>-->
                                                    </div>
                                                    <button id="login_submit" type="submit" ><span>Login</span></button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="lg2" class="tab-pane">
                                    
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form id="signup_form" method="POST" action="<?= base_url() ?>accounts/signup_validation"> `
                                                
                                                <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                                                    
                                                    <span class="error_msgr_lg2"> </span>

                                                </div>
                                                <input id="firstname_s" class="form-control" name="firstname_s"  placeholder="First Name" type="text" required="" autofocus="">
                                                <input id="lastname_s" class="form-control" name="lastname_s" placeholder="Last Name" type="text" required="">
                                                <input id="email_s" class="form-control m_bottom_15" name="email_s" placeholder="Your Email" type="email" required="">
                    
                                                <input class="form-control m_bottom_15 cu_phone_js" name="cell" placeholder="Phone Number" type="text">
                                                <input class="form-control" type="password" name="pwd_s" placeholder="Password" required="required">
                                                <div>
                                                    <div class="select-option-part">
                                                        <!--<label>Gent</label>-->
                                                        <select class="select" name="gent" required="">
                                                            <option value="">- Please Select Gender -</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="button-box" style="display: flex;">
                                                    <button type="submit" style=" height: 45px;"><span>Sign Up</span></button>
                                                    <div class="login-toggle-btn" style=" padding-left: 20px; margin-top: -35px;">
                                                        
                                                        <label>Or Sign Up With: &nbsp;</label>
                                                        <ul class="clearfix d_inline_b horizontal_list social_icons"><li><a href="#"  class="sw_button t_align_c facebook" style="color: #fff; padding-top: 8px;" onclick="checkLoginState();"><i class="ion-social-facebook"></i></a></li></ul>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                        <!--
                                            Below we include the Login Button social plugin. This button uses
                                            the JavaScript SDK to present a graphical Login button that triggers
                                            the FB.login() function when clicked.

                                        <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
                                        <a class="btn btn-sm btn-primary btn-block" onclick="checkLoginState();" type="submit">Sign Up using Facebook</a>
                                          -->

                                          <div id="status">
                                          </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--Cart popup-->
        <div class="modal fade " id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >

        </div>
        <!--end Cart popup-->
<script>
 $('.header-cart').hide();
 $(document).ready(function() {
     $('.lg2').on('click', function(){
        $('.lg1').removeClass('active');$('#lg1').removeClass('active');
        $(this).addClass('active');$('#lg2').addClass('active');
    });
    $('.lg1').on('click', function(){
        $('.lg2').removeClass('active');$('#lg2').removeClass('active');
        $(this).addClass('active');$('#lg1').addClass('active');
    });
  });
 
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
        
      // The person is not logged into your app or we are unable to tell.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    }
    
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    /*FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });*/
    FB.login(function(response) {
        // handle the response
        if(response.status==='connected') {
         testAPI();
        }
      }, {scope: 'public_profile,email'});
  }
  
  
    
     
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '479355665832368',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v3.0'//'v2.11' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

/*
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
*/

  };
  
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,email,name,first_name,last_name,gender', function(response) {
    
      // Insert your code here
      //console.log('Successful login for: ' + response.name);
      //console.log('first_name login for: ' + response.first_name);
      /*
        for(key in response){
            console.log(key);//for key name in your case it will be bar
            console.log(response[key]);// for key value in your case it will be baz
        }
        */
      console.log(JSON.stringify(response));
      /*
       * 
        FB.api(
             "/"+response.id+"/picture?height=100",
                                    function (responses) {
                                        //console.log(JSON.stringify(responses.data.url));
                                       
                                        response['profile_pic']=responses.data.url;
                                        $.ajax({
                                                   type:"POST",
                                                   url:'<?php echo base_url(); ?>'+'home/facebook_get_signup',
                                                   data:response,
                                                   success:function(res)
                                                   {
                                                       if(res=='success')
                                                       {

                                                           window.location='<?php echo base_url(); ?>';
                                                       }
                                                       if(res=='exists')
                                                       {
                                                           window.location='<?php echo base_url(); ?>';  
                                                       }
                                                   }
                                               });           

                                    }
                                );
       */
      
      document.getElementById('status').innerHTML =
        'Thanks for Facebook Sign up , ' + response.name + '!';

      var checkemail = response.email;
      var gent= response.gender;
      
      document.getElementById("firstname_s").value = response.first_name;
      document.getElementById("lastname_s").value = response.last_name;
      document.getElementById("email_s").value = checkemail;
      
       $.ajax({
                    type:"POST",
                    url:'<?php echo base_url(); ?>'+'accounts/checkemail',
                    dataType: 'json',
                    data:{email_s: checkemail},
                    success:function(res)
                    {
                        if(res.status =='0')
                        {
                            //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(res.content);
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#email_s").focus();
                        }
                        
                    }
                });      
      
      if (gent == 'male')
      {
        $("input[name=gent][value='male']").prop("checked",true);
      }
      else if(gent == 'female')
      {
        $("input[name=gent][value='female']").prop("checked",true);
      }
      
    });
  }
  
</script>



<style>
    
    .pwdfield
{
    width:100%;
}
.pwdopsdiv
{
    display: block;
    float: left;
    margin-right:6px;   
}
.pwdopsdiv a
{
    font-family : Arial, Helvetica, sans-serif;
    font-size : 10px; 
}

.pwdstrengthbar
{
    float:right;
    background:#cccccc;
    height:4px;
    margin:0;

}

.pwdstrength
{
    float:right; 
    height:20px;
    width:70px;
    margin-top:3px;

}
.pwdstrengthstr
{
    float:right;
    clear:both;
    height:14px;
    margin-top:0px;
    font-family : Arial, Helvetica, sans-serif;
    font-size : 10px; 

}
    
</style>
    
<script>
    $(document).ready(function() {
      if('<?= $_GET['register']?>'=='active')
      {
        $('.lg1').removeClass('active');
        $('.tab-pane').removeClass('active');//.addClass('linkcolor');
        $('#lg2').removeClass('linkcolor').addClass('active');
        $('.lg2').addClass('active');
      }

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

        
            $("#login_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                $('#WaitMe_form').waitMe('hide');
                                $('.jollof_logindiv').html(data.content);
                                //$(".jollof_logindiv").data("log", 1);
                                //$('.sur').html(data.content2);
                                new jBox('Notice', {
                                            //animation: 'flip',
                                            animation: {
                                              open: 'tada',
                                              close: 'zoomIn'
                                            },
                                            position: {
                                              x: 10,
                                              y: 100
                                            },
                                            attributes: {
                                              x: 'right',
                                              y: 'bottom'
                                            },
                                            color: 'green',
                                            autoClose: Math.random() * 8000 + 2000,
                                            //title: 'Tadaaa! I\'m single',
                                            content: 'Success! welcome Back '+data.name,
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                        });
                                        
                                        

                                $(".log").data("log", 1);
                                
                                    setInterval(function(){ 
                                        history.go(-1);
                                    }, 2000);
                                    //$('#modal_login').modal('hide');
                                    //$('.modal-backdrop').remove();
                                    //$('body').removeClass('modal-open');
                                    //window.location.href='http://localhost/jollof-cuisine/adminoye/dashbord';
                                
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status);
                                $('#WaitMe_form').waitMe('hide');
                                $(".get_error").show("fast").delay(4000).fadeOut('fast');
                                $(".error_msgr_lg").text(data.content);
                                //$(".get_error").effect("shake");
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#login_form")[0].reset();
                                $("#l_email").focus();
                            } 
                            
                        });

            });
            
            
            $("#signup_form").submit(function (e){
                
                e.preventDefault();
                run_waitMe($('#WaitMe_form'), 1, 'orbit'); 
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {
                          /*if(data.status === '0' )
                          {
                              //alert('error ' + data.status); 
                              $('#WaitMe_form').waitMe('hide');
                              $(".get_error").show("fast").delay(5000).fadeOut('fast');
                              $(".error_msgr_lg2").text(data.content);
                              //$(".get_error").effect("shake");
                              //$("#modal_login").hide('hide');
                              //$('.modal-backdrop').remove();
                              //$('body').removeClass('modal-open');
                              $("#signup_form")[0].reset();
                              $("#firstname_s").focus();
                          }
                          else
                          {
                            window.location.href='<?= site_url()?>accounts/thankyou?email='+$("#email_s").val();
                          }
                          */
                            
                            if(data.status === '1' )
                            {
                                $('#WaitMe_form').waitMe('hide');
                                new jBox('Notice', {
                                            //animation: 'flip',
                                            animation: {
                                              open: 'tada',
                                              close: 'zoomIn'
                                            },
                                            position: {
                                              x: 10,
                                              y: 100
                                            },
                                            attributes: {
                                              x: 'right',
                                              y: 'bottom'
                                            },
                                            color: 'green',
                                            autoClose: Math.random() * 8000 + 2000,
                                            //title: 'Tadaaa! I\'m single',
                                            content: 'Success! Register User '+$("#firstname_s").val(),
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                        });
                                window.location.href='<?= site_url()?>accounts/thankyou?email='+$("#email_s").val();
                                //alert('welcome success' + data.status); 
                                //$('.jollof_logindiv').html(data.content);
                                //$('#modal_signup_container').html(data.content);
                                
                                    //$('#modal_signup_container').modal('hide');
                                    //$('.modal-backdrop').remove();
                                    //$('body').removeClass('modal-open');
                                  
                                
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $('#WaitMe_form').waitMe('hide');
                                $(".get_error").show("fast").delay(5000).fadeOut('fast');
                                $(".error_msgr_lg2").text(data.content);
                                //$(".get_error").effect("shake");
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#signup_form")[0].reset();
                                $("#firstname_s").focus();
                            } 
                            
                            
                        });
              
            });
            
            
    </script>