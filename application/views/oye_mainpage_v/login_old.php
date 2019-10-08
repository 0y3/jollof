
<div class="modal-dialog" style="max-width: 390px; ">

        <div class="modal-content">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">Log In</span>

                <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body">
               
                    <form id="login_form" method="POST" action="<?= base_url() ?>accounts/login_validation"> 
                            
                        
                        <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                            <span class="error_msgr_lg"> </span>

                        </div>
                        
                        <ul>
                                    <li class="m_bottom_15">
                                            <label for="username" class="m_bottom_5 d_inline_b">Email</label><br>
                                            <input type="email" name="l_email" id="l_email" class="r_corners full_width inputform" placeholder="example@example.com" autofocus="" required="required">
                                    </li>
                                    <li class="m_bottom_25">
                                            <label for="password" class="m_bottom_5 d_inline_b">Password</label><br>
                                            <input type="password" name="l_pwd" class="r_corners full_width inputform" required="required">
                                    </li>
                                    <li class="m_bottom_15">
                                            <input type="checkbox" class="d_none inputform" id="checkbox_10"><label for="checkbox_10">Remember me</label>
                                    </li>
                                    <li class="clearfix m_bottom_30">
                                            <button class="button_type_4 tr_all_hover r_corners f_left bg_scheme_color color_light f_mxs_none m_mxs_bottom_15" id="login_submit" type="submit">Log In</button>
                                            <div class="f_right f_size_medium f_mxs_none">
                                                    <a href="<?= base_url() ?>accounts/forgotpwd" data-toggle="modal" data-container="modal_pwdforgot_container" data-target="#modal_pwdforgot_container" class="forgotpwd color_dark">Forgot your password?</a><br>
                                                    
                                            </div>
                                    </li>
                            </ul>
                    </form>
                    <!--
                    <ul class="clearfix d_inline_b horizontal_list social_icons">
                           
                        <li>Or Login With: &nbsp;</li>
                        
                        <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                        
                        <-li><a href="#" button="" class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></a></li> 
                        
                        <li><a href="#" button="" class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></a></li>
                        
                    </ul>
                    -->
                
            </div><!-- .modal-body --> 
            
            <footer class="bg_light_color_1 t_mxs_align_c text-center" style=" padding-top: 10px; padding-bottom: 10px; ">
                    <!-- <h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New User?</h3>-->
                    <a href="<?= base_url() ?>accounts/signup" role="button" data-toggle="modal" data-container="modal_signup_container" data-target="#modal_signup_container" data-dismiss="modal" class="tr_all_hover r_corners button_type_4 bg_dark_color bg_cs_hover color_light d_inline_middle m_mxs_left_0">Create an Account</a>
                    
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

<script>
$('.forgotpwd').on('click',function() {
    /* Prevent Default*/
    //e.preventDefault();
    $('#modal_login').modal('hide');
    
});    
</script>

<script>
    
            $('#modal_login').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
            
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
                                
                                    $('#modal_login').modal('hide');
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
                                $("#login_form")[0].reset();
                                $("#l_email").focus();
                            } 
                            
                        });

            });
</script>