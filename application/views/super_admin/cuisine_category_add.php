<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>New Cuisine Category</b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cat_form" action="<?= site_url('super_admin/save_category') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name" name="save_name" class="form-control" placeholder="Enter Category name.." required="">

                                        </div>

                                    </div>


                                   
                                    <div class="form-group">

                                        <label class="col-md-3 control-label">Publish?</label>

                                        <div class="col-md-9">

                                            <label class="switch switch-primary">

                                                <input type="checkbox" id="ca_status" name="cat_status" checked><span></span>

                                            </label>

                                        </div>

                                    </div>

                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Save &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            	<div class="text-right pull-right ">view all <strong style="color:#D80000;">category</strong> list </div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
    
            $('#modal_login').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
            
            $("#cat_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                
                var name = $('[name="save_name"]').val();
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
                                
                                dataTable.ajax.reload();
                                
                                    $('#modal_login').hide('hide');
                                    $('.modal-backdrop').remove();
                                    $('body').removeClass('modal-open');
                                    //window.location.href='http://localhost/jollof-cuisine/adminoye/dashbord';
                                    
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
                                    content: 'Success! Category name: '+name+' Save',
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
                            
                        });

            });
        </script>