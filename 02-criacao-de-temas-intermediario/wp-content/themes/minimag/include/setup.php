<?php 

function sm_theme_styles(){
	wp_enqueue_style('bootstrap_css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('template_css', get_template_directory_uri().'/assets/css/template.css');

	wp_enqueue_script('bootstrap_js', get_template_directory_uri().'/assets/js/bootstrap.min.js');
	wp_enqueue_script('script_js', get_template_directory_uri().'/assets/js/script.js');
}

function sm_after_setup(){
	// Habilitando as funcionalidades
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
	add_theme_support("custom-logo");

	// Adicionar formatos diferentes de posts
	add_theme_support("post-formats", array('video', 'audio'));

	// Adicionar suporte aos custom headers, que são os cabeçalhos de páginas preenchidos com imagens
	add_theme_support("custom-header", array(
		'default-image' => get_template_directory_uri().'/assets/images/headers/katana.png',
		'width' => 1280, // Opcional
		'height' => 400, // Opcional
		'flex-width' => true, // Opcional
		'flex-height' => true // Opcional
		//'header-text' => false,  Opcional (Por padrão é true)
		//'uploads' => false,  Opcional (Bloqueia o upload de imagens) 
	));
	// Registra headers padrões
	register_default_headers(array(
		'headers1' => array(
			'url' => get_template_directory_uri().'/assets/images/headers/image1.png',
			'thumbnail_url' => get_template_directory_uri().'assets/images/headers/image1.png',
			'description' => 'Header 1'
		),
		'headers2' => array(
			'url' => get_template_directory_uri().'/assets/images/headers/image2.png',
			'thumbnail_url' => get_template_directory_uri().'assets/images/headers/image2.png',
			'description' => 'Header 2'
		),
		'headers3' => array(
			'url' => get_template_directory_uri().'/assets/images/headers/image3.png',
			'thumbnail_url' => get_template_directory_uri().'/assets/images/headers/image3.png',
			'description' => 'Header 3'
		)

	));

	// Habilitando os menus
	register_nav_menu("primary", "Menu Primário");
	register_nav_menu("top", "Menu Superior");
}

function sm_widgets(){

	// Habilitando os widgets
	register_sidebar(array(
		'name' => 'Sidebar Lateral',
		'id' => 'sm_sidebar',
		'description' => 'Sidebar Lateral',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget_title"',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Sidebar Rodapé',
		'id' => 'sm_fotersidebar',
		'description' => 'Sidebar Rodapé',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget_title"',
		'after_title' => '</h4>'
	));

}