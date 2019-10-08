
	<?php include_once 'merchant-filter.php'; ?>


	

	
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=number_format(@$totalpharmacies)?></h3>

              <p>Total pharmacies</p>
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
              <h3><?=$this->utility->formatFigures(@$totalmerchants)?></h3>

              <p>Total active stores</p>
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
              <h3><?=$this->utility->formatFigures(@$totalcardsissued)?></h3>

              <p>Assigned orange cards</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->utility->formatFigures(@$totalpurchases)?></h3>

              <p>Total purchases</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
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
             <caption><b>Restaurants</b> [ 
             
             <?php if($this->valSessObj->hasPermission("Merchant::loadform") == true){ ?>
             <a href="<?PHP echo site_url('merchant/loadform/add') ?>"><b>Add New</b></a>  
             <?php } ?>
             
             <?php if($this->valSessObj->hasPermission("Merchant::upload") == true){ ?>
              | <a href="<?PHP echo site_url('merchant/upload') ?>"><b>Bulk Upload</b></a>
             <?php } ?>
             
             <?php if($this->valSessObj->hasPermission("Merchant::cardgiveoutform") == true){ ?>
              | <a href="<?PHP echo site_url('merchant/cardgiveoutform') ?>"><b>Update Orange Cards Available</b></a>
             <?php } ?>
             
             ]
             <br />Total Entries: <?=number_format($totalrecords)?>
             </caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Pharmacy</th>
                      <th>Restaurant Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Cards Available</th>
                      <th>Cards Assigned</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action(s)</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if(isset($merchants) && $merchants != false)
                      {
                          foreach($merchants as $merchant)
                          {
                  ?>
                  <tr>
                  	  <td><?=$merchant['id']?></td>
                      <td><?=$merchant['pharmacyname']?></td>
                      <td><?=$merchant['merchantname']?></td>
                      <td><?=$merchant['merchantaddress']?></td>
                      <td><?=$merchant['merchantemail']?></td>
                      <td><?=number_format($merchant['totalavailablecards'])?></td>
                      <td><?=number_format($merchant['totalassignedcards'])?></td>
                      <td><?PHP if($merchant['merchantstatus']==1)echo'<span class="label label-success">Active</span>';
					  else echo'<span class="label label-danger">Inactive</span>'; ?></td>
                      <td><?=date("M d, Y h:i A", strtotime($merchant['createdat']))?></td>
                      <td>
                      
                      <?php if($this->valSessObj->hasPermission("Merchant::loadform") == true){ ?>
                      <a href="<?=site_url('merchant/loadform/edit/'.$merchant['id'])?>" class="btn-sm btn-primary" title="Edit Restaurant">
                      	<i class="fa fa-edit"></i></a>
                      <?php } ?>
                      
                      <?php if($this->valSessObj->hasPermission("Merchant::delete") == true){ ?>
                      <a href="#" class="btn-sm btn-danger" onClick="if(confirm('Are you sure you want to delete this store'))
window.location = '<?=site_url('merchant/delete/'.$merchant['id'])?>';" title="Delete Restaurant">
						<i class="fa fa-trash"></i></a>
					  <?php } ?>
					  
					  </td>
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