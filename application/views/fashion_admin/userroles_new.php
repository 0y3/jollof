
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/css-loader.css">
<style>
.modal_dialog_edit{
        max-width: 100%;
        width: auto !important; 
        display:inline-block;
    }
    .modal.in{
        text-align: justify;
    }
    .ajax-loader {
        visibility: hidden;
        background-color: rgba(255,255,255,0.7);
        position: absolute;
        z-index: 99999 !important;
        overflow: hidden;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
    }

    .ajax-loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    .loader .is-active{
        background-color: rgba(255,255,255,0.7) !important;
    }
    .loader img {
        position: relative;
        top:50%;
        left:50%;
    }
    
    .list li {
            list-style: none;
            text-align: justify;
        }
        ul.list-link{
            width: 100%;
            padding: 0;
        }
        ul.list-link li {
            display: inline-block;
            width: 32%;
        }
        ul.list-link li a, ul.list-link li {
            color: #4e575d;
            font-size: 13px;
            font-style: normal;
            line-height: normal;
            font-weight:500;
            padding: 3px 0;
            -webkit-transition: all 0.1s ease 0s;
               -moz-transition: all 0.1s ease 0s;
                 -o-transition: all 0.1s ease 0s;
                    transition: all 0.1s ease 0s; 
        }

        ul.list-link li a:hover, .ul.list-link li a:hover {
            text-decoration: underline;
            color: #345676; 
        }
        
        ul.list-link li span.active,ul.list-link li a.active {
            color: #345676;
            font-weight: bold;
        }
        @media (min-width: 768px){
            .modal-dialog {
                width: 800px;
                margin: 30px auto;
            }
        }

</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width " style=" margin-top: 60pxx; ">
                    
                        <div class="modal-content modal-center" style="">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b><?=$title_type ?> </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                                
                                <?php
                                    if(isset($role_assign))
                                    { 
                                        $action='updateuserroles';
                                        $savename='Update';
                                    }
                                    else{ 
                                        $action='saveuserroles';
                                        $savename='Save';
                                        
                                    }
                                ?>
                                <form id="cate_form" action="<?= site_url('fashion_admin/'.$action) ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">

                                        <label class="col-md-3 control-label" for="save_name">User Role Name</label>

                                        <div class="col-md-7">

                                            <input type="text" id=""  name="userrolename" class="form-control" placeholder="" value="<?php if(isset($roleinfo)) echo $roleinfo->roleName?>" required >
                                            <?php if(isset($roleinfo)) 
                                                echo '<input hidden=""  name="userrolenameid" value="'.$roleinfo->id.'"/>';
                                            ?>
                                        </div>

                                    </div>
                                    
                                     <div class="form-group">
                                         <label class="col-md-3 control-label" for="save_name" style=" text-align: justify;">Role Permissions</label>
                                        <div class="col-md-12">
                                            <ul id="WaitMe_city" class="city_ul list-link list-unstyled">
                                               
                                                <?php if(isset($role_assign)): ?>
                                                    <?php foreach ($role_assign as $role_assign_list) :?>
                                                        <li>
                                                            <span class="moditem<?= $role_assign_list['moduleID'] ?> <?php if($role_assign_list['checkIt']== 'yes') echo 'active'?> ">
                                                                <input type="checkbox" value="<?= $role_assign_list['moduleID'] ?>" name="module[]" <?php if($role_assign_list['checkIt']== 'yes') echo 'checked'?>  ><?= $role_assign_list['Description'] ?>
                                                            </span>
                                                        </li>
                                                    <?php endforeach;?>
                                                <?php else: ?>
                                                        
                                                    <?php foreach ($cate as $cate_list) :?>
                                                        <li><span class="moditem<?= $cate_list->moduleID ?> "><input type="checkbox" value="<?= $cate_list->moduleID ?>" name="module[]" id=""><?= $cate_list->Description ?></span></li>
                                                    <?php endforeach;?>
                                                        
                                                <?php endif; ?>
                                                <!-- role_assign
                                                <li><span class="active"><input type="checkbox" value="" name="" id="">All Cities</span></li>
                                                <li><span class="active"><input type="checkbox" value="" name="" id="">Albany</span></li>
                                                <li><a href="#" class="active" title="Altamont">Altamont</a></li>
                                                <li><a href="#" title="Amagansett">Amagansett</a></li>
                                                <li><a href="#" title="Amawalk">Amawalk</a></li>
                                                <li><a href="#" title="Bellport">Bellport</a></li>
                                                <li><a href="#" title="Centereach">Centereach</a></li>
                                                <li><a href="#" title="Chappaqua">Chappaqua</a></li>
                                                <li><a href="#" title="East Elmhurst">East Elmhurst edo state</a></li>
                                                <li><a href="#" title="East Greenbush">East Greenbush</a></li>
                                                <li><a href="#" title="East Meadow">East Meadow</a></li>
                                                -->
                                                

                                            </ul>
					</div>
                                     </div>

                                    <div class="form-group form-actions">

                                        <div class="col-md-12 col-md-offset-33 div_reset">

                                            <button type="submit" class="btn btn-sm btn-primary sbmtbtn"><i class="fa fa-floppy-o"></i> &nbsp; <?= $savename?> &nbsp; </button>

                                        </div>

                                    </div>

                                </form>
                               
                            </div><!-- .modal-body --> 
                            
                            
                            
                            <div class="modal-footer " style=" padding-top:5px; padding-bottom:5px;">
                            	<div class="text-left pull-left " ></div>
                            </div>
                            
                
                        </div><!-- .modal-content --> 
                
                    </div><!-- .modal-dialog --> 

    <div class="ajax-loader">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
<!--
    <div class="loader loader-defaultt is-active">
        <img src="<?= base_url() ?>assets/img/spin_round.gif" class="img-responsive" />
    </div>
-->
       
        <script>
            
            $(document).on('click', '#save_url', function(e) {
                $('#save_url').val('https://');
                
            });
            
            
   
            $('input[type=checkbox]').on('change', function(){
                var id=$(this).val();
                if($(this).prop('checked'))
                {
                    $('span.moditem'+id).addClass("active");
                }
                else 
                {
                   $('span.moditem'+id).removeClass("active");
                }
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
                   data:new FormData(this),
                   processData:false,
                   contentType:false,
                   cache:false,
                   beforeSend: function(){
                       // Show image container
                       $('input[class=sbmtbtn]').prop("disabled", true);
                       $('.ajax-loader').css("visibility", "visible");
                       $(".modal-dialog").removeClass('modal_dialog_edit');
                   },
                   success:function(data)
                        {
                            $('input[class=sbmtbtn]').prop("disabled", false);
                            if(data.status === '1' )
                            {
                                //alert('welcome success' + data.status); 
                                
                                $('#modal_cate').modal('hide'); 
                                    
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
                                    content: 'Success!  User Role:  Added',
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
                                $(".get_error").delay(500).fadeOut('fast');
                                $(".error_msgr_lg").text(data.content);
                                //$("#cat_form")[0].reset();
                                $("#cat_form").trigger('reset');
                                $("#save_url").focus();
                            } 

                               $('#order_datatable').DataTable().ajax.reload();
                            
                        },
                    complete:function(data){
                        // Hide image container
                        $('input[class=sbmtbtn]').prop("disabled", false);
                        $('.ajax-loader').css("visibility", "hidden");
                       }
                    });

            });
        </script>