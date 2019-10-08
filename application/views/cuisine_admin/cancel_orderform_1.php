<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>Cancel Order Form </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <?php if($access_denied!=TRUE): ?>
                                
                                <form id="cate_form" action="<?= site_url('fashion_admin/update_order_flow') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Order ID</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name"  name="save_name" class="form-control" placeholder="Enter name.." value="<?= $data_orderid?>" readonly="">

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_note">Cancellation Order note </label>

                                        <div class="col-md-7">

                                            <textarea id="product-short-description" name="save_note" class="form-control" rows="3" required=""></textarea>

                                        </div>

                                    </div>


                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                                <?php else: ?>
                                    <div class="alert alert-danger alert-dismissable get_error" style="display: ;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                                        <h3 class="text-center"><b>Access Denied!!</b></h3><br> 
                                        <span class="error_msgr_lg"> You don't have Permission to cancel this Order! contact Super Admin for Permission.</span>

                                    </div>
                                <?php endif; ?>
                                
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
            
            $("#cate_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                
                var ord_id_   = <?= $data_id ?>; // gets value
                var note = $('[name="save_note"]').val();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:{
                        order:'can',
                        ord_id:ord_id_,
                        ord_note:note
                    }
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_cancel').modal('hide'); 
                                    
                                    new jBox('Notice', {
                                        //animation: 'flip',
                                    animation: {
                                      open: 'tada',
                                      close: 'zoomIn'
                                    },
                                    position: {
                                      x: 10,
                                      y: 100
                                    },
                                    attributes: {
                                      x: 'right',
                                      y: 'bottom'
                                    },
                                    color: 'red',
                                    autoClose: Math.random() * 8000 + 2000,
                                    content: 'Success! Order code: '+ord_id_+' canceled',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                //dataTable.ajax.reload();
                                $('.conte').load("<?= site_url('fashion_admin/view_pending_order') ?>");
                                window.setTimeout(function () {
                                    location.href = "<?php echo site_url('fashion-admin/order_pending'); ?>";
                                }, 2000);
                        
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#cat_form")[0].reset();
                                $("#save_name").focus();
                            } 
                            
                                //$('#order_datatable').DataTable().ajax.reload();
                            
                        });

            });
        </script>