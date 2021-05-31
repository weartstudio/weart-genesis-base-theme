<?php

// remove sidebars
unregister_sidebar( 'header-right' );

remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
unregister_sidebar( 'sidebar' );

remove_action( 'genesis_sidebar_alt', 'genesis_do_sidebar_alt' );
unregister_sidebar( 'sidebar-alt' );

// remove edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );

// Remove Genesis menu link
remove_theme_support( 'genesis-admin-menu' );

// remove post meta
// remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
// remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

// remove scripts
remove_post_type_support( 'post', 'genesis-scripts' );
remove_post_type_support( 'page', 'genesis-scripts' );

// layouts / only one layout
// genesis_unregister_layout( 'full-width-content' );
genesis_unregister_layout( 'content-sidebar' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// force default layout
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// disable gutenberg for posts only
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable gutenberg for all post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);

// remove wp basic patterns
remove_theme_support('core-block-patterns');