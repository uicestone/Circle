<?php

$output_keys = array(
	'nickname',
	'province',
	'address',
	'zipcode',
	'receiver',
	'contact'
);

$output = new stdClass();
	
if(is_user_logged_in()){
	$meta = get_user_meta(get_current_user_id());
	
	foreach($output_keys as $output_key){
		$output->$output_key = isset($meta[$output_key]) ? $meta[$output_key][0] : null;
	}
	
}

echo json_encode($output);
