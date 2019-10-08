      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
             <table id="example1" class="table table-bordered">
                <caption><b>Users Listing</b>
                [
                <?php if($this->valSessObj->hasPermission("User::loadForm") == true){ ?>
                 <a href="<?PHP echo site_url('user/loadForm'); ?>">Add New</a> 
                <?php } ?>
                
                <?php if($this->valSessObj->hasPermission("User::upload") == true){ ?>
              | <a href="<?PHP echo site_url('user/upload') ?>">Bulk Upload</a>
             <?php } ?>
                ]
               	
               	<br />Total Entries: <?=number_format($totalrecords)?>
               	</caption>
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Created On</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>User Role</th>
                        <th>User Class</th>
                        <th>Active</th>
                        <th>Store</th>
                        <th class="th_action">action(s)</th>
                    </tr>
                </thead>
                <tbody>
                <?PHP
					if(isset($users) && $users != false)
					{
						for($i=0; $i<count($users); $i++){
							if($users[$i]['accesstype'] == 1)
								$status = '<span class="published">Web User</span>';
							else
								$status = '<span class="not_published">Store POS User</span>';
				?>
                    <tr>
                        <td><?PHP echo $i+1; ?></td>
                        <td><?PHP echo date("M d, Y h:ia", strtotime($users[$i]['createdat'])); ?></td>
                        <td><?PHP echo $users[$i]['firstname']; ?></td>
                        <td><?PHP echo $users[$i]['lastname']; ?></td>
                        <td><?PHP echo $users[$i]['username']; ?></td>
                        <td><?PHP echo $users[$i]['email']; ?></td>
                        <td><?PHP echo $users[$i]['roleName']; ?></td>
                        <td><?=$status?></td>
                        <td>
                        <?PHP 
                        	if($users[$i]['userstatus']==1)
                        		echo'<span class="label label-success">Active</span>';
					  		else 
					  			echo'<span class="label label-warning">Inactive</span>'; 
					  	?>
					  	</td>
                        <td><?PHP echo $users[$i]['merchantname']; ?></td>
                        <td>
                        	
                        	<?php if($this->valSessObj->hasPermission("User::loadForm") == true){ ?>
                        	<a href="<?=site_url('user/loadForm/'.$users[$i]['userID']); ?>" class="btn-sm btn-primary" title="Edit this user">
                        		<i class="fa fa-edit"></i></a>
                        	<?php } ?>
                        	
                        	<?php if($this->valSessObj->hasPermission("User::delete") == true){ ?>
                        	<a class="btn-sm btn-danger" href="#" onClick="if(confirm('Are you sure you want to delete this record?'))
window.location = '<?=site_url('user/delete/'.$users[$i]['userID']); ?>';" title="Delete this user"><i class="fa fa-trash"></i></a>
							<?php } ?>
							
							
							
							<?PHP if($users[$i]['userstatus']==1 && $this->valSessObj->hasPermission("User::deactivate") == true){?>
							<a class="btn-sm btn-warning" href="#" onClick="if(confirm('Are you sure you want to de-activate this user?'))
window.location = '<?=site_url('user/deactivate/'.$users[$i]['userID']); ?>';" title="De-activate User"><i class="fa fa-times"></i></a>
							<?php } else if($users[$i]['userstatus']==0 && $this->valSessObj->hasPermission("User::activate") == true) {?>
							<a class="btn-sm btn-success" href="#" onClick="if(confirm('Are you sure you want to activate this user?'))
window.location = '<?=site_url('user/activate/'.$users[$i]['userID']); ?>';" title="Activate User"><i class="fa fa-check"></i></a>
							<?php }?>
							
							<?php if($this->valSessObj->hasPermission("User::resetpassword") == true){ ?>
                        	<a href="<?=site_url('user/resetpasswordform/'.$users[$i]['userID']); ?>" class="btn-sm btn-primary" href="#" title="Reset User Password">
                        		<i class="fa fa-lock"></i></a>
							<?php } ?>
							
						</td>
                    </tr>
                <?PHP
						}
					}
				?>
                </tbody>
			  </table>
                
              </div>
              <!-- /.box-body -->
              
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->