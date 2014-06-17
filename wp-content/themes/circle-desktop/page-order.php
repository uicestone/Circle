<?php
/**
 * 桌面版订单AJAX响应接口
 * 可以输出当前登录用户的所有订单或者一个订单信息
 */
if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	$post = get_post($id);
	
	if(get_current_user_id() != $order->post_author){
		exit('No permission to access order' . $id);
	}
	
	$order = array(
		"date"=>$post->post_date,
		"province"=>get_post_meta($id, 'province', true),//省市信息
		"address"=>get_post_meta($id, 'address', true),//详细地址
		"zipcode"=>get_post_meta($id, 'zipcode', true),
		"receiver"=>get_post_meta($id, 'receiver', true),//收货人姓名
		"contact"=>get_post_meta($id, 'contact', true),//联系方式
		"id"=>$post->ID,
		"price"=>get_post_meta($id, 'price', true),//订单总价
		"product"=>get_post_meta($id, 'product', true),
		"product_meta"=>json_decode(get_post_meta($id, 'product_meta', true))
	);
	
	header('Content-Type: application/json');
	echo json_encode($order);
}
else{
	$posts = get_posts(array(
		'post_type'=>'shop_order',
		'post_status'=>'any',
		'author'=>get_current_user_id()
	));
	
	$orders = array();
	
	foreach($posts as $post){
		$order = array(
			"date"=>$post->post_date,
			"province"=>get_post_meta($post->ID, 'province', true),//省市信息
			"address"=>get_post_meta($post->ID, 'address', true),//详细地址
			"zipcode"=>get_post_meta($post->ID, 'zipcode', true),
			"receiver"=>get_post_meta($post->ID, 'receiver', true),//收货人姓名
			"contact"=>get_post_meta($post->ID, 'contact', true),//联系方式
			"id"=>$post->ID,
			"price"=>get_post_meta($post->ID, 'price', true),//订单总价
			"product"=>get_post_meta($post->ID, 'product', true),
			"product_meta"=>json_decode(get_post_meta($post->ID, 'product_meta', true))
		);
		array_push($orders, $order);
	}
	
	header('Content-Type: application/json');
	echo json_encode($orders);
}