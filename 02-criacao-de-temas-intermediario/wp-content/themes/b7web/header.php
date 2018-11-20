<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<header>
	<div class="top_head"></div>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<?php 
						// A custom_logo deve sewr ativada no painel administrativo (Aparência/Personalizar/Identidade do site) para poder ser usada aqui

						if(has_custom_logo()){
							the_custom_logo();
						}
					?>
				</div>
				<div class="col-sm-10">
					<div class="menuarea">
						<nav>
							<?php 
								// Exibindo o menu caso ele exista (Deve ser ativado no painel administrativo)

								if(has_nav_menu('top')){
									wp_nav_menu(array(
										'theme_location' => 'top',
										'container' => false,
										'fallback_cb' => false

									));
								}

							?>
						</nav>

						<div class="social">
							<!-- Verificar se os links customizados das redes sociais estão ativados -->

							<?php if(get_theme_mod('sb_facebook')){ ?>

							<a href="<?= get_theme_mod('sb_facebook') ?>">
								<img src="<?= get_template_directory_uri().'/assets/images/fb_logo.png' ?>" />
							</a>

							<?php } ?>

							<?php if(get_theme_mod('sb_youtube')){ ?>

							<a href="<?= get_theme_mod('sb_youtube') ?>">
								<img src="<?= get_template_directory_uri().'/assets/images/yt_logo.png' ?>" />
							</a>

							<?php } ?>

							<?php if(get_theme_mod('sb_instagram')){ ?>

							<a href="<?= get_theme_mod('sb_instagram') ?>">
								<img src="<?= get_template_directory_uri().'/assets/images/in_logo.png' ?>" />
							</a>
							
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</header>
