<style>
    li.cate_opt {
        padding-left: 20px;
    }
    .bootstrap-select button {
        border: none;
        background-color: #ffffff;
    }
    .bootstrap-select button:hover {
        border: none;
        background-color: #f0f0f0;
    }
   
    .bs-placeholder{
        color:#394263 !important;
        font-weight: 600;
    }
    
    .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 280px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow:auto;
    }
    .preview-images-zone > .preview-image:first-child {
        height: 285px;
        width: 285px;
        position: relative;
        margin-right: 5px;
    }
    .preview-images-zone > .preview-image {
        height: 140px;
        width:  135px;
        position: relative;
        margin-right: 5px;
        float: left;
        margin-bottom: 5px;
    }
    .preview-images-zone > .preview-image > .image-zone {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .image-zone > img {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }
    .preview-images-zone > .preview-image > .image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }
    .preview-image:hover > .image-zone {
        cursor: move;
        opacity: .5;
    }
    .preview-image:hover > .tools-edit-image,
    .preview-image:hover > .image-cancel {
        display: block;
    }
    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }
    
    
    .checkbox.checbox-switch {
        padding-left: 0;
    }

    .checkbox.checbox-switch label,
    .checkbox-inline.checbox-switch {
        display: inline-block;
        position: relative;
        padding-left: 30px;
    }
    .checkbox.checbox-switch label input,
    .checkbox-inline.checbox-switch input {
        display: none;
    }
    .checkbox.checbox-switch label span,
    .checkbox-inline.checbox-switch span {
        width: 35px;
        border-radius: 20px;
        height: 18px;
        border: 1px solid #dbdbdb;
        background-color: rgb(255, 255, 255);
        border-color: rgb(223, 223, 223);
        box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset;
        transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }
    .checkbox.checbox-switch label span:before,
    .checkbox-inline.checbox-switch span:before {
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: rgb(255,255,255);
        content: " ";
        top: 0;
        position: relative;
        left: 0;
        transition: all 0.3s ease;
        box-shadow: 0 1px 4px rgba(0,0,0,0.4);
    }
    .checkbox.checbox-switch label > input:checked + span:before,
    .checkbox-inline.checbox-switch > input:checked + span:before {
        left: 17px;
    }
    
    /* Switch Success */
    .checkbox.checbox-switch.switch-success label > input:checked + span,
    .checkbox-inline.checbox-switch.switch-success > input:checked + span {
        background-color: rgb(40, 167, 69);
        border-color: rgb(40, 167, 69);
        box-shadow: rgb(40, 167, 69) 0px 0px 0px 8px inset;
        transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;
    }
    .checkbox.checbox-switch.switch-success label > input:checked:disabled + span,
    .checkbox-inline.checbox-switch.switch-success > input:checked:disabled + span {
        background-color: rgb(153, 217, 168);
        border-color: rgb(153, 217, 168);
        box-shadow: rgb(153, 217, 168) 0px 0px 0px 8px inset;
    }

    .var_editimage 
    {
        cursor: pointer;
    }

