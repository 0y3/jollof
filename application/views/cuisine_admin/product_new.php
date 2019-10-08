
<?php
    if(isset($productinfo))
    { 
        $action='edit/'.$productinfo[0]['id'];
        $savename='Update';
    }
    else{ 
        $action='add';
        $savename='Save';

    }
?>
<div id="cuisinenewproduct" class="col-lg-12 ">
    <form id="product_form" action="<?= site_url('cuisineadmin/products/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

        <div class="form-body">
            <h5 class="card-title">Menu Details</h5>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Product Name</label>
                        <input name="product_name" type="text" id="productname" class="form-control" placeholder="Enter Product Name" value=" <?php if(isset($productinfo)) echo $productinfo[0]['productname'] ?>" required=""> 
                    </div>
                </div>
                
                <!--/span-->
            </div>
            <!--/row-->

            <div class="row">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label class="control-label">Short Product Description</label>
                        <textarea name="product_shortdesc" cols="50" rows="3" class="form-control"><?php if(isset($productinfo)) echo $productinfo[0]['productdesc'] ?></textarea> 
                    </div>
                </div>
            </div>

            <!--/row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select id="product-category" name="product_category" class="form-control select-chosen" data-placeholder="Choose Category.."  required="">
                            
                            <?php if(!empty($cate)): ?>
                                    <option>Choose Category..</option>
                                    
                                    <?php foreach ($cate as $cate_list) :?>
                                        <?php if(isset($productinfo)): ?>
                                            <?php if($productinfo[0]['category_id'] == $cate_list->id): ?>
                                                <option value="<?= $cate_list->id ?>" selected="" ><?= $cate_list->categoryname ?></option>
                                                <?php else: ?>
                                                <option value="<?= $cate_list->id ?>" ><?= $cate_list->categoryname ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="<?= $cate_list->id ?>"><?= $cate_list->categoryname ?></option>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option > Category not available</option>

                            <?php endif; ?>
                            
                            
                        </select> 
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="far fa-money-bill-alt"></i></span>
                            </div>
                            <input type="text" id="product-price" name="product_price" class="form-control cu_phone_js prd_pri" placeholder="0,000" value="<?php if(isset($productinfo)) echo $productinfo[0]['productprice'] ?>" required="">
                        </div>
                </div>
                <!--/span-->
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Image</label>

                        <div class="col-md-12">

                            <b>Image Size:- 100px by 100px Min Size: 2MB</b>
                            <div class="O_Uplode action">
                               <input type="file" name="product_image" accept="image/*" id="file" class="form-control form-input form-style-base" >
                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                               <span class=" fas fa-upload UplodeIcon"></span>
                            </div>

                            <div class="banner_UploadView stepshide">
                                <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                                <div class="imageBox cuisineproductimgcover">
                                    <div class="thumbBox cuisineproductimg"></div>
                                    <div class="spinnerr" style="display: none">Loading...</div>
                                </div>


                            </div>
                            <div class="banner_crop " style=" display: none">
                                <div class="action cropbtn stepshide">
                                    <p><b>Step 3:</b>Click Crop to preview the cropped region<p>
                                    <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Save" style="float: leftt">
                                    <input type="button" class="btn btn-sm btn-danger Removecrop" id="btnCrop" value="Delete" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away style="float: leftt">
                                </div>
                                <div class="cropped" style=" position: relative;">
                                    
                                </div>
                            </div>
                            <div class="product_saveimg" style=" position: relative;">
                                <?php if(isset($productinfo)): ?>
                                    <img id="Viewcrop_banner" class="Viewcrop_banner" src="<?=site_url('assets/uploads/rest_prod/'.$productinfo[0]['productimage']) ?> "  width="120px" height="100%" >
                                    <span id="Gp_rmv_banner" class="Gp_rmv_banner Removecrop" data-placement="top" data-toggle="tooltip" title="Remove Cover pics">
                                        <i class="far fa-trash-alt"></i>
                                    </span>
                                <?php endif; ?>
                            </div>
                       </div>
                </div>
                <!--/span-->
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Status</label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="product_status" value="1" class="custom-control-input" required="" <?php if(isset($productinfo)) { if($productinfo[0]['status']==1 ) {echo 'checked';}} ?> >
                    <label class="custom-control-label  text-success" for="customRadioInline1">Publish</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="product_status" value="0" class="custom-control-input" required="" <?php if(isset($productinfo)) { if($productinfo[0]['status']==0 ) {echo 'checked'; } } ?>>
                    <label class="custom-control-label" for="customRadioInline2">Draft</label>
                </div>
            </div>
        </div>

    </div>

    <hr>
    <div class="d-flex no-block align-items-center m-t-20 m-b-30">
        <h4 class="card-title">Additional Menu</h4>
        <?php if(isset($productinfo)): ?>
        <div class="ml-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel_addedproduct">
                     New Additional Product
                </button>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php if(isset($productinfo)): ?>
        <div id="added_productlist">
        <?php foreach ($productinfo[0]['added_product'] as $added_list) :?>
        <div class="col-md-12 ">
            <div class="row form-group">
                 <input type="hidden" name="addproduct_id[]" class="form-control" required="" value="<?= $added_list['id'] ?>" >
                 <input type="hidden" name="addproduct_childid[]" class="form-control" required="" value="<?= $added_list['childproductid'] ?>" >
                <div class="col-md-6">
                            
                   <input type="text" id="product-name" name="addproduct_name[]" class="form-control" placeholder="Enter Additional Menu Name.." required=""  value="<?= $added_list['childproductname'] ?>"  >
                </div>

                <div class="col-md-5">

                    <div class="input-group">

                        <div class="input-group-addon"><i class="fa fa-money"></i></div>

                        <input type="text" id="product-price" name="addproduct_price[]" class="form-control cu_phone_js" placeholder="0,000" value="<?= $added_list['price'] ?>" required="" >
                        
                        <span class="input-group-btn">
                            <a href="" class="btn btn-danger prd_delete" data-product_id="<?= $added_list['id'] ?>" data-product_name="<?= $added_list['childproductname'] ?>" data-parentproduct_id="<?= $added_list['parentproductid'] ?>" data-toggle="tooltip" title="Delete Additional Product" type="button">
                                <i class="far fa-trash-alt" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        </div>

    <?php else: ?>
    <div class="row addmenudiv">
        <div class="col-md-12 entry">
            <div class="row form-group">
                <div class="col-md-6">
                            
                   <input type="text" id="product-name" name="addproduct_name[]" class="form-control" placeholder="Enter Additional Menu Name.." required="" >
                </div>

                <div class="col-md-5">

                    <div class="input-group">

                        <div class="input-group-addon"><i class="fa fa-money"></i></div>

                        <input type="text" id="product-price" name="addproduct_price[]" class="form-control cu_phone_js" placeholder="0,000"  required="">
                        
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 entrycopy">
            <div class="row form-group">
                <div class="col-md-6">
                            
                   <input type="text" id="product-name" name="addproduct_name[]" class="form-control" placeholder="Enter Additional Menu Name.." required="" >
                </div>

                <div class="col-md-5">

                    <div class="input-group">

                        <div class="input-group-addon"><i class="fa fa-money"></i></div>

                        <input type="text" id="product-price" name="addproduct_price[]" class="form-control cu_phone_js" placeholder="0,000" required="" >
                        
                        <span class="input-group-btn">
                            <button class="btn btn-danger btn-remove" type="button">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
                
                
                <!--<div class="input_fields_container">
                    <div><input type="text" name="addproduct_name[]">
                         <button class="btn btn-sm btn-primary add_more_button">Add More Fields</button>
                    </div>
                </div> -->
                 
                
                
                <br>
                <small>Press &nbsp; <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; to add another <b>Menu</b> and </small>
                <small>&nbsp; <i class="fa fa-times" aria-hidden="true"></i> &nbsp; to remove <b>Menu</b> field </small>

        
        <!--/span-->
    </div>
    <!--/row-->
     <?php endif; ?>
        
        <div class="form-actions m-t-40">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> <?= $savename?> </button>
        </div>
    </form>
