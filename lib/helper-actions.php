<?php

//_tn THE TEMPLATE | https://rudrastyh.com/woocommerce/remove-widgets.html
// add_action( 'widgets_init', function(){
// 	unregister_widget('Widget_Class_Name_Here');
// 	unregister_widget('Another_Widget_Class_Name_Here');
// });

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

//REMOVE THE MOBILE MENU THAT FIXED TOWARDS THE BOTTOM OF THE SCREEN | THIS IS HOW YOU PROPERLY REMOVE AN ACTION THAT IS CURRENTLY BEING ADDED IN PARENT LAYOUT
add_action('storefront_footer', 'remove_storefront_handheld_footer_bar');
function remove_storefront_handheld_footer_bar()
{
    remove_action('storefront_footer', 'storefront_handheld_footer_bar', 999);
}