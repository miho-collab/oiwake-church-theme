<?php
/**
 * Template Name: 牧師紹介
 * Template for page slug: pastor
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
<p class="news-section-label">Pastor Profile</p>
<h1 class="news-section-title">牧師紹介</h1>
<p class="about-lead">
追分教会の礼拝と交わりを導く牧師の歩みと、教会に託している願いをご紹介します。森の中の礼拝堂で大切にしている祈りの姿勢、みことばへの向き合い方、地域へのまなざしを、ゆっくり読める構成にまとめました。
</p>
</div>
</div>
</div>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="pastor-profile-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<p class="about-section-subtitle">Profile</p>
<h2 class="about-section-title" id="pastor-profile-heading">稲垣 壬午 牧師</h2>
<div class="pastor-container" style="display:flex;flex-direction:row;align-items:flex-start;gap:1.5rem;width:100%;">
<img class="pastor-image" alt="牧師のポートレート" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/paster.jpg" style="width:150px;flex-shrink:0;aspect-ratio:3/4;object-fit:cover;object-position:50% 18%;border-radius:0.5rem;"/>
<div class="pastor-text" style="flex:1;min-width:0;display:flex;flex-direction:column;gap:0.9rem;">
<p class="about-section-text">軽井沢追分教会の牧師として、主日礼拝、聖書の学び、結婚準備の面談、地域との対話の場を担当しています。神学の学びを土台にしつつ、日々の生活の言葉で福音を伝えることを大切にしています。</p>
<p class="about-section-text">祈りと音楽、そして対話を通して、一人ひとりが安心して自分の歩みを語れる教会でありたいという願いから、礼拝後の交わりや初めての方向けの案内にも丁寧に時間をとっています。</p>
</div>
</div>
<div class="about-section-cta">
<a href="#">お問い合わせ</a>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--gallery stagger-in" aria-labelledby="pastor-message-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="gallery-heading" style="text-align:left;max-width:64rem;margin:0 0 2rem;">
<p class="about-section-subtitle">Message</p>
<h2 class="about-section-title" id="pastor-message-heading">牧師メッセージ</h2>
<p class="about-section-text">追分の森の中で礼拝を重ねるなかで、私たちは「神さまの前に静まる時間」を何より大切にしています。忙しさのなかでは見過ごしてしまう小さな痛みや感謝に、祈りの時間がそっと光を当ててくれるからです。</p>
<p class="about-section-text">教会は、立派な人が集まる場所ではなく、支えを必要とする人が安心して立ち寄れる場所です。信仰の有無や背景にかかわらず、どなたにも開かれた礼拝堂として歩み続けたいと願っています。</p>
<p class="about-section-text">聖書の言葉は、ときに厳しく、ときに驚くほどあたたかく、私たちの心に語りかけます。礼拝の説教では、聖書の背景を丁寧にたどりながら、今日を生きる私たちの暮らしのなかでその言葉がどのように響くかを一緒に考えていきます。</p>
<p class="about-section-text">このページを読んでくださった方が、いつか実際に礼拝堂へ足を運び、静かな祈りと音楽の時間をともにしてくださるなら、これ以上の喜びはありません。どうぞ気軽にお越しください。</p>
</div>
<div class="about-section-cta">
<a href="#">礼拝案内を見る</a>
<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">教会案内に戻る</a>
</div>
</div>
</div>
</section>

<section class="about-section about-section--organ stagger-in" aria-labelledby="pastor-ministry-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<p class="about-section-subtitle">Ministry</p>
<h2 class="about-section-title" id="pastor-ministry-heading">牧会で大切にしていること</h2>
<div class="organ-detail-grid">
<article class="organ-detail-card">
<img alt="礼拝での説教" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 22% 46%;"/>
<div>
<h3>礼拝と説教</h3>
<p>聖書本文の背景と文脈を丁寧に読み解き、日常の課題や希望に結びつけて語ることを大切にしています。</p>
</div>
</article>
<article class="organ-detail-card">
<img alt="面談と祈りの時間" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 64% 40%;"/>
<div>
<h3>対話と祈り</h3>
<p>個別面談や祈りの同席を通して、言葉にならない思いにも耳を傾け、安心して歩める伴走を心がけています。</p>
</div>
</article>
<article class="organ-detail-card">
<img alt="地域との交わり" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 66%;"/>
<div>
<h3>地域とのつながり</h3>
<p>教会行事や学びの場を通して、教会の外に開かれた交わりを育み、地域の方々と共に歩む関係を大切にしています。</p>
</div>
</article>
</div>
<div class="about-section-cta">
<a href="#">詳細を見る</a>
</div>
</div>
</div>
</div>
</section>

</section>
</main>
<?php
get_footer();
