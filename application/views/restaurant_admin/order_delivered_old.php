                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
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

                            <h2><strong>All</strong> Orders</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center">OrderID</th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Menus</th>

                                    <th class="">Description</th>
                                    
                                    <!--<th class="text-center">Location</th>-->

                                    <th class="">Payment</th>
                                    
                                    <th class="text-center ">Qty</th>

                                    <th class="" >Value</th>

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
    $('.o_tray').addClass('active');
    $('.nav_o').addClass('active');
    
    //order_nav view
    $(".ord_t_d").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_d2 ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >
    
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('restaurant_admin/get_order_by/4'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[8],  
                     "orderable":false,  
                },  
           ],  
      });    
    
</script>

<script>

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
    
</script>