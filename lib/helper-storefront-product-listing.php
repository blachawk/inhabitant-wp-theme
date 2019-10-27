<?php

//_tn - CUSTOMIZE THE PRODUCT LISTING | https://businessbloomer.com/woocommerce-display-products-table/
// C:\Users\lewisk\Documents\mTraining\klp\inhabitant.co\wp20191021\wp-content\plugins\woocommerce\templates\content-product.php
//_tn - CHANGE NUMBER OF PRODUCTS DISPLAYED IN A SINGLE ROW
// add_filter('storefront_loop_columns', 'loop_columns');
// function loop_columns() {
// return 1;
// }

//_tn - REMOVE ALL DEFAULTS | ADD THEM AGAIN WITH LOOP IN BS4 LAYOUT, INTO A CUSTOM ADD_ACTION
//_tn - default image, price, rating, add to cart
// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//_tn - REMOVE SALE FLASH
// add_action('init', 'bbloomer_hide_storefront_sale_flash');
// function bbloomer_hide_storefront_sale_flash()
// {
//     remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6);
// }

//_tn - ADD DIV BEFORE PRODUCT TITLE
// add_action('woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_flex_open', 8);
// function bbloomer_loop_product_div_flex_open()
// {
//     echo '<div class="product_table">';
// }

//_tn - WRAP PRODUCT TITLE INTO A DIV WITH CLASS "ONE_THIRD"
// add_action('woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 9);
// function bbloomer_loop_product_div_wrap_open()
// {
//     echo '<div class="one_third">';
// }
 
// add_action('woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 6);
// function bbloomer_loop_product_div_wrap_close()
// {
//     echo '</div>';
// }

//_tn - RE-ADD AND WRAP PRICE INTO A DIV WITH CLASS "ONE_THIRD"
// add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 7 );
// add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 8 );
// add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 9 );


//_tn - CLOSE DIV AT TH END OF PRODUCT TITLE, PRICE, ADD TO CART
// add_action('woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_flex_close', 13);
// function bbloomer_loop_product_div_flex_close()
// {
//     echo '</div>';
// }

    // function action_woocommerce_before_shop_loop($woocommerce_catalog_ordering, $int)
    // {
    //     // make action magic happen here...
    //     echo "do stuff";
    // };
             
    // // add the action
    // add_action('woocommerce_before_shop_loop', 'action_woocommerce_before_shop_loop', 10, 2);
    // do_action('woocommerce_before_shop_loop', $woocommerce_catalog_ordering, $int);