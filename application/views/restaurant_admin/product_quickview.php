<style>
    table.table_order > tbody > tr
{
    border-top: 1px solid #DDD;
    margin: 0px;
    padding: 0px;
}
table.table_order > tbody > tr:last-child 
{
    border-bottom: 1px solid #DDD;
}
table.table_order > tbody > tr > td
{
    padding-top: 10px!important;
    padding-bottom: 0px!important;
}
.custom-checkbox {
  min-height: 1rem;
  padding-left: 0;
  margin-right: 0;
  cursor: pointer;
  position: relative;
}
.custom-checkbox .custom-control-input {
        position: absolute;
        display:none;
        
}
  .custom-checkbox .custom-control-indicator {
    position: absolute;
    top:0px;
    left:-18px;
    z-index: 1;
    content: "";
    display: inline-block;
    position: relative;
    width: 30px;
    height: 10px;
    background-color: #818181;
    border-radius: 15px;
    margin-right: 10px;
    -webkit-transition: background .3s ease;
    transition: background .3s ease;
    vertical-align: middle;
    margin: 0 16px;
    box-shadow: none; 
  }
    .custom-checkbox .custom-control-indicator:after {
      content: "";
      position: absolute;
      display: inline-block;
      width: 18px;
      height: 18px;
      background-color: #f1f1f1;
      border-radius: 21px;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
      left: -2px;
      top: -4px;
      -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
      transition: left .3s ease, background .3s ease, box-shadow .1s ease; 
    }
  .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
    background-color: #84c7c1;
    background-image: none;
    box-shadow: none !important; 
  }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
      background-color: #84c7c1;
      left: 15px; 
    }
  .custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
    box-shadow: none !important; 
  }
  
  /* Custom modal content styling */

.modal-title {
  font-weight: 700;
  font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.modal-body {
  max-height:480px;
  min-height: 50px;
  overflow-y: auto;
  
 
}

.modal-footer {
  padding: 1.5em;
  text-align: right;
}

.center {
 text-align: center;   
}

.merge-bottom-input {
  width: 67px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.merge-top-left-button {
  border-top-left-radius: 0;
}

.merge-top-right-button {
  border-top-right-radius: 0;
}
.bord{
    border-bottom: 1px solid #DDD;
    padding: 10px 0;
}
.bb{
    border: solid red thin;
}
.order_img img{
    width: 100px;
    height: 90px;
}


    .db_prdimg {
        width: 70px;
        height: 50px;
    }
    
    #p_price,#p_name {
        width:250px; 
    }
    #p_text {
        width:200px;
    }
    #p_text textarea{
        float: left;
        width:150px; 
    }
    #p_price input,#p_name input{
        float: left;
        width:150px; 
    }
    #p_price a,#p_name a,#p_text a{
        float: left;
        width:40px;
    }
    #p_name,#p_price,#p_text {
        position: absolute;
        display:none;
    }
    .nodisplay{
        display: none;
    }
    .showdisplay{
        display: inline-block;
    }
    .savemenuimg {}
</style>

