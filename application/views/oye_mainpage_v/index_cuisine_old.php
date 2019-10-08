<style>
    .homeslider_div img {
        height: 500px;
    }
    .animate_fade img{
        max-width: 100px;
        max-height: 80px;
    }
    




.rslides_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  top: 50%;
  left: 0;
  opacity: 0.7;
  text-indent: -9999px;
  overflow: hidden;
  text-decoration: none;
  height: 61px;
  width: 38px;
  background: transparent url("assets/img/themes.gif") no-repeat left top;
  margin-top: -45px;
  }

.rslides_nav:active {
  opacity: 1.0;
  }

.rslides_nav.next {
  left: auto;
  background-position: right top;
  right: 0;
  }

.transparent-btns_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  top: 0;
  left: 0;
  display: block;
  background: #fff; /* Fix for IE6-9 */
  opacity: 0;
  filter: alpha(opacity=1);
  width: 48%;
  text-indent: -9999px;
  overflow: hidden;
  height: 91%;
  }

.transparent-btns_nav.next {
  left: auto;
  right: 0;
  }

.large-btns_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  opacity: 0.6;
  text-indent: -9999px;
  overflow: hidden;
  top: 0;
  bottom: 0;
  left: 0;
  background: #000 url("assets/img/themes.gif") no-repeat left 50%;
  width: 38px;
  }

.large-btns_nav:active {
  opacity: 1.0;
  }

.large-btns_nav.next {
  left: auto;
  background-position: right 50%;
  right: 0;
  }

.rslides_nav:focus,
.transparent-btns_nav:focus,
.large-btns_nav:focus {
  outline: none;
  }
  
  


.rslides_tabs,
.transparent-btns_tabs,
.large-btns_tabs {
  z-index: 200;
  position:relative;
  margin-top: -20px;
  margin-bottom: 30px;
  text-align: center;
  }

.rslides_tabs li,
.transparent-btns_tabs li,
.large-btns_tabs li {
  display: inline;
  float: none;
  _float: left;
  *float: left;
  margin-right: 5px;
  }

.rslides_tabs a,
.transparent-btns_tabs a,
.large-btns_tabs a {
  text-indent: -9999px;
  overflow: hidden;
  -webkit-border-radius: 15px;
  -moz-border-radius: 15px;
  border-radius: 15px;
  background: #ccc;
  background: rgba(0,0,0, .2);
  display: inline-block;
  _display: block;
  *display: block;
  -webkit-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  -moz-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
  width: 9px;
  height: 9px;
  }

.rslides_here a,
.transparent-btns_here a,
.large-btns_here a {
  background: #222;
  background: rgba(0,0,0, .8);
  }

</style>
<!--home page slider links-->
<div class="slider_div">
     
    
    <!-- slider img -->
    <div class="homeslider_div" >
        <ul class="rslides" id="jollof_slider">
            <?php foreach($banner as $imgs) :?>
                <?php if( !empty($imgs->imageurl) ): ?>
            
            <li class=""><a  href="<?=$imgs->imageurl?>"> <img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%"></a></li>
                
                <?php else: ?>
                    
                    <li class=""> <img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_banner/<?= $imgs->imagename; ?>" alt="<?= $imgs->imagename; ?>" height="100%" width="100%"></li>
                
                <?php endif; ?> 
            <?php endforeach; ?>
                <!--
                <li> <img class="img-responsive" src="<?= base_url() ?>assets/img/food1.png" alt=""></li>
                <li> <img class="img-responsive" src="<?= base_url() ?>assets/img/food.png" alt=""></li>
                -->
        </ul>
    </div>
    <!-- end slider img -->
    
    
    <!-- banner-text -->
<!--    <div class="banner-text"> 

            <div class="book-formnew">
            <p>Order food online.</p>
               <form action="#" method="post">
                   <div class="col-md-12">
                        <div class="row">
                            <div class="col-xs-4  form-left-cuisineits-jolloflayouts ">
                                    <select class="form-control">
                                            <option>Select local Govt </option>
                                            <option>Surulere</option>
                                            <option>Ajegunle</option>
                                            <option>Lekki</option>
                                            <option>Victoria Island</option>
                                            <option>Ikoyi</option>
                                            <option>Gbagada</option>
                                            <option>More</option>
                                    </select>
                            </div>
                            <div class="col-xs-4 form-left-cuisineits-jolloflayouts ">
                                                <select class="form-control">
                                                        <option>Select Area</option>
                                                        <option>Itire</option>
                                                        <option>Aguda</option>
                                                        <option>Orile</option>
                                                        <option>Ijesha</option>
                                                        <option>More</option>
                                                </select>
                            </div>
                            <div class="col-xs-4 form-left-cuisineits-jolloflayouts ">
                                            <select class="form-control">
                                                    <option>Select Cuisine</option>
                                                    <option>Rice</option>
                                                    <option>Beans</option>
                                                    <option>Plantain</option>
                                                    <option>Egg</option>
                                                    <option>Fish</option>
                                                    <option>Bread</option>
                                                    <option>More</option>
                                            </select>
                            </div>
                            <div class="col-xs-4 form-left-cuisineits-submit">
                                      <input type="submit" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>-->
    <!-- end banner-text -->
    
    
