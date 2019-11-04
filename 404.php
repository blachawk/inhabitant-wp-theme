<?php
/**
 * The template for displaying 404 pages (not found).
 */
get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <div class="error-404 not-found">

            <div class="page-content">

                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'storefront'); ?>
                    </h1>
                </header><!-- .page-header -->

                <p><?php esc_html_e('Nothing was found at this location. Try out the links below.', 'storefront'); ?>
                </p>

                <div class="container mproducts">
                    <?php do_action('_tn_do_storefront_product_loop'); ?>
                </div>

            </div><!-- .page-content -->
        </div><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();