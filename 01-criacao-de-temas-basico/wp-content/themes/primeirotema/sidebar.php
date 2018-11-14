
<sidebar>
	
	<?php 
		if(is_active_sidebar('sp_sidebar')){ // Verifica se o sidebar está registrado

			// Carrega todos os itens que foram configurados no sidebar no painel administrativo
			dynamic_sidebar('sp_sidebar');
		}
	?>

</sidebar>