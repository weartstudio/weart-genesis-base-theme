<?php 

// Starts the engine.
include_once( get_template_directory() . '/lib/init.php' );

// theme supports from config file

    add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
    function genesis_sample_theme_support() {

        $theme_supports = genesis_get_config( 'theme-supports' );
        foreach ( $theme_supports as $feature => $args ) {
            add_theme_support( $feature, $args );
        }

    }

// end

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

        // fonts
		wp_enqueue_style(
			genesis_get_theme_handle() . '-fonts',
			$appearance['fonts-url'],
			[],
			genesis_get_theme_version()
		);

        // icons
        wp_enqueue_style(
            genesis_get_theme_handle() . '-icons',
			$appearance['fonts-icon'],
            [],
            genesis_get_theme_version()
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

// end

// basic

    get_template_part( 'lib/remove' );
    get_template_part( 'lib/gutenberg' );
    get_template_part( 'lib/acf' );

// end

// add user extra capability to editor role
	$admin_role = get_role( 'editor' );
	$admin_role->add_cap( 'edit_theme_options', true );
// end

// post loop

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
    // end

    // swap title and image
        function weart_swap_title_image() {
                if ( is_archive() || is_home() ) {
                remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
                add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
            }
        }
        add_action( 'genesis_before_content', 'weart_swap_title_image' );
    // end

// end

// search to menu
    add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
    function theme_menu_extras( $menu, $args ) {

        //* Change 'primary' to 'secondary' to add extras to the secondary navigation menu
        if ( 'primary' !== $args->theme_location )
            return $menu;

        //* Uncomment this block to add a search form to the navigation menu
        
        ob_start();
        get_search_form();
        $search = ob_get_clean();
        $menu  .= '<li class="right search">';
            $menu  .= $search;
            $menu  .= '<i class="fas fa-search" id="weart-search-icon"></i>';
        $menu  .= '</li>';
        

        //* Uncomment this block to add the date to the navigation menu
        /*
        $menu .= '<li class="right date">' . date_i18n( get_option( 'date_format' ) ) . '</li>';
        */

        return $menu;

    }
// end