<!-- Modal -->
                
                    <div class="modal-dialog ">
                    
                        <div class="modal-content modal-center">
                    
                            <?php foreach ($product as $prd) :?>
                            <div class="modal-header mod-head " >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-center" id="Heading">
                                    
                                    <span class="p_namediv_<?= $prd['id'];?>"> &nbsp;
                                        <a href="javascript:void(0);" class="editname" data-p_id="<?= $prd['id'];?>"  data-p_name="<?= $prd['productname'];?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a> &nbsp;
                                        <?= $prd['productname'];?>
                                    </span>
                                    
                                </h3>
                
                            </div>
                            
                            <div class="modal-body nopadding" >

                                <div class="col-md-12  nopadding ">
                                    
                                    <input type="hidden" name="restaurantid" value="<?= $prd['restaurantid'] ?>">

                                    <div class="col-md-12">
                                        <div class="col-md-5" style="padding-right:0;">
                                            
                                            <form id="prd_imgfrom"  action="<?= site_url('restaurant_admin/product_imgupdate') ?>" method="post" class="" enctype="multipart/form-data">
                                            <div class="order_img"> 
                                                <?php

                                                    if(!empty($prd['productimage']))
                                                        {
                                                            $prd_img= $prd['productimage'];
                                                        }
                                                    else 
                                                        {
                                                            $prd_img= 'no_food_img.jpg';
                                                        }
                                                ?>
                                                <div class="O_Uplode">
                                                    <input type="file" name="p_displayimg" accept="image/*" onchange="GetUpload(this);" id="base-input" class="form-control form-input form-style-base">
                                                    <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your Image" readonly="" accept="image/jpeg">
                                                    <span class="glyphicon glyphicon-upload UplodeIcon"></span>
                                                </div>

                                                <div class="logo_UploadView">

                                                    <img class="UploadView" src="<?= base_url()?>assets/uploads/rest_prod/<?= $prd_img ?>" />
                                                    <span class="imgdisplaybtn Gp_rmv nodisplay" onclick="RemoveUpload();" data-placement="top" data-toggle="tooltip" title="Remove Menu pics"><span class="glyphicon glyphicon-trash"></span></span>
                                                    <button type="submit" class="imgdisplaybtn savemenuimg nodisplay btn btn-sm btn-success" data-p_id="<?= $prd['id'];?>" data-placement="top" data-toggle="tooltip" title="Save Menu pics"><i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i></button>
                                                    

                                                </div>
                                                <!--<img class="" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $prd_img ?>">-->
                                                <input type="hidden" id="prd_img_<?= $prd['id'];?>" name="id" value="<?= $prd['id'];?>">
                                            </div>
                                            </form>
                                        </div>
                                        
                                        <div class="col-md-7">

                                            <div class="labelheader">
                                                <h5> <b>Product Description</b></h5>
                                                 <p>
                                                    <span class="p_textdiv_<?= $prd['id'];?>"> &nbsp;
                                                        <a href="javascript:void(0);" class="edittext" data-p_id="<?= $prd['id'];?>"  data-p_name="<?= $prd['productdesc'];?>">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a> &nbsp;

                                                        <span class="productdesc"><?= $prd['productdesc'];?> </span>
                                                    </span>
                                                </p>
                                                

                                            </div>

                                        </div>
                                    </div>


                                    <div class=" col-md-12 ">

                                        <div class="col-md-2 text-right nopadding"> 

                                            <h4 class=" nopadding nomargin" > 
                                                    <b>Price :</b>
                                                </h4> 
                                                 
                                        </div>

                                        <div class="col-md-4 " style=" padding-top: 10px; font-size: 16px;">
                                                    
                                                    <span class="p_pricediv_<?= $prd['id'];?>">  &nbsp;
                                                        <a href="javascript:void(0);" class="editprice" data-p_id="<?= $prd['id'];?>" data-p_type="main"  data-p_price="<?= $prd['productprice'];?>">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a> &nbsp;
                                                        ₦ <?= $prd['productprice'];?>
                                                    </span>

                                        </div> <!--col-->

                                    </div>

                                   
                                    <?php endforeach;?>


                                    <div class=" col-md-12" >

                                        <?php if(!empty($product_list)): ?>

                                        <div class="section-label " style=" padding-bottom: 0;"> 

                                            <a class="section-label-a"> 
                                                <span class="spansize"> 
                                                    ( <b>SubMenu</b> - Added to This Menu )
                                                </span> 
                                                <b></b> 
                                            </a>
                                        </div>
                                        <div class="text-right" style="padding:5px 0px; color:#4AB1EE;">

                                            <!--<span>Go shoping online at <strong style="color:#D80000;">shoprite</strong> </span>-->
                                            <button type="button" class="btn btn-store btn-sm" style="width: 30%;"><span class="glyphicon glyphicon-ok-sign" style=""></span> Add More <strong style="color:#D80000;">SubMenu</strong></button>

                                        </div>

                                        <?php foreach ($product_list as $prd_list) :?>

                                        <div id="sub_menu_div_<?= $prd_list['childproductid'] ?>">
                                            
                                        </div>
                                        
                                        <div class="col-sm-12 nopadding bord">

                                            <div class="col-sm-6 ">
                                                
                                                <span class="p_namediv_<?= $prd_list['childproductid'];?>"> &nbsp;
                                                    <a href="javascript:void(0);" class="editname" data-p_id="<?= $prd_list['childproductid'];?>"  data-p_name="<?= $prd_list['productname'];?>">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a> &nbsp;
                                                    <strong><?= $prd_list['productname'] ?></strong>
                                                </span>
                                                <span></span>
                                            
                                            </div>

                                           

                                            <div class="col-sm-5 "> 
                                                
                                                <span class="p_pricediv_<?= $prd_list['childproductid'];?>">  &nbsp;
                                                    <a href="javascript:void(0);" class="editprice" data-p_type="sub" data-p_id="<?= $prd_list['childproductid'];?>"  data-p_price="<?= $prd_list['price']; ?>">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a> &nbsp;
                                                    ₦ <?= $prd_list['price']; ?>
                                                </span>
                                           
                                            </div>
                                            <div class="col-sm-1 "> 
                                                
                                            <a href="javascript:void(0);" class="delete_submenu" style="color:#D80000;" data-p_id="<?= $prd_list['id'];?>" data-p_name="<?= $prd_list['productname'];?>" data-placement="top" data-toggle="tooltip" title="Remove SubMenu">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            
                                            
                                            </div>

                                        </div>
                                        <?php endforeach;?>
                                        <?php else: ?>

                                        </form>
                                        <?php endif; ?>
                                    </div>


                                </div>
                                
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            	<div class="text-right pull-right ">view all <strong style="color:#D80000;">Menu</strong> Categories </div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

                    
                     
                    <!-- Modal confirm delete submenu Product -->
                    <div class="modal" id="confirmModal" style="display: none; z-index: 10;">
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
        
                    
                    <!-- Product Price div-->
                    <div id="p_price">
                        <input type="number" data-p_id="" data-p_type="" name="new_p_price" class="form-control cu_phone_js" min="1" value="" >
                        <a  id="p_price_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closeprice" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    
                    <!-- Product Name div-->
                    <div id="p_name">
                        <input type="text" data-p_id="" name="new_p_name" class="form-control" value="" >
                        <a  id="p_name_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closename" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!-- Product Text div-->
                    <div id="p_text">
                        <textarea  data-p_id="" name="new_p_test" class="form-control" rows="3"></textarea>
                        <a  id="p_des_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closetext" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
