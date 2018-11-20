<form method="GET" action="/wordpress">
	<input type="text" name="s" placeholder="Digite aqui..." value=" <?php the_search_query(); ?> "/>
	<input type="submit" value="Pesquisar" />
</form>