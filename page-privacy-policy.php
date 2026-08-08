<?php
/**
 * Template Name: プライバシーポリシー
 * Template for page slug: privacy-policy
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$contact_url = home_url( '/contact/' );
$contact_page = get_page_by_path( 'contact' );
if ( $contact_page instanceof WP_Post ) {
	$contact_url = get_permalink( $contact_page );
}
?>
<main class="flex-1 w-full">
<section id="privacy-policy-page" class="privacy-policy-page" data-header-zone="light">
<div class="px-margin-safe">
<div class="privacy-policy-inner mx-auto stagger-in">
<header class="privacy-policy-header">
<p class="news-section-label">Privacy Policy</p>
<h1 class="news-section-title">プライバシーポリシー（個人情報保護方針）</h1>
<p class="about-lead privacy-policy-lead">
日本基督教団 軽井沢追分教会（以下「当教会」）は、当教会のウェブサイトをご利用になる皆様の個人情報を適切に保護・管理するため、以下のとおりプライバシーポリシーを定め、運用いたします。
</p>
</header>

<div class="privacy-policy-sections">
<section class="privacy-policy-section" aria-labelledby="privacy-section-1">
<h2 id="privacy-section-1">1. 個人情報の収集・取得について</h2>
<p>当教会は、お問い合わせフォームやお申込み等を通じて、氏名、電話番号、メールアドレス等の個人情報を必要な範囲で取得することがあります。</p>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-2">
<h2 id="privacy-section-2">2. 個人情報の利用目的</h2>
<p>お預かりした個人情報は、以下の目的でのみ利用いたします。</p>
<ul>
<li>いただいたお問い合わせやご相談への回答・ご連絡</li>
<li>お申し込みいただいた行事（集会・イベント・各種プログラム）に関するご案内やご連絡</li>
<li>その他、事前にお知らせし、ご同意いただいた目的</li>
</ul>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-3">
<h2 id="privacy-section-3">3. 個人情報の第三者提供について</h2>
<p>当教会は、法令に基づく場合やご本人の同意がある場合を除き、取得した個人情報を第三者に提供・開示することはいたしません。</p>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-4">
<h2 id="privacy-section-4">4. 掲載写真等のプライバシー配慮について</h2>
<p>当教会は、行事やイベント等の様子（写真・動画等）をウェブサイトや広報物に掲載する際、参加者のプライバシーに配慮し、ご本人の同意がない限り個人が特定されないよう適切な処置（顔写真へのぼかし加工等）を行います。</p>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-5">
<h2 id="privacy-section-5">5. 個人情報の安全管理</h2>
<p>当教会は、個人情報の漏洩、紛失、改ざん等を防止するため、適切なセキュリティ対策を実施し、厳重に管理いたします。</p>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-6">
<h2 id="privacy-section-6">6. 個人情報の開示・訂正・削除について</h2>
<p>ご本人から個人情報の開示、訂正、削除等のご希望があった場合は、ご本人確認の上、速やかに対応いたします。</p>
</section>

<section class="privacy-policy-section" aria-labelledby="privacy-section-7">
<h2 id="privacy-section-7">7. お問い合わせ窓口</h2>
<p>当教会の個人情報の取り扱いに関するお問い合わせは、<a href="<?php echo esc_url( $contact_url ); ?>">お問い合わせフォーム（CONTACT）</a>よりご連絡ください。</p>
</section>
</div>

<footer class="privacy-policy-footer">
<p class="privacy-policy-date">【制定日】2026年8月6日</p>
<p class="privacy-policy-org">日本基督教団 軽井沢追分教会</p>
</footer>
</div>
</div>
</section>
</main>
<?php
get_footer();
