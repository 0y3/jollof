                   
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">-->
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

                    
                
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <a href="<?= site_url('super_admin/addcategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add New Category" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Menu Category
                                </a>

                            </div>

                            <h2><strong>All Cuisine</strong> Category </h2>

                        </div>


                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" >Category Name</th>
                                    
                                    <!--<th class="visible-lg">Category Order</th>-->

                                    <th class="hidden-xs">Status</th>

                                    <th class="text-center">Action</th>

                                </tr>

                            </thead>
                            
                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- NEW Category Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Category view" aria-hidden="true" >
                        
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
                    
                    
                     <!-- category Name div-->
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

<script >
    $('.nav_cu').addClass('active');
    
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
        var container = $(this).attr('data-target');

        /* XHR 
        $.get(url).done(function(data) {
            $(container).html(data).modal();
        }).success(function() { $('input:text:visible:first').focus(); });
        */
       
       $.post(url,function(data){
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
                url:"<?= site_url('super_admin/get_cuisine_cate'); ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[
                         2
                     ],  
                     "orderable":false,  
                } 
           ]  
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
            
            var statusID = $(this).val();
            var cat_id_ = $('[name="cat_edidid"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('super_admin/cat_statusupdate') ?>',
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
                        content: 'Success! Category status Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      $('.statusdiv_'+cat_id_).html(html);
                        
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
            
            var new_order = $('[name="new_cat_order"]').val();
            var cat_id_   = $('[name="new_cat_order"]').data('cat_id'); // gets value
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('super_admin/cat_orderupdate') ?>',
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
                            content: 'Success! Category Updated',
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

<script>
    // Edit Categoty name 
    $("#order_datatable").on("click",".editname", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Name = $(this).data('cat_name');
        
        $('[name="new_cat_name"]').val(cat_Name);
        $('[name="new_cat_name"]').data('cat_id',cat_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#cat_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#cat_name').hide();
    });
    
    
    // on name change 
    $('#cat_name_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_cat_name"]').val();
            var cat_id   = $('[name="new_cat_name"]').data('cat_id'); // gets value
            
            var check_word = "main menu";
            
            //checker
            if( new_name.toLocaleLowerCase().indexOf(check_word)!= -1)
                {
                    alert("Name not allowed");
                    $('#cat_name').hide();
                }
            else
                {
                
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('super_admin/cat_nameupdate') ?>',
                    dataType: 'json',
                    data: {
                            cat_id: cat_id,
                            name: new_name
                            }
                }).done(function (data) {
                    
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
                        content: 'Success! Category name '+ new_name +' Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#cat_name').hide();
                    $('.cat_namediv_'+cat_id).html(data);
                });
            
            }
    });
 
</script> 