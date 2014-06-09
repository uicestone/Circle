<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('mobile/pay');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	$class[] = 'nonav';
	return $class;
});

get_header('mobile');
?>
<div class="content">
	<div class="head">
		<img src="<?= get_template_directory_uri() ?>/img/mobile/biglogo.png" class="logo">
	</div>
	<div class="msg">
		<div class="cn">支付成功!</div>
		<div class="en">ORDER COMPLETE</div>
	</div>
	<div class="btns">
		<div class="btn">
			<div class="text">注册账号</div>
		</div>
		<div class="btn">
			<div class="text">查看订单</div>
		</div>
	</div>
</div>
<?php get_footer('mobile'); ?>
