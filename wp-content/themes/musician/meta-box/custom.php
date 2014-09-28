<?php
function add_metaboxes_music( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['music_metabox'] = array(
        'id' => 'music_metabox',
        'title' => 'Information of Music',
        'pages' => array('music'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
				'name' => 'Music ID',
                'desc' => 'Music ID',
                'id'   => $prefix . '_musis_id_text',
                'type' => 'text'
            ),
			array(
				'name' => 'Music File',
                'desc' => 'Music File',
                'id'   => $prefix . '_musis_path_file',
                'type' => 'file'
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'add_metaboxes_music' );
