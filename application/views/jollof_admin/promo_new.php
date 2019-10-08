
    
        <div class=" col-md-12">
            <h5 class="modal-title text-left"><?=$title_type ?> </h5>
            <hr>


                <?php
                    if(isset($promoinfo))
                    { 
                        $action='edit';
                        $savename='Update';
                    }
                    else{ 
                        $action='save';
                        $savename='Save';

                    }
                ?>
                <form id="promo_data" action="<?= site_url('cuisineadmin/promos/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Promo Type</label>
                                <select name="promotype" id="promo_type" class="form-control" required="">

                                    <?php if(!empty($cate)): ?>
                                        <option value="">Choose Promo Type..</option>
                                            
                                            <?php foreach ($cate as $cate_list) :?>
                                                
                                                <?php if(isset($promoinfo)): ?>
                                        
                                                    <?php if($promoinfo->bannertypeid == $cate_list['id']): ?>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Duration</label>
                                <select id="duration_select" name="promo_duration" class="form-control" data-placeholder="" value=""  required="">
                                    <?php if(isset($promoinfo)): ?>
                                        <option value="">Choose Promo Duration..</option>
                                        <?php foreach ($promoprice as $price_list) :?>
                                            <?php if($promoinfo->promodurationid == $price_list->promodurationid): ?>
                                                <option value="<?=$price_list->promodurationid ?>" selected="" data-durationprice="<?=$price_list->price ?>"> <?=$price_list->durationname ?></option>
                                            <?php else: ?>
                                                <option value="<?=$price_list->promodurationid?>" data-durationprice="<?=$price_list->price ?>"> <?=$price_list->durationname ?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        <option value="">Select Promo Type First</option> 
                                    <?php endif; ?>
                                </select>
                                <span class="help-block">
                                    <small id="duration_price">
                                        <b>Price for <span class="dur_type text-success" style="font-weight:600;"></span> : </b><span class="dur_price text-success" style="font-weight: bold;"></span>
                                    </small>
                                </span>
                                <!--<span class="text-dangerr" id="duration_price"><b>Price for <span class="dur_type"></span>: </b><span class="dur_price"></span> </span>-->
                            </div>
                        </div>

                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Date To Start </label>
                                <input name="promo_date" type="date" value="<?php if(isset($promoinfo)) echo date('d-m-Y',strtotime($promoinfo->startdate))?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <label class="control-label">Promo Options</label>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Social Media </label>
                                        <span class="help-block">
                                            <small>&nbsp; Price : </small><b class="text-success">₦<?= number_format($admin_info->socialpromoprice,2);?></b>
                                        </span>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input emailcheckbox" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Email </label>
                                        <span class="help-block">
                                            <small>&nbsp; Price : </small><b class="text-success">₦<?= number_format($admin_info->emailpromoprice,2);?></b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="emailtext_description" name="emailpromo_text" class="form-control address_loc emailtext" rows="2" placeholder="Enter Text for Email promo option "></textarea>
                                </div>
                                </div>
                        </div>

                        <!--/span-->
                    </div>
                    
                    <h5 class="card-title m-t-40"> Personal Info</h5>
                    <hr>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Name</label>
                                <input name="promo_name" type="text" id="name" class="form-control" placeholder="John doe" value="<?php if(isset($promoinfo)) {echo $promoinfo->firstname.' '.$promoinfo->lastname ; }else{ echo $_SESSION['firstname'].' '.$_SESSION['lastname']; } ?> " required="" readonly="">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Email</label>
                                <input name="promo_email" type="email"  id="email" class="form-control form-control-danger" value="<?php if(isset($promoinfo)) {echo $promoinfo->email ; }else{ echo $_SESSION['email']; } ?> " placeholder="example@info.com" required="" readonly="">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">phone</label>
                                <input name="promo_phone" type="text" id="phone" class="form-control" value="<?= $_SESSION['email']?>" placeholder="+(____) (___) (____) (___)" required="" readonly="">
                            </div>
                        </div>
                    </div>
                    -->
                    
                    <h5 class="card-title m-t-40"> Promo Image</h5>
                    <hr>
                     
                    <div class="row p-t-20">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Promo Url</label>
                                <input name="promo_url" type="url" value="<?php if(isset($promoinfo)) echo $promoinfo->imageurl ?>"  class="form-control" placeholder="https://" >
                            </div>
                        </div>
                        <!--/span-->
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Promo Image Size<span class="banner_txt"></span> Min Size: 2MB</label>
                                <div id="crop_imagediv">
                                    
                                    <div class="O_Uplode action">
                                       <input type="file" name="promo_image" accept="image/*" id="file" class="form-control form-input form-style-base">
                                        <!--<input type="file" name="promo_image" accept="image/*" onchange="GetUpload_banner(this);" id="base-input_banner" class="form-control form-input form-style-base">
                                        --><input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                                        <span class="fas fa-upload UplodeIcon"></span>
                                    </div>

                                    <div class="banner_UploadView stepshide">
                                        <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                                        <div class="imageBox ">
                                            <div class="thumbBox "></div>
                                            <div class="spinnerr" style="display: none">Loading...</div>
                                        </div>
                                    </div>
                                    
                                    <div class="banner_UploadView" style=" display: none">
                                        <div class="action cropbtn stepshide">
                                            <p><b>Step 3:</b>Click Crop to preview the cropped region<p>
                                            <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Crop" style="float: leftt">
                                            <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                            <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away style="float: leftt">
                                        </div>
                                        <div class="cropped" style=" position: relative;">
                                            
                                        </div>
                                    </div>
                                    <div class="promo_saveimg" style=" position: relative;">
                                        <?php if(isset($promoinfo)): ?>
                                            <img id="Viewcrop_banner" class="Viewcrop_banner"src="<?=site_url('assets/jollof_banners/'.$promoinfo->usertype.'_banner/'.$promoinfo->imagename) ?>" >
                                            <span id="Gp_rmv_banner" class="Gp_rmv_banner Removepromosaveimage" data-placement="top" data-toggle="tooltip" title="Remove Cover pics">
                                                <i class="far fa-trash-alt"></i>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <input type="hidden" name="promoid" value="<?php if(isset($promoinfo)) echo $promoinfo->id ?>">
                    <div class="form-group form-actions">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="btn btn-success sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; <?= $savename?> &nbsp; </button>

                        </div>

                    </div>

                </form>
            </div>
                               
                           

      