<form method="POST" id="receitas_criador">
	Título:<br/>
	<input type="text" name="title" id="receitas_title" /><br/><br/>

	Modo de Preparo:<br/>
	{EDITOR}<br/> <!-- Esse valor será substituído pelo editor do wordpress -->

	Ingredientes:
	<input type="text" name="ingredientes" id="receitas_ingredientes" /><br/><br/>

	Tempo da receita:<br/>
	<input type="text" name="tempo_receita" id="receitas_tempo" /><br/><br/>

	Utensílios:
	<input type="text" name="utensilios" id="receitas_utensilios" /><br/><br/>

	Nível de dificuldade:
	<select name="dificuldade" id="receitas_dificuldade">
		<option value="0">Iniciante</option>
		<option value="1">Intermediário</option>
		<option value="2">Avançado</option>
	</select><br/><br/>

	Tipo da receita:<br/>
	<input type="text" name="tipo" id="receitas_tipo"/><br/><br/>

	Imagem da receita:<br/>
	<a href="#" id="receitas_img_upload_btn">Envie uma imagem</a>
	<br/><br/>

	<img id="receitas_img_preview" />
	<input type="hidden" id="receitas_img" />

	<input type="submit" value="Salvar" id="receitas_criador_submit"/>

</form>