<?php
/**
 * Front page template
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$home_news_posts   = oiwake_get_information_schedule_posts( 'news' )['upcoming'];
$home_report_posts = oiwake_get_home_report_posts();

$home_card_args = array(
	'variant'          => 'grid',
	'show_thumbnail'   => false,
	'show_excerpt'     => true,
	'show_categories'  => false,
	'show_badge'       => false,
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
<!-- Hero images (slow crossfade) -->
<?php
$theme_uri   = get_template_directory_uri();
$hero_slides = array(
	array(
		'src' => $theme_uri . '/images/oiwake_top.webp',
		'alt' => '緑に囲まれた軽井沢追分教会の外観',
		'ja'  => '礼拝堂',
		'en'  => 'Worship Hall',
	),
	array(
		'src' => $theme_uri . '/images/oiwake_top_organ.webp',
		'alt' => '軽井沢追分教会のパイプオルガン',
		'ja'  => 'パイプオルガン',
		'en'  => 'Pipe Organ',
	),
	array(
		'src' => $theme_uri . '/images/oiwake_top_autumn.webp',
		'alt' => '紅葉に彩られた軽井沢追分教会',
		'ja'  => '秋の追分',
		'en'  => 'Autumn at Oiwake',
	),
	array(
		'src' => $theme_uri . '/images/oiwake_top_christmas.webp',
		'alt' => 'クリスマスの礼拝の様子',
		'ja'  => 'クリスマス礼拝',
		'en'  => 'Christmas Worship',
	),
	array(
		'src' => $theme_uri . '/images/oiwake_top_wedding.webp',
		'alt' => '軽井沢追分教会での結婚式',
		'ja'  => '結婚式',
		'en'  => 'Weddings',
	),
);
?>
<section id="top-image-section" class="scroll-hero" data-header-zone="image" aria-label="メインビジュアル">
	<div class="scroll-hero-media" aria-hidden="true">
		<div class="scroll-hero-track">
			<?php foreach ( $hero_slides as $index => $slide ) : ?>
			<div class="scroll-hero-slide<?php echo 0 === $index ? ' is-active' : ''; ?>" data-slide="<?php echo (int) $index; ?>">
				<img
					alt="<?php echo esc_attr( $slide['alt'] ); ?>"
					class="scroll-hero-image"
					decoding="async"
					src="<?php echo esc_url( $slide['src'] ); ?>"
				/>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="scroll-hero-overlay"></div>
	</div>
	<div class="absolute right-margin-safe top-image-quote text-surface text-right z-10">

		<p class="font-body-md text-body-md italic leading-relaxed">
			"全地よ、主に向かって喜びの叫びをあげよ。<br>
			喜び祝い、主に仕え喜び歌って御前に進み出よ。"
		</p>
		<p class="top-image-quote-cite mb-4">詩編 100:1~2</p>
		<p class="font-body-md text-body-md italic leading-relaxed mt-4">
			Shout for joy to the Lord,<br>
			all the earth.<br>
			Worship the Lord with gladness;<br>
			come before him with joyful songs.
		</p>
		<p class="top-image-quote-cite mb-4">Psalm 100:1~2</p>
	</div>
	<div class="scroll-hero-dots" role="group" aria-label="表示する写真">
		<?php foreach ( $hero_slides as $index => $slide ) : ?>
		<button
			type="button"
			class="scroll-hero-dot<?php echo 0 === $index ? ' is-active' : ''; ?>"
			data-hero-dot="<?php echo (int) $index; ?>"
			aria-label="<?php echo esc_attr( $slide['ja'] ); ?>"
			<?php echo 0 === $index ? 'aria-current="true"' : ''; ?>
		></button>
		<?php endforeach; ?>
	</div>
	<div class="scroll-hero-captions">
		<?php foreach ( $hero_slides as $index => $slide ) : ?>
		<div class="scroll-hero-caption<?php echo 0 === $index ? ' is-active' : ''; ?>" data-caption="<?php echo (int) $index; ?>">
			<p class="scroll-hero-caption-ja font-headline-sm text-headline-sm"><?php echo esc_html( $slide['ja'] ); ?></p>
			<p class="scroll-hero-caption-en font-label-md text-label-md tracking-tighter opacity-80"><?php echo esc_html( $slide['en'] ); ?></p>
		</div>
		<?php endforeach; ?>
	</div>
</section>
<!-- Information Section -->
<section id="information-section" class="py-section-gap px-margin-safe">
<div class="info-home max-w-[1440px] mx-auto">
	<div id="news-section" class="info-home-block">
		<div class="info-home-heading stagger-in">
			<a class="info-home-heading-link" href="<?php echo esc_url( oiwake_get_information_tab_url( 'news' ) ); ?>">
				<h2 class="info-home-heading-title">ご案内</h2>
			</a>
		</div>
		<div class="info-home-cards">
		<?php if ( ! empty( $home_news_posts ) ) : ?>
			<?php
			global $post;
			$index = 0;
			foreach ( $home_news_posts as $post ) :
				setup_postdata( $post );
				get_template_part(
					'template-parts/content',
					'news-card',
					array_merge(
						$home_card_args,
						array(
							'delay_ms' => $index * 80,
						)
					)
				);
				++$index;
			endforeach;
			wp_reset_postdata();
			?>
		<?php else : ?>
			<p class="font-body-md text-body-md text-on-surface-variant">現在ご案内はありません。</p>
		<?php endif; ?>
		</div>
	</div>

	<?php if ( ! empty( $home_report_posts ) ) : ?>
	<div id="reports-section" class="info-home-block">
		<div class="info-home-heading stagger-in">
			<a class="info-home-heading-link" href="<?php echo esc_url( oiwake_get_information_tab_url( 'report' ) ); ?>">
				<h2 class="info-home-heading-title">活動報告</h2>
			</a>
		</div>
		<div class="info-home-cards">
			<?php
			global $post;
			$index = 0;
			foreach ( $home_report_posts as $post ) :
				setup_postdata( $post );
				get_template_part(
					'template-parts/content',
					'news-card',
					array_merge(
						$home_card_args,
						array(
							'delay_ms' => $index * 80,
						)
					)
				);
				++$index;
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php endif; ?>
</div>
</section>
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
<h3 class="font-headline-sm text-headline-sm text-primary group-hover:text-surface">初めて礼拝に出席される方へ</h3>
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
<div class="mb-10 md:mb-12">
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mb-4">Access</p>
<h2 class="font-headline-lg text-headline-lg text-primary">アクセス</h2>
</div>
<div class="access-layout">
<div class="access-copy stagger-in">
<div>
<p class="font-body-md text-body-md text-on-surface-variant">〒389-0115 長野県北佐久郡軽井沢町追分51-37</p>
<p class="font-body-md text-body-md text-on-surface-variant mt-2">TEL: 0267-46-3312</p>
</div>
<div class="access-guide">
<h3 class="access-guide-title">交通アクセスと駐車場のご案内</h3>
<p>当教会へは車、または電車・タクシーをご利用ください。</p>
<p>車： 上信越自動車道「佐久平スマートIC」または「佐久IC」より約15分</p>
<p>電車： JR北陸新幹線「軽井沢駅」乗り換え、しなの鉄道「御代田駅」よりタクシーで約6分</p>
<p>高速バス：池袋、新宿他、各地より軽井沢方面への高速バスが運行</p>
<p>駐車場： 20〜30台
<!--
<p class="access-guide-note">※特別讃美礼拝等イベントの際には、混雑が予想されます。</p>
<p class="access-guide-note">※特別讃美礼拝等の際には、開始30分前より案内係が駐車誘導を行います。</p>
<p class="access-guide-note">※駐車スペースに限りがございますので、できる限りお乗り合わせの上お越しいただけますようご協力をお願い申し上げます。</p>
-->
</div>
<img alt="軽井沢追分教会の駐車場" class="access-parking-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/parking.jpg"/>
</div>
<div class="access-map stagger-in" style="transition-delay: 200ms;">
<div class="access-map-frame bg-surface-container-highest overflow-hidden relative">
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
