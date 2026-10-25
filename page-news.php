<?php
/**
 * Template Name: INFORMATION
 * Template for page slug: news
 *
 * INFORMATION listing — filterable by ?info=news|report.
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$paged    = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$filter   = oiwake_get_information_filter(); // Determine BEFORE replacing $wp_query
$per_page = 5;
$query_args = oiwake_get_posts_query_args( $filter, $per_page, $paged );

$news_query = new WP_Query( $query_args );

global $wp_query;
$original_query = $wp_query;
$wp_query       = $news_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

$label_en = 'News';
if ( 'news' === $filter ) {
	$label_en = 'information';
} elseif ( 'report' === $filter ) {
	$label_en = 'event report';
}

get_template_part(
	'template-parts/news',
	'archive-loop',
	array(
		'label_en'       => $label_en,
		'title_ja'       => 'NEWS',
		'active_tab'     => $filter,
		'split_schedule' => in_array( $filter, array( 'all', 'news' ), true ),
	)
);

$wp_query = $original_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
wp_reset_postdata();

get_footer();
