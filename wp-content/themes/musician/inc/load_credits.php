<?php


add_action( 'wp_ajax_get_credits', 'get_credits' );
add_action( 'wp_ajax_nopriv_get_credits', 'get_credits' );
function get_credits() {
 	$id = $_POST['id'];
  /** Made Query */
  	$query_credits = get_post($id);
    $composer = get_post_meta($id, '_mt_credit_composer', true);
	$director = get_post_meta($id, '_mt_credit_director', true);
	$urlBanner = get_post_meta($id, '_mt_credit_banner', true);
	$banner_img = wp_get_attachment_image_src( $urlBanner, 'full' );
	
	$mp3value = get_post_meta($id, 'custom_credits_class_meta_box', true);
	
	$idmp3 = get_post_id($mp3value , 'music');
	$mp3FileName = '';
	$mp3File = get_post_meta($idmp3, '_cmb__musis_path_file', true);
	if(!empty($mp3File)){
		$mp3FileName = get_the_title($idmp3);
	}
	$videoID = get_post_meta($id, 'video_url', true);
	$previous_post = get_previous_post();
	$id_prev = $next_post->id;
	$next_post = get_next_post();
	$id_next = $next_post->id;
	?>
    <div class="row">
    	<div class="col-sm-5 col-6-1 ">
    		<div class="box-banner">
    			<img src="<?php echo $urlBanner;?>"/>
    		</div>
    	</div>
    	<div class="col-sm-7 col-6-2">
    		<div class="credits_details">
    			<h3><?php echo $query_credits->post_title;?></h3>
    			<span class="composer">
    				Credit: <?php echo $composer;?>
    			</span>
    			<span class="director">
    				Director: <?php echo $director;?>
    			</span>
    			<div class="credits_desc noborder" >
    				<?php echo $query_credits->post_content;?>
    			</div>
    			<div class="credits_controls">
    				<a href="javascript:void(0);" class="previous prev_credits" id="<?php echo $id_prev;?>"></a>
    				<a href="javascript:void(0);" class="close" onclick="credits.closeCredits();"></a>
    				<a href="javascript:void(0);" class="next next_credits" id="<?php echo $id_next;?>" ></a>
    			</div>
    			<?php if(!empty($mp3File)){?>
    			<div class="box-sound" id="box-sound">
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
    					
        				<div class="col-3 col" id="mp3ID">
        					<?php echo $idmp3;?>
        				</div>
    					
    				</div>
    			</div>
    			<?php }?>
    			<?php if(!empty($videoID)){?>
    			<div class="box-video">
    				<div class="videoframe">
    					<?php
							echo wp_oembed_get( 'http://www.player.vimeo.com/video/' . $videoID ); 
    					?>
    				</div>
    			</div>
    			<?php }?>
    		</div>
    	</div>
    </div>
  <?php			
  exit;
}