<?php get_header();

	// Exibir o banner da single
	get_template_part('template_parts/banner-single'); 
		
?>


<section>
	<div class="container">
		
		<!-- Exibição das postagens -->

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if(have_posts()){ ?>
				<?php while(have_posts()){ ?>
					<?php the_post(); ?>

					<h1><?php the_title(); ?></h1>

					<div class="post_content">
						<?php the_content(); ?>
					</div>

					<hr/>

					<!-- Exibir Posts Relacionados -->

					<h3>Confira outros posts interessantes</h3>

					<div class="row">

						<?php 
						$categories = get_the_category();
						$sp_query = new WP_Query(array(
							'post_per_page' => 4,
							'post__not_in' => array( $post->ID ), // Não selecionar o post atual
							'cat' => $categories[0]->term_id // Filtra a query pela mesma categoria do post atual

						));

						if($sp_query->have_posts()){
							while($sp_query->have_posts()){
								$sp_query->the_post();

								get_template_part('template_parts/related_post');
							}
						}

						wp_reset_postdata();

						?>

					</div>

					<hr/>

					<!-- Exibir comentários -->
					<?php 
					if(comments_open()){
						comments_template();
					}

					?>

				<?php } ?>	
			<?php } ?>	

		</div>

	</div>
</section>


<?php get_footer(); ?>