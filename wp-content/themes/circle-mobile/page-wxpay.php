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
					window.location.href = siteUrl + '/payment-success/';
			});
		});
	});
		
	
</script>
<?php get_footer(); ?>
