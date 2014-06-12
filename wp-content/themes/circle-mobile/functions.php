<?php

add_action('init', function(){
	
	$scripts = array(
		'script'=>array('swiper', 'zepto'),
		'style'=>array('base', 'brand', 'collection', 'detail', 'login', 'mixins', 'my', 'order', 'pay', 'swiper', 'variables'),
	);
	
	foreach($scripts as $type => $script_files){
		$ext = $type === 'script' ? 'js' : 'css';
		foreach($script_files as $script_file){
			call_user_func('wp_register_' . $type, $script_file, get_template_directory_uri() . '/' . $ext . '/' . $script_file . '.' . $ext);
		}
	}
	
});

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('base');
	wp_enqueue_script('zepto');
});
