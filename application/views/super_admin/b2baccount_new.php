<style>

</style>
<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div id="WaitMe_acc" class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>New Account For Merchant "<?= $business_name?>"</b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="acc_form" action="<?= site_url('PaystackSubaccount/New_Subaccount') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <input type="hidden" id="" name="rest_name" class="form-control"  value="<?= $business_name?>">
                                    <input type="hidden" id="" name="rest_id" class="form-control" required="" value="<?= $business_id?>">
                                    <input type="hidden" id="" name="rest_num" class="form-control"  value="<?= $business_num?>">
                                    <input type="hidden" id="" name="rest_email" class="form-control" value="<?= $business_email?>">
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Bank Name<br>(For payouts)</label>

                                        <div class="col-md-7">

                                            <select id="" name="bank_name" class="form-control selectpicker" data-live-search="true" show-tick  data-size="8" title="Choose Bank" data-width="90%" required="">
                                                    <?php if(!empty($bank)): ?>

                                                        <?php foreach ($bank as $bank_list) :?>
                                                            <option value="<?= $bank_list->name ?>"><?= $bank_list->name ?></option>

                                                        <?php endforeach;?>
                                                    <?php else: ?>

                                                        <option value="">Bank not available</option>

                                                    <?php endif; ?>
                                            </select>
                                            
                                            
                                        </div>

                                    </div>


                                   
                                    <div class="form-group">

                                        <label class="col-md-3 control-label">Account No</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name" name="acc_num" class="form-control" placeholder="Account Number" required="">

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label">Account Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name" name="acc_name" class="form-control" placeholder="Account Name" required="">

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Transaction Split</label>
                                       
                                        <div class="col-md-7">
                                            Your Share of Payment (%)
                                            <input type="number" id="" name="percentage" class="form-control" placeholder="Less than 100" required="">

                                        </div>

                                    </div>

                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            	<div class="text-right pull-right ">view all <strong style="color:#D80000;">Bank Payment </strong> list </div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 
<script>  
    jQuery(document).ready(function($) {
        function run_waitMe(el, num, effect){
		text = 'Please wait...';
		fontSize = '';
		switch (num) {
			case 1:
			maxSize = '';
			textPos = 'vertical';
			break;
			case 2:
			text = '';
			maxSize = 30;
			textPos = 'vertical';
			break;
			case 3:
			maxSize = 30;
			textPos = 'horizontal';
			fontSize = '18px';
			break;
		}
		el.waitMe({
			effect: effect,
			text: text,
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: maxSize,
			waitTime: -1,
			source: 'img.svg',
			textPos: textPos,
			fontSize: fontSize,
			onClose: function(el) {}
		});
            } 
    

            $('#modal_login').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
            $('.selectpicker').selectpicker({
                //style: 'btn-info'
              });

            
            $("#acc_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                run_waitMe($('#modal_account'), 1, 'orbit');
                
                //var name = $('[name="save_name"]').val();
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                var dataTable = $('#order_datatable').DataTable();
                                var b2b_id_   = "<?= $business_id?>"; // gets value

                                    $.ajax({
                                        type:'POST',
                                        url:'<?= site_url('super_admin/update_b2bregistration_flow') ?>',
                                        dataType: 'json',
                                        data:{
                                                status:'1',
                                                b2b_id:b2b_id_
                                            },
                                        success:function(html){

                                            if(html.status == '1')
                                            {
                                                
                                                $('#modal_account').modal('hide');
                                                notice();
                                                dataTable.ajax.reload();
                                                $('.rest_nav_tray').load("<?= site_url('super_admin/rest_nav_tray') ?>");
                                            }
                                            else{ noticefales(); }
                                            
                                        }

                                    });

                                
                                
                                   
                                    
                                    
                        
                                
                            }
                            else if(data.status === '0' )
                            {
                                alert('error '); 
                                
                            } 
                            $('#modal_account').waitMe('hide');
                            
                        });

            });
            
    });
</script>