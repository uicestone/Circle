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
	
	add_image_size('mobile-product-head', 640, 428, true);
	add_image_size('desktop-product-gallery', 466, 582, true);
	add_image_size('mobile-list-thumbnail', 320, 441, true);
	add_image_size('desktop-list-thumbnail', 446, 600, true);
	
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
	
	register_taxonomy('product_series', 'product', array(
		'label'=>'产品系列',
		'labels'=>array(
			'all_items'=>'所有产品系列',
			'update_item'=>'更新产品系列',
			'add_new_item'=>'添加新产品系列',
			'edit_item'=>'编辑产品系列',
			'view_item'=>'查看产品系列',
			'new_item_name'=>'新产品系列名称',
			'parent_item'=>'上级产品系列',
			'parent_item_colon'=>'上级产品系列：',
			'search_items'=>'搜索产品系列'
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
		'supports'=>array('title','editor','excerpt','thumbnail','page-attributes'),
		'has_archive'=>true,
		'register_meta_box_cb'=>function($post){
			add_meta_box('properties', '参数', function($post){
				require plugin_dir_path(__FILE__) . 'templates/product-property-meta-box.php';
			}, 'product', 'normal');
			
			add_meta_box('product_images_gallery', '相册', function($post){
				$product_image_gallery = get_post_meta($post->ID, '_product_image_gallery', true);
				$product_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
				$gallery_args = array(
					'title_remove'=>'从相册删除',
					'title_add'=>'添加图片到相册',
					'insert_button_text'=>'添加',
					'meta_key'=>'_product_image_gallery'
				);
				require plugin_dir_path(__FILE__) . 'templates/product-image-gallery-meta-box.php';
			}, 'product', 'side', 'default');
			
			add_meta_box('mobile-list-thumbnail', '移动版列表缩略图', function($post){
				$image_id = get_post_meta($post->ID, '_mobile_list_thumbnail', true);
				$args = array(
					'title_remove'=>'删除',
					'title_add'=>'设置',
					'insert_button_text'=>'选择',
					'meta_key'=>'_mobile_list_thumbnail'
				);
				require plugin_dir_path(__FILE__) . 'templates/image-meta-box.php';
			}, 'product', 'side', 'default');
			
			add_meta_box('mobile-product-head', '移动版顶部大图', function($post){
				$image_id = get_post_meta($post->ID, '_mobile_product_head', true);
				$args = array(
					'title_remove'=>'删除',
					'title_add'=>'设置',
					'insert_button_text'=>'选择',
					'meta_key'=>'_mobile_product_head'
				);
				require plugin_dir_path(__FILE__) . 'templates/image-meta-box.php';
			}, 'product', 'side', 'default');
			
		},
		'menu_icon'=>'dashicons-cart'
	));
	
	register_post_type('shop_order', array(
		'label'=>'订单',
		'labels'=>array(
			'all_items'=>'所有订单',
			'add_new'=>'新订单',
			'add_new_item'=>'新建订单',
			'edit_item'=>'编辑订单',
			'new_item'=>'新订单',
			'search_items'=>'搜索订单'
		),
		'show_ui'=>true,
		'show_in_menu'=>true,
		'menu_icon'=>'dashicons-format-aside',
		'supports'=>array('title'),
		'register_meta_box_cb'=>function($post){
			remove_meta_box( 'slugdiv', 'shop_order' , 'normal' );
			add_meta_box('base-info', '基本信息', function($post){
				require plugin_dir_path(__FILE__) . 'templates/order-base-info-meta-box.php';
			}, 'shop_order', 'side');
			add_meta_box('ship-info', '物流信息', function($post){
				require plugin_dir_path(__FILE__) . 'templates/order-ship-info-meta-box.php';
			}, 'shop_order', 'normal');
			add_meta_box('product-info', '商品信息', function($post){
				$product = get_post_meta($post->ID, 'product', true);
				$product_order_meta = json_decode(get_post_meta($post->ID, 'product_meta', true));
				require plugin_dir_path(__FILE__) . 'templates/order-product-info-meta-box.php';
			}, 'shop_order', 'normal');
		}
	));
	
	show_admin_bar(false);
	
	register_nav_menu('mobile-foot', '移动版底部固定菜单');
	register_nav_menu('desktop-head', '桌面版顶部固定菜单');
	register_nav_menu('desktop-foot', '桌面版底部固定菜单');
	register_nav_menu('desktop-side', '桌面版侧边导航菜单');
	
});

add_action('add_meta_boxes', function(){

	add_meta_box('product_images_gallery', '相册', function($post){
		$product_image_gallery = get_post_meta($post->ID, '_product_image_gallery', true);
		$product_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
		$gallery_args = array(
			'title_remove'=>'从相册删除',
			'title_add'=>'添加图片到相册',
			'insert_button_text'=>'添加',
			'meta_key'=>'_product_image_gallery'
		);
		require plugin_dir_path(__FILE__) . 'templates/product-image-gallery-meta-box.php';
	}, 'post', 'side', 'default');

});

add_action('save_post', function($post_id){

	$metas = array(
		'name_en',
		'price',
		'material',
		'origin',
		'sizes',
		'_product_image_gallery',
		'_mobile_list_thumbnail',
		'_mobile_product_head',

		'province',
		'address',
		'zipcode',
		'receiver',
		'contact',
		'product',
		'amount',
		'size',
		'num',
		'status',
	);

	foreach($metas as $field){
		if(isset($_POST[$field])){
			update_post_meta($post_id, $field, $_POST[$field]);
		}
	}
});
	
add_action('admin_enqueue_scripts', function(){
	wp_register_style('circle-admin', plugin_dir_url(__FILE__).'admin.css');
	wp_register_script('circle-admin', plugin_dir_url(__FILE__).'admin.js', array('jquery-ui-sortable'));
	wp_enqueue_style('circle-admin');
	wp_enqueue_script('circle-admin');
});

