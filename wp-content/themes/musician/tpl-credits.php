<?php
	$args_credits = array(
		'post_type' 	 => 'post',
		'posts_per_page' =>  1 ,
		'order'			 => 'asc'
	);
	$query_credits = get_posts($args_credits);
?>
<section id="credits" class="credits" style="background-color:#1c140c; color: #fff; background-size: cover; padding-top: 60px; padding-bottom: 75px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-header">
                    <div class="section-header-inner">
                        <div class="section-heading-left-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                        <h1 class="section-heading ss-effect" data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                            <span>CREDITS</span>
                        </h1>
                        <div class="section-heading-right-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                    </div>
                </div>

                <div class="section-content ss-typography">
					<div class="row">
		            	<div class="col-sm-12">
		                <div class="section-content ss-typography">
		                    <div class="row">
		                    	<?php
		                    		foreach ( $query_credits as $credit ) {
		                    			//print_r($credit);
		                    			//$urlThumb = wp_get_attachment_url( get_post_thumbnail_id($slider->ID) );
		                    			$composer = get_post_meta($credit->ID, '_mt_credit_composer', true);
										$director = get_post_meta($credit->ID, '_mt_credit_director', true);
										$urlBanner = get_post_meta($credit->ID, '_mt_credit_banner', true);
										$banner_img = wp_get_attachment_image_src( $urlBanner, 'full' );
										$mp3FileName = get_post_meta($credit->ID, '_mt_credit_mp3_name', true);
										$mp3File = get_post_meta($credit->ID, '_mt_credit_mp3', true);
										$videoID = get_post_meta($credit->ID, 'video_url', true);
										
		                    	?>
		                    	<div class="col-sm-5 col-6-1 ss-effect" data-ss-effect="fade-from-right" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
		                    		<div class="box-banner">
		                    			<img src="<?php echo $urlBanner;?>"/>
		                    		</div>
		                    	</div>
		                    	<div class="col-sm-7 col-6-2 ss-effect" data-ss-effect="fade-from-right" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
		                    		<div class="credits_details">
		                    			<h3><?php echo $credit->post_title;?></h3>
		                    			<span class="composer">
		                    				Credit: <?php echo $composer;?>
		                    			</span>
		                    			<span class="director">
		                    				Director: <?php echo $director;?>
		                    			</span>
		                    			<div class="credits_desc">
		                    				<?php echo $credit->post_content;?>
		                    			</div>
		                    			<div class="credits_controls">
		                    				<a href="#" class="previous"></a>
		                    				<a href="#" class="close"></a>
		                    				<a href="#" class="next"></a>
		                    			</div>
		                    			<div class="box-sound">
		                    				<div class="row_sound title">
		                    					<div class="col-1 col">
			                    					#
			                    				</div>
			                    				<div class="col-2 col">
			                    					TITLE
			                    				</div>
			                    				<div class="col-3 col">
			                    					TIME
			                    				</div>
			                    				<div class="col-3 col">
			                    					ID
			                    				</div>
		                    				</div>
		                    				<div class="row_sound song_row">
		                    					<div class="col-1 col">
				                    					1
				                    			</div>
				                    			<div class="col-2 col">
				                    				<div id="mp3File" class="col2mp3" data-song="<?php echo $mp3File;?>" data-title="<?php echo $mp3FileName;?>">
				                    					<div id="jquery_jplayer_2" class="jp-jplayer"></div>
														<div id="jp_container_2" class="jp-audio">
														    <div class="jp-type-single">
														        <div class="jp-gui jp-interface">
														            <div class="jp-controls">
															        	<a href="javascript:;" class="jp-play" tabindex="1"><span class="song-n jp-title"></span></a>
															        	<a href="javascript:;" class="jp-pause" tabindex="1"><span class="song-n jp-title"></span></a>
															        </div>	
															        <div class="col-3 col" id="credits_duration">
															        	<div class="jp-duration"></div>
			                    									</div>
															            
														        </div>
														    </div>
														</div>
				                    				</div>
												</div>
		                    					
			                    				<div class="col-3 col">
			                    					TGS05
			                    				</div>
		                    					
		                    				</div>
		                    			</div>
		                    			<div class="box-video">
		                    				<div class="videoframe">
		                    					<?php
													echo wp_oembed_get( 'http://www.player.vimeo.com/video/' . $videoID ); 
		                    					?>
		                    				</div>
		                    			</div>
		                    		</div>
		                    	</div>
		                    	<?php }?>
		                    </div>
		               </div>
		           </div>
                </div>



            </div>

        </div>
    </div>
</section>