<?php
/**
 * Archive / category listing template
 *
 * Unified INFORMATION listing with category tabs.
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$label_en   = 'Information';
$title_ja   = 'INFORMATION';
$active_tab = oiwake_get_information_active_tab();

if ( is_category() ) {
	$news_cat    = oiwake_get_news_category();
	$reports_cat = oiwake_get_reports_category();
	$current_id  = (int) get_queried_object_id();

	if ( $news_cat instanceof WP_Term && $current_id === (int) $news_cat->term_id ) {
		$label_en   = 'News';
		$active_tab = 'news';
	} elseif ( $reports_cat instanceof WP_Term && $current_id === (int) $reports_cat->term_id ) {
		$label_en   = 'Reports';
		$active_tab = 'report';
	} else {
		$label_en = 'Category';
		$title_ja = single_cat_title( '', false );
	}
} elseif ( is_tag() ) {
	$label_en = 'Tag';
	$title_ja = single_tag_title( '', false );
} elseif ( is_author() ) {
	$label_en = 'Author';
	$title_ja = get_the_author();
} elseif ( is_date() ) {
	$label_en = 'Archive';
	$title_ja = get_the_archive_title();
}

get_template_part(
	'template-parts/news',
	'archive-loop',
	array(
		'label_en'   => $label_en,
		'title_ja'   => $title_ja,
		'active_tab' => $active_tab,
	)
);

get_footer();
