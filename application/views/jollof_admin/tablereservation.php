
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Table Reservation List</h6>
                                        
                                    </div>
                                </div>

                                <p></p>
						
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>Date</th>
                                            	<th>Booking ID</th>
                                                <th>Merchant </th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Note</th>
                                                <th>Guest</th>
                                                <th style=" min-width:100px; ">Status</th>
                                                <th style=" min-width:100px; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            
                                            
                                        	<?php 
                                        	   if(isset($tables) && count($tables)>0)
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                   
                                        	       foreach ($tables as $user)
                                        	       {
                                                        

                                                           if($user['requeststatus']==1 && $user['status']==1)
                                                            {
                                                                $status='<span class="label label-success">Active</span>';
                                                                $action ='';
                                                            }
                                                            elseif($user['requeststatus']==1 && $user['status']==0)
                                                            {
                                                                $status='<span class="label label-danger">Inactive</span>';
                                                                $action ='
                                                                        <a href="javascript:void(0)" data-toggle="tooltip" data-get="'.$user['id'].'" title="Accept Tabel Reservation" class="table_accept btn btn-sm btn-light-info"> <i class="fa fa-check"></i></a>
                                                        
                                                                        <a href="" id="" data-toggle="tooltip" data-get="'.$user['id'].'" data-name="" title="Delete" class="table_delete btn btn-sm btn-danger"> <i class="fa fa-times"></i></a>
                                                                        ';
                                                            }
                                                            elseif($user['requeststatus']==0 && $user['status']==0)
                                                            {
                                                                $status='<span class="label label-danger">Canceled</span>';
                                                                $action ='';
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=date("M d, Y", strtotime($user['createdat']))?></td>
                                                <td><?=$user['tablecode']?></td>
                                                <td><b><?=$user['companyname']?></b></td>
                                                <td><?=$user['merchanttype']?></td>
                                                <td><?=$user['contactname']?></td>
                                                <td><?=$user['contactphone']?></td>
                                                <td><?=$user['contactemail']?></td>
                                                <td><?=$user['contactnote']?></td>
                                                <td><?=$user['numguest']?></td>
                                                <td><?=$status?></td>
                                                <td><?=$action?></td>
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
                                                            <div class="form-group">

                                                                <label class="col-md-12 controllabel" for="save_note">Cancellation note <span class="text-danger">*</span> </label>

                                                                <div class="col-md-12">

                                                                    <textarea id="table_note" name="save_note" class="form-control" rows="2" required=""></textarea>

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger sendButton" id="confirmOk">Ok</button>
                                                            <button type="button" class="btn btn-success" id="confirmCancel">Cancel</button>
                                                        </div>

                                                </div>
                                        </div>
                                </div>

                                <script>
                                    //disable ok button whwn note is empty
                                    $(document).ready(function(){
                                        $('.sendButton').prop('disabled',true);
                                        $('#table_note').keyup(function(){
                                            $('.sendButton').prop('disabled', this.value == "" ? true : false);     
                                        })
                                    });  

                                    // on delete table request 
                                    $(document).on("click",".table_delete", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Delete this Table Reservation ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');

                                       confirmDialog_cart(msgg, function(){
                                           $('.preloader').css("display", "block");
                                           var note=$('textarea:input[name=save_note]').val();
                                            $.ajax({
                                                    type: "POST",
                                                    url: '<?= site_url('cuisineadmin/tablereservation/delete') ?>',
                                                    dataType: 'json',
                                                    data: {
                                                            table:'can',
                                                            _id: s_Id,
                                                            _note:note
                                                          }
                                                }).done(function (data) {
                                                    if (data.status === '1')
                                                        {
                                                            
                                                        }


                                                    }); 
                                                $('#modal_conf').modal('hide');
                                                //window.location.reload();
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
                            
                                
                                