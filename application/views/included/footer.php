
    <!-- end main container div-->
    </div>

<!--footer start-->
			
<footer id="footer" class="type_2">

    <div class="footer_top_part">

        <div class="container t_align_c m_bottom_20">
	
            <!--social icons-->
            <!--
            <ul class="clearfix d_inline_b horizontal_list social_icons">
	
                <li class="facebook m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Facebook</span>
		
                    <a href="#" class="r_corners t_align_c tr_delay_hover f_size_ex_large">
		
                        <i class="fa fa-facebook"></i>
			
                    </a>
		
                </li>
		
                <li class="twitter m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Twitter</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-twitter"></i>
		
                    </a>
		
                </li>
			
                <li class="google_plus m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Google Plus</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-google-plus"></i>
			
                    </a>
		
                </li>
		
                <li class="rss m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Rss</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-rss"></i>
			
                    </a>
		
                </li>
		
                <li class="pinterest m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Pinterest</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-pinterest"></i>
			
                    </a>
		
                </li>
		
                <li class="instagram m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Instagram</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-instagram"></i>
			
                    </a>
		
                </li>
		
                <li class="linkedin m_left_5 m_bottom_5 m_sm_left_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">LinkedIn</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-linkedin"></i>
			
                    </a>
		
                </li>
		
                <li class="vimeo m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Vimeo</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-vimeo-square"></i>
			
                    </a>
		
                </li>
		
                <li class="youtube m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Youtube</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-youtube-play"></i>
			
                    </a>
		
                </li>
		
                <li class="flickr m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Flickr</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-flickr"></i>
			
                    </a>
		
                </li>
		
                <li class="envelope m_left_5 m_bottom_5 relative">
		
                    <span class="tooltip tr_all_hover r_corners color_dark f_size_small">Contact Us</span>
		
                    <a href="#" class="r_corners f_size_ex_large t_align_c tr_delay_hover">
		
                        <i class="fa fa-envelope-o"></i>
			
                    </a>
		
                </li>
		
            </ul>
            -->
        </div>
	
        <hr class="divider_type_4 m_bottom_50">
	
        <div class="container">
	
            <div class="row clearfix">
	
                <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">
		
                    <h3 class="color_light_2 m_bottom_20">About</h3>
		
                    <p class="m_bottom_15">Tired and want it so fast?</p>
		
                    <p> Just go straight to the menus of the restaurants below for a quick order of your breakfast, lunch or dinner. Do not forget to leave reviews to help us serve you better. </p>
		
                </div>
		
                <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
		
                    <h3 class="color_light_2 m_bottom_20">Quick Links</h3>
		
                    <ul class="vertical_list">
		
                        <li><a class="color_light tr_delay_hover" href="<?= site_url("promo/promo_form")?>">Advertise on Jollof.com</a></li>
			
                        <!--<li><a class="color_light tr_delay_hover" href="<?= site_url('restaurants')?>">Restaurants<i class="fa fa-angle-right"></i></a></li>
			
                        <li><a class="color_light tr_delay_hover" href="#">My profile<i class="fa fa-angle-right"></i></a></li>-->
			
                        <li>
                            
                            <?php
                                        
                                        if(!isset($_SESSION['logged_in']) || $_SESSION['Type'] != 'User')
                                        {   
                                            $login_txt_html= 
                                                    '<span class="log" data-log="0"></span>' .
                                                        '<a  href="'.base_url().'accounts/login" class="color_light tr_delay_hover" >'.
                                                        'Login or Signup<i class="fa fa-angle-right"></i></a>'.
                                                    '</a> ';
                                            echo $login_txt_html;
                                        }
                                        else 
                                        {
                                            
                                            $ses_username = $_SESSION['first_name'];
                                            
                                            $user_info = $this->Profile_model->profile($_SESSION['User_id']);
                                           
                                            $login_txt_html= 
                                                    '<span class="log" data-log="1"></span>'
                                                    . '
                                                    <div class="pull-left" style="margin-right:30px;">
                                                        Welcome '.$ses_username.'
                                                    </div>';
                                            echo $login_txt_html;
                                        }
                                    ?>
                        
                        </li>
                        
                        
                        <!--<li><a target="_blank"  class="color_light tr_delay_hover" href="<?= site_url('restaurant-admin')?>">Restaurant admin login <i class="fa fa-angle-rightt"></i></a></li>-->
                        <li><a target="_blank"  class="color_light tr_delay_hover" href="<?= site_url('cuisineadmin')?>">Restaurant Admin login <i class="fa fa-angle-rightt"></i></a></li>
                        <li><a target="_blank"  class="color_light tr_delay_hover" href="<?= site_url('fashionadmin')?>">Fashion Admin login <i class="fa fa-angle-rightt"></i></a></li>
                        <li><a target="_blank"  class="color_light tr_delay_hover" href="<?= site_url('merchant/signup')?>">Add Your Business<i class="fa fa-angle-right"></i></a></li>
                    </ul>
		
                </div>
		
                <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
		
                    <h3 class="color_light_2 m_bottom_20">Information</h3>
		
                    <ul class="vertical_list">
		
                        
                        <!--<li><a class="color_light tr_delay_hover" href="#"> Order Tracking<i class="fa fa-angle-right"></i></a></li>-->
			
                        <!--<li><a class="color_light tr_delay_hover" href="#">Delivery<i class="fa fa-angle-right"></i></a></li>-->
			<?php $site= site_url();?>
                        <li><a class="color_light tr_delay_hover faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Jollof_Privacy_Policy.docx&embedded=true">Privacy policy<i class="fa fa-angle-right"></i></a></li>
			
                        <li><a class="color_light tr_delay_hover faqpopup_fancy fancybox.iframe" href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/Terms_and_Condition_for_Jollof.docx&embedded=true">Terms &amp; condition<i class="fa fa-angle-right"></i></a></li>
                        
                        <!--<li><a class="color_light tr_delay_hover faqpopup_fancy fancybox.iframe" href="#">Countact us<i class="fa fa-angle-right"></i></a></li>-->
                        
                        <li><a class="color_light tr_delay_hover faqpopup_fancy fancybox.iframe"  href="https://docs.google.com/gview?url=<?= site_url()?>assets/doc/FAQ.docx&embedded=true">FAQ<i class="fa fa-angle-right"></i></a></li>
                        
                        <!--<li><a class="color_light tr_delay_hover" href="<?= site_url("promo/promo_form")?>">Advertise on Jollof<i class="fa fa-angle-right"></i></a></li>-->
		
			
                    </ul>
		
                </div>
		
                <div class="col-lg-2 col-md-2 col-sm-2 m_xs_bottom_30">
		
                    <h3 class="color_light_2 m_bottom_20">Jollof</h3>
		
                    <ul class="vertical_list">
		
                        <li><a class="color_light tr_delay_hover" href="<?= site_url()?>">MainPage<i class="fa fa-angle-right"></i></a></li>
		
                        <li><a class="color_light tr_delay_hover" href="<?= site_url('cuisine')?>">Cuisine<i class="fa fa-angle-right"></i></a></li>
		
                        <li><a class="color_light tr_delay_hover" href="<?= site_url('fashion')?>">Fashion<i class="fa fa-angle-right"></i></a></li>
			
                        <li><a class="color_light tr_delay_hover" href="<?= site_url('Lifestyle')?>">Life style<i class="fa fa-angle-right"></i></a></li>
			
                        <li><a class="color_light tr_delay_hover" href="<?= site_url('scholar')?>">Scholar<i class="fa fa-angle-right"></i></a></li>
			
                        <li><a class="color_light tr_delay_hover" href="<?= site_url('biz')?>">Biz<i class="fa fa-angle-right"></i></a></li>
			
                    
                    </ul>
		
                </div>
		
                <div class="col-lg-3 col-md-3 col-sm-3">
		
                    <h3 class="color_light_2 m_bottom_20">Newsletter</h3>
		
                    <p class="f_size_medium m_bottom_15">Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
		
                    <form id="newsletter">
		
                        <input type="email" placeholder="Your email address" class="m_bottom_20 r_corners f_size_medium full_width" name="newsletter-email">
			
                        <button type="submit" class="button_type_8 r_corners bg_scheme_color color_light tr_all_hover">Subscribe</button>
			
                    
                    </form>
		
                </div>
		
            </div>
	
        </div>
	
    </div>

    <!--copyright part-->

    <div class="footer_bottom_part">

        
        <div class="container clearfix t_mxs_align_c">
	
            <p class="f_left f_mxs_none m_mxs_bottom_10">&copy; 2018 <span class="color_light"><a href="#">JOLLOF.COM</a></span>. All Rights Reserved.   Designed by   <span class="color_light"><a href="#">STAKLE</a></span> </p>
	
            <ul class="f_right horizontal_list clearfix f_mxs_none d_mxs_inline_b">
	
                <li><img src="<?= base_url() ?>assets/img/payment_img_1.png" alt=""></li>
		
                <li class="m_left_5"><img src="<?= base_url() ?>assets/img/payment_img_2.png" alt=""></li>
		
                <li class="m_left_5"><img src="<?= base_url() ?>assets/img/payment_img_3.png" alt=""></li>
		
                <li class="m_left_5"><img src="<?= base_url() ?>assets/img/payment_img_4.png" alt=""></li>
		
                <li class="m_left_5"><img src="<?= base_url() ?>assets/img/payment_img_5.png" alt=""></li>
		
            </ul>
	
        </div>
	
    </div>
    <!--end copyright part-->

