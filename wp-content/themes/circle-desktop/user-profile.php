<?php

$qrcode = json_decode(get_option('wx_qrscene_1'));
if(isset($qrcode->loggin_userid)){
	wp_set_auth_cookie($qrcode->loggin_userid);
	wp_set_current_user($qrcode->login_userid);
	delete_option('wx_qrscene_1');
}

$output_keys = array(
	'nickname',
	'provice',
	'address',
	'zipcode',
	'receiver',
	'contact'
);

if(is_user_logged_in()){
	$meta = get_user_meta(get_current_user_id());
	
	foreach($meta as $key => $value){
		if(!in_array($key, $output_keys)){
			unset($meta[$key]);
		}
		else{
			$meta[$key] = array_pop($value);
		}
	}
	
}else{
	$meta = new stdClass();
}

echo json_encode($meta);
