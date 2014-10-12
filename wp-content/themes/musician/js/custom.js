jQuery(function($){

	"use strict";
	/*---------------------------------------------------------------------------------*/
	/*	Audio header
	/*---------------------------------------------------------------------------------*/

	
	
	/*---------------------------------------------------------------------------------*/
	/*  Global Values
	/*---------------------------------------------------------------------------------*/
	var animation_on_mobile_switch = "on";
	var $window = $(window),
		$body = $('body'),
		viewport_width = $window.width(),
		viewport_height = $window.height(),
		$header = $('.main-header'),
		$logo = $('.logo'),
		$footer = $('.main-footer'),
        is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
	    is_homepage = $('body').hasClass('ss-home'),
	    lightbox_gallery_mode = "1",
	    lightbox_close_button = "1",
	    lightbox_close_button_position = "true",
	    lightbox_align = "false",
	    mobile_menu_anim_speed = 600,
        $preloader = $('.theme-preloader'),
        sticky_header_switch = 1,
        location_hash = "#",
        _skrollr = {
            refresh: function () {
                return;
            }
        },
	    one_page_scroll_speed = 600;


	function update_viewport_vars() {
		viewport_width = $(window).width();
		viewport_height = $(window).height();
	}
	var _update_viewport_vars = _.throttle(update_viewport_vars, 100);
	$window.resize(_update_viewport_vars);

	var getCssFromClass = function (prop, fromClass) {
		var $inspector = $("<div>").css('display', 'none').addClass(fromClass);
		$("body").append($inspector); // add to DOM, in order to read the CSS property
		try {
		    return $inspector.css(prop);
		} finally {
		    $inspector.remove(); // and remove from DOM
		}
	};

	
	/*---------------------------------------------------------------------------------*/
	/*	Main Menu
	/*---------------------------------------------------------------------------------*/

	var $main_nav_container = $('.main-navigation-container');
	var diff_height = parseInt(getCssFromClass('height', 'ss-header-diff'), 10);

	if ( $main_nav_container.outerWidth() > ($main_nav_container.parent().width()-$logo.outerWidth()) ) {
		$main_nav_container.hide();
		$('.ss-mobile-menu-button').show();
	}

	if ( $('body').hasClass('ss-home') ) {

		if ( document.location.hash ) {
			var page_url = window.location.href,
			hash = page_url.substring( page_url.lastIndexOf("#") + 1 );
			location_hash = hash;
			window.location = '#';
		}

		$('#main-navigation').onePageNav({
			currentClass: 'current_page_item',
			changeHash: false,
			scrollSpeed: one_page_scroll_speed,
			scrollOffset: $header.height() - 24,
			scrollThreshold: 0.5,
			filter: ':not(.external)',
			easing: "easeOutSine",
		});

		var header_offset = $header.height() - diff_height;
		$('#main-navigation-mobile a:not(.external)').on('click', function (e) {
			e.preventDefault();
			$('#wrapper').trigger('click');
		    var target = this.hash,
		    $target = $(target);
			setTimeout( function() {
				$('html, body').stop().animate({
			        'scrollTop': $target.offset().top - header_offset
			    }, one_page_scroll_speed, 'easeOutSine');
			}, mobile_menu_anim_speed);
		});

	}

	// Center Sub Menu 
	$('#main-navigation').children('li').hover( function() {
		if ( $(this).children('ul').length > 0 ) {
			var li_width = $(this).outerWidth(false),
			sub = $(this).children('ul'),
			sub_width = sub.outerWidth(),
			point = null;
			if ( sub_width > li_width ) {
				point = (sub_width/2) - (li_width/2);
				sub.css('left',-point);
			} else {
				point = (li_width/2) - (sub_width/2);
				sub.css('left', point);
			}
		}
	});

	// Handle off-side submenus on narrow viewports
	$('#main-navigation .sub-menu .sub-menu').each( function() {
		var outerWidth = $(this).outerWidth(),
		offsetLeft = $(this).offset().left;
		if ( offsetLeft + outerWidth > viewport_width ) {
			var rightPos = $(this).css('left');
			$(this).addClass('sub-menu-left');
			$(this).css({
				left: "auto",
				right: rightPos,
			});
		}
	});


	function scrollToHashID() {
		if ( $('body').hasClass('ss-home') ) {
			if ( $('section[id="' + location_hash + '"]' ).length > 0 ) {
				var top = $('section[id="' + location_hash + '"]' ).offset().top - header_offset;
				$("html, body").animate({ scrollTop: top } , 900, 'easeOutExpo');
				window.location = window.location + location_hash;
			}
		}
	}

	if ( $('.ss-tiles-container').length ) {
		scrollToHashID();
	}


	/*---------------------------------------------------------------------------------*/
	/*	Mobile Menu
	/*---------------------------------------------------------------------------------*/

	var mobile_menu = false;
	$('.ss-mobile-menu-button').click( function(e) {
		e.stopPropagation();
		e.preventDefault();
		mobile_menu = true;
		$('#wrapper').removeClass('ss-mobile-menu-active');
		$('.ss-mobile-menu').css({
			display: 'block',
		});
		TweenLite.to( $('#wrapper'), mobile_menu_anim_speed/1000, { css: { x: $('.ss-mobile-menu').width() }, ease: Expo.easeOut });
	});

	$('#wrapper').click( function() {
		if (mobile_menu) {
			mobile_menu = false;
			TweenLite.to( $('#wrapper'), mobile_menu_anim_speed/1000, { css: { x: 0 }, ease: Expo.easeOut, onComplete: function() {
				$('.ss-mobile-menu').css({
					display: 'none',
				});
				$('#wrapper').addClass('ss-mobile-menu-active');
			}});
		}
	});


    /*------------------------------------------------------------------*/
	/*	Sticky Header
	/*------------------------------------------------------------------*/
	
	function sticky_header_off() {
	    if (sticky_header_switch == 0) {  // If sticky header switch was off
	        $header.addClass('ss-no-sticky');
	        $body.addClass('ss-no-sticky-main-nav');
	    } else {
	        $header.addClass('ss-sticky');
	        $body.addClass('ss-sticky-main-nav');
	    }
	}
	sticky_header_off();

	function handle_sticky_header() {
	    var window_scroll = $(window).scrollTop(),
		sticky_point = 50;
	    if (!is_homepage) {
	        sticky_point = 1;
	    }
	    if (window_scroll > sticky_point) {
	        $header.addClass('ss-on-scroll');
	    } else {
	        $header.removeClass('ss-on-scroll');
	    }
	}
	var _handle_sticky_header = _.throttle(handle_sticky_header, 100);
	if (sticky_header_switch) {
	    $(window).scroll(_handle_sticky_header);
	}


	/*---------------------------------------------------------------------------------*/
    /*	Paralalx Init
	/*---------------------------------------------------------------------------------*/

	if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))) {
	    _skrollr = skrollr.init({ forceHeight: false });
	}


    /*------------------------------------------------------------------*/
    /* Home Slider
    /*------------------------------------------------------------------*/
	
	if ($(".ss-home-slider").length > 0) {
	    $(".ss-home-slider").height(viewport_height);
	    $.waypoints('refresh');
	    _skrollr.refresh();
	    var $home_rev_slider = $(".ss-home-slider");
	    // When Images are loaded
	    var imageLoader = imagesLoaded($home_rev_slider);
	    var revapi;
	    imageLoader.on('always', function (instance) {
	        revapi = $home_rev_slider.revolution({
	            delay: 5000,
	            onHoverStop: "off",
	            hideTimerBar:"on" ,
	            navigationType: "none",
	            parallax:"scroll",
	            fullWidth: "off",
	            fullScreen: "on",
	            fullScreenAlignForce: "on",
	        });
	         revapi.bind("revolution.slide.onchange",function (e,data) {
				jQuery('#item-slider').html(data.slideIndex);
				jQuery('#total-slider').html(revapi.revmaxslide());
			});
	    });
	   
	}



    /*------------------------------------------------------------------*/
    /* Fit Videos
    /*------------------------------------------------------------------*/

	$("body").fitVids();

    /*------------------------------------------------------------------*/
    /* Set up portfolio meta separator
    /*------------------------------------------------------------------*/

	$('.portfolio-single-1 .meta-separator-left-line, .portfolio-single-1 .meta-separator-right-line').css({
	    width: function () {
	        var parent_width = $(this).parent().width(),
			heading_width = $(this).siblings('.icon').outerWidth();
	        return (parent_width - heading_width) / 2;
	    }
	});


    /*------------------------------------------------------------------*/
    /* ss section seperator
    /*------------------------------------------------------------------*/

	$('.ss-sec-separator-left-line, .ss-sec-separator-right-line').css({
	    width: function () {
	        var parent_width = $(this).parent().width(),
			icon_width = $(this).siblings('.icon').outerWidth();
	        return (parent_width - icon_width) / 2;
	    }
	});


	$('.uneven').slick({
	  slidesToShow: 5,
	  slidesToScroll: 5,
	  responsive: [
	    
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll:3
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});

	/*------------------------------------------------------------------
	------------------------------------------------------------------*/

	var testimonial_sliders = [],
	$testimonial_slider_frame = $(".ss-testimonial-frame"),
	$testimonial_item = $('.ss-testimonial-item');

	$testimonial_slider_frame.each( function(index) {
		testimonial_sliders[index] = new Sly( $(this), {
			horizontal: 1,
			itemNav: 'forceCentered',
			smart: 1,
			scrollBy: 0,
			dragHandle: 1,
			dynamicHandle: 1,
			clickBar: 1,
			speed: 600,
			mouseDragging: 1,
			touchDragging: 1,
			releaseSwing:  1,
			swingSpeed: 0.1,
			elasticBounds: 1,
			cycleBy: 'items',
			cycleInterval: 0,
			pauseOnHover:  1, 
			startPaused:   0,
			activateMiddle: 1,
			next: $('.ss-next-testimonial'),
			prev: $('.ss-prev-testimonial'),
		}).init();
		$testimonial_item.css({
			width: function() {
				return $(this).closest('.ss-testimonial-frame').width()
			}
		});
		$testimonial_slider_frame.each( function(index) {
			testimonial_sliders[index].reload();
		});
	});

	var testimonial_sliders_reload = _.throttle( function() {
		$testimonial_item.css({
			width: function() {
				return $(this).closest('.ss-testimonial-frame').width()
			}
		});
		$testimonial_slider_frame.each( function(index) {
			testimonial_sliders[index].reload();
		});
	}, 100);
	$window.resize(testimonial_sliders_reload);

	$('.ss-testimonial-frame').mousedown( function() {
		$(this).css("cursor","-webkit-grabbing");
		$(this).css("cursor","-moz-grabbing");
	}).mouseup(function() {
		$(this).css("cursor","-webkit-grab");
		$(this).css("cursor","-moz-grab");
	});


    /*------------------------------------------------------------------*/
	/*------------------------------------------------------------------*/
	
	$window.load( function() {

		/*------------------------------------------------------------------*/
		/*	Set up heading lines
		/*------------------------------------------------------------------*/

		function initSectionHeading() {
			$('.section-heading-left-line,.section-heading-right-line').css({
				width: function() {
					var parent_width = $(this).parent().width();
					var heading_width = $(this).siblings('.section-heading').children('span').outerWidth(true);
					if ( heading_width > (parent_width - 60) ) {
						$(this).siblings('.section-heading').css('width', parent_width - 60);
					}
					heading_width = $(this).siblings('.section-heading').children('span').outerWidth(true);

					return ((parent_width - heading_width) / 2) - 20;
				}
			});
		}
		initSectionHeading();
		var _initSectionHeading = _.throttle( function() {
			initSectionHeading();
		}, 100);
		$window.resize(_initSectionHeading);	


		/*------------------------------------------------------------------*/
		/*	Refresh necessary plugins
		/*------------------------------------------------------------------*/

		_skrollr.refresh();
		$.waypoints('refresh');

	});


    /*---------------------------------------------------------------------------------*/
    /*	Revealing Effects Init
	/*---------------------------------------------------------------------------------*/

	$('.ss-effect').waypoint( function(direction) {
		$(this).bring({
			action: "show",
			animation: $(this).attr('data-ss-effect'),
			speed: $(this).attr('data-ss-effect-speed'),
			delay: $(this).attr('data-ss-effect-delay'),
			offset: $(this).attr('data-ss-effect-offset'),
		});
	}, { offset: "90%" });


    /*---------------------------------------------------------------------------------*/
	/*  Go To Top
	/*---------------------------------------------------------------------------------*/
	function process_menu(){
	    if ($(this).scrollTop() > 200) {
	        $('.go-top').fadeIn(300);
	    } else {
	        $('.go-top').fadeOut(300);
	    }
	}
    //show or hide the  footer go to top button
	process_menu();
	$(window).scroll(function () {
		process_menu();
	});
    //Animate scroll to top
	$('.go-top').click(function (event) {
	    event.preventDefault();

	    $('html, body').animate({scrollTop:0}, 900);
	})


	bAudios.init();
	bMusic.init();	

});