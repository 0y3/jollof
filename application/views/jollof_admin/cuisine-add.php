
    
        <div class=" col-md-12">

                <?php
                    if(isset($cuisineinfo))
                    { 
                        $action='categoryupdate';
                        $savename='Update';
                    }
                    else{ 
                        $action='categorysave';
                        $savename='Save';

                    }
                ?>

                <form id="cate_form" action="<?= site_url('jollofadmin/cuisine/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="save_name">Cuisine Category Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="categoryname" class="form-control" placeholder="" value="<?php if(isset($cuisineinfo)) echo $cuisineinfo['categoryname']?>" required >

                        </div>

                    </div>

                    
                    
                    <?php if(isset($cuisineinfo)): ?>
                    

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Sort Orders</label>

                        <div class="col-md-7">

                            <input type="number" id="" min="1" name="arrangecategory" class="form-control" placeholder="" value="<?php if(isset($cuisineinfo)) echo $cuisineinfo['arrangecategory']?>" required >

                            <input type="hidden" id=""  name="id" class="form-control" value="<?php if(isset($cuisineinfo)) echo $cuisineinfo['id']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Status</label>

                        <div class="col-md-7">

                            <select name="status" id="slider_type" class="form-control" required="">
                                 <option value="1" <?php if($cuisineinfo['status']==1 ) echo 'selected' ?>>Active</option>
                                 <option value="0" <?php if($cuisineinfo['status']==0 ) echo 'selected' ?>>In-Active</option>
                                
                            </select>

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
                               
                           