<script type="text/javascript">

    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }

        });
</script>


<script>
    // Edit Product Price 
    $(".modal-dialog").on("click",".editprice", function(e){
        e.preventDefault();
        
        var p_Id    = $(this).data('p_id');
        var p_Price = $(this).data('p_price');
        var p_Type  = $(this).data('p_type');
        
        $('[name="new_p_price"]').val(p_Price);
        $('[name="new_p_price"]').data('p_id',p_Id); // sets value
        $('[name="new_p_price"]').data('p_type',p_Type); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top -30;
        var newleft = position.left -5;
        $('#p_price').css({top: newtop, left: newleft, display: 'block'});
        
    });
    
    // close the status option button
    $('#closeprice').click(function (e) {
        e.preventDefault();
        $('#p_price').hide();
    });
    
    
    // on Product Price change 
    $('#p_price_save').click(function (e) {
            e.preventDefault();
            
            var new_price = $('[name="new_p_price"]').val();  // gets value
            var p_id_     = $('[name="new_p_price"]').data('p_id'); // gets id
            var p_type_   = $('[name="new_p_price"]').data('p_type'); // gets type
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/product_priceupdate') ?>',
                    dataType: 'json',
                    data:{
                            price:new_price,
                            p_id:p_id_,
                            p_type:p_type_
                        },
                    success:function(html){
                        
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
                            content: 'Success! Submenu Price Updated',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        $('#order_datatable').DataTable().ajax.reload();
                        $('.p_pricediv_'+p_id_).html(html);
                        //$('.cat_orderdiv_'+cat_id_).html(html);
                        
                    } 
                    
                });
                
            $('#p_price').hide();
        
    });
 
</script> 


