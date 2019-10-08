
<link href="<?= base_url() ?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/rest/david_main.css">
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
    body {
    font-size: inherit;
    background-color: inherit;
    }
    a{
        color: #e74c3c;
    }
    .emailtext,.savebtn { display: none;}
    
    
    
    .db_prdimg {
        width: 70px;
        height: 50px;
    }
    .O_Uplode {
        position: relative;
    }
    .UplodeIcon {
        position: absolute;
        top: 8px;
        left: 20px;
        font-size: 20px;
    }
    .form-style-base {
        position: absolute;
        top: 0px;
        z-index: 999;
        opacity: 0;
        cursor: pointer;
    }
    .form-style-fake {
        top: 0px;
        padding-left: 50px;
    }
    .Prd_UploadView {
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        display:none;
        position:relative;
    }
    .Prd_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .logo_UploadView{
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        position:relative;
    }
    .logo_UploadView img{
        max-width: 100px;
        max-height: 90px;
    }
    .banner_UploadView{
        border: 2px dashed #eaedf1;
        background-color: #eee;
        padding: 10px;
        display: none;
        position:relative;
        overflow-x:  auto;
    }
    .banner_UploadView img{
        max-width: 100%;
        max-height:500px;
    }
    .promo_main img{
        min-width: 1450px;
        max-width: 100%;
        max-height:500px;
    }
    .promo_cuisine_main img{
        min-width: 1450px;
        max-width: 100%;
        height:500px;
    }
    .promo_cuisine_rest img{
        width: 265px;
        height: 430px;
    }
    
    .cropped>img
    {
        margin-right: 10px;
    }
    .promomaincover{
        min-width: 1550px;
        max-width: 100%;
        height:600px !important;
    }
    .promomain{
        width: 1452px !important;
        max-width: 100% !important;
        height:502px !important;
        top: 4% !important;
        left: 3.3% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    .promocuisinemain{
        min-width: 1550px;
        max-width: 100%;
        height:600px !important;
    }
    .promocuisinerestcover{
        min-width: 450px;
        height: 550px !important;
    }
    .promocuisinerest{
        width: 267px !important;
        max-width: 100% !important;
        height:432px !important;
        top: 10.65% !important;
        left: 20% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    .Gp_rmv {
	position:absolute;
	top:0px;
	left:105px;
	color:#F30;
	cursor:pointer;
    }
    .Gp_rmv_banner{
	position:absolute;
	top:0px;
	left:10px;
	color:#F30;
	cursor:pointer;
    }
    

</style>
<div class="container" >
    <p>&nbsp;</p>

<form id="promo_data" action="<?= site_url('super_admin/save_promo_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">
    <div class="col-sm-6 col-md-6">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-map-markerr"></i> <strong>New Promo</strong> Data</h2>

            </div>

            <div class=" form-horizontal form-bordered" >

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>
                
                
                <div class="form-group">

                    <label class="col-md-4 control-label" >Promo Type </label>
                    <div class="col-md-8 nopadding">
                        <div class="col-xs-11">
                            <select id="promo_type" name="promotype" class="form-control" style="width: 250px;" required="">
                                <!--<option>Choose Promo Type..</option>
                                <option value="2">Main Jollof</option>
                                <option value="3">Microsite Main Page(Cuisine Jollof)</option>
                                <option value="4">Microsite Restaurant Page(Cuisine Jollof)</option>-->
                                <?php if(!empty($cate)): ?>
                                    <option value="">Choose Promo Type..</option>

                                        <?php foreach ($cate as $cate_list) :?>
                                    <option value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>

                                        <?php endforeach;?>
                                    <?php else: ?>

                                        <option > Promo Type not available</option>

                                <?php endif; ?>
                            </select> 
                        </div>
                        <div class="col-xs-1 nopadding"> <span style="color: #e74c3c;"><b>*</b></span></div>
                        <div style=" margin-top: 10px;"></div>
                        <br>
                        <div class="section-label " style=" padding-bottom: 0;"> 

                            <a class="section-label-a"> 
                                <span class="spansize"> 
                                    Promo Options
                                </span> 
                                <b></b> 
                            </a>
                        </div>
                        <div class="col-md-12 nopadding" style=" padding-bottom: 10px; border-bottom: 1px dashed #eaedf1;">
                            <div class="col-xs-9 ">
                                <b>Social Media</b>
                                <br>
                                <input type="checkbox" name="socialmediapromo" value=""> 
                            </div>
                            <div class="col-xs-3 nopadding">
                                <b>Price</b>
                                <br> ₦<?= number_format($admin_info->socialpromoprice,2);?>
                            </div>
                        </div>
                        
                        <div class="col-md-12 nopadding" style=" padding-bottom: 10px; padding-top: 5px;">
                            <div class="col-xs-9">
                                <b>Email</b>
                                <br>
                                <input class="emailcheckbox" type="checkbox" name="emailpromo" value=""> 
                            </div>
                            <div class="col-xs-3 nopadding">
                                <b>Price</b>
                                <br> ₦<?= number_format($admin_info->emailpromoprice,2);?>
                            </div>
                            <div class="col-md-12 emailtext">

                                <textarea id="emailtext_description" name="emailpromo_text" class="form-control address_loc" rows="2" placeholder="Enter Text for Email promo option " required=""></textarea>
                                <!--<span id="txt-length-left">Characters Left:120</span>-->

                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label" >Duration</label>

                    <div class="col-md-8" id="duration_div">
                    
                        <div class="col-xs-11 nopadding">
                            <select id="duration_select" name="duration" class="form-control" data-placeholder="" value="" style="width: 250px;" required="">
                                <option value="">Select Promo Type First</option>   
                            </select>
                            <span class="text-dangerr" id="duration_price"><b>Price for <span class="dur_type"></span>: </b><span class="dur_price"></span> </span>
                        </div>
                        <div class="col-xs-1 nopadding"> <span style="color: #e74c3c;"><b>*</b></span></div>
                        
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label" >Date To Start</label>
                    
                    <div class="col-md-8 nopadding">
                        
                        <div class="col-xs-11 ">

                           <input class="form-control c_date" type="text" name="promo_date" id="datepromo" value="" required="">

                        </div>
                        <div class="col-xs-1 nopadding"><span style="color: #e74c3c;"><b>*</b></span></div>
                    </div>

                </div>
                
            </div>

        </div>

    </div>
    
    <div class="col-sm-6 col-md-6">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-map-markerr"></i> <strong> Personal</strong> Info</h2>

            </div>

            <div class="form-horizontal form-bordered">
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="cell1">Name</label>

                    <div class="col-md-9">

                        <input type="text" id="" name="promousername" class="form-control" value=""  required="">

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="promouseremail">Email</label>

                    <div class="col-md-9">

                        <input type="email" id="product-name" name="promouseremail" class="form-control" value=""  required="">

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="cell2">Mobile</label>

                    <div class="col-md-9">

                        <input type="text" id="last_name" name="cell" class="form-control cu_phone_js" value="" >
                    </div>

                </div>
               
            </div>

        </div>

    </div>
    
    <div class="col-sm-12">
        
        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-picture-o"></i> <strong>Promo</strong>Image</h2>

            </div>
            
           
                <div class="block-section form-horizontal form-bordered">

                    <div class="form-group">

                        <label class="col-md-2 control-label" for="save_name">Promo Url</label>

                        <div class="col-md-10">

                            <input type="url" id="save_url"  name="promourl" class="form-control" placeholder="https://" value=""  >

                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label class="col-md-12 control-label " style=" text-align: left;"> Promo Image Size &nbsp; <span class="banner_txt"></span> Min Size: 2MB</label>
                           
                        <div class="col-md-12 nopadding">
                           
                            <div class="O_Uplode action">
                               <input type="file" name="promo_image" accept="image/*" id="file" class="form-control form-input form-style-base">
                               <!--<input type="file" name="promo_image" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base">
                               --><input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                               <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                            </div>
                           
                            <div class="banner_UploadView stepshide">
                                <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                                <div class="imageBox ">
                                    <div class="thumbBox "></div>
                                    <div class="spinnerr" style="display: none">Loading...</div>
                                </div>
                                
                                
                            </div>
                            <div class="banner_UploadView" style=" display: none">
                                <div class="action cropbtn stepshide">
                                    <p><b>Step 3:</b>Click Crop to preview the cropped region<p>
                                    <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Crop" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away style="float: leftt">
                                </div>
                                <div class="cropped" style=" position: relative;">

                                </div>
                               
                            </div>
                           <!--
                           <div class="O_Uplode">
                               <input type="file" name="promo_image" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base">
                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/*">
                               <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                           </div>

                           <div class="banner_UploadView">
                               
                               
                               <img class="UploadView_banner" src="" width="100%" height="100%"/>
                               <span class="Gp_rmv_banner" onclick="RemoveUpload_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>

                           </div>
                           -->
                       </div>

                    </div>



                    <div class="form-group form-actions">

                       <div class="col-md-6 col-md-offset-4 div_reset">

                           <button type="submit" class="savebtn btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>

                       </div>

                    </div>

                </div>
        </div>
        
    </div>
    
</form>
    
</div>


<script src="<?= base_url() ?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.datepair.min.js"></script>


<script type="text/javascript">
    $(window).load(function() {
        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            //imgSrc: 'avatar.png'
        }
        var cropper = $('.imageBox').cropbox(options);
        $('#file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        });
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL();
            $('.stepshide').hide();
            $('#Viewcrop_banner').remove();
            $('#Gp_rmv_banner').remove();
            $('.cropped').append('<input type="hidden" name="cropimg" value="'+img+'"/>');
            $('.cropped').append('<img id="Viewcrop_banner" class="Viewcrop_banner" src="'+img+'">');
            $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner" onclick="Removecrop_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>');
            $('.savebtn').show();
        });
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        });
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        });
    
        $("#promo_data").submit(function (e){
                
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
                                            content: 'Promo Form Sent Successful......',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          $("#promo_data")[0].reset();
                                          /*setTimeout(function(){
                                            window.location.href = '<?= site_url('') ?>';
                                         }, 3000);
                                         */

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
                                    $("#promo_data")[0].reset();
                                    $("#pwd").focus();
                                } 

                            });
            });    
    
    
    });
    
    function Removecrop_banner() {
        
        $('.Viewcrop_banner').attr('src', '');
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('#fake-input_banner').val('Step 1: Choose your Image');
        $('.banner_UploadView').hide();
        $('.savebtn').hide();
    }
    $('input[id=file]').change(function() {
        $('.banner_UploadView').show();
        $('.stepshide').show();
        //$('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });
</script>
<script type="text/javascript">

$(document).ready(function(){
    
    
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    
     $('#datepromo').datepicker({
      beforeShowDay: function(e) {
        return e.valueOf() <= now.valueOf() ? 'disabled' : '';
    },
        'format': 'yyyy-mm-dd',
        'autoclose': true
        
    });
    
    
    
    $('#state_div').on('change',function(){
            
            var stateID = $(this).val();
            
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('accounts/get_city_byid') ?>',
                    data:'stateid='+stateID,
                    success:function(html){
                        $('#city_div').html(html);
                    }
                }); 
            }else{
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });
    // on Promo Type option click, change Promo image properties
            $('#promo_type').on('change', function() {
            
                $(".dur_type").text(null);
                $(".dur_price").text(null);
            
                var promotypeID = $(this).val();
            
                if(promotypeID){
                    $.ajax({
                        type:'POST',
                        url:'<?= site_url('super_admin/get_promoduration_byid') ?>',
                        data:'bannertypeid='+promotypeID,
                        success:function(html){
                            $('#duration_select').html(html);
                        }
                    }); 
                }else{
                    $('#duration_select').html('<option value="">Select Promo Type First</option>'); 
                }
                
                //alert($(this).find(':selected').data("promowidth"));
                if ( ($(this).find(':selected').data("promowidth") == 1450) && ($(this).find(':selected').data("promoheight")== 500) )
                {
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover').addClass('promomaincover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest').addClass('promomain');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 1450px by 500px }');
                
                }
                
                else if ( ($(this).find(':selected').data("promowidth") == 265) &&($(this).find(':selected').data("promoheight")== 430) )
                {
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover').addClass('promocuisinerestcover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest').addClass('promocuisinerest');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 265px by 430px }');
                
                }
                else
                {
                  $(".banner_UploadView").removeClass('promo_main promo_cuisine_main promo_cuisine_rest');
                  //$(".modal-dialog").removeClass('modal_dialog_edit');
                  $(".banner_txt").text('');
                
                }
                
            });
            
            $('#duration_select').on('change', function() {
            
                $(".dur_type").text(null);
                $(".dur_price").text(null);
                
                var price= $(this).find(':selected').data("durationprice");
                $(".dur_type").text(this.value);
                $(".dur_price").text(price);
            
            });

});
   var reader; 
    function GetUpload_banner(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView_banner')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload_banner() {
        
        $('.UploadView_banner').attr('src', '');
        $('#fake-input_banner').val('Choose your Image');
        $('.banner_UploadView').hide();
    }
    
    $('input[id=base-input_banner]').change(function() {
        $('.banner_UploadView').show();
        $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    
    
    
</script>  

<script type="text/javascript">
    
    var maxLen = 120;
    $('#emailtext_description').keypress(function(event) {
        
        var Length = $("#emailtext_description").val().length;
        var AmountLeft = maxLen - Length;
        $('#txt-length-left').html('Characters Left:'+AmountLeft);
        if (Length == maxLen) {
            if (event.which != 48) {
                return false;
            }
            
        }
    });
    
    $('.emailcheckbox').on('change', function(e) {
        //if ( $('input[name="emailpromo"]:checked')) {
        if ($(this).is(':checked')){
            $('.emailtext').slideDown();
            $('.emailtext').attr("required", true);
        } else {
            $('.emailtext').slideUp();
            $('.emailtext').attr("required", false);
            $('#emailtext_description').val("");
        }
    });


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
                        alert('cool');
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
               

    

    

