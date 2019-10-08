
    
        <div class=" col-md-12">
            <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>


                <form id="cate_form" action="<?= site_url('jollofadmin/fashion/sizeeditupdate') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="form-group">


                        <label class="col-md-3 control-label" for="product_category">Size Category</label>

                        <div class="col-md-7">

                            <select  id="slider_type" class="form-control" disabled="">

                                <?php if(!empty($catelist)): ?>

                                    <option value="">Choose Size Category..</option>

                                        <?php foreach ($catelist as $cate_list) :?>
                                            <?php if(isset($sizeinfo)): ?>
                                                <?php if($sizeinfo['sizecategoryid'] == $cate_list['id']): ?>
                                                <option value="<?= $cate_list['id'] ?>" selected="" ><?= $cate_list['sizecategory'] ?></option>
                                                <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['sizecategory'] ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['sizecategory'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    <?php else: ?>

                                        <option > Size Category not available</option>

                                <?php endif; ?>


                            </select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Size Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="sizename" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['sizename']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Size Code</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="sizecode" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['sizecode']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Size Orders</label>

                        <div class="col-md-7">

                            <input type="number" id="" min="1" name="arrange" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['arrange']?>" required >

                            <input type="hidden" id=""  name="id" class="form-control value="<?php if(isset($sizeinfo)) echo $sizeinfo['id']?>" required >

                        </div>

                    </div>

                    
                    
                    <?php if(isset($sizeinfo)): ?>
                    <div class="form-group">

                        <label class="col-md-3 control-label" >Status</label>

                        <div class="col-md-7">

                            <select name="status" id="slider_type" class="form-control" required="">
                                 <option value="1" <?php if($sizeinfo['status']==1 ) echo 'selected' ?>>Active</option>
                                 <option value="0" <?php if($sizeinfo['status']==0 ) echo 'selected' ?>>In-Active</option>
                                
                            </select>

                        </div>

                    </div>
                    <?php endif; ?>

                    <div class="form-group form-actions">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="btn btn-success sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; Update &nbsp; </button>

                        </div>

                    </div>

                </form>
            </div>
                               
                           
