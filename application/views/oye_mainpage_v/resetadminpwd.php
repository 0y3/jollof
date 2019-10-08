<style>
    .boarderlines {
        border-left: none;
        border-right: none;
        border-top: none;
        border-bottom: solid 2px #9E9E9E;
        box-shadow: none;
        -webkit-border-radius: 0 !important;
        -moz-border-radius: 0 !important;
        border-radius: 0 !important;
    }
    
</style>
<div class="container">
    
    <div class="col-xs-12 col-md-6 offset-md-3 ">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
    <form class="form-horizontal" id="resetpwd_form" name="resetpwdForm" method="POST" action="<?= site_url('accounts/adminpassword')?>" > 
    
           <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                     
                   
               
                    <div class="form-group" >
                        <div class="">
                            <!--<label for="inputEmail3" class="col-sm-3 control-label">Enter Password:</label>-->
                            <div class="col-sm-12 ">
                                <input type="password" name="pwd" class="form-control boarderlines" id="pwd" placeholder="Enter New Password" required="required">
                                <span id='message_c'></span>
                            </div>
          		 </div>
                    </div>
               
                    <div class="form-group" >
                        <div class="">
                            <!--<label for="inputEmail3" class="col-sm-3 control-label">Reenter Password:</label>-->
                            <div class="col-sm-12 ">
                                <input type="password" name="password" class="form-control boarderlines" id="cfmpwd" placeholder="Re-enter New Password" required="required">
                                <input type="hidden" name="id" value="<?=$id?>" >
                                <span id='message'></span>
                            </div>
                        </div>
                    </div>
               
                    
               
                    <div class="form-group" >
                        <input type="hidden" name="token" value="<?=$token?>" >
                        <div class="col-sm-12 ">
                            <button class="btn btn-lg btn-primary btn-block" id="saveit" type="submit">Save</button>

                        </div>
                    </div>
               
           
    </form><!-- end of form-horizontal -->

         
         
    </div>
    
</div>


<script type="text/javascript">

    var error_p = true;
        var error_c = true;
        
        $('#pwd').on('blur', function(){
            if(this.value.length < 6){ // checks the password value length
               $('#message_c').html('You have entered less than 6 characters for password').css('color', 'red');
               $(this).focus(); // focuses the current field.
               error_c = true; // stops the execution.
            }
            else{ 
                $('#message_c').html('');
                error_c = false;
            }
        });
        
        
        $('#cfmpwd').on('keyup', function () {
            
            if ($('#pwd').val() != $('#cfmpwd').val()) 
                {
                    
                    $('#message').html('Not Matching').css('color', 'red');
                    error_p =true;
                    $('#saveit').attr({disabled:true});
                } 
            else 
                {
                  
                  $('#message').html('');
                  error_p = false;
                  $('#saveit').attr({disabled:false});
                }
          });
          
        
            $("#resetpwd_form").submit(function (e){
                
                e.preventDefault();
                if(error_p == true || (error_c == true) )
                    {
                        alert('Pls Fill in the empty fields');
                    }
                else 
                { 
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
                                            content: 'Password Reset Successful......',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          $("#resetpwd_form")[0].reset();
                                          setTimeout(function(){
                                            window.location.href = '<?= site_url('jollofadmin') ?>';
                                         }, 3000);

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
                                    $("#resetpwd_form")[0].reset();
                                    $("#pwd").focus();
                                } 

                            });
                }
            });    

</script>
               

    

    

