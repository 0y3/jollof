
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<style>
    .widget{
        border: 1px solid #eaedf1;
    }
.widget .widget-extra {
    padding-top: 1px;
    padding-bottom: 1px;
}
.widget .widget-extra, .widget .widget-extra-full {
    position: relative;
    padding: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
}
.widget .widget-content-light {
    color: #fff;
}
.themed-color-dark {
    color: #394263
}

.themed-border-dark {
    border-color: #394263
}

.themed-background-dark {
    background-color: #394263
}

.themed-background-danger {
    background-color: #e74c3c!important
}

.themed-background-warning {
    background-color: #e67e22!important
}

.themed-background-info {
    background-color: #3498db!important
}

.themed-background-success {
    background-color: #27ae60!important
}

.themed-background-muted {
    background-color: #999!important
}

.themed-background-muted-light {
    background-color: #f9f9f9!important
}
.text-muted {
  color: #777;
}
.text-primary {
  color: #428bca;
}
a.text-primary:hover {
  color: #3071a9;
}
.text-success {
  color: #3c763d;
}
a.text-success:hover {
  color: #2b542c;
}
.text-info {
  color: #31708f;
}
a.text-info:hover {
  color: #245269;
}
.text-warning {
  color: #8a6d3b;
}
a.text-warning:hover {
  color: #66512c;
}
.text-danger {
  color: #a94442;
}
a.text-danger:hover {
  color: #843534;
}
.bg-primary {
  color: #fff;
  background-color: #428bca;
}
a.bg-primary:hover {
  background-color: #3071a9;
}
.bg-success {
  background-color: #dff0d8;
}
a.bg-success:hover {
  background-color: #c1e2b3;
}
.bg-info {
  background-color: #d9edf7;
}
a.bg-info:hover {
  background-color: #afd9ee;
}
.bg-warning {
  background-color: #fcf8e3;
}
a.bg-warning:hover {
  background-color: #f7ecb5;
}
.bg-danger {
  background-color: #f2dede;
}
a.bg-danger:hover {
  background-color: #e4b9b9;
}
.widget .widget-extra, .widget .widget-extra-full {

    position: relative;
    padding: 15px;

}
.block {
    margin: 0 0 10px;
    margin-bottom: 10px;
    padding: 20px 15px 1px;
    padding-right: 15px;
    padding-left: 15px;
    background-color: #fff;
    border: 1px solid #dbe1e8;
}
.block-title {
    margin: -20px -15px 20px;
    margin-right: -15px;
    margin-left: -15px;
    background-color: #f9fafc;
    border-bottom: 1px solid #eaedf1;
}
.block-options {
    margin: 0 6px;
    line-height: 37px;
}
.block-title h1, .block-title h2, .block-title h3 {
    padding-left: 15px;
    padding-right: 15px;
}
.block-title h1, .block-title h2, .block-title h3, .block-title h4, .block-title h5, .block-title h6 {
    display: inline-block;
    font-size: 16px;
    line-height: 1.4;
    margin: 0;
    padding: 10px 16px 7px;
        padding-right: 16px;
        padding-left: 16px;
    font-weight: 400;
}
tr th{
    font-weight: bold;
}
.label_pending {
    background-color: #394263;
}
</style>
<div id="profileorder" class="breadcrumb-area  hm-4-padding">
    <div class="container">
        <div class="breadcrumb-content text-center ptb-30">
            <ul>
                <li><a href="<?=site_url('accounts/order')?>">Orders </a> <i class="ion-ios-arrow-right"></i></li>
                <li class="active">Order Details</li>
            </ul>
        </div>
    
    
    <?php if(!empty($allData)): ?>
    
    <?php foreach ($allData as $details) :?>
    
                <div class="row text-center" style="margin-bottom: 20px; ">

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra themed-background-success">

                                    <h4 class="widget-content-light"><strong><?= $details['ordercode']; ?></strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><?= date('jS M \,Y ', strtotime( $details['order_date'])); ?></span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra themed-background-success">

                                    <h4 class="widget-content-light"><i class="fa fa-paypal"></i> <strong>Payment Type</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"> <?= $details['deliverytype']; ?> <i class="fa fa-check"></i></span></div>

                            </div>

                        </div>

                        <?php
                                    $del_bg = null;
                                    $dal_dt=null;
                                    $bg=null;
                                    $status = null;
                                    $st_w = null;
                                    $st=null;
                                    $confirm=null;
                                    
                                    $total= $details['quantity'] * $details['price'];
                                    
                                    if ($details['order_status'] == '1')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            $bg='label_pending';
                                            $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> pending </strong> </span> &nbsp;
                                                    ';
                                            $confirm = '<a href="" id=" '.$details['order_id'].'" class="confirmorder btn btn-default " > Confirm order Received</a>';
                                            $st = '';
                                            $st_w='Pending';
                                            
                                        }
                                        
                                    else if ($details['order_status'] == '2')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            
                                            $bg='themed-background-warning';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> pending </strong> </span> &nbsp;
                                                    ';
                                             
                                            $confirm = '<a href="" id=" '.$details['order_id'].'" class="confirmorder btn btn-default " > Confirm order Received</a>';
                                            
                                            $st = 'text-warning';
                                            $st_w='Processing';
                                        }
                                        
                                    else if ($details['order_status'] == '3')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            
                                            $bg='themed-background-info';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> In Delivery </strong> </span> &nbsp;
                                                    ';
                                            $confirm = '<a href="" id=" '.$details['order_id'].'" class="confirmorder btn btn-default " > Confirm order Received</a>'; 
                                             
                                            $st = 'text-info';
                                            $st_w='Dispatched';
                                        }
                                    else if ($details['order_status'] == '4')
                                        {
                                           $del_bg ='themed-background-success';
                                           $del_dt = '<span class="h2 text-success animation-expandOpen"><i class="fa fa-check"></i></span>'; 
                                           
                                           $bg='themed-background-success';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> Delivery </strong> </span> &nbsp;
                                                    ';
                                             
                                            $st = 'text-success';
                                            $st_w='Delivery';
                                        }
                                        
                                    else 
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            
                                            $bg='themed-background-danger';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong>Cancel </strong> </span> &nbsp;
                                                    ';
                                             
                                            $st = 'text-danger';
                                            $st_w='Cancel';
                                        
                                        }
                                ?> 

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">
                                 
                                <div class="widget-extra <?= $bg ?>">

                                    <h4 class="widget-content-light"><i class="fa fa-archive"></i> <strong>Packaging</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 <?=$st ?>"> <?=$st_w ?> </span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra <?= $del_bg?>">

                                    <h4 class="widget-content-light "><i class="fa fa-truck"></i> <strong>Delivery</strong></h4>

                                </div>

                                <div class="widget-extra-full"> <?= $del_dt?> </div>

                            </div>

                        </div>

                    </div>

                    <div class="block">

                        <div class="block-title">

                            <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= $details['productid'] ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="add to cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>

                            </div>

                        </div>

                        <div class="table-responsive" style="padding-bottom:10px;">

                            <table class="table table-bordered table-vcenter">

                                <thead>

                                    <tr>

                                        <th class="text-center" style="width: 200px;">Menu</th>

                                        <th>Description</th>

                                        <th class="text-center">Action</th>

                                        <th class="text-center">QTY</th>


                                        <th class="text-right" style="width: 10%;">PRICE</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    <tr>

                                        <td class="text-center">
                                            <a href=""><strong><?= $details['productname'] ?></strong></a>
                                            <?= $details['addedmenu'] ?>
                                        </td>

                                        <td>
                                            <?php if(!empty($details['product_fashionid'])): ?>
                                                <p><b>color</b> : <?= $details['color'] ?></p>
                                                <p><b>size</b> : <?= $details['size'] ?></p>
                                            <?php else: ?>
                                                <?= $details['note'] ?> 
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?=$status;?>    
                                        </td>

                                        <td class="text-center"><strong><?= $details['quantity'] ?></strong></td>

                                        <td class="text-right"><strong>₦<?= $details['price'] ?></strong></td>

                                    </tr>

                                    <!--<tr>

                                        <td colspan="4" class="text-right text-uppercase"><strong>Total Price:</strong></td>

                                        <td class="text-right"><strong>₦975,00</strong></td>

                                    </tr>

                                    <tr>

                                        <td colspan="4" class="text-right text-uppercase"><strong>Total Paid:</strong></td>

                                        <td class="text-right"><strong>₦975,00</strong></td>

                                    </tr>

                                    <tr class="active">

                                        <td colspan="4" class="text-right text-uppercase"><strong>Total Due:</strong></td>

                                        <td class="text-right"><strong>₦0,00</strong></td>

                                    </tr>-->

                                </tbody>

                            </table>
                            
                            <?= $confirm ?>
                           

                        </div>

                    </div>
            
                    <div class="row">
                        
                        <div class="col-sm-6">

                            <div class="block">

                                <div class="block-title">

                                    <h2><i class="fa fa-building-o"></i> <strong>Delivery </strong> Address</h2>

                                </div>
                                <h4><strong><?= $details['firstname'] ?>   <?= $details['lastname'] ?></strong></h4>

                                <address>

                                    <?= $details['address'] ?> <br>
                                    <?= $details['cityname'] ?><br>
                                    <?= $details['statename'] ?><br><br>
                                    <i class="fa fa-phone"></i> <?= $details['phone'] ?><br>
                                    <i class="fa fa-phone"></i> <?= $details['phone2'] ?><br>
                                    <!--<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">demo.denko@yahoo.com</a>-->

                                </address>
                            </div>

                        </div>
                    </div>
    
    <?php endforeach; ?>
    <?php else: ?>


        <div class="col-sm-12 alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Oh snap!</strong>
            Sorry No Order Info .
        </div>

    <?php endif; ?>
    </div>
    
</div>
    
<!-- Modal confirm order  -->
    <div class="modal" id="empty_confirmModal" style="display: none; ">
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

<script >
    
     //  the status process button
    var empty_msg = "Are you sure you want to Confirm this Order?";
    $("body").on("click",".confirmorder", function(e){
        e.preventDefault();
        
        confirmDialog(empty_msg, function(){
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('accounts/confirmorder/'.$details['order_id']) ?>',
                dataType: 'json',
                data:{
                        order:'pro',
                    },
                success:function(html){
                
                    if(html.status == '1')
                    {
                        location.reload();
                    }
                    else{  }
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