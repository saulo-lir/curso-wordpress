<?php 

// Esse arquivo configura os comentários do post

if(post_password_required()){ // Verifica se o comentário exige senha. Caso sim, então ele não exibe os comentários por padrão
	return;
}

if(have_comments()){

	foreach($comments as $comment){
?>
	<div class="comentario">
		<div class="comentario_foto">
			<?= get_avatar($comment, 60); ?>
		</div>
		<div class="comentario_area">
			<strong><?php comment_author(); ?></strong> - <?php comment_date(); ?>
			<br/><br/>

			<?php comment_text(); ?>
		</div>
	</div>
	


<?php
	}

	// Paginação dos comentários
	the_comments_pagination();
}

// Formulário de criação de um novo comentário
// comment_form(); Apenas o comment_form() sozinho já é o suficiente 
// para gerar um formulário padrão do wordpress

// Criando um formulário personalizado
comment_form(array(
	'comment_field' => '<textarea name="comment"></textarea>',
	'fields' => array(
		'author' => '<input type="text" name="author"/>',
		'email' => '<input type="email" name="email"/>',
		'url' => '<input type="text" name="url"/>'
	),
	'class_submit' => 'botao',
	'label_submit' => 'Envie seu comentário',
	'title_reply' => 'Deixe um comentário'
));


// O arquivo que irá receber os comentários será o wp-comments-post.php

?>