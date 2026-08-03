<?php
/**
 * Page template
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<section class="news-page-section px-margin-safe" data-header-zone="light">
		<div class="max-w-[1440px] mx-auto">
			<div class="stagger-in">
				<p class="news-section-label">Page</p>
				<h1 class="news-section-title"><?php the_title(); ?></h1>
			</div>
			<div class="page-content news-detail-content stagger-in">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>
</main>
<?php
get_footer();
