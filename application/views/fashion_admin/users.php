
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Users List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("fashionadmin/users/addform")?>'">
                                                    Create New
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
                                        	   if(isset($users) && count($users)>0)
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
                                                    <a href="<?=site_url("fashionadmin/users/editform/".$user['id'])?>" data-toggle="tooltip" data-get="<?=$user['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                        
                                                    <a href="" id="" data-toggle="tooltip" data-get="<?=$user['id']?>" data-name="<?=$user['firstname']?> <?=$user['lastname']?> " title="Delete" class=" btn btn-sm btn-danger user_del"> <i class="fa fa-times"></i></a>
                                                    
                                                    <a href="<?=site_url("fashionadmin/users/resendactivationemail/".$user['id'])?>" id="" data-toggle="tooltip" data-get="<?=$user['id']?>"  title="Resend Activation Email" class="btn btn-sm btn-default send_email"> <i class="fa fa-envelope"></i></a>
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
                                    $(document).on("click",".user_del", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Delete this User ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');
                                       var s_name = $(this).data('name');

                                       confirmDialog_cart(msgg, function(){
                                           $('.preloader').css("display", "block");
                                            $.ajax({
                                                    type: "POST",
                                                    url: '<?= site_url('fashionadmin/users/delete') ?>',
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
                                        $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
                                        $("#confirmCancel").unbind().one("click", fClose);
                                    }
                                       
                                    $("#zero_config").on("click",".send_email", function(e){
                                        $('.preloader').css("display", "block");
                                    });
                                </script>
                            
                                
                                