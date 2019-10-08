<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
.steps {
    margin-top: -41px;
    display: inline-block;
    float: right;
    font-size: 16px
}
.step {
    float: left;
    background: white;
    padding: 7px 0px 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 110px;
    position: relative
}
.step_line {
    margin: 0;
    width: 0;
    height: 0;
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    z-index: 108;
    position: absolute;
    left: 105px;
    top: 1px
}
.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 106;
    position: absolute;
    left: 105px;
    top: -3px
}
.step_complete {
    background: #357ebd
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #eee;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #357ebd;
}
.step_line.last{
   left: 110px;
   padding-right:5px; 
}
.step_thankyou {
    float: left;
    background: white;
    padding: 7px 0px 7px 25px;
    border-radius: 1px;
    text-align: center;
    /*width: 110px;*/
}
.step.check_step {
    margin-left: 5px;
}
.ch_pp {
    text-decoration: underline;
}
.ch_pp.sip {
    margin-left: 10px;
}
.check-bc,
.check-bc:hover {
    color: #222;
}
.SuccessField {
    border-color: #458845 !important;
    -webkit-box-shadow: 0 0 7px #9acc9a !important;
    -moz-box-shadow: 0 0 7px #9acc9a !important;
    box-shadow: 0 0 7px #9acc9a !important;
    background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
}

.btn-xs{
    line-height: 28px;
}

/*login form*/
.login-container{
    margin-top:30px ;
}
.login-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.login-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.login-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.login-container-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #357ebd;/*#4d90fe;*/
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.login-container-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.login-help{
  font-size: 12px;
}

.asterix{
    background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
}

