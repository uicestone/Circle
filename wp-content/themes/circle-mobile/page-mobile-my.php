<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('mobile/my');
});

get_header('mobile');
?>
<div class="head">
	<img src="<?= get_template_directory_uri() ?>/img/mobile/logo.png" class="logo">
</div>
<div class="content">
	<div class="content-inner">
		<div class="orders">
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
			<div class="order">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/order.jpg" class="pic">
				<div class="info">
					<div class="code">订单编号 7586245890241</div>
					<div class="name">缘点/CIRCLE铂金殴泊石戒指</div>
					<div class="pay">
						<div class="price">总价 ￥5559</div>
						<div class="status">未付款</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_nav_menu(array('menu'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav')); ?>
<?php get_footer('mobile'); ?>
