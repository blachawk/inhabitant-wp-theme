<?php

require_once 'lib/setup-enqueue.php';    //_tn -
require_once 'lib/setup-header.php';     //_tn - customize the <head></head> section of our templates
require_once 'lib/setup-sidebars.php';   //_tn - helpful for content areas like footer, about us (on homepage), etc...
require_once 'lib/setup-navigation.php'; //_tn - create our own custom navigation menu on top of page
require_once 'lib/helper-actions.php';   //_tn - create custom actions to add to the project
require_once 'lib/helper-filters.php';   //_tn - create custom filters to add to the project
require_once 'lib/helper-storefront-hooks.php';  //_tn - tap into storefront actions and filters directly | https://docs.woocommerce.com/document/introduction-to-hooks-actions-and-filters/
require_once 'lib/helper-storefront-functions.php'; //_tn - override storefront functions
require_once 'lib/helper-storefront-widgets.php'; //_tn - override storefront widgets
require_once 'lib/helper-woocom-product-listing.php'; //_tn - create our own woocommerce product loop
require_once 'lib/setup-toolbar.php'; //_tn - intentionally hide the WP toolbar when logged in.