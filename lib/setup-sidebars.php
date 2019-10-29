<?php

//_tn - REGISTER [ABOUT US] SIDEBAR

function _tn_sidebar_aboutus_reg()
{
    register_sidebar([
        'id' => 'aboutus-sidebar',
        'name' => esc_html__('About Us', '_tn'),
        'description' => esc_html__('A custom description about the seller', '_tn'),
        'before_widget' => '<div class="container mabout"><div class="row"><div class="col"><div class="bg-info text-center pb-2">',
        'after_widget' => '</div></div></div></div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ]);
}
add_action('widgets_init', '_tn_sidebar_aboutus_reg');

//_tn - DISPLAY [ABOUT US] SIDEBAR
function _tn_sidebar_aboutus_display()
{
    if (is_front_page()) {
        dynamic_sidebar('aboutus-sidebar');
    }
}
add_action('storefront_sidebar', '_tn_sidebar_aboutus_display', 1);

/////////////////////////////////////////////////////////////////////

//_tn - UNREGISTER SIDEBARS

function _tn_remove_sidebars()
{
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WC_Widget_Product_Search');
}
add_action('widgets_init', '_tn_remove_sidebars');

//_tn - UNREGISTER FOOTER COLUMNS 2,3,4,5

function _tn_remove_Storefront_footer_columns()
{
    return 1;
}
add_filter('storefront_footer_widget_columns', '_tn_remove_Storefront_footer_columns', 10, 3);

//_tn - ADJUST FOOTER ROWS

function _tn_adjust_Storefront_footer_row()
{
    return 1;
}
add_filter('storefront_footer_widget_rows', '_tn_adjust_Storefront_footer_row', 10, 3);