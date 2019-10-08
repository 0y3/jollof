<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
    <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
<style>
.cart_table tr th {
    color: #688a7e !important;
    font-weight: 800;
}
.cart_table tr td {
    min-width: 85px;
}
.cart_img{
    max-width: 30px;
    height: 30px; 
}
.cart_menu {
    font-size: px;
    font-weight: 500;
}
.cart_sub_menu {
    font-size: 11px;
}
.boldtext {
    font-weight: bold;
}
</style>
<div class="modal-dialog" style="">

        <div class="modal-content">

            <div class="modal-header ">
                
                <span class="text-center" style=" font-size: 24px; color: #000;">Shopping Cart</span>

                <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body" id="cart_details">
                <?php if(!empty($cart_list)): ?>
                <table class="table table-re table-striped table-hover table-bordered cart_table">
                    <tbody>
                        <tr>
                            <th>Item</th>
                            <th>QTY</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                        
                        <?php foreach ($cart_list as $items) :?>
                        
                        <?php 
                            //print("<pre>".print_r($items,true)."</pre>");
                            //die;
                        ?>
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm-2 nopadding ">
                                    <img class="cart_img" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $items["img"]?>" >
                                </div>
                                
                                <div class="col-sm-10 nopadding" style="padding-left:5px;">
                                    <div class="cart_menu"><?= $items["name"]?><div>
                                </div>
                                
                            </td>
                            <td class="cart_qty_td">
                               
                                <div class="col-sm-6 nopadding ">
                                    <div class="cart_qty"><?= $items["qty"]?></div>
                                    <input type="hidden" class="cart_suball_qty" value="">
                                </div>
                                <div class="col-sm-6 nopadding ">
                                    <a href="javascript:;" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?= base_url(); ?>restaurants/order_form/<?= $items['id'] ?>" data-toggle="tooltip" title="Edit!" id="<?=$items["rest"]?>">
                                        <i class="fa fa-pencil-square-o" style="color: green;"></i>
                                    </a>
                                    <a href="#" data-toggle="tooltip" title="Remove from Cart!" class="del_cart" id="<?=$items["rowid"]?>">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </div>
                                
                            </td>
                            <td class="cart_price_td">
                                <div class="cart_price"><?= $items["price"]?></div>
                                <input type="hidden" class="cart_suball_price" value="<?= $items["price"]?>">
                            </td>
                            
                            <td class="cart_price_total"><?= $items["subtotal"]?></td>
                        </tr>
                        <?php endforeach;?>
                        
                        
                        
                        <tr>
                            <th colspan="3"><span class="pull-right">Sub Total</span></th>
                            <td class="boldtext cart_price_sub_grandtotal">₦</td>
                        </tr>
                        <tr>
                            <th colspan="3"><span class="pull-right">VAT 20%</span></th>
                            <td class="boldtext cart_vat">50.00</td>
                        </tr>
                        <tr>
                            <th colspan="3"><span class="pull-right">Total</span></th>
                            <td class="boldtext cart_price_grandtotal">₦</td>
                        </tr>
                        
                        <tr>
                            <td>
                                <a href="" class="btn btn-danger" id="btnDelete">Empty Cart</a>
                            </td>
                            <td colspan="3">
                                <a href="<?= site_url('accounts/login')?>" data-toggle="modal" data-target="#modal_login" data-popup="#login_popup" class="pull-right btn btn-success checkout">Checkout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                      
                
                
                 <?php else: ?>
                
                        <div class="alert alert-danger alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Oh snap!</strong>
                            Sorry Cart is Empty.
                        </div>

                    <?php endif; ?>
                
            </div><!-- .modal-body --> 
            
           
            
        </div><!-- .modal-content --> 
        
    </div><!-- .modal-dialog --> 

<!-- Modal confirm Clear Cart Product -->
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

<!-- Modal confirm Empty Cart -->
    <div class="modal" id="empty_confirmModal" style="display: none; z-index: 10;">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>



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
    e.preventDefault();
    var islogin = $(".log").data("log");
    var url = "<?=site_url('checkout/products') ?> "; //$(this).attr('href');
    
        if ( islogin === 1){
             window.location.href = url;
        }
          
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
        $(".cart_price_sub_grandtotal").text($overall);
        
        var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
    
        var $grand_price = $sub_grand + $vat;

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
                        $('#cart_details').html(data);
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
    	    };
    	    var modal = $("#confirmModal");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
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
    	    };
    	    var modal = $("#empty_confirmModal");
    	    modal.modal("show");
    	    $("#empty_confirmMessage").empty().append(message);
    	    $("#empty_confirmOk").one('click', onConfirm);
    	    $("#empty_confirmOk").one('click', fClose);
    	    $("#empty_confirmCancel").one("click", fClose);
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