</style>
<div class="row">
<form id="prd_form" action="<?= site_url('Fashion_admin/save_product') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
<div class=" col-lg-12">
    
    <div class="col-lg-6">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>

            </div>

            <div class=" form-horizontal form-bordered">

                <div class="form-group" style=" margin-top: -20px">

                    <label class="col-md-32 control-label" for="product_name">Name</label>

                    <div class="col-md-12">

                        <input type="text" id="product-name" name="product_name" class="form-control" placeholder="Enter product name.." required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-33 control-label" for="product_desc">Description</label>

                    <div class="col-md-12">
                        
                        <textarea class="form-control product_desc" id="editorcode message" name="product_desc" rows="3" placeholder=""></textarea>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-33 control-label" for="product_category">Category</label>

                    <div class="col-md-12">

                        
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
                                    
                                    <!--<optgroup label="Group 1" class="group-1">
                                        <option value="1-1">Option 1.1</option>
                                        <option value="1-2" >option 1.2</option>
                                        <option value="1-3" selected="selected">Option 1.3</option>
                                    </optgroup>-->
                            
                        </select>	


                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-33control-label" for="pricing">Pricing</label>

                    <div class="col-md-12">
                       
                        <div class="col-md-6">
                            
                            <label class="control-label" for="price">Price</label>
                            
                            <div class="input-group" style=" padding-top: 4px;">

                                <div class="input-group-addon"><i class="fa fa-money"></i></div>

                                <input type="number" id="product-price" name="product_price" class="form-control prd_pri" placeholder="0,000" min="0" required="">

                            </div>
                            
                        </div>
                        
                        <div class="col-md-6">
                            
                            <select id="dst" class="selectpicker show-tick" data-size="5" data-width="fit" title="Add Discount Price" >
                                <option value="0" title="Add Discount Price">None </option>
                                <option value="1">Discount Price in %</option>
                                <option value="2">Discount Price in Values</option>
                            </select>


                            
                            <div class="input-group dicountprice_div" style="display:none;">

                                <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                
                                <input type="hidden" id="" name="discount_price_value" class="form-control dst_inp" placeholder="0,000" min="0">
                                <input type="number" id="" name="discount_price_value" class="form-control dst_inp dst_show" placeholder="0,000" min="0">
                                
                            </div>
                            <spam class="dicspam"><b><spam class="valinper"></spam>  <spam class="valmade"></spam></b></spam>
                            
                        </div>

                    </div>

                </div>
                
                <div class="form-group">

                    <label class="col-md-33control-label" for="Inventory"> Inventory </label>

                    <div class="col-md-12">
                       
                        <div class="col-md-6">
                            
                            <label class="control-label" for="Quantity">Quantity</label>
                            
                            <div class="input-group" style=" padding-top: 4px;">

                                <div class="input-group-addon"><i class="fa fa-cubes"></i></div>

                                <input type="number" id="" name="product_qty" class="form-control prd_qty" placeholder="00" min="0" >

                            </div>
                            
                        </div>
                        
                      
                    </div>

                </div>

                <!--
                <div class="form-group">

                    <label class="col-md-3 control-label">Upload image</label>

                    <div class="col-md-8">

                        <div class="O_Uplode">
                            <input type="file" name="Uplodefile" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base">
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                            <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                        </div>
                        
                        <div class="Prd_UploadView">
                            
                            <img class="UploadView" src="" width="100%" height="100%" />
                            <span class="Gp_rmv" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>
                                
                        </div>

                    </div>
                    
                </div>
                
                <div class="form-group">

                    <label class="col-md-3 control-label">Publish?</label>

                    <div class="col-md-9">

                        <label class="switch switch-primary">

                            <input type="checkbox" id="product_status" name="product_status" checked><span></span>

                        </label>

                    </div>

                </div>

                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3 div_reset">

                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>

                        <button type="reset" onclick="" class="btn btn-sm btn-warning btn_reset"><i class="fa fa-repeat"></i> Reset</button>

                    </div>

                </div>
                -->

            </div>

        </div>

    </div>
    
    <!-- Add Product Images -->
    <div class="col-lg-6 ">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-picture-o"></i> <strong>Product Images</strong> </h2>

            </div>

            <div class="block-section addmenudiv">
                
                <div class=" form-horizontal form-bordered">
                
                    <div class="">
                        
                        <fieldset class="form-group">
                            <a class="btn" href="javascript:void(0)" onclick="$('#pro-image').click()"><i class="fa fa-upload"></i> Upload Image</a>
                            <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
                        </fieldset>
                        
                        <div class="preview-images-zone">
                            
                           
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    
    <!-- Add Variants -->
    <div class="col-lg-6 addmenu">

        <div class="block">

            <div class="block-title">
                
                <div class="block-options pull-right">

                    <!--<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default"> Add Variants </a>-->

                </div>

                <h2><i class="fa fa-cutlery"></i> <strong> Variants </strong> </h2>

            </div>

            <div class="block-section addmenudiv">
                <span class="text-mutedd">Add variants if the product comes in multipleversions, like different <b>Sizes</b> or <b>Colors</b></span>
                
                <br>
                <!--<input type="text" id="select-carr" placeholder="Search for Category...">
                <small class="text-uppercase text-muted"><b>Default Unchecked</b></small>-->
                <div class="">
                    <div class="checkbox checbox-switch switch-success">
                        
                        <label>
                            <input class="checkbox_color" type="checkbox" name="" />
                            <span></span>
                            Color
                        </label>
                        
                         <label >
                            <input class="checkbox_size" type="checkbox" name="" />
                            <span></span>
                            Size
                        </label>
                        
                    </div>
                </div>
                
                <div class=" form-horizontal form-bordered">
                    
                    <div class="form-group add_variant">

                    </div>
                    
                    <div class="form-group var_color" style="display:none;">

                        <div class="col-md-3">
                            <label class="checkbox inline"> Color</label>
                        </div>

                        <div class="col-md-8">
                                
                            <input type="text" class="form-controll" id="allcolor" name="product_colors"  placeholder="Enter Product Size Code or Name" tabindex="-1">
                            
                        </div>
                        
                        
                    </div>
                    
                    <div class="form-group var_size" style="display:none;">

                        <div class="col-md-3">
                           <label class="checkbox inline"> Sizes </label>
                        </div>

                        <div class="col-md-8">
                            
                            <input type="text" class="form-controll" id="allsizes" name="product_sizes"  placeholder="Enter Product Size Code or Name" tabindex="-1">
                            
                        </div>
                        
                        
                    </div>
                    
                </div>
                
                
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
                                        
                                        <!--
                                        <tr>
                                            <td >
                                                <input data-toggle="tooltip" data-tooltip="tooltip" title="Remove Variant"  class="jboxtooltip" type="checkbox" checked="" />
                                            </td>
                                            
                                            <td align = "center" class="jboxtooltip" data-toggle="tooltip" data-tooltip="tooltip" title="Click to add Image">
                                                <img id="image1" class="var_editimage" src = "http://www.placehold.it/40x40" alt= "..."></img>
                                                <input type="file" accept="image/*" class="var_color_sizeimg" style="display: none;">
                                            </td>
                                            
                                            <td>
                                                
                                                <div class="col-xs-12 cat_namediv_2 nopadding">
                                                    <div class="col-xs-1 nopadding"> 
                                                        <a href="javascript:void(0);" class="jboxtooltip editcolor" data-col_id="2" data-col_name="Bob Smith" data-tooltip="tooltip" data-toggle="tooltip" title="Edit Variant Name">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"  style="color: green;" ></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-10 nopadding jboxtooltip" style="padding-left:5px;" data-tooltip="tooltip" data-toggle="tooltip" title="Variant Name">
                                                        Bob Smith
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 text-center">
                                                    <b data-toggle="tooltip" title="Variant Size" data-tooltip="tooltip" class="jboxtooltip"> XXL</b>
                                                </div>
                                            
                                            </td>
                                            
                                            <td>
                                                <input type="number" id="" name="variant_price[]" class="form-control var_pri" placeholder="0,000" min="0" required="">
                                            </td>
                                            
                                            <td>
                                                <input type="number" id="" name="variant_discount[]" class="form-control var_dis jboxtooltip" data-tooltip="tooltip" data-toggle="tooltip" title="Discount in %" placeholder="00%" min="0">
                                            </td>
                                            
                                            <td>
                                                <input type="number" id="" name="variant_qty[]" class="form-control var_qty" placeholder="0,000" min="1">
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr class="tr">
                                             <td >
                                                 <input class="jboxtooltip" data-tooltip="tooltip" data-toggle="tooltip" title="Remove Variant" type="checkbox" checked="" />
                                            </td>
                                            
                                            <td align = "center" class="jboxtooltip" data-tooltip="tooltip" data-toggle="tooltip" title="Click to add Image">
    						<img id="image2" class="var_editimage" src = "http://www.placehold.it/40x40" alt= "..."></img>
                                                <input type="file" accept="image/*" class="var_color_sizeimg" style="display: none;">
                                            </td>
                                            
                                            <td>
                                                <div class="col-xs-12 cat_namediv_1 nopadding">
                                                    <div class="col-xs-1 nopadding"> 
                                                        <a href="javascript:void(0);" class="editcolor jboxtooltip" data-tooltip="tooltip" data-col_id="1" data-col_name="George Jones" data-toggle="tooltip" title="Edit Variant Name">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"  style="color: green;" ></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-10 nopadding jboxtooltip" style="padding-left:5px;" data-tooltip="tooltip" data-toggle="tooltip" title="Variant Name">
                                                        George Jones Jones
                                                    </div>
                                                </div>
                                                
                                                <div class="col-xs-12 text-center">
                                                    <b class="jboxtooltip" data-tooltip="tooltip" data-toggle="tooltip" title="Variant Size">XXL</b>
                                                </div>
                                                
                                            </td>
                                            <td>
                                                <input type="number" id="" name="variant_price[]" class="form-control var_pri" placeholder="0,000" min="0" required="">
                                            </td>
                                            
                                            <td>
                                                <input type="number" id="" name="variant_discount[]" class="form-control var_dis jboxtooltip" data-tooltip="tooltip" data-toggle="tooltip" title="Discount in %" placeholder="00%" min="0" >
                                            </td>
                                            
                                            <td>
                                                <input type="number" id="" name="variant_qty[]" class="form-control var_qty" placeholder="0,000" min="1">
                                            </td>
                                        </tr>
                                        -->
                                       
                                        
                                    </tbody>
                                </table>
                        
                    </div>

                    </div>
                    
                </div>
                
            </div>


        </div>

    </div>
    
    
    <div class="form-group form-actions">

        <div class="col-md-9 col-md-offset-3 div_reset">

            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>

            <button type="reset" onclick="" class="btn btn-sm btn-warning btn_reset"><i class="fa fa-repeat"></i> Reset</button>

        </div>

    </div>

