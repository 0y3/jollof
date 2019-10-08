
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-9 col-xl-10 col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center m-b-30">
                                    <h4 class="card-title">All <?=$merchantinfo['companyname']?>  Store Users</h4>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/merchants/usersaddform/".$merchantinfo['slug'])?>'">
                                                    Create New Users
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered nowrap display">
                                        <thead>
                                            <tr>
                                            	<th>UserID</th>
                                            	<th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Role</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        	<?php 
                                        	   if(isset($users) && !empty($users))
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($users as $user)
                                        	       {
                                                           if($user['status']==1)
                                                            {
                                                                $status='<span class="label label-success">Active</span>';
                                                            }
                                                            elseif($user['status']==0)
                                                            {
                                                                $status='<span class="label label-danger">Inactive</span>';
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=$user['id']?></td>
                                                <td><?=$user['firstname']?></td>
                                                <td><?=$user['lastname']?></td>
                                                <td><?=$user['roleName']?></td>
                                                <td><?=$user['phonenumber']?></td>
                                                <td><?=$user['email']?></td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <?php  if($user['id'] != $_SESSION['User_id']): ?>
                                                    <a href="<?=site_url("jollofadmin/merchants/userseditform/".$merchantinfo['slug']."/".$user['id'])?>" data-toggle="tooltip" data-get="<?=$user['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                        
                                                    <a href="" id="" data-toggle="tooltip" data-get="<?=$user['id']?>" data-name="<?=$user['firstname']?> <?=$user['lastname']?> " title="Delete" class=" btn btn-sm btn-danger Muser_delete"> <i class="fa fa-times"></i></a>
                                                    
                                                    <a href="<?=site_url("jollofadmin/merchants/usersresendactivationemail/".$merchantinfo['slug']."/".$user['id'])?>" id="" data-toggle="tooltip" data-get="<?=$user['id']?>"  title="Resend Activation Email" class="btn btn-sm btn-default send_email"> <i class="fa fa-envelope"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        	       }
                                        	   }
                                            ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
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
                                    <a href="<?=site_url("jollofadmin/merchants/b2busers/".$merchantinfo['slug'])?>" class="list-group-item active"><i class="ti-comments m-r-10"></i> Users
                                        <!--<span class="badge badge-danger float-right">101</span>-->
                                    </a>
                                    <a href="<?=site_url("jollofadmin/merchants/b2bpromos/".$merchantinfo['slug'])?>" class="list-group-item"><i class="ti-commentss m-r-10"></i> Promos
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
                                    $(document).on("click",".send_email", function(e){
                                        $('.preloader').css("display", "block");
                                    });
                                    // on delete user  
                                    $(document).on("click",".Muser_delete", function(e){
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
                                       
                                    
                                </script>
                            
                                
                                