<?php

//_tn - STOREFRONT THEME HOOKS WE CAN TAP INTO

/**
 * Dev - Added some new hooks to the homepage template tags:
 * storefront_homepage_after_product_categories_title
 * storefront_homepage_after_recent_products_title
 * storefront_homepage_after_featured_products_title
 * storefront_homepage_after_popular_products_title
 * storefront_homepage_after_on_sale_products_title.
 */

/**
 * _tn - IMPORTANT RESOURCES
 * C:\Users\lewisk\Documents\mTraining\klp\inhabitant.co\wp20191021\wp-content\themes\storefront\inc\storefront-template-hooks.php
 * https://stackoverflow.com/search?q=wordpress+storefront.
 * https://stackoverflow.com/questions/37745795/change-order-of-items-in-storefront-theme-header.
 */

 //_tn - BASED ON HEADER.PHP REARRANGE FUNCTIONS HOOKED INTO STOREFRONT HEADER AND TEST | https://stackoverflow.com/a/37758434/957186

/**
 * Functions hooked into storefront_header action.
 *
 * @hooked storefront_header_container                 - 0
 * @hooked storefront_skip_links                       - 5
 * @hooked storefront_social_icons                     - 10
 * @hooked storefront_site_branding                    - 20
 * @hooked storefront_secondary_navigation             - 30
 * @hooked storefront_product_search                   - 40
 * @hooked storefront_header_container_close           - 41
 * @hooked storefront_primary_navigation_wrapper       - 42
 * @hooked storefront_primary_navigation               - 50
 * @hooked storefront_header_cart                      - 60
 * @hooked storefront_primary_navigation_wrapper_close - 68
 *
 * do_action( 'storefront_header' );
 */

/**
 * Functions hooked in to storefront_before_content.
 *
 * @hooked storefront_header_widget_region - 10
 * @hooked woocommerce_breadcrumb - 10
 *
 * do_action( 'storefront_before_content' );
 */

/*
 * //HOW TO MODIFY STOREFRONT ACTIONS
 * add_action( 'action_name', 'your_function_name' );
 * function your_function_name() {
 * // Your code
 * }
 */

//////////_tn - OFFICIAL STOREFRONT ACTIONS
add_action('storefront_before_site', '_tn_before_site');
function _tn_before_site()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before site</p>';
}

add_action('storefront_before_header', '_tn_before_header');
function _tn_before_header()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before header</p>';
}

add_action('storefront_header', '_tn_header');
function _tn_header()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook header</p>';
    //REMOVE_ACTION, ADD_ACTION + CHANGE NUMBER
    //storefront_secondary_navigation()
    //storefront_primary_navigation_wrapper()
    //storefront_primary_navigation()
    //storefront_header_cart()
    //storefront_primary_navigation_wrapper_close()
}

add_action('storefront_homepage', '_tn_homepage');
function _tn_homepage()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook homepage</p>';
}

add_action('storefront_before_content', '_tn_before_content');
function _tn_before_content()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before content</p>';
}

add_action('storefront_content_top', '_tn_content_top');
function _tn_content_top()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook content top</p>';
}

add_action('storefront_page_before', '_tn_page_before');
function _tn_page_before()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id before</p>';
}

add_action('storefront_page', '_tn_page');
function _tn_page()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id</p>';
}

add_action('storefront_page_after', '_tn_page_after');
function _tn_page_after()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id after</p>';
}

add_action('storefront_sidebar', '_tn_sidebar');
function _tn_sidebar()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook sidebar</p>';
}

add_action('storefront_before_footer', '_tn_before_footer');
function _tn_before_footer()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before footer</p>';
}

add_action('storefront_footer', '_tn_footer');
function _tn_footer()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook footer</p>';
}

//_tn - REMOVE THE FIXED MOBILE MENU
add_action('storefront_footer', 'remove_storefront_handheld_footer_bar');
function remove_storefront_handheld_footer_bar()
{
    remove_action('storefront_footer', 'storefront_handheld_footer_bar', 999);
}

add_action('storefront_after_footer', '_tn_after_footer');
function _tn_after_footer()
{
    echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook after footer</p>';
}

//_tn - REMOVE CART FROM HOME PAGE
function remove_sf_actions()
{
    remove_action('storefront_header', 'storefront_header_cart', 60);
}
//add_action('init', 'remove_sf_actions');

//////////_tn - OFFICIAL STOREFRONT FILTERS

//_tn - HOW MANY FOOTER WIDGETS "DO WE REALLY NEED" IN WP-ADMIN
add_filter('storefront_footer_widget_columns', function () {
    return '1';
});

//_tn - REMOVE STOREFRONT CREDIT/COPY IN FOOTER | https://wordpress.org/support/topic/storefront-code-used-to-remove-credit/  | https://docs.woocommerce.com/document/storefront-hooks-actions-filters/
add_filter('storefront_credit_link', '__return_false');
add_filter('storefront_copyright_text', '__return_false');

//_tn - BELOW WE ARE PLAYING WITH THE POSSIBILITY OF REDUCING UNNEEEDED STYLES | TEST!
//add_filter('storefront_customizer_css', '__return_false'); // | https://stackoverflow.com/a/37403115/957186
//add_filter('storefront_customizer_woocommerce_css', '__return_false'); // | https://stackoverflow.com/a/37403115/957186

function my_theme_remove_storefront_standard_functionality()
{
    //remove customizer inline styles from parent theme as I don't need it.
    //set_theme_mod('storefront_styles', '');
    //set_theme_mod('storefront_woocommerce_styles', '');
}
    add_action('init', 'my_theme_remove_storefront_standard_functionality');

    //_tn - PLAY WITH THE FOLLOWING WHEN TIME PERMITS...
    //storefront_homepage_content_styles
    //storefront_google_font_families

    //_tn - I BELIEVE THIS IS THE MENU NAVIGATION DISPLAYED ON ACTUAL PRODUCT PAGES....TEST
    // add_filter('storefront_navigation_markup_template', function () {
    //     //return '';
    // });