<?php
/**
 * Template Name: 地域とのつながり
 * Template for page slug: community
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$events_cat  = oiwake_get_community_events_category();
$reports_cat = oiwake_get_community_reports_category();
$paged       = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );

$events_query = null;
if ( $events_cat instanceof WP_Term ) {
	$events_query = new WP_Query(
		array(
			'post_type'           => 'announcement',
			'post_status'         => 'publish',
			'posts_per_page'      => 10,
			'cat'                 => (int) $events_cat->term_id,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
}

$reports_query = null;
if ( $reports_cat instanceof WP_Term ) {
	$reports_query = new WP_Query(
		array(
			'post_type'           => 'activity_report',
			'post_status'         => 'publish',
			'posts_per_page'      => 10,
			'paged'               => $paged,
			'cat'                 => (int) $reports_cat->term_id,
			'orderby'             => 'date',
			'order'               => 'DESC',
			'ignore_sticky_posts' => true,
		)
	);
}

$object_positions = array(
	'45% center',
	'60% 35%',
	'30% 60%',
	'55% center',
	'70% 40%',
	'40% center',
	'25% 70%',
	'65% 30%',
	'50% 50%',
	'35% 55%',
);

$card_opts = array(
	'show_categories' => false,
	'show_badge'      => false,
);
?>
<main class="flex-1 w-full">
<section class="news-page-section community-page-section px-margin-safe" data-header-zone="light">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in">
<p class="news-section-label">Community</p>
<h1 class="news-section-title">地域とのつながり</h1>
</div>
<div class="community-lead stagger-in">
<p>軽井沢追分教会は、礼拝の場であると同時に、地域の皆さまとともに歩む教会です。季節のイベントやボランティア活動を通じて、追分の森と暮らしに寄り添いながら、人と人とのつながりを大切にしています。</p>
<p>こちらのページでは、これから開催されるイベント情報や、これまでの地域活動の報告をお届けします。どうぞお気軽にご覧ください。</p>
</div>

<section class="community-block" id="event-info" aria-labelledby="community-events-heading">
<h2 class="community-block-title" id="community-events-heading">イベント情報</h2>
<div class="news-list">
<?php if ( $events_query instanceof WP_Query && $events_query->have_posts() ) : ?>
	<?php
	$index = 0;
	while ( $events_query->have_posts() ) :
		$events_query->the_post();
		get_template_part(
			'template-parts/content',
			'news-card',
			array_merge(
				$card_opts,
				array(
					'variant'         => 'list',
					'delay_ms'        => $index * 60,
					'object_position' => $object_positions[ $index % count( $object_positions ) ],
				)
			)
		);
		++$index;
	endwhile;
	wp_reset_postdata();
	?>
<?php else : ?>
	<p class="font-body-md text-body-md text-on-surface-variant">現在公開中のイベント情報はありません。</p>
<?php endif; ?>
</div>
</section>

<section class="community-block" id="activity-report" aria-labelledby="community-reports-heading">
<h2 class="community-block-title" id="community-reports-heading">活動報告</h2>
<div class="community-reports-grid">
<?php if ( $reports_query instanceof WP_Query && $reports_query->have_posts() ) : ?>
	<?php
	$index = 0;
	while ( $reports_query->have_posts() ) :
		$reports_query->the_post();
		get_template_part(
			'template-parts/content',
			'news-card',
			array_merge(
				$card_opts,
				array(
					'variant'         => 'grid',
					'delay_ms'        => $index * 50,
					'object_position' => $object_positions[ $index % count( $object_positions ) ],
				)
			)
		);
		++$index;
	endwhile;

	global $wp_query;
	$original_query = $wp_query;
	$wp_query       = $reports_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	oiwake_the_posts_pagination();
	$wp_query = $original_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	wp_reset_postdata();
	?>
<?php else : ?>
	<p class="font-body-md text-body-md text-on-surface-variant">現在公開中の活動報告はありません。</p>
<?php endif; ?>
</div>
</section>

</div>
</section>
</main>
<?php
get_footer();
