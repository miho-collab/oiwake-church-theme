<?php
/**
 * Template Name: 初めての方へ
 * Template for page slug: welcome
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<section class="about-page-section" data-header-zone="light">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in">
<p class="news-section-label">For First-Time Visitors</p>
<h1 class="news-section-title">初めて礼拝に出席される方へ</h1>
<p class="about-lead">
教会はどなたにも開かれた場所です。事前の連絡や予約は必要ありません。信仰の有無や教会の所属にかかわらず、どうぞお気軽にお越しください。初めての方の「ちょっとした不安」や「小さな疑問」にも、ここでやさしくお答えします。
</p>
</div>
</div>
</div>

<section class="about-section about-section--organ stagger-in" aria-labelledby="welcome-steps-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="worship-detail-layout">
<img alt="軽井沢追分教会の外観" class="worship-detail-portrait" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 50% 38%;"/>
<div class="about-section-body">
<p class="about-section-subtitle">Your First Visit</p>
<h2 class="about-section-title" id="welcome-steps-heading">当日の過ごし方</h2>
<p class="about-section-text">礼拝の当日は、次のような流れで進みます。わからないことがあれば、いつでも近くのスタッフや会衆の方にお声がけください。堅苦しい決まりはなく、リラックスしてお越しいただければ大丈夫です。</p>
<ol class="welcome-steps" aria-label="初めての方の当日の流れ">
<li>
<span class="welcome-steps__num" aria-hidden="true">①</span>
<div class="welcome-steps__body">
<strong>受付で週報をお受け取りください</strong>
<p>礼拝堂の入口付近に受付があります。初めての方には、週報（礼拝のしおり）や席のご案内をいたします。「初めてです」とお伝えいただければ、スタッフが丁寧にお導きします。</p>
</div>
</li>
<li>
<span class="welcome-steps__num" aria-hidden="true">②</span>
<div class="welcome-steps__body">
<strong>お好きな席にお座りください</strong>
<p>指定の席はありません。前方・後方、どちらでも構いません。お子さま連れの方は、動きやすい席をお選びいただいてもかまいません。礼拝開始の少し前にお着きいただくと、ゆったりとした時間をお過ごしいただけます。</p>
</div>
</li>
<li>
<span class="welcome-steps__num" aria-hidden="true">③</span>
<div class="welcome-steps__body">
<strong>礼拝の流れは、優しくご案内します</strong>
<p>立ったり座ったり、讃美歌をうたったり——初めての方には、礼拝の進行に合わせてやさしくご案内します。分からないままにせず、気になることは遠慮なくお尋ねください。礼拝後のお茶の時間も、ぜひご参加ください。</p>
</div>
</li>
</ol>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--history stagger-in" aria-labelledby="welcome-faq-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<?php get_template_part( 'template-parts/welcome', 'faq' ); ?>
</div>
</div>
</div>
</section>

<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="gallery-page-back">
<a class="gallery-page-back__link" href="<?php echo esc_url( home_url( '/service-sunday/#first-time-guide' ) ); ?>">
<span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
<span>主日礼拝に戻る</span>
</a>
</div>
</div>
</div>

</section>
</main>
<?php
get_footer();
