                   
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        <div class="ord_nav_tray">
                    <?php $this->load->view('restaurant_admin/order_nav'); // order tray ?>
                        
                </div>
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>

                            </div>

                            <h2><strong>All Pending</strong> Order</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" >Date</th>
                                    
                                    <th class="text-center">View Order</th>

                                    <th class="">Accept</th>
                                    
                                    <th class="">Reject</th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>
                    
                    <!-- New Attributes Modal -->              
                    <div class="modal fade" id="modal_cancel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->

<script >
    $('.p_tray').addClass('active');
    $('.nav_o').addClass('active');
    
    //order_nav view
    $(".ord_t_p").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_p ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    $(function() {
        $('[data-tooltip="true"]').tooltip();
    });
    
</script>

<script >
    
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('restaurant_admin/get_order_by/1'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3],  
                     "orderable":false 
                },  
           ],  
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
                content: 'Success!  Order Updated',
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
                content: 'Error! You dont have Permission For this Process',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
    }

    //  the status process button
    $("#order_datatable").on("click",".ord_pro", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurant_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'pro',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status == '1')
                    {
                        notice();
                        dataTable.ajax.reload();
                        $('.conte').load("<?= site_url('restaurant_admin/view_pending_order') ?>");
                    }
                    else{ noticefales(); }
                }

            });
    });
    
    //  the status view button
    $("#order_datatable").on("click",".ord_view", function(e){
        e.preventDefault();
        
        var ord_id_   = $(this).data('get'); // gets value
        var url = '<?= site_url('restaurant-admin/order_products/') ?>'+ord_id_;
        window.location.href= url;
            
    });
    
    //  the status Delivery button
    $("#order_datatable").on("click",".ord_del", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurant_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'del',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status == "1")
                    {
                        notice();
                        dataTable.ajax.reload();
                        $('.ord_nav_tray').load("<?= site_url('restaurant_admin/order_nav_tray') ?>");
                    }
                    else{noticefales();}
                    
                }

            });
    });
    
    $(".block").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        
        var url = $(this).attr('href');
        var ord_id   = $(this).data('get'); // gets value
        var orderid   = $(this).data('orderid'); // gets value
        
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:ord_id,data_order:orderid},function(data){
                $(container).html(data).modal();
           }
       );
    });  
    
    //  the status Canceled button
    $("#order_datatable").on("click",".ord_cann", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurant_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'can',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();
                        dataTable.ajax.reload();
                        $('.conte').load("<?= site_url('restaurant_admin/view_pending_order') ?>");
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
