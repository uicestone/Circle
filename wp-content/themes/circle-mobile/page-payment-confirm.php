<?php
// TODO 需要验证来源为微信
$order_id = $_GET['out_trade_no'];
update_post_meta($order_id, 'payed');