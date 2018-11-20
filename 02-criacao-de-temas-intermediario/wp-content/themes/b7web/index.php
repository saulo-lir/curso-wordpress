<?php get_header(); 
	
	// Exibir o banner da home
	get_template_part('template_parts/banner-home'); 
	
?>

<!-- Imprimindo os depoimentos -->

<div class="depoimentos">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?php 

					// Pergar os depoimentos de forma aleatória

					// Forma comum (sem ser aleatório): get_theme_mod('sb_depo1_txt');

					$d = rand(1, 5);
					$txt = get_theme_mod('sb_depo'.$d.'_txt');
					$url = get_theme_mod('sb_depo'.$d.'_url');
					$autor = get_theme_mod('sb_depo'.$d.'_autor');
					$url = wp_get_attachment_image_src($url);

				?>

				<img src="<?= $url[0] ?>" />
				<i>"<?= $txt ?>"</i><br/>
				<strong><?= $autor ?></strong>
			</div>
			<div class="col-sm-6">
				<?php 

					$d2 = rand(1, 5);
					while($d2 == $d){
						$d2 = rand(1, 5);
					}

					$txt = get_theme_mod('sb_depo'.$d2.'_txt');
					$url = get_theme_mod('sb_depo'.$d2.'_url');
					$autor = get_theme_mod('sb_depo'.$d2.'_autor');
					$url = wp_get_attachment_image_src($url);

					print_r($url);

				?>

				<img src="<?= $url[0] ?>" />
				<i>"<?= $txt ?>"</i><br/>
				<strong><?= $autor ?></strong>
			</div>
		</div>
	</div>

</div>

<section>
	<div class="container">
		
		<!-- Exibição das postagens -->

		<?php 

			if(have_posts()){ 
				while(have_posts()){
					the_post(); // Carrega o conteúdo da postagem
					
					get_template_part('template_parts/post');
				}
			} 

		?>

	</div>
</section>


<?php get_footer(); ?>