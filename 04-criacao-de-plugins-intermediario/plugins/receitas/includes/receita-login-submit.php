<?php 

function sr_receita_login(){
	$array = array('status' => 1);

	if(empty($_POST['email']) || empty($_POST['senha'])){
		wp_send_json($array);
	}

	$email = sanitize_email($_POST['email']);
	$senha = sanitize_text_field($_POST['senha']);


	// Verifica se o email não existe no sistema
	if( !email_exists($email)){
		wp_send_json($array);
	}

	// Pegar informações do usuário pelo email
	$userdata = get_user_by('email', $email);

	// Logar no sistema
	$user = wp_signon(array(
		'user_login' => $userdata->user_login,
		'user_password' => $senha,
		'remember' => true
	));

	// Verificar se o login deu certo
	if(is_wp_error($user)){
		wp_send_json($array);
	}

	$array['status'] = 2;
	wp_send_json($array);
}