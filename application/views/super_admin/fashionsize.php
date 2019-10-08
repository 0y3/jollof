                   

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
.grandparent {
    cursor: pointer;
}
 
</style>        
                    
                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>Sizes Category</strong> & Size Values</h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= site_url('super_admin/new_fashionsizecategory') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal_cate_size" data-container="modal_cate_size" title="" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add Size Category
                                </a>

                            </div>

                        </div>


                        <!--Category Div Starts here-->
                        <div class="row">
                            <div id="cate_div" class="col-sm-12 col-sm-offset- " style=" background-colorr:#ebecef;">
                                
                                <?php foreach ($cate_size as $navs) :?>
                                
                                <div id="grandparent" class="list-group-item ">
                                    <div class="collapsed grandparent" data-toggle="collapse" data-target="#grandparentContent<?= $navs['id']?>" data-role="expander" data-group-id="grandparent">
                                      <ul class="list-inline">
                                          
                                            <li class="icon-class"></li>
                                            <li> 
                                                <b><?= $navs['sizecategory']?></b> &nbsp;
                                                <a href="<?= site_url('super_admin/update_fashionsizecategory') ?>" data-cat_id="<?= $navs['id']?>" data-cat_type="<?= $navs['status']?>" data-cat_name="<?= $navs['sizecategory']?>" data-tooltip="true" title="Edit" data-toggle="modal" data-target="#modal_editcate" data-container="modal_editcate" class="jboxtooltip btn btn-xs btn-default">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <?php if( empty($navs['size']) ): ?>
                                                <a href="" id="<?= $navs['id']?>" data-cat_id="<?= $navs['id']?>" data-cat_type="sizecategory" data-cat_name="<?= $navs['sizecategory']?>" data-toggle="tooltip" data-tooltip="true" title="Delete" class="jboxtooltip btn btn-xs btn-danger cate_del"><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>


                                    <div class="collapse" id="grandparentContent<?= $navs['id']?>" aria-expanded="true">
                                <!--sub menu-->    
                                <?php if(!empty($navs['size'])): ?>
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Size Code</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                        
                                        <?php foreach ($navs['size'] as $subnavs) :?>
                                          <tr class="collapsed ">
                                            <td class=""></td>
                                            
                                            <td class="cat_namediv_<?= $subnavs['id']?>">
                                                <a href="javascript:void(0);" class="editname" data-cat_id="<?= $subnavs['id']?>"  data-cat_name="<?= $subnavs['sizename']?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                <?= $subnavs['sizename']?>
                                            </td>
                                            
                                            <td class="cat_codediv_<?= $subnavs['id']?>">
                                                <a href="javascript:void(0);" class="editcode" data-cat_id="<?= $subnavs['id']?>"  data-cat_code="<?= $subnavs['sizecode']?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                <?= $subnavs['sizecode']?>
                                            </td>
                                            
                                            <td class="cat_orderdiv_<?= $subnavs['id']?>">
                                                <a href="javascript:void(0);" class="editorder" data-cat_id="<?= $subnavs['id']?>"  data-cat_order="<?= $subnavs['arrange']?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                &nbsp;
                                                <?= $subnavs['arrange']?>
                                            </td>
                                            
                                            <td class="statusdiv_<?= $subnavs['id']?>">
                                                
                                                <a href="javascript:void(0);" class="editstatus" data-cat_id="<?= $subnavs['id']?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                &nbsp;
                                                <?php if($subnavs['status'] == 1) : ?>
                                                    <span class="label label-success">Active</span>
                                                <?php else: ?>
                                                    <span class="label label-default">Inactive</span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            
                                            <td>
                                                <div class="btn-group btn-group-xs"> 

                                                    <a href="" id="<?= $subnavs['id']?>" data-cat_id="<?= $subnavs['id']?>" data-cat_type="size" data-cat_name="<?= $subnavs['sizename']?>"   class=" btn btn-xs btn-danger cate_del">Delete <i class="fa fa-times"></i></a>
                                                   
                                                </div>
                                            </td>
                                          </tr>
                                        
                                        <?php endforeach; ?>         
                                        </tbody>
                                      </table>
                                    
                                <?php endif; ?>
                                <!--sub menu End-->
                                        <a href="<?= site_url('super_admin/new_fashionsize') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_size" data-container="modal_size" style="background-color:#1bbae1; color: #FFF">
                                            <i class="fa fa-plus-circle"></i>&nbsp;Add Size
                                        </a>
                                    </div>  
                                </div>

                                
                                <?php endforeach; ?>

                            
                            </div>
                        </div>

                        <!--end Category Dive here-->

                    </div>
                    
                    <!-- Size Name div-->
                    <div id="cat_name">
                        <input type="text" data-cat_id="" name="new_cat_name" class="form-control" value="" >
                        <a  id="cat_name_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closename" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!-- Size Code div-->
                    <div id="cat_code">
                        <input type="text" data-cat_id="" name="new_cat_code" class="form-control" value="" >
                        <a  id="cat_code_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closecode" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!-- Size Order div-->
                    <div id="cat_order">
                        <input type="number" data-cat_id="" name="new_cat_order" class="form-control cu_phone_js" min="1" value="" >
                        <a  id="cat_order_save" class="btn btn-success saveEditCategorie">
                            <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                            <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                        </a>
                        <a href="" id="closeorder" class="btn btn-danger ">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <!-- Size Order div-->
                    <div id="cat_status">
                        <input type="hidden" name="cat_edidid" value="">
                        <select class="selectstatus" name="newStatus">
                            <option></option>
                            <option value="0"> &nbsp; Inactive </option>
                            <option value="1"> &nbsp; Active </option> 
                        </select>
                        <a href="" id="closestatus" data-toggle="tooltip" title="close" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                    
                    
                    <!-- NEW Size Category Modal -->              
                    <div class="modal fade" id="modal_cate_size" tabindex="-1" role="dialog" aria-labelledby="NEW Size Category view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                   <!-- NEW size  Modal -->              
                    <div class="modal fade" id="modal_size" tabindex="-1" role="dialog" aria-labelledby="NEW Size view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->
                    
                    <!-- New Attributes Modal -->              
                    <div class="modal fade" id="modal_edit_size" tabindex="-1" role="dialog" aria-labelledby="edit Size" aria-hidden="true" >
                        
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
        var row_type = $(this).data("cat_type");
        
        var empty_msg = "Are you sure you want to remove this Size name " + $(this).data("cat_name");
        //e.stopImmediatePropagation();
        
        e.preventDefault();
        
            confirmDialog(empty_msg, function(){
                    $.ajax({
                     url:"<?= site_url('super_admin/delete_fashionsize') ?>",
                     method:"POST",
                     //dataType: "json", // Set the data type so jQuery can parse it for you
                     data:{id_:row_id,type_:row_type},
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
                            content: 'Removed! Size Removed',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        
                        window.setTimeout(function () {
                            location.href = "<?php echo site_url('admin/fashionsize'); ?>";
                        }, 1300);
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
            $("#empty_confirmOk").unbind().one('click', onConfirm).one('click', fClose);
    	    $("#empty_confirmCancel").unbind().one("click", fClose);
        }
</script>


<script>
    // Edit Status
    $(".block").on("click",".editstatus", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        $('[name="cat_edidid"]').val(cat_Id);
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        $('#cat_status').css({top: newtop, left: position.left, display: 'block'});
    });
    
    // close the status option button
    $('#closestatus').click(function (e) {
        e.preventDefault();
        $('[name="cat_edidid"]').val('');
        $('#cat_status').hide();
    });


    
    // on status change 
    $('.selectstatus').on('change',function(){
            
            var statusID = $(this).val();
            var cat_id_ = $('[name="cat_edidid"]').val();
            if(statusID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('super_admin/size_statusupdate') ?>',
                    dataType: 'json',
                    data:{
                            status:statusID,
                            cat_id:cat_id_
                        },
                    success:function(html){
                        
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
                        content: 'Success! Size status Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      $('.statusdiv_'+cat_id_).html(html);
                        
                    }
                }); 
            }
            $('#cat_status').hide();
            $('.selectstatus').html(
                                    '<option></option>\n\
                                    <option value="0"> &nbsp; Inactive </option>\n\
                                    <option value="1"> &nbsp; Active </option>'
                                    );
        });

    
 
