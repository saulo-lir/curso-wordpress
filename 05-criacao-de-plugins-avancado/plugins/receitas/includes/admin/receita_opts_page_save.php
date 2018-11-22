<?php 

function sr_receita_opts_save(){

	if(!current_user_can('edit_theme_options')){
		wp_die('Acesso negado!');

	}

	check_admin_referer('sr_receita_opts_verify');

	$receita_opts = get_option('sr_receita_opts');
	$receita_opts['voto_login'] = intval($_POST['voto_login']);
	$receita_opts['receita_login'] = intval($_POST['receita_login']);

	update_option('sr_receita_opts', $receita_opts);

	wp_redirect(admin_url('admin.php?page=sr_receita_optsr&status=1'));

}