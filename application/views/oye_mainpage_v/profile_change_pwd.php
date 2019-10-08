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
<!-- Modal -->
  <div class="modal-dialog" style="max-width: 420px;">

        <div class="modal-content">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    Change Password
                </span>

                <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body">
               
             
             <div class="">
              
                 <form class="form-horizontal" id="add_form" method="POST" action="<?= base_url() ?>profile/password_change" >
                     
                      <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                     
                   
               
                    <div class="form-group" >
                        <div class="">
                            <!--<label for="inputEmail3" class="col-sm-3 control-label">Business Phone:</label>-->
                            <div class="col-sm-12 ">
                                <input type="password" name="oldpwd" class="form-control boarderlines" id="oldpwd" placeholder="Enter Old Password" required="required">
                            </div>
          		 </div>
        	   </div>
               
                    <div class="form-group" >
                        <div class="">
                            <!--<label for="inputEmail3" class="col-sm-3 control-label">Enter Password:</label>-->
                            <div class="col-sm-12 ">
                                <input type="password" name="pwd" class="form-control boarderlines" id="pwd" placeholder="Enter Password" required="required">
                                <span id='message_c'></span>
                            </div>
          		 </div>
                    </div>
               
                    <div class="form-group" >
                        <div class="">
                            <!--<label for="inputEmail3" class="col-sm-3 control-label">Reenter Password:</label>-->
                            <div class="col-sm-12 ">
                                <input type="password" name="cfmpwd" class="form-control boarderlines" id="cfmpwd" placeholder="Re-enter Password" required="required">
                                <span id='message'></span>
                            </div>
                        </div>
                    </div>
               
                    
               
                    <div class="form-group" >
                        <div class="col-sm-12 ">
                            <button class="btn btn-lg btn-primary btn-block" id="saveit" type="submit">Save</button>

                        </div>
                    </div>
               
                </form><!-- end of form-horizontal -->
                  </div>
             
            
            </div><!-- .modal-body --> 
            
            
        </div><!-- .modal-content --> 
        
    </div><!-- .modal-dialog --> 
    

    <script type="text/javascript">
        
        

    </script>

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
          
        
            $("#add_form").submit(function (e){
                
                e.preventDefault();
                if(error_p == true || (error_c == true) )
                    {
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
                                            content: 'Success! Password Updated',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          
                                        $('#modal_pwd').modal('hide');

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
                                    $("#add_form")[0].reset();
                                    $("#oldpwd").focus();
                                } 

                            });
                }
            });
            
            
    </script>