</div>    
</form>
    
   
    <!-- Color Name div-->
    <div id="color_name" class="btn-group btn-group-xs" style="display:none; position: absolute;">
        <input type="text" data-col_id="" name="new_col_name" class="form-control" value="" style=" width: 75%; margin: 0;" >
        <a  id="colo_name_save" class="btn btn-xs btn-success saveEditColor" data-toggle="tooltip" title="Save Change">
            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
        </a>
        <a href="" id="closename" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Close">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
            
</div>



<script >
    $('.c_tray').addClass('active');
    $('.nav_m').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    $('.selectpicker').selectpicker();
    
    $('#dst').change(function() {
        var val = $(this).val();
        if(val === "0") {
            $('.dicountprice_div').fadeOut(500);
            $('.dicountprice_div').find('i').removeClass('fa-percent').addClass('fa-money');
            $(".dst_show").removeClass('per_calculate').addClass('dst_inp');
            $(".dst_show").attr("onkeyup", "");
            $(".dst_inp").val("");
            $(".dicspam").hide();
        }
        else if(val === "1") {
            $('.dicountprice_div').fadeIn(500);
            $('.dicountprice_div').find('i').removeClass('fa-money').addClass('fa-percent');
            $(".dst_show").removeClass('dst_inp').addClass('per_calculate');
            $(".dst_show").attr("placeholder", "00%").blur();
            $(".dst_inp").attr("placeholder", "00%").blur();
            $(".dst_inp").attr("max", "100");
            $(".dst_show").attr("onkeyup", "per_calculate()");
            $(".dst_inp").val("");
            $(".dst_show").val("");
            $(".dst_show").focus();
            
        }
        else if(val === "2") {
            $('.dicountprice_div').fadeIn(500);
            $('.dicountprice_div').find('i').removeClass('fa-percent').addClass('fa-money');
            $(".dst_show").removeClass('per_calculate').addClass('dst_inp');
            $(".dst_show").attr("onkeyup", "");
            $(".dst_inp").attr("placeholder", "0,000").blur();
            $(".dst_inp").attr("max", "");
            $(".dst_inp").val("");
            $(".dst_inp").focus();
            $(".dicspam").hide();
        }
        
      });
      
       
        function per_calculate(){
            var price ;
            if($('.prd_pri').val() === "")
                { price= 0; }
            else
                { price= parseFloat($('.prd_pri').val()); }
            var per = $('.per_calculate').val() ;  
            
            var calc = (parseFloat(price)*parseFloat(per)/100);
            //alert(calc);
            $('.valinper').text( per+'% = ' );
            $('.valmade').text( '#'+parseFloat(calc) );
            $(".dst_inp").val(calc);
            
            if(per==="")
            {
                $(".dicspam").hide();
            }
            else{$(".dicspam").show();}
        }
