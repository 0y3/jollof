
<style>
    .prd_maincover{
        min-width: 120px;
        max-width: 100%;
        height:120px !important;
    }
    .prd_main{
        width: 102px !important;
        max-width: 100% !important;
        height:102px !important;
        top: 6.79% !important;
        left: 37.15% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
    }
    .savebtn { display: none;}
</style>
<div class="row">
<form id="prd_form" action="<?= site_url('restaurant_admin/save_product') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
<div class=" col-lg-12">
    
    <div class="col-lg-6">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-pencil"></i> <strong>General</strong> Data</h2>

            </div>

            

                <div class="form-group">

                    <label class="col-md-3 control-label" for="product_name">Name</label>

                    <div class="col-md-9">

                        <input type="text" id="product-name" name="product_name" class="form-control" placeholder="Enter product name.." required="">

                    </div>

                </div>


                <div class="form-group">

                    <label class="col-md-3 control-label" for="product_desc">Short Description</label>

                    <div class="col-md-9">

                        <textarea id="product-short-description" name="product_desc" class="form-control" rows="3"></textarea>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="product_category">Category</label>

                    <div class="col-md-8">

                        <select id="product-category" name="product_category" class="select-chosen" data-placeholder="Choose Category.." style="width: 250px;" required="">
                            
                            <?php if(!empty($cate)): ?>
                                    <option></option>
                                    
                                    <?php foreach ($cate as $cate_list) :?>
                                        <option value="<?= $cate_list->id ?>"><?= $cate_list->categoryname ?></option>
                                    
                                    <?php endforeach;?>
                                <?php else: ?>
                
                                    <option > Category not available</option>

                            <?php endif; ?>
                            
                            
                        </select>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="product_price">Price</label>

                    <div class="col-md-8">

                        <div class="input-group">

                            <div class="input-group-addon"><i class="fa fa-money"></i></div>

                            <input type="number" id="product-price" name="product_price" class="form-control" placeholder="0,000" required="">

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-md-3 control-label" for="product-price">Upload image </label>

                    <div class="col-md-8">
                        Image Size:- 100px by 100px Min Size: 2MB
                        <div class="O_Uplode action">
                            <input type="file" name="Uplodefile" accept="image/*" id="file" class="form-control form-input form-style-base fileopen">
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Step 1: Choose your Image" readonly="" accept="image/jpeg">
                            <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                        </div>
                        
                        <div class="Prd_UploadView stepshide">
                            <p><b>Step 2:</b> Select Image within the white Box crop region<p>
                            <div class="imageBox prd_maincover">
                                <div class="thumbBox prd_main"></div>
                                <div class="spinnerr" style="display: none">Loading...</div>
                            </div>
                        </div>
                        
                        
                        <div class="Prd_UploadView" style=" display:">
                            <div class="action cropbtn stepshide">
                                <p><b>Step 3:</b>Click Crop to preview the cropped region<p>
                                <input type="button" class="btn btn-sm btn-default" id="btnCrop" value="Crop" style="float: leftt">
                                <input type="button" class="btn btn-xs btn-default" id="btnZoomIn" value="+" title="Zoom Image closer" style="float: leftt">
                                <input type="button" class="btn btn-xs btn-default" id="btnZoomOut" value="-" title="Zoom Image Away style="float: leftt">
                            </div>
                            <div class="cropped" style=" position: relative;">

                            </div>

                        </div>
                        
                        <!--
                        <div class="O_Uplode ">
                            <input type="file" name="Uplodefile" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base">
                            <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                            <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                        </div>
                        
                        <div class="Prd_UploadView">
                            
                            <img class="UploadView" src="" width="100%" height="100%" />
                            <span class="Gp_rmv" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>
                                
                        </div>
                        -->
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

                        <button type="submit" class="btn btn-sm btn-primary savebtn"><i class="fa fa-floppy-o"></i> Save</button>

                        <button type="reset" onclick="" class="btn btn-sm btn-warning btn_reset"><i class="fa fa-repeat"></i> Reset</button>

                    </div>

                </div>

            

        </div>

    </div>
    
        
    <div class="col-lg-6 addmenu">

        <div class="block">

            <div class="block-title">

                <h2><i class="fa fa-cutlery"></i> <strong>Additional Menu</strong> </h2>

            </div>

            <div class="block-section addmenudiv">
                <div class=" form-horizontal form-bordered">
                
                    <div class="entry form-group">

                        <div class="col-md-6">
                            
                           <input type="text" id="product-name" name="addproduct_name[]" class="form-control" placeholder="Enter Additional Menu Name.." >
                            
                        </div>

                        <div class="col-md-5">

                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-money"></i></div>

                                <input type="number" id="product-price" name="addproduct_price[]" class="form-control" placeholder="0,000" >
                                
                                <span class="input-group-btn">
                                    <button class="btn btn-success btn-add" type="button">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span>
                            </div>
                            

                        </div>
                        
                        
                    </div>
                    
                    <div class="entrycopy form-group">

                        <div class="col-md-6">
                            
                           <input type="text" id="" name="addproduct_name[]" class="form-control" placeholder="Enter Additional Menu Name.." >
                            
                        </div>

                        <div class="col-md-5">

                            <div class="input-group">

                                <div class="input-group-addon"><i class="fa fa-money"></i></div>

                                <input type="number" id="" name="addproduct_price[]" class="form-control" placeholder="0,000">
                                
                                <span class="input-group-btn">
                                    <button class="btn btn-danger btn-remove" type="button">
                                        <span class="glyphicon glyphicon-minus"></span>
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
                <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another <b>Menu</b> and </small>
                <span class="glyphicon glyphicon-minus gs"></span> to remove <b>Menu</b> field </small>
                
            </div>


        </div>

    </div>
    
