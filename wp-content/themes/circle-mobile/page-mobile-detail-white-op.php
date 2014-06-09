<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('mobile/detail');
	wp_enqueue_style('mobile/swiper');
	wp_enqueue_script('mobile/swiper');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});

get_header('mobile');
?>
<div class="content">
	<div class="product">
		<div class="slide">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_00.jpg">
					</div>
					<div class="swiper-slide">
						<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_00.jpg">
					</div>
					<div class="swiper-slide">
						<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_00.jpg">
					</div>
				</div>
			</div>
			<div class="pagination"></div>
			<div class="arrows">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/arrow-left.png" class="prev">
				<img src="<?= get_template_directory_uri() ?>/img/mobile/arrow-right.png" class="next">
			</div>
		</div>
	</div>
	<table class="table">
		<tr>
			<td class="fname w4">商 品 名 称</td>
			<td>{多变之美} 黑欧泊钻石戒指</td>
		</tr>
		<tr>
			<td class="fname w4">主 要 材 质</td>
			<td>戒圈18K金 / 戒面黑欧泊石0.24ct</td>
		</tr>
		<tr>
			<td class="fname w3">制 造 地</td>
			<td>日本</td>
		</tr>
		<tr>
			<td class="fname w2">价 格</td>
			<td>2980</td>
		</tr>
	</table>
	<a href="#" class="buy">
		<img src="<?= get_template_directory_uri() ?>/img/mobile/detail-buy.png" class="btn">
	</a>
	<div class="detail">
		<div class="quote">
			<p class="center">“如果您未曾见过黑欧泊，您的确错过了一次精彩，
				<br>她像彩色水银般华理，图案闪烁夜空。
				<br>或许您漫游了世界，看见过很多，
				<br>但神秘欧泊中的景色只会出现在美妙的梦境中。”</p>
			<p class="right">——拉瑞·哈森</p>
		</div>
		<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_01.jpg">
		<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_02.jpg">
		<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_03.jpg">
		<p class="quote center">欧泊被鱼尾集宝石之美于一身的{宝石皇后}
			<br>戒面为产自澳大利亚的黑欧泊宝石
			<br>黑欧泊是世界上最高品质的欧泊</p>
		<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_04.jpg">
		<img src="<?= get_template_directory_uri() ?>/img/mobile/Dtail_white_op_ring_05.jpg">
	</div>
</div>
<script>
	var swiper = new Swiper('.swiper-container', {
		pagination: '.pagination',
		loop: true
	});


	$(".prev").on("touchend", function() {
		swiper.swipePrev();
	});

	$(".next").on("touchend", function() {
		swiper.swipeNext();
	});
</script>
<?php wp_nav_menu(array('menu'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav')); ?>
<?php get_footer('mobile'); ?>
