	<?=form_open("merchant/index")?>
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
            
            <div class="col-md-3">
              
              <div class="form-group">
                <label>Pharmacy</label>
                <select class="form-control select2" name="pharmacyid" id="pharmacyid">
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
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              <div class="form-group">
                <label>Store name</label>
                <input type="text" class="form-control" name="merchantname" placeholder="Store name" value="<?=@$filterparams['merchantname']?>">
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              
              <div class="form-group">
                <label>Creation Date</label>
                <input type="text" class="form-control reservation" id="createdat" name="createdat" value="<?=@$filterparams['createdat']?>">
              </div>
              <!-- /.form-group -->
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-3">
              
              <div class="form-group">
                <label>Store Status</label>
                <select class="form-control select2" name="merchantstatus" id="merchantstatus">
                  <option value="all">All</option>
                  <option value="1"<?php if(@$filterparams['merchantstatus']==1) echo ' selected="selected"';?>>Active Stores</option>
                  <option value="0"<?php if(@$filterparams['merchantstatus']=="0") echo ' selected="selected"';?>>Inactive Stores</option>
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
          <button type="submit" class="btn btn-info">Search Stores</button>
          <a href="<?=site_url("merchant")?>" type="submit" class="btn btn-warning">Clear filter</a>
        </div>
      </div>
      <!-- /.box -->
      <?=form_close()?>