<?php

// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	add_editor_style( '/assets/editor.css' );
// end

// basic settinc from appearance.php
	$weart_appearance = genesis_get_config( 'appearance' );
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