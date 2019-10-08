<style type="">

</style>

<link href="<?= base_url() ?>assets/css/mainpage_style.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/jquery.timepicker.min.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="<?= base_url() ?>assets/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.datepair.min.js"></script>



<?php foreach ($get_all_resta as $resta) :?>

<div id="home" class=" res_mem_wrapper">
    
    <div class="res_trans"></div>
         <!--left content column-->
            
        <div class="res_contdiv">
           
            <div class="res_contdiv_a ">
                
                <div class="res_mem_logo">
                    
                    <img class="logo_img " src="<?= base_url() ?>assets/uploads/rest_logo/<?= $resta['logo']; ?>" alt="">
                </div>
                
                <div class="res_mem_logo_cont">
                    
                    <h1 title="<?= $resta['companyname'] ?>"> <?= $resta['companyname'] ?> </h1>
                    
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
                    
                    <p><i class="fa fa-cutlery" aria-hidden="true"></i> <?= $resta['companydesc'] ?></p>
                    <p class=" "><i class="fa fa-map-marker"></i> <?= $resta['address'] ?>, <?=  $resta['city'][0]["cityname"]; ?>, <?=  $resta['state'][0]->statename; ?>,</p>
                    <p><i class="fa fa-truck" aria-hidden="true"></i> <span>Delivery Options :</span><span> Pickup, Delivery</span></p>
                    <p><i class="fa fa-money" aria-hidden="true"></i> <span>Minimum Order:</span> <span> ₦1,000</span></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Estimated time: 60 min</p>
                    
                    <div class="res_mem_op">
                        <spam class="label label-success boxset res_set">0pen</spam>
                    </div>
                    
                </div>
                
                <div class="clearfix"></div>
                
            </div>
            
        </div>
         
</div>
<?php endforeach; ?>

