<?php
/**
 * Custom post types for ご案内 and 活動報告.
 *
 * @package Oiwake_Church_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Post type slug for ご案内.
 *
 * @return string
 */
function oiwake_announcement_post_type() {
	return 'announcement';
}

/**
 * Post type slug for 活動報告.
 *
 * @return string
 */
function oiwake_activity_report_post_type() {
	return 'activity_report';
}

/**
 * Post type or post types used by an INFORMATION listing.
 *
 * @param string $which all|news|report.
 * @return string|string[]
 */
function oiwake_information_post_types( $which = 'all' ) {
	if ( 'news' === $which ) {
		return oiwake_announcement_post_type();
	}
	if ( 'report' === $which ) {
		return oiwake_activity_report_post_type();
	}
	return array( oiwake_announcement_post_type(), oiwake_activity_report_post_type() );
}

/**
 * Whether a post is ご案内.
 *
 * @param int|WP_Post|null $post Post ID or object.
 * @return bool
 */
function oiwake_is_announcement( $post = null ) {
	$post = get_post( $post );
	return $post instanceof WP_Post && oiwake_announcement_post_type() === $post->post_type;
}

/**
 * Whether a post is 活動報告.
 *
 * @param int|WP_Post|null $post Post ID or object.
 * @return bool
 */
function oiwake_is_activity_report( $post = null ) {
	$post = get_post( $post );
	return $post instanceof WP_Post && oiwake_activity_report_post_type() === $post->post_type;
}

/**
 * The one category each custom post type may use.
 *
 * @param string $post_type Post type slug.
 * @return WP_Term|null
 */
function oiwake_allowed_category_for_post_type( $post_type ) {
	$slug = '';
	if ( oiwake_announcement_post_type() === $post_type ) {
		$slug = 'community-info';
	} elseif ( oiwake_activity_report_post_type() === $post_type ) {
		$slug = 'community-report';
	}
	if ( '' === $slug ) {
		return null;
	}
	$term = get_term_by( 'slug', $slug, 'category' );
	return ( $term instanceof WP_Term ) ? $term : null;
}

/**
 * Post type being edited in the admin or block editor.
 *
 * @return string
 */
