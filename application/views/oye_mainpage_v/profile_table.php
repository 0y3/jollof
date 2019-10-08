<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<style>

.display-flex {
  display: inline-flex;
  flex-wrap: wrap;
}
.fontred{
    color: #e65100; 
}
.display-inline-grid {
  display: inline-grid;
}
.webkit-box {
  display: -webkit-box;
}
.border-left {
  border-left: 1px solid #000;
}
h3 {
  color: #2a2c36 !important;
  margin: 0rem;
}
.text-bold {
  font-weight: 600;
  color: #2a2c36;
}
.padding-left-1 {
  padding-left: 1rem;
}
.padding-right-1 {
  padding-right: 1rem;
}
.padding-top-1 {
  padding-top: 1rem;
}
.padding-bottom-1 {
  padding-bottom: 1rem;
}
.padding-1 {
  padding: 1rem;
}
.padding-2 {
  padding: 2rem;
}
.padding-top-2 {
  padding-top: 2rem;
}
.padding-bottom-2 {
  padding-bottom: 2rem;
}
.no-paddings {
  padding:0rem !important;
}
.padtop {
    padding-top: 10px;
    padding-bottom: 10px;
}
.margin-top-2 {
  margin-top: 2rem;
}
.margin-bottom-0 {
  margin-bottom: 0rem;
}
.margin-bottom-1 {
  margin-bottom: 1rem;
}
.margin-bottom-2 {
  margin-bottom: 2rem;
}
.p-l-0 {
  padding-left: 0rem;
}
.box-shadow {
  box-shadow: 4px 4px 10px #ddd;
}
.background-white {
  background: #FFF;
}
.main-card .white-card {
  background-color: #fff;
  border: 1px solid #d1d4d7;
}
.main-card .status .status-id {
  padding: 2rem 0.6rem;
}
.main-card .status .status-text {
  padding-left: 1rem;
}
.main-card .status .status-text h4 {
  font-weight: 800;
  color: #FFFFFF;
}
.main-card .status p {
  font-weight: 700;
  color: #FFF;
}
.main-card .status h2 {
  font-weight: 700;
  margin: 0rem;
  line-height: 2.7rem;
}

.status.or_pending {
  background: #606782;
}
.label_pending {
    background-color: #394263;
}
.status.or_pending .status-text {
  background: #394263;
}
.status.or_pending h2 {
  color: #3e975d;
}

.status.or_delivered {
  background: #4dbd74;
}
.status.or_delivered .status-text {
  background: #41ac66;
}
.status.or_delivered h2 {
  color: #3e975d;
}

.status.or_processing {
  background: #ff9100;
}
.status.or_processing .status-text {
  background: #ff6d00;
}
.status.or_processing h2 {
  color: #e65100;
}

.status.or_indelivery {
  background: #69a6ce;
}
.status.or_indelivery .status-text {
  background: #5399c7;
}
.status.or_indelivery h2 {
  color: #e65100;
}


.status.or_canceled {
  background:#ff4d4d;
}
.status.or_canceled .status-text {
  background:#ee4f4f;
}
.status.or_canceled h2 {
  color: #e65100;
}

.li_bold {
  font-weight: 600;
}
.or_infoo {
    background-color:#ddd;
    padding: 5px;
}
.or_infoo ul{
    padding: 0px;
}
.or_infoo ul li:first-child{
    padding:0;
}
.or_infoo ul li{
    display: inline-block;
    padding:0px 20px;
}
@media (min-width: 768px) {
  body {
    font-size: 35px;
  }
}
@media (min-width: 992px) {
  body {
    font-size: 14px;
    
  }
}
    
