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
            <div class="row cart-head top20">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc"> Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc"> Checkout</a> <span class="step_line last"> </span> <span class="step_line step_complete last"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div  class="row cart-body top20">
                
                <form class="form-horizontal" method="post" action="<?= site_url('checkout/Payment')?>">
                    
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info" style=" border-left: none; border-right: none; border-bottom: none;">
                        <div class="panel-heading"><b><i class="fa fa-truck" aria-hidden="true"></i> Delivery Address</b></div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-6"><strong>Saved Address:</strong> </div>
                                <div class="col-md-6 text-right ">
                                    <a href="<?=site_url('accounts/address') ?>" data-toggle="modal" data-target="#modal_address" data-popup="#login_popup">
                                        <i class="fa fa-plus-circle" style="color:green" ></i> New Address
                                    </a>
                                </div>
                                <div class="col-md-10 top5 add_drop">
                                    <select id="add_option" name="add_option" class="form-control" required>
                                        <?php if(!empty($add_list)): ?>
                                            

                                            <?php foreach ($add_list as $row) :?>
                                        <option data-cityid="<?= $row->cityid ?>" data-stateid="<?= $row->stateid ?>" data-cityname="<?= $row->cityname ?>" data-statename="<?= $row->statename ?>" value="<?= $row->id ?>"><?= $row->address ?></option>

                                            <?php endforeach;?>
                                        <?php else: ?>

                                            <option value="">Address not available</option>

                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-10" id="add_div">
                                    
                                    <?php if(!empty($add_list)): ?>
                                    
                                    
                                    <div class="panel panel-primary">
                                        <div class="panel-heading"><i class="fa fa-truck" ></i>&nbsp; Delivery Address</div>
                                        <div class="panel-body">
                                            
                                            <table class="table">
                                                <tbody class="table">
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-user" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><b><?= $add_list[0]->firstname ?></b></span>
                                                            <span style=" padding-left:10px;"><b><?= $add_list[0]->lastname ?></b></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-map-marker"></i> </td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <?= $add_list[0]->address ?>, <br>
                                                            <?= $add_list[0]->cityname ?>,<br>
                                                            <?= $add_list[0]->statename ?>
                                                        </td>
                                                    </tr>
                                                     <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-phone" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><?= $add_list[0]->phone ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="table-bordered">
                                                        <td class="heading-table" style=" width: 5%"><i class="fa fa-mobile" aria-hidden="true"></i></td>
                                                        <td class="heading-name" style=" width: 95%">
                                                            <span><?= $add_list[0]->phone2 ?></span>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <!--<address>
                                                <b><a><?= $add_list[0]->firstname ?> <?= $add_list[0]->lastname ?></a></b><br>
                                                <i class="fa fa-map-marker"></i> <?= $add_list[0]->address ?>, <br>
                                                <?= $add_list[0]->cityname ?>,<br>
                                                <?= $add_list[0]->statename ?><br><br>
                                                <i class="fa fa-mobile"></i> <?= $add_list[0]->phone ?><br>
                                                <i class="fa fa-phone" aria-hidden="true"></i> <?= $add_list[0]->phone2 ?><br>
                                            </address>-->
                                        </div>
                                    </div>
                                    
                                <?php endif; ?>
                                
                                </div>
                                    
                            </div>
                            
                        </div>
                        
                    </div>
                    <!--SHIPPING METHOD END-->
                    
                    <div class="panel panel-info" style=" border-left: none; border-right: none; border-bottom: none;">
                        <div class="panel-heading"><b>Calculate Delivering</b></div>
                        <div class="panel-body">
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
                                                        <th colspan="2"><b>Store Name</b></th>
                                                        <th><b>Area</b></th>
                                                        <th><b>Delivery Fee</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="delivery_tbody">
                                                    <?php foreach ($deliver_rest as $row) :?>
                                                    <tr class="delivery_tr">
                                                       <?php
                                                       if($row->merchanttype==='cuisine')
                                                       {
                                                           $logo_dir= base_url('assets/uploads/rest_logo/').$row->logo;
                                                       }
                                                       else
                                                       {
                                                           $logo_dir= base_url('assets/uploads/fashion_logo/').$row->logo;
                                                       }
                                                       ?>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="40px" src="<?= $logo_dir ?>" alt="<?= $row->companyname ?>">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);"><?= $row->companyname ?></a></h6>
                                                        </td>
                                                        <td class="deliver_location">
                                                            <?=$city_name?>, <?=$state_name?>
                                                        </td>
                                                        <td class="deliver_fee" data-restid="<?= $row->id ?>">
                                                            <div class="div_delivfee">
                                                            <span class="span_delivfee text-primary deliv_fee_span<?= $row->id ?>">₦<span class=""></span></span>
                                                            <input type="text" name="deliv_store_fee[]" class="input_delivfee deliv_store_fee<?= $row->id ?>" value="" required="" 
                                                            oninvalid="this.setCustomValidity('Can not deliver To this Area')"
                                                            oninput="setCustomValidity('')"/>
                                                            <input type="hidden" name="store_name[]" value="<?= $row->id ?>">
                                                            <input type="hidden" name="store_logistic[]" class="deliv_logistic<?= $row->id ?>" value="">

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <tr>
                                                        <th colspan="3"><span class="pull-right">Total Delivery Cost</span></th>
                                                        <td class="boldtext ">
                                                            ₦<span class="deliv_grandtotal ">0</span>
                                                        </td>
                                                    </tr>
                                                    <!--
                                                    <tr>
                                                        
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
                                                    -->
                                                </tbody>
                                            </table><!-- end table -->
                                        </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT-->
                    <!--<div class="panel panel-info" style=" border-left: none; border-right: none">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Payment</div>
                        <div class="panel-body">
                            <!--<div class="form-group">
                                <div class="col-md-12"><strong>Cards:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>-->
                            
                            <!--<div class="form-group">
                                <div class="col-md-12">
                                     <label class="radio-inline">
                                        <input type="radio" name="paytype" id="" value="card" required="">
                                        <strong>Card</strong>
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="paytype" id="" value="delivery" required="">
                                        <strong>On Delivery</strong>
                                    </label>
                                </div>
                                
                                <div class="col-md-12 carddiv" style="display:none;">
                                    
                                    <div class="col-md-12" style="padding:10px 0;">
                                    
                                        <strong>Cards:</strong>

                                    </div>
                                    
                                    <?php foreach ($add_card as $row) :?>

                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="card_au" value="<?= $row->authorizationcode ?>"  />
                                        </span>
                                        <div class="form-control form-control-static">
                                            **** **** **** <?= $row->last4 ?>
                                        </div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>
                                                
                                    <?php endforeach;?>
                                    
                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="card_au" value="0" checked="checked" readonly=""/>
                                        </span>
                                        <div class="form-control form-control-static">
                                            New card
                                        </div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>
                                </div>
                                
                                <!--<div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>-->
                            <!--</div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="boldtext">
                                        Grand- Total : 
                                    <a href="javascript:void(0);">₦<span class="cart_price_grandtotal">2573.97</span></a>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                    
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!--REVIEW ORDER-->
                    <div class="panell panel-infoo">
                        <div class="panel-headingg ">
                            <h3>Order Review</h3> <div class="pull-right"><small></small></div>
                        </div>
                        <div class="panel-bodyy">
                            
                            
                            <?php if(!empty($cart_list)): ?>
                            <div class="table-responsive">
                                
                                <table class="table table-re table-striped table-hoverr table-borderedd cart_table">
                                    <thead>
                                        <tr>
                                            <th ><b>Products</b></th>
                                            <th><b>Quantity</b></th>
                                            <th ><b>Price</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--<tr>
                                            <th >Item</th>
                                            <th style=" min-width:10px;">QTY</th>
                                            <th style=" min-width:90pxx;">Note</th>
                                            <th>Total Price</th>
                                        </tr>-->

                                        <?php foreach ($cart_list as $items) :?>

                                        <?php 
                                            //print("<pre>".print_r($items,true)."</pre>");die;
                                        ?>
                        <?php if(!empty($items['product_color_size'])): ?>
                        <tr class="cart_row_total">
                            <td>
                                <div class="col-sm- nopadding ">
                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/fashion_prod/thumbs/<?= $items["img"]?>" >
                                    <div class="f_left">
                                        <div class="m_bottom_5" style=" max-width:175px;">
                                            <h6><a href="javascript:void(0);" data-toggle="tooltip" title="<?=$items["name"]?>">
                                        <?php
                                                $value = $items["name"];
                                                $limit = '35';
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
                                <div class=" nopadding">
                                    
                                    <img class="imgcart f_left m_right_10" src="<?= base_url() ?>assets/uploads/rest_prod/<?= $items["img"]?>" >
                                    <div class="f_left">
                                        <div class="m_bottom_5">
                                            <h6 class="color_darkk"><a href="javascript:void(0);"><?= $items["name"]?></a></h6>
                                        </div>
                                        <div class="clearfix f_size_medium">
                                                <?= $items["prd_qty"]?>qty x <b>₦<?= $items["prd_pr"]?></b>
                                        </div>
                                        <?php if(!empty($items['description'])): ?>
                                        <div class="cart_desc" style=" max-width:350px;">
                                            <span  style="font-weight: 800">Note:</span>  <?= $items['description']?>
                                                
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 nopadding" style="padding-left:5px;" >
                                    
                                
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
                                            
                                            <!--<span class="sub_menu_name"><?= $submenu[0]?> :</span> <?= $submenu[1]?>qty <span class="pull-right">₦<?= $submenu[2]?></span>-->
                                            <table class=" ">     
                                                <tbody>
                                    <?php foreach ($items['submenu'] as $submenu) :?>
                                                    <tr>
                                                        <td style=" max-width:120px"><?= $submenu[0]?></td>
                                                        <td class="text-center"><?= $submenu[1]?>qty </td>
                                                        <td class="text-left">₦<?= $submenu[2]?></td>
                                                    </tr>
                                                
                                    
                                    <?php endforeach; ?>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                        <?php endif; ?>

                                                </div>

                                            </td>
                                            <textarea name="addedmenu" class="form-control" rows="5" style="display: none;"><?php if(!empty($items['submenu'])): ?>
                                                            <?php foreach ($items['submenu'] as $submenu) :?>
                                                                <div class="added_menu">
                                                                    <table class=" ">     
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><?= $submenu[0]?></td>
                                                                                <td class="text-center"><?= $submenu[1]?>qty </td>
                                                                                <td class="text-right"> ₦<?= $submenu[2]?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?></textarea>
                                            <td class="cart_qty_td">

                                                <div class="col-sm-6 nopadding">
                                                    <div class="cart_qty"><?= $items["prd_qty"]?></div>
                                                    <input type="hidden" class="cart_suball_qty" value="">
                                                </div>
                                                

                                            </td>

                                            <!--<td class="cart_desc ">

                                                <div class="col-sm-12 nopadding ">
                                                    <?= $items['description']?>
                                                </div>

                                            </td>-->

                                            <td class="cart_price_total">
                                                <span style="display:none;"><?= $items["price"]?></span>
                                                <div class="cart_price">₦<?= $items["price"]?></div>
                                                <input type="hidden" name="cart_price_total" class="cart_suball_price" value="<?= $items["price"]?>">

                                            </td>


                                            <!--<td class="cart_price_total"><?= $items["subtotal"]?></td>-->
                                        </tr>
                                        <?php endforeach;?>



                                        <tr>
                                            <th colspan="2"><span class="pull-right">Sub Total</span></th>
                                            <td class="boldtext">₦<span class="cart_price_sub_grandtotal"></span></td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><span class="pull-right">VAT</span></th>
                                            <td class="boldtext "><span class="cart_vat"><?=$vat?></span>%</td>
                                            <input type="hidden" name="stakle" class="stakle" value="0">
                                        </tr>
                                        <tr>
                                            <th colspan="2"><span class="pull-right">Total</span></th>
                                            <td class="boldtext">₦<span class="cart_price_grandtotal"></span></td>
                                        </tr>

                                       
                                    </tbody>
                                </table>

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
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info" style=" border-left: none; border-right: none">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Payment</div>
                        <div class="panel-body">
                            <!--<div class="form-group">
                                <div class="col-md-12"><strong>Cards:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="CreditCardType" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>-->
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                     <label class="radio-inline">
                                        <input type="radio" name="paytype" id="" value="card" required="">
                                        <strong>Card</strong>
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="paytype" id="" value="delivery" required="">
                                        <strong>On Delivery</strong>
                                    </label>
                                </div>
                                
                                <div class="col-md-12 carddiv" style="display:none;">
                                    
                                    <div class="col-md-12" style="padding:10px 0;">
                                    
                                        <strong>Cards:</strong>

                                    </div>
                                    
                                    <?php foreach ($add_card as $row) :?>

                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="card_au" value="<?= $row->authorizationcode ?>"  />
                                        </span>
                                        <div class="form-control form-control-static">
                                            **** **** **** <?= $row->last4 ?>
                                        </div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>
                                                
                                    <?php endforeach;?>
                                    
                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="card_au" value="0" checked="checked" readonly=""/>
                                        </span>
                                        <div class="form-control form-control-static">
                                            New card
                                        </div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>
                                </div>
                                
                                <!--<div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>-->
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="boldtext">
                                        Grand- Total : 
                                    <a href="javascript:void(0);">₦<span class="all_price_grandtotal"></span></a>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                    </div>
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
                    
    <!--Address Modal -->              
    <div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

    </div><!--end Modal -->
    </div>
 
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

