<script type="text/javascript">

function loadstores()
{
	$('#merchantid').html("<option value=\"\">Please select</option>");
	var pharmacyid = $('#pharmacyid').val();
	// make jQuery post to the server
	$.post('<?=site_url('api/loadstores')?>', {pharmacyid: pharmacyid}, function(data) 
	{
		$('#merchantid').html(data);
	});
}

function displaypharmacies()
{
	var accesstype = $('#accesstype').val();
	if(accesstype == 1)
		$('#merchantid_div').slideUp("fast");
	else if(accesstype == 2)
		$('#merchantid_div').slideDown("fast");
}
</script>



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
            
            <?=form_open_multipart('admin/users/saveData/'.@$userID, array('role'=>"form", 'id'=>"userForm", 'class'=>"formvalidate"))?>
              <div class="box-body">
                <div class="form-group">
                  	<label for="exampleInputEmail1">Lastname</label>
                  	<input type="text" id="lastname" name="lastname" placeholder="Lastname" 
                    		class="form-control" value="<?PHP if(isset($lastname)) echo $lastname ?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Firstname</label>
                  <input type="text" id="firstname" name="firstname" placeholder="Firstname" 
                    		class="form-control" value="<?PHP if(isset($firstname)) echo $firstname ?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Phonenumber</label>
                  <input type="text" id="phonenumber" name="phonenumber" placeholder="Phonenumber" 
                    		class="form-control" value="<?PHP if(isset($phonenumber)) echo $phonenumber ?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Email</label>
                  <input type="text" id="email" name="email" placeholder="Email" 
                    		class="form-control" value="<?PHP if(isset($email)) echo $email ?>" required>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputFile">User Role</label>
                  <select name="userRole" id="userRole" class="form-control select" required>
                            <option value="">Please Select</option>
                            <?PHP
								if(isset($userRoles)){
									for($i=0; $i<count($userRoles); $i++){
							?>
                    		<option value="<?=$userRoles[$i]['roleID']?>" 
                    			<?PHP if(isset($userroleid) && $userRoles[$i]['roleID']==$userroleid) echo'selected="selected"'; ?>><?=$userRoles[$i]['roleName']?></option>
                            <?PHP
									}
								}
							?>
                    	</select>
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputFile">Account Type</label>
                  <select name="accesstype" id="accesstype" class="form-control select" onchange="displaypharmacies()" required>
                            <option value="">Please Select</option>
                    		<option value="1" <?PHP if(isset($accesstype) && $accesstype==1) echo'selected="selected"'; ?>>Web User</option>
                    		<option value="2" <?PHP if(isset($accesstype) && $accesstype==2) echo'selected="selected"'; ?>>POS User</option>
                            
                    	</select>
                </div>
                
                
                
                <div  id="merchantid_div" <?php if(!isset($accesstype) || @$accesstype == 1){?>style="display: none;"<?php } ?>>
                <div class="form-group">
                  <label for="exampleInputFile">Pharmacy</label>
                  <select name="pharmacyid" id="pharmacyid" class="form-control select" onchange="loadstores()">
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
                  <label for="exampleInputFile">Store</label>
                  <select name="merchantid" id="merchantid" class="form-control select">
                            <option value="">Please Select</option>
                            <?PHP
								if(isset($merchants)){
									foreach($merchants as $merchant){
							?>
                    		<option value="<?PHP echo $merchant['id']; ?>" 
								<?PHP if(isset($merchantid) && $merchant['id']==$merchantid) echo'selected="selected"'; ?>><?=$merchant['merchantname']?></option>
                            <?PHP
									}
								}
							?>
                    </select>
                </div>
                
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputFile">Username</label>
                  <input type="text" id="username" name="username" placeholder="Username" class="form-control" 
                  	value="<?PHP if(isset($username)) echo $username ?>" minlength="6" maxlength="20" required>
                </div>
                
                <?PHP if(isset($userID) && $userID==0){ ?>
                <div class="form-group">
                  <label for="exampleInputFile">Password</label>
                  <input type="password" id="password" name="password" class="form-control" required="required" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Confirm Password</label>
                  <input type="password" id="repassword" name="repassword" class="form-control" required="required" placeholder="Confirm Password"
                  	minlength="6" maxlength="20" data-rule-equalTo="#password" required>
                </div>
                <?PHP } ?>
                
                
                
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