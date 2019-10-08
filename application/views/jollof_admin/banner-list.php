
                                
                                <h4 class="card-title"></h4>
                                <div class="row m-t-40">

                                    <?php if($submenu=='bannersjollof'): ?>  
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/jollof")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount)?></h1>
                                                <h6 class="text-white">Jollof HomePage Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div> 

                                    <?php elseif($submenu=='bannerscuisine'): ?>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/cuisine")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount)?></h1>
                                                <h6 class="text-white">Cuisine HomePage Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/cuisine?bannertypeid=10")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount_R)?></h1>
                                                <h6 class="text-white">Cuisine Restaurants Page Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/cuisine?bannertypeid=3")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount_RS)?></h1>
                                                <h6 class="text-white">Cuisine Restaurants Sidebar Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <?php elseif($submenu=='bannersfashion'): ?>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/fashion")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount)?></h1>
                                                <h6 class="text-white">Fashion HomePage Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-2 col-xlg-2">
                                        <a href="<?= site_url("jollofadmin/banners/fashion?bannertypeid=9")?>">
                                        <div class="card card-hover">
                                            <div class="box bg-dark text-center">
                                                <h1 class="font-light text-white"><?=number_format(@$bannerscount_F)?></h1>
                                                <h6 class="text-white">Fashion Homepage Sidebar Sliders</h6>
                                            </div>
                                        </div>
                                        </a>
                                    </div>

                                    <?php endif; ?>
                                    
                                    
                                </div>

                                <div class="d-flex no-block align-items-center m-b-10">
                                        <h6 class="card-title"></h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <?php if( ($submenu=='bannerslifestyle') || ($submenu == "bannersbiz") || ($submenu == "bannersscholar") || ($submenu == "bannerscuisinesignup") || ($submenu == "bannersfashionsignup") || ($submenu == "bannersjollofsignup") ): ?>
                                                <a href="<?= site_url('jollofadmin/banners/addformbanner')?>" class="btn btn-info">
                                                    Create New
                                                </a>
                                                <?php else: ?>
                                                <a href="<?= site_url('jollofadmin/banners/addform')?>" class="btn btn-info">
                                                    Create New
                                                </a>
                                                <?php endif; ?>
                                               
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="table-responsive">
                                    <table id="Banners_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th style="min-width:140px;">Date</th>
                                                <th>Banner Order</th>
                                                <th style="min-width:80px;">Image</th>
                                                <th style="min-width:80px;">Redirect Url</th>
                                            	<th>Usertype</th>
                                            	<th>UserName</th>
                                                <th>Status</th>
                                                <th style="min-width:100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            <?php if(!empty($banners)): ?>  
                                            
                                                <?php foreach ($banners as $banner) :?>
                                                    <?php 
                                        	   
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                        /*
                                                        $status = '<div class="statusdiv_'.$banner['id'].'">
                                                                        <a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Banner Status" class="jboxtooltip editbannerstatus" data-charge_id="'.$banner['id'].'">
                                                                        <i class="ti-pencil-alt""></i>
                                                                        </a>';
                                                        */
                                                        if($banner['status']==1)
                                                         {
                                                             $status ='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($banner['status']==0)
                                                         {
                                                             $status ='<span class="label label-danger">Inactive</span>';
                                                         }

                                                        if($banner['usertype']=='admin')
                                                        {
                                                            if($banner['bannerjollofsitetypeid']==1)
                                                            {
                                                                $bannertype='cuisine';
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==2)
                                                            {
                                                                $bannertype ='fashion';
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==3)
                                                            {
                                                                $bannertype ='jollof';
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==4)
                                                            {
                                                                $bannertype ='lifestyle';
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==5)
                                                            {
                                                                $bannertype ='biz';
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==6)
                                                            {
                                                                $bannertype ='scholar';
                                                            }
                                                        }
                                                        else 
                                                        {
                                                            $bannertype = $banner['usertype'];
                                                        }


                                                        if($banner['usertype']=='cuisine')
                                                        {
                                                            $img='cuisine_banner/'.$banner['imagename'];
                                                        }
                                                        elseif($banner['usertype']=='fashion')
                                                        {
                                                           $img='fashion_banner/'.$banner['imagename'];
                                                        }
                                                        elseif($banner['usertype']=='thirdparty')
                                                        {
                                                           $img='thirdparty_banner/'.$banner['imagename'];
                                                        }
                                                        elseif($banner['usertype']=='admin')
                                                        {
                                                           
                                                            if($banner['bannerjollofsitetypeid']==1)
                                                            {
                                                                $img='cuisine_banner/'.$banner['imagename'];
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==2)
                                                            {
                                                               $img='fashion_banner/'.$banner['imagename'];
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==3)
                                                            {
                                                               $img='jollof_banner/'.$banner['imagename'];
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==4)
                                                            {
                                                               $img='lifestyle_banner/'.$banner['imagename'];
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==5)
                                                            {
                                                                $img='biz_banner/'.$banner['imagename'];
                                                            }
                                                            elseif($banner['bannerjollofsitetypeid']==6)
                                                            {
                                                                $img='scholar_banner/'.$banner['imagename'];
                                                            }
                                                        }

                                                       
                                                    ?>          
                                            <tr>
                                                <td><?=date("jS M \, Y \ g:i A", strtotime($banner['createdat']))?></td>
                                                <td>
                                                    <div class="cat_orderdiv_<?=$banner['id']?>"> &nbsp;
                                                        <!--<a href="javascript:void(0);" data-toggle="tooltip"  title="Edit Banner Orders" class="jboxtooltip editbannerorder" data-_id="<?=$banner['id']?>" data-banner_order="<?=$banner['arrangeimage']?>" >
                                                         <i class="ti-pencil-alt""></i>
                                                        </a> &nbsp; -->
                                                        <?=$banner['arrangeimage']?></td>
                                                    </div>
                                                    
                                                <td>
                                                    <a href="<?= site_url('assets/jollof_banners/'.$img)?> " data-fancybox="images-preview" data-toolbar="false" data-small-btn="true" >
                                                        <img class="img-thumbnail" width="65rem" height="" src="<?= site_url('assets/jollof_banners/'.$img)?>" >
                                                    </a>
                                                </td>
                                                <td><a target="_blank" href="<?=$banner['imageurl']?>"><?=$banner['imageurl']?></a></td>
                                                
                                                <td><?=$banner['usertype']?></td>
                                                <td><?=$banner['username']?></td>
                                                <td><?=$status?></td>
                                                <td>
                                                    
                                                    <a href="<?= site_url('jollofadmin/banners/editform/'.$banner['id']) ?>" data-toggle="tooltip" data-get="<?= $banner['id'] ?>" title="" class="btn btn-sm btn-light-info" data-original-title="Edit"> <i class="fa fa-edit"></i></a>
                                                    

                                                    <a href="javascript:void(0)" id="" data-get="<?=$banner['id']?>" data-name="<?=$banner['imagename']?>" data-type="<?=$bannertype?>" data-toggle="modal"  data-target="#modal_conf" data-container="modal_cancel" title="Delete Promo" class="banner_delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="8"><b>No Banners Created</b></td>
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

                            
                                
                                