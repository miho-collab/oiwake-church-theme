<?php
/**
 * Karuizawa Oiwake Church Theme functions
 *
 * @package Oiwake_Church_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function oiwake_church_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'header-menu' => __( 'ヘッダーナビゲーション', 'oiwake-church-theme' ),
			'footer-menu' => __( 'フッターナビ', 'oiwake-church-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'oiwake_church_theme_setup' );

/**
 * Enqueue styles and scripts.
 */
function oiwake_church_theme_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'oiwake-church-theme-style',
		get_stylesheet_uri(),
		array(),
		$theme_version
	);

	wp_enqueue_script(
		'oiwake-church-theme-main',
		get_template_directory_uri() . '/js/main.js',
		array(),
		$theme_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'oiwake_church_theme_enqueue_assets' );

/**
 * Limit the blog posts index to INFORMATION categories (news + report).
 *
 * @param WP_Query $query Query.
 */
function oiwake_filter_information_main_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! $query->is_home() ) {
		return;
	}

	$cat_ids = oiwake_get_information_category_ids();
	if ( empty( $cat_ids ) ) {
		return;
	}

	$query->set( 'category__in', $cat_ids );
	$query->set( 'orderby', 'date' );
	$query->set( 'order', 'DESC' );
}
add_action( 'pre_get_posts', 'oiwake_filter_information_main_query' );

/**
 * Whether a nav item is the Contact / CONTACT entry.
 *
 * CONTACT is rendered separately above the header menu, so matching items
 * are excluded from the header-menu location.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function oiwake_is_nav_contact_item( $item ) {
	if ( ! ( $item instanceof WP_Post ) ) {
		return false;
	}

	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	if ( in_array( 'nav-contact', $classes, true ) || in_array( 'header-contact-btn', $classes, true ) ) {
		return true;
	}

	$title = strtolower( trim( wp_strip_all_tags( (string) $item->title ) ) );
	if ( in_array( $title, array( 'contact', 'お問い合わせ', 'お問合せ' ), true ) ) {
		return true;
	}

	$path = (string) wp_parse_url( (string) $item->url, PHP_URL_PATH );
	return ( '' !== $path && false !== stripos( $path, '/contact' ) );
}

/**
 * Exclude Contact from the header nav (shown as a fixed CONTACT button above).
 *
 * @param array    $items Menu items.
 * @param stdClass $args  Menu arguments.
 * @return array
 */
function oiwake_exclude_contact_from_header_menu( $items, $args ) {
	if ( empty( $args->theme_location ) || 'header-menu' !== $args->theme_location ) {
		return $items;
	}

	$filtered = array();
	foreach ( $items as $item ) {
		if ( oiwake_is_nav_contact_item( $item ) ) {
			continue;
		}
		$filtered[] = $item;
	}

	return $filtered;
}
add_filter( 'wp_nav_menu_objects', 'oiwake_exclude_contact_from_header_menu', 10, 2 );

/**
 * Desktop header navigation walker (preserves existing DOM / class structure).
 *
 * Top-level: Japanese title + English description (メニュー項目の「説明」欄).
 * Depth 1: .nav-dropdown-mid
 * Depth 2: .nav-dropdown-sub-link
 */
