<?php

//CONNECT TO OUR CUSTOM STYLE SHEETS AND SCRIPTS FOR THIS CHILD THEME
function _tnchild_assets()
{
    wp_enqueue_style(
        '_tnchild-stylesheet',
        get_stylesheet_directory_uri().'/dist/css/bundle.css',
        '1.0.0',
        'all'
    );

    wp_enqueue_script(
        '_tnchild-script',
        get_stylesheet_directory_uri().'/dist/js/bundle.js',
        '1.0.0',
        true
    );
}
    add_action('wp_enqueue_scripts', '_tnchild_assets');