<?php
/**
 * 申请一个微信带参数二维码，返回链接和过期时间
 */
$wx = new WeixinAPI();
echo json_encode($wx->generate_qr_code(1,array('action'=>$_GET['action'])));
