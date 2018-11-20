<?php 
// Aqui serão executadas as funções de cada uma das sections do painel administrativo (Aparência/Personalizar)

require get_template_directory().'/include/customizer/social.php';

function sm_customize_register($wp_customize){

	sm_social_customizer($wp_customize);

}