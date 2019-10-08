
    <style>
    .active_role {
        border: 1px solid #454545;
    }
    body .owl-nav{
        position: initial;
    }
    
    .fade.in {
        opacity: 1 ;
    }
    
    .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: .5;
    }
    
      body .owl-nav div {
          background-color: #fff; 
          border: 1px solid #ccc;
          border-radius: 5px;
          color: #333;
          display: inline-block;
          font-size: 14px;
          height: 30px;
          line-height: 30px;
          opacity: 1;
          position: absolute;
          top: 40%;
          text-align: center;
          transition: all 0.3s ease 0s;
          width: 30px;
      }

      body .owl-prev{
        left: -20px;
        display: flex;
        background-color:white;
      }

      body .owl-next{
        right: -20px;
        display: flex;
        background-color:white;
      }
      body .active
      {
          border-color: none;
      }
    
    
    .swatches,.swatch {
        display: inline-block;
        padding-left: 20px;
    }
    .swatch:after {
      clear: both;
      content: "";
      display: block;
      visibility: hidden;
      height: 0;
    }
    .swatch {
      float: right;
      margin-top: -10px;
    }

    .swatch:nth-last-child(2) {
      margin-right: 0;
    }
    .swatch .swatch-element {
        display: inline-block;
        float: none;
        margin: 7px 8px 25px 0;
    }
    .swatch input {
      display: none;
    }

    .swatch .swatch-element {
      float: left;
      margin: 5px 8px 0 0;
      position: relative;
    }

    .swatch .color label {
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      border: 1px solid #e74c3c;
      cursor: pointer;
      display: block;
      height: 42px;
      padding: 2px 0 0 2px;
      width: 42px;
    }

    .swatch .color label span {
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      display: block;
      height: 95%;
      position: relative;
      width: 95%;
    }

    .swatch .color label span:after {
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      background: transparent url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjEycHgiIGhlaWdodD0iOXB4IiB2aWV3Qm94PSIwIDAgMTIgOSIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CiAgICA8ZyBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTIzMS4wMDAwMDAsIC0xMzAyLjAwMDAwMCkiIGZpbGw9IiNGRkZGRkYiPgogICAgICAgICAgICA8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMy4wMDAwMDAsIDEyNDYuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNMTIzNS45MzgzNyw1OC40NTA1ODYxIEwxMjM0LjUyMTE2LDU5LjM5NTUzMDcgTDEyMzcuNTQ4NDgsNjMuOTM2NzE1OCBMMTI0NS45MjIyNSw1OC4zNTM5MTk4IEwxMjQ0Ljk3NzczLDU2LjkzNjcxNTggTDEyMzguMDIxMTYsNjEuNTc0NTY3MSBMMTIzNS45MzgzNyw1OC40NTA1ODYxIEwxMjM1LjkzODM3LDU4LjQ1MDU4NjEgWiIgaWQ9ImZhamZrYSIgc2tldGNoOnR5cGU9Ik1TU2hhcGVHcm91cCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTI0MC4yMjE3MDYsIDYwLjQzNjcxNikgcm90YXRlKC0xMC4wMDAwMDApIHRyYW5zbGF0ZSgtMTI0MC4yMjE3MDYsIC02MC40MzY3MTYpIj48L3BhdGg+CiAgICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICA8L2c+Cjwvc3ZnPg==") no-repeat center center;
      bottom: 0;
      content: "";
      display: block;
      height: 100%;
      left: 0;
      opacity: 0;
      position: absolute;
      top: 0;
      width: 100%;
    }

    .swatch .plain label {
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      -moz-border-radius: 50%;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      font-family: "montserratbold", sans-serif;
      border: 1px solid #e74c3c;
      color: #086fcf;
      cursor: pointer;
      display: block;
      height: 36px;
      padding-top: 8px;
      text-align: center;
      width: 36px;
    }

    .swatch .color input:checked + label span:after {
      opacity: 1;
    }

    .swatch input:not(:checked) + label {
      border-color: #edeff2 !important;
    }

    .swatch input:not(:checked) + label:hover {
      border-color: #b5b6bd !important;
    }

    .swatch .plain input:not(:checked) + label {
      color: #16161a !important;
    }
    .swatch input:not(:checked):disabled + label:hover {
         border-color: #edeff2 !important; 
    }
    .swatch .plain input[type=radio]:disabled,
    .swatch .color input[type=radio]:disabled{
        background:#dddddd !important;
    }

    .swatch .plain input[type=radio]:disabled+label,
    .swatch .color input[type=radio]:disabled+label{
        color:#ccc !important;
        cursor: not-allowed;
        opacity: .6;
        filter: alpha(opacity=60);
    }
    .msg_error{
        display: none;
        padding: 4px 10px;
        margin-top: 5px;
        color: red;
        /*background-color: #fff9eb;
        border: 1px solid #f7dd89;*/
    }
    .clear {
        clear: both;
    }
    .click_link img
    {
        max-height: 179.2px ;
    }
    .img-circle {
        border-radius: 50%;
    }
    .prdprice_span
    {
      font-weight: bold;
      font-size: 18px;
    }
    </style>
        
        
        <!-- modal -->
        <?php foreach ($get_prd as $prd) :?>
        
            <div class="modal-dialog" role="document" style=" margin-top: 200px;" >
                <div class="modal-content gray-bg ">
                    <div class="modal-header ">
                        <span class="text-center" style=" font-size: 24px; color: #000;">Shopping Cart</span>
                        <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="qwick-view-left">
                            <div class="quick-view-learg-img">
                                <div class="quick-view-tab-content tab-content">
                                    
                                    <?php $count = 0; foreach ($prd['prd_img'] as $prdimg) :?>
                                
                                        <?php
                                            if($count == 0) {
                                                $active = 'active show';
                                             }
                                            else{
                                                    $active = '';
                                                }
                                               $count++;
                                        ?>
                                        <?php if(!empty($prd['sales'])): ?>

                                            <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>

                                        <?php endif; ?>
                                    
                                    <div class="tab-pane <?= $active ?> fade" id="modal<?= $prdimg['id']?>" role="tabpanel">
                                        <img src="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>" alt="" class="img-responsive">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="quick-view-list nav" role="tablist">
                                <?php $count = 0; foreach ($prd['prd_img'] as $prdimg) :?>
                                
                                <?php
                                    if($count == 0) {
                                        $active = 'active_role';
                                     }
                                    else{
                                            $active = '';
                                        }
                                       $count++;
                                ?>
                                <a class="<?= $active ?>" href="#modal<?= $prdimg['id']?>" data-toggle="tab" role="tab">
                                    <img src="<?= base_url()?>assets/uploads/fashion_prod/thumbs/<?= $prdimg['imagename']?>" alt="<?= $prdimg['imagename']?>" class="img-responsive" width="90" height="112" >
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="qwick-view-right">
                            <div class="qwick-view-content">
                                <h3><?= $prd['productname']?></h3>
                                <span>
                                <?php if( 
                                            $prd['prd_price'][0]['min_price'] === $prd['prd_price'][0]['min_discount_price'] 
                                        && 
                                            $prd['prd_price'][0]['max_price'] === $prd['prd_price'][0]['max_discount_price']
                                        && 
                                            $prd['prd_price'][0]['min_price'] != $prd['prd_price'][0]['max_price'] ): ?>

                                <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price" data-get_price="<?= $prd['prd_price'][0]['min_price'] ?>"><?= number_format($prd['prd_price'][0]['min_price'],2) ?></span> - ₦<span class="get_price2"><?= number_format($prd['prd_price'][0]['max_price'],2)?></span></span>

                                <?php elseif(
                                                ($prd['prd_price'][0]['min_price'] != $prd['prd_price'][0]['min_discount_price'] 
                                            ||
                                                $prd['prd_price'][0]['max_price'] != $prd['prd_price'][0]['max_discount_price'])
                                            && 
                                                ($prd['prd_price'][0]['min_discount_price'] != $prd['prd_price'][0]['max_discount_price'])
                                            ): ?>

                                <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price" data-get_price="<?= $prd['prd_price'][0]['min_discount_price'] ?>"><?= number_format($prd['prd_price'][0]['min_discount_price'],2)?></span> - ₦<span class="get_price2"><?= number_format($prd['prd_price'][0]['max_discount_price'],2)?></span></span>

                                <?php elseif(
                                                ($prd['prd_price'][0]['min_price'] != $prd['prd_price'][0]['min_discount_price'] 
                                            ||
                                                $prd['prd_price'][0]['max_price'] != $prd['prd_price'][0]['max_discount_price'])
                                            && 
                                                ($prd['prd_price'][0]['min_discount_price'] === $prd['prd_price'][0]['max_discount_price']
                                            &&
                                                $prd['prd_price'][0]['min_discount_price'] !='' || $prd['prd_price'][0]['max_discount_price'] !='')
                                            && ( $prd['prd_price'][0]['min_discount_price'] != 0 )
                                            ): ?>

                                <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price" data-get_price="<?= $prd['prd_price'][0]['min_discount_price'] ?>"><?= number_format($prd['prd_price'][0]['min_discount_price'],2)?></span> - ₦<span class="get_price2"><?= number_format($prd['prd_price'][0]['max_price'],2)?></span> </span>

                                <?php else: ?>
                                <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price" data-get_price="<?= $prd['prd_price'][0]['min_price'] ?>"><?= number_format($prd['prd_price'][0]['min_price'],2)?></span></span>
                                <?php endif; ?>
                            </span>
                                
                                <div class="in-stock">
                                    <span><i class="ion-android-checkbox-outline"></i> In Stock</span>:<span class="mute" style=" padding-left: 10px;"> (<?=$prd['prd_price'][0]['productinstock']?> qty available)</span>
                                </div>
                                <div class="sku" style=" margin-bottom: 10px;padding-bottom: 5px;">
                                    <span class="linkcolor"><b>Store Name:</b> <a class="" href="<?= site_url('fashion/store/'.$store_url)?>"><?= $prd['storename']?></a></span>
                                </div>
                                <?php if(!empty($prd['productshortdesc'])): ?>

                                    <div class="sku" style=" margin-bottom: 10px; padding-bottom: 5px;">
                                    <span class="linkcolor"><b>Description:</b> 
                                        <p> <?php
                                                    $value = $prd['productshortdesc'];
                                                        $limit = '80';
                                                        if (strlen($value) > $limit) {
                                                                 $trimValues = substr($value, 0, $limit).'...';
                                                                  } 
                                                        else {
                                                                $trimValues = $value;
                                                          }
                                                    //character_limiter($resta['companydesc'],25); 
                                                          echo $trimValues;
                                            ?>
                                        </p>
                                </div>
                                <?php endif; ?>
                                
                                <div class="product-details-style shorting-style" style=" margin-top: 10px;">
                                    <label>color:</label>
                                    <ul id="prd_colorul" class="swatch" style=" padding-left: 5px;">

                                    <?php foreach ($prd['prd_color'] as $prdcolor) :?>
                                        <?php
                                            $get_colorcode=null;$get_colorimg=null;
                                            if(!empty($prdcolor['colorimage']))
                                            {
                                                if(!empty($prdcolor['colorimagename']))
                                                  { $colorname=$prdcolor['colorimagename']; }
                                                else
                                                  { $colorname=$prdcolor['colorname']; }
                                                $colorid=$prdcolor['colorid'];
                                                //$colorname=$prdcolor['colorimagename'];
                                                $get_colorimg=$prdcolor['colorimage']; // send it to jquery
                                                $icon='
                                                       <a href="javascript:void(0)" id="prdimgid" class="getcolorsize getcolorimg" data-color="'.$prdcolor['colorname'].'" data-image="'.base_url().'assets/uploads/fashion_prod/'.$prdcolor['colorimage'].'" data-zoom-image="'.base_url().'assets/uploads/fashion_prod/'.$prdcolor['colorimage'].'">
                                                        <img class="img-responsivee img-circle" width="36px" height="36px" src="'.site_url('assets/uploads/fashion_prod/thumbs/').$prdcolor['colorimage'].'" />
                                                        <!--<img class="img-responsive img-circle" src="'.site_url('assets/uploads/fashion_prod/').$prdcolor['colorimage'].'" />-->
                                                       </a>
                                                      ';

                                            }
                                            else
                                            {   
                                                if(!empty($prdcolor['colorimagename']))
                                                  { $colorname=$prdcolor['colorimagename']; }
                                                else
                                                  { $colorname=$prdcolor['colorname']; }
                                                
                                                $colorid=$prdcolor['colorid'];
                                                //$colorname=$prdcolor['colorname'];
                                                $get_colorcode=$prdcolor['colorcode']; 
                                                $get_colorimg=$prd['prd_img'][0]['imagename'];//$prdimg['imagename']; // // send it to jquery
                                                $icon='<span style="background-color:#'.$prdcolor['colorcode'].';"></span>';
                                            }
                                        ?>
                                        <li title="<?=$colorname?>" id="<?=$prdcolor['colorname']?>" data-value="<?=$prdcolor['colorname']?>" class="swatch-element color available zoom_thumbs tooltips">
                                            <!--<span class="tooltip" title="cool" ><?=$colorname?></span>-->
                                            <input id="swatch_<?=$prdcolor['colorname']?>" class="getcolorsize fashioncolor <?=$prdcolor['colorname']?>" type="radio" name="fashioncolor" data-datacolorvalue="<?=$colorname?>" data-dataprdcolorsize_id="<?=$prdcolor['prd_color_size_id']?>" value="<?=$colorid?>" required="required" />
                                            <label for="swatch_<?=$prdcolor['colorname']?>" >
                                             <?=$icon ?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>

                                    </ul>
                                    <span class="msgcolor msg_error col-xs-12 clear" data-role="msg-error" class="msg-error sku-msg-error">
                                        Please select a Color
                                    </span>
                                </div>

                                <?php if( !empty($prd['prd_size'][0]['sizeid']) ): ?>
                                <div class="product-details-style shorting-style" style="margin-top: 5px; display: -webkit-box;">
                                    <label>Size:</label>

                                    <ul id="prd_sizeul" class="swatch ">

                                    <?php foreach ($prd['prd_size'] as $prdsize) :?>
                                        <li id="<?=$prdsize['sizeid']?>" data-value="<?=$prdsize['sizecode']?>" class="swatch-element plain  available tooltips"  title="<?=$prdsize['sizename']?>">
                                            <input id="swatch_size_<?=$prdsize['sizecode']?>" class="getcolorsize fashionsize" type="radio" name="fashionsize" data-datasizevalue="<?=$prdsize['sizecode']?>" value="<?=$prdsize['sizeid']?>" required="required" />
                                            <label for="swatch_size_<?=$prdsize['sizecode']?>" >
                                              <?=$prdsize['sizecode']?>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>

                                    </ul>
                                    <span class="msgsize msg_error col-xs-12 clear" data-role="msg-error" >
                                      Please select a Size
                                    </span>  
                                </div>
                                <?php endif; ?>

                                <div class="cart-plus-minus-2-wrapper">
                                    <label>Qty:</label>
                                    <div class="cart-plus-minus-2">
                                        <input class="cart-plus-minus-box" type="number" value="1" min="1" name="fashionqty" required="">
                                    </div>
                                </div>
                                <div class="product-list-action">
                                    <a title="Quick View"  class=" icon-mrg addtocart" data-merchantid="<?= $prd['merchantid'];?>" data-productid="<?= $prd['id'];?>" data-productname="<?= $prd['productname'];?>" data-productprice="">
                                        <i class="ion-bag"></i> Add to cart
                                    </a>
                                    <?php if($prd['productlayawaystatus'] == 1): ?>
                                    <a title="Layaway" href="javascript:void(0)" class="addtolayaway" data-merchantid="<?= $prd['merchantid'];?>" data-productid="<?= $prd['id'];?>" data-productname="<?= $prd['productname'];?>" data-productprice=""><i class="ion-stats-bars"> Layaway</i></a>
                                    <span class="msglogin msg_error col-xs-12 clear" data-role="msg-error" >
                                      You Need to Login Your Account
                                    </span>
                                    <?php endif; ?>
                                    <!--<a title="Wishlist" href="#"><i class="ion-ios-heart-outline"></i></a>
                                    <a title="Compare" href="#"><i class="ion-stats-bars"></i></a>-->
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!--<div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header ">
                        <span class="text-center" style=" font-size: 24px; color: #000;">Shopping Cart</span>
                        <button type="button" class="close bod" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="qwick-view-left">
                            <div class="quick-view-learg-img">
                                <div class="quick-view-tab-content tab-content">
                                    <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                        <img src="<?= base_url()?>assets/assets/img/quick-view/l1.jpg" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal2" role="tabpanel">
                                        <img src="<?= base_url()?>assets/assets/img/quick-view/l2.jpg" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal3" role="tabpanel">
                                        <img src="<?= base_url()?>assets/assets/img/quick-view/l3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-list nav" role="tablist">
                                <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                    <img src="<?= base_url()?>assets/assets/img/quick-view/s1.jpg" alt="">
                                </a>
                                <a href="#modal2" data-toggle="tab" role="tab">
                                    <img src="<?= base_url()?>assets/assets/img/quick-view/s2.jpg" alt="">
                                </a>
                                <a href="#modal3" data-toggle="tab" role="tab">
                                    <img src="<?= base_url()?>assets/assets/img/quick-view/s3.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="qwick-view-right">
                            <div class="qwick-view-content">
                                <h3>Casual Loose Hollowed</h3>
                                <div class="product-price">
                                    <span class="old">$19.00 </span>
                                    <span class="new">$17.00</span>
                                </div>
                                <div class="product-rating">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do amt tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select class="select">
                                            <option value="">- Please Select -</option>
                                            <option value="">XS</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value=""> L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>
                                        </select>
                                    </div>
                                    <div class="select-option-part">
                                        <label>Color*</label>
                                        <select class="select">
                                            <option value="">- Please Select -</option>
                                            <option value="">orange</option>
                                            <option value="">pink</option>
                                            <option value="">yellow</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="quickview-plus-minus">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                    </div>
                                    <div class="quickview-btn-cart">
                                        <a class="btn-style cr-btn" href="#"><span>add to cart</span></a>
                                    </div>
                                    <div class="quickview-btn-wishlist">
                                        <a class="btn-hover cr-btn" href="#"><span><i class="ion-ios-heart-outline"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
       
        
       
		
         
    <script>
        //load the number of cart in all page
       $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");                        
    </script>
        <script>
            
            //quick preview popup
            $(document).ready(function() {
 
                var owl = $("#prd_thumds_slider");
     
                owl.owlCarousel({
                    rewindNav : false,	
                    pagination : false,        
                    items : 4,
                    margin: 10,
                    nav: true,
                    navText: [
                       "<i class='ion-ios-arrow-thin-left'></i>",
                       "<i class='ion-ios-arrow-thin-right'></i>"
                    ],
                        afterAction: function(){
                            $('.owl-nav').removeClass('disabled');
                  if ( this.itemsAmount > this.visibleItems.length ) {
                    $('.next').show();
                    $('.prev').show();

                    $('.next').removeClass('disabled');
                    $('.prev').removeClass('disabled');
                    if ( this.currentItem == 0 ) {
                      $('.prev').addClass('disabled');
                    }
                    if ( this.currentItem == this.maximumItem ) {
                      $('.next').addClass('disabled');
                    }

                  } else {
                    $('.next').hide();
                    $('.prev').hide();
                  }
                }
                });

                $('.click_thumbs').on("click", function (e) {
                    
                    $('.click_thumbs').removeClass('active_role');
                    $('.owl-item').removeClass('active');
                    $('.click_link').removeClass('active');
                    $(this).addClass("active_role");
                    /*$(' a.active').css({
                        'border': '3px solid transparent'
                        //'color' : 'white', 
                        //'font-size' : '44px'
                    });
                    */
                    //e.stopPropagation();
                });
                

              });
        </script>
        
        <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/waitMe.css">
        <script src="<?= base_url() ?>assets/js/waitMe.js"></script>
        <script>
            
            
            
        $('a.getcolorimg').on('click',function(){
            
            var thumb =$('img', this).attr('src'); //or $(this).find('img').attr('src');
            var img=$(this).data('zoom-image');
            var prev = $(this).parent().parent().attr('id');
            if($(this).parent().parent().find('input[type="radio"]').is(":not(:disabled)"))
            {
                $(this).parent().parent().find('input[type="radio"]').prop('checked', true);
                $('.msgcolor').fadeOut('fast');
                
                
                var product_colorname = $(this).parent().parent().find('input[type="radio"]').val();
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('products/get_size_bycolor') ?>',
                    data:{
                        product_colorid: product_colorname,
                        product_id:<?= $prd['id']?>
                        },
                    success:function(html){
                        $('#prd_sizeul').html(html);
                        
                        /*
                        if(html ==='productinstock_non')
                        {
                            $('#prd_sizeul').find('.fashionsize').attr("disabled", true);
                            $('#prd_sizeul').find('.fashionsize').attr("checked", false);
                        }
                        else if(html == '')
                        {
                            $('#prd_sizeul').find('.fashionsize').attr("disabled", false);
                        }
                        else
                        {
                            $('#prd_sizeul').find("#swatch_size_"+html).attr("disabled", true);
                            $('#prd_sizeul').find("#swatch_size_"+html).attr("checked", false);
                        }
                        */
                    }
                }); 
                //$(this).parent().parent().addClass('.zoom_thumbs');
            }
            else
            {
                //$(this).parent().parent().removeClass('.zoom_thumbs');
            }
            //$('.zoom_image').data('zoom-image',img ).attr('src',img);
                
        });
        //$('input[name="fashioncolor"]:checked').val();
        //$('input[name="fashioncolor"]').change(function(e) {
        $(document).on('click', 'input[name="fashioncolor"]', function(e) {
            if ($('input[name=fashioncolor]:checked').length > 0){
                $('.msgcolor').fadeOut('fast');
            }
        });
        //$('input[name="fashionsize"]').change(function(e) {
        $(document).on('click', 'input[name="fashionsize"]', function(e) {
            if ($('input[name=fashionsize]:checked').length > 0){
                $('.msgsize').fadeOut('fast');
            }
        });
        
            
        
        $('input[name="fashioncolor"]').change(function(){
            
            var product_colorname = $('input[name="fashioncolor"]:checked').val();
            //var product_size = $('input[name="fashionsize"]:checked').val();
            
            
            if(product_colorname )
            {
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('products/get_size_bycolor') ?>',
                    data:{
                        product_colorid: product_colorname,
                        product_id:<?= $prd['id']?>
                        },
                    success:function(html){
                        $('#prd_sizeul').html(html);
                        
                        /*
                        if(html ==='productinstock_non')
                        {
                            $('#prd_sizeul').find('.fashionsize').attr("disabled", true);
                            $('#prd_sizeul').find('.fashionsize').attr("checked", false);
                        }
                        else if(html == '')
                        {
                            $('#prd_sizeul').find('.fashionsize').attr("disabled", false);
                        }
                        else
                        {
                            $('#prd_sizeul').find("#swatch_size_"+html).attr("disabled", true);
                            $('#prd_sizeul').find("#swatch_size_"+html).attr("checked", false);
                        }
                        */
                        
                    }
                }); 
            }
        });
        
        $('input[name="fashionsizee"]').change(function(){
            
            //var product_colorname = $('input[name="fashioncolor"]:checked').val();
            var product_size = $('input[name="fashionsize"]:checked').val();
            
            
            if(product_size )
            {
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('products/get_color_bysize') ?>',
                    data:{
                        product_sizeid: product_size,
                        product_id:<?= $prd['id']?>
                        },
                    success:function(html){
                        //$('#prd_sizeul').html(html);
                        if(html ==='productinstock_non')
                        {
                            $('#prd_colorul').find('.fashioncolor').attr("disabled", true);
                            $('#prd_colorul').find('.fashioncolor').attr("checked", false);
                        }
                        else if(html == '')
                        {
                            $('#prd_colorul').find('.fashioncolor').attr("disabled", false);
                            $('#prd_colorul').find("span#prdimgidd").replaceWith(function() {
        
                                    var attrCopy = {};
                                    for (var i = 0, attrs = this.attributes, l = attrs.length; i < l; i++) {
                                        attrCopy[attrs.item(i).nodeName] = attrs.item(i).nodeValue;
                                    }        

                                    return $('<a>').attr(attrCopy).html($(this).html());

                            });
                        }
                        else
                        {
                            $('#prd_colorul').find("#swatch_"+html).attr("disabled", true);
                            $('#prd_colorul').find("#swatch_"+html).attr("checked", false);
                            
                            $('#prd_colorul').find("a[data-colorr='"+html+"']").replaceWith(function() {
        
                                    var attrCopy = {};
                                    for (var i = 0, attrs = this.attributes, l = attrs.length; i < l; i++) {
                                        attrCopy[attrs.item(i).nodeName] = attrs.item(i).nodeValue;
                                    }        

                                    return $('<span>').attr(attrCopy).html($(this).html());

                            });
                        }
                    }
                }); 
            }
        });
        
       $(document).on('click', '.getcolorsize', function(e) {
        //$('.getcolorsize').on('click',function(){
        
            
            var product_colorname = $('input[name="fashioncolor"]:checked').val();
            var product_size = $('input[name="fashionsize"]:checked').val();
           
            
               //alert('product_colorname= '+product_colorname+' product_size= '+product_size);
            if($( 'input[name="fashionsize"]' ).length && $( 'input[name="fashionsize"]' ).val().length)
            {
              if(product_colorname && product_size )
              {
                  $.ajax({
                      type:'POST',
                      url:'<?= site_url('products/get_price_qty') ?>',
                      data:{
                          product_colorid: product_colorname,
                          product_sizeid:product_size,
                          product_id:<?= $prd['id']?>
                      },
                      success:function(html){
                          //alert(html);
                        $('.prdprice_span').html(html);
                      }
                  }); 
              }
            }
            else
            {
                $.ajax({
                      type:'POST',
                      url:'<?= site_url('products/get_price_qty') ?>',
                      data:{
                          product_colorid: product_colorname,
                          product_id:<?= $prd['id']?>
                      },
                      success:function(html){
                          //alert(html);
                        $('.prdprice_span').html(html);
                      }
                  }); 
            }    
            
            
        });
        
        
    </script>
    
    <script>
        
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
            
            //run_waitMe($('#modal_quickproduct_container'), 1, 'orbit');
            
    $(document).ready(function(){
        
        
        checkRadios = function() {
            if ($("input:radio :checked").length == 0 ){
                alert('Please select a radio button');
                return false;
            }
        };
    $('.addtocart').click(function(e){
        
        e.preventDefault();
        
        var cartmicrosite = "fashion"
        var merchant_id = $(this).data("merchantid");
        var fashionmainproduct_id = $(this).data("productid");
        var fashionproduct_id = $('input[name="fashioncolor"]:checked').data("dataprdcolorsize_id");
        var product_img = '<?=$get_colorimg;?>';
        var product_colorcode = '<?=$get_colorcode;?>';
        var product_name = $(this).data("productname");
        var product_price = $('.get_price').data('get_price');
        var product_colorname = $('input[name="fashioncolor"]:checked').val();
        var product_colorname_data = $('input[name="fashioncolor"]:checked').data("datacolorvalue");
        var quantity = $('input[name="fashionqty"]').val();
        var inst = '';//$("#prd_inst_"+ merchant_id).val();
        
       
        
        if ( $( 'input[name="fashionsize"]' ).length ) {
            var product_size = $('input[name="fashionsize"]:checked').val();
            var product_size_data = $('input[name="fashionsize"]:checked').data("datasizevalue");
        }
        else
        {
            var product_size = 'none';
            var product_size_data = 'none';
        }
        
       
        if (!product_colorname &&!product_size ){
                $(".msgcolor").show('fast');    $(".msgsize").show('fast');
               //$(".msgcolor").effect( "shake");$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (!product_colorname ){
                $(".msgcolor").show('fast');
                //$(".msgcolor").effect( "shake" );
                return false;
                
            }
        else if (!product_size ){
                $(".msgsize").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }

        else
        {
       
     
        /*
        alert(
                'ID:' + fashionproduct_id + 
                '\n\rMERCHANT ID:' + merchant_id +
                '\n\rProduct Image:' + product_img + 
                '\n\rProduct Colorcode:' + product_colorcode + 
                '\n\rProduct name:' + product_name + 
                '\n\rProduct price:' + product_price + 
                '\n\rQTY:' + quantity +
                '\n\rCOLOR_Name:' + product_colorname +
                '\n\rSIZE:' + product_size +
                '\n\rCOLOR_Name_data:' + product_colorname_data+
                '\n\rSIZE_data:' + product_size_data+
                '\n\rDesc:' 
              );
        */
        
         
              
        
        run_waitMe($('#modal_quickproduct_container'), 1, 'orbit');

         $.ajax({
          url:"<?php echo base_url(); ?>cart/add",
          method:"POST",
          data:{
                  restaurant_id:merchant_id,
                  mainproduct_fashionid:fashionmainproduct_id,
                  product_fashionid:fashionproduct_id,
                  product_img:product_img,
                  product_colorcode: product_colorcode,
                  product_name:product_name,
                  product_price:product_price,
                  product_colorname:product_colorname_data,
                  product_size:product_size_data,
                  quantity_fashion:quantity,
                  quantity:quantity,
                  desc:inst,
                  last_cartadded:cartmicrosite
              },
          success:function(data)
          {
                //$.fancybox.close();
                $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");
                $('#cart_details').load("<?php echo base_url(); ?>cart/view2");
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
                        content: 'Success! Product Added To Cart',
                        delayOnHover: true,
                        showCountdown: true,
                        closeButton: true
                      });
                      //$.fancybox.close();
                      
                      var $vat = parseFloat($('.cart_vat').text());
                      var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
                      var $grand_price = $sub_grand + $vat;

                      $(".cart_price_grandtotal").text($grand_price);
                      $('#modal_quickproduct_container').waitMe('hide');
                      $('#modal_quickproduct_container').modal('hide'); 
           
          }
         });
         } 
        });
        
        $('.addtolayaway').click(function(e){
          
        e.preventDefault();
        
        var cartmicrosite = "fashion"
        var merchant_id = $(this).data("merchantid");
        var fashionmainproduct_id = $(this).data("productid");
        var fashionproduct_id = $('input[name="fashioncolor"]:checked').data("dataprdcolorsize_id");
        var product_img = '<?=$get_colorimg;?>';
        var product_colorcode = '<?=$get_colorcode;?>';
        var product_name = $(this).data("productname");
        var product_price = $('.get_price').data('get_price');
        var product_colorname = $('input[name="fashioncolor"]:checked').val();
        var product_colorname_data = $('input[name="fashioncolor"]:checked').data("datacolorvalue");
        var quantity = $('input[name="fashionqty"]').val();
        var inst = '';//$("#prd_inst_"+ merchant_id).val();
        var islogin = '<?php echo $this->session->userdata('logged_in'); ?>';
        var islogintype = '<?php echo $this->session->userdata('Type'); ?>';
        
       
        
        if ( $( 'input[name="fashionsize"]' ).length ) {
            var product_size = $('input[name="fashionsize"]:checked').val();
            var product_size_data = $('input[name="fashionsize"]:checked').data("datasizevalue");
        }
        else
        {
            var product_size = 'none';
            var product_size_data = 'none';
        }
        
       
        if (!product_colorname &&!product_size ){
                $(".msgcolor").show('fast');    $(".msgsize").show('fast');
               //$(".msgcolor").effect( "shake");$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (!product_colorname ){
                $(".msgcolor").show('fast');
                //$(".msgcolor").effect( "shake" );
                return false;
                
            }
        else if (!product_size ){
                $(".msgsize").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (!islogin ){
                $(".msglogin").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (islogintype != 'User' ){
                $(".msglogin").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }

        else
        {
         
       
          /*
          alert(
                  'ID:' + fashionproduct_id + 
                  '\n\rMERCHANT ID:' + merchant_id +
                  '\n\rProduct Image:' + product_img + 
                  '\n\rProduct Colorcode:' + product_colorcode + 
                  '\n\rProduct name:' + product_name + 
                  '\n\rProduct price:' + product_price + 
                  '\n\rQTY:' + quantity +
                  '\n\rCOLOR_Name:' + product_colorname +
                  '\n\rSIZE:' + product_size +
                  '\n\rCOLOR_Name_data:' + product_colorname_data+
                  '\n\rSIZE_data:' + product_size_data+
                  '\n\rDesc:' 
                );
          
          */
           
                
          
          run_waitMe($('#modal_quickproduct_container'), 1, 'orbit');

          $.ajax({
            url:"<?php echo base_url(); ?>layaway/checklayaway",
            method:"POST",
            data:{
                    restaurant_id:merchant_id,
                    mainproduct_fashionid:fashionmainproduct_id,
                    product_fashionid:fashionproduct_id,
                    product_img:product_img,
                    product_colorcode: product_colorcode,
                    product_name:product_name,
                    product_price:product_price,
                    product_colorname:product_colorname_data,
                    product_size:product_size_data,
                    quantity_fashion:quantity,
                    quantity:quantity,
                    desc:inst,
                    last_cartadded:cartmicrosite
                },
            success:function(data)
            {
              window.location.href="<?php echo base_url(); ?>layaway/checkout";
            }
          });
        }
      });
        
});
 
</script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
  <!--<script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>-->
  <script>
    
    $(document).ready(function() {
        $(".faqpopup_fancyy").fancybox({
         'width': 600, // or whatever
         'height': 320,
         'type': 'iframe'
        });
    }); //  ready 
    
    $(".faqpopup_fancy").fancybox({
        
                maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
                type            : 'iframe',
		openEffect	: 'none',
		closeEffect	: 'none'
                
	});
    
  </script>
