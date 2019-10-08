<link rel="stylesheet" href="<?= base_url() ?>assets/css/newcuisine_css.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-select.min.css">

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
  /*top: 50%;
  left: 0;*/
  bottom: 35%
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
  .no_padding{
      padding-left:0;
      padding-right: 0;
  }

  #keyword_searchform {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #keyword_searchform .search-query {
        padding-right: 3px;
        padding-right: 4px ;
        padding-left: 10px;
        padding-left: 10px ;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        width: 80%;
        height: 40px;
        position: absolutee;
    }
 
    #keyword_searchform button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top:2px;
        position: relative;
        left: -34px;
        font-size: 18px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    .keydropdown_menu {
            display: none;
            width: 80%;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
            z-index: 1;
            position: absolute;
        }
    .keydropdown_menu ul{
        padding: 0;
        margin: 0;
    }
    .keydropdown_menu ul li{
        padding:10px 0px;
        margin: 0;
        border-bottom: 1px solid #ccc;
    }
    .keydropdown_menu ul li:first-child{
        border-top: 1px solid #ccc;
    }    
    .search_btnc>button {
    /* background-color: #26c6d0; */
    background-color: #e74c3c;
    border: medium none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    float: left;
    font-weight: bold;
    letter-spacing: 0.2px;
    line-height: 2;
    padding: 7px 14px;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}
.owl-carousel .owl-item img {
    display: block;
    max-width: 100px !important;
}
</style>
<!--home page BG slider links-->
 

<div class="gif_selection m_bottom_25">		   
	
    <div id="wapper">
	  	
        <h2><b>Order delicious food online!</b></h2>
									
        <br/>
        
        <div class="col-lg-6 no_paddingg m_bottom_15 mb-10">
            <form id="keyword_searchform" class="form-search form-horizontal" action="<?= site_url('cuisine/restaurants'); ?> " method="post">
                <div class="input-append span12">
                    <input type="text" name="search" id="keywordsearch" class="search-query" placeholder="Key Words Search eg dish or restaurant name" required="">
                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    
                </div>
                <!-- Suggestions will be displayed in below div. -->
                <div id="display" class="keydropdown_menu">
                    <ul>
                        <li><a href="">Database name or anything you</a></li>
                        <li><a href="">Database name or anything you</a></li>
                    </ul>
                </div>
            </form>
        </div>
        
        <div class="col-lg-7 col-md-offset- text-center">
            <form id="searchform" action="<?= site_url('cuisine/restaurants'); ?> " method="post">
            <div class="col-lg-8 no_padding">
                
                <div class="selectizing-wrapper">
                    <div class="col-lg-6 no_padding">
                    <select id="state_div" name="statelocation" class="custom-select-one" required="">
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
                    
                    <div id="WaitMe_city" class=" col-lg-6 no_padding city_wraper">
                    <select id="city_div" name="citylocation" class="custom-select-two" required="">
                        <option>Select City</option>
                    </select>
                    </div>


                </div>
                <!--<div id="event-change">Select An Option</div>-->
            
            </div>
            
            <div class="col-lg-4 no_padding search_btnc">
                <button id="WaitMe_btn" role="button" class="button_type_3 color_light bg_scheme_color d_block r_corners tr_delay_hover box_s_none">
                   
                    <span class="d_inline_middle shop_icon m_mxs_right_0">				
                        <i class="fa fa-search"></i>					
                    </span>								
                    <b class="d_mxs_nonee">SEARCH NOW!</b>

               </button>
            </div>
            </form>
            
        </div>
        
        
        

    </div>
   
    <section class="row clearfix m_bottom_45 m_sm_bottom_35">
        
        <!--ads div--> 
    <div class="container">
        <!--
        <div id="iview" class="iview">
                <div data-iview:image="<?= base_url() ?>assets/img/728x90_1.jpg"></div>
                <div data-iview:image="<?= base_url() ?>assets/img/728x90_2.jpg"></div>
                <div data-iview:image="<?= base_url() ?>assets/img/ban3.jpg"></div>
        </div>
        -->
    </div>
        
        <!--
        <div class="col-lg-4 col-md-4 col-sm-4 animate_half_tc">
            <div class="jquery-script-ads" align="center" style="margin-bottom:30px;">
                <script type="text/javascript"src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                <script type="text/javascript"><!--
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                </script>
            </div>
        </div>



        <div class="col-lg-4 col-md-4 col-sm-4 animate_half_tc">
            <div class="jquery-script-ads" align="center" style="margin-bottom:30px;">
                <script type="text/javascript"src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                <script type="text/javascript"><!--
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                </script>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 animate_half_tc">
            <div class="jquery-script-ads" align="center" style="margin-bottom:30px;">
                <script type="text/javascript"src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
                <script type="text/javascript"><!--
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                </script>
            </div>
        </div>
        -->

    </section>

</div>

