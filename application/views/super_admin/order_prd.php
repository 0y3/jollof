                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<style>
    td{
        
    }
    .added_menu table tr{
    padding: 0px !important;
    margin: 0 !important;
    }
    .added_menu table tr td{
        padding:2px 10px !important;
    }
    .added_menu table tr td:last-child {
        font-weight: 800;
        padding-right: 10px !important;
    }
    .added_menu table tr td:first-child {
        color: #1bbae1;
        font-weight: 800;
    }
</style>        
                <?php foreach ($order_d as $details) :?>    
                    <div class="row text-center">

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra themed-background-success">

                                    <h4 class="widget-content-light"><strong><?= $details['ordercode']; ?></strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><?= date('jS M \,Y ', strtotime($details['createdat'])); ?></span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra themed-background-success">

                                    <h4 class="widget-content-light"><i class="fa fa-paypal"></i> <strong>Payment</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-check"></i></span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">
                                <?php
                                    $del_bg = null;
                                    $dal_dt=null;
                                    $bg=null;
                                    $status = null;
                                    $st_w = null;
                                    $st=null;
                                    
                                    $total= $details['quantity'] * $details['price'];
                                    
                                    if ($details['status'] == '1')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            $bg='label_pending';
                                            $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> pending </strong> </span> &nbsp;
                                                    <a href="javascript:void(0)" id="ord_pro " data-get="'.$details['id'].'" data-toggle="tooltip" title="Accept Order" class="ord_pro btn btn-xs btn-warning"><i class="fa fa-fast-forward"></i></a>
                                                    ';
                                            $st = '';
                                            $st_w='Pending';
                                            
                                        }
                                        
                                    else if ($details['status'] == '2')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            
                                            $bg='themed-background-warning';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> pending </strong> </span> &nbsp;
                                                    <a href="javascript:void(0)" id="ord_pro " data-get="'.$details['id'].'" data-toggle="tooltip" title="Move to delivery" class="ord_del btn btn-xs btn-warning"><i class="fa fa-fast-forward"></i></a>
                                                    ';
                                             
                                            $st = 'text-warning';
                                            $st_w='Processing';
                                        }
                                        
                                    else if ($details['status'] == '3')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $del_dt = '<span class="h2 text-muted animation-pulse"><i class="fa fa-ellipsis-h"></i></span>';
                                            
                                            $bg='themed-background-info';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> In Delivery </strong> </span> &nbsp;
                                                    <!--<a href="javascript:void(0)" id="ord_pro " data-get="'.$details['id'].'" data-toggle="tooltip" title=" In Delivery" class="ord_indel btn btn-xs btn-info"><i class="fa fa-fast-forward"></i></a>-->
                                                    ';
                                             
                                            $st = 'text-info';
                                            $st_w='In Delivery';
                                        }
                                    else if ($details['status'] == '4')
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
                                                    <a href="javascript:void(0)" id="ord_pro " data-get="'.$details['id'].'" data-toggle="tooltip" title="Canceled Order" class="ord_indel btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                    ';
                                             
                                            $st = 'text-danger';
                                            $st_w='Cancel';
                                        
                                        }
                                ?>  
                                <div class="widget-extra <?=$bg; ?>">

                                    <h4 class="widget-content-light <?=$bg; ?>"><i class="fa fa-archive"></i> <strong>Packaging</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h2 <?=$st; ?>"> <?=$st_w; ?> </span></div>

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

                        </div>

                        <div class="table-responsive">

                            <table class="table table-bordered table-vcenter">

                                <thead>

                                    <tr>

                                        <th class="text-center" style="width: 200px;">Restaurant</th>
                                        
                                        <th class="text-center" style="width: 200px;">Menu</th>

                                        <th>Description</th>

                                        <th class="text-center">Action</th>

                                        <th class="text-center">QTY</th>

                                        <th class="text-right" style="width: 10%;">UNIT COST</th>

                                        <th class="text-right" style="width: 10%;">PRICE</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    <tr>

                                        <td class="text-center"><a href=""><strong><?=$details['rest_name']?></strong></a></td>
                                        
                                        <td class="text-center">
                                            <a href=""><strong><?=$details['productname']?></strong></a>
                                            <?= $details['addedmenu'] ?>
                                        </td>

                                        <td><?=$details['note']?></td>

                                        <td class="text-center">
                                            <?=$status;?>
                                        </td>

                                        <td class="text-center"><strong><?=$details['quantity']?></strong></td>

                                        <td class="text-right"><strong>₦<?=$details['price']?></strong></td>

                                        <td class="text-right"><strong>₦<?=$total?></strong></td>

                                    </tr>

                                    <!--<tr>

                                        <td colspan="5" class="text-right text-uppercase"><strong>Total Price:</strong></td>

                                        <td class="text-right"><strong>₦975,00</strong></td>

                                    </tr>

                                    <tr>

                                        <td colspan="5" class="text-right text-uppercase"><strong>Total Paid:</strong></td>

                                        <td class="text-right"><strong>₦975,00</strong></td>

                                    </tr>

                                    <tr class="active">

                                        <td colspan="5" class="text-right text-uppercase"><strong>Total Due:</strong></td>

                                        <td class="text-right"><strong>₦0,00</strong></td>

                                    </tr>-->

                                </tbody>

                            </table>

                        </div>

                    </div>
            
                   
                    <div class="col-sm-6">

                        <div class="block">
                            
                            <div class="block-title">

                                <h2><i class="fa fa-building-o"></i> <strong>Shipping</strong> Address</h2>

                            </div>
                            <?php foreach ($details['orderid'] as $or):?>
                            <h4><strong><?=$or['firstname'].' &nbsp; '.$or['lastname'] ?></strong></h4>
                            
                            <address>
                                <?=$or['address'] ?><br>
                                <?=$or['city'][0]['cityname']?><br>
                                <?=$or['state'][0]['statename']?><br><br>
                                <i class="fa fa-phone"></i> <?=$or['phone'] ?><br>
                                <i class="fa fa-phone"></i> <?=$or['phone2'] ?><br>
                                <!--<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">demo.denko@yahoo.com</a>-->

                            </address>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="block">
                            
                            <div class="block-title">

                                <h2><i class="fa fa-building-o"></i> <strong>User</strong> Info</h2>

                            </div>
                            <?php foreach ($details['orderid'] as $usr):?>
                            <h4 id="<?=$usr['accountinfo'][0]['id']?>">
                                <strong>Name : </strong><strong><?=$usr['accountinfo'][0]['firstname'].' &nbsp; '.$usr['accountinfo'][0]['lastname'] ?></strong>
                            </h4>
                            
                            <address>
                                <strong>Email : </strong> <?=$usr['accountinfo'][0]['email']?><br><br>
                                <strong> Gender : </strong> <?=$usr['accountinfo'][0]['gender'] ?><br>
                                <strong> Phone : </strong> <?=$usr['accountinfo'][0]['phone'] ?><br>
                                <strong> Mobile : </strong> <?=$usr['accountinfo'][0]['phone2'] ?><br>
                                <!--<i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">demo.denko@yahoo.com</a>-->

                            </address>
                            <?php endforeach; ?>
                        </div>

                    </div>
                
                <?php endforeach; ?>

