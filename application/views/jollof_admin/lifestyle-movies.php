
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h6 class="card-title">Movie List</h6>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/lifestyle/addformmovie")?>'">
                                            Create New Movie
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

                                    <th  style="width: 120px;">Date</th>

                                    <th style="width: 200px;">Name</th>
                                    
                                    <th>Rating&Time</th>

                                    <th>Genre</th>
                                    
                                    <th>Staring</th>
                                    
                                    <th>No.of views</th>

                                    <th style="width:115px;">Status Showing</th>

                                    <th style="width:130px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <form  class="form-horizontal" action="<?= site_url('jollofadmin/lifestyle/movies') ?>" method="post">
                                    <td>
                                        <a href="<?= site_url('jollofadmin/lifestyle/movies') ?>" data-toggle="tooltip"  
                                                title="Refresh Movies Table" class="jboxtooltip">
                                            <i  style="color: red;" class="btn sl-icon-reload" ></i>
                                        </a>
                                    </td>

                                    <td>
                                        <select name="movieslug" id="" class="form-control select2 make" onchange="this.form.submit()">
                                            <!--<option value="">Movie Search</option>-->
                                            <?php 
                                                foreach ($allmovies as $row)
                                                {
                                                 echo '<option  value="'.$row['slug'].'">'.$row['name'].'</option>';
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
                                    <button style=" display: none" type="submit" class=""></button>
                                    </form>
                                </tr>
                            <?php if(!empty($movie)): ?>   
                                    
                                <?php foreach ($movie as $product) :?>
                                
                                    <?php
                                        if (!empty($product['image'])) {
                                            $products_img= $product['image'];
                                        }
                                        else{
                                            $products_img= 'product_img_1.jpg';
                                        }
                                        
                                        if($product['showingincinemas']>=1)
                                        {
                                            $status="success";
                                            $status_info='In-Cinemas';
                                        }
                                        else
                                        {
                                            $status="danger";
                                            $status_info='Off-Cinemas';
                                        }
                                    ?>
                                <tr>
                                    
                                    <td><?=date("jS M \, Y \ g:iA", strtotime($product['createdat']))?></td>
                                    <td>
                                        <a href="<?=site_url("jollofadmin/lifestyle/editform/$product[slug]/$product[id]")?>" >
                                            <?=$product['name']?><br>
                                            <img class="rounded-circlre" src="<?=site_url('assets/uploads/movies/'.$products_img) ?>" width="50px" height="50px" >

                                        </a>
                                    </td>
                                    <td><small>Rating:</small> <?= $product['age_restriction']?> <br> 
                                         <small>Time:</small> <?= date('G\h:i\m\i\n', strtotime($product['duration'])) ?>
                                    </td>
                                    <td><?= $product['genre']?></td>
                                    <td>
                                        <small>Director: </small><?=$product['director']?><br>
                                        <small>Starring: </small><?=$product['starring']?>
                                    </td>
                                    <td> <div class="text-center"><?=number_format($product['number_of_views']) ?></div></td>
                                    <td>
                                        <div class="statusdiv_'.$row->id.'">
                                            <span class="label label-<?=$status?>"><?=$status_info?> </span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?=site_url('lifestyle/movies/details/'.$product['slug'])?>" 
                                                target="_blank" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                                title="View Movie" class="jboxtooltip btn btn-xs btn-default prd_view"> <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?=site_url("jollofadmin/lifestyle/editformmovie/$product[slug]/$product[id]")?>" data-toggle="tooltip" 
                                            title="Edit Movie" class="jboxtooltip btn btn-xs btn-warning"> <i class="fa fa-edit"></i></a>
                                            
                                            
                                        <a href="<?=site_url("jollofadmin/lifestyle/deletemovie/$product[slug]/$product[id]")?>" id="<?=$product['id']?>" 
                                            data-product_id="<?=$product['id']?>" data-product_name="<?=$product['name']?>" 
                                            data-toggle="tooltip" title="Delete Movie" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-trash"></i></a>

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


