<?php

//_tn - OVERRIDE STOREFRONT FUNCTIONS

//_tn - OVERRIDE PAGE ENTRY TITLES
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

//_tn - OVERRIDE PAGE ENTRY CONTENT
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