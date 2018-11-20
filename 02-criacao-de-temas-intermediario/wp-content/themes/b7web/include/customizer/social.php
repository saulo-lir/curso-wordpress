<?php

function sb_social_customizer($wp_customize){

	// Settings
	$wp_customize->add_setting('sb_facebook', array('default' => ''));
	$wp_customize->add_setting('sb_youtube', array('default' => ''));
	$wp_customize->add_setting('sb_instagram', array('default' => ''));

	// Sections
	$wp_customize->add_section('sb_social_section', array(
		'title' => 'Redes Sociais',
		'priority' => '1'
	));

	// Controllers
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_facebook',
			array(
				'label' => 'Link do Facebook',
				'section' => 'sb_social_section',
				'settings' => 'sb_facebook',
				'type' => 'text'
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_youtube',
			array(
				'label' => 'Link do Youtube',
				'section' => 'sb_social_section',
				'settings' => 'sb_youtube',
				'type' => 'text'
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_instagram',
			array(
				'label' => 'Link do Instagram',
				'section' => 'sb_social_section',
				'settings' => 'sb_instagram',
				'type' => 'text'
			)
		)

	);
}