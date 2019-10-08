<style>
.listinline > li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
}
.subcat_title td{
    font-weight: bold;
}
.subcat_list {
    padding-left:30px !important;
}
    .bootstrap-tagsinput {
    width: 100%;
}
.collapsed .icon-class:before {
    content: '>';
}
.icon-class:before {
    content: 'v';
}
.grandparent{
    cursor:pointer;
}
.editnav
{
    z-index: 300;
}

</style> 

                                <div class="d-flex no-block align-items-center m-b-10">
                                        <h6 class="card-title"></h6>
                                        <div class="ml-auto">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#createmodel">
                                                    &nbsp;Add Category
                                                </a>
                                               
                                            </div>
                                        </div>
                                    </div>
                                

                                <!--Category Div Starts here-->
                        <div class="row">
                            <div id="cate_div" class="col-sm-12 col-sm-offset- " style=" background-colorr:#ebecef;">
                                
                                <?php foreach ($nav as $navs) :?>
                                
                                <div id="grandparent" class="list-group-item grandparent">
                                    <div class="collapsed" data-toggle="collapse" data-target="#grandparentContent<?= $navs['id']?>" data-role="expander" data-group-id="grandparent">
                                      <ul class="listinline">
                                          
                                            <li class="icon-class"></li>
                                            <li> 
                                                <?= $navs['categoryname']?>
                                                <a href="<?= site_url('jollofadmin/fashion/fashionsubcategoryattributes/'.$navs['id']) ?>" class="jboxtooltip editname editnav btn btn-xs" data-cat_id="<?= $navs['id']?>" data-cat_type="MainCategory" data-cat_name="<?= $navs['categoryname']?>" title="Edit" data-toggle="tooltip">
                                                    <i class="ti-marker-alt""></i>
                                                </a>
                                                <a href="<?=site_url("jollofadmin/fashion/deletefashioncategory/$navs[id]")?>" id="<?= $navs['id']?>" data-cat_id="<?= $navs['id']?>" data-cat_name="<?= $navs['categoryname']?>" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip btn btn-xs  cate_del"><i class="fa fa-trash" style="color: red;"></i></a>
                                            </li>
                                        </ul>
                                    </div>


                                    <div class="collapse" id="grandparentContent<?= $navs['id']?>" aria-expanded="true">
                                <!--sub menu-->    
                                <?php if(!empty($navs['nav_cate_submenu'])): ?>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        
                                        <?php foreach ($navs['nav_cate_submenu'] as $subnavs) :?>
                                          <tr class="collapsed subcat_title" data-toggle="collapse" data-target=".parentContent<?= $subnavs['id']?>">
                                            <td class="icon-class"></td>
                                            <td><?= $subnavs['categoryname']?></td>
                                            <td><?= $subnavs['arrangecategory']?></td>
                                            <td>
                                                <?php if($subnavs['status'] == 1) : ?>
                                                    <span class="label label-success">Active</span>
                                                <?php else: ?>
                                                    <span class="label label-danger">Inactive</span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-xs"> 

                                                    <a href="<?= site_url('jollofadmin/fashion/fashionsubcategoryattributes/'.$subnavs['id']) ?>" id="<?= $subnavs['id']?>" data-cat_id="<?= $subnavs['id']?>" data-cat_type="SubCategory" data-cat_name="<?= $subnavs['categoryname']?>"  title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="ti-pencil-alt"></i></a>
                                                    <?php if( empty($subnavs['submenu_nav']) ): ?>
                                                        <a href="" id="<?= $subnavs['id']?>" data-cat_id="<?= $subnavs['id']?>" data-cat_name="<?= $subnavs['categoryname']?>" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip btn btn-xs btn-danger cate_del"><i class="fa fa-times"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                          </tr>
                                          
                                          <?php foreach ($subnavs['submenu_nav'] as $submenunavs) :?>
                                          <tr class="collapse parentContent<?= $subnavs['id']?>">
                                            <td></td>
                                            <td class="subcat_list"><?= $submenunavs['categoryname']?></td>
                                            <td class="subcat_list"><?= $submenunavs['arrangecategory']?></td>
                                            <td class="subcat_list">
                                                <?php if($submenunavs['status'] == 1) : ?>
                                                    <span class="label label-success">Active</span>
                                                <?php else: ?>
                                                    <span class="label label-default">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-xs"> 

                                                    <a href="<?= site_url('jollofadmin/fashion/fashionsubcategoryattributes/'.$submenunavs['id']) ?>" id="<?= $submenunavs['id']?>" data-cat_id="<?= $submenunavs['id']?>" data-cat_name="<?= $submenunavs['categoryname']?>"  title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="ti-pencil-alt"></i></a>

                                                    <a href="" id="<?= $submenunavs['id']?>" data-cat_id="<?= $submenunavs['id']?>" data-cat_name="<?= $submenunavs['categoryname']?>" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip btn btn-xs btn-danger cate_del"><i class="fa fa-times"></i></a>

                                                </div>
                                            </td>
                                          </tr> 
                                          <?php endforeach; ?>
                                          
                                          <tr class="collapse parentContent<?= $subnavs['id']?>">
                                            <td></td>
                                            <td class="subcat_list">


                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">

                                                    <div class="btn-group " role="group">
                                                      <a href="<?= site_url('jollofadmin/fashion/fashionsubcategoryattributes') ?>" class="btn btn-sm btn-default" style="background-color:#1bbae1; color: #FFF">
                                                        <i class="fa fa-plus-circle"></i>&nbsp;New Attributes
                                                      </a>
                                                    </div>
                                                </div>

                                            </td>
                                          </tr> 
                                        
                                        <?php endforeach; ?>         
                                        </tbody>
                                      </table>
                                    
                                <?php endif; ?>
                                <!--sub menu End-->
                                        <a href="" class="btn btn-sm btn-default" data-toggle="modal" data-target="#sub_createmodel" style="background-color:#1bbae1; color: #FFF">
                                            <i class="fa fa-plus-circle"></i>&nbsp;Sub Category
                                        </a>
                                    </div>  
                                </div>

                                
                                <?php endforeach; ?>

                            
                        </div>
                        </div>

                        <!--end Category Dive here-->
                                
                                                
                     <!-- NEW Category Modal -->   
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="" action="<?=site_url('jollofadmin/fashion/fashioncategoryadd')?>" method="post" class="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Category </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" name="save_name" placeholder="Category Name" aria-label="no" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    <!--end Modal -->
                    
                   <!-- NEW Sub Category Modal --> 

            <div class="modal fade" id="sub_createmodel" tabindex="-1" role="dialog" aria-labelledby="sub category name" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="" action="<?=site_url('jollofadmin/fashion/fashionsubcategoryadd')?>" method="post" class="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Sub Category </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <select id="" name="parent_category" class="form-control select-chosen" data-placeholder="Choose Category.." required="">
                            
                                        <?php if(!empty($catelist)): ?>
                                                <option>Choose Category ..</option>
                                                
                                                <?php foreach ($catelist as $cate_list) :?>
                                                    
                                                    <option value="<?= $cate_list['id'] ?>">
                                                      <?= $cate_list['categoryname'] ?>
                                                    </option>
                                                
                                                <?php endforeach;?>
                                            <?php else: ?>
                            
                                                <option > Fashion Category not available</option>

                                        <?php endif; ?>
                                        
                                        
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" name="save_name" placeholder="Category Name" aria-label="no" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    <!--end Modal -->
                    
                    <!-- New Attributes Modal -->              
            <div class="modal fade" id="atr_createmodel" tabindex="-1" role="dialog" aria-labelledby="sub category Attributes name" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="" action="<?=site_url('jollofadmin/fashion/fashionsubcategoryattributesadd')?>" method="post" class="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Sub Category </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <select id="" name="parent_category" class="form-control select-chosen" data-placeholder="Choose Category.." required="">
                            
                                        <?php if(!empty($catelist)): ?>
                                                <option>Choose Category ..</option>
                                                
                                                <?php foreach ($catelist as $cate_list) :?>
                                                    
                                                    <option value="<?= $cate_list['id'] ?>">
                                                      <?= $cate_list['categoryname'] ?>
                                                    </option>
                                                
                                                <?php endforeach;?>
                                            <?php else: ?>
                            
                                                <option > Fashion Category not available</option>

                                        <?php endif; ?>
                                        
                                        
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <select id="" name="parent_category" class="form-control select-chosen" data-placeholder="Choose Sub Category.." required="">
                            
                                        <?php if(!empty($catelists)): ?>
                                                <option>Choose Sub Category ..</option>
                                                
                                                <?php foreach ($catelists as $cate_list) :?>
                                                    
                                                    <option value="<?= $cate_list['id'] ?>">
                                                      <?= $cate_list['categoryname'] ?>
                                                    </option>
                                                
                                                <?php endforeach;?>
                                            <?php else: ?>
                            
                                                <option > Fashion Sub Category not available</option>

                                        <?php endif; ?>
                                        
                                        
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" name="save_name" placeholder="Attributee Name" aria-label="no" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                    <!--end Modal -->
                    

                                <!-- Modal confirm Empty Cart -->
                                <div class="modal" id="empty_confirmModal">
                                    <div class="modal-dialog">
                                            <div class="modal-content">

                                                    <div class="modal-body" >
                                                        <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                                        <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                                                    </div>

                                            </div>
                                    </div>
                                </div>

    <script> 


    $(document).on('click','.cate_del', function(e){
        e.preventDefault();
        var row_id = $(this).data("cat_id");
        var msg="Are you sure you want to remove this Category name " + $(this).data("cat_name");
        var url = $(this).attr('href');
        //e.stopImmediatePropagation();
        
             confirmDialog(msg, function(){
                $('.preloader').css("display", "block");
                $(location).attr('href', url);

                /*
                    $.ajax({
                     url:"<?= site_url('jollofadmin/fashion/deletefashioncategory') ?>",
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{id_:row_id},
                     success:function(data)
                     {
                        //alert("Product removed from Cart");
                        new jBox('Notice', {
                            //animation: 'flip',
                            animation: {
                              open: 'tada',
                              close: 'zoomIn'
                            },
                            attributes: {
                              x: 'right',
                              y: 'bottom'
                            },
                            color: 'red',
                            autoClose: Math.random() * 8000 + 2000,
                            content: 'Removed! Category Removed',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        
                        window.setTimeout(function () {
                            location.href = "<?php echo site_url('admin/fashioncategory'); ?>";
                        }, 2000);
                     }
                    });*/
                });
        });
        function confirmDialog(message, onConfirm){
            var fClose = function(){
                modal.modal("hide");
            };
            var modal = $("#empty_confirmModal");
            modal.modal("show");
            $("#empty_confirmMessage").empty().append(message);
            $("#empty_confirmOk").one('click', onConfirm);
            $("#empty_confirmOk").one('click', fClose);
            $("#empty_confirmCancel").one("click", fClose);
        }
        $(document).on('click','.editname', function(e){
            $('.preloader').css("display", "block");
            var addressValue = $(this).attr("href");
            window.location = addressValue;
        });
</script>
                                
                                