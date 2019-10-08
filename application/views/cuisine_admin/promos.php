
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Promos List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("cuisineadmin/promos/addform")?>'">
                                                    Create New
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p></p>
						
                                
                                <div class="table-responsive">
                                    <table id="promo_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>PromoID</th>
                                                <th >Image Url</th>
                                            	<th style="min-width:100px;">State Date</th>
                                            	<th style="min-width:100px;">End Date</th>
                                                <th>Promo Orders</th>
                                                <th>Image</th>
                                                <th>Display Section</th>
                                                <th>Status</th>
                                                <th style="min-width:140px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            <?php if(!empty($promos)): ?>  
                                            
                                                <?php foreach ($promos as $promo) :?>
                                                    <?php 
                                        	   
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($promo['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($promo['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }
                                                    ?>          
                                            <tr>
                                                <td><?=$promo['id']?></td>
                                                <td><a target="_blank" href="<?=$promo['imageurl']?>"><?=$promo['imageurl']?></a></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['startdate']));?></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['enddate']));?></td>
                                                <td><?=$promo['arrangeimage']?></td>
                                                <td>
                                                    <a href="<?= site_url('assets/jollof_banners/cuisine_banner/'.$promo['imagename'])?> " data-fancybox="images-preview" data-toolbar="false" data-small-btn="true" >
                                                        <img class="db_prdimg" src="<?= site_url('assets/jollof_banners/cuisine_banner/'.$promo['imagename'])?>" >
                                                    </a>
                                                </td>
                                                <td><?=$promo['bannertypename']?></td>
                                                <!--<td><?=$promo['email']?></td>-->
                                                <td><?=$status?></td>
                                                <td>
                                                    <?php if($promo['status']==0): ?>

                                                    <a href="<?=site_url("cuisineadmin/promos/editform/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                    
                                                    <?php endif; ?>  

                                                    <a href="" id="" data-toggle="tooltip" data-get="<?=$promo['id']?>" data-name="<?=$promo['imagename']?> " title="Delete" class=" btn btn-sm btn-danger promo_del"> <i class="fa fa-trash"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="9"><b>No Promo Created</b></td>
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

                            
                                
                                