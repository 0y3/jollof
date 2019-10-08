
				<div>
                                    <div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Coupons List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("jollofadmin/coupon/addform")?>'">
                                                    Create New Coupon
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
                                                <th>Coupon Name</th>
                                            	<th>Coupon Code</th>
                                                <th>Discount</th>
                                                <th>Usage Set</th>
                                                <th>Usage Count</th>
                                                <th>State Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php if(!empty($coupons)): ?>  
                                            <?php $count=1; ?>
                                                <?php foreach ($coupons as $coupon) :?>

                                                    <?php 
                                                   
                                                            $status = "";
                                                            $label_color = array("", "danger", "warning", "primary", "success", "info");

                                                            if($coupon['status']==1)
                                                            {
                                                                $status='<span class="label label-success">Active</span>';
                                                            }
                                                            elseif($coupon['status']==0)
                                                            {
                                                                $status='<span class="label label-danger">Inactive</span>';
                                                            }
                                                            if($coupon['couponisamount']==1)
                                                            {
                                                                $discount = "₦".number_format($coupon['coupondiscount'],2);
                                                            }
                                                            elseif ($coupon['couponisper']==1) 
                                                            {
                                                                $discount = $coupon['coupondiscount'].'%';
                                                            }
                                                    ?>
                                                   
                                                <tr>
                                                    <td><?=$count;?></td>
                                                    <td><?=$coupon['couponname']?></td>
                                                    <td><?=$coupon['couponcode']?></td>
                                                    <td><?=$discount?></td>
                                                    <td><?=$coupon['numofuserspercoupon']?></td>
                                                    <td><?=$coupon['numofuserspercouponcount']?></td>
                                                    <td><?=date("jS M \, Y \ ", strtotime($coupon['datestart']))?></td>
                                                    <td><?=date("jS M \, Y \ ", strtotime($coupon['dateend']))?></td>
                                                    <td><?=$status?></td>
                                                    <td>
                                                        <a href="<?=site_url("jollofadmin/coupon/editform/".$coupon['id'])?>" data-toggle="tooltip" data-get="<?=$coupon['id']?>" title="Edit Coupon" class="btn btn-sm btn-default"> <i class="fa fa-edi ti-marker-alt"></i></a>
                                                            
                                                        <a href="<?= site_url("jollofadmin/coupon/delete/$coupon[id]") ?>" id="" data-toggle="tooltip" data-get="<?=$coupon['id']?>" data-name="<?=$coupon['couponname']?>  " title="Delete Coupon" class=" btn btn-sm btn-danger coupon_del"> <i class="fa fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                                <?php $count++; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                
                                                <tr>
                                                    <td class="text-center" colspan="10"><b>No Coupon Created</b></td>
                                                </tr>
                                            <?php endif; ?>
                                            
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
                                    // on delete coupon  
                                    $(document).on("click",".coupon_del", function(e){
                                       e.preventDefault();

                                       var msgg = 'Are you sure you want to Delete this Coupon ? -- '+ $(this).data('name');
                                       var s_Id = $(this).data('get');
                                       var s_name = $(this).data('name');
                                       var url = $(this).attr('href');

                                       confirmDialog_cart(msgg, function(){
                                           $('.preloader').css("display", "block");
                                           $(location).attr('href', url);
                                           /* $.ajax({
                                                    type: "POST",
                                                    url: '<?= site_url('jollofadmin/coupon/delete') ?>',
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
                                        });*/

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
                            
                                
                                