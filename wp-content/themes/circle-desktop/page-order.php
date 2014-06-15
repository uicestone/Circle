<?php
/**
 * 桌面版订单AJAX响应接口
 * 可以输出当前登录用户的所有订单或者一个订单信息
 */
if(isset($_GET['id'])){
	$order = get_post($_GET['id']);
	if(get_current_user_id() != $order->post_author){
		exit('No permission to access order' . $_GET['id']);
	}
	
	$order_meta = get_post_meta($_GET['id'], '', true);
	
	$order = array(
		"date"=>"value",
		"province"=>"",//省市信息
		"address"=>"",//详细地址
		"zipcode"=>"",
		"receiver"=>"",//收货人姓名
		"contact"=>"",//联系方式
		"id"=>"",
		"num"=>"",
		"price"=>"",//订单总价
		"product"=>0,
		"product_meta"=>array(
			"id"=>0,
			"name"=>"",
			"size"=>"",
			"amount"=>"",
			"price"=>0.00,
			"thumbnail"=>"{url}"
		)
	);
}
