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
        
    $(".modal_prdimgg").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
       $.post(
               url,
                function(data){
                    $(container).html(data).modal();
                }
            );
    });
    
        
    //group add limit
        var maxGroup = 5;

        //add more fields group
        $(document).on('click', '.btn-add', function(e){
            e.preventDefault();
            if($('body').find('.entry').length < maxGroup){
                var fieldHTML = '<div class="col-md-12 entry">'+$(".entrycopy").html()+'</div>';
                $('body').find('.entry:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' Feild are allowed.');
            }
        });

        //remove fields group
        $("body").on("click",".btn-remove",function(e){ 
            e.preventDefault();
            $(this).parents(".entry").remove();
        });



    var max_fields_limit = 5;   //set limit for maximum input fields
    var x = 1;                  //initialize counter for text box
    
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div><input type="text" name="product_name[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        $(this).parent('div').remove(); x--;
    });


   
    //images 
    var reader; 

    
   
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.var_editimage')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload() {
        $('.UploadView').attr('src', 'http://www.placehold.it/40x40');
        $('#fake-input').val('Choose your Image');
        $('.Prd_UploadView').hide();
    }
   
   
    
    
    // to crop product image and save  
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
        $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner Removecrop" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="far fa-trash-alt"></i></span>');
        $('.savebtn').show();
    });
    $('#btnZoomIn').on('click', function(){
        cropper.zoomIn();
    });
    $('#btnZoomOut').on('click', function(){
        cropper.zoomOut();
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
    
    // on closing  product image modal
    $('#modal_imagee').on('click','.close',function(){
        /*$('#modal_image').hide('hide');
        $('#modal_image').html('').modal();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');*/
        Removecrop_banner();
    });
    
    // on closing  product image modal
    $('body').on('hidden.bs.modal', '#modal_imagee', function () {
        Removecrop_banner();
    });
    
    // clear crop image on click trash icon in product image modal
    $('#cuisinenewproduct').on('click','.Removecrop',function(){
        Removecrop_banner();
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
    
   //on save added product
   // save promo form
    $("#addedproduct_data").submit(function (e){
            
        e.preventDefault();
        var url =  site_url+'cuisineadmin/products/addmergesproduct/';
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('input[class=sbmtbtn]').prop("disabled", true);
        $('.ajax-loader').css("visibility", "visible");
        
        $.ajax({
           url:url,
           type:method,
           dataType: 'json',
           data:data
        }).done(function(data)
                {

                    if(data.status === '1' )
                    { 
                        window.location.reload();

                    }
                    else if(data.status === '0' )
                    {
                        window.location.reload();
                    } 

                });
        
        }); 

   // on delete added product  
    $('#added_productlist').on("click",".prd_delete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('product_name');
       var p_Id = $(this).data('product_id');
       //var url = $(this).attr('href');
       var url = site_url+'cuisineadmin/products/deletemergesproduct/'+$(this).data('product_id')+'/'+$(this).data('parentproduct_id');//<?=site_url("cuisineadmin/products/deleteaddproduct/")?>'+$(this).data('product_id');

       confirmDialog_cart(msgg, function(){
           $(location).attr('href', url);

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