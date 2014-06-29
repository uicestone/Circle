<?php
/*
 * 桌面版的购买请求处理页面
 * 接受表单gateway，product_meta和address
 * 生成订单
 * 跳转到支付网关
 */
$gateway = $_POST['gateway'];
$product_meta = json_decode(stripslashes($_POST['product_meta']));
$ship_info = json_decode(stripslashes($_POST['address']));
$user_id = get_current_user_id();

if(empty($gateway) || empty($product_meta) || empty($ship_info) || empty($user_id)){
	exit('Invalid post data for creating an order.');
}

$order_id = wp_insert_post(array(
	'post_type'=>'shop_order',
	'post_title'=>$product_meta->name,
	'post_status'=>'private',
	'post_author'=>$user_id
));

add_post_meta($order_id, 'product', $product_meta->id, true);
add_post_meta($order_id, 'status', 'pending', true);
add_post_meta($order_id, 'price', $product_meta->price * $product_meta->amount, true);
add_post_meta($order_id, 'amount', $product_meta->amount, true);
$product_meta->size && add_post_meta($order_id, 'size', $product_meta->size, true);

add_post_meta($order_id, 'province', $ship_info->province, true);
add_post_meta($order_id, 'contact', $ship_info->contact, true);
add_post_meta($order_id, 'receiver', $ship_info->receiver, true);
update_post_meta($order_id, 'address', $ship_info->address);
add_post_meta($order_id, 'zipcode', $ship_info->zipcode, true);


$product_meta->thumbnail = wp_get_attachment_url(get_post_meta($product_meta->id, '_thumbnail_id', true));

add_post_meta($order_id, 'product_meta', json_encode($product_meta), true);

if($gateway === 'alipay'){
	alipay_redirect($order_id);
}

?>