<!--restaurants--> 
  
    <div class="container m_bottom_25 pt-30">

      <div class="product-area">
          <div class="product-topbar-wrapper border-bottom-2 mb-30">
              <h3 class="topbar-title">Restaurants</h3>
          </div>
          <div class="recommended-product-wrapper">
              <div class="row">
                  <div class="restaurant-logo-slider-active owl-carousel nav-style">
                     <?php foreach($rest_logo as $logo) :?>
                      <div class="col-lg-6">
                          <div class="">
                              <div class="">
                                  <a href="<?= base_url() ?>restaurants/view/<?= $logo->id; ?>"><img class="img-responsive" width="100px" height="100px" src="<?= base_url() ?>assets/uploads/rest_logo/<?= $logo->logo; ?>" alt=""></a>
                              </div>
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
        
        <!--<div class="clearfix m_bottom_25 m_sm_bottom_20">
                <h2 class="tt_uppercase color_dark f_left heading2 animate_fade f_mxs_none m_mxs_bottom_15">RESTAURANTS</h2>
                <div class="f_right clearfix nav_buttons_wrap animate_fade f_mxs_none">
                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left tr_delay_hover r_corners pb_prev"><i class="fa fa-angle-left"></i></button>
                        <button class="button_type_7 bg_cs_hover box_s_none f_size_ex_large t_align_c bg_light_color_1 f_left m_left_5 tr_delay_hover r_corners pb_next"><i class="fa fa-angle-right"></i></button>
                </div>
        </div>
        <!--product brands carousel-->
        
        <!--<div class="product_brands m_sm_bottom_35 m_xs_bottom_0 ">
            <?php foreach($rest_logo as $logo) :?>
                
            
                <a href="<?= base_url() ?>restaurants/view/<?= $logo->id; ?>" class="d_block t_align_c animate_fade "><img src="<?= base_url() ?>assets/uploads/rest_logo/<?= $logo->logo; ?>" alt="<?= $logo->logo; ?>"></a>
                <?php endforeach; ?>
               
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
                
                
            
                
        </div>-->

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
    
    <script>					
    
    $(document).ready(function() {

   //On pressing a key on "Search box" in "search.php" file. This function will be called.

       $('#keywordsearch').keyup(function() {

           //Assigning search box value to javascript variable named as "name".

           var name = $('#keywordsearch').val();
           if (name == "") 
            {
               $("#display").html("").hide();
            }
           else 
            {
               //AJAX is called.
                /*
               $.ajax({
                   type:'POST',
                   url:'<?= site_url('products/ajaxcall_store') ?>',
                   data:{
                         search: name
                   },
                    success: function(html) {
                       $("#display").html(html).show();
                   }

               });
                */
            }

        });

    });
      
    </script>
    
    <script src="<?=base_url(); ?>assets/js/dom.selectizing.js"></script>
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
            
			$('.custom-select-one').selectizing({
				background: '#50C9AD',
				title: 'Select Your State',
				change: function(){
                                    
                                    var value = $(this).val();
                                    var text = $(this).find('option:selected').html();
                                    $('#event-change').html(value + ' : ' + text);
                                    run_waitMe($('#WaitMe_city'), 3, 'orbit');
                                    $.ajax({
                                        type:'POST',
                                        url:'<?= site_url('cuisine/get_city_byid') ?>',
                                        data:'stateid='+value,
                                        dataType: "json",
                                        success:function(html){
                                            $('#city_div').html(html.option);
                                            $('#city_div').next('ul').children('li').find('ul').html(html.element);
                                            
                                            $('.custom-select-two').selectizing({
                                                background: '#50C9AD',
                                                title: 'Select Your City',
                                                padding: '50px',
                                                change: function(){
                                                        var value = $(this).val();
                                                var text = $(this).find('option:selected').html();
                                                        $('#event-change').html(value + ' : ' + text);
                                                }
                                            });
                                            $('.city_wraper').children('ul').last().remove();
                                            $('#WaitMe_city').waitMe('hide');
                                           // $(".dom-selectizing :last-child").remove();
                                            //alert( $('#city_div').next('ul').children('li').find('ul').attr('data-elements'));
                                            
                                        }
                                    });
				}
			});
			$('.custom-select-two').selectizing({
				background: '#50C9AD',
				title: 'Select Your City',
				padding: '50px',
				change: function(){
					var value = $(this).val();
      				var text = $(this).find('option:selected').html();
					$('#event-change').html(value + ' : ' + text);
				}
			});

			$('.other-custom-select').selectizing({
				background: 'crimson',
				title: 'please go now!',
				change: function(){
					// do something on value changes.
				}
			});
                        
                        
        });
                
	</script>
        <!-- Ads js -->
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/iview.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url() ?>assets/css/iview_style_skin5.css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/js/raphael-min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.easing.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/iview.js"></script>
    
        <script>
            $(document).ready(function(){
                    $('#iview').iView({
                            strips: 20,
                            blockCols: 20,
                            blockRows: 3,
                            pauseTime: 10000,
                            pauseOnHover: true,
                            directionNavHoverOpacity: 0,
                            timer: "Bar",
                            timerDiameter: 120,
                            timerPadding: 3,
                            timerStroke: 4,
                            timerBarStroke: 0,
                            timerColor: "#0F0",
                            timerPosition: "bottom-right"
                    });
                    
            });
        </script>
                
    <script>
        $(function(){
            
	
        });
    </script>