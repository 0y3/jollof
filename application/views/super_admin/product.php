                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

                    
                
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>

                            </div>

                            <h2><strong>All</strong> Products </h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" >Date</th>

                                    <th class="text-center">Image</th>
                                    
                                    <th class="visible-lg">Name</th>

                                    <th class="hidden-xs">Description</th>

                                    <th class="hidden-xs">Category</th>
                                    
                                    <th class="hidden-xs">Price</th>

                                    <th>Status</th>

                                    <th class="text-center">Action</th>

                                </tr>

                            </thead>
                            
                        </table>

                        <!--end Table here-->

                    </div>

                    <!--Quick Product Modal -->              
                    <div class="modal fade" id="modal_prd" tabindex="-1" role="dialog" aria-labelledby="Product view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                                            
                                           
<div id="prd_status">
    <input type="hidden" name="prd_edidid" value="">
    <select class="selectstatus" name="newStatus">
        <option></option>
        <option value="0"> &nbsp; Inactive </option>
        <option value="1"> &nbsp; Active </option> 
    </select>
    <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
</div>


<script >
    $('.c_tray').addClass('active');
    $('.nav_m').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip(); 
    
</script>

<script >
    //$('#order_datatable').dataTable(); 
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('restaurant-admin/get_product'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[
                         1, //target the img row
                         3, //target the desc row
                         //6, //target the status row
                         7  //target the action row
                     ],  
                     "orderable":false,  
                } 
           ]  
      }); 
      
</script>

<script>
    $("#order_datatable").on("click","[data-toggle='modal']", function(e){
    //$("[data-toggle='modal']").click(function(e) {
        /* Prevent Default*/
        e.preventDefault();

        /* Parameters */
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
        
        var prd_Id = $(this).data('product_id');

        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
        $.post(
                url,
                {
                    id:prd_Id
                },
                function(data){
                     $(container).html(data).modal();
                }
            );

    });    
</script> 
<script>
    // Edit Status
    $("#order_datatable").on("click",".editstatus", function(e){
        e.preventDefault();
        
        var prd_Id = $(this).data('product_id');
        $('[name="prd_edidid"]').val(prd_Id);
        var position = $(this).offset(); //position();
        $('#prd_status').css({top: position.top, left: position.left, display: 'block'});
    });
    
    // close the status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('#prd_status').hide();
    });
    
    
    // on status change 
    $('.selectstatus').on('change',function(){
            
            var statusID = $(this).val();
            var prd_id_ = $('[name="prd_edidid"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/statusupdate') ?>',
                    dataType: 'json',
                    data:{
                            status:statusID,
                            prd_id:prd_id_
                        },
                    success:function(html){
                       // $('#prd_status').hide();
                        $('.statusdiv_'+prd_id_).html(html);
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
                            content: 'Success! Status Updated',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        }); 
                        
                    }
                }); 
            }
            $('#prd_status').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; Inactive </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
        });

    $('.savePositionCategorie').click(function () {
        var new_val = $('[name="new_position"]').val();
        var editId = $('[name="positionEditId"]').val();
        $.ajax({
            type: "POST",
            url: urls.editPositionCategorie,
            dataType: 'json',
            data: {editid: editId, new_pos: new_val}
        }).done(function (data) {
            $('#positionEditor').hide();
            $('#position-' + editPositionField).text(new_val);
        });
    });
 
</script> 