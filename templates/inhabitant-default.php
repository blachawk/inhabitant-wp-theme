<?php
/**
 * Template Name: Inhabitant Default.
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
get_header(); ?>

<!--INHABITANT DEFAULT TEMPLATE-->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
            while (have_posts()) {
                the_post();

                do_action('storefront_page_before');

                get_template_part('content', 'page'); ?>

        <div class="container mproducts">
            <?php
                    $args = [
                        'post_type' => 'product',
                        'posts_per_page' => 12,
                    ];
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) {
                        $loop->the_post(); ?>
            <div class="row">
                <div class="col text-center mb-5 py-2">
                    <?php
                                do_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
                        //https://stackoverflow.com/a/13000218/957186
                        //https://wordpress.stackexchange.com/a/167309/98671
                        the_post_thumbnail('full');
                        //FOR THE ADD_ACTION ON HERE, SIMPLY REMOVE THE ADD_TO_CART LINK AT ADD, THEN RE-ADD IT HERE!
                        do_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
                                
                        do_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
                        do_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
                        do_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10); ?>

                </div>
            </div>
            <?php
                    }
                } else {
                    echo __('No products found');
                }
                wp_reset_postdata(); ?>

            <!--/.products-->
        </div>


        <?php
                        /*
                        * Functions hooked in to storefront_page_after action
                        *
                        * @hooked storefront_display_comments - 10
                        */
                        do_action('storefront_page_after');
            } // End of the loop.
                    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
do_action('storefront_sidebar');
get_footer();