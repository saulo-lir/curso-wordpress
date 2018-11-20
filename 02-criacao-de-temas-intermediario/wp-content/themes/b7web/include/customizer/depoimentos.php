<?php

function sb_depoimentos_customizer($wp_customize){

	// Settings

	$wp_customize->add_setting('sb_depo1_url', array('default' => ''));
	$wp_customize->add_setting('sb_depo1_txt', array('default' => ''));
	$wp_customize->add_setting('sb_depo1_autor', array('default' => ''));

	$wp_customize->add_setting('sb_depo2_url', array('default' => ''));
	$wp_customize->add_setting('sb_depo2_txt', array('default' => ''));
	$wp_customize->add_setting('sb_depo2_autor', array('default' => ''));

	$wp_customize->add_setting('sb_depo3_url', array('default' => ''));
	$wp_customize->add_setting('sb_depo3_txt', array('default' => ''));
	$wp_customize->add_setting('sb_depo3_autor', array('default' => ''));

	$wp_customize->add_setting('sb_depo4_url', array('default' => ''));
	$wp_customize->add_setting('sb_depo4_txt', array('default' => ''));
	$wp_customize->add_setting('sb_depo4_autor', array('default' => ''));

	$wp_customize->add_setting('sb_depo5_url', array('default' => ''));
	$wp_customize->add_setting('sb_depo5_txt', array('default' => ''));
	$wp_customize->add_setting('sb_depo5_autor', array('default' => ''));

	// Panels

	$wp_customize->add_panel('sb_depoimentos', array(
		'title' => 'Depoimentos',
		'priority' => 10
	));

	// Sections

	$wp_customize->add_section('sb_depo1', array(
		'title' => 'Depoimento 1',
		'priority' => 1,
		'panel' => 'sb_depoimentos'
	));

	$wp_customize->add_section('sb_depo2', array(
		'title' => 'Depoimento 2',
		'priority' => 2,
		'panel' => 'sb_depoimentos'
	));

	$wp_customize->add_section('sb_depo3', array(
		'title' => 'Depoimento 3',
		'priority' => 3,
		'panel' => 'sb_depoimentos'
	));

	$wp_customize->add_section('sb_depo4', array(
		'title' => 'Depoimento 4',
		'priority' => 4,
		'panel' => 'sb_depoimentos'
	));

	$wp_customize->add_section('sb_depo5', array(
		'title' => 'Depoimento 5',
		'priority' => 5,
		'panel' => 'sb_depoimentos'
	));

	// Controllers

	// Texto
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo1_txt',
			array(
				'label' => 'Texto:',
				'section' => 'sb_depo1',
				'settings' => 'sb_depo1_txt'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo2_txt',
			array(
				'label' => 'Texto:',
				'section' => 'sb_depo2',
				'settings' => 'sb_depo2_txt'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo3_txt',
			array(
				'label' => 'Texto:',
				'section' => 'sb_depo3',
				'settings' => 'sb_depo3_txt'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo4_txt',
			array(
				'label' => 'Texto:',
				'section' => 'sb_depo4',
				'settings' => 'sb_depo4_txt'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo5_txt',
			array(
				'label' => 'Texto:',
				'section' => 'sb_depo5',
				'settings' => 'sb_depo5_txt'				
			)
		)

	);


	// Autor
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo1_autor',
			array(
				'label' => 'Autor:',
				'section' => 'sb_depo1',
				'settings' => 'sb_depo1_autor'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo2_autor',
			array(
				'label' => 'Autor:',
				'section' => 'sb_depo2',
				'settings' => 'sb_depo2_autor'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo3_autor',
			array(
				'label' => 'Autor:',
				'section' => 'sb_depo3',
				'settings' => 'sb_depo3_autor'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo4_autor',
			array(
				'label' => 'Autor:',
				'section' => 'sb_depo4',
				'settings' => 'sb_depo4_autor'				
			)
		)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sb_depo5_autor',
			array(
				'label' => 'Autor:',
				'section' => 'sb_depo5',
				'settings' => 'sb_depo5_autor'				
			)
		)

	);

	// Imagem do autor
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sb_depo1_url',
			array(
				'label' => 'Imagem:',
				'section' => 'sb_depo1',
				'settings' => 'sb_depo1_url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sb_depo2_url',
			array(
				'label' => 'Imagem:',
				'section' => 'sb_depo2',
				'settings' => 'sb_depo2_url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sb_depo3_url',
			array(
				'label' => 'Imagem:',
				'section' => 'sb_depo3',
				'settings' => 'sb_depo3_url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sb_depo4_url',
			array(
				'label' => 'Imagem:',
				'section' => 'sb_depo4',
				'settings' => 'sb_depo4_url'
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'sb_depo5_url',
			array(
				'label' => 'Imagem:',
				'section' => 'sb_depo5',
				'settings' => 'sb_depo5_url'
			)
		)
	);


}