
                                
                                <h4 class="card-title"></h4>
                                <div class="row m-t-40">

                                    <?php //if($mainmenu==''): ?>  
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/customers")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$allmerchant)?></h1>
                                                <h6 class="text-white">All Guest B2Cc's Count</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                    <!-- Column -->
                                    <?php// endif; ?>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>Date</th>
                                            	<th>Account Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Points</th>
                                                <!--<th style=" min-width:100px; ">Status</th>
                                                <th style=" min-width:135px; ">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/customers/",' id="serachform"')?>
                                                
                                                <td> </td>

                                                <td>
                                                    <input type="text" id="" name="username" class="form-control" placeholder="Search by User Name">
                                                </td>
                                                  
                                                <td></td>
                                                <td></td> 
                                                <td></td> 
                                                
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($customers) && !empty($customers))
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($customers as $datalist)
                                        	       {
                                                           if($datalist['status']==0)
                                                            {
                                                                $status="warning";
                                                                $action="";
                                                                $dataliststatus= 'Pending';

                                                                if($this->session_manager->hasPermission("Customers::approve"))
                                                                {
                                                                    
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="ord_pro" data-get="'.$datalist['id'].'" class="b2c_approve btn btn-sm btn-success" data-toggle="tooltip" title="Approve B2C"><i class="fa fa-check"></i></a>
                                                                        ';
                                                                }
                                                                if($this->session_manager->hasPermission("Customers::delete"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="merchants_can" data-get="'.$datalist['id'].'" data-orderid="'.$datalist['firstname'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Delete User" class="b2c_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }
                                                            elseif($datalist['status']==1)
                                                            {
                                                                $dataliststatus= 'Approved';
                                                                $status="success";
                                                                $action="";
                                                                if($this->session_manager->hasPermission("Customers::delete"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="merchants_can" data-get="'.$datalist['id'].'" data-orderid="'.$datalist['firstname'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Delete User" class="b2c_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }

                                                            if(empty($datalist['image']))
                                                            {
                                                                $img='profile_pic/noimage.jpg';
                                                            }
                                                            else
                                                            {
                                                                $img='profile_pic/'.$datalist['image'];
                                                            }
                                                            
                                            ?>          
                                            <tr>
                                                <td><?=date("jS M \, Y \ g:i A", strtotime($datalist['createdat']))?></td>
                                                <td><a href="#" class="font-bold link"><?=$datalist['firstname'] .' '. $datalist['lastname'] ?></a></td>
                                               <!-- <td><a href="#" class="font-bold link"><?=$datalist['gender']?></a></td>-->
                                                <td><a href="#" class="font-bold link"><?=$datalist['email']?></a></td>
                                                <td><?=$datalist['phone']?> <?=$datalist['phone2']?></td>
                                                <td> <?=$datalist['point']?></td>
                                                <!--<td><span class="label label-<?=$status?>"><?=$dataliststatus ?> </span></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/customers/profile/'.$datalist['id'])?>" id="" data-get="<?=$datalist['id']?>" data-toggle="tooltip" title="View Account Details" 
                                                    	class="btn btn-sm btn-light-info"><i class="fa fa-eye"></i></a>
                                                    <?=$action ?>
                                                    
                                                </td>-->
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
                                <!--end Modal -->
                            
                                
                                