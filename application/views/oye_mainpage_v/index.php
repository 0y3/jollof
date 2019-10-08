
                
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsiveslides.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/camera.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.carouselnew.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/owl.transitions.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/jquery.custom-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/mainpage_style.css">
    <link href="<?= base_url() ?>assets/css/jquery-ui.min.css" rel="stylesheet">
		<!--font include-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/ebs_home_style.css">
                
                
                
    <!--Notification stylesheet include-->
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/jBox.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.css">
    <link rel="stylesheet" href="<?= base_url() ?>extensions/jBox/Source/themes/NoticeFancy.css">
    
    <script src="<?= base_url() ?>extensions/jBox/Source/jBox.js"></script>
    <script src="<?= base_url() ?>extensions/jBox/Source/plugins/Notice/jBox.Notice.js"></script>



    <script type="text/javascript" src="<?=base_url(); ?>assets/js/jssor.slider.min.js"></script>

               

                
<style type="text/css">
body {
    font-family: 'Arimo', sans-serif;
    font-weight: 400;
    font-style: normal;
    font-size: 14px;
    color: #454545;
}
.sw_button i:only-of-type {
    line-height: unset;
}
@media only screen and (max-width: 768px)
{
  .d_xs_none, .custom_thumb, .sub_menu_wrap:before, .tp-leftarrow, .tp-rightarrow, .isotope_menu [class*="button_type_"]:after, .camera_next, .camera_prev, #styleswitcher, .flex-direction-nav a {
    display: unset;
  }
  .itemdiv{ width: unset; }
}
.homeslider_div {
  position: relative;
}
.homeslider_div img {
max-height: 500px;
/*min-height: 250px;*/
}
.animate_fade img{
max-width: 100px;
max-height: 80px;
}
.cap_font{
    text-transform: uppercase;
}

