<?php 
require 'metabox_sr_receita_opcoes.php';
require 'enqueue.php';

// Arquivo de configuração das funções do painel administrativo
function sr_receitas_admin_init(){

	// Adicionando Metaboxes (Caixas de ferramentas do painel administrativo)
	add_action('add_meta_boxes_receita', 'sr_receitas_metaboxes');

	// Adicionando os scripts e css para serem utilizadas no painel administrativo
	add_action('admin_enqueue_scripts', 'sr_admin_enqueue');

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