<div class="container top20 botton20" >
    
    <div class="row ">
         <!--left content column-->
            
         <div class="col-sm-2 res_nav" style=" padding-left: 5px; padding-right: 5px;"> <!-- nav -->
            
           <div id="nav-anchor"></div>
           <nav class="nav_r">
                <ul>
                    <li><a href="#home">Restaurant info</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#book_table">Book a Table</a></li>
                    <li><a href="#open_hr">Opening Hours</a></li>
                    <li><a href="#review">Reviews</a></li>
                </ul>
            </nav>
        </div><!-- /nav -->
         
        <div class="col-sm-7 cont_section"><!-- content -->
            
            <div class="res-search-input">
                 
                <div class="input-group col-md-12 ">
                    <input type="text" class="  search-query form-control" placeholder="Search menu" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger " type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                 </div>
                
            </div>
            
            <section class="col-md-12" id="menu" style="">
                
                
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Menu
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <?php if(!empty($resta_menu)): ?>
                
                <?php foreach ($resta_menu as $menu) :?>
                <div class="list_con">
                    
                    <h3 id="<?= $menu['id']; ?>"> <?= $menu['categoryname']; ?></h3>
                    <ul>
                    
                    <?php if(!empty($menu['products_cate'])): ?>
                    <?php foreach ($menu['products_cate'] as $products) :?>
                    <!-- product under each category -->
                    
                    <a class="ajaxbook_form fancybox.ajax" href="<?= base_url(); ?>restaurants/order_form/<?= $products['id'] ?>">
                        
                        <input type="hidden" name="restaurantid" value="<?= $restaurantid ?>">
                        <input type="hidden" name="productid" value="<?= $products['id'] ?>">
                        <input type="hidden" name="" value="">
                        
                        <li class="list" data-id="<?= $products['id'] ?>" data-name="<?= $products['productname'] ?>">
                        <!-- Profile Section -->
                        <div class="list__item">
                            
                            <div class="list__photos">
                                <?php
                                    
                                    if(!empty($products['productimage']))
                                        {
                                            $products_img= $products['productimage'];
                                        }
                                    else 
                                        {
                                            $products_img= 'no_food_img.jpg';
                                        }
                                ?>
                                <img src="<?= base_url() ?>assets/uploads/rest_prod/<?= $products_img ?>"> 
                            </div>
                            
                            <div class="list__label">
                                
                              <div class="list__label--header"> <?= $products['productname'] ?> </div>
                              <div class="list__label--value"> <?= $products['productdesc'] ?>  </div>
                              
                            </div>
                            
                            <div class="list__price">
                            
                                ₦<?= $products['productprice'] ?>
                        
                            </div>
                            
                        </div>
                        
                      </li>
                      
                    </a>
                    <!--end of product under each category -->
                    
                    <?php endforeach; ?>
                     
                    <?php else: ?>
                
                        <div class="alert alert-warning alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Oh snap!</strong>
                            Sorry No product for this Category Now.
                        </div>

                    <?php endif; ?>


                    </ul>

                </div>
                <?php endforeach; ?>
                <?php else: ?>
                
        
                    <div class="col-sm-9 alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Oh snap!</strong>
                        Sorry No product for now.
                    </div>
                    
                <?php endif; ?>

                
            </section>
            <section id="book_table" class="col-md-12" >
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Table Reservation
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <div class="list_con">
                    
                    <form class="table_book_form" action="" method="">
                        <h4>Booking Information</h4>
                        <br/>

                        <div class="form-group table_book">                    
                            <input  type="text" value="" class="cu_phone_js" placeholder="Number of Guests" required="required">
                        </div>
                        <div class="row">
                                <div class="col-sm-5 ">
                                    <div id="" class="form-group table_book">
                                        <label class="control-label" for="date_booking" style="padding-left:10px;">Date of Booking</label>
                                        <input class="form-control " type="text" name="date_booking" id="datetest" value=""  required="">
                                        <span class="text-danger" id="datepicker_info"> </span>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-sm-1"></div>
                                
                                <!-- Time input-->
                                <div class="col-sm-4 ">
                                    <div class="form-group table_book">
                                        <label class="control-label" for="time_booking" >Time</label>
                                        <input type="text" name="time_booking" id="timepicker" class=" form-control" required="">
                                        <span class="text-danger" id="timepicker_info"></span>
                                    </div>
                                </div>
                                
                                
                        </div>
                        
                        <br/>
                        <h4>Contact Information</h4>

                        <div class="form-group table_book">                    
                            <input  type="text" value="" class="form-control" placeholder="Name" required="required">
                        </div>
                        
                        <div class="form-group table_book">                    
                            <input class="form-control" type="email" name="email" id="email" placeholder="Your Email" required="required">
                        </div>
                        
                        <div class="form-group table_book">                    
                            <input  type="text"  value="" class="cu_phone_js" placeholder="Phone Number" required="required">
                        </div>
                        
                        <div class="form-group table_boo">
                            Your Instructions....
                            <textarea rows="3" class="form-control" placeholder="Your Instructions...."> </textarea>
                        </div>

                        <button type="submit" class="signbuttons btn btn-primary">Book a Table</button>


                    </form>
                     
                </div>
                    
                   
                
            </section>
            <section id="open_hr" class="col-md-12" >
                 
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Contact & Hours
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                <div class="list_con">
                    
                    <div class=" table_book_form">
                        
                        <?php foreach ($get_all_resta as $resta) :?>
                            <div class=" res_cont_info">
                                <p>
                                    <label class="res_cont_info_lable"> Phone : </label> 
                                    <span><?= $resta['phone'] ?></span> <span style=" padding-left: 10px;"><?= $resta['phone2'] ?></span> 
                                </p>
                                <p>
                                    <label class="res_cont_info_lable"> Email : </label> 
                                    <span><?= $resta['email'] ?></span>
                                </p>
                            </div>
                        <?php endforeach; ?>

                            <!-- Time input-->
                            <div class="res_time_info">
                                <h6><b>Delivery Hours</b></h6>
                                
                                <?php foreach ($get_resta_time as $resta_time) :?>
                                <p>
                                    <label class="res_time_info_n"> Mon : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->monopen)) ?> </span> 
                                    -
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->monclose)) ?></span> 
                                </p>
                                <p>
                                    <label class="res_time_info_n"> Tue : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->tueopen)) ?> </span> 
                                    - 
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->tueclose)) ?></span> 
                                </p>
                                
                                <p>
                                    <label class="res_time_info_n"> Wed : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->wedopen)) ?> </span>
                                    - 
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->wedclose)) ?></span> 
                                </p>
                                
                                <p>
                                    <label class="res_time_info_n"> Thu : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->thuopen ))?> </span>
                                    - 
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->thuclose)) ?></span> 
                                </p>
                                
                                <p>
                                    <label class="res_time_info_n"> Fri : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->friopen)) ?> </span>
                                    - 
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->friclose ))?></span> 
                                </p>
                                
                                <p>
                                    <label class="res_time_info_n"> Sat : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->satopen) ) ?> </span>
                                    - 
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->satclose)) ?></span> 
                                </p>
                                
                                <p>
                                    <label class="res_time_info_n"> Sun : </label> 
                                    <span class="res_time_info_o"><?= date('g:i A', strtotime($resta_time->sunopen)) ?> </span> 
                                    -
                                    <span class="res_time_info_c"><?= date('g:i A', strtotime($resta_time->sunclose) ) ?></span> 
                                </p>
                                <?php endforeach;?>
                                
                            </div>
                    </div>
                    
                </div>
                
            </section>
            
            <section id="review" class="col-md-12" >
                
                <div class="section-label"> 
                        
                    <a class="section-label-a"> 
                        <span class=""> 
                            Customers Reviews
                        </span> 
                        <b></b> 
                    </a> 
                </div>
                
                <div class="list_con">
                    
                    
                </div>
                
            </section>
            
        </div><!-- /content -->
         
        <div class="col-sm-3 ">
          <!-- <div id="Notice-6" class="target-notice">Click me</div>-->
        </div>
         
    </div>
    