</script>


<script>
    //images 
     var reader; 
    $("#sortvariant").on("click",".var_editimage", function(e){
        e.preventDefault();
        $(this).next(".var_color_sizeimg").click();
        
        $(this).next(".var_color_sizeimg").change(function () {
            
            var imgdiv_id = $(this).prev().attr('id');
            var imgdiv = $(this).prev().data('dataimage');//alert(imgdiv);
            if (this.files && this.files[0]) 
                {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        //$('img[data-dataimage='+imgdiv+']').attr('src', e.target.result);
                        $('#'+imgdiv_id).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
            }
        });
    });
    
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.var_editimage')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>

<script>
    // Edit Vatiant Color name 
    $("#sortvariant").on("click",".editcolor", function(e){
        e.preventDefault();
        
        var col_Id = $(this).data('col_id');
        var col_Name = $(this).data('col_name');
        
        $('[name="new_col_name"]').val(col_Name);
        $('[name="new_col_name"]').data('col_id',col_Id); // sets value
        
        
        var elm = $(this);
        var xPos = e.pageX - elm.offset().left;
        var yPos = e.pageY - elm.offset().top;
       
        var position = $(this).offset(); //position();
        var newtop = position.top - 8;
        var newleft = position.left - 5;
        $('#color_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#color_name').hide();
    });
    
    
    // on name change 
    $('#cat_name_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_cat_name"]').val();
            var cat_id   = $('[name="new_cat_name"]').data('cat_id'); // gets value
            
            var check_word = "main menu";
            
            //checker
            if( new_name.toLocaleLowerCase().indexOf(check_word)!= -1)
                {
                    alert("Name not allowed");
                    $('#cat_name').hide();
                }
            else
                {
                
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('restaurant_admin/cat_nameupdate') ?>',
                    dataType: 'json',
                    data: {
                            cat_id: cat_id,
                            name: new_name
                            }
                }).done(function (data) {
                    
                    new jBox('Notice', {
                                //animation: 'flip',
                        animation: {
                          open: 'tada',
                          close: 'zoomIn'
                        },
                        position: {
                          x: 10,
                          y: 100
                        },
                        attributes: {
                          x: 'right',
                          y: 'bottom'
                        },
                        color: 'green',
                        autoClose: Math.random() * 8000 + 2000,
                        content: 'Success! Category name '+ new_name +' Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#cat_name').hide();
                    $('.cat_namediv_'+cat_id).html(data);
                });
            
            }
    });
 
</script> 

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
            maxHeight: 200,
            buttonWidth: '350px'
        });
        
    });
</script>

