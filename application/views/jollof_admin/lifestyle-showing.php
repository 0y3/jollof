
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h6 class="card-title">Movie List</h6>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/lifestyle/addformmovie")?>'">
                                            New Movie Showing in Cinemas 
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
                                    <th  style="width: 135px;">Showing Date</th>

                                    <th style="width: 200px;">Movie Name</th>

                                    <th style="width: 200px;">Cinemas Showing Name</th>
                                    
                                    <th>Rating&Time</th>

                                    <th>Genre</th>
                                    
                                    <th>Price</th>
                                    
                                    <th>Ticket Sold</th>

                                    <th style="width:130px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <form  class="form-horizontal" action="<?= site_url('jollofadmin/lifestyle/showing') ?>" method="post">
                                    <td>
                                        <a href="<?= site_url('jollofadmin/lifestyle/showing') ?>" data-toggle="tooltip"  
                                                title="Refresh Showing Table" class="jboxtooltip">
                                            <i  style="color: red;" class="btn sl-icon-reload" ></i>
                                        </a>
                                    </td>
                                    <td></td>
                                    <td>
                                        <input type="text" name="movienamelike" class="form-control" placeholder="Search Movie">
                                    </td>
                                    <td>
                                        <input type="text" name="cinemanamelike" class="form-control" placeholder="Search Cinema">
                                    </td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <button style=" display: none" type="submit" class=""></button>
                                    </form>
                                </tr>
                            <?php if(!empty($showing)): ?>   
                                
                                <?php $count=1; ?>
                                <?php foreach ($showing as $product) :?>
                                
                                    <?php
                                        if (!empty($product['image'])) {
                                            $products_img= $product['image'];
                                        }
                                        else{
                                            $products_img= 'product_img_1.jpg';
                                        }

                                        $price = '<div class="text-center"> ₦'.number_format($product['max_price'],2).'</div>';
                                        if($product['min_price'] != $product['max_price'])
                                        {
                                            $price = '<div class="text-center"> <b>₦'.number_format($product['min_price'],2).'</b> 
                                                <br> to <br><b>₦'.number_format($product['max_price'],2). '</b></div>';
                                        }
                                    ?>
                                <tr>

                                    <td><?=$count;?>.</td>
                                    <td>
                                        <div class="text-center">
                                            <b><?=date("jS M\, Y", strtotime($product['first_dateshowing']))?></b> <br>
                                            to <br>
                                            <b><?=date("jS M\, Y", strtotime($product['last_dateshowing']))?></b>
                                        </div>
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?=site_url("lifestyle/movies/details/$product[movieslug]")?>" >
                                            <?=$product['moviename']?><br>
                                            <img class="rounded-circlre" src="<?=site_url('assets/uploads/movies/'.$products_img) ?>" width="50px" height="50px" >

                                        </a>
                                    </td>
                                    <td>
                                        <?php if(!empty($product['cinemas_list'])): ?>
                                            <?php foreach ($product['cinemas_list'] as $cinemas_lists) :?>
                                        <span id="<?=$cinemas_lists['slug'] ?>" class="cat_span"><i class="fa fa-caret-right mr-2"></i> <?=$cinemas_lists['name']?> </span><br>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><small>Rating:</small> <?= $product['age_restriction']?> <br> 
                                         <small>Time:</small> <?= date('G\h:i\m\i\n', strtotime($product['duration'])) ?>
                                    </td>
                                    <td><?= $product['genre']?></td>
                                    <td><?=$price ?></td>
                                    <td> <div class="text-center"><?=number_format($product['sum_ticketsold']) ?></div></td>
                                    <td>
                                        <a href="<?=site_url('jollofadmin/lifestyle/showingdetails/'.$product['movieslug'])?>" 
                                                target="_blank" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                                title="View Full Movie Details" class="jboxtooltip btn btn-xs btn-default prd_view"> <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?=site_url("jollofadmin/lifestyle/showingdetails/$product[movieslug]/$product[movieid]")?>" data-toggle="tooltip" title="Add Cinemas to this Movie" class="jboxtooltip btn btn-xs btn-success"> <i class="fa fa-plus"></i></a>

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


