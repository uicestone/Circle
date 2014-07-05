<?php get_header(); ?>
<style>
	.aside {
		min-width: 150px
	}
</style>
<div class="panel container">
	<div class="aside">
		<div class="inner">
			<div class="title">轻奢彩宝</div>
			<?php wp_nav_menu(array('theme_location'=>'desktop-side', 'container'=>false));?>
		</div>
	</div>
	<img src="<?=get_template_directory_uri()?>/img/photos/index.jpg" class="bigpic">
</div>
<?php get_footer('desktop'); ?>
