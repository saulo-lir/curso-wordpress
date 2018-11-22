<?php 

function settings_api(){

	register_setting('sr_opts_group', 'sr_receita_opts');

	add_settings_section(
		'receita_settings',
		'Config das Receitas',
		'sr_settings_section',
		'sr_opts_section'
	);

	add_settings_field(
		'voto_login',
		'Usuário pode logar sem estar logado',
		'sr_voto_login_input',
		'sr_opts_section',
		'receita_settings'
	);

	add_settings_field(
		'receita_login',
		'Usuário pode adicionar receita sem estar logado',
		'sr_receita_login_input',
		'sr_opts_section',
		'receita_settings'
	);

}

function sr_settings_section(){
	echo "Texto Qualquer";
}

function sr_voto_login_input(){
	$receita_opts = get_option('sr_receita_opts');

	?>

	<select id="voto_login" name="sr_receita_opts[voto_login]">
		<option value="1" <?= ($receita_opts['voto_login'] == '1')?'selected="selected"':'' ?>>Não</option>
		<option value="2" <?= ($receita_opts['voto_login'] == '2')?'selected="selected"':'' ?>>Sim</option>				
	</select>

	<?php

}

function sr_receita_login_input(){
	$receita_opts = get_option('sr_receita_opts');
	
	?>

	<select id="receita_login" name="sr_receita_opts[receita_login]">
		<option value="1" <?= ($receita_opts['receita_login'] == '1')?'selected="selected"':'' ?>>Não</option>
		<option value="2" <?= ($receita_opts['receita_login'] == '2')?'selected="selected"':'' ?>>Sim</option>				
	</select>

	<?php

}