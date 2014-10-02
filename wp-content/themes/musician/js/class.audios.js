// JavaScript Document
var bAudios = (function() {
	// PARAMATER
	$ = jQuery;
	var audio = "#jquery_jplayer_1";
	// INIT 
	function init(){
		initEvent();
	}
	
	function initEvent(){
		//chooseCredits();
		$(audio).bind($.jPlayer.event.play, function(event)
		{
			$('.processaudio').removeClass('active');	
			$('.processaudio.display:eq(' +playerAudioPlaylist.current+ ')').addClass('active');
		});
		
		$('.processaudio').click(function(e) {
            var number = parseInt( $(this).children('.no').html() );
			playerAudioPlaylist.play(number-1);	
			
			$('.processaudio').removeClass('active');
			$(this).addClass('active');
        });

	}
	
	// FUNCTIONS
	
	function numberSlider(){
		jQuery('#total-slider').html(jQuery('.tp-bullets.simplebullets.round .bullet').length);
		
		jQuery('.ss-home-slider').bind("revolution.slide.onchange",function (e,data) {
		  	console.log(data.slideIndex);
		});
		
	}
	//list 2
	var playerAudioPlaylist = null;
	function createList(strCat)
	{		
		// destroy
		try{
			$(audio).jPlayer("destroy");
		}
		catch(err){}
		
		// create
		var settingMusic = bMusic.getSetting();
		var arr = settingMusic.arr_audio;	
		playerAudioPlaylist = new jPlayerPlaylist({
		jPlayer: audio,
		cssSelectorAncestor: "#jp_container_1"
		}, 
			arr
		, {
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
		createList:createList,
		playFileCredits:playFileCredits
	}
	
})();		

jQuery(window).load(function(){
	//bAudios.numberSlider();
});