</div> 

<!--end of home page slider links-->
<!-- gallery -->
<div class="gallery_ban">
    
    <div class="container">
        
        <ul id="flexiselDemo1">	
            
             <?php foreach($small_banner as $s_imgs) :?>
                <?php if( !empty($imgs->imageurl) ): ?>
                    
                    <li> <a href="<?= $imgs->imageurl ?>"><img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_center/<?= $s_imgs->imagename; ?>" alt="<?= $s_imgs->imagename; ?>"  /></a></li>
               
                <?php else: ?>
                                    
                    <li class=""> <img class="img-responsive" src="<?= base_url() ?>assets/jollof_banners/homepage_center/<?= $s_imgs->imagename; ?>" alt="<?= $s_imgs->imagename; ?>"  /></li>

                <?php endif; ?>
            <?php endforeach; ?>
                <!--
                <li>

                        <img src="<?= base_url() ?>assets/img/dishes.png" alt=" " class="img-responsive" />

                </li>
                <li>

                        <img src="<?= base_url() ?>assets/img/fo.png" alt=" " class="img-responsive" />
                </li>
                <li>

                        <img src="<?= base_url() ?>assets/img/dishes.png" alt=" " class="img-responsive" />
                </li>
                <li>

                        <img src="<?= base_url() ?>assets/img/fo.png" alt=" " class="img-responsive" />
                </li>
                <li>

                        <img src="<?= base_url() ?>assets/img/dishes.png" alt=" " class="img-responsive" />
                </li>
                -->

        </ul>

    </div>
</div>
<!-- //gallery -->

<div class="ab-jollofl-about">
    
    <!--  wellcome  -->
    <div class="container">

        <h3 class="tittle-jollof"><span>Welcome to</span><b> Jollof Cuisine</b></h3>
        <p class="para-jollofl">
            Nigeria's food culture has been shaped by many influences through the centuries, 
            external and internal. The country, home to countless indigenous tribes, and influenced 
            by Arab and Western culture through historical ties, reflects vast diversity in food 
            habits. Climate and geography also play a role in determining which foods find favour 
            in different regions of the country
        </p>
        <!--<p><a class="read" href="more.html">Read More</a></p> -->

    </div>
    <!-- //wellcome  -->

    <!-- //How it works  -->
    <div class ="container">

        <h3 class="tittle-jollof"><span>How it Works</span></h3>

        <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
                        <figure class="info_block_type_2 t_align_c">
                                <div class="icon_wrap_1 r_corners bg_light_color_1 m_bottom_15 t_align_c vc_child scheme_color d_inline_b tr_all_hover"><i class="fa fa-map-marker d_inline_middle"></i></div>
                                <h4 class="fw_medium color_dark m_bottom_15">Find Restaurant</h4>
                                <p class="m_bottom_10">Find restaurants that deliver to you by entering your address.</p>
                                <!-- <a href="#" class="tt_uppercase f_size_large">Watch Video</a> -->
                        </figure>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
                        <figure class="info_block_type_2 t_align_c">
                                <div class="icon_wrap_1 r_corners bg_light_color_1 m_bottom_15 t_align_c vc_child scheme_color d_inline_b tr_all_hover"><i class="fa fa-search d_inline_middle"></i></div>
                                <h4 class="fw_medium color_dark m_bottom_15">Browse the food you like</h4>
                                <p class="m_bottom_10">Browse hundreds of menus to find the food you like.</p>
                                <!-- <a href="#" class="tt_uppercase f_size_large">Watch Video</a> -->
                        </figure>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
                        <figure class="info_block_type_2 t_align_c">
                                <div class="icon_wrap_1 r_corners bg_light_color_1 m_bottom_15 t_align_c vc_child scheme_color d_inline_b tr_all_hover"><i class="fa fa-credit-card d_inline_middle"></i></div>
                                <h4 class="fw_medium color_dark m_bottom_15">Pay </h4>
                                <p class="m_bottom_10">Pay by Cash on Delivery.</p>
                                <!-- <a href="#" class="tt_uppercase f_size_large">Watch Video</a> -->
                        </figure>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 m_bottom_45 m_xs_bottom_30">
                        <figure class="info_block_type_2 t_align_c">
                                <div class="icon_wrap_1 r_corners bg_light_color_1 m_bottom_15 t_align_c vc_child scheme_color d_inline_b tr_all_hover"><i class="fa fa-gift d_inline_middle"></i></div>
                                <h4 class="fw_medium color_dark m_bottom_15">Earn jollof points</h4>
                                <p class="m_bottom_10">Get jollof point, which you could use as coupon to get other gift items from jollof.com .</p>
                                <!-- <a href="#" class="tt_uppercase f_size_large">Watch Video</a> -->
                        </figure>
                </div>
        </div>
        
    </div>
    
    <!-- //How it works -->

