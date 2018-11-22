<?php 
require 'metabox_sr_receita_opcoes.php';
require 'enqueue.php';
require 'columns.php';
require 'receita_opts_page_save.php';
require 'settings-api.php';


// Arquivo de configuração das funções do painel administrativo
function sr_receitas_admin_init(){

	// Adicionando Metaboxes (Caixas de ferramentas do painel administrativo)
	add_action('add_meta_boxes_receita', 'sr_receitas_metaboxes');

	// Adicionando os scripts e css para serem utilizadas no painel administrativo
	add_action('admin_enqueue_scripts', 'sr_admin_enqueue');

	add_action('admin_post_sr_receita_opts_save', 'sr_receita_opts_save');

	// Cria a estrutura da tabela html do painel administrativo para exibir os campos personalizados que queremos (no caso, quantidade de votos e média)
	add_filter('manage_receita_posts_columns', 'sr_receita_columns');

	// Insere na tabela html os dados personalizados que queremos (no caso, quantidade de votos e média)
	add_action('manage_receita_posts_custom_column', 'sr_manage_receita_columns', 10, 2);

	settings_api();

}

function sr_receitas_metaboxes(){

	// Registrando a metabox

	add_meta_box(
		'sr_receita_opcoes', // ID da metabox
		'Opções da Receita', // Título da metabox
		'sr_receita_opcoes', // Função que vai chamada para retornar o conteúdo da metabox
		'receita', // O tipo do conteúdo
		'normal', // Posição que vai ser adicionado esse metabox no painel administrativo (normal, side, advanced)
		'high' // Prioridade da metabox (high, low, default)
	);

}

function sr_save_post_admin($post_id, $post, $update){

	// O update representa um boolean que indica se o post é um salvamento ou uma atualização de post que já existe
	// Atualização = false
	// Salvamento = true

	if(!$update){ // Se for uma atualização, então a função termina aqui
		return;
	}

	$receita_datta = array(
		'ingredientes' => $POST['sr_ingredientes'],
		'tempo' => $POST['sr_tempo'],
		'utensilios' => $POST['sr_utensilios'],
		'dificuldade' => $POST['sr_dificuldade'],
		'tipo' => $POST['sr_tipo']
	);

	update_post_meta($post_id, 'receita_data', $receita_data);

}