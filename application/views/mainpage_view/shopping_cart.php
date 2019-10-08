<html>
<head>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">

<link href="<?= base_url(); ?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
<!--js-->
<script src="<?= base_url(); ?>assets/js/jquery-2.1.1.min.js"></script> 
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> 
</head>
<style>
    .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
    }
    @media screen and (max-width: 600px) {
        table#cart tbody td .form-control{
                    width:20%;
                    display: inline !important;
            }
            .actions .btn{
                    width:36%;
                    margin:1.5em 0;
            }

            .actions .btn-info{
                    float:left;
            }
            .actions .btn-danger{
                    float:right;
            }

            table#cart thead { display: none; }
            table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
            table#cart tbody tr td:first-child { background: #333; color: #fff; }
            table#cart tbody td:before {
                    content: attr(data-th); font-weight: bold;
                    display: inline-block; width: 8rem;
            }



            table#cart tfoot td{display:block; }
            table#cart tfoot td .btn{display:block;}

    }
</style>
<body>
<div class="container">
 <br /><br />
 
 <div class=" col-xs-push-9">
     <a href="#" class="dropdown-toggle" role="button" aria-expanded="false"> 
         <i class="fa fa-shopping-cart "></i> <samp class="cart_no"> </samp> - Items
     </a>     
 </div>
 <div class="col-lg-6 col-md-6">
     

    <!-- CUTTED -->
    <div id="" class="modal-footer">
      <button type="button" class="glyphicon glyphicon-erase btn btn-default" id="btnDelete"> Delete</button>
    </div>

    <!-- Modal confirm -->
    <div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
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



    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                  </div>

                  <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
            </div>
            <!-- /.modal-content --> 
        </div>
          <!-- /.modal-dialog --> 
    </div>


   <div class="table-responsive">
   <h3 align="center">Codeigniter Shopping Cart with Ajax JQuery</h3><br />
   <?php
   foreach($product as $row)
   {
    echo '
    <div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc; margin-bottom:16px; height:400px" align="center">
     <img src="http://lorempixel.com/100/100" class="img-thumbnail" /><br />
     <h4>'.$row->product_name.'</h4>
     <h3 class="text-danger">$'.$row->product_price.'</h3>
     <input type="number" min="1" value="1" name="quantity" class="form-control quantity" id="'.$row->product_id.'" /><br />
     <button type="button" name="add_cart" class="btn btn-success add_cart" data-toggle="modal" data-target="#cartmodel" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'" />Add to Cart</button>
    </div>
    ';
   }
   ?>
      
  </div>
     
<!-- Modal -->
                <div class="modal fade" id="cartmodel" tabindex="-1" role="dialog" aria-labelledby="william" aria-hidden="true" >
        
                    <div class="modal-dialog nwt_modal-width ">
                    
                        <div class="modal-content nwt_modal_center ">
                    
                            <div class="modal-header nwt_modal_closebtn " >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                            </div>
                            
                            <div class="modal-body " style="padding:0 20px 20px 20px;">
                  
                                <h3 class="modalh3">
                                    
                                </h3>
                                
                            </div><!-- .modal-body --> 
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 
                
                </div>
<!-- end Modal -->

 </div>
 <div class="col-lg-6 col-md-6">
  <div id="cart_details">
   <h3 align="center">Cart is Empty</h3>
  </div>
 </div>
 
 <div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">Product 1</h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price">$1.99</td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1">
							</td>
							<td data-th="Subtotal" class="text-center">1.99</td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
                                                
                                                <tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">Product 1</h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price">$1.99</td>
							<td data-th="Quantity">
								<input type="number" class="form-control text-center" value="1">
							</td>
							<td data-th="Subtotal" class="text-center">1.99</td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
					</tbody>
					<tfoot>
                                            
                                                
                                                <tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
                                                        
						</tr>
                                                
                                                <tr style=" border: none;">
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="" placeholder="Coupon text" />
                                                            <span class="input-group-btn">
                                                             <button class="btn btn-default" type="button">Add Coupon</button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                                        
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
                                                
					</tfoot>
				</table>
</div>
 
</div>
</body>
</html>
<script>
$(document).ready(function(){
 
 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var quantity = $('#' + product_id).val();
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping-cart/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     //alert("Product Added into Cart");
     $('.modalh3').text("Product Added into Cart",data);
     $('#cart_details').html(data);
     $('#' + product_id).val(1);
    }
   }).done(function(){
            $('.cart_no').load("<?php echo base_url(); ?>shopping-cart/cart_count");
      });
  }
  else
  {
   //alert("Please Enter quantity");
   $('.modalh3').text("Please Enter quantity");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>shopping-cart/load");
 $('.cart_no').load("<?php echo base_url(); ?>shopping-cart/cart_count");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping-cart/remove",
    method:"POST",
    //dataType: "json", // Set the data type so jQuery can parse it for you
    data:{row_id:row_id},
    success:function(data)
    {
     //alert("Product removed from Cart");
     $('.modalh3').text("Product removed from Cart");
     $('#cart_details').html(data);
    }
   }).done(function(){
            $('.cart_no').load("<?php echo base_url(); ?>shopping-cart/cart_count");
      });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>shopping-cart/clear",
    success:function(data)
    {
     //alert("Your cart has been clear...");
     $('.modalh3').text("Your cart has been clear...");
     $('#cart_details').html(data);
    }
   }).done(function(){
            $('.cart_no').load("<?php echo base_url(); ?>shopping-cart/cart_count");
      });
  }
  else
  {
   return false;
  }
 });

});


</script>
<script>
    var YOUR_MESSAGE_STRING_CONST = "Are you sure you want to clear cart?";
      $('#btnDelete').on('click', function(e){
    		confirmDialog(YOUR_MESSAGE_STRING_CONST, function(){
    			//My code to delete
                    $.ajax({
                        url:"<?php echo base_url(); ?>shopping-cart/clear",
                        success:function(data)
                        {
                         //alert("Your cart has been clear...");
                         $('#cart_details').html(data);
                        }
                    }).done(function(){
                            $('.cart_no').load("<?php echo base_url(); ?>shopping-cart/cart_count");
                    });
                });
    	});

        function confirmDialog(message, onConfirm){
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