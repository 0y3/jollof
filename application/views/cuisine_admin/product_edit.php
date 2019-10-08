
<?php foreach ($productinfo as $products) :?>
                    <div class="col-lg-12">
                        <div class="">
                            <div class="">
                                <form action="#">
                                    <div class="form-body">
                                        <h5 class="card-title">About Product</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input name="product_name" type="text" id="productname" class="form-control" placeholder="Enter Product Name" value="<?=$products['productname']?>" required=""> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Brand Name</label>
                                                    <input name="product_brand" type="text" id="productname" class="form-control" placeholder="Enter Product Brand" value="<?=$products['brandname']?>" required=""> 
                                                </div>
                                            </div>
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <br>
                                                    <select id="category_list" name="category[]" multiple="multiple" required="">
                            
                                                        <?php if(!empty($cate)): ?>

                                                            <?php foreach ($cate as $cate_list) :?>
                                                                    
                                                                <optgroup label="<?= $cate_list['categoryname'] ?>" class="group-1">
                                                                    <option class="cate_opt" value="<?= $cate_list['id'] ?>" <?php if($cate_list['checkIt']== 'yes') echo 'selected'?> ><?= $cate_list['categoryname'] ?></option>

                                                                    <?php foreach ($cate_list['nav_cate_submenu'] as $subnavs) :?>

                                                                    <option class="cate_opt" value="<?= $subnavs['id'] ?>" <?php if($subnavs['checkIt']== 'yes') echo 'selected'?> ><?= $subnavs['categoryname'] ?></option>

                                                                            <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                                                <option class="cate_opt" value="<?= $submenunavs['id'] ?>" <?php if($submenunavs['checkIt']== 'yes') echo 'selected'?>><?= $submenunavs['categoryname'] ?></option>
                                                                            <?php endforeach; ?>

                                                                    <?php endforeach; ?>

                                                                </optgroup>
                                                                
                                                            <?php endforeach;?>
                                                            <?php else: ?>

                                                                <option > Category not available</option>

                                                        <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="product_status" <?php if($products['status']==1) echo 'checked';?> class="custom-control-input">
                                                        <label class="custom-control-label  text-success" for="customRadioInline1">Publish</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="product_status" <?php if($products['status']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline2">Draft</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Product On Sales</label>
                                                    <br>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline3" name="product_sales" <?php if($products['sales']==1) echo 'checked';?> class="custom-control-input">
                                                        <label class="custom-control-label  text-success" for="customRadioInline3">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline4" name="product_sales" <?php if($products['sales']==0) echo 'checked';?> value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadioInline4">In-Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-money-bill-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <h5 class="card-title m-t-40">Short Product Description</h5>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea name="product_shortdesc" cols="50" rows="3" class="form-control" required=""><?=$products['productshortdesc']?></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title m-t-40">Full Product Description</h5>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea name="product_desc" id="ckeditor" cols="50" rows="3" class="ckeditor product_desc"><?=$products['productdesc']?></textarea> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Title</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Keyword</label>
                                                    <input type="text" class="form-control"> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        
                                        <div class="row modal_prdimg">
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Upload Front Image</h5>
                                                <div class="el-element-overlay">
                                                    <div class="el-card-item">
                                                        <div class="el-card-avatar el-overlay-1"> 
                                                             <?php if(!empty($products['productfrontimage'])): ?>
                                                                
                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$products['productfrontimage'])?>" class="img-responsive" alt="<?= $products['productfrontimage']; ?>" >

                                                                <?php elseif (!empty($products['product_image'])): ?>

                                                                    <img src="<?= site_url('assets/uploads/fashion_prod/'.$products['product_image'][0]['imagename'])?>" class=" img-responsive" alt="<?= $products['product_image'][0]['imagename']; ?>" >

                                                                <?php else: ?>

                                                                    <img src="<?= site_url('assets/img/product_img_1.jpg')?>" class="img-responsive" alt="" >

                                                                <?php endif; ?>
                                                                <!--<img src="../../assets/images/gallery/chair3.jpg" alt="user">-->
                                                            <div class="el-overlay">
                                                                <ul class="list-style-none el-info">
                                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/gallery/chair3.jpg"><i class="sl-icon-magnifier"></i></a></li>
                                                                    <!--<li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="sl-icon-link"></i></a></li>-->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<div class="btn btn-info waves-effect waves-light">upload </div>-->
                                            </div>
                                            
                                            <div class="col-md-9">
                                                <div class="">
                                                    <fieldset class="form-group">
                                                        <a class="btn" href="<?= site_url('fashionadmin/products/newimage_form') ?>" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_imagee" data-container="modal_image" title="Add New Image"><i class="fa fa-upload"></i> <b>Upload Image</b></a>
                                                        <!--<a class="btn" href="javascript:void(0)" onclick="$('#pro-image').click()"><i class="fa fa-upload"></i> Upload Image</a>
                                                        <input type="file" id="pro-image" name="pro-image[]" accept="image/*" style="display: none;" class="form-control" multiple> -->
                                                    </fieldset>
                                                    <div class="preview-images-zone ui-sortable">
                                                        
                                                        <?php foreach ($products['product_image'] as $productimg) :?>
                                                        <div class="preview-image preview-show-<?= $productimg['id']?>">
                                                            <div class="image-cancel" data-no="<?= $productimg['id']?>" data-key="16_fR8h_product1531750672.jpg">x</div> 
                                                            <div class="image-zone">
                                                                <img id="pro-img-<?= $productimg['id']?>" src="<?= site_url('assets/uploads/fashion_prod/').$productimg['imagename']?>">  
                                                            </div>
                                                        </div>
                                                        <?php endforeach;?>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                            <div style=" display: none;">
                                                <input type="hidden" class="form-control" id="allcolor" name="product_colors"  placeholder="Enter Product Size Code or Name" />
                                                <input type="hidden" class="form-control" id="allsizes" name="product_sizes"  placeholder="Enter Product Size Code or Name"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- Column -->
                                            <div id="variant_datatable" class="col-md-12">
                                                <div class="card m-t-20">
                                                    <div class="card-body">
                                                        <div class="d-flex no-block align-items-center m-b-30">
                                                            <h4 class="card-title">All Product Inventory</h4>
                                                            <div class="ml-auto">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                                                        Create New Inventory
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table id="file_export" class="table table-bordered nowrap display">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Color Image</th>
                                                                        <th>Color Name</th>
                                                                        <th>Size</th>
                                                                        <th style="min-width:105px;">Price</th>
                                                                        <th style="min-width:105px;">Discount-off</th>
                                                                        <th style="min-width:105px;">In Stock</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($products['product_variant'] as $product_variant) :?>
                                                                    <tr>

                                                                        <td>
                                                                            <?php if(!empty($product_variant['colorimage'])): ?>
                                                                            
                                                                                <?php if($product_variant['colorname'] == 'White'): ?>
                                                                                <a href="javascript:void(0);"><img src="<?=site_url('assets/uploads/fashion_prod/thumbs/').$product_variant['colorimage']?>" alt="$product_variant['colorimage']" class="rounded-circle" width="30" /> 
                                                                                    <span class="label" style="color:#000;border: solid thin; background-color:#<?= $product_variant['colorcode']?>;"><?= $product_variant['colorname']?></span>
                                                                                </a>    
                                                                                <?php else: ?>
                                                                                <a href="javascript:void(0);"><img src="<?=site_url('assets/uploads/fashion_prod/thumbs/').$product_variant['colorimage']?>" alt="$product_variant['colorimage']" class="rounded-circle" width="30" /> 
                                                                                    <span class="label" style=" background-color:#<?= $product_variant['colorcode']?>;"><?= $product_variant['colorname']?></span>
                                                                                </a>
                                                                                <?php endif; ?>
                                                                            
                                                                            <?php else: ?>
                                                                                <div  style="position:absolute;">
                                                                                    <?php if($product_variant['colorname'] == 'White'): ?>
                                                                                        <a href="javascript:void(0);">
                                                                                            <span  class="color_span" style="background-color:#<?= $product_variant['colorcode']?>;"></span>
                                                                                            <span class="label colorname_span" style="background-color:#<?= $product_variant['colorcode']?>;color:#000;border: solid thin;"><?= $product_variant['colorname']?></span>
                                                                                        </a>
                                                                                    <?php else: ?>
                                                                                        <a href="javascript:void(0);">
                                                                                            <span  class="color_span" style="background-color:#<?= $product_variant['colorcode']?>;"></span>
                                                                                            <span class="label colorname_span" style="background-color:#<?= $product_variant['colorcode']?>"><?= $product_variant['colorname']?></span>
                                                                                        </a>
                                                                                    <?php endif; ?>

                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><a href="javascript:void(0);" class="editcolorname" data-_id="<?= $product_variant['id']?>" data-_varianttype="colorimagename" data-_variant="<?= $product_variant['colorimagename']?>"><i class="ti-pencil-alt"></i></a> &nbsp; <?= $product_variant['colorimagename']?></td>
                                                                        <td><b><?= $product_variant['sizecode']?></b> &nbsp; <?= $product_variant['sizename']?></td>
                                                                        <td><a href="javascript:void(0);" class="editprice" data-_id="<?= $product_variant['id']?>" data-_varianttype="price" data-_variant="<?= $product_variant['price']?>"><i class="ti-pencil-alt"></i></a> &nbsp; <?= $product_variant['price']?> </td>
                                                                        <td><a href="javascript:void(0);" class="editdiscount" data-_id="<?= $product_variant['id']?>" data-_varianttype="discount_price" data-_variant="<?= $product_variant['discount_price']?>"><i class="ti-pencil-alt"></i></a> &nbsp; <?= $product_variant['discount_price']?></td>
                                                                        <td><a href="javascript:void(0);" class="editdiscount" data-_id="<?= $product_variant['id']?>" data-_varianttype="productinstock" data-_variant="<?= $product_variant['productinstock']?>"><i class="ti-pencil-alt"></i></a> &nbsp; <?= $product_variant['productinstock']?></td>
                                                                        <td>
                                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn delete_variant" data-_id="<?= $product_variant['id']?>" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach;?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row -->
                                        
                                       
                                        <hr> </div>
                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        
