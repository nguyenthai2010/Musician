<?php


add_action( 'wp_ajax_get_credits', 'get_credits' );
add_action( 'wp_ajax_nopriv_get_credits', 'get_credits' );
function get_credits() {
 	$id = $_POST['id'];
  /** Made Query */
  	$query_credits = get_post($id);
    $composer = get_post_meta($id, '_mt_credit_composer', true);
	$director = get_post_meta($id, '_mt_credit_director', true);
	$urlBanner = wp_get_attachment_url( get_post_thumbnail_id($id) );
	//$urlBanner = get_post_meta($id, '_mt_credit_banner', true);
	$banner_img = wp_get_attachment_image_src( $urlBanner, 'full' );
	
	$mp3value = get_post_meta($id, 'custom_credits_class_meta_box', true);
	
	$idmp3 = get_post_id($mp3value , 'music');
	$mp3FileName = '';
	$mp3File = get_post_meta($idmp3, '_cmb__musis_path_file', true);
	$mp3Time = get_post_meta($idmp3, '_cmb__musis_time_text', true);
	$mp3No = get_post_meta($idmp3, '_cmb__musis_id_text', true);
	
	if(!empty($mp3File)){
		$mp3FileName = get_the_title($idmp3);
	}
	
	$videoType = get_post_meta($id,'video_type',true);
	$videoID = get_post_meta($id, 'video_url', true);
	$id_prev = get_previous_post_id($id);
	$id_next = get_next_post_id($id);

	$term_cats = wp_get_post_terms($idmp3, 'music-tax', array("fields" => "all"));	
	$strCat = $term_cats[0]->slug;
	
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
    			<?php if(!empty($query_credits->post_content)){?>
    			<div class="credits_desc noborder" >
    				<?php echo $query_credits->post_content;?>
    			</div>
    			<?php }?>
    			<div class="credits_controls">
    				
    				<?php if($id_prev != 0){?>
    				<a href="javascript:void(0);" class="previous prev_credits" id="<?php echo $id_prev;?>" onClick="credits.prev($(this));"></a>
    				<?php }?>
    				<a href="javascript:void(0);" class="close" onclick="credits.closeCredits();"></a>
    				<?php if($id_next != 0){?>
    				<a href="javascript:void(0);" class="next next_credits" id="<?php echo $id_next;?>" onClick="credits.next($(this));"></a>
    				<?php }?>
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
    				<div class="row_sound title audio processaudio" audio="<?php echo $mp3File?>" cat="<?php echo $strCat?>" id="audiocredit_<?php echo $idmp3;?>" onClick="bAudios.playCredit('audiocredit_<?php echo $idmp3;?>')" soundid='<?php echo $idmp3;?>'>
    					<div class="col-1 col">
        					1
        				</div>
        				<div class="col-2 col">
        					<?php echo $mp3FileName;?>
        				</div>
        				<div class="col-3 col">
        					<?php echo $mp3Time;?>
        				</div>
        				<div class="col-3 col">
        					<?php echo $mp3No;?>
        				</div>    					
    					
    				</div>
    			</div>
    			<?php }?>
    			<?php if(!empty($videoID)){?>
    			<div class="box-video">
    				<div class="videoframe">
    					<?php
    						if($videoType == 'vimeo'){
								echo wp_oembed_get( 'http://www.player.vimeo.com/video/' . $videoID );
							}else{
								echo wp_oembed_get( $videoID );
							}
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