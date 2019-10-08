                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        
                
                <div class="ord_nav_tray">
                    <?php $this->load->view('super_admin/order_nav'); // order tray ?>
                        
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

                                    <th class="text-center" style="">Date/OrderID</th>
                                    
                                    <th class="text-center" style="padding-left:0px;">
                                        <select name="rest_category" id="rest_category" class="selectpicker" data-live-search="true" show-tick  data-size="8" title="Restaurants Search" data-width="90%">
                                            <option value="">Restaurants Search</option>
                                            <?php 
                                                foreach ($all_rest as $row)
                                                {
                                                 echo '<option data-tokens="'.$row->companyname.'" value="'.$row->restaurantid.'">'.$row->companyname.'</option>';
                                                }
                                            ?>
                                        </select>

                                    
                                    </th>
                                    
                                    <th class="text-center">Type</th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Menus</th>

                                    <!--<th class="">Description</th>
                                    
                                    <th class="text-center">Location</th>-->

                                    <th class="">Payment</th>
                                    
                                    <th class="text-center" >Qty</th>

                                    <th class="" >Value</th>

                                    <th >Status</th>
                                    
                                    <th class="text-center" style="min-width: 80px;">Action</th>

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
    $('.ord_h2_d ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >
    
    load_data();
    function load_data(restid)
    {
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/get_order_by/3'); ?>",
                type:"POST",
                data:{rest_id:restid}
           },  
           "columnDefs":[  
                {  
                     "targets":[1,8],  
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
    });  ;    
    
</script>


<script>

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
                url:'<?= site_url('super_admin/update_order_flow') ?>',
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
                        $('.ord_nav_tray').load("<?= site_url('super_admin/order_nav_tray') ?>");
                    }
                    else{noticefales();}
                    
                }

            });
    });
    
</script>


