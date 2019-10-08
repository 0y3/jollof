<style>
.red
{
    color: red;
}
.green
{
    color: green;
}
</style>

<!-- Modal -->
                
                    <div class="modal-dialog modal-width" style=" margin-top: 60px;">
                    
                        <div class="modal-content modal-center">
                    
                            <div class="modal-header mod-head" >
                
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                
                                <h3 class="modal-title text-left"><b>Product Inventory </b></h3>
                
                            </div>
                            
                            <div class="modal-body">
                  
                                <form id="loc_form" action="<?= site_url('super_admin/fashionsizecategoryupdate') ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                    
                                    <div class="col-md-12">
                                    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable get_error" style="display: none;">
                
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>

                                        <span class="error_msgr_lg"> </span>

                                    </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <img class="db_prdimg" src="<?= base_url()?>assets/uploads/fashion_prod/<?=$imgname?>">
                                        <label class="col-md-3 control-label" for="save_name">Inventory</label>

                                        <div class="col-md-7 text-center">
                                            <b>Variables</b> 
                                        </div>

                                    </div>
                                    <?php foreach ($inv as $prd) :?>
                                    <div class="form-group">

                                        <div class="col-md-3 control-label" style=" padding-top: 0px;">
                                            <?php
                                            if(!empty($prd['colorimagename']))
                                                {
                                                $colorname=$prd['colorimagename'];
                                                }
                                            else
                                                {
                                                $colorname=$prd['colorname'];
                                                }
                                            ?>
                                            <span>Color: <b><?=$colorname;?></b></span>
                                            <br>
                                            <?php if(!empty($prd['sizename']) ): ?>
                                            <span>Size: <b><?=$prd['sizename'];?>-<?=$prd['sizecode'];?></b> </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-4">
                                          <div  style=" position: absolute;">
                                            <div class="price_<?=$prd['id'];?>" > &nbsp;
                                                <a href="javascript:void(0);" class="editprice" data-price_id="<?=$prd['id'];?>" data-price="<?=$prd['price'];?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Price: <b class="price_value_<?=$prd['id'];?>">₦<?=$prd['price'];?></b>
                                            </div>
                                            <div id="prd_price" class="_price prd_price<?=$prd['id'];?> " style=" position: relative; top: -18px;">
                                                <input type="number" data-price_id="" data-type="" name="new_prd_price" class="form-control cu_phone_js new_prd_price<?=$prd['id'];?>" min="" value="" >
                                                <a  id="prd_price_save" class="btn btn-success saveEditprice">
                                                    <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                                                    <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                                                </a>
                                                <a href="" id="closeorder" class="btn btn-danger closeorder">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <?php if(!empty($prd['discount_price']) ): ?>
                                            
                                            <div class="showdisco disco_price_<?=$prd['id'];?>"> &nbsp;
                                                <a href="javascript:void(0);" title="Add/Edit Product Discount-OFF" class=" editdisco" data-disco_id="<?=$prd['id'];?>" data-disco_price="<?=$prd['discount_price'];?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Discount-off: <b class="disco_value_<?=$prd['id'];?>"> ₦<?=$prd['discount_price'];?></b>
                                            </div>
                                            <div id="prd_price" class="_price prd_disco<?=$prd['id'];?> " style=" position: relative; top: -35px;">
                                                <input type="number" data-price_id="" data-type="" name="new_prd_price" class="form-control cu_phone_js new_prd_price<?=$prd['id'];?>" min="" value="" >
                                                <a  id="prd_price_save" class="btn btn-success saveEditprice">
                                                    <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" id="closeorder" class="btn btn-danger closeorder">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            
                                            <?php else:?>
                                            
                                            <div class="showdisco disco_price_<?=$prd['id'];?>"> &nbsp;
                                                <a href="javascript:void(0);" title="Add/Edit Product Discount-OFF" class=" editdisco" data-disco_id="<?=$prd['id'];?>" data-disco_price="<?=$prd['discount_price'];?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                Discount-off: <b class="disco_value_<?=$prd['id'];?>"><?=$prd['discount_price'];?></b>
                                            </div>
                                            <div id="prd_price" class="_price prd_disco<?=$prd['id'];?> " style=" position: relative;top: -35px;">
                                                <input type="number" data-price_id="" data-type="" name="new_prd_price" class="form-control cu_phone_js new_prd_price<?=$prd['id'];?>" min="" value="" >
                                                <a  id="prd_price_save" class="btn btn-success saveEditprice">
                                                    <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                                                    <!--<i class="fa fa-spinner fa-spin fa-fw yesSaveEdit"></i> -->
                                                </a>
                                                <a href="" id="closeorder" class="btn btn-danger closeorder">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <div class="col-md-4" >
                                            <?php
                                            if($prd['productinstock']>10)
                                                {
                                                $stockcolor='green';
                                                }
                                            else
                                                {
                                                $stockcolor='red';
                                                }
                                            ?>
                                            <div class="stock_price_<?=$prd['id'];?>" style=" position: absolute;"> &nbsp;
                                                <a href="javascript:void(0);" class="editstock" data-stock_id="<?=$prd['id'];?>" data-stock="<?=$prd['productinstock'];?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a> &nbsp;
                                                In Stock: <b class="stock_value_<?=$prd['id'];?> <?=$stockcolor;?>"><?=$prd['productinstock'];?></b>
                                            </div>
                                            <div id="prd_price" class="_price prd_stock<?=$prd['id'];?> " style=" position: relative;">
                                                <input type="number" data-price_id="" data-type="" name="new_prd_price" class="form-control cu_phone_js new_prd_price<?=$prd['id'];?>" min="" value="" >
                                                <a  id="prd_price_save" class="btn btn-success saveEditprice">
                                                    <i class="fa fa-floppy-o noSaveEdit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" id="closeorder" class="btn btn-danger closeorder">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <?php endforeach; ?>


                                    <div class="form-group form-actions">

                                        <div class="col-md-9 col-md-offset-3 div_reset">

                                            <!--<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> &nbsp; Update All &nbsp; </button>-->

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
    // Edit Price  
    $("#modal_stock").on("click",".editprice", function(e){
        e.preventDefault();
        
        $('[name="new_prd_price"]').val('');
        var price_Id = $(this).data('price_id');
        var price = $(this).data('price');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','price'); // sets value
        
        $('._price').hide();
        $('.disco_price_'+price_Id).hide();
        $('.prd_price'+price_Id).css({ display: 'block'});
        
        var position = $(this).offset(); //position()
        /*
        var xPos = e.pageX - position.left;
        var yPos = e.pageY - position.top;
        $('#prd_price').css({top: yPos, left: yPos, display: 'block'});
        */
       
        /*
        var newtop = position.top - 0;
        var newleft = position.left - 5;
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
        */
       
       /*
        var $this = $(this); // or use $(e.target) in some cases;
        var offset = $this.offset();
        var width = $this.width();
        var height = $this.height();
        var posX = offset.left;
        var posY = offset.top;
        var x = e.pageX-posX;
            x = parseInt(x/width*100,10);
            x = x<0?0:x;
            x = x>100?100:x;
        var y = e.pageY-posY;
            y = parseInt(y/height*100,10);
            y = y<0?0:y;
            y = y>100?100:y;
        console.log(x+'% '+y+'%');
        $('#prd_price').css({top: y+'%', left: x+'%', display: 'block'});
        */
       
    });
    
    // Edit Discount Price  
    $("#modal_stock").on("click",".editdisco", function(e){
        e.preventDefault();
        
        $('[name="new_prd_price"]').val('');
        var price_Id = $(this).data('disco_id');
        var price = $(this).data('disco_price');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','discount'); // sets value
        
        $('._price').hide();
        $('.prd_disco'+price_Id).css({ display: 'block'});
        /*
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
        */
    });
    
    
    // Edit Stock   
    $("#modal_stock").on("click",".editstock", function(e){
        e.preventDefault();
        
        $('[name="new_prd_price"]').val('');
        var price_Id = $(this).data('stock_id');
        var price = $(this).data('stock');
        
        $('[name="new_prd_price"]').val(price);
        $('[name="new_prd_price"]').data('price_id',price_Id); // sets value
        $('[name="new_prd_price"]').data('type','stock'); // sets value
        
        $('._price').hide();
        $('.prd_stock'+price_Id).css({ display: 'block'});
        
        /*
        var position = $(this).offset(); //position();
        var newtop = position.top - 5;
        var newleft = position.left - 5;
        
        $('#prd_price').css({top: newtop, left: newleft, display: 'block'});
        */
    });
    
    // close the status option button
    //$("#modal_stock").on("click",".closeorder", function(e){
    $('.closeorder').click(function (e) {
        e.preventDefault();
        $('._price').hide();
        $('.showdisco').show();
        //$('#prd_price').hide();
    });
    
    $('[name="new_prd_price"]').keyup(function() { 
        //alert($(this).val()); 
        $('[name="new_prd_price"]').val($(this).val());
    });
    
    // on  price change 
    $('.saveEditprice').click(function (e) {
            e.preventDefault();
            var url='';
            var div_value='';
            var data_class='';
            var nametype;
            var _id_   = $('[name="new_prd_price"]').data('price_id'); // gets value
            var type_     = $('[name="new_prd_price"]').data('type'); // gets type
            var new_value = $('[name="new_prd_price"]').val();
            
            if(type_==='price')
            {
                url='<?= site_url('fashion_admin/prd_priceupdate') ?>';
                nametype='price';
                div_value='.price_value_'+_id_;
                data_class='.price_'+_id_;
            }
            else if(type_==='discount')
            {
                url='<?= site_url('fashion_admin/prd_dispriceupdate') ?>';
                nametype='disco';
                div_value='.disco_value_'+_id_;
                data_class='.disco_price_'+_id_;
            }
            else if(type_==='stock')
            {
                url='<?= site_url('fashion_admin/prd_stockupdate') ?>';
                nametype='stock';
                div_value='.stock_value_'+_id_;
                data_class='.editstock';
                data_class='.stock_price_'+_id_;
            }
            else{
                url='';
            }
            
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('fashion_admin/pricestock_update') ?>',
                    dataType: 'json',
                    data:{
                            value:new_value,
                            _id:_id_,
                            _type:type_
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
                            content: 'Success!  Update',
                            delayOnHover: true,
                            showCountdown: true,
                            closeButton: true
                        });
                        dataTable.ajax.reload();
                        //$('.cat_orderdiv_'+cat_id_).html(html);
                        
                    } 
                    
                });
            $(div_value).html(new_value);
            //$(data_class).find('a[data-'+nametype+'_id="'+_id_+'"]')
            $(data_class).find('a[data-'+nametype+'_id="'+_id_+'"]').attr('data-'+nametype,new_value); // sets value
            $('[name="new_prd_price"]').val('');
            $('._price').hide();
            $('.showdisco').show();
        
    });
 
</script> 
