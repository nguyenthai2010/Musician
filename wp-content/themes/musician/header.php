
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Nivan One Page/Multi Page HTML Template">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->

    <!-- Title -->
    <title><?php echo get_bloginfo('name');?></title>
	<base href="<?php echo get_bloginfo('template_url');?>/"></base>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!--[if lte IE 9]
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    <link href="css/all.css?v1" rel="stylesheet" />
    <link href="plugin/css/jplayer.blue.monday.css" rel="stylesheet" />
    <link href="plugin/css/player.css" rel="stylesheet" />
    <link href="plugin/custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <script src="js/modernizr-2.6.2.min.js"></script>
    
    <script type="text/javascript">
		var LANG = "<?php echo $lang ?>";
		var ROOT = "<?php echo ROOT_WS_NAME ?>";
		var iMobile = <?php echo $iMobile == TRUE ? 'true':'false' ?>;
		var iPad = <?php echo $iPad == TRUE ? 'true':'false' ?>;
		var iTablet = <?php echo $iTablet == TRUE ? 'true':'false' ?>;
		var isDesktop = <?php echo $isDesktop == TRUE ? 'true':'false' ?>;
		//alert(iMobile);
	</script>
	<?php
		if($iMobile){
	?>
	<meta name="viewport" content="width=550">
	<?php }?>
</head>

<body id="skrollr-body"  class="ss-home">

    <div id="wrapper">
        <header class="main-header">
            <div class="container">
                <div class="header ss-effect" data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="logo">
                                <a href="index.html" title="NIVAN another OnePage MultiPage theme">
                                    <img src="images/logo.png" alt="NIVAN Logo" /></a>
                            </div>
                            <nav class="main-navigation-container">
                                <ul class="main-navigation" id="main-navigation">
                                    <li><a href="#home">HOME</a></li>
                                    <li><a href="#bio">BIO</a></li>
                                    <li><a href="#credits">CREDITS</a></li>
                                    <li><a href="#music">MUSIC</a></li>
                                    <li><a href="#contact">CONTACT</a></li>
                                </ul>
                                <div class="sound_head">
                                	<div id="jquery_jplayer_1" class="jp-jplayer"></div>
                                	<div id="jp_container_1" class="jp-audio">
						                <div class="jp-type-playlist">
						                    <div class="jp-gui jp-interface">
						                    	<div class="song_playing">
			                                		<div class="jp-current-time"></div>
                                                    <div class="jp-title"></div>
                                                    <span>now playing: </span>
			                                		
			                                		
			                                	</div>
						                        <div class="jp-control-box">
						                        	<ul class="jp-controls">
							                            <li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
							                            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
							                            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
							                            <li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
							                            <li class="mute_sound">
							                            	<a href="javascript:;" class="jp-mute" tabindex="1" title="mute" >mute</a>
							                            	<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>
							                            </li>
							                        </ul>
							                        <div class="jp-progress">
							                            <div class="jp-seek-bar">
							                                <div class="jp-play-bar"></div>
							                            </div>
							                        </div>
						                        </div>
						                    </div>
						                    <div class="jp-playlist">
						                        <ul>
						                            <li></li>
						                        </ul>
						                    </div>
						                    
						                </div>
						            </div>  
                                </div>
                            </nav>
                            <a href="#" class="ss-mobile-menu-button">
                                <span class="icon-menu2" aria-hidden="true"></span>
                                MENU
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>