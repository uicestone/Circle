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
					<li><a href="#">如何保养</a>
					</li>
					<li><a href="#">品牌服务</a>
					</li>
					<li class="last"><a href="#">查看证书</a>
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
			<div class="buy dblock last"><a href="#" data-toggle="modal" data-target="#myModal" class="submit">点击购买</a>
				<div class="hint">免运费
					<br>7天无理由退货</div>
			</div>
			<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
							<h4 id="myModalLabel" class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">...</div>
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>		