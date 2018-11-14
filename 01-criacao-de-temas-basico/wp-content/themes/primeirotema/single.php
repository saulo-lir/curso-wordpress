<!-- Esse arquivo é responsável pela visualização do post --> 

<?php get_header(); ?>

<section>
	
	<div class="container">
		<?php if(have_posts()): ?>
			<?php while(have_posts()): ?>

				<?php the_post(); ?>

				<article>					

					<h2><?php the_title(); ?></h2>

					<?php if(has_post_thumbnail()): ?>
						
						<?php the_post_thumbnail('full', array('class' => 'post_miniatura')); ?>
						
					<?php endif; ?>

					<p>
						<?= get_the_date(); ?> | 
						<a href="<?= the_author( get_the_author_meta('ID') ); ?>"><?php the_author(); ?></a> |
						<?php the_category(', '); ?>
					</p>

					<p>
						<?php the_content(); ?>
					</p>

					<p>							
						<?php comments_number('0 comentários', '1 comentário', '% comentários'); ?>
					</p>

					<hr/>

					<!-- Exibindo os comentários -->
					<?php 
						if( comments_open() ){
							comments_template();
						}
					?>

				</article>

			<? endwhile; ?>
		<?php endif; ?>

		<!-- Criando a paginação -->
		<div class="paginacao">
			<div class="pagina_anterior"><?php previous_post_link(); ?></div>
			<div class="pagina_proxima"><?php next_post_link(); ?></div>
		</div>
	</div>	

	<?php get_sidebar(); ?>

	<div style="clear:both"></div>

</section>

<?php get_footer(); ?>