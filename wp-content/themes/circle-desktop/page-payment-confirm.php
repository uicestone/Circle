<?php
// TODO 需要验证来源为微信
$order_id = $_GET['out_trade_no'];

error_log('Confirming Order' . $order_id);
error_log(json_encode($_GET));

if(update_post_meta($order_id, 'status', 'payed')){
	echo 'success';
}
