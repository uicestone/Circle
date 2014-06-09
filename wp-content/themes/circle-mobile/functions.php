<?php

add_action('init', function(){
	
	show_admin_bar(false);
	
	register_nav_menu('mobile-foot', '移动版底部固定菜单');
	register_nav_menu('desktop-head', '桌面版顶部固定菜单');
	
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
