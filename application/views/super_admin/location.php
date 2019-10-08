                   
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

                                <a href="<?= site_url('super_admin/new_location') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add New Category" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Location
                                </a>
                                
                                <a href="<?= site_url('super_admin/new_location_city') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add New Category" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add City
                                </a>

                            </div>

                            <h2><strong>Locations </strong> Page</h2>

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
                                    <th style="max-width:20%;" >
                                        State Status
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
                                    <th style="max-width:20%;">
                                        City Status
                                    </th>
                                    
                                </tr>

                            </thead>

                            <tbody>
                                
                                
                            </tbody>

                        </table>

                        <!--end Table here-->

                    </div>

                    <!-- Delivering Charges Status -->
                    <div id="cat_status">
                        <input type="hidden" name="cat_editid" value="">
                        <input type="hidden" name="cat_edittype" value="">
                        <select class="selectstatus" name="newStatus">
                            <option></option>
                            <option value="0"> &nbsp; Inactive </option>
                            <option value="1"> &nbsp; Active </option> 
                        </select>
                        <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    
                    <!-- NEW location Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Category view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- edit location Modal -->              
                    <div class="modal fade" id="modal_editstate" tabindex="-1" role="dialog" aria-labelledby="edit location" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
<script >
    //$('.o_tray').addClass('active');
    $('.nav_g').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
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
    
    var url_ ="<?= site_url('super_admin/locations'); ?>";
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
                     "targets":[0,2,3],  
                     "orderable":false 
                },  
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
    // Edit  Status
    $("#order_datatable").on("click",".editstatus", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Type = $(this).data('cat_type');
        $('[name="cat_editid"]').val(cat_Id);
        $('[name="cat_edittype"]').val(cat_Type);
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        $('#cat_status').css({top: newtop, left: position.left, display: 'block'});
    });
    
    // close the  status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('[name="cat_edidid"]').val('');
        $('[name="cat_edittype"]').val('');
        $('#cat_status').hide();
    });


    
    // on  status change 
    $('.selectstatus').on('change',function(){
            
            var statusID = $(this).val();
            var chrg_id_ = $('[name="cat_editid"]').val();
            var chrg_type = $('[name="cat_edittype"]').val();
            var _url;
            if(chrg_type=='state')
            {
                _url='<?= site_url('super_admin/state_statusupdate') ?>';
            }
            else if(chrg_type=='city')
            {
                _url='<?= site_url('super_admin/city_statusupdate') ?>';
            }
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:_url,
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
                        content: 'Success!  status Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      if(chrg_type=='city')
                      {
                        $('.statusdivcity_'+chrg_id_).html(html);
                      }
                      else
                      {
                        $('.statusdiv_'+chrg_id_).html(html);
                      }
                        
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