
	<?php include_once 'customer-filter.php'; ?>



<div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
              
             <table class="table table-bordered">
             <caption><b>Customers</b></caption>
              <thead>
                  <tr>
                      <th>Customer ID</th>
                      <th>Customer Code</th>
                      <th>Orange Card</th>
                      <th>Registered By</th>
                      <th>Points</th>
                      <th>Created</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if(isset($customers) && $customers != false)
                      {
                          foreach($customers as $customer)
                          {
                  ?>
                  <tr>
                  	  <td><?=$customer['id']?></td>
                      <td><?=$customer['customercode']?></td>
                      <td><?=$customer['orangecardid']?></td>
                      <td><?=$customer['merchantname']?></td>
                      <td><?=$customer['totalpoints']?></td>
                      <td><?PHP if($customer['customerstatus']==1)echo'<span class="label label-success">Active</span>';
					  else echo'<span class="label label-danger">Inactive</span>'; ?></td>
                      <td><?=date("M d, Y h:i A", strtotime($customer['createdat']))?></td>
                      
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