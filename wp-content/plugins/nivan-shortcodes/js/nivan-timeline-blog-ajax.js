jQuery(function($){
	
	"use strict";

	// Init Vars
    var ajax_url = ss_timeline_blog_data.timeline_blog_ajax_url,
        done_text = ss_timeline_blog_data.timeline_blog_done_text,
        $container = $('.timeline-blog'),
        $load_more_button = $('.timeline-loadmore'),
        load_more_button_text = '',
        post_per_page = $container.attr('data-number'),
        page = 1,
        loading = false,
        _skrollr = skrollr.get();

    // Init Required Functions
    var load_posts = function() {
        $.ajax({
            type       : "GET",
            data       : {numPosts : post_per_page, pageNumber: page },
            dataType   : "html",
            url        : ajax_url,
            beforeSend : function() {
                
            },
            success    : function(data) {

                var $data = $(data);

                if ( $data.length ) {

					$data.hide().appendTo($container);
					var imageLoader = imagesLoaded( $container[0] );
					imageLoader.on( 'always', function( instance ) {
						var $children = $container.children('.ss-ajax').css('opacity','0').show();
                        $children.filter(':nth-child(even)').bring({
                            action: "show",
                            animation: "fade-from-right"
                        });
                        $children.filter(':nth-child(odd)').bring({
                            action: "show",
                            animation: "fade-from-left"
                        });
                        $container.children('.ss-ajax').removeClass('ss-ajax');
                        $load_more_button.find('span').text(load_more_button_text);
                        $load_more_button.removeClass('timeline-loadmore-active');
						loading = false;
                        if ( _skrollr != null ) {
                            _skrollr.refresh();
                        }
					});

                } else {

                	$load_more_button.find('span').text(done_text);
                	setTimeout( function() {
                    	$load_more_button.bring({
                            action: "hide",
                            animation: "scale-up"
                        });
                	}, 2000);

                }

            },
            error     : function(jqXHR, textStatus, errorThrown) {
                $load_more_button.remove();
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                $load_more_button.text('Error! Check the console for more information.');
            }
        });
    }

    // Init The Call On The Load Button
    $load_more_button.click( function() {
        load_more_button_text = $(this).find('span').text();
        $(this).find('span').text('...');
    	$(this).addClass('timeline-loadmore-active');
    	loading = true;
    	page++;
    	load_posts();
    	return false;
    });


});