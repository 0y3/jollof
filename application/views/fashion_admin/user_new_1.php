
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css-loader.css">
<style>
.modal_dialog_edit{
        max-width: 100%;
        width: auto !important; 
        display:inline-block;
    }
    .modal.in{
        text-align: center;
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
                                <?php
                                    if(isset($userinfo))
                                    { 
                                        $action='updateuser';
                                        $savename='Update';
                                    }
                                    else{ 
                                        $action='saveuser';
                                        $savename='Save';
                                        
                                    }
                                ?>
                                <form id="cate_form" action="<?= site_url('fashion_admin/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">First Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id=""  name="firstname" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo->firstname?>" required >

                                        </div>

                                    </div>

                                    <div class="form-group">
                                        
                                        <label class="col-md-3 control-label" >Last Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id=""  name="lastname" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo->lastname?>" required >

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label class="col-md-3 control-label" >Email</label>

                                        <div class="col-md-7">
                                            <?php if(isset($userinfo)) {
                                                    $name= $userinfo->email;
                                                    $readonly='readonly';
                                                }
                                                else {
                                                    $name= '';
                                                    $readonly='';
                                                }
                                            ?>
                                            <input type="email" id=""  name="useremail" class="form-control" placeholder="" value="<?=$name?>" <?=$readonly?> required="" >

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <label class="col-md-3 control-label" >Phone</label>

                                        <div class="col-md-7">

                                            <input type="text" id=""  name="phone" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo->phonenumber?>" required >

                                        </div>

                                    </div>
                                       
                                    <div class="form-group">
                                        

                                        <label class="col-md-3 control-label" for="product_category">User Type</label>

                                        <div class="col-md-7">

                                            <select name="userrole" id="slider_type" class="form-control" required="">
                                                        
                                                <?php if(!empty($cate)): ?>
                                                        
                                                    <option value="">Choose User Type..</option>

                                                        <?php foreach ($cate as $cate_list) :?>
                                                            <?php if(isset($userinfo)): ?>
                                                                <?php if($userinfo->userroleid == $cate_list->id): ?>
                                                                <option value="<?= $cate_list->id ?>" selected="" ><?= $cate_list->roleName ?></option>
                                                                <?php else: ?>
                                                                <option value="<?= $cate_list->id ?>" ><?= $cate_list->roleName ?></option>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="<?= $cate_list->id ?>" ><?= $cate_list->roleName ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach;?>
                                                    <?php else: ?>

                                                        <option > User Role Type not available</option>

                                                <?php endif; ?>


                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group form-actions">

                                        <div class="col-md-12 col-md-offset-33 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; <?= $savename?> &nbsp; </button>

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
       
        <script>
            
            $(document).on('click', '#save_url', function(e) {
                $('#save_url').val('https://');
                
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
                                    content: 'Success!  User:  Added',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                            }
                            
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".get_error").delay(500).fadeOut('fast');
                                $(".error_msgr_lg").text(data.content);
                                //$("#cat_form")[0].reset();
                                $("#cat_form").trigger('reset');
                                $("#save_url").focus();
                            } 

                               $('#order_datatable').DataTable().ajax.reload();
                            
                        },
                    complete:function(data){
                        // Hide image container
                        $('input[class=sbmtbtn]').prop("disabled", false);
                        $('.ajax-loader').css("visibility", "hidden");
                       }
                    });

            });
        </script>