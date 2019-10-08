<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-dialog-centered">
                    
                        <div class="modal-content ">
                    
                            
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Cancel Order Form</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <form id="ordercancel_form" action="<?= site_url('cuisineadmin/orders/update_orderflow') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-12 controllabel" for="save_name">Order ID</label>

                                        <div class="col-md-12">

                                            <input type="text" id="save_name"  name="save_name" class="form-control" placeholder="Enter name.." value="<?= $data_orderid?>" readonly="">
                                            <input type="hidden" name="_id" value="<?= $data_id?>">
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-12 controllabel" for="save_note">Cancellation Order note </label>

                                        <div class="col-md-12">

                                            <textarea id="product-short-description" name="save_note" class="form-control" rows="3" required=""></textarea>

                                        </div>

                                    </div>


                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-floppy-o"></i> &nbsp; Submit &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                                
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

<script>
    $("#ordercancel_form").submit(function (e){
                
        e.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');

        var ord_id_   =  $('[name="_id"]').val(); ; // gets value
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
                window.location.reload();
            }
            else if(data.status === '0' )
            {
                window.location.reload();
            } 
        });
    });
       
</script>