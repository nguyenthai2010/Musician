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
			scrollOffset: $header.height() - 23,
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
		handle_sticky_header();
	}

	/*---------------------------------------------------------------------------------*/
    /*	Paralalx Init
	/*---------------------------------------------------------------------------------*/

	if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent))) {
	    _skrollr = skrollr.init({ forceHeight: false });
	}
	else{
		$('body').addClass('device');
		$(window).load(function(e) {
    		$('.ss-home-slider').height( $(window).height() );        
        });
	}
	
	//$('body').addClass('device');

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
	
	var bdrap = true;
	if(is_mobile){
		$("#credits-2").touchme({
			preventDefaultEvents: false,
			isDetectHorizontalMovement:true,
			isDetectVecticalMovement:true,
			isDetectDiagonalMovement:true,
			wipeLeft: function(target) {
				$('.uneven').slickNext();
			},
			wipeRight: function(target) {
				$('.uneven').slickPrev();
			}
		}); 
		
		bdrap = false;
	}


			
	$('.uneven').slick({
	  slidesToShow: 5,
	  slidesToScroll: 5,
	  swipe:bdrap,
	  draggable:bdrap,
	  responsive: [
	    
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll:1
	      }
	    }
	  ]
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


	bAudios.init();
	bMusic.init();	
	clsHomepage.init();
});

