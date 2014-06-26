<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('brand');
});

get_header();

?>
<div style="height:auto" class="head">
    <img src="<?=get_template_directory_uri()?>/img/new-nav.png" style="width:100%">
</div>
<div class="content">
	<div class="content-inner">
		<img src="<?=get_template_directory_uri()?>/img/page-brand-1.jpg">
		<h3>品牌介绍</h3>
		<p>彩色珠宝品牌Circle始创于2013年，以关注女性的生命状态为初衷，希望通过彩色珠宝倡导一种融通豁达的女性生活态度。</p>
		<img src="<?=get_template_directory_uri()?>/img/page-brand-2.jpg">
		<p>作为一个女性高端珠宝订制品牌， Circle聚集了来自欧美、日本的独立设计师和设计品牌，专注于打造适合中国女性的品质彩宝，力求在流行与经典的平衡中寻求中国女性与众不同的优雅格调和历久弥新的时尚内涵。<br/>
		Circle相信，女性的生命如同璀璨的彩色宝石一般丰富，个性化的珠宝不但可以帮助女性发掘自身的多种样貌，更可以让女性遇见更好的自己。</p>
		<p>生命如同无边之圆，无论是回到原点，还是找到缘点，又或是走向圆点，拥有circle,你的生命之圆都将拥有无穷的可能，无限的延伸。</p>
	</div>
</div>
<?php get_footer(); ?>
