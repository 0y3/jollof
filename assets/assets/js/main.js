(function($) {
    'use strict';
    
    
    /* jQuery MeanMenu */
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });
    
    
    /* slider active */
    $('.slider-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: 500,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    /* slider active 2 active */
    $('.slider-active-2').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['p <br> r <br> e <br> v', 'n <br> e <br> x <br> t'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    
    /* product slider active */
    $('.product-slider-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: 1000,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 4,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })
    
    
    /* product slider active 4 active */
    $('.product-slider-active-4').owlCarousel({
        loop: true,
        nav: true,
        autoplay: 1000,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 3,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    })
    
    
    /* arrivals product active */
    $('.arrivals-product-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: 1000,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 2,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
    
    /* recommended product slider active */
    $('.recommended-product-slider-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 4,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })

    /* restaurants logo slider active */
    $('.restaurant-logo-slider-active_cool').owlCarousel({
        loop: true,
        nav: true,
        autoplay: 1000,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 5,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    })
    
    
    /* testimonial active */
    $('.testimonial-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    
    /* deals slider active */
    $('.deals-slider-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 2,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            }
        }
    })
    
    
    /* brand logo active */
    $('.brand-logo-active').owlCarousel({
        loop: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 3,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    })
    
    
    /* best seller slider active */
    $('.best-seller-slider , .sidebar-blog-slider , .blog-carousel').owlCarousel({
        loop: true,
        nav: true,
        autoplay: 1000,
        autoplayTimeout: 5000,
        navText: ['<i class="ion-ios-arrow-thin-left"></i>', '<i class="ion-ios-arrow-thin-right"></i>'],
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    
    /* testimonials active */
    $('.sidebar-testimonials-active').owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 5000,
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
    /* cart */
    $(".icon-cart , .search-2-icon , .icon-setting , .language-click").on("click", function() {
        $(this).parent().find('.shopping-cart-content , .header-search-form-2 , .setting-wrapper, .language-dropdown').slideToggle('medium');
    })
    
    
    
    /*---------------------
    countdown
  --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown day">%-D <p>Days</p></span> <span class="cdown hour">%-H <p>Hour</p></span> <span class="cdown minutes">%M <p>Min</p></span class="cdown second"> <span>%S <p>Sec</p></span>'));
        });
    });
    
    /* chosen */
    $('.orderby').chosen({
        disable_search: true,
        width: "auto"
    });
    
    /*------ Wow Active ----*/
    new WOW().init();
    
    
    /*category left menu*/
    $('.category-toggle').on('click', function() {
        $('.category-menu').slideToggle(300);
    });
    
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    var CartPlusMinus = $('.cart-plus-minus');
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });
    
    /*---------------------
    price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    //var amountprice = $('#amount');
    var amountpricemin = $('#amountmin');
    var amountpricemax = $('#amountmax');
    if(!(amountpricemin.val()) && !(amountpricemax.val()))
    {
        var pricemin=0; var pricemax=80000;
    }
    else{var pricemin=amountpricemin.val(); var pricemax=amountpricemax.val();}
    //alert(pricemax+ ' --- '+pricemin);
    //var url= $('#price_form');
    $(function() {
        sliderrange.slider({
            range: true,
            min: 0,
            max: 80000,
            //values: [0, 80000],
            values: [pricemin, pricemax],
            slide: function(event, ui) {
                //amountprice.val("₦" + ui.values[0] + " - ₦" + ui.values[1]);
                amountpricemin.val( ui.values[0] );
                amountpricemax.val(ui.values[1]);
                //load_product(url,ui.values[0], ui.values[1]);
            }
        });
        //amountprice.val("₦" + sliderrange.slider("values", 0) +
        //    " - ₦" + sliderrange.slider("values", 1));
        amountpricemin.val( sliderrange.slider("values", 0));
        amountpricemax.val( sliderrange.slider("values", 1));
    });


     /*---------------------
    price slider
    --------------------- */
    var sliderrange2 = $('.slider-range2');
    //var amountprice = $('#amount');
    var amountpricemin2 = $('#amountmin2');
    var amountpricemax2 = $('#amountmax2');
    if(!(amountpricemin2.val()) && !(amountpricemax2.val()))
    {
        var pricemin2=0; var pricemax2=80000;
    }
    else{var pricemin2=amountpricemin2.val(); var pricemax2=amountpricemax2.val();}
    //alert(pricemax+ ' --- '+pricemin);
    //var url= $('#price_form');
    $(function() {
        sliderrange2.slider({
            range: true,
            min: 0,
            max: 80000,
            //values: [0, 80000],
            values: [pricemin2, pricemax2],
            slide: function(event, ui) {
                //amountprice.val("₦" + ui.values[0] + " - ₦" + ui.values[1]);
                amountpricemin2.val( ui.values[0] );
                amountpricemax2.val(ui.values[1]);
                //load_product(url,ui.values[0], ui.values[1]);
            }
        });
        //amountprice.val("₦" + sliderrange.slider("values", 0) +
        //    " - ₦" + sliderrange.slider("values", 1));
        amountpricemin2.val( sliderrange2.slider("values", 0));
        amountpricemax2.val( sliderrange2.slider("values", 1));
    });
    
    function load_product(url,minimum_range, maximum_range)
	{
		$.ajax({
			//url:"fetch.php",
                        url:url,
			method:"POST",
			data:{minimum_range:minimum_range, maximum_range:maximum_range},
			success:function(data)
			{
				$('#load_product').fadeIn('slow').html(data);
			}
		});
	}
    
    /*---------------------
    shop grid list
    --------------------- */
    $('.view-mode li a').on('click', function() {
        var $proStyle = $(this).data('view');
        $('.view-mode li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.product-view').removeClass('product-grid product-list').addClass($proStyle);
    })
    
    
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();
    
    
    
    /* counterUp */
    $('.count').counterUp({
        delay: 10,
        time: 1000
    });
    
    /* magnificPopup video popup */
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });
    
    
    /*----- 
    	Cart Plus Minus
    --------------------------------*/
    CartPlusMinus.append('<span class="inc qtybtn"><i class="ion-ios-arrow-up"></i></span>');
    CartPlusMinus.append('<span class="dec qtybtn"><i class="ion-ios-arrow-down"></i></span>');
    $('.qtybtn').on('click', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    
    
    /*--------------------------
     ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="ion-arrow-up-c"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });



})(jQuery);