<?php endforeach;?>

<!-- Product Price div-->
<div id="variant_order">
    <input type="number" data-cat_id="" data-cat_type="" name="new_variant_price" class="form-control numb cu_phone_js" min="1" value="" >
    <a  id="cat_order_save" class="btn btn-success btn-sm saveEditCategorie">
        <i class="far fa-save noSaveEdit" aria-hidden="true"></i>
    </a>
    <a href="" id="closeorder" class="btn btn-danger btn-sm ">
        <i class="fa fa-times" aria-hidden="true"></i>
    </a>
</div>

<!-- Product Price div-->
<div id="variant_discount">
    <input type="number" data-cat_id="" data-cat_type="" name="new_variant_discount" class="form-control numb cu_phone_js" min="0" value="" >
    <a  id="cat_order_save" class="btn btn-success btn-sm saveEditCategorie">
        <i class="far fa-save noSaveEdit" aria-hidden="true"></i>
    </a>
    <a href="" id="closediscount" class="btn btn-danger btn-sm ">
        <i class="fa fa-times" aria-hidden="true"></i>
    </a>
</div>


<!-- Product  Name div-->
<div id="variant_name">
    <input type="text" data-cat_id="" data-cat_type="" name="new_variant_name" class="form-control" value="" >
    <div>
    <a  id="cat_name_save" class="btn btn-success btn-sm saveEditCategorie">
        <i class="far fa-save noSaveEdit" aria-hidden="true"></i>
    </a>
    <a href="" id="closename" class="btn btn-danger btn-sm ">
        <i class="fa fa-times" aria-hidden="true"></i>
    </a>
    </div>
