
                                
                                <div class="table-responsive">
                                    <table id="billing_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th style=" min-width:100px; ">Date</th>
                                                <th>Logo</th>
                                            	<th>User Name</th>
                                                <th>Merchant Name</th>
                                                <th>Merchant Type</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th style=" min-width:100px; ">Address</th>
                                                <th style="min-width:100px;">Billing In % </th>
                                                <th style="min-width:130px;">Billing Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/billing/",' id="serachform"')?>
                                                
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
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td></td>  
                                                <td>
                                                    <input type="text" id="" name="companyaddress" class="form-control" placeholder="Search by Buissness Address">
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($merchants) && !empty($merchants))
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($merchants as $merchantslist)
                                        	       {
                                                           if($merchantslist['perchargestatus']==0)
                                                            {
                                                                $status="warning";
                                                                $merchantsliststatus= 'In-Active';
                                                            }
                                                            elseif($merchantslist['perchargestatus']==1)
                                                            {
                                                                $merchantsliststatus= 'Active';
                                                                $status="success";
                                                               
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
                                                                    $url= 'b2bstore/'.$merchantslist['slug'];
                                                                }
                                                                else
                                                                {
                                                                    $img='rest_logo/'.$merchantslist['logo'];
                                                                    $url= 'b2bstore/'.$merchantslist['slug'];
                                                                }
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=date("M d, Y", strtotime($merchantslist['createdat']))?></td>
                                                <td> <img class="img-thumbnaill" src="<?= site_url('assets/uploads/'.$img)?>" width="70px" height="50px" ></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['userfirstname'] .' '. $merchantslist['userlastname'] ?></a></td>
                                                <td><a href="<?= site_url('jollofadmin/merchants/b2bstore/'.$merchantslist['slug'])?>" class="font-bold link"><?=$merchantslist['companyname']?></a></td>
                                                <td><?=$merchantslist['merchanttype']?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['email']?></a></td>
                                                <td><?=$merchantslist['phone']?> <?=$merchantslist['phone2']?></td>
                                                <td><?=$merchantslist['address']?> ,
                                                    <br>
                                                    <?=$merchantslist['cityname']?>, <?=$merchantslist['statename']?>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="editper" data-toggle="tooltip" title="Edit B2B % " data-_id="<?=$merchantslist['id']?>" data-_varianttype="per" data-_variant="<?=$merchantslist['percharge']?>"><i class="ti-pencil-alt"></i></a> &nbsp; <?=$merchantslist['percharge']?>% 
                                                </td>
                                                <td>
                                                     <a href="javascript:void(0);" class="editperstatus" data-toggle="tooltip" title="Edit B2B % status" data-_id="<?=$merchantslist['id']?>" data-_varianttype="perstatus" data-_variant="<?=$merchantslist['percharge']?>"><i class="ti-pencil-alt"></i></a> &nbsp;
                                                     <span class="label label-<?=$status?>"><?=$merchantsliststatus ?> </span>
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
                            

                                
                                