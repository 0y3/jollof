
    
        <div class=" col-md-12">
            <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>

                <?php
                    if(isset($sizeinfo))
                    { 
                        $action='fashionsubcategoryattributesedit';
                        $savename='Update';
                    }
                    else{ 
                        $action='fashionsubcategoryattributesadd';
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

                    

                    
                    
                    <?php if(isset($sizeinfo)): ?>
                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Attribute Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="save_name" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['categoryname']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Sort Orders</label>

                        <div class="col-md-7">

                            <input type="number" id="" min="1" name="arrangecategory" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['arrangecategory']?>" required >

                            <input type="hidden" id=""  name="id" class="form-control" value="<?php if(isset($sizeinfo)) echo $sizeinfo['id']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Status</label>

                        <div class="col-md-7">

                            <select name="status" id="slider_type" class="form-control" required="">
                                 <option value="1" <?php if($sizeinfo['status']==1 ) echo 'selected' ?>>Active</option>
                                 <option value="0" <?php if($sizeinfo['status']==0 ) echo 'selected' ?>>In-Active</option>
                                
                            </select>

                        </div>

                    </div>
                    <?php else: ?>

                    <div class="form-group">


                        <label class="col-md-3 control-label" for="product_category">Category</label>

                        <div class="col-md-7">

                            <select  id="parent_category" class="form-control" name="parent_category" required="" <?php if(isset($sizeinfo)) echo 'disabled'?> >

                                <?php if(!empty($catelist)): ?>

                                    <option value="">Choose Size Category..</option>

                                        <?php foreach ($catelist as $cate_list) :?>
                                            <?php if(isset($sizeinfo)): ?>
                                                <?php if($sizeinfo['id'] == $cate_list['id']): ?>
                                                <option value="<?= $cate_list['id'] ?>" selected="" ><?= $cate_list['categoryname'] ?></option>
                                                <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['categoryname'] ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <option value="<?= $cate_list['id'] ?>" ><?= $cate_list['categoryname'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    <?php else: ?>

                                        <option > Size Category not available</option>

                                <?php endif; ?>


                            </select>

                        </div>

                    </div>

                    <div class="form-group">


                        <label class="col-md-3 control-label" for="product_category">Sub Category</label>

                        <div class="col-md-7">

                            <select  id="sub_category" name="sub_category" class="form-control" required="">
                                <option > Size Category not available</option>
                            </select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Attribute Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="save_name" class="form-control" placeholder="" value="<?php if(isset($sizeinfo)) echo $sizeinfo['categoryname']?>" required >

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
            
            $('#parent_category').on('change',function(){
            
                var cateID = $(this).val();

                if(cateID){
                    $.ajax({
                        type:'POST',
                        url:'<?= site_url('super_admin/get_sub_category_byid') ?>',
                        data:'cateid='+cateID,
                        success:function(html){
                            $('#sub_category').html(html);
                        }
                    }); 
                }else{
                    $('#sub_category').html('<option value="">Select Category first</option>'); 
                }
            });
        </script>
                               
                           
