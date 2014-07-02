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

$sizes = get_post_meta(get_the_ID(), 'sizes', true);

get_header();
?>
<div style="height:auto;background-image:url('<?=get_template_directory_uri()?>/img/tile.png');" class="head">
    <img src="<?=get_template_directory_uri()?>/img/new-nav.png" style="width:100%">
</div>
<div class="content">
	<form action="<?=$wx->oauth_redirect(site_url() . '/buy/?buy_product=' . get_the_ID(), '', 'snsapi_base', false)?>" method="post" id="form-buy">
	<div class="product">
		<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_mobile_product_head', true), 'mobile-product-head'); ?>
	</div>
	<table class="table">
		<tr>
			<td class="fname w4">商 品 名 称</td>
			<td><?php the_title(); ?></td>
		</tr>
		<tr>
			<td class="fname w2">材 质</td>
			<td><?=get_piece(get_post_meta(get_the_ID(), 'material', true), 1)?></td>
		</tr>
		<tr>
			<td class="fname w3">制 造 地</td>
			<td><?=get_piece(get_post_meta(get_the_ID(), 'origin', true), 1)?></td>
		</tr>
		<tr>
			<td class="fname w2">价 格</td>
			<td style="font-size: 15px;color: #25a58e;">¥<?=get_post_meta(get_the_ID(), 'price', true)?></td>
		</tr>
		<?php if($sizes){ ?>
		<tr>
			<td class="fname w4">戒 圈 选 择</td>
			<td>
				<?php foreach(explode(',', $sizes) as $index => $size){ ?>
				<span class="page<?php if($index === 0){ ?> current<?php } ?>"><?=$size?></span>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	<input type="hidden" name="size" value="10" id="size">
	<?php if(is_numeric(get_post_meta(get_the_ID(), 'price', true))){ ?>
	<a href="#" class="buy" id="btn-buy" />立即购买</a>
	<?php } ?>
	</form>
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
<script>
(function(){
var sizes = document.querySelectorAll("tr .page");
var sizeInput = document.getElementById("size");
var current = sizes[0];
for(var i=0;i<sizes.length;i++){
  (function(i){
	var size = sizes[i]
  size.addEventListener("click",function(){
    current.setAttribute("class","page");
    size.setAttribute("class","page current");
    current = size;
    sizeInput.value = current.innerHTML;
  });
  })(i);
}
})();
document.getElementById("btn-buy").addEventListener("click",function(){
	document.getElementById("form-buy").submit();
});
</script>
<?php get_footer(); ?>