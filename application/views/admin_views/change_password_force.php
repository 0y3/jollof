      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?=site_url('dashboard/forcepasswordchange')?>" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" id="newpassword" name="newpassword" 
                    		class="validate[required] form-control" />
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Re-type New Password</label>
                  <input type="password" id="repassword" name="repassword" 
                    		class="validate[required,equals[password]] form-control" />
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Change Password</button>
              </div>
            </form>
            <!-- form end -->
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->