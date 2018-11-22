<?php

function sr_voto_receita(){
	// print_r($_POST);

	// Salvar os dados no banco de dados

	global $wpdb;

	$array = array(
		'status' => 0
	);

	// Receber os dados
	$post_id = absint($_POST['id']); // Converte a string em um inteiro (Pode ser também o intval())
	$voto = floatval($_POST['voto']);
	$ip = $_SERVER['REMOTE_ADDR'];

	// Preparando a query
	$sql = $wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."receitas_votos WHERE receita_id = %d AND user_ip = %s", $post_id, $ip); // %d = inteiro, %f = float, %s = string

	// Executando a query
	$qt = $wpdb->get_var($sql);

	if($qt > 0){
		wp_send_json($array);
	}

	// Salvar
	$wpdb->insert(
		$wpdb->prefix.'receitas_votos', // Nome da tabela
		array(							// Campos a serem inseridos
			'receita_id' => $post_id,
			'voto' => $voto,
			'user_ip' => $ip
		)
	);

	// Calcular a média e atualizar no banco

	$receita_data = get_post_meta($post_id, 'receita_data', true);
	$receita_data['contagem']++;

	// Preparando a query
	$sql = $wpdb->prepare("SELECT AVG(voto) FROM ".$wpdb->prefix."receitas_votos WHERE receita_id = %d", $post_id);

	// Executando a query
	$receita_data['media'] = $wpdb->get_var($sql);

	update_post_meta($post_id, 'receita_data', $receita_data);

	// Executar uma action diretamente. Quem executar a action receita_voto, irá receber como parâmetro o array com os parâmetros 'post_id' e 'voto'
	do_action('receita_voto', array(
		'post_id' => $post_id,
		'voto' => $voto
	));


	$array['status'] = 1;

	// Retornar o resultado em json
	wp_send_json($array);

}