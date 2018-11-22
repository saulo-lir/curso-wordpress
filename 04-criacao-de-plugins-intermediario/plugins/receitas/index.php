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
require 'includes/init.php';
require 'includes/activate.php';
require 'includes/admin/admin_init.php';
require 'includes/filter-content.php';
require 'includes/enqueue.php';
require 'includes/voto-receita.php';
require dirname(RECEITA_PLUGIN_URL).'/includes/widgets.php';
require 'includes/widgets/receita_diaria.php';
require 'includes/cron.php';
require 'includes/deactivate.php';
require 'includes/shortcodes/receitas-criador.php';
require 'includes/shortcodes/receita-auth.php';
require 'includes/receita-submit.php';
require 'includes/receita-cadastro-submit.php';
require 'includes/receita-login-submit.php';
require 'includes/admin/dashboard-widgets.php';

// Hooks

// Hook executado quando o plugin é ativado
register_activation_hook(RECEITA_PLUGIN_URL, 'sr_activate_plugin');

// Hook executado quando o plugin é desativado
register_deactivation_hook(RECEITA_PLUGIN_URL, 'sr_deactivate_plugin');

// Action Hook que vai ser executado sempre que o wordpress iniciar
add_action('init', 'sr_receitas_init');


// Action Hook que vai ser executado quando o painel administrativo iniciar
add_action('admin_init', 'sr_receitas_admin_init');


// Action Hook que vai ser executado quando preenchermos e salvarmos o formulário da metabox de receitas no painel administrativo
add_action('save_post_receita', 'sr_save_post_admin', 10, 3);
												// Prioridade de execução, Quantidade de parâmetros do post que queremos receber


// Filter Hook que vai ser executado para exibir o conteúdo de uma postagem de receita numa página
add_filter('the_content', 'sr_filter_receita_content');

// Action Hook que vai ser executado para carregar os scripts na página do site
add_action('wp_enqueue_scripts', 'sr_enqueue_scripts', 100); 
											// Para plugins, é recomendado utilizar uma prioridade baixa (valores altos), para dar prioridade primeiramente aos temas (opcional)

// Action Hook para criação de widgets no painel administrativo
add_action('wp_dashboard_setup', 'sr_add_dashboard_widgets');

// Actions Hooks para requisições AJAX
add_action('wp_ajax_sr_voto_receita', 'sr_voto_receita'); // Executa quando estiver logado
add_action('wp_ajax_nopriv_sr_voto_receita', 'sr_voto_receita'); // Executa quando não estiver logado (nopriv)

add_action('wp_ajax_sr_receitas_submit', 'sr_receitas_submit');
add_action('wp_ajax_nopriv_sr_receitas_submit', 'sr_receitas_submit');

add_action('wp_ajax_nopriv_sr_receita_criar_conta', 'sr_receita_criar_conta');
add_action('wp_ajax_nopriv_sr_receita_login', 'sr_receita_login');


// Action Hook que vai ser executado quando adicionarmos um hook
add_action('widgets_init', 'sr_widgets_init');

// Action Hook que vai ser executado quando utilizarmos o CronJobs
add_action('sr_receita_diaria_hook', 'sr_gerar_receita_diaria');



// Shortcodes

// Os shortcodes são atalhos que podemos usar para inserir itens do plugin dentro de postagens, páginas, etc

add_shortcode('receitas_criador', 'sr_receitas_criador_shortcode');
add_shortcode('receitas_auth_form', 'sr_receitas_auth_form_shortcode');

// Para usar o shortcode no painel administrativo, basta criar uma nova página, inserir o título
// e na descrição colocamos o shortcode assim: [receitas_auth_form] , depois publicamos a página