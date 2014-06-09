<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('mobile/brand');
});
get_header('mobile');
?>
<div class="head">
	<img src="<?=get_template_directory_uri()?>/img/mobile/logo.png" class="logo">
</div>
<div class="content">
	<div class="content-inner">
		<div class="banner center">生活是一个无边的圆
			<br>圆心无处不在
			<br>而圆周不在任何地方</div>
		<img src="<?=get_template_directory_uri()?>/img/mobile/brand-1.jpg">
		<h3 class="center title">品牌介绍</h3>
		<p>始创于2013年的彩色珠宝品牌Circle，关注女性的生命状态，希望通过精心打造的每一件彩色珠宝，倡导一种融通豁达的生活态度。</p>
		<p>Circle,探索女性与自我的相处，期望通过不同个性的珠宝促成此我与彼我的一场缘分，寻找你不自知的另一面。当女人遇见那个神秘的隐藏的自己，或许会回到原点，或许会找到缘点，又或许会走向圆点。</p>
		<img src="<?=get_template_directory_uri()?>/img/mobile/brand-2.jpg">
		<p>Circle珠宝作为国内专注于轻奢彩色珠宝的新锐品牌，旗下汇集许多来自欧美和日本的优秀独立设计师和品牌，力求在循环往复的流行风潮中呈现温柔岁月的女性表情和惊艳时代的女性价值。</p>
		<img src="<?=get_template_directory_uri()?>/img/mobile/brand-3.jpg">
		<p class="footer center">Circle，缘你而起，圆你所望。</p>
	</div>
</div>
<?php wp_nav_menu(array('menu'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav')); ?>
<?php get_footer('mobile'); ?>