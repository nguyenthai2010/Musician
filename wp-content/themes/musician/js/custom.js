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
			scrollOffset: $header.height() - diff_height,
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


    /*---------------------------------------------------------------------------------*/
    /*  Spnoy Studio Exclusive Gallery
	/*---------------------------------------------------------------------------------*/

	$('.ss-tiles-container').each(function () {

	    // Cache Selectors
	    var $tiles_container = $(this),
			$tiles_inner = $tiles_container.find('.ss-tiles-inner'),
			$tile_all = $tiles_inner.find('.ss-tile'),
			$tile_layout_1 = $tile_all.filter('.ss-tile.has-layout-1'),
			$tile_layout_2 = $tile_all.filter('.ss-tile.has-layout-2'),
			$tile_layout_3 = $tile_all.filter('.ss-tile.has-layout-3'),
			$tile_layout_4 = $tile_all.filter('.ss-tile.has-layout-4'),
			$tile_has_caption = $tile_all.filter('.ss-tile.has-caption'),
			$tile_layout3_content = $tile_layout_3.find('.ss-tile-content'),
			$tile_layout4_content = $tile_layout_4.find('.ss-tile-content'),
			$tile_layout1_content = $tile_layout_1.find('.ss-tile-content'),
			is_horizontal = $tiles_container.hasClass('ss-tiles-horizontal');

	    // When Images are loaded
	    var imageLoader = imagesLoaded($tiles_container);
	    imageLoader.on('always', function (instance) {

	        //apply the height size
	        $tiles_container.find('.ss-tiles-inner').css('height', "$tiles_container.attr('data-height-size')");

	        // Remove loading gif
	        $tiles_inner.removeClass('ss-loading');

	        // Set the container to match our items positions
	        $tiles_container.css({
	            width: function () {
	                return $(this).parent().width() + 12;
	            },
	            marginLeft: function () {
	                return -6;
	            }
	        });
	        if (is_horizontal) {
	            $tiles_container.css({
	                width: function () {
	                    return $(this).parent().width() + 6;
	                },
	            });
	        }
	        var _tiles_container_update = _.throttle(function () {
	            $tiles_container.css({
	                width: function () {
	                    return $(this).parent().width() + 12;
	                },
	                marginLeft: function () {
	                    return -6;
	                }
	            });
	            if (is_horizontal) {
	                masonry_tiles_sly.reload();
	                $tiles_container.find('.ss-tiles-scrollbar').css({
	                    width: function () {
	                        return $(this).parent().width() - 12;
	                    }
	                });
	                $tiles_container.css({
	                    width: function () {
	                        return $(this).parent().width() + 6;
	                    },
	                });
	            }
	            masonry_tiles_container.layout();
	        }, 100);
	        $window.resize(_tiles_container_update);

	        // Set the colors for tile layout 1
	        // Set the height for hover state, Required because of display:table
	        $tile_has_caption.find('.ss-tile-content').css({
	            height: function () {
	                return $(this).parent().height();
	            },
	        });
	        $tile_layout1_content.css({
	            backgroundColor: function () {
	                return $(this).attr('data-hover-bg-color');
	            },
	            color: function () {
	                return $(this).attr('data-hover-color');
	            },
	        });

	        // Set the colors for tile layout 2
	        $tile_layout_2.css({
	            backgroundColor: function () {
	                return $(this).attr('data-hover-bg-color');
	            },
	            color: function () {
	                return $(this).attr('data-hover-color');
	            },
	        });

	        // Set the colors for tile layout 3
	        $tile_layout3_content.css({
	            backgroundColor: function () {
	                return $(this).attr('data-hover-bg-color');
	            },
	            color: function () {
	                return $(this).attr('data-hover-color');
	            },
	        });

	        // Set the colors for tile layout 4
	        $tile_layout4_content.css({
	            backgroundColor: function () {
	                return $(this).attr('data-hover-bg-color');
	            },
	            color: function () {
	                return $(this).attr('data-hover-color');
	            },
	        });

	        var masonry_tiles_container = "";

	        if ($tiles_inner.length > 0) {

	            if (is_horizontal) {

	                masonry_tiles_container = new Isotope($tiles_inner[0], {
	                    itemSelector: '.ss-tile',
	                    layoutMode: 'masonryHorizontal',
	                    masonryHorizontal: {
	                        rowHeight: '.ss-tile-grid-sizer'
	                    }
	                });
	                $tiles_container.css('overflow', 'hidden');
	                var masonry_tiles_sly = new Sly($tiles_container, {
	                    scrollBar: $tiles_container.find('.ss-tiles-scrollbar'),
	                    horizontal: 1,
	                    scrollBy: 0,
	                    dragHandle: 1,
	                    dynamicHandle: 1,
	                    itemNav: 0,
	                    clickBar: 1,
	                    speed: 600,
	                    mouseDragging: 1,
	                    touchDragging: 1,
	                    releaseSwing: 1,
	                    swingSpeed: 0.1,
	                    elasticBounds: 1,
	                    cycleBy: null,
	                    cycleInterval: 4000
	                }).init();
	                setTimeout(function () {
	                    masonry_tiles_container.layout();
	                    masonry_tiles_sly.reload();
	                }, 1000);

	                if ($tiles_inner.width() > $tiles_container.width() + 12) {  // +12 account margins
	                    $tiles_container.find('.ss-tiles-scrollbar').addClass('ss-tiles-scrollbar-show');
	                    $tiles_container.find('.ss-tiles-scrollbar').css({
	                        width: function () {
	                            return $(this).parent().width() - 12;
	                        },
	                        marginLeft: function () {
	                            return 6;
	                        }
	                    });
	                }

	                $tiles_inner.mousedown(function () {
	                    $(this).css("cursor", "-webkit-grabbing");
	                    $(this).css("cursor", "-moz-grabbing");
	                    $tiles_container.find('.ss-tiles-scrollbar').addClass('ss-tiles-scrollbar-active');
	                }).mouseup(function () {
	                    $(this).css("cursor", "-webkit-grab");
	                    $(this).css("cursor", "-moz-grab");
	                    $tiles_container.find('.ss-tiles-scrollbar').removeClass('ss-tiles-scrollbar-active');
	                });

	            } else {

	                if (viewport_width > 400) {
	                    masonry_tiles_container = new Isotope($tiles_inner[0], {
	                        itemSelector: '.ss-tile',
	                        masonry: {
	                            columnWidth: '.ss-tile-grid-sizer'
	                        }
	                    });
	                } else {
	                    masonry_tiles_container = new Isotope($tiles_inner[0], {
	                        itemSelector: '.ss-tile',
	                        layoutMode: 'vertical',
	                        vertical: {
	                            horizontalAlignment: 0.5,
	                        }
	                    });
	                }

	            }

	        }

	        // Recalculate waypoints coordinates due to document height changes
	        // Using 900ms Timeout considering height Tranistion in 0.9sec on Tiles Gallery
	        setTimeout(function () {
	            $.waypoints('refresh');
	            if (_skrollr != null) {
	                _skrollr.refresh();
	            }
	            // scrollToHashID();
	        }, 900);


	        // Animate and show tiles
	        if (animation_on_mobile_switch == "off" && is_mobile) {

	        } else {
	            var anim_index = 0,
				$anim_elements = $tile_all,
				anim_elements_size = $anim_elements.size();
	            var interval = setInterval(function () {
	                $anim_elements.eq(anim_index).bring({
	                    action: "show",
	                    animation: "random",
	                    speed: "0.6",
	                    delay: "0",
	                    offset: 1
	                });
	                if (++anim_index > anim_elements_size) clearInterval(interval);
	            }, 200);
	        }


	        // Enable Bring hover
	        // $('.ss-tile.has-layout-1:not(.has-caption):not(.only-hover)').hover( function() {
	        //  $(this).find('.ss-tile-content').bring({
	        //      action: "show",
	        //      animation: "random",
	        //      speed: 0.6,
	        //      delay: "0",
	        //  });
	        // }, function() {
	        //  $(this).find('.ss-tile-content').bring({
	        //      action: "hide",
	        //      animation: "random",
	        //      speed: 0.6,
	        //      delay: "0",
	        //  });
	        // });

	        // Enable diraction aware hover
	        $tile_all.filter(':not(.has-layout-2):not(.only-hover)').each(function () {
	            $(this).find('.ss-tile-content').css({
	                display: "none",
	                opacity: "1"
	            });
	            $(this).hoverdir({
	                speed: 200,
	                easing: 'ease',
	                hoverDelay: 0,
	                inverse: false,
	                hoverElem: '.ss-tile-content'
	            });
	        });
	        TweenLite.to($tile_all.filter(':not(.has-layout-2):not(.only-hover)').find('.ss-tile-content'), 0, { css: { scaleX: 0.7, scaleY: 0.7 }, ease: Expo.easeOut, delay: 0 });

	    });

	});


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
	            fullWidth: "off",
	            fullScreen: "on",
	            fullScreenAlignForce: "on",
	        });
	         revapi.bind("revolution.slide.onchange",function (e,data) {
				jQuery('#item-slider').html(data.slideIndex);
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


	/*------------------------------------------------------------------
		Testimonials
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
	/*	Portfolio Initialization
	/*------------------------------------------------------------------*/

	$('.portfolio-items-container').each(function () {

	    var portfolio_items_containers = $(this);
	    var portfolio_button_group;
	    if ($(this).prev().hasClass("portfolio-button-group")) {
	        portfolio_button_group = $(this).prev();
	    }
	    $(portfolio_items_containers).imagesLoaded().always(function (instance) {

	        // hover height for centering its content
	        $(portfolio_items_containers).find('.portfolio-item-overlay').css('height', function () {
	            return $(portfolio_items_containers).find('.inner-container').height();
	        });
	        var _portfolio_item_update = _.throttle(function () {
	            $(portfolio_items_containers).find('.portfolio-item-overlay').css('height', function () {
	                return $(portfolio_items_containers).find('.inner-container').height();
	            });
	        }, 100);
	        $window.resize(_portfolio_item_update);

            //Initialize Isotope + filtering
	        if ($(portfolio_items_containers).hasClass("filtering-on")) {
	            // Init Isotope + filtering
	            var $portfolio_items = $(portfolio_items_containers);
	            $portfolio_items.isotope({
	                // options
	                itemSelector: '.portfolio-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });

	            // filter items on button click
	            $(portfolio_button_group).on('click', 'input', function (event) {

	                $(portfolio_button_group).find('.radio-input-checked').removeClass('radio-input-checked');
	                $(this).parent().addClass('radio-input-checked');

	                var filterValue = $(this).attr('value');
	                $portfolio_items.isotope({ filter: filterValue });
	                
	                _skrollr.refresh();

	            });
	        } else {
	            // Init Isotope
	            var $portfolio_items = $(portfolio_items_containers);
	            $portfolio_items.isotope({
	                // options
	                itemSelector: '.portfolio-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });
	        }

	        // Init magnificPopup on Recent works
	        $(portfolio_items_containers).magnificPopup({
	            type: 'inline',
	            delegate: 'a.item-format',
	            gallery: {
	                enabled: Boolean(parseInt(lightbox_gallery_mode, 10))
	            },
	            removalDelay: 600,
	            showCloseBtn: Boolean(parseInt(lightbox_close_button, 10)),
	            closeBtnInside: (lightbox_close_button_position == 'true'),
	            alignTop: (lightbox_align == 'true'),
	            mainClass: 'mfp-fade'
	        });

	    });
	});


    /*------------------------------------------------------------------*/
	/*	Pie-Chart Initializing
	/*------------------------------------------------------------------*/

	$('.pie-chart').waypoint( function(direction) {
		var $span = $(this).children('span'),
		percent = $(this).attr('data-percent'),
		barColor = $(this).attr('data-bar-color'),
		trackColor = $(this).attr('data-track-color');
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: "#ffffff",
			scaleLength: 0,
			lineCap: "round",
			lineWidth: 2,
			size: 175,
			rotate: 0,
			animate: 2000,
		});
		$({countNum: 0}).animate({countNum: percent}, {
			duration: 2000,
			easing: 'linear',
			step: function() {
				$span.text( Math.floor(this.countNum) + "%" );
			}
		});
	}, { offset: "90%", triggerOnce: true });
	

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


    /*------------------------------------------------------------------*/
	/*	IconBox Slider
	/*------------------------------------------------------------------*/

	$(".ss-iconbox-slider").each(function () {
	    var iconBoxSlider = $(this);

	    iconBoxSlider.owlCarousel({
	        items: 3, //3 items above 1200px browser width
	        itemsDesktop: [1200, 3], //3 items between 1200px and 940px
	        itemsDesktopSmall: [940, 2], //2 items betweem 939px and 720px
	        itemsTablet: [719, 1], //1 items between 719 and 0
	        itemsMobile: false, // handeled by media query 
	        autoHeight: true,
	        pagination: false,

	        // Responsive 
	        responsive: true,
	        responsiveRefreshRate: 200,
	        responsiveBaseWidth: iconBoxSlider

	    });
	    // Custom Navigation Events
	    iconBoxSlider.next().find(".ss-next-iconbox").click(function () {
	        iconBoxSlider.trigger('owl.next');
	    })
	    iconBoxSlider.next().find(".ss-prev-iconbox").click(function () {
	        iconBoxSlider.trigger('owl.prev');
	    })

	});


    /*------------------------------------------------------------------*/
    /*	Clients Slider
	/*------------------------------------------------------------------*/

	$(".clients-slider").each(function () {
	    var clientSlider = $(this);

	    clientSlider.owlCarousel({
	        itemsCustom: [
                    [0, 1],
                    [450, 2],
                    [720, 3],
                    [940, 4],
                    [1140, 5],
            ],
	        autoHeight: true,
	        pagination: false,

	        // Responsive 
	        responsive: true,
	        responsiveRefreshRate: 200,
	        responsiveBaseWidth: clientSlider

	    });
	    // Custom Navigation Events
	    clientSlider.next().find(".ss-next-clients").click(function () {
	        clientSlider.trigger('owl.next');
	    })
	    clientSlider.next().find(".ss-prev-clients").click(function () {
	        clientSlider.trigger('owl.prev');
	    })
	});
	


    /*-----------------------------------------------------------------*/
    /*	Featured Portfolio
	/*-----------------------------------------------------------------*/

	$('.ss-lightbox-single').imagesLoaded().always(function (instance) {

	    $('.ss-lightbox-single-overlay').css('height', function () {
	        return $('.ss-lightbox-single').height();
	    });
	    var _portfolio_featured_item_update = _.throttle(function () {
	        $('.ss-lightbox-single-overlay').css('height', function () {
	            return $('.ss-lightbox-single').height();
	        });
	    }, 100);
	    $window.resize(_portfolio_featured_item_update);

	});

	$('.ss-lightbox-single').magnificPopup({
	    type: 'inline',
	    delegate: 'a.item-format',
	    gallery: {
	        enabled: false
	    },
	    removalDelay: 600,
	    showCloseBtn: Boolean(parseInt(lightbox_close_button, 10)),
	    closeBtnInside: (lightbox_close_button_position == 'true'),
	    alignTop: (lightbox_align == 'true'),
	    mainClass: 'mfp-fade'
	});


    /*-----------------------------------------------------------------*/
    /* Royal Slider Initializing
    /*-----------------------------------------------------------------*/

	$(".royalSlider").royalSlider({
	    loop: true,
	    autoHeight: true,
	    autoScaleSlider: false,
	    imageScaleMode: 'fill',
	    imageAlignCenter: false,
	    slidesSpacing: 0,
	    arrowsNav: true,
	    controlNavigation: false,
	    keyboardNavEnabled: true,
	    arrowsNavAutoHide: false,
	    sliderDrag: true,
	    updateSliderSize: true,
	    usePreloader: true,
	});
	

	/*---------------------------------------------------------------------------------*/
	/*	SHORTCODES
	/*---------------------------------------------------------------------------------*/

	var $blogTeaser = $('.blog-teaser');
	function blogTeaserRelayout() {
		$blogTeaser.css({
			height: function() {
				return $(this).find('img').height();
			}
		});
	}
	$blogTeaser.imagesLoaded().always(function (instance) {
		blogTeaserRelayout();
	});
	var _blogTeaserRelayout = _.throttle(function() {
		blogTeaserRelayout();
	}, 100);
	$window.resize(_blogTeaserRelayout);


    /*------------------------------------------------------------------*/
	/*	Widget Portfolio
	/*------------------------------------------------------------------*/

	$('.widget_latest_portfolio').imagesLoaded().always(function (instance) {
	    // hover height for centering its content
	    $('.widget_latest_portfolio').find('.portfolio-item-overlay').css('height', function () {
	        return $('.widget_latest_portfolio ul li').find('.inner-container').height();
	    });
	    var _widget_latest_portfolio_update = _.throttle(function () {
	        $('.widget_latest_portfolio').find('.portfolio-item-overlay').css('height', function () {
	            return $('.widget_latest_portfolio ul li').find('.inner-container').height();
	        });
	    }, 100);
	    $window.resize(_widget_latest_portfolio_update);
	});

    /*---------------------------------------------------------------------------------*/
    /*	Init Blog Masonry
	/*---------------------------------------------------------------------------------*/

	if (typeof Masonry !== 'undefined') {
	    var blog_container = document.querySelector('.blog-container.masonry');
	    if (typeof (blog_container) != 'undefined' && blog_container != null) {
	        var imageLoader = imagesLoaded(blog_container);
	        imageLoader.on('always', function (instance) {
	            var $blog_container_masonry = $(blog_container);
	            $blog_container_masonry.isotope({
	                // options
	                itemSelector: '.blog-item',
	                layoutMode: 'masonry',
	                columnWidth: '.grid-sizer',
	            });
	        });
	    }
	    var blog_container_grid = document.querySelector('.blog-container.grid');
	    if (typeof (blog_container) != 'undefined' && blog_container_grid != null) {
	        var imageLoader = imagesLoaded(blog_container_grid);
	        imageLoader.on('always', function (instance) {
	            var $blog_container_grid = $(blog_container_grid);
	            $blog_container_grid.isotope({
	                // options
	                itemSelector: '.blog-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });
	        });
	    }

	}

	

    /*---------------------------------------------------------------------------------*/
    /*	Accordion
	/*---------------------------------------------------------------------------------*/

	var accordion = $('.accordion-container');
	$('.accordion-container').tabs(
        ".accordion-container .accordion-item div.accordion-item-desc",
        {
            tabs: '.accordion-item div.accordion-item-header',
            effect: 'slide',
        }
      );
	$('.accordion-item div.accordion-item-header.current').find('.ss-accordion-arrow').removeClass('icon-arrow-down7').addClass('icon-arrow-up9');
	$('.accordion-item div.accordion-item-header').click(function () {
	    $('.ss-accordion-arrow').each(function () {
	        if ($(this).parent().parent().is('.current')) {
	            $(this).removeClass('icon-arrow-down7');
	            $(this).addClass('icon-arrow-up9');
	        } else {
	            $(this).removeClass('icon-arrow-up9');
	            $(this).addClass('icon-arrow-down7');
	        }
	    });
	});
	


    /*---------------------------------------------------------------------------------*/
    /*	Toggle
	/*---------------------------------------------------------------------------------*/

	var toggle_header = $('.toggle-container .toggle-item .toggle-item-header');
    $(toggle_header).click(function () {
        if ($(this).hasClass('ui-toggle-header-active')) {
            $(this).removeClass('ui-toggle-header-active');
            $(this).find('.ss-toggle-arrow').removeClass('icon-arrow-up9');
            $(this).find('.ss-toggle-arrow').addClass('icon-arrow-down7');
        } else {
            $(this).addClass('ui-toggle-header-active');
            $(this).find('.ss-toggle-arrow').removeClass('icon-arrow-down7');
            $(this).find('.ss-toggle-arrow').addClass('icon-arrow-up9');
        }
        $(this).next().slideToggle();
	    return false;
    }).next().hide();


    /*---------------------------------------------------------------------------------*/
    /*	Tabs
	/*---------------------------------------------------------------------------------*/

    $("div.tab-container").tabs(".tab-container div.tab-pane");

    /*------------------------------------------------------------------*/
    /*   Gap
    /*------------------------------------------------------------------*/

    $('.gap').css('height', function () {
        return $(this).attr('data-height-size');
    });


    /*------------------------------------------------------------------
		Alerts
	------------------------------------------------------------------*/

    $('.alert-message').click(function () {
        TweenLite.to($(this), 0.6, { css: { 'opacity': '0', scaleX: 1.1, scaleY: 1.1, 'display': 'none' }, delay: 0 });
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
    /*	Home Video Background
	/*---------------------------------------------------------------------------------*/

	if ($('.ss-videobg-container').length > 0) {
	    $(".ss-videobg-container").height(viewport_height);
	    $.waypoints('refresh');
	    $('.ss-videobg-container').each(function() {
	        var ss_videobg_container = $(this);
	        var ss_videobg_mp4 = ss_videobg_container.attr('data-source-mp4');
	        var ss_videobg_ogv = ss_videobg_container.attr('data-source-ogv');
	        var ss_videobg_webm = ss_videobg_container.attr('data-source-webm');
	        var ss_videobg_poster = ss_videobg_container.attr('data-source-poster');
	        
	        ss_videobg_container.videoBG({
	            autoplay: true,
	            zIndex: 0,
	            mp4: ss_videobg_mp4,
	            ogv: ss_videobg_ogv,
	            webm: ss_videobg_webm,
	            poster: 'images/banner-transparent.png',
	            opacity: 1,
	            fullscreen: true,
	        });
	        ss_videobg_container.find('.videoBG').css({
	            'background-image': 'url(' + ss_videobg_poster + ')',
	            'background-size': 'cover'
	        });


	        var iOS_video_check = /(iPad|iPhone|iPod)/g.test(navigator.userAgent);

	        if (iOS_video_check) {

	            ss_videobg_container.find('video').css({
                    'z-index': '-1' 
	            });
	            ss_videobg_container.find('videoBG').css({
	                'text-align': 'center'
	            });

	            ss_videobg_container.find('video').width(ss_videobg_container.width());
	            ss_videobg_container.find('video').height(ss_videobg_container.height());
	            ss_videobg_container.find('video').removeAttr('autoplay');
	            ss_videobg_container.find('video').attr('controls', 'true');

	            var add_poster_iOS = function () {
	                ss_videobg_container.find('.videoBG').append('<div class="videoBG-iOS"> </div>');
	                $('.videoBG-iOS').css({
	                    'background-image': 'url(' + ss_videobg_poster + ')',
	                    'background-size': 'cover',
	                    'height': '100%',
	                    'width': '100%'
	                });
	                ss_videobg_container.find('.videoBG').append('<a class="videoBG-iOS-play" href="#" style="position: absolute; top: 50%; left:50%; font-size:80px; margin-left: -40px; margin-top: 0"><span class="icon-play2"></span></a>')
	            }
	            add_poster_iOS();

	            $('.ss-home-slider-container').click(function () {
	                ss_videobg_container.find('video').get(0).webkitEnterFullScreen();
	                //ss_videobg_container.find('video').get(0).play();
	            });
                
	        }

	    });
	    //$('.ss-home-slider-container').click(function () {
	    //    $(this).find('video').play();
	    //});
	}


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