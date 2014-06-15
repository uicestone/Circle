<?php
/** 
 * 微信API响应页面，用来处理来自微信的请求
 */
$wx = new WeixinAPI();
		
// 验证请求来自微信
$wx->verify();

if(isset($_GET['echostr'])){
	echo $_GET['echostr'];
}

if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	xml_parse_into_struct(xml_parser_create(), $GLOBALS["HTTP_RAW_POST_DATA"], $post);

	$post=array_column($post,'value','tag');

	if(!is_array($post)){
		exit('XML parse error.');
	}

	// 事件消息			
	if($post['MSGTYPE'] === 'event'){
		
		// 未关注用户扫带参数码
		if($post['EVENT'] === 'subscribe'){
			$scene_id = str_replace('qrscene_', '', $post['EVENTKEY']);
		}
		// 已关注用户扫带参数码
		elseif($post['EVENT'] === 'SCAN'){
			$scene_id = $post['EVENTKEY'];
		}
		
		$qrcode = json_decode(get_option('wx_qrscene_' . $scene_id));
		
		if($qrcode->action_info->action === 'login'){
			$users = get_users(array('meta_key'=>'wx_openid','meta_value'=>$post['FromUserName']));
			if(!$users){
				$user_info = $wx->get_user_info($post['FromUserName']);
				$user_id = register_new_user($user_info->nickname, $user_info->nickname . '@circlewava.com');
				add_user_meta($user_id, 'wx_openid', $post['FromUserName']);
				add_user_meta($user_id, 'sex', $user_info->sex);
				add_user_meta($user_id, 'country', $user_info->country);
				add_user_meta($user_id, 'province', $user_info->province);
				add_user_meta($user_id, 'language', $user_info->language);
				add_user_meta($user_id, 'headimgurl', $user_info->headimgurl);
				add_user_meta($user_id, 'subscribe_time', $user_info->subscribe_time);
			}else{
				wp_set_auth_cookie($users[0]->ID, true);
			}
		}
		
	}
}
