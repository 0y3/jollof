                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    .ajax-loader {
        visibility: hidden;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        z-index: 99999 !important;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    .loader .is-active{
        background-color: rgba(255,255,255,0.7) !important;
    }
    .loader img {
        position: relative;
        top:50%;
        left:50%;
    }
</style>        


    
                    

                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>Users</strong> Display Review</h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= site_url('restaurant_admin/loaduser') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add New Slider " style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add New User
                                </a>

                            </div>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">
                            
                            
                            <thead>

                                <tr>
                                    <th class="text-center" style="min-width: 5px;">S/N</th>
                                    
                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center">Firstname</th>
                                     
                                    <th class="text-center">Lastname</th>
                                    
                                    <th class="text-center">Email</th>
                                    
                                    <th class="text-center">Phone</th>
                                    
                                    <th class="text-center">User Role</th>
                                    
                                    <th class="text-center">Status</th>
                                    
                                    <th class="text-center">Action</th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- NEW Banner Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW User view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- Modal confirm delete submenu Product -->
                    <div class="modal fade" id="modal_conf" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
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

                    <div id="cat_status">
                        <input type="hidden" name="cat_edidid" value="">
                        <select class="selectstatus" name="newStatus">
                            <option></option>
                            <option value="0"> &nbsp; Inactive </option>
                            <option value="1"> &nbsp; Active </option> 
                        </select>
                        <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    
                    <!--  Order div-->
                    <div id="cat_order">
                        <input type="number" data-cat_id="" name="new_cat_order" class="form-control cu_phone_js" min="1" value="" >
                        <a  id="cat_order_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closeorder" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!--  Name div-->
                    <div id="cat_name">
                        <input type="text" data-cat_id="" name="new_cat_name" class="form-control" value="" >
                        <a  id="cat_name_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closename" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
    <div class="ajax-loader">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
<script >
    //$('.o_tray').addClass('active');
    $('.nav_a').addClass('active');
    $(".ord_t_a").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_a ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
    $(".block").on("click","[data-toggle='modal']", function(e){
        
        e.preventDefault();
        
        var url = $(this).attr('href');
        var container = $(this).attr('data-target');
        
       $.post(url,{ _id:1},function(data){
                    $(container).html(data).modal();
                }
            );
    });
    
</script>

<script >

      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('restaurant_admin/user_table'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[3],  
                     "orderable":false 
                },  
           ],  
      });  
    
    
</script>

<script>
    
    // on delete Slider  
    $(document).on("click",".user_del", function(e){
       e.preventDefault();
       
       var msgg = 'Are you sure you want to Delete this User ? -- '+ $(this).data('name');
       var s_Id = $(this).data('id');
       var s_name = $(this).data('name');
       
       confirmDialog_cart(msgg, function(){
            $.ajax({
                    type: "POST",
                    url: '<?= site_url('restaurant_admin/deleteuser') ?>',
                    dataType: 'json',
                    data: {
                            _id: s_Id,
                            _name: s_name
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
                                content: 'Success! User Deleted',
                                delayOnHover: true,
                                showCountdown: true,
                                closeButton: true
                            });
                        }
                        
                    
                    });
                
                $('#modal_conf').modal('hide');
                $('#order_datatable').DataTable().ajax.reload();
                //$('.b2bpromo_nav_tray').load("<?= site_url('restaurant_admin/promobanner_nav_tray') ?>");
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
        
        var cat_Id = $(this).data('cat_id');
        $('[name="cat_edidid"]').val(cat_Id);
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        $('#cat_status').css({top: newtop, left: position.left, display: 'block'});
    });
    
    // close the status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('[name="cat_edidid"]').val('');
        $('#cat_status').hide();
    });


    
    // on status change 
    $('.selectstatus').on('change',function(){
        
            var dataTable = $('#order_datatable').DataTable();
            var statusID = $(this).val();
            var cat_id_ = $('[name="cat_edidid"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/update_user_status') ?>',
                    dataType: 'json',
                    data:{
                            status:statusID,
                            cat_id:cat_id_
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
                        content: 'Success! slider status Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      
                      
                      dataTable.ajax.reload();
                    }
                }); 
            }
            $('#cat_status').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; Inactive </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
        });

    
 
</script> 

<script>
    // Edit Categoty Order 
    $("#order_datatable").on("click",".editorder", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Order = $(this).data('cat_order');
        
        $('[name="new_cat_order"]').val(cat_Order);
        $('[name="new_cat_order"]').data('cat_id',cat_Id); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#cat_order').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the status option button
    $('#closeorder').click(function (e) {
        e.preventDefault();
        $('#cat_order').hide();
    });
    
    
    // on category order change 
    $('#cat_order_save').click(function (e) {
            e.preventDefault();
            
            var dataTable = $('#order_datatable').DataTable();
            var new_order = $('[name="new_cat_order"]').val();
            var cat_id_   = $('[name="new_cat_order"]').data('cat_id'); // gets value
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/update_promobanner_cate') ?>',
                    dataType: 'json',
                    data:{
                            order:new_order,
                            cat_id:cat_id_
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
                            content: 'Success! Slider Order Updated',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        dataTable.ajax.reload();
                        //$('.b2bpromo_nav_tray').load("<?= site_url('restaurant_admin/promobanner_nav_tray') ?>");
                        
                        
                    } 
                    
                });
                
            $('#cat_order').hide();
        
    });
 
</script> 

<script> 

    $("#order_datatable").on("click",".send_email", function(e){
            e.preventDefault();
            
            var user_Id = $(this).data('user_id');
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/resendactivationemail/') ?>'+user_Id,
                    dataType: 'json',
                    data:{
                            id:user_Id
                        },
                    beforeSend: function(){
                       // Show image container
                       $('input[class=sbmtbtn]').prop("disabled", true);
                       $('.ajax-loader').css("visibility", "visible");
                       $(".modal-dialog").removeClass('modal_dialog_edit');
                   },
                   success:function(data){
                        
                    if(data.status === '1' ){
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
                            content: 'Success! Activation Email Sent',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        
                    }
                    else if(data.status === '0' )
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
                            color: 'red',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Error! Activation Email Not Sent',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                            } 

                               $('#order_datatable').DataTable().ajax.reload();
                            
                    },
                    complete:function(data){
                        // Hide image container
                        $('.ajax-loader').css("visibility", "hidden");
                    }
                        
                    
                });
                
            $('#cat_order').hide();
        
    });

</script> 

