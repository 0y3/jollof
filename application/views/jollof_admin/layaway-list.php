<style type="text/css">
.colorbox {
    width: 20px;
    height: 20px;
}
</style>
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title"> Layaway List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info"  onclick="window.location='<?=site_url("jollofadmin/fashion/layawayform")?>'">
                                                     Create Layaway Roles
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p></p>
						
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>S/N</th>
                                            	<th>Duration (Weeks)</th>
                                                <th>Service Fee</th>
                                                <th>Cancellation Fee</th>
                                                <th>Down Payment</th>
                                                <th style="width:90px;">Down Payment (%)</th>
                                                <th style="width:90px;">Payment Plan</th>
                                                <th>Min Order</th>
                                                <th>Status</th>
                                                <th style="width:160px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                        <?php if(!empty($layaway)): ?>  
                                        <?php $count=1; ?>
                                            <?php foreach ($layaway as $roles) :?>

                                                <?php 
                                               
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($roles['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($roles['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }
                                                ?>
                                        	   
                                            <tr>
                                                <td><?=$count;?></td>
                                                <td><?=$roles['durationweeks']?> Wk</td>
                                                <td>₦ <?=number_format($roles['servicefee'],2) ?> </td>
                                                <td>₦ <?=number_format($roles['cancellationfee'],2) ?> </td>
                                                <td>₦ <?=number_format($roles['downpayment'],2) ?> </td>
                                                <td><?=$roles['downpaymentpercent']?>%</td>
                                                <td><?=$roles['paymentplan']?>x</td>
                                                <td>₦ <?=number_format($roles['minorder'],2) ?> </td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <a href="<?=site_url("jollofadmin/fashion/layawayform/".$roles['id'])?>" data-toggle="tooltip" data-get="<?=$roles['id']?>" title="Edit Layaway" class="btn btn-sm btn-default "> <i class="ti-marker-alt"></i></a>

                                                    <a href="javascript:void(0)" id="" data-get="<?=$roles['id']?>" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Delete Layaway" class="layaway_delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                                </td>
                                            </tr>
                                            <?php $count++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="10"><b>No Layaway Roles Created</b></td>
                                            </tr>
                                        <?php endif; ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                    
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

                                <!-- Modal confirm delete Color  -->
                                <div class="modal" id="empty_confirmModal">
                                    <div class="modal-dialog">
                                            <div class="modal-content">

                                                    <div class="modal-body" >
                                                        <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                                        <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                                                    </div>

                                            </div>
                                    </div>
                                </div>

                                