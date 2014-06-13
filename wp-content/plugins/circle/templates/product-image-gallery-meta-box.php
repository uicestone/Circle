<div class="image-gallery">
	<p class="hide-if-no-js add-gallery-image">
		<a title="<?=$gallery_args['title_add']?>" href="#"><?=$gallery_args['title_add']?></a>
	</p>
	<ul class="gallery-images ui-sortable">
		<?php foreach($product_image_ids as $image_id){ ?>
		<li class="image" data-attachment_id="<?=$image_id?>" />
			<img src="<?=wp_get_attachment_url($image_id)?>" />
			<ul class="actions">
				<li><a href="#" class="delete" title="<?=$gallery_args['title_remove']?>"><?=$gallery_args['title_remove']?></a></li>
			</ul>
		</li>
		<?php } ?>
	</ul>
	<input type="hidden" id="product_image_gallery" name="<?=$gallery_args['meta_key']?>" value="<?=esc_attr($product_image_gallery)?>" data-title-add="<?=$gallery_args['title_add']?>" data-insert-button-text="<?=$gallery_args['insert_button_text']?>" data-title-remove="<?=$gallery_args['title_remove']?>" class="gallery-image-ids">
</div>
