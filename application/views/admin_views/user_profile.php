      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">My Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?=site_url('dashboard/updateProfile')?>" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  	<label for="exampleInputEmail1">Firstname</label>
                  	<input type='text' name='firstname' id='firstname'
                                        class="validate[required,maxSize[40]] form-control" 
                                        value="<?PHP if(isset($firstname)) echo $firstname; ?>" /> 
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputFile">Lastname</label>
                  <input type='text' name='lastname' id='lastname' 
                                        class="validate[required,maxSize[40]] form-control" 
                                        value="<?PHP if(isset($lastname)) echo $lastname; ?>" />
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Email</label>
                  <input type='text' name='email' id='email' 
                                        class="validate[required,maxSize[40]] form-control" 
                                        value="<?PHP if(isset($email)) echo $email; ?>" />
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Mobile</label>
                  <input type='text' name='phonenumber' id='phonenumber' 
                                        class="validate[required,maxSize[40]] form-control" 
                                        value="<?PHP if(isset($phonenumber)) echo $phonenumber; ?>" />
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