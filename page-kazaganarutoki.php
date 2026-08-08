<?php
/**
 * Template Name: 季刊誌『風がなるとき』
 * Template for page slug: kazaganarutoki
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$page_id = get_queried_object_id();
$issues  = oiwake_get_kazaganarutoki_issues( $page_id );
?>
<main class="flex-1 w-full">
<section class="about-page-section" id="kazaganarutoki" data-header-zone="light">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in history-detail-intro">
<p class="news-section-label">Quarterly Magazine</p>
<h1 class="news-section-title">季刊誌『風がなるとき』</h1>
<p class="about-lead">
追分教会の歩みや礼拝、音楽、地域との交わりを伝える季刊誌です。バックナンバーをブラウザで閲覧、またはダウンロードしてご覧いただけます。
</p>
</div>

<section class="kazaganarutoki-issues stagger-in" aria-labelledby="kazaganarutoki-issues-heading">
<h2 class="sr-only" id="kazaganarutoki-issues-heading">バックナンバー一覧</h2>
<p class="about-section-text kazaganarutoki-issues-lead">過去の号を順にご案内します。PDFが公開されている号は、閲覧またはダウンロードできます。</p>
<?php
get_template_part(
	'template-parts/pdf',
	'issue-list',
	array(
		'issues' => $issues,
	)
);
?>
</section>

<div class="gallery-page-back stagger-in">
<a class="gallery-page-back__link" href="<?php echo esc_url( home_url( '/history/' ) ); ?>">
<span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
<span>追分教会のあゆみに戻る</span>
</a>
</div>
</div>
</div>
</section>
</main>
<?php
get_footer();
