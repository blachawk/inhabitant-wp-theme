<?php

//_tn - STOREFRONT THEME HOOKS WE CAN TAP INTO

/**
 * https://docs.woocommerce.com/document/storefront-hooks-actions-filters/
 * C:\Users\lewisk\Documents\mTraining\klp\inhabitant.co\wp20191021\wp-content\themes\storefront\inc\storefront-template-hooks.php
 * https://stackoverflow.com/a/38735106/95718
 * https://stackoverflow.com/search?q=wordpress+storefront.
 */

/**
 * //HOW TO UNREGISTER STOREFRONT WIDGETS
 * _tn THE TEMPLATE | https://rudrastyh.com/woocommerce/remove-widgets.html
 *  add_action( 'widgets_init', function(){
 * 	unregister_widget('Widget_Class_Name_Here');
 * 	unregister_widget('Another_Widget_Class_Name_Here');
 *  });.
 *
 * //HOW TO MODIFY STOREFRONT ACTIONS
 * add_action( 'action_name', 'your_function_name' );
 * function your_function_name() {
 * // Your code
 * }
 *
 * do_action('action_name');
 */

//_tn - OFFICIAL WOOCOMERCE WIDGETS
add_action('widgets_init', function () {
    //UNREGISTER WOOCOMMERCE SEARCH
    unregister_widget('WC_Widget_Product_Search');
    //THE FOLLOWING "MAY" NOT WORK....
    // //UNREGISTER TAG CLOUD
    // unregister_widget('WC_Widget_Product_Tag_Cloud');
    // //UNREGISTER PRODUCT RATINGS
    // unregister_widget('WC_Widget_Rating_Filter');
    // //UNREGISTER PRODUCT REVIEWS
    // unregister_widget('WC_Widget_Recent_Reviews');
    // //UNREGISTER VIEWED PRODUCTS
    // unregister_widget('WC_Widget_Recently_Viewed');
    // //UNREGISTER PRODUCTS BY RATING
    // unregister_widget('WC_Widget_Top_Rated_Products');
});

//_tn - OFFICIAL STOREFRONT ACTIONS
// Dev - Added some new hooks to the homepage template tags; `storefront_homepage_after_product_categories_title`, `storefront_homepage_after_recent_products_title`, `storefront_homepage_after_featured_products_title`, `storefront_homepage_after_popular_products_title`, `storefront_homepage_after_on_sale_products_title`
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

//_tn - REMOVE THE MOBILE MENU THAT FIXED TOWARDS THE BOTTOM OF THE WOCOMMERCE SCREEN | THIS IS HOW YOU PROPERLY REMOVE AN ACTION THAT IS CURRENTLY BEING ADDED IN PARENT THEME
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

//_tn - OFFICIAL STOREFRONT FILTERS

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

    //storefront_homepage_content_styles
    //storefront_google_font_families

    //https://docs.woocommerce.com/document/storefront-hooks-actions-filters/