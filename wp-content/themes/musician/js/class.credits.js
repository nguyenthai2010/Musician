// JavaScript Document
var credits = (function() {
	// PARAMATER
	$ = jQuery;
	
	// INIT 
	function init(){
		initEvent();
	}
	
	function initEvent(){
		
	}
	
	function closeCredits(){
		jQuery('#credits').animate({'height':'0','overflow':'hidden','padding':"0 !important"},300);
 		jQuery( '#credits_ajax' ).html( ' ');
	}
	// RETURN
	return {
		init:init,
		closeCredits:closeCredits
	}
	
})();		
