	<?=form_open("transaction/index")?>
	<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Filter</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
                <label>Pharmacy</label>
                <select class="form-control select2" name="pharmacyid" id="pharmacyid" onchange="loadstores()">
                  <option value="all">All</option>
                  <?php 
                  	if(isset($pharmacies) && $pharmacies != false)
                  	{
                  		
                  		foreach ($pharmacies as $pharmacy)
                  		{
                  ?>
                  <option value="<?=$pharmacy['id']?>"<?php if(@$filterparams['pharmacyid']==$pharmacy['id']) echo ' selected="selected"';?>><?=$pharmacy['pharmacyname']?></option>
                  <?php 
                  		}
                  	}
                  ?>
                  
                </select>
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Store</label>
                <select class="form-control select2" name="merchantid" id="merchantid">
                  <option value="all">All</option>
                </select>
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-4">
              
              <div class="form-group">
                <label>Purchase Date</label>
                <input type="text" class="form-control reservation" id="createdat" name="createdat" value="<?=@$filterparams['createdat']?>">
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Orange Card ID</label>
                <input type="text" class="form-control" name="customerid" placeholder="Orange Card ID" value="<?=@$filterparams['customerid']?>">
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-4">
              
              <div class="form-group">
                <label>Product</label>
                <select class="form-control select2" name="productid" id="productid">
                  <option value="all">All</option>
                  <?php 
                  	if(isset($products) && $products != false)
                  	{
                  		
                  		foreach ($products as $product)
                  		{
                  ?>
                  <option value="<?=$product['id']?>"<?php if(@$filterparams['productid']==$product['id']) echo ' selected="selected"';?>><?=$product['productname']?></option>
                  <?php 
                  		}
                  	}
                  ?>
                </select>
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Purchase Option</label>
                <select class="form-control select2" name="paymenttype" id="paymenttype">
                  <option value="all">All</option>
                  <option value="1"<?php if(@$filterparams['paymenttype']==1) echo ' selected="selected"';?>>Full payment</option>
                  <option value="3"<?php if(@$filterparams['paymenttype']==2) echo ' selected="selected"';?>>50% discount</option>
                  <option value="2"<?php if(@$filterparams['paymenttype']==2) echo ' selected="selected"';?>>Free</option>
                  
                </select>
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info">Search Purchases</button>
          
          <a href="<?=site_url("transaction")?>" type="submit" class="btn btn-warning">Clear filter</a>
        </div>
      </div>
      <!-- /.box -->
      <?=form_close()?>