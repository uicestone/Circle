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
<div style="height:auto;background-image:url('<?=get_template_directory_uri()?>/img/tile.png');" class="head">
    <img src="<?=get_template_directory_uri()?>/img/new-nav.png" style="width:100%">
</div>
<div class="content">
	<h1><?php the_title(); ?></h1>
	<div class="detail">
		<?php the_content() ?>
	</div>
</div>
<?php get_footer(); ?>