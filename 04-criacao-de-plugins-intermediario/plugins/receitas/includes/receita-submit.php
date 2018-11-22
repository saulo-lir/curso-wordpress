<?php

function sr_receitas_submit(){
	// Receber os dados enviados via AJAX

	$array = array('status' => 1);

	if(empty($_POST['content']) || empty($_POST['ingredientes'])){
		wp_send_json($array);
	}

	// Tratar as informações para salvar no banco

	$title = sanitize_text_field($_POST['title']);
	$content = wp_kses_post($_POST['content']);

	$receita_data = array(
		'ingredientes' => sanitize_text_field($_POST['ingredientes']),
		'tempo' => sanitize_text_field($_POST['tempo']),
		'utensilios' => sanitize_text_field($_POST['utensilios']),
		'tipo' => sanitize_text_field($_POST['tipo']),
		'media' => 0,
		'contagem' => 0
	);

	// Inserir um post no banco

	$post_id = wp_insert_post(array(
		'post_title' => $title,
		'post_name' => $title, // slug
		'post_content' => $content,
		'post_status' => 'pending',
		'post_type' => 'receita'
	));

	update_post_meta($post_id, 'receita_data', $receita_data);

	$array['status'] = 2;

	wp_send_json($array);

}