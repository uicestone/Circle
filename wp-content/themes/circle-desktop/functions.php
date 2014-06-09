<?php

// Register Custom Navigation Walker
require_once('class/wp_bootstrap_navwalker.php');

add_action('init', function(){
	
	show_admin_bar(false);
	
	register_nav_menu('mobile-foot', '移动版底部固定菜单');
	register_nav_menu('desktop-head', '桌面版顶部固定菜单');
	register_nav_menu('desktop-foot', '桌面版底部固定菜单');
	
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
	
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/desktop/placeholder.js', array('jquery'));
	
	$scripts = array(
		'script'=>array('jquery.slides', 'mbox', 'mousewheel', 'placeholder', 'scrollbar'),
		'style'=>array('base', 'brand', 'collection', 'detail', 'list', 'login', 'mixins', 'order', 'scrollbar', 'success', 'variables'),
	);
	
	foreach($scripts as $type => $script_files){
		$ext = $type === 'script' ? 'js' : 'css';
		foreach($script_files as $script_file){
			call_user_func('wp_register_' . $type, $script_file, get_template_directory_uri() . '/' . $ext . '/' . $script_file . '.' . $ext);
		}
	}
	
});

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('base');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('placeholder');
});

add_action('wp_footer', function(){
	wp_enqueue_script('bootstrap');
});