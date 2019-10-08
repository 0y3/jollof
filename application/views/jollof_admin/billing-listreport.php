
                                
                                <?=form_open("jollofadmin/billing/billingreport/",' id="serachform"')?>
                                <div class="row m-b-40">
                                    <div class="col-md-12 text-center">
                                       <h4> <strong>Search Billing</strong> by date</h4>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="input-group input-daterange col-md-12">
                                            <input type="text" name="orderlistdetails_startdate" id="start_date" placeholder="Billing Date From" class="form-control" required="" />
                                            <div class="input-group-addon">&nbsp; to &nbsp;</div>
                                            <input type="text" name="orderlistdetails_enddate" id="end_date" placeholder="Billing Date To" class="form-control" required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-2" style=" padding: 0;">
                                       <input type="submit" name="search" id="search_date" value="Search" class="btn btn-info" />
                                    </div>
                                </div>
                                <?=form_close()?>
                                
                                <div class="table-responsive">
                                    <table id="billing_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Logo</th>
                                                <th>Merchant Name</th>
                                                <th>Merchant Type</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th style="min-width:140px">Date From</th>
                                                <th style="min-width:140px">Date To</th>
                                                <th>Total Sale</th>
                                                <th style="min-width:100px;">Billing In % </th>
                                                <th style="min-width:130px;">Billing Amt</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/billing/billingreport/",' id="serachform"')?>
                                               
                                                                
                                                <td></td>
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


                                                <td></td>
                                                <td></td> 
                                                <td></td>
                                                 
                                                <td></td>
                                                <td></td>
                                                <td></td> 
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($merchants) && !empty($merchants))
                                        	   {
                                        	       $status = "";
                                                   $_startdate = "";
                                                   $_enddate = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                    if(isset($filterparams['orderlistdetails_startdate']) && !empty($filterparams['orderlistdetails_startdate']) 
                                                        && isset($filterparams['orderlistdetails_enddate']) && !empty($filterparams['orderlistdetails_enddate']) )
                                                    {
                                                        $_startdate =$filterparams['orderlistdetails_startdate'];
                                                        $_enddate = $filterparams['orderlistdetails_enddate'];
                                                    }
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
                                                <td> <img class="img-thumbnaill" src="<?= site_url('assets/uploads/'.$img)?>" width="70px" height="50px" ></td>
                                                <td><a href="<?= site_url('jollofadmin/merchants/b2bstore/'.$merchantslist['slug'])?>" class="font-bold link"><?=$merchantslist['companyname']?></a></td>
                                                <td><?=$merchantslist['merchanttype']?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['email']?></a></td>
                                                <td><?=$merchantslist['phone']?> <?=$merchantslist['phone2']?></td>
                                                <td><?=  date('jS M \, Y ', strtotime($merchantslist['billingcreatedat']));?></td>
                                                <td> <?=  date('jS M \, Y ');?> </td>
                                                <td><?=$merchantslist['totalsales']?></td>
                                                <td><?=$merchantslist['percharge']?>% </td>
                                                <td>
                                                    <b>₦
                                                    <?= number_format(floatval( (((int)$merchantslist['totalsales'] * (int)$merchantslist['percharge'] )/100)  ), 2,'.', ',')?>
                                                        
                                                    </b>
                                                </td>
                                                 <td>
                                                    <?=form_open("jollofadmin/billing/billingreportview")?>
                                                        <button type="submit" class="btn btn-sm btn-light-info" data-toggle="tooltip"  title="View B2B Billing List" ><i class="fa fa-eye"></i></button>
                                                        <input type="hidden" name="id" value="<?=$merchantslist['id']?>"/>
                                                        <input type="hidden" name="orderlistdetails_startdate" value="<?= $_startdate ?>"/>
                                                        <input type="hidden" name="orderlistdetails_enddate" value="<?= $_enddate ?>"/>
                                                    <?=form_close()?>
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
                            
<!-- B2B percentage div-->
<div id="variant_order">
    <input type="number" data-cat_id="" data-cat_type="" name="new_variant_per" class="form-control numb cu_phone_js" min="0" value="" >
    <a  id="per_save" class="btn btn-success btn-sm saveEdit">
        <i class="far fa-save noSaveEdit" aria-hidden="true"></i>
    </a>
    <a href="" id="closeorder" class="btn btn-danger btn-sm ">
        <i class="fa fa-times" aria-hidden="true"></i>
    </a>
</div>

<div id="variant_status">
    <input type="hidden" name="variant_status_id" value="">
    <select id="selectstatus" class="selectstatus form-control" name="newStatus">
        <option></option>
        <option value="0"> &nbsp; Inactive </option>
        <option value="1"> &nbsp; Active </option> 
    </select>
    <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
</div>
                                
                                