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
$cat      = oiwake_get_information_filter_category( $filter );
$per_page = (int) get_option( 'posts_per_page', 10 );

if ( in_array( $filter, array( 'news', 'report' ), true ) && ! ( $cat instanceof WP_Term ) ) {
	$query_args = array(
		'post_type'      => 'post',
		'post__in'       => array( 0 ),
		'posts_per_page' => $per_page,
		'paged'          => $paged,
	);
} else {
	$query_args = oiwake_get_posts_query_args( $cat, $per_page, $paged );
}

$news_query = new WP_Query( $query_args );

global $wp_query;
$original_query = $wp_query;
$wp_query       = $news_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

$label_en = 'Information';
if ( 'news' === $filter ) {
	$label_en = 'News';
} elseif ( 'report' === $filter ) {
	$label_en = 'Reports';
}

get_template_part(
	'template-parts/news',
	'archive-loop',
	array(
		'label_en'   => $label_en,
		'title_ja'   => 'INFORMATION',
		'active_tab' => $filter,
	)
);

$wp_query = $original_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
wp_reset_postdata();

get_footer();
