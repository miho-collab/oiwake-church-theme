<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          "colors": {
            "on-tertiary-container": "#b8b7b2",
            "surface-tint": "#546254",
            "on-secondary": "#ffffff",
            "surface-bright": "#faf9f6",
            "primary-fixed-dim": "#bbcbba",
            "tertiary-container": "#484845",
            "on-primary": "#ffffff",
            "on-secondary-container": "#696255",
            "inverse-primary": "#bbcbba",
            "on-primary-container": "#abbaaa",
            "on-primary-fixed-variant": "#3c4a3d",
            "secondary-fixed-dim": "#cfc5b6",
            "primary-fixed": "#d7e7d5",
            "error": "#ba1a1a",
            "surface": "#faf9f6",
            "surface-container-low": "#f4f3f0",
            "on-secondary-fixed": "#201b12",
            "on-primary-fixed": "#121e14",
            "tertiary": "#31322e",
            "outline": "#747872",
            "primary-container": "#3d4b3e",
            "on-background": "#1a1c1a",
            "tertiary-fixed-dim": "#c8c6c2",
            "primary": "#273428",
            "inverse-surface": "#2f312f",
            "secondary": "#655d51",
            "surface-container-lowest": "#ffffff",
            "surface-container": "#efeeeb",
            "background": "#faf9f6",
            "surface-dim": "#dbdad7",
            "secondary-container": "#e9decf",
            "on-surface-variant": "#434843",
            "inverse-on-surface": "#f2f1ee",
            "on-error-container": "#93000a",
            "on-tertiary": "#ffffff",
            "surface-container-high": "#e9e8e5",
            "outline-variant": "#c4c8c1",
            "surface-container-highest": "#e3e2e0",
            "on-error": "#ffffff",
            "surface-variant": "#e3e2e0",
            "on-tertiary-fixed": "#1b1c19",
            "error-container": "#ffdad6",
            "secondary-fixed": "#ece1d2",
            "on-tertiary-fixed-variant": "#474743",
            "on-surface": "#1a1c1a",
            "on-secondary-fixed-variant": "#4c463b",
            "tertiary-fixed": "#e4e2dd"
          },
          "borderRadius": {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
          "spacing": {
            "section-gap": "128px",
            "unit": "8px",
            "margin-safe": "5vw",
            "gutter": "32px"
          },
          "fontFamily": {
            "label-md": ["Work Sans"],
            "headline-lg-mobile": ["Libre Caslon Text", "Noto Serif JP"],
            "headline-lg": ["Libre Caslon Text", "Noto Serif JP"],
            "headline-sm": ["Libre Caslon Text", "Noto Serif JP"],
            "headline-md": ["Libre Caslon Text", "Noto Serif JP"],
            "body-md": ["Work Sans"],
            "body-lg": ["Work Sans"],
            "display-lg": ["Libre Caslon Text", "Noto Serif JP"]
          },
          "fontSize": {
            "label-md": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.1em", "fontWeight": "500"}],
            "headline-lg-mobile": ["32px", {"lineHeight": "1.2", "fontWeight": "400"}],
            "headline-lg": ["40px", {"lineHeight": "1.2", "fontWeight": "400"}],
            "headline-sm": ["24px", {"lineHeight": "1.4", "fontWeight": "400"}],
            "headline-md": ["32px", {"lineHeight": "1.3", "fontWeight": "400"}],
            "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
            "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
            "display-lg": ["64px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "400"}]
          }
        },
      },
    }
  </script>
<link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&amp;family=Work+Sans:wght@300;400;500;600&amp;family=Noto+Serif+JP:wght@300;400;500&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-background text-on-surface min-h-screen flex flex-col' ); ?>>
<!-- Navigation -->
<header id="site-header" class="site-header header--solid fixed top-0 left-0 w-full z-50">
<nav class="flex flex-col w-full px-margin-safe py-6 max-w-[1440px] mx-auto">
<div class="flex justify-between items-center gap-6 md:gap-8 w-full">
<a class="header-brand-link inline-flex flex-col min-w-0 max-w-[22rem] lg:max-w-none hover:opacity-90 transition-opacity" href="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="header-brand-row">
<img
  alt=""
  class="header-brand-logo object-contain"
  height="48"
  src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png"
  width="48"
