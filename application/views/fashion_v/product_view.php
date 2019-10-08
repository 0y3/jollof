<style>
    .swatches,.swatch {
        display: block;
      }
    .swatch:after {
      clear: both;
      content: "";
      display: block;
      visibility: hidden;
      height: 0;
    }
    .swatch {
      float: left;
      margin-right: 40p;
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
    
    .nav-tabs {
        border-bottom: 2px solid #DDD;
        width: 80%;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { 
        border-width: 0;
    }
    .nav-tabs > li > a {
        border: none;
        color: #666; 
    }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover {
        border: none;
        color: #4285F4 !important;
        background: transparent; 
    }
    .nav-tabs > li > a::after { 
        content: "";
        background: #dd0000;
        height: 2px; 
        position: absolute;
        width: 100%; left: 0px;
        bottom: -1px;
        transition: all 250ms ease 0s;
        transform: scale(0); 
    }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after {
        transform: scale(1); 
    }
    .tab-nav > li > a::after {
        background: #21527d none repeat scroll 0% 0%; 
        color: #fff; 
    }

    .tab-pane { padding: 5px 0; }
    .tab-content{padding:5px}
    
</style>
         
    <!--content-->
        <div class="page_content_offset">
                <div class="container">
                        <div class="row clearfix">
                            <!--left content column-->
                            <?php foreach ($get_prd as $prd) :?>   
                            <section class="col-sm-10 m_xs_bottom_30">
                                <formm  id="prd_form" >
                                <div class="clearfix m_bottom_30 t_xs_align_c">
                                    <div class="photoframe type_2 shadow r_corners f_left f_sm_none d_xs_inline_b product_single_preview relative m_right_30 m_bottom_5 m_sm_bottom_20 m_xs_right_0 w_mxs_full">
                                        <div class="m_bottom_" style="font-size: 20px;">
                                            <td><b>Store Name: </b></td>
                                            <td> <a href="<?= site_url('fashion/store/'.$store_url)?>"><?= $prd['storename']?></a></td>
                                        </div>
                                        <br>
                                        <div class="relative d_inline_b m_bottom_10 qv_preview d_xs_block">
                                                <img id="zoom_imagee" src="<?= site_url('assets/uploads/fashion_prod/')?><?= $prd['prd_img'][0]['imagename']?>" data-zoom-image="<?= site_url('assets/uploads/fashion_prod/')?><?= $prd['prd_img'][0]['imagename'] ?>" class="zoom_image tr_all_hover" alt="" style="width: 438px; height: 438px;">
                                                <!--<a href="images/preview_zoom_1.jpg" class="d_block button_type_5 r_corners tr_all_hover box_s_none color_light p_hr_0">
                                                    <i class="fa fa-expand"></i>
                                                </a>-->
                                        </div>
                                        <!--carousel-->
                                        <div class="relative qv_carousel_wrap">
                                                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_prev">
                                                        <i class="fa fa-angle-left "></i>
                                                </button>
                                                
                                                <ul class="qv_carousel_single d_inline_middle zoom_thumbs">
                                                <?php foreach ($prd['prd_img'] as $prdimg) :?>
                                                    <!--<a href="#" data-id="<?= $prdimg['id']?>" data-image="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>" data-zoom-image="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>"><img src="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>" alt="<?= $prdimg['imagename']?>"></a>-->
                                                    <a href="#" data-id="<?= $prdimg['id']?>" data-image="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>" data-zoom-image="<?= base_url()?>assets/uploads/fashion_prod/<?= $prdimg['imagename']?>"><img src="<?= base_url()?>assets/uploads/fashion_prod/thumbs/<?= $prdimg['imagename']?>" alt="<?= $prdimg['imagename']?>"></a>
                                                <?php endforeach; ?>
                                                </ul>
                                            
                                                <button class="button_type_11 bg_light_color_1 t_align_c f_size_ex_large bg_cs_hover r_corners d_inline_middle bg_tr tr_all_hover qv_btn_single_next">
                                                        <i class="fa fa-angle-right "></i>
                                                </button>
                                        </div>
                                    </div>
                                    <div class="p_top_10 t_xs_align_l">
                                        <!--description-->
                                        <h2 class="color_dark fw_medium m_bottom_10"><?= $prd['productname']?></h2>
                                        
                                        <div class="m_bottom_10">
                                                <!--rating-->
                                                <!--
                                                <ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li class="active">
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                        <li>
                                                                <i class="fa fa-star-o empty tr_all_hover"></i>
                                                                <i class="fa fa-star active tr_all_hover"></i>
                                                        </li>
                                                </ul>
                                                <a href="#" class="d_inline_middle default_t_color f_size_small m_left_5">6 Review(s) </a>
                                                -->
                                        </div>
                                            
                                        <hr class="m_bottom_10 divider_type_3">
                                        <table class="description_table m_bottom_10">
                                                <!--
                                                <tr>
                                                        <td>Store Name:</td>
                                                        <td><?= $prd['storename']?></td>
                                                </tr>
                                                -->
                                                <tr>
                                                        
                                                        <td>Price:</td>
                                                        <td>
                                                            <?php if( 
                                                                        $prd['prd_price'][0]['min_price'] === $prd['prd_price'][0]['min_discount_price'] 
                                                                    && 
                                                                        $prd['prd_price'][0]['max_price'] === $prd['prd_price'][0]['max_discount_price']
                                                                    && 
                                                                        $prd['prd_price'][0]['min_price'] != $prd['prd_price'][0]['max_price'] ): ?>
                                                            
                                                            <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price"><?= $prd['prd_price'][0]['min_price']?></span> - ₦<span class="get_price2"><?= $prd['prd_price'][0]['max_price']?></span></span>
                                                            
                                                            <?php elseif(
                                                                            ($prd['prd_price'][0]['min_price'] != $prd['prd_price'][0]['min_discount_price'] 
                                                                        ||
                                                                            $prd['prd_price'][0]['max_price'] != $prd['prd_price'][0]['max_discount_price'])
                                                                        && 
                                                                            ($prd['prd_price'][0]['min_discount_price'] != $prd['prd_price'][0]['max_discount_price'])
                                                                        ): ?>
                                                            
                                                            <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price"><?= $prd['prd_price'][0]['min_discount_price']?></span> - ₦<span class="get_price2"><?= $prd['prd_price'][0]['max_discount_price']?></span></span>
                                                            
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
                                                            
                                                            <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price"><?= $prd['prd_price'][0]['min_discount_price']?></span> - ₦<span class="get_price2"><?= $prd['prd_price'][0]['max_price']?></span> </span>
                                                            
                                                            <?php else: ?>
                                                            <span class="v_align_b f_size_big m_left_5 scheme_color fw_medium prdprice_span">₦<span class="get_price"><?= $prd['prd_price'][0]['min_price']?></span></span>
                                                            <?php endif; ?>
                                                        </td>
                                                </tr>
                                                <?php if( !empty($prd['prd_color']) ): ?>
                                                <tr>
                                                        <td>Color:</td>
                                                        <td class="">
                                                            <ul id="prd_colorul" class="swatch ">
                                                            
                                                            <?php foreach ($prd['prd_color'] as $prdcolor) :?>
                                                                <?php
                                                                    $get_colorcode=null;$get_colorimg=null;
                                                                    if(!empty($prdcolor['colorimagename']))
                                                                    {
                                                                        $colorid=$prdcolor['colorid'];
                                                                        $colorname=$prdcolor['colorimagename'];
                                                                        $get_colorimg=$prdcolor['colorimage']; // send it to jquery
                                                                        $icon='
                                                                               <a href="javascript:void(0)" id="prdimgid" class="getcolorsize getcolorimg" data-color="'.$prdcolor['colorname'].'" data-image="'.base_url().'assets/uploads/fashion_prod/'.$prdcolor['colorimage'].'" data-zoom-image="'.base_url().'assets/uploads/fashion_prod/'.$prdcolor['colorimage'].'">
                                                                                <img class="img-responsive img-circle" src="'.site_url('assets/uploads/fashion_prod/thumbs/').$prdcolor['colorimage'].'" />
                                                                                <!--<img class="img-responsive img-circle" src="'.site_url('assets/uploads/fashion_prod/').$prdcolor['colorimage'].'" />-->
                                                                               </a>
                                                                              ';
                                                                        
                                                                    }
                                                                    else
                                                                    { 
                                                                        $colorid=$prdcolor['colorid'];
                                                                        $colorname=$prdcolor['colorname'];
                                                                        $get_colorcode=$prdcolor['colorcode']; // send it to jquery
                                                                        $icon='<span style="background-color:#'.$prdcolor['colorcode'].';"></span>';
                                                                    }
                                                                ?>
                                                                <li id="<?=$prdcolor['colorname']?>" data-value="<?=$prdcolor['colorname']?>" class="swatch-element color available zoom_thumbs">
                                                                    <div class="tooltip"><?=$colorname?></div>
                                                                    <input id="swatch_<?=$prdcolor['colorname']?>" class="getcolorsize fashioncolor <?=$prdcolor['colorname']?>" type="radio" name="fashioncolor" data-datacolorvalue="<?=$colorname?>" data-dataprdcolorsize_id="<?=$prdcolor['prd_color_size_id']?>" value="<?=$colorid?>" required="required" />
                                                                    <label for="swatch_<?=$prdcolor['colorname']?>" >
                                                                     <?=$icon ?>
                                                                    </label>
                                                                </li>
                                                            <?php endforeach; ?>
                                                                
                                                            </ul>
                                                            <span class="msgcolor msg_error col-xs-12" data-role="msg-error" class="msg-error sku-msg-error">
                                                                Please select a Color
                                                            </span>
                                                            
                                                        </td>
                                                        
                                                        
                                                        
                                                </tr>
                                                
                                                <?php endif; ?>
                                                <?php if( !empty($prd['prd_size'][0]['sizeid']) ): ?>
                                                <tr>
                                                        
                                                        <td>Size:</td>
                                                        <td>
                                                            <ul id="prd_sizeul" class="swatch ">
                                                                
                                                            <?php foreach ($prd['prd_size'] as $prdsize) :?>
                                                                <li id="<?=$prdsize['sizeid']?>" data-value="<?=$prdsize['sizecode']?>" class="swatch-element plain  available" >
                                                                    <input id="swatch_size_<?=$prdsize['sizecode']?>" class="getcolorsize fashionsize" type="radio" name="fashionsize" data-datasizevalue="<?=$prdsize['sizecode']?>" value="<?=$prdsize['sizeid']?>" required="required" />
                                                                    <label for="swatch_size_<?=$prdsize['sizecode']?>" >
                                                                      <?=$prdsize['sizecode']?>
                                                                    </label>
                                                                </li>
                                                            <?php endforeach; ?>
                                                              
                                                            </ul>
                                                          <span class="msgsize msg_error col-md" data-role="msg-error" class="msg-error sku-msg-error" >
                                                            Please select a Size
                                                          </span>  
                                                        </td>
                                                        <td class="guide">
                                                            <a href="">Size guide</a>
                                                        </td>
                                                        
                                                </tr>
                                                <?php endif; ?>
                                        </table>
                                        
                                        <table class="description_table m_bottom_15">

                                                <tr>
                                                        <td class="v_align_m">Quantity:</td>
                                                        <td class="v_align_m">
                                                                <div class="clearfix quantity r_corners d_inline_middle f_size_medium color_dark">
                                                                        <button class="bg_tr d_block f_left" data-direction="down">-</button>
                                                                        <input type="text" name="fashionqty" readonly value="1" class="f_left" required="required">
                                                                        <button class="bg_tr d_block f_left" data-direction="up">+</button>
                                                                </div>
                                                        </td>
                                                        <td class="">
                                                            <span class="mute" style=" padding-left: 10px;">piece (<?=$prd['prd_price'][0]['productinstock']?> qty available)</span>
                                                        </td>
                                                        
                                                </tr>
                                        </table>
                                        
                                        <hr class="divider_type_3 m_bottom_10">
                                        
                                        <table class="description_table m_bottom_5">

                                                <tr>
                                                    <!--<td> Total Price::</td>
                                                        <td><b>₦10.0000</b></td>-->
                                                </tr>
                                        </table>
                                        
                                        <hr class="divider_type_3 m_bottom_15">
                                        
                                        <div class="d_ib_offset_0 m_bottom_20">
                                            <button  class="addtocart button_type_12 r_corners bg_scheme_color color_light tr_delay_hover d_inline_b f_size_large" data-merchantid="<?= $prd['merchantid'];?>" data-productid="<?= $prd['id'];?>" data-productname="<?= $prd['productname'];?>" data-productprice="">
                                                <i class="fa fa-shopping-cart"></i> Add to Cart
                                            </button>
                                                
                                        </div>

                                        
                                    </div>
                                    
                                </div>
                                </form>
                                    <div class="container">
 
                                        <ul class="nav nav-tabs ">
                                          <li class="active"><a data-toggle="tab" href="#description">Product Description</a></li>
                                          <!--<li><a data-toggle="tab" href="#menu1"><i class="fa fa-gavel"></i></a></li>
                                          <li><a data-toggle="tab" href="#menu2"><i class="fa fa-heart"></i></a></li>	-->
                                        </ul>

                                        <div class="tab-content">
                                          <div id="description" class="tab-pane fade in active">
                                            <!--<h3>Today's Auction</h3>
                                            <p>Paste your content here.</p> -->
                                            <?= $prd['productdesc']?>
                                          </div>
                                          <div id="menu1" class="tab-pane fade">
                                            <h3>All Auctions</h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                          </div>
                                          <div id="menu2" class="tab-pane fade">
                                            <h3>My Saved Choices</h3>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                          </div>
                                        </div>
                                        
                                    </div>
                            </section>
                            <?php endforeach; ?>
                            
                            <!--right column-->
                            <aside class="col-lg-2 col-md-3 col-sm-2">

                                    <!--banner-->
                                    <a href="#" class="d_block r_corners m_bottom_30">
                                            <img src="<?= base_url()?>assets/img/ad_1.png" alt="">
                                    </a>

                                    <!--banner-->
                                    <a href="#" class="d_block r_corners m_bottom_30">
                                            <img src="<?= base_url()?>assets/img/ad_1.png" alt="">
                                    </a>
                                    <a href="#" class="d_block r_corners m_bottom_30">
                                            <img src="<?= base_url()?>assets/img/ad_1.png" alt="">
                                    </a>
                                    



                            </aside>
                        </div>
                </div>
        </div>
    <script src="<?= base_url() ?>assets/js/elevatezoom.min.js"></script>
    <script>
        $(".zoom_image").elevateZoom({
            gallery:'zoom_thumbs',
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500
        }); 
    </script>
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
            
            
        });
        
        
    </script>
    
    <script>
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
        var product_price = $('.get_price').text();
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
                $(".msgcolor").effect( "shake");$(".msgsize").effect( "shake" );
                return false;
                
            }
        else if (!product_colorname ){
                $(".msgcolor").show('fast');
                $(".msgcolor").effect( "shake" );
                return false;
                
            }
        else if (!product_size ){
                $(".msgsize").show('fast');
                $(".msgsize").effect( "shake" );
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
                      $.fancybox.close();
                      
                      var $vat = parseFloat($('.cart_vat').text());
                      var $sub_grand = parseFloat($('.cart_price_sub_grandtotal').text());
                      var $grand_price = $sub_grand + $vat;

                      $(".cart_price_grandtotal").text($grand_price);
           
          }
         });
         } 
        });
        
});
 
</script>