</style>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;" >
    
    <div class="row padding-bottom-1">
        
                    <div class="block full">

                        <div class="block-title">

                            <div class="block-options pull-right">

                                <!--<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a> -->

                            </div>

                            <h2><strong>All</strong> Table Reservations</h2>

                        </div>

                    </div>
    </div>
    <?php if(!empty($allData)): ?>
    
    <?php foreach ($allData as $row_prd) :?>
    
    
    
    <div class="<?= $row_prd['id']; ?> margin-bottom-2" style="border: 1px solid #d1d4d7;">
        
        
        
            <?php
        
                $bg =null;
                $status_id=$row_prd['requeststatus'];
                
                if($status_id == '1' )
                    {
                        $bg = 'or_pending';
                        $lb_bg = 'label_pending';
                        $statusname='Pending';
                    }
                else if($status_id == '4' )
                    {
                        $bg = 'or_delivered';
                        $lb_bg = 'label-success';
                        $statusname='Approved';
                    }
                else 
                    {
                        $bg = 'or_canceled';
                        $lb_bg = 'label-danger';
                        $statusname='Canceled';
                    }
                    
                $moremenu = null;
                if (!empty($row_prd['contactnote']))
                    {
                       $moremenu= '<span class="label label-default">With Instructions</span>';
                    }
            ?>
        
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 main-card padtop display-flex">
                <div class="col-sm-12 col-md-2 col-lg-2 background-green status <?=$bg;?>">
                    <div class="row status-text">
                        <h4><?= $row_prd['tablecode']; ?></h4>
                    </div>
                    <div class="status-id">
                        <p><strong>Date & Time</strong></p>
                        <h4><?= date('jS M \, Y \ g:i A', strtotime($row_prd['createdat'])); ?></h4>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 white-card box-shadow display-flex">
                    <div class="col-sm-12 col-md-3 padding-top-2 padding-bottom-2 display-inline-grid">

                        <div>
                            <p class="text-bold margin-bottom-0">Contact Name</p>
                            <p class="margin-bottom-0"><?= $row_prd['contactname']; ?></p> 
                            <?=$moremenu?>
                        </div>

                        <div><p class="text-bold margin-bottom-0">Store Name</p>
                            <p class="margin-bottom-0">
                                <a href=""><?= $row_prd['companyname']; ?> </a>
                                </p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3 padding-top-2 padding-bottom-2 display-inline-grid" style="background: #fafafa;">

                        <div>
                           <p class="text-bold margin-bottom-0">Status</p>
                            <p class="margin-bottom-0"><span class="label <?=$lb_bg ;?>"><?= $statusname ?></span></p>
                        </div>

                        <div><p class="text-bold margin-bottom-0">Table Reserved</p>
                            <p class="margin-bottom-0">
                                <b>Date: </b>
                                <?= date('jS M \, Y ', strtotime($row_prd['checkindate'])); ?>
                                <br><b>Time: </b>
                                <?= date(' g:i A', strtotime($row_prd['checkintime'])); ?>
                                
                            </p>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-3 padding-top-2 padding-bottom-2 display-inline-grid" style="background: #fafafa;">

                        <div>
                            <p class="text-bold margin-bottom-0"> Guest No.</p>
                            <p class="margin-bottom-0"> <?= $row_prd['numguest']; ?>  </p>
                        </div>
                        <div>
                            <p class="text-bold margin-bottom-0">Email</p>
                            <p class="margin-bottom-0"> <?= $row_prd['contactemail']; ?> </p>
                        </div>
                        <div>
                            <p class="text-bold margin-bottom-0">Phone No.</p>
                            <p class="margin-bottom-0"> <?= $row_prd['contactphone']; ?> </p>
                        </div>



                    </div>
                    <div class="col-sm-12 col-md-3 display-inline-grid">
                        
                        <div class="col-md-12 no-paddings">
                            <?php
                                //$status_id=$row_prd['requeststatus'];

                                if($status_id == '5'||  $status_id == '4')
                                    {
                                        echo '
                                               <div class="col-md-12 padding-top-1">
                                                    <a id="" class="btn btn-default" href="'. site_url('accounts/table_reservation/'.$row_prd['id']).'"> View order</a>
                                                </div>
                                            ';
                                    }
                                else
                                    {
                                        echo '
                                               <div class="col-md-12 padding-top-1 ">
                                                    <a id="" class="confirmorder btn btn-default" data-get="'.$row_prd['id'].'" >Cancel Table</a>
                                                </div>

                                               <div class="col-md-12 padding-top-1">
                                                    <a id="" class="btn btn-default" href="'. site_url('accounts/table_reservation/'.$row_prd['id']).'"> View Details</a>
                                                </div>
                                            ';
                                    }
                        ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-1 p-l-0" style="display: flex; justify-content: space-between; flex-direction: column;">
                    <div style="padding: 1rem;background: #999; color: #FFF; width: 3.5rem;">
                        <span class="glyphicon glyphicon-save-file"></span>
                    </div>
                    <a href="<?= $row_prd['id']; ?>">
                    <div style="padding: 1rem; color: #999; width: 3.5rem;">
                        <span class="glyphicon glyphicon-trash fontred"></span>
                    </div>
                    </a>
                </div>

            </div>

            

        </div>
        
    </div>
    
    <?php endforeach; ?>
        <?php else: ?>


            <div class="col-sm-12 alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Oh snap!</strong>
                Sorry No Table Reservation History .
            </div>

        <?php endif; ?>
    
</div>

<!-- Modal confirm order  -->
    <div class="modal" id="empty_confirmModal" style="display: none; ">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="col-sm-12 alert alert-danger" id="empty_confirmMessage"> </div>
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
    var row_id =null;
    
    $("body").on("click",".confirmorder", function(e){
        e.preventDefault();
        row_id = $(this).data('get'); // gets value
        
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