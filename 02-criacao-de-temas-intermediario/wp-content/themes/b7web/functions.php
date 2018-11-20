<?php 

// Includes
require get_template_directory().'/include/setup.php';
require get_template_directory().'/include/customizer/theme-customizer.php';


// Hooks
add_action("wp_enqueue_scripts", "sb_theme_styles");

add_action("after_setup_theme", "sb_after_setup");

add_action("widgets_init", "sb_widgets");

add_action("customize_register", "sb_customize_register");