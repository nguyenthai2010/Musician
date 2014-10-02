<?php
function send_email_expert(){
	$name 	= $_POST['contact-name'];
	$email  	= $_POST['contact-email'];
	$content	= $_POST['contact-message'];
	send_contact_info($name, $email, $content);
    //gui_loi_cam_on_da_lien_he($ten, $email, $subject, $content);    
	die();
}
add_action('wp_ajax_send_email_expert', 'send_email_expert');
add_action('wp_ajax_nopriv_send_email_expert', 'send_email_expert');//for users that are not logged in.