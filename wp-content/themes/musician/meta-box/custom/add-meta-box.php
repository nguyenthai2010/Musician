<?php
$prefix = '_mt_';
global $meta_boxes;
$meta_boxes = array();

$meta_boxes[] =array(
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
			'type'             => 'plupload_image',
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


/**
 * Register meta boxes
 *
 * @return void
 */
function register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'register_meta_boxes' );
