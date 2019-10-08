<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="ti-clipboard text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Orders
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=number_format(@$allorder)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="icon-Engineering text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Pending

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=number_format(@$pending)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="icon-Puzzle text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Order Values

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=number_format(@$totalunresolved)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="ti-check-box text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Pending Delivery

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?=number_format(@$delivery)?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Column -->


                </div>
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                
                
                
                
                
                
                
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Orders</h4>
                            </div>
                            <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:400px;">
                                
                                <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <!--<th class="border-top-0">Products</th>-->
                                            <th class="border-top-0">Order ID</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Purchased Date</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php if(!empty($recentorders)): ?>
                                            <?php foreach ($recentorders as $recentorder): ?>
                                            <?php
                                            
                                                if(!empty($recentorder['productimage'])){
                                                    $products_img= $recentorder['productimage'];
                                                }
                                                
                                                else{
                                                    $products_img= 'no_food_img.jpg';
                                                }
                                                
                                                
                                                if($recentorder['status']==1){
                                                   $status="warning";
                                                }
                                                else if ($recentorder['status']==2){
                                                    $status="primary";
                                                }else if ($recentorder['status']==3){
                                                    $status="info";
                                                }else if ($recentorder['status']==4){
                                                    $status="success";
                                                }else if ($recentorder['status']==5){
                                                    $status="danger";
                                                }
                                                else{
                                                     $status="";
                                                }
                                            ?>
                                        <tr>
                                            <!--<td>
                                                <div class="d-flex align-items-center">
                                                    <div class="m-r-10">
                                                        <a class="btn btn-circl" title="<?= $recentorder['productname'] ?>">
                                                            <img src="<?=site_url('assets/uploads/rest_prod/'.$products_img) ?>" alt="" class="rounded-circle" width="45">
                                                        </a>
                                                    </div>
                                                    <div class="">
                                                        <h6 class="m-b-0 font-16" title="<?= $recentorder['productname'] ?>">
                                                            <?php
                                                                $value = $recentorder['productname'];
                                                                    $limit = '15';
                                                                    if (strlen($value) > $limit) {
                                                                             $trimValues = substr($value, 0, $limit).'...';
                                                                              } 
                                                                    else {
                                                                            $trimValues = $value;
                                                                      }
                                                                //character_limiter($resta['companydesc'],25); 
                                                                      echo $trimValues;
                                                            ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>-->
                                            <td>
                                                <a href="<?= site_url('cuisineadmin/orders/view/'.$recentorder['id'])?>" data-toggle="tooltip" title="View Order Details"  ><?= $recentorder['ordercode'] ?></a>
                                            </td>
                                            <td>
                                                <label class="label label-<?=$status?>"><?= $recentorder['orderstatus_desc'] ?></label>
                                            </td>
                                            <td><?=date("jS M \, Y \ g:i A", strtotime($recentorder['createdat']))?></td>
                                            <td>
                                                <h5 class="m-b-0">₦<?= number_format(floatval($recentorder['price']), 2,'.', ',');?></h5>
                                            </td>
                                            <td>
                                                <h5 class="m-b-0"><?= $recentorder['quantity'] ?> </h5>
                                            </td>
                                        <?php endforeach; ?>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                        <p> No Record </p>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                                <?php 
                                if(isset($recentproblems) && $recentproblems!= false)
                              	{
                              		foreach ($recentproblems as $recentproblem)
                              		{
                              		    $status = "Pending";
                              		    $status_color = "danger";
                              		    if($recentproblem['problemstatus'] == 1)
                              		    {
                              		        $status = "Completed";
                              		        $status_color = "primary";
                              		    }
                              		    else if($recentproblem['problemstatus'] == 2)
                              		    {
                              		        $status = "Fully Resolved";
                              		        $status_color = "success";
                              		    }
                                ?>
                                <!-- Comment Row -->
                                
                                
                                <!--<div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2">
                                        <img src="<?=base_url()?><?=@substr(@$recentproblem['avatar'],1)?>" alt="user" width="50" class="rounded-circle">
                                    </div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?=$recentproblem['businessname']?></h6>
                                        <span class="m-b-15 d-block"><?=$recentproblem['problemdescription']?> </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?=date("M d, Y", strtotime($recentproblem['createdat']))?></span>
                                            <span class="label label-rounded label-<?=$status_color?>"><?=$status?></span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-check"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>-->
                                <?php 
                              		}
                              	}
                                ?>
                                
                                
                                
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 400px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 400px;"></div></div></div>
                        </div>
                    </div>
                    
                    
                    <!-- column -->
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Top Selling Items</h4>
                                        <small class="card-subtitle">Overview of Top Selling Items</small>
                                    </div>
                                    <!--<div class="ml-auto">
                                        <div class="dl">
                                            <select class="custom-select">
                                                <option value="0" selected="">Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:380px;" >
                                    
                                <div class="table-responsive">
                                    <table class="table v-middle">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Items</th>
                                                <th class="border-top-0">Sales</th>
                                                <th class="border-top-0">Earnings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($topselling)): ?>
                                            <?php foreach ($topselling as $topsell): ?>
                                            <?php
                                                if(!empty($topsell['productimage'])){
                                                    $products_img= $topsell['productimage'];
                                                }
                                                
                                                else{
                                                    $products_img= 'no_food_img.jpg';
                                                }
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10" title="<?= $topsell['productname'] ?>">
                                                            <img src="<?=site_url('assets/uploads/rest_prod/'.$products_img) ?>" alt="" class="rounded-circle" width="45">
                                                        </div>
                                                        <div class="" title="<?= $topsell['productname'] ?>">
                                                            <!--<h4 class="m-b-0 font-16">Hanna Gover</h4>-->
                                                            <span>
                                                                <?php
                                                                    $value = $topsell['productname'];
                                                                        $limit = '32';
                                                                        if (strlen($value) > $limit) {
                                                                                 $trimValues = substr($value, 0, $limit).'...';
                                                                                  } 
                                                                        else {
                                                                                $trimValues = $value;
                                                                          }
                                                                    //character_limiter($resta['companydesc'],25); 
                                                                          echo $trimValues;
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= $topsell['full_count'] ?></td>
                                                <td class="font-medium"> ₦<?= number_format(floatval($topsell['total_price']), 2,'.', ',');?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                            <?php else: ?>
                                            <tr>
                                            <p> No Record of Top Selling Products</p>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--
                                <div class="comment-widgets scrollable ps-container ps-theme-default ps-active-y" style="height:400px;">
                                    <table class="table no-margin">
                                      <thead>
                                      <tr>
                                        <th>Image</th>
                                        <th>Client</th>
                                        <th>Professional</th>
                                        <th>Appointment</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          
                                      <?php 
                                      if(isset($recentappointments) && $recentappointments!= false)
                                      	{
                                      		foreach ($recentappointments as $recentappointment)
                                      		{
                                      ?>
                                      <tr>
                                        <td><?=date("M d, Y", strtotime($recentappointment['createdat']))?></td>
                                        <td><?=$recentappointment['businessname']?></td>
                                        <td><?=$recentappointment['firstname']?></td>
                                        <td><?=date("M d, Y H:i a", strtotime($recentappointment['appointmentdate']))?></td>
                                      </tr>
                                      <?php
                                      		} 
                                      	}
                                      ?>
                                      </tbody>
                                    </table>
                                </div>-->
                                
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 380px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 518px;"></div></div></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                
                
                
                
                
                
                
                
                
                <!-- ============================================================== -->
                <!-- Products campaign chart -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    
                    <!-- Column -->
                    <div class="col-md-7 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">All Products per Month</h4>
                                        <small class="card-subtitle">Overview of All Sold Product Items</small>
                                    </div>
                                    
                                </div>
                                <div id="chart-container" style="height: 305px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <!-- Column -->
                    <div class="col-md-5 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Product Sales</h4>
                                        <small class="card-subtitle">Overview of Latest Month</small>
                                    </div>
                                    
                                </div>
                                <div id="chart-container-2" style="height: 305px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- Products campaign chart -->
                <!-- ============================================================== -->
                
                
                
                
               
                
            </div>



          