</footer>
<!-- end #footer -->

<!--social widgets--> 
    <div>

        <!--social widgets-->

        <ul class="social_widgets d_xs_noneeeee">
            
            <!--whatsapp feed-->

            <li class="relative">

                <button class="sw_button t_align_c contact"><i class="fa fa-whatsapp"></i></button>

                <div class="sw_content">

                    <h3 class="color_dark m_bottom_20">Chat us via Whatsapp</h3>
                    <?php
                        if(!empty($info->whatsapp))
                          {
                            $link="https://api.whatsapp.com/send?phone=".$info->whatsapp;
                          }
                        else{$link="";}
                    ?>
                    <a href="<?=$link?>" target="_blank" role="button" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2" href="">Whatsapp Chat</a>

                </div>	

            </li>

            <!--facebook-->

            <li class="relative">

                <button class="sw_button t_align_c facebook"><i class="fa fa-facebook"></i></button>


                <div class="sw_content">

                    <a href="<?= $info->facebookpage ?>" target="_blank"> 
                        <h3 class=" btn color_dark m_bottom_20">Join Us on Facebook</h3>
                    </a>
                    <!--<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=235&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=438889712801266" style="border:none; overflow:hidden; width:235px; height:258px;"></iframe>-->
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FJOLLOFcom-946309562118505&tabs=timeliine&width=280&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1980361182290100" width="280" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

                </div>

            </li>

            <!--twitter feed-->

            <li class="relative">

                <button class="sw_button t_align_c twitter"><i class="fa fa-twitter"></i></button>

                <div class="sw_content">

                    <h3 class="color_dark m_bottom_20">Latest Tweets</h3>

                    <div class="twitterfeed m_bottom_25">

                    </div>

                    <a href="<?= $info->twitterpage ?>" target="_blank" role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color" href="">Follow on Twitter</a>

                </div>	

            </li>

            <!--instagram feed-->

            <li class="relative">

                <button class="sw_button t_align_c instagram" style="background:#e95950;"><i class="fa fa-instagram"></i></button>

                <div class="sw_content">

                    <h3 class="color_dark m_bottom_20"> Instagram</h3>

                    <div class="twitterfeed m_bottom_25">

                    </div>

                    <a href="<?= $info->insterpage ?>" target="_blank" role="button" class="button_type_4 d_inline_b r_corners tr_all_hover color_light tw_color">Follow on Instagram</a>

                </div>  

            </li>
            
           

            <!--contact form-->

            <li class="relative">

                <button class="sw_button t_align_c contact"><i class="fa fa-envelope-o"></i></button>

                <div class="sw_content">

                    <h3 class="color_dark m_bottom_20">Contact Us</h3>

                    <p class="f_size_medium m_bottom_15">Suggestions and Feedbacks</p>

                    <form id="contactform" class="mini">

                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="text" name="cf_name" placeholder="Your name">

                        <input class="f_size_medium m_bottom_10 r_corners full_width" type="email" name="cf_email" placeholder="Email">

                        <textarea class="f_size_medium r_corners full_width m_bottom_20" placeholder="Message" name="cf_message"></textarea>

                        <button type="submit" class="button_type_4 r_corners mw_0 tr_all_hover color_dark bg_light_color_2">Send</button>

                    </form>

                </div>	

            </li>

            <!--contact info-->
            <!--
            <li class="relative">

                <button class="sw_button t_align_c googlemap"><i class="fa fa-map-marker"></i></button>

                <div class="sw_content">

                    <h3 class="color_dark m_bottom_20">Head Office</h3>

                    <ul class="c_info_list">

                        <li class="m_bottom_10">

                            <div class="clearfix m_bottom_15">

                                <i class="fa fa-map-marker f_left color_dark"></i>

                                <p class="contact_e">80b Lafiaji street,<br> Dophine estate Ikoyi.</p>

                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.249180786087!2d3.4124078579589434!3d6.458363864021134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b3668c0aa9f%3A0xfc4fd46f48cbbb90!2s80b+Lafiaji+Way%2C+Dolphine+Estate101222%2C+Lagos!5e0!3m2!1sen!2sng!4v1506336733270" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </li>




                    </ul>

                </div>	

            </li>
            -->

        </ul>

    </div>
