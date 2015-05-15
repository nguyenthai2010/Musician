<?php
    $post_bio = get_page_by_path('intro-page',OBJECT,'page');
    //print_r($post_bio);
?>
<section id="bio" class="bio" style="background-color: #fff; color: #133939; padding-top: 85px; padding-bottom: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-header">
                    <div class="section-header-inner">
                        <div class="section-heading-left-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                        <h1 class="section-heading ss-effect" data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                            <span><?php echo $post_bio->post_title;?></span>
                        </h1>
                        <div class="section-heading-right-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                    </div>
                </div>

                <div class="section-content ss-typography">
                	<div class="blog-teaser-wrap">
                        <?php echo $post_bio->post_content;?>
                	</div>
                </div>
        </div>
    </div>
</section>