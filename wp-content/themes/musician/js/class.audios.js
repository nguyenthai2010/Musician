// JavaScript Document
var bAudios = (function() {
	// PARAMATER
	$ = jQuery;
	
	var setting = {
		audio 	: "#jquery_jplayer_1",
		number	:	0
	}
	
	
	// INIT 
	function init(){
		initEvent();
	}
	
	function initEvent(){
		$(setting.audio).bind($.jPlayer.event.play, function(event)
		{
			$('.processaudio').removeClass('active');	
			$('.processaudio.display:eq(' +playerAudioPlaylist.current+ ')').addClass('active');
		});

		$(setting.audio).bind($.jPlayer.event.pause, function(event) {
			$('.processaudio').removeClass('active');
		});
		
		$(setting.audio).bind($.jPlayer.event.pause, function(event) {
			$('.processaudio').removeClass('active');
		});
				
		$('.processaudio').click(function(e) {
            var number = parseInt( $(this).children('.no').html() );
			setting.number = number-1;
			//console.log(bMusic.getCreateAudio());
			if(bMusic.getCreateAudio()){ // create list & play audio
				createList();
			} else{ // play only audio
				play();
			}
			
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
		bMusic.setCreateAudio(false);
		// destroy
		try{
			playerAudioPlaylist.remove();
			$(setting.audio).jPlayer("destroy");
		}
		catch(err){}
		
		var bautoplay = false;
		if(!bMusic.get_firsttime()){
			bautoplay = true;
		}
		// create
		var settingMusic = bMusic.getSetting();
		playerAudioPlaylist = new jPlayerPlaylist({
		jPlayer: setting.audio,
		cssSelectorAncestor: "#jp_container_1"
		}, 
			settingMusic.arr_audio
		, 
		{
			swfPath: "js",
			loop: false,
			supplied: "mp3",
			currentIndex:setting.number,
			wmode: "window",
			smoothPlayBar: false,
			keyEnabled: false
		});
		playerAudioPlaylist.option("autoPlay", bautoplay);
		playerAudioPlaylist.select(setting.number);
		
		bMusic.set_firsttime(false);
	}
	
	function play(){
		//console.log(setting.number);
		playerAudioPlaylist.play(setting.number);		
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
