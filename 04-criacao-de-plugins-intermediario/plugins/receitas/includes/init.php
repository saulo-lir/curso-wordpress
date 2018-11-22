<?php

// Arquivo de configurações que serão aplicadas no painel administrativo

function sr_receitas_init(){

	// Indica os nomes dos componentes do wordpress que queremos configurar
	$labels = array(
		'name' => 'Receitas',
		'singular_name' => 'Receita',
		'menu_name' => 'Receitas',
		'name_admin_bar' => 'Receita',
		'add_new' => 'Adicionar Nova',
		'add_new_item' => 'Adiciionar Nova Receita',
		'new_item' => 'Nova Receita',
		'edit_item' => 'Editar Receita',
		'view_item' => 'Visualizar Receita',
		'all_items' => 'Todas as Receitas',
		'search_items' => 'Procurar Receita',
		'parent_item_colon' => 'Receitas Filhas:',
		'not_found' => 'Nenhuma receita encontrada',
		'not_found_in_trash' => 'Nenhuma receita no lixo'
	);

	// Propriedades que o plugin vai ter
	$array = array(
		'labels' => $labels,
		'description' => 'Um tipo de conteúdo para receitas',
		'public' => true, // Os usuários poderão adicionar novas receitas
		'publicly_queryable' => true, // A pessoas vão poder pegar as receitas e mostrar em seus temas
		'query_var' => true, // Semelhante à anterior, as pessoas vão poder fazer uma query para pegar as receitas
		'show_ui'=> true,
		'show_in_menu' => true,
		'rewrite' => array('slug' => 'receita'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'author', 'thumbnail')
	);

	// Após realizar as configurações, registramos o post

	register_post_type('receita', $array);

}

/* 

Segue um código básico de criação de criação de post_types:

function create_post_type() {
  register_post_type( 'post_type_personalizad',
    array(
      'labels' => array(
        'name' => __( 'Personalizado' ),
        'singular_name' => __( 'NamePersonalizado' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

add_action( 'init', 'create_post_type' );

*/