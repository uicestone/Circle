<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('detail');
});

add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});

$wx = new WeixinAPI();
the_post(); 

$sizes = get_post_meta(get_the_ID(), 'sizes', true);

get_header();
?>
<div class="content">
	<div class="product">
		<?php the_post_thumbnail('mobile-product-head'); ?>
	</div>
	<h1><?php the_title(); ?></h1>
	<div class="detail" style="width:90%">
		<?php the_content() ?>
	</div>
</div>
<?php get_footer(); ?>