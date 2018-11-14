<?php

function sp_theme_styles(){	

	// Adiciona css na página
// Definimos um nome (alias) para o css, Endereço do arquivo
	wp_enqueue_style('theme_css', get_template_directory_uri().'/assets/css/theme.css');

// get_template_directory_uri() = Pega o endereço da pasta do tema no formato web (http://...)

	// Adiciona javascript na página
	wp_enqueue_script('theme_js', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '', true);

	// O terceiro parâmetro indica se queremos adicionar o arquivo javascript depois de algum específico
	// O quarto parâmetro indica a versão que queremos usar do nosso script (opcional)
	// O quinto parâmetro indica se queremos carregar o script na head (false) ou no final do body (true)
}

function sp_after_setup(){

	// Habilita nosso tema a mostrar miniaturas dos posts
	add_theme_support('post-thumbnails');


	// Habilitar suporte a menus no tema (nas versões atuais do wordpress, essa função já é carregada ao usarmos o register_nav_menu)

	//add_theme_support('menus');

	// Registrar o menu com uma localização específica
	register_nav_menu('primary', __('Primary Menu', 'primeirotema'));

	//register_nav_menu('footer', 'Menu Rodapé', 'primeirotema');

	// Para visualizarmos os menus registrados, acessamos o painel administrativo, 
	// navegando até Aparência/menus
}

function sp_widgets(){

	// Registrar um sidebar
	register_sidebar(array(
		'name' => __('Meu Primeiro Sidebar', 'primeirotema'),
		'id' => 'sp_sidebar',
		'description' => __('Sidebar para o tema', 'primeirotema'),
		'before_title' => '<h4 class="widget_title">', // Insere código html antes do conteúdo que estiver dentro do <li> no sidebar
		'after_title' => '</h4>', // Insere código html depois do conteúdo que estiver dentro do <li> no sidebar
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Insere código html antes do sidebar
		'after_widget' => '</div>' // Insere código html depois do sidebar
	));

	// id="%1$s" = Insere um id automático gerado pelo wordpress
	// class="widget %2$s" = Insere um a class automática gerada pelo wordpress

}