<!--<script src="<?=base_url(); ?>extensions/ckeditor-dev-major/ckeditor.js"></script>-->
<script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<!--<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>-->
<script >

    CKEDITOR.replace( 'product_desc' );
    
</script>

<script>
    
$("#varanttable thead tr th:first input:checkbox").click(function () {
    var checkedStatus = this.checked;
    $("#varanttable tbody tr td:first-child input:checkbox").each(function () {
        this.checked = checkedStatus;
    });
});
$("input[type='image']").click(function() {
    $("input[class='var_color_sizeimg']").click();
});

var sizesArray = [];
var colorArray = [];

function createvariant() 
    {
        if(colorArray == '' && sizesArray == '')
        {
            $('.var_div').hide();
        }
        else
        {
            $('.var_div').show();
           // $(".tr:last").append(fieldHTML);
            
            
            
            //var fieldHTML = '<tr class="tr var_trcolor'+color+'">'+$(".trcopy").html()+'</tr>';
            /*
            var fieldHTML = "<tr class='tr var_trcolor"+color+">\n\
                                <td>\n\
                                   <input data-toggle='tooltip' title='Remove Variant' type='checkbox' checked='' >\n\
                                </td>\n\
                                <td align = 'center' data-toggle='tooltip' title='Click to add Image'>\n\
                                    <img src = 'http://www.placehold.it/40x40' alt= '...' ></img>\n\
                                </td>\n\
                                <td>\n\
                                    <div class='col-xs-12 cat_namediv_1 nopadding'>\n\
                                        <div class='col-xs-1 nopadding'>\n\
                                            <a href='javascript:void(0);' class='editcolor' data-col_id='1' data-col_name='George Jones' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                                 <i class='fa fa-pencil-square-o' style='color:green;'></i>\n\
                                            </a>\n\
                                        </div>\n\
                                        <div class='col-xs-10  nopadding' style='padding-left:5px;' data-toggle='tooltip' title='Variant Name'>\n\
                                            Oye test\n\
                                        </div>\n\
                                    </div>\n\
                                    <div class='col-xs-12 text-center'><b data-toggle='tooltip' title='Variant Size'>S</b></div>\n\
                                </td>\n\
                                <td>\n\
                                    <input type='number' name='variant_price[]' class='form-control var_pri' placeholder='0,000' min='0' required >\n\
                                </td>\n\
                                <td>\n\
                                    <input type='number' name='variant_discount[]' class='form-control var_dis' data-toggle='tooltip' title='Discount in %' placeholder='00%' min='0' >\n\
                                </td>\n\
                                <td>\n\
                                    <input type='number' name='variant_qty[]' class='form-control var_qty' placeholder='0,000' min='1'>\n\
                                </td>\n\
                            </tr> ";
            */
             //$("#varanttable").find('tbody').append(fieldHTML);
            // $(".tr:last").after(fieldHTML);
            //$('body').find('.var_tr:last').after(fieldHTML);
        }
    };
  function generatetablerow(color,size){
      var code,discount;
      var colorname='';
      
      if ($('.dst_inp').val()!== "")
      {
        discount= 
                "<input \n\
                 type='number' \n\
                 class='form-control var_dis jboxtooltip' \n\
                 name= 'variant_discount[]' \n\
                 data-toggle='tooltip' \n\
                 data-tooltip='tooltip' \n\
                 title='Discount Price' \n\
                 min='0' \n\
                 placeholder= "+$('.dst_inp').attr("placeholder")+" \n\
                 value = "+$('.dst_inp').val()+" >";
      }
      else
      {
          discount= 
                "<input \n\
                 type='number' \n\
                 class='form-control var_dis jboxtooltip' \n\
                 name= 'variant_discount[]' \n\
                 data-toggle='tooltip' \n\
                 data-tooltip='tooltip' \n\
                 title='Discount Price' \n\
                 min='0' \n\
                 disabled='' \n\
                >";
      }
      
      
      if(color==='' && size !=='')
      {
          code = size;
      }
      else if(size==='' && color!=='')
      {
          code = color;
          colorname=    "<div class='col-xs-12 cat_namediv_1 nopadding'>\n\
                            <div class='col-xs-1 nopadding'>\n\
                                <a href='javascript:void(0);' class='editcolor jboxtooltip' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='tooltip' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                     <i class='fa fa-pencil-square-o' style='color:green;'></i>\n\
                                </a>\n\
                            </div>\n\
                            <div class='col-xs-10 nopadding jboxtooltip' style='padding-left:5px;' data-tooltip='tooltip' data-toggle='tooltip' title='Variant Name'>\n\
                                "+color+"\n\
                            </div>\n\
                        </div>\n\
                        <input \n\
                            type='hidden' \n\
                            class='form-control var_name' \n\
                            name= 'variant_name[]' \n\
                            value="+color+" \n\
                            disabled='' \n\
                         >";
                               
                  
      }
      else if(size!=='' && color!=='')
      {
          code = color;
          colorname=    "<div class='col-xs-12 cat_namediv_1 nopadding'>\n\
                            <div class='col-xs-1 nopadding'>\n\
                                <a href='javascript:void(0);' class='editcolor jboxtooltip' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='tooltip' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                     <i class='fa fa-pencil-square-o' style='color:green;'></i>\n\
                                </a>\n\
                            </div>\n\
                            <div class='col-xs-10 nopadding jboxtooltip' style='padding-left:5px;' data-tooltip='tooltip' data-toggle='tooltip' title='Variant Name'>\n\
                                "+color+"\n\
                            </div>\n\
                        </div>\n\
                        <input \n\
                            type='hidden' \n\
                            class='form-control var_name' \n\
                            name= 'variant_name[]' \n\
                            value="+color+" \n\
                            disabled='' \n\
                         >";
                  
      }
      /*else{
          code=color;
          colorname=    "<div class='col-xs-12 cat_namediv_1 nopadding'>\n\
                            <div class='col-xs-1 nopadding'>\n\
                                <a href='javascript:void(0);' class='editcolor jboxtooltip' data-col_id='"+color+"' data-col_name='"+color+"' data-tooltip='tooltip' data-toggle='tooltip' title='Edit Variant Name'>\n\
                                     <i class='fa fa-pencil-square-o' style='color:green;'></i>\n\
                                </a>\n\
                            </div>\n\
                            <div class='col-xs-10 nopadding jboxtooltip' style='padding-left:5px;' data-tooltip='tooltip' data-toggle='tooltip' title='Variant Name'>\n\
                                "+color+"\n\
                            </div>\n\
                        </div>";
      }*/
      $("#varanttable").find('tbody')
                .append($("<tr class='varcolor"+code+"'>")
                    .append(
                        $('<td>').append(
                                $("<input/>", {
                                    'type': 'checkbox',
                                    'class': 'checkbox jboxtooltip',
                                    'name': 'variant_check[]',
                                    'data-tooltip':'tooltip',
                                    'data-toggle':'tooltip',
                                    'title':'Remove Variant',
                                    'checked':''
                                            })
                                        ),
                        $("<td class='jboxtooltip' title='Click to add Image' data-tooltip='tooltip' data-toggle='tooltip' >").append(
                                $('<img>', {
                                    'class': 'var_editimage',
                                    'id':'image'+color+size,
                                    'data-dataimage':'image'+color+size,
                                    'width':'40',
                                    'height':'40'
                                            }).attr('src', 'http://www.placehold.it/40x40'),
                                $('<input>', {
                                        'type':'file',
                                        'accept':'image/*',
                                        'class':'var_color_sizeimg',
                                        'style': 'display: none;'
                                            })
                                                    
                                 ),
                        $('<td>').append(
                                /*
                                $("<div>", {
                                    'class':'col-xs-12 cat_namediv_1 nopadding'
                                            }).append(
                                                    $("<div>", {
                                                        'class':'col-xs-1 nopadding'
                                                            }).append(
                                                                    $("<a>", {
                                                                        'class':'editcolor jboxtooltip',
                                                                        'href':'javascript:void(0)',
                                                                        'data-col_id':color,
                                                                        'data-col_name':color,
                                                                        'data-toggle':'tooltip',
                                                                        'data-tooltip':'tooltip',
                                                                        'title':'Edit Variant Name'
                                                                            }).append(
                                                                                    $("<i>", {
                                                                                        'class':'fa fa-pencil-square-o',
                                                                                        'style':'color:green'
                                                                                            })
                                                                )
                                                        ),
                                                    $("<div>", {
                                                        'class':'col-xs-11 nopadding jboxtooltip',
                                                        'style':'padding-left:5px;',
                                                        'data-toggle':'tooltip',
                                                        'data-tooltip':'tooltip',
                                                        'title':'Variant Name'
                                                                }).append(color)
                                                    ),*/
                                colorname,
                                $("<div>", {
                                    'class':'col-xs-12 text-center'
                                            }).append("<b class='jboxtooltip' data-tooltip='tooltip' data-toggle='tooltip' title='Variant Size' >"+size+" <input type='hidden' class='form-control var_sizearray' name='variant_size[] value='"+size+"' disabled=''></b>")
                                ),
                        $('<td>').append(
                                $("<input/>", {
                                    'type': 'number',
                                    'class': 'form-control var_pri',
                                    'name': 'variant_price[]',
                                    'min':'0',
                                    'value': $(".prd_pri").val(),
                                    'required':''
                                            }).attr('placeholder','0.000')
                                ),
                        $('<td>').append(
                                /*$("<input/>", {
                                    'type': 'number',
                                    'class': 'form-control var_dis jboxtooltip',
                                    'name': 'variant_discount[]',
                                    'data-toggle':'tooltip',
                                    'data-tooltip':'tooltip',
                                    'title':'Discount in %',
                                    'min':'0',
                                    'value':$(".dst_inp").val()
                                            }).attr('placeholder','00%')*/
                                discount),
                        $('<td>').append(
                                $("<input/>", {
                                    'type': 'number',
                                    'class': 'form-control var_qty',
                                    'name': 'variant_qty[]',
                                    'min':'1',
                                    'value':$(".prd_qty").val(),
                                    'required':''
                                            }).attr('placeholder','0000')
                                ),
                    )
                );
  } 
