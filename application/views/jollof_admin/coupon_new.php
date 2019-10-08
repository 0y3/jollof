
<?php
    if(isset($couponinfo))
    { 
        $action='edit/'.$couponinfo['id'];
        $savename='Update';
    }
    else{ 
        $action='save';
        $savename='Save';

    }
?>
<div id="cuisinenewproduct" class="col-lg-12 ">
    <form id="product_form" action="<?= site_url('jollofadmin/coupon/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

        <div class="form-body">
            <h5 class="card-title">General Data</h5>
            <hr>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Coupon Name</label>
                        <input name="couponname" type="text" id="couponname" class="form-control" placeholder="Enter A Coupon Name" required="" value="<?php if(isset($couponinfo)) echo $couponinfo['couponname'] ?>" > 
                    </div>
                </div>
                <?php if(isset($couponinfo)): ?>
                        
                <div class="col-sm-6">
                   <div class="form-group">
                        <label class="control-label">Coupon Code</label>
                        <input  type="text" id="couponname" class="form-control" placeholder="Enter A Coupon Name" readonly="" value="<?php if(isset($couponinfo)) echo $couponinfo['couponcode'] ?>" > 
                    </div>
                </div>

                <?php else: ?>

                <div class="col-md-6">
                    <label class="control-label">Coupon Code</label>
                    <div class="input-group  mb-3">
                        <input type="text" name="couponcode" id="couponcode" class="form-control" placeholder="Enter A Coupon Code" value="" required=""  aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <a href="javascript:void(0)" class="btn btn-info btn-sm couponcodegen" type="">Generate Code!</a>
                        </div>
                    </div>
                </div>

                <?php endif; ?>
                
                <!--/span-->
            </div>
            <!--/row-->

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Coupon Type</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="coupontype" value="1" class="custom-control-input" required="" <?php if(isset($couponinfo)) { if($couponinfo['couponisamount']==1 ) {echo 'checked';}} ?> >
                            <label class="custom-control-label " for="customRadioInline1">Amount "₦"</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="coupontype" value="2" class="custom-control-input" required="" <?php if(isset($couponinfo)) { if($couponinfo['couponisper']==1 ) {echo 'checked'; } } ?>>
                            <label class="custom-control-label" for="customRadioInline2">Percentage "%"</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Discount Off</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-money-bill-alt"></i></span>
                            </div>
                            <input type="number" id="discount" min="1" name="coupondiscount" class="form-control" value="<?php if(isset($couponinfo)) echo $couponinfo['coupondiscount'] ?>" required="">
                        </div>
                    </div>
                        <!--/span-->
                </div>

                

            </div>

            <!--/row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Coupon State & End Date</label>
                        <h6 class="card-subtitle">Date ranges- show the Start & End Calendar.</h6>
                        <div class='input-group mb-3'>
                            <input type='text' hidden="" name="couponstartdate" class="form-control couponstartdate" required="" value="<?php if(isset($couponinfo)) echo date("Y-m-d", strtotime($couponinfo['datestart'])) ?>" >
                            <input type='text' hidden="" name="couponenddate" class="form-control couponenddate" required="" value="<?php if(isset($couponinfo)) echo  date("Y-m-d", strtotime($couponinfo['dateend'])) ?>" >
                            <input type='text' name="stateenddate" class="form-control shawCalRanges" required="" value="<?php if(isset($couponinfo)){ echo date("Y-m-d", strtotime($couponinfo['datestart'])).' - '. date("Y-m-d", strtotime($couponinfo['dateend']) ); }?>" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="ti-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--/span-->
            </div>

            <hr>

            <div class="d-flex no-block align-items-center m-t-20 m-b-30">
                <h4 class="card-title">Coupon Usage Restriction</h4>
            </div>
            <!--/row-->
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label> Min Amount in Cart</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-money-bill-alt"></i></span>
                            </div>
                            <input type="number" id="minamount" min="1" name="minamount" class="form-control" value="<?php if(isset($couponinfo)) echo $couponinfo['minamount'] ?>" required="">
                        </div>
                    </div>
                        <!--/span-->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Coupon Applied To Guest User</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="couponguest" value="1" class="custom-control-input" required="" <?php if(isset($couponinfo)) { if($couponinfo['couponforguestalso']==1 ) {echo 'checked';}} ?> >
                            <label class="custom-control-label text-success" for="customRadioInline3">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="couponguest" value="0" class="custom-control-input" required="" <?php if(isset($couponinfo)) { if($couponinfo['couponforguestalso']==0 ) {echo 'checked'; } } ?>>
                            <label class="custom-control-label" for="customRadioInline4">No</label>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Usage Limit per Coupon</label>
                        <input name="usagecoupon" type="number" min="0" id="couponname" class="form-control" value="<?php if(isset($couponinfo)) echo $couponinfo['numofuserspercoupon'] ?>" required=""> 
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="control-label">Usage Limit per User</label>
                    <input name="usageuser" type="number" min="0" id="couponname" class="form-control" value="<?php if(isset($couponinfo)) echo $couponinfo['couponusageperuser'] ?>" required=""> 
                </div>

                <?php if(isset($couponinfo)): ?>

                        
                <div class="col-sm-6">
                    <label>Status</label>
                    <br>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline5" name="status" value="1" class="custom-control-input" required="" <?php if($couponinfo['status']==1) echo 'checked';?> >
                        <label class="custom-control-label  text-success" for="customRadioInline5">Active</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline6" name="status"  required=""  <?php if($couponinfo['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                        <label class="custom-control-label text-danger" for="customRadioInline6">In-Active</label>
                    </div>
                </div>

                <?php endif; ?>
                
                <!--/span-->
            </div>
            <!--/row-->

            </div>

        </div>

        

    

        
        <div class="form-actions m-t-40">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> <?= $savename?> </button>
        </div>
    </form>
</div>



                                
<script type="text/javascript">
    
    $('.couponcodegen').on('click',function(){
            
            $.ajax({
                type:'POST',
                url:'<?= site_url('jollofadmin/coupon/couponcode') ?>',
                dataType: 'json',
                //data:'stateid='+stateID,
                success:function(html){
                    $('input[name="couponcode"]').val(html.code);
                }
            }); 
        
    });
    

</script>                        