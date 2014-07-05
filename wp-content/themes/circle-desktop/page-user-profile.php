<?php
foreach(array(
	'nickname',
	'province',
	'address',
	'zipcode',
	'receiver',
	'contact'
) as $key){
	if(isset($_POST[$key])){
		update_user_meta(get_current_user_id(), $key, $_POST[$key]);
	}
}

$qrcode = json_decode(get_option('wx_qrscene_' . $_GET['scene_id']));
if(isset($qrcode->loggin_userid)){
	wp_set_auth_cookie($qrcode->loggin_userid);
	wp_set_current_user($qrcode->loggin_userid);
	delete_option('wx_qrscene_' . $_GET['scene_id']);
}

header('Content-Type: application/json');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // 一个过去的时间，试图强制浏览器下次刷新
get_template_part('user-profile');
