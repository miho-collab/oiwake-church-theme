<?php
/**
 * Blog posts index (when a Posts page is assigned)
 *
 * @package Oiwake_Church_Theme
 */

get_header();

get_template_part(
	'template-parts/news',
	'archive-loop',
	array(
		'label_en'   => 'Information',
		'title_ja'   => 'INFORMATION',
		'active_tab' => 'all',
	)
);

get_footer();
