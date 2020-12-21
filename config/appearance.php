<?php

// appearance settings

$default_colors = [
	'main'   => '#ffd635',
	'secondary'   => '#000034',
];

$fonts = [
	'title'   => 'Aller Bold',
	'text'   => 'Aller',
];

$main_color = get_theme_mod( 'main_color', $default_colors['main'] );
$secondary_color = get_theme_mod( 'secondary_color', $default_colors['secondary'] );


return [
	'content-width'        => 800,
	'default-colors'       => $default_colors,
	'fonts'				   => $fonts,
	'editor-color-palette' => [
		[
			'name'  => __( 'Márka szín', 'weart' ),
			'slug'  => 'theme-primary',
			'color' => $main_color,
		],
		[
			'name'  => __( 'Másodlagos szín', 'weart' ),
			'slug'  => 'theme-secondary',
			'color' => $secondary_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Kicsi', 'weart' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'weart' ),
			'size' => 16,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Közepes', 'weart' ),
			'size' => 18,
			'slug' => 'middle',
		],
		[
			'name' => __( 'Nagy', 'weart' ),
			'size' => 32,
			'slug' => 'big',
		]
	],
];
