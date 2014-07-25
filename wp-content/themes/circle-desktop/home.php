<?php get_header(); ?>
<style>
	.aside {
		min-width: 150px
	}
</style>
<div class="panel">
	<div class="aside">
		<div class="inner">
			<?php wp_nav_menu(array('theme_location'=>'desktop-side', 'container'=>false));?>
		</div>
	</div>
	<img src="<?=get_template_directory_uri()?>/img/photos/index.jpg" class="bigpic">
</div>
<?php get_footer('desktop'); ?>
