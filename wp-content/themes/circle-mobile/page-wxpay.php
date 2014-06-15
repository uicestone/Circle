<?php
/**
 * 微信用户授权跳转回调页面
 * 利用open_id和access_token调用地址和支付接口
 */
if(!isset($_GET['code']) || !isset($_GET['state'])){
	exit('Not redirected from weixin oauth.');
}
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_script('jquery');
});
$wx = new WeixinAPI();
$order_id = $_GET['pay_order'];
get_header();
?>

<script type="text/javascript">
	
	window.onerror = function (errorMsg, url, lineNumber) {
		alert('Error: ' + errorMsg + ' Script: ' + url + ' Line: ' + lineNumber);
	}
	
	jQuery(document).on('WeixinJSBridgeReady', function(){
		WeixinJSBridge.invoke('editAddress', <?=json_encode($wx->generate_js_edit_address_args())?>, function(response){
			var shipInfo = {
				receiver: response.userName,
				contact: response.telNumber,
				zipcode: response.addressPostalCode,
				province: response.proviceFirstStageName + ' ' + response.addressCitySecondStageName + ' ' + response.addressCountiesThirdStageName,
				address: response.addressDetailInfo
			};
			
			jQuery.post(siteUrl + '/order/?set_order=' + '<?=$order_id?>', shipInfo, function(response){
				WeixinJSBridge.invoke('getBrandWCPayRequest',<?=json_encode($wx->generate_js_pay_args(site_url() . '/wx/payment-confirm/', $order_id, get_post_meta($order_id, 'price', true), get_post($order_id)->post_title))?>, function(response) {
					// 返回 res.err_msg,取值
					// get_brand_wcpay_request:cancel 用户取消 // get_brand_wcpay_request:fail 发送失败
					// get_brand_wcpay_request:ok 发送成功
//					WeixinJSBridge.log(res.err_msg);
//					alert(res.err_code + res.err_desc);
					window.location.href = siteUrl + '/payment-success/';
				});
			});
		});
	});
		
	
</script>
<?php get_footer(); ?>
