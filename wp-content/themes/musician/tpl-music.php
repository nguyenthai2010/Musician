<?php
	$args_music = array(
		'post_type' 	 => 'music',
		'posts_per_page' => 100
	);
	
	$query_music = get_posts($args_music);
?>
<section id="music" class="music">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-header">
                    <div class="section-header-inner">
                        <div class="section-heading-left-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                        <h1 class="section-heading ss-effect" data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                            <span>Music</span>
                        </h1>
                        <div class="section-heading-right-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                    </div>
                </div>

                <div class="section-content ss-typography">
                    <div id="music-group" class="portfolio-button-group center-align ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
<?php 
$argv = array(
                'orderby'       =>  'term_order',
                'hide_empty'    => false
                );
$terms = get_terms('music-tax', $argv);

//print_r($terms);
$count = 0;
foreach ( $terms as $term ) {
    $term_link = get_term_link( $term );
    if ( is_wp_error( $term_link ) ) {
        continue;
    }
	
	$class_active = ' class="musiccat"';
	$id_name = 'mc_'.$term->slug;
	if( $term->slug == 'favorites'){
		$class_active = ' class="musiccat radio-input-checked"';
	}
	
	echo '<label id="'.$id_name.'"'.$class_active.' value="'.$term->slug.'"><input type="radio" name="portfolio-radios" >'.$term->name.'</label>';
	
}
?>
                    </div>
                    <div class="music-list center-align ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                    	<div class="row-audio top">
                        	<div class="no">#</div>
                            <div class="title">TITLE</div>
                            <div class="time">TIME</div>
                            <div class="id">ID</div>
                        </div>
                    </div>    
                    <div id="music-list" class="music-list center-align ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
						<?php
							$number = 0;
                            foreach ( $query_music as $music ) {
                                $number ++;
                                $id = get_post_meta($music->ID, '_cmb__musis_id_text', true);
								$file = get_post_meta($music->ID, '_cmb__musis_path_file', true);
                                $time = get_post_meta($music->ID, '_cmb__musis_time_text', true);
								$term_cats = wp_get_post_terms($music->ID, 'music-tax', array("fields" => "all"));	
								$strCat = '';
								
								foreach ( $term_cats as $detail ) {
									$strCat .= '|'.$detail->slug;
								}
								
                        ?>
                        <div class="row-audio processaudio" audio="<?php echo $file?>" cat="<?php echo $strCat?>" id='music_<?php echo $music->ID;?>' soundid='<?php echo $music->ID;?>'>
                        	<div class="no"><?php echo $number?></div>
                            <div class="title"><?php echo $music->post_title;?></div>
                            <div class="time"><?php echo $time?></div>
                            <div class="id"><?php echo $id?></div>
                        </div>
                        <?php }?>
                    </div>
                </div>
        </div>
    </div>
</section>