<!-- 
	Criando widget de pesquisa personalizado 
	É necessário antes criar o arquivo searchform.php
-->

		<!-- search-form: classe padrão para os plugins utilizarem -->
<form role="search" method="GET" class="search-form" action="<?=  esc_url(home_url('/')); ?>">
	<input type="search" name="s" value="<?php the_search_query(); ?>"/>

	<input type="submit" value="Buscar" />
</form>