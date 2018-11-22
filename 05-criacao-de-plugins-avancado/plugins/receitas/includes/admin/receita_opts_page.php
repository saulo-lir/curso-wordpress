<?php

function sr_receita_opts_page(){

	$receita_opts = get_option('sr_receita_opts');


	?>
	<!-- Classe utilizada no wordpress para ficar no layout padrão -->
	<div class="wrap">
		<!-- Todo formulário dentro do painel deve ser enviado para o admin-post.php -->
		<form method="POST" action="admin-post.php">
			Título:<br/>
			<input type="hidden" name="action" value="sr_receita_opts_save" />

			<?php wp_nonce_field('sr_receita_opts_verify'); ?>

			O usuário pode votar SEM estar logado?<br/>
			<select name="voto_login">
				<option value="1" <?= ($receita_opts['voto_login'] == '1')?'selected="selected"':'' ?>>Não</option>
				<option value="2" <?= ($receita_opts['voto_login'] == '2')?'selected="selected"':'' ?>>Sim</option>				
			</select><br/><br/>

			O usuário pode adicionar receitas SEM estar logado?<br/>
			<select name="receita_login">
				<option value="1" <?= ($receita_opts['receita_login'] == '1')?'selected="selected"':'' ?>>Não</option>
				<option value="2" <?= ($receita_opts['receita_login'] == '2')?'selected="selected"':'' ?>>Sim</option>				
			</select><br/><br/>

			<input type="submit" value="Salvar"/>

		</form>
<!--
		<hr/>

		<form method="POST" action="options.php">
			
			<?php 
				settings_fields('sr_opts_groups');
				do_settings_sections('sr_opts_section');
				submit_button();
			?>

		</form>
-->
	</div>

	<?php

}