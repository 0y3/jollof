
                                <div class="row m-t-40">

                                    <?php //if($mainmenu==''): ?>  
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/promos/settings")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$displaysectioncount)?></h1>
                                                <h6 class="text-white">Promos Display Section</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                    <!-- Column -->
                                    <?php// endif; ?>
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/promos/settingspromoduration")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$promodurationcount)?></h1>
                                                <h6 class="text-white">Promos  Duration</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->

                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/promos/settingspromopricing")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-primary text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$promopricing)?></h1>
                                                <h6 class="text-white">Promos Pricings </h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                   
                                    
                                    
                                    
                                </div>
                                <div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Promos Duration</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" onclick="window.location='<?= site_url('jollofadmin/promos/promoduration')?>'" >
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
                                                <th>Duration Name</th>
                                                <th>Duration Orders</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if(!empty($duration)): ?>  
                                                <?php  $rowcount=0; ?>
                                                <?php foreach ($duration as $promo) :?>
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

                                                         $rowcount++;
                                                    ?>          
                                            <tr>
                                                <td><?=$rowcount ?></td>
                                                <td><?=$promo['durationname']?></td>
                                                <td><?=$promo['order']?></td>
                                                <td><?=$status?></td>
                                                <td>

                                                    <a href="<?=site_url("jollofadmin/promos/promoduration/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i> Edit</a>
                                                    

                                                    <!--<a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" data-orderid="<?=$promo['durationname']?>" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Decline" class="data_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>-->
                                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="5"><b>No Promo Duration Created</b></td>
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

                            
                                
                                