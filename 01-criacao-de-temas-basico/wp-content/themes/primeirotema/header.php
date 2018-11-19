<html>
	<head>
		<!-- Informa ao wordpress que queremos carregar os estilos e os scripts do sistema definidos no arquivo setup -->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<!-- 
			body_class() = adiciona algumas classes nativas do wordpress
			para automatizar algumas funcionalidades

			Se quisermos adicionar nossas próprias classes, então informamos o nome
			delas no parâmetro da função:

			body_class('class1 class2 class3')
		-->

		<header>	

			<?php 
				// Verificar se existe uma logo no site para poder exibi-la
				if(has_custom_logo()){
					the_custom_logo();
				}
			?>

			<!-- Exibe informações do sistema -->
			<h1><a href="<?= home_url('/'); ?>"><?php bloginfo('name') ?></a></h1>

			<!-- Exibir o menu -->

			<?php 
				if( has_nav_menu('primary') ){ // Se existir o menu 'primary', então exiba-o
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => 'nav',
						'container_class' => 'main_menu',
						'fallback_cb' => false 
					));

					// fallback_cb = Caso não exista nenhum conteúdo no menu, se o valor for true, então será adicionado conteúdo padrão próprio wordpress

				}
			?>
		</header>