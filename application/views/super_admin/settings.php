
<style>
    .nopad {
        padding-left: 0;
        padding-right: 0;
    }
    
  .time_div input {
    background-color: inherit;
    border-top: none !important;
    border-right: none !important;
    border-left: none !important;
    border-bottom: 1px dotted #2d344f !important;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    -moz-box-shadow: none !important;
    box-shadow: none !important;
    -webkit-transition: none !important;
    -moz-transition: none !important;
    height: 25px;
}
</style>
<div class="row">

    <!--B2B contact form Data -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil-square-o"></i> <strong>B2B Support</strong>  Contact</h2>

            </div>

            <form action="<?= site_url('super_admin/b2bsupport') ?>" method="post" class="admin_form form-horizontal form-bordered" >
                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Admin B2B Email</label>

                    <div class="col-md-8">

                        <input type="email" id="oldpwd" name="b2bemail" class="form-control" placeholder="Enter your email" value=" <?= $super_data->b2bemail?> "  required="">
                        
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Admin B2B Phone</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell" name="b2bphone" class="form-control cu_phone_js" value=" <?= $super_data->b2bphone?> " required="">
                        <span id='message_c'></span>
                        
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Admin B2B Cell</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell2" name="b2bphone2" class="form-control cu_phone_js" value=" <?= $super_data->b2bphone2?> " >
                        <span id='message'></span>
                        
                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
    
    <!--B2C contact form Data -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil-square-o"></i> <strong>B2C Support</strong>  Contact</h2>

            </div>

            <form action="<?= site_url('super_admin/b2csupport') ?>" method="post" class="admin_form form-horizontal form-bordered" >
                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Admin B2C Email</label>

                    <div class="col-md-8">

                        <input type="email" id="oldpwd" name="b2bemail" class="form-control" placeholder="Enter your email" value=" <?= $super_data->b2cemail?> "  required="">
                        
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Admin B2C Phone</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell" name="b2bphone" class="form-control cu_phone_js"  value=" <?= $super_data->b2cphone?> ">
                        <span id='message_c'></span>
                        
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Admin B2C Cell</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell2" name="b2bphone2" class="form-control cu_phone_js" value=" <?= $super_data->b2cphone2?> " >
                        <span id='message'></span>
                        
                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
    
        
    
    
    <!--Banner Slides Status -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil-square-o"></i> <strong>Banner Slides</strong>  Interval Seconds</h2>

            </div>
            
            <form  action="<?= site_url('super_admin/bann_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >
            
            <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                <span class="error_msgr_lg"> </span>

            </div>

            <div class="form-group row">

                <div class="col-md-6">

                    <input type="number" data-cat_id="" name="ban_slide" class="form-control cu_phone_js " min="0" value="<?=$super_data->homebannertimer?>">
                    
                </div>

                <div class="col-md-4"> 

                    <button class="btn btn-default" value="" type="submit">Save</button>

                </div>

            </div>
            
            </form>
            
        </div>
        
    </div>
    
    <!--AD's Slides Status -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil-square-o"></i> <strong>Place Your AD's</strong>  Interval Seconds</h2>

            </div>
            
            <form action="<?= site_url('super_admin/ad_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

            <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                <span class="error_msgr_lg"> </span>

            </div>

            <div class="form-group row">

                <div class="col-md-6">

                    <input type="number" data-cat_id="" name="ad_slide" class="form-control cu_phone_js " min="0" value="<?=$super_data->placeadtimer?>">
                    
                </div>

                <div class="col-md-4"> 

                    <button class="btn btn-default" value="" type="submit">Save</button>

                </div>

            </div>
                
            </form>
            
        </div>
        
    </div>
    
    
    
    <div class="col-sm-12 nopad">
        
        
        <!-- fb social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="block">

                <div class="block-title">

                    <h2><i class="fa fa-facebook-f"></i> <strong> Facebook</strong>  Account</h2>

                </div>

                <form  action="<?= site_url('super_admin/fb_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                 <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Facebook link</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell2" name="fb_link" class="form-control " placeholder="Link most start with https:// " value=" <?= $super_data->facebookpage?> " >

                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

                </form>

            </div>

        </div>
        
        
        <!-- twitter social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="block">

                <div class="block-title">

                    <h2><i class="fa fa-twitter-square"></i> <strong>Twitter</strong>  Account</h2>

                </div>

                <form  action="<?= site_url('super_admin/tw_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                 <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Twitter link</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell2" name="tw_link" class="form-control " placeholder="Link most start with https:// " value=" <?= $super_data->twitterpage?> " >

                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

                </form>

            </div>

        </div>
        
        
        <!-- inster social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="block">

                <div class="block-title">

                    <h2><i class="fa fa-instagram"></i> <strong>instagram</strong>  Account</h2>

                </div>

                <form action="<?= site_url('super_admin/in_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                 <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Instagram link</label>

                    <div class="col-md-8">

                        <input type="text" id="b2bcell2" name="in_link" class="form-control " value=" <?= $super_data->insterpage?> " >

                    </div>

                </div>

                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

                </form>

            </div>

        </div>
        
        
        
    </div>
   

    <!--
     <div class="col-sm-6 col-md-4">
        
        <div class="panel panel-default col-h">
            <div class="panel-heading">Contacts footer</div>
            <div class="panel-body">
                <form method="POST" action="">
                    <div class="form-group" style="position: relative;">
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactAddr" value="">
                        <i class="fa fa-map-marker" style="position: absolute;top:10px;left:10px;"></i>
                    </div>
                    <div class="form-group" style="position: relative;">
                        <i class="fa fa-phone" style="position: absolute;top:10px;left:10px;"></i>
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactPhone" value="">
                    </div>
                    <div class="form-group" style="position: relative;">
                        <i class="fa fa-envelope" style="position: absolute;top:10px;left:10px;"></i>
                        <input type="text" style="padding-left:25px;" class="form-control" name="footerContactEmail" value="support@shop.dev">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-default" name="footerContacts" value="Update">
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    -->
    
    

</div>



<script type="text/javascript">
		
   
    $(".admin_form").submit(function (e){
                
                e.preventDefault();
                
                var getid = $(this).attr('id');
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data,
                   success: function(data){
                     
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
                                            content: 'Success! Status Updated',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                            }
                            else if(data.status === '0' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-success').addClass('alert-danger');
                                $('#'+getid).find(".get_error").show("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find(".admin_form")[0].reset();
                            } 
                     
                    }
                   
                });
                 
        });
	
</script>

<script >
    //$('.c_tray').addClass('active');
    $('.nav_g').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
    
</script>



    <script type="text/javascript">

        
            $(".pwd_form").submit(function (e){
                
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
                                            content: 'Success! Status Updated',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          $(".pwd_form")[0].reset();
                                          

                                }
                                else if(data.status === '0' )
                                {
                                    //alert('error ' + data.status); 
                                    $('#'+getid).find(".get_error").show("fast");
                                    $('#'+getid).find(".get_error").effect("shake");
                                    $('#'+getid).find(".error_msgr_lg").text(data.content);
                                    $('#'+getid).find("#oldpwd").focus();
                                    $(".pwd_form")[0].reset();
                                } 

                            });
                
            });
            
            
    </script>