<?php
/*
Plugin Name: Circle Wava
Description: Functions & actions for circlewava.com written as a plugin, to work across themes
Author: Uice Lu
Version: 0.1
Author URI: https://cecilia.uice.lu
*/

add_action('init', function(){
	
	add_theme_support('post-thumbnails');
	
	register_post_type('product', array(
		'label'=>'产品',
		'labels'=>array(
			'all_items'=>'所有产品',
			'add_new'=>'新产品',
			'add_new_items'=>'添加新产品',
			'edit_item'=>'编辑产品',
			'new_item'=>'新产品',
			'search_items'=>'搜索产品'
		),
		'public'=>true,
		'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
		'has_archive'=>true,
		'register_meta_box_cb'=>function($post){
			add_meta_box('properties', '参数', function($post){
?>
<label for="price">价格：</label>
<input type="text" id="price" name="price" value="<?=esc_attr(get_post_meta($post->ID, 'price', true))?>" />
&nbsp;
<label for="material">材质：</label>
<input type="text" id="material" name="material" value="<?=esc_attr(get_post_meta($post->ID, 'material', true))?>" />
&nbsp;
<label for="origin">产地：</label>
<input type="text" id="origin" name="origin" value="<?=esc_attr(get_post_meta($post->ID, 'origin', true))?>" />
<?php				
			});
			
			add_meta_box('product_images_container', '相册', function($post){
			
			$product_image_gallery = get_post_meta($post->ID, 'product_image_gallery', true);
			$product_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
?>
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
<?php
			}, 'product', 'side');
		}
	));
	
	add_action('save_post', function($post_id){
		foreach(array('price', 'material', 'origin', 'product_image_gallery') as $field){
			if(isset($_POST[$field])){
				update_post_meta($post_id, $field, $_POST[$field]);
			}
		}
	});
	
	register_post_type('shop_order', array(
		'label'=>'订单',
		'labels'=>array(
			'all_items'=>'所有订单',
			'add_new'=>'新订单',
			'add_new_items'=>'添加新订单',
			'edit_item'=>'编辑订单',
			'new_item'=>'新订单',
			'search_items'=>'搜索订单'
		),
		'show_ui'=>true,
		'show_in_menu'=>true,
		
		'supports'=>array(),
	));
	
	show_admin_bar(false);
	
	register_nav_menu('mobile-foot', '移动版底部固定菜单');
	register_nav_menu('desktop-head', '桌面版顶部固定菜单');
	register_nav_menu('desktop-foot', '桌面版底部固定菜单');
	
});

add_action('admin_enqueue_scripts', function(){
	wp_register_style('circle-admin', plugin_dir_url(__FILE__).'admin.css');
	wp_enqueue_style('circle-admin');
});
