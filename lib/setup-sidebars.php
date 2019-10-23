<?php

//_tn - DEMO | REGISTER CUSTOM SIDE BARS | I.E. FOOTER AND ABOUT US SECTION
function _tn_core_action_reg_sidebars()
{
    //_tn - DEMO | REGISTER FOOTER MULTI SIDEBARS | CREATE A LIGHT MULTI SIDE BAR SYSTEM
    $footer_layout = '3,3,3,3'; //4 columns with a bs4 col width of 3
    $columns = explode(',', $footer_layout);
    foreach ($columns as $i => $column) {
        register_sidebar([
            'id' => 'footer-sidebar-'.($i + 1),
            'name' => sprintf(esc_html__('Footer Widgets Column %s', '_tn'), $i + 1),
            'description' => esc_html__('Footer Widgets', '_tn'),
            'before_widget' => '<section id="%1$s" class="mb-2 p-2 %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h5>',
            'after_title' => '</h5>',
        ]);
    }
}
//add_action('widgets_init', '_tn_core_action_reg_sidebars');

//_tn - DEMO | DISPLAY SIDE BARS
function _tn_action_sidebars_multi()
{
    $footer_layout = '3,3,3,3';
    $columns = explode(',', $footer_layout);
    $footer_bg = 'bg-primary'; //_tn-later on we will convert this to be a value we select in the customizer
    $widgets_active = false;
    $widgets_theme = '';
    if ('bg-light' == $footer_bg) {
        $widget_theme = $footer_bg.' text-dark';
    } else {
        $widget_theme = $footer_bg.' text-light';
    }
    foreach ($columns as $i => $column) {
        if (is_active_sidebar('footer-sidebar-'.($i + 1))) {
            $widgets_active = true;
        }
    }

    if ($widgets_active) {
        echo '<div class="row '.$widget_theme.'">';
        foreach ($columns as $i => $column) {
            echo '<div class="col-md-'.$column.'">';
            if (is_active_sidebar('footer-sidebar-'.($i + 1))) {
                dynamic_sidebar('footer-sidebar-'.($i + 1));
            }
            echo '</div>';
        }
        echo '</div>';
    }
}
//add_action('_tn_action_footer_sidebars', '_tn_action_sidebars_multi', 1);

//_tn - DEMO | HOW TO PROPERLY UNREGISTER WIDGETS I HAVE SET IN PLACE
function remove_custom_footer_widget()
{
    unregister_widget('WP_Widget_Calendar');
}
//add_action( 'widgets_init', 'remove_custom_footer_widget' );