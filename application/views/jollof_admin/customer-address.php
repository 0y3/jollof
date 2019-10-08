
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9 col-xl-10 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All <?= $customerinfo['firstname']?> <?= $customerinfo['lastname']?> Addresses</h4>
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
                                            	<th>S/N</th>
                                            	<th>Address Name</th>
                                                <th>Phone No</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        	<?php if(!empty($address)): ?>  
                                                <?php
                                                    $num=0;
                                                ?>
                                                <?php foreach ($address as $adds) :?>
                                                    <?php 
                                                        $num++;
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($adds['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($adds['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Decline</span>';
                                                         }

                                                        
                                                    ?>        
                                            <tr>
                                                <td><?=$num;?></td>
                                                <td><?=$adds['firstname']?> <?=$adds['lastname']?></td>
                                                <td> <?=$adds['phone']?> <br> <?=$adds['phone2']?></td>
                                                <td><?=$adds['address'];?></td>
                                                <td><?=$adds['cityname'];?></td>
                                                <td><?=$adds['statename'];?></td>
                                                <td><?=$status?></td>
                                                <td>

                                                    <a href="<?=site_url("jollofadmin/customers/addressform/$customerinfo[id]/$adds[id]")?>" data-toggle="tooltip" data-get="<?=$adds['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                      
                                                    <a href="javascript:void(0)" id="" data-get="<?=$adds['id']?>" data-name="<?=$adds['address']?>" data-toggle="modal"  data-target="#modal_conf" data-container="modal_cancel" title="Decline" class="data_delete btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                   
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="9"><b>No Adress Record</b></td>
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
                                    <a href="<?= site_url('jollofadmin/customers/profile/'.$customerinfo['id'])?>" class="list-group-item"><i class="ti-flag-alt-2 m-r-10"></i>Customer's Info 
                                        <!--<span class="badge badge-info float-right">20</span>-->
                                    </a>
                                    <a href="<?= site_url('jollofadmin/customers/orders/'.$customerinfo['id'])?>" class="list-group-item"><i class="ti-notepad m-r-10"></i> Orders
                                        <!--<span class="badge badge-success float-right">12</span>-->
                                    </a>
                                    <a href="<?= site_url('jollofadmin/customers/deliveryaddress/'.$customerinfo['id'])?>" class="list-group-item active"><i class="ti-notepad m-r-10"></i> Delivery Address
                                        <!--<span class="badge badge-success float-right">12</span>-->
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
                            
                                
                                