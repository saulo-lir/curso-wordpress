<?php get_header();

	// // Exibir o banner da single
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

				<?php } ?>	
			<?php } ?>	

		</div>

	</div>
</section>


<?php get_footer(); ?>