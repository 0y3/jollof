
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center">
                                <h6 class="card-title">Products List</h6>
                                <div class="ml-auto">
                                    <!--<div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("fashionadmin/products/addform")?>'">
                                            Create New
                                        </button>
                                       
                                    </div>-->
                                </div>
                            </div>
                        </div>
        

                        <!--Table Starts here-->
                        <div class="table-responsive">
                            <table id="promo_config" class="table table-striped table-bordered ">

                            <thead>

                                <tr>

                                    <th  style="width: 120px;">Date</th>

                                    <th  >Merchant Name</th>

                                    <th >Image</th>
                                    
                                    <th style="width: 200px;">Name</th>

                                    <th>Categories</th>
                                    
                                    <th >Quantity</th>
                                    
                                    <th style="width:90px;">Price</th>

                                    <th >Status</th>

                                    <th style="width:130px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <?=form_open("jollofadmin/merchants/fashionproduct/",' id="serachform"')?>
                                    <td></td>

                                    <td>
                                        <select name="companyname" id="" class="form-control" onchange="this.form.submit()">
                                            <option value="">Merchant Search</option>
                                            <option value="all">All Merchant</option>
                                            <?php 
                                                foreach ($productsMerchant as $row)
                                                {
                                                 echo '<option  value="'.$row['companyname'].'">'.$row['companyname'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </td>

                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <button style=" display: none" type="submit" class=""></button>
                                    <?=form_close()?>
                                </tr>
                            <?php if(!empty($products)): ?>   
                                    
                                <?php foreach ($products as $product) :?>
                                
                                    <?php
                                        if(!empty($product['productfrontimage'])){
                                            $products_img= $product['productfrontimage'];
                                        }
                                        else if (!empty($product['imagename'])) {
                                            $products_img= $product['imagename'];
                                        }
                                        else{
                                            $products_img= 'product_img_1.jpg';
                                        }
                                        
                                        $price = '<div class="text-center"> ₦'.number_format($product['price'],2).'</div>';
                                        if($product['min_price'] != $product['max_price'])
                                        {
                                            $price = '<div class="text-center"> <b>₦'.number_format($product['min_price'],2).'</b> 
                                                <br> to <br><b>₦'.number_format($product['max_price'],2). '</b></div>';
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
                                    
                                    <td><?=date("jS M \, Y \ g:i A", strtotime($product['createdat']))?></td>
                                    <td><?= $product['companyname']?></td>
                                    <td>
                                        <img class="" src="<?=site_url('assets/uploads/fashion_prod/'.$products_img) ?>" width="70px" height="70px" >
                                    </td>
                                    <td><a href="<?=site_url("jollofadmin/products/editform/$product[companynameslug]/$product[id]")?>" ><?=$product['productname']?></a></td>
                                    <td>
                                        <?php if(!empty($product['product_categories'])): ?>
                                            <?php foreach ($product['product_categories'] as $product_categories) :?>
                                        <span id="<?=$product_categories['category_id'] ?>" class="cat_span"><i class="fa fa-caret-right mr-2"></i> <?=$product_categories['categoryname']?></span><br>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><b><?=$product['sum_productinstock']?></b> in stock for<br> <b><?=$product['variant']?></b> Variant</td>
                                    <td><?=$price ?></td>
                                    <td>
                                        <div class="statusdiv_'.$row->id.'">
                                            <span class="label label-<?=$status?>"><?=$status_info?> </span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($product['status']== 1): ?>
                                        <a href="<?=site_url('fashion/store/'.$product['companynameslug'].'/'.$product['slug'])?>" 
                                                target="_blank" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                                title="View Product" class="jboxtooltip btn btn-xs btn-default prd_view"> <i class="fa fa-search"></i>
                                        </a>
                                        <?php endif; ?>     
                                        <a href="<?=site_url("jollofadmin/products/editform/$product[companynameslug]/$product[id]")?>" data-toggle="tooltip" 
                                            title="Edit Product" class="jboxtooltip btn btn-xs btn-warning"> <i class="fa fa-edit"></i></a>
                                            
                                            
                                        <a href="<?=site_url("jollofadmin/products/delete/$product[companynameslug]/$product[id]")?>" id="<?=$product['id']?>" 
                                            data-product_id="<?=$product['id']?>" data-product_name="<?=$product['productname']?>" 
                                            data-toggle="tooltip" title="Delete Product" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                            <?php endif; ?>
                            </tbody>
                            
                            
                        </table>
                        </div>

                        <!--end Table here-->
                        
                        <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>


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
        maxWidth    : 480,
        maxHeight   : 480,
        autoHeight      : true,
        fitToView   : false,
        width       : '70%',
        height      : '100%',
        autoSize    : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
});
</script> 