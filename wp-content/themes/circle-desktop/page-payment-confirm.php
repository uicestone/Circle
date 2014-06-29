<?php
/*
 * 微信的异步支付结果通知页面
 * 也是支付宝的同步支付结果提交页面
 */

if(isset($_GET['gateway']) && $_GET['gateway'] === 'alipay'){
	alipay_confirm();
}
else{
	// TODO 需要验证来源为微信
	$order_id = $_GET['out_trade_no'];

	if(update_post_meta($order_id, 'status', 'payed')){
		echo 'success';
	}
}