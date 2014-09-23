jQuery(function($) {

	"use strict";

	/*------------------------------------------------------------------
		Passed Options From Admin Panel
	------------------------------------------------------------------*/

	var animation_on_mobile_switch = ss_shortcode_data.animation_on_mobile_switch;


	/*---------------------------------------------------------------------------------*/
	/*  Global Values
	/*---------------------------------------------------------------------------------*/

	var $window = $(window),
		$body = $('body'),
		viewport_width = $window.width(),
		viewport_height = $window.height(),
		$header = $('.main-header'),
		$footer = $('.main-footer'),
		is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
        location_hash = "#",
        _skrollr = skrollr.get();

	// function scrollToHashID() {
	// 	if ( $('body').hasClass('ss-home') ) {
	// 		// Animate scroll if a hash is set in the URL
	// 		// var page_url = window.location.href,
	// 		// hash = page_url.substring( page_url.lastIndexOf("#") + 1 );
	// 		if ( $('section[id="' + location_hash + '"]' ).length > 0 ) {
	// 			var top = $('section[id="' + location_hash + '"]' ).offset().top - header_offset;
	// 			$("html, body").animate({ scrollTop: top } , 900, 'easeOutExpo');
	// 			window.location = window.location + location_hash;
	// 		}
	// 	}
	// }


	/*---------------------------------------------------------------------------------*/
    /*	Revealing Effects Init
	/*---------------------------------------------------------------------------------*/

	if ( animation_on_mobile_switch == "off" && is_mobile ) {
		$body.addClass('ss-no-effect-on-mobile');
	} else {
		$('.ss-effect').waypoint( function(direction) {
			$(this).bring({
				action: "show",
				animation: $(this).attr('data-ss-effect'),
				speed: $(this).attr('data-ss-effect-speed'),
				delay: $(this).attr('data-ss-effect-delay'),
				offset: $(this).attr('data-ss-effect-offset'),
			});
		}, { offset: "90%" });
	}


	/*---------------------------------------------------------------------------------*/
	/*  Spnoy Studio Exclusive Gallery
	/*---------------------------------------------------------------------------------*/

	$('.ss-tiles-container').each( function() {
		
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
		var imageLoader = imagesLoaded( $tiles_container );
		imageLoader.on( 'always', function( instance ) {

			// Remove loading gif
			$tiles_inner.removeClass('ss-loading');

			// Set the container to match our items positions
			$tiles_container.css({
				width: function() {
					return $(this).parent().width() + 12;
				},
				marginLeft: function() {
					return -6;
				}
			});
			if ( is_horizontal ) {
				$tiles_container.css({
					width: function() {
						return $(this).parent().width() + 6;
					},
				});
			}
			var _tiles_container_update = _.throttle(function() {
				$tiles_container.css({
					width: function() {
						return $(this).parent().width() + 12;
					},
					marginLeft: function() {
						return -6;
					}
				});
				if ( is_horizontal ) {
					masonry_tiles_sly.reload();
					$tiles_container.find('.ss-tiles-scrollbar').css({
						width: function() {
							return $(this).parent().width() - 12;
						}
					});
					$tiles_container.css({
						width: function() {
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
				height: function() {
					return $(this).parent().height();
				},
			});
			$tile_layout1_content.css({
				backgroundColor: function() {
					return $(this).attr('data-hover-bg-color');
				},
				color: function() {
					return $(this).attr('data-hover-color');
				},
			});

			// Set the colors for tile layout 2
			$tile_layout_2.css({
				backgroundColor: function() {
					return $(this).attr('data-hover-bg-color');
				},
				color: function() {
					return $(this).attr('data-hover-color');
				},
			});

			// Set the colors for tile layout 3
			$tile_layout3_content.css({
				backgroundColor: function() {
					return $(this).attr('data-hover-bg-color');
				},
				color: function() {
					return $(this).attr('data-hover-color');
				},
			});

			// Set the colors for tile layout 4
			$tile_layout4_content.css({
				backgroundColor: function() {
					return $(this).attr('data-hover-bg-color');
				},
				color: function() {
					return $(this).attr('data-hover-color');
				},
			});

			var masonry_tiles_container = "";

			if ( $tiles_inner.length > 0 ) {

				if ( is_horizontal ) {

					masonry_tiles_container = new Isotope( $tiles_inner[0], {
						itemSelector: '.ss-tile',
						layoutMode: 'masonryHorizontal',
						masonryHorizontal: {
							rowHeight: '.ss-tile-grid-sizer'
						}
					});
					$tiles_container.css('overflow','hidden');
					var masonry_tiles_sly = new Sly( $tiles_container, {
						scrollBar : $tiles_container.find('.ss-tiles-scrollbar'),
						horizontal: 1,
						scrollBy: 0,
						dragHandle: 1,
						dynamicHandle: 1,
						itemNav: 0,
						clickBar: 1,
						speed: 600,
						mouseDragging: 1,
						touchDragging: 1,
						releaseSwing:  1,
						swingSpeed: 0.1,
						elasticBounds: 1,
						cycleBy: null,
						cycleInterval: 4000
					}).init();
					setTimeout( function() {
						masonry_tiles_container.layout();
						masonry_tiles_sly.reload();
					}, 1000);

					if ( $tiles_inner.width() > $tiles_container.width() + 12 ) {  // +12 account margins
						$tiles_container.find('.ss-tiles-scrollbar').addClass('ss-tiles-scrollbar-show');
						$tiles_container.find('.ss-tiles-scrollbar').css({
							width: function() {
								return $(this).parent().width() - 12;
							},
							marginLeft: function() {
								return 6;
							}
						});
					}
					
					$tiles_inner.mousedown( function() {
						$(this).css("cursor","-webkit-grabbing");
						$(this).css("cursor","-moz-grabbing");
						$tiles_container.find('.ss-tiles-scrollbar').addClass('ss-tiles-scrollbar-active');
					}).mouseup(function() {
						$(this).css("cursor","-webkit-grab");
						$(this).css("cursor","-moz-grab");
						$tiles_container.find('.ss-tiles-scrollbar').removeClass('ss-tiles-scrollbar-active');
					});

				} else {

					if ( viewport_width > 400 ) {
						masonry_tiles_container = new Isotope( $tiles_inner[0], {
							itemSelector: '.ss-tile',
							masonry: {
								columnWidth: '.ss-tile-grid-sizer'
							}
						});
					} else {
						masonry_tiles_container = new Isotope( $tiles_inner[0], {
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
			setTimeout( function() {
				$.waypoints('refresh');
				if ( _skrollr != null ) {
					_skrollr.refresh();
				}
				// scrollToHashID();
			}, 900);


			// Animate and show tiles
			if ( animation_on_mobile_switch == "off" && is_mobile ) {
				
			} else {
				var anim_index = 0,
				$anim_elements = $tile_all,
				anim_elements_size = $anim_elements.size();
				var interval = setInterval( function() {
					$anim_elements.eq(anim_index).bring({
						action: "show",
						animation: "random",
						speed: "0.6",
						delay: "0",
						offset: 1
					});
					if ( ++anim_index > anim_elements_size ) clearInterval(interval);
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
			$tile_all.filter(':not(.has-layout-2):not(.only-hover)').each( function() {
				$(this).find('.ss-tile-content').css({
					display: "none",
					opacity: "1"
				});
				$(this).hoverdir({
					speed : 200,
					easing : 'ease',
					hoverDelay : 0,
					inverse : false,
					hoverElem : '.ss-tile-content'
				});
			});
			TweenLite.to( $tile_all.filter(':not(.has-layout-2):not(.only-hover)').find('.ss-tile-content'), 0, { css: { scaleX: 0.7, scaleY: 0.7 }, ease: Expo.easeOut, delay: 0 });

			$tile_all.magnificPopup({
	            type: 'inline',
	            delegate: 'a.item-format',
	            gallery: {
	                enabled: 1
	            },
	            removalDelay: 300,
	            showCloseBtn: 1,
	            closeBtnInside: 1,
	            alignTop: 0,
	            mainClass: 'mfp-fade',
	        });

			if ( typeof masonry_tiles_sly === 'undefined' ) {
				// Sly therefore Horizontal mode is disabled
			} else {
				// Hack : Enable Touch Draging on Sly since the native one doesn't work properly
				var hammertime = Hammer(masonry_tiles_sly.frame).on("dragleft", function(ev) {
					ev.gesture.preventDefault();  // Prevent the browser from scrolling
				}).on("dragright", function(ev) {
					ev.gesture.preventDefault();  // Prevent the browser from scrolling
				});
			}
			
		});

	});


    /*---------------------------------------------------------------------------------*/
    /*	Home Video Background
	/*---------------------------------------------------------------------------------*/

	if ($('.ss-videobg-container').length > 0) {
	    if ($('.ss-videobg-container').parent().find('.rev_slider_wrapper').length > 0) {
	        $('.ss-videobg-container').addClass('revslider');
	    }

	    var windowInner_height = window.innerHeight;
	    var windowWidth = $window.width();
	    $(".ss-videobg-container").height(windowInner_height).width(windowWidth);
	    $(".ss-videobg-overlay").height(windowInner_height).width(windowWidth);
	    
	    var _video_background_update = _.throttle(function () {
	        windowInner_height = window.innerHeight;
	        windowWidth = $window.width();
	        $(".ss-videobg-container").height(windowInner_height).width(windowWidth);
	        $(".ss-videobg-overlay").height(windowInner_height).width(windowWidth);
	    }, 100);
	    $window.resize(_video_background_update);
	    $.waypoints('refresh');
	    $('.ss-videobg-container').each(function() {
	        var ss_videobg_container = $('.ss-videobg-container');
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
	            poster: 'fake/address.png',
	            opacity: 1,
	            fullscreen: true,
	        });
	        $('.videoBG').css({
	            'background-image': 'url(' + ss_videobg_poster + ')',
	            'background-size': 'cover'
	        });
	    });

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

	$(".tab-container .tab-pane").each( function() {
    	var $tabs = $(this).siblings('.tabs');
    	$tabs.append('<li class="tab"><a href="#" class="tab-anchor">' + $(this).attr('data-title') + '</a></li>');
    });

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
	/*	Blog Teaser
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


});