<?php
/**
 * Template Name: Inhabitant Privacy.
 *
 * The template for displaying Privacy Policies.
 */
get_header(); ?>

<!--INHABITANT DEFAULT TEMPLATE-->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
            while (have_posts()) {
                the_post();
                get_template_part('content', 'page');
            }
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
do_action('storefront_sidebar');
get_footer();