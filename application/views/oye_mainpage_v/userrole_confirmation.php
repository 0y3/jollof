<style>
    .bodydiv{
        color: #222;
        font-size: 13px;
        font-family: sans-serif;
        background: #fff url(../../assets/img/404bg.png) left top repeat-x;
    }
    h1 {
        font-size:300%;
        font-family:'Trebuchet MS', 
            Verdana, sans-serif;
        color:#000
    }
    #page {
        font-size:122%;
        padding-top:80px ;
        text-align:center;
        line-height:1.2;
    }
    #message {
        padding-right:400px;
        min-height:360px;
        /*background:transparent url(../assets/img/jollof_logo2.png) left top no-repeat;*/
    }
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
    h2 {
    font-size: 1.71em;
    line-height: 1em;
}
</style>
<div class="container-fluid bodydiv">
    
    <div id="page">
        
        <div id="messagee">
            <!--<h1 style="color:#0fad00">Account Confirmed</h1>-->
            <p><?=$error_msg?></p>
        </div>
    </div>

    
</div>


<script>
    /*
    $(document).ready(function(){
      setTimeout(function() {
       window.location.href = '<?= site_url('') ?>';
      }, 5000);
    });
    */
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
            $('#cfmpwd').val(null);
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
                                            window.location.href = '<?= site_url('') ?>';
                                         }, 3000);

                                }
                                else if(data.status === '0' )
                                {
                                    //alert('error ' + data.status); 
                                    $(".get_error").show('fast');
                                    $(".get_error").effect("shake");
                                    $(".get_error").delay(500).fadeOut('fast');
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
