<?php 
/*

Plugin Name: Teste para Hooks

*/


function st_title($title){
	return '[ALTERADO] '.$title;
}

function st_footer(){

	echo "Plugin atrevido entrou no meio...<br/>";

	// Acionando um hook dentro de outro
	do_action('st_personalizado');

}

function st_footer2(){
	echo "Segunda função dentro do mesmo hook";
}



function st_personalizado(){
	echo "HOOK ACIONADO!<br/>";
}

// 1) Adicionando um Filter Hook

	// Momento em que será ativado, função a ser executada	
add_filter('the_title', 'st_title');

// the_title = Sempre que um título for exibido

// Sempre que um título for adicionado e exibido no sistema, ele passará por esse filtro


// 2) Adicionando um Action Hook
// No action hook é permitido tanto alterações internar quanto externas

	// Momento em que será ativado, função a ser executada
add_action('wp_footer', 'st_footer');

// wp_footer = Sempre que o rodapé for exibido

// Sempre o rodapé for exibido, ele passará por essa action hook

// 3) Criando um action hook personalizado

		// nome da action, função
add_action('st_personalizado', 'st_personalizado');

// Para usá-lo, basta usarmos a função do_action(st_personalizado);

// 4) Adicionando um filter hook personalizado

add_filter('st_algum', 'xyz');

// Para utilizar, fazemos: apply_filters('st_algum', 'parâmetros');

// 4) Adicionando outra funçõa no mesmo hook:

add_action('wp_footer', 'st_footer2');

// OBS.: A ordem em que os hooks são adicionado vai ser a ordem em que serão executados
// Ou inserimos um terceiro parâmetro que indica a prioridade de execução do hook, que por 
// padrão é 10. Quanto menot o número, mais prioridade ele vai ter

// Ex.: add_action('wp_footer', 'st_footer2', 5); vai ter mais prioridade que o add_action('wp_footer', 'st_footer'); pois este está com prioridade 10