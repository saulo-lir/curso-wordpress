<?php

function sr_enqueue_scripts(){

	// Registrar o plugin rateit

	wp_register_style(
		'sr_rateit',
		plugins_url('/assets/rateit/rateit.css', RECEITA_PLUGIN_URL)
	);

	wp_register_script(
		'sr_rateit',
		plugins_url('/assets/rateit/jquery.rateit.min.js', RECEITA_PLUGIN_URL),
		array('jquery'), // O jquery deve estar carregado antes do rateit
		'1.0',
		true // Carrega no final do body
	);


	// Registrar o script.js

	wp_register_script(
		'sr_script',
		plugins_url('/assets/js/script.js', RECEITA_PLUGIN_URL),
		array('jquery'), // O jquery deve estar carregado antes do rateit
		'1.0',
		true // Carrega no final do body

	);


	// Transferir dados do PHP para o Javascript

	// Basicamente estamos enviando para o sr_script (script.js) as variáveis receita_obj.ajax_url e receita_obj.home_url que contém os endereços do siste que serão utilizados no script
	wp_localize_script('sr_script', 'receita_obj', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'home_url' => home_url('/')
	));

	// Usar os scripts e css registrados

	wp_enqueue_style('sr_rateit');
	wp_enqueue_script('sr_rateit');
	wp_enqueue_script('sr_script');
}