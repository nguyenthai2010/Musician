// JavaScript Document
var bMusic = (function() {
	// PARAMATER
	$labels = jQuery('#music-group label.musiccat');

	var setting = {
		cat	: 'favorites',
		arr_audio : []
	}
	$ = jQuery;
	// INIT 
	function init(){
		createScroll();
		initEvent();
		displaymusic('#mc_' + setting.cat);
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
		clearArrayAudio();
		$this = $(divID);
		$labels.removeClass('radio-input-checked');
		$this.addClass('radio-input-checked');
		
		// display list music
		var value = $this.attr('value');
		setting.cat = value;
		var count = 1;
		$('#music-list .row-audio').each(function(index, element) {
			var cat = String( $(this).attr('cat'));
			var file = $(this).attr('audio');
			if (cat.indexOf(setting.cat) < 0)
				$(this).removeClass('display');
			else{
				$(this).addClass('display');	
				$(this).children('.no').html(count);
				count ++ ;
				
				// add audio to array
				var music = {
					title:"The second song",
					mp3:file	
				}
				
				//console.log('aaa:'+ music.mp3);
				setting.arr_audio.push(music);
			}
        });
		
		bAudios.createList();
		
	}
	
	function getSetting(){
		return setting; 
	}
	
	function clearArrayAudio(){
		while(setting.arr_audio.length > 0) {
			setting.arr_audio.pop();
		} // fastest
	}
	
	// RETURN
	return {
		init:init,
		getSetting:getSetting
	}
	
})();		
