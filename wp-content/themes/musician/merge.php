<?PHP
	$mergeJS = false;

	$array = array(
		"js/jquery/jquery.js",		
		"js/jquery/jquery-migrate.min.js",
		"js/TweenMax.min.js",
		"js/bring.js",
		"js/jquery.nav.js",
		"js/jquery.scrollTo.js",
		"js/jquery.easing.1.3.js",
		"js/skrollr.min.js",
		"js/waypoints.min.js",
		"js/contact-form-validate.js",
		"js/jquery.jplayer.min.js",
		"js/jplayer.playlist.js",
		"js/class.audios.js",
		"plugin/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js",
		"js/class.music.js",
		"js/class.homepage.js",
		"js/slick.js",
		"js/class.credits.js",
		"js/custom.js"
	);

	$domainName =  isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] != "" ? $_SERVER['SERVER_NAME'] : "" ;
	if($domainName == "")
		$domainName =  isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != "" ? $_SERVER['HTTP_HOST'] : "" ;

	if($mergeJS){
		if($domainName == "localhost"){
			$str = '';
			foreach ($array as $value) {
				$str .= file_get_contents(get_template_directory().'/'.$value);
			}
			
			if ($fp = fopen(get_template_directory().'/'."all-src.js", "w")) {
				fputs( $fp, $str, strlen( $str ) );
				fclose( $fp );
				$error_msg = 'updated complete.';
			} else {
				$error_msg = "error update";
			}	
			$min_documentRoot = substr(__FILE__, 0, -9);
			exec('jsmin <"'.$min_documentRoot.'all-src.js" >"'.$min_documentRoot.'all.js"');
		}
?>
<script src="all.js"></script>
<?PHP			
		
	}
	else{
		foreach ($array as $value) {
?>
<script src="<?php echo $value ?>"></script>
<?PHP			
		}		
	}
?>