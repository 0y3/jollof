
                        
                        
                        <div>
                            <div class="d-flex no-block align-items-center m-b-30">
                                <h6 class="card-title">Event List</h6>
                                <div class="ml-auto">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                            aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/lifestyle/addformevents")?>'">
                                            New Event
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
                                    <th  style="width: 150px;">Event Date&Time</th>

                                    <th style="width: 200px;">Event Name</th>

                                    <th style="width: 200px;">Company Name</th>
                                    
                                    <th style="width: 200px;">Location</th>

                                    <th>Category</th>
                                    
                                    <th>Price</th>
                                    
                                    <th>Ticket Sold</th>

                                    <th>Status</th>

                                    <th style="width:130px;">Action</th>

                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <form  class="form-horizontal" action="<?= site_url('jollofadmin/lifestyle/events') ?>" method="post">
                                    <td>
                                        <a href="<?= site_url('jollofadmin/lifestyle/events') ?>" data-toggle="tooltip"  
                                                title="Refresh Events Table" class="jboxtooltip">
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
                                    <td></td>
                                    <button style=" display: none" type="submit" class=""></button>
                                    </form>
                                </tr>
                            <?php if(!empty($event)): ?>   
                                
                                <?php $count=1; ?>
                                <?php foreach ($event as $product) :?>
                                
                                    <?php
                                        if (!empty($product['image'])) {
                                            $products_img= $product['image'];
                                        }
                                        else{
                                            $products_img= 'product_img_1.jpg';
                                        }

                                        $price = '<div class="text-center"> ₦'.number_format($product['price'],2).'</div>';
                                        /*if($product['min_price'] != $product['max_price'])
                                        {
                                            $price = '<div class="text-center"> <b>₦'.number_format($product['min_price'],2).'</b> 
                                                <br> to <br><b>₦'.number_format($product['max_price'],2). '</b></div>';
                                        }*/

                                        if($product['eventdateinfo'][0]['first_dateevent']<date('Y-m-d'))
                                        {
                                            $status="danger";
                                            $status_info='In-Active';
                                        }
                                        else
                                        {
                                            $status="success";
                                            $status_info='Active';
                                        }
                                    ?>
                                <tr>

                                    <td><?=$count;?>.</td>
                                    <td>
                                        <div class="text-center">
                                            <b><?=date("jS M\, Y", strtotime($product['eventdateinfo'][0]['first_dateevent']))?></b> <br>
                                            <small><?= date('g:iA', strtotime($product['eventdateinfo'][0]['event_starttime'])) ?> <br>
                                            to <br>
                                            <?= date('g:iA', strtotime($product['eventdateinfo'][0]['event_endtime']))?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <a target="_blank" href="<?=site_url("lifestyle/events/details/$product[slug]")?>" >
                                            <?=$product['name']?><br>
                                            <img class="rounded-circlre" src="<?=site_url('assets/uploads/events/'.$products_img) ?>" width="100px" height="50px" >

                                        </a>
                                    </td>
                                    <td><?= $product['companyname']?></td>
                                    <td><?= $product['address']?> <br> 
                                        <?= $product['cityname'].', '. $product['statename'] ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($product['eventcategory'])): ?>
                                            <?php foreach ($product['eventcategory'] as $cate_lists) :?>
                                        <span id="<?=$cate_lists['slug'] ?>" class="cat_span"><i class="fa fa-caret-right mr-2"></i> <?=$cate_lists['categoryname']?> </span><br>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?=$price ?></td>
                                    <td> <div class="text-center"><?=number_format($product['eventdateinfo'][0]['sum_ticketsold']) ?></div></td>
                                    <td><span class="label label-<?=$status?>"><?=$status_info?> </span></td>
                                    <td>
                                        <a href="<?=site_url("jollofadmin/lifestyle/eventsdetails/$product[eventcode]")?>" 
                                                target="_blank" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-toggle="tooltip"  
                                                title="Edit Event Details" class="jboxtooltip btn btn-xs btn-warning prd_view"> <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="<?=site_url("jollofadmin/lifestyle/deleteevent/$product[eventcode]")?>" id="<?=$product['id']?>" 
                                            data-product_id="<?=$product['id']?>" data-product_name="<?=$product['name']?>" 
                                            data-toggle="tooltip" title="Delete Movie" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php $count++; ?>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                      <td class="text-center" colspan="10"><b>No Record Created</b></td>
                                  </tr>
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
       
       var msgg = 'Are you sure you want to remove this Event ? -- '+ $(this).data('product_name');
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


