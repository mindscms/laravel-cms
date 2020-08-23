/*********************************************************************************

    Template Name: Boighor Bookshop Responsive Bootstrap4 Template 
    Version: 1.0

**********************************************************************************/


/*================================================
            [ INDEX ]
===================================================

    Scroll Up Activation
    Mobile Menu
    Wow Active
    Sticky Header
    Banner Slider Active
    Testimonial Slick Carousel
    Testimonial Slick Carousel As Nav
    Product Activation
    Brand Activation
    Blog Activation
    Module Activation
    Cartbox Toggler
    Search Toggler
    Cart Toggler
    Setting Toggler
    Slider Activation
    Slider Text Activation
    Setting Option
    Fancybox
    Video
    Gallery Mesonry Activation
    CheckOut Page
    Price Slider Active
    Dropdown


=================================================================================
            [ END INDEX ]
================================================================================*/

(function($) {
    'use strict';

    

/*============ Scroll Up Activation ============*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'slide'
    });

/*=========== Mobile Menu ===========*/
    $('nav.mobilemenu__nav').meanmenu({
        meanMenuClose: 'X',
        meanMenuCloseSize: '18px',
        meanScreenWidth: '991',
        meanExpandableChildren: true,
        meanMenuContainer: '.mobile-menu',
        onePage: true
    });

/*=========== Wow Active ===========*/
    new WOW().init();

/*=========== Sticky Header ===========*/
    function stickyHeader() {
        $(window).on('scroll', function () {
            var sticky_menu = $('.sticky__header');
            var pos = sticky_menu.position();
            if (sticky_menu.length) {
                var windowpos = sticky_menu.top;
                $(window).on('scroll', function () {
                  var windowpos = $(window).scrollTop();
                  if (windowpos > pos.top + 250) {
                    sticky_menu.addClass('is-sticky');
                  } else {
                    sticky_menu.removeClass('is-sticky');
                  }
            });
          }
        });
    }
    stickyHeader();

/*===========  Testimonial Slick Carousel =============*/
    $('.testext_active').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        draggable: false,
        prevArrow: '<button type="button" class="wen-slick-prev"><i class="zmdi zmdi-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="wen-slick-next"><i class="zmdi zmdi-chevron-right"></i></button>',
        fade: true,
        dots: false,
        asNavFor: '.thumb_active'
    });


/*============= Testimonial Slick Carousel As Nav =============*/
    $('.thumb_active').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.testext_active',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '10px',
        responsive: [
            {
              breakpoint: 576,
              settings: {
                dots: false,
                slidesToShow: 1,  
                centerPadding: '0px',
                }
            },
            {
              breakpoint: 769,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 2,
                centerMode: false,
                }
            },
            {
              breakpoint: 420,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 1,
                centerMode: false,
                }
            }
        ]
    });


/*=============  Brand Activation  ==============*/
    $('.brand__activation').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:6,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
            0:{
              items:2
            },
            1920:{
              items:6
            },
            768:{
              items:4
            },
            576:{
              items:3
            },
            420:{
              items:3
            }
        }
    });

/*=============  Produst Activation  ==========*/
    $('.productcategory__slide').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:4,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
            0:{
                items:1
            },
            992:{
                items:4
            },
            768:{
                items:3
            },
            576:{
                items:2
            },
            1920:{
                items:4
            }
        }
    });


/*=============  Produst Activation  ==========*/
    $('.productcategory__slide--2').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:3,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
            0:{
              items:1
            },
            576:{
              items:2
            },
            768:{
              items:3
            },
            1920:{
              items:3
            }
        }
    });


/*=============  Product Activation ============*/
    $('.product__indicator--4').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:4,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
            0:{
              items:1
            },
            576:{
              items:2
            },
            768:{
              items:3
            },
			992:{
                items:4
            },
            1920:{
              items:4
            }
        }
    });
  

/*=============  Product Activation  ==============*/
    $('.furniture--4').owlCarousel({
        loop:true,
        margin: 0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:4,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
            0:{
              items:1
            },
            576:{
              items:2
            },
            768:{
              items:3
            },
			992:{
                items:4
            },
            1920:{
              items:4
            }
        }
    });


/*============= Cartbox Toggler ==============*/
    function cartboxToggler() {
        var trigger = $('.block__active'),
          container = $('.block_content');
        trigger.on('click', function (e) {
          e.preventDefault();
          container.toggleClass('is-visible');
        });
        $('.close__wrap').on('click', function () {
          container.removeClass('is-visible');
        });
    }
    cartboxToggler();


/*============= Search Toggler ==============*/
    function searchToggler() {
        var trigger = $('.search__active'),
          container = $('.search_active');
        trigger.on('click', function (e) {
          e.preventDefault();
          container.toggleClass('is-visible');
        });
        $('.close__wrap').on('click', function () {
          container.removeClass('is-visible');
        });
    }
    searchToggler();