class Oiwake_Header_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === $depth ) {
			$output .= '<ul class="nav-dropdown absolute top-full mt-4 bg-background border border-outline-variant/40 shadow-sm list-none m-0 p-0 z-50">';
		} else {
			$output .= '<ul class="nav-dropdown-sub">';
		}
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes, true );

		if ( 0 === $depth ) {
			$li_class = 'site-nav-item relative';
		} elseif ( 1 === $depth && $has_children ) {
			$li_class = 'nav-dropdown-has-sub';
		} else {
			$li_class = '';
		}

		$output .= $li_class ? '<li class="' . esc_attr( $li_class ) . '">' : '<li>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		if ( 0 === $depth ) {
			$atts['class'] = 'site-nav-link hover:opacity-80 transition-opacity';
		} elseif ( 1 === $depth ) {
			$atts['class'] = 'nav-dropdown-mid';
		} else {
			$atts['class'] = 'nav-dropdown-sub-link';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( empty( $value ) ) {
				continue;
			}
			$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';

		if ( 0 === $depth ) {
			$en_label     = trim( (string) $item->description );
			$item_output .= '<span class="site-nav-ja">' . esc_html( $title ) . '</span>';
			if ( '' !== $en_label ) {
				$item_output .= '<span class="site-nav-en">' . esc_html( $en_label ) . '</span>';
			}
		} else {
			$item_output .= esc_html( $title );
		}

		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Mobile header navigation walker.
 */
class Oiwake_Mobile_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === $depth ) {
			$output .= '<ul class="mobile-nav-dropdown list-none m-0 p-0">';
		} else {
			$output .= '<ul class="nav-dropdown-sub">';
		}
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes, true );

		if ( 0 === $depth ) {
			$li_class = 'mobile-nav-item';
		} elseif ( 1 === $depth && $has_children ) {
			$li_class = 'nav-dropdown-has-sub';
		} else {
			$li_class = '';
		}

		$output .= $li_class ? '<li class="' . esc_attr( $li_class ) . '">' : '<li>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		if ( 0 === $depth ) {
			$atts['class'] = 'site-nav-link hover:opacity-80 transition-opacity';
		} elseif ( 1 === $depth ) {
			$atts['class'] = 'nav-dropdown-mid';
		} else {
			$atts['class'] = 'nav-dropdown-sub-link';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( empty( $value ) ) {
				continue;
			}
			$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';

		if ( 0 === $depth ) {
			$en_label     = trim( (string) $item->description );
			$item_output .= '<span class="site-nav-ja">' . esc_html( $title ) . '</span>';
			if ( '' !== $en_label ) {
				$item_output .= '<span class="site-nav-en">' . esc_html( $en_label ) . '</span>';
			}
		} else {
			$item_output .= esc_html( $title );
		}

		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Footer sitemap navigation walker.
 *
 * Top-level items are grouped into 3 columns:
 * 1) first item (教会案内), 2) second item (礼拝・集会), 3) remaining items.
 * Depth 1: .sitemap-md / Depth 2: .sitemap-sm
 */
class Oiwake_Footer_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * Index among top-level items.
	 *
	 * @var int
	 */
	protected $top_index = 0;

	/**
	 * Current accordion panel id for the open top-level item.
	 *
	 * @var string
	 */
	protected $current_panel_id = '';

	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 === $depth ) {
			$panel_id = isset( $this->current_panel_id ) ? $this->current_panel_id : '';
			$id_attr  = $panel_id ? ' id="' . esc_attr( $panel_id ) . '"' : '';
			$output  .= '<ul class="sitemap-list footer-accordion-panel"' . $id_attr . '>';
		} else {
			$output .= '<ul class="sitemap-sublist">';
		}
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string   $output Used to append additional content.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	/**
	 * Starts the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes      = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes, true );

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		if ( 0 === $depth ) {
			if ( 0 === $this->top_index ) {
				$output .= '<li class="footer-sitemap-col footer-sitemap-col--1"><ul class="footer-sitemap-col-list">';
			} elseif ( 1 === $this->top_index ) {
				$output .= '</ul></li><li class="footer-sitemap-col footer-sitemap-col--2"><ul class="footer-sitemap-col-list">';
			} elseif ( 2 === $this->top_index ) {
				$output .= '</ul></li><li class="footer-sitemap-col footer-sitemap-col--3"><ul class="footer-sitemap-col-list">';
			}

			$li_classes = array( 'footer-sitemap-item' );
			if ( $has_children ) {
				$li_classes[] = 'footer-sitemap-item--has-children';
				$li_classes[] = 'menu-item-has-children';
			}
			$output .= '<li class="' . esc_attr( implode( ' ', $li_classes ) ) . '">';

			$panel_id               = 'footer-panel-' . (int) $item->ID;
			$this->current_panel_id = $has_children ? $panel_id : '';

			$link_atts          = $atts;
			$link_atts['class'] = 'sitemap-lg footer-sitemap-link';
			$link_attributes    = '';
			foreach ( $link_atts as $attr => $value ) {
				if ( empty( $value ) && 'href' !== $attr ) {
					continue;
				}
				$value            = ( 'href' === $attr ) ? esc_url( (string) $value ) : esc_attr( (string) $value );
				$link_attributes .= ' ' . $attr . '="' . $value . '"';
			}

			$item_output  = isset( $args->before ) ? $args->before : '';
			$item_output .= '<div class="footer-sitemap-heading">';
			$item_output .= '<a' . $link_attributes . '>' . esc_html( $title ) . '</a>';
			$item_output .= '</div>';
			$item_output .= isset( $args->after ) ? $args->after : '';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			++$this->top_index;
			return;
		}

		$li_class = ( 1 === $depth && $has_children ) ? 'sitemap-group' : '';
		$output  .= $li_class ? '<li class="' . esc_attr( $li_class ) . '">' : '<li>';

		$atts['class'] = ( 1 === $depth ) ? 'sitemap-md' : 'sitemap-sm';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( empty( $value ) && 'href' !== $attr ) {
				continue;
			}
			$value       = ( 'href' === $attr ) ? esc_url( (string) $value ) : esc_attr( (string) $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}

		$item_output  = isset( $args->before ) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>' . esc_html( $title ) . '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output.
	 *
	 * @param string   $output Used to append additional content.
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}

	/**
	 * Traverse elements to create list from elements.
	 *
	 * @param array $elements  Menu items.
	 * @param int   $max_depth Max depth.
	 * @param mixed ...$args   Args.
	 * @return string
	 */
	public function walk( $elements, $max_depth, ...$args ) {
		$output = parent::walk( $elements, $max_depth, ...$args );
		if ( $this->top_index > 0 ) {
			$output .= '</ul></li>';
		}
		return $output;
	}
}

