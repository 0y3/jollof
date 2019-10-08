    <!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
    <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script> -->
<style>
.fade.in {
    opacity: 1 ;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .5;
}
.cart_table tr th {
    color: #688a7e !important;
    font-weight: 800;
}
.cart_table tr td {
    min-width: 80px;
}
.cart_img{
    max-width: 50px;
    height: 40px; 
}
.cart_menu {
    font-size: px;
    font-weight: 500;
    color: #84c7c1;
}
.cart_sub_menu {
    color: #818181;
    font-size: 12px;
    font-weight: 600;
}
.boldtext {
    font-weight: bold;
}
.cart_desc {
    max-width: 140px;
}
.sub_menu_name {
    padding-right: 5px;
}
.cart_sub_menu table {
    width: 80px !important;
    max-width: 50% !important;
    margin: 0 !important;
}
.cart_sub_menu table tr{
    padding: 0px !important;
    margin: 0 !important;
}
.cart_sub_menu table tr td{
    padding:2px 0px !important;
}
.cart_sub_menu table tr td:last-child {
    color: red;
    padding-right: 10px !important;
}
.imgcart{
   /*max-width: 30%;*/
   width: 60px !important;
}
.linkcolor a
{
    color: #e74c3c; 
}
.spansize {
    font-size: 14px!important;
}
.section-label a.section-label-a {
    color: #333;
    display: block;
    padding-top: 8px;
    padding-bottom: 8px;
    position: relative;
}
.section-label a.section-label-a span {
    background-color: #FFF;
    position: relative;
    font-size: 28px;
    font-weight: 800;
    z-index: 2;
    padding: 0 8px 0px 0;
}
.section-label a.section-label-a b {
    border-bottom: 1px solid #ddd;
    width: 100%;
    display: block;
    position: absolute;
    top: 50%;
    left: 0;
    z-index: 1;
}
.modd{
        width:650px;
    }
    ::-webkit-scrollbar{
    width:10px;
    background:#444;
}
::-webkit-scrollbar-thumb{
    -webkit-border-radius:4px;
    border-radius:4px;
}
/** MEDIA QUERIES **/
    @media only screen and (max-width: 989px){
        .modd{
            width:unset;
        }
    }

    @media only screen and (max-width: 764px){
        .modd{
            width:unset;
        }
    }

    @media only screen and (max-width: 586px){
        .modd{
            width:unset;
        }
    }
</style>

