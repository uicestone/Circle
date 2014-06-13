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
	
	register_taxonomy('product_cat', 'product', array(
		'label'=>'产品分类',
		'labels'=>array(
			'all_items'=>'所有产品分类',
			'update_item'=>'更新产品分类',
			'add_new_item'=>'添加新产品分类',
			'edit_item'=>'编辑产品分类',
			'view_item'=>'查看产品分类',
			'new_item_name'=>'新产品分类名称',
			'parent_item'=>'上级产品分类',
			'parent_item_colon'=>'上级产品分类：',
			'search_items'=>'搜索产品分类'
		),
		'hierarchical'=>true,
	));
	
	register_post_type('product', array(
		'label'=>'产品',
		'labels'=>array(
			'all_items'=>'所有产品',
			'add_new'=>'新产品',
			'add_new_item'=>'添加新产品',
			'edit_item'=>'编辑产品',
			'new_item'=>'新产品',
			'search_items'=>'搜索产品'
		),
		'public'=>true,
		'supports'=>array('title','editor','thumbnail','excerpt','revisions'),
		'has_archive'=>true,
		'register_meta_box_cb'=>function($post){
			add_meta_box('properties', '参数', function($post){
				require plugin_dir_path(__FILE__) . 'templates/product-property-meta-box.php';
			});
			
			add_meta_box('product_images_container', '相册', function($post){
				$product_image_gallery = get_post_meta($post->ID, 'product_image_gallery', true);
				$product_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
				require plugin_dir_path(__FILE__) . 'templates/product-image-gallery-meta-box.php';
			}, 'product', 'side');
		},
	));
	
	add_action('add_meta_boxes', function(){
		
		add_meta_box('product_images_container', '相册', function($post){
			$product_image_gallery = get_post_meta($post->ID, 'product_image_gallery', true);
			$product_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
			require plugin_dir_path(__FILE__) . 'templates/product-image-gallery-meta-box.php';
		}, 'post', 'side');

	});
	
//	add_filter('manage_edit-product_columns', function($columns){
//		$columns = array(
//			'title'=>'产品名称',
//			'price'=>'价格',
//			'sells'=>'销量',
//			'category'=>'分类'
//		);
//		return $columns;
//	});
//	
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

add_action('wp_loaded', function(){
	flush_rewrite_rules();
	//global $wp_rewrite;
	//print_r($wp_rewrite->rewrite_rules());
});
