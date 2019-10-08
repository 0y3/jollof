
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9 col-xl-10 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All <?=$merchantinfo['companyname']?>  Store Promos</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <!--<button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                    aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/merchant/usersaddform")?>'">
                                                    Create New
                                                </button>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                            <tr>
                                            	<th>Date</th>
                                            	<th>Image</th>
                                                <th>Image Url</th>
                                                <th>State Date</th>
                                                <th>End Date</th>
                                                <th>Display Section</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                                                        <img class="img-thumbnail" src="<?= site_url('assets/jollof_banners/'.$img)?>" >
                                                    </a>
                                                </td>
                                                <td><a target="_blank" href="<?=$promo['imageurl']?>"><?=$promo['imageurl']?></a></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['startdate']));?></td>
                                                <td><?= date('jS M \, Y ', strtotime($promo['enddate']));?></td>
                                                
                                                <td><?=$promo['bannertypename']?></td>
                                                <td><?=$status?></td>
                                                <td>

                                                    <a href="<?=site_url("jollofadmin/promos/editform/".$promo['id'])?>" data-toggle="tooltip" data-get="<?=$promo['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>

                                                    <?php if($promo['status'] == 0 ): ?>
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" class="promo_accept btn btn-sm btn-success" data-toggle="tooltip" title="Accept Promo"><i class="fa fa-check"></i></a> 
                                                    <?php else: ?>
                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" class="promo_decline btn btn-sm btn-warning" data-toggle="tooltip" title="Decline Promo"><i class="fa fa-times"></i></a> 
                                                    <?php endif; ?>

                                                    <a href="javascript:void(0)" id="" data-get="<?=$promo['id']?>" data-name="<?=$promo['imagename']?>" data-type="<?=$promo['usertype']?>" data-toggle="modal"  data-target="#modal_conf" data-container="modal_cancel" title="Delete Promo" class="promo_delete btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                   
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
                                <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-xl-2 col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-t-30">More</h4>
                                <div class="list-group">
                                    <a href="<?=site_url("jollofadmin/merchants/b2bstore/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i>Store Info 
                                        <!--<span class="badge badge-info float-right">20</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2bproducts/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-notepad m-r-10"></i> Products
                                        <!--<span class="badge badge-success float-right">12</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2borders/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-target m-r-10"></i> Orders
                                        <!--<span class="badge badge-dark float-right">22</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2busers/".$merchantinfo['slug'])?>" class="list-group-item "><i class="ti-comments m-r-10"></i> Users
                                        <!--<span class="badge badge-danger float-right">101</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2bpromos/".$merchantinfo['slug'])?>" class="list-group-item active"><i class="ti-commentss m-r-10"></i> Promos
                                        <!--<span class="badge badge-danger float-right">101</span>-->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
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

                                <script>
                                    // on delete user  
                                    $(document).on("click",".user_del", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Delete this User ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');
                                       var s_name = $(this).data('name');

                                       confirmDialog_cart(msgg, function(){
                                           $('.preloader').css("display", "block");
                                            $.ajax({
                                                    type: "POST",
                                                    url: '<?= site_url('jollofadmin/merchants/usersdelete') ?>',
                                                    dataType: 'json',
                                                    data: {
                                                            _id: s_Id,
                                                            _name: s_name
                                                          }
                                                }).done(function (data) {
                                                    if (data.status === '1')
                                                        {
                                                            
                                                        }


                                                    }); 
                                                $('#modal_conf').modal('hide');
                                                window.location.reload();
                                        });

                                    });
                                    function confirmDialog_cart(message, onConfirm){
                                        var fClose = function(){
                                                    modal.modal("hide");
                                        };
                                        var modal = $("#modal_conf");
                                        modal.modal("show");
                                        $("#confirmMessage").empty().append(message);
                                        $("#confirmOk").one('click', onConfirm);
                                        $("#confirmOk").one('click', fClose);
                                        $("#confirmCancel").one("click", fClose);
                                    }
                                       
                                    $("#zero_config").on("click",".send_email", function(e){
                                        $('.preloader').css("display", "block");
                                    });
                                </script>
                            
                                
                                