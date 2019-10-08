
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
                        <li><a href="<?=site_url('accounts/table_reservation')?>">Table Reservationrs </a> <i class="ion-ios-arrow-right"></i></li>
                        <li class="active">Table Reservationrs Details</li>
                    </ul>
                </div>
    
    
    <?php if(!empty($allData)): ?>
    
    <?php foreach ($allData as $details) :?>
    
                <div class="row text-center" style="margin-bottom: 20px; ">

                        <?php
                                    $del_bg = null;
                                    $dal_dt=null;
                                    $bg=null;
                                    $status = null;
                                    $st_w = null;
                                    $st=null;
                                    $confirm=null;
                                    
                                    if ($details['requeststatus'] == '1')
                                        {
                                            $del_bg ='themed-background-muted';
                                            $bg='label_pending';
                                            $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> pending </strong> </span> &nbsp;
                                                    ';
                                            $confirm = '<a href="" id="" data-get=" '.$details['id'].'" class="confirmorder btn btn-default " >Cancel Table Reservation</a>';
                                            $st = '';
                                            $st_w='Pending';
                                            
                                        }
                                    else if ($details['requeststatus'] == '4')
                                        {
                                           $del_bg ='themed-background-success';
                                           
                                           $bg='themed-background-success';
                                             $status='
                                                    <span class="label '.$bg.'" style=" font-size: 14px;"><strong> Approved </strong> </span> &nbsp;
                                                    ';
                                             
                                            $st = 'text-success';
                                            $st_w='Approved';
                                        }
                                        
                                    else 
                                        {
                                            $del_bg ='themed-background-muted';
                                            
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

                                    <h4 class="widget-content-light"><strong>Schedule Day</strong></h4>

                                </div>

                                <div class="widget-extra-full" style=" padding-top:2px; padding-bottom:2px; "><span class="h4  <?=$st ?> animation-expandOpen"><?= date('jS M \,Y ', strtotime( $details['checkindate'])); ?><br> <?= date(' g:i A', strtotime($details['checkintime'])); ?></span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra <?= $bg ?>">

                                    <h4 class="widget-content-light"> <strong>Booking ID</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h4 <?=$st ?> animation-expandOpen"><?= $details['tablecode']; ?> </span></div>

                            </div>

                        </div>

                         

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">
                                 
                                <div class="widget-extra <?= $bg ?>">

                                    <h4 class="widget-content-light"> <strong>Contact Name</strong></h4>

                                </div>

                                <div class="widget-extra-full"><span class="h4 <?=$st ?>"> <?=$details['contactname']; ?> </span></div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <div class="widget">

                                <div class="widget-extra <?= $bg?>">

                                    <h4 class="widget-content-light "> <strong>Guest No.</strong></h4>

                                </div>

                                <div class="widget-extra-full"> <span class="h4 <?=$st ?> animation-expandOpen"><?= $details['numguest']; ?><i class="fa fa-check"></i></span> </div>

                            </div>

                        </div>

                    </div>

                    <div class="block">

                        <div class="block-title">

                            <h2><i class="fa fa-shopping-cart"></i> <strong>Products</strong></h2>
                            
                            <div class="block-options pull-right">

                                <!--<a href="" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="add to cart"><i class="fa fa-shopping-cart"></i> Add to cart</a>-->

                            </div>

                        </div>

                        <div class="table-responsive" style="padding-bottom:10px;">

                            <table class="table table-bordered table-vcenter">

                                <thead>

                                    <tr>

                                        <th class="text-center">Restaurant</th>
                                        <th>Note</th>
                                        <th class="text-center" >Contact Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Action</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    <tr>

                                        <td class="text-center">
                                            <a href=""><strong><?= $details['companyname'] ?></strong></a>
                                        </td>

                                        <td> <?= $details['contactnote'] ?> </td>
                                        <td class="text-center"><?= $details['contactname'] ?></td>
                                        <td class="text-center"><?= $details['contactemail'] ?></td>
                                        <td class="text-center"><?= $details['contactphone'] ?></td>
                                        <td class="text-center"> <?=$status;?> </td>

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

                                    <h2><i class="fa fa-building-o"></i> <strong>Restaurant</strong> Address</h2>

                                </div>
                                <h4><strong><?= $details['companyname'] ?></strong></h4>

                                <address>

                                    <?= $details['rest_address'] ?> <br>
                                    <?= $details['cityname'] ?><br>
                                    <?= $details['statename'] ?><br><br>
                                    <i class="fa fa-phone"></i> <?= $details['rest_phone'] ?><br>
                                    <i class="fa fa-phone"></i> <?= $details['rest_phone2'] ?><br>
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
    var empty_msg = "Are you sure you want to Confirm this Table Reservation?";
    $("body").on("click",".confirmorder", function(e){
        e.preventDefault();
        //$details['id'])
        
        var row_id = $(this).data('get'); // gets value
        
        confirmDialog(empty_msg, function(){
        
            $.ajax({
                type:'POST',
                url:'<?= site_url('accounts/cancel_table')?>',
                dataType: 'json',
                data:{
                        tableid:row_id
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