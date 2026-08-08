<?php
/**
 * Template Name: こどもの教会
 * Template for page slug: childrens-church
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
<p class="news-section-label">Children's Church</p>
<h1 class="news-section-title">こどもの教会</h1>
<p class="about-lead">
主日礼拝と同じ時間に、子どもたちが聖書の物語や讃美、手仕事を通して神さまの愛に触れる集まりです。初めての方も、保護者の方も、どうぞお気軽にお越しください。
</p>
</div>
</div>
</div>

<section class="about-section about-section--organ stagger-in" aria-labelledby="children-overview-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="worship-detail-layout">
<img alt="子どもたちと過ごす教会のひととき" class="worship-detail-portrait" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 45%;"/>
<div class="about-section-body">
<p class="about-section-subtitle">Overview</p>
<h2 class="about-section-title" id="children-overview-heading">会のご案内と概要</h2>
<p class="about-section-text">こどもの教会は、礼拝の時間に合わせて子どもたちが集う場です。聖書の物語を聞いたり、うたったり、絵や工作をしたりしながら、神さまの愛をやさしいことばで味わいます。</p>
<p class="about-section-text">少人数であたたかく見守り、一人ひとりのペースを大切にしています。初めての参加でも事前の申し込みは不要です。保護者の方は主日礼拝へ、お子さまはこどもの教会へ、という過ごし方も歓迎しています。</p>
<dl class="worship-info-list">
<div class="worship-info-item">
<dt>開催日時</dt>
<dd>毎週日曜日 午後2:30〜（主日礼拝と同じ時間）</dd>
</div>
<div class="worship-info-item">
<dt>場所</dt>
<dd>教会ホール（礼拝堂隣）</dd>
</div>
<div class="worship-info-item">
<dt>持ち物</dt>
<dd>特になし</dd>
</div>
<div class="worship-info-item">
<dt>対象</dt>
<dd>未就学児〜小学生（見学・途中参加可）</dd>
</div>
</dl>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--history stagger-in" aria-labelledby="children-flow-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<p class="about-section-subtitle">What We Do</p>
<h2 class="about-section-title" id="children-flow-heading">当日の流れ</h2>
<p class="about-section-text">その日の年齢や人数に合わせて柔軟に進めますが、おおよそ次のような時間です。</p>
<ol class="welcome-steps" aria-label="こどもの教会の当日の流れ">
<li>
<span class="welcome-steps__num" aria-hidden="true">①</span>
<div class="welcome-steps__body">
<strong>あいさつと讃美</strong>
<p>顔を合わせ、簡単なうたや祈りから始めます。初めての子も、まわりの子と自然に打ち解けられるよう配慮しています。</p>
</div>
</li>
<li>
<span class="welcome-steps__num" aria-hidden="true">②</span>
<div class="welcome-steps__body">
<strong>聖書の物語</strong>
<p>その日の聖書の箇所を、絵本やおはなしでわかりやすく伝えます。問いかけながら、子ども自身の言葉も大切にします。</p>
</div>
</li>
<li>
<span class="welcome-steps__num" aria-hidden="true">③</span>
<div class="welcome-steps__body">
<strong>手仕事と分かち合い</strong>
<p>絵を描いたり工作をしたりしながら、聞いた物語を心に留めます。最後に短い祈りをして、礼拝後のご家族のもとへ戻ります。</p>
</div>
</li>
</ol>
</div>
</div>
</div>
</section>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="children-note-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<p class="about-section-subtitle">For Families</p>
<h2 class="about-section-title" id="children-note-heading">保護者の方へ</h2>
<p class="about-section-text">お子さまが泣いたり落ち着かないことがあっても、どうぞ気になさらないでください。必要に応じて保護者の方と一緒に過ごすこともできます。トイレや水分補給など、いつでも声をかけてください。</p>
<p class="about-section-text">主日礼拝に初めて出席される方は、あわせて「初めて礼拝に出席される方へ」もご覧ください。ご不明な点は、受付またはお問い合わせからお気軽にご相談ください。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/service-sunday/#first-time-guide' ) ); ?>">初めて礼拝に出席される方へ</a>
</div>
</div>
</div>
</div>
</section>

<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="gallery-page-back">
<a class="gallery-page-back__link" href="<?php echo esc_url( home_url( '/worship/' ) ); ?>">
<span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
<span>礼拝・集会に戻る</span>
</a>
</div>
</div>
</div>

</section>
</main>
<?php
get_footer();
