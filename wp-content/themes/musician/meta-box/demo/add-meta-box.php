<?php
$prefix = 'tt_';
global $meta_boxes;
$meta_boxes = array();

$meta_boxes[] =array(
   'id'=>'hotel_img',
   'title'=>'Libary Image Hotel',
   'pages'=>array('hotel'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
		array(
			'name'             => 'Image for LiveShow',
			'id'               => "{$prefix}photo_slideshow",
			'type'             => 'thickbox_image',
		     'desc'			   =>'Please upload photo for position slideshow',
			'max_file_uploads' => 1,
		),
		array(
			'name'             => 'Libary Images',
			'id'               => "{$prefix}libary_image_hotel",
			'type'             => 'plupload_image',
			'max_file_uploads' => 10,
		),
	 )
);

$meta_boxes[] =array(
   'id'=>'photo_slideshow',
   'title'=>'Setting room',
   'pages'=>array('hotel'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
      array(
					'name' => 'Special Offers: ',
					'id'   => "{$prefix}hotel_offer",
					'type' => 'checkbox',
					'std'  =>'',
				    'desc'=>'Check to show position Special Offers'
				),
		// TEXT
        array(
			'name'             => 'Price Single Room: ',
			'id'               => "{$prefix}hotel_price_single",
            'std'  =>0,
			'type'             => 'number',
			'desc'=>'Input price for single room ( USD )!'
		),		
     array(
			'name'             => 'Price Double Room: ',
			'id'               => "{$prefix}hotel_price_double",
			'type'             => 'number',
            'std'  =>0,
			'desc'=>'Input price for double room ( USD )!'
		),
		array(
			'name'             => 'Price Adult: ',
			'id'               => "{$prefix}hotel_price_adult",
			'type'             => 'number',
            'std'  =>0,
			'desc'=>'Input price for a Adult ( USD )!'
		),
		array(
			'name'             => 'Number Max Adult: ',
			'id'               => "{$prefix}hotel_number_max_adult",
			'type'             => 'number',
            'std'  =>0,
			'desc'=>'Input price for a Adult ( USD )!'
		),
		array(
			'name'             => 'Price Kid: ',
			'id'               => "{$prefix}hotel_price_kid",
			'type'             => 'number',
            'std'  =>0,
			'desc'=>'Input price for a Kid ( USD )!'
		),
		array(
			'name'             => 'Number Max Kid: ',
			'id'               => "{$prefix}hotel_number_max_kid",
			'type'             => 'number',
            'std'  =>5,
			'desc'=>'Input price for a Adult ( USD )!'
		),
		array(
			'name'             => 'Price Baby: ',
			'id'               => "{$prefix}hotel_price_baby",
			'type'             => 'number',
            'std'  =>5,
			'desc'=>'Input price for a baby ( USD )!'
		),
		array(
			'name'             => 'Number Max Baby: ',
			'id'               => "{$prefix}hotel_number_max_baby",
			'type'             => 'number',
            'std'  =>5,
			'desc'=>'Input price for a Adult ( USD )!'
		),
		array(
			'name'             => 'VAT Description: ',
			'id'               => "{$prefix}hotel_price_vat",
			'type'             => 'wysiwyg',
            'std'  =>'Prices are per room included VAT & service charge.',
			'desc'=>'Input descript for VAT.'
		),
		
	 )
);


$meta_boxes[] =array(
   'id'=>'feedback_info',
   'title'=>'Infor Advance',
   'pages'=>array('feedback'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
		array(
			'name'             => 'Email:',
			'id'               => "{$prefix}feedback_email",
			'type'             => 'text'	
		),
	 )
);
$meta_boxes[] =array(
   'id'=>'tour_setting',
   'title'=>'Infomation Tour',
   'pages'=>array('tour'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
		// CHECKBOX
		array(
					'name' => 'Special Offers: ',
					'id'   => "{$prefix}tour_offer",
					'type' => 'checkbox',
					'std'  =>'',
				    'desc'=>'Check to show position Special Offers'
				),
		array(
					'name' => 'Hot Tour: ',
					'id'   => "{$prefix}hot_tour",
					'type' => 'checkbox',
					'std'  =>'',
				    'desc'=>'Check to show position Hot Tour'
				),
				
				array(
					'name' => 'Departure From: ',
					'id'   => "{$prefix}from",
					'type' => 'text',
					'std'  =>'',
				    'desc'=>''
				),
				
				array(
					'name' => 'Destination :',
					'id'   => "{$prefix}to",
					'type' => 'text',
					'std'  =>'',
				    'desc'=>''
				),
				array(
					'name' => 'Duration :',
					'id'   => "{$prefix}duration",
					'type' => 'text',
					'std'  =>'',
				    'desc'=>''
				),
				array(
					'name' => 'Price :',
					'id'   => "{$prefix}tour_price",
					'type' => 'number',
					'std'  =>1,
				    'desc'=>'Type :USD'
				),
				array(
					'name' => 'Tour code: ',
					'id'   => "{$prefix}tour_code",
					'type' => 'text',
					'std'  =>'',
				    'desc'=>'This is Tour Code'
				),
				array(
					'name' => 'Max Adult: ',
					'id'   => "{$prefix}tour_max_adult",
					'type' => 'number',
					'std'  =>10,
				    'desc'=>'Show to position Boooking Tour '
				),
				array(
					'name' => 'Max Children: ',
					'id'   => "{$prefix}tour_max_children",
					'type' => 'number',
					'std'  =>10,
				    'desc'=>'Show to position Boooking Tour'
				),
	 )
);
$meta_boxes[] =array(
   'id'=>'attraction_info',
   'title'=>'Advanced Information',
   'pages'=>array('attraction'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
		// CHECKBOX
				array(
					'name' => 'Address: ',
					'id'   => "{$prefix}attraction_address",
					'type' => 'text',
					// Value can be 0 or 1
					'std'  =>'',
				    'desc'=>'Please input address into here to show on google map'
				),
	 )
);
$meta_boxes[] =array(
   'id'=>'tour_price',
   'title'=>'Tour Table Price ',
   'pages'=>array('tour'),
   'context' => 'normal',
   'priority' => 'high',
   'fields' => array(
		// CHECKBOX
				array(
					'name' => '',
					'id'   => "{$prefix}tour_table_price",
					'type' => 'wysiwyg',
					// Value can be 0 or 1
					'std'  =>0,
				    'desc'=>''
				),
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