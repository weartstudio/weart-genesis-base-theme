<?php

return [
	GENESIS_SETTINGS_FIELD => [
		'blog_cat_num'              => 6,
		'breadcrumb_home'           => 0,
		'breadcrumb_front_page'     => 0,
		'breadcrumb_posts_page'     => 0,
		'breadcrumb_single'         => 0,
		'breadcrumb_page'           => 0,
		'breadcrumb_archive'        => 0,
		'breadcrumb_404'            => 0,
		'breadcrumb_attachment'     => 0,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'entry_meta_after_content'  => '[post_categories] [post_tags]',
		'entry_meta_before_content' => '[post_date] ' . __( 'írta', 'weart' ) . ' [post_author_posts_link] [post_comments] [post_edit]',
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
		'content_archive'           => 'excerpts',
		'content_archive_thumbnail' => 1,
		'image_size'                => 'genesis-singular-images',
		'image_alignment'           => 'aligncenter',
		'genesis_footer'			=> '[footer_copyright before="Minden jog fenntartva "] · <a href="https://weart.hu" title="Weart Studio - Weboldal készítés, WordPress Programozás.">Weart Studio</a> · [footer_loginout]'
	],
	'posts_per_page'       => 10,
];
