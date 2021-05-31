<?php

// Starts the engine.
    include_once( get_template_directory() . '/lib/init.php' );


    // basic settings
    add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
    function genesis_sample_theme_support() {

        $theme_supports = genesis_get_config( 'theme-supports' );
        foreach ( $theme_supports as $feature => $args ) {
            add_theme_support( $feature, $args );
        }

        // theme modify capability to editor
        $admin_role = get_role( 'editor' );
	    $admin_role->add_cap( 'edit_theme_options', true );

    }

    // get function files
    get_template_part( 'lib/remove' );
    get_template_part( 'lib/gutenberg' );
    get_template_part( 'lib/acf' );
    get_template_part( 'lib/post-loop' );
    get_template_part( 'lib/menu' );
    get_template_part( 'lib/enqueue' );

// end


