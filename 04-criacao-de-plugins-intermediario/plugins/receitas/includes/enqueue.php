<?php

function sr_enqueue_scripts(){
    wp_register_style(
        'sr_rateit',
        plugins_url('/assets/rateit/rateit.css', RECEITA_PLUGIN_URL)
    );

    wp_register_script(
        'sr_rateit',
        plugins_url('assets/rateit/jquery.rateit.min.js', RECEITA_PLUGIN_URL),
        array('jquery'),
        '1.0',
        true
    );

    wp_register_script(
        'sr_script',
        plugins_url('/assets/js/script.js', RECEITA_PLUGIN_URL),
        array('jquery'),
        '1.0',
        true
    );

    // Tranferir dados do php para o javascript
    wp_localize_script(
        'sr_script', // Vai ser acessível pelo sr_script declarado acima
        'receita_obj', // Var ser acessível no objeto chamado receita_obj dentro do javascript
        array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );

    wp_enqueue_style('sr_rateit');
    wp_enqueue_script('sr_rateit');
    wp_enqueue_script('sr_script');
}