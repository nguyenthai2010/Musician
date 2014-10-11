// JavaScript Document
var bMusic = (function() {
	// PARAMATER
	$labels = jQuery('#music-group label.musiccat');

	var setting = {
		create	:	true,
		cat	: '',
		firsttime	: true,
		arr_audio : []
	}
	$ = jQuery;
	// INIT 
	function init(){
		createScroll();
		initEvent();
		displaymusic('#mc_favorites');
	}
	
	function initEvent(){
		$labels.on( "click", function() {	
			displaymusic( '#' + jQuery(this).attr('id') );
			return;
        });
	}
	
	// FUNCTIONS
	function createScroll(){
		jQuery("#music-list").mCustomScrollbar();
	}
	
	function displaymusic(divID){
		$this = $(divID);
		var value = $this.attr('value');
		
		//console.log(value, setting.cat);
		if(value == setting.cat)
			return;

		clearArrayAudio();
		
		$labels.removeClass('radio-input-checked');
		$this.addClass('radio-input-checked');
		
		// display list music
		setting.cat = value;
		var count = 1;
		
		setting.arr_audio = [];
		
		$('#music-list .row-audio').each(function(index, element) {
			var cat = String( $(this).attr('cat'));
			var file = $(this).attr('audio');
			var title = $(this).children('.title').html();
			
			if (cat.indexOf(setting.cat) < 0)
				$(this).removeClass('display');
			else{
				$(this).addClass('display');	
				$(this).children('.no').html(count);
				count ++ ;
				
				// add audio to array
				var music = {
					title:title,
					mp3:file	
				}
				
				setting.arr_audio.push(music);
			}
        });
		
		setting.create = true;
		if(setting.firsttime){
			bAudios.createList();
		}
		
	}
	
	//GET/SET
	function getSetting(){
		return setting; 
	}
	
	function get_firsttime(){
		return setting.firsttime;
	}
	
	function set_firsttime(value){
		setting.firsttime = value;
	}
	
	function setCreateAudio(value){
		setting.create = value;
	}
	
	function getCreateAudio(){
		return setting.create;
	}
	
	//CLEAR
	function clearArrayAudio(){
		while(setting.arr_audio.length > 0) {
			setting.arr_audio.pop();
		} // fastest
		
		//clear others
		//$('.processaudio').removeClass('active');
	}
	
	
	// RETURN
	return {
		init:init,
		getSetting:getSetting,
		get_firsttime:get_firsttime,
		set_firsttime:set_firsttime,
		getCreateAudio:getCreateAudio,
		setCreateAudio:setCreateAudio
	}
	
})();		
