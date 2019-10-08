<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">
<script src="<?= base_url() ?>assetsjs/bootstrap.min.js"></script>

<style>
    .btn-link {
        color: #888;
    }
    
    .spansize {
        font-size: 14px!important;
    }
    
    .section-label a.section-label-a b {
        border-bottom: 1px solid #ddd;
        width: 100%;
        display: block;
        position: absolute;
        top: 20px;
        left: 0;
        z-index: 1;
    }
    .section-label a.section-label-a span {
        background-color: #FFF;
        position: relative;
        font-size: 28px;
        font-weight: 800;
        z-index: 2;
        padding: 0 8px 0px 0;
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
        border: none;
    }
    .cart_sub_menu table tr{
        padding: 0px !important;
        margin: 0 !important;
    }
    .cart_sub_menu table tr td{
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        border: none !important;
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
    /** MEDIA QUERIES **/
    @media only screen and (max-width: 989px){
        .span1{
            margin-bottom: 15px;
            clear:both;
        }
        .mo_radio{
            width: 20% !important;
        }
    }

    @media only screen and (max-width: 764px){
        .inverse-1{
            float:right;
        }
        .mo_radio{
            width: 20% !important;
        }
    }

    @media only screen and (max-width: 586px){
        .cart-titles{
            display:none;
        }
        .panel {
            margin-bottom: 1px;
        }
        .mo_radio{
            width: 20% !important;
        }
    }

</style>
        <div class="breadcrumb-area ptb-40 hm-4-padding gray-bg">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Shopping cart CheckOut</h2>
                    
                </div>
            </div>
        </div>
<div id="WaitMe_check" class="container wrapper ">

  <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Orders Review</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Delivery Options</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Payment Option</p>
                </a></li>
            </ul>
        </div>
  </div>


    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-lg-12 well">

                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                    
                        <!-- Order list -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Order Review</a></h5>
                            </div>
                            <div id="payment-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="order-review-wrapper">
                                        <?php if(!empty($cart_list)): ?>
                                        <div class="order-review">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="width-1" style="width: 70%;">Product Name</th>
                                                            <th class="width-3">Qty</th>
                                                            <th class="width-4">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($cart_list as $items) :?>
                                                        <?php if(!empty($items['product_color_size'])): ?>
                                                        <tr class="cart_row_total">
                                                            <td>
                                                                <div class=" o-pro-dec ">
                                                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/fashion_prod/thumbs/<?= $items["img"]?>">
                                                                    <div class="f_left">
                                                                        <div class="m_bottom_5" style="">
                                                                            <h6 class="linkcolor">
                                                                                <a href="javascript:void(0);" data-toggle="tooltip" title="<?=$items["name"]?>">
                                                                                    <?php
                                                                                        $value = $items["name"];
                                                                                        $limit = '50';
                                                                                        if (strlen($value) > $limit) {
                                                                                                $trimValues = substr($value, 0, $limit).'...';
                                                                                            } 
                                                                                        else {
                                                                                                $trimValues = $value;
                                                                                          }
                                                                                            //character_limiter($resta['companydesc'],25); 
                                                                                          echo $trimValues;
                                                                                    ?>
                                                                                </a>
                                                                            </h6>
                                                                        </div>
                                                                        <div class="clearfix f_size_medium">
                                                                            Color:  <b><?= $items["product_colorname"]?></b>
                                                                            <br>
                                                                            Size:  <b><?= $items["product_size"]?></b>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </td>   
                                                            <?php else: ?>
                                                        <tr class="cart_row_total">
                                                            <td>
                                                            <div class="o-pro-dec row">
                                                                <div class="col-sm-12">
                                                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $items["img"]?>">
                                                                    <div class="f_left">
                                                                        <div class="m_bottom_5">
                                                                            <h6 class="linkcolor">
                                                                                <a href="javascript:void(0);" title="<?=$items["name"]?>">
                                                                                    <?php
                                                                                        $value = $items["name"];
                                                                                        $limit = '50';
                                                                                        if (strlen($value) > $limit) {
                                                                                                $trimValues = substr($value, 0, $limit).'...';
                                                                                            } 
                                                                                        else {
                                                                                                $trimValues = $value;
                                                                                          }
                                                                                            //character_limiter($resta['companydesc'],25); 
                                                                                          echo $trimValues;
                                                                                    ?>
                                                                                </a>
                                                                            </h6>
                                                                        </div>
                                                                        <div class="clearfix f_size_medium">
                                                                            <?= $items["prd_qty"]?>qty x <b>₦<?= $items["prd_pr"]?></b>
                                                                        </div>
                                                                        <?php if(!empty($items['description'])): ?>
                                                                        <div class="cart_desc" style=" max-width:350">
                                                                            <span style="font-weight: 800">Note:</span>
                                                                            <?= $items['description']?>
                                                                        </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-12 pt-10" style="padding-left:5px;">
                                                                    
                                                                    <?php if(!empty($items['submenu'])): ?>
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

                                                                            <table class="">     
                                                                                <tbody>
                                                                                    <?php foreach ($items['submenu'] as $submenu) :?>
                                                                                    <tr>
                                                                                        <td><?= $submenu[0]?></td>
                                                                                        <td class="text-center"><?= $submenu[1]?>qty </td>
                                                                                        <td class="text-left">₦<?= number_format($submenu[2])?></td>
                                                                                    </tr>
                                                                                    <?php endforeach; ?>

                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <textarea name="addedmenuu" class="form-control" rows="5" style="display: none;"><?php if(!empty($items['submenu'])): ?>
                                                            <?php foreach ($items['submenu'] as $submenu) :?>
                                                                <div class="added_menu">
                                                                    <table class=" ">     
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?= $submenu[0]?></td>
                                                                                <td class="text-center"><?= $submenu[1]?>qty </td>
                                                                                <td class="text-right"> ₦<?= number_format($submenu[2])?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?></textarea>
                                                         
                                                            <td class="cart_qty_td">

                                                                <div class="o-pro-qty ">
                                                                    <p class="cart_qty"><?= $items["prd_qty"]?></p>
                                                                    <input type="hidden" class="cart_suball_qty" value="">
                                                                </div>
                                                            </td>
                                                            <td class="cart_price_total ">
                                                                <div class="o-pro-subtotal">
                                                                <?php if(!empty($items['fashion_productid'])): ?>

                                                                    <span style="display:none;"><?= $items["price"]* $items["prd_qty"]?></span>
                                                                    <p class="cart_price">₦<?= number_format($items["price"]* $items["prd_qty"])?></p>
                                                                    <input type="hidden" name="cart_price_total" class="cart_suball_price" value="<?= $items["price"]* $items["prd_qty"]?>">

                                                                <?php else: ?>

                                                                    <span style="display:none;"><?= $items["price"]?></span>
                                                                    <p class="cart_price">₦<?= number_format($items["price"],2)?></p>
                                                                    <input type="hidden" name="cart_price_total" class="cart_suball_price" value="<?= $items["price"]?>">

                                                                <?php endif; ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="2">Total </td>
                                                            <td colspan="1">₦<span class="cart_price_sub_grandtotal2">0</span></td>
                                                            <span class="cart_price_sub_grandtotal" style=" display: none;"></span>
                                                        </tr>

                                                    <?php if( isset($_SESSION['s_coupon_code']) ): ?>
                                                        <tr class="tr-f">
                                                            <td colspan="2">Coupon Discount</td>
                                                            <td colspan="1"> - ₦<span class="cart_coupon"><?= number_format($_SESSION['s_coupon_discount'],2)?></span></td>
                                                        </tr>
                                                    <?php endif; ?>

                                                        <tr><td colspan="2">VAT</td>
                                                            <td colspan="1"><span class="cart_vat"><?=$vat?></span>%</td>
                                                            <input type="hidden" name="stakle" class="stakle" value="0">
                                                        </tr>
                                                        <!--<tr class="tr-f">
                                                            <td colspan="2">Shipping & Handling (Flat Rate - Fixed</td>
                                                            <td colspan="1">$45.00</td>
                                                        </tr>-->
                                                        <tr>
                                                            <td colspan="2">Sub Total</td>
                                                            <td colspan="1">₦<span class="cart_price_grandtotal2"></span></td>
                                                            <span class="cart_price_grandtotal" style=" display: none;"></span>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                            <?php if( !isset($_SESSION['s_coupon_code']) ): ?>
                                            
                                                Have a Coupon Code?
                                                <a href="javascript:void(0);" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/couponform') ?>" >Click Here...</a>
                                            <?php else: ?>
                                                <form id="coupon_form" action="<?= base_url() ?>jollofadmin/coupon/coupon_validation" method="post">
                                                <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                                                    <span class="error_msgr_lg"> </span>
                                                </div>
                                                <div class="login-form linkcolor ">
                                                    <label> Coupon Code:</label>
                                                    <b><?=$_SESSION['s_coupon_code']?></b> 
                                                     <a href="javascript:void(0);" class="clearcoupon "> <i class="fa fa-window-close"></i> Clear Coupon</a>
                                                </div>
                                                
                                            </form>

                                            <?php endif; ?>
                                            </div>
                                            <!--<div class="billing-back-btn">
                                                <!--<div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>-->
                                                <!--<span>
                                                    Forgot an Item?
                                                    <a href="#"> Edit Your Cart.</a>

                                                </span>-->
                                                <!--<div class="billing-btn">
                                                    <button type="submit">Continue</button>
                                                </div>
                                            </div>-->
                                        </div>
                                        <?php else: ?>

                                            <div class="alert alert-danger alert-dismissable fade in">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Oh snap!</strong>
                                                Sorry Cart is Empty.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        


                        <!-- Account panel -->
                        <?php if( (!isset($_SESSION['Type']) ) || (isset($_SESSION['Type']) && $_SESSION['Type'] !='User') ): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Checkout method</a></h5>
                            </div>
                            <div id="payment-2" class="panel-collapse collapse show">
                                <div id="WaitMe_form" class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="checkout-login">
                                                <h5 class="checkout-sub-title">login</h5>
                                                
                                                <form id="login_form" action="<?= base_url() ?>accounts/login_validation" method="post">
                                                    <div class="alert alert-danger alert-dismissable get_error" style="display: none;">
                                                        <span class="error_msgr_lg"> </span>
                                                    </div>
                                                    <div class="login-form">
                                                        <label> Email Address </label>
                                                        <input type="email" name="l_email" id="l_email" placeholder="example@example.com" autofocus="" required="required">
                                                    </div>
                                                    <div class="login-form">
                                                        <label> Password </label>
                                                        <input type="password" name="l_pwd" placeholder="Password" required="required">
                                                    </div>
                                                    <div class="login-forget">
                                                        <button class="checkout-btn" type="submit">Login</button>
                                                        <a  href="javascript:void(0);" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/forgotpwd') ?>" >
                                                            <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                                                        </a>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout-register">
                                                <h5 class="checkout-sub-title">Check Out As Guest User</h5>
                                                 <button id="activate-step-2" class="checkout-btn mt-20">Next Step</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <?php endif; ?>
                        <!-- End Account panel -->


                    </div>
                </div>
                <?php if( (isset($_SESSION['Type']) && $_SESSION['Type'] =='User' ) && isset($_SESSION['logged_in'])): ?>
                    <button id="activate-step-2" class="checkout-btn mt-20">Next Step</button>
                <?php endif; ?>

            </div>
        </div>
    </div>

<form class="form-horizontal" method="post" id="payment_forms" action="<?= site_url('checkout/Payment')?>">
     <textarea name="addedmenu" class="form-control" style="display: none;"><?php foreach ($cart_list as $items) :?>
                                                        <?php if(!empty($items['submenu'])): ?>
                                                            <?php foreach ($items['submenu'] as $submenu) :?>
                                                                <div class="added_menu">
                                                                    <table class=" ">     
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?= $submenu[0]?></td>
                                                                                <td class="text-center"><?= $submenu[1]?>qty </td>
                                                                                <td class="text-right"> ₦<?= number_format($submenu[2])?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?></textarea>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-lg-12 well">

                
                                    

                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">Delivery Information</a></h5>
                    </div>
                    <div id="payment-3" class="panel-collapse collapse ">
                        <div class="panel-body">

                            <?php if( (!isset($_SESSION['Type']) )|| (isset($_SESSION['Type']) && $_SESSION['Type'] !='User') ): ?>

                            <div class="billing-information-wrapper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="requireds" name="bill_firstname" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="requireds" name="bill_lastname" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Telephone <span class="text-danger">*</span></label>
                                            <input type="text" class="cu_phone_js requireds" name="bill_phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="requireds" name="bill_email" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>Delivery Address <span class="text-danger">*</span></label>
                                            <input type="text" class="requireds" name="bill_address" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-select expiration-mr">
                                            <label>State <span class="text-danger">*</span></label>
                                            <select id="state_div" name="state" class="form-control requireds" required="" style="height: 40px;">
                                                <?php if(!empty($state)): ?>
                                                    <option value="">Select State</option>

                                                    <?php foreach ($state as $state_list) :?>
                                                        <option value="<?= $state_list->id ?>"><?= $state_list->statename ?></option>

                                                    <?php endforeach;?>
                                                <?php else: ?>

                                                    <option value="">State not available</option>

                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-select expiration-mrg">
                                            <label>City <span class="text-danger">*</span></label>
                                            <select id="city_div" name="city" class="form-control requireds" required="" style="height: 40px;">
                                                <option>Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <?php else: ?>

                            <div class="shipping-information-wrapper">
                                <div class="row pb-10">
                                    <div class="col-md-6"><strong>Saved Address:</strong> </div>
                                    <div class="col-md-6 text-right ">

                                        <a  href="javascript:void(0);" class="ajaxbook_form fancybox.ajax" data-fancybox data-type="ajax" data-src="<?=site_url('accounts/address') ?>" >
                                            <i class="fa fa-plus-circle" style="color:green" ></i> New Address
                                        </a>
                                    </div>
                                </div>
                                <div class="billing-select">
                                    <select id="add_option" name="add_option" required="" class="email s-email s-wid">
                                        <?php if(!empty($add_list)): ?>
                                            <?php foreach ($add_list as $row) :?>
                                                <option data-cityid="<?= $row->cityid ?>" data-stateid="<?= $row->stateid ?>" data-cityname="<?= $row->cityname ?>" data-statename="<?= $row->statename ?>" value="<?= $row->id ?>"><?= $row->address ?></option>
                                            <?php endforeach;?>
                                        <?php else: ?>
                                                <option value="">Address not available</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="shipping-info-2 pt-20 add_div">
                                    
                                    <?php if(!empty($add_list)): ?>
                                    <span><i class="fa fa-user" aria-hidden="true"></i>: <?= $add_list[0]->firstname ?>  <?= $add_list[0]->lastname ?></span>
                                    <span><i class="fa fa-map-marker"></i>: <?= $add_list[0]->address ?> </span>
                                    <span><?= $add_list[0]->cityname ?></span>
                                    <span><?= $add_list[0]->statename ?></span>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i> : <?= $add_list[0]->phone ?> </span>
                                    <span><i class="fa fa-mobile" aria-hidden="true"></i> : <?= $add_list[0]->phone2 ?> </span>
                                    <?php endif; ?>
                                </div>
                                <!--<div class="edit-address">
                                    <a href="#">Edit Address</a>
                                </div>-->
                                
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title"><span>4</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-4">Delivery method</a></h5>
                    </div>
                    <div id="payment-4" class="panel-collapse collapse show">
                        <div class="panel-body">
                            <div class="shipping-method-wrapper">
                                <div class="shipping-method">
                                    
                                    <?php
                                    if(empty($add_list))
                                    {
                                        $city_id =0;
                                        $city_name ='<span class="label label-danger">Add a Delivery Address</span>';

                                        $state_id =0;
                                        $state_name ='';
                                    }
                                    else
                                    {
                                        $city_id =$add_list[0]->cityid;
                                        $city_name =$add_list[0]->cityname;

                                        $state_id =$add_list[0]->stateid;
                                        $state_name =$add_list[0]->statename;
                                    }
                                    ?>
                                    <div class="table-responsive">    
                                        <table id="delivery_table" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"><b></b></th>
                                                    <th><b>Area</b></th>
                                                    <th><b>Delivery Fee</b></th>
                                                </tr>
                                            </thead>
                                            <tbody id="delivery_tbody">

                                                <tr class="delivery_tr">
                                                   <?php
                                                   $rownum=1;

                                                   ?>
                                                    <td>
                                                        <a href="javascript:void(0);">
                                                            <img width="100px" class="" src="<?= base_url('assets/img/jollof_logo2.png') ?>" alt="jollof.com">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <h6 class="regular"><a href="javascript:void(0);"></a></h6>
                                                    </td>
                                                    <td class="deliver_location">
                                                        <?=$city_name?> <?=$state_name?>
                                                    </td>
                                                    <td class="deliver_fee" data-restid="<?= $rownum?>">
                                                        <div class="div_delivfee">
                                                        <span class="span_delivfee text-primary deliv_fee_span<?= $rownum ?>">₦<span class=""></span></span>
                                                        <input type="text" name="deliv_store_fee[]" class="input_delivfee deliv_store_fee<?= $rownum ?>" value="" required="" 
                                                        oninvalid="this.setCustomValidity('Can not deliver To this Area')"
                                                        oninput="setCustomValidity('')"/>
                                                        <input type="hidden" name="store_name[]" value="<?= $rownum ?>">
                                                        <input type="hidden" name="store_logistic[]" class="deliv_logistic<?= $rownum ?>" value="">
                                                        <input type="hidden" name="c_vat" class="cart_vat" value="<?=$vat?>">

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3"><span class="pull-right">Total Delivery Cost</span></th>
                                                    <td class="boldtext ">
                                                        ₦<span class="deliv_grandtotal ">0</span>
                                                        <input type="hidden" name="deliv_total_fee" class="deliv_total_fee" value="">
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table><!-- end table -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="billing-back-btn">
                    <div class="billing-back">
                        <a href="#step-1"><i class="ion-arrow-left-c"></i> back</a>
                    </div>
                    <div class="billing-btn">
                        <?php if( (!isset($_SESSION['Type']) )|| (isset($_SESSION['Type']) && $_SESSION['Type'] !='User') ): ?>
                            <button id="activate-step-3" class="checkout-btn mt-20" disabled="" > Next as Guset User</button>
                        <?php else: ?>
                            <button id="activate-step-3" class="checkout-btn mt-20"> Next </button>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-lg-12 well">


                <!-- payment -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>5</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">payment information</a></h5>
                                    </div>
                                    <div id="payment-6" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                     <?php if( isset($_SESSION['s_coupon_code']) ): ?>
                                            <input type="hidden" name="cart_couponcode" class="cart_coupon1" value="<?=$_SESSION['s_coupon_code']?>">
                                            <input type="hidden" name="cart_coupon" class="cart_coupon2" value="<?=$_SESSION['s_coupon_discount']?>">
                                     <?php else: ?>
                                        <input type="hidden" name="cart_couponcode" class="cart_coupon1" value="0">
                                        <input type="hidden" name="cart_coupon" class="cart_coupon2" value="0">
                                    <?php endif; ?>
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" name="paytype" id="" value="delivery" >
                                                        <label>Pay On Delivery </label>
                                                    </div>

                                                    <?php if(( isset($_SESSION['Type']) && $_SESSION['Type'] =='User' ) && isset($_SESSION['logged_in'])): ?>
                                                    <div class="single-ship">
                                                        <input type="radio" name="paytype" id="" value="card" required="">
                                                        <label>Credit Card (saved) </label>
                                                    </div>
                                                    <?php else: ?>
                                                    <div class="single-ship">
                                                        <input type="radio" name="paytype" id="" value="card" required="">
                                                        <label>Credit Card </label>
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                                <?php if(isset($add_card)): ?>
                                                <div class="payment-info carddiv" style="display:none;">
                                                    <div class="row">
                                                        
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-select expiration-mrg">
                                                                <label>Credit Card Type</label>
                                                                
                                                                <?php foreach ($add_card as $row) :?>

                                                                <label class="input-group">
                                                                    <span style="width: 4%;" class="input-group-addon mo_radio" >
                                                                        <input type="radio"  style=" height:unset;" name="card_au" value="<?= $row->authorizationcode ?>"  />
                                                                    </span>
                                                                    <div class="form-control form-control-static">
                                                                        **** **** **** <?= $row->last4 ?>
                                                                    </div>
                                                                </label>

                                                                <?php endforeach;?>

                                                                <label class="input-group">
                                                                    <span  style="width: 4%;" class="input-group-addon mo_radio">
                                                                        <input type="radio" style=" height:unset;"   name="card_au" value="0" checked="checked" readonly=""/>
                                                                    </span>
                                                                    <div class="form-control form-control-static">
                                                                        New / Other Card
                                                                    </div>
                                                                </label>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <?php endif; ?>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <div class="boldtext linkcolor">
                                                            Grand- Total : 
                                                            <a href="javascript:void(0);">₦<span class="all_price_grandtotal2"></span></a>
                                                            <span class="all_price_grandtotal" style=" display: none;"></span>
                                                        </div>
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit"> Check Out</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Payment -->
                <button class="checkout-btn mt-20"> Check Out</button>
            </div>
             
        </div>
    </div>
</form>
</div>
        
        
		
		
<script>

$(document).on('change', '.requireds', function(e){
   var Disabled = true;
    $(".requireds").each(function() {

      let value = this.value
      if ((value)&&(value.trim() !=''))
          {
            Disabled = false
          }else{
            Disabled = true
            return false
          }
    });


   if(Disabled){
        $('#activate-step-3').prop("disabled", true);
      }else{
        $('#activate-step-3').prop("disabled", false);
      }
 })

$('.header-cart').hide();

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
        //$(this).remove();
    })   
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        //$(this).remove();
    })    
});


        
</script>