.rslides_nav {
  z-index: 3;
  position: absolute;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  /*top: 20%;
  left: 0;*/
  bottom: 35%;
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
  z-index: 10;
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
  .circle_curve
  {
    border-radius: 20%;
    -webkit-border-radius:20%;
  }

  .subtext
  {
    position: absolute;
    bottom: 10%;
    background-color: gray;
  }
  .itemdiv 
  {
    width: 200px; 
  }
  .item img{
    height: 200px !important;
    max-height: 200px !important;
    width: 100% !important;
    max-width: 100% !important;
  }
  .single-brand
  {
    padding-right: auto ;
    padding-left: auto;
  }
@media only screen and (max-width: 992px){
  .micro_photo img
  {
    height:230px;
  }
  .single-brand
  {
    padding-right: auto !important;
    padding-left: auto !important;
  }
  .itemdivv{ width: unset; }
}

</style>
	</head>
	<body>
		<!--boxed layout-->
		<div class="boxed_layout-- relative w_xs_auto">
			<!--[if (lt IE 9) | IE 9]>
				<div style="background:#fff;padding:8px 0 10px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix" style="padding:9px 0 0;float:left;width:83%;"><i class="fa fa-exclamation-triangle scheme_color f_left m_right_10" style="font-size:25px;color:#e74c3c;"></i><b style="color:#e74c3c;">Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:16%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_4 r_corners bg_scheme_color color_light d_inline_b t_align_c" target="_blank" style="margin-bottom:2px;">Update Now!</a></div></div></div></div>
			<![endif]-->
			<!--slider-->

 <!-- #region  Slider Begin -->
                <div class="row " >
                    <div class="col-lg-12 homeslider_div " >
                        <ul class="rslides" id="jollof_slider" >
                            
                            <?php foreach($banner as $imgs) :?>

                                <?php 
                               //print("<pre>".print_r($imgs,true)."</pre>"); die;
                                     if($imgs->usertype=='cuisine')
                                     {
                                        $img='cuisine_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='fashion')
                                     {
                                        $img='fashion_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='thirdparty')
                                     {
                                        $img='thirdparty_banner/'.$imgs->imagename;
                                     }
                                     elseif($imgs->usertype=='admin')
                                     {
                                       
                                        if($imgs->bannerjollofsitetypeid==1)
                                        {
                                            $img='cuisine_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==2)
                                        {
                                           $img='fashion_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==3)
                                        {
                                           $img='jollof_banner/'.$imgs->imagename;
                                        }
                                        elseif($imgs->bannerjollofsitetypeid==4)
                                        {
                                           $img='lifestyle_banner/'.$imgs->imagename;
                                        }
                                        elseif($l_banner['bannerjollofsitetypeid']==5)
                                        {
                                          $img='biz_banner/'.$imgs->imagename;
                                        }
                                        elseif($l_banner['bannerjollofsitetypeid']==6)
                                        {
                                          $img='scholar_banner/'.$imgs->imagename;
                                        }
                                     }
                                ?>  
                                <?php if( !empty($imgs->imageurl) ): ?>

                            <li class=""> <a href="<?=$imgs->imageurl?>"><img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></a></li>
                                
                                <?php else: ?>
                                    
                                    <li class=""> <img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></li>
                                
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                            
                               <!--
                                <li> <img class="img-responsive" src="<?= base_url() ?>assets/jollofcuisine_banners/homepage_banner/CPRimagefor landingpagebanner(beneath).png" alt="" height="100%" width="100%"></li>
                                <li> <img class="img-responsive" src="<?= base_url() ?>assets/img/food.png" alt="" height="100%" width="100%"></li>
                               --> 
                        </ul>
                    </div>
                </div>
 
<!-- #endregion  Slider End -->
    <!-- #endregion Jssor Slider End -->

      <div class="container text-center mb-40 mt-20">

        <h3 class="tittle-jollof mb-10"><span>Welcome To </span><b> Jollof </b></h3>
        <h6 class="para-jollofl ">
            <span class="linkcolor"><a href="<?= site_url(); ?>">Jollof.com</a></span> is Nigeria's first aggregator of lifestyle services and activities.
        </h6>
        <!--<p><a class="read" href="more.html">Read More</a></p> -->

    </div>




        <!--Circular images-->

					
  <div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12 single-brand">
                <div class="t_align_c itemdiv">
                    <a href="<?= site_url('lifestyle')?>">
                        <div id="owl-carousel" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                          <?php if (!empty($lifestylebanners)) :?>
                            <?php foreach($lifestylebanners as $l_banner) :?>
                              <?php
                              if($l_banner['bannerjollofsitetypeid']==1)
                              {
                              $img='cuisine_banner/thumbs/'.$l_bannerl_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==2)
                              {
                              $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==3)
                              {
                              $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==4)
                              {
                              $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==5)
                              {
                              $img='biz_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==6)
                              {
                              $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                              }
                              ?>
                              <div class="item text-center"><img class=" img-responsive" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></div>
                            <?php endforeach; ?>
                            <?php else: ?>
                              <div class="item"><img class="img-responsive" src="<?= site_url('assets/img/LIFESTYLE.jpeg')?>" ></div>
                              
                            <?php endif ;?>
                        </div>
                        <figcaption>
                          <h4 class="fw_medium color_dark">Lifestyle</h4>
                          <hr class="divider_type_5 d_inline_b m_bottom_5">
                      
                        </figcaption> 
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12 single-brand">
                <div class="t_align_c itemdiv">
                    <a href="<?= site_url('cuisine')?>">
                        <div id="microsite_cuisine" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                          <?php if (!empty($cuisinebanners)) :?>
                            <?php foreach($cuisinebanners as $l_banner) :?>
                              <?php
                              if($l_banner['bannerjollofsitetypeid']==1)
                              {
                              $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==2)
                              {
                              $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==3)
                              {
                              $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==4)
                              {
                              $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==5)
                              {
                              $img='biz_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==6)
                              {
                              $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                              }
                              ?>
                              <div class="item text-center"><img class="" src="<?= site_url('assets/jollof_banners/'.$img)?>" ></div>
                            <?php endforeach; ?>
                            <?php else: ?>
                              <div class="item text-center "><img src="<?= site_url('assets/img/CUISINE.jpeg')?>" ></div>
                              
                            <?php endif ;?>
                        </div>

                        

                        <figcaption>
                          <h4 class="fw_medium color_dark">Cuisine</h4>
                          <hr class="divider_type_5 d_inline_b m_bottom_5"><br>
                        
                        </figcaption> 
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12 single-brand">
                <div class="t_align_c itemdiv">
                    <a href="<?= site_url('fashion')?>">
                        <div id="microsite_fashion" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                        <?php if (!empty($fashionbanners)) :?>
                          <?php foreach($fashionbanners as $l_banner) :?>
                            <?php
                            if($l_banner['bannerjollofsitetypeid']==1)
                            {
                            $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==2)
                            {
                            $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==3)
                            {
                            $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==4)
                            {
                            $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==5)
                            {
                            $img='biz_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==6)
                            {
                            $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                            }
                            ?>
                            <div class="item  text-center"><img  src="<?= site_url('assets/jollof_banners/'.$img)?>"></div>
                          <?php endforeach; ?>
                          <?php else: ?>
                            <div class="item  text-center "><img src="<?= site_url('assets/img/FASHION.jpeg')?>"></div>
                            
                          <?php endif ;?>
                        </div>
                      

                      <figcaption>
                        <h4 class="fw_medium color_dark">Fashion</h4>
                        <hr class="divider_type_5 d_inline_b m_bottom_5"><br>
                      
                      </figcaption> 
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12 single-brand">
                <div class="t_align_c itemdiv">
                    <a href="<?= site_url('biz')?>">
                        <div id="microsite_biz" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                          <?php if (!empty($bizbanners)) :?>
                            <?php foreach($bizbanners as $l_banner) :?>
                              <?php
                              if($l_banner['bannerjollofsitetypeid']==1)
                              {
                              $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==2)
                              {
                              $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==3)
                              {
                              $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==4)
                              {
                              $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==5)
                              {
                              $img='biz_banner/thumbs/'.$l_banner['imagename'];
                              }
                              elseif($l_banner['bannerjollofsitetypeid']==6)
                              {
                              $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                              }
                              ?>
                              <div class="item  text-center"><img  src="<?= site_url('assets/jollof_banners/'.$img)?>"></div>
                            <?php endforeach; ?>
                            <?php else: ?>
                              <div class="item  text-center "><img src="<?= site_url('assets/img/BUSINESS2.jpeg')?>"></div>
                              
                            <?php endif ;?>
                          </div>

                        <figcaption>
                          <h4 class="fw_medium color_dark">Biz</h4>
                          <hr class="divider_type_5 d_inline_b m_bottom_5"><br>
                        </figcaption>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="brand-info m_bottom_30">
    <div class="container">
      <div class="row">
          <div class="col-md-4 col-12 single-brand">
              <div class="text-center">
                <i class="fa fa-truck d_inline_middle"></i>
                Free World Delivery
              </div>
          </div>
          <div class="col-md-4 col-12 single-brand">
              <div class="text-center">
                <i class="fa fa-headphones d_inline_middle"></i>
                Best Online Support
              </div>
          </div>
          <div class="col-md-4 col-12 single-brand">
              <div class="text-center">
                <i class="fa fa-money d_inline_middle"></i>
                Money Back Guarantee
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="brand-area">
    <div class="container">
      <div class="row">
          <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12 single-brand">
              <div class="t_align_c itemdiv">
                  <a href="<?= site_url('scholar')?>">
                      <div id="microsite_scholar" class="owl-carousel owl-theme circle_curve wrapper d_inline_b m_bottom_15">
                        <?php if (!empty($scholarbanners)) :?>
                          <?php foreach($scholarbanners as $l_banner) :?>
                            <?php
                            if($l_banner['bannerjollofsitetypeid']==1)
                            {
                            $img='cuisine_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==2)
                            {
                            $img='fashion_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==3)
                            {
                            $img='jollof_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==4)
                            {
                            $img='lifestyle_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==5)
                            {
                            $img='biz_banner/thumbs/'.$l_banner['imagename'];
                            }
                            elseif($l_banner['bannerjollofsitetypeid']==6)
                            {
                            $img='scholar_banner/thumbs/'.$l_banner['imagename'];
                            }
                            ?>
                            <div class="item  text-center"><img class="img-responsive" src="<?= site_url('assets/jollof_banners/'.$img)?>"></div>
                          <?php endforeach; ?>
                          <?php else: ?>
                            <div class="item  text-center "><img class="img-responsive" src="<?= site_url('assets/img/SCHOLAR.jpeg')?>" ></div>
                            
                          <?php endif ;?>
                        </div>

                      <figcaption>
                        <h4 class="fw_medium color_dark">Scholar</h4>
                        <hr class="divider_type_5 d_inline_b m_bottom_5"><br>
                      </figcaption>
                  </a>
              </div>
          </div>

          <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12">
            <div class="single-brand">
              <div class="t_align_c itemdiv">
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/howit.png" alt=""  width="100%" height="100%">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12">
            <div class="single-brand">
              <div class="t_align_c itemdiv">
                <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                  <img src="<?=base_url(); ?>assets/img/mobileapp.png" alt=""  width="100%" height="100%">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-md-offset-0 col-xs-8 col-xs-offset-2 col-12">
            <div class="single-brand">
              <div class="t_align_c itemdiv">
                  <a href="<?= site_url('merchant/signup')?>">
                    <div class="circle_curve wrapper team_photo d_inline_b m_bottom_15">
                      <img src="<?=base_url(); ?>assets/img/sellon.png" alt=""  width="100%" height="100%">
                    </div>
                  </a>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>

					<!--Mobile app-->


					<!--Mobile app-->

			
<!--merchant apply-->
        <section class="bg_light_color_1 call_to_action_1 ">
          <!--merchant apply-->
<!--merchant apply-->
      <!--content-->
      <div class="page_content_offsett">
        <div class="container">

 
    <div class="container">

           

    </div>


          <div class="row clearfix">
            <div class="col-lg-5 col-md-5 col-sm-5 m_bottom_45 m_xs_bottom_30">
              <figure class="info_block_type_1_">

              <h4 class="tittle-jollof text-center"><b>Trending In Jollof</b></h4>
                <!-- start sw-rss-feed code --> 
<script type="text/javascript"> 
<!-- 
rssfeed_url = new Array(); 
rssfeed_url[0]="http://www.surfing-waves.com/newsrss.xml";  
rssfeed_frame_width="100%"; 
rssfeed_frame_height="260"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="6"; 
rssfeed_scroll_bar="off"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face=""; 
rssfeed_border="on"; 
rssfeed_css_url=""; 
rssfeed_title="on"; 
rssfeed_title_name=""; 
rssfeed_title_bgcolor="#E74C3C"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="rss feed"; 
rssfeed_footer_bgcolor="#fff"; 
rssfeed_footer_color="#E74C3C"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="100"; 
rssfeed_item_title_color="#666"; 
rssfeed_item_bgcolor="#fff"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="off"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#666"; 
rssfeed_item_description_link_color="#333"; 
rssfeed_item_description_tag="off"; 
rssfeed_no_items="0"; 
rssfeed_cache = "8e1b917248351618709979c0754e5f80"; 
//--> 
</script> 
<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 

              
              </figure>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 m_bottom_45 m_xs_bottom_30">
              <figure class="info_block_type_1_">
                  <!-- url= https://publish.twitter.com -->
              <a class="twitter-timeline" data-lang="en" data-width="800" data-height="250" href="https://twitter.com/EgbochuoDavid?ref_src=twsrc%5Etfw">Tweets by EgbochuoDavid</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              
              </figure>

            </div>
          </div>



        
        </div>
      </div>




  
    
    
    
<!--login popup-->
        </section>
		
		
<!--login popup-->
<!-- Modal -->
<div class="modal fade" id="modal_login" style="z-index: 1100;" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

</div><!--end Modal -->

<!--sign popup-->
<div class="modal fade" id="modal_signup_container" style="z-index: 1100;"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end sign popup-->

<!--forgot password popup-->
<div class="modal fade" id="modal_pwdforgot_container"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end forgot password popup--> 
<!-- Modal -->
<div class="modal fade" id="modal_login" style="z-index: 1100;" tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >

</div><!--end Modal -->

<!--sign popup-->
<div class="modal fade" id="modal_signup_container" style="z-index: 1100;"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end sign popup-->

<!--forgot password popup-->
<div class="modal fade" id="modal_pwdforgot_container"  tabindex="-1" role="dialog" aria-labelledby="log in" aria-hidden="true" >
    
</div><!--end forgot password popup--> 
		


    <button class="t_align_c r_corners tr_all_hover animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>
    <!--scripts include-->
    
    
    <script src="<?= base_url() ?>assets/js/owl.carouselnew.min.js"></script>
    <script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ebs_dav_scripts.js"></script>
    
    <script type="text/javascript">
      (function(){

        var owl = $('#owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_cuisine');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_fashion');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_biz');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });

        var owl = $('#microsite_scholar');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
        

        
      })();
      // You can also use "$(window).load(function() {"
        $(function() {

            $("#jollof_slider").responsiveSlides({
              
                auto: true,             // Boolean: Animate automatically, true or false
                speed: 500,            // Integer: Speed of the transition, in milliseconds
                timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
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
    
    <script>
         
    //$(".login_l").click(function(e) {
     $(".nav_l").on("click","[data-toggle='modal']", function(e){
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
    //$("[data-toggle='modal']").click(function(e) {
    $(".nav_l").on("click","[data-toggle='modal']", function(e){
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
    $(document).on("click",".sw_button", function(e){
        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
    });
</script>