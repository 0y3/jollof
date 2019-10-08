      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Role Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action="<?=site_url('admin/user_roles/saveData/'.@$roleID)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  	<label for="exampleInputEmail1">Role Name</label>
                  	<input type="text" id="roleName" name="roleName" class="validate[required] form-control" value="<?PHP if(isset($roleName)) echo $roleName ?>">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Role Status</label>
                  <select name="status" id="status" 
                    		class="validate[required] chzn-select form-control select">
           	            <option>Please Select...</option>
           	            <option value="1" 
								<?PHP if(isset($status)&& $status==1) echo'selected="selected"'; ?>>Active</option>
           	            <option value="0" 
								<?PHP if(isset($status)&& $status==0) echo'selected="selected"'; ?>>Inactive</option>
       	              </select>
                </div>
                
                <div class="form-group">
                  <table width="100%" class="clear_table">
       	         
       	         <tr>
               	      <td><strong>Role Permissions</strong></td>
               	      <td>&nbsp;</td>
               	      <td>&nbsp;</td>
               	      <td>&nbsp;</td>
       	         </tr>
                 	<?PHP
						if(isset($systemModules) && $systemModules!=false){
							for($i=0; $i<count($systemModules); $i++){
					?>
           	     <tr>
                	<td width="25%">
                    <?PHP
								if($i<count($systemModules)){
					?>
                    	<span>
                        <input type="checkbox" value="<?PHP echo $systemModules[$i]['moduleID']; ?>" 
								<?PHP if(isset($systemModules[$i]['checkIt']) && $systemModules[$i]['checkIt']=='yes') echo 'checked'; ?> 
                        		name="mod<?PHP echo $i; ?>" id="mod<?PHP echo $i; ?>" />
                        <label for="mod<?PHP echo $i; ?>"><?PHP echo $systemModules[$i]['Description']; ?></label>
                        </span>
                     <?PHP
								}
					?>
                     </td>
                     <td width="482">
                    <?PHP
								$i++;
								if($i<count($systemModules)){
					?>
                    	<span>
                        <input type="checkbox" value="<?PHP echo $systemModules[$i]['moduleID']; ?>" 
								<?PHP if(isset($systemModules[$i]['checkIt']) && $systemModules[$i]['checkIt']=='yes') echo 'checked'; ?> 
                        		name="mod<?PHP echo $i; ?>" id="mod<?PHP echo $i; ?>" />
                        <label for="mod<?PHP echo $i; ?>"><?PHP echo $systemModules[$i]['Description']; ?></label>
                        </span>
                     <?PHP
								}
					?>
                     </td>
                     <td width="25%">
                    <?PHP
								$i++;
								if($i<count($systemModules)){
					?>
                    	<span>
                        <input type="checkbox" value="<?PHP echo $systemModules[$i]['moduleID']; ?>" 
								<?PHP if(isset($systemModules[$i]['checkIt']) && $systemModules[$i]['checkIt']=='yes') echo 'checked'; ?> 
                        		name="mod<?PHP echo $i; ?>" id="mod<?PHP echo $i; ?>" />
                        <label for="mod<?PHP echo $i; ?>"><?PHP echo $systemModules[$i]['Description']; ?></label>
                        </span>
                     <?PHP
								}
					?>
                     </td>
                     <td width="25%">
                    <?PHP
								$i++;
								if($i<count($systemModules)){
					?>
                    	<span>
                        <input type="checkbox" value="<?PHP echo $systemModules[$i]['moduleID']; ?>" 
								<?PHP if(isset($systemModules[$i]['checkIt']) && $systemModules[$i]['checkIt']=='yes') echo 'checked'; ?> 
                        		name="mod<?PHP echo $i; ?>" id="mod<?PHP echo $i; ?>" />
                        <label for="mod<?PHP echo $i; ?>"><?PHP echo $systemModules[$i]['Description']; ?></label>
                        </span>
                     <?PHP
								}
					?>
                     </td>
                    <?PHP
							}
						}
					?>
                 </tr>  
               </table>
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