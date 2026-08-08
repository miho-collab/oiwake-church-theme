<?php
/**
 * Template Name: 追分教会のあゆみ
 * Template for page slug: history
 *
 * @package Oiwake_Church_Theme
 */

get_header();

$history_post_id = get_queried_object_id();
$magazine_issues = oiwake_get_church_magazine_archive_issues( $history_post_id );
?>
<main class="flex-1 w-full">
<section class="about-page-section" data-header-zone="light">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in history-detail-intro">
<p class="news-section-label">History of Oiwake Church</p>
<h1 class="news-section-title">追分教会のあゆみ</h1>
<p class="about-lead">
1993年の設立から、軽井沢の森の中に木の香りがする礼拝堂が建てられた歩みまで。祈りと音楽、地域との交わりの記録を、写真とともにたどります。
</p>
</div>
</div>
</div>

<section class="history-detail-section stagger-in" aria-labelledby="history-detail-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="history-article">
<h2 class="sr-only" id="history-detail-heading">教会の歩み</h2>

<div class="history-block">
<div class="history-block-text">
<h3 class="history-block-heading">1993年 — 森の中に「祈りの家」</h3>
<p class="about-section-text">追分教会は1993年、軽井沢の森の中で小さな一歩から始まりました。礼拝の場所を求める人々の祈りが重なり、木の香りに包まれた礼拝堂が建てられていきます。自然とともにある静けさは、いまも教会の根っこに息づいています。</p>
</div>
<div class="history-block-media">
<img alt="森に囲まれた礼拝堂の外観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 52%;"/>
</div>
</div>

<div class="history-block history-block--reverse">
<div class="history-block-text">
<h3 class="history-block-heading">礼拝堂の建築と、集う人々</h3>
<p class="about-section-text">礼拝堂は、多くの方の献げものと労力によって形づくられました。初めて礼拝に来られた方も、長く教会を支えてこられた方も、同じ屋根の下で祈りを重ねてきました。木の温もりを感じる内装は、追分教会らしいあたたかさを今も伝えています。</p>
</div>
<div class="history-block-media">
<img alt="木の香りが残る礼拝堂の内観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 30% 58%;"/>
</div>
</div>

<div class="history-block history-block--wide">
<div class="history-block-media">
<img alt="礼拝堂と庭園の全景" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 55% 45%;"/>
</div>
<div class="history-block-text">
<h3 class="history-block-heading">四季とともに育つ教会</h3>
<p class="about-section-text">春の新緑、夏の深い緑、秋の紅葉、冬の雪景色。追分の森は季節ごとに表情を変え、礼拝堂の静けさをいっそう深めます。庭園や周囲の木々は、礼拝の前後に心を整える大切な存在として、多くの方に愛されてきました。</p>
</div>
</div>

<div class="history-block">
<div class="history-block-text">
<h3 class="history-block-heading">音楽礼拝とパイプオルガン</h3>
<p class="about-section-text">礼拝堂に響くパイプオルガンの音は、追分教会の象徴のひとつです。特別讃美礼拝や季節の音楽集会を通して、祈りと音楽が一体となった礼拝の伝統が育まれてきました。音の余韻が森に溶けていく時間は、訪れる方の心に深く残ります。</p>
</div>
<div class="history-block-media">
<img alt="パイプオルガンと礼拝堂" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 50% 34%;"/>
</div>
</div>

<div class="history-block history-block--pair">
<div class="history-block-media">
<img alt="礼拝の集い" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 42% 60%;"/>
</div>
<div class="history-block-media">
<img alt="地域との交わり" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 68% 50%;"/>
</div>
</div>

<div class="history-block history-block--reverse">
<div class="history-block-text">
<h3 class="history-block-heading">地域とのつながり</h3>
<p class="about-section-text">追分教会は、礼拝の場であると同時に、地域の方々と交わる場でもあります。季節のイベントや学びの集い、子どもたちとの時間を通して、教会の門は地域に向けて開かれ続けてきました。森の中の小さな教会が、地域の祈りの拠点として歩んできた歴史です。</p>
<p class="about-section-text">これからも、初めて訪れる方が安心して足を運べる場所でありたい。1993年から続く歩みを胸に、次の世代へ祈りを受け継いでいきます。</p>
</div>
<div class="history-block-media">
<img alt="軽井沢の四季と教会" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 35% 70%;"/>
</div>
</div>

<div class="history-block history-block--wide">
<div class="history-block-media">
<img alt="雪景色の礼拝堂" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 72% 58%;"/>
</div>
<div class="history-block-text">
<h3 class="history-block-heading">これからの追分教会</h3>
<p class="about-section-text">30年を超える歩みのなかで培われた祈りと音楽、地域との絆を大切にしながら、これからも追分教会は歩み続けます。どなたも、ぜひ一度、森の中の礼拝堂を訪れてみてください。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">教会案内に戻る</a>
</div>
</div>
</div>
</div>

<section class="history-detail-archive" id="church-magazine-archive" aria-labelledby="church-magazine-archive-heading">
<p class="about-section-subtitle">Church Magazine Archive</p>
<h2 class="about-section-title" id="church-magazine-archive-heading">教会誌アーカイブ</h2>
<p class="about-section-text">創立記念に発行した教会誌を、PDFでご覧いただけます。</p>
<?php
get_template_part(
	'template-parts/pdf',
	'issue-list',
	array(
		'issues' => $magazine_issues,
	)
);
?>
</section>
</div>
</div>
</section>

</section>
</main>
<?php
get_footer();
