<?php get_header() ?>

<section>
	<div class="container">
		
		<!-- É uma boa prática utilizar o the_ID() para pegar o id do post -->
		<div id="post-<?php the_ID(); ?>" class="row">
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