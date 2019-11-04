<?php

//_tn - MANAGE ALL ACTIONS AND FILTERS

/**
 * Dev - Added some new hooks to the homepage template tags:
 * storefront_homepage_after_product_categories_title
 * storefront_homepage_after_recent_products_title
 * storefront_homepage_after_featured_products_title
 * storefront_homepage_after_popular_products_title
 * storefront_homepage_after_on_sale_products_title.
 * storefront_homepage_content_styles
 * storefront_navigation_markup_template.
 */

/**
 * _tn - IMPORTANT RESOURCES
 * wp-content\themes\storefront\inc\storefront-template-hooks.php
 * https://stackoverflow.com/search?q=wordpress+storefront.
 * https://stackoverflow.com/questions/37745795/change-order-of-items-in-storefront-theme-header.
 * https://developer.wordpress.org/reference/functions/apply_filters/
 * https://stackoverflow.com/a/37758434/957186.
 */

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

//////////////////////////////FILTERS///////////////////////////////

//_tn - ADD CUSTOM DECOR
add_action('storefront_header', function () {
    echo '<h5 class="text-info py-2 h5 text-center">Main Menu</h5><hr class="bg-success">';
    /*
     * ADDITIONAL install_themes_dashboard()
     * storefront_secondary_navigation()
     * storefront_primary_navigation_wrapper()
     * storefront_primary_navigation()
     * storefront_header_cart()
     * storefront_primary_navigation_wrapper_close()
     */
});

//_tn - REMOVE THE FIXED MOBILE MENU
add_action('storefront_footer', function () {
    remove_action('storefront_footer', 'storefront_handheld_footer_bar', 999);
});

//_tn - SWAP ACTION LOCATIONS FOR STOREFRONT SITE TITLE
add_action('wp', function () {
    remove_action('storefront_header', 'storefront_site_branding', 20);
    add_action('_tn_do_site_title', 'storefront_site_branding', 1);
});

//_tn - SWAP ACTION LOCATIONS FOR MINICART
//_tn - RESOURCE - https://codex.wordpress.org/Plugin_API/Action_Reference
add_action('wp', function () {
    remove_action('storefront_header', 'storefront_header_cart', 60);
    $mpage = get_the_title();
    if ('Cart View' != $mpage) {
        //add_action('_tn_do_mini_cart', 'storefront_header_cart', 1);
        add_action('_tn_do_mini_cart', function () {
            //RETRIEVE WOOCOMMERCE CART QUANITTY VALUE
            //RESOURCE - https://docs.woocommerce.com/wc-apidocs/class-WC_Cart.html
             $woocount = WC()->cart->get_cart_contents_count(); //no need for globals
             $woocountquantity = sprintf(_n('%s item', '%s items', $woocount, '_tn'), $woocount);

            //CALL CUSTOM ACTION EVERYWHERE EXCEPT ON VIEW CART PAGE
            $mpage = get_the_title();
            if ('Cart View' != $mpage) {
                //APPEND QAUNTITY TO INHABITANT CART QUANTITY POP-UP BOX
                //RESOURCE - https://stackoverflow.com/a/40102239/957186
                echo '<a class="position-relative text-light" href="'.esc_url(wc_get_cart_url()).'">Cart <span class="text-warning pl-2">'.$woocountquantity.'</span></a>';
            }
        });
    }
});

//_tn - SWAP TITLE LOCAITON
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 20);

//_tn - SWAP PRODUCT FULL DESCRIPTION HOOK LOCATIONS
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
function woocommerce_template_product_description()
{
    woocommerce_get_template('single-product/tabs/description.php');
}
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_product_description', 30);

//_tn - REMOVE PRODUCT META | THIS INCLUDES THE CATEGORY LINKS
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

function _tn_paypal_content()
{
    echo '<div class="alert w-75 m-auto text-center">Click below to purchase this item now</div>';
}
add_action('woocommerce_after_add_to_cart_form', '_tn_paypal_content', 0);

//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
//remove_action('woocommerce_after_single_product_summary','');

//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//add_action( 'woocommerce_single_product_summary', 'the_content', 20 );

// add_action('storefront_before_site', '_tn_before_site');
// function _tn_before_site()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before site</p>';
// }

