
    
        <div class=" col-md-12">

                <?php
                    if(isset($layawayinfo))
                    { 
                        $action='editlayaway';
                        $savename='Update';
                    }
                    else{ 
                        $action='addlayaway';
                        $savename='Save';

                    }
                ?>

                <form id="cate_form" action="<?= site_url('jollofadmin/fashion/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                        <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                            <span class="error_msgr_lg"> </span>

                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="product_category">Duration Week</label>

                        <div class="col-md-6">
                            
                        <?php if(isset($layawayinfo)): ?>
                            <input type="text" id=""  name="duration_weeks" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['durationweeks']?>"  <?php if(isset($layawayinfo)) echo 'readonly'?> required >
                        <?php else: ?>
                            <select id=""  name="duration_weeks" class="form-control" required >
                              <option value="" selected disabled hidden>Choose Week Duration</option>
                              <?php for($wk = 1; $wk <= 52; $wk++):?>
                                <option value="<?= $wk ?>"><?= $wk ?> Week</option>
                              <?php endfor; ?>
                            </select>
                        <?php endif; ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="col-md-6 control-label" for="">Service Fee </label>

                                <div class="col-md-12">
                                    <input type="number" id="" min="0" name="service_fee" class="form-control" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['servicefee']?>" required >
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="col-md-6 control-label" for="save_name">Cancellation Fee </label>

                                <div class="col-md-12">

                                    <input type="number" id=""  name="cancellation_fee" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['cancellationfee']?>" required >

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="col-md-6 control-label" for="">Down Payment in Amount</label>

                                <div class="col-md-12">
                                    <input type="number" id=""  name="down_payment" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['downpayment']?>" required >
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="col-md-6 control-label" for="save_name">Down Payment in % </label>

                                <div class="col-md-12">

                                    <input type="number" id="" max="100" name="downpayment_percent" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['downpaymentpercent']?>" required >

                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label class="col-md-6 control-label" for="">Payment Plan</label>

                                <div class="col-md-12">
                                    <input type="number" id=""  name="payment_plain" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['paymentplan']?>" required >
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label class="col-md-6 control-label" for="save_name">Min Order </label>

                                <div class="col-md-12">

                                    <input type="number" id=""  name="min_order" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($layawayinfo)) echo $layawayinfo['minorder']?>" required >

                                </div>

                            </div>
                        </div>

                    </div>

                    <?php if(isset($layawayinfo)): ?>

                        <input type="hidden" name="id" readonly value="<?php if(isset($layawayinfo)) echo $layawayinfo['id']?>"  >

                    

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Status</label>
                        <div class="col-md-7">
                            <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" id="customRadioInline5" name="status"  required=""  <?php if($layawayinfo['status']==1) echo 'checked';?> value="1" class="custom-control-input">
                                <label class="custom-control-label  text-success" for="customRadioInline5">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6"name="status"  required=""  <?php if($layawayinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
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

            
                               
                           
