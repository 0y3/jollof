<style>

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>Update Sub Category </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cate_form" action="<?= site_url('super_admin/fashionattributecategoryupdate') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="product_category">Category</label>

                                        <div class="col-md-7">

                                            <select name="parent_category" id="parent_category" class="form-control" required="">
                                                
                                                <option value="<?=$data_cate[0]->id?>"><?=$data_cate[0]->categoryname?></option>
                                                <?php if(!empty($cate)): ?>
                                                    

                                                        <?php foreach ($cate as $cate_list) :?>
                                                            <option  value="<?= $cate_list->id ?>"><?= $cate_list->categoryname ?></option>

                                                        <?php endforeach;?>
                                                    <?php else: ?>

                                                            <option value=""> Category not available</option>

                                                <?php endif; ?>


                                            </select>

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="sub_category">Sub Category</label>

                                        <div class="col-md-7">
                                            
                                            <select id="sub_category" name="sub_category" class="form-control" required="">
                                                <option value="<?=$data_subcate[0]->id?>"><?=$data_subcate[0]->categoryname?></option>
                                            </select>

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">Attribute Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id="save_name" data-id_name="<?=$data_id?>" name="save_name" class="form-control" placeholder="Enter name.." value="<?= $data_name ?>" required="">

                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        
                                        <div class="row m_bottom_15">
                                            <div class="col-xs-4 col-xs-offset-2">
                                                <label class="control-label" for="save_name">Sort Order</label>
                                                <input type="number" id="sub_sort" class="form-control" name="sub_sort" min="0" value="<?=$data_att[0]->arrangecategory?>">
                                            </div>

                                            <div class="col-xs-6 ">
                                                <label class=" control-label">Status?</label>

                                                <div class="col-md-99">

                                                    <label class="switch switch-primary">
                                                        
                                                        <input type="checkbox" name="sub_status" id="sub_status" <?php echo $data_att[0]->status == 1 ? 'checked' : ''  ?>><span></span>

                                                    </label>

                                                </div>
                                                
                                            </div>

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
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
            
            $('#parent_category').on('change',function(){
            
                var cateID = $(this).val();
                
                if(cateID){
                    $.ajax({
                        type:'POST',
                        url:'<?= site_url('super_admin/get_sub_category_byid') ?>',
                        data:'cateid='+cateID,
                        success:function(html){
                            $('#sub_category').html(html);
                        }
                    }); 
                }else{
                    $('#sub_category').html('<option value="">Select Category first</option>'); 
                }
            });
            
            $('#sub_status').change(function() {
                if($(this).is(":checked")) {
                    $(this).attr("checked", true);
                    $(this).val(1);
                }
                else{
                    $(this).val(0); 
                    $(this).attr("checked", false);
                }
            });
            
            $("#cate_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                
                var _cateId = $('[name="sub_category"]').val();
                var _Id =  $('[name="save_name"]').data('id_name');
                var _Name = $('[name="save_name"]').val();
                
                var _Sort = $('[name="sub_sort"]').val();
                var _Status = $('[name="sub_status"]').val();
                
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:{id_:_Id, name_:_Name, cateid:_cateId, sort:_Sort, status:_Status}
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_attributes').modal('hide'); 
                                    
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
                                    content: 'Success! Sub Category Name: '+_Name+' Updated',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });
                        
                                window.setTimeout(function () {
                                    location.href = "<?php echo site_url('admin/fashioncategory'); ?>";
                                }, 2000);
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