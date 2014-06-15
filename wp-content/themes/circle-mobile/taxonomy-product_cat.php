<?php

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('collection');
});
add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});
get_header();
?>
<div class="content">
	<ul class="list">
		<?php while(have_posts()): the_post(); ?>
		<li class="item">
			<a href="<?php the_permalink(); ?>">
				<?=str_replace('class="', 'class="pic ', wp_get_attachment_image(get_post_meta(get_the_ID(), '_mobile_list_thumbnail', true), 'mobile-list-thumbnail', true))?>
				<div class="txt">
					<div class="title"><?php the_title(); ?></div>
					<div class="price">￥<?=get_post_meta(get_the_ID(), 'price', true)?></div>
				</div>
			</a>
		</li>
		<?php endwhile; ?>
	</ul>
</div>
<?php get_footer(); ?>
