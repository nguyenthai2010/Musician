<?php

	function revcon_change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Credits';
	    $submenu['edit.php'][5][0] = 'Credits';
	    $submenu['edit.php'][10][0] = 'Add Credits';
	    $submenu['edit.php'][16][0] = 'Credits Tags';
	    echo '';
	}
	function revcon_change_post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'Credits';
	    $labels->singular_name = 'Credits';
	    $labels->add_new = 'Add Credits';
	    $labels->add_new_item = 'Add Credits';
	    $labels->edit_item = 'Edit Credits';
	    $labels->new_item = 'Credits';
	    $labels->view_item = 'View Credits';
	    $labels->search_items = 'Search Credits';
	    $labels->not_found = 'No News found';
	    $labels->not_found_in_trash = 'No News found in Trash';
	    $labels->all_items = 'All Credits';
	    $labels->menu_name = 'Credits';
	    $labels->name_admin_bar = 'Credits';
	}
	 
	add_action( 'admin_menu', 'revcon_change_post_label' );
	add_action( 'init', 'revcon_change_post_object' );