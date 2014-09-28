// JavaScript Document
var bAudios = (function() {
	// PARAMATER
	
	// INIT 
	function init(){
		createList1();
		playFileCredits();
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
	
	function playFileCredits() {
		var song = jQuery('#mp3File').attr('data-song');
		var title = jQuery('#mp3File').attr('data-title');
		jQuery("#jquery_jplayer_2").jPlayer({
	        ready: function(event) {
	            jQuery(this).jPlayer("setMedia", {
	                title: title,
	                mp3: song
	            });
	        },
	        swfPath: "http://jplayer.org/latest/js",
	        supplied: "mp3",
	        cssSelectorAncestor: '#jp_container_2',
	    });
	    var duration = jQuery("#jp_container_2 .jp-duration");
	    jQuery('#credits_duration').html(duration);
	}
	// RETURN
	return {
		init:init
	}
	
})();		