/>
<span class="header-brand-ja-line">
<span class="header-brand-ja header-brand-ja--org font-headline-sm font-medium">日本基督教団</span><span class="header-brand-ja header-brand-ja--church font-headline-sm font-medium">軽井沢追分教会</span>
</span>
</div>
<span class="header-brand-en font-body-md w-full">The United Church of Christ in Japan<br>Karuizawa Oiwake Church</span>
</a>
<?php
$oiwake_contact_url  = home_url( '/contact/' );
$oiwake_contact_page = get_page_by_path( 'contact' );
if ( $oiwake_contact_page instanceof WP_Post ) {
	$oiwake_contact_url = get_permalink( $oiwake_contact_page );
}
?>
<div class="header-nav-cluster hidden lg:flex flex-col items-end gap-3 flex-1 min-w-0">
<div class="header-cta-row">
<a class="site-nav-contact-btn header-contact-btn" href="<?php echo esc_url( $oiwake_contact_url ); ?>">
<span>CONTACT</span>
</a>
<a class="site-nav-contact-btn header-contact-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>#access-section">
<span>ACCESS</span>
</a>
</div>
<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
<?php
wp_nav_menu(
	array(
		'theme_location' => 'header-menu',
		'container'      => false,
		'menu_class'     => 'flex flex-nowrap justify-end gap-x-5 xl:gap-x-8 items-center w-full list-none m-0 p-0',
		'fallback_cb'    => false,
		'depth'          => 3,
		'walker'         => new Oiwake_Header_Nav_Walker(),
	)
);
?>
<?php else : ?>
<ul class="flex flex-nowrap justify-end gap-x-5 xl:gap-x-8 items-center w-full list-none m-0 p-0">
<li class="site-nav-item relative">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="about.html">
<span class="site-nav-ja">教会案内</span>
<span class="site-nav-en">About</span>
</a>
<ul class="nav-dropdown absolute top-full mt-4 bg-background border border-outline-variant/40 shadow-sm list-none m-0 p-0 z-50">
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/history/' ) ); ?>">追分教会のあゆみ</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/kazaganarutoki/' ) ); ?>">季刊誌『風がなるとき』</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/history/#church-magazine-archive' ) ); ?>">教会誌アーカイブ</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/pastor/' ) ); ?>">牧師紹介</a></li>
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/organ-info/' ) ); ?>">パイプオルガン</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-about' ) ); ?>">パイプオルガンの説明と図</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-trial' ) ); ?>">オルガン体験会</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-class' ) ); ?>">オルガン教室</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-column' ) ); ?>">オルガンコラム</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/wedding/' ) ); ?>">結婚式</a></li>
</ul>
</li>
<li class="site-nav-item relative">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( home_url( '/worship/' ) ); ?>">
<span class="site-nav-ja">礼拝・集会</span>
<span class="site-nav-en">Worship</span>
</a>
<ul class="nav-dropdown absolute top-full mt-4 bg-background border border-outline-variant/40 shadow-sm list-none m-0 p-0 z-50">
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/service-sunday/' ) ); ?>">主日礼拝</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#regular-service' ) ); ?>">通常礼拝</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#praise-service' ) ); ?>">特別讃美礼拝</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#first-time-guide' ) ); ?>">初めて礼拝に出席される方へ</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/childrens-church/' ) ); ?>">こどもの教会</a></li>
<li><a class="nav-dropdown-mid" href="bible-study.html">聖書を学ぶ会</a></li>
</ul>
</li>
<li class="site-nav-item relative">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( oiwake_get_information_url() ); ?>">
<span class="site-nav-ja">ご案内</span>
<span class="site-nav-en">News</span>
</a>
</li>
<li class="site-nav-item relative">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="community.html">
<span class="site-nav-ja">地域とのつながり</span>
<span class="site-nav-en">Community</span>
</a>
</li>
<li class="site-nav-item relative">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( home_url( '/' ) ); ?>#access-section">
<span class="site-nav-ja">アクセス</span>
<span class="site-nav-en">Access</span>
</a>
</li>
</ul>
<?php endif; ?>
</div>

