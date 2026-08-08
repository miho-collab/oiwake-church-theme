<?php
/**
 * PDF issue list (view / download).
 *
 * Expected $args['issues']: array of title, label, date, url.
 * Optional $args['empty_note']: note when URL is empty.
 *
 * @package Oiwake_Church_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$args       = ( isset( $args ) && is_array( $args ) ) ? $args : array();
$issues     = isset( $args['issues'] ) && is_array( $args['issues'] ) ? $args['issues'] : array();
$empty_note = isset( $args['empty_note'] ) ? (string) $args['empty_note'] : 'PDF準備中';

if ( empty( $issues ) ) {
	return;
}
?>
<ul class="pdf-issue-list">
<?php foreach ( $issues as $issue ) : ?>
	<?php
	$title = isset( $issue['title'] ) ? (string) $issue['title'] : '';
	$label = isset( $issue['label'] ) ? (string) $issue['label'] : '';
	$date  = isset( $issue['date'] ) ? (string) $issue['date'] : '';
	$url   = isset( $issue['url'] ) ? trim( (string) $issue['url'] ) : '';
	if ( '' === $title && '' === $label ) {
		continue;
	}
	?>
	<li class="pdf-issue-item">
		<div class="pdf-issue-item__text">
			<?php if ( $label && $label !== $title ) : ?>
				<p class="pdf-issue-item__label"><?php echo esc_html( $label ); ?></p>
			<?php endif; ?>
			<p class="pdf-issue-item__title"><?php echo esc_html( $title ? $title : $label ); ?></p>
			<?php if ( $date ) : ?>
				<p class="pdf-issue-item__date"><?php echo esc_html( $date ); ?></p>
			<?php endif; ?>
		</div>
		<div class="pdf-issue-item__actions">
			<?php if ( $url ) : ?>
				<a class="pdf-issue-item__link" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">閲覧</a>
				<a class="pdf-issue-item__link pdf-issue-item__link--download" href="<?php echo esc_url( $url ); ?>" download>ダウンロード</a>
			<?php else : ?>
				<span class="pdf-issue-item__pending"><?php echo esc_html( $empty_note ); ?></span>
			<?php endif; ?>
		</div>
	</li>
<?php endforeach; ?>
</ul>
