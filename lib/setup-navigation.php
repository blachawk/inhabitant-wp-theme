<?php

//_tn - INTENTIONALLY SETTING UP A CUSTOM NAVIGATION MENU FOR THE PROJECT

function _tn_register_menus()
{
    register_nav_menus([
        'main-menu' => esc_html__('Main Menu', '_tn'),
    ]);
}
add_action('init', '_tn_register_menus');

// function _tn_header()
// {
//     wp_nav_menu([
//         'theme_location' => 'primary',
//         'container' => 'false',
//     ]);
// }
// add_action('storefront_header', '_tn_header');