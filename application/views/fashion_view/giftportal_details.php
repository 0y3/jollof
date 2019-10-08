<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $titel ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/<?= $icon ?>">
		
		<!-- all css here -->
         
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsiveslides.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/fontawesome-all.css">
    
    
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/animate.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/chosen.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/easyzoom.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/style_dilan.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/responsive.css">
        <script src="<?= base_url() ?>assets/assets/js/vendor/modernizr-2.8.3.min.js"></script>
        
        
    <!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    </head>
    <style>
        .active_role {
        border: 1px solid #454545;
        }
        body .owl-nav{
        position: initial;
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
    </style>
    <body>
        <!-- header start -->
        <header class="header-area transparent-bar clearfix">
            <!--  header tray -->
            
            <?php
                if(isset($header_micro_loader))
                {
                    if ( file_exists( APPPATH.'views/'.$header_micro_loader.'.php' ) ) 
                    {
                        $this->load->view($header_micro_loader); // Sidebar tray
                    }
                    else 
                    {
                        $this->load->view($error_page); //error page
                    }

                }
                else
                {
                    $this->load->view($error_page); //error page
                }
            ?>
            
            <!--  End of header tray -->
            
            <!--  header nav -->
            <?php

                /*if(isset($header_nav_loader))
                {
                    if ( file_exists( APPPATH.'views/'.$header_nav_loader.'.php' ) ) 
                    {
                        $this->load->view($header_nav_loader); // Sidebar tray
                    }
                    else 
                    {
                        $this->load->view($error_page); //error page
                    }

                }
                else
                {
                    $this->load->view($error_page); //error page
                }*/
            ?>
             <!-- End of header nav -->
        </header>
        <div class="breadcrumb-area ptb-50 hm-4-padding gray-bg">
            <div class="container">
                <div class="breadcrumb-content text-center">
                  <h3 class=""> GIFTPORTAL</h3>
                    <ul>
                        <?php foreach ($get_prd as $prd) :?>
                        <!--<li><a href="<?= site_url('fashion')?>">home</a> <i class="ion-ios-arrow-right"></i></li>-->
                        <li><a href="<?= site_url('giftportal')?>">Giftportal</a> <i class="ion-ios-arrow-right"></i></li>
                        <li title="<?= $prd['productname']?>" class="active">
                            <?php
                                $value = $prd['productname'];
                                    $limit = '22';
                                    if (strlen($value) > $limit) {
                                             $trimValues = substr($value, 0, $limit).'...';
                                              } 
                                    else {
                                            $trimValues = $value;
                                      }
                                //character_limiter($resta['companydesc'],25); 
                                      echo $trimValues;
                            ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="product-details-area gray-bg pb-65">
            <div class="container">
                <div class="row">
                    
                    <?php foreach ($get_prd as $prd) :?>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-tab">
                            <div class="product-details-large tab-content">
                                <?php $count = 0; foreach ($prd['prd_img'] as $prdimg) :?>
                                
                                <?php
                                    if($count == 0) {
                                        $active = 'active';
                                     }
                                    else{
                                            $active = '';
                                        }
                                       $count++;
                                ?>
                                <?php if(!empty($prd['sales'])): ?>

                                    <span class="hot_stripe"><img class=" img-responsive" src="<?= site_url('assets/img/sale_product_type_2.png')?>" alt=""></span>

                                <?php endif; ?>
                                    <div class="tab-pane <?= $active ?>" id="pro-details<?= $prdimg['id']?>" style=" background-color:  white;">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="<?= base_url()?>assets/uploads/fashion_prod/mainimage/<?= $prdimg['imagename']?>">
                                            <img src="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                               
                                
                                <div class="product-details-small nav mt-12 " role=tablist>
                                    
                                    <div id="prd_thumds_slider" class="owl-carousel owl-theme">
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
                               
                                        <a class="click_link" href="#pro-details<?= $prdimg['id']?>" data-toggle="tab">
                                        <img class="click_thumbs <?= $active ?>" src="<?= base_url()?>assets/uploads/fashion_prod/thumbs/<?= $prdimg['imagename']?>" alt="<?= $prdimg['imagename']?>">
                                    </a>
                                <?php endforeach; ?>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4><?= $prd['productname']?> </h4>
                            <!--<div class="product-rating">
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star"></i>
                                <i class="ion-star"></i>
                            </div>-->
                            <span>
                                <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">
                                  <span class="get_price" data-get_price="<?= $prd['prd_price'][0]['jpoints'] ?>"><?= number_format($prd['prd_price'][0]['jpoints'],0)?>
                                  </span>
                                   Jpoint
                                </span>
                            </span>
                            <div class="in-stock">
                                <span><i class="ion-android-checkbox-outline"></i> In Stock</span>:<span class="mute" style=" padding-left: 10px;"> (<?=$prd['prd_price'][0]['productinstock']?> qty available)</span>
                            </div>
                            <?php if(!empty($prd['productshortdesc'])): ?>
                            
                                <div class="sku" style=" margin-bottom: 10px; padding-bottom: 5px;">
                                <span class="linkcolor"><b>Description:</b> 
                                    <p> <?php
                                                $value = $prd['productshortdesc'];
                                                    $limit = '160';
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
                                    <input class="cart-plus-minus-box fashionqty" type="number" value="1" min="1" name="fashionqty" required="">
                                </div>
                                <span class="msgqty msg_error col-xs-12 clear" data-role="msg-error" >
                                  Please Add Your Quantity
                                </span>  
                            </div>
                            <div class="product-list-action">
                                <a title="Quick View"  class=" icon-mrg addtogiftportal" data-productid="<?= $prd['id'];?>" data-productname="<?= $prd['productname'];?>" data-productprice="">
                                    <i class="ion-bag"></i> Redeem With Jpoint
                                </a>
                                <span class="msglogin msg_error col-xs-12 clear" data-role="msg-error" >
                                  You Need to Login Your Account
                                </span>
                                <span class="msgpoint msg_error col-xs-12 clear" data-role="msg-error" >
                                  You Haven't Earn Enough points to Redeem this product
                                </span>  
                                <!--<a title="Wishlist" href="#"><i class="ion-ios-heart-outline"></i></a>-->
                               
                            </div>
                            
                            <!-- social share -->
                            <!--
                            <div class="social-share">
                                <ul>
                                    <li><span>Share:</span></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            -->
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
                
            </div>
        </div>
        <div class="description-review-area gray-bg pb-75">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav text-center">
                        <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                        <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a>
                        <!--<a data-toggle="tab" href="#des-details3">REVIEWS (2)</a>-->
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <?= $prd['productdesc']?>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>name:</span> <?= $prd['productname']?></li>
                                    <li>
                                        <span>color:</span>
                                        <?php foreach ($prd['prd_color'] as $prdcolor) :?>
                                        <?php if( !empty($prdcolor['colorimagename']) ): ?>
                                            <?= $prdcolor['colorimagename'].', '?>
                                        <?php else: ?>
                                            <?= $prdcolor['colorname'].', '?>
                                        <?php endif; ?>
                                        
                                        <?php endforeach; ?>
                                    </li>
                                    <li>
                                        <span>size:</span> 
                                        <?php foreach ($prd['prd_size'] as $prdsize) :?>
                                            <?=$prdsize['sizecode'].', '?>
                                        <?php endforeach; ?>
                                    </li>
                                    <!--
                                    <li><span>length:</span> 102cm, 110cm , 115cm </li>
                                    <li><span>Brand:</span> Nike, Religion, Diesel, Monki </li>
                                    -->
                                </ul>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>tayeb rayed</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>farhana shuvo</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                            </div>
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                            <div class="ratting-star">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="message" placeholder="Message"></textarea>
                                                    <input type="submit" value="add review">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--
        <div class="featured-area gray-bg pb-75">
            <div class="container">
                <div class="section-title text-center mb-25">
                    <h2>Related Products</h2>
                </div>
                <div class="row">
                    <div class="product-slider-active owl-carousel">
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-1.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$22.00 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-2.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="old">$19.00 </span>
                                                <span class="new">$17.00</span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-3.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Chiffon Flower Long </a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$70.45 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-4.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$19.99 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-13.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$19.99 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        
        <!--
        <div class="featured-area gray-bg pb-75">
            <div class="container">
                <div class="section-title text-center mb-25">
                    <h2>up sell Products</h2>
                </div>
                <div class="row">
                    <div class="product-slider-active owl-carousel">
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-5.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$22.00 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-6.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Casual Loose Hollowed</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span class="old">$19.00 </span>
                                                <span class="new">$17.00</span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-7.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Chiffon Flower Long </a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$70.45 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-8.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$19.99 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/product-9.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ion-ios-eye-outline"></i>
                                        </a>
                                        <a class="action-heart" title="Wishlist" href="#">
                                            <i class="ion-ios-heart-outline"></i>
                                        </a>
                                        <a class="action-cart" title="Compare" data-toggle="modal" data-target="#exampleCompare" href="#">
                                            <i class="ion-stats-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Sheer Mesh Patchwork</a></h4>
                                    <div class="product-price-cart-wrapper">
                                        <div class="product-rating-price-wrapper">
                                            <div class="product-rating">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                            </div>
                                            <div class="product-price">
                                                <span>$19.99 </span>
                                            </div>
                                        </div>
                                        <div class="product-cart">
                                            <a title="Add To Cart" href="#"><i class="ion-bag"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        
        <!-- footer -->
        <?php
            if(isset($header_micro_loader))
            {
                if ( file_exists( APPPATH.'views/'.$footer_loader.'.php' ) ) 
                {
                    $this->load->view($footer_loader); // Sidebar tray
                }
                else 
                {
                    $this->load->view($error_page); //error page
                }

            }
            else
            {
                $this->load->view($error_page); //error page
            }
        ?>

        <!--  End of Footer tray -->
        
        
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="ion-android-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="qwick-view-left">
                            <div class="quick-view-learg-img">
                                <div class="quick-view-tab-content tab-content">
                                    <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                        <img src="assets/img/quick-view/l1.jpg" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal2" role="tabpanel">
                                        <img src="assets/img/quick-view/l2.jpg" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal3" role="tabpanel">
                                        <img src="assets/img/quick-view/l3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-list nav" role="tablist">
                                <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                    <img src="assets/img/quick-view/s1.jpg" alt="">
                                </a>
                                <a href="#modal2" data-toggle="tab" role="tab">
                                    <img src="assets/img/quick-view/s2.jpg" alt="">
                                </a>
                                <a href="#modal3" data-toggle="tab" role="tab">
                                    <img src="assets/img/quick-view/s3.jpg" alt="">
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
            </div>
        </div>
        <!-- Compare -->
        <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="ion-android-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog modal-compare-width" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="#">
                            <div class="table-content compare-style table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <a href="#">Remove <span>x</span></a>
                                                <img src="assets/img/quick-view/compare-1.jpg" alt="">
                                                <p>Casual Loose Hollowed </p>
                                                <span>$75.99</span>
                                                <a class="compare-btn" href="cart.html">Add to cart</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="compare-title"><h4>Description </h4></td>
                                            <td class="compare-dec compare-common">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>Sku </h4></td>
                                            <td class="product-none compare-common">
                                                <p>-</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>Availability  </h4></td>
                                            <td class="compare-stock compare-common">
                                                <p>In stock</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>Weight   </h4></td>
                                            <td class="compare-none compare-common">
                                                <p>-</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>Dimensions   </h4></td>
                                            <td class="compare-stock compare-common">
                                                <p>N/A</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>brand   </h4></td>
                                            <td class="compare-brand compare-common">
                                                <p>HasTech</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>color   </h4></td>
                                            <td class="compare-color compare-common">
                                                <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"><h4>size    </h4></td>
                                            <td class="compare-size compare-common">
                                                <p>XS, S, M, L, XL, XXL </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="compare-title"></td>
                                            <td class="compare-price compare-common">
                                                <p>$75.99 </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="ujpoints" class="ujpoints msg_error" data-ujpoints=""> </div>
        <!--Cart popup-->
        <div class="modal fade" id="modal_cart_container" tabindex="-1" role="dialog" aria-labelledby="cart " aria-hidden="true" >

        </div>
        <!--end Cart popup-->
        
	<!-- Modal confirm Clear Cart Product -->
    <div class="modal" id="confirmModal" style="display: none; z-index: 200;">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="alert alert-danger" id="confirmMessage"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="confirmOk">Ok</button>
                                <button type="button" class="btn btn-success" id="confirmCancel">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>

<!-- Modal confirm Empty Cart -->
    <div class="modal" id="empty_confirmModal" style="display: none; z-index: 200;">
            <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body" >
                                <div class="alert alert-danger" id="empty_confirmMessage"> </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="empty_confirmOk">Ok</button>
                                <button type="button" class="btn btn-success" id="empty_confirmCancel">Cancel</button>
                            </div>
                        
                    </div>
            </div>
    </div>	
		
		
		
		<!-- all js here -->
        <script src="<?= base_url() ?>assets/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/popper.js"></script>
        <script src="<?=base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!--<script src="<?= base_url() ?>assets/assets/js/bootstrap.min.js"></script>-->
        <script src="<?= base_url() ?>assets/assets/js/ajax-mail.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/plugins.js"></script>
        <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
        
        
    <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
    <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>
        
    <script>

      $(document).ready(function() {
            $('.linkcoloractive').removeClass('linkcoloractive').addClass('linkcolor');
            $('.giftportal').removeClass('linkcolor').addClass('linkcoloractive');
        }); 
            new jBox('Tooltip', {
                attach: '.tooltips'
              });
        //load the number of cart in all page
       $('.cart_count').load("<?php echo base_url(); ?>cart/cart_count");

       //load the point a user have
       $('.point_count').load("<?php echo base_url(); ?>cart/point_count");

       $('#ujpoints').load("<?php echo base_url(); ?>cart/point_count");                   
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
            }).success(function() { $('input:text:visible:first').focus(); });

        });    
        </script>

        <script>
        $("[data-toggle='modal']").click(function(e) {
            /* Prevent Default*/
                        e.preventDefault();

            /* Parameters */
            var url = $(this).attr('href');
            var container = "#" + $(this).attr('data-container');

            /* XHR */
            $.get(url).done(function(data) {
                $(container).html(data).modal();
            }).success(function() { $('input:text:visible:first').focus(); });

        });

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

        $(document).on('click', 'input[name="fashionqty"]', function(e) {
            if ($('input[name=fashionqty]').length > 0){
                $('.msgqty').fadeOut('fast');
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
            if(product_colorname && product_size )
            {
                $.ajax({
                    type:'POST',
                    url:'<?= site_url('products/get_jpoint_qty') ?>',
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
            
            //run_waitMe($('body'), 1, 'orbit');
    $(document).ready(function(){
        
        
        checkRadios = function() {
            if ($("input:radio :checked").length == 0 ){
                alert('Please select a radio button');
                return false;
            }
        };
      
      $('.addtogiftportal').click(function(e){
      //$(".product-details-content").on("click",".addtogiftportal", function(e){
          
        e.preventDefault();
        
        var cartmicrosite = "fashion"
        //var merchant_id = $(this).data("merchantid");
        var fashionmainproduct_id = $(this).data("productid");
        var fashionproduct_id = $('input[name="fashioncolor"]:checked').data("dataprdcolorsize_id");
        var product_img = '<?=$get_colorimg;?>';
        var product_colorcode = '<?=$get_colorcode;?>';
        var product_name = $(this).data("productname");
        var product_jpoint = $('.get_price').data('get_price');
        var user_jpoint = $('#ujpoints').text(); 
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
        else if($('.fashionqty').length && !$('.fashionqty').val().length){
              $(".msgqty").show('fast');
               return false;

            }
        else if (!islogin ){
                $(".msglogin").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (!islogintype== 'User' ){
                $(".msglogin").show('fast');
                //$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if ((product_jpoint*quantity) > user_jpoint ){
          
                $(".msgpoint").show('fast');
                //alert((product_jpoint*quantity))
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
           
                
          
          //run_waitMe($('body'), 1, 'orbit');


          /*$("body").load("<?php echo base_url(); ?>checkout/products", {
                    //restaurant_id:merchant_id,
                    mainproduct_fashionid:fashionmainproduct_id,
                    product_fashionid:fashionproduct_id,
                    product_img:product_img,
                    product_colorcode: product_colorcode,
                    product_name:product_name,
                    product_price:product_jpoint,
                    product_colorname:product_colorname_data,
                    product_size:product_size_data,
                    quantity_fashion:quantity,
                    quantity:quantity,
                    desc:inst,
                    last_cartadded:cartmicrosite
                });
          */
          
          var url = "<?php echo base_url(); ?>giftportal/checkgiftportal";
          $.post(
              url,
              {
                    //restaurant_id:merchant_id,
                    mainproduct_fashionid:fashionmainproduct_id,
                    product_fashionid:fashionproduct_id,
                    product_img:product_img,
                    product_colorcode: product_colorcode,
                    product_name:product_name,
                    product_points:product_jpoint,
                    product_colorname:product_colorname_data,
                    product_size:product_size_data,
                    quantity_fashion:quantity,
                    quantity:quantity,
                    desc:inst,
                    last_cartadded:cartmicrosite
                }
           ).done(function(data){
                window.location.href="<?php echo base_url(); ?>giftportal/checkout";
           });
          /*
          $.ajax({
            url:"<?php echo base_url(); ?>giftportal/checkoutpoints",
            method:"POST",
            //dataType: 'json',
            data:{
                    //restaurant_id:merchant_id,
                    mainproduct_fashionid:fashionmainproduct_id,
                    product_fashionid:fashionproduct_id,
                    product_img:product_img,
                    product_colorcode: product_colorcode,
                    product_name:product_name,
                    product_points:product_jpoint,
                    product_colorname:product_colorname_data,
                    product_size:product_size_data,
                    quantity_fashion:quantity,
                    quantity:quantity,
                    desc:inst,
                    last_cartadded:cartmicrosite
                },
            success:function(data){}
          });*/
        }
      })

    $("#zero_config").on("click",".ord_can[data-toggle='modal']", function(e){

        e.preventDefault();
        
        var url = $(this).attr('href');
        var ord_id   = $(this).data('get'); // gets value
        var orderid   = $(this).data('orderid'); // gets value
        
        var container = $(this).attr('data-target');
       
       $.post(url,{ data_id:ord_id,data_order:orderid},function(data){
                $(container).html(data).modal();
           }
       );
    });
        
});
 
</script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
  <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
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
    </body>
</html>
