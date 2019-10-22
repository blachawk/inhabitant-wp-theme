<?php

//_tn ACCESS CORE FILTERS TO DYNAMICALLY ADD STUFF TO HEADER
function _tn_core_filters_add_to_head()
{
    //_tn add a favicon
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="/wp-content/uploads/favicon-32x32.png" />';
    // _tn add style element
    //echo '<style>body {border:solid 2em purple;}</style>';
}
add_action('wp_head', '_tn_core_filters_add_to_head');
add_action('login_head', '_tn_core_filters_add_to_head');
add_action('admin_head', '_tn_core_filters_add_to_head');