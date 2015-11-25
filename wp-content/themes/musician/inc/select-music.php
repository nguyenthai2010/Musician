<?php
/**
* Plugin Name: Metabox test
*
*/

//add_action( 'add_meta_boxes', 'so_custom_meta_box' );

function so_custom_meta_box($post){
    add_meta_box('so_meta_box', 'Select a song', 'custom_credits_class_meta_box', 'post', 'normal' , 'high');
}

add_action('save_post', 'so_save_metabox');

function so_save_metabox(){

    global $post;
    if(isset($_POST["custom_credits_class"])){
         //UPDATE:
        $meta_element_class = $_POST['custom_credits_class'];

		update_post_meta($post->ID, 'custom_credits_class_meta_box', $meta_element_class);
        //print_r($_POST);

    }
}
function updateFeaturedPost(){

	global $wpdb;
	$wpdb->query('update wp_postmeta set meta_value = "No" where meta_key like "%custom_featured_post_class_meta_box%";');
}
function custom_credits_class_meta_box($post){
    $meta_element_class = get_post_meta($post->ID, 'custom_credits_class_meta_box', true); //true ensures you get just one value instead of an array
   	$args_music = array(
		'post_type' 	 => 'music',
		'posts_per_page' =>  -1 ,
		'order'			 => 'desc'
	);
	$query_music = get_posts($args_music);
    ?>
    <label>Select a song:  </label>
    <select name="custom_credits_class" id="custom_credits_class">
      <option value="0">Select...</option>
      <?php
      	foreach ( $query_music as $music) {
      ?>
      <option value="<?php echo $music->post_name; ?>" <?php selected( $meta_element_class,  $music->post_name ); ?>><?php echo $music->post_title;?></option>
      <?php }?>
    </select>
    <br />
    <?php /*?><label>Featured post type:  </label>
    <select name="custom_featured_post_class_type" id="custom_featured_post_class_type">
      <option value="Big" <?php selected( $meta_element_class_type, 'Big' ); ?>>Big</option>
      <option value="Small" <?php selected( $meta_element_class_type, 'Small' ); ?>>Small</option>
    </select><?php */?>
    <?php
}


function my_acf_load_field( $field )
{
    $args_music = array(
        'post_type' 	 => 'music',
        'posts_per_page' =>  -1 ,
        'order'			 => 'desc'
    );
    $query_music = get_posts($args_music);

    $field['choices'] = array(
        '' => 'Select music...'
    );

    foreach ( $query_music as $music) {
        $term_cats = wp_get_post_terms($music->ID, 'music-tax', array("fields" => "all"));
        $strCat = '';

        foreach ( $term_cats as $detail ) {
            $strCat .= '|'.$detail->slug;
        }

        $field['choices'][$music->post_name] = $music->post_title. ' ' . $strCat;
    }

    return $field;
}

// acf/load_field/type={$field_type} - filter for a specific field based on it's type
add_filter('acf/load_field/name=selectsong', 'my_acf_load_field');
