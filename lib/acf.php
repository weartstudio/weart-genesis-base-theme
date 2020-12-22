<?php
/* 
 * ACF
 * - options page
 * - blocks
 *  */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Weart Studio Beállítások',
		'menu_title'	=> 'Weart beállítások',
		'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'position'  	=> '1.1',
        'icon_url'      => 'dashicons-desktop',
        'parent_slug'	=> 'themes.php',
		'redirect'		=> true
	));

}

add_action('acf/init', 'weart_acf_init_block_types');
function weart_acf_init_block_types() {

	// create weart category for blocks
		function weart_block_categories( $categories ) {
			$category_slugs = wp_list_pluck( $categories, 'slug' );
			return in_array( 'gwg', $category_slugs, true ) ? $categories : array_merge(
				$categories,
				array(
					array(
						'slug'  => 'weart',
						'title' => __( 'Weart', 'weart' ),
						'icon'  => 'editor-paste-word',
					),
				)
			);
		}
		add_filter( 'block_categories', 'weart_block_categories' );
	// end

    // ADD blocks
		if( function_exists('acf_register_block_type') ) {

			acf_register_block_type(array(
				'name'              => 'sample',
				'title'             => __('Sample Block'),
				'className'         => 'sample',
				'render_template'   => 'lib/blocks/sample.php',
				'category'          => 'weart',
				'icon'              => 'editor-paste-word',
				'keywords'          => array( 'sample', 'weart' ),
				'align'				=> 'full', // align
			));

		}
	// end


}