
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9 col-xl-10 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All <?= $customerinfo['firstname']?> <?= $customerinfo['lastname']?> Orders</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <!--<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createmodel">
                                                Create New Product
                                            </button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered nowrap display">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Order ID</th>
                                                <th>Store</th>
                                                <th>Store Type</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($orderitems)): ?> 

                                                <?php foreach ($orderitems as $orderitem) :?>
                                            <?php 
                                                   
                                               if($orderitem['status']==1)
                                                {
                                                    $action="";
                                                    if($this->session_manager->hasPermission("Orders::product_accept"))
                                                    {
                                                        $action .='
                                                            <a href="javascript:void(0)" id="ord_pro" data-get="'.$orderitem['id'].'" class="ord_pro btn btn-sm btn-success" data-toggle="tooltip" title="Accept Order"><i class="fa fa-check"></i></a>
                                                            ';
                                                    }
                                                    if($this->session_manager->hasPermission("Orders::cancel_orderform"))
                                                    {
                                                        $action .='
                                                            <a href="'.site_url("jollofadmin/orders/cancel_orderform").'" id="ord_can" data-get="'.$orderitem['id'].'" data-orderid="'.$orderitem['ordercode'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Cancel Order" class="ord_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                            ';
                                                    }
                                                    $status="warning";
                                                    /*
                                                    $action='
                                                            <a href="javascript:void(0)" id="ord_pro" data-get="'.$orderitem['id'].'" class="ord_pro btn btn-sm btn-success" data-toggle="tooltip" title="Accept Order"><i class="fa fa-check"></i></a>
                                                            <a href="'.site_url("jollofadmin/orders/cancel_orderform").'" id="ord_can" data-get="'.$orderitem['id'].'" data-orderid="'.$orderitem['ordercode'].'"data-toggle="tooltip" title="Cancel Order" class=" ord_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                            ';
                                                     * 
                                                     */
                                                }
                                                elseif($orderitem['status']==2)
                                                {
                                                    $status="primary";
                                                    $action="";
                                                    if($this->session_manager->hasPermission("Orders::product_move_dispatched"))
                                                    {
                                                    $action .='
                                                            <a href="javascript:void(0)" id="ord_del" data-get="'.$orderitem['id'].'" data-toggle="tooltip" title="Move to Dispatched" class="ord_del btn btn-sm btn-info"><i class="fa fa-road"></i></a>
                                                            ';
                                                    }
                                                }
                                                elseif($orderitem['status']==3)
                                                {
                                                    $status="info";
                                                    $action="";
                                                    if($this->session_manager->hasPermission("Orders::product_delivered"))
                                                    {
                                                        $action .='
                                                            <a href="javascript:void(0)" id="ord_dlv" data-get="'.$orderitem['id'].'" data-toggle="tooltip" title="confirm delivery" class="ord_dlv btn btn-sm btn-success"><i class="fa fa-road"></i></a>
                                                            ';
                                                    }
                                                }
                                                elseif($orderitem['status']==4)
                                                {
                                                    $status="success";
                                                    $action='';
                                                }
                                                elseif($orderitem['status']==5)
                                                {
                                                    $status="danger";
                                                    $action='';
                                                }
                                            ?>          
                                            <tr>
                                                <td><?=date("jS M \, Y \ g:i A", strtotime($orderitem['createdat']))?></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/customers/ordersview/'.$orderitem['id'])?>" id="" data-get="<?=$orderitem['id']?>" data-toggle="tooltip" title="View Order Details">
                                                        <?=$orderitem['ordercode']?>
                                                    </a>
                                                </td>
                                                <td><a href="<?= site_url('jollofadmin/merchants/b2bstore/'.$orderitem['slug'])?>" class="font-bold link"><?=$orderitem['companyname']?></a></td>
                                                <td><?=$orderitem['merchanttype']?></td>
                                                <td><?=$orderitem['productname']?></td>
                                                <td><?=$orderitem['quantity']?></td>
                                                <td><b>₦<?= number_format(floatval($orderitem['price']), 2,'.', ',');?></b></td>
                                                <td><span class="label label-<?=$status?>"><?=$orderitem['orderstatus_desc']?> </span></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/customers/ordersview/'.$orderitem['id'])?>" id="" data-get="<?=$orderitem['id']?>" data-toggle="tooltip" title="View Order Details" 
                                                        class="btn btn-sm btn-light-info"><i class="fa fa-eye"></i></a>
                                                    <?=$action ?>
                                                </td>
                                            </tr>
                                                <?php endforeach; ?>
                                                
                                                <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="9"><b>No Orders Record</b></td>
                                            </tr>
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
                                    <a href="<?= site_url('jollofadmin/customers/profile/'.$customerinfo['id'])?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i>Customer's Info 
                                        <!--<span class="badge badge-info float-right">20</span>-->
                                    </a>
                                    <a href="<?= site_url('jollofadmin/customers/orders/'.$customerinfo['id'])?>" class="list-group-item active"><i class="ti-notepad m-r-10"></i> Orders
                                        <!--<span class="badge badge-success float-right">12</span>-->
                                    </a>
                                    <a href="<?= site_url('jollofadmin/customers/deliveryaddress/'.$customerinfo['id'])?>" class="list-group-item"><i class="ti-notepad m-r-10"></i> Delivery Address
                                        <!--<span class="badge badge-success float-right">12</span>-->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- New Attributes Modal -->              
                <div class="modal " id="modal_cancel" >

                </div>
                <!--end Modal -->