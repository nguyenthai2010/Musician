<?php
/*
Plugin Name: Nivan Custom Post Types
Plugin URI: http://spnoy.com/
Description: Nivan theme's custom post types (Required to be Activated with the Nivan theme)
Author: Spnoy Studio
Author URI: http://spnoy.com/
Version: 1.1.0
*/


/*-----------------------------------------------------------------------------------*/
/*	Custom Post Types
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'spnoy_custom_post_types' );

function spnoy_custom_post_types() {
	
	$default_portfolio_url_slug = "portfolio";
	$portfolio_url_slug = ot_get_option( 'portfolio_url_slug', '' );
	$portfolio_comments_switch = ot_get_option( 'portfolio_comments_switch', 'off' );

	if ( !empty($portfolio_url_slug) ) {
		$default_portfolio_url_slug = $portfolio_url_slug;
	}
	if ( $portfolio_comments_switch == "on" ) {
		$portfolio_supports = array( 'editor', 'excerpt', 'thumbnail', 'title', 'comments' );
	} else {
		$portfolio_supports = array( 'editor', 'excerpt', 'thumbnail', 'title' );
	}

	// Portfolio
	
	$labels_portfolio = array(
		'add_new' => __('Add New', 'spnoy'), __('portfolio', 'spnoy'),
		'add_new_item' => __('Add New Portfolio Post', 'spnoy'),
		'edit_item' => __('Edit Portfolio Post', 'spnoy'),
		'menu_name' => __('Portfolio', 'spnoy'),
		'name' => __('Portfolio', 'spnoy'), __('post type general name', 'spnoy'),
		'new_item' =>  __('New Portfolio Post', 'spnoy'),
		'not_found' =>  __('No portfolio posts found', 'spnoy'),
		'not_found_in_trash' =>  __('No portfolio posts found in Trash', 'spnoy'), 
		'parent_item_colon' => '',
		'singular_name' => __('Portfolio Post', 'spnoy'), __('post type singular name', 'spnoy'),
		'search_items' => __('Search Portfolio Posts', 'spnoy'),
		'view_item' => __('View Portfolio Post', 'spnoy'),
	);
	$args_portfolio = array(
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'labels' => $labels_portfolio,
		'menu_position' => 5,
		'public' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'show_in_menu' => true, 
		'show_ui' => true, 
		'supports' => $portfolio_supports,
		'singular_label' => 'Portfolio',
		'rewrite' => array( 'slug' => $default_portfolio_url_slug ),
	);

	register_post_type( 'portfolio', $args_portfolio );


	// Pricing Tables
	
	$labels_prcing = array(
		'add_new' => __('Add New', 'spnoy'), __('pricing', 'spnoy'),
		'add_new_item' => __('Add New Prcing Table', 'spnoy'),
		'edit_item' => __('Edit Prcing Table', 'spnoy'),
		'menu_name' => __('Prcing Tables', 'spnoy'),
		'name' => __('Prcing Tables', 'spnoy'), __('post type general name', 'spnoy'),
		'new_item' =>  __('New Prcing Table', 'spnoy'),
		'not_found' =>  __('No Prcing Table found', 'spnoy'),
		'not_found_in_trash' =>  __('No Prcing Table found in Trash', 'spnoy'), 
		'parent_item_colon' => '',
		'singular_name' => __('Prcing Table', 'spnoy'), __('post type singular name', 'spnoy'),
		'search_items' => __('Search Prcing Tables', 'spnoy'),
		'view_item' => __('View Prcing Table', 'spnoy'),
	);
	$args_portfolio = array(
		'capability_type' => 'post',
		'has_archive' => false, 
		'hierarchical' => false,
		'labels' => $labels_prcing,
		'menu_position' => 5,
		'public' => true,
		'publicly_queryable' => true,
		'query_var' => false,
		'show_in_menu' => true, 
		'show_ui' => true, 
		'supports' => array( 'title' ),
		'singular_label' => 'Pricing Table',
	);

	register_post_type( 'pricing-table', $args_portfolio );

}


/*-----------------------------------------------------------------------------------*/
/*	Custom Taxonomies
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'spnoy_custom_taxonomies' );

function spnoy_custom_taxonomies() {

	$default_portfolio_url_slug = "portfolio";
	$portfolio_url_slug = ot_get_option( 'portfolio_url_slug', '' );
	
	if ( !empty($portfolio_url_slug) ) {
		$default_portfolio_url_slug = $portfolio_url_slug;
	}

	// Portfolio Categories	
	
	$labels = array(
		'add_new_item' => __('Add New Category', 'spnoy'),
		'all_items' => __('All Categories', 'spnoy'),
		'edit_item' => __('Edit Category', 'spnoy'), 
		'name' => __('Portfolio Categories', 'spnoy'), __('taxonomy general name', 'spnoy'),
		'new_item_name' => __('New Genre Category', 'spnoy'),
		'menu_name' => __('Portfolio Categories', 'spnoy'),
		'parent_item' => __('Parent Category', 'spnoy'),
		'parent_item_colon' => __('Parent Category:', 'spnoy'),
		'singular_name' => __('Portfolio Category', 'spnoy'),  __('taxonomy singular name', 'spnoy'),
		'search_items' => __('Search Categories', 'spnoy'),
		'update_item' => __('Update Category', 'spnoy'),
	);
	register_taxonomy( 'portfolio-category', array( 'portfolio' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => array( 'slug' => $default_portfolio_url_slug . '-category' ),
	));
	
	
	// Portfolio Tags	
	
	$labels = array(
		'add_new_item' => __('Add New Tag', 'spnoy'),
		'all_items' => __('All Tags', 'spnoy'),
		'edit_item' => __('Edit Tag', 'spnoy'), 
		'name' => __('Portfolio Tags', 'spnoy'), __('taxonomy general name', 'spnoy'),
		'new_item_name' => __('New Genre Tag', 'spnoy'),
		'menu_name' => __('Portfolio Tags', 'spnoy'),
		'parent_item' => __('Parent Tag', 'spnoy'),
		'parent_item_colon' => __('Parent Tag:', 'spnoy'),
		'singular_name' => __('Portfolio Tag', 'spnoy'),  __('taxonomy singular name', 'spnoy'),
		'search_items' => __('Search Tags', 'spnoy'),
		'update_item' => __('Update Tag', 'spnoy'),
	);
	register_taxonomy( 'portfolio-tags', array( 'portfolio' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'show_ui' => true,
		'rewrite' => array( 'slug' => $default_portfolio_url_slug . '-tags' ),
	));
	
}

function ss_rewrite_flush() {
	spnoy_custom_post_types();
	spnoy_custom_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ss_rewrite_flush');


?>