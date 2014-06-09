<?php 
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('desktop/detail');
});
get_header('desktop');
?>
<div class="header">
	<div class="container">
		<a href="<?=site_url()?>" class="brand">
			<img src="<?=get_template_directory_uri()?>/img/desktop/brand.png">
		</a>
		<ul class="nav">
			<li><a href="/html/list.html">轻彩宝</a>
			</li>
			<li><a href="/html/list.html">高级彩宝</a>
			</li>
			<li><a href="/html/brand.html">品牌故事</a>
			</li>
			<li><a href="<?=site_url()?>">My Circle</a>
			</li>
		</ul>
		<div class="user">
			<ul class="nav">
				<li><a href="javascript:;" data-toggle="modal" data-target="#modal-login">登录</a>
				</li>
				<li><a href="javascript:;" data-toggle="modal" data-target="#modal-register">注册</a>
				</li>
			</ul><a href="#" data-toggle="modal" data-target="#modal-mine" class="mine">Morning, 王同学</a>
		</div>
	</div>
</div>
<div class="content">
	<div class="panel container">
		<div class="aside">
			<div class="inner">
				<div class="title">轻奢彩宝</div>
				<ul>
					<li class="active"><a href="#">爱，从自己开始。</a>
					</li>
					<li><a href="#">闺蜜的果香</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="info">
			<div class="pic">
				<div class="inner">
					<img src="/photos/detail.jpg">
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
							<img src="/photos/detail-thumb.jpg">
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
</div>
<div class="footer">
	<div class="container">
		<ul class="nav">
			<li><span>@2014 circle</span>
			</li>
			<li><a href="/html/contact.html">联系我们</a>
			</li>
			<li><a href="/html/privacy.html">隐私政策</a>
			</li>
			<li><a href="/html/brand.html">使用条款</a>
			</li>
		</ul>
		<div class="social"><span>与我们互动</span>
			<img src="<?=get_template_directory_uri()?>/img/desktop/weixin.png">
			<img src="<?=get_template_directory_uri()?>/img/desktop/weibo.png">
		</div>
	</div>
</div>
<div id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
				<h4 id="modal-login-label" class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="left">
					<div class="inner">
						<h2>我已经是 circle 的用户</h2>
						<p style="margin-bottom:40px">请输入您的电子邮箱地址和密码来登录。</p>
						<div class="field">
							<div class="label">电子邮箱地址</div>
							<input class="form-control">
						</div>
						<div class="field">
							<div class="label">密码</div>
							<input class="form-control">
						</div>
						<div class="field"><a href="#">忘记密码？</a>
						</div>
						<div class="btn">登录</div>
					</div>
				</div>
				<div class="right">
					<div class="inner">
						<h2>我想成为 circle 的用户</h2>
						<p>如果您还不时 circle 的用户，亲在此注册。</p>
						<p>请您给我们提供一些必要信息，这将是您再 circle 有个更快更方便的购买过程。</p>
						<div class="btn">创建新用户</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
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
<div id="modal-mine" tabindex="-1" role="dialog" aria-labelledby="modal-mine-label" aria-hidden="true" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
				<h4 id="modal-mine-label" class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="left">
					<h2 class="title">我的账户</h2>
					<ul class="menu">
						<li class="active"><a href="#">已完成的订单</a>
						</li>
						<li><a href="#">退货</a>
						</li>
						<li><a href="#">票据</a>
						</li>
						<li><a href="#">地址收藏</a>
						</li>
						<li><a href="#">个人资料</a>
						</li>
						<li><a href="#">登录资料</a>
						</li>
						<li><a href="#">邮件订阅</a>
						</li>
					</ul>
				</div>
				<div class="right">
					<div class="head">
						<h2 class="title">已完成的订单</h2>
						<p>在这里您可以查看过往的订单</p>
					</div>
					<table class="table">
						<tr>
							<th>日期</th>
							<th>订单编号</th>
							<th>订单状态</th>
							<th>金额</th>
							<th>操作</th>
						</tr>
						<tr>
							<td>2014/5/20</td>
							<td>000000000000</td>
							<td>等待付款</td>
							<td><strong>￥2300</strong>
							</td>
							<td>
								<div class="btn">查看详情</div>
							</td>
						</tr>
						<tr>
							<td>2014/5/20</td>
							<td>000000000000</td>
							<td>等待付款</td>
							<td><strong>￥2300</strong>
							</td>
							<td>
								<div class="btn">查看详情</div>
							</td>
						</tr>
						<tr>
							<td>2014/5/20</td>
							<td>000000000000</td>
							<td>等待付款</td>
							<td><strong>￥2300</strong>
							</td>
							<td>
								<div class="btn">查看详情</div>
							</td>
						</tr>
						<tr>
							<td>2014/5/20</td>
							<td>000000000000</td>
							<td>等待付款</td>
							<td><strong>￥2300</strong>
							</td>
							<td>
								<div class="btn">查看详情</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer('desktop'); ?>
