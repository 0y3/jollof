<style>
    .photoframe a img{
        max-width: 242px;
        max-height: 242px;
        
    }
    
    .shadow {
    box-shadow: 0 2px 3px -1px #DCDCDC;
}
.sidebar-search-text {
    display: block;
    padding: 15px 15px 20px;
    margin: 35px 0 5px;
    background-color: #fafafa;
    color: #000;
    border-bottom: 1px solid #ededed;
}
.sidebar-search-text input {
    font-size: 16px;
    border: none;
        border-bottom-width: medium;
        border-bottom-style: none;
        border-bottom-color: currentcolor;
    border-bottom: 2px dotted #E0E0E0;
    padding-bottom: 9px;
    box-shadow: none;
}
.sidebar .sidebar-nav {
    margin: 0;
    padding: 0;
    padding-top: 5px;
    background: #fff;
}
.sidebar .sidebar-nav li {
    position: relative;
    list-style-type: none;
    border-bottom: 0;
}
.sidebar .sidebar-nav li a {
    position: relative;
    cursor: pointer;
    user-select: none;
    display: block;
    padding: 6px 56px 6px 16px;
    text-decoration: none;
    clear: both;
    font-weight: 400;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    color: inherit;
    border-bottom: 1px solid #ededed;
}
.ripple-effect {
    position: relative;
    overflow: hidden;
    -webkit-transform: translate3d(0,0,0);
}
.sidebar-badge {
    position: absolute;
    right: 16px;
    top: 0;
}
.sidebar-nav li .caret {
    position: absolute;
    right: 37px;
    top: 30%;
    
}
.sidebar .sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    margin: 0;
    padding: 0;
    padding-left: 10px;
    border: none;
    border-radius: 0;
    font-size: 14px;
    color: black;
    font-weight: bolder;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.sidebar .sidebar-nav li {
    position: relative;
    list-style-type: none;
    border-bottom: 0;
}

.nopadding {
    padding: 0;
}

</style>
<div class="container-flud" style=" margin-top: 20px; width: 90%; margin-left: auto; margin-right: auto;">
    
    <div class="row clearfix" class="page_content_offset">
				<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30 ">
				<!--widgets-->
	
<div class=" sidebar">					<!--Bestsellers-->
    <div class="bg-white shadow">
              
              
        <div class="sidebar-menu widget" >
                 
           <!-- Jssor Slider Begin -->
                    <div id="jssor_fashion_banner" style="position:relative;top:0px;left:0px;width:250px;height:400px;overflow:hidden;">
                        
                        <!-- Loading Screen -->
                        <div data-u="loading" class="" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <!-- your loading screen content here -->
                            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                    background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                            <div style="position: absolute; display: block; background: url(<?php echo base_url(); ?>assets/img/loader.gif) no-repeat center center;
                                top: 0px; left: 0px;width: 100%;height:100%;">
                            </div>
                        </div>
                        
                        <!-- Slides Container -->
                        <div data-u="slides" style="cursor: move; position:absolute;top:0px;left:0px;width:250px;height:400px;overflow:hidden;">
                            
                           <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad1.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad5.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad4.png"/></a>
                            </div>
                            <div>
                                <a href=""><img data-u="image" src="<?php echo base_url(); ?>assets/jollof_banners/restaurantPage_ads/ad5.png"/></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jssor Slider End -->
                <!-- Sidebar navigation -->
                
                <!-- Sidebar divider -->
              </div>
    </div>
</div>

</aside>
        
        
        
        
        
        

				<section class="col-lg-9 col-md-9 col-sm-9">
                                    
					<!--<h2 class="tt_uppercase m_bottom_20 color_dark heading1 animate_ftr">All Products</h2>-->
                                        
                                        <?php
                                            if(isset($page_loader))
                                            {
                                                if ( file_exists( APPPATH.'views/'.$page_loader.'.php' ) ) 
                                                {
                                                    $this->load->view($page_loader); // Product tray
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
				
				</section>

			</div>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/jssor.slider.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
       

        var options = { 
                $AutoPlay: 1,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1
                
                
                $ArrowKeyNavigation: 1,   			     //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $Idle: 3000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                SlideSpacing: 0,                                    //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                /*$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }*/
        };
        var jssor1_slider_rest_banner = new $JssorSlider$("jssor_fashion_banner", options);
        
        //responsive code begin
        //remove responsive code if you don't want the slider scales
        //while window resizing
        function ScaleSlider() {
            var parentWidth = $('#jssor_fashion_banner').parent().width();
            if (parentWidth) {
                jssor1_slider_rest_banner.$ScaleWidth(parentWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        //Scale slider after document ready
        ScaleSlider();
                                        
        //Scale slider while window load/resize/orientationchange.
        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>