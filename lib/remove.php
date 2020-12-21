<?php

// remove from customizer
add_action( 'customize_register', 'childprefix_remove_genesis_customizer_section', 11 );
function childprefix_remove_genesis_customizer_section() {

	global $wp_customize;
    $remove_customizer_section = array(
        // 'genesis_updates',
        // 'genesis_header',
        // 'genesis_adsense',
        // 'genesis_color_scheme',
        // 'genesis_layout',
        // 'genesis_breadcrumbs',
        // 'genesis_single',
        // 'genesis_comments',
        // 'genesis_archives',
        // 'genesis_scripts',
    );

    foreach ( $remove_customizer_section as $section ) :
        $wp_customize->remove_section( $section );
    endforeach;


}

// remove from metaboxes
add_action( 'genesis_admin_before_metaboxes', 'childprefix_remove_genesis_admin_settings_metaboxes' );
function childprefix_remove_genesis_admin_settings_metaboxes( $hook ) {

    $remove_metabox = array(
        // 'genesis-theme-settings-adsense',
        // 'genesis-theme-settings-version',
        // 'genesis-theme-settings-feeds',
        // 'genesis-theme-settings-layout',
        // 'genesis-theme-settings-nav',
        // 'genesis-theme-settings-breadcrumb',
        // 'genesis-theme-settings-comments',
        // 'genesis-theme-settings-posts',
        // 'genesis-theme-settings-blogpage',
        // 'genesis-theme-settings-scripts',
        // 'genesis-theme-settings-header',
    );

    foreach ( $remove_metabox as $metabox ) :
        remove_meta_box( $metabox , $hook, 'main' );
    endforeach;


}

// remove sidebars
unregister_sidebar( 'header-right' );

// remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
// unregister_sidebar( 'sidebar' );

remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
unregister_sidebar( 'sidebar-alt' );

// remove seo settings
// genesis_disable_seo();

// remove genesis admin panel menu
remove_theme_support( 'genesis-admin-menu' );
remove_theme_support('core-block-patterns');


// remove breadcrumb display
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
// add_action( ‘genesis_before_footer’, ‘genesis_do_breadcrumbs’ );

// remove edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );

// remove post meta
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// remove scripts
remove_post_type_support( 'post', 'genesis-scripts' );
remove_post_type_support( 'page', 'genesis-scripts' );

// layouts / only one layout
genesis_unregister_layout( 'content-sidebar' ); 
genesis_unregister_layout( 'sidebar-content' ); 
genesis_unregister_layout( 'content-sidebar-sidebar' ); 
genesis_unregister_layout( 'sidebar-sidebar-content' ); 
genesis_unregister_layout( 'sidebar-content-sidebar' ); 
// set default layout to full width content
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );