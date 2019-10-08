
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h6 class="card-title">Cinema List</h6>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/lifestyle/addformcinema")?>'">
                                            New Cinema
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

                                    <th>#</th>

                                    <th style="width: 200px;">Name</th>

                                    <th>Phone</th>

                                    <th>Email</th>
                                    
                                    <th>Address</th>

                                    <th>City</th>
                                    
                                    <th>State</th>

                                    <th>No.of Showing Movies</th>

                                    <th style="width:130px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <form  class="form-horizontal" action="<?= site_url('jollofadmin/lifestyle/cinemas') ?>" method="post">
                                    <td>
                                        <a href="<?= site_url('jollofadmin/lifestyle/cinemas') ?>" data-toggle="tooltip"  
                                                title="Refresh Cinema Table" class="jboxtooltip">
                                            <i style="color: red;" class="btn sl-icon-refresh" ></i>
                                        </a>
                                    </td>

                                    <td>
                                        <input type="text" name="cinemanamelike" class="form-control" placeholder="Cinema Search">
                                    </td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <button style=" display: none" type="submit" class=""></button>
                                    </form>
                                </tr>
                            <?php if(!empty($cinema)): ?>   
                                    
                                <?php $count=1; ?>
                                <?php foreach ($cinema as $product) :?>
                                <tr>
                                    
                                    <td><?=$count;?>.</td>
                                    <td>
                                        <a href="<?=site_url("jollofadmin/lifestyle/cinemadetails/$product[slug]/$product[id]")?>" >
                                            <?=$product['name']?>
                                        </a>
                                    </td>
                                    <td><?= $product['phone']?> </td>
                                    <td><?= $product['email']?></td>
                                    <td><?= $product['address']?></td>
                                    <td><?= $product['cityname']?></td>
                                    <td><?= $product['statename']?></td>
                                    <td> <div class="text-center"><?=number_format($product['showingincinemas']) ?></div></td>
                                    <td>
                                        <a href="<?=site_url("jollofadmin/lifestyle/cinemadetails/$product[slug]/$product[id]")?>" 
                                                id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                                title="View Cinema Details" class="jboxtooltip btn btn-xs btn-default prd_view"> <i class="fa fa-eye"></i>
                                        </a>    
                                        
                                        <a href="<?=site_url("jollofadmin/lifestyle/deletecinema/$product[slug]/$product[id]")?>" id="<?=$product['id']?>" 
                                            data-product_id="<?=$product['id']?>" data-product_name="<?=$product['name']?>" 
                                            data-toggle="tooltip" title="Delete Movie" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-trash"></i></a>

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
       
       var msgg = 'Are you sure you want to remove this Movie ? -- '+ $(this).data('product_name');
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


