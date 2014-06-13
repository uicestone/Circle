<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
	wp_enqueue_style('swiper');
	wp_enqueue_script('swiper');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});

$wx = new WeixinAPI();

get_header();
?>
<div class="content">
	<div class="product">
		<div class="slide">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
					$product_image_gallery = get_post_meta(get_the_ID(), 'product_image_gallery', true);
					$gallery_image_ids = $product_image_gallery ? explode(',', $product_image_gallery) : array();
					foreach($gallery_image_ids as $gallery_image_id):
					?>
					<div class="swiper-slide">
						<img src="<?=wp_get_attachment_url($gallery_image_id)?>" />
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="pagination"></div>
			<div class="arrows">
				<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" class="prev" />
				<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" class="next" />
			</div>
		</div>
	</div>
	<table class="table">
		<tr>
			<td class="fname w4">商品名称</td>
			<td><?php the_title(); ?></td>
		</tr>
		<tr>
			<td class="fname w4">材质</td>
			<td><?=get_post_meta(get_the_ID(), 'material', true)?></td>
		</tr>
		<tr>
			<td class="fname w3">制造地</td>
			<td><?=get_post_meta(get_the_ID(), 'origin', true)?></td>
		</tr>
		<tr>
			<td class="fname w2">价格</td>
			<td>¥<?=get_post_meta(get_the_ID(), 'price', true)?></td>
		</tr>
	</table>
	<a href="" class="buy">
		<img src="<?=get_template_directory_uri()?>/img/detail-buy.png" class="btn">
	</a>
	<div class="detail">
		<?php the_excerpt(); ?>
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
<script>
	jQuery(function($){
		var swiper = new Swiper('.swiper-container', {
			pagination: '.pagination',
			loop: true
		});

		$(".prev").on("click", function() {
			swiper.swipePrev();
		});

		$(".next").on("click", function() {
			swiper.swipeNext();
		});

		$(".plus").on("click", function() {
			var newval = +$("#count").val() + 1;
			$("#count").val(newval);
		});
		$(".minus").on("click", function() {
			var newval = +$("#count").val() - 1;
			newval = newval < 1 ? 1 : newval;
			$("#count").val(newval);
		});
	});
</script>
<?php get_footer(); ?>