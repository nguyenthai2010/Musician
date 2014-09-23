<?php

/*-----------------------------------------------------------------------------------*/
/*	Necessary Includes
/*-----------------------------------------------------------------------------------*/

define('WP_USE_THEMES', false);
require_once('../../../../../../wp-load.php');


/*-----------------------------------------------------------------------------------*/
/*	The Loop
/*-----------------------------------------------------------------------------------*/

?>
<?php
	
	$post_per_page = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
	$paged = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $post_per_page,
		'paged' => $paged,
	);

	$query = new WP_Query($args);

?>

<?php if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post(); ?>
	
	<li class="ss-ajax">
	    <article class="timeline-entry" data-time="<?php the_time('j M'); ?>">
	    	<?php if ( has_post_thumbnail() ) : ?>
	        <figure>
	            <?php the_post_thumbnail( 'blog-masonry-2-col' ); ?>
	        </figure>
	    	<?php endif; ?>
	        <div class="timeline-entry-content">
	            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	            <div class="timeline-entry-desc">
	               	<?php the_content(''); ?>
	            </div>
	            <div class="timeline-entry-meta">
	                <?php comments_popup_link( '0', '1', '%', '', '-' ); ?> <?php _e("Comments", "spnoy"); ?>
	                <span class="ss-separator">|</span>
	                <span class="timeline-entry-cats">
	                   	<?php the_category('<span class="sep">,</span>'); ?>
	                </span>
	            </div>
	        </div>
	    </article>
	    <span class="timeline-entry-time"><span><b><?php the_time('j'); ?></b></span><span class="month"><?php the_time('M'); ?></span></span>
	    <span class="timeline-entry-line"></span>
	</li>

<?php endwhile; ?><?php endif; ?>

<?php wp_reset_query(); ?>