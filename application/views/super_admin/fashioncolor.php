                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    .colorbox{
        width: 30px;
        height: 30px;
    }                  
 </style>               
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="<?= site_url('super_admin/addcolor') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_color" data-container="modal_color" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Color
                                </a>

                            </div>

                            <h2><strong>All</strong> Colors </h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" >Color Name</th>
                                    
                                    <th class="visible-lg">Colors Code</th>

                                    <th class="hidden-xs">Color</th>

                                    <th class="text-center">Action</th>

                                </tr>

                            </thead>
                            
                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- NEW Color Modal -->              
                    <div class="modal fade" id="modal_color" tabindex="-1" role="dialog" aria-labelledby="NEW Color view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                                            
                    <!-- Modal confirm delete Color  -->
                    <div class="modal" id="empty_confirmModal">
                        <div class="modal-dialog">
                                <div class="modal-content">

                                        <div class="modal-body" >
                                            <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                            <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                                        </div>

                                </div>
                        </div>
                    </div>
                        
<script >
    $('.nav_f').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
    // for number only input
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
    });
   
    
</script>

<script>
    $(".block").on("click","[data-toggle='modal']", function(e){
    //$("[data-toggle='modal']").click(function(e) {
        /* Prevent Default*/
        e.preventDefault();

        /* Parameters */
        var url = $(this).attr('href');
        var data_id   = $(this).data('color_id');
        var data_name = $(this).data('color_name');
        var data_code = $(this).data('color_code');
        var container = $(this).attr('data-target');

        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
       $.post(url,{ color_id:data_id,color_name:data_name,color_code:data_code },function(data){
                     $(container).html(data).modal();
                }
            );
    }); 
    
</script>

<script >
    //$('#order_datatable').dataTable(); 
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/get_color'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[
                         2,3
                     ],  
                     "orderable":false 
                } 
           ]  
      }); 
      
</script>

<script>
    // Edit Color name 
    $("#order_datatable").on("click",".color_del", function(e){
        e.preventDefault();
        var row_id = $(this).data("color_id");
        var empty_msg = "Are you sure you want to remove this Color name ?.." + $(this).data("color_name");
        //e.stopImmediatePropagation();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:"<?= site_url('super_admin/delete_fashioncolor') ?>",
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                    data:{id_:row_id},
                    success:function(data)
                    {
                        //alert("Product removed from Cart");
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'red',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Removed! Size Removed',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        }); 
                        
                        $('#order_datatable').DataTable().ajax.reload();
                    }
                });
            });
    });
        
        
    function confirmDialog(message, onConfirm){
        var fClose = function(){
                    modal.modal("hide");
        };
        var modal = $("#empty_confirmModal");
        modal.modal("show");
        $("#empty_confirmMessage").empty().append(message);
        $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
        $("#empty_confirmCancel").unbind().one("click", fClose);
    }
 
</script> 