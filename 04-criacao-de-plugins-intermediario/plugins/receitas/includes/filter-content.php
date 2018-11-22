<?php 

function sr_filter_receita_content($content){

	if(!is_singular('receita')){ // Se não estiver dentro de um post de receita
		return $content;
	}

	global $post;
	
	// Fazendo requisição a um arquivo interno ou externo usando a api do wordpress

	$receita_html = wp_remote_get(
		plugins_url('includes/receita-template.php', RECEITA_PLUGIN_URL)
	);
	// wp_remote_post(); para requisições do tipo POST

	$receita_html = wp_remote_retrieve_body($receita_html);


	// Ou usamos a função nativa do php: $receita_html = file_get_contents('receita-template.php', true);


	$receita_data = get_post_meta($post->ID, 'receita_data', true);

	switch ($receita_data['dificuldade']) {
		case '0':
			$receita_data['dificuldade'] = 'Iniciante';
			break;

		case '1':
			$receita_data['dificuldade'] = 'Intermediário';
			break;

		case '2':
			$receita_data['dificuldade'] = 'Avançado';
			break;
	
	}

	$receita_html = str_replace('INGREDIENTES_PH', $receita_data['ingredientes'], $receita_html);
	$receita_html = str_replace('TEMPO_PH', $receita_data['tempo'], $receita_html);
	$receita_html = str_replace('UTENSILIOS_PH', $receita_data['utensilios'], $receita_html);
	$receita_html = str_replace('DIFICULDADE_PH', $receita_data['dificuldade'], $receita_html);
	$receita_html = str_replace('TIPO_PH', $receita_data['tipo'], $receita_html);
	$receita_html = str_replace('RECEITA_ID_PH', $post->ID, $receita_html);
	$receita_html = str_replace('NOTA_PH', $receita_data['media'], $receita_html);

	return $receita_html.$content;

}