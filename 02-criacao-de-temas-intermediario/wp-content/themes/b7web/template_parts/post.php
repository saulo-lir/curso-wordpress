<article <?php post_class(); ?>>
	<div class="row">

		<div class="col-sm-6">
			<!-- Exibir imagem do post -->

			<?php 

				if(has_post_thumbnail()){
			?>
				<a href="<?php the_permalink(); ?>">

			<?php		
					the_post_thumbnail('large', array('class' => 'post_thumb'));
			?>
				</a>
			
			<?php		
				} 

			?>

		</div>

		<div class="col-sm-6">

			<!-- Exibir o título do post -->
			<div class="post_title">
				<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
			</div>

			<!-- Exibir o resumo do post -->
			<div class="post_excerpt">
				<?php the_excerpt(); ?>
			</div>

			<div class="post_readmore">
				<a href="<?php the_permalink(); ?>">Clique aqui para saber mais</a>
			</div>

		</div>

	</div>
</article>