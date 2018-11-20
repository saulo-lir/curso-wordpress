<div class="post_related_item">
	<?php if(has_post_thumbnail()): ?> <!-- Verifica se existe uma miniatura no post -->
		<a href="<?php the_permalink(); ?>"> <!-- Imprime o endereço do link do post -->
			<?php the_post_thumbnail('full', array('class' => 'post_miniatura')); ?>
		</a>
	<?php endif; ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<p>	
		<!-- 
			Imprime a contagem de parâmetros de acordo com o número de itens:
			O primeiro parâmetro é para 0, o segundo é para 1, o terceiro é para vários
	 	-->
		<?php comments_number('0 comentários', '1 comentário', '% comentários'); ?>
		
		<br/>

		<a href="<?php the_permalink(); ?>">LEIA MAIS</a>
	</p>

</div>