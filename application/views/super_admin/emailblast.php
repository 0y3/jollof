                   
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<style>
    .bootstrap-tagsinput {
    width: 100%;
}
</style>        

    

                    
                    <div class="block full">
  
                        <div class="block-title">
                            
                            <h2><strong>Email Blast</strong> Composer</h2>
                            
                            <div class="block-options pull-right">

                                <a href="<?= site_url('super_admin/useremail') ?>" class="btn btn-sm btn-default" data-toggle="modal" data-tooltip="tooltip" data-target="#modal_cate" data-container="modal_cate" title="Add Emails" style="background-color:#1bbae1; color: #FFF">
                                    <i class="fa fa-plus-circle"></i>&nbsp;Add More Emails
                                </a>

                            </div>

                        </div>


                        <!--Email Div Starts here-->
                        <div class="row">
                            
                        <div class="col-sm-12 col-sm-offset-" style=" background-colorr:#ebecef;">
                            
                            <h2 class="text-center">Send Email Blast </h2>

                            <form class="form-horizontal" role="form">
                                
                                <div class="form-group">
                                
                                    <label for="to" class="col-sm-1 control-label">To:</label>
                                
                                    <div class="col-sm-11">
                                
                                        <input type="email" class="form-control select2-offscreen" id="to" name="email_to_b"  placeholder="" tabindex="-1">
				    	
                                    </div>
				  	
                                </div>
					
                                <div class="form-group">
				    	
                                    <label for="cc" class="col-sm-1 control-label">CC:</label>
				    	
                                    <div class="col-sm-11">
                              
                                        <input type="email" class="form-control select2-offscreen" id="cc" name="email_cc_b" data-provide="typeahead" placeholder="" tabindex="-1">
				    	
                                    </div>
				  	
                                </div>
					
                                <div class="form-group">
				    	
                                    <label for="bcc" class="col-sm-1 control-label">BCC:</label>
				    	
                                    <div class="col-sm-11">
                              
                                        <input type="email" class="form-control select2-offscreen" id="bcc" placeholder="" tabindex="-1">
				    	
                                    </div>
				  	
                                </div>
                                
                                <br>
                                
                                <div class="form-group">
                                    
                                     <label for="subject" class="col-sm-1 control-label">Subject:</label>
				    	
                                    <div class="col-sm-11">
                                        
                                        <input type="email" class="form-control select2-offscreen" id="subject" placeholder="subject" tabindex="-1">
                                   
                                    </div>
                                     
                                </div>
                                
                                <div class="form-group">
                                    
                                     <label for="message" class="col-sm-1 control-label">Message</label>
				    	
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


                   <!-- NEW Banner Modal -->              
                    <div class="modal fade" id="modal_cate" tabindex="-1" role="dialog" aria-labelledby="NEW Banner view" aria-hidden="true" >
                        
                    </div>
                    <!--end Modal -->

                   
<script >
    //$('.o_tray').addClass('active');
    //$('.nav_o').addClass('active');
    $(".ord_t_a").addClass('themed-background').removeClass('themed-background-dark'); 
    $('.ord_h2_a ').removeClass('themed-color-dark');
    
    $("[data-toggle=tooltip]").tooltip();
    
    // for number only input
    $(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
    });
    
</script>

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
<script >

var type = ["Donor","Volunteer","Member","Resource","Follow-up","Friend"]; 
 $('#ccc').tagsinput({
  typeahead: {
  	source: type
  }
});


  var productNames = new Array();
var productIds = new Object();
$.getJSON( '<?= site_url('super_admin/all_e2') ?>', null,
        function ( jsonData )
        {
            $.each( jsonData, function ( index, product )
            {
                productNames.push( product.first_name +' '+ product.last_name );
                productIds[product.id + product.last_name] = product.id;
            } );
            //$( '#cc' ).typeahead( { source:productNames } );
            $('#cc').tagsinput({
                
                // tags separator
                tagDataSeparator: '|',

                // allow duplicate tags
                allowDuplicates: false,

                // enable typehead.js
                typeahead: true,

                // tyhehead.js options
                typeaheadOptions: {
                    highlight: true
                },
                typeahead: {
                      source: productNames
                }
          });
        } );
</script >
<script >
    
 var myToken = $("#to").tokenInput("<?= site_url('super_admin/all_e') ?>", {
        
        preventDuplicates: true,
        
        // Search settings
        method: "POST",
        queryParam: "q",
        searchDelay: 300,
        minChars: 1,
        propertyToSearch: "name",
        jsonContainer: null,
        contentType: "json",
        excludeCurrent: false,
        excludeCurrentParameter: "x",

        // Prepopulation settings
        prePopulate: null,
        processPrePopulate: false,

        // Display settings
        theme: "facebook",
        hintText: "Type in a search term",
        noResultsText: "No results",
        searchingText: "Searching...",
        deleteText: "&#215;",
        animateDropdown: true,
        placeholder: "Enter user Email or name",
        zindex: 999,
        resultsLimit: null,

        enableHTML: false,
        
        propertyToSearch: "first_name",
        resultsFormatter: function(item){
            return "<li>" 
                        + "<div style='display: inline-block; padding-left: 10px;'>\n\
                            <div class='full_name'>" + item.first_name + " " + item.last_name + "</div>\n\
                            <div class='email'>" + item.email + "</div>\n\
                           </div>\n\
                        </li>" 
        },
        tokenFormatter: function(item) { 
                return "<li>\n\
                        <p> <b style='color: red'>" + item.first_name + " </b> " + item.last_name + "</p>\n\
                        </li>" 
            },

        onAdd: function (item) {        
            var field_value = $('#bcc').val();
            if (field_value != ""){
                $('#bcc').val(field_value+","+ item.id);
            }else{
                $('#bcc').val(item.id);
            }               

        },

        onDelete: function (item) {
            var field_value = $('#bcc').val().replace(';;',';',',').replace(item.id,'');
            $('#bcc').val(field_value); 
        }       

            
    });
    
   

    

/*$("#to").tokenInput(
        [
            {id: 7, name: "Ruby"},
            {id: 11, name: "Python"},
            {id: 13, name: "JavaScript"},
            {id: 17, name: "ActionScript"},
            {id: 19, name: "Scheme"},
            {id: 23, name: "Lisp"},
            {id: 29, name: "C#"},
            {id: 31, name: "Fortran"},
            {id: 37, name: "Visual Basic"},
            {id: 41, name: "C"},
            {id: 43, name: "C++"},
            {id: 47, name: "Java"}
         ],{
         theme: "facebook"
     });*/

/* $("#to").tagsinput({
  typeahead: {
    source: function(query) {
      return $.get('<?= site_url('super_admin/all_e') ?>');
    }
  }
});  
  $('#to').tokenfield({
  autocomplete:{
   source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
   delay:100
  },
  showAutocompleteOnFocus: true
 });
   */
</script>