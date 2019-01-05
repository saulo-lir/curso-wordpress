<?php

// Função para salvar os dados da votação no banco de dados
function sr_voto_receita(){
    global $wpdb;

    $array = array(
        'status' => 0
    );

    // print_r($_POST);
    $post_id = intval($_POST['id']);
    $voto = floatval($_POST['voto']);
    $ip = $_SERVER['REMOTE_ADDR'];

    $wpdb->insert(
        $wpdb->prefix.'receitas_votos',
        array(
            'receita_id' => $post_id,
            'voto' => $voto,
            'user_ip' => $ip
        )
    );

    $array['status'] = 1;

    // Eviando retorno para a requisição ajax
    wp_send_json($array);
}