<div class="flex lg:hidden items-center shrink-0">
<button type="button" id="mobile-nav-toggle" class="mobile-nav-toggle" aria-label="メニューを開く" aria-expanded="false" aria-controls="mobile-nav">
<span class="header-icon material-symbols-outlined mobile-nav-toggle-icon" aria-hidden="true">menu</span>
</button>
</div>
</div>
<div id="mobile-nav" class="mobile-nav-panel lg:hidden" hidden>
<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
<?php
wp_nav_menu(
	array(
		'theme_location' => 'header-menu',
		'container'      => false,
		'menu_class'     => 'mobile-nav-list',
		'fallback_cb'    => false,
		'depth'          => 3,
		'walker'         => new Oiwake_Mobile_Nav_Walker(),
	)
);
?>
<?php else : ?>
<ul class="mobile-nav-list">
<li class="mobile-nav-item">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="about.html">
<span class="site-nav-ja">教会案内</span>
<span class="site-nav-en">About</span>
</a>
<ul class="mobile-nav-dropdown list-none m-0 p-0">
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/history/' ) ); ?>">追分教会のあゆみ</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/kazaganarutoki/' ) ); ?>">季刊誌『風がなるとき』</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/history/#church-magazine-archive' ) ); ?>">教会誌アーカイブ</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/pastor/' ) ); ?>">牧師紹介</a></li>
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/organ-info/' ) ); ?>">パイプオルガン</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-about' ) ); ?>">パイプオルガンの説明と図</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-trial' ) ); ?>">オルガン体験会</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-class' ) ); ?>">オルガン教室</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/organ-info/#organ-column' ) ); ?>">オルガンコラム</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/wedding/' ) ); ?>">結婚式</a></li>
</ul>
</li>
<li class="mobile-nav-item">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( home_url( '/worship/' ) ); ?>">
<span class="site-nav-ja">礼拝・集会</span>
<span class="site-nav-en">Worship</span>
</a>
<ul class="mobile-nav-dropdown list-none m-0 p-0">
<li class="nav-dropdown-has-sub">
<a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/service-sunday/' ) ); ?>">主日礼拝</a>
<ul class="nav-dropdown-sub">
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#regular-service' ) ); ?>">通常礼拝</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#praise-service' ) ); ?>">特別讃美礼拝</a></li>
<li><a class="nav-dropdown-sub-link" href="<?php echo esc_url( home_url( '/service-sunday/#first-time-guide' ) ); ?>">初めて礼拝に出席される方へ</a></li>
</ul>
</li>
<li><a class="nav-dropdown-mid" href="<?php echo esc_url( home_url( '/childrens-church/' ) ); ?>">こどもの教会</a></li>
<li><a class="nav-dropdown-mid" href="bible-study.html">聖書を学ぶ会</a></li>
</ul>
</li>
<li class="mobile-nav-item">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( oiwake_get_information_url() ); ?>">
<span class="site-nav-ja">ご案内</span>
<span class="site-nav-en">News</span>
</a>
</li>
<li class="mobile-nav-item">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="community.html">
<span class="site-nav-ja">地域とのつながり</span>
<span class="site-nav-en">Community</span>
</a>
</li>
<li class="mobile-nav-item">
<a class="site-nav-link hover:opacity-80 transition-opacity" href="<?php echo esc_url( home_url( '/' ) ); ?>#access-section">
<span class="site-nav-ja">アクセス</span>
<span class="site-nav-en">Access</span>
</a>
</li>
</ul>
<?php endif; ?>
<div class="header-cta-row mobile-nav-cta">
<a class="site-nav-contact-btn header-contact-btn mobile-nav-contact" href="<?php echo esc_url( $oiwake_contact_url ); ?>">
<span>CONTACT</span>
</a>
<a class="site-nav-contact-btn header-contact-btn mobile-nav-contact" href="<?php echo esc_url( home_url( '/' ) ); ?>#access-section">
<span>ACCESS</span>
</a>
</div>
</div>
</nav>
</header>
