
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Color Variant List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/cuisine/addcategoryform")?>'">
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
                                            	<th>Category Name</th>
                                                <th>Sort Order</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                        <?php if(!empty($cuisine)): ?>  
                                        
                                            <?php foreach ($cuisine as $cuisines) :?>

                                                <?php 
                                               
                                                        $status = "";
                                                        $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                        if($cuisines['status']==1)
                                                         {
                                                             $status='<span class="label label-success">Active</span>';
                                                         }
                                                         elseif($cuisines['status']==0)
                                                         {
                                                             $status='<span class="label label-danger">Inactive</span>';
                                                         }
                                                ?>
                                        	   
                                            <tr>
                                                <td><?=$cuisines['categoryname']?></td>
                                                <td><?=$cuisines['arrangecategory']?></td>
                                                <td><?=$status?></td>
                                                <td>
                                                    <a href="<?= site_url('jollofadmin/cuisine/addcategoryform/'.$cuisines['id']) ?>" id="<?= $cuisines['id'] ?>" data-cuisines_name="<?= $cuisines['categoryname'] ?>" class=" btn btn-xs btn-default color_edit"> Edit <i class="ti-marker-alt"></i></a>

                                                    <a href=""id="<?= $cuisines['id'] ?>" data-color_id="<?= $cuisines['id'] ?>" data-color_name="<?= $cuisines['categoryname'] ?>" data-toggle="tooltip"  class=" btn btn-xs btn-danger color_del">Delete <i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>

                                            <?php endforeach; ?>
                                        <?php else: ?>
                            
                                            <tr>
                                                <td class="text-center" colspan="4"><b>No Cuisine Category Created</b></td>
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

                                <!-- Modal confirm delete Color  -->
                                <div class="modal" id="empty_confirmModal">
                                    <div class="modal-dialog">
                                            <div class="modal-content">

                                                    <div class="modal-body" >
                                                        <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                                        <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
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
                                                    url: '<?= site_url('cuisineadmin/users/delete') ?>',
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


                                    // Edit Color name 
                                    $(document).on("click",".color_del", function(e){
                                        e.preventDefault();
                                        var row_id = $(this).data("color_id");
                                        var empty_msg = "Are you sure you want to remove this Category name ?.." + $(this).data("color_name");
                                        //e.stopImmediatePropagation();
                                        
                                            confirmDialog(empty_msg, function(){
                                                    $.ajax({
                                                     url:"<?= site_url('super_admin/delete_fashioncolorr') ?>",
                                                     method:"POST",
                                                     //dataType: "json", // Set the data type so jQuery can parse it for you
                                                    data:{id_:row_id},
                                                    success:function(data)
                                                    {
                                                    }
                                                });

                                            });
                                    });
                                        
                                        
                                    function confirmDialog(message, onConfirm){
                                        var fClose = function(){
                                                    modal.modal("hide");
                                        };
                                        var modal = $("#empty_confirmModal");
                                        modal.modal("show");
                                        $("#empty_confirmMessage").empty().append(message);
                                        $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
                                        $("#empty_confirmCancel").unbind().one("click", fClose);
                                    }
                                </script>
                            
                                
                                