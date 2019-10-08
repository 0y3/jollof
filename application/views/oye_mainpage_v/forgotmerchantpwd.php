

        <div id="WaitMe_pwd" class="modal-content" style="max-width: 400px;">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Forgot Password
                </span>

            </div>

            <div class="modal-body">
               
                    <form id="forgotpwd_form" method="POST" action="<?= base_url() ?>accounts/merchantforgotpassword"> 
                            
                        
                        <div class="col-md-12 errorclass alert alert-danger alert-dismissable get_errorpwd" style="display: none;">

                            <span class="error_msgr_lg"> </span>

                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <div class="col-md-">
                                    <input type="email" name="email" id="email" class="col-md-12 form-control" placeholder="example@example.com" autofocus="" required="required">
                                </div>
                            </div>
                    
                            <div class="col-md-12 form-group">
                                <button class="btn-block btn btn-danger" id="forgtpwd_submit" type="submit">Reset</button>
                            </div>
                        </div>

                    </form>
                    
                
            </div><!-- .modal-body --> 
            
        </div><!-- .modal-content --> 

   

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
</script>
<script> 
            
    $("#forgotpwd_form").submit(function (e){
        
        e.preventDefault();
        run_waitMe($('#WaitMe_pwd'), 1, 'orbit'); 
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
                        $('#WaitMe_pwd').waitMe('hide');
                        $('.errorclass').removeClass('alert-danger');
                        $('.errorclass').addClass('alert-success');
                         $(".get_errorpwd").show('fast').delay(5000).fadeOut('slow');
                        //$(".get_error").effect("shake");
                        $(".error_msgr_lg").text(data.content);
                        $("#forgotpwd_form")[0].reset();
                        
                        
                    }
                    else if(data.status === '0' )
                    {
                        //alert('error ' + data.status);
                        $('#WaitMe_pwd').waitMe('hide');
                        $('body').waitMe('hide');
                        $(".get_errorpwd").show('fast').delay(5000).fadeOut('slow');
                        //$(".get_error").effect("shake");
                        $(".error_msgr_lg").text(data.content);
                        //$("#modal_login").hide('hide');
                        //$('.modal-backdrop').remove();
                        //$('body').removeClass('modal-open');
                        $("#forgotpwd_form")[0].reset();
                        $("#l_email").focus();
                    } 
                    
                });

    });
</script>