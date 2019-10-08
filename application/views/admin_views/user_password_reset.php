      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?=site_url('admin/users/resetpassword/'.@$userID)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  	<label for="exampleInputEmail1">Reset Password</label>
                  	<input type="password" id="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Confirm Password</label>
                  <input type="text" id="confirmpassword" name="confirmpassword" class="form-control">
                </div>
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Data</button>
              </div>
            </form>
            <!-- form end -->
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->