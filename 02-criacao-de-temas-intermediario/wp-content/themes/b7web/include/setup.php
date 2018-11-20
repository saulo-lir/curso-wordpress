<?php

function sb_theme_styles(){
	// CSS
	wp_enqueue_style("bootstrap_css", get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style("template_css", get_template_directory_uri().'/assets/css/template.css', array('bootstrap_css'));

	// JAVASCRIPT
	wp_enqueue_script("bootstrap_js", get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), false, true);
	wp_enqueue_script("script_js", get_template_directory_uri().'/assets/js/script.js', array('jquery', 'bootstrap_js'), false, true);

	// array(é para ser carregado após o jquery, após o bootstrap, não tem versão, é para ser carregado no final do body)
}

function sb_after_setup(){
	add_theme_support("title-tag");
	add_theme_support("post-thumbnails");
	add_theme_support("custom-logo");

	register_nav_menu("top", "Menu Superior");
}

function sb_widgets(){

}