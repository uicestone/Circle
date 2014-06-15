<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<meta charset="UTF-8">
		<title>缘点彩色珠宝</title>
		<script>
			var profile = <?php get_template_part('user-profile'); ?>;
			var siteUrl = '<?=site_url();?>';
		</script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div class="header">
			<div class="container">
				<a href="<?=site_url()?>" class="brand">
					<img src="<?=get_template_directory_uri()?>/img/brand.png">
				</a>
				<?php wp_nav_menu(array('theme_location'=>'desktop-head', 'menu_class'=>'nav', 'container'=>false, 'fallback_cb'=>'wp_bootstrap_navwalker::fallback', 'walker'=>new wp_bootstrap_navwalker())); ?>
				<div class="user">
					<ul class="nav">
						<li class="menu-item">
							<a href="javascript:;" data-toggle="modal" data-target="#modal-login">登录</a>
						</li>
					</ul><a href="#" data-toggle="modal" data-target="#modal-mine" class="menu-item mine">Morning, 王同学</a>
				</div>
			</div>
		</div>
		<div class="content">

