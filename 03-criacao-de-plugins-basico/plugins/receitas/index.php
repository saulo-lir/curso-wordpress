<?php 
/*

Plugin Name: Receitas
Description: Um plugin simples para adição e configuração de receitas
Version: 1.0
Author: Saulo
Author URI: https://b7web.com.br
Text Domain: receitas

*/

// Proteção recomendada pelo wordpress para que usuários não executem diretamente este arquivo pelo navegador

if(!function_exists('add_action')){
	echo "Ops! Você não pode acessar diretamente esse plugin!";
	exit;
}


// Setup

// Definir a url direta do plugin
define('RECEITA_PLUGIN_URL', __FILE__);

// Includes
require 'includes/activate.php';
require 'includes/init.php';
require 'includes/admin/admin_init.php';
require 'includes/filter-content.php';

// Hooks

register_activation_hook(RECEITA_PLUGIN_URL, 'sr_activate_plugin');

// Action Hook que vai ser executado sempre que o wordpress iniciar
add_action('init', 'sr_receitas_init');


// Action Hook que vai ser executado quando o painel administrativo iniciar
add_action('admin_init', 'sr_receitas_admin_init');


// Action Hook que vai ser executado quando preenchermos e salvarmos o formulário da metabox de receitas no painel administrativo
add_action('save_post_receita', 'sr_save_post_admin', 10, 3);
												// Prioridade de execução, Quantidade de parâmetros do post que queremos receber


// Filter Hook que vai ser executado para
add_filter('the_content', 'sr_filter_receita_content');

// Shortcodes