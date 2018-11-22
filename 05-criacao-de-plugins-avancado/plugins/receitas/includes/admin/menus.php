<?php

function sr_admin_menus(){

	add_menu_page(
		'Opções de Receita', // Título da página
		'Config. de Receitas', // Título do menu
		'edit_theme_options', // Capability responsável
		'sr_receita_opts', // Slug da página
		'sr_receita_opts_page' // Função de criação da página
	);

}