// add_action('storefront_before_header', '_tn_before_header');
// function _tn_before_header()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before header</p>';
// }

// add_action('storefront_homepage', '_tn_homepage');
// function _tn_homepage()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook homepage</p>';
// }

// add_action('storefront_before_content', '_tn_before_content');
// function _tn_before_content()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before content</p>';
// }

// add_action('storefront_content_top', '_tn_content_top');
// function _tn_content_top()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook content top</p>';
// }

// add_action('storefront_page_before', '_tn_page_before');
// function _tn_page_before()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id before</p>';
// }

// add_action('storefront_page', '_tn_page');
// function _tn_page()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id</p>';
// }

// add_action('storefront_page_after', '_tn_page_after');
// function _tn_page_after()
// {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook page id after</p>';
// }

// add_action('storefront_sidebar', function() {
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook sidebar</p>';
// });

// add_action('storefront_before_footer', function(){
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook before footer</p>';
// });

// add_action('storefront_footer', function(){
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook footer</p>';
// });

// add_action('storefront_after_footer', function(){
//     echo '<p class="btn btn-sm bg-primary text-light rounded-0 mhook">st-hook after footer</p>';
// });

//////////////////////////////FILTERS///////////////////////////////

//_tn - APPEND CUSTOM GOOGLE FONTS | http://www.fix-css.com/2016/09/remove-google-fonts-form-woo-storefront-theme/
add_filter('storefront_google_font_families', '_tn_gfonts');

function _tn_gfonts($family)
{
    $family['fira-mplus-secular'] = 'Fira+Sans+Condensed:200, 300,400|M+PLUS+1p:500,700|Secular+One&display=swap';

    return $family;
}

//_tn - DISABLE FOOTER CREDIT | FOOTER COPY | BREADCRUMB | GUTENBERGE EDITOR | ADMIN TOOLBAR
//_tn - RESOURCE - https://wordpress.org/support/topic/storefront-code-used-to-remove-credit/  | https://docs.woocommerce.com/document/storefront-hooks-actions-filters/
add_filter('storefront_credit_link', '__return_false');
add_filter('storefront_copyright_text', '__return_false');
add_filter('woocommerce_get_breadcrumb', '__return_false');
add_filter('use_block_editor_for_post_type', '__return_false', 10);
show_admin_bar(false);
//_tn - POSSIBILITY OF REDUCING STYLES | TEST WHEN TIME PERMITS
//add_filter('storefront_customizer_css', '__return_false'); // | https://stackoverflow.com/a/37403115/957186
//add_filter('storefront_customizer_woocommerce_css', '__return_false'); // | https://stackoverflow.com/a/37403115/957186

//_tn - DISABLE UNNEEDED ADMIN MENU ITEMS
//_tn - RESOURCES  https://wplift.com/how-to-remove-wordpress-admin-menu-items https://wordpress.stackexchange.com/a/307734/98671 | https://wordpress.stackexchange.com/a/52151/98671
add_action('admin_menu', 'remove_admin_menus');
//add_action( 'admin_menu', 'remove_admin_submenus' );

//Remove top level admin menus
function remove_admin_menus()
{
    remove_menu_page('jetpack'); //Jetpack* // remove_menu_page( 'edit.php' ); //Posts
remove_menu_page('edit.php'); //Comments
remove_menu_page('edit-comments.php'); //Comments
remove_menu_page('themes.php'); //Appearance
remove_menu_page('plugins.php'); //Plugins
remove_menu_page('users.php'); //Users
remove_menu_page('tools.php'); //Tools
remove_menu_page('options-general.php'); //Settings remove_menu_page( 'wpcf7' ); //contact form
}

//Remove sub level admin menus
function remove_admin_submenus()
{
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'post-new.php');
    remove_submenu_page('themes.php', 'nav-menus.php');
    remove_submenu_page('themes.php', 'widgets.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('plugins.php', 'plugin-install.php');
    remove_submenu_page('users.php', 'users.php');
    remove_submenu_page('users.php', 'user-new.php');
    remove_submenu_page('upload.php', 'media-new.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-reading.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-media.php');
    remove_submenu_page('options-general.php', 'options-privacy.php');
    remove_submenu_page('options-general.php', 'options-permalinks.php');
    remove_submenu_page('index.php', 'update-core.php');
}