<script>
    /*---------------------
        Please wait...
    --------------------- */
    
    
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

    /*---------------------
    clear coupon
    --------------------- */
    $(".clearcoupon").on('click',function(e){

        e.preventDefault();
        run_waitMe($('body'), 1, 'orbit');
        $.ajax({
           url:'<?= site_url('accounts/clearcoupon') ?>',
           type:'post',
           dataType: 'json'
        }).done(function(data)
                {

                    if(data.status === '1' )
                    {
                        //alert('welcome success' + data.status); 
                        $('.jollof_logindiv').html(data.content);
                        new jBox('Notice', {
                                    //animation: 'flip',
                                    animation: {
                                      open: 'tada',
                                      close: 'zoomIn'
                                    },
                                    position: {
                                      x: 10,
                                      y: 100
                                    },
                                    attributes: {
                                      x: 'right',
                                      y: 'bottom'
                                    },
                                    color: 'green',
                                    autoClose: Math.random() * 8000 + 2000,
                                    //title: 'Tadaaa! I\'m single',
                                    content: 'Success! Coupon cleared ',
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });

                            setInterval(function(){ 
                                location.reload(); // then reload the page.
                            }, 1500);
                            //window.location.href='http://localhost/jollof-cuisine/adminoye/dashbord';

                    }

                });
         //$('#WaitMe_form').waitMe('hide');

    });

    /*---------------------
    Account Login
    --------------------- */
    $("#login_form").submit(function (e){

        e.preventDefault();
        run_waitMe($('#WaitMe_form'), 1, 'orbit');
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
                        //alert('welcome success' + data.status); 
                        $('.jollof_logindiv').html(data.content);
                        new jBox('Notice', {
                                    //animation: 'flip',
                                    animation: {
                                      open: 'tada',
                                      close: 'zoomIn'
                                    },
                                    position: {
                                      x: 10,
                                      y: 100
                                    },
                                    attributes: {
                                      x: 'right',
                                      y: 'bottom'
                                    },
                                    color: 'green',
                                    autoClose: Math.random() * 8000 + 2000,
                                    //title: 'Tadaaa! I\'m single',
                                    content: 'Success! welcome Back '+data.name,
                                    delayOnHover: true,
                                    showCountdown: true,
                                    closeButton: true
                                });



                        $(".log").data("log", 1);

                            setInterval(function(){ 
                                location.reload(); // then reload the page.
                            }, 2000);
                            //window.location.href='http://localhost/jollof-cuisine/adminoye/dashbord';

                    }
                    else if(data.status === '0' )
                    {
                        //alert('error ' + data.status); 
                        $('#WaitMe_form').waitMe('hide');
                        $(".get_error").show("fast").delay(4000).fadeOut('fast');
                        $(".error_msgr_lg").text(data.content);
                        //$(".get_error").effect("shake");
                        //$("#modal_login").hide('hide');
                        //$('.modal-backdrop').remove();
                        //$('body').removeClass('modal-open');
                        $("#login_form")[0].reset();
                        $("#l_email").focus();
                    } 

                });
         //$('#WaitMe_form').waitMe('hide');

    });
    

    $('#state_div').on('change',function(){
            
            var stateID = $(this).val();
            
            if(stateID){
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('accounts/get_city_byid') ?>',
                    data:'stateid='+stateID,
                    success:function(html){
                        $('#city_div').html(html);
                    }
                }); 
            }else{
                $('#city_div').html('<option value="">Select state first</option>'); 
            }
        });
