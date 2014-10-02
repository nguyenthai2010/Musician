// JavaScript Document
var bAudios = (function() {
	// PARAMATER
	
	// INIT 
	function init(){
		createList1();
		playFileCredits();
		chooseCredits();
		
	}
	
	// FUNCTIONS
	
	function numberSlider(){
		jQuery('#total-slider').html(jQuery('.tp-bullets.simplebullets.round .bullet').length);
		
		jQuery('.ss-home-slider').bind("revolution.slide.onchange",function (e,data) {
		  	console.log(data.slideIndex);
		});
		
	}
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
		//console.log(song);
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
	        cssSelectorAncestor: '#jp_container_2'
	    });
	}
	function chooseCredits(){
		jQuery('.chooseLink').click(function(){
			jQuery('#credit_choose').empty();
			oldIndex = jQuery(this).index(); 
			//jQuery(this).parent().find('.credit_select').prependTo();
			//jQuery('#credit_choose')
			var parent = jQuery(this).parent().find('.credit_select');
			jQuery('#box-banner img').attr('src',jQuery(parent).find('.banner').html());
			jQuery('#postTitle').html(jQuery(parent).find('.title').html());
			jQuery('#descriptionID').html(jQuery(parent).find('.description .credits_desc').html());
			jQuery('#composerID').html(jQuery(parent).find('.composer').html());
			jQuery('#directorID').html(jQuery(parent).find('.director').html());
			jQuery('#mp3File').attr('data-song',jQuery(parent).find('.m3file').html());
			
			if(jQuery(parent).find('.m3file').html() == ''){
				jQuery('#box-sound').hide();
			}else{
				jQuery('#box-sound').show();
			}
			jQuery('#mp3File').attr('data-title',jQuery(parent).find('.m3fileName').html());
			jQuery('#mp3ID').html(jQuery(parent).find('.mp3ID').html());
			jQuery('.videoframe').html(jQuery(parent).find('.videoID').html());
			
			jQuery('#jquery_jplayer_2 audio').attr('src',jQuery(parent).find('.m3file').html());
			jQuery('#jp_container_2 .song-n').html(jQuery(parent).find('.m3fileName').html());
			
			
			jQuery('#credits').css({'height':'auto','overflow':'inherit','padding':"0 !important"});
			var offset = jQuery('#credits').offset().top;
			jQuery('html, body').animate({
				scrollTop: offset
			}, 500, function(){
				playFileCredits();
			});
		});
	}
	// RETURN
	return {
		init:init,
		numberSlider:numberSlider
	}
	
})();		

jQuery(window).load(function(){
	//bAudios.numberSlider();
});
