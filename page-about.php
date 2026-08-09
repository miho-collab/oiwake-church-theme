<?php
/**
 * Template Name: 教会案内
 * Template for page slug: about
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
<p class="news-section-label">About Oiwake Church</p>
<h1 class="news-section-title">教会案内</h1>
<p class="about-lead">
静かな森に抱かれた追分教会の歩みと、ここで育まれてきた祈りの風景をご紹介します。はじめての方にも、長く教会を支えてくださる方にも、この場所の空気が伝わるインデックスページです。
</p>
</div>
</div>
</div>

<section class="about-section about-section--history stagger-in" aria-labelledby="about-history-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="history-top">
<div class="history-media">
<div class="history-media-main">
<img alt="森に囲まれた礼拝堂" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 52%;"/>
</div>
<div class="history-media-side">
<img alt="木の香りが残る礼拝堂の内観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 30% 58%;"/>
<img alt="軽井沢の四季と教会" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 68% 42%;"/>
</div>
</div>
<div class="about-section-body">
<p class="about-section-subtitle">History</p>
<h2 class="about-section-title" id="about-history-heading">追分教会のあゆみ</h2>
<p class="about-section-text">1993年、軽井沢の森の中で「祈りの家」を願う小さな歩みから、追分教会は始まりました。木の香りに包まれた礼拝堂は、多くの方の祈りと献げものによって形づくられ、四季とともに地域に寄り添う教会として歩みを重ねています。</p>
<p class="about-section-text">いまも礼拝堂には、はじまりの静けさと温かさが息づいています。初めて訪れる方にも、ここが心をほどく場所となるよう願っています。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/history/' ) ); ?>">教会のあゆみへ</a>
</div>
</div>
</div>
<div class="history-children" aria-label="追分教会のあゆみの関連項目">
<article class="history-child-item">
<p class="about-section-subtitle">Archive</p>
<h3 class="history-child-item__title">教会誌アーカイブ</h3>
<p class="about-section-text">創立記念に発行した教会誌など、歩みを記録したアーカイブをご覧いただけます。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/history/#church-magazine-archive' ) ); ?>">アーカイブを見る</a>
</div>
</article>
</div>
</div>
</div>
</section>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="about-kazaganarutoki-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-pastor-layout">
<div class="about-section-media">
<img alt="季刊誌『風がなるとき』のイメージ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 42% 48%;"/>
</div>
<div class="about-section-body">
<p class="about-section-subtitle">Quarterly Magazine</p>
<h2 class="about-section-title" id="about-kazaganarutoki-heading">季刊誌『風がなるとき』</h2>
<p class="about-section-text">追分教会の歩みや礼拝、音楽、地域との交わりを伝える季刊誌です。バックナンバーをブラウザで閲覧、またはダウンロードしてご覧いただけます。</p>
<p class="about-section-text">教会の歩みとあわせて、季節ごとの記録をお楽しみください。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/kazaganarutoki/' ) ); ?>">季刊誌を見る</a>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="about-pastor-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<p class="about-section-subtitle">Pastor</p>
<h2 class="about-section-title" id="about-pastor-heading">牧師紹介</h2>
<div class="pastor-container" style="display:flex;flex-direction:row;align-items:flex-start;gap:1.5rem;width:100%;">
<img class="pastor-image" alt="牧師のポートレート" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/paster.jpg" style="width:150px;flex-shrink:0;aspect-ratio:3/4;object-fit:cover;object-position:50% 18%;border-radius:0.5rem;"/>
<div class="pastor-text" style="flex:1;min-width:0;display:flex;flex-direction:column;gap:0.9rem;">
<p class="about-section-text">追分教会の礼拝と交わりを導く牧師は、聖書の言葉をていねいに分かち合いながら、一人ひとりの歩みに耳を傾けることを大切にしています。あたたかく穏やかな語り口は、初めて教会を訪れる方の緊張をやわらげ、自然に祈りへと心を向けさせます。</p>
<p class="about-section-text">日々の礼拝だけでなく、結婚式や学びの会、地域との対話の場でも、教会の雰囲気そのものをつくる存在です。</p>
</div>
</div>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/pastor/' ) ); ?>">牧師紹介ページへ</a>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--organ stagger-in" aria-labelledby="about-organ-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<div class="organ-layout">
<img alt="礼拝堂のパイプオルガン" class="organ-portrait" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_organ.webp" style="object-position: 50% 30%;"/>
<div class="organ-main-copy">
<p class="about-section-subtitle">Pipe Organ</p>
<h2 class="about-section-title" id="about-organ-heading">パイプオルガン</h2>
<p class="about-section-text">追分教会の象徴であるパイプオルガンは、礼拝の祈りをやさしく支え、季節ごとの音楽礼拝に豊かな響きを添えています。縦に伸びるパイプのシルエットは礼拝堂の静謐さを深め、森の光とともにこの場所ならではの音風景を生み出します。</p>
<p class="about-section-text">須藤の演奏写真や記録とあわせて、オルガンの背景、体験会、学びの導線をまとめてご案内します。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/' ) ); ?>">パイプオルガンへ</a></div>
</div>
</div>
<div class="organ-links">
<div class="organ-detail-grid">
<article class="organ-detail-card">
<img alt="パイプオルガンの図版" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_organ.webp" style="object-position: 20% 68%;"/>
<div>
<h3>パイプオルガンの説明と図</h3>
<p>構造や音の出る仕組みを、図とやさしい解説でご案内します。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/#organ-about' ) ); ?>">詳細を見る</a></div>
</div>
</article>
<article class="organ-detail-card">
<img alt="パイプオルガン体験会のイメージ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_organ.webp" style="object-position: 68% 60%;"/>
<div>
<h3>パイプオルガン体験会</h3>
<p>実際に触れて音を出しながら、オルガンの魅力を体験できるプログラムです。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/#organ-trial' ) ); ?>">詳細を見る</a></div>
</div>
</article>
<article class="organ-detail-card">
<img alt="オルガン教室のレッスン風景" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_organ.webp" style="object-position: 46% 50%;"/>
<div>
<h3>オルガン教室</h3>
<p>礼拝堂でレッスンを受けながら、基礎から丁寧に学べる教室です。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/#organ-class' ) ); ?>">詳細を見る</a></div>
</div>
</article>
<article class="organ-detail-card">
<img alt="オルガンコラムのイメージ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_organ.webp" style="object-position: 40% 45%;"/>
<div>
<h3>オルガンコラム</h3>
<p>季刊誌『風がなるとき』連載など、礼拝音楽とオルガンの響きにまつわる読み物です。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/#organ-column' ) ); ?>">コラムを見る</a></div>
</div>
</article>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="about-wedding-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-pastor-layout">
<div class="about-section-media">
<img alt="礼拝堂での結婚式イメージ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top_wedding.webp" style="object-position: 52% 40%;"/>
</div>
<div class="about-section-body">
<p class="about-section-subtitle">Wedding</p>
<h2 class="about-section-title" id="about-wedding-heading">結婚式</h2>
<p class="about-section-text">追分の森に抱かれた礼拝堂で、神さまの前に結婚の約束をささげる教会式を行っています。木の香りに満ちた礼拝堂と、四季折々の庭が、お二人の新しい歩みを静かに祝福します。</p>
<p class="about-section-text">信者でない方の結婚式もお受けしています。挙式までの流れや事前のお話し合いなど、詳しくは専用ページをご覧ください。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/wedding/' ) ); ?>">結婚式のご案内へ</a>
</div>
</div>
</div>
</div>
</div>
</section>

</section>
</main>
<?php
get_footer();
