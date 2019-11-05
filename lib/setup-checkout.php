<?php

//_tn - MODIFY FIELDS ON CHECKOUT PAGE
add_filter('woocommerce_checkout_fields', 'misha_remove_fields', 9999);

function misha_remove_fields($woo_checkout_fields_array)
{
    // she wanted me to leave these fields in checkout
    // unset( $woo_checkout_fields_array['billing']['billing_first_name'] );
    // unset( $woo_checkout_fields_array['billing']['billing_last_name'] );
    // unset( $woo_checkout_fields_array['billing']['billing_phone'] );
    // unset( $woo_checkout_fields_array['billing']['billing_email'] );
    // unset( $woo_checkout_fields_array['order']['order_comments'] ); // remove order notes

    // and to remove the billing fields below
     unset($woo_checkout_fields_array['billing']['billing_company']); // remove company field
    // unset( $woo_checkout_fields_array['billing']['billing_country'] );
    // unset( $woo_checkout_fields_array['billing']['billing_address_1'] );
    // unset( $woo_checkout_fields_array['billing']['billing_address_2'] );
    // unset( $woo_checkout_fields_array['billing']['billing_city'] );
    // unset( $woo_checkout_fields_array['billing']['billing_state'] ); // remove state field
    // unset( $woo_checkout_fields_array['billing']['billing_postcode'] ); // remove zip code field

    return $woo_checkout_fields_array;
}

//_tn - MODIFY THE RETURN TO SHOP LINK
//_tn - Tutorial: http://www.skyverge.com/blog/change-woocommerce-return-to-shop-button/
function _tn_return_shop_url()
{
    return get_site_url();
}
add_filter('woocommerce_return_to_shop_redirect', '_tn_return_shop_url');

// add_action('woocommerce_checkout_before_customer_details', function () {
//     echo '<p>Content area</p>';
// });

// add_action('woocommerce_before_checkout_billing_form', function () {
//     echo '<p>Don\'t forget...</p>';
// });

// add_filter('woocommerce_checkout_fields', 'misha_checkout_fields_styling', 9999);

// function misha_checkout_fields_styling($f)
// {
//     $f['billing']['billing_email']['class'][1] = 'form-row-wide';
//     $f['billing']['billing_phone']['class'][1] = 'form-row-wide';

//     return $f;
// }

add_action('woocommerce_before_cart', 'sample', 1);

function sample()
{
    if (!0 == WC()->cart->get_cart_contents_count()) {
        wc_print_notice(__('Free shipping on all orders!', 'woocommerce'), 'notice');
        // Change notice text as desired
//        echo '<h1>Loooks like your you have something in your cart - Free shipping on all orders!</h1>';
    }
}

// <div class="woocommerce">
// <div class="woocommerce-message text-center h4" role="alert">
//   <p class="m-0 font-weight-bold">Free shipping on all orders</p>
// </div>
// </div>

add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2);
function woo_change_order_received_text($str, $order)
{
    return '<h1 class="font-weight-bold">Thank you. Your order has been received.</h1> <p>We have e-mailed the purchase receipt to you.</p><p><a href="'.get_home_url().'">Click here to return home.</a></p>';
}