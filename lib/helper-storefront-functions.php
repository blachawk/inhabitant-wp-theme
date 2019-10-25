<?php

//_tn - OVERRIDE STOREFRONT FUNCTIONS

//_tn - OVERRIDE SITE TITLE | ADD BS4 CLASSES
if (!function_exists('storefront_site_title_or_logo')) {
    /**
     * Display the site title or logo.
     *
     * @since 2.1.0
     *
     * @param bool $echo Echo the string or return it.
     *
     * @return string
     */
    function storefront_site_title_or_logo($echo = true)
    {
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            $logo = get_custom_logo();
            $html = is_home() ? '<h1 class="logo">'.$logo.'</h1>' : $logo;
        } else {
            // <h1 class="px-3 py-4 text-uppercase mtitle"><a class="text-dark" href="/">Inhabitant</a></h1>

            $tag = is_home() ? 'h1' : 'div';

            $html = '<'.esc_attr($tag).' class="beta site-title px-3 py-4 text-uppercase mtitle"><a class="text-dark" href="'.esc_url(home_url('/')).'" rel="home">'.esc_html(get_bloginfo('name')).'</a></'.esc_attr($tag).'>';

            if ('' !== get_bloginfo('description')) {
                $html .= '<p class="site-description">'.esc_html(get_bloginfo('description', 'display')).'</p>';
            }
        }

        if (!$echo) {
            return $html;
        }

        echo $html; // WPCS: XSS ok.
    }
}

//_tn - OVERRIDE PAGE ENTRY TITLES | ADD BS4 CLASSES
if (!function_exists('storefront_page_header')) {
    /**
     * Display the page header.
     *
     * @since 1.0.0
     */
    function storefront_page_header()
    {
        if (is_front_page() && is_page_template('template-fullwidth.php')) {
            return;
        } ?>
<header class="entry-header">
    <?php
        storefront_post_thumbnail('full');
        the_title('<h1 class="entry-title text-center">', '</h1>'); ?>
</header><!-- .entry-header -->
<?php
    }
}

//_tn - OVERRIDE PAGE ENTRY CONTENT | ADD BS4 CLASSES
if (!function_exists('storefront_page_content')) {
    /**
     * Display the post content.
     *
     * @since 1.0.0
     */
    function storefront_page_content()
    {
        ?>
<div class="entry-content text-center">
    <?php the_content(); ?>
    <?php
                wp_link_pages(
            [
                'before' => '<div class="page-links">'.__('Pages:', 'storefront'),
                'after' => '</div>',
            ]
        ); ?>
</div><!-- .entry-content -->
<?php
    }
}

//_tn - OVERRIDE FOOTER | ELEMINATE ROW-X AND COL-X AS THEY DO NOT ALLOW FUL WIDTH
if (!function_exists('storefront_footer_widgets')) {
    /**
     * Display the footer widget regions.
     *
     * @since  1.0.0
     *
     * @return void
     */
    function storefront_footer_widgets()
    {
        $rows = intval(apply_filters('storefront_footer_widget_rows', 1));
        $regions = intval(apply_filters('storefront_footer_widget_columns', 4));

        for ($row = 1; $row <= $rows; ++$row) {
            // Defines the number of active columns in this footer row.
            for ($region = $regions; 0 < $region; --$region) {
                if (is_active_sidebar('footer-'.esc_attr($region + $regions * ($row - 1)))) {
                    $columns = $region;

                    break;
                }
            }

            if (isset($columns)) {
                ?>
<div class=<?php echo '"footer-widgets"'; ?>>
    <?php
                for ($column = 1; $column <= $columns; ++$column) {
                    $footer_n = $column + $regions * ($row - 1);

                    if (is_active_sidebar('footer-'.esc_attr($footer_n))) {
                        ?>
    <div class="block footer-widget-<?php echo esc_attr($column); ?>">
        <?php dynamic_sidebar('footer-'.esc_attr($footer_n)); ?>
    </div>
    <?php
                    }
                } ?>
</div><!-- .footer-widgets.row-<?php echo esc_attr($row); ?> -->
<?php
                unset($columns);
            }
        }
    }
}