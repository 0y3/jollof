                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        

    
                    <div class="b2bpromo_nav_tray">
                    <?php $this->load->view('super_admin/b2bpromobanner_nav_tray'); //  tray ?>
                    </div>

                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>B2B Promo</strong> Banner Display Review</h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                     <th class="text-center">Restaurant </th>
                                     
                                    <th class="text-center">image</th>
                                    
                                    <th class="text-center">Display Section</th>
                                    
                                    <!--<th class="text-center">Desription</th> -->
                                    
                                    <th class="text-center">Start Date</th>
                                    
                                    <th class="text-center" >End Date</th>
                                    
                                    <th class="text-center">Status</th>
                                    
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
    $('.nav_ads').addClass('active');
    $(".ord_t_p").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_p ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script >

      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/b2bpromobanner/0'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[2,4,6,7],  
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
                content: 'Success!  B2B Prommo Banner Approve',
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
                content: 'Error! B2B Prommo Banner',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
    }

    //  the status process button
    $("#order_datatable").on("click",".b2b_p_acc", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var b2b_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2bpromobanner_flow') ?>',
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
                        $('.b2bpromo_nav_tray').load("<?= site_url('super_admin/b2bpromobanner_nav_tray') ?>");
                    }
                    else{ noticefales(); }
                }

            });
    });
    

    
    //  the status Canceled button
    $("#order_datatable").on("click",".b2b_p_can", function(e){
        e.preventDefault();
        
        var dataTable = $('#order_datatable').DataTable();
        var b2b_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_b2bpromobanner_flow') ?>',
                dataType: 'json',
                data:{
                        status:'0',
                        b2b_id:b2b_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();
                        dataTable.ajax.reload();
                        $('.b2bpromo_nav_tray').load("<?= site_url('super_admin/b2bpromobanner_nav_tray') ?>");
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
