<?php get_header() ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<?php 
					if(have_posts()){
						while(have_posts()){
							the_post();							
				?>
						<article>
							Aqui vai o conteúdo de cada post...
						</article>

				<?php
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