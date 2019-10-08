
    
        <div class=" col-md-12">
            <h5 class="modal-title text-left"><?=$title_type ?> </h5>
            <hr>


                <?php
                    if(isset($bannerinfo))
                    { 
                        $action='edit';
                        $savename='Update';
                    }
                    else{ 
                        $action='save';
                        $savename='Save';

                    }
                ?>
                <form id="banner_dataa" action="<?= site_url('jollofadmin/banners/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                            <div class="form-group">
                                <label class="control-label">Banner Type</label>
                                <select name="bannertype" id="promo_type" class="form-control" required="" <?php if(isset($bannerinfo)) echo 'disabled' ?> >

                                    <?php if(!empty($cate)): ?>
                                        <option value="">Choose Banner Type..</option>
                                            
                                            <?php foreach ($cate as $cate_list) :?>
                                                
                                                <?php if(isset($bannerinfo)): ?>
                                        
                                                    <?php if($bannerinfo['bannertypeid'] == $cate_list['id']): ?>
                                                        <option value="<?= $cate_list['id'] ?>" selected="" data-promowidth="<?= $cate_list['width'] ?>" data-promoheight="<?= $cate_list['height'] ?>" ><?= $cate_list['bannertypename'] ?></option>
                                                    <?php else: ?>
                                                        <option value="<?= $cate_list['id'] ?>" data-promowidth="<?= $cate_list['width'] ?>" data-promoheight="<?= $cate_list['height'] ?>" ><?= $cate_list['bannertypename'] ?></option>
                                                    <?php endif; ?>
                                                    
                                                <?php else: ?>
                                                    <option value="<?= $cate_list['id'] ?>" data-promowidth="<?= $cate_list['width'] ?>" data-promoheight="<?= $cate_list['height'] ?>" ><?= $cate_list['bannertypename'] ?></option>
                                                <?php endif; ?>
                                                
                                            <?php endforeach;?>
                                        <?php else: ?>

                                            <option > Promo Type not available</option>

                                    <?php endif; ?>

                                </select>
                            </div>

                        <!--/span-->
                     
                    <div class="row p-t-20">
                        <!--/span-->

                        <?php if(isset($bannerinfo)): ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Banners Order</label>
                                    <input name="arrangeimage" type="text" id="" class="form-control cu_phone_js" placeholder="Banner Order" value="<?=$bannerinfo['arrangeimage']?>" required=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="bannerstatus" <?php if($bannerinfo['status']==1) echo 'checked';?> value="1" class="custom-control-input">
                                        <label class="custom-control-label  text-success" for="customRadioInline1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="bannerstatus" <?php if($bannerinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">In-Active</label>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endif; ?>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Banner Image Size<span class="banner_txt"></span> Min Size: 2MB</label>
                                <div id="crop_imagediv">
                                    <div class="O_Uplode action">
                                       <input type="file" name="promo_image" accept="image/*" id="base-input_banner" class="form-control form-input form-style-base GetUpload">
                                        <!--<input type="file" name="promo_image" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base">
                                        --><input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/*">
                                        <span class="fas fa-upload UplodeIcon"></span>
                                    </div>
                                    <div class="UploadView" style="display: none; position: relative;">
                            
                                        <img class="UploadView_banner" src="" width="100%" height="100%" />
                                        <span id="Gp_rmv_banner" class="Gp_rmv_banner Removecrop" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="far fa-trash-alt"></i></span>
                                            
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <input type="hidden" name="bannerid" value="<?php if(isset($bannerinfo)) echo $bannerinfo['id'] ?>">
                    <div class="form-group form-actions">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="btn btn-success sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; <?= $savename?> &nbsp; </button>

                        </div>

                    </div>

                </form>
            </div>
                               
                           

      