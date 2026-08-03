<?php
/**
 * Front page template
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$news_category    = oiwake_get_news_category();
$reports_category = oiwake_get_reports_category();

$news_args = oiwake_get_posts_query_args( $news_category, 6 );
if ( ! ( $news_category instanceof WP_Term ) && $reports_category instanceof WP_Term ) {
	$news_args['category__not_in'] = array( (int) $reports_category->term_id );
}
$news_query = new WP_Query( $news_args );

$reports_query = null;
if ( $reports_category instanceof WP_Term ) {
	$reports_query = new WP_Query( oiwake_get_posts_query_args( $reports_category, 6 ) );
}

$object_positions = array(
	'40% center',
	'65% 40%',
	'center 60%',
	'30% 70%',
	'55% 30%',
	'75% center',
);
?>
<main class="flex-1 w-full">
<!-- Hero Section -->
<section id="hero-section" data-header-zone="light" class="w-full bg-white">
<div class="max-w-[1440px] mx-auto px-margin-safe">
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-start">
<div class="md:col-span-12 stagger-in" id="hero-headline">
<h1 class="hero-title font-display-lg text-primary" style="margin-bottom: 1rem;">
            主日礼拝は毎週日曜日午後2:30から行っています。<br/>
            信者に限らずどなたでもご参加いただけます。<br/>
            どうぞお気軽にお立ち寄りください。
</h1>

<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            Sunday services are held every Sunday at 2:30 PM. All are welcome to join us, regardless of faith. Please feel free to visit.
          </p>
</div>
</div>
</div>
</section>
<!-- Full Width Forest Image -->
<section id="top-image-section" data-header-zone="image" class="w-full relative overflow-hidden">
<div id="top-image-layer">
<img alt="軽井沢追分教会と森" class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-1000 ease-in-out" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png"/>
<div class="absolute inset-0 bg-primary/5 pointer-events-none"></div>
</div>
<div class="absolute top-12 right-margin-safe top-image-quote text-surface text-right z-10 max-w-sm stagger-in" style="transition-delay: 200ms;">
<p class="font-label-md text-label-md uppercase tracking-widest mb-4">Established 1993</p>
<p class="font-body-md text-body-md italic leading-relaxed">
            "琴を奏でて主に感謝をささげ<br>
            十弦の琴を奏でてほめ歌をうたえ。<br>
            3新しい歌を主に向かってうたい<br>
            美しい調べと共に喜びの叫びをあげよ。"
          </p>
<p class="font-body-md text-body-md italic leading-relaxed mt-4">
            Praise the Lord with the harp;<br>
            make music to him on the ten-stringed lyre.<br>
            Sing to him a new song;<br>
            play skillfully, and shout for joy.
          </p>
</div>
<div class="absolute bottom-12 right-margin-safe text-surface text-right z-10">
<p class="font-headline-sm text-headline-sm">礼拝堂</p>
<p class="font-label-md text-label-md tracking-tighter opacity-80">Worship Hall</p>
</div>
</section>
<!-- News Section -->
<section id="news-section" class="py-section-gap px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div>
<p class="news-section-label">News</p>
<h2 class="news-section-title">お知らせ</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 news-grid">
<?php if ( $news_query->have_posts() ) : ?>
	<?php
	$index = 0;
	while ( $news_query->have_posts() ) :
		$news_query->the_post();
		get_template_part(
			'template-parts/content',
			'news-card',
			array(
				'variant'         => 'grid',
				'delay_ms'        => $index * 80,
				'object_position' => $object_positions[ $index % count( $object_positions ) ],
			)
		);
		++$index;
	endwhile;
	wp_reset_postdata();
	?>
<?php else : ?>
	<p class="font-body-md text-body-md text-on-surface-variant col-span-full">現在お知らせはありません。</p>
<?php endif; ?>
</div>
</div>
</section>
<?php if ( $reports_query instanceof WP_Query && $reports_query->have_posts() ) : ?>
<!-- Reports Section -->
<section id="reports-section" class="py-section-gap px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div>
<p class="news-section-label">Reports</p>
<h2 class="news-section-title">レポート</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 news-grid">
	<?php
	$index = 0;
	while ( $reports_query->have_posts() ) :
		$reports_query->the_post();
		get_template_part(
			'template-parts/content',
			'news-card',
			array(
				'variant'         => 'grid',
				'delay_ms'        => $index * 80,
				'object_position' => $object_positions[ $index % count( $object_positions ) ],
			)
		);
		++$index;
	endwhile;
	wp_reset_postdata();
	?>
</div>
</div>
</section>
<?php endif; ?>
<!-- Services Grid -->
<section id="services-section" class="py-section-gap bg-surface-container-low px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="mb-16">
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mb-4">Our Services</p>
<h2 class="font-headline-lg text-headline-lg text-primary">集会案内</h2>
</div>
<div id="services-cards" class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-6 items-stretch">
<div class="service-card-wrap group stagger-in" data-service-card-half>
<div class="service-card bg-surface border border-outline-variant p-8 flex flex-col transition-colors group-hover:bg-primary-container group-hover:border-primary-container">
<div class="service-card-header">
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">聖日礼拝</h3>
<p class="font-label-md text-label-md text-secondary group-hover:text-on-primary-container mt-1">Worship &amp; Meetings</p>
</div>
<p class="service-card-body font-body-md text-body-md text-on-surface-variant group-hover:text-surface-container">
                毎週日曜日午後2:30から行っています。
              </p>
</div>
</div>
<div class="service-card-wrap group stagger-in" data-service-card-half style="transition-delay: 200ms;">
<div class="service-card bg-surface border border-outline-variant p-8 flex flex-col transition-colors group-hover:bg-primary-container group-hover:border-primary-container">
<div class="service-card-header">
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">聖書を学ぶ会</h3>
<p class="font-label-md text-label-md text-secondary group-hover:text-on-primary-container mt-1">Bible Study</p>
</div>
<p class="service-card-body font-body-md text-body-md text-on-surface-variant group-hover:text-surface-container">
                毎週金曜日午後1:30から行っています。
              </p>
</div>
</div>
<div id="service-card-first-wrap" class="service-card-wrap md:row-span-2 group stagger-in" style="transition-delay: 400ms;">
<div class="service-card bg-surface border border-outline-variant p-8 flex flex-col transition-colors group-hover:bg-primary-container group-hover:border-primary-container">
<div class="service-card-header">
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">初めての方へ</h3>
<p class="font-label-md text-label-md text-secondary group-hover:text-on-primary-container mt-1">For First-Time Visitors</p>
</div>
<p class="service-card-body font-body-md text-body-md text-on-surface-variant group-hover:text-surface-container">
                教会に行くのが初めての方、家の宗教が違う方、どなたでも歓迎いたします。<br/>
                すべての人に開かれているのが教会です。<br/>
                「パイプオルガンの音に癒されたい」「教会の中を見てみたい」「聖書に興味がある」など、どんな理由でも歓迎いたします。<br>どうぞ気軽にお越しください。
              </p>
</div>
</div>
<div class="service-card-wrap group stagger-in" data-service-card-half style="transition-delay: 100ms;">
<div class="service-card bg-surface border border-outline-variant p-8 flex flex-col transition-colors group-hover:bg-primary-container group-hover:border-primary-container">
<div class="service-card-header">
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">特別讃美礼拝</h3>
<p class="font-label-md text-label-md text-secondary group-hover:text-on-primary-container mt-1">Special Praise Worship</p>
</div>
<p class="service-card-body font-body-md text-body-md text-on-surface-variant group-hover:text-surface-container">
<a class="inline-flex items-center gap-1 hover:opacity-70 transition-opacity group-hover:text-surface-container" href="<?php echo esc_url( get_template_directory_uri() ); ?>/docs/20260419_4.pdf" rel="noopener noreferrer" target="_blank">特別讃美礼拝のご案内はこちらから →</a>
              </p>
</div>
</div>
<div id="service-card-wedding-wrap" class="service-card-wrap group stagger-in" data-service-card-half style="transition-delay: 300ms;">
<div class="service-card bg-surface border border-outline-variant p-8 flex flex-col transition-colors group-hover:bg-primary-container group-hover:border-primary-container">
<div class="service-card-header">
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">結婚式</h3>
<p class="font-label-md text-label-md text-secondary group-hover:text-on-primary-container mt-1">Weddings</p>
</div>
<p class="service-card-body font-body-md text-body-md text-on-surface-variant group-hover:text-surface-container">
                当教会で結婚式を挙げられる方には、信者かどうかを問わず、キリスト教講座の受講と礼拝への出席をお願いしています。
              </p>
</div>
</div>
</div>
</div>
</section>
<!-- Location / Map Section -->
<section id="access-section" class="py-section-gap px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="mb-16">
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mb-4">Access</p>
<h2 class="font-headline-lg text-headline-lg text-primary">アクセス</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-start">
<div class="md:col-span-4 space-y-10 stagger-in">
<div>
<p class="font-headline-sm text-headline-sm text-primary">住所</p>
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mt-1 mb-3">Address</p>
<p class="font-body-md text-body-md text-on-surface-variant">〒389-0115 長野県北佐久郡軽井沢町追分51-37</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">TEL: 0267-46-3312</p>
<p class="font-body-md text-body-md text-on-surface-variant">Mail: <a class="hover:opacity-70 transition-opacity underline-offset-2 hover:underline" href="mailto:info@oiwake-church.com">info@oiwake-church.com</a></p>
</div>
<div>
<p class="font-headline-sm text-headline-sm text-primary">駐車場</p>
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mt-1 mb-3">Parking</p>
<img alt="軽井沢追分教会の駐車場" class="w-full h-auto object-cover" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/parking.jpg"/>
</div>
</div>
<div class="md:col-span-8 stagger-in" style="transition-delay: 200ms;">
<div class="aspect-video bg-surface-container-highest overflow-hidden relative">
<iframe
  allowfullscreen=""
  class="absolute inset-0 w-full h-full border-0"
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade"
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.2108691639655!2d138.5304268!3d36.331438899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601dcdc51716f0df%3A0x5adef885fe2860b5!2z6Lu95LqV5rKi6L-95YiG5pWZ5Lya!5e0!3m2!1sja!2sjp!4v1781130118535!5m2!1sja!2sjp"
  title="日本基督教団 軽井沢追分教会の地図"
></iframe>
</div>
</div>
</div>
</div>
</section>
</main>
<?php
get_footer();
