<?php

// position of primary menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// position of secondary menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 12 );

// responsive menu
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
    genesis_register_responsive_menus(array(
        'script' => [
            'mainMenu'    => __( '', 'weart' ),
            'menuClasses' => [
                'others' => [ '.nav-primary' ],
            ],
        ],
        'extras' => [
            'media_query_width' => '960px',
        ],
    ));
}

// search to main-menu
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
        $menu  .= '<i class="menu-item fas fa-search" id="weart-search-icon"></i>';
    $menu  .= '</li>';


    //* Uncomment this block to add the date to the navigation menu
    /*
    $menu .= '<li class="right date">' . date_i18n( get_option( 'date_format' ) ) . '</li>';
    */

    return $menu;

}