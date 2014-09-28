<?php
	$args_music = array(
		'post_type' 	 => 'music'
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
                    <div class="portfolio-button-group center-align ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
<?php 
$terms = get_terms( 'music-tax' );
//print_r($terms);
foreach ( $terms as $term ) {
    $term_link = get_term_link( $term );
    if ( is_wp_error( $term_link ) ) {
        continue;
    }

	echo '<label><input type="radio" name="portfolio-radios" value=".branding">' . $term->name . ' </label>';
}
?>
                    
                        <!--<label class="radio-input-checked"><input type="radio" name="portfolio-radios" value="*" checked>FAVORITES</label>-->
                    </div>
                    <div class="music-list center-align ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                    	<div class="row-audio top">
                        	<div class="no">#</div>
                            <div class="title">TITLE</div>
                            <div class="time">TIME</div>
                            <div class="id">ID</div>
                        </div>

						<?php
							$number = 0;
                            foreach ( $query_music as $music ) {
                                $number ++;
                                $id = get_post_meta($music->ID, '_cmb__musis_id_text', true);
								$file = get_post_meta($music->ID, '_cmb__musis_path_file', true);
                                
                        ?>
                        <div class="row-audio">
                        	<div class="no"><?php echo $number?></div>
                            <div class="title"><?php echo $music->post_title;?></div>
                            <div class="time"><?php echo $metadata['length']?></div>
                            <div class="id"><?php echo $id?></div>
                        </div>
                        <?php }?>
                    </div>
                </div>
        </div>
    </div>
</section>