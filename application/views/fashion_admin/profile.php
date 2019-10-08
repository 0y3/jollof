
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



.chzn-choices {
    background-color: #fff;
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(1%, #eeeeee), color-stop(15%, #ffffff));
    background-image: -webkit-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -moz-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -o-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: -ms-linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    background-image: linear-gradient(top, #eeeeee 1%, #ffffff 15%);
    /*border: 1px solid #aaa;*/
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 0;
    padding: 2px 5px;
    cursor: text;
    overflow: hidden;
    height: auto !important;
    height: 1%;
    position: relative;
}

 .chzn-choices li {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #e4e4e4;
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f4f4f4', endColorstr='#eeeeee', GradientType=0 );
    background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(20%, #f4f4f4), color-stop(50%, #f0f0f0), color-stop(52%, #e8e8e8), color-stop(100%, #eeeeee));
    background-image: -webkit-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -moz-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -o-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: -ms-linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    background-image: linear-gradient(top, #f4f4f4 20%, #f0f0f0 50%, #e8e8e8 52%, #eeeeee 100%);
    -webkit-box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    -moz-box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    box-shadow: 0 0 2px #ffffff inset, 0 1px 0 rgba(0,0,0,0.05);
    color: #333;
    border: 1px solid #aaaaaa;
    line-height: 13px;
    padding: 3px 20px 3px 5px;
    margin: 3px 0 3px 5px;
    position: relative;
    cursor: default;
    display: inline-block;
}
.chzn-choices li {
    float: left;
    list-style: none;
}

.search-choice-close {
    display: block;
    position: absolute;
    right: 3px;
    top: 4px;
    width: 12px;
    height: 13px;
    color: red;
}

</style>
<div class="row">

    
            <!--General Data -->
    <div class="col-sm-6 col-md-4">

        
        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>

            </div>

            <form id="gen_data" action="<?= site_url('fashion_admin/update_general_data') ?>" method="post" class="prd_form form-horizontal form-bordered" enctype="multipart/form-data">

                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">
                

                    <span class="error_msgr_lg"> </span>

                </div>
                
                
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >FirstName</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="g_firstname" class="form-control" value="<?=$rest_gene->firstname?>"  required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-3 control-label" >LastName</label>

                    <div class="col-md-9">

                        <input type="text" id="last_name" name="g_lastname" class="form-control" value="<?=$rest_gene->lastname?>" required="">
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" >Email</label>

                    <div class="col-md-9">

                        <input type="email" id="product-name" name="g_email" class="form-control" value="<?=$rest_gene->email?>" required="" readonly="">

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label" for="r_email">Phone</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="g_cell" class="form-control cu_phone_js" value="<?=$rest_gene->phonenumber?>" required="">

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
        
        
        
    <!--General Data -->
    <div class="col-sm-6 col-md-4">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-key"></i> <strong>Change</strong> Password</h2>

            </div>

            <form id="cha_pwd" action="<?= site_url('fashion_admin/password_change') ?>" method="post" class="pwd_form form-horizontal form-bordered" >
                
                <div class="msgr_div col-md-10 col-md-offset-1 alert alert-danger alert-dismissable get_error" style="display:none;">

                    <span class="error_msgr_lg"> </span>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad">Old Password</label>

                    <div class="col-md-8">

                        <input type="password" id="oldpwd" name="oldpwd" class="form-control" placeholder="Enter Old Password"  required="">
                        
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-4 control-label nopad">New Password</label>

                    <div class="col-md-8">

                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Enter New Password"  required="">
                        <span id='message_c'></span>
                        
                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-4 control-label nopad" >Confirm Password</label>

                    <div class="col-md-8">

                        <input type="password" id="cfmpwd" name="cfmpwd" class="form-control" placeholder="Re-enter Password" required="">
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

<!-- edit Category Modal -->              
<div class="modal fade" id="modal_addcate" tabindex="-1" role="dialog" aria-labelledby="Add Category" aria-hidden="true" >

</div>
<!--end Modal -->

<!-- Modal confirm Empty Cart -->
<div class="modal" id="empty_confirmModal">
    <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-body" >
                        <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                        <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                    </div>

            </div>
    </div>
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
        
        
        $('.UploadView').attr('src', '<?= base_url()?>assets/uploads/rest_logo/<?= $rest_data->logo ?>');
        $('#fake-input').val('Choose your Image');
    }
    
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
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload_banner() {
        
        
        $('.UploadView_banner').attr('src', '<?= base_url()?>assets/<?= $img_ban ?>');
        $('#fake-input_banner').val('Choose your Image');
    }
   
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
                                $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut('fast');
                                $('#'+getid).find(".get_error").effect("shake");
                                $('#'+getid).find(".error_msgr_lg").text(data.content);
                            }
                            else if(data.status === '0' )
                            {
                                $('#'+getid).find('.msgr_div').removeClass('alert-success').addClass('alert-danger');
                                $('#'+getid).find(".get_error").show("fast").delay(4000).fadeOut('fast');
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
                                $('#'+getid).find(".get_error").show("fast").delay(5000).fadeOut('fast');
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

<script>
    
    $(".block").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        
        var url = $(this).attr('href');
        var cat_Id = $(this).data('cat_id');
        
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:cat_Id},function(data){
                $(container).html(data).modal();
           }
       );
    });
    
    
    $(document).on('click','#cate_del', function(e){
        var row_id;
        
        row_id = $(this).data("cat_id");
        
        var empty_msg = "Are you sure you want to remove this name " + $(this).data("cat_name");
        //e.stopImmediatePropagation();
        
        e.preventDefault();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:"<?= site_url('restaurant_admin/delete_cuisaine_cate') ?>",
                     method:"POST",
                     dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{id_:row_id},
                     success:function(data)
                     {
                        if(data.status === '1' )
                        {//alert("Product removed from Cart");
                            new jBox('Notice', {
                                //animation: 'flip',
                                animation: {
                                  open: 'tada',
                                  close: 'zoomIn'
                                },
                                attributes: {
                                  x: 'right',
                                  y: 'bottom'
                                },
                                color: 'red',
                                autoClose: Math.random() * 8000 + 2000,
                                content: 'Removed! Size Removed',
                                delayOnHover: true,
                                showCountdown: true,
                                closeButton: true
                            });
                        
                            $('.chzn-choices').html(data.html);
                        }
                     }
                    });
                });
        });
        
        function confirmDialog(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#empty_confirmModal");
    	    modal.modal("show");
    	    $("#empty_confirmMessage").empty().append(message);
    	    //$("#empty_confirmOk").one('click', onConfirm);
    	    //$("#empty_confirmOk").one('click', fClose);
    	    //$("#empty_confirmCancel").one("click", fClose);
            
    	    $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
    	    $("#empty_confirmCancel").unbind().one("click", fClose);
        }
        
       


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
                                    $('#'+getid).find(".get_error").show("fast");
                                    $('#'+getid).find(".get_error").effect("shake");
                                    $('#'+getid).find(".error_msgr_lg").text(data.content);
                                    $('#'+getid).find("#oldpwd").focus();
                                    $(".pwd_form")[0].reset();
                                } 

                            });
                }
            });
            
            
    </script>