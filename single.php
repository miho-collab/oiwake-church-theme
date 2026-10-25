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

	$categories = get_the_category();
	$is_news    = oiwake_is_announcement();
	$is_report  = oiwake_is_activity_report();

	if ( $is_report ) {
		$archive_url   = oiwake_get_information_tab_url( 'report' );
		$archive_label = '活動報告一覧へ';
	} else {
		$archive_url   = oiwake_get_information_tab_url( 'news' );
		$archive_label = 'ご案内一覧へ';
	}

	$title_field = $is_report ? 'report_title' : 'info_title';
	$desc_field  = $is_report ? 'report_body' : 'info_desc';
	$info_title  = function_exists( 'get_field' ) ? get_field( $title_field ) : '';
	$info_title  = is_string( $info_title ) ? trim( $info_title ) : '';
	$page_title  = '' !== $info_title ? $info_title : get_the_title();

	$info_desc = function_exists( 'get_field' ) ? get_field( $desc_field ) : '';
	$info_desc = is_string( $info_desc ) ? trim( $info_desc ) : '';

	$flyers = array();
	if ( $is_news && function_exists( 'get_field' ) ) {
		foreach ( array( 'info_flyer_front', 'info_flyer_back' ) as $flyer_field ) {
			$flyer = get_field( $flyer_field );
			if ( is_array( $flyer ) && ! empty( $flyer['url'] ) ) {
				$flyers[] = $flyer;
			}
		}
	} elseif ( $is_report ) {
		$flyers = oiwake_get_report_images();
	}

	$reserve        = ( $is_news && function_exists( 'get_field' ) ) ? get_field( 'reserve_url' ) : null;
	$reserve_url    = '';
	$reserve_target = '';
	if ( is_array( $reserve ) && ! empty( $reserve['url'] ) ) {
		$reserve_url = $reserve['url'];
		if ( ! empty( $reserve['target'] ) ) {
			$reserve_target = $reserve['target'];
		}
	} elseif ( is_string( $reserve ) && '' !== trim( $reserve ) ) {
		$reserve_url = trim( $reserve );
	}

	$nav_posts = array();
	if ( $is_news ) {
		$schedule = oiwake_get_information_schedule_posts( 'news' );
		foreach ( $schedule['upcoming'] as $upcoming_post ) {
			if ( (int) $upcoming_post->ID === (int) get_the_ID() ) {
				continue;
			}
			$nav_posts[] = $upcoming_post;
			if ( count( $nav_posts ) >= 3 ) {
				break;
			}
		}
	}
	?>
	<section class="news-detail-page" data-header-zone="light">
		<div class="px-margin-safe">
			<div class="news-detail-inner">
				<article class="stagger-in" aria-labelledby="news-detail-title">
					<header class="news-detail-head">
						<?php
						$event_date    = oiwake_get_display_date_parts( get_the_ID(), true );
						$has_event_time = oiwake_get_info_datetime( get_the_ID() ) instanceof DateTime;
						?>
						<time class="news-detail-when" datetime="<?php echo esc_attr( $event_date['attr'] ); ?>">
							<span class="news-detail-when-date"><?php echo esc_html( $event_date['year'] . ' ' . $event_date['md'] ); ?></span>
							<?php if ( $has_event_time ) : ?>
								<span class="news-detail-when-time"><?php echo esc_html( $event_date['time'] ); ?></span>
							<?php endif; ?>
						</time>
						<div class="news-detail-meta">
							<?php if ( ! empty( $categories ) ) : ?>
								<?php foreach ( $categories as $category ) : ?>
									<span class="news-detail-tag"><?php echo esc_html( $category->name ); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<h1 class="news-detail-title" id="news-detail-title"><?php echo esc_html( $page_title ); ?></h1>
						<?php if ( '' !== $info_desc ) : ?>
							<div class="news-detail-desc"><?php echo wp_kses_post( wpautop( $info_desc ) ); ?></div>
						<?php endif; ?>
					</header>
					<div class="news-detail-content">
						<?php the_content(); ?>
					</div>
					<?php if ( ! empty( $flyers ) ) : ?>
						<div class="news-detail-flyers">
							<?php foreach ( $flyers as $flyer ) : ?>
								<?php
								$flyer_src = ! empty( $flyer['sizes']['large'] ) ? $flyer['sizes']['large'] : $flyer['url'];
								$flyer_alt = isset( $flyer['alt'] ) ? $flyer['alt'] : '';
								?>
								<figure class="news-detail-flyer">
									<button type="button" class="news-detail-flyer-open" data-full="<?php echo esc_url( $flyer['url'] ); ?>" aria-label="<?php echo esc_attr( $is_report ? '画像を拡大表示' : 'チラシを拡大表示' ); ?>">
										<img
											alt="<?php echo esc_attr( $flyer_alt ); ?>"
											src="<?php echo esc_url( $flyer_src ); ?>"
											<?php if ( ! empty( $flyer['width'] ) ) : ?>
												width="<?php echo esc_attr( (string) $flyer['width'] ); ?>"
											<?php endif; ?>
											<?php if ( ! empty( $flyer['height'] ) ) : ?>
												height="<?php echo esc_attr( (string) $flyer['height'] ); ?>"
											<?php endif; ?>
										/>
									</button>
								</figure>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<?php if ( '' !== $reserve_url ) : ?>
						<p class="news-detail-reserve">
							<a
								href="<?php echo esc_url( $reserve_url ); ?>"
								<?php if ( '' !== $reserve_target ) : ?>
									target="<?php echo esc_attr( $reserve_target ); ?>"
									rel="noopener noreferrer"
								<?php endif; ?>
							>お申し込みはこちらから</a>
						</p>
					<?php endif; ?>
				</article>
				<?php if ( ! empty( $flyers ) ) : ?>
					<div id="flyer-lightbox" class="gallery-lightbox" role="dialog" aria-modal="true" aria-label="<?php echo esc_attr( $is_report ? '画像の拡大表示' : 'チラシの拡大表示' ); ?>" hidden>
						<button type="button" class="gallery-lightbox__close" id="flyer-lightbox-close" aria-label="閉じる">
							<span class="material-symbols-outlined" aria-hidden="true">close</span>
						</button>
						<img alt="" class="gallery-lightbox__img flyer-lightbox__img" id="flyer-lightbox-img" src=""/>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="news-detail-related stagger-in" <?php echo ! empty( $nav_posts ) ? 'aria-labelledby="news-other-heading"' : ''; ?>>
		<div class="px-margin-safe">
			<div class="news-detail-related-inner">
				<?php if ( ! empty( $nav_posts ) ) : ?>
					<p class="news-section-label">More News</p>
					<h2 class="news-section-title" id="news-other-heading">ほかのご案内</h2>
					<div class="news-detail-related-grid">
						<?php foreach ( $nav_posts as $nav_post ) : ?>
							<?php
							$rel_cats = get_the_category( $nav_post->ID );
							$rel_cat  = ! empty( $rel_cats ) ? $rel_cats[0]->name : '';
							$rel_date = oiwake_get_display_date_parts( $nav_post->ID );
							$rel_meta = $rel_date['label'];
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
					<a href="<?php echo esc_url( $archive_url ); ?>" id="back-button" data-fixed-back="1"><span class="material-symbols-outlined" aria-hidden="true">arrow_back</span><span id="back-button-label"><?php echo esc_html( $archive_label ); ?></span></a>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>
</main>
<?php
get_footer();
