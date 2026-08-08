<?php
/**
 * Single post template
 *
 * Converted from news-detail.html — news / report detail page.
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<?php while ( have_posts() ) : ?>
	<?php
	the_post();

	$categories    = get_the_category();
	$thumb_url     = oiwake_get_post_thumbnail_url( get_the_ID(), 'large' );
	$archive_url   = oiwake_get_news_archive_url();
	$archive_label = __( 'ご案内一覧に戻る', 'oiwake-church-theme' );

	$adjacent_ids = array( get_the_ID() );
	$nav_posts    = array();

	$prev_post = get_previous_post();
	$next_post = get_next_post();

	if ( $prev_post instanceof WP_Post ) {
		$nav_posts[]    = $prev_post;
		$adjacent_ids[] = (int) $prev_post->ID;
	}
	if ( $next_post instanceof WP_Post ) {
		$nav_posts[]    = $next_post;
		$adjacent_ids[] = (int) $next_post->ID;
	}

	if ( count( $nav_posts ) < 3 ) {
		$related = new WP_Query(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => 3 - count( $nav_posts ),
				'post__not_in'        => $adjacent_ids,
				'ignore_sticky_posts' => true,
				'no_found_rows'       => true,
			)
		);
		if ( $related->have_posts() ) {
			while ( $related->have_posts() ) {
				$related->the_post();
				$nav_posts[] = get_post();
			}
			wp_reset_postdata();
		}
	}
	?>
	<section class="news-detail-page" data-header-zone="light">
		<div class="px-margin-safe">
			<div class="news-detail-inner">
				<article class="stagger-in" aria-labelledby="news-detail-title">
					<header class="news-detail-head">
						<div class="news-detail-meta">
							<time class="news-detail-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.n/j' ) ); ?></time>
							<?php if ( ! empty( $categories ) ) : ?>
								<?php foreach ( $categories as $category ) : ?>
									<span class="news-detail-tag"><?php echo esc_html( $category->name ); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<h1 class="news-detail-title" id="news-detail-title"><?php the_title(); ?></h1>
					</header>
					<figure class="news-detail-hero">
						<img alt="<?php echo esc_attr( get_the_title() ); ?>" src="<?php echo esc_url( $thumb_url ); ?>" style="object-position: 50% 42%;"/>
					</figure>
					<div class="news-detail-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="news-detail-related stagger-in" aria-labelledby="news-other-heading">
		<div class="px-margin-safe">
			<div class="news-detail-related-inner">
				<p class="news-section-label">More News</p>
				<h2 class="news-section-title" id="news-other-heading">ほかのご案内</h2>
				<?php if ( ! empty( $nav_posts ) ) : ?>
					<div class="news-detail-related-grid">
						<?php foreach ( $nav_posts as $nav_post ) : ?>
							<?php
							$rel_cats = get_the_category( $nav_post->ID );
							$rel_cat  = ! empty( $rel_cats ) ? $rel_cats[0]->name : '';
							$rel_meta = get_the_date( 'Y.n/j', $nav_post );
							if ( $rel_cat ) {
								$rel_meta .= ' ・ ' . $rel_cat;
							}
							?>
							<a class="news-detail-related-card" href="<?php echo esc_url( get_permalink( $nav_post ) ); ?>">
								<p class="news-detail-related-card__meta"><?php echo esc_html( $rel_meta ); ?></p>
								<h3><?php echo esc_html( get_the_title( $nav_post ) ); ?></h3>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<div class="news-detail-back">
					<a href="<?php echo esc_url( $archive_url ); ?>" id="back-button"><span class="material-symbols-outlined" aria-hidden="true">arrow_back</span><span id="back-button-label"><?php echo esc_html( $archive_label ); ?></span></a>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
</main>
<?php
get_footer();
