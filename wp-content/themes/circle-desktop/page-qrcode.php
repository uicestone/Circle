<?php
/**
 * 申请一个微信带参数二维码，返回链接和过期时间
 */
$wx = new WeixinAPI();

header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // 一个过去的时间，试图强制浏览器下次刷新
echo json_encode($wx->generate_qr_code(array('action'=>$_GET['action'])));
