jQuery(function(){

	// Configurar o media uploader do wordpress
	var mediauploader = wp.media({
		title:'Selecione ou envie uma Foto',
		button:{
			text:'Usar esta foto'
		},
		nultiple:false
	});

	jQuery('#receitas_img_upload_btn').on('click', function(e){
		e.preventDefault;

		mediauploader.open();
	});

	mediauploader.on('select', function(){
		var anexo = mediauploader.state().get('selection').first().toJSON();
		jQuery('#receitas_img_preview').attr('src', anexo.url);
		jQuery('#receitas_img').val(anexo.id);
	});


	jQuery("#receita_voto").bind('rated', function(){

		jQuery(this).rateit('readonly', true);

		var id = jQuery(this).attr('data-id');
		var voto = jQuery(this).rateit('value');

		/* Para funcionar, essa requisição ajax deve ser primeiro registrada no nosso plugin wordpress */
		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:{action:'sr_voto_receita', id:id, voto:voto},
			success:function(data){

			}
		});

	});

	jQuery('#receitas_criador').on('submit', function(e){
		e.preventDefault();

		jQuery('#receitas_criador_submit').hide();

		var form = {
			action:'sr_receitas_submit',
			title:jQuery('#receitas_title').val(),
			content:tinymce.activeEditor.getContent(),
			ingredientes:jQuery('#receitas_ingredientes').val(),
			tempo:jQuery('#receitas_tempo').val(),
			utensilios:jQuery('#receitas_utensilios').val(),
			dificuldade:jQuery('#receitas_dificuldade').val(),
			tipo:jQuery('#receitas_tipo').val(),
			anexo_id:jQuery('#receitas_img').val()
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(data){

				if(data.status == 2){
					alert("Receita enviada com sucesso!");
				
				}else{
					alert("Ops! Deu pau :/");
					jQuery('#receitas_criador_submit').show();
				}

			}
		});

	});

	// Cadastro de novo usuário
	jQuery('#receita_cadastro').on('submit', function(e){
		e.preventDefault();

		jQuery('#cadastro_botao').hide();

		var form = {
			action:'sr_receita_criar_conta',
			name:jQuery('#cadastro_name').val(),			
			email:jQuery('#cadastro_email').val(),
			tempo:jQuery('#cadastro_senha').val()			
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(data){

				if(data.status == 2){
					alert("Conta criada com sucesso!");
					window.location.href = receita_obj.home_url;
				
				}else{
					alert("Ops! Deu pau :/");
					jQuery('#cadastro_botao').show();
				}

			}
		});

	});

	// Login
	jQuery('#receita_login').on('submit', function(e){
		e.preventDefault();

		jQuery('#login_botao').hide();

		var form = {
			action:'sr_receita_login',
			email:jQuery('#login_email').val(),			
			senha:jQuery('#login_senha').val()			
		};

		jQuery.ajax({
			type:'POST',
			url:receita_obj.ajax_url,
			data:form,
			dataType:'json',
			success:function(data){

				if(data.status == 2){
					alert("Logado com sucesso!");
					window.location.href = receita_obj.home_url;
				
				}else{
					alert("Ops! Deu pau :/");
					jQuery('#login_botao').show();
				}

			}
		});

	});

});