<?php
/**
 * Template Name: お問い合わせ
 * Template for page slug: contact
 *
 * Converted from contact.html.
 *
 * @package Oiwake_Church_Theme
 */

get_header();
?>
<main class="flex-1 w-full">
<section id="contact-page" class="w-full bg-white" data-header-zone="light">
<div class="px-margin-safe">
<div class="max-w-[1440px] mx-auto">
<div class="max-w-2xl stagger-in">
<p class="font-label-md text-label-md text-secondary uppercase tracking-widest mb-4">Contact</p>
<h1 class="font-headline-lg text-headline-lg text-primary mb-6">お問合せ</h1>
<p class="font-body-md text-body-md text-on-surface-variant mb-12">
          礼拝・集会、結婚式、教会見学などに関するご質問は、下記フォームよりお送りください。内容を確認のうえ、担当よりご連絡いたします。
        </p>
<div class="contact-form space-y-8">
<?php echo do_shortcode( '[contact-form-7 id="46e1e77" title="コンタクトフォーム 1"]' ); ?>
</div>
</div>
</div>
</div>
</section>
</main>
<?php
get_footer();
