<?php

/*
Plugin Name: Receita Email Voto
Description: Esse plugin complementa o plugin Receitas
*/

function srev_receita_voto($array){
	$post = get_post($array['post_id']);
	$email = get_the_author_meta('user_email', $post->post_author);

	$assunto = "Você recebeu um novo voto na sua receita";
	$mensagem = "Sua receita ".$post->post_title." recebeu um novo voto de ".$array['voto']." estrelas";

	wp_mail($email, $assunto, $mensagem);
}

add_action('receita_voto', 'srev_receita_voto');