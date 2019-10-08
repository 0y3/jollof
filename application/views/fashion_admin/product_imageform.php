
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
    }
    .banner_UploadView img{
        max-width: 100%;
        max-height:500px;
    }
    
    .slider_homebanner img{
        min-width: 1450px;
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
    
    .productimgcover{
        min-width: 700px;
        max-width: 100%;
        height:700px !important;
    }
    .productimg{
        width: 572px !important;
        max-width: 100% !important;
        height:572px !important;
        top: 9% !important;
        left: 9% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    
    .modal_dialog_edit{
        max-width: 100%;
        display: table;
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
                
                    <div class="modal-dialog mmodal-width modal_dialog_edit" style=" margin-top: 60px; ">
                    
                        <div class="modal-content modal-center" style="">
                    
                            <div class="modal-header mod-head" >
                                <h3 class="modal-title text-left"><b>Product Image Editor</b></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="image_form" action="<?= site_url('fashionadmin/products/productimagesave') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    

                                    <div class="form-group">

                                        <label class="col-md-12 control-label " style=" text-align: left;"> Product Image Size &nbsp; <span class="banner_txt">570px by 570px</span> Min Size: 2MB</label>
                                       <div class="col-md-12">
                                           
                                           
                                            <div class="O_Uplode action">
                                               <input type="file" name="product_image" accept="image/*" id="file" class="form-control form-input form-style-base">
                                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                                               <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                                            </div>

                                            <div class="banner_UploadView stepshide">
                                                <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                                                <div class="imageBox productimgcover">
                                                    <div class="thumbBox productimg"></div>
                                                    <div class="spinnerr" style="display: none">Loading...</div>
                                                </div>


                                            </div>
                                            <div class="banner_crop " style=" display: none">
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

                                            <button type="submit" class="savebtn btn btn-sm btn-primary sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

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
 
<script type="text/javascript">
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
            $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner" onclick="Removecrop_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="far fa-trash-alt"></i></span>');
            $('.savebtn').show();
        });
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        });
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        });
        $('.close').on('click',function(){
            $('#modal_image').hide('hide');
            $('#modal_image').html('').modal();
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
        });
            
    
    
    });
    
    function Removecrop_banner() {
        
        $('.Viewcrop_banner').attr('src', '');
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('#fake-input_banner').val('Step 1: Choose your Image');
        $('.banner_UploadView').hide();
        $('.savebtn').hide();
        $('.banner_crop').hide();
    }
    $('input[id=file]').change(function() {
        $('.banner_UploadView').show();
        $('.stepshide').show();
        $('.banner_crop').show();
        //$('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
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
            
            $("#image_formm").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('actionn');
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
                       $(".banner_UploadView").removeClass('slider_homebanner slider_homecenter slider_resslider');
                       //$(".modal-dialog").removeClass('modal_dialog_edit');
                   },
                   success:function(data)
                        {
                            $('input[class=sbmtbtn]').prop("disabled", false);
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); \
                                $(".preview-images-zone").append(data.content);
                                $("#pro-image").val('');
                                
                                $('#modal_image').modal('hide'); 
                                    
                            }
                            
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                //$(".get_error").show("fast");
                                
                                $(".get_error").show('fast').delay(4000).fadeOut('slow');
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //($".get_error").delay(5000).fadeOut('slow');
                                //$("#cat_form")[0].reset();
                                $("#cate_form").trigger('reset');
                                $("#save_url").focus();
                            } 

                               //$('#order_datatable').DataTable().ajax.reload();
                            
                        },
                    complete:function(data){
                        // Hide image container
                        $('input[class=sbmtbtn]').prop("disabled", false);
                        $('.ajax-loader').css("visibility", "hidden");
                       }
                    });

            });
        </script>