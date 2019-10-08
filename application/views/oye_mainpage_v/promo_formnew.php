
<link href="<?= base_url() ?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/rest/david_main.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_v2/dist/css/promos.css">
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
    
    @media only screen and (max-width: 989px){
    .datepicker {
        background-color: #fff !important;
        left: unset !important;
        z-index: 15000 !important;
    }
    .res_contdiv{
        padding: unset !important;
    }
}

</style>
<div class="container" >
    <p>&nbsp;</p>
 <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                    <span class="error_msgr_lg"> </span>

                </div>

   <div class=" col-md-12">
            <h5 class="modal-title text-left"> New Promo Data </h5>
            <hr>


               
                <!--<form id="promo_data" action="<?= site_url('cuisineadmin/promos/') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">-->
                <form id="promo_data22" action="<?= site_url('super_admin/save_promo_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Promo Type</label>
                                <select id="promo_type" name="promotype" class="form-control " required="">
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Duration</label>
                                <select id="duration_select" name="promo_duration" class="form-control" data-placeholder="" value=""  required="">
                                    <option value="">Select Promo Type First</option>   
                                </select>
                                <span class="help-block">
                                    <small id="duration_price">
                                        <b>Price <span class="dur_typee text-success" style="font-weight:600;"></span> : </b><span class="dur_price text-success" style="font-weight: bold;"></span>
                                    </small>
                                </span>
                                <!--<span class="text-dangerr" id="duration_price"><b>Price for <span class="dur_type"></span>: </b><span class="dur_price"></span> </span>-->
                            </div>
                        </div>

                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date To Start </label>
                                <input class="form-control c_date startdate" type="text" name="promo_date" id="datepromo" value="" required="">
                                <small ><b>End Date</b> </small>
                                <input name="" type="text" value="" class="form-control enddate" required="" readonly="" disabled="">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <label class="control-label">Extral Promo</label>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Social Media </label>
                                        <span class="help-block">
                                            <small>&nbsp; Price : </small><b class="text-success">₦<?= number_format($admin_info->socialpromoprice,2);?></b>
                                        </span>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input emailcheckbox" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Email </label>
                                        <span class="help-block">
                                            <small>&nbsp; Price : </small><b class="text-success">₦<?= number_format($admin_info->emailpromoprice,2);?></b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="emailtext_description" name="emailpromo_text" class="form-control address_loc emailtext" rows="2" placeholder="Enter Text for Email promo option "></textarea>
                                </div>
                                </div>
                        </div>

                        <!--/span-->
                    </div>
                    
                    <h5 class="card-title m-t-40"> Personal Info</h5>
                    <hr>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Name</label>
                                <input name="promo_name" type="text" id="name" class="form-control " placeholder="" value="" required="" >
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Email</label>
                                <input name="promo_email" type="email" id="email" class="form-control form-control-danger" value="" placeholder="" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Mobile</label>
                                <input name="promo_phone" type="text" id="email" class="form-control form-control-danger cu_phone_js" value="" placeholder="" required="">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">phone</label>
                                <input name="promo_phone" type="text" id="phone" class="form-control" value="<?= $_SESSION['email']?>" placeholder="+(____) (___) (____) (___)" required="" readonly="">
                            </div>
                        </div>
                    </div>
                    -->
                    
                    <!--<h5 class="card-title m-t-40"> Promo Image</h5>-->
                    <hr>
                     
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Promo Url</label>
                                <input name="promo_url" type="url" value="<?php if(isset($promoinfo)) echo $promoinfo->imageurl ?>"  class="form-control" placeholder="https://" >
                            </div>
                        </div>
                        <!--/span-->
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5 class="card-title m-t-">Upload Promo Image</h5>
                                <label class="control-label">Promo Image Size<span class="banner_txt"></span> Min Size: 2MB</label>
                                <div id="crop_imagediv">
                                    
                                    <div class="O_Uplode action">
                                       <input type="file" name="promo_image" accept="image/*" id="file" class="form-control form-input form-style-base" required="">
                                        <!--<input type="file" name="promo_image" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base">
                                        --><input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                                        <span class="fas fa-upload UplodeIcon"></span>
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
                                            <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Save" style="float: leftt">
                                            <input type="button" class="btn btn-sm btn-danger Removecrop" id="btnCrop" value="Delete" style="float: leftt">
                                            <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                            <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away" style="float: leftt">
                                        </div>
                                        <div class="cropped" style=" position: relative;">
                                            
                                        </div>
                                    </div>
                                    <div class="promo_saveimg" style=" position: relative;">
                                        <?php if(isset($promoinfo)): ?>
                                            <img id="Viewcrop_banner" class="Viewcrop_banner" src="<?=site_url('assets/jollof_banners/cuisine_banner/'.$promoinfo->imagename) ?>" >
                                            <span id="Gp_rmv_banner" class="Gp_rmv_banner Removepromosaveimage" data-placement="top" data-toggle="tooltip" title="Remove Cover pics">
                                                <i class="far fa-trash-alt"></i>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="form-group form-actions savebtn">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="btn btn-success sbmtbtn savebtn"><i class="fa fa-floppy-o"></i> &nbsp; save&nbsp; </button>

                        </div>

                    </div>
                    <br/>

                </form>
            </div>
    
</div>


<script src="<?= base_url() ?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.datepair.min.js"></script>
<script src="<?=base_url()?>assets_v2/custom_js/promosadmin.js"></script> 

<script type="text/javascript">

$('#file').change(function() {
    $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
});


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
    
            
            $('#duration_select').on('change', function() {
            
                $(".dur_type").text(null);
                $(".dur_price").text(null);
                
                var price= $(this).find(':selected').data("durationprice");
                $(".dur_type").text(this.value);
                $(".dur_price").text(price);
            
            });

});

            $("#promo_data22").submit(function (e){
                
                    e.preventDefault();
                    $(this).find('button[type=submit]').prop('disabled', true);
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
                                          $("#promo_data22")[0].reset();
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
                                    $(this).find('button[type=submit]').prop('disabled', false);
                                    //$("#modal_login").hide('hide');
                                    //$('.modal-backdrop').remove();
                                    //$('body').removeClass('modal-open');
                                    $("#promo_data22")[0].reset();
                                    $("#pwd").focus();
                                } 

                            });
                    });
</script>
