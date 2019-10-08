
                                
                                <h4 class="card-title"></h4>
                                <div class="row m-t-40">

                                    <?php //if($mainmenu==''): ?>  
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/promos/b2bpromos")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$fashionPromo+$cuisinePromo)?></h1>
                                                <h6 class="text-white">B2B's Promos</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 
                                    <!-- Column -->
                                    <?php// endif; ?>
                                    
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/promos/thirdpartyads")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$thirdpartyads)?></h1>
                                                <h6 class="text-white">Thirdparty Ad's</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <!-- Column -->
                                    
                                   
                                    
                                    
                                    
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="promo_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th style="min-width:140px;">Date</th>
                                                <th>Image</th>
                                                <th >Image Url</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                            	<th style="min-width:100px;">State Date</th>
                                            	<th style="min-width:100px;">End Date</th>
                                                <th>Display Section</th>
                                                <th>Status</th>
                                                <th style="min-width:140px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <tr>
                                            <?=form_open("jollofadmin/promos/thirdpartyads/",' id="serachform"')?>
                                                
                                                <td><input type="text" id="createdat" name="createdat" class="form-control" placeholder="Search by date"> </td>
                                                                
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>        
                                                
                                                <td></td>
                                                <td></td> 
                                                <td></td>
                                                <td></td>  
                                                <td>
                                                    <select name="bannertypeid" id="" class="selectpicker form-control" data-live-search="true" show-tick  data-size="8" title="Merchant Search" data-width="90%" onchange="this.form.submit()">
                                                    <option value="">Merchant Display Section</option>
                                                        <?php 
                                                            foreach ($bannertype as $row)
                                                            {
                                                             echo '<option data-tokens="'.$row['id'].'" value="'.$row['id'].'">'.$row['bannertypename'].'</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="status" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Status Type..</option>
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                    </select>
                                                    <!--<input type="text" id="productstatus" name="productstatus" class="form-control" placeholder="Search product Status">-->
                                                </td>
                                                
                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                        
                                            
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

                                                         if($promo['usertype']=='fashion')
                                                         {
                                                            $img='fashion_banner/'.$promo['imagename'];
                                                         }
                                                         elseif($promo['usertype']=='thirdparty')
                                                         {
                                                            $img='thirdparty_banner/'.$promo['imagename'];
                                                         }
                                                         else
                                                         {
                                                            $img='cuisine_banner/'.$promo['imagename'];
                                                         }
                                                    ?>          
                                            <tr>
                                                <td><?=date("jS M \, Y \ g:i A", strtotime($promo['createdat']))?></td>
                                                <td>
                                                    <a href="<?= site_url('assets/jollof_banners/'.$img)?> " data-fancybox="images-preview" data-toolbar="false" data-small-btn="true" >
                                                        <img class="img-thumbnail " src="<?= site_url('assets/jollof_banners/'.$img)?>" >
                                                    </a>
                                                </td>
                                                <td><a target="_blank" href="<?=$promo['imageurl']?>"><?=$promo['imageurl']?></a></td>
                                                <td><?=$promo['username']?></td>
                                                <td><?=$promo['useremail']?></td>
                                                <td><?=$promo['userphone']?></td>
                                                <td><?=$promo['useradd']?></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['startdate']));?></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['enddate']));?></td>
                                                
                                                <td><?=$promo['bannertypename']?></td>
                                                <!--<td><?=$promo['email']?></td>-->
                                                <td><?=$status?></td>
                                                <td>
                                                    <!--
                                                    <?php if($promo['status']==0): ?>
                                                    
                                                    <a href="<?=site_url("jollofadmin/promos/editform/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                    
                                                    <?php endif; ?>  
                                                    
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" data-name="<?=$promo['imagename']?>" data-toggle="modal"  data-target="#modal_conf" data-container="modal_cancel" title="Decline" class="data_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                   -->
                                                   <a href="<?=site_url("jollofadmin/promos/editformthirdparty/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                    
                                                    <?php if($promo['status'] == 0 ): ?>
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" class="promo_accept btn btn-sm btn-success" data-toggle="tooltip" title="Accept Promo"><i class="fa fa-check"></i></a> 
                                                    <?php else: ?>
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" class="promo_decline btn btn-sm btn-warning" data-toggle="tooltip" title="Decline Promo"><i class="fa fa-times"></i></a> 
                                                    <?php endif; ?>

                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" data-name="<?=$promo['imagename']?>" data-type="thirdparty" data-toggle="modal"  data-target="#modal_conf" data-container="modal_cancel" title="Delete Promo" class="promo_delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

                            
                                
                                