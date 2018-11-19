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
			</div>
			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>