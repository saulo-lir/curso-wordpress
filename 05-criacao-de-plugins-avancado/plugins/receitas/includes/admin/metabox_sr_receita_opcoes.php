<?php
// Esse arquivo contém todo conteúdo da metabox que criamos

function sr_receita_opcoes($post){
	// Recebe os dados da postagem quando eles forem salvos no banco
	$receita_data = get_post_meta($post->ID, 'receita_data', true);	

	if(empty($receita_data)){
		$receita_data = array(
			'sr_ingredientes' => '',
			'sr_tempo' => '',
			'sr_utensilios' => '',
			'sr_dificuldade' => '0',
			'sr_tipo' => ''
		);
	}

?>
<!--
	<div id="teste">
		<h2>Olá Mundo</h2>
	</div>
-->	

	Ingredientes:<br/>
	<input type="text" name="sr_ingredientes" value="<?= $receita_data['sr_ingredientes'] ?>"/><br/><br/>

	Tempo da receita:<br/>
	<input type="text" name="sr_tempo" value="<?= $receita_data['sr_tempo'] ?>"/><br/><br/>

	Utensílios:<br/>
	<input type="text" name="sr_utensilios" value="<?= $receita_data['sr_utensilios'] ?>"/><br/><br/>

	Nível de dificuldade:<br/>
	<select name="sr_dificuldade">
		<option value="0" <?= ($receita_data['sr_dificuldade'] == 0)?'selected="selected"':'' ?>>Iniciante</option>
		<option value="1" <?= ($receita_data['sr_dificuldade'] == 1)?'selected="selected"':'' ?>>Intermediário</option>
		<option value="2" <?= ($receita_data['sr_dificuldade'] == 2)?'selected="selected"':'' ?>>Avançado</option>
	</select><br/><br/>

	Tipo da receita:<br/>
	<input type="text" name="sr_tipo"  value="<?= $receita_data['sr_tipo'] ?>"/>

<?php
}