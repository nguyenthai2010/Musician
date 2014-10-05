// JavaScript Document
var credits = (function() {
	// PARAMATER
	$ = jQuery;
	
	// INIT 
	function init(){
		initEvent();
	}
	
	function initEvent(){
		jQuery('.portfolio-item .portfolio-item-image a.chooseLink').on( 'click', function( e ) { 
			loadcontentcredit($(this));
			e.preventDefault();
		});
		
	}
	
	function closeCredits(){
		jQuery('#credits').animate({'height':'0','overflow':'hidden','padding':"0 !important"},300);
 		jQuery( '#credits_ajax' ).html( ' ');
	}
	
	function next($this){
		loadcontentcredit($this);
	}
	
	function prev($this){
		loadcontentcredit($this);
	}
	
	function loadcontentcredit($this){
		//jQuery('.loading-credit').show();
		
		$this.parent().find('.loading-credit').show();
		/** Prevent Default Behaviour */
		
		var url_ajax = $('.contact-form .ajaxurl').val();
		/** Get Post ID */
		var post_id = $this.attr( 'id' );
		
		jQuery('#credits .section-content').css('opacity',0);
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
			jQuery('.loading-credit').hide();
			jQuery('#credits').css({'height':'auto','overflow':'inherit','padding-bottom':"110px!important"});
			jQuery( '#credits_ajax' ).html( html );
			jQuery('.credits .section-content').animate({'opacity':1},500);														
			var offset = jQuery('#credits').offset().top;
			jQuery('html, body').animate({
				scrollTop: offset
			}, 500, function(){
				bAudios.playFileCredits();
			});
		});			
	}
	// RETURN
	return {
		init:init,
		next:next,
		prev:prev,
		closeCredits:closeCredits
	}
	
})();

jQuery(document).ready(function(){
	credits.init();
});	
