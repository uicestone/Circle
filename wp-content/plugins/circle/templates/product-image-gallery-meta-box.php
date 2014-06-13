<p class="hide-if-no-js add_product_images">
	<a title="添加图片到相册" href="#">添加图片到相册</a>
</p>
<ul class="product_images ui-sortable">
	<?php foreach($product_image_ids as $image_id){ ?>
	<li class="image" data-attachment_id="<?=$image_id?>" style="width:80px;float:left;margin-right:4px;">
		<img src="<?=wp_get_attachment_url($image_id)?>" style="width:100%" />
		<ul class="actions">
			<li><a href="#" class="delete" title="从相册删除">从相册删除</a></li>
		</ul>
	</li>
	<?php } ?>
</ul>
<input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?=esc_attr($product_image_gallery)?>">
<script>
jQuery(function($){
	// Product gallery file uploads
	var product_gallery_frame;
	var $image_gallery_ids = $('#product_image_gallery');
	var $product_images = $('#product_images_container ul.product_images');

	$('.add_product_images').on( 'click', 'a', function( event ) {
		var $el = $(this);
		var attachment_ids = $image_gallery_ids.val();

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( product_gallery_frame ) {
			product_gallery_frame.open();
			return;
		}

		// Create the media frame.
		product_gallery_frame = wp.media.frames.product_gallery = wp.media({
			// Set the title of the modal.
			title: '添加图片到产品相册',
			button: {
				text: '添加',
			},
			states : [
				new wp.media.controller.Library({
					title: '添加图片到产品相册',
					filterable : 'all',
					multiple: true,
				})
			]
		});

		// When an image is selected, run a callback.
		product_gallery_frame.on( 'select', function() {

			var selection = product_gallery_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.id ) {
					attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

					$product_images.append('\
						<li class="image" data-attachment_id="' + attachment.id + '">\
							<img src="' + attachment.url + '" />\
							<ul class="actions">\
								<li><a href="#" class="delete" title="从相册删除">从相册删除</a></li>\
							</ul>\
						</li>');
				}

			});

			$image_gallery_ids.val( attachment_ids );
		});

		// Finally, open the modal.
		product_gallery_frame.open();
	});

	// Image ordering
	$product_images.sortable({
		items: 'li.image',
		cursor: 'move',
		scrollSensitivity:40,
		forcePlaceholderSize: true,
		forceHelperSize: false,
		helper: 'clone',
		opacity: 0.65,
		placeholder: 'wc-metabox-sortable-placeholder',
		start:function(event,ui){
			ui.item.css('background-color','#f6f6f6');
		},
		stop:function(event,ui){
			ui.item.removeAttr('style');
		},
		update: function(event, ui) {
			var attachment_ids = '';

			$('#product_images_container ul li.image').css('cursor','default').each(function() {
				var attachment_id = jQuery(this).attr( 'data-attachment_id' );
				attachment_ids = attachment_ids + attachment_id + ',';
			});

			$image_gallery_ids.val( attachment_ids );
		}
	});

	// Remove images
	$('#product_images_container').on( 'click', 'a.delete', function() {
		$(this).closest('li.image').remove();

		var attachment_ids = '';

		$('#product_images_container ul li.image').css('cursor','default').each(function() {
			var attachment_id = jQuery(this).attr( 'data-attachment_id' );
			attachment_ids = attachment_ids + attachment_id + ',';
		});

		$image_gallery_ids.val( attachment_ids );

		return false;
	});
});
</script>
