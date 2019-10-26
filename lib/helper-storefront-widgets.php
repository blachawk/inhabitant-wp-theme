<?php

/**
 * //HOW TO UNREGISTER STOREFRONT WIDGETS
 * _tn THE TEMPLATE | https://rudrastyh.com/woocommerce/remove-widgets.html
 *  add_action( 'widgets_init', function(){
 * 	unregister_widget('Widget_Class_Name_Here');
 * 	unregister_widget('Another_Widget_Class_Name_Here');
 *  });.
 *
 * do_action('action_name');
 */

//////////_tn - OFFICIAL WOOCOMERCE WIDGETS
add_action('widgets_init', function () {
    //UNREGISTER WOOCOMMERCE-STOREFRONT SEARCH
    unregister_widget('WC_Widget_Product_Search');
});