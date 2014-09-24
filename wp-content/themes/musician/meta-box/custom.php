<?php
function add_metaboxes_page( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['page_description'] = array(
        'id' => 'page_description',
        'title' => 'Description',
        'pages' => array('page'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => '',
                'desc' => '',
                'id' => $prefix . 'page_description_text',
                'type' => 'wysiwyg'
            ),
        ),
    );

    return $meta_boxes;
}
//add_filter( 'cmb_meta_boxes', 'add_metaboxes_properties' );

