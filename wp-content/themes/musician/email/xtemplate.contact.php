<?php
    function send_contact_info($fullname,$email,$yourmind){
    	     
        include_once 'xtemplate.class.php';
        $header = 'Content-type: text/html; charset=utf-8\r\n';				
        $title_custom 		= 'Contact Viewer';
        //$blogid=get_current_blog_id();
        //switch_to_blog($blogid);
        $contact_email      = trim(get_option('admin_email'));
     
        //wp_die($contact_email);
        if(!is_email($contact_email)) $contact_email = trim(get_option('admin_email'));
		//echo $contact_email;
        $date = date('d-m-Y');   
        $parseTemplate	=	new XTemplate('xtemplate.contact.html');
        $parseTemplate->assign('date',$date);
        $parseTemplate->assign('fullname',$fullname);	
        $parseTemplate->assign('content',$yourmind);
        $parseTemplate->parse('main');	
        return wp_mail($contact_email, $title_custom, $parseTemplate->text('main'), $title_custom);
    }
?>