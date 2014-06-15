<?php get_header(); ?>
<style>
	.content {
		background-color: #303030
	}
	.content .panel .aside {
		width: 35%
	}
	.content .panel .aside .inner {
		padding-top: 160px;
		color: #fff;
	}
	.content .panel .aside .inner p {
		margin-bottom: 50px;
		font-size: 12px;
		line-height: 1.8;
	}
	.content .panel .bigpic {
		width: 65%
	}
</style>

<div class="panel container">
	<div class="aside">
		<div class="inner">
			<div class="title">联系我们</div>
			<ul>
				<li>公司地址 杭州市上城区中河中路258号瑞丰大厦25B</li>
				<li>服务邮箱 service@circlewava.com</li>
				<li>客服电话 4008939319</li>
				<li>微信订阅号 circle-wechat</li>
				<li>微信服务号 circle9319</li>
			</ul>
		</div>
	</div>
	<img src="<?=get_template_directory_uri()?>/img/photos/contact.jpg" class="bigpic">
</div>
<?php get_footer(); ?>		