/**
 * Resolve a category by slug or name candidates.
 *
 * @param string[] $candidates Slug or name candidates.
 * @return WP_Term|null
 */
function oiwake_get_category_by_candidates( $candidates ) {
	foreach ( $candidates as $candidate ) {
		$term = get_term_by( 'slug', $candidate, 'category' );
		if ( $term instanceof WP_Term ) {
			return $term;
		}
	}

	foreach ( $candidates as $candidate ) {
		$term = get_term_by( 'name', $candidate, 'category' );
		if ( $term instanceof WP_Term ) {
			return $term;
		}
	}

	return null;
}

/**
 * News category (ご案内).
 *
 * @return WP_Term|null
 */
function oiwake_get_news_category() {
	return oiwake_get_category_by_candidates(
		array( 'information', 'news', 'oshirase', 'ご案内', 'お知らせ' )
	);
}

/**
 * Reports category (活動報告).
 *
 * @return WP_Term|null
 */
function oiwake_get_reports_category() {
	return oiwake_get_category_by_candidates(
		array( 'event-report', 'report', 'reports', 'katsudo-hokoku', '活動報告', 'レポート', '報告' )
	);
}

/**
 * Community events category (イベント情報).
 *
 * @return WP_Term|null
 */
function oiwake_get_community_events_category() {
	return oiwake_get_category_by_candidates(
		array( 'community-info', 'community_news', 'community_event', 'community-event' )
	);
}

/**
 * Community reports category (地域の活動報告).
 *
 * @return WP_Term|null
 */
function oiwake_get_community_reports_category() {
	return oiwake_get_category_by_candidates(
		array( 'community-report', 'community_report' )
	);
}

/**
 * Term IDs for INFORMATION listing (news + report).
 *
 * @return int[]
 */
function oiwake_get_information_category_ids() {
	$ids = array();

	$news = oiwake_get_news_category();
	if ( $news instanceof WP_Term ) {
		$ids[] = (int) $news->term_id;
	}

	$reports = oiwake_get_reports_category();
	if ( $reports instanceof WP_Term ) {
		$ids[] = (int) $reports->term_id;
	}

	return array_values( array_unique( $ids ) );
}

/**
 * INFORMATION (all posts) listing URL.
 *
 * @return string
 */
function oiwake_get_information_url() {
	$news_page = get_page_by_path( 'news' );
	if ( $news_page instanceof WP_Post ) {
		return get_permalink( $news_page );
	}

	$info_page = get_page_by_path( 'information' );
	if ( $info_page instanceof WP_Post ) {
		return get_permalink( $info_page );
	}

	$posts_page_id = (int) get_option( 'page_for_posts' );
	if ( $posts_page_id > 0 ) {
		return get_permalink( $posts_page_id );
	}

	return home_url( '/news/' );
}

/**
 * Register INFORMATION filter query var (?info=news|report).
 *
 * @param string[] $vars Public query vars.
 * @return string[]
 */
