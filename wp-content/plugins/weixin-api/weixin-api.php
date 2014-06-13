<?php
/**
 * Plugin Name: Weixin API
 * Plugin URI: 
 * Description: 
 * Version: 0.1
 * Author: Uice Lu
 * Author URI: https://cecilia.uice.lu/
 * License: 
 */
class WeixinAPI {
	
	private $partner_id;
	private $partner_key;
	private $pay_sign_key;
	private $app_id;
	private $app_secret;
	
	function __construct() {
		$this->partner_id = get_option('wx_partner_id');
		$this->partner_key = get_option('wx_partner_key');
		$this->pay_sign_key = get_option('wx_pay_sign_key');
		$this->app_id = get_option('wx_app_id');
		$this->app_secret = get_option('wx_app_secret');
	}
	
	/*
	 * 接口测试
	 */
	function test(){
		if(isset($_GET['echostr'])){
			$sign = array(
				'Test',
				$_GET['timestamp'],
				$_GET['nonce']
			);

			sort($sign);

			if(sha1(implode($sign)) == $_GET['signature']){
				echo $_GET['echostr'];
			}else{
				exit('Signature verification failed.');
			}
		}
	}
	
	function get_access_token(){
		
		$stored = json_decode(get_option('wx_access_token'));
		
		if($stored && $stored->expires_at > time()){
			return $stored->token;
		}
		
		$query_args = array(
			'grant_type'=>'client_credential',
			'appid'=>$this->app_id,
			'secret'=>$this->app_secret
		);
		
		$return = json_decode(file_get_contents('https://api.weixin.qq.com/cgi-bin/token?' . http_build_query($query_args)));
		
		if($return->access_token){
			update_option('wx_access_token', json_encode(array('token'=>$return->access_token, 'expires_at'=>time() + $return->expires_in)));
			return $return->access_token;
		}
		
		return false;
		
	}
	
	/**
	 * 生成授权地址
	 * @param type $redirect_uri
	 * @param type $scope
	 * @return string
	 */
	function get_auth_url($redirect_uri = null, $scope = 'snsapi_base'){
		$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?';
		$query_args = array(
			'appid'=>$this->app_id,
			'redirect_uri'=>is_null($redirect_uri) ? site_url() : $redirect_uri,
			'response_type'=>'code',
			'scope'=>$scope,
			'state'=>1
		);
		$url .= http_build_query($query_args) . '#wechat_redirect';
		return $url;
	}
	
	/*
	 * 获得用户信息
	 */
	function get_auth_info(){
		if(isset($_GET['code'])){
			
			$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?';
			
			$query_args = array(
				'appid'=>$this->app_id,
				'secret'=>$this->app_secret,
				'code'=>$_GET['code'],
				'grant_type'=>'authorization_code'
			);

			$auth_result = json_decode(file_get_contents($url . http_build_query($query_args)));

			if(!isset($auth_result->openid)){
				exit('Authentication failed.');
			}

			if($auth_result->scope === 'snsapi_base'){
				update_option('wx_oauth_access_token_' . $auth_result->openid, $auth_result->access_token);
				return $auth_result->openid;
			}

			if($auth_result->scope === 'snsapi_userinfo'){
				$user_info = json_decode(file_get_contents('https://api.weixin.qq.com/sns/userinfo?access_token=' . $auth_result->access_token . '&openid=' . $auth_result->openid . '&lang=zh_CN'));
				return $user_info;
			}
			
			// TODO 授权需要刷新
			function refresh_token($refresh_token){
				$auth_result = json_decode(file_get_contents('https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=wxccb5433a51ab1bb4&grant_type=refresh_token&refresh_token=' . $refresh_token));
				return $auth_result;
			}

		}	
	}
	
	function generate_js_pay_args($order_id){
		
		$package_data = array(
			'bank_type'=>'WX',
			'body'=>'测试订单',
			'attach'=>'CircleWava',
			'partner'=>$this->partner_id,
			'out_trade_no'=>$order_id,
			'total_fee'=>(string)10,
			'fee_type'=>'1',
			'notify_url'=>'http://dev.circlewava.com/wx/payment-confirm/',
			'spbill_create_ip'=>$_SERVER['REMOTE_ADDR'],
			'input_charset'=>'UTF-8'
		);

		ksort($package_data, SORT_STRING);

		$string1 = urldecode(http_build_query($package_data));
		$stringSignTemp = $string1 . '&key=' . get_option('wx_partner_key');
		$signValue = strtoupper(md5($stringSignTemp));
		$string2 = http_build_query($package_data, null, null, PHP_QUERY_RFC3986);
		$package = $string1 . '&sign=' . $signValue;

		$nonce_str = (string) rand(1E15, 1E16-1);
		$timestamp = time();

		$pay_sign_data = array(
			'appid'=>get_option('wx_app_id'),
			'timestamp'=>$timestamp,
			'noncestr'=>$nonce_str,
			'package'=>$package,
			'appkey'=>get_option('wx_pay_sign_key')
		);

		ksort($pay_sign_data, SORT_STRING);
		$string1 = urldecode(http_build_query($pay_sign_data));
		$pay_sign = sha1($string1);

		$pay_request_args = array(
			'appId'=>get_option('wx_app_id'),
			'timeStamp'=>$timestamp,
			'nonceStr'=>$nonce_str,
			'package'=>$package,
			'signType'=>'SHA1',
			'paySign'=>$pay_sign,
		);
		
		return $pay_request_args;
	}
	
	function generate_js_edit_address_args(){
		
		$args = array(
			'appId'=>$this->app_id,
			'scope'=>'jsapi_address',
			'signType'=>'sha1',
			'addrSign'=>'',
			'timeStamp'=>time(),
			'nonceStr'=>(string) rand(1E15, 1E16-1)
		);
		
		$sign_args = array(
			'appid'=>$this->app_id,
			'url'=>"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
			'timestamp'=>$args['timeStamp'],
			'noncestr'=>$args['nonceStr'],
			'accesstoken'=>$this->get_access_token()
		);
		
		ksort($sign_args, SORT_STRING);
		$string1 = urldecode(http_build_query($sign_args));
		
		$args['addrSign'] = sha1($string1);

		return $args;
		
	}
	
	function generate_qr_code($scene_id, $action_info = array(), $action_name = 'QR_SCENE', $expires_in = '1800'){
		
		$url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=' . $this->get_access_token();
		
		$post_data = array(
			'expire_seconds'=>$expires_in,
			'action_name'=>$action_name,
			'action_info'=>$action_info,
			'scene_id'=>$scene_id
		);
		
		$ch = curl_init($url);
		
		curl_setopt_array($ch, array(
			CURLOPT_POST => TRUE,
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => json_encode($post_data)
		));
		
		$response = json_decode(curl_exec($ch));
		
		if(!$response->ticket){
			return $response;
		}
		
		return 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . urlencode($response->ticket);
		
	}
	
}