<script>
    $('.nav_o').addClass('active');
    
    $("[data-toggle=tooltip]").tooltip();
    
</script>

<script>
    
    function notice() {
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
                content: 'Success!  Order Updated',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
        }
    function noticefales(){
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
                color: 'red',
                autoClose: Math.random() * 8000 + 2000,
                content: 'Error! Updating Order',
                delayOnHover: true,
                showCountdown: true,
                closeButton: true
            });
    }

    //  the status process button
    $(".table-responsive").on("click",".ord_pro", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'pro',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status == '1')
                    {
                        notice();
                        location.reload();
                        $('.ord_nav_tray').load("<?= site_url('super_admin/order_nav_tray') ?>");
                    }
                    else{ noticefales(); }
                }

            });
    });
    
    //  the status Delivery button
    $(".table-responsive").on("click",".ord_del", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'del',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status == "1")
                    {
                        notice();
                        location.reload();
                        $('.ord_nav_tray').load("<?= site_url('super_admin/order_nav_tray') ?>");
                    }
                    else{noticefales();}
                    
                }

            });
    });
    
    //  the status Canceled button
    $(".table-responsive").on("click",".ord_can", function(e){
        e.preventDefault();
        
        
        var ord_id_   = $(this).data('get'); // gets value
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('super_admin/update_order_flow') ?>',
                dataType: 'json',
                data:{
                        order:'can',
                        ord_id:ord_id_
                    },
                success:function(html){
                
                    if(html.status === '1'){
                        notice();location.reload();//dataTable.ajax.reload();
                        $('.ord_nav_tray').load("<?= site_url('super_admin/order_nav_tray') ?>");
                    }
                    else
                    {
                        noticefales();
                    }
                }

            });
    });
</script>
