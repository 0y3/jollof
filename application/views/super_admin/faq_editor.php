                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<style>
    .bootstrap-tagsinput {
    width: 100%;
}
</style>        

    
                    <!--<div class="email_nav_tray">
                        <?php $this->load->view('super_admin/slider_nav_tray'); // Restaurants tray ?>
                    </div>-->
                    
                    <div class="block full">

                        <div class="block-title">
                            
                            <h2><strong>FAQ</strong> Page</h2>
                            
                            <div class="block-options pull-right">

                                

                            </div>

                        </div>


                        <!--Email Div Starts here-->
                        <div class="row">
                        <div class="col-sm-12 col-sm-offset-" style=" background-colorr:#ebecef;">
                            

                            <form class="form-horizontal" role="form">
					
                                
                                
                                <div class="form-group">
                                    
				    	
                                    <div class="col-sm-11">
                                        
                                        <textarea class="form-control" id="editorcode message" name="emailbody" rows="12" placeholder="Click here to reply"></textarea>
                                   
                                    </div>
                                     
                                </div>
					
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Send</button>
                                        
                                        <button type="submit" class="btn btn-danger">Discard</button>
                                    </div>
                                </div>
				  
                            </form>
                            
                        </div>
                        </div>

                        <!--end Email Dive here-->

                    </div>


<script>
$("[data-toggle='modal']").click(function(e) {
    /* Prevent Default*/
    e.preventDefault();
                        
    /* Parameters */
    var url = $(this).attr('href');
    var container = $(this).attr('data-target');
                
    /* XHR */
    $.get(url).done(function(data) {
        $(container).html(data).modal();
    }).success(function() { $('input:text:visible:first').focus() });
            
});    
</script>  

<script src="<?=base_url(); ?>extensions/ckeditor-dev-major/ckeditor.js"></script>
<!--<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>-->
<script >

    CKEDITOR.replace( 'emailbody' );

    
</script>


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-tagsinput.css">
<script src="<?=base_url(); ?>assets/js/bootstrap3-typeahead.js" ></script>
<script src="<?=base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>

