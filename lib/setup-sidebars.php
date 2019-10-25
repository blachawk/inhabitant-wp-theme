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
    dynamic_sidebar('aboutus-sidebar');
}
add_action('storefront_sidebar', '_tn_sidebar_aboutus_display', 1);

//_tn - TEST | HOW TO PROPERLY UNREGISTER WIDGETS I HAVE SET IN PLACE
function remove_custom_footer_widget()
{
    unregister_widget('WP_Widget_Calendar');
}
//add_action( 'widgets_init', 'remove_custom_footer_widget' );