
                                
                                <h4 class="card-title">Tickets</h4>
                                <div class="row m-t-40">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$allorder)?></h1>
                                                <h6 class="text-white">Order Count</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders?orderstatus=1")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$pending)?></h1>
                                                <h6 class="text-white">Pending Order</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders?orderstatus=2")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$processing)?></h1>
                                                <h6 class="text-white">Processing Order</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders?orderstatus=3")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$delivery)?></h1>
                                                <h6 class="text-white">Dispatched Orders </h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders?orderstatus=4")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$delivered)?></h1>
                                                <h6 class="text-white">Delivered Orders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/orders?orderstatus=5")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$canceled)?></h1>
                                                <h6 class="text-white">Canceled Orders<!--Total Value--></h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th style="min-width: 150px;">Date</th>
                                            	<th>Merchant </th>
                                                <th>Type</th>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Customer Type</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th >Value</th>
                                                <th>Payment</th>
                                                <th style=" min-width:100px; ">Status</th>
                                                <th style=" min-width:135px; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/orders/",' id="serachform"')?>
                                                
                                                <td><input type="text" id="createdat" name="createdat" class="form-control" placeholder="Search by date"> </td>
                                                                
                                                <td>
                                                    <select name="companyname" id="rest_category" class="selectpicker form-control" data-live-search="true" show-tick  data-size="8" title="Merchant Search" data-width="90%" onchange="this.form.submit()">
                                                        <option value="">Merchant Search</option>
                                                        <?php 
                                                            foreach ($OrderitemMerchant as $row)
                                                            {
                                                             echo '<option data-tokens="'.$row['companyname'].'" value="'.$row['companyname'].'">'.$row['companyname'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <!---->
                                                </td>
                                                                
                                                <td>
                                                    <select name="merchanttype" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Merchant Type..</option>
                                                        <option value="1">Cuisine</option>
                                                        <option value="2">Fashion</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" id="" name="ordercode" class="form-control" placeholder="Search by order code">
                                                </td>
                                                <td>
                                                    <input type="text" id="accountid" name="accountname" class="form-control" placeholder="Search by customer">
                                                </td>
                                                <td>
                                                    <select name="accounttype" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Customer Type..</option>
                                                        <option value="user">User</option>
                                                        <option value="guest">Guest</option>
                                                    </select>
                                                    <!--<input type="text" id="productstatus" name="productstatus" class="form-control" placeholder="Search product Status">-->
                                                </td>
                                                
                                                <td>
                                                    <input type="text" id="productname" name="productname" class="form-control" placeholder="Search product name">
                                                </td>
                                                                
                                                <td></td>


                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <select name="orderstatus" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Status Type..</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Processing</option>
                                                        <option value="3">Dispatched </option>
                                                        <option value="4">Delivered</option>
                                                        <option value="5">Canceled</option>
                                                    </select>
                                                    <!--<input type="text" id="productstatus" name="productstatus" class="form-control" placeholder="Search product Status">-->
                                                </td>

                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($orderitems) && count($orderitems)>0)
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($orderitems as $orderitem)
                                        	       {
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
                                                <td><a href="<?= site_url('jollofadmin/merchants/b2bstore/'.$orderitem['slug'])?>" class="font-bold link"><?=$orderitem['companyname']?></a></td>
                                                <td><?=$orderitem['merchanttype']?></td>
                                                <td> 
                                                    <a href="<?= site_url('jollofadmin/orders/view/'.$orderitem['id'])?>" ><?=$orderitem['ordercode']?></a>
                                                </td>
                                                <td><a href="#" class="font-bold link"><?=$orderitem['account_firstname']?> <?=$orderitem['account_lastname']?></a></td>
                                                <td><a href="#" class="font-bold link"><?=$orderitem['account_usertype']?></a></td>
                                                <td><?=$orderitem['productname']?></td>
                                                <td><?=$orderitem['quantity']?></td>
                                                <td>
                                                    <b>₦<?= number_format(floatval( $orderitem['price']  ), 2,'.', ',')?>
                                                        
                                                    </b>
                                                </td>
                                                <td><?=$orderitem['deliverytype']?></td>
                                                <td><span class="label label-<?=$status?>"><?=$orderitem['orderstatus_desc']?> </span></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/orders/view/'.$orderitem['id'])?>" id="" data-get="<?=$orderitem['id']?>" data-toggle="tooltip" title="View Order Details" 
                                                    	class="btn btn-sm btn-light-info"><i class="fa fa-eye"></i></a>
                                                    <?=$action ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                        	       }
                                        	   }
                                            ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                    
                                    <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>
                                    
                                    <!--<ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>-->
                                    
                                </div>
                                
                                <!-- New Attributes Modal -->              
                                <div class="modal " id="modal_cancel" >

                                </div>
                                <!--end Modal -->
                            
                                
                                