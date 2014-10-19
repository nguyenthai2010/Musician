<section id="home" class="home home-slider" style="padding-top: 0; padding-bottom: 0;" >
<?php
	$i = 0;
	$args_slider = array(
		'post_type' 	 => 'slider',
		'posts_per_page' => 5 ,
		'order'			 => 'asc'
	);
	$querySlider = get_posts($args_slider);


?>

    <div class="section-content ss-typography">

        <div class="ss-home-slider-container">
			<div class="ss-total-item">
				<div class="container">
					<div class="ss-box-total">
						<span id="item-slider">1</span>
						<span class="flash"></span>
						<span id="total-slider">3</span>
					</div>
				</div>
			</div>
            <div class="ss-home-slider" data-transition="fade" data-slotamount="8" >
                <ul>
                	<?php
                        foreach ($querySlider as $slider) {
                            $i++;
							$url = wp_get_attachment_url( get_post_thumbnail_id($slider->ID) );
							$selling = get_post_meta($slider->ID, '_cmb_selling_slider', true);
                    ?>
                    <li class="bgfullscreen" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" data-bottom-top="background-position: 50% 50px;" style="background: url('<?php echo $url;?>') no-repeat center center; background-attachment:fixed; background-size: cover; color: #fff; padding-top: 0px; padding-bottom: 120px;">
                    	<div class="bgdotHome"></div>
                    </li>
                    <?php } ?>    
                </ul>
				<div style="position: absolute; top: 50%; margin-top: -20px; left: 20px;opacity:1;" class="tp-leftarrow tparrows default hidearrows"></div>
				<div style="position: absolute; top: 50%; margin-top: -20px; right: 20px; opacity:1;" class="tp-rightarrow tparrows default hidearrows"></div>                
            </div>
        </div>

    </div>
</section>