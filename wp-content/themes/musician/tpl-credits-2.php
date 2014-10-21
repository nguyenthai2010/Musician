<section id="credits-2" class="bgfullscreen credits last-works dark-color" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" data-bottom-top="background-position: 50% 50px;" style="background: url(images/credits/credits_bg.jpg) no-repeat center center; color: #fff;background-size: cover; background-attachment:fixed; padding-top: 0px; padding-bottom: 120px">
    <div class="bgdotHome"></div>
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
            </div>
        </div>
    </div>
    <div class="section-content ss-typography">

        <div class="ss-testimonial-slider ss-effect" data-ss-effect="scale-down" data-ss-effect-speed="1" data-ss-effect-delay="0.4" data-ss-effect-offset="1">
            <div class="ss-credits-frame uneven">
                 <?php
                	$args_credits_2 = array(
						'post_type' 	 => 'post',
						'posts_per_page' =>  -1 ,
						'order'			 => 'desc'
					);
					$query_credits_2 = get_posts($args_credits_2);
					$i = 0;
					$j = 1;
	                foreach ( $query_credits_2 as $credit_2 ) {
	                	$img = wp_get_attachment_image( get_post_thumbnail_id($credit_2->ID),'medium' );
						
						$j++;
						
                ?>

			    <div class="portfolio-item video">
			        <div class="inner-container">
			            <figure class="portfolio-item-image">
			            	<div class="loading-credit"><div class="shadow"></div><span><img src="images/spiffygif_24x24.png"/></span></div>
			                <a class="chooseLink" id="<?php echo $credit_2->ID;?>" href="javascript:void(0);">
			                    <?php echo $img;?>
			                </a>
			            </figure>
			        </div>
			    </div>
        		<?php  } ?>
            </div>
            
        </div>

    </div>
    
</section>