</script>
<script type="text/javascript">
    
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
                    url:'<?= site_url('checkout/get_address_') ?>',
                    data:'id='+addID,
                    success:function(html){
                        $('.add_div').html(html);
                        
                        
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
                                            $('.deliv_grandtotal').text(overall.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                                            $('.deliv_total_fee').val(overall);
                                            $grand_price = parseFloat($('.cart_price_grandtotal').text());
                                            grand_price= $grand_price+overall;
                                            grand_price=grand_price.toFixed(1);
                                            
                                            var grand_priceformat=($grand_price).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                            $(".all_price_grandtotal").text(grand_price);
                                            $(".all_price_grandtotal2").text(grand_price);
                                            //alert(grand_price.toFixed(2));
                                            savetosession2(grand_price);
                                        }
                                    }
                                }
                            });
                            //alert(countajax); 
                        });
                       
                    }
                }); 
            }else{
                $('#add_option').html('<option value="">Select Address first</option>'); 
            }
        });
        
        $('#city_div').on('change',function(){
            
            var overall=0;
            var addcityID = $(this).val();
            var addstateID = $('#state_div').val();
            
            var addcityName =  $('#city_div :selected').text();
            var addstateName = $('#state_div :selected').text();
            var countajax=-1;
            var grand_price=0;
            var $grand_price=0;
            
            console.log(':select & this => ' + $(this).val());
            console.log('option:select & this => ' + $('#state_div').val());
            
            if(addcityID){
                $('.deliver_location').html(addcityName+', '+addstateName);
            
                        
                        
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
                                            $('.deliv_grandtotal').text(overall.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                                            $('.deliv_total_fee').val(overall);
                                            $grand_price = parseFloat($('.cart_price_grandtotal').text());
                                            grand_price= $grand_price+overall;
                                            grand_price=grand_price.toFixed(1);
                                            
                                            var grand_priceformat=($grand_price).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                            $(".all_price_grandtotal").text(grand_price);
                                            $(".all_price_grandtotal2").text(grand_price);
                                            //alert(grand_priceformat);
                                            savetosession2(grand_price);
                                        }
                                    }
                                }
                            });
                            //alert(countajax); 
                        });
                 }   
            });