</div>

<script>
    $('#Notice-6').click(function() {
  
        new jBox('Notice', {
          //animation: 'flip',
          animation: {
            open: 'tada',
            close: 'zoomIn'
          },
          position: {
            x: 10,
            y: 500
          },
          attributes: {
            x: 'right',
            y: 'bottom'
          },
          color: 'green',
          autoClose: Math.random() * 8000 + 2000,
          //title: 'Tadaaa! I\'m single',
          content: 'Success! Product Added To Cart',
          delayOnHover: true,
          showCountdown: true,
          closeButton: true
        });
  
    });
    
    
  
</script>
<script src='<?= base_url() ?>assets/js/jquery.scrollto.js'></script>
<script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.mousewheel.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.fancybox.js"></scrip>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.fancybox-buttons.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.fancybox-media.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.fancybox-thumbs.js"></script>

<script>

    $(document).ready(function(){

    /** 
     * This part does the "fixed navigation after scroll" functionality
     * We use the jQuery function scroll() to recalculate our variables as the 
     * page is scrolled/
     */
    $(window).scroll(function(){
        var window_top = $(window).scrollTop() + 60; // the "60" should equal the margin-top value for nav.stick
        var div_top = $('#nav-anchor').offset().top;
        
            if (window_top > div_top) {
                $('.nav_r').addClass('stick');
            } else {
                $('.nav_r').removeClass('stick');
            }
    });

    /**
     * This part causes smooth scrolling using scrollto.js
     * We target all a tags inside the nav, and apply the scrollto.js to it.
     */
    $(".nav_r a").click(function(evn){
        evn.preventDefault();
        $('html,body').scrollTo(this.hash, this.hash); 
    });

    /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and 
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $(".nav_r li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("nav-active");
            } else {
                $("a[href='" + theID + "']").removeClass("nav-active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$(".nav_r li:last-child a").hasClass("nav-active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("nav-active");
                $(".nav_r li:last-child a").addClass("nav-active");
            }
        }
    });
});

// for number only input
$(".cu_phone_js").on("keypress keyup blur",function (event) { 
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        
    });
   

// jquery.timepicker//   
$('#timepicker').timepicker();

    $('#timepicker').on('changeTime', function() {
    
        $('#timepicker_info').text($(this).val());
        
    });
 
  $('#datetest').datepicker({
        'format': 'yyyy-m-d',
        'autoclose': true
    });
    
    $('#datetest').on('changeDate', function() {
    
        $('#datepicker_info').text($(this).val());
        
    });

    // initialize datepair

    $("#tip5").fancybox({
	'scrolling'		: 'no',
	'titleShow'		: false,
	'onClosed'		: function() {
	    $("#login_error").hide();
	}
});


// pupup on add product to cart
$(".ajaxbook_form").fancybox({
        maxWidth	: 480,
        maxHeight	: 480,
        autoHeight      : true,
        fitToView	: false,
        width		: '70%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
});
 
</script>