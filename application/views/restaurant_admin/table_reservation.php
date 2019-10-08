                   
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

                                <!--<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a> -->

                            </div>

                            <h2><strong>All Table </strong> Reservation</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Booking ID</th>
                                    
                                    <th class="text-center" style="min-width: 100px;">Name</th>

                                    <th class="" style="min-width: 80px;">Checkin</th>
                                    
                                    <th class="text-center">Phone</th>

                                    <th class="" >Email</th>

                                    <th class="">Note</th>
                                    
                                    <th class=" ">Guest</th>

                                    <th >Status</th>
                                    
                                    <!--<th class="text-center">Action</th>-->
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

<script >
    //$('.o_tray').addClass('active');
    $('.nav_t').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >
    
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('restaurant_admin/get_table_reservation'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[3,6],  
                     "orderable":false,  
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
                content: 'Success!  Table Reservation Updated',
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

    //  the status Approved button
    $("#order_datatable").on("click",".table_app", function(e){
        e.preventDefault();
        
        
        var table_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurant_admin/update_table_flow') ?>',
                dataType: 'json',
                data:{
                        table:'app',
                        table_id:table_id_
                    },
                success:function(html){
                
                    if(html.status == '1')
                    {
                        notice();
                        dataTable.ajax.reload();
                    }
                    else{ noticefales(); }
                }

            });
    });
    
    //  the status Canceled button
    $("#order_datatable").on("click",".table_can", function(e){
        e.preventDefault();
        
        
        var table_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('restaurant_admin/update_table_flow') ?>',
                dataType: 'json',
                data:{
                        table:'can',
                        table_id:table_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();
                        dataTable.ajax.reload();
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
