
<link rel="stylesheet" href="<?=base_url(); ?>assets/css/multi-select.css">
<script src="<?=base_url(); ?>assets/js/jquery.multi-select.js"></script>
<script src="<?=base_url(); ?>assets/js/jquery.quicksearch.js"></script>

<style>
    .search_boxes{
        padding-bottom: 20px;
    }
    .search_boxes a{
        padding-left: 10px;
    }
</style>

<?php
        $this->load->model('oye/Super_admin_model');
        $email_user   = $this->Super_admin_model->_all_user($usertype=FALSE);
        //print("<pre>".print_r($email_user,true)."</pre>");
        //die;

?>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>Email Blast</b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="cat_form" action="" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
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

                                        <div class="col-sm-10 col-sm-offset-2">
                                            
                                            <div class="col-sm-10 text-center search_boxes" >
                                                <a href='#' id='select-all'>Select all</a>
                                                <a href='#' id='refresh'>Refresh</a>
                                                <a href='#' id='deselect-all'>Deselect all</a>
                                                <br>
                                            </div>
                                            
                                            <select multiple="multiple" id="email_select" name="email_select[]">
                                                <?php
                                                
                                                    foreach ($email_user as $u_email)
                                                    {
                                                        echo '<option value="'.$u_email->id.'"> <div> '.$u_email->fristname.'</div>'.$u_email->email.' </option>';
                                                    }
                                                ?>
                                            </select>

                                        </div>

                                    </div>
                                    

                                    <div class="form-group form-actions">

                                        <div class="col-md-12 div_reset text-center">

                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Insert Email &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                                
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            	<div class="text-right pull-right ">view all <strong style="color:#D80000;">User Email</strong> list </div>
                            </div>
                            
                            
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

        <script>
            
            //$('#email_select').multiSelect();
            
            
            $('#email_select').multiSelect({
                selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search Email '>",
                selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search Email '>",
                afterInit: function(ms){
                  var that = this,
                      $selectableSearch = that.$selectableUl.prev(),
                      $selectionSearch = that.$selectionUl.prev(),
                      selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                      selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                  that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                  .on('keydown', function(e){
                    if (e.which === 40){
                      that.$selectableUl.focus();
                      return false;
                    }
                  });

                  that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                  .on('keydown', function(e){
                    if (e.which == 40){
                      that.$selectionUl.focus();
                      return false;
                    }
                  });
                },
                afterSelect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                },
                afterDeselect: function(){
                  this.qs1.cache();
                  this.qs2.cache();
                }
              });
            
            $('#select-all').click(function(){
            $('#email_select').multiSelect('select_all');
                return false;
              });
              
            $('#deselect-all').click(function(){
              $('#email_select').multiSelect('deselect_all');
              return false;
            });
            
            $('#refresh').on('click', function(){
                $('#email_select').multiSelect('refresh');
                return false;
              });
            
            
        </script>
        
        
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