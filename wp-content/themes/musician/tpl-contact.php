<section id="contact" class="contact" style="background: url(images/contact/contact_bg.jpg) no-repeat center center; background-size: cover; color: #fff; padding-top: 0px; padding-bottom: 120px;">
    <div class="bgdot">
    	
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-header" style="padding-top: 100px;">
                    <div class="section-header-inner">
                        <div class="section-heading-left-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                        <h1 class="section-heading ss-effect" data-ss-effect="fade-from-top" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
                            <span>CONTACT US</span>
                        </h1>
                        <div class="section-heading-right-tick ss-effect" data-ss-effect="fade-from-bottom" data-ss-effect-speed="1" data-ss-effect-delay="0" data-ss-effect-offset="2"></div>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
		        <div class="row">
		            <div class="col-sm-12">
		
		                <div class="section-content ss-typography">
		
		                    <div class="row">
		                        <div class="contact-container contact-1">
		                            
		                            <div class="col-sm-6 col-6-1 ss-effect" data-ss-effect="fade-from-right" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
		                                <div class="contact-info alignRight">
		                                    <h3>CONTACT INFO</h3>
		                                    <div class="box-icon-container">
		                                       
		                                        <div class="box-icon-content small">
		                                            SVEN FAULCONER
		                                        </div>
		                                    </div>
		                                    <div class="gap" data-height-size="25px"></div>
		                                    <div class="box-icon-container">
		                                        <div class="box-icon-content small">
		                                            4216 MCCONNELL BLVD,<br/>
													CULVER CITY, CA 90066,<br/>
													UNITED STATES
		                                        </div>
		                                    </div>
		                                    <div class="gap" data-height-size="25px"></div>
		                                    <div class="box-icon-container">
		                                        <div class="box-icon-content small">
		                                          T. 310-463-3744<br/>
		                                          <a href="mailto:sven@falconscore.com">sven@falconscore.com</a>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            
		                            <div class="col-sm-6  col-6-2 ss-effect" data-ss-effect="fade-from-left" data-ss-effect-speed="1" data-ss-effect-delay="0.2" data-ss-effect-offset="2">
		                                <div id="contact-respond" class="contact-respond">
		                                    <h3 id="reply-title" class="contact-reply-title">SEND ME A MESSAGE</h3>
		                                    <form action="<?php echo get_bloginfo('template_url');?>/inc/ajax.php" method="post" id="contactform" class="contact-form" novalidate="novalidate">
		                                        <div id="respond-inputs" class="respond-inputs">
		                                            <div class="row-input">
		                                            	<div class="col-title paddingT5">
			                                            	Name
			                                            </div>
			                                            <div class="col-ip">
			                                            	<input id="contact-name" name="contact-name" type="text" placeholder="NAME" aria-required="true" />
			                                            </div>
		                                            </div>
		                                            <div class="row-input ">
			                                             <div class="col-title paddingT10">
			                                            	Email
			                                            </div>
			                                            <div class="col-ip">
			                                            	<input id="contact-email" name="contact-email" type="email" placeholder="EMAIL" aria-required="true" />
			                                            </div>
		                                            </div>
		                                            <div class="row-input">
		                                            	<div class="col-title paddingT5">
			                                            	Message
			                                            </div>
			                                            <div class="col-ip">
			                                            	<div id="contact-text" class="contact-text">
					                                            <textarea id="contact-message" name="contact-message" cols="45" rows="10" aria-required="true" placeholder="MESSAGE"></textarea>
					                                        </div>
					                                    </div>
		                                            </div>
		                                        </div>
		                                        
		                                        <p class="form-submit">
		                                        	<input type="hidden" name="ajaxurl" class="ajaxurl" value="<?php bloginfo('url');?>/wp-admin/admin-ajax.php">
												   <input type="hidden" name="urlsite" class="urlsite" value="<?php bloginfo('url');?>/contact">
												   <input type="hidden" name="name-contact-to" class="name-contact-to" value="0">      
		                                            <img class="ajax-loader" src="images/contact/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;" />
		                                            <input class="submit" name="submit" type="submit" id="submit" value="SEND" />
		                                            <span class="contactform-response-output contactform-display-none"></span>
		                                        </p>
		                                    </form>
		                                </div>
		                            </div>
		                        </div>
		
		                    </div>
		
		                </div>
		
		            </div>
		        </div>
		
		    </div>
    </div>
    
</section>
