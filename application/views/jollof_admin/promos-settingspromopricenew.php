
    
        <div class=" col-md-12">

                <?php
                    if(isset($priceinfo))
                    { 
                        $action='promopricingedit';
                        $savename='Update';
                    }
                    else{ 
                        $action='promopricingadd';
                        $savename='Save';

                    }
                ?>

                <form id="cate_form" action="<?= site_url('jollofadmin/promos/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    

                    
                    
                    

                    <div class="form-group">


                        <label class="col-md-3 control-label" for="product_category">Display Section </label>

                        <div class="col-md-7">

                            <select  id="banner_category" class="form-control" name="bannertypeid" required="" <?php if(isset($priceinfo)) echo 'disabled'?> >

                                <?php if(!empty($catelist)): ?>

                                    <option value="">Choose Display Section..</option>

                                        <?php foreach ($catelist as $cate_list) :?>
                                            <?php if(isset($priceinfo)): ?>
                                                <?php if($priceinfo['bannertypeid'] == $cate_list['id']): ?>
                                                <option value="<?= $cate_list['id'] ?>" selected="" ><?= $cate_list['bannertypename'] ?></option>
                                                <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['bannertypename'] ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['bannertypename'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    <?php else: ?>

                                        <option> Display Section not available</option>

                                <?php endif; ?>


                            </select>

                        </div>

                    </div>

                    <div class="form-group">


                        <label class="col-md-3 control-label" for="">Duration</label>

                        <div class="col-md-7">

                            <select  id="promo_duration" name="promodurationid" class="form-control" required="" <?php if(isset($priceinfo)) echo 'disabled'?>>
                                <?php if(!empty($duraction)): ?>

                                    <option value="">Choose Durationn..</option>

                                        <?php foreach ($duraction as $duraction_list) :?>
                                            <?php if(isset($priceinfo)): ?>
                                                <?php if($priceinfo['promodurationid'] == $duraction_list['id']): ?>
                                                <option value="<?= $duraction_list['id'] ?>" selected="" ><?= $duraction_list['durationname'] ?></option>
                                                <?php else: ?>
                                                <option value="<?= $duraction_list['id'] ?>" ><?= $duraction_list['durationname'] ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?= $duraction_list['id'] ?>" ><?= $duraction_list['durationname'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    <?php else: ?>

                                        <option> Duration not available</option>

                                <?php endif; ?>
                            </select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Price </label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="price" class="form-control cu_phone_js" placeholder="" value="<?php if(isset($priceinfo)) echo $priceinfo['price']?>" required >

                        </div>

                    </div>

                    <?php if(isset($priceinfo)): ?>

                        <input type="hidden" name="id" readonly value="<?php if(isset($priceinfo)) echo $priceinfo['id']?>"  >

                    <div class="form-group">
                        <label class="col-md-3 control-label" >Status</label>
                        <div class="col-md-7">
                            <div class="custom-control custom-radio custom-control-inline ">
                                <input type="radio" id="customRadioInline5" name="status"  required=""  <?php if($priceinfo['status']==1) echo 'checked';?> value="1" class="custom-control-input">
                                <label class="custom-control-label  text-success" for="customRadioInline5">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6"name="status"  required=""  <?php if($priceinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
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

            
                               
                           