function oiwake_admin_context_post_type() {
	if ( ! is_admin() && ! ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return '';
	}

	if ( isset( $_GET['post_type'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return sanitize_key( wp_unslash( $_GET['post_type'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	if ( isset( $_GET['post'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$post = get_post( absint( wp_unslash( $_GET['post'] ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $post instanceof WP_Post ) {
			return $post->post_type;
		}
	}

	$referer = wp_get_referer();
	if ( ! is_string( $referer ) || '' === $referer ) {
		return '';
	}

	$query = wp_parse_url( $referer, PHP_URL_QUERY );
	$vars  = array();
	if ( is_string( $query ) ) {
		parse_str( $query, $vars );
	}

	if ( ! empty( $vars['post_type'] ) ) {
		return sanitize_key( $vars['post_type'] );
	}

	if ( ! empty( $vars['post'] ) ) {
		$post = get_post( absint( $vars['post'] ) );
		if ( $post instanceof WP_Post ) {
			return $post->post_type;
		}
	}

	return '';
}

/**
 * Register ご案内 and 活動報告.
 */
function oiwake_register_content_post_types() {
	$shared = array(
		'public'              => true,
		'show_ui'             => true,
		'show_in_rest'        => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'taxonomies'          => array( 'category' ),
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
	);

	register_post_type(
		oiwake_announcement_post_type(),
		array_merge(
			$shared,
			array(
				'labels'       => array(
					'name'               => 'ご案内',
					'singular_name'      => 'ご案内',
					'menu_name'          => 'ご案内',
					'add_new'            => '新規追加',
					'add_new_item'       => 'ご案内を追加',
					'edit_item'          => 'ご案内を編集',
					'new_item'           => '新しいご案内',
					'view_item'          => 'ご案内を表示',
					'search_items'       => 'ご案内を検索',
					'not_found'          => 'ご案内はありません',
					'not_found_in_trash' => 'ゴミ箱にご案内はありません',
					'all_items'          => 'ご案内一覧',
				),
				'menu_icon'    => 'dashicons-megaphone',
				'menu_position'=> 6,
				'rewrite'      => array(
					'slug'       => 'announcement',
					'with_front' => false,
				),
			)
		)
	);

	register_post_type(
		oiwake_activity_report_post_type(),
		array_merge(
			$shared,
			array(
				'labels'       => array(
					'name'               => '活動報告',
					'singular_name'      => '活動報告',
					'menu_name'          => '活動報告',
					'add_new'            => '新規追加',
					'add_new_item'       => '活動報告を追加',
					'edit_item'          => '活動報告を編集',
					'new_item'           => '新しい活動報告',
					'view_item'          => '活動報告を表示',
					'search_items'       => '活動報告を検索',
					'not_found'          => '活動報告はありません',
					'not_found_in_trash' => 'ゴミ箱に活動報告はありません',
					'all_items'          => '活動報告一覧',
				),
				'menu_icon'    => 'dashicons-clipboard',
				'menu_position'=> 7,
				'rewrite'      => array(
					'slug'       => 'activity-report',
					'with_front' => false,
				),
			)
		)
	);
}
add_action( 'init', 'oiwake_register_content_post_types' );

/**
 * Category archives for the community terms query the matching post type.
 *
 * @param WP_Query $query Query.
 */
function oiwake_filter_community_category_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->is_category() ) {
		return;
	}

	$term = $query->get_queried_object();
	if ( ! ( $term instanceof WP_Term ) ) {
		return;
	}

	if ( 'community-info' === $term->slug ) {
		$query->set( 'post_type', oiwake_announcement_post_type() );
	} elseif ( 'community-report' === $term->slug ) {
		$query->set( 'post_type', oiwake_activity_report_post_type() );
	}
}
add_action( 'pre_get_posts', 'oiwake_filter_community_category_query' );

/**
 * Show only community-info or community-report in the matching editor.
 *
 * get_term_by() inside this filter queries categories again, so a guard
 * stops that lookup from calling this filter a second time.
 *
 * @param array<string, mixed> $args       get_terms arguments.
 * @param string[]             $taxonomies Taxonomies being queried.
 * @return array<string, mixed>
 */
function oiwake_limit_editor_categories( $args, $taxonomies ) {
	static $inside = false;

	if ( $inside || ! in_array( 'category', (array) $taxonomies, true ) ) {
		return $args;
	}

	$inside = true;
	$term   = oiwake_allowed_category_for_post_type( oiwake_admin_context_post_type() );
	$inside = false;

	if ( ! ( $term instanceof WP_Term ) ) {
		return $args;
	}

	$args['include']    = array( (int) $term->term_id );
	$args['hide_empty'] = false;

	return $args;
}
add_filter( 'get_terms_args', 'oiwake_limit_editor_categories', 10, 2 );

/**
 * Drop any category other than the one allowed for this post type.
 *
 * @param int $post_id Post ID.
 */
function oiwake_restrict_saved_categories( $post_id ) {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}

	$term = oiwake_allowed_category_for_post_type( get_post_type( $post_id ) );
	if ( ! ( $term instanceof WP_Term ) ) {
		return;
	}

	$current = array_map( 'intval', wp_get_post_categories( $post_id ) );
	$keep    = in_array( (int) $term->term_id, $current, true ) ? array( (int) $term->term_id ) : array();
	if ( $current === $keep ) {
		return;
	}

	wp_set_post_categories( $post_id, $keep, false );
}
add_action( 'save_post', 'oiwake_restrict_saved_categories', 20 );

/**
 * Move existing 投稿 into the custom post types, once.
 *
 * Removes the ご案内 and 活動報告 categories. Those post types then use
 * community-info and community-report only.
 */
function oiwake_migrate_information_posts() {
	if ( get_option( 'oiwake_cpt_migration_v1' ) ) {
		return;
	}

	$news_ids = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future' ),
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'cat'            => 1,
		)
	);
	foreach ( $news_ids as $post_id ) {
		wp_update_post(
			array(
				'ID'        => (int) $post_id,
				'post_type' => oiwake_announcement_post_type(),
			)
		);
		wp_remove_object_terms( (int) $post_id, array( 'information', 'event-report' ), 'category' );
	}

	$report_ids = get_posts(
		array(
			'post_type'      => 'post',
			'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future' ),
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'cat'            => 4,
		)
	);
	foreach ( $report_ids as $post_id ) {
		$post_id = (int) $post_id;
		wp_update_post(
			array(
				'ID'        => $post_id,
				'post_type' => oiwake_activity_report_post_type(),
			)
		);
		wp_remove_object_terms( $post_id, array( 'information', 'event-report' ), 'category' );

		$existing_date = get_post_meta( $post_id, 'report_date', true );
		if ( ! is_string( $existing_date ) || '' === $existing_date ) {
			$source_date = get_post_meta( $post_id, 'info_date', true );
			if ( is_string( $source_date ) && '' !== $source_date ) {
				update_post_meta( $post_id, 'report_date', $source_date );
			}
		}
	}

	$default_id = (int) get_option( 'default_category' );
	if ( 1 === $default_id || 4 === $default_id ) {
		$uncategorized = term_exists( 'uncategorized', 'category' );
		if ( ! $uncategorized ) {
			$uncategorized = wp_insert_term( '未分類', 'category', array( 'slug' => 'uncategorized' ) );
		}
		if ( ! is_wp_error( $uncategorized ) ) {
			$uncategorized_id = is_array( $uncategorized ) ? (int) $uncategorized['term_id'] : (int) $uncategorized;
			update_option( 'default_category', $uncategorized_id );
		}
	}

	$information = get_term_by( 'slug', 'information', 'category' );
	if ( $information instanceof WP_Term ) {
		$deleted = wp_delete_term( (int) $information->term_id, 'category' );
		if ( is_wp_error( $deleted ) ) {
			return;
		}
	}
	$event_report = get_term_by( 'slug', 'event-report', 'category' );
	if ( $event_report instanceof WP_Term ) {
		$deleted = wp_delete_term( (int) $event_report->term_id, 'category' );
		if ( is_wp_error( $deleted ) ) {
			return;
		}
	}

	update_option( 'oiwake_cpt_migration_v1', '1', false );
	flush_rewrite_rules( false );
}
add_action( 'init', 'oiwake_migrate_information_posts', 20 );

/**
 * Flush permalinks once after the custom post types are registered.
 */
function oiwake_flush_content_rewrites() {
	if ( '1' === get_option( 'oiwake_cpt_rewrite_v1' ) ) {
		return;
	}
	flush_rewrite_rules( false );
	update_option( 'oiwake_cpt_rewrite_v1', '1', false );
}
add_action( 'init', 'oiwake_flush_content_rewrites', 99 );

/**
 * Keep the NEWS field group on ご案内, and create 活動報告 fields once.
 */
function oiwake_register_activity_report_fields() {
	if ( ! function_exists( 'acf_get_field_group' ) || ! function_exists( 'acf_update_field_group' ) || ! function_exists( 'acf_update_field' ) ) {
		return;
	}

	$news_group = acf_get_field_group( 'group_6ad9b2f385569' );
	if ( is_array( $news_group ) ) {
		$current = '';
		if ( isset( $news_group['location'][0][0]['value'] ) ) {
			$current = (string) $news_group['location'][0][0]['value'];
		}
		if ( oiwake_announcement_post_type() !== $current ) {
			$news_group['location'] = array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => oiwake_announcement_post_type(),
					),
				),
			);
			acf_update_field_group( $news_group );
		}
	}

	$report_group = acf_get_field_group( 'group_oiwake_activity_report' );
	if ( ! is_array( $report_group ) || empty( $report_group['ID'] ) ) {
		$report_group = acf_update_field_group(
			array(
				'key'                   => 'group_oiwake_activity_report',
				'title'                 => '活動報告',
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => oiwake_activity_report_post_type(),
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);
	}
	if ( ! is_array( $report_group ) || empty( $report_group['ID'] ) ) {
		return;
	}

	$parent_id = (int) $report_group['ID'];
	$fields    = array(
		array(
			'key'            => 'field_oiwake_report_date',
			'label'          => '日時',
			'name'           => 'report_date',
			'type'           => 'date_time_picker',
			'display_format' => 'Y年n月j日 H:i',
			'return_format'  => 'Y-m-d H:i:s',
			'first_day'      => 1,
		),
		array(
			'key'   => 'field_oiwake_report_title',
			'label' => 'タイトル',
			'name'  => 'report_title',
			'type'  => 'text',
		),
	);

	for ( $image_number = 1; $image_number <= 5; $image_number++ ) {
		$fields[] = array(
			'key'           => 'field_oiwake_report_image_' . $image_number,
			'label'         => '画像' . $image_number,
			'name'          => 'report_image_' . $image_number,
			'type'          => 'image',
			'return_format' => 'array',
			'preview_size'  => 'medium',
			'library'       => 'all',
		);
	}

	$fields[] = array(
		'key'       => 'field_oiwake_report_body',
		'label'     => '報告文',
		'name'      => 'report_body',
		'type'      => 'textarea',
		'rows'      => 8,
		'new_lines' => '',
	);

	foreach ( $fields as $order => $field ) {
		$saved = acf_get_field( $field['key'] );
		if ( is_array( $saved ) && ! empty( $saved['ID'] ) && (int) $saved['parent'] === $parent_id ) {
			continue;
		}
		if ( is_array( $saved ) && ! empty( $saved['ID'] ) ) {
			$field['ID'] = (int) $saved['ID'];
		}
		$field['parent']     = $parent_id;
		$field['menu_order'] = $order;
		acf_update_field( $field );
	}
}
add_action( 'acf/init', 'oiwake_register_activity_report_fields' );

/**
 * Remove the default category that term deletion can leave on a moved post.
 */
function oiwake_cleanup_migrated_categories() {
	if ( get_option( 'oiwake_cpt_cleanup_v1' ) ) {
		return;
	}

	$uncategorized = get_term_by( 'slug', 'uncategorized', 'category' );
	if ( $uncategorized instanceof WP_Term ) {
		$assigned = get_posts(
			array(
				'post_type'      => oiwake_information_post_types( 'all' ),
				'post_status'    => 'any',
				'posts_per_page' => -1,
				'fields'         => 'ids',
				'cat'            => (int) $uncategorized->term_id,
			)
		);
		foreach ( $assigned as $post_id ) {
			wp_remove_object_terms( (int) $post_id, array( (int) $uncategorized->term_id ), 'category' );
		}
	}

	$reports = get_posts(
		array(
			'post_type'      => oiwake_activity_report_post_type(),
			'post_status'    => 'any',
			'posts_per_page' => -1,
			'fields'         => 'ids',
		)
	);
	foreach ( $reports as $post_id ) {
		$post_id      = (int) $post_id;
		$report_title = get_post_meta( $post_id, 'report_title', true );
		$info_title   = get_post_meta( $post_id, 'info_title', true );
		if ( is_string( $report_title ) && '' !== $report_title && $report_title === $info_title ) {
			delete_post_meta( $post_id, 'report_title' );
		}
	}

	update_option( 'oiwake_cpt_cleanup_v1', '1', false );
}
add_action( 'init', 'oiwake_cleanup_migrated_categories', 30 );

/**
 * Image fields on an 活動報告, in field order.
 *
 * @param int|null $post_id Post ID.
 * @return array<int, array<string, mixed>>
 */
function oiwake_get_report_images( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	if ( ! function_exists( 'get_field' ) ) {
		return array();
	}

	$images = array();
	for ( $image_number = 1; $image_number <= 5; $image_number++ ) {
		$image = get_field( 'report_image_' . $image_number, $post_id );
		if ( is_array( $image ) && ! empty( $image['url'] ) ) {
			$images[] = $image;
			continue;
		}
		if ( ! is_numeric( $image ) ) {
			continue;
		}
		$full = wp_get_attachment_image_src( (int) $image, 'full' );
		$large = wp_get_attachment_image_src( (int) $image, 'large' );
		if ( ! $full && ! $large ) {
			continue;
		}
		$source   = $full ? $full : $large;
		$images[] = array(
			'url'    => $source[0],
			'width'  => $source[1],
			'height' => $source[2],
			'alt'    => (string) get_post_meta( (int) $image, '_wp_attachment_image_alt', true ),
			'sizes'  => array(
				'large' => $large ? $large[0] : $source[0],
			),
		);
	}

	return $images;
}

/**
 * Send old root permalinks to the custom post type URL.
 */
function oiwake_redirect_legacy_information_permalinks() {
	if ( ! is_404() ) {
		return;
	}

	$slug = get_query_var( 'name' );
	if ( ! is_string( $slug ) || '' === $slug ) {
		$request = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$path    = (string) wp_parse_url( (string) $request, PHP_URL_PATH );
		$slug    = basename( untrailingslashit( $path ) );
	}
	if ( '' === $slug ) {
		return;
	}

	$matches = get_posts(
		array(
			'name'           => $slug,
			'post_type'      => oiwake_information_post_types( 'all' ),
			'post_status'    => 'publish',
			'posts_per_page' => 1,
		)
	);
	if ( empty( $matches ) ) {
		return;
	}

	wp_safe_redirect( get_permalink( $matches[0] ), 301 );
	exit;
}
add_action( 'template_redirect', 'oiwake_redirect_legacy_information_permalinks' );
