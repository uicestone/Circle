<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('collection');
	wp_enqueue_style('swiper');
	wp_enqueue_script('swiper');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});

get_header();

?>
<div class="content">
	<div class="slide">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<img src="<?=get_template_directory_uri()?>/img/mothers-day.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="<?=get_template_directory_uri()?>/img/mothers-day.jpg" />
				</div>
				<div class="swiper-slide">
					<img src="<?=get_template_directory_uri()?>/img/mothers-day.jpg" />
				</div>
			</div>
		</div>
		<div class="pagination"></div>
		<div class="arrows">
			<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" class="prev" />
			<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" class="next" />
		</div>
	</div>
	<ul class="list">
		<li class="item right">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_01.jpg" class="pic" />
				<div style="background-color:rgba(209,203,191,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_02.jpg" class="pic" />
				<div style="background-color:rgba(209,203,191,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item right">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_03.jpg" class="pic" />
				<div style="background-color:rgba(209,203,191,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_04.jpg" class="pic" />
				<div style="background-color:rgba(187,201,195,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_05.jpg" class="pic" />
				<div style="background-color:rgba(167,179,170,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item right">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_06.jpg" class="pic" />
				<div style="background-color:rgba(189,203,199,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_07.jpg" class="pic" />
				<div style="background-color:rgba(144,161,161,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item right">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_08.jpg" class="pic" />
				<div style="background-color:rgba(111,128,127,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_09.jpg" class="pic" />
				<div style="background-color:rgba(98,115,111,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item left">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_10.jpg" class="pic" />
				<div style="background-color:rgba(168,182,181,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
		<li class="item right">
			<a href="#">
				<img src="<?=get_template_directory_uri()?>/img/collection_0_11.jpg" class="pic" />
				<div style="background-color:rgba(168,182,181,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title">红宝石镶钻项链</div>
						<div class="price">￥2320</div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
				</div>
			</a>
		</li>
	</ul>
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
	});
</script>
<?php get_footer(); ?>
