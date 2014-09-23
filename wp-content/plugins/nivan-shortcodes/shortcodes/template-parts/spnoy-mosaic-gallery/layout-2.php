<?php
	global $ss_prefix;
	$class = array();
	$style = array();
	$target = "";

	if ( !empty($layout2_grid_sizer) ) {
		$class[] = "ss-tile-grid-sizer";
	}
	if ( !empty($tiles_gallery_new_tab) ) {
		$target = "_blank";
	}

	$style[] = "background-color:" . $tiles_gallery_bg_color . ";";
	$style[] = "color:" . $tiles_gallery_text_color . ";";

	$html_class = implode(' ', $class);
	$html_style = implode(' ', $style);

	$thumbnail = rwmb_meta( "{$ss_prefix}portfolio_thumbnail",  "type=image&size=spnoy-mosaic-gallery-layout-2" );
	$thumbnail = array_shift($thumbnail);

?>
<div class="ss-tile has-layout-2 <?php echo $html_class; ?>" style="<?php echo $html_style; ?>">
	<figure class="ss-tile-bg">
		<a href="<?php echo $link_to; ?>" target="<?php echo $target; ?>" >
			<?php echo '<img src="' . $thumbnail['url'] . '" width="' . $thumbnail['width'] . '" height="' . $thumbnail['height'] . '" alt="' . $thumbnail['alt'] . '" />'; ?>
		</a>
	</figure>
	<div class="ss-tile-content">
		<h2 class="ss-tile-content-title">
			<a target="<?php echo $target; ?>" href="<?php echo $link_to; ?>"><?php the_title(); ?></a>
		</h2>
		<p><?php echo ss_trim_char(get_the_excerpt(), 200); ?></p>
		<?php if ( !empty($tiles_gallery_readmore) ) : ?>
		<a target="<?php echo $target; ?>" href="<?php echo $link_to; ?>" class="ss-tile-readmore"><?php _e("Read more", "spnoy") ?></a>
		<?php endif; ?>
	</div>
</div>