<div class="modal-dialog modd" role="document" >

    <div class="modal-content" >
        <div class="modal-header ">
            
            <span class="text-center" style=" font-size: 24px; color: #000;">Shopping Cart</span>

            <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>

        </div>

        <div class="modal-body" id="cart_details">
                <?php if(!empty($cart_list)): ?>
                
                <div class="table-responsive">
                                
                <table class="table table-re table-striped table-hoverr table-borderedd cart_table">
                    <thead>
                        <tr>
                            <th ><b>Products</b></th>
                            <th><b>Quantity</b></th>
                            <th ><b>Price</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach ($cart_list as $items) :?>
                        
                        <?php 
                            //print("<pre>".print_r($cart_list,true)."</pre>");die;
                        ?>
                        <?php if(!empty($items['product_color_size'])): ?>
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm- nopadding ">
                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/fashion_prod/thumbs/<?= $items["img"]?>" >
                                    <div class="f_left">
                                        <div class="m_bottom_5" style=" max-width:175px;">
                                            <h6 class="linkcolor"><a href="javascript:void(0);" data-toggle="tooltip" title="<?=$items["name"]?>">
                                        <?php
                                                $value = $items["name"];
                                                $limit = '35';
                                                if (strlen($value) > $limit) {
                                                        $trimValues = substr($value, 0, $limit).'...';
                                                    } 
                                                else {
                                                        $trimValues = $value;
                                                  }
                                                    //character_limiter($resta['companydesc'],25); 
                                                  echo $trimValues;
                                        ?>
                                            </a>
                                            </h6>
                                        </div>
                                        <div class="clearfix f_size_medium">
                                            Color:  <b><?= $items["product_colorname"]?></b>
                                            <br>
                                            Size:  <b><?= $items["product_size"]?></b>
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>   
                                    
                        <?php else: ?>
                            
                        <tr class="cart_row_total">
                            <td>
                                <div class=" nopadding">
                                    
                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $items["img"]?>" >
                                    <div class="f_left">
                                        <div class="m_bottom_5">
                                            <h6 class="color_darkk linkcolor"><a href="javascript:void(0);"><?= $items["name"]?></a></h6>
                                        </div>
                                        <div class="clearfix f_size_medium">
                                                <?= $items["prd_qty"]?>qty x <b>₦<?= number_format($items["prd_pr"],2)?></b>
                                        </div>
                                        <?php if(!empty($items['description'])): ?>
                                        <div class="cart_desc" style=" max-width:350px;">
                                            <span  style="font-weight: 800">Note:</span>  <?= $items['description']?>
                                                
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div style=" clear:both;"></div>
                                </div>
                                
                                <div class="col-sm-12 nopadding" style="padding-left:5px;" >
                                    
                                
                                    <?php if(!empty($items['submenu'])): ?>
                                        <div class="section-label " style=" padding-bottom: 0;"> 

                                            <a class="section-label-a"> 
                                                <span class="spansize"> 
                                                    Additional Options
                                                </span> 
                                                <b></b> 
                                            </a>
                                        </div>
                                    <div class="col-sm-12 nopadding bord">
                                        <div class="cart_sub_menu">
                                            
                                            <!--<span class="sub_menu_name"><?= $submenu[0]?> :</span> <?= $submenu[1]?>qty <span class="pull-right">₦<?= $submenu[2]?></span>-->
                                            <table class=" ">     
                                                <tbody>
                                    <?php foreach ($items['submenu'] as $submenu) :?>
                                                    <tr>
                                                        <td style=" max-width:120px"><?= $submenu[0]?></td>
                                                        <td class="text-center"><?= $submenu[1]?>qty </td>
                                                        <td class="text-left">₦<?= number_format($submenu[2],2)?></td>
                                                    </tr>
                                                
                                    
                                    <?php endforeach; ?>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                        <?php endif; ?>

                                </div>

                            </td>
                            <textarea name="addedmenu" class="form-control" rows="5" style="display: none;"><?php if(!empty($items['submenu'])): ?>
                                            <?php foreach ($items['submenu'] as $submenu) :?>
                                                <div class="added_menu">
                                                    <table class=" ">     
                                                        <tbody>
                                                            <tr>
                                                                <td><?= $submenu[0]?></td>
                                                                <td class="text-center"><?= $submenu[1]?>qty </td>
                                                                <td class="text-right"> ₦<?= $submenu[2]?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?></textarea>
                            <td class="cart_qty_td">
                            
                                 <div class="col-sm-6 nopadding">
                                    <div class="cart_qty"><?= $items["prd_qty"]?></div>
                                    <input type="hidden" class="cart_suball_qty" value="">
                                </div>
                                
                                <div class="col-sm-6 nopadding ">
                                
                                <?php if(!empty($items['product_color_size'])): ?>
                                    <?php
                                        $this->load->model('oye/Fashion_model');
                                        $store= $this->Fashion_model->_getstoreurl($items['rest']);
                                        $store_product= $this->Fashion_model->_getproducturl($items['mainfashion_productid']);
                                    ?>
                                    <a href="<?= base_url(); ?>fashion/store/<?=$store ?>/<?= $store_product ?>" class="" data-toggle="tooltip" title="Edit!" id="<?=$items["rest"]?>">
                                        <i class="far fa-edit" style="color: green; cursor: pointer;"></i>
                                    </a>
                                <?php else: ?>
                                    <!--<a href="#" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?= base_url(); ?>restaurants/order_form/<?= $items['cuisine_productid'] ?>" data-toggle="tooltip" title="Edit!" id="<?=$items["rest"]?>">-->
                                    <a href="<?= base_url(); ?>restaurants/orderform/<?= $items['cuisine_productid'] ?>" class="" data-toggle="tooltip" title="Edit!" id="<?=$items["rest"]?>">
                                        <i class="far fa-edit" style="color: green; cursor: pointer;"></i>
                                    </a>
                                <?php endif; ?>
                                    <a href="#" data-toggle="tooltip" title="Remove from Cart!" class="del_cart" id="<?=$items["rowid"]?>">
                                        <i class="far fa-trash-alt" style=" color: #e74c3c;"></i>
                                    </a>
                                </div>
                                
                            </td>
                            
                            <td class="cart_price_total">
                                <span style="display:none;"><?= $items["price"]?></span>
                                <div class="cart_price">₦<?= number_format($items["price"],2)?></div>
                                <input type="hidden" name="cart_price_total" class="cart_suball_price" value="<?= $items["price"]?>">

                            </td>
                            
                            <!--<td class="cart_price_total"><?= $items["subtotal"]?></td>-->
                        </tr>
                        <?php endforeach;?>
                        
                        
                        
                        <tr>
                            <th colspan="2"><span class="pull-right">Sub Total</span></th>
                            <td class="boldtext cart_price_sub_grandtotal2"></td>
                            <span class="cart_price_sub_grandtotal" style=" display: none;"></span>
                        </tr>
                        <tr>
                            <th colspan="2"><span class="pull-right">VAT</span></th>
                            <td class="boldtext"><span class="cart_vat"><?=$vat?></span>%</td>
                        </tr>
                        <tr>
                            <th colspan="2"><span class="pull-right">Total</span></th>
                            <td class="boldtext cart_price_grandtotal2">₦</td>
                            <span class="cart_price_grandtotal" style=" display: none;"></span>
                        </tr>
                        
                        <tr>
                            <td>
                                <a href="" class="btn btn-danger" id="btnDelete">Empty Cart</a>
                            </td>
                            <td colspan="2">
                                <a href="<?= site_url('checkout/products')?>" class="pull-right btn btn-success checkout">Checkout</a>
                                <!--<a href="<?= site_url('accounts/login')?>" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup" class="pull-right btn btn-success checkout">Checkout</a>-->
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div><!-- .table-responsive --> 
            
           <?php else: ?>
                
            <div class="alert alert-danger alert-dismissable fade in col-12">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oh snap!</strong>
                Sorry Cart is Empty.
            </div>

        <?php endif; ?>
            
        </div><!-- .modal-body --> 
        
    </div><!-- .modal-content --> 
