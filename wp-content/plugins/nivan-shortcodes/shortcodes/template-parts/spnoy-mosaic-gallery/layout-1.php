<?php
	global $ss_prefix;
	$class = array();
	$style = array();
	$target = "";

	if ( !empty($layout1_grid_sizer) ) {
		$class[] = "ss-tile-grid-sizer";
	}
	if ( !empty($tiles_gallery_caption) ) {
		$class[] = "has-caption";
	}
	if ( !empty($tiles_gallery_always_hover) ) {
		$class[] = "only-hover";
	}
	if ( !empty($tiles_gallery_lightbox_hover) ) {
		$class[] = "lightbox-hover";
	}
	if ( !empty($tiles_gallery_new_tab) ) {
		$target = "_blank";
	}

	$style[] = "background-color:" . $tiles_gallery_bg_color . ";";
	$style[] = "color:" . $tiles_gallery_text_color . ";";

	$html_class = implode(' ', $class);
	$html_style = implode(' ', $style);

	$thumbnail = rwmb_meta( "{$ss_prefix}portfolio_thumbnail",  "type=image&size=spnoy-mosaic-gallery-layout-1" );
	$thumbnail = array_shift($thumbnail);

?>
<div class="ss-tile has-layout-1 <?php echo $html_class; ?>" >

	<?php if ( !empty($tiles_gallery_complete_link) ) : ?>
	<a class="ss-tile-link" href="<?php echo $link_to; ?>" target="<?php echo $target; ?>">
	<?php endif; ?>
	
		<?php if ( empty($tiles_gallery_always_hover) ) : ?>
		<figure class="ss-tile-bg">
			<?php echo '<img src="' . $thumbnail['url'] . '" width="' . $thumbnail['width'] . '" height="' . $thumbnail['height'] . '" alt="' . $thumbnail['alt'] . '" />'; ?>
		</figure>
		<?php endif; ?>

		<?php if ( !empty($tiles_gallery_caption) ) : ?>
		<div class="ss-tile-caption valign">
			<span style="color: <?php echo $tiles_gallery_caption_color; ?>">
				<?php
					echo $tiles_gallery_caption;
				?>
			</span>
		</div>
		<?php endif; ?>

		<?php if ( !empty($tiles_gallery_hover) || !empty($tiles_gallery_lightbox_hover) ) : ?>
			<?php if ( !empty($tiles_gallery_lightbox_hover) ) : ?>

				<div class="ss-tile-content" style="<?php echo $html_style; ?> text-align:center;">
					<div class="valign" style="height:100%;">
						<div>
							<a class="ss-tile-expand item-format <?php echo $lightbox_class; ?>" href="<?php echo $lightbox_url; ?>">
	                        	<?php if ( $lightbox_class == 'mfp-image') : ?>
	                            	<span class="icon-expand2" aria-hidden="true"></span>
	                            <?php else: ?>
	                            	<span class="icon-play2" aria-hidden="true"></span>
	                            <?php endif; ?>
	                        </a>
							<h2 class="ss-tile-expand-title" ><a href="<?php echo $link_to; ?>" target="<?php echo $target; ?>"><?php echo $tiles_gallery_hover; ?></a></h2>
						</div>
					</div>
				</div>

			<?php else: ?>

				<div class="ss-tile-content" style="<?php echo $html_style; ?>">
					<span><?php echo $tiles_gallery_hover; ?></span>
					<?php if ( !empty($tiles_gallery_readmore) ) : ?>
					<a href="<?php echo $link_to; ?>" class="ss-tile-readmore" target="<?php echo $target; ?>"><?php _e("Read more", "spnoy") ?></a>
					<?php endif; ?>
				</div>

			<?php endif; ?>
		<?php endif; ?>

	<?php if ( !empty($tiles_gallery_complete_link) ) : ?>
	</a>
	<?php endif; ?>

</div>