function remove_color_size(colorA){ 
    $.each(colorA, function(key_color, color){
        console.log('value index='+key_color + ' value='+color);
            $(".varcolor"+color).remove();
        });
}
function add_color_size()
    {
        if (colorArray != '' && sizesArray == '')
        {
            remove_color_size(colorArray);
            $.each(colorArray, function(key_color, color)
                {
                    //$("#result").append(key_color + ": " + value + '<br>');
                    console.log('--- key color='+key_color + ' color='+color);
                    generatetablerow(color,'');
            
                });
        }
        else if (sizesArray != '' && colorArray == '')
        {
            remove_color_size(sizesArray);
            $.each(sizesArray, function(key_size, size)
                {
                    console.log(' --- key size= '+key_size+' value='+size);
                    generatetablerow('',size);
                });
                
        }
        else if (colorArray != '' && sizesArray != '')
        {
            remove_color_size(colorArray);remove_color_size(sizesArray);
            $.each(colorArray, function(key_color, color){
              //for( ii = 0, l = myArray2.length; ii < l; ii++ ) {
                $.each(sizesArray, function(key_size, size)
                    {
                        console.log(' --- key color= '+key_size+' color ='+color+' --- key size= '+key_size+' value='+size);
                        generatetablerow(color,size);
                    });
                
            });
        }
        else
        {
            console.log(' color field empty');
        }
                
    };

