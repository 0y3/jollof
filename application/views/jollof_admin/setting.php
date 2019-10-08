
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

        <div class="card">

            <div class="card-body">
                <div class="card-title">

                    <h4 class="modal-title text-left">B2B Support Contact</h4>

                </div>

                <form action="<?= site_url('super_admin/b2bsupport') ?>" method="post" class="admin_form form-horizontal form-bordered" >
                    
                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                    
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    
                    <div class="form-group">

                        <label class=" control-label nopad">Admin B2B Email</label>

                        <div class="">

                            <input type="email" id="oldpwd" name="b2bemail" class="form-control" placeholder="Enter your email" value=" <?= $admininfo->b2bemail?> "  required="">
                            
                        </div>

                    </div>


                    <div class="form-group">

                        <label class=" control-label nopad">Admin B2B Phone</label>

                        <div class="">

                            <input type="text" id="b2bcell" name="b2bphone" class="form-control cu_phone_js" value=" <?= $admininfo->b2bphone?> " required="">
                            <span id='message_c'></span>
                            
                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label class=" control-label nopad" >Admin B2B Cell</label>

                        <div class="">

                            <input type="text" id="b2bcell2" name="b2bphone2" class="form-control cu_phone_js" value=" <?= $admininfo->b2bphone2?> " >
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

    </div>
    
    <!--B2C contact form Data -->
    <div class="col-sm-6 col-md-4">

        <div class="card">

            <div class="card-body">
                <div class="card-title">

                    <h4> <strong>B2C Support</strong>  Contact</h4>

                </div>

                <form action="<?= site_url('super_admin/b2csupport') ?>" method="post" class="admin_form form-horizontal form-bordered" >
                    
                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                    
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    
                    <div class="form-group">

                        <label class=" control-label nopad">Admin B2C Email</label>

                        <div class="">

                            <input type="email" id="oldpwd" name="b2bemail" class="form-control" placeholder="Enter your email" value=" <?= $admininfo->b2cemail?> "  required="">
                            
                        </div>

                    </div>


                    <div class="form-group">

                        <label class=" control-label nopad">Admin B2C Phone</label>

                        <div class="">

                            <input type="text" id="b2bcell" name="b2bphone" class="form-control cu_phone_js"  value=" <?= $admininfo->b2cphone?> ">
                            <span id='message_c'></span>
                            
                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label class=" control-label nopad" >Admin B2C Cell</label>

                        <div class="">

                            <input type="text" id="b2bcell2" name="b2bphone2" class="form-control cu_phone_js" value=" <?= $admininfo->b2cphone2?> " >
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
    </div>
    
        
    
    
    <!--Banner Slides Status -->
    <div class="col-sm-6 col-md-4">

        <div class="card">

            <div class="card-body">

                <div class="card-title">

                    <h4>Banner Slides Interval Seconds</h4>

                </div>
                
                <form  action="<?= site_url('super_admin/bann_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >
                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                <div class="form-group row">

                    <div class="col-md-6">

                        <input type="number" data-cat_id="" name="ban_slide" class="form-control cu_phone_js " min="0" value="<?=$admininfo->homebannertimer?>">
                        
                    </div>

                    <div class="col-md-4"> 

                        <button class="btn btn-default" value="" type="submit">Save</button>

                    </div>

                </div>
                
                </form>
                
            </div>
        
        </div>
    </div>
    
    <!--AD's Slides Status -->
    <div class="col-sm-6 col-md-4">

        <div class="card">

            <div class="card-body">

                <div class="card-title">

                    <h4>Place Your AD's Interval Seconds</h4>

                </div>
                
                <form action="<?= site_url('super_admin/ad_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

                <div class="form-group row">

                    <div class="col-md-6">

                        <input type="number" data-cat_id="" name="ad_slide" class="form-control cu_phone_js " min="0" value="<?=$admininfo->placeadtimer?>">
                        
                    </div>

                    <div class="col-md-4"> 

                        <button class="btn btn-default" value="" type="submit">Save</button>

                    </div>

                </div>
                    
                </form>

            </div>
            
        </div>
        
    </div>
    
        
        <!-- fb social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="card">

                <div class="card-body">

                    <div class="card-title">

                        <h4>Facebook Account</h4>

                    </div>

                    <form  action="<?= site_url('super_admin/fb_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>

                     <div class="form-group">

                        <label class=" control-label nopad" >Facebook link</label>

                        <div class="">

                            <input type="url" id="b2bcell2" name="fb_link" class="form-control " placeholder="Link most start with https:// " value=" <?= $admininfo->facebookpage?> " >

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
        
        
        <!-- twitter social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="card">

                <div class="card-body">

                    <div class="card-title">

                        <h4><i class="fa fa-twitter-square"></i>Twitter  Account</h4>

                    </div>

                    <form  action="<?= site_url('super_admin/tw_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>

                     <div class="form-group">

                        <label class=" control-label nopad" >Twitter link</label>

                        <div class="">

                            <input type="url" id="b2bcell2" name="tw_link" class="form-control " placeholder="Link most start with https:// " value=" <?= $admininfo->twitterpage?> " >

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
        
        
        <!-- inster social media Status -->
        <div class="col-sm-6 col-md-4">
            
            <div class="card">

                <div class="card-body">

                    <div class="card-title">

                        <h4><i class="fa fa-instagram"></i> instagram Account</h4>

                    </div>

                    <form action="<?= site_url('super_admin/in_support') ?>" method="post" class="admin_form form-horizontal form-bordered" >

                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>

                     <div class="form-group">

                        <label class=" control-label nopad" >Instagram link</label>

                        <div class="">

                            <input type="url" id="b2bcell2" name="in_link" class="form-control " value=" <?= $admininfo->insterpage?> " >

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
                                
                            }
                            else if(data.status === '0' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-success').addClass('alert-danger');
                                $('#'+getid).find(".get_error").show("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find(".admin_form")[0].reset();

                            } 
                            window.location.reload(); 
                     
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
                                window.location.reload(); 

                            });
                
            });
            
            
    </script>