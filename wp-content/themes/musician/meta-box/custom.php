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
				'name'             => 'Composer',
				'id'               => "{$prefix}credit_composer",
				'type'             => 'text',
			),
			array(
				'name'             => 'Director',
				'id'               => "{$prefix}credit_director",
				'type'             => 'text',
			),
			array(
				'name'             => 'Banner',
				'id'               => "{$prefix}credit_banner",
				'type'             => 'file',
				'max_file_uploads' => 1
			),
			array(
				'name'             => 'Mp3 file Name',
				'id'               => "{$prefix}credit_mp3_name",
				'type'             => 'textarea',
				'max_file_uploads' => 1
			),
			array(
				'name'             => 'Mp3 file',
				'id'               => "{$prefix}credit_mp3",
				'type'             => 'file',
				'max_file_uploads' => 1
			)
			
		 )
	);
		
    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'add_metaboxes_credits' );
