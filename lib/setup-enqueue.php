<?php

//CONNECT TO OUR CUSTOM STYLE SHEETS AND SCRIPTS FOR THIS CHILD THEME

function _tnchild_assets()
{
    //CSS
    wp_enqueue_style(
        '_tnchild-stylesheet',
        get_stylesheet_directory_uri().'/dist/assets/css/bundle.css',
        '1.0.0',
        'all'
    );

    //GOOGLE FONTS
    wp_enqueue_style(
        '_tnchild-google-fonts',
        'https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:200, 300,400|M+PLUS+1p:500,700|Secular+One&display=swap',
        false
    );

    //JS
    wp_enqueue_script(
        '_tnchild-script',
        get_stylesheet_directory_uri().'/dist/assets/js/bundle.js',
        '1.0.0',
        true
    );
}
    add_action('wp_enqueue_scripts', '_tnchild_assets');