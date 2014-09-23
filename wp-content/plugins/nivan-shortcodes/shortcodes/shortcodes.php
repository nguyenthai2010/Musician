<?php

/*-----------------------------------------------------------------------------------*/
/*	Clean up Shortcodes
/*-----------------------------------------------------------------------------------*/

add_filter("the_content", "ss_clean_shortcodes");
 
function ss_clean_shortcodes($content) {
 
	// Array of custom shortcodes requiring the cleanup
	$block = join("|", array(
		"ss_alert",
		"ss_button",
		"ss_gap",
		"ss_retina_icon",
		"ss_icon_link",
		"ss_mosaic_gallery",
		"ss_icon_box_slider",
		"ss_icon_box",
		"ss_pricing_table",
		"ss_charts",
		"ss_chart",
		"ss_team",
		"ss_team_member",
		"ss_clients_slider",
		"ss_client",
		"ss_testimonials_slider",
		"ss_testimonial",
		"ss_lightbox",
		"ss_timeline_blog",
		"ss_featured_portfolio",
		"ss_accordions",
		"ss_accordion",
		"ss_toggle",
		"ss_separator",
		"ss_tabs",
		"ss_tab",
		"ss_testimonial_single",
		"ss_fullscreen_video",
		"ss_blog_teaser",
		"one_one",
		"one_half",
		"one_third",
		"one_fourth",
		"two_third",
		"three_fourth",
	));
 
	// Opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// Closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;
 
}


