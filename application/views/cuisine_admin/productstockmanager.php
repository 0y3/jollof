                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

                    
                
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <!--<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>-->

                            </div>

                            <h2><strong>Stock </strong> Manager </h2>
                            
                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" style="max-width:60px;">Image</th>
                                    
                                    <th class="visible-lg" style="max-width: 200px;">Name</th>

                                    <th class="hidden-xs">Inventory</th>
                                    
                                    <th class="hidden-xs">On Sales</th>
                                    
                                    <th class="hidden-xs">Price</th>
                                    
                                    <th class="hidden-xs">Stock</th>

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
                                            
                    <!-- NEW stock Modal -->              
                    <div class="modal fade" id="modal_stock" tabindex="-1" role="dialog" aria-labelledby=" view" aria-hidden="true" >
                        
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

<!-- price  div-->
<div id="prd_price">
    <input type="number" data-price_id="" data-type="" name="new_prd_price" class="form-control cu_phone_js" min="" value="" >
    <a  id="prd_price_save" class="btn btn-success saveEditprice">
        <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
        <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
    </a>
    <a href="" id="closeorder" class="btn btn-danger ">
        <i class="fa fa-times" aria-hidden="true"></i>
    </a>
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
                url:"<?= site_url('fashion_admin/get_product_stock'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[],  
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
        var prd_Img = $(this).data('img');
        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
        $.post(
                url,
                {
                    id:prd_Id,
                    img:prd_Img
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
                    url:'<?= site_url('fashion_admin/prd_salesupdate') ?>',
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

<script>
    // Edit Price  
    $("#order_datatable").on("click",".editprice", function(e){
        e.preventDefault();
        
        var price_Id = $(this).data('price_id');
        var price = $(this).data('price');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','price'); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // Edit Discount Price  
    $("#order_datatable").on("click",".editdisco", function(e){
        e.preventDefault();
        
        var price_Id = $(this).data('disco_id');
        var price = $(this).data('disco_price');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','discount'); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
    });
    
    
    // Edit Stock   
    $("#order_datatable").on("click",".editstock", function(e){
        e.preventDefault();
        
        var price_Id = $(this).data('stock_id');
        var price = $(this).data('stock');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','stock'); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the status option button
    $('#closeorder').click(function (e) {
        e.preventDefault();
        $('#prd_price').hide();
    });
    
    
    // on  price change 
    $('#prd_price_save').click(function (e) {
            e.preventDefault();
            var url='';
            var new_value = $('[name="new_prd_price"]').val();
            var _id_   = $('[name="new_prd_price"]').data('price_id'); // gets value
            var type_     = $('[name="new_prd_price"]').data('type'); // gets type
            
            if(type_=='price')
            {
                url='<?= site_url('fashion_admin/prd_priceupdate') ?>';
            }
            else if(type_=='discount')
            {
                url='<?= site_url('fashion_admin/prd_dispriceupdate') ?>';
            }
            else if(type_=='stock')
            {
                url='<?= site_url('fashion_admin/prd_stockupdate') ?>';
            }
            else{
                url='';
            }
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('fashion_admin/pricestock_update') ?>',
                    dataType: 'json',
                    data:{
                            value:new_value,
                            _id:_id_,
                            _type:type_
                        },
                    success:function(html){
                        
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
                            content: 'Success!  Update',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        dataTable.ajax.reload();
                        //$('.cat_orderdiv_'+cat_id_).html(html);
                        
                    } 
                    
                });
                
            $('#prd_price').hide();
        
    });
 
</script> 