function oiwake_register_information_query_var( $vars ) {
	$vars[] = 'info';
	return $vars;
}
add_filter( 'query_vars', 'oiwake_register_information_query_var' );

/**
 * Current INFORMATION filter: all | news | report.
 *
 * Reads the request URL (?info=) first so it stays correct even after $wp_query is replaced.
 *
 * @return string
 */
function oiwake_get_information_filter() {
	$raw = '';

	if ( isset( $_GET['info'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$raw = wp_unslash( $_GET['info'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	} else {
		$qv = get_query_var( 'info', '' );
		if ( is_string( $qv ) ) {
			$raw = $qv;
		}
	}

	$filter = sanitize_key( (string) $raw );
	if ( in_array( $filter, array( 'news', 'report' ), true ) ) {
		return $filter;
	}

	return 'all';
}

/**
 * URL for an INFORMATION tab.
 *
 * Uses ?info= on the INFORMATION page to avoid /news/ page vs category slug conflicts.
 *
 * @param string $tab all|news|report.
 * @return string
 */
function oiwake_get_information_tab_url( $tab = 'all' ) {
	$base = oiwake_get_information_url();
	$tab  = sanitize_key( $tab );

	if ( 'news' === $tab ) {
		return add_query_arg( 'info', 'news', $base ) . '#news-info';
	}

	if ( 'report' === $tab ) {
		return add_query_arg( 'info', 'report', $base ) . '#news-report';
	}

	return remove_query_arg( array( 'info' ), $base );
}

/**
 * Resolve WP_Term for an INFORMATION filter tab.
 *
 * @param string $filter all|news|report.
 * @return WP_Term|null
 */
function oiwake_get_information_filter_category( $filter ) {
	if ( 'news' === $filter ) {
		return oiwake_get_news_category();
	}
	if ( 'report' === $filter ) {
		return oiwake_get_reports_category();
	}
	return null;
}

/**
 * Build WP_Query args for INFORMATION (both categories) or one category.
 *
 * @param WP_Term|null $category Category term.
 * @param int          $per_page Posts per page.
 * @param int          $paged    Page number.
 * @return array<string, mixed>
 */
function oiwake_get_posts_query_args( $category = null, $per_page = 6, $paged = 1 ) {
	$args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $per_page,
		'paged'               => max( 1, (int) $paged ),
		'orderby'             => 'date',
		'order'               => 'DESC',
		'ignore_sticky_posts' => true,
	);

	if ( $category instanceof WP_Term ) {
		$args['cat'] = (int) $category->term_id;
		return $args;
	}

	$cat_ids = oiwake_get_information_category_ids();
	if ( ! empty( $cat_ids ) ) {
		$args['category__in'] = $cat_ids;
	}

	return $args;
}

/**
 * Whether the current request is the INFORMATION listing page (by path).
 *
 * Works even after global $wp_query has been replaced with a post loop.
 *
 * @return bool
 */
function oiwake_is_information_listing_request() {
	$info_path = wp_parse_url( oiwake_get_information_url(), PHP_URL_PATH );
	$req_uri   = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$req_path  = wp_parse_url( home_url( $req_uri ), PHP_URL_PATH );

	if ( ! is_string( $info_path ) || ! is_string( $req_path ) ) {
		return false;
	}

	return untrailingslashit( $info_path ) === untrailingslashit( $req_path );
}

/**
 * Active INFORMATION tab key: all | news | report.
 *
 * @param string|null $forced Optional forced tab (e.g. from page-news.php).
 * @return string
 */
function oiwake_get_information_active_tab( $forced = null ) {
	if ( is_string( $forced ) && in_array( $forced, array( 'all', 'news', 'report' ), true ) ) {
		return $forced;
	}

	// ?info= on the request URL is the source of truth.
	if ( isset( $_GET['info'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return oiwake_get_information_filter();
	}

	// INFORMATION page without ?info= → "すべて"
	if ( oiwake_is_information_listing_request() ) {
		return 'all';
	}

	$news_cat    = oiwake_get_news_category();
	$reports_cat = oiwake_get_reports_category();

	// Only trust category conditionals when we have not replaced the main query with a custom loop.
	// (Custom WP_Query with 'cat' makes is_category() true and would wrongly highlight ご案内.)
	if ( is_category() && ! oiwake_is_information_listing_request() ) {
		$current_id = (int) get_queried_object_id();
		if ( $news_cat instanceof WP_Term && $current_id === (int) $news_cat->term_id ) {
			return 'news';
		}
		if ( $reports_cat instanceof WP_Term && $current_id === (int) $reports_cat->term_id ) {
			return 'report';
		}
	}

	return 'all';
}

/**
 * Whether a category term is the news (ご案内) category.
 *
 * @param WP_Term $term Category term.
 * @return bool
 */
function oiwake_is_news_category_term( $term ) {
	$news = oiwake_get_news_category();
	return ( $news instanceof WP_Term && $term instanceof WP_Term && (int) $news->term_id === (int) $term->term_id );
}

/**
 * Whether a category term is the report (活動報告) category.
 *
 * @param WP_Term $term Category term.
 * @return bool
 */
function oiwake_is_report_category_term( $term ) {
	$reports = oiwake_get_reports_category();
	return ( $reports instanceof WP_Term && $term instanceof WP_Term && (int) $reports->term_id === (int) $term->term_id );
}

/**
 * Badge meta for a post's primary INFORMATION category.
 *
 * @param int|null $post_id Post ID.
 * @return array{label:string,class:string}|null
 */
function oiwake_get_post_category_badge( $post_id = null ) {
	$post_id    = $post_id ? (int) $post_id : get_the_ID();
	$categories = get_the_category( $post_id );

	if ( empty( $categories ) ) {
		return null;
	}

	foreach ( $categories as $category ) {
		if ( oiwake_is_news_category_term( $category ) ) {
			return array(
				'label' => $category->name,
				'class' => 'news-card-cat-badge news-card-cat-badge--news bg-emerald-100 text-emerald-800',
			);
		}
		if ( oiwake_is_report_category_term( $category ) ) {
			return array(
				'label' => $category->name,
				'class' => 'news-card-cat-badge news-card-cat-badge--report bg-blue-100 text-blue-800',
			);
		}
	}

	$first = $categories[0];
	return array(
		'label' => $first->name,
		'class' => 'news-card-cat-badge bg-surface-container text-on-surface-variant',
	);
}

/**
 * Plain-text excerpt for news / report cards.
 *
 * @param int|null $post_id Post ID.
 * @param int      $length  Max characters. 0 = no limit.
 * @return string
 */
function oiwake_get_card_excerpt( $post_id = null, $length = 180 ) {
	$post = get_post( $post_id ? (int) $post_id : get_the_ID() );
	if ( ! ( $post instanceof WP_Post ) ) {
		return '';
	}

	$text = has_excerpt( $post ) ? $post->post_excerpt : $post->post_content;
	$text = preg_replace( '/<!--more(.*?)?-->/', ' ', (string) $text );
	$text = strip_shortcodes( (string) $text );
	$text = wp_strip_all_tags( $text );
	$text = html_entity_decode( $text, ENT_QUOTES, get_bloginfo( 'charset' ) );
	$text = preg_replace( '/\s+/u', ' ', $text );
	$text = trim( (string) $text );

	if ( $length > 0 ) {
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) {
			if ( mb_strlen( $text ) > $length ) {
				return mb_substr( $text, 0, $length ) . '…';
			}
		} elseif ( strlen( $text ) > $length ) {
			return substr( $text, 0, $length ) . '…';
		}
	}

	return $text;
}

/**
 * Thumbnail URL with theme fallback image.
 *
 * @param int|null $post_id Post ID.
 * @param string   $size    Image size.
 * @return string
 */
function oiwake_get_post_thumbnail_url( $post_id = null, $size = 'large' ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();
	$url     = get_the_post_thumbnail_url( $post_id, $size );

	if ( ! $url ) {
		$url = get_template_directory_uri() . '/images/oiwake_top.png';
	}

	return $url;
}

/**
 * Posts page / news archive URL for back links.
 *
 * @return string
 */
function oiwake_get_news_archive_url() {
	return oiwake_get_information_url();
}

/**
 * Render theme-styled archive pagination.
 */
function oiwake_the_posts_pagination() {
	global $wp_query;

	if ( empty( $wp_query->max_num_pages ) || (int) $wp_query->max_num_pages < 2 ) {
		return;
	}

	$current = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
	$total   = (int) $wp_query->max_num_pages;

	$links = paginate_links(
		array(
			'total'     => $total,
			'current'   => $current,
			'mid_size'  => 2,
			'prev_next' => false,
			'type'      => 'array',
		)
	);

	if ( empty( $links ) ) {
		return;
	}

	$prev_url = $current > 1 ? get_pagenum_link( $current - 1 ) : '';
	$next_url = $current < $total ? get_pagenum_link( $current + 1 ) : '';
	?>
<nav class="news-pagination" aria-label="<?php esc_attr_e( 'ページナビゲーション', 'oiwake-church-theme' ); ?>">
	<?php if ( $prev_url ) : ?>
		<a class="news-pagination__btn" href="<?php echo esc_url( $prev_url ); ?>" aria-label="<?php esc_attr_e( '前のページ', 'oiwake-church-theme' ); ?>">
			<span class="material-symbols-outlined" aria-hidden="true">chevron_left</span>
		</a>
	<?php else : ?>
		<a class="news-pagination__btn is-disabled" href="#" aria-label="<?php esc_attr_e( '前のページ', 'oiwake-church-theme' ); ?>" aria-disabled="true" tabindex="-1">
			<span class="material-symbols-outlined" aria-hidden="true">chevron_left</span>
		</a>
	<?php endif; ?>

	<?php foreach ( $links as $link ) : ?>
		<?php
		$is_current = false !== strpos( $link, 'current' );
		$page_num   = '';
		if ( preg_match( '/>\s*(\d+)\s*</', $link, $matches ) ) {
			$page_num = $matches[1];
		}
		$href = '';
		if ( preg_match( '/href=[\'"]([^\'"]+)[\'"]/', $link, $href_match ) ) {
			$href = $href_match[1];
		}
		?>
		<?php if ( $is_current ) : ?>
			<a class="news-pagination__page is-current" href="<?php echo esc_url( get_pagenum_link( $current ) ); ?>" aria-current="page"><?php echo esc_html( $page_num ? $page_num : (string) $current ); ?></a>
		<?php elseif ( $href && $page_num ) : ?>
			<a class="news-pagination__page" href="<?php echo esc_url( $href ); ?>"><?php echo esc_html( $page_num ); ?></a>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php if ( $next_url ) : ?>
		<a class="news-pagination__btn" href="<?php echo esc_url( $next_url ); ?>" aria-label="<?php esc_attr_e( '次のページ', 'oiwake-church-theme' ); ?>">
			<span class="material-symbols-outlined" aria-hidden="true">chevron_right</span>
		</a>
	<?php else : ?>
		<a class="news-pagination__btn is-disabled" href="#" aria-label="<?php esc_attr_e( '次のページ', 'oiwake-church-theme' ); ?>" aria-disabled="true" tabindex="-1">
			<span class="material-symbols-outlined" aria-hidden="true">chevron_right</span>
		</a>
	<?php endif; ?>
</nav>
	<?php
}

/**
 * Normalize a PDF issue row into title / label / date / url.
 *
 * @param mixed $row Raw row.
 * @return array{title:string,label:string,date:string,url:string}|null
 */
function oiwake_normalize_pdf_issue_row( $row ) {
	if ( ! is_array( $row ) ) {
		return null;
	}

	$title = isset( $row['title'] ) ? trim( (string) $row['title'] ) : '';
	$label = isset( $row['label'] ) ? trim( (string) $row['label'] ) : ( isset( $row['issue_label'] ) ? trim( (string) $row['issue_label'] ) : '' );
	$date  = isset( $row['date'] ) ? trim( (string) $row['date'] ) : '';
	$url   = '';

	if ( ! empty( $row['url'] ) ) {
		$url = (string) $row['url'];
	} elseif ( ! empty( $row['pdf'] ) ) {
		$pdf = $row['pdf'];
		if ( is_array( $pdf ) && ! empty( $pdf['url'] ) ) {
			$url = (string) $pdf['url'];
		} elseif ( is_numeric( $pdf ) ) {
			$attachment_url = wp_get_attachment_url( (int) $pdf );
			$url            = $attachment_url ? $attachment_url : '';
		} else {
			$url = (string) $pdf;
		}
	}

	if ( '' === $title && '' === $label ) {
		return null;
	}

	return array(
		'title' => $title ? $title : $label,
		'label' => $label,
		'date'  => $date,
		'url'   => $url,
	);
}

/**
 * Collect PDF issues from ACF / post meta for a given field key.
 *
 * @param int    $post_id   Post ID.
 * @param string $field_key Field / meta key.
 * @return array<int, array{title:string,label:string,date:string,url:string}>
 */
function oiwake_get_pdf_issues_from_meta( $post_id, $field_key ) {
	$issues = array();

	if ( $post_id && function_exists( 'have_rows' ) && have_rows( $field_key, $post_id ) ) {
		while ( have_rows( $field_key, $post_id ) ) {
			the_row();
			$normalized = oiwake_normalize_pdf_issue_row(
				array(
					'title'       => function_exists( 'get_sub_field' ) ? get_sub_field( 'title' ) : '',
					'issue_label' => function_exists( 'get_sub_field' ) ? get_sub_field( 'issue_label' ) : '',
					'date'        => function_exists( 'get_sub_field' ) ? get_sub_field( 'date' ) : '',
					'pdf'         => function_exists( 'get_sub_field' ) ? get_sub_field( 'pdf' ) : '',
					'url'         => function_exists( 'get_sub_field' ) ? get_sub_field( 'url' ) : '',
				)
			);
			if ( $normalized ) {
				$issues[] = $normalized;
			}
		}
	}

	if ( empty( $issues ) && $post_id ) {
		$meta = get_post_meta( $post_id, $field_key, true );
		if ( is_string( $meta ) && '' !== $meta ) {
			$decoded = json_decode( $meta, true );
			if ( is_array( $decoded ) ) {
				$meta = $decoded;
			}
		}
		if ( is_array( $meta ) ) {
			foreach ( $meta as $row ) {
				$normalized = oiwake_normalize_pdf_issue_row( $row );
				if ( $normalized ) {
					$issues[] = $normalized;
				}
			}
		}
	}

	return $issues;
}

/**
 * Quarterly magazine PDFs: 季刊誌『風がなるとき』.
 *
 * Prefer ACF repeater / post meta `kazaganarutoki_issues`
 * (sub fields: title, issue_label, date, pdf|url).
 *
 * @param int $post_id Optional post ID.
 * @return array<int, array{title:string,label:string,date:string,url:string}>
 */
function oiwake_get_kazaganarutoki_issues( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	$issues  = oiwake_get_pdf_issues_from_meta( $post_id, 'kazaganarutoki_issues' );

	if ( empty( $issues ) ) {
		$defaults = array();
		for ( $i = 1; $i <= 10; $i++ ) {
			$n          = 40 - $i + 1;
			$defaults[] = array(
				'title' => sprintf( '第%d号', $n ),
				'label' => sprintf( '季刊誌『風がなるとき』 第%d号', $n ),
				'date'  => '',
				'url'   => '',
			);
		}
		$issues = apply_filters( 'oiwake_kazaganarutoki_issues_default', $defaults, $post_id );
	}

	return apply_filters( 'oiwake_kazaganarutoki_issues', $issues, $post_id );
}

/**
 * Church anniversary magazine archive PDFs.
 *
 * Prefer ACF repeater / post meta `church_magazine_archive`
 * (sub fields: title, issue_label, date, pdf|url).
 *
 * @param int $post_id Optional post ID.
 * @return array<int, array{title:string,label:string,date:string,url:string}>
 */
function oiwake_get_church_magazine_archive_issues( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	$issues  = oiwake_get_pdf_issues_from_meta( $post_id, 'church_magazine_archive' );

	if ( empty( $issues ) ) {
		$issues = apply_filters(
			'oiwake_church_magazine_archive_default',
			array(
				array(
					'title' => '10周年記念誌',
					'label' => '創立10周年',
					'date'  => '',
					'url'   => '',
				),
				array(
					'title' => '20周年記念誌',
					'label' => '創立20周年',
					'date'  => '',
					'url'   => '',
				),
				array(
					'title' => '30周年記念誌',
					'label' => '創立30周年',
					'date'  => '',
					'url'   => '',
				),
			),
			$post_id
		);
	}

	return apply_filters( 'oiwake_church_magazine_archive_issues', $issues, $post_id );
}

