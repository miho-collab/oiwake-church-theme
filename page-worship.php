<?php
/**
 * Template Name: 礼拝・集会
 * Template for page slug: worship
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<section class="worship-page-section px-margin-safe" data-header-zone="light">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in">
<p class="news-section-label">Worship & Gatherings</p>
<h1 class="news-section-title">礼拝・集会のご案内</h1>
</div>

<section class="worship-section stagger-in" aria-labelledby="worship-main-heading">
<div class="worship-section-media">
<img alt="礼拝堂の様子" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 40% center;"/>
<img alt="聖書と讃美歌" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 60% 40%;"/>
</div>
<div class="worship-section-body">
<p class="worship-section-subtitle">主日礼拝</p>
<h2 class="worship-section-title" id="worship-main-heading">主日礼拝（通常礼拝・特別讃美礼拝）</h2>
<p class="worship-section-text">
毎週日曜日の午後、追分の森に囲まれた礼拝堂で主日礼拝をささげています。聖書の言葉と祈り、そして静かな音楽の中で、それぞれが自分の歩みを振り返り、神さまの前に心を開くひとときです。
</p>
<p class="worship-section-text">
「通常礼拝」では、みことばの説き明かしと会衆讃美を中心に、「特別讃美礼拝」では、パイプオルガンや合唱の音楽を豊かに用いて礼拝をささげます。信者でない方も、どなたでも歓迎しています。
</p>
<div class="worship-section-cta">
<a href="<?php echo esc_url( home_url( '/service-sunday/' ) ); ?>">詳細を見る</a>
</div>
</div>
</section>

<section class="worship-section stagger-in" aria-labelledby="worship-first-heading">
<div class="worship-section-media">
<img alt="礼拝に集う人々" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 50% 55%;"/>
</div>
<div class="worship-section-body">
<p class="worship-section-subtitle">For First-time Visitors</p>
<h2 class="worship-section-title" id="worship-first-heading">初めて礼拝に来られる方へ</h2>
<p class="worship-section-text">
「教会は初めて」「礼拝の流れがわからない」という方にも、安心してお越しいただけるように、受付や案内、週報などでできるだけ分かりやすくご案内しています。服装や持ち物に決まりはなく、途中からのご参加・途中でのご退席も差し支えありません。
</p>
<p class="worship-section-text">
よくあるご質問は Q&amp;A 形式でまとめています。礼拝の雰囲気や所要時間、献金や子ども連れでの参加など、気になる点があればどうぞお気軽にご覧ください。
</p>
<div class="worship-section-cta">
<a href="<?php echo esc_url( home_url( '/welcome/' ) ); ?>">詳細を見る</a>
</div>
</div>
</section>

<section class="worship-section stagger-in" aria-labelledby="worship-bible-heading">
<div class="worship-section-media">
<img alt="開かれた聖書" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 35% 65%;"/>
</div>
<div class="worship-section-body">
<p class="worship-section-subtitle">Bible Study</p>
<h2 class="worship-section-title" id="worship-bible-heading">聖書を学ぶ会</h2>
<p class="worship-section-text">
聖書をゆっくり読み進めながら、ことばの背景や当時の文化、今の私たちの生活とのつながりを味わっていく集まりです。分からないことをそのままにせず、一緒に問いかけながら学べる、少人数での穏やかな時間です。
</p>
<p class="worship-section-text">
聖書を初めて読む方も、長く読んでこられた方も、どなたでも歓迎です。途中からのご参加も大丈夫ですので、関心のある方はぜひお声がけください。
</p>
<div class="worship-section-cta">
<a href="<?php echo esc_url( home_url( '/bible-study/' ) ); ?>">詳細を見る</a>
</div>
</div>
</section>

<section class="worship-section stagger-in" aria-labelledby="worship-wedding-heading">
<div class="worship-section-media">
<img alt="礼拝堂の内観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 45% 40%;"/>
<img alt="バージンロードと花" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 65% 70%;"/>
</div>
<div class="worship-section-body">
<p class="worship-section-subtitle">Wedding</p>
<h2 class="worship-section-title" id="worship-wedding-heading">結婚式のご案内</h2>
<p class="worship-section-text">
追分の森に抱かれた礼拝堂で、神さまの前に結婚の約束をささげる教会式を行っています。木の香りに満ちた礼拝堂と、四季折々の庭が、お二人の新しい歩みを静かに祝福します。
</p>
<p class="worship-section-text">
挙式までの流れや日程、事前のお話し合いのことなど、詳しくは専用ページにまとめています。信者でない方の結婚式もお受けしていますので、どうぞご相談ください。
</p>
<div class="worship-section-cta">
<a href="#">詳細を見る</a>
</div>
</div>
</section>

</div>
</section>
</main>
<?php
get_footer();
