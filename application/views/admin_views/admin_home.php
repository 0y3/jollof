<script type="text/javascript">
var merchantid = "<?=@$filterparams['merchantid']?>";
var pharmacyid = "<?=@$filterparams['pharmacyid']?>";
var createdat = "<?=@$filterparams['createdat']?>";
var productid = "<?=@$filterparams['productid']?>";
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



<?php include_once 'dashboard-filter.php'; ?>

<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=number_format($totalcustomers)?></h3>

              <p>Total accounts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?=site_url("pharmacy")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->utility->formatFigures($total_merchants)?></h3>

              <p>On-boarded Restaurants</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="<?=site_url("merchant")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(0)?></h3>

              <p>Total orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
            <a href="<?=site_url("transaction")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(0)?></h3>

              <p>Total transactions</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="<?=site_url("orangecard")?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- Main row -->
      <div class="row">
      	
      	<!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          
          
          
          
          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Drug Purchase Trend</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
          
          
          
          
          
          
          <!-- Recently completed tasks -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Store</th>
                    <th>Points Balance</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  	if(isset($recent_customers) && $recent_customers != false)
                  	{
                  		foreach ($recent_customers as $customer)
                  		{
                  ?>
                  <tr>
                    <td><?=date("M d, Y", strtotime($customer['createdat']))?></td>
                    <td><?=$customer['customercode']?></td>
                    <td><?=$customer['merchantname']?></td>
                    <td><?=$customer['pointsbalance']?></td>
                  </tr>
                  <?php
                  		} 
                  	}
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=site_url("customer")?>" class="btn btn-sm btn-default btn-flat pull-right">View All Customers</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
                
        </section>
        <!-- /left col -->
        
        <!-- Right col -->
        <section class="col-lg-6 connectedSortable">
          
          
          <!-- Recently completed tasks -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Purchases</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Store</th>
                    <th>Customer</th>
                    <th>Product</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  	if(isset($recent_transactions) && $recent_transactions != false)
                  	{
                  		foreach ($recent_transactions as $transaction)
                  		{
                  ?>
                  <tr>
                    <td><?=date("M d, Y", strtotime($transaction['createdat']))?></td>
                    <td><?=$transaction['merchantname']?></td>
                    <td><?=$transaction['customercode']?></td>
                    <td><?=$transaction['productname']?></td>
                  </tr>
                  <?php
                  		} 
                  	}
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=site_url("transaction")?>" class="btn btn-sm btn-default btn-flat pull-left">View All Purchases</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
          
          
          
          <!-- solid sales graph -->
          <div class="box box-solid bg-blue-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Free Drugs Trend</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="freedrugschart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

          
                
        </section>
        <!-- /Right col -->
        
        
        
      </div>
      
      
      
      
      
      
      
      
      
      
      <div class="row">
      	
      	<!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          
          
          
          
          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Discounted Drugs Trend</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="discounteddrugschart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
          
          
		</section>
		
	  </div>
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- Main row -->
      <div class="row">
      	
      	<!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          
          <!-- Recently completed tasks -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Top Stores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Store</th>
                    <th>Total Purchases</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  	if(isset($top_merchants) && $top_merchants != false)
                  	{
                  		foreach ($top_merchants as $merchant)
                  		{
                  ?>
                  <tr>
                    <td><?=$merchant['id']?></td>
                    <td><?=$merchant['merchantname']?></td>
                    <td><?=$merchant['total_value']?></td>
                  </tr>
                  <?php
                  		} 
                  	}
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=site_url("merchant")?>" class="btn btn-sm btn-default btn-flat pull-left">View All Stores</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          
          
          
          
          
          
          
          
          
          
          
          
          
                
        </section>
        <!-- /left col -->
        
        <!-- Right col -->
        <section class="col-lg-8 connectedSortable">
          
          
          
          
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Stats</h3>
            </div>
            <div class="box-body">
              <div id="chart-container" class="col-lg-6"></div>
              <div id="chart-container-2" class="col-lg-6"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>
        <!-- /Right col -->
        
        
        
      </div>
      
      
      