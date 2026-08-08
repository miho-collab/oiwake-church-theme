<?php
/**
 * News / report card partial.
 *
 * @package Oiwake_Church_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args            = ( isset( $args ) && is_array( $args ) ) ? $args : array();
$variant         = isset( $args['variant'] ) ? $args['variant'] : 'grid';
$delay_ms        = isset( $args['delay_ms'] ) ? (int) $args['delay_ms'] : 0;
$object_position = isset( $args['object_position'] ) ? $args['object_position'] : '50% center';
$show_categories = ! isset( $args['show_categories'] ) || (bool) $args['show_categories'];
$show_badge      = ! isset( $args['show_badge'] ) || (bool) $args['show_badge'];
$show_thumbnail  = ! isset( $args['show_thumbnail'] ) || (bool) $args['show_thumbnail'];
$show_excerpt    = isset( $args['show_excerpt'] ) && (bool) $args['show_excerpt'];

$card_class = 'news-card stagger-in';
if ( 'list' === $variant ) {
	$card_class .= ' news-card--list';
}
if ( ! $show_thumbnail ) {
	$card_class .= ' news-card--text';
}

$style_attr = '';
if ( $delay_ms > 0 ) {
	$style_attr = ' style="transition-delay: ' . esc_attr( (string) $delay_ms ) . 'ms;"';
}

$thumb_url  = $show_thumbnail ? oiwake_get_post_thumbnail_url( get_the_ID(), 'large' ) : '';
$year       = get_the_date( 'Y.' );
$md         = get_the_date( 'n/j' );
$badge      = $show_badge ? oiwake_get_post_category_badge( get_the_ID() ) : null;
$categories = $show_categories ? get_the_category() : array();
$excerpt    = $show_excerpt ? oiwake_get_card_excerpt( get_the_ID(), 200 ) : '';
?>
<article class="<?php echo esc_attr( $card_class ); ?>"<?php echo $style_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<a class="news-card-link" href="<?php the_permalink(); ?>">
		<?php if ( $show_thumbnail ) : ?>
			<div class="news-card-thumb">
				<img alt="" src="<?php echo esc_url( $thumb_url ); ?>" style="object-position: <?php echo esc_attr( $object_position ); ?>;"/>
				<div class="news-card-date">
					<span class="news-card-date-group">
						<span class="news-card-date-bar" aria-hidden="true"></span>
						<span class="news-card-date-text">
							<span class="news-card-date-year"><?php echo esc_html( $year ); ?></span>
							<span class="news-card-date-md"><?php echo esc_html( $md ); ?></span>
						</span>
					</span>
					<?php if ( $badge ) : ?>
						<span class="<?php echo esc_attr( $badge['class'] ); ?>"><?php echo esc_html( $badge['label'] ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="news-card-content">
			<?php if ( ! $show_thumbnail ) : ?>
				<div class="news-card-date">
					<span class="news-card-date-group">
						<span class="news-card-date-bar" aria-hidden="true"></span>
						<span class="news-card-date-text">
							<span class="news-card-date-year"><?php echo esc_html( $year ); ?></span>
							<span class="news-card-date-md"><?php echo esc_html( $md ); ?></span>
						</span>
					</span>
					<?php if ( $badge ) : ?>
						<span class="<?php echo esc_attr( $badge['class'] ); ?>"><?php echo esc_html( $badge['label'] ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $categories ) ) : ?>
				<div class="news-card-tags">
					<?php foreach ( $categories as $category ) : ?>
						<?php
						$tag_class = 'news-card-tag';
						if ( oiwake_is_news_category_term( $category ) ) {
							$tag_class = 'news-card-tag news-card-tag--news bg-emerald-100 text-emerald-800';
						} elseif ( oiwake_is_report_category_term( $category ) ) {
							$tag_class = 'news-card-tag news-card-tag--report bg-blue-100 text-blue-800';
						}
						?>
						<span class="<?php echo esc_attr( $tag_class ); ?>"><?php echo esc_html( $category->name ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<p class="news-card-title"><?php the_title(); ?></p>
			<?php if ( '' !== $excerpt ) : ?>
				<p class="news-card-excerpt"><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>
		</div>
		<span class="news-card-more" aria-hidden="true">
			<span class="material-symbols-outlined">chevron_right</span>
			more
		</span>
	</a>
</article>