<script>
    // Edit Product name 
    $(".modal-dialog").on("click",".editname", function(e){
        e.preventDefault();
        
        var p_Id = $(this).data('p_id');
        var p_Name = $(this).data('p_name');
        
        $('[name="new_p_name"]').val(p_Name);
        $('[name="new_p_name"]').data('p_id',p_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top -30;
        var newleft = position.left - 5;
        $('#p_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#p_name').hide();
    });
    
    
    // on name change 
    $('#p_name_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_p_name"]').val();
            var p_id   = $('[name="new_p_name"]').data('p_id'); // gets value
            
            
                
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('restaurant_admin/product_nameupdate') ?>',
                    dataType: 'json',
                    data: {
                            p_id: p_id,
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
                        content: 'Success! Menu name '+ new_name +' Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#p_name').hide();
                    $('.p_namediv_'+p_id).html(data);
                    $('#order_datatable').DataTable().ajax.reload();
                });
            
    });
 
</script> 


<script>
    // Edit Product Description 
    $(".modal-dialog").on("click",".edittext", function(e){
        e.preventDefault();
        
        var p_Id = $(this).data('p_id');
        var p_Name = $(this).data('p_name');
        
        $('[name="new_p_test"]').val(p_Name);
        $('[name="new_p_test"]').data('p_id',p_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top -30;
        var newleft = position.left - 5;
        $('#p_text').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closetext').click(function (e) {
        e.preventDefault();
        $('#p_text').hide();
    });
    
    
    // on Description change 
    $('#p_des_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_p_test"]').val();
            var p_id     = $('[name="new_p_test"]').data('p_id'); // gets value
            
            
                
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('restaurant_admin/product_desupdate') ?>',
                    dataType: 'json',
                    data: {
                            p_id: p_id,
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
                        content: 'Success! Menu Description  Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#p_text').hide();
                    $('.p_textdiv_'+p_id).html(data);
                    $('#order_datatable').DataTable().ajax.reload();
                });
            
    });
 
</script> 

<script>
    
    // on delete submenu  
    $(document).on("click",".delete_submenu", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('p_name');
       var p_Id = $(this).data('p_id');
       
       confirmDialog_cart(msgg, function(){
            $.ajax({
                    type: "POST",
                    url: '<?= site_url('restaurant_admin/product_submenudelete') ?>',
                    dataType: 'json',
                    data: {
                            p_id: p_Id
                            }
                }).done(function (data) {
                    if (data.status === '1')
                        {
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
                                content: 'Success! SubMenu Deleted',
                                delayOnHover: true,
                                showCountdown: true,
                                closeButton: true
                            });
                        }
                    
                    });
                
                $('#modal_prd').modal('hide');
                $('#order_datatable').DataTable().ajax.reload();
        });
                
    });
    function confirmDialog_cart(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#confirmModal");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
        }
</script>



<script type="text/javascript">
    	
        $('input[id=base-input]').change(function() {
            //$('.logo_UploadView').show();
            $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
            $('.imgdisplaybtn').removeClass('nodisplay');
            $('.savemenuimg').removeClass('nodisplay');
        });
    
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
        
        
        $('.UploadView').attr('src', '<?= base_url()?>assets/uploads/rest_prod/<?= $prd_img ?>');
        $('#fake-input').val('Choose your Image');
        $('.imgdisplaybtn').addClass('nodisplay');
        $('.savemenuimg').addClass('nodisplay');
        
    }

    $('#prd_imgfrom').submit(function (e){
                
            e.preventDefault();
            
            var url = $(this).attr('action');
            var method = $(this).attr('method');
                
                $.ajax({
                    url:url,
                    type:method,
                    dataType: 'json',
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    success:function(html){
                        if(html.status === '1' )
                            { 
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
                                    content: 'Success! Memu image  Updated',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                $('#fake-input').val('Choose your Image');
                                $('.imgdisplaybtn').addClass('nodisplay');
                                $('.savemenuimg').addClass('nodisplay');
                                $("#prd_imgfrom")[0].reset();
                                $('#order_datatable').DataTable().ajax.reload();

                            }
                        else if(html.status === '0' )
                            {
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
                                    color: 'red',
                                    autoClose: Math.random() * 8000 + 2000,
                                    content: 'Error! Memu image  Error',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                $("#prd_imgfrom")[0].reset();
                            } 
                    }
                    
                });
                
        $('#order_datatable').DataTable().ajax.reload();
    });
    
</script>