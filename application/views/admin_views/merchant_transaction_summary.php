      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
              
              
            <table class="table table-bordered">
            <caption><b>Shift Data</b></a></caption>
               <thead>
                  <tr>
                      <th>Shift ID</th>
                      <th>Shift Description</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Dip Opened</th>
                      <th>Dip Closed</th>
                      <th>Shift Status</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                  	  <td><?PHP echo $shift_data['shiftID']; ?></td>
                  	  <td><?PHP echo $shift_data['shiftDescription'].' '.$shift_data['shiftDate']; ?></td>
                  	  <td><?PHP echo $shift_data['startTime']; ?></td>
                  	  <td><?PHP echo $shift_data['endTime'];?></td>
                  	  <td><?PHP if($shift_data['dipReadingOpened']==1)echo'Yes';else echo'No'; ?></td>
                  	  <td><?PHP if($shift_data['dipReadingClosed']==1)echo'Yes';else echo'No'; ?></td>
                      <td><b><?PHP if($shift_data['shiftStatus']==1)echo'<font color="#003300">Active</font>';
					  else echo'<font color="#990000">Closed</font>'; ?></b></td>
                  </tr>
               </tbody>
              </table>
            <h3>Meter Readings</h3>
            <table class="table table-bordered">
            <caption>Shift Meter Readings</caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Meter</th>
                      <th>Attendant</th>
                      <th>Opening</th>
                      <th>Closing</th>
                      <th>Sales Quantity (<?PHP echo $this->session->userdata('quantityUnit'); ?>)</th>
                      <th>Overage</th>
                      <th>OverageQTY</th>
                      <th>Sales Amount (<?PHP echo strtoupper($this->session->userdata('currencyUnit')); ?>)</th>
                      <th>Cash</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
				  	  $totalSales = 0;
					  $totalCash = 0;
                      if($meterReadings != false)
                      {
                          $x = count($meterReadings);
						  $salesTolerance = $this->session->userdata('salesTolerance');
						  $qtyTolerance = $this->session->userdata('quantityToleranceValue');
                          for($i=0; $i<$x; $i++)
                          {
							  $salesAmount = ($meterReadings[$i]['closingReading'] - $meterReadings[$i]['openingReading'])
							  				*$meterReadings[$i]['productSellingPrice'];
							  $quantitySold = $meterReadings[$i]['closingReading'] - $meterReadings[$i]['openingReading'];
							  $physicalCash = $meterReadings[$i]['totalCashReturned'];
							  if(($salesAmount - $physicalCash) > $salesTolerance)
								  $cashColor = '#990000';
							  else
								  $cashColor = '#003300';
							  $totalSales += $salesAmount;
							  $totalCash += $physicalCash;							  
							
                  ?>
                  <tr>
                  	  <td><?= $meterReadings[$i]['meterReadingID']; ?></td>
                      <td><?= $meterReadings[$i]['meterDescription']; ?></td>
                      <td><?= $meterReadings[$i]['firstname'].' '.$meterReadings[$i]['lastname']; ?></td>
                      <td><?= number_format($meterReadings[$i]['openingReading']); ?></td>
                      <td><?= number_format( $meterReadings[$i]['closingReading']).' '.$this->session->userdata('quantityUnit'); ?></td>
                      <td><?= number_format($meterReadings[$i]['closingReading']-$meterReadings[$i]['openingReading']).' '.$this->session->userdata('quantityUnit'); ?></td>
                      <td><?= number_format($meterReadings[$i]['overageValue']); ?></td>
                      <td><?= number_format($meterReadings[$i]['overageValue']*$quantitySold); ?></td>
                      <td><?= number_format($salesAmount); ?></td>
                      <td><b><?= '<b>'.strtoupper($this->session->userdata('currencyUnit')).'</b> <font color="'.$cashColor.'">'.number_format($meterReadings[$i]['totalCashReturned']).'</font>';?></b></td>
                  </tr>
                  <?PHP
                          }
                      }
					  $totalSalesColor = 'black';
					  if($totalCash >= $totalSales)
					  	$totalSalesColor="#003300";
					  else 
					  	$totalSalesColor="#990000";
                  ?>
                  <tr>
                  	  <td colspan="8" align="right">Total:</td>
                  	  <td><font color="#003300"><strong><?PHP echo number_format($totalSales,2); ?></strong></font></td>
                      <td><font color="<?PHP echo $totalSalesColor; ?>"><strong><?PHP echo number_format($totalCash,2); ?></strong></font></td>
                 </tr>
               </tbody>
              </table>
              <h3>Product Sales Summary</h3>
            <table class="table table-bordered">
            <caption>Petroleum Products Sales Analysis</caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Quantity Sold (Meter) <?= $this->session->userdata('quantityUnit'); ?></th>
                      <th>Quantity Sold (Dip) <?= $this->session->userdata('quantityUnit'); ?></th>
                      <th>Overage <?= $this->session->userdata('quantityUnit'); ?></th>
                      <th>Price Per <?= $this->session->userdata('quantityUnit'); ?> (<?PHP echo strtoupper($this->session->userdata('currencyUnit')); ?>)</th>
                      <th>Meter Sales (<?= strtoupper($this->session->userdata('currencyUnit')); ?>)</th>
                      <th>Dip Sales (<?= strtoupper($this->session->userdata('currencyUnit')); ?>)</th>
                      <th>Cash (<?= strtoupper($this->session->userdata('currencyUnit')); ?>)</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if(isset($petroleumProducts) && $petroleumProducts != false)
                      {
						  $totalSalesMeter = 0;
						  $totalSalesDip = 0;
						  $totalCashGeneral = 0;
                          $x = count($petroleumProducts);
                          for($i=0; $i<$x; $i++)
                          {
							  $totalSalesMeter += ($petroleumProducts[$i]['productPrice']*$petroleumProducts[$i]['meterSalesVolume']);
							  $totalSalesDip += ($petroleumProducts[$i]['productPrice']*$petroleumProducts[$i]['productQuantitySold']);
							  $totalCashGeneral += $petroleumProducts[$i]['totalProductCash'];
                  ?>
                  <tr>
                  	  <td><?= $petroleumProducts[$i]['petroleumProductID']; ?></td>
                      <td><?= $petroleumProducts[$i]['productName']; ?></td>
                      <td><?= number_format($petroleumProducts[$i]['meterSalesVolume'],4); ?></td>
                      <td><?= number_format($petroleumProducts[$i]['productQuantitySold'],4); ?></td>
                      <td><?= number_format($petroleumProducts[$i]['totalOverageQuantity'],4) ?></td>
                      <td><?= number_format($petroleumProducts[$i]['productPrice'],2);?></td>
                      <td><?= number_format(($petroleumProducts[$i]['productPrice']*$petroleumProducts[$i]['meterSalesVolume']),2);?></td>
                      <td><?= number_format(($petroleumProducts[$i]['productPrice']*$petroleumProducts[$i]['productQuantitySold']),2);?></td>
                      <td><?= number_format($petroleumProducts[$i]['totalProductCash'],2);?></td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
                  <tr>
                  	  <td colspan="6" align="right">Total:</td>
                      <td><font color="#003300"><?= '<b>'.number_format($totalSalesMeter,2).'</b>'; ?></font></td>
                      <td><font color="#003300"><?= '<b>'.number_format($totalSalesDip,2).'</b>'; ?></font></td>
                      <td><font color="<?= $totalSalesColor; ?>"><?= '<b>'.number_format($totalCashGeneral,2).'</b>'; ?></font></td>
                 </tr>
               </tbody>
              </table>
           
              <h3>Shift Attendants</h3>
              <table class="table table-bordered">
            <caption>Attendants In This Shift</caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Attendant</th>
                      <th>Shift</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Station</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if($shiftAttendants != false)
                      {
                          $x = count($shiftAttendants);
                          for($i=0; $i<$x; $i++)
                          {
                  ?>
                  <tr>
                  	  <td><?= $shiftAttendants[$i]['shiftID']; ?></td>
                      <td><?= $shiftAttendants[$i]['firstname'].' '.$shiftAttendants[$i]['lastname']; ?></td>
                      <td><?= $shiftAttendants[$i]['shiftDescription'].' '.$shiftAttendants[$i]['shiftDate']; ?></td>
                      <td><?= $shiftAttendants[$i]['startTime']; ?></td>
                      <td><?= $shiftAttendants[$i]['endTime'];?></td>
                      <td><?= $shiftAttendants[$i]['stationName']; ?></td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
               </tbody>
              </table>
              
              <h3>Shift Dip Readings</h3>
            <table class="table table-bordered">
            <caption>Shift Dip Readings</caption>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tank</th>
                      <th>Opening (<?= $this->session->userdata('quantityUnit'); ?>)</th>
                      <th>Closing (<?= $this->session->userdata('quantityUnit'); ?>)</th>
                      <th>Quantity Sold (<?= $this->session->userdata('quantityUnit'); ?>)</th>
                      <th>Quantity Sold(meter) <?= $this->session->userdata('quantityUnit'); ?></th>
                      <th>Product</th>
                      <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
                      if($dipReadings != false)
                      {
                          $x = count($dipReadings);
                          for($i=0; $i<$x; $i++)
                          {
                  ?>
                  <tr>
                  	  <td><?= $dipReadings[$i]['dipReadingID']; ?></td>
                      <td><?= $dipReadings[$i]['tankDescription']; ?></td>
                      <td><?= number_format($dipReadings[$i]['openingReading'],4); ?></td>
                      <td><?= number_format($dipReadings[$i]['closingReading'],4); ?></td>
                      <td><?= number_format($dipReadings[$i]['openingReading'] - $dipReadings[$i]['closingReading'],4); ?></td>
                      <td><?= number_format($dipReadings[$i]['totalMeterReading'],4); ?></td>
                      <td><?= $dipReadings[$i]['productName']; ?></td>
                      <td><b><?PHP if($dipReadings[$i]['dipReadingStatus']==0)echo'<font color="#003300">Active</font>';
					  else echo'<font color="#990000">Closed</font>'; ?></b></td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
               </tbody>
              </table>
              
              <?PHP if(isset($shift_data) && $shift_data['shiftStatus']==1) { ?>
              <h1>&nbsp;</h1>
              <form method="post" action="<?= site_url('shift/loadShiftClosingForm/'.$shift_data['shiftID']) ?>" >
              <div id='login-button'>
				<input type="submit" class='button' value="Close this shift" />
			  </div>
              </form>
              <?PHP } else if(isset($shift_data) && $shift_data['shiftStatus']==0 && strtolower($this->session->userdata('userLevel'))=='station admin'){ ?>
              <h1>&nbsp;</h1>
              <form method="post" action="<?= site_url('shift/reopenShift/'.$shift_data['shiftID']) ?>" >
              <div id='login-button'>
				<input type="submit" class='button' value="Re-open shift" />
			  </div>
              </form>
              <?PHP } ?>
              <h1>&nbsp;</h1>
            </div>
        
        
        
        
              </div>
              <!-- /.box-body -->
              
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->