<style type="text/css">
.colorbox {
    width: 20px;
    height: 20px;
}
</style>
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Fashion Brand List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createbrandmodel">
                                                     Create New Brand
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
                                            	<th>Brand Name</th>
                                            	<th>Brand logo</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                        <?php if(!empty($brand)): ?>  
                                        
                                            <?php foreach ($brand as $brands) :?>

                                                <?php 
                                               
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($brands['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($brands['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }
                                                         if(empty($brands['logo']))
                                                         {
                                                             $img='90by90.jpg';
                                                         }
                                                         else
                                                         {
                                                             $img=$brands['logo'];
                                                         }
                                                ?>
                                        	   
                                            <tr>
                                                <td><?=$brands['name']?></td>
                                                <td><img src="<?=site_url('assets/uploads/brand_logo/'.$img)?>"class="img-thumbnail" width="50" /> </td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <a href="javascript:void(0);" id="<?= $brands['id'] ?>"  data-toggle="modal" data-target="#editbrandmodel" data-brand_id="<?= $brands['id'] ?>" data-brand_name="<?= $brands['name'] ?>" data-brand_image="<?= $brands['logo'] ?>" data-brand_status="<?= $brands['status'] ?>" class=" btn btn-xs btn-default color_edit"> Edit <i class="ti-marker-alt"></i></a>

                                                    <a href=""id="<?= $brands['id'] ?>" data-brand_id="<?= $brands['id'] ?>" data-brand_name="<?= $brands['name'] ?>" data-toggle="tooltip"  class=" btn btn-xs btn-danger brand_del">Delete <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="3"><b>No Brand Created</b></td>
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

                                <!-- Create New Brand Modal -->
                                <div class="modal fade" id="createbrandmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="" action="<?= site_url('jollofadmin/fashion/brandsave') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Brand</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                                        <input type="text" class="form-control" name="name" placeholder="Brand Name " aria-label="no" required="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="O_Uplode col-md-8">
                                                           <input type="file" name="invent_image" accept="image/*" id="base-input" class="form-control form-input form-style-base" required="">
                                                           <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose Brand Logo" readonly="" accept="image/*">
                                                           <span class=" fas fa-upload UplodeIcon"></span>
                                                        </div>
                                                        <div class="div_UploadView" style="display: none;">
                                                            <img class="rounded-circlee UploadView" src="" width="100px" height="100px" />
                                                            <span class="Removecover"data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="text-danger far fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit  Brand Modal -->
                                <div class="modal fade" id="editbrandmodel" tabindex="-1" role="dialog" aria-labelledby="imagethumbslabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="" action="<?= site_url('jollofadmin/fashion/brandedit') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imagethumbslabel"><i class="ti-marker-alt m-r-10"></i>Edit Brand </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <input type="hidden"  class="form-control" id="modal_brandid" name="id" value="" required="">
                                                        <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                                        <input type="text" class="form-control" id="modal_brandname" name="name" placeholder="Brand Name " aria-label="no" required="">
                                                    </div>
                                                    <!--
                                                    <div class="input-group mb-3">
                                                        <div class="O_Uplode col-md-8">
                                                           <input type="file" name="invent_image" accept="image/*" id="base-input" class="form-control form-input form-style-base" required="">
                                                           <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose Brand Logo" readonly="" accept="image/*">
                                                           <span class=" fas fa-upload UplodeIcon"></span>
                                                        </div>
                                                        <div class="div_UploadView" style="display: none;">
                                                            <img class="rounded-circle UploadView" src="" width="100px" height="100px" />
                                                            <span class="Removecover"data-placement="top" data-toggle="tooltip" title="Remove Cover pics"><i class="text-danger far fa-trash-alt"></i></span>
                                                        </div>
                                                    </div>
                                                    -->
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <br>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline3" id="modal_active" name="status" value="1" class="custom-control-input">
                                                            <label class="custom-control-label text-success" for="customRadioInline3">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadioInline4" id="modal_inactive" name="status" value="0" class="custom-control-input">
                                                            <label class="custom-control-label text-danger" for="customRadioInline4">In-Active</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                                
                                