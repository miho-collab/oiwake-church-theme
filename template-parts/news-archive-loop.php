<?php
/**
 * INFORMATION archive list loop.
 *
 * @package Oiwake_Church_Theme
 *
 * @var string $label_en Optional English label.
 * @var string $title_ja Optional Japanese title.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args        = ( isset( $args ) && is_array( $args ) ) ? $args : array();
$label_en    = isset( $args['label_en'] ) ? $args['label_en'] : 'News';
$title_ja    = isset( $args['title_ja'] ) ? $args['title_ja'] : 'NEWS';
$active_tab     = isset( $args['active_tab'] ) ? $args['active_tab'] : null;
$resolved_tab   = oiwake_get_information_active_tab( $active_tab );
$split_schedule = ! empty( $args['split_schedule'] ) && in_array( $resolved_tab, array( 'all', 'news' ), true );
$show_label     = true;

if ( 'news' === $resolved_tab ) {
	$title_ja   = 'ご案内';
	$show_label = false;
} elseif ( 'report' === $resolved_tab ) {
	$title_ja   = '活動報告';
	$show_label = false;
} elseif ( 'all' === $resolved_tab ) {
	$show_label = false;
}

$object_positions = array(
	'40% center',
	'65% 40%',
	'center 60%',
	'30% 70%',
	'55% 30%',
	'75% center',
	'20% center',
	'50% 50%',
	'60% 35%',
	'35% 55%',
);
?>
<main class="flex-1 w-full">
<section class="news-page-section px-margin-safe" data-header-zone="light">
	<div class="max-w-[1440px] mx-auto">
		<div class="stagger-in">
			<?php if ( $show_label ) : ?>
				<p class="news-section-label"><?php echo esc_html( $label_en ); ?></p>
			<?php endif; ?>
			<h1 class="news-section-title"><?php echo esc_html( $title_ja ); ?></h1>
			<?php
			get_template_part(
				'template-parts/information',
				'tabs',
				array(
					'active_tab' => $active_tab,
				)
			);
			?>
		</div>
		<?php
		$list_id = 'news-list';
		if ( 'report' === $resolved_tab ) {
			$list_id = 'activity-report';
		}
		?>
		<?php
		$render_news_cards = function ( $posts ) use ( $object_positions ) {
			global $post;
			$index = 0;
			foreach ( $posts as $post ) {
				setup_postdata( $post );
				get_template_part(
					'template-parts/content',
					'news-card',
					array(
						'variant'         => 'list',
						'delay_ms'        => $index * 60,
						'object_position' => $object_positions[ $index % count( $object_positions ) ],
						'show_categories' => false,
						'show_badge'      => false,
					)
				);
				++$index;
			}
			wp_reset_postdata();
		};
		?>
		<?php if ( $split_schedule ) : ?>
			<?php
			$upcoming_which = ( 'news' === $resolved_tab ) ? 'news' : 'all';
			$schedule       = oiwake_get_information_schedule_posts( $upcoming_which );
			$past_source    = ( 'news' === $resolved_tab ) ? $schedule['past'] : oiwake_get_information_schedule_posts( 'news' )['past'];
			$past_page     = isset( $_GET['past'] ) ? max( 1, absint( wp_unslash( $_GET['past'] ) ) ) : 1; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$past_pages    = oiwake_past_information_page_count( count( $past_source ) );
			if ( $past_pages > 0 ) {
				$past_page = min( $past_page, $past_pages );
			}
			$past_posts = oiwake_past_information_page_posts( $past_source, $past_page );
			?>
			<div class="news-list" id="<?php echo esc_attr( $list_id ); ?>">
				<?php if ( ! empty( $schedule['upcoming'] ) ) : ?>
					<?php $render_news_cards( $schedule['upcoming'] ); ?>
				<?php else : ?>
					<p class="font-body-md text-body-md text-on-surface-variant">今日以降のご案内はありません。</p>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $past_source ) ) : ?>
				<div class="news-past-section" id="past-news">
					<h2 class="news-section-title">過去のご案内</h2>
					<div class="news-list">
						<?php $render_news_cards( $past_posts ); ?>
					</div>
					<?php
					oiwake_render_news_pagination(
						$past_page,
						$past_pages,
						function ( $page ) use ( $resolved_tab ) {
							return oiwake_past_information_page_url( $page, $resolved_tab );
						}
					);
					?>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="news-list" id="<?php echo esc_attr( $list_id ); ?>">
				<?php if ( have_posts() ) : ?>
					<?php
					$index = 0;
					while ( have_posts() ) :
						the_post();
						get_template_part(
							'template-parts/content',
							'news-card',
							array(
								'variant'         => 'list',
								'delay_ms'        => $index * 60,
								'object_position' => $object_positions[ $index % count( $object_positions ) ],
								'show_categories' => false,
								'show_badge'      => false,
							)
						);
						++$index;
					endwhile;
					?>
				<?php else : ?>
					<p class="font-body-md text-body-md text-on-surface-variant">記事が見つかりませんでした。</p>
				<?php endif; ?>
			</div>
			<?php oiwake_the_posts_pagination(); ?>
		<?php endif; ?>
	</div>
</section>
</main>