<!--mobile app-->
    <div class ="container">

        <h2 class="tt_uppercase color_dark m_bottom_30">JOLLOF.COM IN YOUR POCKET</h2>

        <div class="clearfix m_bottom_35">

            <div class="photoframe shadow r_corners wrapper f_left f_xs_none m_xs_right_0 m_xs_bottom_30 d_xs_inline_b m_right_20">

                <img src="<?= base_url() ?>assets/img/phon.png" alt="" class="tr_all_long_hover">

            </div>

            <h5 class="fw_medium m_bottom_10"></h5>

            <p class="m_bottom_10">The jollof mobile app makes it simple for anybody to conveniently use a mobile device to look over the menu of the best restaurants and place an order for home delivery. This is the best option for anyone looking for the fastest way to order takeaway from the best restaurants in Lagos.</p>

            <p> Enjoy the mobile app with the latest features, giving you the opportunity to 
                literally have the finest restaurants in your fingertips.
                Download the app today if you haven't already and relax while we help you simplify
                your food ordering. 
            </p>

        </div>

        <div class="container ">

            <div class="row">

                <div class="col-md-2">
                    <a href="#"><img src="<?= base_url() ?>assets/img/goo.png" alt=""></a>
                </div>

                <div class="col-md-2">
                    <a href="#"><img src="<?= base_url() ?>assets/img/app.png" alt=""></a>
                </div>
            </div>	

        </div>

    </div>


    <div class="clearfix"></div>
    </div>
<!--//mobile app-->


<!--restaurants-->   
    <div class="container m_bottom_25">
        
        <div class="clearfix m_bottom_25 m_sm_bottom_20">
                <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">RESTAURANTS</h2>
                <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
                </div>
        </div>
        <!--product brands carousel-->
        <div class="product_brands m_sm_bottom_35 m_xs_bottom_0">
            <?php foreach($rest_logo as $logo) :?>
                
            
                <a href="<?= base_url() ?>restaurants/view/<?= $logo->id; ?>" class="d_block t_align_c animate_fade "><img src="<?= base_url() ?>assets/uploads/rest_logo/<?= $logo->logo; ?>" alt="<?= $logo->logo; ?>"></a>
                <!--
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_2.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_3.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_4.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_5.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_15.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_7.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_8.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_9.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_10.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_11.png" alt=""></a>
                <a href="#" class="d_block t_align_c animate_fade"><img src="<?= base_url() ?>assets/img/res_17.png" alt=""></a>
                -->
                
            <?php endforeach; ?>
                
        </div>

    </div>
<!--restaurants-->







<script src="<?= base_url() ?>assets/js/particles.js"></script>
<script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
    <script type="text/javascript">
      // You can also use "$(window).load(function() {"
      var data_sec= parseInt(<?=$super_data->homebannertimer?>) * 1000;
      
        $(function() {

            $("#jollof_slider").responsiveSlides({
              
                auto: true,             // Boolean: Animate automatically, true or false
                speed: 500,            // Integer: Speed of the transition, in milliseconds
                timeout: data_sec, //5000          // Integer: Time between slide transitions, in milliseconds
                pager: true,           // Boolean: Show pager, true or false
                nav: true,             // Boolean: Show navigation, true or false
                random: false,          // Boolean: Randomize the order of the slides, true or false
                pause: true,           // Boolean: Pause on hover, true or false
                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                prevText: "Previous",   // String: Text for the "previous" button
                nextText: "Next",       // String: Text for the "next" button
                maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                manualControls: "",     // Selector: Declare custom pager navigation
                namespace: "rslides",   // String: Change the default namespace used
                before: function(){},   // Function: Before callback
                after: function(){}     // Function: After callback

            });

      });
    </script>
    
    <!--home advert scroller-->
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.flexisel.js"></script>
    <script type="text/javascript">

    $(window).load(function() {
            $("#flexiselDemo1").flexisel({
                visibleItems: 4,
                //itemsToScroll: 3,
                animationSpeed: 1000,
                infinite: true,
                navigationTargetSelector: null,

                autoPlay: {
                    enable: true,
                    interval: 3000,
                    pauseOnHover: true
                },
                responsiveBreakpoints: { 
                        portrait: { 
                            changePoint:480,
                            //itemsToScroll: 1,
                            visibleItems: 1
                        }, 
                        landscape: { 
                            changePoint:640,
                            //itemsToScroll: 2,
                            visibleItems: 2
                        },
                        tablet: { 
                            changePoint:768,
                            //itemsToScroll: 3,
                            visibleItems: 3
                        }
                }
            });
    });

    </script>

    <!--gallery-->
    
    
    <!-- Dropdown-Menu-JavaScript -->
    <script>
        $(document).ready(function(){
                $(".dropdown").hover(            
                        function() {
                                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                                $(this).toggleClass('open');        
                        },
                        function() {
                                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                                $(this).toggleClass('open');       
                        }
                );
        });
    </script>
<!-- //Dropdown-Menu-JavaScript -->

<!-- //for bootstrap working -->
<!-- script-for-menu -->
    <script>					
            $("span.menu").click(function(){
                    $(".top-nav ul").slideToggle("slow" , function(){
                    });
            });
    </script>
    <!-- script-for-menu -->