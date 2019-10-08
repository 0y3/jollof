<style type="text/css">
.colorbox {
    width: 20px;
    height: 20px;
}
</style>
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title"> Users Roles List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info"  onclick="window.location='<?=site_url("jollofadmin/".$roletype."/addusersroleform")?>'">
                                                     Create New Users Roles
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
                                            	<th>Role Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                        <?php if(!empty($role)): ?>  
                                        <?php $count=1; ?>
                                            <?php foreach ($role as $roles) :?>

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
                                                <td><?=$roles['roleName']?></td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <a href="<?=site_url("jollofadmin/".$roletype."/editusersroleform/".$roles['id'])?>" data-toggle="tooltip" data-get="<?=$roles['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-lock"></i> Permissions </a>
                                                </td>
                                            </tr>
                                            <?php $count++; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="3"><b>No User Roles Created</b></td>
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

                                