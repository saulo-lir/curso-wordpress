<?php 

function sr_receitas_criador_shortcode(){
	$criadorHTML = file_get_contents('receitas-criador-template.php', true);

	// Substituir o textarea pelo aditor de textos do wordpress
	ob_start();	
	wp_editor('', 'receita_criador_editor');
	$editor = ob_get_clean();

	$criadorHTML = str_replace(
		'{EDITOR}',
		$editor,
		$criadorHTML
	);

	return $criadorHTML;
}