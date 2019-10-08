                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        

    
                <div class="ord_nav_tray">
                    <?php  
                       $this->load->view('Super_admin/b2corder_nav'); // order tray
                    ?>
                </div>
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>

                            </div>

                            <h2><strong>All B2C's </strong> Processing Orders</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date / OrderID</th>
                                    
                                    <th class="text-center">Customer</th>
                                    
                                    <th class="">Biz.Name </th>
                                    
                                    <th class="">Biz.Type </th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Menus</th>

                                    <th class="">Location</th>

                                    <th class="" > Value</th>

                                    <th >Status</th>
                                    
                                    <th class="text-center">Action</th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

<script >
    //$('.o_tray').addClass('active');
    $('.nav_b2c').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >
    load_data()
    function load_data(restid)
    {
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/b2corder/2'); ?>",
                type:"POST",
                data:{rest_id:restid}
           },  
           "columnDefs":[  
                {  
                     "targets":[6,8],  
                     "orderable":false 
                },  
           ],  
      });  
    }
    
    $(document).on('change', '#rest_category', function(){
        var rest_id = $(this).val();
        $('#order_datatable').DataTable().destroy();
        if(rest_id != '')
        {
         load_data(rest_id);
        }
        else
        {
         load_data();
        }
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
                content: 'Error! Updating Order',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
    }

    //  the status process button
    $("#order_datatable").on("click",".ord_pro", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2corder_flow') ?>',
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
                        $('.ord_nav_tray').load("<?= site_url('super_admin/b2corder_nav_tray') ?>");
                    }
                    else{ noticefales(); }
                }

            });
    });
    
    //  the status view button
    $("#order_datatable").on("click",".ord_view", function(e){
        e.preventDefault();
        
        var ord_id_   = $(this).data('get'); // gets value
        var url = '<?= site_url('admin/order_products/') ?>'+ord_id_;
        window.location.href= url;
            
    });
    
    //  the status Delivery button
    $("#order_datatable").on("click",".ord_del", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2corder_flow') ?>',
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
                        $('.ord_nav_tray').load("<?= site_url('super_admin/b2corder_nav_tray') ?>");
                    }
                    else{noticefales();}
                    
                }

            });
    });
    
    //  the status Canceled button
    $("#order_datatable").on("click",".ord_can", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2corder_flow') ?>',
                dataType: 'json',
                data:{
                        order:'can',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();
                        dataTable.ajax.reload();
                        $('.ord_nav_tray').load("<?= site_url('super_admin/b2corder_nav_tray') ?>");
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
