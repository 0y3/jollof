                   

<style>
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

</style>        
                    
                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>Category</strong> & Sub Category</h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= site_url('super_admin/new_fashioncategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_cate" data-container="modal_cate" title="Add Emails" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Category
                                </a>

                            </div>

                        </div>


                        <!--Category Div Starts here-->
                        <div class="row">
                            <div id="cate_div" class="col-sm-12 col-sm-offset- " style=" background-colorr:#ebecef;">
                                
                                <?php foreach ($nav as $navs) :?>
                                
                                <div id="grandparent" class="list-group-item grandparent">
                                    <div class="collapsed" data-toggle="collapse" data-target="#grandparentContent<?= $navs['id']?>" data-role="expander" data-group-id="grandparent">
                                      <ul class="list-inline">
                                          
                                            <li class="icon-class"></li>
                                            <li> 
                                                <?= $navs['categoryname']?>
                                                <a href="<?= site_url('super_admin/update_fashioncategory') ?>" class="editname" data-cat_id="<?= $navs['id']?>" data-cat_type="MainCategory" data-cat_name="<?= $navs['categoryname']?>" data-tooltip="true" title="Edit" data-toggle="modal" data-target="#modal_editcate" data-container="modal_editcate">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
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
                                                    <span class="label label-default">Inactive</span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-xs"> 

                                                    <a href="<?= site_url('super_admin/update_fashionsubcategory') ?>" id="<?= $subnavs['id']?>" data-cat_id="<?= $subnavs['id']?>" data-cat_type="SubCategory" data-cat_name="<?= $subnavs['categoryname']?>" data-toggle="modal" data-target="#modal_sub_cate" data-container="modal_sub_cate" data-tooltip="tooltip" data-target="#modal_prd" title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-pencil"></i></a>
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

                                                    <a href="<?= site_url('super_admin/update_fashionattributecategory') ?>" id="<?= $submenunavs['id']?>" data-cat_id="<?= $submenunavs['id']?>" data-cat_name="<?= $submenunavs['categoryname']?>" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_attributes" data-tooltip="true" title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-pencil"></i></a>

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
                                                      <a href="<?= site_url('super_admin/new_fashionattributecategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="true" data-target="#modal_attributes" data-container="modal_attributes" title="Add Attributes" style="background-color:#1bbae1; color: #FFF">
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
                                        <a href="<?= site_url('super_admin/new_fashionsubcategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_sub_cate" data-container="modal_sub_cate" style="background-color:#1bbae1; color: #FFF">
                                            <i class="fa fa-plus-circle"></i>&nbsp;Sub Category
                                        </a>
                                    </div>  
                                </div>

                                
                                <?php endforeach; ?>
<!--
<div id="grandparent" class="list-group-item">
    <div class="collapsed" data-toggle="collapse" data-target="#grandparentContent" data-role="expander" data-group-id="grandparent">
      <ul class="list-inline">
            <li class="icon-class"></li>
            <li> 
                womens-clothing
                <a href="<?= site_url('super_admin/update_fashioncategory') ?>" class="editname" data-cat_id="1" data-cat_type="MainCategory" data-cat_name="womens-clothing" data-tooltip="true" title="Edit" data-toggle="modal" data-target="#modal_editcate" data-container="modal_editcate">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
  
  

    <div class="collapse" id="grandparentContent" aria-expanded="true">
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
          <tr class="collapsed subcat_title" data-toggle="collapse" data-target=".parent1Content">
            <td class="icon-class"></td>
            <td>Tops & Dresses Sets</td>
            <td>01</td>
            <td><span class="label label-success">Active</span></td>
            <td>
                <div class="btn-group btn-group-xs"> 

                    <a href="<?= site_url('super_admin/update_fashionsubcategory') ?>" id="2" data-cat_id="8" data-cat_type="SubCategory" data-cat_name="Tops & Dresses Sets" data-toggle="modal" data-target="#modal_sub_cate" data-container="modal_sub_cate" data-tooltip="tooltip" data-target="#modal_prd" title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
          </tr>

          <tr class="collapse parent1Content" >
            <td></td>
            <td class="subcat_list">Dresses</td>
            <td class="subcat_list">01</td>
            <td class="subcat_list"><span class="label label-success">Active</span></td>
            <td>
                <div class="btn-group btn-group-xs"> 

                    <a href="<?= site_url('super_admin/update_fashionattributecategory') ?>" id="17" data-cat_id="17" data-cat_name="Dresses" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_attributes" data-tooltip="true" title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-pencil"></i></a>

                    <a href="" id="17" data-cat_id="'.$row->id.'" data-cat_name="'.$row->productname.'" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip btn btn-xs btn-danger cate_del"><i class="fa fa-times"></i></a>

                </div>
            </td>
          </tr>
          
          <tr class="collapse parent1Content">
            <td></td>
            <td class="subcat_list">Child B</td>
            <td class="subcat_list">02</td>
            <td class="subcat_list">04/04/2017</td>
            <td>
                <div class="btn-group btn-group-xs"> 

                    <a href="'.site_url('restaurant_admin/quickproduct_view').'" id="'.$row->id.'" data-product_id="'.$row->id.'" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_attributes" title="Edit" class="jboxtooltip btn btn-xs btn-default prd_view"><i class="fa fa-pencil"></i></a>

                </div>
            </td>
          </tr> 
          
          <tr class="collapse parent1Content">
            <td></td>
            <td class="subcat_list">
                
                
                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                    
                    <div class="btn-group " role="group">
                      <a href="<?= site_url('super_admin/new_fashionattributecategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_attributes" data-container="modal_attributes" title="Add Attributes" style="background-color:#1bbae1; color: #FFF">
                        <i class="fa fa-plus-circle"></i>&nbsp;New Attributes
                      </a>
                    </div>
                </div>
                
            </td>
          </tr> 
          
          <tr class="collapsed subcat_title" data-toggle="collapse" data-target=".parent2Content">
            <td class="icon-class"></td>
            <td>Parent 2</td>
            <td>02</td>
            <td>04/10/2017</td>
          </tr>

          <tr class="collapse parent2Content">
            <td></td>
            <td class="subcat_list">Child X</td>
            <td class="subcat_list">01</td>
            <td class="subcat_list">04/11/2017</td>
          </tr>          
        </tbody>
      </table>
        <a href="<?= site_url('super_admin/new_fashionsubcategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_sub_cate" data-container="modal_sub_cate" style="background-color:#1bbae1; color: #FFF">
            <i class="fa fa-plus-circle"></i>&nbsp;Sub Category
        </a>
    </div>
</div>

<div id="grandparent" class="list-group-item">
	<div class="collapsed" data-toggle="collapse" data-target="#grandparentContent3" data-role="expander" data-group-id="grandparent">
      <ul class="list-inline">
            <li class="icon-class"></li>
        	<li>mens-clothing</li>
        </ul>
    </div>
</div>
-->

                            
                        </div>
                        </div>

                        <!--end Category Dive here-->

                    </div>
                    
                    
                    <!-- NEW Category Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Category view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                   <!-- NEW Sub Category Modal -->              
                    <div class="modal fade" id="modal_sub_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Sub Category view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- New Attributes Modal -->              
                    <div class="modal fade" id="modal_attributes" tabindex="-1" role="dialog" aria-labelledby="New Attributes" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- edit Category Modal -->              
                    <div class="modal fade" id="modal_editcate" tabindex="-1" role="dialog" aria-labelledby="edit Category" aria-hidden="true" >
                        
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
    $('.nav_f').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    $(function() {
        $('[data-tooltip="true"]').tooltip();
    });
    
</script>


<script >

    $('[data-toggle="collapse"]').on('click', function() {
  $(this).toggleClass('collapsed');
});

/*$('.collapse').on('show.bs.collapse', function () {
  var groupId = $('#expander').attr('data-group-id');
  console.log(groupId);
  if (groupId) {
    $('#grandparentIcon').html('v');
  }
});

$('.collapse').on('hide.bs.collapse', function () {
  var groupId = $('#expander').attr('data-group-id');
  console.log(groupId);
  if (groupId) {
    $('#' + groupId + 'Icon').html('>');
  }
});*/


    
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
    
    $(document).on('click','.cate_del', function(e){
        var row_id = $(this).data("cat_id");
        var msg="Are you sure you want to remove this Category name " + $(this).data("cat_name");
        //e.stopImmediatePropagation();
        e.preventDefault();
        
        
             confirmDialog(msg, function(){
                    $.ajax({
                     url:"<?= site_url('super_admin/remove_fashioncategory') ?>",
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
                    });
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
</script>