function jqremove_(mainarray, removevalue) 
    {
        for (var index = mainarray.length - 1; index >= 0; index--) 
            {
                if (mainarray[index] == removevalue)
                    {
                        $(".varcolor"+removevalue).remove();
                        mainarray.splice(index, 1);
                        break;
                    }
            }
        
        $.each(mainarray, function(key, get)
            {
               // console.log(' --- key= '+key+' allsizes = '+get);
            });
        //return mainarray;
    };

function jqadd_(mainarray,addvalue)
    {
        mainarray.push(addvalue);
        $.each(mainarray, function(key, get)
            {
                //console.log(' --- jqadd key= '+key+' values = '+get);
            });
                
    };
  

var $select_size = $('#allsizes').selectize({
    //theme: 'repositories',
    valueField: 'sizecode',
    labelField: 'sizecode',
    searchField: ['sizecode','sizecategory','sizename'],
    //optgroupField: 'sizecategory',
    options: [],
    create: false,
    
    delimiter: ',',
    persist: false,
    preload: true,
    openOnFocus: true,
    //maxOptions: 10,
    plugins: 
            [
                'optgroup_columns',
                //'drag_drop',
                'remove_button'
            ],
    render: {
        option: function(item, escape) {
            return "<li>" 
                        + "<div style='display: inline-block; padding-left: 10px;'>\n\
                            <div class='full_name'>" + escape(item.sizecode) + " " + escape(item.sizename) + "</div>\n\
                            <div class='email'>" + escape(item.sizecategory)+ "</div>\n\
                           </div>\n\
                        </li>" ;
        }
    },
    load: function(query, callback) {
        //if (!query.length) return callback();
        $.ajax({
            url: '<?= site_url('Fashion_admin/all_sizes') ?>',//'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
            type: 'GET',
            dataType: 'json',
            data: {
                q: query
            },
            error: function() {
                callback();
            },
            success: function(res) {
                console.log('Success URL RES :' + res);
                callback(res);
            }
        });
    },
    onChange: function(value) {
    
                console.log('onchange SizevalueL RES :' + value);
                
                //createvariant(value,false);
    },
    onItemAdd: function(value) {
                console.log('onItemAdd SizevalueL  :' + value);
                
                jqadd_(sizesArray,value);
                add_color_size();
                //console.table(sizesArray);
                
                createvariant();
    },
    onItemRemove: function(value) {
                console.log('onItemRemove SizevalueL  :' + value);
                
                jqremove_(sizesArray,value);
                add_color_size();
                //console.table(sizesArray);
                
                createvariant();
    }
});
   
var selectize_s = $select_size[0].selectize;


