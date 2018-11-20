<?php 
// Aqui é onde de fato implementamos as customizações a serem adicionadas no painel administrativo Aparência/Personalizar)

function sm_social_customizer($wp_customize){
	// Settings
	$wp_customize->add_setting('sm_facebook', array('default'=>''));
	$wp_customize->add_setting('sm_googleplus', array('default'=>''));
	$wp_customize->add_setting('sm_instagram', array('default'=>''));

	// Sections
	$wp_customize->add_section('sm_social_section', array(
		'title' => 'Redes Sociais',
		'priority' => 1
	));

	// Controllers
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sm_facebook',
			array(
				'label' => 'Link do Facebook',
				'section' => 'sm_social_section',
				'settings' => 'sm_facebook',
				'type' => 'text'
			)
		)
	);
}