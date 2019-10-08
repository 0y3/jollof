<style>
    .save_name:valid { text-transform: uppercase; }
</style>
    
        <div class=" col-md-12">
            <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>


                <?php
                    if(isset($colorinfo))
                    { 
                        $action='colorvariantupdate';
                        $savename='Update';
                    }
                    else{ 
                        $action='colorvariantsave';
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

                        <label class="col-md-3 control-label" for="save_name">Color Name</label>

                        <div class="col-md-7">

                            <input type="text" id=""  name="colorname" class="form-control save_name" placeholder="" value="<?php if(isset($colorinfo)) echo $colorinfo['colorname']?>" required >

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-md-3 control-label" >Color Code</label>

                        <div class="col-md-7">
                            <div id="" class="save_code input-group colorpicker-component" >
                                <input id="" name="save_code" type="text" class="save_code form-control " value="<?php if(isset($colorinfo)) echo $colorinfo['colorcode']?>" required=""/>
                                <span class="input-group-addon"><i></i></span>
                            </div>

                        </div>

                    </div>

                    
                    
                    <?php if(isset($colorinfo)): ?>
                    <div class="form-group">

                        <label class="col-md-3 control-label" >Status</label>

                        <div class="col-md-7">

                            <select name="status" id="slider_type" class="form-control" required="">
                                 <option value="">Choose User Type..</option>
                                 <option value="1" <?php if($colorinfo['status']==1 ) echo 'selected' ?>>Active</option>
                                 <option value="0" <?php if($colorinfo['status']==0 ) echo 'selected' ?>>In-Active</option>
                                
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
            $(function () {
              $('.save_code').colorpicker({
                useHashPrefix: false,
                format: "hex"
                //color : "#"
              });
            });
            
        </script>