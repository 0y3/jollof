                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

                    
                
                    <div class="block full">

                        
                        
                        <div>
                        			<div class="d-flex no-block align-items-center">
                                        <h6 class="card-title">Products List</h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info" data-toggle="dropdown" 
                                                	aria-haspopup="true" aria-expanded="false" onclick="window.location='<?=site_url("fashionadmin/products/newproduct")?>'">
                                                    Create New
                                                </button>
                                               
                                            </div>
                                        </div>
                                    </div>
						</div>
						
						<p></p>
		

                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="width: 90px;">Date</th>

                                    <th class="text-center" style="max-width:60px;">Image</th>
                                    
                                    <th class="visible-lg" style="max-width: 200px;">Name</th>

                                    <th class="hidden-xs">Categories</th>
                                    
                                    <th class="hidden-xs">Qty</th>
                                    
                                    <th class="hidden-xs">Price</th>

                                    <th >Status</th>

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
                    
                    
                    
                    <!-- Modal confirm delete submenu Product -->
                    <div class="modal fade" id="modal_conf" tabindex="-1" role="dialog" aria-labelledby="Product view" aria-hidden="true" >
                        <div class="modal-dialog">
                                    <div class="modal-content">

                                            <div class="modal-body" >
                                                <div class="alert alert-danger" id="confirmMessage"> </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" id="confirmOk">Ok</button>
                                                <button type="button" class="btn btn-success" id="confirmCancel">Cancel</button>
                                            </div>

                                    </div>
                            </div>
                    </div>
                                            
                                           
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
                url:"<?= site_url('fashion_admin/get_product'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[
                         1, //target the img row
                         4, //target the desc row
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
    
    // on delete submenu  
    $(document).on("click",".prd_del", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to remove this Product ? -- '+ $(this).data('product_name');
       var p_Id = $(this).data('product_id');
       
       confirmDialog_cart(msgg, function(){
            $.ajax({
                    type: "POST",
                    url: '<?= site_url('fashion_admin/') ?>',
                    dataType: 'json',
                    data: {
                            p_id: p_Id
                          }
                }).done(function (data) {
                    if (data.status === '1')
                        {
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
                                content: 'Success! SubMenu Deleted',
                                delayOnHover: true,
                                showCountdown: true,
                                closeButton: true
                            });
                        }
                    
                    });
                
                $('#modal_prd').modal('hide');
                $('#order_datatable').DataTable().ajax.reload();
        });
                
    });
    function confirmDialog_cart(message, onConfirm){
    	    var fClose = function(){
    			modal.modal("hide");
    	    };
    	    var modal = $("#modal_conf");
    	    modal.modal("show");
    	    $("#confirmMessage").empty().append(message);
    	    $("#confirmOk").one('click', onConfirm);
    	    $("#confirmOk").one('click', fClose);
    	    $("#confirmCancel").one("click", fClose);
        }
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
                    url:'<?= site_url('fashion_admin/statusupdate') ?>',
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
 
// pupup on add product to cart
$(".ajaxbook_form").fancybox({
        maxWidth	: 480,
        maxHeight	: 480,
        autoHeight      : true,
        fitToView	: false,
        width		: '70%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
});
</script> 