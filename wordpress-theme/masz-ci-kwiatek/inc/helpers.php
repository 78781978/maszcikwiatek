<?php
/**
 * Small helpers used across templates.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Reads a field from the "Site Settings" page (see MCK_SETTINGS_SLUG
 * in functions.php). Falls back to $default if ACF isn't active or
 * the field is empty, so templates never show raw "false"/blank.
 */
function mck_setting( $field_name, $default = '' ) {
	static $settings_page_id = null;

	if ( null === $settings_page_id ) {
		$page             = get_page_by_path( MCK_SETTINGS_SLUG );
		$settings_page_id = $page ? $page->ID : 0;
	}

	if ( ! $settings_page_id || ! function_exists( 'get_field' ) ) {
		return $default;
	}

	$value = get_field( $field_name, $settings_page_id );
	return ( '' !== $value && null !== $value && false !== $value ) ? $value : $default;
}

/**
 * ACF get_field() wrapper for the *current* queried object, with a
 * plain fallback so pages still render before ACF fields are filled in.
 */
function mck_field( $field_name, $default = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}
	$value = get_field( $field_name );
	return ( '' !== $value && null !== $value && false !== $value ) ? $value : $default;
}

/**
 * Digits-only phone number, ready for a tel: link, e.g. "+48573377330".
 */
function mck_tel_href() {
	$digits = preg_replace( '/\D/', '', mck_setting( 'telefon', '573377330' ) );
	if ( 0 !== strpos( $digits, '48' ) ) {
		$digits = '48' . $digits;
	}
	return 'tel:+' . $digits;
}

function mck_whatsapp_href() {
	$digits = preg_replace( '/\D/', '', mck_setting( 'whatsapp', '48573377330' ) );
	return 'https://wa.me/' . $digits;
}

/**
 * Renders the hero heading as "<span class=accent>...</span>" safely
 * split into its plain and accent parts (both come from ACF text
 * fields, so no markup parsing is needed).
 */
function mck_hero_heading( $plain, $accent ) {
	echo esc_html( $plain );
	if ( $accent ) {
		echo ' <span>' . esc_html( $accent ) . '</span>';
	}
}

/**
 * Finds the permalink of the Page using a given template file, in the
 * current Polylang language if Polylang is active. Used so internal
 * links ("see our offer", the header's order button, …) always point
 * to the right page regardless of what slug an editor gave it.
 */
function mck_page_url( $template_file, $fallback = '' ) {
	static $cache = array();

	$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'default';
	$key  = $template_file . '|' . $lang;

	if ( isset( $cache[ $key ] ) ) {
		return $cache[ $key ];
	}

	$query_args = array(
		'post_type'      => 'page',
		'posts_per_page' => 1,
		'meta_key'       => '_wp_page_template',
		'meta_value'     => $template_file,
		'no_found_rows'  => true,
	);
	if ( function_exists( 'pll_current_language' ) ) {
		$query_args['lang'] = pll_current_language();
	}

	$query = new WP_Query( $query_args );
	$url   = $fallback ? $fallback : home_url( '/' );
	if ( $query->have_posts() ) {
		$url = get_permalink( $query->posts[0] );
	}
	wp_reset_postdata();

	$cache[ $key ] = $url;
	return $url;
}

function mck_url_home() { return home_url( '/' ); }
function mck_url_o_nas() { return mck_page_url( 'page-o-nas.php' ); }
function mck_url_uslugi() { return mck_page_url( 'page-uslugi.php' ); }
function mck_url_portfolio() { return mck_page_url( 'page-portfolio.php' ); }
function mck_url_kontakt() { return mck_page_url( 'page-kontakt.php' ); }
function mck_url_polityka() { return mck_page_url( 'page-polityka-prywatnosci.php' ); }
