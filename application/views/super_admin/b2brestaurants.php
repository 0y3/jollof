                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        

                    <div class="rest_nav_tray">
                    <?php $this->load->view('super_admin/restaurant_nav_tray'); // Restaurants tray ?>
                    </div>
                
                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>B2B All </strong> Registration Review</h2>

                        </div>
                        
                       
                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center">Logo</th>
                                    
                                    <th class="text-center">Requested By</th>
                                    
                                    <th class="text-center">Biz. Name</th>
                                    
                                     <th class="text-center">Biz. Type</th>
                                    
                                    <th class="text-center">Email</th>
                                    
                                    <th class="text-center" >Phone</th>
                                    
                                    <th class="text-center">Address</th>

                                    <th class="">Location</th>
                                    
                                    <th class="text-center">Status</th>
                                    
                                    <!--<th class="text-center">Action</th>-->
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- NEW Account Modal -->              
                    <div class="modal fade" id="modal_account" tabindex="-1" role="dialog" aria-labelledby="NEW Account view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->

<script >
    //$('.o_tray').addClass('active');
    $('.nav_b2b').addClass('active');
    
    
    //order_nav view
    $(".ord_t_a").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_a ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >

      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/b2bregistration/3'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[5,7,8],  
                     "orderable":false 
                },  
           ],  
      });  
    
    
</script>

<script>
    $(".block").on("click","[data-toggle='modal']", function(e){
    //$("[data-toggle='modal']").click(function(e) {
        /* Prevent Default*/
        e.preventDefault();

        /* Parameters */
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
        var rest_Id=$(this).attr('data-target_id');
        var rest_Name=$(this).attr('data-target_name');
        var rest_Num= $(this).attr('data-target_num');
        var rest_Email= $(this).attr('data-target_email');

        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
       $.post(url,{ data_id:rest_Id,data_name:rest_Name, data_num:rest_Num, data_email:rest_Email },function(data){
                     $(container).html(data).modal();
                }
            );
    });    
</script> 


<script>
    
    function notice() {
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
                color: 'green',
                autoClose: Math.random() * 8000 + 2000,
                content: 'Success!  Approve B2B Registration',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
        }
    function noticefales(){
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
                content: 'Error! Approve B2B Registration',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
    }

    //  the status process button
    $("#order_datatable").on("click",".b2b_acc", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var b2b_id_   = $(this).data('get'); // gets value
        
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
                        notice();
                        dataTable.ajax.reload();
                        $('.rest_nav_tray').load("<?= site_url('super_admin/rest_nav_tray') ?>");
                    }
                    else{ noticefales(); }
                }

            });
    });
    

    
    //  the status Canceled button
    $("#order_datatable").on("click",".b2b_can", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var b2b_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2bregistration_flow') ?>',
                dataType: 'json',
                data:{
                        status:'0',
                        b2b_id:b2b_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();
                        dataTable.ajax.reload();
                        $('.rest_nav_tray').load("<?= site_url('super_admin/rest_nav_tray') ?>");
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
