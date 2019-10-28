<?php

//_tn - A CUSTOM PRODUCT LISTING FOR A CUSTOM TEMPLATE |
// https://businessbloomer.com/woocommerce-display-products-table/
// https://wordpress.stackexchange.com/a/167309/98671


//_tn - WooCommerce provides some add_action capabilities | woocommerce\templates\content-product.php
// add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
// add_action('woocommerce_before_shop_loop', 'action_woocommerce_before_shop_loop', 10, 2);
// add_action('woocommerce_before_shop_loop', $woocommerce_catalog_ordering, $int);
// the_post_thumbnail('full');
// add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6);
// add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
// add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
// add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
// add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
// add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

/**
 * _tn - The Class WC_Product is amazing and provides rich data via wc_get_products()
 * source - https://docs.woocommerce.com/wc-apidocs/class-WC_Product.html
 */

// Get Product General Info
 
// $product->get_type();
// $product->get_name();
// $product->get_slug();
// $product->get_date_created();
// $product->get_date_modified();
// $product->get_status();
// $product->get_featured();
// $product->get_catalog_visibility();
// $product->get_description();
// $product->get_short_description();
// $product->get_sku();
// $product->get_menu_order();
// $product->get_virtual();
// get_permalink($product->get_id());
 
// // Get Product Prices
 
// $product->get_price();
// $product->get_regular_price();
// $product->get_sale_price();
// $product->get_date_on_sale_from();
// $product->get_date_on_sale_to();
// $product->get_total_sales();
 
// // Get Product Tax, Shipping & Stock
 
// $product->get_tax_status();
// $product->get_tax_class();
// $product->get_manage_stock();
// $product->get_stock_quantity();
// $product->get_stock_status();
// $product->get_backorders();
// $product->get_sold_individually();
// $product->get_purchase_note();
// $product->get_shipping_class_id();
 
// // Get Product Dimensions
 
// $product->get_weight();
// $product->get_length();
// $product->get_width();
// $product->get_height();
// $product->get_dimensions();
 
// // Get Linked Products
 
// $product->get_upsell_ids();
// $product->get_cross_sell_ids();
// $product->get_parent_id();
 
// // Get Product Variations
 
// $product->get_attributes();
// $product->get_default_attributes();
 
// // Get Product Taxonomies
 
// $product->get_categories();
// $product->get_category_ids();
// $product->get_tag_ids();
 
// // Get Product Downloads
 
// $product->get_downloads();
// $product->get_download_expiry();
// $product->get_downloadable();
// $product->get_download_limit();
 
// // Get Product Images
 
// $product->get_image_id();
// $product->get_image();
// $product->get_gallery_image_ids();
 
// // Get Product Reviews
 
// $product->get_reviews_allowed();
// $product->get_rating_counts();
// $product->get_average_rating();
// $product->get_review_count();

// More...

// $product->get_title()
// $product->is_visible()
// $product->is_featured()
// $product->is_on_sale()
// $product->has_child()
// $product->get_variation_price( 'min', true )
// $product->get_variation_price( 'max', true )
// $product->get_variation_regular_price( 'min', true )
// $product->get_variation_regular_price( 'max', true )
// $product->is_type( $type ) //checks the product type, string/array $type ( 'simple', 'grouped', 'variable', 'external' ), returns boolean

add_action('_tn_do_storefront_product_loop', '_tn_storefront_product_loop');

function _tn_storefront_product_loop()
{
    // Get most recently modified products.
    $args = array(
        'orderby' => 'modified',
        'order' => 'ASC',
        'status' => 'publish'
    );
    $products = wc_get_products($args);
        
    if (is_array($products)) {
        foreach ($products as $product) {
            echo '<div class="row">';
            echo '<div class="col text-center mb-5 py-2">';
            echo '<p><a class="" href="'.get_permalink($product->get_id()).'">'.get_the_post_thumbnail($product->get_id()).'</a></p>';
            echo '<p><a class="text-dark h5" href="'.get_permalink($product->get_id()).'">'.$product->get_title().'</a></p>'; //Product link
            echo '<p>$'.$product->get_price().'</p>';          // Product price
            echo '<p><a href="'.$product->add_to_cart_url().'" class="text-dark add-to-cart">Add To Cart</a></p>'; //add to cart link
            echo '</div>';
            echo '</div>';
        }
    }
    wp_reset_postdata();
}