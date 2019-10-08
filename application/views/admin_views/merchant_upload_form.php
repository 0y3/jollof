      <div class="row">
        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Store Upload Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
            <?=form_open_multipart("admin/merchants/processupload", array("role"=>"form"))?>
              <div class="box-body">
                
                <div class="form-group">
                  	<label>File (.csv <a href="<?=$sample_link?>">Download Sample</a> ) </label>
                    <input type="file" id="userfile" name="userfile" class="form-control" placeholder="Upload Stores">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Bulk Upload</button>
              </div>
            <?=form_close()?>
            <!-- form end -->
          </div>
          <!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->