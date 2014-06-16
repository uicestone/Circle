<?php
/**
 * 微信用户授权跳转回调页面
 * 利用open_id识别用户
 */

// 更新订单的物流信息
if(isset($_GET['set_order'])){
	update_option('wx_post_data', json_encode($_POST));
	$order_id = $_GET['set_order'];
	foreach($_POST as $key => $value){
		update_post_meta($order_id, $key, $value);
	}
	exit;
}

$wx = new WeixinAPI();

if(!isset($_GET['code']) || !isset($_GET['state'])){
	$wx->oauth_redirect(site_url() . '/order/');
}

$auth_info = $wx->get_oauth_token($_GET['code']);

$users = get_users(array('meta_key'=>'wx_openid','meta_value'=>$auth_info->openid));

if(!$users){
	header('Location: ' . site_url());
}

query_posts(array(
	'post_type'=>'shop_order',
	'author'=>$users[0]->ID,
));
get_header();
?>
<div class="head">
	<img src="<?=get_template_directory_uri()?>/img/logo.png" class="logo">
</div>
<div class="content">
	<div class="content-inner">
		<div class="orders">
			<?php while(have_posts()): the_post();?>
			<div class="order">
				<div class="order-detail">
					<div class="row code">订单编号：<?php the_ID(); ?></div>
					<div class="row time">成交时间：<?php the_date(); ?></div>
					<div class="row status">订单状态：<?=get_the_meta(get_the_ID(), 'status', true)?></div>
					<div class="row func">订单操作：
						<span><a href="<?=$wx->oauth_redirect(site_url() . '/pay/?pay_order' . get_the_ID())?>">{付款}</a></span>
						<span>{取消} </span>
					</div>
				</div>
				<div class="product">
					<img src="/img/order.jpg" class="pic" />
					<div class="info">
						<div class="name">商品名称： <?=json_decode(get_post_meta(get_the_ID(), 'product_meta', true))->name?></div>
						<div class="price">商品金额： ￥<?=get_post_meta(get_the_ID(), 'price', true)?></div>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php 
wp_reset_query();
get_footer();
?>
