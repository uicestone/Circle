<?php 
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('list');
});
get_header();
?>
<div class="panel container">
	<div class="aside">
		<div class="inner">
			<div class="title">轻奢彩宝</div>
			<ul>
				<li class="active"><a href="#">爱，从自己开始。</a>
				</li>
				<li><a href="#">闺蜜的果香</a>
				</li>
			</ul>
		</div>
		<div class="ph"></div>
	</div>
	<div class="info">
		<ul class="list">
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list1.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list2.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list1.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list2.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list1.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list2.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list1.jpg">
				</a>
			</li>
			<li>
				<a href="<?= site_url() ?>/detail/">
					<img src="<?= get_template_directory_uri() ?>/img/photos/list2.jpg">
				</a>
			</li>
		</ul>
	</div>
</div>
<?php get_footer(); ?>
