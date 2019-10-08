
    
        <div class=" col-md-12">
            <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>


                <?php
                    if(isset($userinfo))
                    { 
                        $action='usersedit';
                        $savename='Update';
                    }
                    else{ 
                        $action='userssave';
                        $savename='Save';

                    }
                ?>
                <form id="cate_form" action="<?= site_url('jollofadmin/merchants/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">First Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="firstname" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo['firstname']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Last Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="lastname" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo['lastname']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Email</label>

                        <div class="col-md-7">
                            <?php if(isset($userinfo)) {
                                    $name= $userinfo['email'];
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

                            <input type="text" id=""  name="phone" class="form-control" placeholder="" value="<?php if(isset($userinfo)) echo $userinfo['phonenumber']?>" required >

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
                                                <?php if($userinfo['userroleid'] == $cate_list->id): ?>
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
                    
                    <?php if(isset($userinfo)): ?>
                    <div class="form-group">

                        
                        <div class="col-sm-6">
                            <label>Status</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="status" value="1" class="custom-control-input" required="" <?php if($userinfo['status']==1) echo 'checked';?> >
                                <label class="custom-control-label  text-success" for="customRadioInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="status"  required=""  <?php if($userinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                <label class="custom-control-label text-danger" for="customRadioInline2">In-Active</label>
                            </div>
                        </div>

                    </div>
                    <?php endif; ?>

                    <div class="form-group form-actions">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="btn btn-success sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; <?= $savename?> &nbsp; </button>

                        </div>

                    </div>

                </form>
            </div>
                               
                           

       
        <script>
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
                       $('.preloader').css("display", "block");
                       $(".modal-dialog").removeClass('modal_dialog_edit');
                   },
                   success:function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                            }
                            
                            else if(data.status === '0' )
                            {
                                
                            } 
                            
                        },
                    complete:function(data){
                        // Hide image container
                        window.location.reload(); 
                        $('input[class=sbmtbtn]').prop("disabled", false);
                        //$('.preloader').css("display", "none");
                        
                       }
                    });

            });
        </script>