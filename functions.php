<?php 

// Starts the engine.
include_once( get_template_directory() . '/lib/init.php' );

// menu

	// position of primary menu
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav', 12 );

	// position of secondary menu
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_before_header', 'genesis_do_subnav', 12 );

	// responsive menu
	if ( function_exists( 'genesis_register_responsive_menus' ) ) {
		genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
	}

// end

// enqueue
    add_action( 'wp_enqueue_scripts', 'weart_enqueue_scripts_styles' );
    function weart_enqueue_scripts_styles() {

        $appearance = genesis_get_config( 'appearance' );

        // font awesome
        wp_enqueue_style(
            'weart-fontawesome',
            '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' 
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
            get_stylesheet_directory_uri() . '/assets/weart.js',
            array('jquery'),
            null,
            true
        );

    }
// end