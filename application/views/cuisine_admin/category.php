
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Menu Categories List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("cuisineadmin/Categories/addform")?>'">
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
                                            	<th>S/N</th>
                                            	<th>Category Name</th>
                                                <th>Category Order</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                       
                                            
                                        	<?php 
                                        	   if(isset($Categories) && !empty($Categories))
                                        	   {
                                                $rowcount=1;
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($Categories as $Category)
                                        	       {

                                                           if($Category['categorystatus']==1)
                                                            {
                                                                $status='<span class="label label-success">Active</span>';
                                                            }
                                                            elseif($Category['categorystatus']==0)
                                                            {
                                                                $status='<span class="label label-danger">Inactive</span>';
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=$rowcount ?></td>
                                                <td><?=$Category['categoryname']?></td>
                                                <td><?=$Category['arrangecategory']?></td>
                                                <td><?=$status?></td>
                                                <td>
                                                <?php  if( $Category['categoryname'] !== 'Main Menu'): ?>
                                                    <?php  if($this->session_manager->hasPermission("Categories::editform")): ?>
                                                    <a href="<?=site_url("cuisineadmin/Categories/editform/".$Category['id'])?>" data-toggle="tooltip" data-get="<?=$Category['id']?>" title="Edit" class="btn btn-sm btn-light-info"> <i class="fa fa-edit"></i></a>
                                                    <?php endif; ?>

                                                    <?php  if($this->session_manager->hasPermission("Categories::delete")): ?> 
                                                    <a href="" id="" data-toggle="tooltip" data-get="<?=$Category['id']?>" data-name="<?=$Category['categoryname']?>" title="Delete" class=" btn btn-sm btn-danger category_del"> <i class="fa fa-times"></i></a>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        	       $rowcount++;   
                                                }// end foreach
                                        	}// end of if 
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
                                    // on delete  Menu Categories  
                                    $(document).on("click",".category_del", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Delete this category ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');
                                       var s_name = $(this).data('name');

                                       confirmDialog_cart(msgg, function(){
                                           $('.preloader').css("display", "block");
                                            $.ajax({
                                                    type: "POST",
                                                    url: '<?= site_url('cuisineadmin/categories/delete') ?>',
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
                            
                                
                                