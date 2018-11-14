<!-- Esse arquivo sempre vai ser chamado quando acessarmos uma página de arquivo -->

<?php get_header(); ?>

<section>
	
	<div class="container">

		<h1><?php the_archive_title(); ?></h1>

		<?php if(have_posts()): ?> <!-- Verifica se existem postagens -->
			<?php while(have_posts()): ?>

				<?php the_post(); ?> <!-- O wordpress identifica qual o post que será mostrado -->

				<!-- Pega o arquivo dentro da pasta template_parts -->
				<?php get_template_part('template_parts/post'); ?>
				
			<? endwhile; ?>
		<?php endif; ?>

		<!-- Criando a paginação -->
		<div class="paginacao">
			<div class="pagina_anterior"><?php previous_posts_link('Página Anterior'); ?></div>
			<div class="pagina_proxima"><?php next_posts_link('Próxima Página'); ?></div>
		</div>
	</div>	

	<?php get_sidebar(); ?>

	<div style="clear:both"></div>

</section>

<?php get_footer(); ?>