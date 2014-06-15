<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('pay');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	$class[] = 'nonav';
	return $class;
});

get_header();

?>
<div class="content">
	<div class="head">
		<img src="<?=get_template_directory_uri()?>/img/biglogo.png" class="logo">
	</div>
	<div class="msg">
		<div class="wait">CIRCLE高级珠宝只接受预订，
			<br>不日将一一呈现
			<br>亲爱的你请耐心等待
		</div>
	</div>
	<div class="btns">
		<div class="btn">
			<div class="text"><a href="<?=site_url()?>">点此返回</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
