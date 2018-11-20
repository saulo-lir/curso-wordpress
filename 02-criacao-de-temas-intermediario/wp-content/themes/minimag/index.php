<?php get_header() ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php 
					if(have_posts()){
						while(have_posts()){
							the_post();

							get_template_part('template_parts/post');

						}
					}
				?>

			<!-- Paginação com números -->	
			<div class="pag">
				<?php 
					global $wp_query; // Variável global do wordpress que possui as informações do post que está sendo exibido

					echo paginate_links(array(
						'current' => max(1, get_query_var('paged')),
						'total' => $wp_query->max_num_pages // Número máximo de páginas que deve conter na paginação
					));
				?>
			</div>

			</div>
			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>