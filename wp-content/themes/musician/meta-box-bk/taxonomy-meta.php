<?php
add_action('category_edit_form_fields','category_edit_form_fields');
add_action('category_add_form_fields','category_add_form_fields');

function category_add_form_fields () {
?>
    <div class="inside">
                  <input type="hidden" id="nonce_seo_meta" name="nonce_seo_meta" value="0ddcf5b2c0"><input type="hidden" name="_wp_http_referer" value="/nissin/wp-admin/post.php?post=2807&amp;action=edit"><div class="rwmb-field rwmb-text-wrapper"><div class="rwmb-label">
					<label for="robots">Robots</label>
				</div>
				<div class="rwmb-input"><input type="text" class="rwmb-text" name="robots" id="robots" value="index,follow" size="30"><p id="robots_description" class="description">Nhập thông tin cho thẻ robots như; index, noindex, follow, nofollow, noodp, noarchive, none</p></div></div><div class="rwmb-field rwmb-text-wrapper"><div class="rwmb-label">
					<label for="title">Title</label>
				</div>
				<div class="rwmb-input"><input type="text" class="rwmb-text" name="title" id="title" value="" size="30"><p id="title_description" class="description">Nhập thông tin để chèn vào thẻ title (tối đa 60 ký tự)</p></div></div><div class="rwmb-field rwmb-textarea-wrapper"><div class="rwmb-label">
					<label for="description">Description</label>
				</div>
				<div class="rwmb-input"><textarea class="rwmb-textarea large-text" name="description" id="description" cols="60" rows="3"></textarea><p id="description_description" class="description">Nhập thông tin để chèn vào thẻ description (tối đa 160 ký tự)</p></div></div><div class="rwmb-field rwmb-textarea-wrapper"><div class="rwmb-label">
					<label for="keywords">Keywords</label>
				</div>
				<div class="rwmb-input"><textarea class="rwmb-textarea large-text" name="keywords" id="keywords" cols="60" rows="3"></textarea><p id="keywords_description" class="description">Nhập thông tin để chèn vào thẻ keywords (tối đa 160 ký tự)</p></div></div></div>
        <?php 
    }
    
    
function category_edit_form_fields () {
?>
    <div class="inside">
                  <input type="hidden" id="nonce_seo_meta" name="nonce_seo_meta" value="0ddcf5b2c0"><input type="hidden" name="_wp_http_referer" value="/nissin/wp-admin/post.php?post=2807&amp;action=edit"><div class="rwmb-field rwmb-text-wrapper"><div class="rwmb-label">
					<label for="robots">Robots</label>
				</div>
				<div class="rwmb-input"><input type="text" class="rwmb-text" name="robots" id="robots" value="index,follow" size="30"><p id="robots_description" class="description">Nhập thông tin cho thẻ robots như; index, noindex, follow, nofollow, noodp, noarchive, none</p></div></div><div class="rwmb-field rwmb-text-wrapper"><div class="rwmb-label">
					<label for="title">Title</label>
				</div>
				<div class="rwmb-input"><input type="text" class="rwmb-text" name="title" id="title" value="" size="30"><p id="title_description" class="description">Nhập thông tin để chèn vào thẻ title (tối đa 60 ký tự)</p></div></div><div class="rwmb-field rwmb-textarea-wrapper"><div class="rwmb-label">
					<label for="description">Description</label>
				</div>
				<div class="rwmb-input"><textarea class="rwmb-textarea large-text" name="description" id="description" cols="60" rows="3"></textarea><p id="description_description" class="description">Nhập thông tin để chèn vào thẻ description (tối đa 160 ký tự)</p></div></div><div class="rwmb-field rwmb-textarea-wrapper"><div class="rwmb-label">
					<label for="keywords">Keywords</label>
				</div>
				<div class="rwmb-input"><textarea class="rwmb-textarea large-text" name="keywords" id="keywords" cols="60" rows="3"></textarea><p id="keywords_description" class="description">Nhập thông tin để chèn vào thẻ keywords (tối đa 160 ký tự)</p></div></div></div>
        <?php 
    }