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
</div>
</div>
<div class="about-section-cta about-section-cta--history">
<a href="<?php echo esc_url( home_url( '/history/' ) ); ?>">教会のあゆみへ</a>
</div>
<div class="history-archive">
<p class="about-section-subtitle">Church Magazine Archive</p>
<h3 class="about-section-title">教会誌アーカイブ</h3>
<p class="about-section-text">創立10周年・20周年・30周年に発行した教会誌は、その時代の礼拝、音楽、地域との関わりを記録した大切なアーカイブです。あゆみと合わせてご覧いただけるよう、このセクションに統合しました。</p>
<div class="history-archive-grid">
<article class="history-archive-card">
<h3>10周年記念誌</h3>
<p>開設初期の証しや、礼拝堂建設に関わった方々の声を収録。</p>
<div class="about-section-cta"><a href="#">詳細を見る</a></div>
</article>
<article class="history-archive-card">
<h3>20周年記念誌</h3>
<p>音楽礼拝の発展と地域とのつながりを写真とともに振り返ります。</p>
<div class="about-section-cta"><a href="#">詳細を見る</a></div>
</article>
<article class="history-archive-card">
<h3>30周年記念誌</h3>
<p>次世代へ受け継ぐ祈りと、これからの教会のビジョンをまとめた特集号。</p>
<div class="about-section-cta"><a href="#">詳細を見る</a></div>
</article>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--pastor stagger-in" aria-labelledby="about-pastor-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-pastor-layout">
<div class="about-section-media">
<img alt="牧師のポートレート" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 57% 40%;"/>
</div>
<div class="about-section-body">
<p class="about-section-subtitle">Pastor</p>
<h2 class="about-section-title" id="about-pastor-heading">牧師紹介</h2>
<p class="about-section-text">追分教会の礼拝と交わりを導く牧師は、聖書の言葉をていねいに分かち合いながら、一人ひとりの歩みに耳を傾けることを大切にしています。あたたかく穏やかな語り口は、初めて教会を訪れる方の緊張をやわらげ、自然に祈りへと心を向けさせます。</p>
<p class="about-section-text">日々の礼拝だけでなく、結婚式や学びの会、地域との対話の場でも、教会の雰囲気そのものをつくる存在です。</p>
<div class="about-section-cta">
<a href="<?php echo esc_url( home_url( '/pastor/' ) ); ?>">牧師紹介ページへ</a>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="about-section about-section--gallery stagger-in" aria-labelledby="about-gallery-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="gallery-heading">
<p class="about-section-subtitle">Photo Gallery</p>
<h2 class="about-section-title" id="about-gallery-heading">フォトギャラリー（プレビュー）</h2>
<p class="about-section-text">四季の光と礼拝堂の静けさを、誌面のようなリズムで見せるプレビューです。大きさの違う写真を重ね、空いた余白には短いキャプションを添えて、教会の空気感を丁寧にすくい上げます。</p>
</div>
<div class="gallery-editorial-grid">
<figure class="gallery-item gallery-item--main">
<img alt="春の教会庭園" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 42% 36%;"/>
</figure>
<figure class="gallery-item gallery-item--side1">
<img alt="夏の礼拝堂" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 58% 44%;"/>
</figure>
<figure class="gallery-item gallery-item--side2">
<img alt="秋の木立と教会" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 35% 70%;"/>
</figure>
<figure class="gallery-item gallery-item--side3">
<img alt="雪景色の教会" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 72% 58%;"/>
</figure>
<p class="gallery-caption">礼拝前の静かな朝、木漏れ日の中で聴こえる足音や風の気配まで写し取るように、季節ごとの表情を記録しています。</p>
</div>
<div class="about-section-cta gallery-cta-row">
<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">フォトギャラリーを見る</a>
</div>
</div>
</div>
</section>

<section class="about-section about-section--organ stagger-in" aria-labelledby="about-organ-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="about-section-body">
<div class="organ-layout">
<img alt="礼拝堂のパイプオルガン" class="organ-portrait" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 50% 30%;"/>
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
<img alt="パイプオルガンの図版" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 20% 68%;"/>
<div>
<h3>パイプオルガンの説明と図</h3>
<p>構造や音の出る仕組みを、図とやさしい解説でご案内します。</p>
<div class="about-section-cta"><a href="<?php echo esc_url( home_url( '/organ-info/' ) ); ?>">詳細を見る</a></div>
</div>
</article>
<article class="organ-detail-card">
<img alt="パイプオルガン体験会のイメージ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 68% 60%;"/>
<div>
<h3>パイプオルガン体験会</h3>
<p>実際に触れて音を出しながら、オルガンの魅力を体験できるプログラムです。</p>
<div class="about-section-cta"><a href="#">詳細を見る</a></div>
</div>
</article>
<article class="organ-detail-card">
<img alt="オルガン教室とコラムの紹介" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 46% 50%;"/>
<div>
<h3>オルガン教室 / オルガンコラム</h3>
<p>レッスン風景を紹介する「オルガン教室」と、季刊誌「風がなるとき」に連載中の貴重なコラムを掲載。コラムでは、礼拝音楽の背景やオルガンの響きにまつわる物語を抜粋付きで紹介します。</p>
<div class="about-section-cta">
<a href="#">詳細を見る</a>
<a href="#">コラム一覧を見る</a>
</div>
</div>
</article>
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