</script> 



<script>
    // Edit Categoty Order 
    $(".block").on("click",".editorder", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Order = $(this).data('cat_order');
        
        $('[name="new_cat_order"]').val(cat_Order);
        $('[name="new_cat_order"]').data('cat_id',cat_Id); // sets value
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#cat_order').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the status option button
    $('#closeorder').click(function (e) {
        e.preventDefault();
        $('#cat_order').hide();
    });
    
    
    // on category order change 
    $('#cat_order_save').click(function (e) {
            e.preventDefault();
            
            var new_order = $('[name="new_cat_order"]').val();
            var cat_id_   = $('[name="new_cat_order"]').data('cat_id'); // gets value
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('super_admin/size_orderupdate') ?>',
                    dataType: 'json',
                    data:{
                            order:new_order,
                            cat_id:cat_id_
                        },
                    success:function(html){
                        
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
                            content: 'Success! Size Updated',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        //dataTable.ajax.reload();
                        $('.cat_orderdiv_'+cat_id_).html(html);
                        
                    } 
                    
                });
                
            $('#cat_order').hide();
        
    });
 
</script> 

<script>
    // Edit Categoty name 
    $(".block").on("click",".editname", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Name = $(this).data('cat_name');
        
        $('[name="new_cat_name"]').val(cat_Name);
        $('[name="new_cat_name"]').data('cat_id',cat_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#cat_name').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closename').click(function (e) {
        e.preventDefault();
        $('#cat_name').hide();
    });
    
    
    // on name change 
    $('#cat_name_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_cat_name"]').val();
            var cat_id   = $('[name="new_cat_name"]').data('cat_id'); // gets value
            
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('super_admin/size_nameupdate') ?>',
                    dataType: 'json',
                    data: {
                            cat_id: cat_id,
                            name: new_name
                            }
                }).done(function (data) {
                    
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
                        content: 'Success! Size name '+ new_name +' Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#cat_name').hide();
                    $('.cat_namediv_'+cat_id).html(data);
                });
            
            
    });
 
</script> 

<script>
    // Edit Size Code 
    $(".block").on("click",".editcode", function(e){
        e.preventDefault();
        
        var cat_Id = $(this).data('cat_id');
        var cat_Name = $(this).data('cat_code');
        
        $('[name="new_cat_code"]').val(cat_Name);
        $('[name="new_cat_code"]').data('cat_id',cat_Id); // sets value
        
        
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#cat_code').css({top: newtop, left: newleft, display: 'block'});
    });
    
    // close the name option button
    $('#closecode').click(function (e) {
        e.preventDefault();
        $('#cat_code').hide();
    });
    
    
    // on code change 
    $('#cat_code_save').click(function (e) {
            e.preventDefault();
            
            var new_name = $('[name="new_cat_code"]').val();
            var cat_id   = $('[name="new_cat_code"]').data('cat_id'); // gets value
            
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('super_admin/size_codeupdate') ?>',
                    dataType: 'json',
                    data: {
                            cat_id: cat_id,
                            code: new_name
                            }
                }).done(function (data) {
                    
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
                        content: 'Success! Size Code '+ new_name +' Updated',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                    });
                    $('#cat_code').hide();
                    $('.cat_codediv_'+cat_id).html(data);
                });
    });
 
</script> 

