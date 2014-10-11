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
	
	// RETURN
	return {
		init:init,
		createList:createList
	}
	
})();		
