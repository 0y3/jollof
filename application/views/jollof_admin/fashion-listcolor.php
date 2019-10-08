<style type="text/css">
.colorbox {
    width: 20px;
    height: 20px;
}
</style>
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Color Variant List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/fashion/addcolorform")?>'">
                                                    Create New
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
                                            	<th>Color Name</th>
                                            	<th>Color Code</th>
                                                <th>Color</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                        <?php if(!empty($color)): ?>  
                                        
                                            <?php foreach ($color as $colors) :?>

                                                <?php 
                                               
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($colors['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($colors['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }
                                                ?>
                                        	   
                                            <tr>
                                                <td><?=$colors['colorname']?></td>
                                                <td><?=$colors['colorcode']?></td>
                                                <td><div class="colorbox" style=" background-color:#<?=$colors['colorcode']?> ;"></div></td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/fashion/addcolorform/'.$colors['id']) ?>" id="<?= $colors['id'] ?>" data-color_id="<?= $colors['id'] ?>" data-color_name="<?= $colors['colorname'] ?>" data-color_code="<?= $colors['colorcode'] ?>" class=" btn btn-xs btn-default color_edit"> Edit <i class="ti-marker-alt"></i></a>

                                                    <a href=""id="<?= $colors['id'] ?>" data-color_id="<?= $colors['id'] ?>" data-color_name="<?= $colors['colorname'] ?>" data-toggle="tooltip"  class=" btn btn-xs btn-danger color_del">Delete <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="3"><b>No Color Variable Created</b></td>
                                            </tr>
                                        <?php endif; ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                    
                                </div>

                                <!--end Table here-->
                        
                                 <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>
                                                
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
                            
                                
                                