<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b><?= $title_type?> </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="loc_form" action="<?= site_url('super_admin/locationupdate') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name" data-id_name="<?=$data_id?>" data-id_type="<?=$data_type?>" name="save_name" class="form-control" placeholder="Enter name.." value="<?= $data_name ?>" required="">

                                        </div>

                                    </div>


                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Update &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            	<div class="text-right pull-right ">view all <strong style="color:#D80000;">Location</strong> list </div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
    
            $('#modal_login').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
            
            $(document).on('click', '.update', function(){  
                var user_id = $(this).attr("id");  
                $.ajax({  
                     url:"<?php echo base_url(); ?>crud/fetch_single_user",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     dataType:"json",  
                     success:function(data)  
                     {  
                          alert(data);  
                          $('#loc_form')[0].reset();  
                          $('#userModal').modal('hide');  
                          dataTable.ajax.reload();  
                     }  
                })  
           });  
            
            $("#loc_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                
                var _Type = $('[name="save_name"]').data('id_type');
                var _Id =  $('[name="save_name"]').data('id_name');
                var _Name = $('[name="save_name"]').val();
                //alert(_Type);
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:{id_:_Id, name_:_Name, type_:_Type}
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_editstate').modal('hide'); 
                                    
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
                                    content: 'Success! Location Name: '+_Name+' Updated',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                        
                                
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