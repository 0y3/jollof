
                                
                                <h4 class="card-title"></h4>
                                <div class="row m-t-40">

                                    <?php //if($mainmenu==''): ?>  
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/merchants")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$allmerchant)?></h1>
                                                <h6 class="text-white">All B2B's Count</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                    <!-- Column -->
                                    <?php// endif; ?>
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/merchants?status=0")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$pending)?></h1>
                                                <h6 class="text-white">Pending B2B's</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/merchants?status=1")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$approved)?></h1>
                                                <h6 class="text-white">Approved B2B's</h6>
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
                                                <th>#</th>
                                            	<th style=" min-width:150px; ">Date</th>
                                                <th>Logo</th>
                                            	<th>Merchant Name</th>
                                                <th>Company Name</th>
                                                <th>Merchant Type</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th style=" min-width:200px; ">Address</th>
                                                <th style=" min-width:100px; ">Status</th>
                                                <th style=" min-width:135px; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/merchants/",' id="serachform"')?>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/merchants') ?>" data-toggle="tooltip"  
                                                            title="Refresh Events Table" class="jboxtooltip">
                                                        <i  style="color: red;" class="btn sl-icon-reload" ></i>
                                                    </a>
                                                </td>
                                                <td><input type="text" id="createdat" name="createdat" class="form-control" placeholder="Search by date"> </td>
                                                                
                                                <td></td>

                                                <td>
                                                    <input type="text" id="" name="username" class="form-control" placeholder="Search by User Name">
                                                </td>
                                                <td>
                                                    <input type="text" id="" name="companyname" class="form-control" placeholder="Search by Buissness Name">
                                                </td>
                                                                
                                                <td>
                                                    <select name="merchanttype" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Merchant Type..</option>
                                                        <option value="Cuisine">Cuisine</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Lifestyle">Lifestyle</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td></td>  
                                                <td>
                                                    <input type="text" id="" name="companyaddress" class="form-control" placeholder="Search by Buissness Address">
                                                </td>
                                                <td>
                                                    <select name="status" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Status Type..</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                    </select>
                                                    <!--<input type="text" id="productstatus" name="productstatus" class="form-control" placeholder="Search product Status">-->
                                                </td>
                                                
                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($merchants) && !empty($merchants))
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                   $count=1;    
                                        	       foreach ($merchants as $merchantslist)
                                        	       {
                                                           if($merchantslist['status']==0)
                                                            {
                                                                $status="warning";
                                                                $action="";
                                                                $merchantsliststatus= 'Pending';

                                                                if($this->session_manager->hasPermission("Merchants::merchantapprove"))
                                                                {
                                                                    
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="merchants_acc" data-get="'.$merchantslist['id'].'" class="b2b_approve btn btn-sm btn-success" data-toggle="tooltip" title="Approve B2B"><i class="fa fa-check"></i></a>
                                                                        ';
                                                                }
                                                                if($this->session_manager->hasPermission("Merchants::merchantdecline"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="merchants_can" data-get="'.$merchantslist['id'].'" data-merchantname="'.$merchantslist['companyname'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Decline Merchant" class="merchants_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }
                                                            elseif($merchantslist['status']==1)
                                                            {
                                                                $merchantsliststatus= 'Approved';
                                                                $status="success";
                                                                $action="";
                                                                if($this->session_manager->hasPermission("Merchants::merchantdecline"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="merchants_can" data-get="'.$merchantslist['id'].'" data-merchantname="'.$merchantslist['companyname'].'" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Decline Merchant" class="merchants_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }
                                                            if(empty($merchantslist['logo']))
                                                            {
                                                                $img='profile_pic/noimage.jpg';
                                                            }
                                                            else
                                                            {
                                                                if($merchantslist['merchanttype']=='fashion')
                                                                {
                                                                    $img='fashion_logo/'.$merchantslist['logo'];
                                                                }
                                                                else
                                                                {
                                                                    $img='rest_logo/'.$merchantslist['logo'];
                                                                }
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=$count;?>.</td>
                                                <td><?=date("jS M \, Y \ g:i A", strtotime($merchantslist['createdat']))?></td>
                                                <td> <img class="img-thumbnaill" src="<?= site_url('assets/uploads/'.$img)?>" width="70px" height="50px" ></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['userfirstname'] .' '. $merchantslist['userlastname'] ?></a></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['companyname']?></a></td>
                                                <td><?=$merchantslist['merchanttype']?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['email']?></a></td>
                                                <td><?=$merchantslist['phone']?> <?=$merchantslist['phone2']?></td>
                                                <td><?=$merchantslist['address']?> ,
                                                    <br>
                                                    <?=$merchantslist['cityname']?>, <?=$merchantslist['statename']?>
                                                </td>
                                                <td><span class="label label-<?=$status?>"><?=$merchantsliststatus ?> </span></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/merchants/b2bstore/'.$merchantslist['slug'])?>" id="" data-get="<?=$merchantslist['id']?>" data-toggle="tooltip" title="View Merchant Details" 
                                                    	class="btn btn-sm btn-light-info"><i class="fa fa-eye"></i></a>
                                                    <?=$action ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                             $count++;
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
                            
                                
                                