var $select_color = $('#allcolor').selectize({
        //theme: 'repositories',
        valueField: 'colorname',
        labelField: 'colorname',
        searchField: ['colorname'],
        //optgroupField: 'sizecategory',
        options: [],
        create: false,

        delimiter: ',',
        persist: false,
        preload: true,
        openOnFocus: true,
        //maxOptions: 10,
        plugins: 
                [
                    'optgroup_columns',
                    //'drag_drop',
                    'remove_button'
                ],
        render: {
            option: function(item, escape) {
                return "<li> \n\
                            <b style=''>" + escape(item.colorname) + " </b> \n\
                        </li>" ;
            }
        },
        load: function(query, callback) {
            //if (!query.length) return callback();
            $.ajax({
                url: '<?= site_url('Fashion_admin/all_colors') ?>',//'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
                type: 'GET',
                dataType: 'json',
                data: {
                    color: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    console.log('Success URL RES :' + res);
                    callback(res);
                }
            });
        },
        onChange: function(value) {
                    console.log('onchange colorvalue RES :' + value);
        },
        onItemAdd: function(value) {
                    console.log('onItemAdd Colorvalue  :' + value);

                    jqadd_(colorArray,value);
                    add_color_size();
                    //console.table(colorArray);

                    createvariant();
        },
        onItemRemove: function(value) {
                    console.log('onItemRemove ColorvalueL  :' + value);

                    jqremove_(colorArray,value);
                    add_color_size();
                    //console.table(colorArray);
                    
                    createvariant();
        }
    });
 var selectize_c = $select_color[0].selectize;
 
 
    $('.checkbox_size').change(function(){
        if(this.checked)
            {
                //var fieldHTML = '<div class="add_variant form-group addsizeclass"><div class="var_size">'+$(".var_size").html()+'</div></div>';
                //$('body').find('.add_variant:last').after(fieldHTML);
                $(".var_size").fadeIn(500);
                //getsize();
                
            }
        else{
                remove_color_size(sizesArray);
                sizesArray=[];
                add_color_size();
                createvariant();
                $(".var_size").fadeOut(500);
                selectize_s.clear();
            }
        });

    
    
    $('.checkbox_color').change(function(){
        if(this.checked)
            {
                $(".var_color").fadeIn(500);
                
            }
        else
            { 
                remove_color_size(colorArray);
                colorArray=[];
                add_color_size();
                createvariant();
                $(".var_color").fadeOut(500);
                selectize_c.clear();
            }

    });
    
    
</script>

    
<script>

    $(document).ready(function() {
        document.getElementById('pro-image').addEventListener('change', readImage, false);

        $( ".preview-images-zone" ).sortable();

        $(document).on('click', '.image-cancel', function() {
            let no = $(this).data('no');
            $(".preview-image.preview-show-"+no).remove();
        });
    });



    var num = 1;
    function readImage() {
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");

            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;

                var picReader = new FileReader();

                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html =  '<div class="preview-image preview-show-' + num + '">' +
                                '<div class="image-cancel" data-no="' + num + '">x</div>' +
                                '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                                //'<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                                '</div>';

                    output.append(html);
                    num = num + 1;
                });

                picReader.readAsDataURL(file);
            }
            $("#pro-image").val('');
        } else {
            console.log('Browser not support');
        }
    }

</script>



<script type="text/javascript">
    
    
    var reader; 
    function GetUpload(input) {
        if (input.files && input.files[0]) {
             reader = new FileReader();
            reader.onload = function (e) {
                $('.UploadView')
                        .attr('src', e.target.result)
                        //.width(200)
                        //.height(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function RemoveUpload() {
        
        $('.UploadView').attr('src', '');
        $('#fake-input').val('Choose your Image');
        $('.Prd_UploadView').hide();
    }
   
    $('.div_reset').on('click','.btn_reset', function(e){
    //$('.div_reset').click(function(){
        
        $('.UploadView').attr('src', '');
        $('.Prd_UploadView').hide();
                        
    });
    
    $("prd_form").submit(function (e){
        
        e.preventDefault();
        
        var queryString = $(this).serialize();
        console.log(queryString);

        var fieldValuePairs = $(this).serializeArray();
        $.each(fieldValuePairs, function(index, fieldValuePair) {
            console.log("Item " + index + " is [" + fieldValuePair.name + "," + fieldValuePair.value + "]");
        });
    });
    
    
    $('.product_desc').closest('form').submit(CKupdate);

    function CKupdate() {
        for (instance in CKEDITOR.instances)
            CKEDITOR.instances[instance].updateElement();
        return true;
    } 
    var num_of_images = $("#file-input")[0].files.length;
    alert(num_of_images);
    $("#prd_form").submit(function (e){
        
        /*$('#prd_form').ajaxForm(function () {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });*/
        
                e.preventDefault();
        
               
                
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data_save = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:new FormData(this),
                   processData:false,
                   contentType:false,
                   async:false,
                   success: function(data){
                     
                     
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            position: {
                              x: 10,
                              y: 100
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'green',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Success! Product Added ',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        $("#prd_form")[0].reset();
                        RemoveUpload();
                    }
                });
                 
                 /*
                 or
                 var posting = $.post( url, data_save);
                 posting.done(function(data){
                     
                 });
                 */
        });
	
</script>