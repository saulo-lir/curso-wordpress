<html <?php language_attributes(); ?>> <!-- Atribui a tag lang do html -->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
	
	<header>
		<!-- Verificar se o menu do topo está ativado no painel administrativo -->
		<?php if(get_theme_mod('sm_topmenu_show') == 'yes'){ ?>

		<div class="top_header">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="collapse navbar-collapse">
						<?php 
							if(has_nav_menu('top')){
								wp_nav_menu(array(
									'theme_location' => 'top',
									'container' => false,
									'fallback_cb' => false,
									'menu_class' => 'nav navbar-nav'
								));
							}
						?>
					</div>
				</div>
			</nav>
		</div>

		<?php } ?>

		<div class="main_header">
			<div class="container-fluid">
				<div class="logo">
					<?php 
						if(has_custom_logo()){
							the_custom_logo();
						}

					?>
				</div>

				<div class="main_nav_border">
					<div class="main_nav">
						<?php 
							if(has_nav_menu('primary')){
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'container' => false,
									'fallback_cb' => false,
									'menu_class' => 'nav navbar-nav'
								));
							}
						?>

<!-- Verificar se o campo search está ativado no painel administrativo -->
						<?php if(get_theme_mod('sm_layout_section') == 'yes'){ ?>

						<div class="search_area">
							<?php get_search_form(); ?>
						</div>

						<?php } ?>

					</div>

					<!-- 
					
					Tags condicionais: Só exibe o conteúdo se estiver em determinada página

					is_home() : Só exibe se o conteúdo estiver na página home (Inicial)
					is_single() : Só exibe se o conteúdo estiver na página single (Detalhes do post)
					is_page() : Só exibe se o conteúdo estiver numa página secundária
					is_search() : Só exibe se o conteúdo estiver na página busca
					-->

					<?php if(is_home() || is_single()){ ?> <!-- Se estiver na página home ou single, então exibe o conteúdo -->
						<div class="main_info">
							<div class="row">
								<div class="col-sm-8">
									<strong>Você já viu?</strong>
									<?php 
										// Fazer uma consulta de posts aleatórios

										$sm_query = new WP_Query(array(
											'posts_per_page' => 1,
											'post_type' => 'post',
											'orderby' => 'rand'
										));

										if($sm_query->have_posts()){
											while($sm_query->have_posts()){
												$sm_query->the_post();
									?>

											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

									<?php
											}
											wp_reset_postdata();
										}
									?>
								</div>

								<div class="col-sm-4 socialarea">
									
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			
		</div>		
	</header>	

<!-- Adicionando o custom header configurado no setup -->	

<?php if(get_header_image()){ ?>

		<img src="<?php header_image(); ?>" width="<?= get_custom_header()->width; ?>" />

<?php } ?>