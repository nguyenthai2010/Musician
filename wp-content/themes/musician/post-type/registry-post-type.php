<?php
/*slider*/
//add_action( 'init', 'register_custom_post_slider' );
function register_custom_post_slider() {	
	$news_label = array(
    'name' => _x('Slider', 'Slider'),
    'singular_name' => _x('slider', 'slider'),
    'add_new' => _x('Add New', 'Slider'),
    'add_new_item' => __('Add New'),
    'edit_item' => __('Edit '),
    'new_item' => __('Add New'),
    'all_items' => __('View All'),
    'view_item' => __('View'),
    'search_items' => __('Search'),
    'not_found' =>  __('Not Find'),
    'not_found_in_trash' => __('Not Find in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slider'
  );
  $news= array(
    'labels' => $news_label,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
   'show_in_nav_menus'=>true,
    'query_var' => true,
    'rewrite' =>  array('slug'=>'slider'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,  
    'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/slider.jpg',
  	'taxonomies'		=> array(''),
    'supports' => array('title','editor','thumbnail', 'excerpt'),
    
  ); 
 register_post_type('Slider',$news);
}
