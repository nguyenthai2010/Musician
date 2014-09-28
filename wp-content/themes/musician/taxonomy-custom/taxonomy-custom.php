<?php
add_action( 'init', 'create_tax_music');
// create two taxonomies, genres and writers for the post type "book"
function create_tax_music() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Music', 'Music' ),
		'singular_name'     => _x( 'music', 'music' ),
		'search_items'      => __( 'Search music' ),
		'all_items'         => __( 'All music' ),
		'parent_item'       => __( 'Parent music' ),
		'parent_item_colon' => __( 'Parent music' ),
		'edit_item'         => __( 'Edit music' ),
		'update_item'       => __( 'Update music' ),
		'add_new_item'      => __( 'Add music' ),
		'new_item_name'     => __( 'Add music' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'music-tax' ),
	);

	register_taxonomy('music-tax', array( 'music' ), $args );
}