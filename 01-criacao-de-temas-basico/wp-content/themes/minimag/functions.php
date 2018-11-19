<?php

// Includes
include get_template_directory()."/include/setup.php";


// Hooks
add_action("wp_enqueue_scripts", "sm_theme_styles");
add_action("after_setup_theme", "sm_after_setup");
add_action("widgets_init", "sm_widgets");