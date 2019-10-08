<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>Restaurant Category Options </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cate_form" action="<?= site_url('restaurant_admin/category_save') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">

                                        <label class="col-md-12 control-label" style=" text-align: left;">Select Restaurant Category</label>

                                        <div class="col-md-12">

                                            <select name="rest_cate[]" class="multiplecategory" multiple="multiple" style=" width: 97%;" required="">
                                                <?php foreach ($get_cate as $option_list) :?>
                                                    <?php if(!isset($option_list['cat_cusid'])): ?>
                                                        <option value="<?= $option_list['id'] ?>"><?= $option_list['categoryname'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach;?>
                                            </select>
                                            
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
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
            
            
        $(".multiplecategory").multipleSelect({
            //width: 460,
            //keepOpen:true,
            filter:true,
            placeholder: "Select Your Restaurant Category Type",
            multiple: true,
            minimumCountSelected:3,
            multipleWidth: 200,
            selectAll: false
           /*onClick: function(view) {
                $('.multiplecategory').multipleSelect('refresh');
            },
            onClose: function() {
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('restaurant_admin/get_cuisaine_cate') ?>',
                    success:function(html){
                        $('.multiplecategory').html(html);
                    }
                });
            }
            */
        });
        
            
            
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
                                
                                $('#modal_addcate').modal('hide'); 
                                    
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
                                    content: 'Success! Category Added',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                                $('.chzn-choices').html(data.html);
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
                            
                                //$('#order_datatable').DataTable().ajax.reload();
                            
                        });

            });
        </script>