</div>><!-- .modal-dialog --> 



<script>
$("[data-toggle='modal']").click(function(e) {
    /* Prevent Default*/
    e.preventDefault();
                        
    /* Parameters */
    var url = $(this).attr('href');
    var container = $(this).attr('data-target');
                
    /* XHR */
    $.get(url).done(function(data) {
        $(container).html(data).modal();
    }).success(function() { $('input:text:visible:first').focus(); });
            
});    
</script>


<script>
//check is log in then go to payment 
$(".checkout").on('click',function (e){
    <?php
    if(isset($_SESSION['logged_in']))
    {
        $sess=$_SESSION['logged_in'];
    }
    else{ $sess=0; }
    ?>
    e.preventDefault();
    var pathArray = window.location.pathname.split( '/' )[2];
    //alert(pathArray);
    
    var islogin = $(".log").data("log");
    var session = <?= $sess?>;
    var url = '<?=site_url('checkout/products') ?>?nav_path='+pathArray; //$(this).attr('href');
        if ( (islogin === 1) || (session===1)){
             window.location.href = url;
        }
        //else{window.location.href = '<?=site_url('accounts/login') ?>';}
        else{window.location.href = url;}
        
          
}); 

</script>


<script>
    
$(document).ready(function() {
    var $overall = 0;
    var $vat = parseFloat($('.cart_vat').text());
    var $allqty  = 0;

    $(".cart_row_total").each(function()
        {
            
            var $price = parseFloat($(this).find("td.cart_price_total").text());
            $overall+= $price;
            

        });
        var $overall_format=($overall).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); 
        $(".cart_price_sub_grandtotal2").text('₦'+$overall_format);
        $(".cart_price_sub_grandtotal").text($overall);
        
        var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
    
        var $grand_price = $sub_grand + $vat;
        
        var $grand_price_format=($grand_price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); 
        $(".cart_price_grandtotal2").text('₦'+$grand_price_format);
        $(".cart_price_grandtotal").text($grand_price);
    
    

   });   

