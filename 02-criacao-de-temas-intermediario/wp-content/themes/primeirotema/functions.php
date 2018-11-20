<?php

// Esse é o primeiro arquivo a ser carregado automaticamente quando o plugin é carregado
// Aqui inserimos toda a lógica do tema

//echo "Me carregou!";

// - action hooks: São eventos que são disparados quando uma determinada ação acontece
// Ex.: Executar uma ação antes ou depois de uma postagem acontecer
// Existem mais de 100 tipos de ações que o wordpress pode utilizar com actions hooks

/*

// 1) Primeiro incluímos o arquivo que contem as funções que criamos

// get_template_directory() = Pega o endereço da pasta do tema
require get_template_directory().'/include/sp_footer_functions.php';

// 2) Depois utilizamos os action hooks:

	// Nome do evento, ação a ser executada (função)
add_action('shutdown', 'sp_fim');

// shutdown: É um evento que acontece após todo o carregamento do wordpress

*/

// Includes
require get_template_directory().'/include/setup.php';


// Hooks
add_action('wp_enqueue_scripts', 'sp_theme_styles');

// wp_enqueue_scripts = Evento que é acionado para adicionar os estilos e os scripts

add_action('after_setup_theme', 'sp_after_setup');

// after_setup_theme = Evento que é acionado após o carregamento do tema na memória

add_action('widgets_init', 'sp_widgets');

// widgets_init = Evento que é acionado para o suporte a widgets