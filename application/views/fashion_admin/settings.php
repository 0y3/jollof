
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

    
    <div class="col-sm-6 col-md-4">
        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-cutlery"></i> <strong>Restaurant</strong> Data</h2>

            </div>

            <form id="rest_data"  action="<?= site_url('fashion_admin/update_restaurant_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_name">Name</label>

                    <div class="col-md-9">

                        <input type="text" id=" " name="r_name" class="form-control" value="<?= $rest_data->companyname ?>"  required="">

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_desc">Short Description</label>

                    <div class="col-md-9">

                        <textarea id="product-short-description" name="r_desc" class="form-control" rows="2"><?= $rest_data->companydesc ?></textarea>

                    </div>

                </div>

                
                <!--
                <div class="form-group">

                    <label class="col-md-3 control-label" >Minimum Order</label>

                    <div class="col-md-8">

                        <div class="input-group">

                            <div class="input-group-addon"><i class="fa fa-money"></i></div>

                            <input type="number" id="product-price" min="0" name="r_minorder" class="form-control" placeholder="0,000" value="<?= $rest_data->minorder ?>" >

                        </div>

                    </div>

                </div>
                -->
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="product-price">Logo</label>

                    <div class="col-md-8">

                        <div class="O_Uplode">
                            <input type="file" name="r_logo" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base">
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                            <span class=" fas fa-upload UplodeIcon"></span>
                        </div>
                        
                        <div class="logo_UploadView">
                            
                            <img class="UploadView" src="<?= base_url()?>assets/uploads/fashion_logo/<?= $rest_data->logo ?>" width="100%" height="100%" />
                            <span class="Gp_rmv" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>
                            <input type="hidden" name="r_logoimage" class="cart_suball_price" value="<?= $rest_data->logo ?>" readonly="">  
                        </div>

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
    
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-map-marker"></i> <strong>Location</strong> Data</h2>

            </div>

            <form id="loc_data" action="<?= site_url('fashion_admin/update_location_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                
                    <span class="error_msgr_lg"> </span>

                </div>
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >Address</label>

                    <div class="col-md-9">

                        <textarea id="product-short-description" name="r_add" class="form-control" rows="2"><?= $rest_data->address ?></textarea>

                    </div>

                </div>

                
                <div class="form-group">

                    <label class="col-md-3 control-label" >State</label>

                    <div class="col-md-8">

                        
                        <select id="state_div" name="r_state" class="form-control" data-placeholder="<?= $rest_data->statename ?>" value="<?= $rest_data->stateid ?>" style="width: 250px;" required="">
                            <option value="<?= $rest_data->stateid ?>" ><?= $rest_data->statename ?></option>
                            <?php if(!empty($rest_state)): ?>
                                    <option></option>
                                    
                                    <?php foreach ($rest_state as $state_list) :?>
                                        <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option ><?= $rest_data->statename ?></option>

                            <?php endif; ?>
                            
                            
                        </select>

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >City</label>

                    <div class="col-md-8" id="city_div">
                        
                        <select id="city_div1" name="r_city" class="form-control" data-placeholder="<?= $rest_data->cityname ?>" value="<?= $rest_data->cityid ?>" style="width: 250px;" required="">
                            <option value="<?= $rest_data->cityid ?>" ><?= $rest_data->cityname ?></option>  
                            <?php if(!empty($rest_city)): ?>
                                    <option></option>
                                    
                                    <?php foreach ($rest_city as $city_list) :?>
                                        <option value="<?= $city_list->id ?>"><?= $city_list->cityname ?></option>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option ><?= $rest_data->cityname ?></option>

                            <?php endif; ?>
                                    
                        </select>
                        
                    </div>

                </div>
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_email">Email</label>

                    <div class="col-md-9">

                        <input type="email" id="" name="r_email" class="form-control" value="<?= $rest_data->email ?>"  required="">

                    </div>

                </div>
                
                 <div class="form-group">

                    <label class="col-md-3 control-label" for="cell1">Tell</label>

                    <div class="col-md-9">

                        <input type="text" id="" name="cell1" class="form-control cu_phone_js" value="<?= $rest_data->phone ?>"  required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-3 control-label" for="cell2">Mobile</label>

                    <div class="col-md-9">

                        <input type="text" id="last_name" name="cell2" class="form-control cu_phone_js" value="<?= $rest_data->phone2 ?>" >
                    </div>

                </div>
                
                <div>
                    <input type="hidden" name="latitude" id="latitude" readonly />
                    <input type="hidden" name="longitude" id="longitude" readonly />
                </div>
                
                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button id="location_save" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
                        
                    </div>

                </div>

            </form>

        </div>

    </div>
    
    <!--Status -->
    <div class="col-sm-6 col-md-4">
        <div class="panel panel-default col-h">
            <div class="panel-heading">Activate Restaurant Online</div>
            <div class="panel-body">
                <form id="res_status" class="prdedit_form" action="<?= site_url('fashion_admin/update_restaurant_status') ?>" method="POST" >
                    
                    <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                

                        <span class="error_msgr_lg"> </span>

                    </div>
                    
                        <?php
                            $rest_status='';
                            $reststatus= $rest_data->status ;
                            if ($reststatus == 1)
                            {
                                $rest_status='checked';
                            }
                        ?>
                    <label class="switch switch-primary">

                        <input type="checkbox" id="product_status" name="rest_status" <?= $rest_status ?>><span></span>

                    </label>
                    
                    <button class="btn btn-default" value="" type="submit">
                        Save
                    </button>
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

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY2buDtbYIot8Llm_FkQXHW36f0Cme6TI&callback=initMap">
</script>
<script type="text/javascript">