</div>    
</form>
            
</div>



<script >
    $('.c_tray').addClass('active');
    $('.nav_m').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    
</script>

<script >
    /*
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm  = $('.addmenudiv .form-horizontal:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry     = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
                    $(this).parents('.entry:first').remove();

                    e.preventDefault();
                    return false;
            });
            
    */
     
        //group add limit
        var maxGroup = 5;

        //add more fields group
        $(document).on('click', '.btn-add', function(e){
            e.preventDefault();
            if($('body').find('.entry').length < maxGroup){
                var fieldHTML = '<div class="entry form-group">'+$(".entrycopy").html()+'</div>';
                $('body').find('.entry:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' Feild are allowed.');
            }
        });

        //remove fields group
        $("body").on("click",".btn-remove",function(e){ 
            e.preventDefault();
            $(this).parents(".entry").remove();
        });

</script>

<script>


    var max_fields_limit = 5;   //set limit for maximum input fields
    var x = 1;                  //initialize counter for text box
    
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div><input type="text" name="product_name[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        $(this).parent('div').remove(); x--;
    });
			
    $('input[id=base-input]').change(function() {
        $('.Prd_UploadView').show();
        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    });
    
    
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
        
        $('.Viewcrop_banner').attr('src', '');
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('#fake-input_banner').val('Step 1: Choose your Image');
        $('.Prd_UploadView').hide();
        $('.savebtn').hide();
                        
    });
    
	
</script>
<script type="text/javascript">
    function Removecrop_banner() {

        $('.Viewcrop_banner').attr('src', '');
        $('#Viewcrop_banner').remove();
        $('#Gp_rmv_banner').remove();
        $('#fake-input_banner').val('Step 1: Choose your Image');
        $('.Prd_UploadView').hide();
        $('.savebtn').hide();
    }
    $(window).load(function() {
        var options =
        {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            //imgSrc: 'avatar.png'
        }
        var cropper = $('.imageBox').cropbox(options);
        $('#file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        });
        $('#btnCrop').on('click', function(){
            var img = cropper.getDataURL();
            $('.stepshide').hide();
            $('#Viewcrop_banner').remove();
            $('#Gp_rmv_banner').remove();
            $('.cropped').append('<input type="hidden" name="cropimg" value="'+img+'"/>');
            $('.cropped').append('<img id="Viewcrop_banner" class="Viewcrop_banner" src="'+img+'">');
            $('.cropped').append('<span id="Gp_rmv_banner" class="Gp_rmv_banner" onclick="Removecrop_banner();" data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><span class="glyphicon glyphicon-trash"></span></span>');
            $('.savebtn').show();
            
        });
        $('#btnZoomIn').on('click', function(){
            cropper.zoomIn();
        });
        $('#btnZoomOut').on('click', function(){
            cropper.zoomOut();
        });
    
        $("#prd_form").submit(function (e){
                
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
                        Removecrop_banner();
                    }
                });
                 
                 /*
                 or
                 var posting = $.post( url, data_save);
                 posting.done(function(data){
                     
                 });
                 */
        });
    });
    
    $(document).on("click",'#file',function() {
        //alert('open');
        $('.Prd_UploadView').show();
        $('.stepshide').show();
    });
    
</script>