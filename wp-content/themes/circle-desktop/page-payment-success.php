<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('success');
});
get_header();
?>
<div class="panel">
	<div class="panel">
		<div class="panel-inner">
			<div class="logo">
				<img src="/img/logo-dark.png">
			</div>
			<div class="message">
				<p class="succ">购买成功</p>
				<p>您的订单编号为 253652987577412</p>
				<p>我们将在48小时内为您安排发货</p>
				<p>请耐心等待</p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>