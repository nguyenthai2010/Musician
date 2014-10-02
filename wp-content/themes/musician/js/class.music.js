// JavaScript Document
var bMusic = (function() {
	// PARAMATER
	$labels = jQuery('#music-group label.musiccat');
	$ = jQuery;
	// INIT 
	function init(){
		createScroll();
		initEvent();
		displaymusic('#mc_favorites');
	}
	
	function initEvent(){
		$labels.click(function(e) {
			displaymusic( '#' + jQuery(this).attr('id') );
        });
	}
	
	// FUNCTIONS
	function createScroll(){
		jQuery("#music-list").mCustomScrollbar();
	}
	
	function displaymusic(divID){
		$this = $(divID);
		$labels.removeClass('radio-input-checked');
		$this.addClass('radio-input-checked');
		
		// display list music
		var value = $this.attr('value');
		var count = 1;
		$('#music-list .row-audio').each(function(index, element) {
			var cat = String( $(this).attr('cat'));
			if (cat.indexOf(value) < 0)
				$(this).css('display','none');
			else{
				$(this).css('display','table');	
				$(this).children('.no').html(count);
				count ++ ;
			}
        });
		
		
	}
	
	// RETURN
	return {
		init:init
	}
	
})();		
