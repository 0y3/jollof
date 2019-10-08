
    
        <div class=" col-md-12">

                <?php
                    if(isset($durationinfo))
                    { 
                        $action='edit';
                        $savename='Update';
                    }
                    else{ 
                        $action='add';
                        $savename='Save';

                    }
                ?>

                <form id="cate_form" action="<?= site_url('jollofadmin/jpoints/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="product_category">Jpoints</label>

                        <div class="col-md-6">
                            <input type="text" id=""  name="jpoint" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($durationinfo)) echo $durationinfo['jpoint']?>"  <?php if(isset($durationinfo)) echo 'readonly'?> required >
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="col-md-6 control-label" for="">Minimum Amount &amp; Above</label>

                                <div class="col-md-12">
                                    <input type="number" id="minamount"  name="minamount" class="form-control " placeholder="" value="<?php if(isset($durationinfo)) echo $durationinfo['minamount']?>" required >
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="col-md-6 control-label" for="save_name">Maximum Amount </label>

                                <div class="col-md-12">

                                    <input type="number" id="maxamount"  name="maxamount" class="form-control" placeholder="" value="<?php if(isset($durationinfo)) echo $durationinfo['maxamount']?>" required >

                                </div>

                            </div>
                        </div>

                    </div>

                    <?php if(isset($durationinfo)): ?>

                        <input type="hidden" name="id" readonly value="<?php if(isset($durationinfo)) echo $durationinfo['id']?>"  >

                    

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Status</label>
                        <div class="col-md-7">
                            <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" id="customRadioInline5" name="status"  required=""  <?php if($durationinfo['status']==1) echo 'checked';?> value="1" class="custom-control-input">
                                <label class="custom-control-label  text-success" for="customRadioInline5">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6"name="status"  required=""  <?php if($durationinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline6">In-Active</label>
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

            
                               
                           