function showResult(result) {
    //document.getElementById('latitude').value = result.geometry.location.lat();
    //document.getElementById('longitude').value = result.geometry.location.lng();
    $('#latitude').val(result.geometry.location.lat());
    $('#longitude').val(result.geometry.location.lng());
}

function getLatitudeLongitude(callback, address) {
    // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
    address = address || '80b, Lafiaji way, Dolphin, Ikoyi';
    // Initialize the Geocoder
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                callback(results[0]);
            }
        });
    }
}

//var button = document.getElementById('location_save');

//button.addEventListener("click", function () {
    //var address = document.getElementById('address').value;
$("#location_save").click(function(){
    var address = $('.address_loc').val()+','+$('select[name="r_city"] option:selected').text()+','+$('select[name="r_state"] option:selected').text();
    //alert(address);
    getLatitudeLongitude(showResult, address);
});

</script> 

<script type="text/javascript">
    	
        $('input[id=base-input]').change(function() {
            //$('.logo_UploadView').show();
            $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
        });
    
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
    
    function RemoveUpload() {
        
        
        $('.UploadView').attr('src', '<?= base_url()?>assets/uploads/fashion_logo/<?= $rest_data->logo ?>');
        $('#fake-input').val('Choose your Image');
    }
    
    $('input[id=base-input_banner]').change(function() {
        //$('.logo_UploadView').show();
        $('#fake-input_banner').val($(this).val().replace("C:\\fakepath\\", ""));
    });
   
    $(".prd_form").submit(function (e){
                
                e.preventDefault();
                
                var getid = $(this).attr('id');
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data_save = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:new FormData(this),
                   processData:false,
                   contentType:false,
                   async:false,
                   success: function(data){
                     
                        if(data.status === '1' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-danger').addClass('alert-success');
                                $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                            }
                            else if(data.status === '0' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-success').addClass('alert-danger');
                                $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find(".prd_form")[0].reset();
                            } 
                     
                    }
                   
                });
                 
        });
        
        $(".prdedit_form").submit(function (e){
                
                e.preventDefault();
                
                var getid = $(this).attr('id');
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
                                        content: 'Success!  Updated successfull...',
                                        delayOnHover: true,
                                        showCountdown: true,
                                        closeButton: true
                                      });


                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut("fast");
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                                $('#'+getid).find("#oldpwd").focus();
                                $('#'+getid)[0].reset();
                            } 

                        });
                 
        });
	
</script>

<script >
    //$('.c_tray').addClass('active');
    $('.nav_a').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
    
</script>

<script type="text/javascript">


        $('#state_div').on('change',function(){
            var stateID = $(this).val();
            
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/get_city_byid') ?>',
                    data:'stateid='+stateID,
                    success:function(html){
                        $('#city_div').html(html);
                    }
                }); 
            }else{
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });
        
    </script>

    <script type="text/javascript">
        
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
          
        
            $(".pwd_form").submit(function (e){
                
                var getid = $(this).attr('id');
                e.preventDefault();
                
                if(error_p == true || (error_c == true) )
                    {
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
                                            content: 'Success! Password Updated',
                                            delayOnHover: true,
                                            showCountdown: true,
                                            closeButton: true
                                          });
                                          $(".pwd_form")[0].reset();
                                          

                                }
                                else if(data.status === '0' )
                                {
                                    //alert('error ' + data.status); 
                                    $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut("fast");
                                    $('#'+getid).find(".get_error").effect("shake");
                                    $('#'+getid).find(".error_msgr_lg").text(data.content);
                                    $('#'+getid).find("#oldpwd").focus();
                                    $(".pwd_form")[0].reset();
                                } 

                            });
                }
            });
            
            
    </script>