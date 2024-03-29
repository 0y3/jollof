(function($) {
    'use strict';
    
    //alert(site_url);
    //  allow only number
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
                   $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
        
        });

    // image crop
    
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
            //$('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner" onclick="Removecrop_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>');
            $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner Removecrop" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="far fa-trash-alt"></i></span>');
            $('.savebtn').show();
        });
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        });
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        });
    
        // save promo form
        $("#promo_data").submit(function (e){
                
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var method = $(this).attr('method');
                    var data = $(this).serialize();

                    $.ajax({
                       url:url,
                       type:method,
                       dataType: 'json',
                       data:data,
                    success:function(html){
                    } 

                    
                });
                
             window.location.reload(); 
                    /*
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
                                } 

                            });
                     //window.location.reload();
                     */
            });   
    
        function Removecrop_banner() {

            $('.Viewcrop_banner').attr('src', '');
            $('#Viewcrop_banner').remove();
            $('#Gp_rmv_banner').remove();
            $('#fake-input_banner').val('Step 1: Choose your Image');
            $('.banner_UploadView').hide();
            $('.savebtn').hide();
        }
        $('#crop_imagediv').on('click','.Removecrop',function(){
            Removecrop_banner();
        });
        $('input[id=file]').change(function() {
            $('.banner_UploadView').show();
            $('.stepshide').show();
            //$('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
        });
        
        $('.promo_saveimg').on('click','.Removepromosaveimage',function(){
           $('.promo_saveimg').hide();
        });
        
        
        
        // on Promo Type option click, change Promo image properties
            $('#promo_type').on('change', function() {
            
                $(".dur_type").text(null);
                $(".dur_price").text(null);
            
                var promotypeID = $(this).val();
            
                if(promotypeID){
                    $.ajax({
                        type:'POST',
                        url:site_url+'fashionadmin/promos/promoDurationByid',
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
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover promofashionhomepagecover promofashionhomepagesidebarcover').addClass('promomaincover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest promofashionhomepage promofashionhomepagesidebar').addClass('promomain');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 1450px by 500px }');
                
                }
                
                else if ( ($(this).find(':selected').data("promowidth") == 265) &&($(this).find(':selected').data("promoheight")== 430) )
                {
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover promofashionhomepagecover promofashionhomepagesidebarcover').addClass('promocuisinerestcover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest promofashionhomepage promofashionhomepagesidebar').addClass('promocuisinerest');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 265px by 430px }');
                
                }
                // Fashion Homepage Banner selector
                else if ( ($(this).find(':selected').data("promowidth") == 870) &&($(this).find(':selected').data("promoheight")== 460) )
                {
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover promofashionhomepagecover promofashionhomepagesidebarcover').addClass('promofashionhomepagecover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest promofashionhomepage promofashionhomepagesidebar').addClass('promofashionhomepage');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 870px by 460px }');
                
                }
                
                // Fashion Homepage sidebar selector
                else if ( ($(this).find(':selected').data("promowidth") == 270) &&($(this).find(':selected').data("promoheight")== 460) )
                {
                  $(".imageBox ").removeClass('promomaincover promocuisinemaincover promocuisinerestcover promofashionhomepagecover promofashionhomepagesidebarcover').addClass('promofashionhomepagesidebarcover');
                  $(".thumbBox ").removeClass('promomain promocuisinemain promocuisinerest promofashionhomepage promofashionhomepagesidebar').addClass('promofashionhomepagesidebar');
                  //$(".modal-dialog").addClass('modal_dialog_edit');
                  $(".banner_txt").text('{ 270px by 460px }');
                
                }
                else
                {
                  $(".banner_UploadView").removeClass('promo_main promo_cuisine_main promo_cuisine_rest');
                  //$(".modal-dialog").removeClass('modal_dialog_edit');
                  $(".banner_txt").text('');
                
                }
                
            });
            
             // on duration dropdow select change price 
            $('#duration_select').on('change', function() {
            
                $(".dur_type").text(null);
                $(".dur_price").text(null);
                $('.startdate').val(''); 
                $('.enddate').val(''); 
                
                var price= $(this).find(':selected').data("durationprice");
                $(".dur_type").text( $(this).find(':selected') );
                $(".dur_price").text(price);
            
            });

            $('.startdate').on('change', function() {
            
                $(".enddate").text(null);
            
                var startdate = $(this).val();
                var duration =  $('[name="promo_duration"]').val();
            
                if(duration){
                    $.ajax({
                        type:'POST',
                        url:site_url+'fashionadmin/promos/enddate',
                        data:
                            {
                                startdate : startdate,
                                promo_duration : duration
                            },
                        success:function(html){
                            $('.enddate').val(html);
                        }
                    }); 
                }else{
                    $('.enddate').val(''); 
                }
            });


   var readers; 
    function GetUpload_banner(input) {
        if (input.files && input.files[0]) {
             readers = new FileReader();
            readers.onload = function (e) {
                $('.UploadView_banner')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            readers.readAsDataURL(input.files[0]);
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


    // max text allow in the email textbox for promo  
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

    // show email textbox  on click email in promo page  
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
    
    // on delete user  
    $('#promo_config').on("click",".promo_del", function(e){
       e.preventDefault();

       var msgg = 'Are you sure you want to Delete this Promo ? -- '+ $(this).data('name');
       var s_Id = $(this).data('get');
       var s_name = $(this).data('name');

       confirmDialog_cart(msgg, function(){
           //$('.preloader').css("display", "block");
           $.ajax({
                    type:'POST',
                    url:site_url+'fashionadmin/promos/delete',
                    dataType: 'json',
                    data: {
                            _id: s_Id,
                            _name: s_name
                          },
                    success:function(html){
                    } 

                    
                });
                
             window.location.reload(); 
            
        });

    });
    function confirmDialog_cart(message, onConfirm){
        var fClose = function(){
            modal.modal("hide");
        };
        var modal = $("#modal_conf");
        modal.modal("show");
        $("#confirmMessage").empty().append(message);
        $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
        $("#confirmCancel").unbind().one("click", fClose);
    }

            
})(jQuery);