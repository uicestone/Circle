// gallery meta boxes
(function($){
	
	$(function(){
		
		var gallery_frames = {};
		
		$('.image-gallery').each(function(){
			
			var container = $(this);
			var meta_id = $(this).parent().attr('id');
			
			var gallery_image_ids_input = $(this).find(':input.gallery-image-ids');
			var product_images = $(this).find('ul.gallery-images');

			container.find('.add-gallery-image').on('click', 'a', function(event) {

				event.preventDefault();

				var attachment_ids = gallery_image_ids_input.val();

				// If the media frame already exists, reopen it.
				if (gallery_frames[meta_id]) {
					gallery_frames[meta_id].open();
					return;
				}

				// Create the media frame.
				gallery_frames[meta_id] = wp.media.frames.product_gallery = wp.media({
					// Set the title of the modal.
					title: gallery_image_ids_input.attr('title'),
					button: {
						text: gallery_image_ids_input.data('insert-button-text'),
					},
					states : [
						new wp.media.controller.Library({
							title: gallery_image_ids_input.data('title-add'),
							filterable : 'all',
							multiple: true,
						})
					]
				});

				// When an image is selected, run a callback.
				gallery_frames[meta_id].on('select', function() {

					var selection = gallery_frames[meta_id].state().get('selection');

					selection.map(function(attachment) {

						attachment = attachment.toJSON();

						if (attachment.id) {
							attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

							product_images.append('\
								<li class="image" data-attachment_id="' + attachment.id + '">\
									<img src="' + attachment.url + '" />\
									<ul class="actions">\
										<li><a href="#" class="delete" title="' + gallery_image_ids_input.data('title-remove') + '">' + gallery_image_ids_input.data('title-remove') + '</a></li>\
									</ul>\
								</li>');
						}

					});

					gallery_image_ids_input.val(attachment_ids);
				});

				// Finally, open the modal.
				gallery_frames[meta_id].open();
			});

			// Image ordering
			container.find('ul.gallery_images').sortable({
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
						var attachment_id = $(this).attr('data-attachment_id');
						attachment_ids = attachment_ids + attachment_id + ',';
					});

					gallery_image_ids_input.val(attachment_ids);
				}
			});

			// Remove images
			container.on('click', 'a.delete', function() {
				$(this).closest('li.image').remove();

				var attachment_ids = '';

				container.find('ul li.image').css('cursor','default').each(function() {
					var attachment_id = $(this).attr('data-attachment_id');
					attachment_ids = attachment_ids + ',' + attachment_id;
				});

				gallery_image_ids_input.val(attachment_ids.replace(/,/, ''));

				return false;
			});
		});
	});
})(jQuery);

// single image meta boxes
(function($){
	$(function(){
		
		var frames = {};
		
		$('.image-meta-box').each(function(){
			
			var container = $(this);
			var meta_id = $(this).closest('.postbox').attr('id');
			
			var image_id_input = $(this).find(':input.image-id');

			container.find('a.set-image').on('click', function(event){

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if (frames[meta_id]) {
					frames[meta_id].open();
					return;
				}

				// Create the media frame.
				frames[meta_id] = wp.media.frames.product_gallery = wp.media({
					// Set the title of the modal.
					title: image_id_input.attr('title'),
					button: {
						text: image_id_input.data('insert-button-text'),
					},
					states : [
						new wp.media.controller.Library({
							title: image_id_input.data('title-add'),
							filterable : 'all',
							multiple: false,
						})
					]
				});

				// When an image is selected, run a callback.
				frames[meta_id].on('select', function() {

					var selection = frames[meta_id].state().get('selection');

					selection.map(function(attachment) {
						console.log(attachment.id);
						console.log(image_id_input.closest('.postbox').attr('id'));
						container.find('.set-image-text').hide();
						container.find('img').attr('src', attachment.attributes.url).show();
						image_id_input.val(attachment.id);
					});

					
				});

				// Finally, open the modal.
				frames[meta_id].open();
			});

			// Remove images
			container.find('a.remove-image').on('click', function() {
				container.find('img').hide().siblings('.set-image-text').show();
				container.find('a.remove-image').hide();
				image_id_input.val('');
				return false;
			});
		});		
	});
})(jQuery);
