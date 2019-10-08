
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h6 class="card-title">Event Categories Management</h6>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/lifestyle/addformeventscategory")?>'">
                                            Create New
                                        </button>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
        

                        <!--Table Starts here-->
                        <div class="table-responsive">
                            <table id="promo_config" class="table table-striped table-bordered ">

                            <thead>

                                <tr>
                                    <th style="width:10px;">#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>
                            <?php if(!empty($category)): ?>   
                                
                                <?php $count=1; ?>
                                <?php foreach ($category as $product) :?>
                                
                                    <?php

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

                                    <td><?=$count;?>.</td>
                                    <td><?= $product['categoryname']?></td>
                                    <td><span class="label label-<?=$status?>"><?=$status_info?> </span></td>
                                    <td>
                                        <a href="<?=site_url("jollofadmin/lifestyle/addformeventscategory/$product[slug]")?>" 
                                            id="<?=$product['id']?>" data-product_name="<?=$product['categoryname']?>" class=" btn btn-xs btn-default color_edit"> Edit <i class="ti-marker-alt"></i></a>

                                        <a href="<?=site_url("jollofadmin/lifestyle/deleteeventcategory/$product[id]")?>" id="<?=$product['id']?>" 
                                            data-product_id="<?=$product['id']?>" data-product_name="<?=$product['categoryname']?>" 
                                            data-toggle="tooltip" title="Delete Category" class="jboxtooltip btn btn-xs btn-danger prd_delete"> Delete  <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php $count++; ?>
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


<script type="text/javascript">
    
    // on delete submenu  
    $(document).on("click",".prd_delete", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Event Category ? -- '+ $(this).data('product_name');
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


