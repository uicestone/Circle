<?php

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
	
	header('Content-Type: application/json');
	echo json_encode($meta);
}
