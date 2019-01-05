jQuery(function(){

    // Manipulando o plugin rateit para salvar a votação no banco de dados
    jQuery('#receita_voto').bind('rated', function(){
        jQuery(this).rateit('readonly', true);

        var id = jQuery(this).attr('data-id');
        var voto = jQuery(this).rateit('value');

        // Essa requisição ajax deve ser registrada no plugin de receitas para poder funcionar nele
        jQuery.ajax({
            type:'POST',
            url:receita_obj.ajax_url,
            data:{action:'sr_voto_receita', id:id, voto:voto}, // sr_voto_receita e o nome da action que deve ser criada no PHP
            success:function(data){
                console.log(data);
            }
        });
    });

});