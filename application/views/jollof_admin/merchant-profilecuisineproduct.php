
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9 col-xl-10 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All <?=$merchantinfo['companyname']?>  Store Products</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <!--<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                                Create New Product
                                            </button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                            <tr>
                                                <th>Date </th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                                                    <a href="">
                                                        <img  src="<?=site_url('assets/uploads/rest_prod/'.$products_img) ?>" class="rounded-circle" width="50px" height="50px" > <?=$product['productname']?>
                                                    </a>
                                                </td>
                                                <td><?= $product['categoryname']?> </td>
                                                <td><small><?= $product['productdesc']?></small></td>
                                                <td><b>₦<?= $product['productprice']?></b></td>
                                                <td>
                                                    <div class="statusdiv_'.$product['id'].'">
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
                                                    <a href="<?=site_url("jollofadmin/products/editform/$merchantinfo[slug]/$product[id]")?>" data-toggle="tooltip" 
                                                        title="Edit Product" class="jboxtooltip btn btn-xs btn-warning"> <i class="fa fa-edit"></i></a>
                                                    
                                                        <a href="<?=site_url("jollofadmin/products/delete/$merchantinfo[slug]/$product[id]")?>" id="<?=$product['id']?>" data-product_id="<?=$product['id']?>" data-product_name="<?=$product['productname']?>" data-toggle="tooltip" title="Delete Product" class="jboxtooltip btn btn-xs btn-danger prd_delete"> <i class="fa fa-times"></i></a>

                                                        <!--
                                                        <button type="button" class="btn btn-xs btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        -->

                                                </td>
                                            </tr>
                                                <?php endforeach; ?>
                                                
                                            <?php endif; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-xl-2 col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-t-30">More</h4>
                                <div class="list-group">
                                    <a href="<?=site_url("jollofadmin/merchants/b2bstore/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i>Store Info 
                                        <!--<span class="badge badge-info float-right">20</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2bproducts/".$merchantinfo['slug'])?>" class="list-group-item active"><i class="ti-notepad m-r-10"></i> Products
                                        <!--<span class="badge badge-success float-right">12</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2borders/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-target m-r-10"></i> Orders
                                        <!--<span class="badge badge-dark float-right">22</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2busers/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-comments m-r-10"></i> Users
                                        <!--<span class="badge badge-danger float-right">101</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2bpromos/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-commentss m-r-10"></i> Promos
                                        <!--<span class="badge badge-danger float-right">101</span>-->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

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