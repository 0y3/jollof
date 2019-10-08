<!-- Facebook Login Script -->
<script>
 
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

<script>
/*
  // Load the SDK asynchronously
  (function(thisdocument, scriptelement, id) {
    var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
    if (thisdocument.getElementById(id)) return;
    
    js = thisdocument.createElement(scriptelement); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js"; //you can use 
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
    
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1980361182290100', //Your APP ID
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // These three cases are handled in the callback function.
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };
    
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      _i();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  } 
  
   function _login() {
    FB.login(function(response) {
       // handle the response
       if(response.status==='connected') {
        _i();
       }
     }, {scope: 'public_profile,email'});
 }
 
 function _i(){
     FB.api('/me', function(response) {
        document.getElementById("firstname_s").value = response.first_name;
        document.getElementById("lastname_s").value = response.last_name;
        document.getElementById("email_s").value = response.email;
    });
 }
    
*/
  
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
<!-- Modal -->
  <div class="modal-dialog" style="max-width: 420px;">

        <div class="modal-content">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    <i class="glyphicon glyphicon-globe"></i> Sign up
                </span>

                <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body">
               
                <form id="signup_form" method="POST" action="<?= base_url() ?>accounts/signup_validation"> 
                    
                    <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
            
                    <div class="row m_bottom_15">
                
                        <div class="col-xs-6 col-md-6">
                            <input id="firstname_s" class="form-control" name="firstname_s"  placeholder="First Name" type="text" required="" autofocus="">
                        </div>
                
                        <div class="col-xs-6 col-md-6">
                    
                            <input id="lastname_s" class="form-control" name="lastname_s" placeholder="Last Name" type="text" required="">
                
                        </div>
            
                    </div>
                    
                    <input id="email_s" class="form-control m_bottom_15" name="email_s" placeholder="Your Email" type="email" required="">
                    
                    <input class="form-control m_bottom_15 cu_phone_js" name="cell" placeholder="Phone Number" type="text">
            
                    <span class=" text-danger"> Password </span>
                    <input class="form-control" type="password" name="pwd_s" required="">
            
                    <label class="radio-inline">
                        <input type="radio" name="gent" id="" value="male">
                        Male
                    </label>
                    
                    <label class="radio-inline">
                        <input type="radio" name="gent" id="" value="female">
                        Female
                    </label>
                    
                    <br>
                    <br>
            
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                    <br>
                    <ul class="clearfix d_inline_b horizontal_list social_icons">
                           
                        <li>Or Sign Up With: &nbsp;</li>
                       
                        <li><a href="#"  class="sw_button t_align_c facebook" onclick="checkLoginState();"><i class="fa fa-facebook"></i></a></li> 
                        
                        <!--<li><a href="#" button="" class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></a></li> -->
                        
                    </ul>
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
                
            </div><!-- .modal-body --> 
            
            <footer class="bg_light_color_1 t_mxs_align_c text-center" style=" padding-top: 10px; padding-bottom: 10px; ">
                    <!-- <h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New User?</h3>
                    <a href="<?= base_url() ?>accounts/login" role="button" data-toggle="modal" data-target="#modal_login" data-dismiss="modal" class="">I Have an Account</a>-->
                    <a href="<?= base_url() ?>accounts/login" role="button" data-toggle="modal" data-target="#modal_login" data-dismiss="modal" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">I Have an Account</a>
            </footer>
            
        </div><!-- .modal-content --> 
        
    </div><!-- .modal-dialog --> 
    
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
            }).success(function() { $('input:text:visible:first').focus() });

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
            }).success(function() { $('input:text:visible:first').focus() });

        });    
    </script>

    <script type="text/javascript">
        
        $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
            $("#signup_form").submit(function (e){
                
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
                                //$('.jollof_logindiv').html(data.content);
                                $('#modal_signup_container').html(data.content);
                                
                                    //$('#modal_signup_container').modal('hide');
                                    //$('.modal-backdrop').remove();
                                    //$('body').removeClass('modal-open');
                                    //window.location.href='http://localhost/jollof-cuisine/adminoye/dashbord';
                                
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#signup_form")[0].reset();
                                $("#firstname_s").focus();
                            } 
                            
                        });

            });
            
            
    </script>
    <script>
        
        //var pwdwidget = new PasswordWidget('thepwddiv','regpwd');
        //pwdwidget.MakePWDWidget();
        
        function PasswordWidget(divid,pwdname)
        {
                this.maindivobj = document.getElementById(divid);
                this.pwdobjname = pwdname;

                this.MakePWDWidget=_MakePWDWidget;

                this.showing_pwd=1;
                this.txtShow = 'Show';
                this.txtMask = 'Mask';
                this.txtGenerate = 'Generate';
                this.txtWeak='weak';
                this.txtMedium='medium';
                this.txtGood='good';

                this.enableShowMask=true;
                this.enableGenerate=true;
                this.enableShowStrength=true;
                this.enableShowStrengthStr=true;

        }

        function _MakePWDWidget()
        {
                var code="";
            var pwdname = this.pwdobjname;

                this.pwdfieldid = pwdname+"_id";

                code += "<input type='password' class='form-control' placeholer='pwdfield' name='"+pwdname+"' id='"+this.pwdfieldid+"'>";

                this.pwdtxtfield=pwdname+"_text";

                this.pwdtxtfieldid = this.pwdtxtfield+"_id";

                code += "<input type='text' class='form-control pwdfield' name='"+this.pwdtxtfield+"' id='"+this.pwdtxtfieldid+"' style='display: none;'>";

                this.pwdshowdiv = pwdname+"_showdiv";

                this.pwdshow_anch = pwdname + "_show_anch";

                code += "<div class='pwdopsdiv' id='"+this.pwdshowdiv+"'><a href='#' id='"+this.pwdshow_anch+"'>"+this.txtShow+"</a></div>";

                this.pwdgendiv = pwdname+"_gendiv";

                this.pwdgenerate_anch = pwdname + "_gen_anch";

                code += "<div class='pwdopsdiv'id='"+this.pwdgendiv+"'><a href='#' id='"+this.pwdgenerate_anch+"'>"+this.txtGenerate+"</a></div>";

                this.pwdstrengthdiv = pwdname + "_strength_div";

                code += "<div class='pwdstrength' id='"+this.pwdstrengthdiv+"'>";

                this.pwdstrengthbar = pwdname + "_strength_bar";

                code += "<div class='pwdstrengthbar' id='"+this.pwdstrengthbar+"'></div>";

                this.pwdstrengthstr = pwdname + "_strength_str";

                code += "<div class='pwdstrengthstr' id='"+this.pwdstrengthstr+"'></div>";

                code += "</div>";

                this.maindivobj.innerHTML = code;

                this.pwdfieldobj = document.getElementById(this.pwdfieldid);

                this.pwdfieldobj.pwdwidget=this;

                this.pwdstrengthbar_obj = document.getElementById(this.pwdstrengthbar);

                this.pwdstrengthstr_obj = document.getElementById(this.pwdstrengthstr);

                this._showPasswordStrength = passwordStrength;

                this.pwdfieldobj.onkeyup=function(){ this.pwdwidget._onKeyUpPwdFields(); }

                this._showGeneatedPwd = showGeneatedPwd;

                this.generate_anch_obj = document.getElementById(this.pwdgenerate_anch);

                this.generate_anch_obj.pwdwidget=this;

                this.generate_anch_obj.onclick = function(){ this.pwdwidget._showGeneatedPwd(); }

                this._showpwdchars = showpwdchars;

                this.show_anch_obj = document.getElementById(this.pwdshow_anch);

                this.show_anch_obj.pwdwidget = this;

                this.show_anch_obj.onclick = function(){ this.pwdwidget._showpwdchars();}

                this.pwdtxtfield_obj = document.getElementById(this.pwdtxtfieldid);

                this.pwdtxtfield_obj.pwdwidget=this;

                this.pwdtxtfield_obj.onkeyup=function(){ this.pwdwidget._onKeyUpPwdFields(); }


                this._updatePwdFieldValues = updatePwdFieldValues;

                this._onKeyUpPwdFields=onKeyUpPwdFields;

                if(!this.enableShowMask)
                { document.getElementById(this.pwdshowdiv).style.display='none';}

                if(!this.enableGenerate)
                { document.getElementById(this.pwdgendiv).style.display='none';}

                if(!this.enableShowStrength)
                { document.getElementById(this.pwdstrengthdiv).style.display='none';}

                if(!this.enableShowStrengthStr)
                { document.getElementById(this.pwdstrengthstr).style.display='none';}
        }

        function onKeyUpPwdFields()
        {
                this._updatePwdFieldValues(); 
                this._showPasswordStrength();
        }

        function updatePwdFieldValues()
        {
                if(1 == this.showing_pwd)
                {
                        this.pwdtxtfield_obj.value = this.pwdfieldobj.value;    
                }
                else
                {
                        this.pwdfieldobj.value = this.pwdtxtfield_obj.value;
                }
        }

        function showpwdchars()
        {
                var innerText='';
                var pwdfield = this.pwdfieldobj;
                var pwdtxt = this.pwdtxtfield_obj;
                var field;
                if(1 == this.showing_pwd)
                {
                        this.showing_pwd=0;
                        innerText = this.txtMask;

                        pwdtxt.value = pwdfield.value;
                        pwdfield.style.display='none';
                        pwdtxt.style.display='';
                        pwdtxt.focus();
                }
                else
                {
                        this.showing_pwd=1;
                        innerText = this.txtShow;   
                        pwdfield.value = pwdtxt.value;
                        pwdtxt.style.display='none';
                        pwdfield.style.display='';
                        pwdfield.focus();

                }
                this.show_anch_obj.innerHTML = innerText;

        }

        function passwordStrength()
        {
                var colors = new Array();
                colors[0] = "#cccccc";
                colors[1] = "#ff0000";
                colors[2] = "#ff5f5f";
                colors[3] = "#56e500";
                colors[4] = "#4dcd00";
                colors[5] = "#399800";

                var pwdfield = this.pwdfieldobj;
                var password = pwdfield.value

                var score   = 0;

                if (password.length > 6) {score++;}

                if ( ( password.match(/[a-z]/) ) && 
                     ( password.match(/[A-Z]/) ) ) {score++;}

                if (password.match(/\d+/)){ score++;}

                if ( password.match(/[^a-z\d]+/) )  {score++};

                if (password.length > 12){ score++;}

                var color=colors[score];
                var strengthdiv = this.pwdstrengthbar_obj;

                strengthdiv.style.background=colors[score];

                if (password.length <= 0)
                { 
                        strengthdiv.style.width=0; 
                }
                else
                {
                        strengthdiv.style.width=(score+1)*10+'px';
                }

                var desc='';
                if(password.length < 1){desc='';}
                else if(score<3){ desc = this.txtWeak; }
                else if(score<4){ desc = this.txtMedium; }
                else if(score>=4){ desc= this.txtGood; }

                var strengthstrdiv = this.pwdstrengthstr_obj;
                strengthstrdiv.innerHTML = desc;
        }

        function getRand(max) 
        {
                return (Math.floor(Math.random() * max));
        }

        function shuffleString(mystr)
        {
                var arrPwd=mystr.split('');

                for(i=0;i< mystr.length;i++)
                {
                        var r1= i;
                        var r2=getRand(mystr.length);

                        var tmp = arrPwd[r1];
                        arrPwd[r1] = arrPwd[r2];
                        arrPwd[r2] = tmp;
                }

                return arrPwd.join("");
        }

        function showGeneatedPwd()
        {
                var pwd = generatePWD();
                this.pwdfieldobj.value= pwd;
                this.pwdtxtfield_obj.value =pwd;

                this._showPasswordStrength();
        }

        function generatePWD()
        {
            var maxAlpha = 26;
                var strSymbols="~!@#$%^&*(){}?><`=-|][";
                var password='';
                for(i=0;i<3;i++)
                {
                        password += String.fromCharCode("a".charCodeAt(0) + getRand(maxAlpha));
                }
                for(i=0;i<3;i++)
                {
                        password += String.fromCharCode("A".charCodeAt(0) + getRand(maxAlpha));
                }
                for(i=0;i<3;i++)
                {
                        password += String.fromCharCode("0".charCodeAt(0) + getRand(10));
                }
                for(i=0;i<4;i++)
                {
                        password += strSymbols.charAt(getRand(strSymbols.length));
                }

                password = shuffleString(password);
                password = shuffleString(password);
                password = shuffleString(password);

                return password;
        }  
    </script>