/*-----------------------------------------------------------------------------------*/
/*	Alert Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_alert', 'ss_shortcode_alert');

function ss_shortcode_alert($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'type' => 'warning',
		'icon' => '',
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html = '';

	$html .= '<div class="alert-message ' . $type . '">';
		if ( !empty($icon) ) {
			$html .= '<span class="alert-icon ' . $icon . '"></span>';
		}
		$html .= '<span>' . $content . '</span>';
	$html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Button Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_button', 'ss_shortcode_button');

function ss_shortcode_button($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'title' => '',
		'link' => '#',
		'icon' => '',
		'color' => 'default',
		'size' => 'small',
		'border' => 'no',
		'target' => '',
	), $atts));

	$ss_class = array();
	$ss_data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$ss_class[] = 'ss-effect';
		$ss_data_attr[] = 'data-ss-effect="' . $effect . '"';
		$ss_data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$ss_data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$ss_data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$ss_class = implode(' ', $ss_class);
	$ss_data_attr = implode(' ', $ss_data_attr);

	$border = ( $border == "yes" ) ? "outline" : "" ;

	$html .= '<a class="' . $ss_class .' nivan-button ' . $size . ' ' . $color . ' ' . $border . '" href="' . $link . '" target="' . $target . '" ' . $ss_data_attr . ' >';
		if ( !empty($icon) ) {
			$html .= '<span class="' . $icon . '" aria-hidden="true"></span>';
		}
		$html .= $title;
	$html .= '</a>';

	return $html;
}


/*-----------------------------------------------------------------------------------*/
/*	Gap
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_gap', 'ss_shortcode_gap');

function ss_shortcode_gap($atts, $content = null) {

	extract( shortcode_atts( array(
		'height' 	=> '10',
		'mobile' 	=> 'yes',
	), $atts ) );

	$style = '';
	$class = '';
	if ( !empty($height) ) {
		$style .= 'height: ' . $height . 'px; ';
	}
	if ( $mobile == 'no' ) {
		$class .= 'ss-gap-no-mobile ';
	}

	return '<div class="ss-gap ' . $class . '" style="' . $style . '" ></div>';           
	
}


/*-----------------------------------------------------------------------------------*/
/*	Retina Icon
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_retina_icon', 'ss_shortcode_retina_icon');

function ss_shortcode_retina_icon($atts, $content = null) {

	extract(shortcode_atts(array(
		'name' => '',
		'color' => '#00b688',
		'size' => 'small',
		'content_size' => 'small',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$ss_class = array();
	$ss_data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$ss_class[] = 'ss-effect';
		$ss_data_attr[] = 'data-ss-effect="' . $effect . '"';
		$ss_data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$ss_data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$ss_data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$ss_class = implode(' ', $ss_class);
	$ss_data_attr = implode(' ', $ss_data_attr);

	if ( empty($content) ) {

		$html .= '<span aria-hidden="true" style="float:none; color:' . $color . ';" class="' . $name . ' nivan-icon ' . $size . ' ' . $ss_class . '" ' . $ss_data_attr .' ></span>';

	} else {

		$html .= '<div class="box-icon-container ' . $ss_class . '" ' . $ss_data_attr . '>';
            $html .= '<span aria-hidden="true" style="color:' . $color . ';" class="' . $name . ' nivan-icon ' . $size . '"></span>';
            $html .= '<div class="box-icon-content ' . $content_size . '">' . do_shortcode($content) . '</div>';
        $html .= '</div>';

	}

	return $html;

}

/*-----------------------------------------------------------------------------------*/
/*	Icon Link
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_icon_link', 'ss_shortcode_icon_link');

function ss_shortcode_icon_link($atts, $content = null) {

	extract(shortcode_atts(array(
		'name' => '',
		'link' => '#',
		'size' => 'small',
		'type' => '1',
		'target' => '',
		'effect' => 'none',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	switch ($type) {
		case '1':
			$type = "";
			break;

		case '2':
			$type = "border";
			break;

		case '3':
			$type = "box";
			break;
		
		default:
			$type = "";
			break;
	}

	$html .= '<a target="' . $target . '" href="' . $link . '" class="' . $html_class . ' social-icon-item sii-' . $size . ' sii-' . $type . '" ' . $html_data_attr . ' >';
		$html .= '<span class="' . $name . '" aria-hidden="true"></span>';
	$html .= '</a>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Spnoy Mosaic Gallery
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_mosaic_gallery', 'ss_shortcode_spnoy_mosaic_gallery');

function ss_shortcode_spnoy_mosaic_gallery($atts, $content = null) {

	if ( defined('NIVAN_IS_ACTIVE') ) {

		extract(shortcode_atts(array(
			"number" => '-1',
			"horizontal" => 'no',
			"horizontal_height" => '500',
			"cat_slug" => '',
			"scrollbar_color" => '#00b688',
		), $atts));

		global $ss_prefix;

		$class = '';
		$style = '';
		$html = '';

		if ( $horizontal == 'yes' ) {
			$class .= 'ss-tiles-horizontal';
			$style .= 'height:' . $horizontal_height . 'px;';
		} else {
			$class .= 'ss-tiles-vertical';
		}
		$html .= '<div class="ss-tiles ss-tiles-container ' . $class . '">';
			$html .= '<div class="ss-tiles-inner ss-loading" style="' . $style . '" >';

				$args = array(
					'post_type' => 'portfolio',
					'posts_per_page' => $number,
					'post_status'	=> 'publish',
					'orderby'	=> 'date',
					'order'	=> 'DESC'
				);

				if ( isset( $cat_slug ) && !empty( $cat_slug) ) {
					$cat_slug = explode(',', $cat_slug);
					$args['tax_query'] = array(
						array(
							'taxonomy' => 'portfolio-category',
							'field' => 'slug',
							'terms' => $cat_slug
						)
					);
				}

				$query = new WP_Query($args);
				$selected_layouts = array();
				$layout1_grid_sizer = false;
				$layout2_grid_sizer = false;
				$layout3_grid_sizer = false;
				$layout4_grid_sizer = false;

				if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();
					if ( has_post_thumbnail() ) :
						$tiles_gallery_layout = rwmb_meta("{$ss_prefix}tiles_gallery_layout");
						if ( !in_array($tiles_gallery_layout, $selected_layouts) ) {
							$selected_layouts[] = $tiles_gallery_layout;
						}
					endif;
				endwhile; endif;

				foreach ($selected_layouts as $layout ) {
					if ( in_array("layout-1", $selected_layouts) ) {
						$layout1_grid_sizer = true;
						break;
					} elseif ( in_array("layout-2", $selected_layouts) ) {
						$layout2_grid_sizer = true;
						break;
					} elseif ( in_array("layout-3", $selected_layouts) ) {
						$layout3_grid_sizer = true;
						break;
					} elseif ( in_array("layout-4", $selected_layouts) ) {
						$layout4_grid_sizer = true;
						break;
					}
				}
				

				if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();
					if ( has_post_thumbnail() ) :

						$link_to = rwmb_meta("{$ss_prefix}portfolio_link");
						if ( empty($link_to) ) {
							$link_to = get_permalink();
						}
						$tiles_gallery_layout = rwmb_meta("{$ss_prefix}tiles_gallery_layout");
						$tiles_gallery_caption = rwmb_meta("{$ss_prefix}tiles_gallery_caption");
						$tiles_gallery_caption_color = rwmb_meta("{$ss_prefix}tiles_gallery_caption_color");
						$tiles_gallery_hover = rwmb_meta("{$ss_prefix}tiles_gallery_hover");
						$tiles_gallery_always_hover = rwmb_meta("{$ss_prefix}tiles_gallery_always_hover");
						$tiles_gallery_readmore = rwmb_meta("{$ss_prefix}tiles_gallery_readmore");
						$tiles_gallery_complete_link = rwmb_meta("{$ss_prefix}tiles_gallery_complete_link");
						$tiles_gallery_new_tab = rwmb_meta("{$ss_prefix}tiles_gallery_new_tab");
						$tiles_gallery_bg_color = rwmb_meta("{$ss_prefix}tiles_gallery_bg_color");
						$tiles_gallery_text_color = rwmb_meta("{$ss_prefix}tiles_gallery_text_color");
						$tiles_gallery_lightbox_hover = rwmb_meta("{$ss_prefix}tiles_gallery_lightbox_hover");
						$featured_video = rwmb_meta("{$ss_prefix}portfolio_video");
						if ( !empty($featured_video) ) {
							$lightbox_url = $featured_video;
							$lightbox_class = 'mfp-iframe';
						} else {
							$lightbox_url = wp_get_attachment_url( get_post_thumbnail_id() );
							$lightbox_class = 'mfp-image';
						}

						ob_start();
							include( dirname(__FILE__) . '/template-parts/spnoy-mosaic-gallery/' . $tiles_gallery_layout . '.php');
						$html .= ob_get_clean();
					
					endif;
				endwhile; endif;


			$html .= '</div>';

			if ( $horizontal == 'yes' ) {
				$html .= '<div class="ss-tiles-scrollbar">';
					$html .= '<div style="background-color:' . $scrollbar_color . ';" class="ss-tiles-handle"></div>';
				$html .= '</div>';
			}

		$html .= '</div>';

		return $html;

	}

}


/*-----------------------------------------------------------------------------------*/
/*	Icon Box Slider Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_icon_box_slider', 'ss_shortcode_icon_box_slider');

function ss_shortcode_icon_box_slider($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="ss-iconbox-slider ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= do_shortcode($content);
	$html .= '</div>';

	$html .= '<div class="ss-iconbox-arrows ' . $html_class . '" ' . $html_data_attr . ' >';
	    $html .= '<a class="ss-next-iconbox valign">';
		    $html .= '<span class="icon-arrow-right8" aria-hidden="true"></span>';
	    $html .= '</a>';
	    $html .= '<a class="ss-prev-iconbox valign">';
		    $html .= '<span class="icon-arrow-left16" aria-hidden="true"></span>';
	    $html .= '</a>';
    $html .= '</div>';

    return $html;

}

add_shortcode('ss_icon_box', 'ss_shortcode_icon_box');

function ss_shortcode_icon_box($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'title' => '',
		'link' => '#',
		'icon' => '',
		'type' => '1',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	if ( $type == "2" ) {
		$class[] = "transparent";
	}
	if ( $type == "3" ) {
		$class[] = "transparent inline-icon";
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="ss-iconbox-item ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= '<div class="ss-iconbox-inner">';
			if ( !empty($link) ) {
			$html .= '<a class="ss-iconbox-icon" href="#">';
			} else {
			$html .= '<span class="ss-iconbox-icon" href="#">';
			}
				$html .= '<span class="' . $icon . '" aria-hidden="true"></span>';
			if ( !empty($link) ) {
			$html .= '</a>';
			} else {
			$html .= '</span>';
			}
		    $html .= '<h2>';
		    	if ( !empty($link) ) {
		    	$html .= '<a href="' . $link . '" title="' . $title . '">';
		    	}
					$html .= $title;
				if ( !empty($link) ) {
				$html .= '</a>';
				}
			$html .= '</h2>';
		    $html .= '<p>' . $content . '</p>';
	    $html .= '</div>';
    $html .= '</div>';

    return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Pricing Table Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_pricing_table', 'ss_shortcode_pricing_table');

function ss_shortcode_pricing_table($atts, $content = null) {

	if ( defined('NIVAN_IS_ACTIVE') ) {

		extract(shortcode_atts(array(
			'effect' => '',
			'effect_offset' => '1',
			'effect_speed' => '1',
			'effect_delay' => '0',
			'name' => "",
			'columns' => "",
		), $atts));

		$class = array();
		$data_attr = array();
		$html = "";
		$item_class = "";

		if ( !empty($effect) ) {
			$class[] = 'ss-effect';
			$data_attr[] = 'data-ss-effect="' . $effect . '"';
			$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
			$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
			$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
		}

		switch ($columns) {
			case '2':
				$item_class .= "pricing-2-cols ";
				break;

			case '3':
				$item_class .= "pricing-3-cols ";
				break;

			case '4':
				$item_class .= "pricing-4-cols ";
				break;
			
			default:
				$item_class .= "pricing-3-cols ";
				break;
		}

		$html_class = implode(' ', $class);
		$html_data_attr = implode(' ', $data_attr);

		$args = array(
			'post_type' => 'pricing-table',
			'posts_per_page' => 1,
			'meta_query' => array(
				array(
					'key' => 'pricing_table_name',
					'value' => $name,
				)
			),
		);

		$query = new WP_Query( $args );

		$html .= '<div class="pricing-table-container ' . $html_class . '" ' . $html_data_attr . ' >';
			$html .= '<div class="row">';
				$html .= '<div class="col-sm-12">';
					$html .= '<div class="pricing-cols ' . $item_class . '">';

						if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();

							$pricing_tables = get_post_meta( get_the_id(), 'pricing_table' );
							
							// Pull array items a level up
							
							foreach($pricing_tables as $plans) {
								if ( is_array($plans) ) :
									foreach ($plans as $plan) {
										$item_class = "";
										if ( $plan['featured_switch'] == "on" ) {
											$item_class .= "pricing-col-featured ";
										}
							            $html .= '<div class="pricing-col ' . $item_class . '">';
							                $html .= '<div class="pricing-col-header">';
								                $html .= '<h3 class="pricing-col-header-title">' . $plan['title'] . '</h3>';
								                $html .= '<h4 class="pricing-col-header-amount">';
									                $html .= '<span class="pricing-col-amount">' . $plan['price_unit'] . '' . $plan['price'] . '</span>';
									                $html .= $plan['price_subtitle'];
								                $html .= '</h4>';
							                $html .= '</div>';
							                $html .= '<div class="pricing-col-content">';
								                $html .= '<ul>';
								                	for ($i=1; $i <= 10 ; $i++) { 
								                		if ( !empty($plan['row_' . $i]) ) {
								                			$html .= '<li>' . do_shortcode( $plan['row_' . $i] ) . '</li>';
								                		}
								                	}
								                $html .= '</ul>';
								                if ( $plan['button_switch'] == "on" ) {
								                	$html .= '<a class="pricing-col-button" href="'. $plan['button_link'] . '">' . $plan['button_text'] . '</a>';
								            	}
							                $html .= '</div>';
							            $html .= '</div>';
									}
								endif;
							}

						endwhile; endif;

					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

}


/*-----------------------------------------------------------------------------------*/
/*	Charts Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_charts', 'ss_shortcode_charts');

function ss_shortcode_charts($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<ul class="ss-charts ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= do_shortcode($content);
	$html .= '</ul>';

	return $html;

}

add_shortcode('ss_chart', 'ss_shortcode_chart');

function ss_shortcode_chart($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'percent' => '0',
		'bar_color' => '#ffffff',
		'track_color' => '#999999',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<li class=" ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= '<div class="chart">';
			$html .= '<div class="pie-chart" data-percent="' . $percent . '" data-bar-color="' . $bar_color . '" data-track-color="' . $track_color . '">';
				$html .= '<span>' . $percent .'%</span>';
			$html .= '</div>';
			$html .= '<div class="pie-label">';
				$html .= '<h3>' . $content . '</h3>';
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</li>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Team Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_team', 'ss_shortcode_team');

function ss_shortcode_team($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<ul class="team-members ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= do_shortcode($content);
	$html .= '</ul>';

	return $html;

}

add_shortcode('ss_team_member', 'ss_shortcode_team_member');

function ss_shortcode_team_member($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'image' => '',
		'name' => '',
		'desc' => '',
		'twitter' => '',
		'facebook' => '',
		'linkedin' => '',
		'google_plus' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<li class=" ' . $html_class . '" ' . $html_data_attr . ' >';
        $html .= '<div class="team-member" >';
            $html .= '<div class="team-member-image">';
                $html .= '<img src="' . $image . '" alt="' . $name . '" />';
            $html .= '</div>';
            $html .= '<div class="team-member-overlay">';
                $html .= '<div class="item-overlay-center">';
                    $html .= '<h2>' . $name . '</h2>';
                    $html .= '<p>' . $desc . '</p>';
                    $html .= '<ul class="team-social-icon">';
                    	if ( !empty($facebook) ) {
                		 	$html .= '<li>';
		                        $html .= '<a href="' . $facebook . '" title="facebook">';
			                        $html .= '<span class="icon-facebook" aria-hidden="true"></span>';
		                        $html .= '</a>';
	                        $html .= '</li>';
                    	}
                       	if ( !empty($twitter) ) {
	                        $html .= '<li>';
		                        $html .= '<a href="' . $twitter . '" title="twitter">';
			                        $html .= '<span class="icon-twitter" aria-hidden="true"></span>';
		                        $html .= '</a>';
	                        $html .= '</li>';
                    	}
                    	if ( !empty($linkedin) ) {
	                        $html .= '<li>';
		                        $html .= '<a href="' . $linkedin . '" title="linkedin">';
			                        $html .= '<span class="icon-linkedin" aria-hidden="true"></span>';
		                        $html .= '</a>';
	                        $html .= '</li>';
                    	}
                    	if ( !empty($google_plus) ) {
	                        $html .= '<li>';
		                        $html .= '<a href="' . $google_plus . '" title="google-plus">';
			                        $html .= '<span class="icon-google-plus" aria-hidden="true"></span>';
		                        $html .= '</a>';
	                        $html .= '</li>';
                    	}
                    $html .= '</ul>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';
    $html .= '</li>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Clients Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_clients_slider', 'ss_shortcode_clients_slider');

function ss_shortcode_clients_slider($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="clients-slider ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= do_shortcode($content);
	$html .= '</div>';

	$html .= '<div class="ss-clients-arrows ' . $html_class . '" ' . $html_data_attr . ' >';
        $html .= '<a class="ss-next-clients valign">';
	        $html .= '<span class="icon-arrow-right8" aria-hidden="true"></span>';
        $html .= '</a>';
        $html .= '<a class="ss-prev-clients valign">';
	        $html .= '<span class="icon-arrow-left16" aria-hidden="true"></span>';
        $html .= '</a>';
    $html .= '</div>';

	return $html;

}

add_shortcode('ss_client', 'ss_shortcode_client');

function ss_shortcode_client($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'name' => '',
		'link' => '',
		'image' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="cleint-slide ' . $html_class . '" ' . $html_data_attr . ' >';
        $html .= '<div class="client-slide-image">';
        	if ( !empty($link) ) {
        		$html .= '<a href="' . $link . '">';
        	}
				$html .= '<img src="' . $image . '" alt="' . $name . '" />';
			if ( !empty($link) ) {
        		$html .= '</a>';
        	}
        $html .= '</div>';
    $html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Testimonials Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_testimonials_slider', 'ss_shortcode_testimonials_slider');

function ss_shortcode_testimonials_slider($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="ss-testimonial-slider ' . $html_class . '" ' . $html_data_attr . ' >';

	    $html .= '<div class="ss-testimonial-header">';
			$html .= '<span class="icon-quotes-right" aria-hidden="true"></span>';
		$html .= '</div>';

		$html .= '<div class="ss-testimonial-frame">';
			$html .= '<div class="ss-testimonial-slidee">';
				$html .= do_shortcode($content);
			$html .= '</div>';
		$html .= '</div>';

		$html .= '<div class="ss-testimonial-arrows" >';
			$html .= '<a href="#" class="ss-next-testimonial valign">';
				$html .= '<span class="icon-arrow-right8" aria-hidden="true"></span>';
			$html .= '</a>';
			$html .= '<a href="#" class="ss-prev-testimonial valign">';
				$html .= '<span class="icon-arrow-left16" aria-hidden="true"></span>';
			$html .= '</a>';
		$html .= '</div>';

	$html .= '</div>';

	return $html;

}

add_shortcode('ss_testimonial', 'ss_shortcode_testimonial');

function ss_shortcode_testimonial($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'name' => '',
		'desc' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

    $html .= '<div class="ss-testimonial-item">';
		$html .= '<p>' . $content . '</p>';
		$html .= '<span>- ' . $name . ', <span class="ss-testimonial-skills">' . $desc . '</span></span>';
	$html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Single Lightbox Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_lightbox', 'ss_shortcode_lightbox');

function ss_shortcode_lightbox($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'name' => '',
		'cover' => '',
		'image' => '',
		'video' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="ss-lightbox-single ' . $html_class . '" ' . $html_data_attr . ' >';

		$html .= '<img src="' . $cover . '" alt="' . $name .'" />';

		$html .= '<div class="ss-lightbox-single-overlay">';
		    $html .= '<div class="item-overlay-center">';

		    	if ( !empty($video) ) {
			        $html .= '<a class="item-format mfp-iframe" href="' . $video . '">';
			            $html .= '<span class="icon-play2" aria-hidden="true"></span>';
			        $html .= '</a>';
			    } else {
					$html .= '<a class="item-format mfp-image" href="' . $image . '">';
						$html .= '<span class="icon-expand2" aria-hidden="true"></span>';
					$html .= '</a>';
				}

		    $html .= '</div>';
		$html .= '</div>';

	$html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Timeline Blog
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_timeline_blog', 'ss_shortcode_timeline_blog');

function ss_shortcode_timeline_blog($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'auto_effect' => 'yes',
		'number' => '-1',
		'start_title' => '',
		'start_time' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";
	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}
	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$even_effect = '';
	$odd_effect = '';
	$start_effect = '';
	$loadmore_effect = '';
	$class = '';
	if ( $auto_effect == 'yes' ) {
		$even_effect = ' data-ss-effect="fade-from-right" data-ss-effect-speed="0.6" data-ss-effect-offset="2" data-ss-effect-delay="0.2" ';
		$odd_effect = ' data-ss-effect="fade-from-left" data-ss-effect-speed="0.6" data-ss-effect-offset="2" data-ss-effect-delay="0.2" ';
		$start_effect = ' data-ss-effect="scale-up" data-ss-effect-speed="0.6" data-ss-effect-delay="0.2" ';
		$loadmore_effect = ' data-ss-effect="scale-up" data-ss-effect-speed="0.6" data-ss-effect-delay="0.2" ';
		$class = 'ss-effect';
	}

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $number,
	);

	$query = new WP_Query($args);

	$html .= '<div class="timeline-wrapper ' . $html_class . '" ' . $html_data_attr . ' >';
        $html .= '<div class="timeline-start ' . $class . '" ' . $start_effect . ' >';
			$html .= '<span class="timeline-start-head">' . $start_title . '</span>';
            $html .= '<span class="timeline-start-sub">' . $start_time . '</span>';
        $html .= '</div>';
        $html .= '<ul class="timeline-blog" data-number="' . $number . '">';

			if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();
				
				global $more;
				$tmp_more = $more;
				$more = 0;

				if ( $query->current_post+1 & 1 ) {
					$html .= '<li class="' . $class . '" ' . $odd_effect . ' >';
				} else {
					$html .= '<li class="' . $class . '" ' . $even_effect . ' >';
				}
	                $html .= '<article class="timeline-entry" data-time="' . get_the_time('j M') . '">';
	                	if ( has_post_thumbnail() ) {
	                		$html .= '<figure>';
		                        $html .= get_the_post_thumbnail( get_the_id(), 'blog-masonry-2-col');
		                    $html .= '</figure>';
	                	}
	                    $html .= '<div class="timeline-entry-content">';
	                        $html .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
	                        $html .= '<div class="timeline-entry-desc">';
	                            $html .= get_the_content('');
	                        $html .= '</div>';
	                        $html .= '<div class="timeline-entry-meta">';
	                            $html .= get_comments_number(get_the_id()) . " " . __("Comments", "spnoy");
	                            $html .= '<span class="ss-separator">|</span>';
	                            $html .= '<span class="timeline-entry-cats">';
	                                $html .= get_the_category_list( '<span class="sep">,</span> ', '', get_the_id() );
	                            $html .= '</span>';
	                        $html .= '</div>';
	                    $html .= '</div>';
	                $html .= '</article>';
	                $html .= '<span class="timeline-entry-time"><span><b>' . get_the_time('j') . '</b></span><span class="month">' . get_the_time('M') . '</span></span>';
	                $html .= '<span class="timeline-entry-line"></span>';
	            $html .= '</li>';

            endwhile; endif;

        $html .= '</ul>';
        $html .= '<a href="#" class="timeline-loadmore valign ' . $class . '" ' . $loadmore_effect . ' ><span>' . __("Load More", "spnoy") . '</span></a>';
    $html .= '</div>';

    $more = $tmp_more;

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Featured Portfolio Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_featured_portfolio', 'ss_shortcode_featured_portfolio');

$ss_featured_portfolio_img_size = false;

function ss_shortcode_featured_portfolio($atts, $content = null) {

	if ( defined('NIVAN_IS_ACTIVE') ) {

		// Extract shortcode vars and setup basics
		extract(shortcode_atts(array(
			'effect' => '',
			'effect_offset' => '1',
			'effect_speed' => '1',
			'effect_delay' => '0',
			'number' => '9',
			'columns' => '3',
			'gutter' => 'yes',
			'filter_bar' => 'yes',
			'cat_slug' => '',
			'fullscreen' => 'no',
		), $atts));

		$class = array();
		$data_attr = array();
		$html = "";

		if ( !empty($effect) ) {
			$class[] = 'ss-effect';
			$data_attr[] = 'data-ss-effect="' . $effect . '"';
			$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
			$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
			$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
		}

		$html_class = implode(' ', $class);
		$html_data_attr = implode(' ', $data_attr);

		// Perpare vars to inject into html
		switch ($columns) {
			case '2':
			case '3':
			case '4':
				break;
			
			default:
				$columns = "3";
				break;
		}
		if ( $gutter == "yes" ) {
			$gutter = "";
		} else {
			$gutter = "no";
		}

		// Handle the image sizes using global var, Needed for get_template_part to work properly
		global $ss_featured_portfolio_img_size;
		$ss_featured_portfolio_img_size = 'template-portfolio-' . $columns . 'col';
		if ( $fullscreen == "yes" ) {
			$ss_featured_portfolio_img_size .= "-full";
			$gutter = "no";
		} elseif ( $gutter == "no" ) {
			$ss_featured_portfolio_img_size .= "-nogutter";
		}

		$ss_featured_portfolio_img_size .= ".php";

		// Perpare to Query
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $number,
		);

		if ( !empty( $cat_slug) ) {
			$cat_slug = explode(',', $cat_slug);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'slug',
					'terms' => $cat_slug
				)
			);
		}

		$query = new WP_Query($args);

		// Portfolio Filterbar
		$class = "";
		if ( $fullscreen == "yes" ) {
			$class .= "center-align ";
		}
		$portfolio_filter_bar = ( $filter_bar == "yes" ) ? "1" : "0";
		$terms = get_terms("portfolio-category");
		$count = count($terms);
		if ( $count > 0 && !empty($portfolio_filter_bar) ) :
			$html .= '<div class="portfolio-button-group ' . $class . ' ' . $html_class .'" ' . $html_data_attr . ' >';
		        $html .= '<label class="radio-input-checked"><input type="radio" name="portfolio-radios" value="*" checked>' . __('All', 'spnoy') . '</label>';
					foreach ( $terms as $term ) {
						if ( empty($cat_slug) ) {
							$html .= '<label><input type="radio" name="portfolio-radios" value=".' . $term->slug . '">' . $term->name . '</label>';
						} else if ( in_array( $term->slug, $cat_slug) ) {
							$html .= '<label><input type="radio" name="portfolio-radios" value=".' . $term->slug . '">' . $term->name . '</label>';
						}
					}
		    $html .= '</div>';
		endif;

		// Portfolio Content
		$html .= '<div class="' . $html_class . ' portfolio-items-container portfolio-' . $columns . 'col-' . $gutter . 'gutter filtering-on" ' . $html_data_attr . ' >';
			if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();
				ob_start();
					get_template_part( 'lib/template-parts/portfolio/portfolio' );
				$html .= ob_get_clean();
			endwhile;endif;
			wp_reset_query();
		$html .= '</div>';

		// Return data
		return $html;

	}
}


/*-----------------------------------------------------------------------------------*/
/*	Accordion Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_accordions', 'ss_shortcode_accordions');

function ss_shortcode_accordions($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="accordion-container ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= do_shortcode($content);
	$html .= '</div>';

	return $html;

}

add_shortcode('ss_accordion', 'ss_shortcode_accordion');

function ss_shortcode_accordion($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'title' => '',
		'icon' => 'icon-question4',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="accordion-item ' . $html_class . '" ' . $html_data_attr . ' >';
        $html .= '<div class="accordion-item-header">';
            $html .= '<h3>';
                $html .= '<span class="' . $icon . ' icon" aria-hidden="true"></span>';
                	$html .= $title;
                $html .= '<span class="ss-accordion-arrow icon-arrow-down7"></span>';
            $html .= '</h3>';
        $html .= '</div>';
        $html .= '<div class="accordion-item-desc">';
            $html .= '<p>';
           		$html .= $content;
            $html .= '</p>';
        $html .= '</div>';
    $html .= '</div>';

	return $html;

}

/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_toggle', 'ss_shortcode_toggle');

function ss_shortcode_toggle($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'title' => '',
		'icon' => 'icon-question4',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="toggle-container ' . $html_class . '" ' . $html_data_attr . ' >';
		$html .= '<div class="toggle-item">';
	        $html .= '<div class="toggle-item-header">';
	            $html .= '<h3>';
	                $html .= '<span class="' . $icon . ' icon" aria-hidden="true"></span>';
	                	$html .= $title;
	                $html .= '<span class="ss-toggle-arrow icon-arrow-down7"></span>';
	            $html .= '</h3>';
	        $html .= '</div>';
	        $html .= '<div class="toggle-item-desc">';
	            $html .= '<p>';
	           		$html .= $content;
	            $html .= '</p>';
	        $html .= '</div>';
	    $html .= '</div>';
    $html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Separator Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_separator', 'ss_shortcode_separator');

function ss_shortcode_separator($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'icon' => 'icon-heart3',
		'size' => 'full',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$style = "";
	if ( $size !== "full" ) {
		$style = "width:" . $size . ";";
	}

	$html .= '<div class="ss-sec-separator ' . $html_class . '" style="' . $style . '" ' . $html_data_attr . ' >';
        $html .= '<div class="ss-sec-separator-inner">';
	        $html .= '<div class="ss-sec-separator-left-line"></div>';
	        $html .= '<span class="icon ' . $icon . '" aria-hidden="true"></span>';
            $html .= '<div class="ss-sec-separator-right-line"></div>';
        $html .= '</div>';
    $html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_tabs', 'ss_shortcode_tabs');

function ss_shortcode_tabs($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'type' => '1',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$class = "";
	if ( $type == "2" ) {
		$class .= "borderless ";
	}

	$html .= '<div class="' . $html_class . ' tab-container ' . $class . '" ' . $html_data_attr . ' >';
		$html .= '<ul class="tabs">';
		$html .= '</ul>';
        $html .= do_shortcode($content);
    $html .= '</div>';

	return $html;

}

add_shortcode('ss_tab', 'ss_shortcode_tab');

function ss_shortcode_tab($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'title' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html .= '<div class="tab-pane" data-title="' . $title . '">';
		$html .= '<p>' . do_shortcode($content) . '</p>';
    $html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Testimonial Single Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_testimonial_single', 'ss_shortcode_testimonial_single');

function ss_shortcode_testimonial_single($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'name' => '',
		'desc' => '',
		'type' => '2',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = "";

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if ( $type == "1" ) {
		$html .= '<div class="ss-testimonial-header ' . $html_class . '" ' . $html_data_attr . ' >';
			$html .= '<span class="icon-quotes-right" aria-hidden="true"></span>';
		$html .= '</div>';
	    $html .= '<div class="ss-testimonial-item active ' . $html_class . '" ' . $html_data_attr . ' >';
			$html .= '<p>' . $content . '</p>';
			$html .= '<span>- ' . $name . ', <span class="ss-testimonial-skills">' . $desc .'</span></span>';
		$html .= '</div>';
	} elseif ( $type == "2" ) {
		$html .= '<div class="ss-testimonial-item ss-item-bordered active ' . $html_class . '" ' . $html_data_attr . ' >';
			$html .= '<p>' . $content . '</p>';
			$html .= '<span>- ' . $name .', <span class="ss-testimonial-skills">' . $desc . '</span></span>';
		$html .= '</div>';
	} elseif ( $type == "3" ) {
		$html .= '<div class="ss-testimonial-item ss-item-box active ' . $html_class . '" ' . $html_data_attr . ' >';
			$html .= '<p>' . $content . '</p>';
			$html .= '<span>- ' . $name .', <span class="ss-testimonial-skills">' . $desc . '</span></span>';
		$html .= '</div>';
	}

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Video Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_fullscreen_video', 'ss_shortcode_fullscreen_video');

function ss_shortcode_fullscreen_video($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'with_revslider' => 'yes',
		'mp4' => "",
		'ogv' => "",
		'webm' => "",
		'poster' => "",
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$inline_class = 'ss-videobg-wrapper-with-revslider';
	if ( $with_revslider == 'no' ) {
		$inline_class = '';
	}
	$html = '';
	$html .= '<div class="ss-videobg-wrapper ' . $inline_class . '">';
        $html .= '<div class="ss-videobg-container"';
            $html .= 'data-source-mp4="' . $mp4 . '"';
            $html .= 'data-source-ogv="' . $ogv . '"';
            $html .= 'data-source-webm="' . $webm . '"';
            $html .= 'data-source-poster="' . $poster . '">';
        $html .= '</div>';
        $html .= '<div class="ss-videobg-overlay"></div>';
    $html .= '</div>';

    return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	Blog Teaser
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_blog_teaser', 'ss_shortcode_blog_teaser');

function ss_shortcode_blog_teaser($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'number' => '-1',
		'cat_slug' => '',
	), $atts));

	$class = array();
	$data_attr = array();
	$html = '';

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $number,
	);

	if ( isset( $cat_slug ) && !empty( $cat_slug) ) {
		$cat_slug = explode(',', $cat_slug);
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $cat_slug
			)
		);
	}

	$query = new WP_Query($args);

	$html .= '<div class="blog-teaser-wrap ' . $html_class . '" ' . $html_data_attr . ' >';

		if ( $query->have_posts() ) : while (  $query->have_posts() ) :  $query->the_post();
			if ( has_post_thumbnail(get_the_id()) ) {
				$html .= '<div class="blog-teaser" >';
					$html .= '<div class="blog-teaser-image">';
						$html .= get_the_post_thumbnail( get_the_id(), 'blog-teaser');
			    	$html .= '</div>';
			    	$html .= '<div class="blog-teaser-content">';
						$html .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
						$html .= '<p>' . ss_trim_char( get_the_excerpt(), 200 ) . '</p>';
						$html .= '<div class="blog-teaser-meta">';
				    		$html .= '<span>' . get_the_date() . '</span>';
				    		$html .= '<span class="ss-sep">|</span>';
				    		$html .= '<span class="ss-bold">';
				    			$html .= get_the_category_list( '<span class="sep">,</span> ', '', get_the_id() );
				    		$html .= '</span>';
				    	$html .= '</div>';
			    	$html .= '</div>';
				$html .= '</div>';
			}
		endwhile; endif;

	$html .= '</div>';

	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	One One Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('ss_highlight', 'ss_shortcode_highlight');

function ss_shortcode_highlight($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0',
		'link' => '',
		'target' => '_blank',
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	$html = '';

	if ( !empty($link) ) {
		$html .= '<a class="ss-highlight" target="' . $target . '" href="' . $link . '">' . $content . '</a>';
	} else {
		$html .= '<span class="ss-highlight">' . $content . '</span>';
	}
	
	return $html;

}


/*-----------------------------------------------------------------------------------*/
/*	One One Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('one_one', 'ss_shortcode_one_one');

function ss_shortcode_one_one($atts, $content = null) {

	extract(shortcode_atts(array(
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	return '<div class="ss-twelvecol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';

}


/*-----------------------------------------------------------------------------------*/
/*	One Half Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('one_half', 'ss_shortcode_one_half');

function ss_shortcode_one_half($atts, $content = null) {

	extract(shortcode_atts(array(
		'last' => 'no',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if( $last == 'yes' || $last == 'true' ) {
		return '<div class="ss-sixcol ss-last ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	} else {
		return '<div class="ss-sixcol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	}

}

/*-----------------------------------------------------------------------------------*/
/*	One Third Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('one_third', 'ss_shortcode_one_third');

function ss_shortcode_one_third($atts, $content = null) {

	extract(shortcode_atts(array(
		'last' => 'no',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if( $last == 'yes' || $last == 'true' ) {
		return '<div class="ss-fourcol ss-last ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	} else {
		return '<div class="ss-fourcol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	}

}

/*-----------------------------------------------------------------------------------*/
/*	One Fourth Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('one_fourth', 'ss_shortcode_one_fourth');

function ss_shortcode_one_fourth($atts, $content = null) {

	extract(shortcode_atts(array(
		'last' => 'no',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if( $last == 'yes' || $last == 'true' ) {
		return '<div class="ss-threecol ss-last ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	} else {
		return '<div class="ss-threecol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Two Third Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('two_third', 'ss_shortcode_two_third');

function ss_shortcode_two_third($atts, $content = null) {

	extract(shortcode_atts(array(
		'last' => 'no',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if( $last == 'yes' || $last == 'true' ) {
		return '<div class="ss-eightcol ss-last ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	} else {
		return '<div class="ss-eightcol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Three Fourth Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode('three_fourth', 'ss_shortcode_three_fourth');

function ss_shortcode_three_fourth($atts, $content = null) {

	extract(shortcode_atts(array(
		'last' => 'no',
		'effect' => '',
		'effect_offset' => '1',
		'effect_speed' => '1',
		'effect_delay' => '0'
	), $atts));

	$class = array();
	$data_attr = array();

	if ( !empty($effect) ) {
		$class[] = 'ss-effect';
		$data_attr[] = 'data-ss-effect="' . $effect . '"';
		$data_attr[] = 'data-ss-effect-speed="' . $effect_speed . '"';
		$data_attr[] = 'data-ss-effect-offset="' . $effect_offset . '"';
		$data_attr[] = 'data-ss-effect-delay="' . $effect_delay . '"';
	}

	$html_class = implode(' ', $class);
	$html_data_attr = implode(' ', $data_attr);

	if( $last == 'yes' || $last == 'true' ) {
		return '<div class="ss-ninecol ss-last ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	} else {
		return '<div class="ss-ninecol ' . $html_class . '" ' . $html_data_attr . ' >' . do_shortcode($content) . '</div>';
	}

}


?>