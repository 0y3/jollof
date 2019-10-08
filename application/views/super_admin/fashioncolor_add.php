<style>
    .save_name:valid { text-transform: uppercase; }
</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b><?= $title ?> </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cate_form" action="<?= site_url('super_admin/')?><?=$url?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Color Name</label>

                                        <div class="col-md-7">
                                            
                                            <input type="text" id="save_name<?=$data_id?>" data-color_id="<?=$data_id?>" name="save_name" class="save_name form-control" placeholder="Enter Size Name.." value="<?=$data_name?>" required="">
                                            <div id="c_name_result" class="bg-white"> </div>
                                            <input type="hidden" name="id_" value="<?=$data_id?>" >

                                        </div>

                                    </div>
                                    
                                     <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Color Code</label>

                                        <div class="col-md-7">
                                            
                                            <div id="" class="save_code input-group colorpicker-component" >
                                                <input id="" name="save_code" type="text" class="save_code form-control " value="<?=$data_code?>" required=""/>
                                                <span class="input-group-addon"><i></i></span>
                                            </div>
                                            
                                        </div>

                                    </div>


                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button id="stepbtn" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 
                    
        <script>
            $(function () {
              $('.save_code').colorpicker({
                useHashPrefix: false,
                format: "hex"
                //color : "#"
              });
            });
            
            function exist (input){
        
            if(input == true) 
                { $('#stepbtn').prop("disabled", true); }
            else{ $('#stepbtn').prop("disabled", false); }
          }
          
            //check restaurant Name if exist
    $('#save_name').change(function(){  
           var name = $('#save_name').val();  
           if(name != '')  
           {  
                $.ajax({  
                     url:"<?= site_url('super_admin/check_color_name') ?>",  
                     method:"POST",
                     dataType: 'json',
                     data:{save_name:name},  
                     success:function(data){
                         
                        if(data.status === '1')
                          {
                            $('#c_name_result').html(data.content);
                            exist(false);
                          }
                        else 
                          {
                            $('#c_name_result').html(data.content);
                            exist(true);
                          }
                     }  
                });  
           } 
           else { $('#c_name_result').html('');}
      });
        </script>

        <script>
            
            
            
            $("#cate_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_sub_cate').modal('hide'); 
                                    
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
                                    content: 'Success! Color Name: '+$('#save_name').val()+' Added',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                $('#modal_color').modal('hide');
                                //$('#modal_coloredit').modal('hide');
                                
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#cat_form")[0].reset();
                                $("#save_name").focus();
                            } 
                            
                                $('#order_datatable').DataTable().ajax.reload();
                            
                        });

            });
        </script>