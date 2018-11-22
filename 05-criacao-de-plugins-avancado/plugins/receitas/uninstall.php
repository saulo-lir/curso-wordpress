<?php 

// Esse arquivo será executado quando desativarmos o plugin. Desse forma, excluiremos todos os rastros deixados pelo plugin, como as tabelas do banco por exemplo. No nosso caso aqui, estamos apenas excluindo a tabela do plugin.

if(!defined("WP_UNINSTALL_PLUGIN")){
	exit;
}

global $wpdb;

$wpdb->query("DROP TABLE IF EXISTS ".$wpdb->p refix."receitas_votos");