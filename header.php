<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="child html">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <button class="btn btn-success scroll-top-btn" title="Scroll Up">Top</button>

    <?php do_action('storefront_before_site'); ?>

    <div id="page" class="hfeed site">

        <?php do_action('storefront_before_header'); ?>

        <header id="masthead" class="site-header pt-0 b-0 border-0" role="banner"
            style="<?php storefront_header_styles(); ?>">
            <!--BEGIN MENU-->
            <div class="container-fluid p-0 m-0">
                <div class="row">
                    <div class="col">

                        <?php
                        // _tn - CUSTOM DO_ACTION
                        do_action('_tn_do_site_title');
                        ?>

                        <!--SITE MAIN MENU LINKS-->
                        <div class="pos-f-t fixed-top">
                            <div class="collapse manimate pb-0" id="navbarToggleExternalContent">
                                <?php
                                /**
                                 * Functions hooked into storefront_header action.
                                 *
                                 * @hooked storefront_header_container                 - 0
                                 * @hooked storefront_skip_links                       - 5
                                 * @hooked storefront_social_icons                     - 10
                                 * @hooked storefront_site_branding                    - 20
                                 * @hooked storefront_secondary_navigation             - 30
                                 * @hooked storefront_product_search                   - 40
                                 * @hooked storefront_header_container_close           - 41
                                 * @hooked storefront_primary_navigation_wrapper       - 42
                                 * @hooked storefront_primary_navigation               - 50
                                 * @hooked storefront_header_cart                      - 60
                                 * @hooked storefront_primary_navigation_wrapper_close - 68
                                 */
                                do_action('storefront_header');
                                ?>
                            </div>

                            <nav class="navbar navbar-dark mhamberger d-flex align-items-end flex-column">

                                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse"
                                    data-target="#navbarToggleExternalContent"
                                    aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="bg-dark my-3 px-2 text-center rounded">
                                    <?php
                                    // _tn - CUSTOM DO_ACTION
                                    do_action('_tn_do_mini_cart');
                                    ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--END MENU-->
        </header><!-- #masthead -->

        <?php
    /**
     * Functions hooked in to storefront_before_content.
     *
     * @hooked storefront_header_widget_region - 10
     * @hooked woocommerce_breadcrumb - 10
     */
    do_action('storefront_before_content');
    ?>

        <div id="content" class="site-content" tabindex="-1">
            <div class="col-full">

                <?php
        do_action('storefront_content_top');