add_action('wp_loaded', function(){
//	flush_rewrite_rules();
	//global $wp_rewrite;
	//print_r($wp_rewrite->rewrite_rules());
});

add_filter('posts_orderby', function($orderby_statement){
	return str_replace('wp_posts.menu_order,wp_posts.post_date desc', 'wp_posts.menu_order desc,wp_posts.post_date desc', $orderby_statement);
});

/**
 * Modify the main loop,
 * rather than put it aside and create a new one.
 * This is a nice solution when we need to get more args from uri,
 * and are not willing to parse them in our new main loop
 */
add_action('parse_query', function($wp_query){
	
	if(!$wp_query->is_main_query() || !$wp_query->is_archive()){
		return;
	}

	!get_query_var('orderby') && $wp_query->set('orderby', 'menu_order date');
	!get_query_var('order') && $wp_query->set('order', 'desc');
	!get_query_var('posts_per_page') && $wp_query->set('posts_per_page', -1);

});

add_filter('manage_shop_order_posts_columns', function ($columns){
    $newcolumns = array(
        'cb' => $columns['cb'],
        'title' => $columns['title'],
		'receiver' => '收货人',
		'contact' => '联系方式',
		'status' => '状态',
		'date' => $columns['date']
    );
    return $newcolumns;
});

add_action('manage_shop_order_posts_custom_column', function ($column_name) {
	global $post;
    switch( $column_name ) {
        case 'status' :
            switch(get_post_meta($post->ID, 'status', true)){
				case 'pending': echo '等待付款'; break;
				case 'payed': echo '已付款'; break;
				case 'shipped': echo '已发货'; break;
				case 'pending': echo '已完成'; break;
			}
            break;
		case 'receiver' :
			echo get_post_meta($post->ID, 'receiver', true);
			break;
		case 'contact' :
			echo get_post_meta($post->ID, 'contact', true);
			break;
    }
});

add_action('restrict_manage_posts', function(){
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type === 'product' ) {
        wp_dropdown_categories( array(
            'show_option_all' => '所有产品分类',
            'taxonomy' => 'product_cat',
            'name' => 'product_cat',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['product_cat'] ) ? $wp_query->query['product_cat'] : '' ),
            'hierarchical' => false,
            'show_count' => false,
            'hide_empty' => false,
        ) );
        wp_dropdown_categories( array(
            'show_option_all' => '所有产品系列',
            'taxonomy' => 'product_series',
            'name' => 'product_series',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['product_series'] ) ? $wp_query->query['product_series'] : '' ),
            'hierarchical' => false,
            'show_count' => false,
            'hide_empty' => false,
        ) );
    }
});

add_filter('parse_query', function($query) {
    $qv = &$query->query_vars;
    if ( ( $qv['product_cat'] ) && is_numeric( $qv['product_cat'] ) ) {
        $term = get_term_by( 'id', $qv['product_cat'], 'product_cat' );
        $qv['product_cat'] = $term->slug;
    }
    if ( ( $qv['product_series'] ) && is_numeric( $qv['product_series'] ) ) {
        $term = get_term_by( 'id', $qv['product_series'], 'product_series' );
        $qv['product_series'] = $term->slug;
    }
});

function get_piece($string, $prefer_index = 0, $delimiter = '/\s*\|\s/'){
	$splitted = preg_split($delimiter, $string);
	return $splitted[$prefer_index] ? $splitted[$prefer_index] : $splitted[0];
}

function alipay_redirect($order_id){

	$order = get_post($order_id);

	$alipay_request_args = array(
		'service'=>'create_direct_pay_by_user',
		'partner'=>get_option('alipay_partner_id'),
		'_input_charset'=>'utf-8',
		'return_url'=>site_url().'/payment-confirm/?gateway=alipay',
		'seller_email'=>'circlewava@163.com',
		'out_trade_no'=>$order->ID,
		'subject'=>$order->post_title,
		'payment_type'=>1,
		'total_fee'=>get_post_meta($order_id, 'price', true)
	);

	ksort($alipay_request_args);

	$alipay_request_args_temp = array();

	foreach($alipay_request_args as $key => $value){
		$alipay_request_args_temp[] = $key.'='.$value;
	}

	$sign_text = implode('&', $alipay_request_args_temp);

	$alipay_request_args['sign'] = md5($sign_text . get_option('alipay_key'));

	$alipay_request_args['sign_type'] = 'MD5';
	
	add_post_meta($order_id, 'alipay_sign', $alipay_request_args['sign'], true);
	
	$redirect_to = 'https://mapi.alipay.com/gateway.do?'.http_build_query($alipay_request_args);
	
	if(headers_sent()){
		exit('Cannot perform redirect, please click <a href="' . $redirect_to . '">here</a>.');
	}
	
	header('Location: ' . $redirect_to);
	exit;

}

function alipay_confirm(){

	$notify_verify = file_get_contents('https://mapi.alipay.com/gateway.do?service=notify_verify&partner=' . get_option('alipay_partner_id') . '&notify_id=' . $_GET['notify_id']);

	if($notify_verify !== 'true'){
		throw new Exception('支付校验失败', 400);
	}

	$order_id = $_GET['out_trade_no'];

	$order = get_post($order_id);

	add_post_meta($order_id, 'alipay_trade_no', $_GET['trade_no']);
	
	update_post_meta($order_id, 'status', 'payed');
	
	$redirect_to = site_url() . '/#orders';
	
	if(headers_sent()){
		exit('Cannot perform redirect, please click <a href="' . $redirect_to . '">here</a>.');
	}
	
	header('Location: ' . $redirect_to);
	exit;

}
