<?php
foreach(array(
	'nickname',
	'provice',
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
get_template_part('user-profile');
