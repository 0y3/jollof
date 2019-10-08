                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

                    
                
                    <div class="block full">

                        
                        
                        <div>
                        			<div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Products List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("cuisineadmin/products/addform")?>'">
                                                    Create New
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
						</div>
						
						<p></p>
		

                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="width: 120px;">Date</th>

                                    <th class="text-center" >Image</th>
                                    
                                    <th class="visible-lg" style="width: 200px;">Name</th>

                                    <th class="hidden-xs">Categories</th>
                                    
                                    <th class="hidden-xs">Description</th>
                                    
                                    <th class="hidden-xs" style="width:90px;">Price</th>

                                    <th style="width:100px;" >Status</th>

                                    <th class="text-center" style="width:128px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                            <?php if(!empty($products)): ?>   
                                    
                                <?php foreach ($products as $product) :?>
                                
                                    <?php
                                        if(!empty($product['productimage'])){
                                            $products_img= $product['productimage'];
                                        }
                                        else{
                                            $products_img= 'no_food_img.jpg';
                                        }
                                        
                                        
                                        
                                        if($product['status']==1)
                                        {
                                            $status="success";
                                            $status_info='Active';
                                        }
                                        else
                                        {
                                            $status="danger";
                                            $status_info='Inactive';
                                        }
                                    ?>
                                <tr>
                                    
                                    <td><?=date("M d, Y", strtotime($product['createdat']))?></td>
                                    <td>
                                        <img class="" src="<?=site_url('assets/uploads/rest_prod/'.$products_img) ?>" width="50px" height="50px" >
                                    </td>
                                    <td><a href="<?=site_url("cuisineadmin/products/editform/$product[id]")?>" ><?=$product['productname']?></a></td>
                                    <td><?= $product['categoryname']?></td>
                                    <td><small><?= $product['productdesc']?></small></td>
                                    <td><b>₦<?= $product['productprice']?></b></td>
                                    <td>
                                        <div class="statusdiv_'.$row->id.'">
                                            <span class="label label-<?=$status?>"><?=$status_info?> </span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($product['status']== 1): ?>
                                        <a href="<?=site_url('cuisine/restaurants/view/'.$product['restaurantid'].'#'.$product['categoryname'] )?>" 
                                        		target="_blank" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                        		title="View Product" class="jboxtooltip btn btn-xs btn-default prd_view"> <i class="fa fa-search"></i>
                                        </a>
                                        <?php endif; ?>		
                                        <a href="<?=site_url("cuisineadmin/products/editform/$product[id]")?>" data-toggle="tooltip" 
                                        	title="Edit Product" class="jboxtooltip btn btn-xs btn-warning"> <i class="fa fa-edit"></i></a>
                                        	
                                        	
                                        <a href="<?=site_url("cuisineadmin/products/delete/$product[id]")?>" id="<?=$product['id']?>" 
                                        	data-product_id="<?=$product['id']?>" data-product_name="<?=$product['productname']?>" 
                                        	data-toggle="tooltip" title="Delete Product" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-times"></i></a>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            <?php endif; ?>
                            </tbody>
                            
                            
                        </table>

                        <!--end Table here-->
                        
                        <div id="pagination"><?php if(isset($pagination)) echo $pagination; ?></div>

                    </div>

                    <!--Quick Product Modal -->              
                    <div class="modal fade" id="modal_prd" tabindex="-1" role="dialog" aria-labelledby="Product view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    
                    
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
                                            
                                           


<script >
    
    //$('#order_datatable').dataTable(); 
      var dataTable = $('order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('cuisine_admin/get_product'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[
                         1, //target the img row
                         4, //target the desc row
                         //6, //target the status row
                         7  //target the action row
                     ],  
                     "orderable":false,  
                } 
           ]  
      }); 
      
</script>

<script>
    $("#order_datatable").on("click","[data-toggle='modal']", function(e){
    //$("[data-toggle='modal']").click(function(e) {
        /* Prevent Default*/
        e.preventDefault();

        /* Parameters */
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
        
        var prd_Id = $(this).data('product_id');

        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
        $.post(
                url,
                {
                    id:prd_Id
                },
                function(data){
                     $(container).html(data).modal();
                }
            );

    });    
</script> 

<script>
    
    // on delete submenu  
    $(document).on("click",".prd_delete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('product_name');
       var p_Id = $(this).data('product_id');
       var url = $(this).attr('href');
       
       confirmDialog_cart(msgg, function(){
           $(location).attr('href', url);

        });
                
    });
    function confirmDialog_cart(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#modal_conf");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
        }
</script>


<script>

 
// pupup on add product to cart
$(".ajaxbook_form").fancybox({
        maxWidth	: 480,
        maxHeight	: 480,
        autoHeight      : true,
        fitToView	: false,
        width		: '70%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
});
</script> 