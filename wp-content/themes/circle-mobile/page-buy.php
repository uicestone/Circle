<?php
/*
 * 添加订单并跳转至微信支付
 */
$wx = new WeixinAPI();

$auth_info = $wx->get_oauth_token();

$users = get_users(array('meta_key'=>'wx_openid','meta_value'=>$auth_info->openid));

if(!$users){
	$user_id = wp_create_user(substr($auth_info->openid, -8, 8), $auth_info->openid);
	add_user_meta($user_id, 'wx_openid', $auth_info->openid, true);
}
else{
	$user_id = $users[0]->ID;
}

if(empty($user_id)){
	exit('user not logged in');
}

wp_set_current_user($user_id);

if(empty($_GET['buy_product'])){
	exit('product not specified');
}

$product_id = $_GET['buy_product'];
$product_name = get_post($product_id)->post_title;
$price = get_post_meta($product_id, 'price', true);
		
$order_id = wp_insert_post(array(
	'post_type'=>'shop_order',
	'post_title'=>$product_name,
	'post_status'=>'private',
	'post_author'=>$user_id
));

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'status', 'pending', true);
add_post_meta($order_id, 'price', $price, true);

$product = array(
	'id'=>$product_id,
	'name'=>$product_name,
	'thumbnail'=>wp_get_attachment_url(get_post_meta($product_id, '_thumbnail_id', true)),
	'price'=>$price,
);

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'product_meta', json_encode($product), true);

$prepay_id = $wx->unified_order($order_id, $price, $auth_info->openid, site_url() . '/wx/payment-confirm/', $product_name);
add_post_meta($order_id, 'wx_prepay_id', $prepay_id);

$wx->oauth_redirect(site_url() . '/wx/wxpay/?pay_order=' . $order_id);
