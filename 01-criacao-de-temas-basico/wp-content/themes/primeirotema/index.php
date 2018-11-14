<!-- 

Para criar um tema, precisamos:

- Criar a pasta do tema
- Criar os arquivos index.php e style.css
- Inserir o nome do tema em forma de comentário no arquivo style.css:

/*
	Theme Name: Primeiro Tema
*/

- Para exibir a miniatura do tema na página de temas do painel administrativo,
inserimos um arquivo .png com o nome screenshot.png na pasta do projeto,
com as medidas 880 x 660

 -->

<?php get_header(); ?>

<section>
	
	<div class="container">
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