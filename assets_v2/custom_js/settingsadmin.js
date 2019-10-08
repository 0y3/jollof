(function($) {
    'use strict';
    var row_id =null;
    var empty_msg=null;
    //alert(site_url);
    //
    //  allow only number
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
                   $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
        
        });
        
    // get city on select state 
    $('#state_div').on('change',function(){
        var stateID = $(this).val();

        if(stateID){
            $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/dashboard/get_city_byid',
                data:'stateid='+stateID,
                success:function(html){
                    $('#city_div').html(html);
                }
            }); 
        }else{
            $('#city_div').html('<option value="">Select state first</option>'); 
        }
    });
    
    
    
    
    $(document).ready(function() {
        setTimeout(loadlat, 3000);
    });
    
    
    // get city on select Location; 
    $('#city_div').on('change',function(){
       loadlat();
    });
    $('.lat_add').on('change', function(){
        loadlat();
    });
    // get address to convert to LatitudeLongitude
    function loadlat() {
        var address = $('.address').val()+','+$('select[name="cityid"] option:selected').text()+','+$('select[name="stateid"] option:selected').text();
        //alert(address);
        getLatitudeLongitude(showResult, address);
    }
    // get address to convert to LatitudeLongitude
    $("#location_save").click(function(){
        loadlat();
    });
    
    
    // show latitude and longitude of location selected
    function showResult(result) {
        //document.getElementById('latitude').value = result.geometry.location.lat();
        //document.getElementById('longitude').value = result.geometry.location.lng();
        $('#latitude').val(result.geometry.location.lat());
        $('#longitude').val(result.geometry.location.lng());
    }
    
    
    
    //show fake (selected)logo on change
    $('input[id=base-input]').change(function() {
            //$('.logo_UploadView').show();
            $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
        });
    
    //show fake (selected)logo on change
    var reader; 
    function GetUpload(input) {
        
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.GetUpload').change(function(){
       GetUpload(this);
    });
    
    // remove the logo on delect icon click
    function RemoveUpload(name) {
        var main_img=site_url+'assets/uploads/fashion_logo/'+name
        $('.UploadView').attr('src', main_img+' ');
        $('#fake-input').val('Choose your Image');
    }
    
    $('.RemoveUpload').click(function(){
       RemoveUpload($(this).data('get'));
    });
    
    //Store setting submit Form
    $(".merchant_form").submit(function (e){
             
        e.preventDefault();
        var method = $(this).attr('method');
        
        $.ajax({
           url:site_url+'jollofadmin/merchants/update_store_data',
           type:method,
           dataType: 'json',
           data:new FormData(this),
           processData:false,
           contentType:false,
           async:false,
           beforeSend: function() {
               $('.preloader').css("display", "block");
               //loadlat();
             },
            success: function(html){

                if(html.status === '1')
                {
                }
                else if(html.status === '0')
                {
                }

            }

        });
         window.location.reload();
        
    });
    
    
    
    // change Password submit form
    var error_p = true;
    var error_c = true;

    $('#pwd').on('blur', function(){
        if(this.value.length < 6){ // checks the password value length
           $('#message_c').html('You have entered less than 6 characters for password').css('display', 'block');
           $('#pwd').addClass('is-invalid');
           $(this).focus(); // focuses the current field.
           error_c = true; // stops the execution.
        }
        else{ 
            $('#message_c').html('');
            $('#pwd').addClass('is-valid').removeClass('is-invalid');
            error_c = false;
        }
    });


    $('#cfmpwd').on('keyup', function () {

        if ($('#pwd').val() != $('#cfmpwd').val()) 
            {

                $('#message').html('Not Matching').css('display', 'block');
                $('#cfmpwd').addClass('is-invalid');
                error_p =true;
                $('#saveit').attr({disabled:true});
            } 
        else 
            {

              $('#message').html('');
              $('#cfmpwd').addClass('is-valid').removeClass('is-invalid');
              error_p = false;
              $('#saveit').attr({disabled:false});
            }
    });
    
    $("#changepassword_data").submit(function (e){
                
        e.preventDefault();

        if(error_p == true || (error_c == true) )
            {
            }
        else 
        { 
            var method = $(this).attr('method');
            var data = $(this).serialize();

            $.ajax({
               url:site_url+'fashionadmin/dashboard/passwordchange',
               type:method,
               dataType: 'json',
               data:data
            }).done(function(data)
            {
                window.location.reload();
            });
        }
    });
    
    
    // My Account Submit Form
    $("#myaccount_data").submit(function (e){
                
        e.preventDefault();
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $.ajax({
           url:site_url+'fashionadmin/dashboard/myaccountupdate',
           type:method,
           dataType: 'json',
           data:data
        }).done(function(data)
        {
            window.location.reload();
        });
    });



    // Edit B2B Billing % price 
     $("#billing_table").on("click",".editper", function(e){
        e.preventDefault();
        
        var _Id = $(this).data('_id');
        var _Variant = $(this).data('_variadatant');
        var _Type = $(this).data('_varianttype');
        
        $('[name="new_variant_per"]').val(_Variant); // sets value
        $('[name="new_variant_per"]').data('cat_id',_Id);  // sets id 
        $('[name="new_variant_per"]').data('cat_type',_Type);  // sets Type 
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left -15;
        $('#variant_order').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the B2B Billing % price option button
    $('#closeorder').click(function (e) {
        e.preventDefault();
        $('#variant_order').hide();
    });

    // on B2B Billing % price Save  
    $('#per_save').click(function (e) {
            e.preventDefault();
            
            var new_data = $('[name="new_variant_per"]').val(); // gets value
            var _id_   = $('[name="new_variant_per"]').data('cat_id'); // gets id
            var _type_   = $('[name="new_variant_per"]').data('cat_type'); // gets type
            
                $.ajax({
                    type:'POST',
                    url:site_url+'jollofadmin/billing/billingedit',
                    dataType: 'json',
                    data:{
                            data:new_data,
                            id:_id_,
                            type:_type_
                        },
                    success:function(html){
                    } 

                    
                });
                
             window.location.reload(); 
        
    });



    // Edit B2B Billing % Status
    $("#billing_table").on("click",".editperstatus", function(e){
        e.preventDefault();
        
        var _Id = $(this).data('_id');
        var _Type = $(this).data('_varianttype');

        $('[name="variant_status_id"]').val(_Id);
        $('[name="variant_status_id"]').data('cat_type',_Type);  // sets Type 
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        $('#variant_status').css({top: newtop, left: position.left, display: 'block'});
    });
    
    // close the B2B Billing %  status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('[name="variant_status_id"]').val('');
        $('[name="variant_status_id"]').data('cat_type','');  // sets Type 
        $('#variant_status').hide();
    });


    
    // on status change 
    $('.selectstatus').on('change',function(){
        
            var new_data = $(this).val();
            var _id_ = $('[name="variant_status_id"]').val();
            var _type_   = $('[name="variant_status_id"]').data('cat_type'); // gets type

            if(new_data){
                 $.ajax({
                    type:'POST',
                    url:site_url+'jollofadmin/billing/billingedit',
                    dataType: 'json',
                    data:{
                            data:new_data,
                            id:_id_,
                            type:_type_
                        },
                    success:function(html){
                    } 

                    
                });
                
             window.location.reload(); 
            }
            $('#variant_status').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; Inactive </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
        });




     // Edit Delivery price 
    $("#delivery_table").on("click",".editdelivering", function(e){
        
        e.preventDefault();
        
        var chrg_Id = $(this).data('charge_id');
        var city_Id = $(this).data('city_id');
        var charge_value = $(this).data('charge_value');
        
        $('[name="new_variant_cost"]').val(charge_value);
        $('[name="new_variant_cost"]').data('charge_id',chrg_Id); // sets value
        $('[name="new_variant_cost"]').data('city_id',city_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 15;
        var newleft = position.left - 5;
        $('#variant_delivering').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closebill').click(function (e) {
        e.preventDefault();
        $('#variant_delivering').hide();
    });

     // on Delivery price change 
    $('#per_save').click(function (e) {
        e.preventDefault();
        
        var new_charge = $('[name="new_variant_cost"]').val();
        var chrg_id   = $('[name="new_variant_cost"]').data('charge_id'); // gets value
        var city_id   = $('[name="new_variant_cost"]').data('city_id'); // gets value
        
        
            
            $.ajax({
                type: "POST",
                url: site_url+'super_admin/save_delivering_locations',
                dataType: 'json',
                data: {
                        delivering_id: chrg_id,
                        city_id: city_id,
                        charge: new_charge
                        }
            }).done(function (data) {
                
                
            });
        $('#delivery_table').DataTable().ajax.reload(); 
         
    });




     // Edit Delivery price Status
    $("#delivery_table").on("click",".editstatus", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('charge_id');
        $('[name="variant_status_id"]').val(cat_Id);
        var position = $(this).offset(); //position();
        var newtop = position.top - 10;
        var newleft = position.left - 5;
        $('#variant_deliveringstatus').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the Delivery price status option button
    $('#closedeliveringstatus').click(function (e) {
        e.preventDefault();
        $('[name="cat_edidid"]').val('');
        $('#variant_deliveringstatus').hide();
    });
    // on Delivery price status change 
    $('.selectstatus').on('change',function(){
            
            var statusID = $(this).val();
            var chrg_id_ = $('[name="variant_status_id"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:site_url+'super_admin/delivering_locations_statusupdate',
                    dataType: 'json',
                    data:{
                            status:statusID,
                            chrg_id:chrg_id_
                        },
                    success:function(html){
                       window.location.reload();
                    }
                }); 
            }
            $('#variant_deliveringstatus').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; In-Active </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
            window.location.reload(); 
        });



    // B2B ACCEPT MERCHANT
    $(document).on("click",".b2b_approve", function(e){
        e.preventDefault();
        
        $('.preloader').css("display", "block");
        
        var b2b_id_   = $(this).data('get'); // gets value
            $.ajax({
                type:'POST',
                //url:'<?= site_url('fashion_admin/update_order_flow') ?>',
                url:site_url+'jollofadmin/merchants/b2b_statusupdate',
                dataType: 'json',
                data:{
                        status:'1',
                        b2b_id:b2b_id_
                    },
                success:function(html)
                {
                    
                }

            });
            window.location.reload();
    });

    // B2B Decline MERCHANT  
    $(document).on("click",".merchants_can", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to Decline this Merchant ? -- '+ $(this).data('merchantname');
       var b2b_id_ = $(this).data('get');
       //var url = $(this).attr('href');

       confirmDialog_cancel(msgg, function(){
           //$(location).attr('href', url);
            $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/merchants/b2b_statusupdate',
                dataType: 'json',
                data:{
                        status:'0',
                        b2b_id:b2b_id_
                    },
                success:function(html)
                {
                    
                }

            });
             window.location.reload();

        });
                
    });
    function confirmDialog_cancel(message, onConfirm){
        var fClose = function(){
            modal.modal("hide");
        };
        var modal = $("#modal_cancel");
        modal.modal("show");
        $("#confirmMessage").empty().append(message);
        $("#confirmOk").one('click', onConfirm);
        $("#confirmOk").one('click', fClose);
        $("#confirmCancel").one("click", fClose);
    }

    // B2B  Resend Activation Email MERCHANT
    $(document).on("click",".b2b_resendActivationEmail", function(e){
        e.preventDefault();
        
        $('.preloader').css("display", "block");
        
        var b2b_id_   = $(this).data('get'); // gets value
            $.ajax({
                type:'POST',
                //url:'<?= site_url('fashion_admin/update_order_flow') ?>',
                url:site_url+'jollofadmin/merchants/b2b_resendActivationEmail',
                dataType: 'json',
                data:{
                        b2b_id:b2b_id_
                    },
                success:function(html)
                {
                    
                }

            });
            window.location.reload();
    });

    // B2B  Reset Password Email MERCHANT
    $(document).on("click",".b2b_resetPasswordEmail", function(e){
        e.preventDefault();
        
        $('.preloader').css("display", "block");
        
        var b2b_id_   = $(this).data('get'); // gets value
            $.ajax({
                type:'POST',
                //url:'<?= site_url('fashion_admin/update_order_flow') ?>',
                url:site_url+'jollofadmin/merchants/b2b_resetPasswordEmail',
                dataType: 'json',
                data:{
                        b2b_id:b2b_id_
                    },
                success:function(html)
                {
                    
                }

            });
            window.location.reload();
    });


    // B2B Merchant Products delete
    // on delete submenu  
    $(document).on("click",".prd_delete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('product_name');
       var p_Id = $(this).data('product_id');
       var url = $(this).attr('href');
       
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
        //$("#confirmOk").one('click', fClose);
        $("#confirmCancel").unbind().one("click", fClose);
    }

    function confirmDialog(message, onConfirm){
        var fClose = function(){
                    modal.modal("hide");
        };
        var modal = $("#empty_confirmModal");
        modal.modal("show");
        $("#empty_confirmMessage").empty().append(message);
        $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
        $("#empty_confirmCancel").unbind().one("click", fClose);
    }

    // B2B Cuisine Merchant Products 
    // on save added product
    $("#addedproduct_data").submit(function (e){
            
        e.preventDefault();
        var url =  site_url+'jollofadmin/products/addmergesproduct/'+ $(this).data('slug');
        var method = $(this).attr('method');
        var data = $(this).serialize();

        $('input[class=sbmtbtn]').prop("disabled", true);
        $('.preloader').css("display", "block");
        
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
    // B2B Cuisine Merchant Products
    // on delete added product  
    $('#added_productlist').on("click",".prd_adddelete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('product_name');
       var p_Id = $(this).data('product_id');
       //var url = $(this).attr('href');
       var url = site_url+'jollofadmin/products/deletemergesproduct/'+$(this).data('slug')+'/'+$(this).data('product_id')+'/'+$(this).data('parentproduct_id');//<?=site_url("cuisineadmin/products/deleteaddproduct/")?>'+$(this).data('product_id');

       confirmDialog_cart(msgg, function(){
           $(location).attr('href', url);
        });
                
    });
    function confirmDialog_cart2(message, onConfirm){
        var fClose = function(){
            modal.modal("hide");
        };
        var modal = $("#modal_conf");
        modal.modal("show");
        $("#confirmMessage").empty().append(message);
        $("#confirmOk").one('click', onConfirm);
        $("#confirmOk").one('click', fClose);
        $("#confirmCancel").one("click", fClose);
    }
    

    // B2B Merchant Promo delete
    // on delete submenu  
    $(document).on("click",".promo_delete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to delete this Promo ? -- '+ $(this).data('name');
       var p_Id = $(this).data('get');
       var p_Name = $(this).data('name');
       var p_Type = $(this).data('type');
       
       confirmDialog_cart(msgg, function(){
           $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/promos/delete',
                dataType: 'json',
                data:{
                        _id:p_Id,
                        _name:p_Name,
                        _type:p_Type
                    },
                success:function(html)
                {
                    
                }

            });
            window.location.reload();
        });
                
    });
    
    // B2B Merchant Promo Approved
    //  the status Process Order button
    $(document).on("click",".promo_accept", function(e){
        e.preventDefault();
        
        
        var _id_   = $(this).data('status'); // gets value
        //$('.preloader').css("display", "block");
            $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/promos/promostatus',
                dataType: 'json',
                data:{
                        _id: $(this).data('get'),
                        _status: 1
                    },
                success:function(html)
                {
                    window.location.reload();
                }

            });
    });

    // B2B Merchant Promo Decli
    //  the status Process Order button
    $(document).on("click",".promo_decline", function(e){
        e.preventDefault();
        
        
        var _id_   = $(this).data('status'); // gets value
        //$('.preloader').css("display", "block");
            $.ajax({
                type:'POST',
                url:site_url+'jollofadmin/promos/promostatus',
                dataType: 'json',
                data:{
                        _id: $(this).data('get'),
                        _status: 0
                    },
                success:function(html)
                {
                    window.location.reload();   
                }

            });
    });

    // Fashion Delete Color name 
    $(document).on("click",".color_del", function(e){
        e.preventDefault();
        row_id = $(this).data("color_id");
        empty_msg = "Are you sure you want to Delete this Color name ?.." + $(this).data("color_name");
        //e.stopImmediatePropagation();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:site_url+'jollofashion/deletecolorvariant',
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                    data:{id_:row_id},
                    success:function(data)
                    {
                        //alert("Product removed from Cart");
                    }
                });
                window.location.reload();
            });
    });

    // Brand Logo
    $('#base-input').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (e) {
          $('.div_UploadView').show();
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(this.files[0]);
    });
     $('input[id=base-input]').change(function() {
        //$('.logo_UploadView').show();
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });

    function Removecover()
    {
        $('.UploadView').attr('src', '');
        $('#fake-input').val('Choose your Brand Logo');
        $('.div_UploadView').hide();
    }
    // on closing  Brand edit modal
    $('#editbrandmodel,#createbrandmodel').on('click','.close',function(){
        $('[name="name"]').val(''); // clear brand name
        Removecover();
    });
    
    // on closing Brand edit modal
    $('body').on('hidden.bs.modal', '#editbrandmodel,#createbrandmodel', function () {
        $('[name="name"]').val(''); // clear brand name
        Removecover();
    });
    
    // clear crop image on click trash icon in Brand edit modal
    $('#editbrandmodel,#createbrandmodel').on('click','.Removecover',function(){
        Removecover();
    });

    // pass value from into modal
    $(".color_edit").click(function () {
        var imagename = $(this).data('brand_image');
        var brandname = $(this).data('brand_name');
        var brandid = $(this).data('brand_id');
        var status = $(this).data('brand_status');
        if(imagename=='')
        {
        }
        else
        {
            $('.div_UploadView').show();
            $('.UploadView').attr('src', site_url+'assets/uploads/brand_logo/'+imagename);
        }
        if(status==1)
        {
            //$('#modal_active').attr('checks',true);
            $('input[name=status][value=1]').attr('checked', true); 
        }
        else
        {
            //$('#modal_inactive').attr('checks',true);
            $('input[name=status][value=0]').attr('checked', true);
        }
        $(".modal-body #modal_brandimage").val(imagename);
        $(".modal-body #modal_brandname").val(brandname);
        $(".modal-body #modal_brandid").val(brandid);
    }) 

    // Fashion Delete brand name 
    $(document).on("click",".brand_del", function(e){
        e.preventDefault();
        var row_id = $(this).data("brand_id");
        var empty_msg = "Are you sure you want to Delete this Brand name ?.." + $(this).data("brand_name");
        //e.stopImmediatePropagation();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:site_url+'jollofadmin/fashion/deletebrand',
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                    data:{id:row_id},
                    success:function(data)
                    {
                        //alert("Product removed from Cart");
                    }
                });
                window.location.reload();
            });
    });

    //jpoints New form
    $(function(){
        $('#minamount').change(function(){
            //$('.form-control:not(#totalMark)').prop('max',this.value)
            //alert(this.value);
            $('#maxamount').prop('min',this.value);
        });
    });

    //var row_id =null;
    
    // jpoints Delete  
    $(document).on("click",".jpoint_delete", function(e){
        e.preventDefault();
        row_id = $(this).data("get");
        empty_msg = "Are you sure you want to Delete this Jpoint " ;
        //e.stopImmediatePropagation();
        
            confirmDialog_cart(empty_msg, function(){
                    $.ajax({
                     url:site_url+'jollofadmin/jpoints/delete',
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                    data:{id:row_id},
                    success:function(data)
                    {
                        //alert("Product removed from Cart");
                    }
                });
                window.location.reload();
            });
    });


    // jpoints Delete  
    $(document).on("click",".layaway_delete", function(e){
        e.preventDefault();
        row_id = $(this).data("get");
        empty_msg = "Are you sure you want to Delete this Layaway " ;
        //e.stopImmediatePropagation();
            confirmDialog_cart(empty_msg, function(){
                    $.ajax({
                     url:site_url+'jollofadmin/fashion/deletelayaway',
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                    data:{id:row_id},
                    success:function(data)
                    {
                        //alert("Product removed from Cart");
                    }
                });
                window.location.reload();
            });
    });

    
    

})(jQuery);