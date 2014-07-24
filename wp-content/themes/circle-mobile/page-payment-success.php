<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('pay');
});
add_filter('body_class', function($class){
	$class[] = 'nohead';
	$class[] = 'nonav';
	return $class;
});
$wx = new WeixinAPI();
get_header();
?>
<div class="content">
	<div class="head">
		<img src="<?=get_template_directory_uri()?>/img/biglogo.png" class="logo">
	</div>
	<div class="msg">
		<div class="cn">支付成功!</div>
		<div class="en">ORDER COMPLETE</div>
	</div>
	<div class="btns">
		<div class="btn">
			<div class="text"><a href="<?=$wx->generate_oauth_url(site_url() . '/order/')?>">查看订单</a></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
