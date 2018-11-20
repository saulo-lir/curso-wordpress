<?php

// Includes
require get_template_directory()."/include/setup.php";
require get_template_directory()."/include/customizer/theme-customizer.php";

// Hooks
add_action("wp_enqueue_scripts", "sm_theme_styles");
add_action("after_setup_theme", "sm_after_setup");
add_action("widgets_init", "sm_widgets");

// Registrar um customizador personalizado
add_action("customize_register", "sm_customize_register");

/* 

No painel administrativo, na área Aparência/Personalizar, temos os seguintes itens:

1 - settings = Representa o item que desejamos armazenar no banco para poder ser aplicado no item a ser customizado. Ex.: Link do facebook no ícone do facebook

2 - sections = São os grupos de propriedades do painel administrativo

3 - controllers = Cada item dentro das sections. Ele usa as settings para exibilas no painel administrativo

*/