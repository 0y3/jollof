                   
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

                               

                            </div>

                            <h2><strong>Delivering Charges/Locations </strong> Page</h2>

                        </div>
                        
                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>
                                    
                                    <th class="text-center" style="padding-left:0px;">
                                        <select name="state_div" id="state_div" class="selectpicker" data-live-search="true" show-tick  data-size="8" title="State Search" data-width="90%">
                                            <option value="">State Search</option>
                                            <?php 
                                                foreach ($all_state as $row)
                                                {
                                                 echo '<option data-tokens="'.$row->statename.'" value="'.$row->id.'">'.$row->statename.'</option>';
                                                }
                                            ?>
                                        </select>

                                    
                                    </th>
                                    
                                    <th class="text-center" style="padding-left:0px;">
                                        <select name="city_div" id="city_div" class="selectpicker" data-live-search="true" show-tick  data-size="8" title="City Search" data-width="90%">
                                            <option value="">City Search</option>
                                            <?php 
                                                foreach ($all_city as $row)
                                                {
                                                 echo '<option data-tokens="'.$row->cityname.'" value="'.$row->id.'">'.$row->cityname.'</option>';
                                                }
                                            ?>
                                        </select>

                                    
                                    </th>
                                    <th>
                                        Charges
                                    </th>
                                    <th>
                                        Free Delivery Status
                                    </th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- NEW location Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Category view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- edit location Modal -->              
                    <div class="modal fade" id="modal_editstate" tabindex="-1" role="dialog" aria-labelledby="edit location" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- Delivering Charges div-->
                    <div id="charge_name">
                        <input type="text" data-charge_id="" data-city_id="" name="new_charge_name" class="form-control cu_phone_js" value="" >
                        <a  id="charge_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closename" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!-- Delivering Charges Status -->
                    <div id="cat_status">
                        <input type="hidden" name="cat_editid" value="">
                        <select class="selectstatus" name="newStatus">
                            <option></option>
                            <option value="0"> &nbsp; Inactive </option>
                            <option value="1"> &nbsp; Active </option> 
                        </select>
                        <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
<script >
    //$('.o_tray').addClass('active');
    $('.nav_b').addClass('active');
    
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
        
        e.preventDefault();
        var url = $(this).attr('href');
        var cat_Id = $(this).data('cat_id');
        var cat_Name = $(this).data('cat_name');
        var cat_Type = $(this).data('cat_type');
       
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:cat_Id, data_name:cat_Name, data_type:cat_Type },function(data){
                     $(container).html(data).modal();
                }
            );
    });    
    
    var url_ ="<?= site_url('super_admin/delivering_locations'); ?>";
    load_data();
    function load_data(state_id,city_id)
    {
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:url_,
                type:"POST",
                data:{state_id:state_id,city_id:city_id}
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3],  
                     "orderable":false 
                } 
           ],  
      });  
    }
    
    $(document).on('change', '#state_div', function(){
        var state_id = $(this).val();
        var city_id = null;
        
        $('#order_datatable').DataTable().destroy();
        if(state_id != '')
        {
         load_data(state_id,city_id);
        }
        else
        {
         load_data();
        }
    });
    

     $(document).on('change', '#city_div', function(){
        var city_id = $(this).val();
        var state_id = null;
        
        $('#order_datatable').DataTable().destroy();
        if(city_id != '')
        {
         load_data(state_id,city_id);
        }
        else
        {
         load_data();
        }
    });

</script>

<script>
    // Edit Delivery price 
    $("#order_datatable").on("click",".editdelivering", function(e){
        e.preventDefault();
        
        var chrg_Id = $(this).data('charge_id');
        var city_Id = $(this).data('city_id');
        var chrg_Name = $(this).data('charge_name');
        
        $('[name="new_charge_name"]').val(chrg_Name);
        $('[name="new_charge_name"]').data('charge_id',chrg_Id); // sets value
        $('[name="new_charge_name"]').data('city_id',city_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#charge_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#charge_name').hide();
    });
    
    
    // on Delivery price change 
    $('#charge_save').click(function (e) {
            e.preventDefault();
            
            var new_charge = $('[name="new_charge_name"]').val();
            var chrg_id   = $('[name="new_charge_name"]').data('charge_id'); // gets value
            var city_id   = $('[name="new_charge_name"]').data('city_id'); // gets value
            
            
                
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('super_admin/save_delivering_locations') ?>',
                    dataType: 'json',
                    data: {
                            delivering_id: chrg_id,
                            city_id: city_id,
                            charge: new_charge
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
                        content: 'Success! delivering locations fee Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#charge_name').hide();
                    $('.ch_namediv_'+chrg_id).html(data);
                });
        $('#order_datatable').DataTable().ajax.reload(); 
         
    });
 
</script> 

<script>
    // Edit Delivery price Status
    $("#order_datatable").on("click",".editstatus", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('charge_id');
        $('[name="cat_editid"]').val(cat_Id);
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        $('#cat_status').css({top: newtop, left: position.left, display: 'block'});
    });
    
    // close the Delivery price status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('[name="cat_edidid"]').val('');
        $('#cat_status').hide();
    });


    
    // on Delivery price status change 
    $('.selectstatus').on('change',function(){
            
            var statusID = $(this).val();
            var chrg_id_ = $('[name="cat_editid"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('super_admin/delivering_locations_statusupdate') ?>',
                    dataType: 'json',
                    data:{
                            status:statusID,
                            chrg_id:chrg_id_
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
                        content: 'Success! Delivery locations Fee status Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      $('.statusdiv_'+chrg_id_).html(html);
                        
                    }
                }); 
            }
            $('#cat_status').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; Inactive </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
            $('#order_datatable').DataTable().ajax.reload(); 
        });

    
 
</script> 