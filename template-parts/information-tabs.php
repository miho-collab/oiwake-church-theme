<?php
/**
 * INFORMATION category filter tabs.
 *
 * @package Oiwake_Church_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args       = ( isset( $args ) && is_array( $args ) ) ? $args : array();
$active_tab = isset( $args['active_tab'] ) ? $args['active_tab'] : null;
$active_tab = oiwake_get_information_active_tab( $active_tab );

$all_url      = oiwake_get_information_tab_url( 'all' );
$news_url     = oiwake_get_information_tab_url( 'news' );
$report_url   = oiwake_get_information_tab_url( 'report' );
$news_cat     = oiwake_get_news_category();
$reports_cat  = oiwake_get_reports_category();
$news_label   = ( $news_cat instanceof WP_Term ) ? $news_cat->name : 'お知らせ';
$report_label = ( $reports_cat instanceof WP_Term ) ? $reports_cat->name : '活動報告';

$base_class     = 'info-tab inline-flex items-center px-1 pb-3 font-label-md text-label-md tracking-[0.08em] transition-colors border-b-2';
$inactive_class = 'border-transparent text-on-surface-variant hover:text-primary';
$active_class   = 'border-primary text-primary';
?>
<nav class="info-tabs flex flex-wrap items-end gap-6 md:gap-8 mt-6 mb-8 border-b border-outline-variant/40" aria-label="<?php esc_attr_e( 'INFORMATIONカテゴリー', 'oiwake-church-theme' ); ?>">
	<a
		class="<?php echo esc_attr( $base_class . ' ' . ( 'all' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $all_url ); ?>"
		<?php echo 'all' === $active_tab ? 'aria-current="page"' : ''; ?>
	>すべて</a>
	<a
		class="<?php echo esc_attr( $base_class . ' ' . ( 'news' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $news_url ); ?>"
		<?php echo 'news' === $active_tab ? 'aria-current="page"' : ''; ?>
	><?php echo esc_html( $news_label ); ?></a>
	<a
		class="<?php echo esc_attr( $base_class . ' ' . ( 'report' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $report_url ); ?>"
		<?php echo 'report' === $active_tab ? 'aria-current="page"' : ''; ?>
	><?php echo esc_html( $report_label ); ?></a>
</nav>
