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

$args       = ( isset( $args ) && is_array( $args ) ) ? $args : array();
$label_en   = isset( $args['label_en'] ) ? $args['label_en'] : 'News';
$title_ja   = isset( $args['title_ja'] ) ? $args['title_ja'] : 'NEWS';
$active_tab = isset( $args['active_tab'] ) ? $args['active_tab'] : null;

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
			<p class="news-section-label"><?php echo esc_html( $label_en ); ?></p>
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
		$resolved_tab = oiwake_get_information_active_tab( $active_tab );
		$list_id      = 'news-list';
		if ( 'report' === $resolved_tab ) {
			$list_id = 'activity-report';
		}
		?>
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
	</div>
</section>
</main>
