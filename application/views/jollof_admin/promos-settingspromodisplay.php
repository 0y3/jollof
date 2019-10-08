
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
                                        <h6 class="card-title">Promos Display Section</h6>
                                        <div class="ml-auto">
                                            <!--
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                    aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/promos/promodisplaysectionaddform")?>'">
                                                    Create New
                                                </button>
                                               
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="promo_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>S/N</th>
                                                <th>Display Microsite</th>
                                                <th>Display Section Name</th>
                                                <th>Display Section Type</th>
                                                <th>Width</th>
                                                <th>Height</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if(!empty($displaysection)): ?>  
                                                <?php  $rowcount=0; ?>
                                                <?php foreach ($displaysection as $promo) :?>
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

                                                         if($promo['jollofsitetypeid']==1)
                                                         {
                                                             $microsite='Cuisine Page';
                                                         }
                                                         elseif($promo['jollofsitetypeid']==2)
                                                         {
                                                             $microsite='Fashion Page';
                                                         }
                                                         elseif($promo['jollofsitetypeid']==3)
                                                         {
                                                             $microsite='Main Landing Page';
                                                         }


                                                         $rowcount++;
                                                    ?>          
                                            <tr>
                                                <td><?=$rowcount ?></td>
                                                <td><?=$microsite?></td>
                                                <td><?=$promo['bannertypename']?></td>
                                                <td><?=$promo['bannertype']?></td>
                                                
                                                <td><?=$promo['width']?></td>
                                                <td><?=$promo['height']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="8"><b>No Promo Display Section  Created</b></td>
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

                            
                                
                                