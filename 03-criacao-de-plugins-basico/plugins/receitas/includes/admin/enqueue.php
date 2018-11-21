<?php

// Arquivo que contém as funções de utilização dos scripts e css

function sr_admin_enqueue(){

	global $typenow; // Variável global do wordpress que armazena o tipo de postagem (page, post, comment, etc) que estamos acessando no momento

	// Se o tipo da postagem não for 'receita', então ele encerra a função aqui
	if($typenow != 'receita'){
		return;
	}

	// Registros
	wp_register_style(
		'sr_style',
		plugins_url('/assets/css/style.css', RECEITA_PLUGIN_URL) // plugins_url() exibe a url da pasta de plugins do sistema
	);

	// Usos
	wp_enqueue_style('sr_style');

}