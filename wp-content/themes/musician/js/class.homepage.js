// JavaScript Document
var clsHomepage = (function() {
	// PARAMATER
	$ = jQuery;
	
	var setting = {
		current	:	0,
		total	:	0
	}
	
	
	// INIT 
	function init(){
		initEvent();
		createSlider();
	}
	
	function initEvent(){
		$('.tp-leftarrow').click(function(e) {
            prev();
        });
		$('.tp-rightarrow').click(function(e) {
            next();
        });
	}
	
	// SLIDER
	function createSlider(){
		setting.total = $('.ss-home-slider ul li').length - 1;
		$('.ss-home-slider').height($(window).height());
		setting.current = 0;
		ani();
	}
	
	function prev(){
		setting.current--;
		if(setting.current < 0){
			setting.current = setting.total;
		}

		ani();
	}
	
	function next(){
		setting.current++;
		if(setting.current > setting.total){
			setting.current = 0;
		}

		ani();
	}
	
	function ani(){
		$('.ss-home-slider ul li').stop(true,false).animate({opacity:0}, 500);
		$('.ss-home-slider ul li:eq('+ (setting.current) +')').stop(true,false).animate({opacity:1}, 500);

		$('#item-slider').html(setting.current + 1);
		$('#total-slider').html(setting.total + 1);
	}
		
	// RETURN
	return {
		init:init
	}
	
})();		
