<?php

// loop classes
function be_archive_post_class( $classes ) {

    // Don't run on single posts or pages
    if( is_singular() )
        return $classes;

    $classes[] = 'one-third';
    global $wp_query;
    if( 0 == $wp_query->current_post || 0 == $wp_query->current_post % 3 )
        $classes[] = 'first';
    return $classes;
}
// add_filter( 'post_class', 'be_archive_post_class' );

// swap title and image
    function weart_swap_title_image() {
            if ( is_archive() || is_home() ) {
            remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
            add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
        }
    }
    add_action( 'genesis_before_content', 'weart_swap_title_image' );
// end