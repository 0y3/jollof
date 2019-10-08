      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Restaurant Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <?=form_open_multipart('admin/merchants/savedata/'.$id, array('role'=>"form", 'id'=>"signupForm", 'class'=>"formvalidate"))?>
              <div class="box-body">
                
                <div class="form-group">
                  	<label for="exampleInputEmail1">Restaurant Name</label>
                  	<input type="text" name='merchantname' id='merchantname' placeholder="Restaurant Name" 
                  		class="form-control" value="<?PHP if(isset($merchantname)) echo $merchantname; ?>" required />
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Restaurant Address</label>
                  <input type="text" name='merchantaddress' id='merchantaddress' placeholder="Restaurant Address" 
                  	class="form-control" value="<?PHP if(isset($merchantaddress)) echo $merchantaddress;?>" required/>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">State</label>
                  <select name="stateid" id="stateid" class="form-control">
                  <?php 
                  	if(isset($states) && $states != false)
                  	{
                  		foreach ($states as $state)
                  		{
                  	
                  ?>
                  	<option<?PHP if(isset($stateid) && $stateid==$state['id']) echo ' selected="selected"';?> value="<?=$state['id']?>"><?=$state['statename']?></option>
				  <?php 
                  		}
                  	}
				  ?>
				  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Pharmacy</label>
                  <select name="pharmacyid" id="pharmacyid" class="form-control select" required>
                            <option value="">Please Select</option>
                            <?PHP
								if(isset($pharmacies)){
									foreach($pharmacies as $pharmacy){
							?>
                    		<option value="<?=$pharmacy['id']?>" 
								<?PHP if(isset($pharmacyid) && $pharmacy['id']==$pharmacyid) echo'selected="selected"'; ?>><?=$pharmacy['pharmacyname']?></option>
                            <?PHP
									}
								}
							?>
                    </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact Firstname</label>
                  <input type="text" name='contactfirstname' id='contactfirstname' placeholder="Contact Firstname" 
                                        class="form-control" value="<?PHP if(isset($contactfirstname)) echo $contactfirstname;?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact Lastname</label>
                  <input type="text" name='contactlastname' id='contactlastname' placeholder="Contact Lastname" 
                  	class="form-control" value="<?PHP if(isset($contactlastname)) echo $contactlastname;?>"required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact Phone</label>
                  <input type="number" name='contactphonenumber' id='contactphonenumber' placeholder="Contact Phonenumber" 
                  	minlength="11" maxlength="11" class="form-control" value="<?PHP if(isset($contactphonenumber)) echo $contactphonenumber;?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name='merchantemail' id='merchantemail' placeholder="Restaurant Email Address" 
                  	class="form-control" value="<?PHP if(isset($merchantemail)) echo $merchantemail;?>" required>
                </div>
                
                <!-- 
                <div class="form-group">
                  <label for="exampleInputPassword1">Total Cards Available</label>
                  <input type="number" name='merchantemail' id='totalcardsavailable' placeholder="Total Cards Available" 
                  	class="form-control" value="<?PHP if(isset($merchantemail)) echo $merchantemail;?>" required>
                </div>
                -->
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Data</button>
              </div>
            <?=form_close()?>
            <!-- form end -->
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	