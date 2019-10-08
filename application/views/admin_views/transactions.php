
<script type="text/javascript">
var merchantid = "<?=@$filterparams['merchantid']?>";
var pharmacyid = "<?=@$filterparams['pharmacyid']?>";
var createdat = "<?=@$filterparams['createdat']?>";
var productid = "<?=@$filterparams['productid']?>";
var customerid = "<?=@$filterparams['customerid']?>";
var paymenttype = "<?=@$filterparams['paymenttype']?>";

function loadstores()
{
	$('#merchantid').html("<option value=\"all\">All Stores</option>");
	var pharmacyid = $('#pharmacyid').val();
	// make jQuery post to the server
	$.post('<?=site_url('api/loadstores')?>', {pharmacyid: pharmacyid}, function(data) 
	{
		data = "<option value=\"all\">All Stores</option>" + data
		$('#merchantid').html(data);
	});
}
</script>

	<?php include_once 'transaction-filter-all.php'; ?>


	
	
	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=number_format(@$totalpurchases)?></h3>

              <p>Total purchases</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(@$totalfreepurchases)?></h3>

              <p>Total free drugs issued</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        
        
        
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(@$totaldiscounteddrugs)?></h3>

              <p>Total discounted drugs issued</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(@$totalmerchants)?></h3>

              <p>Total stores with purchases</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-checkmark-circle"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(@$totalcustomers)?></h3>

              <p>Total customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->utility->formatFigures($total_customers_eligible)?></h3>

              <p>Customers eligible for free drugs</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-pricetags"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?=number_format($total_customers_eligible_discounted)?></h3>

              <p>Customers eligible for discounted drugs</p>
            </div>
            <div class="icon">
              <i class="ion ion-happy"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        
        
        
        
        
      </div>
      <!-- /.row -->
	
	
	
	
	

	<div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
              
             <table class="table table-bordered">
             <caption><b>Customer Purchases</b>
             <br />Total Entries: <?=number_format($totalrecords)?>
             </caption>
              <thead>
                  <tr>
                  	  <th>Date</th>
                      <th>PID</th>
                      <th>Store</th>
                      <th>Customer</th>
                      <th>Orange Card ID</th>
                      <th>Product</th>
                      <th>Purchase Type</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if(isset($transactions) && $transactions != false)
                      {
                          foreach($transactions as $transaction)
                          {
                  ?>
                  <tr>
                  	  
                  	  <td><?=date("M d, Y h:i A", strtotime($transaction['createdat']))?></td>
                  	  <td><?=$transaction['id']?></td>
                      <td><?=$transaction['merchantname']?></td>
                      <td><?=$transaction['customercode']?></td>
                      <td><?=$transaction['orangecardid']?></td>
                      <td><?=$transaction['productname']?></td>
                      <td>
                      <?PHP 
                      if($transaction['paymenttype']==1)
                      	echo'<span class="label label-success">Full payment</span>';
                      else if($transaction['paymenttype']==2)
                      	echo'<span class="label label-primary">Free</span>'; 
                      else if($transaction['paymenttype']==3)
                      	echo'<span class="label label-warning">50% discount</span>';?></td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
               </tbody>
              </table>
              
              <div id="pagenation">
              	<?PHP if(isset($pagenation)) echo $pagenation; ?>
              </div>
              
              
                
              </div>
              <!-- /.box-body -->
              
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- Main row -->
      <div class="row">
      	
      	<!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          
          
          
          
          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Purchase Trend</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
      </section>
      
      
      
      
      
    </div>