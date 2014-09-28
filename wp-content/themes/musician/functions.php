<?php
	//register menu
	function register_menu() {
	  register_nav_menu('menu_top',__( 'menu_top' ));
	  
		register_nav_menus( array(
			'menu_top' => 'Header - Menu'
		) );
	  
	}
	add_action( 'init', 'register_menu' );
	
	//add theme support
	add_theme_support('post-thumbnails',array('post','page','slider'));

	//register meta box
	// Initialize the metabox class
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/meta-box' ) );
	require_once RWMB_DIR . 'meta-box.php';
	include RWMB_DIR.'/custom/add-meta-box.php';
	
	//register post type
	include TEMPLATEPATH.'/post-type/registry-post-type.php';

	//register taxonomy
	include 'taxonomy-custom/taxonomy-custom.php';
	
	//contact
	include 'inc/ajax.php'; 
	include 'email/xtemplate.contact.php';
	
	//change label post
	include 'inc/change_label_post.php'; 
	
	
	function get_page_id_by_slug($slug){
	    global $wpdb;
	    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'page'");
	    return $id;
	}
	function the_slug($id) {
		$post_data = get_post($id, ARRAY_A);
		$slug = $post_data['post_name'];
		return $slug; 
	}
	add_filter('query_vars', 'parameter_queryvars' );
	function parameter_queryvars( $qvars )
	{
		$qvars[] = 'proID';
		return $qvars;
	}