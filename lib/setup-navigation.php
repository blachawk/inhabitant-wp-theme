<?php

//_tn - INTENTIONALLY SETTING UP A CUSTOM NAVIGATION MENU FOR THE PROJECT

function _tn_register_menus()
{
    register_nav_menus([
        'main-menu' => esc_html__('Main Menu', '_tn'),
    ]);
}
add_action('init', '_tn_register_menus');

//_tn - DECORE THE CUSTOM MENU
function _tn_display_custom_nav()
{
    wp_nav_menu([
        'fallback_cb' => false,
        'echo' => true,
        'name' => 'main-menu',
        'container' => 'div',
        'container_id' => 'inhabitant-menu',
        'container_class' => 'bg-dark',
        'menu_id' => '',
        'menu_class' => 'navbar-nav ml-auto px-2 px-lg-0 pb-2 text-lg-center',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'depth' => 0,
        'walker' => '',
        'item_spacing' => 'discard',
    ]);
}
add_action('storefront_header', '_tn_display_custom_nav', 30);

//_tn - ADD CLASS TO MENU LINKS
function add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link text-info"', $ulclass);
}
 add_filter('wp_nav_menu', 'add_menuclass');

 //_tn - REMOVE THE SITE TITLE SO THAT ITS OUTSIDE/ON TOP OF [pos-f-t fixed-top]. 1 - CREATE AN ADD ACTION, AND THEN ADD SITE-BRANDING TO IT.

 add_action('init', '_tn_adjust_site_title', 15);

 function _tn_adjust_site_title()
 {
     remove_action('storefront_header', 'storefront_site_branding', 20);
     add_action('_tn_do_site_title', 'storefront_site_branding', 1);
 }