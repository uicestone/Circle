<?php

add_action('init', function(){
	
	$css_files = array('base', 'brand', 'collection', 'detail', 'login', 'mixins', 'my', 'order', 'pay', 'swiper', 'variables');
	
	foreach($css_files as $css_file){
		wp_register_style($css_file, get_template_directory_uri() . '/css/' . $css_file . '.css');
	}
	
	wp_register_script('zepto', get_template_directory_uri() . '/js/zepto.js');
	wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.js', array('jquery'));
	
});

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('base');
	wp_enqueue_script('zepto');
});
