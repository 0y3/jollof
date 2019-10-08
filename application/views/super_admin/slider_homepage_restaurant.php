                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
</style>        

    
                    <div class="rest_nav_tray">
                    <?php $this->load->view('super_admin/slider_nav_tray'); // Restaurants tray ?>
                    </div>
                    
                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>Homepage Banner</strong> Sliders Management</h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= site_url('restaurant_admin/addcategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add New Slider " style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Slider
                                </a>

                            </div>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead style=" width:100%; ">

                                <tr>
                                  
                                    <th class="text-center">Banner Order</th>
                                    
                                    <th class="text-center">Image</th>
                                    
                                    <th class="text-center" style="min-width: 80px;">Date</th>
                                    
                                    <th class="text-center" >Usertype</th>
                                    
                                     <th class="text-center">UserName </th>
                                    
                                    <th class="" style="width: 30px !important;" >Redirect Url</th>
                                    
                                    <th class="text-center">Status</th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>


                   <!-- NEW Banner Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Banner view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->

                   <div id="cat_status">
                        <input type="hidden" name="cat_edidid" value="">
                        <select class="selectstatus" name="newStatus">
                            <option></option>
                            <option value="0"> &nbsp; Inactive </option>
                            <option value="1"> &nbsp; Active </option> 
                        </select>
                        <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    
                    
                    <!-- category Order div-->
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
<script >
    //$('.o_tray').addClass('active');
    //$('.nav_o').addClass('active');
    $(".ord_t_a").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_a ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
    // for number only input
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
    });
    
</script>

<script >

      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?= site_url('super_admin/slider_home/3'); ?>",
                type:"POST"
           },  
           "columnDefs":[  
                {  
                     "targets":[1,5,6],  
                     "orderable":false 
                },  
           ],  
      });  
    
    
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
                    url:'<?= site_url('super_admin/update_slider_status') ?>',
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
                        content: 'Success! Banner status Updated',
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
                    url:'<?= site_url('super_admin/update_slider_cate') ?>',
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
                            content: 'Success! Banner Order Updated',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        dataTable.ajax.reload();
                        //$('.cat_orderdiv_'+cat_id_).html(html);
                        
                    } 
                    
                });
                
            $('#cat_order').hide();
        
    });
 
</script> 