</div>
<div class="ajax-loader">
   <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
</div>

<?php if(isset($productinfo)): ?>
<!-- Create New Variant Modal -->
            <div class="modal fade" id="createmodel_addedproduct" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="addedproduct_data" action=" method="post" >
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> New Additional Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden"  class="form-control" name="modal_additional_productid" value="<?= $productinfo[0]['id'] ?> ">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" name="modal_additional_productname" required="" placeholder="Enter Product Name Here" aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="far fa-money-bill-alt"></i></button>
                                    <input type="text" class="form-control cu_phone_js" name="modal_additional_productprice" required=""  placeholder="Enter Product Price Here" aria-label="no">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success save_addedproduct_modal"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal confirm delete submenu Product -->
            <div class="modal fade" id="modal_conf" tabindex="-1" role="dialog" aria-labelledby="Product view" aria-hidden="true" >
                <div class="modal-dialog">
                            <div class="modal-content">

                                    <div class="modal-body" >
                                        <div class="alert alert-danger" id="confirmMessage"> </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" id="confirmOk">Ok</button>
                                        <button type="button" class="btn btn-success" id="confirmCancel">Cancel</button>
                                    </div>

                            </div>
                    </div>
            </div>

 <?php endif; ?>
                                
<script type="text/javascript">
    $(document).ready(function() {
        
        function Removecrop_banner() {
        
            $('.Viewcrop_banner').attr('src', '');
            $('#Viewcrop_banner').remove();
            $('#Gp_rmv_banner').remove();
            $('#fake-input_banner').val('Step 1: Choose your Image');
            $('.banner_UploadView').hide();
            $('.savebtn').hide();
            $('.banner_crop').hide();
        }
        
    });
    
    
    
        
            
    $('input[id=base-input]').change(function() {
        $('.Prd_UploadView').show();
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    
    

</script>                        