<?php
// Aqui é onde de fato implementamos as customizações a serem adicionadas no painel administrativo Aparência/Personalizar)

function sm_layout_customizer($wp_customize){
	// Settings
	$wp_customize->add_setting('sm_topmenu_show', array('default'=>'yes'));
	$wp_customize->add_setting('sm_topmenu_show', array('default'=>'yes'));

	// Sections
	$wp_customize->add_section('sm_layout_section', array(
		'title' => 'Opções de Layout',
		'priority' => 2
	));
	
	// Controllers

	// Adicionar controle sobre o menu superior
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sm_topmenu_show',
			array(
				'label' => 'Mostrar Menu Superior',
				'section' => 'sm_layout_section',
				'settings' => 'sm_topmenu_show',
				'type' => 'checkbox',// Os tipos podem ser: text, checkbox, textarea, select, radio, dropdown-pages
				'choices' => array(
					'yes' => 'Sim'
				)
			)
		)
	);

	// Adicionar controle sobre o campo search
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sm_search_show',
			array(
				'label' => 'Mostrar Busca',
				'section' => 'sm_layout_section',
				'settings' => 'sm_search_show',
				'type' => 'checkbox',// Os tipos podem ser: text, checkbox, textarea, select, radio, dropdown-pages
				'choices' => array(
					'yes' => 'Sim'
				)
			)
		)
	);
}