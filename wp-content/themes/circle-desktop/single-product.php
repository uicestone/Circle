<?php 
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
});
the_post();
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
				<?php $image_ids = explode(',', get_post_meta(get_the_ID(), '_product_image_gallery', true)); ?>
				<?php foreach($image_ids as $image_id){ ?>
					<?php echo wp_get_attachment_image($image_id, 'desktop-product-gallery')?>
				<?php } ?>
			</div>
		</div>
		<div class="detail">
			<div class="head dblock">
				<div class="inner">
					<?php the_title(); ?>
					<br>
					<?php echo get_piece(get_post_meta(get_the_ID(), 'name_en', true))?>
					<br>
					<?php echo get_piece(get_post_meta(get_the_ID(), 'material', true)); ?>
				</div>
				<div class="price">￥<?php echo get_post_meta(get_the_ID(), 'price', true); ?></div>
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
<!--				<ul class="thumbs">
					<li>
						<img src="<?=get_template_directory_uri()?>/img/photos/detail-thumb.jpg">
					</li>
				</ul>-->
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
	$(".choices li").click(function(){
		$(".choices li").removeClass("active");
		$(this).addClass("active");
	});
	$("#buy").click(function(){
		judgeLogin(function(){
			// $("#modal-order-confirm").modal();
			// return
			var count = 2;
			var profile,product;
			var size = $(".choices .active").text();
			$.get(apiBase + "/user-profile/",function(data){
				profile = data; success();
			});
			$.get(apiBase + "/product/",function(data){
				product = $.extend(data,{amount:1,size:size}); success();
			});
			function success(){
				count--;
				if(count !== 0 ){return;}
				var modal = $("#modal-order-confirm");
				modal.modal();
				modal.find(".addresses").html( render($("#tpl-address").html(),{profile:profile}) );
				modal.find(".order-detail").html( render($("#tpl-order-detail").html(),{product:product}) );
			}
		},function(){
			$("#modal-login").modal();
		});
	});
})(jQuery);
</script>
<?php get_template_part('modal','upkeep') ?>
<?php get_template_part('modal','brand-service') ?>
<?php get_template_part('modal','certificate') ?>
<?php get_template_part('modal','order-confirm') ?>
<?php get_footer(); ?>		