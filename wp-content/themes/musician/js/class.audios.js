// JavaScript Document
var bAudios = (function() {
	// PARAMATER
	
	// INIT 
	function init(){
		createList1();
	}
	
	// FUNCTIONS
	//list 2
	function createList1()
	{
		jQuery("#jquery_jplayer_1").jPlayer({
			ready: function () {
				jQuery(this).jPlayer("setMedia", {
					title: "The second song",
					mp3: "audio/The_second_song.mp3"
				});
			},
			swfPath: "js",
			supplied: "mp3",
			wmode: "window",
			smoothPlayBar: true,
			keyEnabled: false,
			remainingDuration: true,
			toggleDuration: true
		});
		
		new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
		}, [
			{
				title:"The second song",
				mp3:"audio/The_second_song.mp3"
			},
			{
				title:"The first song",
				mp3:"audio/The_first_song.mp3"
			}
		], {
			swfPath: "js",
			supplied: "mp3",
			wmode: "window",
			smoothPlayBar: true,
			keyEnabled: false
		});
	}
	// RETURN
	return {
		init:init
	}
	
})();		
