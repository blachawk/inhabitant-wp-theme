<?php
/**
 * Fix: WooCommerce - Sorry, this file type is not permitted for security reasons.
 *
 * @since 1.0.0
 */
if (!function_exists('prefix_woocommerce_csv_product_import_valid_filetypes')) {
    function prefix_woocommerce_csv_product_import_valid_filetypes($defaults)
    {
        // Override for the PHP version 7.2.
        $defaults['csv'] = 'text/plain';

        return $defaults;
    }
    add_filter('woocommerce_csv_product_import_valid_filetypes', 'prefix_woocommerce_csv_product_import_valid_filetypes');
}