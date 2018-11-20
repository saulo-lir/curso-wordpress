<?php
require get_template_directory().'/include/customizer/social.php';
require get_template_directory().'/include/customizer/depoimentos.php';

function sb_customize_register($wp_customize){

	sb_social_customizer($wp_customize);

	sb_depoimentos_customizer($wp_customize);

}