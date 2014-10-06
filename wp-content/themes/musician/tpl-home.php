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
			<!--data-center="margin-top:0px;" data-top-bottom="margin-top: -100px;" data-bottom-top="margin-top: 100px;"-->
            <div class="ss-home-slider">
                <ul>
                	<?php
                        foreach ($querySlider as $slider) {
                            $i++;
							$url = wp_get_attachment_url( get_post_thumbnail_id($slider->ID) );
							$selling = get_post_meta($slider->ID, '_cmb_selling_slider', true);
                    ?>
                    <li data-transition="fade" data-slotamount="8" >
                        <img src="<?php echo $url;?>" alt=""/>
                        <div class="caption fade start" data-x="0" data-y="0" data-start="0" data-speed="500" style="background-color: rgba(0, 0, 0, 0); background-image: url(images/banner-shadow1.png); background-size: cover; width: 100%; height: 100%; position: absolute; background-position: 50% 50%; background-repeat: no-repeat no-repeat;"></div>
                    </li>
                    <?php } ?>    
                </ul>
            </div>
        </div>

    </div>
</section>