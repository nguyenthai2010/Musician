/** jQuery Document Ready */
	jQuery(function($){
 
		jQuery('.portfolio-item .portfolio-item-image a.chooseLink').on( 'click', function( e ) { 
 
			/** Prevent Default Behaviour */
			e.preventDefault();
 			var url_ajax = $('.contact-form .ajaxurl').val();
			/** Get Post ID */
			var post_id = $(this).attr( 'id' );
			
 			 $.ajaxSetup({
                cache: false
            });
			/** Ajax Call */
			$.ajax({
			  url: url_ajax,
			  type: 'POST',
			  dataType: 'html',
			  data: ({ action:'get_credits', id:post_id }),
			  cache: false
			})
			.done(function( html ) {
			    //var $ajax_response = $( data );
				jQuery( '#credits_ajax' ).html( html );														
				jQuery('#credits').css({'height':'auto','overflow':'inherit','padding':"0 !important"});
				var offset = jQuery('#credits').offset().top;
				jQuery('html, body').animate({
					scrollTop: offset
				}, 500, function(){
					bAudios.playFileCredits();
				});
			});
			
		});
 
});