// save the grand total  Cart to session for security 
    
        //savetosession = function(grand_price){
        function savetosession2(grand_price){
            //alert(grand_price);
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
        var $overall_format=($overall).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $(".cart_price_sub_grandtotal").text($overall);
        $(".cart_price_sub_grandtotal2").text($overall_format);

        var coupon_dis = 0;

        if ( $( 'input[name="cart_coupon"]' ).length )
        {
            coupon_dis = parseFloat($("input[name='cart_coupon']").val());
        }

        var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());

        $vat = parseFloat(($sub_grand * $vat / 100 ).toFixed(2));
        var stakle = parseFloat(($sub_grand * 8 / 100 ).toFixed(2));
        //alert(stakle);
        $('.stakle').val(stakle);
        $grand_price = ($sub_grand + $vat)-coupon_dis;
        
        var grand_priceformat=($grand_price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $(".cart_price_grandtotal").text($grand_price.toFixed(2));
        $(".cart_price_grandtotal2").text(grand_priceformat);
        
        
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
                                    $('.deliv_grandtotal').text(overall.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                                    $('.deliv_total_fee').val(overall);
                                    //grand_price= $grand_price+overall;
                                   // parseFloat($("input[name='deliv_grandtotal']").val(overall.toFixed(2)));

                                   grand_price= $grand_price+overall;
                                   //grand_price=grand_price.toFixed(2);

                                   var grand_priceformat2=(grand_price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

                                    $(".all_price_grandtotal").text(grand_price.toFixed(2));
                                    $(".all_price_grandtotal2").text(grand_priceformat2);
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
        
        
        
        $("#payment_forms").submit(function (e) {
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
