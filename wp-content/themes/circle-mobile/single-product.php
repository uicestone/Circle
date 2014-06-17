<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});

$wx = new WeixinAPI();
the_post(); 

get_header();
?>
<div class="content">
	<div class="product">
		<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_mobile_product_head', true), 'mobile-product-head'); ?>
	</div>
	<table class="table">
		<tr>
			<td class="fname w4">商品名称</td>
			<td><?php the_title(); ?></td>
		</tr>
		<tr>
			<td class="fname w4">材质</td>
			<td><?=get_piece(get_post_meta(get_the_ID(), 'material', true), 1)?></td>
		</tr>
		<tr>
			<td class="fname w3">制造地</td>
			<td><?=get_piece(get_post_meta(get_the_ID(), 'origin', true), 1)?></td>
		</tr>
		<tr>
			<td class="fname w2">价格</td>
			<td>¥<?=get_post_meta(get_the_ID(), 'price', true)?></td>
		</tr>
	</table>
	<a href="<?=$wx->oauth_redirect(site_url() . '/buy/?buy_product=' . get_the_ID(), '', 'snsapi_userinfo', false)?>" class="buy">
		<img src="<?=get_template_directory_uri()?>/img/detail-buy.png" class="btn">
	</a>
	<div class="detail">
		<?php the_content() ?>
	</div>
<!--	<div class="manufacturing">
		<div class="title">
			<div class="cn">制作过程</div>
			<div class="en">Manufacturing operation</div>
		</div>
		<img src="<?=get_template_directory_uri()?>/img/detail-manufacturing.jpg" class="pic">
		<p class="content">Love Talk红宝石镶钻项链由日本设计师青沼知行先生设计并在日本制造加工而成。珍贵天然红宝石产自缅甸,青沼家族在日本从事高级珠宝设计与制作的历史80余年历史，在日本久负盛名。此款红宝石项链是CIRCLE与青沼达成在中国的独家售卖权,有日本专业机构珠宝鉴定证书。</p>
	</div>-->
</div>
<?php get_footer(); ?>