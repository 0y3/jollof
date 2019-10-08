

        <div id="WaitMe_pwd" class="modal-content" style="max-width: 400px;">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Coupon
                </span>

            </div>

            <div class="modal-body">
               
                    <form id="couponformcheck" method="POST" action="<?= base_url() ?>accounts/couponcodecheck"> 
                            
                        <div class="row">
                            <div class="col-md-12 errorclass alert alert-danger alert-dismissable get_errorpwd" style="display: none;">

                                <span class="error_msgr_lg">colll </span>

                            </div>
                        
                        
                        
                            <div class="col-md-12 form-group">
                                <label for="email">Coupon Code</label>
                                <div class="col-md-">
                                    <input type="text" name="code" id="l_code" class="col-md-12 form-control" placeholder="Enter a Coupon Code" autofocus="" required="required">
                                </div>
                            </div>
                    
                            <div class="col-md-12 form-group">
                                <button class="btn-block btn btn-danger" id="forgtpwd_submit" type="submit">Ckeck</button>
                            </div>
                        </div>

                    </form>
                    
                
            </div><!-- .modal-body --> 
            
        </div><!-- .modal-content --> 

   



<script> 
            
    $("#couponformcheck").submit(function (e){
        
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
                        $("#couponformcheck")[0].reset();
                        
                        setInterval(function(){ 
                                location.reload(); // then reload the page.
                            }, 1000);
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
                        $("#couponformcheck")[0].reset();
                        $("#l_code").focus();
                    } 
                    
                });

    });
</script>