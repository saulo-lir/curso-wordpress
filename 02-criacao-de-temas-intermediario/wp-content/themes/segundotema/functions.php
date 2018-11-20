<?php 
// Includes
require get_template_directory().'/include/setup.php';

// Hooks
add_action("wp_enqueue_scripts", "ss_theme_styles");
add_action("after_setup_theme", "ss_after_setup");