<!--end social widgets-->

    <div id="faqpopup">

        ...popup content...

        <!-- Add an optional button to close the popup -->
        <button class="my_popup_close">Close</button>

    </div>

    <button class="t_align_c r_corners tr_all_hover type_2 animate_ftl" id="go_to_top"><i class="fa fa-angle-up"></i></button>

  </body>
  
  
  <script src="<?= base_url() ?>assets/js/jquery.popupoverlay.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/jquery.fancybox.min.css">
  <script src="<?=base_url(); ?>assets/js/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {

        $('#faqpopup').popup({
          color: 'white',
          opacity: 1,
          transition: '0.3s',
          scrolllock: true
        });

    });
    
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

  <style>
    #standalone {
        -webkit-transform: scale(0.8);
           -moz-transform: scale(0.8);
            -ms-transform: scale(0.8);
                transform: scale(0.8);
    }
    .popup_visible #standalone {
        -webkit-transform: scale(1);
           -moz-transform: scale(1);
            -ms-transform: scale(1);
                transform: scale(1);
    }
  </style>

   <script>
    new jBox('Tooltip', {
        attach: '.tooltip'
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



    //$('.sw_button').on('click',function(){
    /*$(document).on("click",".sw_button", function(e){
        $(this).parent().toggleClass('opened').siblings().removeClass('opened');
    });
    */
</script>
    <script src="<?= base_url() ?>assets/js/elevatezoom.min.js"></script>
    <script src="<?= base_url() ?>assets/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.isotope.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.tweet.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.custom-scrollbar.js"></script>
    <script src="<?= base_url() ?>assets/js/ebs_dav_scripts.js"></script>
<!--    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5306f8f674bfda4c"></script>-->

<!-- //smooth scrolling -->
<script src="<?= base_url() ?>assets/js/numscroller-1.0.js"></script>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/02a1c3f6ebe4441464ed7b641/13df77e23d93b1b3333168d97.js");</script>

</html>
