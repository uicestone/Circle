<?php
/**
 * 微信支付页面
 * 调用收获地址共享和支付接口
 */
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_script('jquery');
});

$wx = new WeixinAPI();

if(empty($_GET['pay_order'])){
	exit('order not specified');
}

$order_id = $_GET['pay_order'];

get_header();
?>

<script type="text/javascript">
	
	window.onerror = function (errorMsg, url, lineNumber) {
		alert('Error: ' + errorMsg + ' Script: ' + url + ' Line: ' + lineNumber);
	}
	
	jQuery(document).on('WeixinJSBridgeReady', function(){
		WeixinJSBridge.invoke('editAddress', <?=json_encode($wx->generate_js_edit_address_args())?>, function(response){
			
			if(response.err_msg !== 'edit_address:ok'){
				document.write('物流信息获取错误');
				return false;
			}
			
			var shipInfo = {
				receiver: response.userName,
				contact: response.telNumber,
				zipcode: response.addressPostalCode,
				province: response.proviceFirstStageName + ' ' + response.addressCitySecondStageName + ' ' + response.addressCountiesThirdStageName,
				address: response.addressDetailInfo
			};
			
			jQuery.post(siteUrl + '/order/?set_order=' + '<?=$order_id?>', shipInfo, function(response){
				
				WeixinJSBridge.invoke('getBrandWCPayRequest',<?=json_encode($wx->generate_js_pay_args(site_url() . '/wx/payment-confirm/', $order_id, get_post_meta($order_id, 'price', true), get_post($order_id)->post_title))?>, function(response) {
					switch(response.err_msg){
						case 'get_brand_wcpay_request:ok':
							window.location.href = siteUrl + '/payment-success/';
							break;
						case 'get_brand_wcpay_request:cancel':
							document.write('已取消支付');
							break;
						case 'get_brand_wcpay_request:fail':
							document.write('支付请求发送失败');
							break;
					}
				});
			});
		});
	});
		
	
</script>
<?php get_footer(); ?>
