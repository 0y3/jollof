<style>
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
}
</style>
                                <div class="row">
                                    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6"><strong>Saved Address:</strong> </div>
                                <div class="col-md-6 text-right ">
                                    <a href="/JollofCuisineWeb/accounts/address" data-toggle="modal" data-target="#modal_address" data-popup="#login_popup">
                                        <i class="fa fa-plus-circle" style="color:green"></i> New Address
                                    </a>
                                </div>
                                <div class="col-md-10 top5 add_drop">
                                    <select id="add_option" name="add_option" class="form-control" required="">
                                                                                    

                                                                                            <option value="2">No 15 main close avn.</option>

                                                                                            <option value="1">No 30 school road </option>

                                                                                                                        </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-10" id="add_div">
                                    
                                                                        
                                    
                                    <div class="panel panel-primary">
                                        <div class="panel-heading"><i class="fa fa-truck"></i>&nbsp; Delivery Address</div>
                                        <div class="panel-body">
                                            
                                            <table class="table">
                                                <tbody class="table">
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-user" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><b>Oye</b></span>
                                                            <span style=" padding-left:10px;"><b>Admin</b></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-map-marker"></i> </td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            No 15 main close avn., <br>
                                                            Alimosho,<br>
                                                            Lagos State                                                        </td>
                                                    </tr>
                                                     <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-phone" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span>08080886654</span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span>029272222</span>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                    
                                                                    
                            </div>
                            
                        </div>
                        
                    </div>
                    <!--SHIPPING METHOD END-->
                    
                </div>
                                    
    <div class="col-sm-6">
        <div class="table-responsive">
        <table class="table table-re table-striped table-hoverr  cart_table">
            
                                    <thead>
                                        <tr>
                                            <th >Products</th>
                                            <th>Quantity</th>
                                            <th >Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <!-- <tr>
                                            <th>Item</th>
                                            <th style=" min-width:10px;">QTY</th>
                                            <th style=" min-width:90pxx;">Note</th>
                                            <th>Total Price</th>
                                        </tr>-->

                                        
                        <tr class="cart_row_total">
                            <td>
                                <div class=" nopadding">
                                    
                                    <img width="60px" class="imgcart f_left m_right_10" src="/JollofCuisineWeb/assets/uploads/rest_prod/3_coconut_rice.jpg">
                                    <div class="f_left">
                                        <div class="m_bottom_5">
                                            <h6 class="color_darkk"><a>Coconut Rice</a></h6>
                                        </div>
                                        <div class="clearfix f_size_medium m_bottom_5">
                                                1qty x <b>₦400</b>
                                        </div>
                                        <div class="cart_desc" style=" max-width:350px;">
                                            <span  style="font-weight: 800">Note:</span> Sed aliquam tincidunt tempus ed  tempus ed Sed aliquam tincidunt tempus ed aliquam 
                                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 nopadding" style="padding-left:5px;">
                                    
                                
                                        <div class="section-label " style=" padding-bottom: 0;"> 

                                            <a class="section-label-a"> 
                                                <span class="spansize"> 
                                                    Additional Options
                                                </span> 
                                                <b></b> 
                                            </a>
                                        </div>
                                    <div class="col-sm-12 nopadding bord">
                                        <div class="cart_sub_menu">
                                            
                                            <!--<span class="sub_menu_name">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined variable: submenu</p>
<p>Filename: oye_mainpage_v/checkout.php</p>
<p>Line Number: 452</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/oye_mainpage_v/checkout.php<br />
			Line: 452<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/Checkout.php<br />
			Line: 37<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> :</span> 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined variable: submenu</p>
