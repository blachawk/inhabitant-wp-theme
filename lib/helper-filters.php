<?php

    //_tn - REMOVE STOREFRONT CREDIT/COPY IN FOOTER | https://wordpress.org/support/topic/storefront-code-used-to-remove-credit/  | https://docs.woocommerce.com/document/storefront-hooks-actions-filters/
    add_filter('storefront_credit_link', '__return_false');
    add_filter('storefront_copyright_text', '__return_false');

    //_tn - HOW MANY FOOTER WIDGETS "DO WE REALLY NEED" IN WP-ADMIN
    add_filter('storefront_footer_widget_columns', function () {
        return '1';
    });