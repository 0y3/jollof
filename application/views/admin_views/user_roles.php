      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              
              
             <table class="table table-bordered">
             <caption><b>Station User Roles</b> [ <a href="<?PHP echo site_url('user_role/loadForm'); ?>">Add New</a> ]
             <br />Total Entries: <?=number_format($totalrecords)?>
             </caption>
              <thead>
                  <tr>
                      <th>SN</th>
                      <th>Role Title</th>
                      <th>Status</th>
                      <th>Action(s)</th>
                  </tr>
               </thead>
               <tbody>
                  <?PHP
					if(isset($userRoles) && $userRoles != false)
					{
						for($i=0; $i<count($userRoles); $i++){
							if($userRoles[$i]['status'] == 1)
								$status = '<span class="published">Active</span>';
							else
								$status = '<span class="not_published">Inactive</span>';
				  ?>
                  <tr>
                  	  <td><?PHP echo $i+1; ?></td>
                      <td><?PHP echo $userRoles[$i]['roleName']; ?></td>
                      <td><?PHP echo $status; ?></td>
                      <td>
                      
                      <a href="<?PHP echo site_url('user_role/loadForm/'.$userRoles[$i]['roleID']); ?>" class="btn-sm btn-primary">
                      	<i class="fa fa-lock"></i> Permissions</a>
                      
                      </td>
                  </tr>
                  <?PHP
                          }
                      }
                  ?>
               </tbody>
             </table>
              
              <div id="pagenation">
              	<?PHP if(isset($pagenation)) echo $pagenation; ?>
              </div>
              
              
              
                
              </div>
              <!-- /.box-body -->
              
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->