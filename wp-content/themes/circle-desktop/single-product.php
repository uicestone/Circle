<?php 
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
});
get_header();
?>
<div class="panel container">
	<div class="aside">
		<div class="inner">
			<div class="title">轻奢彩宝</div>
			<ul>
				<li class="active">
					<a href="#">爱，从自己开始。</a>
				</li>
				<li>
					<a href="#">闺蜜的果香</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="info">
		<div class="pic">
			<div class="inner">
				<img src="<?=get_template_directory_uri()?>/img/photos/detail.jpg">
			</div>
		</div>
		<div class="detail">
			<div class="head dblock">
				<div class="inner">18K金镶嵌钻石珍珠戒指
					<br>K18 diamond & pearl ring 
					<br>钻石:1.2mmX2Pcs 0.02ct,1.5mmX2Pcs 0.03ct, 珍珠:1.6mmX2Pcs 2mmX2Pcs, 2.2mmX1Pc 黄金：1.11g</div>
				<div class="price">￥2300</div>
			</div>
			<div class="meta dblock">
				<ul class="tips">
					<li><a href="javascript:;" data-toggle="modal" data-target="#modal-upkeep">如何保养</a>
					</li>
					<li><a href="javascript:;" data-toggle="modal" data-target="#modal-brand-service">品牌服务</a>
					</li>
					<li class="last"><a href="javascript:;" data-toggle="modal" data-target="#modal-certificate">查看证书</a>
					</li>
				</ul>
				<ul class="thumbs">
					<li>
						<img src="<?=get_template_directory_uri()?>/img/photos/detail-thumb.jpg">
					</li>
				</ul>
			</div>
			<div class="select dblock">
				<div class="title">选择戒圈</div>
				<ul class="choices">
					<li>10</li>
					<li>11</li>
					<li>12</li>
					<li class="active">13</li>
					<li>14</li>
				</ul><a href="#" class="howto">戒指选择指南</a>
			</div>
			<div class="buy dblock last"><a href="#" id="buy" class="submit">点击购买</a>
				<div class="hint">免运费
					<br>7天无理由退货</div>
			</div>
		</div>
	</div>
</div>
<script>
(function($){

	$("#buy").click(function(){
		judgeLogin(function(){
			$("#modal-order-detail").modal();
		},function(){
			$("#modal-login").modal();
		});
	});
})(jQuery);
</script>
<?php get_template_part('modal','upkeep') ?>
<?php get_template_part('modal','brand-service') ?>
<?php get_template_part('modal','certificate') ?>
<?php get_footer(); ?>		