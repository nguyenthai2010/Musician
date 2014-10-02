<section id="credits-2" class="credits last-works dark-color" style="background: url(images/credits/credits_bg.jpg) no-repeat center center; color: #fff; background-size: cover; padding-top: 0px; padding-bottom: 120px">
    <div class="bgdot"></div>
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
            <div class="ss-testimonial-frame">
                <div class="ss-testimonial-slidee">
                    
                    <div class="ss-testimonial-item">
                        <div class="portfolio-items-container portfolio-5col-nogutter filtering-on ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.4" data-ss-effect-offset="2">
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
				                	$url = wp_get_attachment_url( get_post_thumbnail_id($credit_2->ID) );
									
									
									$j++;
				                	$i++; 
									if($i%6 == 0){
									 echo '</div> </div>
									 	<div class="ss-testimonial-item">
                        <div class="portfolio-items-container portfolio-5col-nogutter filtering-on ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.4" data-ss-effect-offset="2">
									 ';	
									}
		                    ?>
            
						    <article class="portfolio-item video">
						        <div class="inner-container">
						            <figure class="portfolio-item-image">
						                <a class="chooseLink" id="<?php echo $credit_2->ID;?>" href="javascript:void(0);">
						                    <img src="<?php echo $url;?>" alt="" />
						                </a>
						            </figure>
						        </div>
						    </article>
                    		<?php } ?>
                    	</div>
                    </div>
                </div>
            </div>
            <div class="ss-testimonial-arrows ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0.6" data-ss-effect-offset="2">
                <a href="#" class="ss-next-testimonial valign">
                    
                </a>
                <a href="#" class="ss-prev-testimonial valign">
                    
                </a>
            </div>
        </div>

    </div>
    
</section>

