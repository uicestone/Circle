<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('list');
});
get_header();
?>
<div class="panel">
	<div class="aside">
		<div class="inner">
			<?php wp_nav_menu(array('theme_location'=>'desktop-side', 'container'=>false));?>
		</div>
		<div class="ph"></div>
	</div>
	<div class="info">
		<ul class="list">
			<?php while(have_posts()): the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('desktop-list-thumbnail'); ?>
				</a>
			</li>
<!--			<div class="swiper-slide">
				<img src="<?=wp_get_attachment_url($gallery_image_id)?>" />
			</div>-->
			<?php endwhile; ?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>
