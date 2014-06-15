<?php
/**
 * 购买按钮链接所指向页面
 * 生成一个订单
 * 跳转到微信用户授权接口
 * 回调入支付页面
 */
$product_id = $_GET['buy_product'];

$order_id = wp_insert_post(array(
	'post_type'=>'shop_order',
	'post_title'=>get_post($product_id)->post_title,
));

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'price', get_post_meta($product_id, 'price', true), true);

$product = array(
	'id'=>$product_id,
	'name'=>get_post($product_id)->post_title,
	'thumbnail'=>wp_get_attachment_url(get_post_meta($product_id, '_thumbnail_id', true)),
	'price'=>get_post_meta($product_id, 'price', true),
);

add_post_meta($order_id, 'product', $product_id, true);
add_post_meta($order_id, 'product_meta', json_encode($product), true);

$wx = new WeixinAPI();

$wx->oauth_redirect(site_url() . '/wx/wxpay/?pay_order=' . $order_id);