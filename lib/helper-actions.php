<?php

////////////_tn - ADD ACTIONS | https://codex.wordpress.org/Plugin_API/Hooks

//_tn - REMOVE STOREFRONT SITE TITLE | ADD IT BACK AGAIN INTO MY CUSTOM ACTION LOCATION
function _tn_adjust_site_title()
{
    remove_action('storefront_header', 'storefront_site_branding', 20);
    add_action('_tn_do_site_title', 'storefront_site_branding', 1);
}
 add_action('init', '_tn_adjust_site_title', 15);

//_tn - DISABLE GUTENBERGE EDITOR
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Don't load Gutenberg-related stylesheets.

//_tn - DISABLE UNNEEDEED STYLE BLOCKS
function remove_block_css()
{
    //wp_dequeue_style('storefront-style'); //WE NEED THIS FOR NOW!
    //wp_dequeue_style('storefront-woocommerce-style'); //WE NEED THIS FOR NOW!
    wp_dequeue_style('storefront-jetpack-infinite-scroll');
    wp_dequeue_style('storefront-jetpack-widgets');
    wp_dequeue_style('wp-block-library'); // Wordpress core
    wp_dequeue_style('wp-block-library-theme'); // Wordpress core
    wp_dequeue_style('wc-block-style'); // WooCommerce
    wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}
add_action('wp_enqueue_scripts', 'remove_block_css', 100);

//_tn - I BELIEVE THIS DOES SIMULAR...
// function my_theme_remove_storefront_standard_functionality()
// {
//     //remove customizer inline styles from parent theme as I don't need it.
//     //set_theme_mod('storefront_styles', '');
//     //set_theme_mod('storefront_woocommerce_styles', '');
// }
//     add_action('init', 'my_theme_remove_storefront_standard_functionality');
