
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css-loader.css">
<style>

    
    .Gp_rmv_banner {
        position: absolute;
        top: 0px;
        left: 10px;
        color: #F30;
        cursor: pointer;
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
    
    .slider_homecenter img{
        width: 285px;
        height: 213px;
    }
    .slider_resslider img{
        width: 265px;
        height: 430px;
    }
    
    
    .savebtn { display: none;}
    ::-webkit-scrollbar-thumb{
	-webkit-border-radius:4px;
	border-radius:4px;
        background:#e74c3c;
    }
    ::-webkit-scrollbar{
	width:10px;
	background:#444;
    }
    .sliderhomebannercover{
        min-width: 1550px;
        max-width: 100%;
        height:400px !important;
    }
    .sliderhomebanner{
        width: 1452px !important;
        max-width: 100% !important;
        height:302px !important;
        top: 4% !important;
        left: 3.3% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    .sliderresslidercover{
        min-width: 450px;
        height: 550px !important;
    }
    .sliderresslider{
        width: 267px !important;
        max-width: 100% !important;
        height:432px !important;
        top: 10.65% !important;
        left: 20% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    
    
    .modal_dialog_edit{
        max-width: 100%;
        width: auto !important; 
        display:inline-block;
    }
    .modal.in{
        text-align: justify;
    }
    .ajax-loader {
        visibility: hidden;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        z-index: 99999 !important;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    .loader .is-active{
        background-color: rgba(255,255,255,0.7) !important;
    }
    .loader img {
        position: relative;
        top:50%;
        left:50%;
    }
</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width " style=" margin-top: 60pxx; ">
                    
                        <div class="modal-content modal-center" style="">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cate_form" action="<?= site_url('restaurant_admin/merchantslidersave') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        

                                        <label class="col-md-3 control-label" for="product_category">Slider Type</label>

                                        <div class="col-md-7">

                                            <select name="slider_type" id="slider_type" class="form-control" required="">
                                                        
                                                <?php if(!empty($cate)): ?>
                                                        
                                                    <option value="">Choose Slider Type..</option>

                                                        <?php foreach ($cate as $cate_list) :?>
                                                    
                                                            <?php if($cate_list->id ==6): ?>
                                                                <?php if( $banner>= $admin_info->freeuploads): ?>
                                                                    <option disabled="" data-count="<?=$banner?>" value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>
                                                                <?php else: ?>
                                                                    <option  value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>
                                                                <?php endif; ?>
                                                            <?php elseif($cate_list->id ==7):?>
                                                                <?php if( $sidebar>= $admin_info->freeuploads): ?>
                                                                    <option disabled="" data-count="<?=$sidebar?>"  value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>
                                                                <?php else: ?>
                                                                    <option  value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option  value="<?= $cate_list->id ?>" data-promowidth="<?= $cate_list->width ?>" data-promoheight="<?= $cate_list->height ?>" ><?= $cate_list->bannertypename ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach;?>
                                                    <?php else: ?>

                                                        <option > Slider Type not available</option>

                                                <?php endif; ?>


                                            </select>

                                        </div>

                                    </div>
                                    
                                    <!--<div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Slider Url</label>

                                        <div class="col-md-7">

                                            <input type="url" id="save_url"  name="slider_url" class="form-control" placeholder="https://" value=""  >

                                        </div>

                                    </div>-->

                                    <div class="form-group">

                                        <label class="col-md-12 control-label " style=" text-align: left;"> Slider Image Size &nbsp; <span class="banner_txt"></span> Min Size: 2MB</label>
                                       <div class="col-md-12">

                                           <div class="O_Uplode">
                                               <input type="file" name="slider_banner" accept="image/*" id="file" class="form-control form-input form-style-base">
                                               <!--<input type="file" name="slider_banner" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base" required="" >-->
                                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*" >
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

                                       </div>

                                    </div>
                                       


                                    <div class="form-group form-actions">

                                        <div class="col-md-12 col-md-offset-33 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary savebtn sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

    <div class="ajax-loader">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
<!--
    <div class="loader loader-defaultt is-active">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
-->
<script >
    
    $(document).ready(function() {
        
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
            //this.files = [];
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
        
    });
    
    $("#cate_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:new FormData(this),
                   processData:false,
                   contentType:false,
                   cache:false,
                   beforeSend: function(){
                       // Show image container
                       $('input[class=sbmtbtn]').prop("disabled", true);
                       $('.ajax-loader').css("visibility", "visible");
                       $(".imageBox").removeClass('sliderhomebannercover  sliderresslidercover ');
                       $(".thumbBox ").removeClass('sliderhomebanner sliderresslider');
                       $(".modal-dialog").removeClass('modal_dialog_edit');
                   },
                   success:function(data)
                        {
                            $('input[class=sbmtbtn]').prop("disabled", false);
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_cate').modal('hide'); 
                                    
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
                                    content: 'Success! Slider Image:  Added',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                var type = data.bannertype;
                                //alert(type);
                                if(type === '1' || type === '2' || type === '3')
                                {
                                    $('.rest_nav_tray').load("<?= site_url('super_admin/cuisine_slider_nav_tray') ?>");
                                }
                                else if(type === '4')
                                {
                                    $('.rest_nav_tray').load("<?= site_url('super_admin/jollof_slider_nav_tray') ?>");
                                }
                            }
                            
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //$("#cat_form")[0].reset();
                                $("#cat_form").trigger('reset');
                                $("#save_url").focus();
                            } 

                               $('#order_datatable').DataTable().ajax.reload();
                               $("#banner_count").html(data.count_banner);
                               $("#sidebar_count").html(data.count_sidebar);
                               $(".ord_h2_a").html(data.count_total);
                            
                        },
                    complete:function(data){
                        // Hide image container
                        $('input[class=sbmtbtn]').prop("disabled", false);
                        $('.ajax-loader').css("visibility", "hidden");
                       }
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
       
        <script>
            
            $(document).on('click', '#save_url', function(e) {
                $('#save_url').val('https://');
                
            });
            
            // on slider option click, change slider image properties
            $('#slider_type').on('change', function() {
            
                //alert($(this).find(':selected').data("promowidth"));
                if ( ($(this).find(':selected').data("promowidth") == 1450) && ($(this).find(':selected').data("promoheight")== 300) )
                {
                  $(".imageBox").removeClass('sliderhomebannercover  sliderresslidercover ').addClass('sliderhomebannercover');
                  $(".thumbBox ").removeClass('sliderhomebanner sliderresslider').addClass('sliderhomebanner');
                  $(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('min={ 1450px - 300px }');
                
                }
                
                else if ( ($(this).find(':selected').data("promowidth") == 265) &&($(this).find(':selected').data("promoheight")== 430) )
                {
                  $(".imageBox").removeClass('sliderhomebannercover  sliderresslidercover ').addClass('sliderresslidercover');
                  $(".thumbBox ").removeClass('sliderhomebanner sliderresslider').addClass('sliderresslider');
                  $(".modal-dialog").removeClass('modal_dialog_edit');
                  $(".banner_txt").text('min={ 265px - 430px }');
                
                }
                else
                {
                  $(".imageBox").removeClass('sliderhomebannercover  sliderresslidercover ');
                  $(".thumbBox ").removeClass('sliderhomebanner sliderresslider');
                  $(".modal-dialog").removeClass('modal_dialog_edit');
                  $(".banner_txt").text('');
                
                }
                
            });
            
            
            $('input[id=base-input_banner]').change(function() {
                //$('.logo_UploadView').show();
                $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
            });
     
   
            function GetUpload_banner(input) {
                if (input.files && input.files[0]) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        $('.UploadView_banner')
                                .attr('src', e.target.result)
                                //.width(200)
                                //.height(500)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function RemoveUpload_banner() {


                $('.UploadView_banner').attr('src', 'https://placeholdit.co//i/555x200?bg=BDBDBD');
                $('#fake-input_banner').val('Choose your Image');
            }
            
            
        </script>