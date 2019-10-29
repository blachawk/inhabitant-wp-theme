<?php

/////////_tn - CUSTOM NAVIGATION MENUS

//_tn - REGISTER CUSTOM MENU
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
        'container_class' => '',
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
function _tn_add_menuclass($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link text-info"', $ulclass);
}
 add_filter('wp_nav_menu', '_tn_add_menuclass');

//_tn - FIND VIEW CART ITEM IN MENU AND APPEND MINI CART COUNT TO IT
//_tn - RESOURCES | https://developer.wordpress.org/reference/functions/wp_get_nav_menu_object/ | https://www.w3schools.com/PHP/func_string_str_replace.asp | https://stackoverflow.com/questions/28576667/get-cart-item-name-quantity-all-details-woocommerce#28576861 | https://developer.wordpress.org/reference/functions/_n/
function _tn_append_nav_item($items, $args)
{
    //RETRIEVE WOOCOMMERCE CART QUANITTY VALUE
    $woocount = WC()->cart->get_cart_contents_count(); //no need for globals
    $woocountquantity = sprintf(_n('%s item', '%s items', $woocount, '_tn'), $woocount);

    //CALL CUSTOM ACTION EVERYWHERE EXCEPT ON VIEW CART PAGE
    $mpage = get_the_title();
    if ('View Cart' != $mpage) {
        if ('main-menu' == $args->name) {
            //APPEND QAUNTITY TO MY EXISTING MENU ITEM
            $items = str_replace('View Cart', "View Cart | <span class='text-warning'>".$woocountquantity.'</span>', $items);
        }
    }

    return $items;
}
  add_filter('wp_nav_menu_items', '_tn_append_nav_item', 10, 2);