</div>

<!-- NEW Product Image Modal -->              
<div class="modal fade" id="modal_imagee" tabindex="-1" role="dialog" aria-labelledby="NEW Image view" aria-hidden="true" >
    
    <div class="modal-dialog modal_dialog_edit" role="document">
                        
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Product Image Editor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form id="productimg_form" action="<?= site_url('fashionadmin/products/productimagesave') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

                    <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">

                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                        <span class="error_msgr_lg"> </span>

                    </div>
                    </div>


                    <div class="form-group">

                        <label class="col-md-12 control-label " style=" text-align: left;"> Product Image Size &nbsp; <span class="banner_txt">570px by 570px</span> Min Size: 2MB</label>
                       <div class="col-md-12">


                            <div class="O_Uplode action">
                               <input type="file" name="product_image" accept="image/*" id="file" class="form-control form-input form-style-base">
                               <input type="text" id="fake-input_banner" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/*">
                               <span class=" fas fa-upload UplodeIcon"></span>
                            </div>

                            <div class="banner_UploadView stepshide">
                                <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                                <div class="imageBox productimgcover">
                                    <div class="thumbBox productimg"></div>
                                    <div class="spinnerr" style="display: none">Loading...</div>
                                </div>


                            </div>
                            <div class="banner_crop " style=" display: none">
                                <div class="action cropbtn stepshide">
                                    <p><b>Step 3:</b>Click Crop to preview the cropped region<p>
                                    <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Crop" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                    <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away style="float: leftt">
                                </div>
                                <div class="cropped" style=" position: relative;">

                                </div>

                            </div>



                       </div>

                    </div>



                    <div class="form-group form-actions">

                        <div class="col-md-12 col-md-offset-33 div_reset">

                            <button type="submit" class="savebtn btn btn-sm btn-primary sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                        </div>

                    </div>

                </form>

            </div><!-- .modal-body --> 



            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                <div class="text-left pull-left " ></div>
            </div>


        </div><!-- .modal-content --> 

    </div><!-- .modal-dialog --> 

</div>
<!--end Modal -->

        <!-- Create New Variant Modal -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Name Here" aria-label="name">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number Here" aria-label="no">
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#category_list').multiselect({
            
            nonSelectedText: 'Check the Category option!',
            enableClickableOptGroups: true,
            enableCollapsibleOptGroups: true,
            includeSelectAllOption: true,
            allSelectedText: 'All Category Selected ...',
            enableFiltering: true,
            enableFullValueFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder: 'Search for Category...',
            maxHeight: 250,
            buttonWidth: '350px'
        });
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
    
</script>          