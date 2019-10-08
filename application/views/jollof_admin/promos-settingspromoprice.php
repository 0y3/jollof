
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
                                        <h6 class="card-title">Promos Pricing Section</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" onclick="window.location='<?= site_url('jollofadmin/promos/promopricing')?>'" >
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
                                                <th>Display Microsite</th>
                                                <th>Display Section Type</th>
                                                <th>Display Section Name</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <?=form_open("jollofadmin/promos/settingspromopricing/",' id="serachform"')?>
                                                <td></td>
                                                <td>
                                                    <select name="bannertypejollofsitetypeid" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Microsite Type..</option>
                                                        <option value="3">Main Landing Page</option>
                                                        <option value="1">Cuisine Page</option>
                                                        <option value="2">Fashion Page</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <td>
                                                     <select name="bannertypename" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Display Section Name..</option>
                                                        <?php 
                                                            foreach ($bannertype as $row)
                                                            {
                                                             echo '<option value="'.$row['bannertypename'].'">'.$row['bannertypename'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                
                                                <td>
                                                    <select name="durationname" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Duration..</option>
                                                        <?php 
                                                            foreach ($duration as $row)
                                                            {
                                                             echo '<option value="'.$row['durationname'].'">'.$row['durationname'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                <td> 
                                                    <input type="number" id="" name="promoprice" class="form-control" placeholder="Search Promo Price">
                                                </td>
                                                <td>
                                                    <select name="promopricestatus" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Status Type..</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </td>
                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            </tr>

                                            <?php if(!empty($pricing)): ?>  
                                                <?php  $rowcount=0; ?>
                                                <?php foreach ($pricing as $promo) :?>
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
                                                <td><?=$promo['bannertype']?></td>
                                                <td><?=$promo['bannertypename']?></td>
                                                
                                                <td><?=$promo['durationname']?></td>
                                                <td> ₦ <?= number_format(floatval($promo['price']), 2,'.', ',');?></td>
                                                <td><?=$status?></td>
                                                <td>

                                                    <a href="<?=site_url("jollofadmin/promos/promopricing/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i> Edit </a>
                                                    
                                                    <!--
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" data-name="<?=$promo['price']?>" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Delete" class="data_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                   -->
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="8"><b>No Promo Prices  Created</b></td>
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

                            
                                
                                