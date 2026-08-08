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
<section class="worship-page-section px-margin-safe" id="service-info" data-header-zone="light">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in">
<p class="news-section-label">Worship & Gatherings</p>
<h1 class="news-section-title">礼拝・集会のご案内</h1>
</div>

<section class="worship-section stagger-in" id="sunday-service" aria-labelledby="worship-main-heading">
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
<p class="worship-section-sublink">
<a href="<?php echo esc_url( home_url( '/service-sunday/#first-time-guide' ) ); ?>">初めて礼拝に出席される方へ →</a>
</p>
</div>
</section>

<section class="worship-section stagger-in" aria-labelledby="worship-children-heading">
<div class="worship-section-media">
<img alt="子どもたちと過ごす教会のひととき" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 45%;"/>
</div>
<div class="worship-section-body">
<p class="worship-section-subtitle">Children's Church</p>
<h2 class="worship-section-title" id="worship-children-heading">こどもの教会</h2>
<p class="worship-section-text">
主日礼拝と同じ時間に、子どもたちが聖書の物語や讃美、手仕事を通して神さまの愛に触れる集まりです。初めての方も、保護者の方も、どうぞお気軽にご参加ください。
</p>
<p class="worship-section-text">
年齢に合わせたやさしいことばと、少人数ならではのあたたかな雰囲気のなかで、子ども一人ひとりのペースを大切にしています。
</p>
<div class="worship-section-cta">
<a href="<?php echo esc_url( home_url( '/childrens-church/' ) ); ?>">詳細を見る</a>
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

</div>
</section>
</main>
<?php
get_footer();
