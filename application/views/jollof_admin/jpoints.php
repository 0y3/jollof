
                                <div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Jpoints Table</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" onclick="window.location='<?= site_url('jollofadmin/jpoints/addform')?>'" >
                                                    Create New
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="promo_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>S/N</th>
                                                <th>Jpoint</th>
                                                <th>Min Amount <!--&amp; Above--></th>
                                                <th>Max Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if(!empty($duration)): ?>  
                                                <?php  $rowcount=0; ?>
                                                <?php foreach ($duration as $points) :?>
                                                    <?php 
                                        	            
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($points['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($points['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }

                                                         $rowcount++;
                                                    ?>          
                                            <tr>
                                                <td><?=$rowcount ?></td>
                                                <td><?=$points['jpoint']?></td>
                                                <td> ₦ <?=number_format($points['minamount'],2) ?></td>
                                                <td> ₦ <?=number_format($points['maxamount'],2) ?></td>
                                                <td><?=$status?></td>
                                                <td>

                                                    <a href="<?=site_url("jollofadmin/jpoints/addform/".$points['id'])?>" data-toggle="tooltip" data-get="<?=$points['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i> Edit</a>

                                                    <a href="javascript:void(0)" id="" data-get="<?=$points['id']?>" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Delete" class="jpoint_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="5"><b>No JPoints Condition Created</b></td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                        
                                    </table>
                                    
                                    
                                    
                                    
                                </div>
                                                
                                <!-- Modal confirm delete submenu Product -->
                                <div class="modal fade" id="modal_cancel" tabindex="-1" role="dialog" aria-labelledby="Product view" aria-hidden="true" >
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

                            
                                
                                