<?php

/*
	Plugin Name: Nivan Shortcodes
	Plugin URI: http://spnoy.com/
	Description: Nivan theme's shortcodes. (Required to be Activated with the Nivan theme)
	Author: Spnoy Studio
	Author URI: http://spnoy.com/
	Version: 1.2.0
*/


/*-----------------------------------------------------------------------------------*/
/*	Include Shortcodes
/*-----------------------------------------------------------------------------------*/

include_once( dirname(__FILE__) . '/shortcodes/shortcodes.php');

add_filter('widget_text', 'do_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	Include CSS and JS
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'ss_shortcodes_scripts_and_styles');

function ss_shortcodes_scripts_and_styles() {

	// Registering
	wp_register_style( 'nivan-shortcodes', plugins_url( 'css/nivan-shortcodes.css' , __FILE__ ), null, 1.0, 'screen' );
	wp_register_script( 'nivan-shortcodes', plugins_url( 'js/nivan-shortcodes.js' , __FILE__ ), array( 'jquery' ), 1.0, true );
	wp_register_script( 'nivan-timeline-blog-ajax', plugins_url( 'js/nivan-timeline-blog-ajax.js' , __FILE__ ), array( 'jquery', 'nivan-shortcodes' ), 1.0, true );


	// Enqueuing
	wp_enqueue_style( 'nivan-shortcodes' );
	wp_enqueue_script( 'nivan-shortcodes' );
	wp_enqueue_script( 'nivan-timeline-blog-ajax' );

	// Localizing
	$animation_on_mobile_switch = ot_get_option( 'animation_on_mobile_switch', 'off' );

	$ss_shortcode_data = array(
		'animation_on_mobile_switch' => $animation_on_mobile_switch,
	);
	wp_localize_script( 'nivan-shortcodes', 'ss_shortcode_data', $ss_shortcode_data );


	$timeline_blog_ajax_url = plugins_url( 'shortcodes/template-parts/timeline-blog/timeline-blog-ajax-handler.php' , __FILE__ );
	$timeline_blog_done_text = __("Done", "spnoy");

	$ss_timeline_blog_data = array(
		'timeline_blog_ajax_url' => $timeline_blog_ajax_url,
		'timeline_blog_done_text' => $timeline_blog_done_text,
	);
	wp_localize_script( 'nivan-timeline-blog-ajax', 'ss_timeline_blog_data', $ss_timeline_blog_data );

}


/*-----------------------------------------------------------------------------------*/
/*	Add TinyMCE buttons
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'ss_shortcodes_buttons' );

function ss_shortcodes_buttons() {
	if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) {
		add_filter( "mce_external_plugins", "ss_shortcodes_add_buttons" );
		add_filter( 'mce_buttons_3', 'ss_shortcodes_register_buttons_3' );
		add_filter( 'mce_buttons_4', 'ss_shortcodes_register_buttons_4' );
	}
}

function ss_shortcodes_add_buttons( $plugin_array ) {
	$plugin_array['alert'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['button'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['gap'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['retina_icon'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_icon_link'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_mosaic_gallery'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_icon_box_slider'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_icon_box'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_pricing_table'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_charts'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_team'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_clients_slider'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_testimonials_slider'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_lightbox'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_timeline_blog'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_featured_portfolio'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_accordions'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_toggle'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_separator'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_tabs'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_testimonial_single'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_fullscreen_video'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_blog_teaser'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['ss_highlight'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['one_one'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['one_half'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['one_third'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['one_fourth'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['two_third'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	$plugin_array['three_fourth'] = plugins_url( 'tinymce/tinymce.js' , __FILE__ );
	
	return $plugin_array;
}

function ss_shortcodes_register_buttons_3( $buttons ) {
	array_push(
		$buttons,
		'alert',
		'button',
		'gap',
		'retina_icon',
		'ss_icon_link',
		'ss_mosaic_gallery',
		'ss_icon_box_slider',
		'ss_icon_box',
		'ss_pricing_table',
		'ss_charts',
		'ss_team',
		'ss_clients_slider',
		'ss_testimonials_slider',
		'ss_lightbox',
		'ss_timeline_blog',
		'ss_featured_portfolio',
		'ss_accordions',
		'ss_toggle'
	);
	return $buttons;
}
function ss_shortcodes_register_buttons_4( $buttons ) {
	array_push(
		$buttons,
		'ss_separator',
		'ss_tabs',
		'ss_testimonial_single',
		'ss_fullscreen_video',
		'ss_blog_teaser',
		'ss_highlight',
		'one_one',
		'one_half',
		'one_third',
		'one_fourth',
		'two_third',
		'three_fourth'
	);
	return $buttons;
}


/*-----------------------------------------------------------------------------------*/
/*	Helper Functions
/*-----------------------------------------------------------------------------------*/

function ss_is_theme_active($theme_name) {
	$theme = wp_get_theme();
	if ($theme_name == $theme->name || $theme_name == $theme->parent_theme) {
	    return true;
	} else {
		return false;
	}
}



?>