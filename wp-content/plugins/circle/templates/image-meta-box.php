<p class="hide-if-no-js image-meta-box">
	<input type="hidden" id="<?=$args['meta_key']?>" name="<?=$args['meta_key']?>" value="<?=esc_attr($image_id)?>" data-title-add="<?=$args['title_add']?>" data-insert-button-text="<?=$args['insert_button_text']?>" data-title-remove="<?=$args['title_remove']?>" class="image-id">
	<a title="<?=$args['title_add']?>" href="#" class="set-image">
		<img src="<?=wp_get_attachment_url($image_id)?>"<?php if(!$image_id){ ?> style="display:none"<?php } ?> />
		<span class="set-image-text"<?php if($image_id){ ?> style="display:none"<?php } ?>><?=$args['title_add']?></span>
	</a>
	<br>
	<a href="#" class="remove-image" title="<?=$args['title_remove']?>"<?php if(!$image_id){ ?> style="display:none"<?php } ?>><?=$args['title_remove']?></a>
</p>