/* images*/
ol, ul {
  list-style: none;
}
.hand {
  cursor: pointer;
  cursor: pointer;
}
.cards{
    padding-left:0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .mastercard {
  background-position: -51px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .amex {
  background-position: -102px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards li:last-child {
  margin-right: 0;
}
/* images end */



/*
 * BOOTSTRAP
 */
.container{
    border: none;
}
.panel-footer{
    background:#fff;
}
.btn{
    border-radius: 1px;
}
.btn-sm, .btn-group-sm > .btn{
    border-radius: 1px;
}
.input-sm, .form-horizontal .form-group-sm .form-control{
    border-radius: 1px;
}

.panel-info {
    border-color: #999;
}

.panel-heading {
    border-top-left-radius: 1px;
    border-top-right-radius: 1px;
}
.panel {
    border-radius: 1px;
}
.panel-info > .panel-heading {
    color: #eee;
    border-color: #999;
}
.panel-info > .panel-heading {
    background-image: linear-gradient(to bottom, #555 0px, #888 100%);
}

hr {
    border-color: #999 -moz-use-text-color -moz-use-text-color;
}

.panel-footer {
    border-bottom-left-radius: 1px;
    border-bottom-right-radius: 1px;
    border-top: 1px solid #999;
}

.btn-link {
    color: #888;
}

hr{
    margin-bottom: 10px;
    margin-top: 10px;
}
.sub_menu_name {
    padding-right: 5px;
}
.cart_sub_menu table {
    widthh: 80px !important;
    max-widthh: 50% !important;
    margin: 0 !important;
}
.cart_sub_menu table tr{
    padding: 0px !important;
    margin: 0 !important;
}
.cart_sub_menu table tr td{
    padding-top: 2px !important;
    padding-bottom: 2px !important;
}
.cart_sub_menu table tr td:last-child {
    /*color: red;*/
    font-weight: 800;
}
.imgcart{
   /*max-width: 30%;*/
   width: 60px;
}
.boldtext{
    font-weight: 800;
}
/** MEDIA QUERIES **/
@media only screen and (max-width: 989px){
    .span1{
        margin-bottom: 15px;
        clear:both;
    }
}

@media only screen and (max-width: 764px){
    .inverse-1{
        float:right;
    }
}

@media only screen and (max-width: 586px){
    .cart-titles{
        display:none;
    }
    .panel {
        margin-bottom: 1px;
    }
}

.form-control {
    border-radius: 1px;
}
.table td{
    padding-leftt: 0px!important;
    padding-rightt: 0px!important; 
 
}
.div_delivfee{
    position: absolute;
}
.span_delivfee{
    z-index: 10;
    top: 0px;
    position: relative;
    transform: translateY(-50%);
}
.input_delivfee{
    z-index: 0;
    top: 0;
    left: -37px;
    max-width: 30px;
    max-height: 10px;
    opacity: 0;
    background-color: inherit;
    position: relative;
    /*padding-left:8px; 
    border:  solid red thin;*/
}

@media only screen and (max-width: 486px){
    .col-xss-12{
        width:100%;
    }
    .cart-img-show{
        display: none;
    }
    .btn-submit-fix{
        width:100%;
    }
    
}
/*
@media only screen and (max-width: 777px){
    .container{
        overflow-x: hidden;
    }
}*/
  
  
</style>


<div id="WaitMe_check" class="container wrapper ">

  <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">First step description</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Second step description</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Third step description</p>
                </a></li>
            </ul>
        </div>
  </div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
                <button id="activate-step-2" class="btn btn-primary btn-lg">Activate Step 2</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <h1 class="text-center"> STEP 2</h1>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <h1 class="text-center"> STEP 3</h1>
            </div>
        </div>
    </div>
</div>

<!--Address Modal -->              
<div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

</div><!--end Modal -->
 
<script type="text/javascript">

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })    
});

    
    $(document).ready(function() {
    
        
        
        //alert(parseFloat($('.deliv_grandtotal').text()));
        $("all_price_grandtotal").text();
    });
    
    $('#add_option').on('change',function(){
            
            var overall=0;
            var addID = $(this).val();
            var addcityID = $(':selected',this).data('cityid');
            var addstateID = $('option:selected',this).data('stateid');
            
            var addcityName = $('option:selected',this).data('cityname');
            var addstateName = $('option:selected',this).data('statename');
            var countajax=-1;
            var grand_price=0;
            var $grand_price=0;
            
            console.log(':select & this => ' + $(':selected', this).data('cityid'));
            console.log('option:select & this => ' + $('option:selected', this).data('cityid'));
            
            $('.deliver_location').html(addcityName+', '+addstateName);
            if(addID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('checkout/get_address') ?>',
                    data:'id='+addID,
                    success:function(html){
                        $('#add_div').html(html);
                        
                        
                        $('.deliver_fee').each(function(index, value) {
                        // Logic
                            countajax++;
                            var restID = $(this).data('restid');
                            //alert($(this).html());
                            $.ajax({
                                type:'POST',
                                dataType: 'json',
                                url:'<?= site_url('checkout/get_deliveryfee') ?>',
                                data:{rest_id:restID,city_id:addcityID},
                                success:function(html){
                                    if(html.status==1)
                                    {
                                        $('.deliv_fee_span'+restID).html(html.content);
                                        $('.deliv_store_fee'+restID).val(html.charge);
                                        $('.deliv_logistic'+restID).val(html.logistic);
                                    }
                                    else
                                    {
                                        $('.deliv_fee_span'+restID).html(html.content);
                                        $('.deliv_store_fee'+restID).val(null);
                                        $('.deliv_logistic'+restID).val(null);
                                    }
                                    var fee = parseFloat($('.deliv_store_fee'+restID).val());
                                    overall+= fee;
                                    //alert(overall);


                                },
                                complete: function(html) {

                                    if (countajax === index) {
                                        //yourCallback();
                                        if(isNaN(overall))
                                        {
                                            $('.deliv_grandtotal').text('.......');
                                            $('.all_price_grandtotal').text('.......');
                                            //parseFloat($("input[name='deliv_grandtotal']").val(null));
                                        }
                                        else{
                                            $('.deliv_grandtotal').text(overall.toFixed(2));
                                            $grand_price = parseFloat($('.cart_price_grandtotal').text());
                                            grand_price= $grand_price+overall;
                                            grand_price=grand_price.toFixed(2);
                                            $(".all_price_grandtotal").text(grand_price);
                                            //alert(grand_price.toFixed(2));
                                            savetosession();
                                        }
                                    }
                                }
                            });
                            //alert(countajax); 
                        });
                        
                        /*
                        $('#delivery_tbody').find('tr').each(function(){
                            $('.deliver_fee', this).each(function() {
                            // Logic
                                var restID = $(this).data('restid');
                                //alert($(this).html());
                                $.ajax({
                                    type:'POST',
                                    dataType: 'json',
                                    url:'<?= site_url('checkout/get_deliveryfee') ?>',
                                    data:{rest_id:restID,city_id:addcityID},
                                    success:function(html){
                                        if(html.status==1)
                                        {
                                            $('.deliv_fee_span'+restID).html(html.content);
                                            $('.deliv_store_fee'+restID).val(html.charge);
                                        }
                                        else
                                        {
                                            $('.deliv_fee_span'+restID).html(html.content);
                                            $('.deliv_store_fee'+restID).val(null);
                                        }
                                        var fee = parseFloat($('.deliv_store_fee'+restID).val());
                                        overall+= fee;
                                        if(isNaN(overall))
                                        {
                                            $('.deliv_grandtotal').text('.......');
                                            //parseFloat($("input[name='deliv_grandtotal']").val(null));
                                        }
                                        else{
                                            $('.deliv_grandtotal').text(overall.toFixed(2));
                                            //parseFloat($("input[name='deliv_grandtotal']").val(overall.toFixed(2)));
                                        }
                                    }
                                });
                                
                            });

                        });
                        */
                    }
                }); 
            }else{
                $('#add_option').html('<option value="">Select Address first</option>'); 
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

  
  $("input[name$='paytype']").click(function() {
        var getval = $(this).val();
        if(getval == 'card')
        {
            $('.carddiv').show('taggol');
        }
        else 
        {
            $('.carddiv').hide('slow');
        }
    });
</script>                  
                    
 <script>
    jQuery(document).ready(function($) {
                    
            function run_waitMe(el, num, effect){
		text = 'Please wait...';
		fontSize = '';
		switch (num) {
			case 1:
			maxSize = '';
			textPos = 'vertical';
			break;
			case 2:
			text = '';
			maxSize = 30;
			textPos = 'vertical';
			break;
			case 3:
			maxSize = 30;
			textPos = 'horizontal';
			fontSize = '18px';
			break;
		}
		el.waitMe({
			effect: effect,
			text: text,
			bg: 'rgba(255,255,255,0.7)',
			color: '#000',
			maxSize: maxSize,
			waitTime: -1,
			source: 'img.svg',
			textPos: textPos,
			fontSize: fontSize,
			onClose: function(el) {}
		});
            }
    
    // calc the total 
    $(document).ready(function() {
        
        //on page load Scripts
        
        var addcityID = $(':selected',this).data('cityid');
        var deliv_val = parseFloat($('.deliv_grandtotal').text());
        var overall = 0;
        var grand_price=0;
        
        $(".cart_list").hide(); 

        var $overall = 0;
        var $vat = parseFloat($('.cart_vat').text());
        var $allqty  = 0;
        var $grand_price=0;

        $(".cart_row_total").each(function()
            {

                //var $price = parseFloat($(this).find("td span").text());
                
                var $price = parseFloat($(this).find("input[name='cart_price_total']").val());
                //alert($price);
                $overall+= $price;


            });
        $(".cart_price_sub_grandtotal").text($overall);

        var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
        $vat = parseFloat(($sub_grand * $vat / 100 ).toFixed(2));
        var stakle = parseFloat(($sub_grand * 8 / 100 ).toFixed(2));
        //alert(stakle);
        $('.stakle').val(stakle);
        $grand_price = $sub_grand + $vat;

        $(".cart_price_grandtotal").text($grand_price.toFixed(2));
        
        
        //delivery calculation
        
        var delivery_tr = $('#delivery_tbody').find('tr').nextAll();
        var last = delivery_tr.length-1;
        var countajax=-1;
        
        
        // Get Delivery Price By address
        
        //$('#delivery_tbody').find('tr').each(function(e){
            //$('.deliver_fee', this).each(function() {
            $('.deliver_fee').each(function(index, value) {
                var restID = $(this).data('restid');
                
                if(typeof addcityID === 'undefined')
                {
                    $('.deliv_grandtotal').text('.......');
                    $('.all_price_grandtotal').text('.......');
                    $('.deliv_fee_span'+restID).text('₦.......');
                }
                else{
                // Logic
                    countajax++;
                    
                    //alert($(this).html());
                    $.ajax({
                        type:'POST',
                        dataType: 'json',
                        url:'<?= site_url('checkout/get_deliveryfee') ?>',
                        data:{rest_id:restID,city_id:addcityID},
                        success:function(html){
                            if(html.status==1)
                            {
                                $('.deliv_fee_span'+restID).html(html.content);
                                $('.deliv_store_fee'+restID).val(html.charge);
                                $('.deliv_logistic'+restID).val(html.logistic);
                            }
                            else
                            {
                                $('.deliv_fee_span'+restID).html(html.content);
                                $('.deliv_store_fee'+restID).val(null);
                                $('.deliv_logistic'+restID).val(null);
                            }
                            var fee = parseFloat($('.deliv_store_fee'+restID).val());
                            overall+= fee;
                            //alert(overall);


                        },
                        complete: function(html) {

                            if (countajax === index) {
                                //yourCallback();
                                if(isNaN(overall))
                                {
                                    $('.deliv_grandtotal').text('.......');
                                    //parseFloat($("input[name='deliv_grandtotal']").val(null));
                                }
                                else{
                                    $('.deliv_grandtotal').text(overall.toFixed(2));
                                    //grand_price= $grand_price+overall;
                                   // parseFloat($("input[name='deliv_grandtotal']").val(overall.toFixed(2)));
                                   grand_price= $grand_price+overall;
                                   grand_price=grand_price.toFixed(2);
                                   $(".all_price_grandtotal").text(grand_price);
                                   //alert(grand_price.toFixed(2));
                                   savetosession();
                                }
                            }
                        }
                    });
                //alert(countajax); 
                }//end of else
            });
        //});
        
        
        //alert(grand_price.toFixed(2));
        
        
        
        $("form").submit(function (e) {
            run_waitMe($('#WaitMe_check'), 1, 'orbit');
        });
        
        
        
        
        // save the grand total  Cart to session for security 
        savetosession = function(){ 
            $.ajax({
                type: "POST",
                url: '<?= site_url('checkout/savetosession') ?>',
                data:{
                      grandtotal:grand_price
                     },
                success: function (data) {
                  console.log("Success!!");
                },
                error: function (xhr, desc, err) {
                  console.log('error');
                }
              });
            }
        });

    });
</script>



