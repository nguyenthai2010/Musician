
/* Contact Page Comment Validation */

/*form dang ký*/
(function($){
	jQuery(document).ready(function($){
		
		$('form.contact-form').submit(function() {
			$('form.contact-form input, form.contact-form textarea').removeClass('error');
			var hasError = false;
			$('form.contact-form .requiredField').each(function() {
				if(jQuery.trim($(this).val()) == '') {
	            	var labelText = $(this).prev('label').text();
	            	$(this).addClass('error');
	            	hasError = true;
	            } else{	
	            	if($(this).hasClass('email')) {  
	            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	            	if(!emailReg.test(jQuery.trim($(this).val()))) {
	            		var labelText = $(this).prev('label').text();
	            		//$(this).parent().append('<span class="mes-error">Email không hợp lệ!</span>');
	            		$(this).addClass('error');
	            		hasError = true;
	            	 }
	            	}	            	
	              if($(this).hasClass('name'))
	            	{
	            	   var fullname=jQuery.trim($(this).val());
	            	  
	            	   if(fullname == 'Name')
	            	      {
		            		$(this).addClass('error');
		            		 hasError = true;
	            	      }
	            	}
	              
					if($(this).hasClass('content-message'))
	            	{
	            	   var fullname=jQuery.trim($(this).val());	            	  
	            	   if(fullname == 'Message')
	            	      {
		            		$(this).addClass('error');
		            		 hasError = true;
	            	      }
						if(fullname.length<5)
						{
		            		$(this).addClass('error');
		            		 hasError = true;
	            	      }
	            	}	            	
	            }
			});
			if(!hasError) {		
				$('.ajax-loader').css('visibility','visible');
				var url_site = $('.contact-form .urlsite').val();	
				var url_ajax = $('.contact-form .ajaxurl').val();
				var fullname = $('.contact-form .username').val();
				var email = $('.contact-form .email').val();
				var namecontactto = $('.contact-form .name-contact-to').val();
				var content = $('.contact-form .content-message').val();
				var data={'contact-name': fullname, 'contact-email': email, 'contact-message':content, 'action':'send_email_expert'};
				$.post(url_ajax,data,function(response){					
						//alert('Send Email Success');
						$('form.contact-form').css('display','none');
						$('.ajax-loader').css('visibility','hidden');
						$('.contactform-response-output').html('Thank you for your message');
						//window.location.href = url_site;					
				}); 				
				 return false;
			}else{
				$('.contactform-response-output').html('Can not send!');
			}
			return false;

		});
	});
})(jQuery);

