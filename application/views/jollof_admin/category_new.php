
    
        <div class=" col-md-12">
            <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>


                <?php
                    if(isset($categoryinfo))
                    { 
                        $action='edit';
                        $savename='Update';
                    }
                    else{ 
                        $action='add';
                        $savename='Save';

                    }
                ?>
                <form id="cate_form" action="<?= site_url('cuisineadmin/categories/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" for="category_name">Category Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="category_name" class="form-control" placeholder="" value="<?php if(isset($categoryinfo)) echo $categoryinfo['categoryname']?>" required >

                        </div>

                    </div>


                    <?php if(isset($categoryinfo)): ?>
                    <div class="form-group">

                        <label class="col-md-3 control-label" >Category Order</label>

                        <div class="col-md-7">

                            <input type="number" name="category_order" class="form-control" min="1" value="<?php if(isset($categoryinfo)) echo $categoryinfo['arrangecategory']?>" required >

                        </div>

                    </div>
                    <input type="hidden" id="" name="category" class="form-control" value="<?php if(isset($categoryinfo)) echo $categoryinfo['id']?>" required >
                    <?php endif; ?>

                    <div class="form-group">
                        <div class="col-md-12">
                        <label>Category Status</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="category_status" value="1" <?php if(isset($categoryinfo)){ if($categoryinfo['categorystatus']==1 ) { echo 'checked';} } ?>  class="custom-control-input" required="">
                            <label class="custom-control-label  text-success" for="customRadioInline3">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="category_status" value="0" <?php if(isset($categoryinfo)){ if($categoryinfo['categorystatus']==0 ) { echo 'checked';} } ?> class="custom-control-input" required="">
                            <label class="custom-control-label" for="customRadioInline4">In-Active</label>
                        </div>
                        </div>
                    </div>
                    
                    
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