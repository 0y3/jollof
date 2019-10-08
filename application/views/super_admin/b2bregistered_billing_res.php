                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>      
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>

                            </div>

                            <h2><strong>Orders </strong> From Restaurant</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center">OrderID</th>
                                    
                                    <th class="text-center" style="padding-left:0px;"> Restaurant </th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Menus</th>

                                    <th class="">Payment</th>
                                    
                                    <th class="text-center" >Qty</th>

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
    //$('.o_tray').addClass('active');
    $('.nav_b').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >
    load_data();
    function load_data()
    {
      var getfrom_id ="<?= $getfrom_id ?>";
      var start_date ="<?= $start_date ?>";
      var end_date ="<?= $end_date ?>";
      
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/b2bregistration_billing_rest'); ?>",
                type:"POST",
                data:{getfrom_id:getfrom_id,start_date:start_date, end_date:end_date}
           },  
           "columnDefs":[  
                {  
                     "targets":[2,8],  
                     "orderable":false 
                },  
           ],  
      });  
    }
    
   //  the status view button
    $("#order_datatable").on("click",".ord_view", function(e){
        e.preventDefault();
        
        var ord_id_   = $(this).data('get'); // gets value
        var url = '<?= site_url('admin/order_products/') ?>'+ord_id_;
        window.location.href= url;
            
    });
</script>


