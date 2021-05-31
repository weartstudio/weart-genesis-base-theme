<?php

add_action( 'wp_enqueue_scripts', 'weart_enqueue_scripts_styles' );
function weart_enqueue_scripts_styles() {

    $appearance = genesis_get_config( 'appearance' );

    // fonts
    wp_enqueue_style(
        genesis_get_theme_handle() . '-fonts',
        $appearance['fonts-url'],
        [],
        null
    );

    // icons
    wp_enqueue_style(
        genesis_get_theme_handle() . '-icons',
        $appearance['fonts-icon'],
        [],
        null
    );

    // slider theme style
    /* wp_enqueue_style(
        'weart-slick-css',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
    ); */

    // slider theme script
    /* wp_enqueue_script(
        'weart-slick-js',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        array('jquery'),
        null,
        true
    ); */

    // main theme script
    wp_enqueue_script(
        'weart-weart',
        CHILD_URL . '/assets/js/weart.js',
        array('jquery'),
        null,
        true
    );

}