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
$news_label   = 'ご案内';
$report_label = '活動報告';

$tab_class      = 'info-tab inline-flex items-center px-1 pb-3 font-label-md text-label-md tracking-[0.08em] transition-colors border-b-2 text-on-surface-variant hover:text-primary outline-none focus:outline-none focus-visible:outline-none';
$active_class   = 'border-primary';
$inactive_class = 'border-transparent';
?>
<nav class="info-tabs flex flex-wrap items-end gap-6 md:gap-8 mt-6 mb-8 border-b border-outline-variant/40" aria-label="<?php esc_attr_e( 'NEWSカテゴリー', 'oiwake-church-theme' ); ?>" data-news-tabs>
	<a
		class="<?php echo esc_attr( $tab_class . ' ' . ( 'all' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $all_url ); ?>"
		data-info-tab="all"
		<?php echo 'all' === $active_tab ? 'aria-current="page"' : ''; ?>
	>すべて</a>
	<a
		id="news-info"
		class="<?php echo esc_attr( $tab_class . ' ' . ( 'news' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $news_url ); ?>"
		data-info-tab="news"
		<?php echo 'news' === $active_tab ? 'aria-current="page"' : ''; ?>
	><?php echo esc_html( $news_label ); ?></a>
	<a
		id="news-report"
		class="<?php echo esc_attr( $tab_class . ' ' . ( 'report' === $active_tab ? $active_class : $inactive_class ) ); ?>"
		href="<?php echo esc_url( $report_url ); ?>"
		data-info-tab="report"
		<?php echo 'report' === $active_tab ? 'aria-current="page"' : ''; ?>
	><?php echo esc_html( $report_label ); ?></a>
</nav>
