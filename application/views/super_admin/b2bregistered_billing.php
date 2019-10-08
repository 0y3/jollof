                   
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

                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>

                            </div>

                            <h2><strong>B2B Billing</strong> Report</h2>

                        </div>
                        
                        <div class=" block-optionss">
                            <strong>Search Billing</strong> by date
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="input-group input-daterange col-md-12">
                                        <input type="text" name="start_date" id="start_date" placeholder="Billing Date From" class="form-control" />
                                        <div class="input-group-addon">to</div>
                                        <input type="text" name="end_date" id="end_date" placeholder="Billing Date To" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4" style=" padding: 0;">
                                   <input type="button" name="search" id="search_date" value="Search" class="btn btn-info" />
                                </div>
                            </div>
                        </div>

                        <!--Table Starts here-->
                        <table id="order_datatable" class="table table-striped table-bordered bootstrap-datatable datatable">

                            <thead>

                                <tr>
                                    
                                    <th class="text-center" style="padding-left:0px;">
                                        <select name="rest_category" id="rest_category" class="selectpicker" data-live-search="true" show-tick  data-size="8" title="Restaurants Search" data-width="90%">
                                            <option value="">Restaurants Search</option>
                                            <?php 
                                                foreach ($all_rest as $row)
                                                {
                                                 echo '<option data-tokens="'.$row->companyname.'" value="'.$row->id.'">'.$row->companyname.'</option>';
                                                }
                                            ?>
                                        </select>

                                    
                                    </th>
                                    
                                     <th class="text-center">Email</th>
                                    
                                    <th class="text-center" >Phone</th>
                                    
                                    <th class="text-center" style="min-width: 80px;">Date From</th>

                                    <th class="" style="min-width: 80px;">Date To</th>
                                    
                                    <th class="">Tolal Sales</th>
                                    
                                    <th class="">Billing in %</th>
                                    
                                    <th class="">Billing Amt </th>
                                    
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
    $('.nav_b').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>


<script >
    
    var url_ ="<?= site_url('super_admin/b2bregistration_billing_report'); ?>";
    load_data();
    function load_data(restid)
    {
      var dataTable = $('#order_datatable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:url_,
                type:"POST",
                data:{rest_id:restid}
           },  
           "columnDefs":[  
                {  
                     "targets":[3,4,8],  
                     "orderable":false 
                },  
           ],  
      });  
    }
    
    $(document).on('change', '#rest_category', function(){
        var rest_id = $(this).val();
        $('#order_datatable').DataTable().destroy();
        if(rest_id != '')
        {
         load_data(rest_id);
        }
        else
        {
         load_data();
        }
    });
    
    var searchdate =false;
    
    if (searchdate === false)
        {
        }
    else
        {
            fetch_data();
        
        }
     $('.input-daterange').datepicker({
      todayBtn:'linked',
      format: "yyyy-mm-dd",
      autoclose: true
     });


    function fetch_data(is_date_search, start_date, end_date)
    {
        var dataTable = $('#order_datatable').DataTable({
          "processing" : true,
          "serverSide" : true,
          "order" : [],
          "ajax" : {
              url:url_,
              type:"POST",
              data:{is_date_search:is_date_search, start_date:start_date, end_date:end_date}
          },
          "columnDefs":[  
                {  
                     "targets":[3,4,8],  
                     "orderable":false 
                },  
           ],  
       });
    }

    $('#search_date').click(function(){
      
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        if(start_date != '' && end_date !='')
        {
            $('#order_datatable').DataTable().destroy();
            searchdate =true;
            fetch_data('yes', start_date, end_date);
        }
        else
        {
            alert("Both Date is Required");
        }
        
    }); 
     
     $(document).on('change', '#rest_category', function(){
        var rest_id = $(this).val();
        $('#order_datatable').DataTable().destroy();
        if(rest_id != '')
        {
         load_data(rest_id);
        }
        else
        {
         load_data();
        }
    });

</script>