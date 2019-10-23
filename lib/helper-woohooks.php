<?php

//_tn - WOOCOMMERCE HOOKS WE CAN TAP INTO | https://docs.woocommerce.com/document/introduction-to-hooks-actions-and-filters/ | https://stackoverflow.com/a/38735106/95718

/**
 * //HOW TO UNREGISTER WCOMMERCE WIDGETS
 * _tn THE TEMPLATE | https://rudrastyh.com/woocommerce/remove-widgets.html
 *  add_action( 'widgets_init', function(){
 * 	unregister_widget('Widget_Class_Name_Here');
 * 	unregister_widget('Another_Widget_Class_Name_Here');
 *  });.
 *
 * //HOW TO MODIFY WOOMCOMMERCE VIA ACTIONS
 * add_action( 'action_name', 'your_function_name' );
 * function your_function_name() {
 * // Your code
 * }
 *
 * do_action('action_name');
 */

//_tn - WHEN WIDGETS ARE INITLIAZED....
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

//_tn - HOW MANY FOOTER WIDGETS "DO WE REALLY NEED" IN WP-ADMIN
add_filter('storefront_footer_widget_columns', function () {
    return '1';
});

//_tn - REMOVE STOREFRONT CREDIT/COPY IN FOOTER | https://wordpress.org/support/topic/storefront-code-used-to-remove-credit/  | https://docs.woocommerce.com/document/storefront-hooks-actions-filters/
add_filter('storefront_credit_link', '__return_false');
add_filter('storefront_copyright_text', '__return_false');

//_tn - REMOVE THE MOBILE MENU THAT FIXED TOWARDS THE BOTTOM OF THE WOCOMMERCE SCREEN | THIS IS HOW YOU PROPERLY REMOVE AN ACTION THAT IS CURRENTLY BEING ADDED IN PARENT THEME
add_action('storefront_footer', 'remove_storefront_handheld_footer_bar');
function remove_storefront_handheld_footer_bar()
{
    remove_action('storefront_footer', 'storefront_handheld_footer_bar', 999);
}