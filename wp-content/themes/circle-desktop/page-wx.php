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
		if(empty($message['EVENTKEY'])){
			$reply_posts = get_posts(array('category_name'=>'消息', 'tag'=>'关注回复'));
			if($reply_posts){
				$wx->reply_post_message($reply_posts, $message);
			}
		}
		else{
			$scene_id = str_replace('qrscene_', '', $message['EVENTKEY']);
		}
	}
	// 已关注用户扫带参数码
	elseif($message['EVENT'] === 'SCAN'){
		$scene_id = $message['EVENTKEY'];
	}

	$qrcode = json_decode(get_option('wx_qrscene_' . $scene_id));

	if($qrcode->action_info->action === 'login'){

		$user_id = $wx->loggin($message['FROMUSERNAME']);
		
		$qrcode->loggin_openid = $message['FROMUSERNAME'];
		$qrcode->loggin_userid = $user_id;

		update_option('wx_qrscene_' . $scene_id, json_encode($qrcode));
		
		$wx->reply_message('亲爱的，您已经登录桌面版缘点彩宝，请查看你的电脑端挑选钟意的珠宝', $message);

	}
})->onmessage('text', function($message){
	
	global $wx;
	
	$user_id = $wx->loggin($message['FROMUSERNAME']);
	
	$content = $message['CONTENT'];
	
	wp_insert_post(array(
		'post_type'=>'message',
		'post_title'=>$content,
		'post_status'=>'private'
	));
	
	$reply_posts = get_posts(array('category_name'=>'消息', 'tag'=>$content));
	
	if($reply_posts){
		$wx->reply_post_message($reply_posts, $message);
	}
	else{
		$wx->transfer_customer_service($message);
	}
	
});

