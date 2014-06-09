<?php
get_header('mobile');
?>
<div class="head">
	<img src="<?= get_template_directory_uri() ?>/img/mobile/logo.png" class="logo">
</div>
<?php wp_nav_menu(array('menu'=>'mobile-foot', 'container'=>false, 'menu_class'=>'nav')); ?>
<?php get_footer('mobile'); ?>
