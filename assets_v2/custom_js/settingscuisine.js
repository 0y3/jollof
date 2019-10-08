(function($) {
    'use strict';
    
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
        var address = $('.store_add').val()+','+$('select[name="store_city"] option:selected').text()+','+$('select[name="store_state"] option:selected').text();
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
    $(".cuisinestore_form").submit(function (e){
             
        e.preventDefault();
        var method = $(this).attr('method');
        if( $('#latitude').val()==''  || $('#longitude').val()=='' )
        {
          return false;
        }
        else
        {
          $.ajax({
             url:site_url+'cuisineadmin/dashboard/update_store_data',
             type:method,
             dataType: 'json',
             data:new FormData(this),
             processData:false,
             contentType:false,
             async:false,
             beforeSend: function() {
                 //$('.preloader').css("display", "block");
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
        }
        
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
               url:site_url+'cuisineadmin/dashboard/passwordchange',
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
           url:site_url+'cuisineadmin/dashboard/myaccountupdate',
           type:method,
           dataType: 'json',
           data:data
        }).done(function(data)
        {
            window.location.reload();
        });
    });
    
})(jQuery);