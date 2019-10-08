<style>
    td{
        
    }
    .added_menu table tr{
    padding: 0px !important;
    margin: 0 !important;
    border: none !important;
    }
    .added_menu table tr td{
        padding:2px 10px !important;
        border: none !important;
    }
    .added_menu table tr td:last-child {
        font-weight: 800;
        font-size: 80%;
        padding-right: 10px !important;
    }
    .added_menu table tr td:first-child {
        color: #000;
        font-weight: 800;
        font-size: 80%;
    }
</style> 

                <div class="row">
                     <!-- Column -->
                    <?php if($this->session->jollofAdmin == true): ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="m-t-0 text-success"><i class="fas fa-shopping-baskett text-success"></i> Merchant Name</h3>
                                <h4 class="" ><?= $orderinfo[0]['companyname']?></h4>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="m-t-0 text-success"><i class="fas fa-shopping-basket text-success"></i> Order Code</h3>
                                <h4 class="" ><?= $orderinfo[0]['ordercode']?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="m-t-0 text-success"><i class="far fa-calendar-alt text-success"></i> Order Date</h3>
                                <h4 class=""><?= date('jS M \,Y ', strtotime($orderinfo[0]['createdat'])); ?> </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="m-t-0"><i class="fas fa-dolly text-success"></i> Order Status</h3>
                                <h4><?= $orderinfo[0]['orderstatus_desc']?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!--<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="m-t-0"><i class="fab fa-cc-amex text-warning"></i></h1>
                                <h3>**** **** **** 2150</h3>
                                <span class="pull-right">Exp date: 10/16</span>
                                <span class="font-500">Johnathan Doe</span>
                            </div>
                        </div>
                    </div>-->
                    <!-- Column -->
                </div>


                <!-- Order Table -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Order Product Summary</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!--<th style="width:100px;">Photo</th>-->
                                                <th>Product</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th style="min-width:100px;">Unit Price</th>
                                                <th style="min-width:110px;">Total Price</th>
                                                <th style=" min-width:135px; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            if($orderinfo[0]['status']==1)
                                            {
                                                $action="";
                                                if($this->session_manager->hasPermission("Admin::product_accept"))
                                                {
                                                    $action .='
                                                        <a href="javascript:void(0)" id="ord_pro" data-get="'.$orderinfo[0]['id'].'" class="ord_pro btn btn-sm btn-success" data-toggle="tooltip" title="Accept Order"><i class="fa fa-check"></i></a>
                                                        ';
                                                }
                                                if($this->session_manager->hasPermission("Orders::cancel_orderform"))
                                                {
                                                    $action .='
                                                        <a href="'.site_url("fashionadmin/orders/cancel_orderform").'" id="ord_can" data-get="'.$orderinfo[0]['id'].'" data-orderid="'.$orderinfo[0]['ordercode'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Cancel Order" class="ord_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                        ';
                                                }
                                                $status="warning";
                                                /*
                                                $action='
                                                        <a href="javascript:void(0)" id="ord_pro" data-get="'.$orderitem['id'].'" class="ord_pro btn btn-sm btn-success" data-toggle="tooltip" title="Accept Order"><i class="fa fa-check"></i></a>
                                                        <a href="'.site_url("fashionadmin/orders/cancel_orderform").'" id="ord_can" data-get="'.$orderitem['id'].'" data-orderid="'.$orderitem['ordercode'].'"data-toggle="tooltip" title="Cancel Order" class=" ord_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                        ';
                                                 * 
                                                 */
                                            }
                                            elseif($orderinfo[0]['status']==2)
                                            {
                                                $status="primary";
                                                $action="";
                                                if($this->session_manager->hasPermission("Admin::product_move_disperse"))
                                                {
                                                $action .='
                                                        <a href="javascript:void(0)" id="ord_del" data-get="'.$orderinfo[0]['id'].'" data-toggle="tooltip" title="Move to Disperse" class="ord_del btn btn-sm btn-info"><i class="fa fa-road"></i></a>
                                                        ';
                                                }
                                            }
                                            elseif($orderinfo[0]['status']==3)
                                            {
                                                $status="info";
                                                $action='';
                                            }
                                            elseif($orderinfo[0]['status']==4)
                                            {
                                                $status="success";
                                                $action='';
                                            }
                                            elseif($orderinfo[0]['status']==5)
                                            {
                                                $status="danger";
                                                $action='';
                                            }
                                        ?>
                                            <tr>
                                                <!--<td><img class="" src="<?= site_url('assets/uploads/fashion_prod/')?>" width="70px" height="70px"></td>-->
                                                <td>
                                                    <?=$orderinfo[0]['productname']?>
                                                    <?php if(!empty($orderinfo[0]['addedmenu'])) :?> 
                                                    <br><small class="text-muted p-t-20 db">addedmenu</small>
                                                    <?=$orderinfo[0]['addedmenu']?>
                                                    <?php endif; ?> 
                                                    
                                                </td>
                                                <td>
                                                    <?php if(!empty($orderinfo[0]['note'])) :?>
                                                    <h6><?=$orderinfo[0]['note']?></h6>
                                                    <?php endif; ?> 
                                                </td>
                                                <td><?=$orderinfo[0]['quantity']?></td>
                                                <td class="font-500">₦<?=$orderinfo[0]['price']?></td>
                                                <td class="font-500">₦<?= $total= $orderinfo[0]['quantity'] * $orderinfo[0]['price'];?></td>
                                                <td>
                                                    <span class="label label-<?=$status?>"><?=$orderinfo[0]['orderstatus_desc']?> </span>
                                                    <div class="m-t-10"><?=$action ?></div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h5 class="card-title">Order Customer Details</h5>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="nav-item">
                                        <a href="#iprofile" class="nav-link active" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Delivery Address</span>
                                    </a>
                                    </li>
                                    <!--<li role="presentation" class="nav-item">
                                        <a href="#ihome" class="nav-link" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="ti-user"></i></span> 
                                        <span class="hidden-xs">Paypal</span>
                                    </a>
                                    </li>-->
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane" id="ihome">
                                        <br> You can pay your money through paypal, for more info <a href="">click here</a>
                                        <br>
                                        <br>
                                        <button class="btn btn-info"><i class="fab fa-cc-paypal"></i> Pay with Paypal</button>
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="iprofile">
                                        <div class="row">
                                            <div class="col-md-7 p-t-20">
                                                
                                                <small class="text-muted"><i class="ti-user"></i> Name </small>
                                                <h6><?=$orderinfo[0]['address_firstname']?> <?=$orderinfo[0]['address_lastname']?></h6>
                                                
                                                <small class="text-muted p-t-30 db"><i class="ti-location-pin"></i> Address</small>
                                                <h6><?=$orderinfo[0]['address']?>,</h6>
                                                <h6><?=$orderinfo[0]['address_city']?>,</h6>
                                                <h6><?=$orderinfo[0]['address_state']?>.</h6>
                                                
                                                <small class="text-muted p-t-30 db"><i class="ti-mobile"></i> Phone</small>
                                                <h6><?=$orderinfo[0]['address_phone']?></h6>
                                                <?php if(!empty($orderinfo[0]['address_phone2'])):?>
                                                <h6><?=$orderinfo[0]['address_phone']?></h6>
                                                <?php endif; ?>
                                                
                                            </div>
                                            <!--<div class="col-md-4 ml-auto">
                                                <h4 class="card-title m-t-30">General Info</h4>
                                                <h2><i class="fab fa-cc-visa text-info"></i> <i class="fab fa-cc-mastercard text-danger"></i> <i class="fab fa-cc-discover text-success"></i> <i class="fab fa-cc-amex text-warning"></i></h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>