/*============= Cart Toggler ==============*/
    function cartToggler() {
        var trigger = $('.cartbox_active'),
          container = $('.minicart__active');
        trigger.on('click', function (e) {
          e.preventDefault();
          container.toggleClass('is-visible');

        });
        trigger.on('click', function (e) {
          e.preventDefault();
          container.toggleClass('');

        });
        $('.micart__close').on('click', function () {
          container.removeClass('is-visible');
        });
    }
    cartToggler();

/*============= Setting Toggler ==============*/
    function settingToggler() {
        var settingTrigger = $('.setting__active'),
          settingContainer = $('.setting__block');
        settingTrigger.on('click', function (e) {
          e.preventDefault();
          settingContainer.toggleClass('is-visible');
        });
        settingTrigger.on('click', function (e) {
          e.preventDefault();
          settingContainer.toggleClass('');
        });
    }
    settingToggler();


/*=============  Slider Activation  ==============*/
    $('.slide__activation').owlCarousel({
        loop:true,
        margin: 0,
        nav:true,
        autoplay: false,
        autoplayTimeout: 10000,
        items:1,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>' ],
        dots: false,
        lazyLoad: true,
        responsive:{
        0:{
          items:1
        },
        1920:{
          items:1
        }
        }
    });


/*============= Setting Option ==============*/
    function settingOption() {
        var settingItem = $('.currency-trigger');
        settingItem.on('click', function () {
          $(this).siblings('.switcher-dropdown').toggleClass('is-visible');
        });
    }
    settingOption();

/*============= Fancybox ==============*/
    $('.fancybox').fancybox({
        prevEffect  : 'none',
        nextEffect  : 'none',
        helpers : {
          title : {
            type: 'outside'
          },
          thumbs  : {
            width : 50,
            height  : 50
          }
        }
    });


/*========= Video ===========*/
    var video_frame_w= $('.img_static').outerWidth();
    var video_frame_h= $('.img_static').outerHeight();
    $('#cms_play').on('click', function(){
        $(this).hide('fast');
        $(".img_static").fadeOut('fast');
        $('.static_video').append('<iframe class="added_video" width="'+video_frame_w+'px" height="'+video_frame_h+'px" src="https://www.youtube.com/embed/0fYMLQjK-MI?rel=0&autoplay=1" frameborder="0"></iframe>');
    });

/*=============  Gallery Mesonry Activation  ==============*/
    $('.gallery__masonry__activation').imagesLoaded(function () {
        // filter items on button click
        $('.gallery__menu').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
              filter: filterValue
            });
        });
        // change is-checked class on buttons
        $('.gallery__menu button').on('click', function () {
            $('.gallery__menu button').removeClass('is-checked');
            $(this).addClass('is-checked');
            var selector = $(this).attr('data-filter');
            $containerpage.isotope({
              filter: selector
            });
            return false;
        });
        // init Isotope
        var $grid = $('.masonry__wrap').isotope({
            itemSelector: '.gallery__item',
            percentPosition: true,
            transitionDuration: '0.7s',
            masonry: {
              // use outer width of grid-sizer for columnWidth
              columnWidth: '.gallery__item',
            }
        });
    });


/*====== CheckOut Page ======*/
    function checkoutLogin(){
        var showLogin = $('.showlogin');
        var form = $('.checkout_login');
        showLogin.on('click' , function(e){
            e.preventDefault();
            form.slideToggle();
            form.remove('style');
        });
    }
    checkoutLogin();
    function checkoutCoupon(){
        var showLogin = $('.showcoupon');
        var form = $('.checkout_coupon');
        showLogin.on('click' , function(e){
            e.preventDefault();
            form.slideToggle();
            form.remove('style');
        });
    }
    checkoutCoupon();
    $('.wn__accountbox').on('click' , function(){
        $('.account__field').slideToggle().remove('style');
    });
    $('.differt__address').on('click' , function(){
        $('.differt__form').slideToggle().remove('style');
    });


/*====== Price Slider Active ======*/ 
    $('#slider-range').slider({
        range: true,
        min: 10,
        max: 500,
        values: [110, 400],
        slide: function(event, ui) {
            $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1]);
        }
    });
    $('#amount').val('$' + $('#slider-range').slider('values', 0) +
        " - $" + $('#slider-range').slider('values', 1));


/*====== Dropdown ======*/
    $('.dropdown').parent('.drop').css('position' , 'relative');

	
/*====== slick slider ======*/
	$('.center').slick({
	  centerMode: true,
	  centerPadding: '0px',
	  slidesToShow: 7,
	  responsive: [
		 {
		  breakpoint: 1366,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: false
		  }
		},
		{
		  breakpoint: 1100,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: false
		  }
		},
		{
			breakpoint: 970,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: false
			  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			slidesToShow: 1
		  }
		}
	  ]
	});


})(jQuery);

