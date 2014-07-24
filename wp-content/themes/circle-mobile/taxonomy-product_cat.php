<?php
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('collection');
	wp_enqueue_style('swiper');
	wp_enqueue_script('swiper');
});
add_filter('body_class', function($class){
	$class[] = 'nohead';
	return $class;
});
get_header();
?>
<div class="content">
	<?php
		$category_intro = get_posts(array('name'=>get_queried_object()->slug))[0];
		$gallery = get_post_meta($category_intro->ID, '_product_image_gallery', true);
		$image_ids = $gallery ? explode(',', $gallery) : array();
	?>
	<?php if(count($image_ids)): ?>
	<div class="slide">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php
				foreach($image_ids as $image_id):
				?>
				<div class="swiper-slide">
					<img src="<?=wp_get_attachment_url($image_id)?>" />
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="pagination"></div>
		<?php if(count($image_ids) > 1): ?>
		<div class="arrows">
			<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" class="prev" />
			<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" class="next" />
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>
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
<script>
jQuery(function($){
	var swiper = new Swiper('.swiper-container', {
		pagination: '.pagination',
		loop: false
	});


	$(".prev").on("click", function() {
		swiper.swipePrev();
	});

	$(".next").on("click", function() {
		swiper.swipeNext();
	});
});
</script>
<?php get_footer(); ?>
