<?php
function add_metaboxes_music( $meta_boxes ) {
    $prefix = '_cmb_'; // Prefix for all fields
    $meta_boxes['music_metabox'] = array(
        'id' => 'music_metabox',
        'title' => 'Add more information',
        'pages' => array('music'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
				'name' => 'Music ID',
                'id'   => $prefix . '_musis_id_text',
                'type' => 'text'
            ),
			array(
				'name' => 'Time',
                'id'   => $prefix . '_musis_time_text',
                'type' => 'text'
            ),
			array(
				'name' => 'Music File',
                'id'   => $prefix . '_musis_path_file',
                'type' => 'file'
            )
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'add_metaboxes_music' );


function add_metaboxes_credits( $meta_boxes ) {
    $prefix = '_mt_'; // Prefix for all fields
	$meta_boxes['credits_metabox'] =array(
	   'id'=>'credits_mt',
	   'title'=>'Add more information',
	   'pages'=>array('post'),
	   'context' => 'normal',
	   'priority' => 'high',
	   'fields' => array(
			array(
				'name'             => 'Credit',
				'id'               => "{$prefix}credit_composer",
				'type'             => 'text',
			),
			array(
				'name'             => 'Director',
				'id'               => "{$prefix}credit_director",
				'type'             => 'text',
			)
		 )
	);
		
    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'add_metaboxes_credits' );
