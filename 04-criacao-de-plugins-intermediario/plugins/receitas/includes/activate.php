<?php 

// Esse arquivo contém as funções relacionadas à ativação do plugin

function sr_activate_plugin(){

// 1) Verificar se a versão do wordpress é compatível com o plugin
// version_compare = função nativa do php

// Versão do wordpress, versão do worpress que queremos que o plugin rode (no caso, à partir da 4.5), '<' é a comparação que queremos fazer, no caso se 4.5 < 4.8, então não passará no verificação
	if(version_compare(get_bloginfo('version'), '4.5', '<')){

		// Parar a execução do sistema, enviando uma mensagem para o usuário
		wp_die('Você precisa atualizar o WordPress para usar esse plugin');

	}

	// Criando uma tabela no banco de dados
	global $wpdb;

	$sql = "CREATE TABLE ".$wpdb->prefix."receitas_votos (
		ID BIGINT(20) NOT NULL AUTO_INCREMENT,
		receita_id BIGINT(20) NOT NULL,
		voto TINYINT(1) NOT NULL,
		user_ip VARCHAR(32) NOT NULL,
		PRIMARY KEY (ID)
	) ".$wpdb->get_charset_collate();

	require_once(ABSPATH.'/wp-admin/includes/upgrade.php');
	dbDelta($sql);

}