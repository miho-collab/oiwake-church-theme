<?php
/**
 * Template Name: フォトギャラリー
 * Template for page slug: gallery
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<section class="about-page-section" data-header-zone="light">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="stagger-in gallery-page-intro">
<p class="news-section-label">Photo Gallery</p>
<h1 class="news-section-title">フォトギャラリー</h1>
<p class="about-lead">
森の中の礼拝堂に降り注ぐ光、四季折々の木々、祈りと音楽に満ちた礼拝の時間——追分教会の豊かな表情を、誌面のように静かに眺めていただけるページです。一枚一枚の写真に込められた温かみと静けさを、ゆったりとした余白のなかでお楽しみください。
</p>
</div>
</div>
</div>

<section class="about-section about-section--gallery stagger-in" aria-labelledby="gallery-grid-heading">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<h2 class="sr-only" id="gallery-grid-heading">写真一覧</h2>
<nav class="gallery-filter" aria-label="写真カテゴリ">
<button type="button" class="gallery-filter-btn is-active" data-filter="all">すべて</button>
<button type="button" class="gallery-filter-btn" data-filter="nature">四季の自然</button>
<button type="button" class="gallery-filter-btn" data-filter="chapel">礼拝堂・ステンドグラス</button>
<button type="button" class="gallery-filter-btn" data-filter="events">教会の行事</button>
</nav>

<div class="gallery-page-grid" id="gallery-page-grid">
<button type="button" class="gallery-page-item" data-slot="01" data-category="nature" data-caption="新緑の季節、礼拝堂へ続く小径。朝露に濡れた落ち葉の香りが、静かな一日の始まりを告げます。" aria-label="新緑の礼拝堂への道を拡大表示">
<img alt="新緑の礼拝堂への道" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 38% 42%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="02" data-category="chapel" data-caption="夏の光がステンドグラスを通して礼拝堂を染める。色の層がゆっくりと移ろい、祈りの時間に深い静けさを添えます。" aria-label="夏光のステンドグラスを拡大表示">
<img alt="夏光のステンドグラス" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 62% 36%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="03" data-category="nature" data-caption="秋の並木と教会の外観。紅葉の色が深まるころ、礼拝後の散歩に訪れる方も多くいらっしゃいます。" aria-label="秋の並木を拡大表示">
<img alt="秋の並木" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 28% 68%;"/>
</button>
<p class="gallery-page-caption" data-slot="c1" data-categories="nature,chapel">礼拝前の静かな朝、木漏れ日の中で聴こえる足音や風の気配まで写し取るように、季節ごとの表情を記録しています。</p>
<button type="button" class="gallery-page-item" data-slot="04" data-category="nature" data-caption="雪化粧をした礼拝堂。冬の追分は音が吸い込まれるように静まり、白い光のなかで祈りが深まります。" aria-label="雪景色の教会を拡大表示">
<img alt="雪景色の教会" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 72% 58%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="05" data-category="chapel" data-caption="木の香りが残る礼拝堂の内観。シンプルな祭壇と長いベンチが、誰もが安心して座れる空間をつくっています。" aria-label="礼拝堂内観を拡大表示">
<img alt="礼拝堂内観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 48% 52%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="06" data-category="chapel" data-caption="礼拝を支えるパイプオルガン。縦に伸びるパイプのシルエットが、森の光とともに音の風景を生み出します。" aria-label="パイプオルガンを拡大表示">
<img alt="パイプオルガン" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 50% 30%;"/>
</button>
<p class="gallery-page-caption" data-slot="c2" data-categories="chapel,events">祈りと音楽が交わる礼拝堂の空気感——光の入り方ひとつで、同じ場所がまったく違う表情を見せてくれます。</p>
<button type="button" class="gallery-page-item" data-slot="07" data-category="events" data-caption="幼児祝福礼拝のひととき。小さな命への祈りと、会衆全体のあたたかいまなざしが礼拝堂を包みます。" aria-label="幼児祝福礼拝を拡大表示">
<img alt="幼児祝福礼拝" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 40% 55%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="08" data-category="events" data-caption="クリスマス礼拝の夜。キャンドルの灯りと讃美の歌声が、冬の森にやさしい温もりを届けます。" aria-label="クリスマス礼拝を拡大表示">
<img alt="クリスマス礼拝" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 55% 48%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="09" data-category="events" data-caption="バイブルキャンプの風景。自然のなかで聖書を学び、仲間と語り合う時間は教会の大切な伝統のひとつです。" aria-label="バイブルキャンプを拡大表示">
<img alt="バイブルキャンプ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 33% 44%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="10" data-category="nature" data-caption="春の花が咲く庭園。短い季節の美しさを、礼拝の合間にそっと眺める時間も大切にしています。" aria-label="春の花を拡大表示">
<img alt="春の花" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 66% 62%;"/>
</button>
<p class="gallery-page-caption" data-slot="c3" data-categories="nature,events">教会の行事は、祈りの輪をひろげる大切な時間。季節とともに重ねられた歩みが、写真に静かに刻まれています。</p>
<button type="button" class="gallery-page-item" data-slot="11" data-category="nature" data-caption="庭のベンチ。礼拝のあと、ひとりで森の気配を感じる場所として、多くの方に愛されています。" aria-label="庭のベンチを拡大表示">
<img alt="庭のベンチ" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 44% 70%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="12" data-category="nature" data-caption="夕暮れの教会外観。一日の終わりに差し込む黄金色の光が、礼拝堂の輪郭をやわらかく浮かび上がらせます。" aria-label="夕暮れの外観を拡大表示">
<img alt="夕暮れの外観" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 52% 38%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="13" data-category="chapel" data-caption="聖書朗読の時間。みことばが礼拝堂に響く瞬間、静寂のなかに希望の言葉が届けられます。" aria-label="聖書朗読を拡大表示">
<img alt="聖書朗読" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 36% 50%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="14" data-category="events" data-caption="結婚式の祝福のとき。新しい門出を祝う祈りと、家族・友人の笑顔が礼拝堂を満たします。" aria-label="結婚式を拡大表示">
<img alt="結婚式" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 58% 56%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="15" data-category="events" data-caption="礼拝後の交わりの時間。温かい飲み物と会話が、教会のもうひとつの礼拝のような場となります。" aria-label="交わりの時間を拡大表示">
<img alt="交わりの時間" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 42% 46%;"/>
</button>
<p class="gallery-page-caption" data-slot="c4" data-categories="chapel,events">人生の節目をともに祝い、支える——追分教会の祈りは、日常のなかの大きな喜びにも小さな痛みにも寄り添います。</p>
<button type="button" class="gallery-page-item" data-slot="16" data-category="chapel" data-caption="ステンドグラスを通した光の筋。午後の礼拝では、床に落ちる色の帯が静かな美しさを添えます。" aria-label="透過する光を拡大表示">
<img alt="透過する光" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 68% 40%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="17" data-category="nature" data-caption="冬の森と教会。枝の隙間から見える空の青さが、厳しい季節にも希望の色を見せてくれます。" aria-label="冬の森を拡大表示">
<img alt="冬の森" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 30% 58%;"/>
</button>
<button type="button" class="gallery-page-item" data-slot="18" data-category="events" data-caption="特別讃美礼拝のひと幕。オルガンと合唱の響きが、森の教会に豊かな音楽の季節をもたらします。" aria-label="讃美礼拝を拡大表示">
<img alt="讃美礼拝" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/oiwake_top.png" style="object-position: 64% 52%;"/>
</button>
</div>

<div class="gallery-page-back">
<a class="gallery-page-back__link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
<span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
<span>教会案内に戻る</span>
</a>
</div>
</div>
</div>
</section>

</section>
</main>
<div id="gallery-lightbox" class="gallery-lightbox" role="dialog" aria-modal="true" aria-labelledby="gallery-lightbox-caption" hidden>
<button type="button" class="gallery-lightbox__close" id="gallery-lightbox-close" aria-label="閉じる">
<span class="material-symbols-outlined" aria-hidden="true">close</span>
</button>
<div class="gallery-lightbox__inner">
<img alt="" class="gallery-lightbox__img" id="gallery-lightbox-img" src="" width="1200" height="800"/>
<p class="gallery-lightbox__caption" id="gallery-lightbox-caption"></p>
</div>
</div>
<?php
get_footer();
