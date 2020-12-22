<?php
$weart_appearance = genesis_get_config( 'appearance' );


// Add support for editor styles for non gutenberg
	add_theme_support( 'editor-styles' );
	add_editor_style( '/assets/css/editor.min.css' );
// end

// gutenberg editor style
	add_action( 'enqueue_block_editor_assets', 'genesis_sample_block_editor_styles' );
	function genesis_sample_block_editor_styles() {

		$appearance = genesis_get_config( 'appearance' );

		wp_enqueue_style(
			genesis_get_theme_handle() . '-gutenberg-fonts',
			$appearance['fonts-url'],
			[],
			genesis_get_theme_version()
		);

	}
// end

// basic settinc from appearance.php
	add_theme_support(
		'editor-font-sizes',
		$weart_appearance['editor-font-sizes']
	);

	add_theme_support(
		'editor-color-palette',
		$weart_appearance['editor-color-palette']
	);
// end

// content width
	add_action( 'after_setup_theme', 'genesis_sample_content_width', 0 );
	function genesis_sample_content_width() {

		$appearance = genesis_get_config( 'appearance' );
		$GLOBALS['content_width'] = apply_filters( 'genesis_sample_content_width', $appearance['content-width'] );

	}
// end