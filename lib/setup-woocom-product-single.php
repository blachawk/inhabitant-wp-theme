<?php

//https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes

//TEST | https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/
//add_filter('woocommerce_enqueue_styles', '__return_false');

//_tn - TESTING IF THIS IS NEEDED FOR CUSTOM PRODUCT TEMPLATE PAGE | SO FAR NO EFFECT
function mytheme_add_woocommerce_support()
{
    add_theme_support(
        'woocommerce',
        apply_filters(
            'storefront_woocommerce_args',
            [
                'single_image_width' => 416,
                'thumbnail_image_width' => 324,
                'product_grid' => [
                    'default_columns' => 3,
                    'default_rows' => 4,
                    'min_columns' => 1,
                    'max_columns' => 6,
                    'min_rows' => 1,
                ],
            ]
        )
    );

    remove_theme_support('wc-product-gallery-zoom');
    remove_theme_support('wc-product-gallery-lightbox');
    remove_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');