<p>Filename: oye_mainpage_v/checkout.php</p>
<p>Line Number: 452</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/oye_mainpage_v/checkout.php<br />
			Line: 452<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/Checkout.php<br />
			Line: 37<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>qty <span class="pull-right">₦
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined variable: submenu</p>
<p>Filename: oye_mainpage_v/checkout.php</p>
<p>Line Number: 452</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/views/oye_mainpage_v/checkout.php<br />
			Line: 452<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/application/controllers/Checkout.php<br />
			Line: 37<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: /Applications/MAMP/htdocs/JollofCuisineWeb/index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></span>-->
                                            <table class=" ">     
                                                <tbody>
                                                                                        <tr>
                                                        <td style=" max-width:120px">Beef</td>
                                                        <td class="text-center">1qty </td>
                                                        <td class="text-left"><b>₦ 500.5</b></td>
                                                    </tr>
                                                
                                    
                                                                                        <tr>
                                                        <td style=" max-width:120px">Water bottle with rice</td>
                                                        <td class="text-center">1qty </td>
                                                        <td class="text-left"><b>₦ 450.9</b></td>
                                                    </tr>
                                                
                                    
                                                                                        </tbody>
                                            </table>
                                        </div>
                                    </div>
                                                                        
                        
                                                </div>

                                            </td>
                                            
                                            <td class="cart_qty_td">

                                                <div class="col-sm-6 nopadding">
                                                    <div class="cart_qty">5</div>
                                                    <input type="hidden" class="cart_suball_qty" value="">
                                                </div>
                                                

                                            </td>

                                            
                                            <td class="cart_price_total">
                                                <span style="display:none;">1351.4</span>
                                                <div class="cart_price">₦1351.4</div>
                                                <input type="hidden" name="cart_price_total" class="cart_suball_price" value="">

                                            </td>


                                            <!--<td class="cart_price_total">6757</td>-->
                                        </tr>
                                        
                                                                                                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm- nopadding ">
                                    <img width="60px" class="imgcart f_left m_right_10" src="/JollofCuisineWeb/assets/uploads/fashion_prod/thumbs/16_151926473101.jpg">
                                    <div class="f_left">
                                        <div class="m_bottom_5" style=" max-width:175px;">
                                            <h6><a href="javascript:void(0);" data-toggle="tooltip" title="MIDUO Brand 2017 Hot Design Swimwear Sexy Bandage Bathing Suits Push Up Brazilian Bikini Digital Printing Women Bikinis">
                                                    MIDUO Brand 2017 Hot Design Swimwea...</a></h6>
                                        </div>
                                        <div class="clearfix f_size_medium">
                                            Color:  <b>White</b>
                                            <br>
                                            Size:  <b>S</b>
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                        
                                                

                                            </td>
                                            
                                            <td class="cart_qty_td">

                                                <div class="col-sm-6 nopadding">
                                                    <div class="cart_qty">1</div>
                                                    <input type="hidden" class="cart_suball_qty" value="">
                                                </div>
                                                

                                            </td>

                                           
                                            <td class="cart_price_total">
                                                <span style="display:none;">4000</span>
                                                <div class="cart_price">₦4000</div>
                                                <input type="hidden" name="cart_price_total" class="cart_suball_price" value="">

                                            </td>


                                            <!--<td class="cart_price_total">4000</td>-->
                                        </tr>
                                        
                                                                                                        <tr class="cart_row_total">
                            <td>
                                <div class=" nopadding">
                                    
                                    <img width="60px" class="imgcart f_left m_right_10" src="/JollofCuisineWeb/assets/uploads/rest_prod/3_ewa_riro.jpg">
                                    <div class="f_left">
                                        <div class="m_bottom_5">
                                            <h6 class="color_darkk"><a>Ewa-Riro</a></b>
                                        </div>
                                        <div class="clearfix f_size_medium">
                                                1qty x <b>₦400</b>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 nopadding" style="padding-left:5px;">
                                    
                                
                                                                        
                        
                                                </div>

                                            </td>
                                            
                                            <td class="cart_qty_td">

                                                <div class="col-sm-6 nopadding">
                                                    <div class="cart_qty">1</div>
                                                    <input type="hidden" class="cart_suball_qty" value="">
                                                </div>
                                                

                                            </td>

                                           
                                            <td class="cart_price_total">
                                                <span style="display:none;">400</span>
                                                <div class="cart_price">₦400</div>
                                                <input type="hidden" name="cart_price_total" class="cart_suball_price" value="">

                                            </td>


                                            <!--<td class="cart_price_total">400</td>-->
                                        </tr>
                                        


                                        <tr>
                                            <th colspan="2"><span class="pull-right">Sub Total</span></th>
                                            <td class="boldtext cart_price_sub_grandtotal">NaN</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><span class="pull-right">VAT</span></th>
                                            <td class="boldtext cart_vat">50.00</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><span class="pull-right">Total</span></th>
                                            <td class="boldtext cart_price_grandtotal">207640034</td>
                                        </tr>

                                       
                                    </tbody>
                                </table>
        </div>
    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="table-responsive">    
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Products</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th colspan="2">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="https://placeholdit.co//i/555x200?bg=BDBDBD" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p>Sed aliquam tincidunt tempus</p>
                                                        </td>
                                                        <td>
                                                            <span>$59.99</span>
                                                        </td>
                                                        <td>
                                                           4
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$59.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="<?= site_url('')?>assets/jollof_banners/homepage_banner/food.png" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p>Sed aliquam tincidunt tempus</p>
                                                        </td>
                                                        <td>
                                                            <span>$39.99</span>
                                                        </td>
                                                        <td>
                                                           1
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$39.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="/JollofCuisineWeb/assets/uploads/rest_prod/3_coconut_rice.jpg" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p><span style="font-weight: 400">Note:</span> Sed aliquam tincidunt tempus ed aliquam tincidunt tempus</p>
                                                            <p><span class="text-muted" style="font-weight: 400">Color:</span> White<p>
                                                            <p><span class="text-muted" style="font-weight: 400">Size:</span> S</p>
                                                                      
                                                        </td>
                                                        <td>
                                                            <span>$29.99</span>
                                                        </td>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$29.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><!-- end table -->
                                        </div>
                                    </div>
</div>
   



<script>
    
            
            $("#forgotpwd_form").submit(function (e){
                
                e.preventDefault();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                   url:url,
                   type:method,
                   dataType: 'json',
                   data:data
                }).done(function(data)
                        {
                            
                            if(data.status === '1' )
                            {
                                
                                $('.errorclass').removeClass('alert-danger');
                                $('.errorclass').addClass('alert-success');
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                $("#forgotpwd_form")[0].reset();
                                
                                
                            }
                            else if(data.status === '0' )
                            {
                                //alert('error ' + data.status); 
                                $(".get_error").show("fast");
                                $(".get_error").effect("shake");
                                $(".error_msgr_lg").text(data.content);
                                //$("#modal_login").hide('hide');
                                //$('.modal-backdrop').remove();
                                //$('body').removeClass('modal-open');
                                $("#forgotpwd_form")[0].reset();
                                $("#l_email").focus();
                            } 
                            
                        });

            });
</script>