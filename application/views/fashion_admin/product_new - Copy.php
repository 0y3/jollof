

								
				<ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iprofile" class="nav-link active show" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true" aria-selected="true">
                                        	<span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Product Info</span>
                                    	</a>
                                    </li>
                                    
                                    <li role="presentation" class="nav-item">
                                        <a href="#istock" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false" aria-selected="false">
                                        	<span class="visible-xs"><i class="ti-notepad"></i></span> 
                                        	<span class="hidden-xs">Price,Sizes and Colors</span>
                                    	</a>
                                    </li>
                                    
                                    
                                    <li role="presentation" class="nav-item">
                                        <a href="#iproductimage" class="nav-link" aria-controls="images" role="tab" data-toggle="tab" aria-expanded="false" aria-selected="false">
                                        	<span class="visible-xs"><i class="ti-gallery"></i></span> 
                                        	<span class="hidden-xs">Product Images</span>
                                    	</a>
                                    </li>
                                    
                                </ul>
                                
                            
<form id="prd_form" action="<?= site_url('fashionadmin/products/add') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">    
                                
                                
                                <div class="tab-content">
                                
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <!-- .tab-pane -->
                                    <div role="tabpanel" class="tab-pane active show" id="iprofile">
                                        <div class="row">
                                            
                                            
                                            <div class="card-body">
                                
                                
                                                <div class="form-body">
                                                    <h5 class="card-title">Product Details</h5>
                                                    <hr>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Product Name</label>
                                                                <input name="product_name" type="text" id="productname" class="form-control" placeholder="Enter product name" required=""> 
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Category</label>
                                                                <br>
                                                                <select id="category_list" name="category[]" multiple="multiple" required="">
                            
                                                                    <?php if(!empty($cate)): ?>

                                                                        <?php foreach ($cate as $cate_list) :?>

                                                                            <optgroup label="<?= $cate_list['categoryname'] ?>" class="group-1">
                                                                                <option class="cate_opt" value="<?= $cate_list['id'] ?>"><?= $cate_list['categoryname'] ?></option>

                                                                                <?php foreach ($cate_list['nav_cate_submenu'] as $subnavs) :?>

                                                                                    <option class="cate_opt" value="<?= $subnavs['id'] ?>"><?= $subnavs['categoryname'] ?></option>

                                                                                        <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                                                                            <option class="cate_opt" value="<?= $submenunavs['id'] ?>"><?= $submenunavs['categoryname'] ?></option>
                                                                                        <?php endforeach; ?>

                                                                                <?php endforeach; ?>

                                                                            </optgroup>

                                                                        <?php endforeach;?>
                                                                        <?php else: ?>

                                                                            <option > Category not available</option>

                                                                    <?php endif; ?>

                                                                </select>
                                                                <!--
                                                                <select class="select2 form-control" multiple="multiple" style="height: 36px;width: 100%;">
                                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                                    <option value="Category 1">Category 1</option>
                                                                    <option value="Category 2">Category 2</option>
                                                                    <option value="Category 3">Category 5</option>
                                                                    <option value="Category 4">Category 4</option>
                                                                </optgroup>
                                                                </select>
                                                                -->
                                                            </div>
                                                        </div>
                                                        
                                                        <!--/span-->
                                                        
                                                        
                                                    </div>
                                                    <!--/row-->
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Short Description</label>
                                                                <textarea name="product_shortdesc" id="" cols="50" rows="3" class="form-control"></textarea> 
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Full Description</label>
                                                                <textarea name="product_desc" id="ckeditor" cols="50" rows="3" class="ckeditor product_desc" required=""></textarea> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/row-->
                                                    
                                                    <!--/row-->
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <br>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline1" name="product_status" value="1" class="custom-control-input" required="">
                                                                    <label class="custom-control-label" for="customRadioInline1">Publish</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline2" name="product_status" value="0" class="custom-control-input" required="">
                                                                    <label class="custom-control-label" for="customRadioInline2">Draft</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
            
                                                    
                                                    
                                               	</div>
                                               	<!-- /.form-body -->
                                               	
                            				</div>
                            				<!-- /.card-body -->
                                            
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    <!-- /.tab-pane -->
                                    
                                    
                                    
                                    
                                    <!-- .tab-pane -->
                                    <div role="tabpanel" class="tab-pane show" id="istock">
                                        <div class="row">
                                        
                                            <div class="card-body">
                                                
                                                <div class="form-body">
                                                    <h5 class="card-title">Product Size, Color and Stock</h5>
                                                    <hr>

                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Product Price</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-money-bill-alt"></i></span>
                                                                    </div>
                                                                    <input type="number" id="product-price" name="product_price" class="form-control prd_pri" placeholder="0,000" min="0" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        
                                                        <div class="col-md-6">
                            
                                                            <!--<select id="dst" class="selectpicker show-tick" data-size="5" data-width="fit" title="Add Discount Price" >
                                                                <option value="0" title="Add Discount Price">None </option>-->
                                                                <!--<option value="1">Discount Price in %</option>-->
                                                                <!--<option value="2">Discount Price in Values</option>
                                                            </select>-->
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="customCheck1" name="product_discount" type="checkbox" class="custom-control-input dst" >
                                                                <label class="custom-control-label" for="customCheck1">Add Discount Price</label>
                                                            </div>



                                                            <div class="input-group dicountprice_div" style="display:none;">

                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="ti-cut"></i></span>
                                                                </div>

                                                                <input type="number" id="" name="discount_price_value" class="form-control dst_inp dst_show" placeholder="0,000" min="0">

                                                            </div>
                                                            <spam class="dicspam"><b><spam class="valinper"></spam>  <spam class="valmade"></spam></b></spam>

                                                        </div>        
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><i class=" fas fa-cubes"></i> Inventory</h4>
                                                            <h6 class="card-subtitle">Add Inventory/variants if the product comes in multiple versions, like different <code>Sizes</code> or <code>Colors</code>.</h6>
                                                        </div>  
                                                    </div> 
                                                    
                                                    <div class="row">
                                                        <!-- color -->
                                                        <div class="col-md-1">
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="checkbox_color" type="checkbox" class="custom-control-input checkbox_color" checked disabled required="" >
                                                                <label class="custom-control-label" for="checkbox_color">Color</label>
                                                            </div>
                                                        </div>

                                                        <!-- size -->
                                                        <div class="col-md-1">
                                                            <div class="custom-control custom-checkbox">
                                                                <input id="checkbox_size" type="checkbox" class="custom-control-input checkbox_size" >
                                                                <label class="custom-control-label" for="checkbox_size">Size</label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="row">
                                                       
                                                        <!-- color option-->
                                                        <div class="col-md-6 var_color">
                                                            <div class="form-group">
                                                                <label class="control-label">Color</label>
                                                                <input type="text" class="form-control" id="allcolor" name="product_colors"  placeholder="Enter Product Size Code or Name"  required="">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        
                                                        <!-- Size option-->
                                                        <div class="col-md-6 var_size" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label">Size</label>
                                                                <input type="text" class="form-control" id="allsizes" name="product_sizes"  placeholder="Enter Product Size Code or Name">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        
                                                        <div id="sortvariant" class="form-horizontal form-bordered var_div" style=" display: none; position: relative;">
                  
                                                            <div class="form-group">

                                                            <label class="col-md-33control-label">Variants Items</label>

                                                            <div class="col-md-12">


                                                                <table id="varanttable" class="table no-border custom_table dataTable no-footer dtr-inline var_table">

                                                                    <thead>
                                                                        <tr>                        
                                                                            <th><!--<input type="checkbox" checked=""/>--></th>
                                                                            <th></th>
                                                                            <th>Variants</th>
                                                                            <th>Price</th>
                                                                            <th>Discount</th>
                                                                            <th>Qty</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                    
                                                                </table>

                                                            </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                   	
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    
                                    
                                    <!-- .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="iproductimage">
                                        <div class="card-body modal_prdimg">
                                            <div class="">
                                                <fieldset class="form-group">
                                                    <a class="btn" href="<?= site_url('fashionadmin/products/newimage_form')?>" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_imagee" data-container="modal_image" title="Add New Image"><i class="fa fa-upload"></i> Upload Image</a>
                                                    <!--<a class="btn" href="javascript:void(0)" onclick="$('#pro-image').click()"><i class="fa fa-upload"></i> Upload Image</a>
                                                    <input type="file" id="pro-image" name="pro-image[]" accept="image/*" style="display: none;" class="form-control" multiple> -->
                                                </fieldset>
                                                <div class="preview-images-zone ui-sortable">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    
                                    
                                    
                                    <div class="form-actions m-t-40">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
</form>   
<!-- NEW Product Image Modal -->              
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="NEW Image view" aria-hidden="true" >
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

                            <button type="submit" class="savebtn btn btn-sm btn-primary sbmtbtn" style="display: none;"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

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
<div class="ajax-loader">
   <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
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