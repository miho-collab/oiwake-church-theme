<!-- Footer -->
<footer id="site-footer" class="site-footer bg-surface-container border-t border-outline-variant shrink-0 w-full mt-auto">
<div class="footer-inner px-margin-safe">
<div class="footer-layout">

<div class="footer-brand-column">
<a class="header-brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="header-brand-row">
<img
  alt=""
  class="header-brand-logo object-contain"
  height="48"
  src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png"
  width="48"
/>
<span class="header-brand-ja-line">
<span class="header-brand-ja header-brand-ja--org font-headline-sm font-medium text-primary">日本基督教団</span><span class="header-brand-ja header-brand-ja--church font-headline-sm font-medium text-primary">軽井沢追分教会</span>
</span>
</div>
<span class="header-brand-en font-body-md text-on-surface-variant">The United Church of Christ in Japan<br>Karuizawa Oiwake Church</span>
</a>
<div class="footer-detail-block">
<p>牧師：稲垣 壬午</p>
<p>〒389-0115 長野県北佐久郡軽井沢町追分51-37</p>
<p>TEL: 0267-46-3312</p>
<p>郵便振替：00100-0-123456</p>
</div>
<div class="footer-brand-actions">
<a class="header-contact-btn footer-action-contact group inline-flex items-center gap-2 font-label-md text-label-md uppercase tracking-[0.12em] border transition-all duration-300" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
<span>Contact</span>
<span class="material-symbols-outlined text-[16px] transition-transform group-hover:translate-x-1">arrow_forward</span>
</a>
<a class="footer-action-link" href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>
<div class="footer-follow-block flex items-center gap-5">
<a class="hover:opacity-70 transition-opacity" href="https://www.instagram.com/oiwakechurch/" rel="noopener noreferrer" target="_blank" aria-label="Instagram">
<img alt="Instagram" class="footer-social-icon w-10 h-10 shrink-0" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/instagram.svg"/>
</a>
<a class="hover:opacity-70 transition-opacity" href="https://x.com/oiwakechurch" rel="noopener noreferrer" target="_blank" aria-label="X">
<img alt="X" class="footer-social-icon w-10 h-10 shrink-0" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/x.svg"/>
</a>
</div>
</div>
</div>

<nav class="footer-sitemap" aria-label="サイトマップ">
<button
  type="button"
  class="footer-sitemap-toggle"
  id="footer-sitemap-toggle"
  aria-expanded="false"
  aria-controls="footer-sitemap-panel"
>
  <span class="footer-sitemap-toggle-label">Site Map</span>
  <span class="material-symbols-outlined footer-sitemap-toggle-icon" aria-hidden="true">expand_more</span>
</button>
<div class="footer-sitemap-panel" id="footer-sitemap-panel" hidden>
<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
<?php
wp_nav_menu(
	array(
		'theme_location' => 'footer-menu',
		'container'      => false,
		'menu_class'     => 'footer-sitemap-menu',
		'fallback_cb'    => false,
		'depth'          => 3,
		'walker'         => new Oiwake_Footer_Nav_Walker(),
	)
);
?>
<?php else : ?>
<ul class="footer-sitemap-menu">
<li class="footer-sitemap-col">
<ul class="footer-sitemap-col-list">
<li class="footer-sitemap-item footer-sitemap-item--has-children">
<div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">教会案内</a></div>
<ul class="sitemap-list">
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/history/' ) ); ?>">追分教会のあゆみ</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/pastor/' ) ); ?>">牧師紹介</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/organ-info/' ) ); ?>">パイプオルガン</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/wedding/' ) ); ?>">結婚式</a></li>
</ul>
</li>
</ul>
</li>
<li class="footer-sitemap-col">
<ul class="footer-sitemap-col-list">
<li class="footer-sitemap-item footer-sitemap-item--has-children">
<div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( home_url( '/worship/' ) ); ?>">礼拝・集会</a></div>
<ul class="sitemap-list">
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/service-sunday/' ) ); ?>">主日礼拝</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/childrens-church/' ) ); ?>">こどもの教会</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( home_url( '/bible-study/' ) ); ?>">聖書を学ぶ会</a></li>
</ul>
</li>
</ul>
</li>
<li class="footer-sitemap-col">
<ul class="footer-sitemap-col-list">
<li class="footer-sitemap-item footer-sitemap-item--has-children">
<div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( oiwake_get_information_url() ); ?>">お知らせ</a></div>
<ul class="sitemap-list">
<li><a class="sitemap-md" href="<?php echo esc_url( oiwake_get_information_tab_url( 'news' ) ); ?>">ご案内</a></li>
<li><a class="sitemap-md" href="<?php echo esc_url( oiwake_get_information_tab_url( 'report' ) ); ?>">活動報告</a></li>
</ul>
</li>
<li class="footer-sitemap-item"><div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( home_url( '/community/' ) ); ?>">地域とのつながり</a></div></li>
<li class="footer-sitemap-item"><div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( home_url( '/' ) ); ?>#access-section">アクセス</a></div></li>
<li class="footer-sitemap-item"><div class="footer-sitemap-heading"><a class="sitemap-lg footer-sitemap-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a></div></li>
</ul>
</li>
</ul>
<?php endif; ?>
</div>
</nav>

</div>
<div class="footer-copyright">
<p class="text-label-md font-label-md text-on-tertiary-container opacity-60">
        © Karuizawa Oiwake Church. All Rights Reserved.
      </p>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
