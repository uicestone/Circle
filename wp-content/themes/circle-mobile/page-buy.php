<?php
/**
 * 微信用户授权跳转回调页面
 * 利用open_id识别用户
 * 购买按钮链接所指向页面
 * 生成一个订单
 * 跳转到微信用户授权接口
 * 回调入支付页面
 */
if(!isset($_GET['code']) || !isset($_GET['state'])){
	exit('Not redirected from weixin oauth.');
}

$wx = new WeixinAPI();

$auth_info = $wx->get_oauth_token($_GET['code']);

$users = get_users(array('meta_key'=>'wx_openid','meta_value'=>$auth_info->openid));

if(!$users){
	$user_info = $wx->oauth_get_user_info($auth_info->openid);
	$user_id = wp_create_user($user_info->nickname, $auth_info->openid);
	add_user_meta($user_id, 'wx_openid', $auth_info->openid);
	add_user_meta($user_id, 'sex', $user_info->sex);
	add_user_meta($user_id, 'country', $user_info->country);
	add_user_meta($user_id, 'province', $user_info->province);
	add_user_meta($user_id, 'language', $user_info->language);
	add_user_meta($user_id, 'headimgurl', $user_info->headimgurl);
	add_user_meta($user_id, 'subscribe_time', $user_info->subscribe_time);
}else{
	$user_id = $users[0]->ID;
}

$product_id = $_GET['buy_product'];

$order_id = wp_insert_post(array(
	'post_type'=>'shop_order',
	'post_title'=>get_post($product_id)->post_title,
	'post_status'=>'private',
	'post_author'=>$user_id
));

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'status', 'pending', true);
add_post_meta($order_id, 'price', get_post_meta($product_id, 'price', true), true);

$product = array(
	'id'=>$product_id,
	'name'=>get_post($product_id)->post_title,
	'thumbnail'=>wp_get_attachment_url(get_post_meta($product_id, '_thumbnail_id', true)),
	'price'=>get_post_meta($product_id, 'price', true),
);

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'product_meta', json_encode($product), true);

$wx->oauth_redirect(site_url() . '/wx/wxpay/?pay_order=' . $order_id);