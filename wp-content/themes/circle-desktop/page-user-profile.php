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

header('Content-Type: application/json');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // 一个过去的时间，试图强制浏览器下次刷新
get_template_part('user-profile');
