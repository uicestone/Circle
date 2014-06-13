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
	<div class="slide">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php
				$category_intro = get_posts(array('name'=>get_queried_object()->slug))[0];
				$gallery = get_post_meta($category_intro->ID, '_product_image_gallery', true);
				$image_ids = $gallery ? explode(',', $gallery) : array();
				foreach($image_ids as $image_id):
				?>
				<div class="swiper-slide">
					<img src="<?=wp_get_attachment_url($image_id)?>" />
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="pagination"></div>
		<div class="arrows">
			<img src="<?=get_template_directory_uri()?>/img/arrow-left.png" class="prev" />
			<img src="<?=get_template_directory_uri()?>/img/arrow-right.png" class="next" />
		</div>
	</div>
	<ul class="list">
		<?php while(have_posts()): the_post(); ?>
		<li class="item">
			<a href="<?php the_permalink(); ?>">
				<?php echo wp_get_attachment_image(get_post_meta(get_the_ID(), '_mobile_list_thumbnail', true), 'mobile-list-thumbnail') ?>
				<div style="background-color:rgba(209,203,191,0.3)" class="txt">
					<div class="txt-inner">
						<div class="title"><?php the_title(); ?></div>
						<div class="price">￥<?=get_post_meta(get_the_ID(), 'price', true)?></div>
						<img src="<?=get_template_directory_uri()?>/img/right-arr-circle.png" class="arr" />
					</div>
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
			loop: true
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