</script>

<script>
 
    $(document).on('click','.del_cartt', function(e){
        var row_id = $(this).attr("id");
        //e.stopImmediatePropagation();
        e.preventDefault();
            if(confirm("Are you sure you want to remove this?"))
                {
                    $.ajax({
                     url:"<?php echo base_url(); ?>cart/remove",
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{rowid:row_id},
                     success:function(data)
                     {
                        //alert("Product removed from Cart");
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'red',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Removed! Product Removed from Cart',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        $('#cart_details').html(data);
                        $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                     }
                    });
                }
            else
                {
                    return false;
                }
   });
</script>
<script>
    var msgg = "Are you sure you want to remove this Product?";
    
        $(document).on('click','.del_cart', function(e){
                var row_id = $(this).attr("id");
                e.preventDefault();
                
    		confirmDialog_cart(msgg, function(){
                    
    			//My code to delete
                    $.ajax({
                     url:"<?php echo base_url(); ?>cart/remove",
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{rowid:row_id},
                     success:function(data)
                     {
                        //alert("Product removed from Cart");
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'red',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Removed! Product Removed from Cart',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        //$('#cart_details').html(data);
                        var modal = $("#modal_cart_container");
                        modal.modal("hide"); 
                        //$('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                     }
                    }).done(function(){
                            $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                            
                            //calculate the new total price 
                            var $vat = parseFloat($('.cart_vat').text());
                            var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
                            var $grand_price = $sub_grand + $vat;

                            $(".cart_price_grandtotal").text($grand_price);
                    });
                });
    	});

        function confirmDialog_cart(message, onConfirm){
    	    var fClose = function(){
                
    		modal.modal("hide");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').remove();
                
                
                $('#modal_cart_container').modal("show");
                
    	    };
    	    var modal = $("#confirmModal");
            $('#modal_cart_container').modal("hide");
            $("body").removeClass("modal-open");
            $('.modal-backdrop').remove();
            
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
            $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
            $("#confirmCancel").unbind().one("click", fClose);
    	    /*$("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
            */
        }
  </script>
  
  <script>
    var empty_msg = "Are you sure you want to clear cart?";
      $(document).on('click','#btnDelete', function(e){
          
            e.preventDefault();
          
    		confirmDialog(empty_msg, function(){
    			//My code to delete
                    $.ajax({
                        url:"<?php echo base_url(); ?>cart/clear",
                        method:"POST",
                        success:function(data)
                        {
                            new jBox('Notice', {
                               //animation: 'flip',
                               animation: {
                                 open: 'tada',
                                 close: 'zoomIn'
                               },
                               attributes: {
                                 x: 'right',
                                 y: 'bottom'
                               },
                               color: 'red',
                               autoClose: Math.random() * 8000 + 2000,
                               content: 'Empty! Cart Empty',
                               delayOnHover: true,
                               showCountdown: true,
                               closeButton: true 
                            });
                         $('#cart_details').html(data);
                        }
                    }).done(function(){
                            $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                    });
                });
    	});

        function confirmDialog(message, onConfirm){
    	    var fClose = function(){
                
    		modal.modal("hide");
                $("body").removeClass("modal-open");
                $('.modal-backdrop').remove();
                
                $('#modal_cart_container').modal("show");
    	    };
    	    var modal = $("#empty_confirmModal");
            
            $('#modal_cart_container').modal("hide");
            $("body").removeClass("modal-open");
            $('.modal-backdrop').remove();
            
    	    modal.modal("show");
    	    $("#empty_confirmMessage").empty().append(message);
            $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
            $("#empty_confirmCancel").unbind().one("click", fClose);
            /*
    	    $("#empty_confirmOk").one('click', onConfirm);
    	    $("#empty_confirmOk").one('click', fClose);
    	    $("#empty_confirmCancel").one("click", fClose);
            */
        }
  </script>
  
  

  <script>
  $(document).ready(function() {
  
    $('.edit_cart').on('click', function(e){

          var modal = $("#confirmModal");
              modal.modal("hide");        
      });
      
      
      
    });
  </script>