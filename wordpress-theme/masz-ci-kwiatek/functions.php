<?php
/**
 * Masz Ci Kwiatek theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/acf-fields.php';
require_once get_template_directory() . '/inc/strings.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/nav-walker.php';

/**
 * Theme setup.
 */
function mck_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Menu główne (header)', 'mck' ),
		'footer'  => __( 'Menu w stopce', 'mck' ),
	) );
}
add_action( 'after_setup_theme', 'mck_setup' );

/**
 * Styles & scripts - the CSS/JS files are the exact ones from the
 * original static site, just enqueued the WordPress way.
 */
function mck_enqueue_assets() {
	wp_enqueue_style(
		'mck-google-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,500;1,600;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'mck-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		'14'
	);
	wp_enqueue_script(
		'mck-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		'6',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'mck_enqueue_assets' );

/**
 * A page (not a Post) is used as the "Site Settings" holder so editors
 * can fill in phone/e-mail/hours/photos without ACF Options Pages
 * (an ACF PRO-only feature). Create a Page with the slug below,
 * remove it from any menu, and fill in its fields.
 */
define( 'MCK_SETTINGS_SLUG', 'ustawienia-strony' );

/**
 * Register the settings Page automatically on theme activation so
 * there's always something for the ACF field group to attach to.
 */
function mck_create_settings_page() {
	if ( ! get_page_by_path( MCK_SETTINGS_SLUG ) ) {
		wp_insert_post( array(
			'post_title'   => 'Ustawienia strony',
			'post_name'    => MCK_SETTINGS_SLUG,
			'post_status'  => 'private',
			'post_type'    => 'page',
			'post_content' => 'Ta strona nie jest widoczna dla odwiedzających - służy wyłącznie do przechowywania danych kontaktowych, godzin otwarcia i zdjęć używanych w całej witrynie (patrz pola poniżej).',
		) );
	}
}
add_action( 'after_switch_theme', 'mck_create_settings_page' );
