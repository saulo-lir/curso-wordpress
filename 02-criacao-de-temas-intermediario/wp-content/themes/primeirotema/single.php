<!-- Esse arquivo é responsável pela visualização do post --> 

<?php 
	get_header(); 

	// print_r($post); exit; Toda página de exibição do post traz consigo a variável $post que contém
	// todas as informações do post que está sendo exibido
?>

<section>
	
	<div class="container">
		<!-- REQUISIÇÃO PRINCIPAL -->
		
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

					<h3>Posts Relacionados</h3>

					<?php 
						// FAZENDO UMA REQUISIÇÃO SECUNDÁRIA

						$categories = get_the_category(); // Seleciona todas as categorias utilizadas no sistema

						// Classe responsável em fazer as consultas no banco de dados
						$sp_query = new WP_Query(array(
							'post_per_page' => 3, // Post por página
							'post__not_in' => array( $post->ID ), // Não irá selecionar o post atual
							'cat' => $categories[0]->term_id// Irá filtrar pela categoria do post
						));

						// Exibir os dados consultados na query
						if($sp_query->have_posts()){
							while($sp_query->have_posts()){
								$sp_query->the_post();

								get_template_part('template_parts/related_post');

							}

							// Reseta esse post secundário para que o post principal possa continuar sua execução
							wp_reset_postdata();
						}

					?>

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