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

$wx->onmessage('event', function($message){
	
	global $wx;
	
	// 未关注用户扫带参数码
	if($message['EVENT'] === 'subscribe'){
		$scene_id = str_replace('qrscene_', '', $message['EVENTKEY']);
	}
	// 已关注用户扫带参数码
	elseif($message['EVENT'] === 'SCAN'){
		$scene_id = $message['EVENTKEY'];
	}

	$qrcode = json_decode(get_option('wx_qrscene_' . $scene_id));

	if($qrcode->action_info->action === 'login'){

		$users = get_users(array('meta_key'=>'wx_openid','meta_value'=>$message['FROMUSERNAME']));

		if(!$users){
			$user_info = $wx->get_user_info($message['FROMUSERNAME']);
			$user_id = wp_create_user($user_info->nickname, $message['FROMUSERNAME']);
			add_user_meta($user_id, 'wx_openid', $message['FROMUSERNAME'], true);
			add_user_meta($user_id, 'sex', $user_info->sex, true);
			add_user_meta($user_id, 'country', $user_info->country, true);
			add_user_meta($user_id, 'province', $user_info->province, true);
			add_user_meta($user_id, 'language', $user_info->language, true);
			add_user_meta($user_id, 'headimgurl', $user_info->headimgurl, true);
			add_user_meta($user_id, 'subscribe_time', $user_info->subscribe_time, true);
		}else{
			$user_id = $users[0]->ID;
			if($users[0]->user_login === substr($message['FROMUSERNAME'], -8, 8)){
				$user_info = $wx->get_user_info($message['FROMUSERNAME']);
				update_user_meta($user_id, 'nickname', $user_info->nickname);
				add_user_meta($user_id, 'sex', $user_info->sex, true);
				add_user_meta($user_id, 'country', $user_info->country, true);
				add_user_meta($user_id, 'province', $user_info->province, true);
				add_user_meta($user_id, 'language', $user_info->language, true);
				add_user_meta($user_id, 'headimgurl', $user_info->headimgurl, true);
				add_user_meta($user_id, 'subscribe_time', $user_info->subscribe_time, true);
			}
		}

		$qrcode->loggin_openid = $message['FROMUSERNAME'];
		$qrcode->loggin_userid = $user_id;

		update_option('wx_qrscene_' . $scene_id, json_encode($qrcode));
		
		$wx->reply_message('亲爱的，您已经登录桌面版缘点彩宝，请查看你的电脑端挑选钟意的珠宝', $message);

	}
});

