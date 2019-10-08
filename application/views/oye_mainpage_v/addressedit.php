<style>
    
    .pwdfield
{
    width:100%;
}
.pwdopsdiv
{
    display: block;
    float: left;
    margin-right:6px;   
}
.pwdopsdiv a
{
    font-family : Arial, Helvetica, sans-serif;
    font-size : 10px; 
}

.pwdstrengthbar
{
    float:right;
    background:#cccccc;
    height:4px;
    margin:0;

}

.pwdstrength
{
    float:right; 
    height:20px;
    width:70px;
    margin-top:3px;

}
.pwdstrengthstr
{
    float:right;
    clear:both;
    height:14px;
    margin-top:0px;
    font-family : Arial, Helvetica, sans-serif;
    font-size : 10px; 

}
    
</style>
<!-- Modal -->

        <div class="modal-content">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    Address
                </span>

            </div>

            <div class="modal-body">
               
                <form id="add_form" method="POST" action="<?= site_url('accounts/address_update/').$user_address['id'] ?>"> 
                    
                    <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
            
                    <div class="row mb-15">
                
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control" name="firstname_s" placeholder="First Name" type="text" required="" autofocus="" value="<?=$user_address['firstname']?>">
                        </div>
                
                        <div class="col-xs-6 col-md-6">
                    
                            <input class="form-control" name="lastname_s" placeholder="Last Name" type="text" required="" value="<?=$user_address['lastname']?>">
                
                        </div>
            
                    </div>
                    
                    <textarea class="form-control mb-10" name="address" placeholder="Street Address" rows="1" required=""><?=$user_address['address']?></textarea>
                    
                    <!--<span class=" "> Country </span>
                    <select id="country_div" name="country" class="form-control">
                        <option value="0"></option>
                    </select>
                    -->
                    
                    <div class="row mb-15">
                        <div class="col-xs-6 col-md-6">
                            <span class=" "> State </span>
                            <select id="state_div" name="state" class="form-control" required="" style="height: 34px;">
                                <?php if(!empty($state)): ?>
                                    <option value="">Select State</option>
                                    
                                    <?php foreach ($state as $state_list) :?>
                                        <?php if(isset($user_addressstate)): ?>
                                            <?php if($user_addressstate['id'] == $state_list->id): ?>
                                            <option value="<?= $state_list->id ?>" selected=""><?= $state_list->statename ?></option>
                                            <?php else: ?>
                                            <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>
                                        <?php endif; ?>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option value="">State not available</option>

                                <?php endif; ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-6 col-md-6">
                            <span class=" "> City </span>
                            <select id="city_div" name="city" class="form-control" required="" style="height: 34px;">
                                <option>Select City</option>
                                <?php if(isset($city_data)): ?>
                                    <?php foreach ($city_data as $city_list) :?>
                                        <?php if(isset($user_addresscity)): ?>
                                            <?php if($user_addresscity['id'] == $city_list->id): ?>
                                            <option value="<?= $city_list->id ?>" selected=""><?= $city_list->cityname ?></option>
                                            <?php else: ?>
                                            <option value="<?= $city_list->id ?>"><?= $city_list->cityname ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="<?= $city_list->id ?>"><?= $city_list->cityname ?></option>
                                        <?php endif; ?>
                                    
                                    <?php endforeach;?>
                                <?php endif;?>
                                
                            </select>
                        </div>
                
                    </div>
                    
                    <div class="row mb-15">
                
                        <div class="col-xs-6 col-md-6">
                            <input class="form-control mb-15 cu_phone_js" name="cell" placeholder="Phone Number" type="text" required="" value="<?=$user_address['phone']?>">
                        </div>
                
                        <div class="col-xs-6 col-md-6">
                    
                           <input class="form-control mb-15 cu_phone_js" name="cell2" placeholder="Moblie Number" type="text"  value="<?=$user_address['phone2']?>">
                
                        </div>
            
                    </div>
            
            
                    <button class="btn btn-primary btn-block" type="submit">Update</button>
            
                </form>  
                
            </div><!-- .modal-body --> 
            
            <footer class="bg_light_color_1 t_mxs_align_c text-center" style=" padding-top: 10px; padding-bottom: 10px; ">
                    <!-- <h3 class="color_dark d_inline_middle d_mxs_block m_mxs_bottom_15">New User?</h3>-->
            </footer>
            <button data-fancybox-close="" class="fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35"><path d="M12,12 L23,23 M23,12 L12,23"></path></svg></button>
            
        </div><!-- .modal-content --> 
        

    

    <script type="text/javascript">
        /*$('#country_div').on('change',function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:'POST',
                    url:'ajaxData.php',
                    data:'country_id='+countryID,
                    success:function(html){
                        $('#state_div').html(html);
                        $('#city_div').html('<option value="">Select state first</option>'); 
                    }
                }); 
            }else{
                $('#state_div').html('<option value="">Select country first</option>');
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });*/
        

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
        
    </script>

    <script type="text/javascript">
        
        $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
        });
        
            $("#add_form").submit(function (e){
                
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
                                    
                                    $('#add_option').load("<?= site_url('checkout/refradd'); ?>"); // refresh the Dropdown address
                                    $('#add_div').load  (
                                                            "<?= site_url('checkout/get_address'); ?>",
                                                            {
                                                                'id':data.content_id
                                                            }
                                                        ); // refresh the delivery address
                                    $('#add_option_profile').load("<?= site_url('profile/refradd'); ?>"); // refresh the Dropdown address
                                    $('#add_div_profile').load  (
                                                            "<?= site_url('profile/get_address'); ?>",
                                                            {
                                                                'id':data.content_id
                                                            }
                                                        ); // refresh the delivery address in user profile page
                                    new jBox('Notice', {
                                        //animation: 'flip',
                                        animation: {
                                          open: 'tada',
                                          close: 'zoomIn'
                                        },
                                        position: {
                                          x: 10,
                                          y: 500
                                        },
                                        attributes: {
                                          x: 'right',
                                          y: 'bottom'
                                        },
                                        color: 'green',
                                        autoClose: Math.random() * 8000 + 2000,
                                        //title: 'Tadaaa! I\'m single',
                                        content: 'Success! Address Updated',
                                        delayOnHover: true,
                                        showCountdown: true,
                                        closeButton: true
                                      });
                                     $.fancybox.close();
                                location.reload();
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
                                $("#add_form")[0].reset();
                                $("#firstname_s").focus();
                            } 
                            
                        });

            });
            
            
    </script>