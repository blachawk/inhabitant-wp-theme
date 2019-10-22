<?php

//_tn THE TEMPLATE | https://rudrastyh.com/woocommerce/remove-widgets.html
// add_action( 'widgets_init', function(){
// 	unregister_widget('Widget_Class_Name_Here');
// 	unregister_widget('Another_Widget_Class_Name_Here');
// });

add_action('widgets_init', function () {
    //UNREGISTER WOOCOMMERCE SEARCH
    unregister_widget('WC_Widget_Product_Search');

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