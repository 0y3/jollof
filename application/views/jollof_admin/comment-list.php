
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered">
                                        <thead>
                                            <tr>
                                            	<th>Date</th>
                                            	<th>Account Name</th>
                                                <th>Comment</th>
                                                <th>Merchant Name</th>
                                                <th>Merchant Type</th>
                                                <th>Product</th>
                                                <th style=" min-width:100px; ">Status</th>
                                                <th style=" min-width:135px; ">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <tr>
                                        	<?=form_open("jollofadmin/merchants/comments/",' id="serachform"')?>
                                                
                                                <td><input type="text" id="createdat" name="createdat" class="form-control" placeholder="Search by date"> </td>
                                                                
                                                <td></td>

                                                <td></td>
                                                <td>
                                                    <input type="text" id="" name="companyname" class="form-control" placeholder="Search by Buissness Name">
                                                </td>
                                                                
                                                <td>
                                                    <select name="merchanttype" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Merchant Type..</option>
                                                        <option value="Cuisine">Cuisine</option>
                                                        <option value="Fashion">Fashion</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" id="" name="productname" class="form-control" placeholder="Search by Product Name">
                                                </td>
                                                <td>
                                                    <select name="commentstatus" id="" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Choose Status Type..</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Approved</option>
                                                    </select>
                                                    <!--<input type="text" id="productstatus" name="productstatus" class="form-control" placeholder="Search product Status">-->
                                                </td>
                                                
                                                <td></td>
                                                <button style=" display: none" type="submit" class=""></button>
                                                <?=form_close()?>
                                            
                                            </tr>
                                            
                                        	<?php 
                                        	   if(isset($commentslists) && !empty($commentslists))
                                        	   {
                                        	       $status = "";
                                        	       $label_color = array("", "danger", "warning", "primary", "success", "info");
                                                       
                                        	       foreach ($commentslists as $merchantslist)
                                        	       {
                                                           if($merchantslist['status']==0)
                                                            {
                                                                $status="warning";
                                                                $action="";
                                                                $merchantsliststatus= 'Pending';

                                                                if($this->session_manager->hasPermission("Merchants::merchantapprove"))
                                                                {
                                                                    
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="ord_pro" data-get="'.$merchantslist['id'].'" class="comment_approve btn btn-sm btn-success" data-toggle="tooltip" title="Approve Comment"><i class="fa fa-check"></i></a>
                                                                        ';
                                                                }
                                                                if($this->session_manager->hasPermission("Merchants::merchantdecline"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="comment_can" data-get="'.$merchantslist['id'].'" data-name="" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Decline Comment" class="comment_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }
                                                            elseif($merchantslist['status']==1)
                                                            {
                                                                $merchantsliststatus= 'Approved';
                                                                $status="success";
                                                                $action="";
                                                                if($this->session_manager->hasPermission("Merchants::merchantdecline"))
                                                                {
                                                                    $action .='
                                                                        <a href="javascript:void(0)" id="comment_can" data-get="'.$merchantslist['id'].'" data-name="" data-toggle="modal"  data-target="#modal_cancel" data-container="modal_cancel" title="Decline Comment" class="comment_can btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                                        ';
                                                                }
                                                            }
                                            ?>          
                                            <tr>
                                                <td><?=date("M d, Y", strtotime($merchantslist['createdat']))?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['firstname'] .' '. $merchantslist['lastname'] ?></a></td>
                                                <td><?=$merchantslist['comment']?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['companyname']?></a></td>
                                                <td><?=$merchantslist['merchanttype']?></td>
                                                <td><a href="#" class="font-bold link"><?=$merchantslist['productname']?></a></td>
                                                <td><span class="label label-<?=$status?>"><?=$merchantsliststatus ?> </span></td>
                                                <td>
                                                    
                                                    <?=$action ?>
                                                    
                                                </td>
                                            </tr>
                                            <?php 
                                        	       }
                                        	   }
                                            ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                    
                                    <div id="pagination"><?php if(isset($pagenation)) echo $pagenation; ?></div>
                                    
                                    <!--<ul class="pagination float-right">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>-->
                                    
                                </div>
                                
                                <!-- New Attributes Modal -->              
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
                                <!--end Modal -->
                            
                                
                                <script type="text/javascript">
                                    
                                    // on delete user  
                                    $('#zero_config').on("click",".comment_can", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Decline this Comment ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');
                                       var s_name = $(this).data('name');

                                        var url  = site_url+'jollofadmin/merchants/declinecomment/'+s_Id;
                                        

                                       confirmDialog_cart(msgg, function(){
                                           $(location).attr('href', url);
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